/*
MINIBIZI - Web Application for small business owners
CSCI 3230U Final Project
DEC 3, 2014 11:59pm
Mark Reventar 100 429 397
Arnold Cheng

	index.js
		handles form submit for loggin in and validation
		of text fields

*/

$(document).ready(function() {
	$('#loginForm').validate({
		rules: {
			username: {
				required: true,
				nowhitespace: true,
				alphanumeric: true,
				minlength: 3
			},
			password: {
				required: true,
				nowhitespace: true,
				alphanumeric: true,
				minlength: 6
			}
		}
	});
	$("#loginForm").submit(login);
});

/*---------------------
	login
		handle submit button on login form
		check if input valid, then send request to
		server to login and redirect user
---------------------*/
function login() {
	//ensure valid inputs
	if ($("#loginForm").valid()) {
		event.preventDefault();
		var username = $('#username').val();
		var password = $('#password').val();
		var loginData = 'username=' + username + '&password=' + password;
		//client side validation
		$.ajax({
			url: 'core/handler/login.php',
			type: 'POST',
			async: false,
			data: loginData,
			error: function(e, xhr) {
				console.log(e);
			},
			success: function(data) {
				console.log(data);
				if (data > 0) {
					window.location = "home.php";
				} else {
					$("#errorMessage").text("Incorrect Username and/or Password");
				}
			}
		});
	} else {
		$("#errorMessage").text("Invaid inputs");
	}
}