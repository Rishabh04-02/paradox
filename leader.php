<?php
  $con=mysqli_connect("localhost","root","hey","paradox");
	
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

  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/leader.css">
   </head>
  <body>
  <div id="wrap">
    <div id="regbar">
      <div id="navthing">
        <div class="pwdchange">
          <a href="index.php"><button id="button">HOME</button></a>
        </div>
        <h2 id="hd">PARADOX</h2>
      </div>
    </div>
  </div>
  <div class="questionbox">
    <table id="space">
      <tr id="tablerow">
        <td>Rank</td>
        <td>Username</td>
        <td>Level</td>
      </tr>

  	<?php
    $i=0;
  		while($out=mysqli_fetch_array($result))
  		{
        $i++;
  			$n=$out['username'];
  			$l=$out['level'];
        ?>
        <tr class="coloredtable">
        <td><?php echo $i;?></td>
        <td><?php echo $n;?></td>
        <td><?php echo $l;?></td>
        </tr>
        <?php

  		}
      ?>
      </table>
  </div>
  </body>
</html>