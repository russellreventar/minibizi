var entries = null;
var business = null;
var currDate = new Date();

$(document).ready(function() {
	initialize();
});

/*------------------------------------------------------------------------
	INITIALIZATION
------------------------------------------------------------------------*/
function initialize() {
	//set dropdown selectors
	$('#month option:eq(10)').prop('selected', true); 
	/* $('#month option:eq('+currDate.getMonth()+')').prop('selected', true); */
	$('#year option[value="' + currDate.getFullYear() + '"]').prop('selected', true);
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
	getEntries();
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

function loadEntries(data) {
	//empty current chart and table
	$('#chart-div').empty();
	$('#entryTable tbody').empty();
	
	//check if entries have been for selected month
	if ($.isEmptyObject(data)) {
		$('#chart-div').html('<label class="whiteLabel">No entries have been entered for this month</label>');
	}else{
		var array = [];
		data.sort(customDateSort);
		var target = parseFloat(business['DailyTarget']);
		var totalSales = 0;
		var month = $("#month option:selected").text();
		$.each(data, function() {
		
			//build data array for chart
			var day = parseInt(getDay(this.Date));
			var expenses = parseFloat(this.Expenses);
			var netsales = parseFloat(this.NetSales);
			
			var targetTip = '$' + target + ' target';
			var expensesTip = '-$' + expenses;
			var salesTip = moneyFormat(netsales) + '\n'+month+' '+day;
			
			var item = [day, target, targetTip, netsales, salesTip, expenses, expensesTip];
			array.push(item);
			
			//build rows for table
			totalSales += netsales;
			var avgSales = totalSales / day;
			var profit = netsales - expenses;
			var row = $('<tr/>');
			var targetGain = netsales - target;
			var targetColor;
			if (targetGain > 0) {
				targetColor = "greenBG";
			} else {
				targetColor = "redBG";
			}
			row.append($('<td/>').html('<div class="targetOval ' + targetColor + '">' + moneyFormat(targetGain) + '</div>'));
			row.append($('<td/>').text($("#month option:selected").text().substring(0, 3) + '-' + day));
			row.append($('<td/>').text(moneyFormat(netsales)));
			row.append($('<td/>').text(moneyFormat(totalSales)));
			row.append($('<td/>').text(moneyFormat(avgSales)));
			row.append($('<td/>').text('-' + moneyFormat(expenses)));
			row.append($('<td/>').text(this.TransactionCount));
			row.append($('<td/>').text(moneyFormat(profit)));
			$('#entryTable tbody').append(row);
		});
		
		//draw chart
		google.load("visualization", "1", {
			packages: ["corechart"],
			callback: function() {
				drawChart(array);
			}
		});
	}
}
/*------------------------------------------------------------------------
	EVENT HANDLERS
------------------------------------------------------------------------*/
function loadEventHandlers(){
	$('#loadEntry').click(loadEntryClick);
	$("#newEntryForm").submit(entryFormSubmit);
	$('#newEntryButton').click(newEntryButton);
	$("#datepicker").datepicker();

	
	$.datepicker.setDefaults({
    	onSelect: function (date) {
			entryFormPlaceholder();
		}
	});
	$("#datepicker").datepicker("setDate",currDate);
	$('#closePopup').click(function() {
		$('#DailyEntryPopup').css("display", "none");
	});
	$("#name,#profilepic").click(function() {
		$("#userOptions").toggle();
	});
}

function newEntryButton(){
	$('#DailyEntryPopup').css("display", "block");
	entryFormPlaceholder();
}

function entryFormPlaceholder(){
	var date = $('#datepicker').datepicker('getDate');
	date = $.datepicker.formatDate('yy-mm-dd', date);
	$('#popupCardMessage').css('color','#6f6f6f');
	$('#netSales').val('');
	$('#expenses').val('');
	$('#tCount').val('');
	/* } */
	//if entry already made, load current data as placeholders
	$.ajax({
		url: 'core/handler/getEntryByDay.php',
		type: 'POST',
		dataType: 'json',
		async: false,
		data: {"date": date},
		success: function(data){
			if($.isEmptyObject(data)){
				$('#popupCardMessage').text('Enter new entry');
				$('#netSales').removeAttr('placeholder');
				$('#expenses').removeAttr('placeholder');
				$('#tCount').removeAttr('placeholder');
			}else{
				$('#popupCardMessage').text('Update this current entry');
				$('#netSales').attr('placeholder',data.NetSales);
				$('#expenses').attr('placeholder',data.Expenses);
				$('#tCount').attr('placeholder',data.TransactionCount);
			}
		},
		error: function(e, xhr) {
			console.log(e);
		}
	});

}
function entryFormSubmit(e){
	e.preventDefault();
	var date = $('#datepicker').datepicker('getDate');
	date = $.datepicker.formatDate('yy-mm-dd', date);
	var netsales = $('#netSales').val();
	var expenses = $('#expenses').val();
	var tCount = $('#tCount').val();
	if(!netsales){
		netsales = $('#netSales').attr('placeholder');
	}
	if(!expenses){
		expenses = $('#expenses').attr('placeholder');
	}
	if(!tCount){
		tCount = $('#tCount').attr('placeholder');
	}

	$.ajax({
		url: 'core/handler/addEntry.php',
		type: 'POST',
		dataType: 'text',
		async: false,
		data: {
			"date": date,
			"sales": netsales,
			"expenses":expenses,
			"tCount":tCount
		},
		success: function(data){
			if(data){
				$('#popupCardMessage').css('color','#47E48F');
				$('#popupCardMessage').text('Entry has been successfully entered!');
				
			}else{
				$('#popupCardMessage').css('color','red');
				$('#popupCardMessage').text('Error Entering Entry!');
			}
		},
		error: function(e, xhr) {
			console.log(e);
		}
	});
	
}

function loadEntryClick() {
	getEntries();
}

/*------------------------------------------------------------------------
	HELPER FUNCTIONS
------------------------------------------------------------------------*/
function getEntries() {
	//get month and year selected
	var month = $("#month option:selected").val();
	var year = $("#year option:selected").val();
	//get entries for that month and year
	$.ajax({
		url: 'core/handler/getEntriesByMonthYear.php',
		type: 'POST',
		dataType: 'json',
		async: false,
		data: {
			month: month,
			year: year
		},
		success: loadEntries,
		error: function(e, xhr) {
			console.log(e);
		}
	});
}

function drawChart(array) {
	var m = $("#month option:selected").text();
	var data = new google.visualization.DataTable();
	data.addColumn('number', 'Date');
	data.addColumn('number', 'Target');
	data.addColumn({
		type: 'string',
		role: 'tooltip'
	});
	data.addColumn('number', 'Net Sales');
	data.addColumn({
		type: 'string',
		role: 'tooltip'
	});
	data.addColumn('number', 'Expenses');
	data.addColumn({
		type: 'string',
		role: 'tooltip'
	});
	data.addRows(array);
	var options = {
		backgroundColor: 'none',
		chartArea: {
			left: 80,
			top: 10,
			width: '80%',
			height: '80%'
		},
		crosshair: {
			trigger: 'both',
			orientation: 'horizontal',
			opacity: 0.2
		},
		legend: {
			textStyle: {
				color: 'white',
				fontName: 'Source Sans Pro',
				bold: false,
				fontSize: 12,
				italic: false
			},
			position: "right"
		},
		curveType: 'function',
		series: {
			0: {
				color: "#36D2DA",
				lineDashStyle: [4, 4],
				lineWidth: 2
			},
			1: {
				color: "#52F69B"
			},
			2: {
				color: "#F07259"
			}
		},
		vAxis: {
			title: 'Sales ($)',
			titleTextStyle: {
				color: 'white',
				fontName: 'Source Sans Pro',
				bold: false,
				fontSize: 15,
				italic: false
			},
			baselineColor: '#707F92',
			gridlines: {
				color: '#51565B'
			},
			textStyle: {
				color: '#CDCDCD',
				fontName: 'Source Sans Pro',
				bold: false,
				fontSize: 13
			},
			viewWindowMode: "maximized"
		},
		hAxis: {
			title: m,
			titleTextStyle: {
				color: 'white',
				fontName: 'Source Sans Pro',
				bold: false,
				fontSize: 15,
				italic: false
			},
			gridlines: {
				color: '#51565B',
				count: -1
			},
			textStyle: {
				color: '#CDCDCD',
				fontName: 'Source Sans Pro',
				bold: false,
				fontSize: 13
			},
		},
		tooltip: {
			textStyle: {
				color: '#EEEEEE',
				fontName: 'Source Sans Pro',
				bold: false,
				fontSize: 14
			},
			trigger: 'both'
		},
	};
	var chart = new google.visualization.LineChart(document.getElementById('chart-div'));
	chart.draw(data, options);
}
function getDay(input) {
	var parts = input.match(/(\d+)/g);
	return parts[2];
}
function moneyFormat(n) {
	return "$ " + n.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
}
function customDateSort(a, b) {
	return new Date(a.Date).getTime() - new Date(b.Date).getTime();
}