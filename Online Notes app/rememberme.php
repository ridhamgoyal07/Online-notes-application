<?php
	// if the user is not loged in and remember me cookie exits
	if(!isset($_SESSION['user_id']) && !empty($_COOKIE['rememberme'])){
		// or we use array_key_exists("user_id" , $_SESSION)
		// f1 : cookie: $a .",". bin2hex($b)
		// f2 : hash('sha256','$a') 
		// extract authenticator 1 & 2 from cookie
		list($authenticator1, $authenticator2) = explode(",", $_COOKIE['rememberme']);
		// $authenticator 2 is in hexa so we have to convert it into binary
		$authenticator2 = hex2bin($authenticator2);
		$f2authenticator2 = hash('sha256' , $authenticator2);

		// Look for the authenticator 1 in remeberme table
		$sql = "SELECT * FROM `rememberme` WHERE `authenticator1` = '$authenticator1'";
		$result = mysqli_query($conn , $sql);
		if(!$result){
			echo "<div class='alert alert-danger'>Error Occur</div>";
			exit();
		}
		$cnt = mysqli_num_rows($result);
		if($cnt !== 1){
			echo "<div class='alert alert-danger'>Remember Me process failed!!</div>";
			exit();
		}
		$row  = mysqli_fetch_assoc($result);
		//if authenticator 2 doesnot match

		if(!hash_equals($row['f2authenticator2'] , $f2authenticator2)){
			echo "<div class='alert alert-danger'>hash return false !!</div>";
		}else{
			//generate new authenticator 
			// store them in a cookie and remember me table 
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
			} 

			$_SESSION['user_id'] = $row['user_id'];
			header("Location: mainpageloggedin.php");
		}

	} 
	

?>