$(document).ready(function() {
	initialize();
});
function initialize(){
	$("#name,#profilepic").click(function(){$("#userOptions").toggle();});
	
	$.ajax({
		url:'data.php',
		type:'POST',
		dataType: 'json',
		async: false,
		data:{ "userInfo": "1"},
		success: initUserData,
		error: function(e, xhr){console.log(e);}
	});
	

	$.ajax({
		url:'data.php',
		type:'POST',
		dataType: 'json',
		async: false,
		data:{"businessInfo":"1"},
		success: initBusinessInfoData,
		error: function(e, xhr){console.log(e);}
	});
	
	$.ajax({
		url:'data.php',
		type:'POST',
		dataType: 'json',
		async: false,
		data:{"allEntries":"1"},
		success: initEntries,
		error: function(e, xhr){console.log(e);}
	});

	
}
function initUserData(data){
	$("#name").text(data.FirstName + ' ' + data.LastName + ' ⌄');
}
function initBusinessInfoData(data){
	$("#businessName").text(data.BusinessName);
	$("#businessLocation").text(data.City + ', ' + data.Country);
}
function initEntries(data){
	console.log(data);
}

