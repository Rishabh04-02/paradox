<?php
	$con=mysqli_connect("localhost","root","hey","paradox");
	if (!$con)
 	 {
 		 die('Could not connect: ' . mysqli_error());
  		echo "could not connect";
  	}
  	session_start();
  	if(!isset($_SESSION['user']))
  	{
  		header("Location:index.php");
  	}
  	$user=$_SESSION['user'];
  	$result=mysqli_query($con,"SELECT * FROM information where username='$user'");
  	$out=mysqli_fetch_array($result);
  	$level=$out['level']+1;
  	$answer=$_POST['answ'];
  	$result1=mysqli_query($con,"SELECT ans from questions where ind='$level'");
  	$out1=mysqli_fetch_array($result1);
  	$anss=$out1['ans'];
    echo "<br>Your answer - $anss<br>";
    if($level==23)
    {
      if(strcasecmp($answer,$user)==0)
      {
        header("Location:end.php");
      }
      else
      {
        ?>
       <html>
       <head>
         <title><?php echo $user; ?></title>
         <link rel="icon" type="image/png" href="title.png">
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
       <body onload="javascript:func()">
              <div id="bg_mask">
                <div id="front_layer">
                  <p id="text">This is Wrong Answer</p>
                  <a href="paradox.php"><input type="button" value="Try again" id="but"/></a>
                </div>
              </div>
       </body>
       </html>
       <?php
      }
    }
    else
    {
  	if(strcasecmp($anss,$answer)==0)
  	{
  		mysqli_query($con,"UPDATE information set level='$level' where username='$user'");
  		header("Location:paradox.php");
  	}
  	else
  	{  
    		?>
       <html>
       <head>
         <title><?php echo $user; ?></title>
         
       </head>
       <body onload="javascript:func()">
              <div id="bg_mask">
                <div id="front_layer">
                  <p id="text">This answer is wrong</p>
                  <a href="paradox.php"><input type="button" value="Try Again" id="but"/></a>
                </div>
              </div>
       </body>
       </html>
       <?php
		  }
    }
?>