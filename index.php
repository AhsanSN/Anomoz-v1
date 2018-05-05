<?
include_once('global.php');

if ($logged==1)
{
    ?>
            <script type="text/javascript">
            window.location = "home.php";
            </script>
            <?php
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<!--
New Event
http://www.templatemo.com/tm-486-new-event
-->
<title>Anomoz</title>
<meta name="description" content="">
<meta name="author" content="">
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<link rel="stylesheet" href="home/css/bootstrap.min.css">
<link rel="stylesheet" href="home/css/animate.css">
<link rel="stylesheet" href="home/css/font-awesome.min.css">
<link rel="stylesheet" href="home/css/owl.theme.css">
<link rel="stylesheet" href="home/css/owl.carousel.css">

<!-- Main css -->
<link rel="stylesheet" href="home/css/style.css">

<!-- Google Font -->
<link href='https://fonts.googleapis.com/css?family=Poppins:400,500,600' rel='stylesheet' type='text/css'>

</head>
<body data-spy="scroll" data-offset="50" data-target=".navbar-collapse">

<!-- =========================
     PRE LOADER       
============================== -->
<div class="preloader">

	<div class="sk-rotating-plane"></div>

</div>


<!-- =========================
     NAVIGATION LINKS     
============================== -->
<div class="navbar navbar-fixed-top custom-navbar" role="navigation">
	<div class="container">

		<!-- navbar header -->
		<div class="navbar-header">
			<button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon icon-bar"></span>
				<span class="icon icon-bar"></span>
				<span class="icon icon-bar"></span>
			</button>
			<a href="#" class="navbar-brand">Anomoz</a>
		</div>

		<div class="collapse navbar-collapse">

			<ul class="nav navbar-nav navbar-right">
				<li><a href="login.php" class="smoothScroll">Login</a></li>
				<li><a href="signin.php" class="smoothScroll">Signup</a></li>
				<li><a href="about.php" class="smoothScroll">About</a></li>
				<li><a href="contact.php" class="smoothScroll">Contact</a></li>
				
			</ul>

		</div>

	</div>
</div>


<!-- =========================
    INTRO SECTION   
============================== -->
<section id="intro" class="parallax-section">
	<div class="container">
		<div class="row">

			<div class="col-md-12 col-sm-12">
				
				<h1 data-wow-delay="1.6s">Anomoz.</h1>
				<h3 data-wow-delay="0.9s">A place where you let people chat with you anonymously.</h3>
				<a href="login.php" class="btn btn-lg btn-danger " data-wow-delay="2.3s">Login</a>
				<a href="signin.php" class="btn btn-lg btn-danger " data-wow-delay="2.3s">Signup</a>
					
			</div>
			

		</div>
		<br>
                    <h5  href="signin.php" data-wow-delay="0.9s">
					    Get app on Google Playstore, 
					    <a  href="https://play.google.com/store/apps/details?id=com.wAnomoz_6603002" data-wow-delay="0.9s">here.</a>
					</h5>
	</div>

</section>




<!-- =========================
    FOOTER SECTION   
============================== -->
<footer>
	<div class="container">
		<div class="row">

			<div class="col-md-12 col-sm-12">
				<p class="wow fadeInUp" data-wow-delay="0.6s">Copyright &copy; 2018 Anomoz. Designed by GreyBulb. 
                
				

			</div>
			
		</div>
	</div>
</footer>




<!-- =========================
     SCRIPTS   
============================== -->
<script src="home/js/jquery.js"></script>
<script src="home/js/bootstrap.min.js"></script>
<script src="home/js/jquery.parallax.js"></script>
<script src="home/js/owl.carousel.min.js"></script>
<script src="home/js/smoothscroll.js"></script>
<script src="home/js/wow.min.js"></script>
<script src="home/js/custom.js"></script>

</body>
</html>