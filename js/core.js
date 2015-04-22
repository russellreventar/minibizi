/*
MINIBIZI - Web Application for small business owners
CSCI 3230U Final Project
DEC 3, 2014 11:59pm
Mark Reventar 100 429 397
Arnold Cheng

	core.js
		responsible for dynamic functionality of the sidebar and
		header. The side bar and header are present in all
		pages and therefore all use this core script
		
		1) INITIALIZATION section
			contains all functions that load specific elements
			in the web page
		2) EVENT HANDLERS section
			contains all functions that are called when an event occurs
			in the scope of core.js in the web page
		3) HELPER FUNCTIONS section
			assitant functions
*/

var currDate = new Date();	//current date
var user = null;			//users data
var business = null;		//business data

$(document).ready(function() {
	
	//load core elements
	initialize();
	
	//when core is done loading load entries
	if(getCurentFileName() == "home.php"){
		loadScript('entries.js');
	}else if(getCurentFileName() == "employees.php"){
		
	}else if(getCurentFileName() == "income.php"){
		
	}else if(getCurentFileName() == "profile.php"){
		loadScript('profile.js');
	}else{
		
	}
});

/*------------------------------------------------------------------------
	INITIALIZATION
		1) initialization
		2) loadUserData
		3) loadBusinessData
		4) loadStatus
		5) loadStock
------------------------------------------------------------------------*/
/*
	initialize
		load event handlers, user and business
*/
function initialize() {

	loadEventHandlers();
	
	//get users information
	$.ajax({
		url: 'core/handler/getUserInfo.php',
		type: 'POST',
		dataType: 'json',
		async: false,
		success: loadUserData,
		error: function(e, xhr) {
			console.log(e);
		}
	});
	
	//get business information
	$.ajax({
		url: 'core/handler/getBusinessInfo.php',
		type: 'POST',
		dataType: 'json',
		async: false,
		success: loadBusinessData,
		error: function(e, xhr) {
			console.log(e);
		}
	});
}

/*---------------------
	loadUserData
		given json object of users information display in webpage
---------------------*/
function loadUserData(data) {
	//fill global user variable
	user = data;
	
	//display name in header
	$("#name").text(data.FirstName + ' ' + data.LastName + ' ⌄');
}

/*---------------------
	loadBusinessData
		given json object of business information display
		in webpage
---------------------*/
function loadBusinessData(data) {

	//fill global business variable
	business = data;
	
	//fill business elements
	$("#businessName").text(data.BusinessName);
	$("#businessLocation").text(data.City + ', ' + data.Country);
	$("#founded").text(data.DateOpened);
	$('#phone').text(data.Phone);
	$('#phone').text(function(i, text) {
		return text.replace(/(\d{3})(\d{3})(\d{4})/, '($1) $2-$3');
	});
	$('#address').append(data.Address + '<br/>');
	$('#address').append(data.PostalCode + '<br/>');
	$('#address').append(data.City + '<br/>');
	$('#stockName').append(data.StockName);
	
	//get stock performance chart
	var chartLink = 'https://www.google.com/finance/getchart?q=' + data.StockName;
	$('#stockChart').attr("src", chartLink);
	
	//request stock information
	var stockLink = 'https://finance.google.com/finance/info?client=ig&q=' + data.StockName + '&callback=?';
	$.ajax({
		url: stockLink,
		type: 'GET',
		dataType: 'json',
		async: false,
		success: loadStock,
		error: function(e, xhr) {
			console.log(e);
		}
	});
	
	//load daily entry status
	loadStatus();
};

/*---------------------
	loadStatus
		load status indicators for the entry
		for the current day
---------------------*/
function loadStatus(){
	var date = $.datepicker.formatDate('yy-mm-dd', currDate);
	//request entry for current day
	$.ajax({
		url: 'core/handler/getEntryByDay.php',
		type: 'POST',
		dataType: 'json',
		async: false,
		data: {"date": date},
		success: function(data){
			//if entry doesnt exists, entry not made yet for the dat
			if($.isEmptyObject(data)){
				$('#statusEntry').text("NO");
				$('#statusEntry').addClass('redBG');
			//entry already made
			}else{
				$('#statusEntry').text("YES");
				$('#statusEntry').addClass('greenBG');
			}
		},
		error: function(e, xhr) {
			console.log(e);
		}
	});
	
	$('#statusOpen').text("YES");
	$('#statusOpen').addClass('greenBG');
}

/*---------------------
	loadStock
		load retrieved stock information 
---------------------*/
function loadStock(data) {
	var stockInfo = data[0];
	$('#stockPrice').text('$' + stockInfo.l);
	$('#stockChange').text(stockInfo.c);
	$('#stockTime').text(stockInfo.ltt);
	var change = parseFloat(stockInfo.c);
	if (change === 0) {
		$('#stockChange').addClass('blueBG');
	} else if (change < 0) {
		$('#stockChange').addClass('redBG');
	} else {
		$('#stockChange').addClass('greenBG');
	}
}

/*------------------------------------------------------------------------
	EVENT HANDLERS
		1) loadEventHandlers
------------------------------------------------------------------------*/
/*---------------------
	loadEventHandlers
		bind event handlers
---------------------*/
function loadEventHandlers(){
	$("#name,#profilepic").click(function() {
		$("#userOptions").toggle();
	});
}

/*------------------------------------------------------------------------
	HELPER FUNCTIONS
		1) loadScript
		2) getCurentFileName
		3) moneyFormat
------------------------------------------------------------------------*/
/*---------------------
	loadScript
		add script to php page
---------------------*/
function loadScript(filename){
	var fullPath = 'js/'+filename;
	var script = document.createElement('script');
    script.type = 'text/javascript';
    script.src = document.location.protocol + fullPath;
    document.getElementsByTagName('head')[0].appendChild(script)
}
/*---------------------
	getCurentFileName
		return filename of current page
---------------------*/
function getCurentFileName(){
    var pagePathName= window.location.pathname;
    return pagePathName.substring(pagePathName.lastIndexOf("/") + 1);
}
/*---------------------
	moneyFormat
		return a money formated string
---------------------*/
function moneyFormat(n) {
	return "$ " + n.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
}