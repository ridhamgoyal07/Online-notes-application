<?php
	session_start();
	include("connection.php");
	//get user_id
	$user_id = $_SESSION["user_id"];

	// echo "<script>window.alert(".$user_id.")</script>";
	// get username
	$username = $_POST["updateusernamedata"];
	$username = filter_var($username, FILTER_SANITIZE_STRING);
	$username = mysqli_real_escape_string($conn , $username);

	$sql = "SELECT * FROM `users` WHERE username = '$username' ";
	$result = mysqli_query($conn,$sql) or die(mysqli_error());
	$cnt = mysqli_num_rows($result);
	if($cnt){
		echo "error";
		exit();
	}

	//run query
	$sql = "UPDATE `users` SET `username`= '$username'  WHERE `user_id`= '$user_id'";
	$result = mysqli_query($conn , $sql);
	if(!$result){
		echo "<div class='alert alert-danger'>Their was error in updating and storing new username</div>";
		exit();
	}else{
		$_SESSION['username'] = $username;
		echo "success";
	}


?>