<?php
	session_start();
	include("connection.php");

	$id = $_POST['id'];
	$content = $_POST['notes'];
	// get the id of the note send through  ajax
	$time = time();
	//get the content of the note
	// $sql = "UPDATE `notes` SET `content`='$content', 'time'='$time' WHERE `id`='$id'";
	$sql = "UPDATE `notes` SET `content`='$content',`time`='$time' WHERE `id` = '$id'";
	// get the time 
	$result = mysqli_query($conn , $sql);
	
	if(!$result){
		echo "error";
		exit();
	}
	// run query to update the note
	

?>