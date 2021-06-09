<?php 
    include("db.php");
   if(empty($_POST["fname"]) || empty($_POST["lname"])    || empty($_POST["email"])|| empty($_POST["pass"]) || empty($_POST["gender"]) || 
      empty($_POST["caste"]) || empty($_POST["religion"]) || empty($_POST["date"]) || empty($_POST["month"]) || empty($_POST["year"]) || empty($_POST["city"]) || empty($_POST["state"]) || 
      empty($_POST["country"]) || empty($_POST["occu"]) || empty($_POST["age"])){
	     header("location:signup.php?error=1");
    }
   else{
	   $fname=$_POST["fname"];
	   $lname=$_POST["lname"];
	   $email=$_POST["email"];
	   $pass=$_POST["pass"];
	   $gender=$_POST["gender"];
	   $cast=$_POST["caste"];
	   $religion=$_POST["religion"];
	   $date=$_POST["date"];
	   $month=$_POST["month"];
	   $year=$_POST["year"];
	   $city=$_POST["city"];
	   $state=$_POST["state"];
	   $country=$_POST["country"];
	   $occu=$_POST["occu"];
	   $age=$_POST["age"];
	   $sn=0;
		$rs=mysqli_query($conn,"select MAX(sn) from cet");
		if($r=mysqli_fetch_array($rs)){
	         $sn=$r[0];
		}
		$sn++;
		$code="";
		$a=array();
					
		for($i='A' ; $i<='Z' ; $i++){
			array_push($a,$i);
			if($i=='Z')
				break;
			}		
			for($i='a' ; $i<='z' ; $i++){
				array_push($a,$i);
				if($i=='z')
					break;
			}		
			for($i=0 ; $i<=9 ; $i++){
				array_push($a,$i);
						
			}		
			$b=array_rand($a,6);
			for($i=0 ; $i<sizeof($b); $i++){
			    $code=$code.$a[$b[$i]];
			}
			$code=$code."_".$sn;
			

			$target = "photo/";  
			$target = $target . $code.".jpg";  // ecb/sdfksdf73655jh.jpg
			//$pic=($_FILES['photo']['name']);
			//$size=(($_FILES['photo']['size'])/1024)/1024;
			if(move_uploaded_file($_FILES['photo']['tmp_name'], $target)){ 	
				 if(mysqli_query($conn , "insert into cse_record values
					('$fname', '$lname', '$email', '$pass', '$gender', '$cast', '$religion', '$date', '$month', '$year', '$city', '$state', 
					 '$country', '$occu', '$age', '$code', '$sn')")>0){
					   header("location:signup.php?success=1");
				 }
				else{
					  header("location:signup.php?err=1");
					}
			}
			else{
				header("location:signup.php?img_error=1");
			}
    }
?>