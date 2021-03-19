<?php
	session_start();
	include("connection.php");


	if(!isset($_POST["user_id"]) || !isset($_POST["key"])){
		echo "<div class='alert alert-danger'>Please click on the reset link provided in your email. </div>";
		exit();
	}

	$user_id  = filter_var($_POST["user_id"], FILTER_SANITIZE_STRING);
	$user_id = mysqli_real_escape_string($conn , $user_id);
	$key = filter_var($_POST['key'], FILTER_SANITIZE_STRING);
	$key = mysqli_real_escape_string($conn, $key);
	$time = time() - (24*60*60); 


	$sql = "SELECT * FROM `forgotpassword` WHERE `user_id` = '$user_id' AND `rkey` = '$key' AND `time` > '$time' AND `status` = 'pending' ";
	

	// $sql = "UPDATE `users` SET `activation`='activated' WHERE `email` = '$email' AND `activation` = '$key' ;
	$result = mysqli_query($conn,$sql ) or die(mysqli_error());
	if(!$result){
		echo "<div class='alert alert-danger'>Error Occur. </div>";
		exit();
	}
	$cnt = mysqli_num_rows($result);
	if($cnt != 1){
		echo "<div class='alert alert-danger'>Please Try again.</div>";
		exit();
	}
	$differentpassword = "<p><strong>Passwords don't match!</strong></p>";
	$error = '';
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
	$password = hash('sha256',$password);

	$sql = "UPDATE `users` SET `password`='$password' WHERE `user_id` = '$user_id'";
	$result = mysqli_query($conn , $sql);
	if(!$result){
		echo "<div class='alert alert-danger'>Their is an error in Storing New Password. Try Again Later.</div>";
		exit();
	}
	$sql = "UPDATE `forgotpassword` SET `status`='used' WHERE `user_id` = '$user_id' AND `rkey` = '$key'";
	$result = mysqli_query($conn , $sql);

	if(!$result){
		echo "<div class='alert alert-danger'>ERROR !!</div>";
		exit();
	}else{
		echo "<div class='alert alert-success'>Your Password has been reset successfull!! <a href='http://localhost/Online%20Notes%20app/index.php'>Login</a></div>";
	}



?> 