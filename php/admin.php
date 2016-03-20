<!DOCTYPE html>
<html>
<head>
  <title>Admin panel</title>
</head>
<body>
<form action="admin.php" method="post">
  Level no. -
  <input name="no"  type="text" title="Enter the level no" /><br/>
  photo name -
  <input name="photo"  type="text" title="Enter the photo name" /><br/>
  Answer -
  <input name="ans" type="text" title="Enter the ans" /><br/>
  <p><input type="submit" value="Submit" /></p>
</form>
</body>
</html>


<?php
	$con=mysqli_connect("localhost","root","hey","paradox");
	if (!$con)
 	 {
 		 die('Could not connect: ' . mysqli_error());
  		echo "could not connect";
  	}
  	
    else
		{       $photo=md5(mysql_real_escape_string($_POST["photo"]));
            $ans=md5(mysql_real_escape_string($_POST["ans"]));
            $a=$_POST["no"];
            echo "$a<br>$photo<br>$ans";
 			      mysqli_query($con, "INSERT INTO questions VALUES('$a','$photo', '$ans')");
            
    }
?>