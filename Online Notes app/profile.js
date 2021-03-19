// Ajax call for update username form once the form is submit
$("#updateusernameform").submit(function(event){
	// prevent default php processing
	event.preventDefault(); 
	// collect user inputs 
	var datatopost =  $(this).serializeArray();
	// console.log(datatopost);
	// $.ajax({}); for both success as well as failure
	// $.post({}).done(); if all is successful
	// $.post({}).fail(); if some failure occure

	$.ajax({
		url:"updateusername.php",
		type: "POST",
		data : datatopost,
		success: function(data){ // sending data to updateusername.php using ajax
			// window.alert('this');
			if(data == "error"){
				$("#updateusernamemessage").addClass('d-block');
				$("#updateusernamemessage").html("<div class='alert alert-danger'>This username already registered. Try some another username</div>"); // printing message if successfull
			}else if(data == "success"){
				location.reload();
			}else if(data){
				$("#updateusernamemessage").addClass('d-block');
				$("#updateusernamemessage").html(data);
			}else{
				location.reload();
			}
			
		},
		error: function(){ // if some error occured
				
			$("#updateusernamemessage").html("<div class='alert alert-danger'>There Was an error with the ajax call. Please try again later.</div>");
		},
	});

}); 

// Ajax call for update password form once the form is submit
$("#updatepasswordform").submit(function(event){
	// prevent default php processing
	event.preventDefault(); 
	// collect user inputs 
	var datatopost =  $(this).serializeArray();

	$.ajax({
		url:"updatepassword.php",
		type: "POST",
		data : datatopost,
		success: function(data){ // sending data to updateusername.php using ajax
			// window.alert('this');
			if(data){
				$("#updatepasswordmessage").addClass('d-block');
				$("#updatepasswordmessage").html(data);
			}else{
				window.alert("Your password is changed!! Login Again with new password");
				window.location.href = "http://localhost/Online%20Notes%20app/index.php?logout=1";

				// location.reload();
			}
			
		},
		error: function(){ // if some error occured
				
			$("#updatepasswordmessage").html("<div class='alert alert-danger'>There Was an error with the ajax call. Please try again later.</div>");
		},
	});

}); 


// Ajax call for update email address  once the form is submit
$("#updateemailform").submit(function(event){
	// prevent default php processing
	event.preventDefault(); 
	// collect user inputs 
	var datatopost =  $(this).serializeArray();

	$.ajax({
		url:"updateemail.php",
		type: "POST",
		data : datatopost,
		success: function(data){ // sending data to updateusername.php using ajax
			// window.alert('this');
			if(data){
				$("#updateemailmessage").addClass('d-block');
				$("#updateemailmessage").html(data);
				
			}
			
		},
		error: function(){ // if some error occured
				
			$("#updateemailmessage").html("<div class='alert alert-danger'>There Was an error with the ajax call. Please try again later.</div>");
		},
	});

}); 