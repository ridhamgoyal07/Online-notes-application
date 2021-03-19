<?php
	session_start();
	include("connection.php");

	$email  = filter_var($_POST["forgetemail"], FILTER_SANITIZE_STRING);
	$email = mysqli_real_escape_string($conn , $email);

	$sql = "SELECT * FROM `users` WHERE email = '$email' ";
	$result = mysqli_query($conn,$sql) or die(mysqli_error());
	$cnt = mysqli_num_rows($result);
	if(!$cnt){
		echo "<div class='alert alert-danger'>Email does not exist in database </div>";
		exit();
	}
	$row = mysqli_fetch_assoc($result);
	$user_id = $row["user_id"];
	$key = bin2hex(openssl_random_pseudo_bytes(16));
	$time = time();
	$status = "pending";
	$sql = "INSERT INTO `forgotpassword`( `user_id`, `rkey`, `time`, `status`) VALUES ('$user_id' , '$key' , '$time' , '$status')";

	$result = mysqli_query($conn,$sql);
	if(!$result){
		echo "<div class='alert alert-danger'>Error in Insering the user detail.</div>";
		exit();
	}
	$message = "Please click on the link to reset your password: \n\n"; 
	$message .= "http://localhost/Online%20Notes%20app/resetpassword.php?user_id=$user_id&key=$key";

	if(mail($email, "Reset password ", $message ,"From: ridhamgoyalrg@gmail.com")){
	
		echo "<div class='alert alert-success'>A Reset password link  has been send to ".$email. ".Please click the link to reset your password .  </div>";
		
	}


?>