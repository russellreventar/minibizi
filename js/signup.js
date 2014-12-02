$(document).ready(function() {
	$('#logo').click(function(){
		window.location = "index.php";
	});
	$('#signupForm').validate({ 
        rules: {
            firstname: {
                required: true,
                lettersonly:true
            },
            lastname: {
                required: true,
                lettersonly:true
            },
            user: {
            	required:true,
	            minlength:3
            },
            email: {
	            required:true,
	            email:true
            },
            pass:{
	            required:true,
	            minlength:6
            },
            passConfirm:{
	            required:true,
	            equalTo: "#pass"
            }
        }
    });	
    $("#signupForm").submit(signup);
});

function signup(){

	if($("#signupForm").valid()){
	event.preventDefault();
	var firstname = $('#fname').val();
	var lastname = $('#lname').val();
	var username = $('#uname').val();
	var password = $('#pass').val();
	var email = $('#email').val();
	
	console.log(username);
	
	//check if username exists
	$.ajax({
		url: 'core/handler/handler.php',
		type: 'POST',
		dataType: 'text',
		async: false,
		data: {
			"username": username,
			"password": password,
			"email"   : email,
			"firstname": firstname,
			"lastname" :lastname
		},
		success: function(data){
			console.log(data);
			if(data == 1){
				$('#signupMessage').text('Thanks for signing up!');
				$('#signupMessage').css('color','white');
				$('#backIndex').css('display','block');
			}else if(data == -1){
				$('#signupMessage').text('That username already exists!');
				$('#signupMessage').css('color','red');
			}else{
				$('#signupMessage').text('There has been an error adding you to our system');
				$('#signupMessage').css('color','red');
			}
		},
		error: function(e, xhr) {
			console.log(e);
		}
	});
	}
}
