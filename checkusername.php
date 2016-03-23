<?php
	$con=mysqli_connect("localhost","root","strongpassword","paradox");
	if (!$con)
 	 {
 		 die('Could not connect: ' . mysqli_error());
  		echo "could not connect";
  	}
    	$user=mysqli_real_escape_string($con,$_POST["user1"]);
    	$result=mysqli_query($con,"SELECT * FROM information where username='$user'");
    	if(mysqli_num_rows($result)>0)
    	{
    		echo 0;  
		  }
		  else
		  {
        echo 1;
      }
?>