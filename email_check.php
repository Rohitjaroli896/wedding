<?php

	ob_start();
	//session_start();
	include("db.php");
	if(empty($_POST["email"]) ||  empty($_POST["pass"]) ){
		header("location:login.php?empty=1");
	}
	else{
		$email = mysqli_real_escape_string ($conn,$_POST["email"]);
		$pass = mysqli_real_escape_string ($conn,$_POST["pass"]);
		
		$rs = mysqli_query($conn,"select * from cse_record where email='$email'");
		if($r = mysqli_fetch_array($rs)){
			if($r["password"] == $pass){
				setcookie("email",$email,time()+3600*24);
				//$_SESSION[$email]=$pass;
				header("location:profile.php");
			}
			else{
				header("location:login.php?invalid=1");
			}
		}
		else{
			header("location:login.php?invalid_email");
		}
		
	}
	
?>
			