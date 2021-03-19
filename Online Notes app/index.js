// Ajax call for sign up form once the form is submit
$("#signupform").submit(function(event){
	// prevent default php processing
	event.preventDefault(); 
	// collect user inputs 
	var datatopost =  $(this).serializeArray();
	// console.log(datatopost);
	// $.ajax({}); for both success as well as failure
	// $.post({}).done(); if all is successful
	// $.post({}).fail(); if some failure occure

	$.ajax({
		url:"signup.php",
		type: "POST",
		data : datatopost,
		success: function(data){ // sending data to sign.up using ajax
			if(data){
				$("#signupmessage").html(data); // printing message if successfull
			}
		},
		error: function(){ // if some error occured
				
			$("#signupmessage").html("<div class='alert alert-danger'>There Was an error with the ajax call. Please try again later.</div>");
		},
	});

}); 


// Ajax call for login form once the form is submit
$("#loginform").submit(function(event){
	// prevent default php processing
	event.preventDefault(); 
	// collect user inputs 
	var datatopost =  $(this).serializeArray();
	// console.log(datatopost);
	// $.ajax({}); for both success as well as failure
	// $.post({}).done(); if all is successful
	// $.post({}).fail(); if some failure occure

	$.ajax({
		url:"login.php",
		type: "POST",
		data : datatopost,
		success: function(data){ // sending data to sign.up using ajax
			if(data == "success"){
				window.location.href = "http://localhost/Online%20Notes%20app/mainpageloggedin.php";
			}
			else{
				$("#loginmessage").addClass('d-block');
				$("#loginmessage").html(data); // printing message if successfull
			}
		},
		error: function(){ // if some error occured
			$("#loginmessage").addClass('d-block');
			$("#loginmessage").html("<div class='alert alert-danger'>There Was an error with the ajax call. Please try again later.</div>");
		},
	});

}); 


// Ajax call for forgot password form once the form is submit
$("#forgetform").submit(function(event){
	// prevent default php processing
	event.preventDefault(); 
	// collect user inputs 
	var datatopost =  $(this).serializeArray();
	console.log(datatopost);
	// $.ajax({}); for both success as well as failure
	// $.post({}).done(); if all is successful
	// $.post({}).fail(); if some failure occure

	$.ajax({
		url:"forgotpassword.php",
		type: "POST",
		data : datatopost,
		success: function(data){ // sending data to sign.up using ajax
			$("#forgetmessage").addClass("d-block");
			$("#forgetmessage").html(data);
		},
		error: function(){ // if some error occured
			$("#forgetmessage").addClass("d-block");
			$("#forgetmessage").html("<div class='alert alert-danger'>There Was an error with the ajax call. Please try again later.</div>");
		},
	});

}); 