$(document).ready(function() {
	initialize();
});
function initialize(){
	$.ajax({
		url:'data/userData.php',
		type:'POST',
		dataType: 'json',
		async: false,
		success: initUserData,
		error: function(e, xhr){console.log(e);}
	});
	
	$.ajax({
		url:'data/businessInfoData.php',
		type:'POST',
		dataType: 'json',
		async: false,
		success: initBusinessInfoData,
		error: function(e, xhr){console.log(e);}
	});
	
}
function initUserData(data){
	$("#name").text(data.FirstName + ' ' + data.LastName + ' ⌄');
}
function initBusinessInfoData(data){
	$("#businessName").text(data.BusinessName);
	$("#businessLocation").text(data.City + ', ' + data.Country);
	console.log(data);
}

