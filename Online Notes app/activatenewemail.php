<?php
	session_start();
	include("connection.php");
	// if email and activaton key is missing show error message 
?>

<!doctype html>
<html>
<head>
	<title>Activation</title>
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
				<h1 class="p-2">Account Activation</h1>
				<?php
					if(!isset($_GET["currentemail"]) || !isset($_GET["key"]) || !isset($_GET["newemail"])){
						echo "<div class='alert alert-danger'>Please click on the activation provided in your email. </div>";
						exit();
					}
					$currentemail  = filter_var($_GET["currentemail"], FILTER_SANITIZE_STRING);
					$currentemail = mysqli_real_escape_string($conn , $currentemail);
					$newemail  = filter_var($_GET["newemail"], FILTER_SANITIZE_STRING);
					$newemail = mysqli_real_escape_string($conn , $newemail);
					$key = filter_var($_GET['key'], FILTER_SANITIZE_STRING);
					$key = mysqli_real_escape_string($conn, $key);
					

					// $sql = "UPDATE `users` SET `activation`='activated' WHERE (email = '$email' AND 'activation' = '$key') LIMIT 1";
					$result = mysqli_query($conn, "UPDATE `users` SET `activation`='activated' , `email` = '$newemail' WHERE `email` = '$currentemail' AND `activation2` = '$key' ") or die(mysqli_error());
					
					if(mysqli_affected_rows($conn) == '1'){
						echo "<div class='col-8 alert alert-success'>Your new email is registered successfully..</div>";
						echo "<a href='http://localhost/Online%20Notes%20app/index.php?logout=1' class='btn btn-success btn-md m-3'>Login In</a>";
					}else{
						echo "<div class='alert alert-danger'>Your account could not been activated. Try again later.</div>";
					}
				?>
			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<script type="text/javascript" src="index.js"></script>
	
	
</body>
</html>