$(document).ready(function() {

	$("#loginForm").submit(login);	

});

function login(){
	event.preventDefault();
	var username=$('#username').val();
	var password=$('#password').val();
	var dataString = 'username='+username+'&password='+password;
	//client side validation
	//empty?

	$.ajax({
		url:'login.php',
		type:'POST',
		async: false,
		data: dataString,
		error: function(e, xhr){console.log(e);},
		success: function(data){
			if(data > 0){
				window.location = "home.php";
			}else{
				$("#errorMessage").text("Incorrect Username and/or Password");
				//unsuccessful login
			}
		}
	});
}
