<?php
	session_start();
	include("connection.php");

	// get the user id
	$user_id = $_SESSION['user_id'];

	// get current time 
	$time = time();
	$sql = "INSERT INTO `notes`(`user_id`, `content`, `time`) VALUES ('$user_id','','$time')";
	$result = mysqli_query($conn,$sql);
	if(!$result){
		echo 'error';
		exit();
	}else{

		// mysqli_insert_id($conn) return the auto generated id used in last query
		echo mysqli_insert_id($conn);
		
	}


	// run a query to create new note
	
	

?>