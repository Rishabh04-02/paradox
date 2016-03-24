<?php
  $con=mysqli_connect("localhost","root","hey","paradox");
  if (!$con)
   {
     die('Could not connect: ' . mysqli_error());
      echo "could not connect";
    }


    session_start();
    if($_SESSION['sessvar']!="")
        $sessvar=$_SESSION['sessvar'];
      
     session_destroy();
     session_start();

    if($_POST==NULL)
    {
      $var="";
   
    }
    if(!isset($_POST['user']))
    {
      $var="";
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
        $var="Wrong 'Username' or 'Password'";
      }
    }
?>
<!DOCTYPE html>

<html >
  <head>
    <meta charset="UTF-8">
    <title>Paradox</title>


    <link rel="stylesheet" href="css/reset2.css">

    

        <link rel="stylesheet" href="css/style2.css">
        <script type="text/javascript">
      function validate()
      {
        if(document.login.user.value=="")
        {
          alert("Please enter your username.");
          document.login.user.focus();
          return false;
        }
        if(document.login.password.value=="")
        {
          alert("Please enter the password.");
          document.login.password.focus();
          return false;
        }
      }
  </script>

  <script type="text/javascript">
    function validatereg()
      {
        if(document.signup.pwd1.value!=document.signup.pwd2.value)
        {
         // alert("The Passwords entered did not match");
          document.getElementById('invalidreturn').innerHTML="Passwords do not match";
          document.signup.pwd2.focus();
          return false;
        }
      }

    </script>
  </head>

  <body>


<!-- Mixins-->
<!-- Pen Title-->
<div class="pen-title">
  <h1>Paradox</h1>
  <h2><?php echo $sessvar; ?></h2>
</div>
<div class="container">
  <div class="card"></div>
  <div class="card">
    <h1 class="title">Login</h1>
    <form action="" name="login" method="post" onsubmit="return(validate());">
      <div class="input-container">
        <input type="text" id="Username" name="user" required="required"/>
        <label for="Username">Username</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="password" id="Password" name="password" required="required"/>
        <label for="Password">Password</label>
        <div class="bar"></div>

      </div>
        <div class="something-Wrong">
          
            <span><?php echo "<p>{$var}</p>"; ?></span>
          
        </div>

      <div class="button-container" title="Register">
      
        <button type="submit"><span>Login</span></button>
      </div>
      <div class="footer"><a>Click on the pencil icon to register</a></div>
    </form>
  </div>
  <div class="card alt">
    <div class="toggle"></div>
    <h1 class="title">Register
      <div class="close"></div>
    </h1>

    <form action="signingup.php" method="post" name="signup" onsubmit="return(validatereg());">
      <div class="input-container">
        <input type="text" id="Username" name="user" oninvalid="setCustomValidity('Username can only contain characters a-z,A-Z & 0-9')" pattern="[A-Za-z0-9]{2,15}" required="required"/>
        <label for="Username">Username</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="number" id="phone" pattern="[0-9]{10,12}" name="phn" required="required"/>
        <label for="Password">Mobile no.</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="password" id="Password" pattern="[A-Za-z0-9]{5,30}" oninvalid="setCustomValidity('Password can only contain alpha numeric characters')" name="pwd1" required="required"/>
        <label for="Password">Password</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="password" id="Repeat Password" name="pwd2" required="required"/>
        <label for="Repeat Password">Repeat Password</label>
        <div class="bar"></div>
      </div>
      <div class="button-container">
        <button type="submit"><span>Register</span></button>
      </div>
    </form>
  </div>
</div>
    <script src="js/register.min.js"></script>

        <script src="js/index2.js"></script>

<div id="icn" align="center">
<br/><br/><br/><br/>
<ul>
  <li><a href="https://www.facebook.com/teamexe/" target="_blank"><img src="img/fb.png"></a> 
  <a href="leader.php"><img src="img/bw.gif" title="Leader board"></a>
   <a target="_blank" href="https://www.youtube.com/channel/UCTIpvLaM1G-uUsthgCDauKw">
  <img src="img/yt.png"></a></li>
</ul>
</div>

  </body>
</html>
