<?php 
		include("db.php");
    if(!isset($_COOKIE["email"])){
        header("location:login.php");
    }
   else{
	    $email=$_COOKIE["email"];
	    if(!isset($_GET["id"])){
		   header("location:search.php");
		}
        else{ 
		     if(empty($_REQUEST["msg"])){
			       header("location:profile.php");
			}
			else{
				$to_code="";
				$id=mysqli_real_escape_string($conn,$_REQUEST["id"]);
				$to_code=$id;
				
				$sn=0;
				$rs=mysqli_query($conn,"select MAX(sn) from inbox");
				if($r=mysqli_fetch_array($rs)){
					 $sn=$r[0];
				}
				$sn++;
				$msg_code="";
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
					$msg_code=$msg_code.$a[$b[$i]];
				}
				$msg_code=$msg_code."_".$sn;
				
				
				$from_code="";
				$dr=mysqli_query($conn,"select code from cse_record where email='$email'");
				if($rd=mysqli_fetch_array($dr)){
					$from_code=$rd[0];
				}
				$to_email="";
				$dr=mysqli_query($conn,"select email from cse_record where code='$id'");
				if($rd=mysqli_fetch_array($dr)){
					$to_email=$rd[0];
				}
				
				$msg="";
				$msg=mysqli_real_escape_string($conn,$_POST["msg"]);
				$dt="";
				$dt=date("d-m-y");
				mysqli_query($conn , "insert into inbox value($sn, '$msg_code', '$to_email', '$to_code', '$email', '$from_code', '$msg', '$dt')");
				header("location:view_profile.php?id=$id&success=1");
			}
	
		}
		
    }	
		
?>