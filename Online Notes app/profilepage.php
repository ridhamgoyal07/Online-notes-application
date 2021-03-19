<?php
	session_start();
	if(!isset($_SESSION["user_id"])){
		header("Location: index.php");
	}
	include("connection.php");
	$user_id = $_SESSION['user_id'];
	$sql = "SELECT * FROM `users` WHERE `user_id` = '$user_id'";
	$result = mysqli_query($conn,$sql);
	if(!$result){
		echo "<div class='alert alert-danger'>Error in getting data of user from database</div>";
	}
	$cnt = mysqli_num_rows($result);
	if($cnt ==1){
		$arr = mysqli_fetch_assoc($result);
		$username = $arr['username'];
		$email = $arr['email'];
	}else{
		echo "<div class='alert alert-danger'>Dublicate user_id found</div>";
	}
?>

<!doctype html>
<html>
<head>
	<title>My Profile</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width = device - width , initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link rel="stylesheet" href="styling.css">
	<link href="https://fonts.googleapis.com/css?family=Arvo" rel = "stylesheet" type="text/css">
</head>
<body>
	<!--Navigation bar-->
	
	<nav class="navbar navbar-expand-md navbar-fixed-top navbar-light">
		<div class="container-fluid">
		
			<a class="navbar-brand" href="#"><b>Online Notes</b> </a>
			<button type="button" class="navbar-toggler"   data-toggle="collapse" data-target="#navbarcontent" >
				<span class="navbar-toggler-icon btn btn-lg"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarcontent">
				<ul class="navbar-nav mr-auto" id="listItem">
					<li class="nav-item ">
						<a class="nav-link active" href="#">Profile</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Help</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Contact Us</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="mainpageloggedin.php">My Notes</a>
					</li>

				</ul>
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link " href ="#" >Logged in as <span class="font-weight-bold"><?php echo $username;  ?></span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link " href ="index.php?logout=1" >Log out</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	
	<!--Container-->
	<div class="container mt-5">
		<div class="row">
			<div class="col-sm-12 offset-md-2 col-md-8">
				<!-- <div class="d-flex justify-content-between"> -->
				<h2 class="font-weight-bold">General Account Settings:</h2>
				<div class="table-responsive" >
					<table class="table table-hover table-bordered mt-3" id="profiletabel">
						<tbody>
							<tr data-toggle="modal" data-target="#updateusername">
								<td><b>Username</b></td>
								<td><?php  echo $username; ?></td>
							</tr>
							<tr data-toggle="modal" data-target="#updateemail">
								<td><b>Email</b></td>
								<td><?php echo $email;?></td>
							</tr>
							<tr data-toggle="modal" data-target="#updatepassword">
								<td><b>Password</b></td>
								<td>Hidden</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div> 
	
	<!--updateusername-->
	<form method="post" id="updateusernameform">
		<div class="modal fade" id = "updateusername" data-backdrop="static" data-keyboard="false" tabindex='-1' role="dialog" aria-labelledby='updateusernamelabel' aria-hidden="True"> 
			<div class="modal-dialog modal-dialog-scrollable">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title font-weight-bold" id='updateusernamelabel'>Edit Username:</h5>
						<button class="close" data-dismiss='modal' type='button' aria-label='Close'>
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<!--Sign up message-->
						<div class='d-none' id ='updateusernamemessage'>
						</div>
						<div class='form-group'>
							<label for="updateusernamedata" ><b>Username:</b></label>
							<input type="text" class="form-control" placeholder="Username" name="updateusernamedata" id="updateusernamedata" required>
						</div> 
					</div>
					
					<div class="modal-footer">
						<button type="submit" class="btn btn-success" id="submitupdatedusername" name="submitupdatedusername"> Submit</button>
						<button type = 'button' class="btn btn-secondary" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
	</form>

	<!--updateemail-->
	<form method="post" id="updateemailform">
		<div class="modal fade" id = "updateemail" data-backdrop="static" data-keyboard="false" tabindex='-1' role="dialog" aria-labelledby='updateemaillabel' aria-hidden="True"> 
			<div class="modal-dialog modal-dialog-scrollable">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title font-weight-bold" id='updateemaillabel'>Enter New Email:</h5>
						<button class="close" data-dismiss='modal' type='button' aria-label='Close'>
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<!--Sign up message-->
						<div class='d-none' id ='updateemailmessage'> 
						</div>
						<div class='form-group'>
							<label for="updateemaildata" ><b>Email</b></label>
							<input type="email" class="form-control" placeholder="Email" name="updateemaildata" id="updateemaildata" required>
						</div> 
					</div>
					
					<div class="modal-footer">
						<button type="submit" class="btn btn-success" id="submitupdatedemail" name="submitupdatedemail"> Submit</button>
						<button type = 'button' class="btn btn-secondary" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
	</form>

	<!--updatepassword-->
	<form method="post" id="updatepasswordform">
		<div class="modal fade" id = "updatepassword" data-backdrop="static" data-keyboard="false" tabindex='-1' role="dialog" aria-labelledby='updatepasswordlabel' aria-hidden="True"> 
			<div class="modal-dialog modal-dialog-scrollable">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title font-weight-bold" id='updatepasswordlabel'>Enter Current and New Password</h5>
						<button class="close" data-dismiss='modal' type='button' aria-label='Close'>
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<!--Sign up message-->
						<div class='alert alert-danger d-none' id ='updatepasswordmessage'>
						</div>
						<div class='form-group'>
							<label for="currentpassword" class="sr-only"><b>Current Password:</b></label>
							<input type="password" class="form-control" placeholder="Current Password" name="currentpassword" id="currentpassword" required>
						</div>
						<div class="form-group">
							<label for="newpassword" class="sr-only">New Password:</label>
							<input type="password" name="newpassword" id="newpassword" class="form-control" placeholder="New Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters" required>
							<small class="text-muted">Must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters</small>
						</div>
						<div class="form-group">
							<label for="confirmnewpassword" class="sr-only"><b>Confirm New Password:</b></label>
							<input type="password" class="form-control" placeholder="Confirm New Password" name="confirmnewpassword" id="confirmnewpassword" required>
							
						</div> 
					</div>
					
					<div class="modal-footer">
						<button type="submit" class="btn btn-success" id="submitupdatedpassword" name="submitupdatedpassword"> Submit</button>
						<button type = 'button' class="btn btn-secondary" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
	</form>


	<!--Footer-->
	<div class="footer m-0 ">
		<div class="container-fluid">
			<p class="text-center my-0 p-1">Developed by: Ridham Goyal. &copy 2016 - <?php echo date('Y')?></p>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script type="text/javascript" src="profile.js"></script>
</body>
</html>