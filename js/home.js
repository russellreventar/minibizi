$(document).ready(function() {
	initialize();
});

function initialize() {
	$('#newEntryButton').click(newEntry);
	$('#showEntryButton').click(showEntries);
	
	$("#name,#profilepic").click(function() {
		$("#userOptions").toggle();
	});
	$.ajax({
		url: 'data.php',
		type: 'POST',
		dataType: 'json',
		async: false,
		data: {
			"userInfo": "1"
		},
		success: initUserData,
		error: function(e, xhr) {
			console.log(e);
		}
	});
	$.ajax({
		url: 'data.php',
		type: 'POST',
		dataType: 'json',
		async: false,
		data: {
			"businessInfo": "1"
		},
		success: initBusinessInfoData,
		error: function(e, xhr) {
			console.log(e);
		}
	});
	$.ajax({
		url: 'data.php',
		type: 'POST',
		dataType: 'json',
		async: false,
		data: {
			"allEntries": "1"
		},
		success: initEntries,
		error: function(e, xhr) {
			console.log(e);
		}
	});
}

function initUserData(data) {
	$("#name").text(data.FirstName + ' ' + data.LastName + ' ⌄');
}

function initBusinessInfoData(data) {
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
		success: initStock,
		error: function(e, xhr) {
			console.log(e);
		}
	});
	
	//ifs..
	$('#statusEntry').text("NO");
	$('#statusEntry').addClass('redBG');
	$('#statusOpen').text("YES");
	$('#statusOpen').addClass('greenBG');
};

function initStock(data) {
	var stockInfo = data[0];
	$('#stockPrice').text('$' + stockInfo.l);
	$('#stockChange').text(stockInfo.c);
	$('#stockTime').text(stockInfo.ltt);
	var change = parseFloat(stockInfo.c);
	if (change == 0) {
		$('#stockChange').addClass('blueBG');
	} else if (change < 0) {
		$('#stockChange').addClass('redBG');
	} else {
		$('#stockChange').addClass('greenBG');
	}
}

function initEntries(data) { /* console.log(data); */
}

function showEntries(){
	var month = $( "#month option:selected" ).val();
	var year = $( "#year option:selected" ).val();
	console.log(month);
	console.log(year);
}
function newEntry(){
	//show new entry form
	//add form data to journal table
	console.log("adding");
}