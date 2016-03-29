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
    $imgsrc = mysqli_query($con, "SELECT question FROM questions where ind='$level'");
    $img=mysqli_fetch_array($imgsrc);
    $imgloc=$img['question'];
    $answer=$_POST['ans'];
  	$result1=mysqli_query($con,"SELECT answer from questions where ind='$level'");
  	$out1=mysqli_fetch_array($result1);
  	$anss=$out1['answer'];
  	$maxques=mysqli_query($con,"SELECT max(ind) from questions");
  	$maxx=mysqli_fetch_array($maxques);
  	$anss=strtolower($anss);
  	$answer=strtolower($answer);

  
  	$check=0;
  	$checkwin=mysqli_query($con,"SELECT * from information where username='$user'");
    $checkwinarr=mysqli_fetch_array($checkwin);
    $checkwinresult=$checkwinarr['flag'];

      		if($checkwinresult==1){
      			header("Location:end.php");
      		}else if (strcmp($anss, $answer)==0 && $level==$maxx[0]) {
  			$var="";

  			mysqli_query($con,"update information set level='$level' where username='$user'");
  			mysqli_query($con,"update information set flag=1 where username='$user'");
  			header("Location:end.php");
  			}
  	else if (strcmp($anss, $answer)==0){
  			mysqli_query($con,"UPDATE information set level='$level' where username='$user'");
  			$level++;
  			$var="";
  			
  			//header("Location:paradox.php");
  	}	
  	else{


  			if($answer!="")
  				$var="Wrong answer, Please try again!";
  	}

?>

<!DOCTYPE  html>
<html>
	<head>
		<?php session_start();?>
		<meta charset="utf-8">
		<title>Paradox - <?php echo $user;  ?></title>
		<link rel="icon" type="image/png" href="title.png">
           <meta name="description" content="Paradox is an online event by Team .EXE which is the technical team of Computer 
      Science & Engineering Department at NIT Hamirpur">
        <meta name="keywords" content="paradox, paradox nith, paradox team .exe, paradox nimbus,  paradox nimbus 2016,
        team .exe, exe, NITH , nit hamirpur, CSED, CSED NITH, team exe, paradox, web-o-magica, nimbus nith
        nimbus 2016, nimbus 2k16, nit hamirpur, nith">
        <meta name="author" content="Team .EXE">
        <meta property="og:title" content="Paradox - Team .EXE">
        <meta property="og:image" content="http://teamexe.in/images/logo.png">
        <meta property="og:description" content="Paradox is an online event by Team .EXE which is the technical
         team of Computer 
      Science & Engineering Department at NIT Hamirpur">
        <meta name="format-detection" content="+91 8091261118, +91 9805539219, +91 9805126955">
		
		<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="css/style2.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="css/social-icons.css" type="text/css" media="screen" />
		<script type="text/javascript" src="js/jquery-1.5.1.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui-1.8.13.custom.min.js"></script>
		<script type="text/javascript" src="js/easing.js"></script>
		<script type="text/javascript" src="js/jquery.scrollTo-1.4.2-min.js"></script>
		<script type="text/javascript" src="js/jquery.cycle.all.js"></script>
		<script type="text/javascript" src="js/custom.js"></script>
		<script src="js/jquery.isotope.min.js"></script>
		<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
		<script src="js/nivo-slider/jquery.nivo.slider.js" type="text/javascript"></script>
		<link rel="stylesheet" href="css/tabs.css" type="text/css" media="screen" />
		<script type="text/javascript" src="js/tabs.js"></script>
  		<script type="text/javascript" src="js/prettyPhoto/js/jquery.prettyPhoto.js"></script>
		<link rel="stylesheet" href="js/prettyPhoto/css/prettyPhoto.css" type="text/css" media="screen" />
		<link rel="stylesheet" media="screen" href="css/superfish.css" /> 
		<link rel="stylesheet" media="screen" href="css/superfish-left.css" /> 
		<script type="text/javascript" src="js/superfish-1.4.8/js/hoverIntent.js"></script>
		<script type="text/javascript" src="js/superfish-1.4.8/js/superfish.js"></script>
		<script type="text/javascript" src="js/superfish-1.4.8/js/supersubs.js"></script>
		<link rel="stylesheet" href="js/poshytip-1.0/src/tip-twitter/tip-twitter.css" type="text/css" />
		<link rel="stylesheet" href="js/poshytip-1.0/src/tip-yellowsimple/tip-yellowsimple.css" type="text/css" />
		<script type="text/javascript" src="js/poshytip-1.0/src/jquery.poshytip.min.js"></script>
		<!-- ENDS poshytip -->
		
		<script type="text/javascript">
				function changeText()
				{
					 document.getElementById('subbutton').innerHTML = 'Fred Flinstone';
				}	
		</script>
		<script type="text/javascript">
    
   		 history.pushState(null, null, 'paradox.php');
  	  window.addEventListener('popstate', function(event) {
   			 history.pushState(null, null, 'paradox.php');
   			 });
</script>


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
						<li><img src="para1.png"></li>
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
          <ul id="end">
               <li>
          			<a>
          				<h1><?php echo $user; ?></h1>
          			</a>
          		</li>
                  
                    <li>
                    <a href="leader.php" >
                    <div id="button1" align="center">
        					<span>Leaderboard</span>
     				 </div>
      </a></li>							
							<li>
							<a href="logout.php"><div id="button1" align="center">
        <span>Logout</span>
      </div></a></li>
							
							<li>
							<a href="https://www.facebook.com/teamexe/" target="_blank"><div id="button1" align="center">
        <span>Facebook Help</span>
      </div></a></li>
							
						</ul>
						<img src="<?php echo $imgloc; ?>" width="730px"  />
						<br/>
            <div id="form">
	<form id="para" action="" method="post" name="paradox"  onsubmit="return(validate());">
      <input type="text" placeholder="Your Answer Here" name="ans" id="txtfield" required >

   		 <?php 
      	echo "<span id='invalidres' class='something-Wrong'>{$var}</span>";
       ?>
       
      <br/>
      <br>	
      <button type="submit" value="SUBMIT" id="newbut" >Submit</button>
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

					<div id="bottom-text">&copy; : All Rights Reserved  <a href="http://teamexe.in" title="Team .EXE" target="_blank"> Team .EXE </a> 
					</div>
					<!-- Social -->
					<ul class="social ">
						<li><a href="https://www.facebook.com/teamexe/" target="_blank" class="poshytip  facebook" title="Become a fan"></a></li>
            <li><a href="https://www.youtube.com/channel/UCTIpvLaM1G-uUsthgCDauKw" class="poshytip youtube" target="_blank" title="View our videos"></a></li>
					</ul>
					<!-- ENDS Social -->
					<div id="to-top" class="poshytip" title="To top"></div>
				</div>
				<!-- ENDS wrapper-bottom -->
			</div>
			<!-- ENDS Bottom -->
	            <?php
				include("profilecounter.php");
				?>
	</body>
</html>
