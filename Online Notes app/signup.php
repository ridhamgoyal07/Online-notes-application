<?php
	// start session
	session_start();
	// connect with database
	// $conn = mysqli_connect('localhost','root','123', 'online_notes_app') or die(mysqli_erroe());
	include("connection.php");
	//define error messages
	$differentpassword = "<p><strong>Passwords don't match!</strong></p>";
	// assigning form values to variables
	$error = '';

	$username = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
	$username = mysqli_real_escape_string($conn , $username);
	$email  = filter_var($_POST["email"], FILTER_SANITIZE_STRING);
	$email = mysqli_real_escape_string($conn , $email);
	$password = filter_var($_POST["password"] , FILTER_SANITIZE_STRING);
	$password = mysqli_real_escape_string($conn , $password);
	$confirmpassword = filter_var($_POST["confirmpassword"] , FILTER_SANITIZE_STRING);
	$confirmpassword = mysqli_real_escape_string($conn , $confirmpassword);

	if ($password !== $confirmpassword){
		$error .= $differentpassword;
	}
	if($error){
		$resultMessage = "<div class='alert alert-danger'>". $error . "</div>";
		echo $resultMessage;
		exit();
	}
	// preg_match("/[A-Z]/", $_POST['password']); for checking the password contain atleast 1 capital letter. 

	//check if username already exist
	// $password = md5($password); // it produce 32 characters
	$password = hash('sha256' ,$password); 
	$sql = "SELECT * FROM `users` WHERE username = '$username' ";
	$result = mysqli_query($conn,$sql) or die(mysqli_error());
	$cnt = mysqli_num_rows($result);
	if($cnt){
		echo "<div class='alert alert-danger'>This username already registered. Do you want to login</div>";
		exit();
	}
	//check if email already exist
	$sql = "SELECT * FROM `users` WHERE email = '$email' ";
	$result = mysqli_query($conn,$sql) or die(mysqli_error());
	$cnt = mysqli_num_rows($result);
	if($cnt){
		echo "<div class='alert alert-danger'>This email already registered. Do you want to login</div>";
		exit();
	}
	// Create unique activation code
	$activationkey = bin2hex(openssl_random_pseudo_bytes(16)); //create powerful randon code of defined length in our it is 16 byte long code;
	//converting binary to hexadecimal 
	// 16 bytes = 128 bits
	// (2*2*2*2) * (2*2*2*2) .....(2*2*2*2) //128  times 2 multipy // group are 32 of pair of 4 2's
	// 32 characters

	// insering complete record 
	$sql = "INSERT INTO `users`( `username`, `email`, `password`, `activation`) VALUES ('$username' , '$email' , '$password' , '$activationkey' )";
	$result= mysqli_query($conn, $sql) or die(mysqli_error()); 
	if(!$result){
		echo "<div class='alert alert-danger'>Error in Insering the user detail.</div>";
		exit();
	}
	// send email to user with a link to activation.php with their email and activation code
	$message = "Please click on the link to activate your account: \n\n"; 
	$message .= "http://localhost/Online%20Notes%20app/activate.php?email=". urlencode($email) ."&key=$activationkey";
	// echo "<script>window.alert('$message')</script>";
	if(mail($email, "Confirm your Registration ", $message ,"From: ridhamgoyalrg@gmail.com")){
	
		echo "<div class='alert alert-success'>Thank for registration! A confirmation email has been send to ".$email. ".Please click to activate your account.  </div>";
		
	}

?>	