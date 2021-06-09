<?php 
    ob_start();
    include("db.php");
   if(!isset($_COOKIE["email"])){
        header("location:login.php?err=1");
    }
else{
       $email = mysqli_real_escape_string ($conn,$_COOKIE["email"]);
	  if(empty($_POST["cp"]) || empty($_POST["np"]) || empty($_POST["rp"])){
		    header("location:change_password.php?error=1");
	    }
	    else{
			$cp = mysqli_real_escape_string ($conn,$_POST["cp"]);
			$np = mysqli_real_escape_string ($conn,$_POST["np"]);
			$rp = mysqli_real_escape_string ($conn,$_POST["rp"]);
	        $rs = mysqli_query($conn,"select * from cse_record where email='$email'");
			if($r = mysqli_fetch_array($rs)){
			    if($r["password"]==$cp){
					if($np == $rp){
						if(mysqli_query($conn , " update cse_record set password='$np' where email='$email'")>0){
							header("location:change_password.php?success=1");
						}
						else{
							header("location:change_password.php?error=1");
						}					 
					}
					else{
						header("location:change_password.php?missmatch");
					}	
			    }
				else{
				    header("location:change_password.php?invalid_cp");
		        }
		    }
		    else{
				header("location:logout.php");
			}
        } 
    }	
?>