$(document).ready(function () {

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
	            required:true
            },
            passConfirm:{
	            required:true,
	            equalTo: "#pass"
            }
        }
    });

	$("#form").submit(signup);	
});

function signup(){
	
}