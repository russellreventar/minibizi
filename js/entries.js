/*
MINIBIZI - Web Application for small business owners
CSCI 3230U Final Project
DEC 3, 2014 11:59pm
Mark Reventar 100 429 397
Arnold Cheng

	entries.js
		responsible for dynamic functionality of the main
		entries container in home.php. Generates the chart and
		table. called after core.js is done.
		
		1) INITIALIZATION section
			contains all functions that load specific elements
			in the web page
		2) EVENT HANDLERS section
			contains all functions that are called when an event occurs
			in the scope of entries.js in the web page
		3) HELPER FUNCTIONS section
			assitant functions
*/
var entries = null;	// entries data

initialize();

/*------------------------------------------------------------------------
	INITIALIZATION
		1) initialize
		2) getEntries
		3) loadEntries
		4) drawChart
------------------------------------------------------------------------*/
function initialize() {
	//set dropdown selectors to current date
	$('#month option:eq('+currDate.getMonth()+')').prop('selected', true);
	$('#year option[value="' + currDate.getFullYear() + '"]').prop('selected', true);
	loadEventHandlers();
	getEntries();
}

/*---------------------
	getEntries
		request json object of all entries for specified month
		and year
---------------------*/
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

/*---------------------
	loadEntries
		given a json object of entries 
		build array and rows to prepare to populate chart and table
---------------------*/
function loadEntries(data) {
	//empty current chart and table
	$('#chart-div').empty();
	$('#entryTable tbody').empty();
	
	//check if no entries made for selected month
	if ($.isEmptyObject(data)) {
		$('#chart-div').html('<label class="whiteLabel">No entries have been entered for this month</label>');
		
	//entries exist for selected month
	}else{
	
		//array to send to chart
		var array = [];
		
		//sort entries by date
		data.sort(customDateSort);
		
		//sums and constant vars pre loop
		var target = parseFloat(business.DailyTarget);
		var totalSales = 0;
		var month = $("#month option:selected").text();
		
		//iterate through each entry
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
			var targetGain = netsales - target;
			var targetColor;
			if (targetGain > 0) {
				targetColor = "greenBG";
			} else {
				targetColor = "redBG";
			}
			var row = $('<tr/>');
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

/*---------------------
	drawChart
		given an array of columns and rows for chart 
		set chart options and draw
---------------------*/
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
				color: '#51565B',
				count:-1
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
				count: array.length
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
/*------------------------------------------------------------------------
	EVENT HANDLERS
		1) loadEventHandlers
		2) newEntryButton
		3) entryFormSubmit
		4) loadEntryClick
------------------------------------------------------------------------*/

/*---------------------
	loadEventHandlers
		init all event handlers in the main div
---------------------*/
function loadEventHandlers(){
	$('#loadEntry').click(getEntries);
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
		getEntries();
	});
}

/*---------------------
	newEntryButton
		show popupCard with current date and load 
		textbos placeholder of entry data
---------------------*/
function newEntryButton(){
	$('#DailyEntryPopup').css("display", "block");
	entryFormPlaceholder();
}

/*---------------------
	entryFormSubmit
		submit a new or updated entry
---------------------*/
function entryFormSubmit(e){
	e.preventDefault();
	
	//get date selected
	var date = $('#datepicker').datepicker('getDate');
	date = $.datepicker.formatDate('yy-mm-dd', date);
	
	//data
	var netsales = $('#netSales').val();
	var expenses = $('#expenses').val();
	var tCount = $('#tCount').val();
	
	//if no changes made use current placeholder
	if(!netsales){
		netsales = $('#netSales').attr('placeholder');
	}
	if(!expenses){
		expenses = $('#expenses').attr('placeholder');
	}
	if(!tCount){
		tCount = $('#tCount').attr('placeholder');
	}

	//request to post new entry
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
			//handle success status
			if(data == 1){
				$('#popupCardMessage').css('color','#47E48F');
				$('#popupCardMessage').text('Entry has been successfully entered!');
			}else if(data ==2){
				$('#popupCardMessage').css('color','#47E48F');
				$('#popupCardMessage').text('Entry has been successfully updated!');
			}else{
				$('#popupCardMessage').css('color','red');
				$('#popupCardMessage').text('There has been an error adding entry');
			}
		},
		error: function(e, xhr) {
			console.log(e);
		}
	});
	
}

/*------------------------------------------------------------------------
	HELPER FUNCTIONS
		1) entryFormPlaceholder
		2) getDay
		4) moneyFormat
		5) customDateSort
------------------------------------------------------------------------*/
/*---------------------
	entryFormPlaceholder
		when a date is selected, check if an entry has already been made for
		that date. if so, update the text fields with that dates data
---------------------*/
function entryFormPlaceholder(){
	var date = $('#datepicker').datepicker('getDate');
	date = $.datepicker.formatDate('yy-mm-dd', date);
	
	//reset fields
	$('#popupCardMessage').css('color','#6f6f6f');
	$('#netSales').val('');
	$('#expenses').val('');
	$('#tCount').val('');
	
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