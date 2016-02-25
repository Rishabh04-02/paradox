<?php
	$con=mysqli_connect("localhost","root","","paradox");
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
    $result=mysqli_query($con,"SELECT * from information where username='$user'");
    $out=mysqli_fetch_array($result);
    $level=$out['level']+1;
?>
<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">
  <link rel="stylesheet" href="../css/paradox.css">
  <title><?php echo $user; ?></title>
  <script type="text/javascript">
    function validate()
    {
      }
    }
  </script>
  </head>
  <body>
  <div id="wrap">
    <div id="regbar">
      <div id="navthing">
        <div class="pwdchange">
          <a href="pwdchange.php"><button id="button">Change Password</button></a>
        </div>
        <h2 id="hd">PARADOX</h2>
        <!------Morse Code-( .... -..- - --. ....- --. ...- -.- --- -... ...)---->
        <div class="logout">
          <a href="logout.php"><button id="button">LOG OUT</button></a>
        </div>
      </div>
    </div>
  </div>
  <div class="questionbox">

    <img src="<?php echo $level; ?>.png" height="300px" width="550px"/>
  </div>
  <div class="ansbox">
    <form action="submitres.php" method="post" name="paradox" onsubmit="return(validate());">
      <input type="text" placeholder="    Your Answer Here" name="ans" id="txtfield"><br/>
      <input type="submit" value="SUBMIT" id="button" class="but">
    </form>
  </div>
  </body>
  </html>
