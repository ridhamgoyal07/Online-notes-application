<?php
	session_start();
	include('connection.php');
	$user_id = $_SESSION['user_id'];
	$currentemail = $_SESSION['email'];
	$error = '';
	$alreadyregisteredemail = "<div class='alert alert-danger'>This email is already registered with other user. Try some other email address</div>";

	$newemail = filter_var($_POST['updateemaildata'],FILTER_SANITIZE_STRING);
	$newemail = mysqli_real_escape_string($conn , $newemail);

	$sql = "SELECT * FROM `users` WHERE email = '$newemail' ";
	$result = mysqli_query($conn,$sql) or die(mysqli_error());
	$cnt = mysqli_num_rows($result);
	if($cnt){
		$error .= $alreadyregisteredemail;
		echo $error;
		exit();
	}
	$activationkey = bin2hex(openssl_random_pseudo_bytes(16));

	$sql = "UPDATE `users` SET  `activation2`='$activationkey'  WHERE `user_id` = '$user_id'";
	$result = mysqli_query($conn , $sql);
	if(!$result){
		echo "<div class='alert alert-danger'>Their is an error in Storing New Email address. Try Again Later.</div>";
		exit();
	}

	$message = "Please click on the link to change your email address: \n\n"; 
	$message .= "Current email: " .$currentemail."\n";
	$message .= "New Email: ".$newemail."\n\n";
	$message .= "Click the link below \n";
	$message .= "http://localhost/Online%20Notes%20app/activatenewemail.php?currentemail=". urlencode($currentemail) ."&newemail=".urlencode($newemail)."&key=$activationkey";
	if(mail($currentemail, "Confirm you new email address ", $message ,"From: ridhamgoyalrg@gmail.com")){
	
		echo "<div class='alert alert-success'>A confirmation for new email has been send to ".$currentemail. ". Please click to reactivate your account.  </div>";
		// echo "<script>window.alert('Changing email addrss');</script>";
	}


?>