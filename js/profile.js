/*
MINIBIZI - Web Application for small business owners
CSCI 3230U Final Project
DEC 3, 2014 11:59pm
Mark Reventar 100 429 397
Arnold Cheng

	profile.js
		handles display of user data and form submit 
		for changing password

*/

$(document).ready(function() {
	loadUserData();
	$('#changePass').validate({
		rules: {
			currPass: {
				required: true,
				nowhitespace: true,
				alphanumeric: true,
				minlength: 6
			},
			newPass: {
				required: true,
				nowhitespace: true,
				alphanumeric: true,
				minlength: 6
			},
			confirmPass: {
				required: true,
				equalTo: "#cpNew"
			}
		}
	});
	$("#changePass").submit(changePassword);
});

function loadUserData() {
	$("#pUsername").text(user.Username);
	$("#pFullname").text(user.FirstName + ' ' + user.LastName);
	$("#pEmail").text(user.Email);
}

/*---------------------
	changePassword
		if fields are valid, request to change password
		of currently logged in user
---------------------*/
function changePassword() {
	if ($("#changePass").valid()) {
		event.preventDefault();
		var currPass = $('#cpCurrent').val();
		var newPass = $('#cpNew').val();
		if (currPass != newPass) {
			$.ajax({
				url: 'core/handler/changePassword.php',
				type: 'POST',
				dataType: 'text',
				async: false,
				data: {
					"currPass": currPass,
					"newPass": newPass,
				},
				success: function(data) {
					if (data == 1) {
						$('#changeMessage').text('Your password has been succesfully changed');
						$('#changeMessage').css('color', '#27f368');
					} else {
						$('#changeMessage').text('Please make sure you have entered correct current password');
						$('#changeMessage').css('color', 'red');
					}
				},
				error: function(e, xhr) {
					console.log(e);
				}
			});
		} else {
			$('#changeMessage').text('The password is the same, please choose a different one');
			$('#changeMessage').css('color', 'red');
		}
	}
}