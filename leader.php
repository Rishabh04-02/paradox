<?php

  $con=mysqli_connect("localhost","uname","password","dbname");
	
	if (!$con)
 	 {
 		 die('Could not connect: ' . mysqli_error());
  		echo "could not connect";
  	}
  	session_start();
  	$user=$_SESSION['user'];
  	$result=mysqli_query($con,"SELECT username,level,flag from information order by level desc ");
  	$checkwin=mysqli_query($con,"SELECT * from information where username='$user'");
    $checkwinarr=mysqli_fetch_array($checkwin);
    $checkwinresult=$checkwinarr['flag'];

  	
?>
<!DOCTYPE html>
<html>

<head>
  <link rel="icon" type="image/png" href="title.png">
  <title>Leaderboard - Paradox</title>
  
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
        <script src="js/register.min.js"></script>

        <script src="js/index2.js"></script>
        <link rel="stylesheet" href="css/reset2.css">
<link rel="stylesheet" href="css/style2.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/social-icons.css" type="text/css" media="screen" />
</head>
<body>

    
<div class="container1">
  <div class="card"></div>
  <div class="card">
     <div class="pen1-title">
     <ul>
    <a href="paradox.php">
     <div id="button1" align="center">
        <span>Return Back</span>
      </div></a>
      <a href="logout.php">
       <div id="button1" align="center">
        <span>Logout</span>
      </div>
      </a>
       </ul>
  </div><br/>
    <h1 class="title">Paradox Leaderboard</h1>

     
        <table>
         <tr>
        <td><h1>Rank</h1></td>
        <td><h1>Username</h1></td>
        <td><h1>Level</h1></td>
      </tr>
      </table>

      
      
      <div class="container2">
<table>
      <?php
    $i=0;
      while($out=mysqli_fetch_array($result))
      {
        $i++;
        $n=$out['username'];
        $l=$out['level'];
        if($out['flag']==1){
        	$l="completed";
        }

       	
        ?>
        <tr>
        <td><?php echo $i;?></td>
        <td><?php echo $n;?></td>
        <td><?php echo $l;?></td>
        </tr>
        <?php

      }
      ?>
      </table>
      </div>    
  </div>
</div>

       <div id="icn" align="center">
<ul>
  <li><a href="https://www.facebook.com/teamexe/" target="_blank"><img src="img/fb.png"></a> 
  <a href="paradox.php"><img src="img/bw.gif"></a> <a target="_blank" href="https://www.youtube.com/channel/UCTIpvLaM1G-uUsthgCDauKw">
  <img src="img/yt.png"></a></li>
</ul>
</div>
        <?php
        include("leadcounter.php");
        ?>
  </body>
</html>
