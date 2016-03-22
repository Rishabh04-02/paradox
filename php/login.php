<?php
	$con=mysqli_connect("localhost","root","strongpassword","paradox");
	if (!$con)
 	 {
 		 die('Could not connect: ' . mysqli_error());
  		echo "could not connect";
  	}
  	session_start();
    if($_POST==NULL)
    {
      $var="";
    	header("Location:index.php");
    }
    if(!isset($_POST['user']))
    {
      $var="";
      header("Location:index.php");
    }
     else
    {
    	$user=$_POST["user"];
    	$pwd=md5(mysqli_real_escape_string($con,$_POST["password"]));
    	$result=mysqli_query($con,"SELECT * FROM information where username='$user' and password='$pwd'");
      if(mysqli_num_rows($result)>0)
      {
        $_SESSION['user']=$user;
        $out=mysqli_fetch_array($result);
        $level=$out['level'];
        $var="";
        header("Location:paradox.php");
      }
    	else
    	{   
    		$var="wrong";
        header("Location:index.php");
		  }
	  }
?>