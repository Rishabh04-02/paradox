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
      $usernameErr="";
      $emailErr="";
      if( $user) {
          
            if (preg_match("/[A-Za-z0-9]/",$_POST['name'] )) {
               $usernameErr="username must contain only letter and whitespaces only";
            }
      }
      
      if($inst){
            if (!filter_var($inst, FILTER_VALIDATE_EMAIL)) {
              $emailErr = "Invalid email format";
            }
       }

    	$pwd=md5(mysqli_real_escape_string($con,$_POST["pwd1"]));
    	$result=mysqli_query($con,"SELECT * FROM information where username='$user'");
    	if(mysqli_num_rows($result)>0)
    	{   
    		echo "Username not available." ;
		  }
		else
		{   
 			      mysqli_query($con, "INSERT INTO information VALUES('$user', '$phone','$pwd','0')");
            $uid=mysqli_query($con,"SELECT * FROM information WHERE username='$user'");
            $out=mysqli_fetch_array($uid);
            if($out)
            {
              $_SESSION['user']=$out['username'];
              header("Location:paradox.php");
          	}
          	else
          	{
          		echo "Failed";
          	}
    	}
    }
?>