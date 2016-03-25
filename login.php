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
         
         <link rel="icon" type="image/png" href="title.png">
      <title>Paradox</title>
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