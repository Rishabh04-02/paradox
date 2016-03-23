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
    	header("Location:index.php");
    }
    if(!isset($_POST['user']))
    {
      header("Location:index.php");
    }
     else
    {
    	$user=$_POST["user"];
    	$pwd=md5(mysql_real_escape_string($_POST["password"]));
    	$result=mysqli_query($con,"SELECT * FROM information where username='$user' and password='$pwd'");
      if(mysqli_num_rows($result)>0)
      {
        $_SESSION['user']=$user;
        $out=mysqli_fetch_array($result);
        $level=$out['level'];
        header("Location:paradox.php");
      }
    	else
    	{   
    		?>
       <html>
       <head>
         <title>Paradox</title>

         
       </head>
       <body>
     
              <div id="bg_mask">
                <div id="front_layer">
                  <p id="text">Wrong Email or Password</p>
                  <a href="index.php"><input type="button" value="OK" id="but"/></a>
                </div>
              </div>
       </body>
       </html>
       <?php
		  }
	  }
?>