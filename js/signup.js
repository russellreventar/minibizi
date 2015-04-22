/*
MINIBIZI - Web Application for small business owners
CSCI 3230U Final Project
DEC 3, 2014 11:59pm
Mark Reventar 100 429 397
Arnold Cheng

	signup.js
		register and add user to the database
*/


$(document).ready(function() {
	$('#logo').click(function() {
		window.location = "index.php";
	});
	$('#signupForm').validate({
		rules: {
			firstname: {
				required: true,
				lettersonly: true
			},
			lastname: {
				required: true,
				lettersonly: true
			},
			user: {
				required: true,
				alphanumeric: true,
				minlength: 3
			},
			email: {
				required: true,
				email: true
			},
			pass: {
				required: true,
				nowhitespace: true,
				alphanumeric: true,
				minlength: 6
			},
			passConfirm: {
				required: true,
				equalTo: "#pass"
			}
		}
	});
	$("#signupForm").submit(signup);
});

/*---------------------
	signup
		if for fields are valid post request to add user to data
		with posted data. handles response status effectively
---------------------*/
function signup() {
	if ($("#signupForm").valid()) {
		event.preventDefault();
		var firstname = $('#fname').val();
		var lastname = $('#lname').val();
		var username = $('#uname').val();
		var password = $('#pass').val();
		var email = $('#email').val();
		$.ajax({
			url: 'core/handler/addUser.php',
			type: 'POST',
			dataType: 'text',
			async: false,
			data: {
				"username": username,
				"password": password,
				"email": email,
				"firstname": firstname,
				"lastname": lastname
			},
			success: function(data) {
				if (data == 1) {
					$('#signupMessage').text('Thanks for signing up!');
					$('#signupMessage').css('color', 'white');
					$('#backIndex').css('display', 'block');
				} else if (data == -1) {
					$('#signupMessage').text('User already exists!');
					$('#signupMessage').css('color', 'red');
				} else if (data == -2) {
					$('#signupMessage').text('Email already exists!');
					$('#signupMessage').css('color', 'red');
				} else if (data == -3) {
					$('#signupMessage').text('There has been an error adding you to our system');
					$('#signupMessage').css('color', 'red');
				} else {
					$('#signupMessage').text('Sorry, our services are down at the moment');
					$('#signupMessage').css('color', 'red');
				}
			},
			error: function(e, xhr) {
				console.log(e);
			}
		});
	}
}