var currDate = new Date();

$(document).ready(function() {
	initialize();
});

/*------------------------------------------------------------------------
	INITIALIZATION
------------------------------------------------------------------------*/
function initialize() {

	loadEventHandlers();
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

function loadUserData(data) {
	$("#name").text(data.FirstName + ' ' + data.LastName + ' ⌄');
}

function loadBusinessData(data) {
	business = data;
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
	var chartLink = 'https://www.google.com/finance/getchart?q=' + data.StockName;
	$('#stockChart').attr("src", chartLink);
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
	loadStatus();
};
function loadStatus(){
	var date = $.datepicker.formatDate('yy-mm-dd', currDate);
	console.log(date);
	$.ajax({
		url: 'core/handler/getEntryByDay.php',
		type: 'POST',
		dataType: 'json',
		async: false,
		data: {"date": date},
		success: function(data){
			if($.isEmptyObject(data)){
				$('#statusEntry').text("NO");
				$('#statusEntry').addClass('redBG');
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
------------------------------------------------------------------------*/
function loadEventHandlers(){
	$("#name,#profilepic").click(function() {
		$("#userOptions").toggle();
	});
}