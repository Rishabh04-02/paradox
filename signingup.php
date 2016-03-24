<?php
	$con=mysqli_connect("localhost","root","hey","paradox");
	if (!$con)
 	 {
 		 die('Could not connect: ' . mysqli_error());
  		echo "could not connect";
  	}
  	session_start();
    if($_POST==NULL)
    {
    	header("Location:index.php");
    }
    else
    {
    	$user=$_POST["user"];
    	$inst=$_POST["inst"];
      $phone=$_POST["phn"];
    	$pwd=md5(mysqli_real_escape_string($con,$_POST["pwd1"]));
    	$result=mysqli_query($con,"SELECT * FROM information where username='$user'");
    	$x=mysqli_fetch_array($result);
      if(mysqli_num_rows($result)>0)
    	{ 
            $_SESSION['sessvar']="username not available";
              echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';
		  }
		else
		{   
 			      mysqli_query($con, "INSERT INTO information VALUES('$user', '$phone','$pwd','0')");
            $uid=mysqli_query($con,"SELECT * FROM information WHERE username='$user'");
            $out=mysqli_fetch_array($uid);
            if($out)
            {
              $_SESSION['user']=$out['username'];
              $_SESSION['sessvar']="Registered successfully. Log in to continue";
              echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';
          	}
          	else
          	{
          		echo "Failed";
          	}
    	}
    }
?>