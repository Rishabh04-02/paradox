<?php
	$con=mysqli_connect("localhost","root","strongpassword","paradox");
	if (!$con)
 	 {
 		 die('Could not connect: ' . mysqli_error());
  		echo "could not connect";
  	}
  	session_start();
  	if(!isset($_SESSION['user']))
  	{
  		header("Location:index.php");
  	}
  	$user=$_SESSION['user'];
    $result=mysqli_query($con,"SELECT * from information where username='$user'");
    $out=mysqli_fetch_array($result);
    $level=$out['level']+1;
    $imgsrc = mysqli_query($con, "SELECT * FROM questions where level='$level'")
?>

<!DOCTYPE  html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Paradox - <?php echo $user;  ?></title>
		
		<!-- CSS -->
		<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="css/social-icons.css" type="text/css" media="screen" />
		
		<script type="text/javascript" src="js/jquery-1.5.1.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui-1.8.13.custom.min.js"></script>
		<script type="text/javascript" src="js/easing.js"></script>
		<script type="text/javascript" src="js/jquery.scrollTo-1.4.2-min.js"></script>
		<script type="text/javascript" src="js/jquery.cycle.all.js"></script>
		<script type="text/javascript" src="js/custom.js"></script>
		
		<!-- Isotope -->
		<script src="js/jquery.isotope.min.js"></script>
				
		
		<!-- Nivo slider -->
		<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
		<script src="js/nivo-slider/jquery.nivo.slider.js" type="text/javascript"></script>
		<!-- ENDS Nivo slider -->
		
		<!-- tabs -->
		<link rel="stylesheet" href="css/tabs.css" type="text/css" media="screen" />
		<script type="text/javascript" src="js/tabs.js"></script>
  		<!-- ENDS tabs -->
  		
  		<!-- prettyPhoto -->
		<script type="text/javascript" src="js/prettyPhoto/js/jquery.prettyPhoto.js"></script>
		<link rel="stylesheet" href="js/prettyPhoto/css/prettyPhoto.css" type="text/css" media="screen" />
		<!-- ENDS prettyPhoto -->
		
		<!-- superfish -->
		<link rel="stylesheet" media="screen" href="css/superfish.css" /> 
		<link rel="stylesheet" media="screen" href="css/superfish-left.css" /> 
		<script type="text/javascript" src="js/superfish-1.4.8/js/hoverIntent.js"></script>
		<script type="text/javascript" src="js/superfish-1.4.8/js/superfish.js"></script>
		<script type="text/javascript" src="js/superfish-1.4.8/js/supersubs.js"></script>
		<!-- ENDS superfish -->
		
		<!-- poshytip -->
		<link rel="stylesheet" href="js/poshytip-1.0/src/tip-twitter/tip-twitter.css" type="text/css" />
		<link rel="stylesheet" href="js/poshytip-1.0/src/tip-yellowsimple/tip-yellowsimple.css" type="text/css" />
		<script type="text/javascript" src="js/poshytip-1.0/src/jquery.poshytip.min.js"></script>
		<!-- ENDS poshytip -->
		
		
		
		

	</head>
	
	<body class="home">

			<!-- Menu -->
			<div id="menu">
			
			
			<!-- ENDS menu-holder -->
				<div id="menu-holder">
					<!-- wrapper-menu -->
					<div class="wrapper">
						<!-- Navigation -->
						<ul id="nav" class="sf-menu">
            <li><a href="">Paradox</a></li>
							<li class="current-menu-item"><a href="">Welcome <?php echo $user; ?></a></li>
							<li><a href="logout.php">Logout</a></li>
						</ul>
						<!-- Navigation -->
					</div>
					<!-- wrapper-menu -->
				</div>
				<!-- ENDS menu-holder -->
			</div>
			<!-- ENDS Menu -->
			<!-- MAIN -->
			<div id="main">
				<!-- wrapper-main -->
				<div class="wrapper">
					
					<!-- headline -->
					<div class="clear"></div>
					<div id="headline">
          <h1><b>Level <?php echo "$level";?></b></h1>
						<img src="<?php echo $imgsrc; ?>" height="300px" width="750px"  />
						<br/>
            <div id="form">
						<form action="submitres.php" method="post" name="paradox" onsubmit="return(validate());">
      <input type="text" placeholder="Your Answer Here" name="ans" id="txtfield"><br/>
      <input type="submit" value="SUBMIT" id="button" class="but">
    </form>
    </div>
					</div>
					<!-- ENDS headline -->
					
					
				</div>
				<!-- ENDS wrapper-main -->
			</div>
			<!-- ENDS MAIN -->
      <!-- Bottom -->
			<div id="bottom">
				<!-- wrapper-bottom -->
				<div class="wrapper">

					<div id="bottom-text">2011 Nova all rights reserved. <a href="http://www.luiszuno.com"> Luiszuno.com</a> 
					</div>
					<!-- Social -->
					<ul class="social ">
						<li><a href="http://www.facebook.com" class="poshytip  facebook" title="Become a fan"></a></li>
						<li><a href="http://www.twitter.com" class="poshytip twitter" title="Follow our tweets"></a></li>
						<li><a href="http://www.dribbble.com" class="poshytip dribbble" title="View our work"></a></li>
						<li><a href="http://www.addthis.com" class="poshytip addthis" title="Tell everybody"></a></li>
						<li><a href="http://www.vimeo.com" class="poshytip vimeo" title="View our videos"></a></li>
						<li><a href="http://www.youtube.com" class="poshytip youtube" title="View our videos"></a></li>
					</ul>
					<!-- ENDS Social -->
					
				</div>
				<!-- ENDS wrapper-bottom -->
			</div>
			<!-- ENDS Bottom -->
	
	</body>
</html>