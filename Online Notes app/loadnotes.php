<?php
	session_start();
	include("connection.php");

	// get the user id
	$user_id = $_SESSION['user_id'];

	// echo "<script>window.alert($user_id)</script>";

	// run a query to delete emptynotes
	$sql = "DELETE FROM `notes` WHERE `content`=''";
	$result = mysqli_query($conn,$sql);
	if(!$result){
		echo "<div class='alert alert-danger'>Some Error Occur</div>";
		exit();
	}
	// run a query to look for notes corresponding to user_id
	$sql = "SELECT * from `notes` WHERE `user_id` = '$user_id' ORDER BY `time` DESC";
	$result = mysqli_query($conn,$sql);
	if(!$result){
		echo "<div class='alert alert-danger'>Some Error in loading notes </div>";
		exit();
	}else{
		if(mysqli_num_rows($result)>0){
			while($rs = mysqli_fetch_assoc($result)){
				$note_id = $rs['id'];
				echo "
					<div class='note container'>
						<div class='row'>
							<div class='col-4 col-md-2 delete'>
								<button class='btn btn-md btn-danger'>Delete</botton>
							</div>
							<div class='noteheader col-12' id='$note_id'>
								<div class='text'>".$rs['content']."</div>
								<div class='timetext'><small>".date('M d, Y h:i:s A' , $rs['time'])."</small></div>	
							</div>
							
						</div>
					</div>
				";
			}

		}else{
			echo "<div class='alert alert-warning'>You have not created any notes yet!!</div>";
			exit();
		}
	}

	// show notes or alert message
	// echo "<div class='noteheader' id='$note_id'>
	// 					<div class='text'>helli</div>
	// 					<div class='timetext'><small>egh</small></div>	
	// 		</div>";	
	

?>