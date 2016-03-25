<?php

  $con=mysqli_connect("localhost","root","strongpassword","paradox");
	
	if (!$con)
 	 {
 		 die('Could not connect: ' . mysqli_error());
  		echo "could not connect";
  	}
  	$result=mysqli_query($con,"SELECT username,level from information order by level desc ");
  	
?>
<!DOCTYPE html>
<html>

<head>
  <title>Leaderboard - Paradox</title>
</head>
<body>
<link rel="stylesheet" href="css/reset2.css">
<link rel="stylesheet" href="css/style2.css">
<link rel="stylesheet" href="css/style.css">
    <script src="js/register.min.js"></script>

        <script src="js/index2.js"></script>
<link rel="stylesheet" href="css/social-icons.css" type="text/css" media="screen" />
     <div class="pen1-title">
     <ul>
       <li><a href="paradox.php"><button>Return back</button></a></li>
       </ul>
  </div>
<div class="container1">
  <div class="card"></div>
  <div class="card">
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
  </body>
</html>
