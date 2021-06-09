<?php 
       ob_start();
      include("db.php");
   if(!isset($_COOKIE["email"])){
         header("location:login.php?err=1");
   }
else{
        $email = mysqli_real_escape_string ($conn,$_COOKIE["email"]);
	  if(empty($_POST["fname"]) || empty($_POST["lname"]) || empty($_POST["gender"]) || empty($_POST["caste"]) || empty($_POST["religion"]) || 
	       empty($_POST["date"]) || empty($_POST["month"]) || empty($_POST["year"]) || empty($_POST["city"]) || empty($_POST["state"]) || 
	       empty($_POST["country"]) || empty($_POST["occu"]) || empty($_POST["age"])){
		   header("location:edit_profile.php?error=1");
	    }
	    else{
		   $fname=$_POST["fname"];
		   $lname=$_POST["lname"];
		   $gender=$_POST["gender"];
		   $caste=$_POST["caste"];
		   $religion=$_POST["religion"];
		   $date=$_POST["date"];
		   $month=$_POST["month"];
		   $year=$_POST["year"];
		   $city=$_POST["city"];
		   $state=$_POST["state"];
		   $country=$_POST["country"];
		   $occu=$_POST["occu"];
		   $age=$_POST["age"];
			if(mysqli_query($conn , " update cse_record set
				fname='$fname', lname='$lname', gender='$gender', caste='$caste', religion='$religion', date='$date', month='$month', 
				year='$year', city='$city', state='$state', country='$country', occu='$occu', age='$age' where email='$email'")>0){
				 header("location:edit_profile.php?success=1");
			}
			else{
			    header("location:edit_profile.php?err=1");
			}
		}
    } 
?>