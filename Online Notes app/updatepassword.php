<?php
	session_start();
	include("connection.php");
	$user_id = $_SESSION['user_id'];
	$error = '';
	$differentcurrentpassword = "<p>Your current password don't match with your old password</p>";
	$differentpassword = "<p>Your confirm password don't matches with new password </p>";

	$currentpassword = filter_var($_POST['currentpassword'], FILTER_SANITIZE_STRING);
	$currentpassword = mysqli_real_escape_string($conn , $currentpassword);
	$newpassword = filter_var($_POST['newpassword'], FILTER_SANITIZE_STRING);
	$newpassword = mysqli_real_escape_string($conn , $newpassword);
	$confirmnewpassword = filter_var($_POST['confirmnewpassword'], FILTER_SANITIZE_STRING);
	$confirmnewpassword = mysqli_real_escape_string($conn , $confirmnewpassword);

	if($confirmnewpassword != $newpassword){
		$error .= $differentpassword;
		echo $error;
		exit();
	}
	$currentpassword = hash('sha256',$currentpassword);
	$sql = "SELECT * FROM `users` WHERE `user_id` ='$user_id' ";
	$result = mysqli_query($conn,$sql);
	if(!$result){
		echo "<div class='alert alert-danger'>Their was error in updating and storing new password</div>";
	}else{
		$rs = mysqli_fetch_assoc($result);
		if($currentpassword != $rs['password']){
			$error .= $differentcurrentpassword;
			echo $error;
			exit();
		}
	}
	$newpassword = hash('sha256', $newpassword);
	$sql = "UPDATE `users` SET `password`='$newpassword' WHERE `user_id` = '$user_id'";
	$result = mysqli_query($conn , $sql);
	if(!$result){
		echo "<div class='alert alert-danger'>Their is an error in Storing New Password. Try Again Later.</div>";
		exit();
	}


?>