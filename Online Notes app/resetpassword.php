<?php
	session_start();
	include("connection.php");
	// if email and activaton key is missing show error message 
?>

<!doctype html>
<html>
<head>
	<title>Reset password</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width = device - width , initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<style>
		h1{
			font-size: 48px;
			color:purple;
		}
		.message{
			border: 2px solid  #7c73f6 ;
			margin-top: 50px;
			border-radius: 25px;
		}
	</style>
	<link href="https://fonts.googleapis.com/css?family=Arvo" rel = "stylesheet" type="text/css">
</head>
<body>
	<div class="container mt-5">
		<div class="row">
			<div class="offset-sm-1 col-sm-10 offset-md-0 col-md-12 message">
				<h1 class="p-2">Reset password</h1>
				<div id="resultmessage" class="d-none"></div>
				<?php
					if(!isset($_GET["user_id"]) || !isset($_GET["key"])){
						echo "<div class='alert alert-danger'>Please click on the reset link provided in your email. </div>";
						exit();
					}
					$user_id  = filter_var($_GET["user_id"], FILTER_SANITIZE_STRING);
					$user_id = mysqli_real_escape_string($conn , $user_id);
					$key = filter_var($_GET['key'], FILTER_SANITIZE_STRING);
					$key = mysqli_real_escape_string($conn, $key);
					$time = time() - (24*60*60); 

					$sql = "SELECT * FROM `forgotpassword` WHERE `user_id` = '$user_id' AND `rkey` = '$key' AND `time` > '$time' AND `status` = 'pending'";
					

					// $sql = "UPDATE `users` SET `activation`='activated' WHERE `email` = '$email' AND `activation` = '$key' ;
					$result = mysqli_query($conn,$sql ) or die(mysqli_error());
					if(!$result){
						echo "<div class='alert alert-danger'>Error Occur. </div>";
						exit();
					}
					$cnt = mysqli_num_rows($result);
					if($cnt !== 1){
						echo "<div class='alert alert-danger'>Please Try again.</div>";
						exit();
					}

					echo '
						<form method="post" id="passwordreset">
							<input type="hidden" name="key" value='.$key.'>
							<input type="hidden" name="user_id" value='.$user_id.'>
							<div class="form-group">
								<label for="password"><b>Enter your New Password</b></label>
								<input type="password" name="password" id="password" class="form-control" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters" required>
							</div>
							<div class="form-group">
								<label for="confirmpassword"><b>Re-Enter Your New Password</b></label>
								<input type="password" name="confirmpassword" id="confirmpassword" class="form-control" placeholder="Confirm Password" required>
							</div>
							<div class="form-group">
								<input type="submit" name="reset_password" id="reset_password" class="btn btn-success " value="Reset Password">
							</div>

						</form>
					';
					
				?>
			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script type="text/javascript" src="index.js"></script>

	<!--Ajax call for storeresetpassword.php which process form data-->
	<script>
		$("#passwordreset").submit(function(event){
			// prevent default php processing
			event.preventDefault(); 
			// collect user inputs 
			var datatopost =  $(this).serializeArray();
			console.log(datatopost);
			// $.ajax({}); for both success as well as failure
			// $.post({}).done(); if all is successful
			// $.post({}).fail(); if some failure occure

			$.ajax({
				url:"storeresetpassword.php",
				type: "POST",
				data : datatopost,
				success: function(data){ // sending data to sign.up using ajax
					$("#resultmessage").addClass("d-block");
					$("#resultmessage").html(data);
				},
				error: function(){ // if some error occured
					$("#resultmessage").addClass("d-block");
					$("#resultmessage").html("<div class='alert alert-danger'>There Was an error with the ajax call. Please try again later.</div>");
				},
			});

		}); 

	</script>
	
	
</body>
</html>