<?php
	session_start();
	include("connection.php");

	// get the id of the note send through  ajax
	$id = $_POST['id'];

	$sql = "DELETE FROM `notes` WHERE `id` = '$id'";

	// run query to delete the note through ajax call
	$result = mysqli_query($conn , $sql);
	if(!$result){
		echo 'error';
		exit();
	}

?>