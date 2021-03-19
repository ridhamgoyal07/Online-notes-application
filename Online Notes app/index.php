<?php
	session_start();
	include("connection.php");
	include("logout.php");
	include("rememberme.php");
?>
<!doctype html>
<html>
<head>
	<title>Online Notes</title>
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
						<a class="nav-link" href="#">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Help</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Contact Us</a>
					</li>

				</ul>
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link " href ="#" data-toggle='modal' data-target='#loginmodal'>Login</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	
	<!--Jumbotron with Sign up button-->
	<div class="jumbotron text-center bg-transparent" id="myContainer ">
		<h1 class="display-3 font-weight-bold ">Online Notes App</h1>
		<h3 >Your notes with you wherever you go</h3>
		<h3 >Easy to use, Protect your notes</h3>
		<a class="btn btn-success btn-lg mt-4" data-toggle="modal" data-target="#signupmodal">Sign up-It's free</a> 
	</div>


	<!--Sign up form-->
	<form method="post" id="signupform">
		<div class="modal fade" id = "signupmodal" data-backdrop="static" data-keyboard="false" tabindex='-1' role="dialog" aria-labelledby='signmodallabel' aria-hidden="True"> 
			<div class="modal-dialog modal-dialog-scrollable">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id='signmodalabel'>Sign up today and start using our Online notes app</h5>
						<button class="close" data-dismiss='modal' type='button' aria-label='Close'>
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<!--Sign up message-->
						<div  id ='signupmessage'>
						
						</div>

						<div class='form-group'>
							<label for="username" class="sr-only">Username</label>
							<input type="text" class="form-control" placeholder="Username" name="username" id="username" required >
						</div>
						<div class='form-group'>
							<label for="email" class="sr-only">Email Address</label>
							<input type="email" class="form-control" placeholder="Email" name="email" id="email" required>
						</div>
						<div class='form-group'>
							<label for="password" class="sr-only">Password</label>
							<input type="password" name="password" id="password" class="form-control" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters" required>
							<small class="text-muted">Must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters</small>
						</div>
						<div class='form-group'>
							<label for="confirmpassword" class="sr-only">Confirm Password</label>
							<input type="password" name="confirmpassword" id="confirmpassword" class="form-control" placeholder="Confirm Password" required>
						</div>
					</div>
					
					<div class="modal-footer">
						<button type="submit" class="btn btn-success" id="signup" name="SignUp"> Sign up</button>
						<button type = 'button' class="btn btn-secondary" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
	</form>

	<!--Login Password-->
	<form method="post" id="loginform">
		<div class="modal fade" id = "loginmodal" data-backdrop="static" data-keyboard="false" tabindex='-1' role="dialog" aria-labelledby='loginformlabel' aria-hidden="True"> 
			<div class="modal-dialog modal-dialog-scrollable">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id='loginformlabel'>Login:</h5>
						<button class="close" data-dismiss='modal' type='button' aria-label='Close'>
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<!--Sign up message-->
						<div class="d-none" id ='loginmessage'>

						</div>
						<div class='form-group'>
							<label for="loginemail" class="sr-only">Email</label>
							<input type="text" class="form-control" placeholder="Email" name="loginemail" id="loginemail" required >
						</div>
						<div class='form-group'>
							<label for="loginpassword" class="sr-only">Password</label>
							<input type="password" name="loginpassword" id="loginpassword" class="form-control" placeholder="Password" required>
						</div>
						<div class="d-flex justify-content-start">
							<label>
								<input type="checkbox" name='remember' id='remember' class="form-group"> Remember Me
							</label>
								<a href=# class="ml-auto" data-dismiss='modal'  data-toggle='modal' data-target='#forgetmodal'>Forget Password?</a> 
						</div>
					</div>
					
					<div class="modal-footer">
						<button type="button" class="mr-auto btn btn-outline-dark" id ='register' name='register'>Register</button> 
						<button type="submit" class="btn btn-success" id="Login" name="Login"> Login</button>
						<button type = 'button' class="btn btn-secondary" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
	</form>
	<!--Forget Password form -->
	<form method="post" id="forgetform">
		<div class="modal fade" id = "forgetmodal" data-backdrop="static" data-keyboard="false" tabindex='-1' role="dialog" aria-labelledby='forgetformlabel' aria-hidden="True"> 
			<div class="modal-dialog modal-dialog-scrollable">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id='forgetformlabel'>Forget Password? Enter your Email</h5>
						<button class="close" data-dismiss='modal' type='button' aria-label='Close'>
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<!--Sign up message-->
						<div class= 'd-none' id ='forgetmessage'>
						</div>
						<div class='form-group'>
							<label for="forgetemail" class="sr-only">Email</label>
							<input type="email" class="form-control" placeholder="Email" name="forgetemail" id="forgetemail" required>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="mr-auto btn btn-outline-dark" id ='register' name='register'>Register</button> 
						<button type="submit" class="btn btn-success" id="forget" name="forget"> Submit</button>
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
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
	<script type="text/javascript" src="index.js"></script>
	
	
</body>
</html>