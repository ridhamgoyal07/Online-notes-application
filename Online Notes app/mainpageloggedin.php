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
	<title>My Notes</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width = device - width , initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link rel="stylesheet" href="styling.css">
	<link href="https://fonts.googleapis.com/css?family=Arvo" rel = "stylesheet" type="text/css">
	<style>
		.noteheader{
			border:1px solid grey;
			border-radius: 15px;
			margin-bottom: 25px;
			cursor: pointer;
			padding: 0px 10px;
			background: linear-gradient(#FFFFFF, #ECEAE7);
			padding-bottom: 5px;

		}
		.text{
			font-size: 20px;
			overflow: hidden;
			white-space: nowrap;
			text-overflow: ellipsis;
		}
		.timetext{
			overflow: hidden;
			white-space: nowrap;
			text-overflow: ellipsis;
		}
	
		.delete{
			display:none;
		}
	</style>

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
						<a class="nav-link" href="profilepage.php">Profile</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Help</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Contact Us</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" href="mainpageloggedin.php">My Notes</a>
					</li>

				</ul>
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link " href ="#" >Logged in as <span class="font-weight-bold"><?php echo $username; ?></span></a>
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
		 

		<div class="row d-flex justify-content-between">
			<div class="col-sm-12 offset-md-2 col-md-8">
				<!--Alert Message-->
				<div id="alert" class="alert alert-danger collapse">
					<a class="close" type="button" data-dismiss="alert" >
						&times;
					</a>
					<p id="alertcontent"></p>
				</div>
				<!-- <div class="d-flex justify-content-between"> -->
				<div class="mb-3 buttons">
					<button type="button" class='btn btn-info btn-lg' id="addnotes">Add Notes</button>	
					<button type="button" class="btn btn-info btn-lg float-right mt-0" id='edit'> Edit</button>
					<button type="button" class="btn btn-success btn-lg float-right d-none " id='done'> Done</button>
					<button type="button" class="btn btn-info btn-lg d-none " id='allnotes'> All Notes</button>
				</div>
				<div id="notepad">
					<textarea rows="7" ></textarea>
				</div>
				<div id="notes" class="notes mt-3">
					
				</div>

			</div>
		</div>
	</div>


	<!--Footer-->
	<div class="footer mt-5  ">
		<div class="container-fluid">
			<p class="text-center my-0 p-1">Developed by: Ridham Goyal. &copy 2016 - <?php echo date('Y')?></p>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script type="text/javascript" src="mainpage.js"></script>
</body>
</html>