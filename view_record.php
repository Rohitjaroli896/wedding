<?php 
    include("db.php");
   if(!isset($_COOKIE["email"])){
         header("location:login.php");
   }
   else{
	   $email=$_COOKIE["email"];
	   
?> 




<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Marital an Wedding Category Flat Bootstarp Resposive Website Template | Profile :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Marital Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap-3.1.1.min.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href='//fonts.googleapis.com/css?family=Oswald:300,400,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Ubuntu:300,400,500,700' rel='stylesheet' type='text/css'>
<!----font-Awesome----->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!----font-Awesome----->
<script>
$(document).ready(function(){
    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
            $(this).toggleClass('open');       
        }
    );
});
</script>
</head>
<body>
<!-- ============================  Navigation Start =========================== -->
 <div class="navbar navbar-inverse-blue navbar">
    <!--<div class="navbar navbar-inverse-blue navbar-fixed-top">-->
      <div class="navbar-inner navbar-inner_1">
        <div class="container">
           <div class="navigation">
             <nav id="colorNav">
			   <ul>
				<li class="green">
					<a href="#" class="icon-home"></a>
					<ul>
						<li><a href="login.php">Login</a></li>
					    <li><a href="signup.php">Register</a></li>
					    <li><a href="logout.html">Logout</a></li>
					</ul>
				</li>
			   </ul>
             </nav>
           </div>
           <a class="brand" href="index.html"><img src="images/logo.png" alt="logo"></a>
           <div class="pull-right">
          	<nav class="navbar nav_bottom" role="navigation">
 
		 <!-- Brand and toggle get grouped for better mobile display -->
		  <div class="navbar-header nav_2">
		      <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">Menu
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="#"></a>
		   </div> 
		   <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
		        <ul class="nav navbar-nav nav_1">
		            <li><a href="inbox.php">Inbox</a></li>
		            <li><a href="profile.php">Profile</a></li>
	                <li><a href="change_password.php">Change password</a></li>
		    		<li><a href="edit_profile.php">Edit Profile</a></li>
		    		<li><a href="search.php">Search</a></li>
		        </ul>
		     </div><!-- /.navbar-collapse -->
		    </nav>
		   </div> <!-- end pull-right -->
          <div class="clearfix"> </div>
        </div> <!-- end container -->
      </div> <!-- end navbar-inner -->
    </div> <!-- end navbar-inverse-blue -->
<!-- ============================  Navigation End ============================ -->
<div class="grid_3">
  <div class="container">
   <div class="breadcrumb1">
      <ul>
        <a href="index.html"><i class="fa fa-home home_1"></i></a>
        <span class="divider">&nbsp;|&nbsp;</span>
        <li class="current-page">Profile</li>
      </ul>
   </div>
  <div class="col-md-9 profile_left1">
  	
	<?php
	    if(empty($_REQUEST["gender"]) || empty($_REQUEST["religion"]) || empty($_REQUEST["caste"])){
		    header("location:search.php?empty=1");
			/*echo $_REQUEST["gender"];
			echo $_REQUEST["religion"];
			echo $_REQUEST["age"];*/
	   }
	    else{
			   $gender = mysqli_real_escape_string ($conn,$_REQUEST["gender"]);
			   $religion = mysqli_real_escape_string ($conn,$_REQUEST["religion"]);
			   $caste = mysqli_real_escape_string ($conn,$_REQUEST["caste"]);
			   $id=0;
			   $n=2;
			   $rt=mysqli_query($conn,"select count(*) from cse_record where gender='$gender' AND religion='$religion' AND caste='$caste'");
			   $count=0;
			   if($tr=mysqli_fetch_array($rt)){
				   $count=$tr[0];
				   
			    }
			      $total_pages = ceil($count/$n);
				if(isset($_GET["id"])){
					$id=intval($_GET["id"]); 
				}
				$start=$id*$n;
				$next=$id+1;
				$pre=$id-1;
				$rs=mysqli_query($conn,"select * from cse_record where gender='$gender' AND religion='$religion' AND caste='$caste' 
				                 AND email<>'$email' limit $start,$n");
				while($r=mysqli_fetch_array($rs)){	
		
			
				
	?>
	
	
	
	
    <div class="profile_top"><a href="view_profile.php">
      <h2>254879</h2>
	    <div class="col-sm-3 profile_left-top">
	    	<img src="photo/<?=$r["code"]?>.jpg" class="img-responsive" alt=""/>
	    </div>
	    <div class="col-sm-3">
	      
	    </div>
	    <div class="col-sm-6">
	    	<table class="table_working_hours">
	        	<tbody>
	        		<tr class="opened_1">
								<td class="day_label">First Name:</td>
								<td class="day_value"><?= $r["fname"]?></td>
							</tr>

							<tr class="opened">
								<td class="day_label">Gender: </td>
								<td class="day_value"><?= $r["gender"]?></td>
							</tr>
							<tr class="opened">
								<td class="day_label">DOB: </td>
								<td class="day_value"><?= $r["date"]."-".$r["month"]."-".$r["year"]?></td>
							</tr>
							<tr class="opened">
								<td class="day_label">Religion: </td>
								<td class="day_value"><?= $r["religion"]?></td>
							</tr>
							
							<tr class="opened">
								<td class="day_label">Caste:</td>
								<td class="day_value"><?= $r["caste"]?></td>
							</tr>
			    </tbody>
		   </table>
		   <div class="buttons">
			   <a  href="view_profile.php?id=<?=$r["code"]?>"><div class="vertical">View profile</div></a>
		   </div>
	    </div>
	    <div class="clearfix"> </div>
    </a></div>
	
	<?php 
			}
			 
	?>
	<?php
	    if($id>0){
	?>
		<a style="color:blue ; text-decoration:none" href="view_record.php?id=<?=($pre)?>&gender=<?=$gender?>&religion=<?=$religion?>
		        &caste=<?=$caste?>"><button class="btn btn-danger">previous</button></a>
	<?php
		}
	?>
	<?php
	    if($total_pages>$id){
	?>
		<a style="color:green ; text-decoration:none" href="view_record.php?id=<?=($next)?>&gender=<?=$gender?>&religion=<?=$religion?>
		         &caste=<?=$caste?>"><button class="btn btn-danger" style="float:right">Next</button></a>
	<?php
		}
	?>
	<?php
		   
	}
	?>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	</div>
    
<div class="col-md-3 match_right">
	<div class="profile_search1">
	   <form>
		  <input type="text" class="m_1" name="ne" size="30" required="" placeholder="Enter Profile ID :">
		  <input type="submit" value="Go">
	   </form>
   </div>
   <section class="slider">
	 <h3>Happy Marriage</h3>
	 <div class="flexslider">
		<ul class="slides">
		  <li>
			<img src="images/s2.jpg" alt=""/>
			<h4>Lorem & Ipsum</h4>
			<p>It is a long established fact that a reader will be distracted by the readable</p>
		  </li>
		  <li>
			<img src="images/s1.jpg" alt=""/>
			<h4>Lorem & Ipsum</h4>
			<p>It is a long established fact that a reader will be distracted by the readable</p>
		  </li>
		  <li>
			<img src="images/s3.jpg" alt=""/>
			<h4>Lorem & Ipsum</h4>
			<p>It is a long established fact that a reader will be distracted by the readable</p>
		  </li>
	    </ul>
	  </div>
   </section>
   <div class="view_profile view_profile2">
        	<h3>View Similar Profiles</h3>
        	<ul class="profile_item">
        	  <a href="#">
        	   <li class="profile_item-img">
        	   	  <img src="images/p5.jpg" class="img-responsive" alt=""/>
        	   </li>
        	   <li class="profile_item-desc">
        	   	  <h4>2458741</h4>
        	   	  <p>29 Yrs, 5Ft 5in Christian</p>
        	   	  <h5>View Full Profile</h5>
        	   </li>
        	   <div class="clearfix"> </div>
        	  </a>
           </ul>
           <ul class="profile_item">
        	  <a href="#">
        	   <li class="profile_item-img">
        	   	  <img src="images/p6.jpg" class="img-responsive" alt=""/>
        	   </li>
        	   <li class="profile_item-desc">
        	   	  <h4>2458741</h4>
        	   	  <p>29 Yrs, 5Ft 5in Christian</p>
        	   	  <h5>View Full Profile</h5>
        	   </li>
        	   <div class="clearfix"> </div>
        	  </a>
           </ul>
           <ul class="profile_item">
        	  <a href="#">
        	   <li class="profile_item-img">
        	   	  <img src="images/p7.jpg" class="img-responsive" alt=""/>
        	   </li>
        	   <li class="profile_item-desc">
        	   	  <h4>2458741</h4>
        	   	  <p>29 Yrs, 5Ft 5in Christian</p>
        	   	  <h5>View Full Profile</h5>
        	   </li>
        	   <div class="clearfix"> </div>
        	  </a>
           </ul>
           <ul class="profile_item">
        	  <a href="#">
        	   <li class="profile_item-img">
        	   	  <img src="images/p8.jpg" class="img-responsive" alt=""/>
        	   </li>
        	   <li class="profile_item-desc">
        	   	  <h4>2458741</h4>
        	   	  <p>29 Yrs, 5Ft 5in Christian</p>
        	   	  <h5>View Full Profile</h5>
        	   </li>
        	   <div class="clearfix"> </div>
        	  </a>
           </ul>
       </div>
     </div>
     <div class="clearfix"> </div>
  </div>
</div>
<div class="map">
	<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3150859.767904157!2d-96.62081048651531!3d39.536794757966845!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1408111832978"> </iframe>
</div>
<div class="footer">
    	<div class="container">
    		<div class="col-md-4 col_2">
    			<h4>About Us</h4>
    			<p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris."</p>
    		</div>
    		<div class="col-md-2 col_2">
    			<h4>Help & Support</h4>
    			<ul class="footer_links">
    				<li><a href="#">24x7 Live help</a></li>
    				<li><a href="contact.html">Contact us</a></li>
    				<li><a href="#">Feedback</a></li>
    				<li><a href="faq.html">FAQs</a></li>
    			</ul>
    		</div>
    		<div class="col-md-2 col_2">
    			<h4>Quick Links</h4>
    			<ul class="footer_links">
    				<li><a href="privacy.html">Privacy Policy</a></li>
    				<li><a href="terms.html">Terms and Conditions</a></li>
    				<li><a href="services.html">Services</a></li>
    			</ul>
    		</div>
    		<div class="col-md-2 col_2">
    			<h4>Social</h4>
    			<ul class="footer_social">
				  <li><a href="#"><i class="fa fa-facebook fa1"> </i></a></li>
				  <li><a href="#"><i class="fa fa-twitter fa1"> </i></a></li>
				  <li><a href="#"><i class="fa fa-google-plus fa1"> </i></a></li>
				  <li><a href="#"><i class="fa fa-youtube fa1"> </i></a></li>
			    </ul>
    		</div>
    		<div class="clearfix"> </div>
    		<div class="copy">
		      <p>Copyright © 2015 Marital . All Rights Reserved  | Design by <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
	        </div>
    	</div>
</div>
<!-- FlexSlider -->
<link href="css/flexslider.css" rel='stylesheet' type='text/css' />
  <script defer src="js/jquery.flexslider.js"></script>
  <script type="text/javascript">
	$(function(){
	  SyntaxHighlighter.all();
	});
	$(window).load(function(){
	  $('.flexslider').flexslider({
		animation: "slide",
		start: function(slider){
		  $('body').removeClass('loading');
		}
	  });
	});
  </script>
<!-- FlexSlider -->
</body>
</html>	
<?php 
   }
?>