<?php
	session_start();
	include("connection.php");

	$email  = filter_var($_POST["loginemail"], FILTER_SANITIZE_STRING);
	$email = mysqli_real_escape_string($conn , $email);
	$password = filter_var($_POST["loginpassword"] , FILTER_SANITIZE_STRING);
	$password = mysqli_real_escape_string($conn , $password);
	$password = hash('sha256' ,$password);


	$sql = "SELECT * FROM `users` WHERE email = '$email' AND activation= 'activated' AND password = '$password'";
	$result = mysqli_query($conn,$sql); 
	if(!$result){
		echo "<div class='alert alert-danger'>Error in running query</div>";
		exit();
	}
	$cnt = mysqli_num_rows($result);
	if($cnt !== 1){
		echo "<div class='alert alert-danger'>Wrong Email and Password</div>";
	}
	else{
		$row  = mysqli_fetch_assoc($result);
		$_SESSION["user_id"] = $row["user_id"];
		$_SESSION["username"] = $row["username"];
		$_SESSION["email"] = $row["email"];

		if(empty($_POST["remember"])){
			// if remember me not checked
			echo "success";
		}else{
			// create two variables 
			$authenticator1 = bin2hex(openssl_random_pseudo_bytes(10));
			$authenticator2 = (openssl_random_pseudo_bytes(20));

			// store them in cookie
			function f1($a , $b){
				$c = $a . ",". bin2hex($b);
				return $c;
			}
			$cookieValue  = f1($authenticator1 , $authenticator2);
			setcookie("rememberme" , $cookieValue , time()+1296000);

			function f2($a){
				$b  = hash('sha256' , $a);
				return $b;
			}
			$f2authenticator2 = f2($authenticator2);
			$user_id = $_SESSION["user_id"];
			$expiration = date('Y-m-d H:i:s', time()+1296000 );

			// run query to store variable in  
			$sql  = "INSERT INTO `rememberme`( `authenticator1`, `f2authenticator2`, `user_id`, `expires`) VALUES ('$authenticator1' ,  '$f2authenticator2' ,'$user_id' , '$expiration' ) ";

			$result = mysqli_query($conn , $sql) or die(mysqli_error());
			if(!$result){
				echo "<div class='alert alert-danger>Error occur to remeber you for next time.</div>";
			}else{
				echo "success";
			}

		}
	}


?>