$(document).ready(function() {
	$('#logo').click(function(){
		window.location = "index.php";
	});
	$('#forgotForm').validate({ 
        rules: {
            email: {
	            required:true,
	            email:true
            }
        }
    });	
    $("#forgotForm").submit(recover);
});

function recover(){

	if($("#forgotForm").valid()){
		var email = $('#email').val();
		console.log(email);
	}
}
