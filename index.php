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
        $var="wrong";
      }
    }
?>
<!DOCTYPE html>

<html >
  <head>
    <meta charset="UTF-8">
    <title>Paradox</title>


    <link rel="stylesheet" href="css/reset2.css">

<<<<<<< HEAD:php/index.php
    <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
<link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

        <link rel="stylesheet" href="css/style2.css">
        <script type="text/javascript">
=======
    <link rel="stylesheet" href="css/style.css">
  <script type="text/javascript">
>>>>>>> a81b1877a2a23e739bf285410988c407f3fa01a8:index.php
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

<<<<<<< HEAD:php/index.php
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

      <div class="button-container">
      <span><?php echo "<p>{$var}</p>"; ?></span>
        <button type="submit"><span>Go</span></button>
      </div>
      <div class="footer"><a href="#">Forgot your password?</a></div>
    </form>
  </div>
  <div class="card alt">
    <div class="toggle"></div>
    <h1 class="title">Register
      <div class="close"></div>
    </h1>

    <form action="signingup.php" method="post" name="signup" onsubmit="return(validatereg());">
      <div class="input-container">
        <input type="text" id="Username" name="user"required="required"/>
        <label for="Username">Username</label>
        <div class="bar"></div>
      </div>
     <!--  <div class="input-container">
        <input type="text" id="Username" name="user"required="required"/>
        <label for="Username">Username</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="text" id="Username" name="user"required="required"/>
        <label for="Username">Username</label>
        <div class="bar"></div>
      </div> -->


      <div class="input-container">
        <input type="password" id="Password" pattern="[A-Za-z0-9]{8,30}" oninvalid="setCustomValidity('Password can only contain alpha numeric characters')" name="pwd1" required="required"/>
        <label for="Password">Password</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="password" id="Repeat Password" name="pwd2" required="required"/>
        <label for="Repeat Password">Repeat Password</label>
        <div class="bar"></div>
=======
</head>

<body>
  <div id="wrap">
  <div id="regbar">
    <div id="navthing">
      <h2><a href="#" id="loginform">Login</a> | <a href="register.php">Register</a></h2>
      <h2 class="leaderboard"><a href="leader.php" id="leaderboard">Leaderboard</a></h2>
    <div class="login">
      <div class="arrow-up"></div>
      <div class="formholder">
        <div class="randompad">
           <fieldset>
            <form action="login.php" method="post" name="login" onsubmit="return(validate());">
             <label name="user">Username</label>
             <input type="text" pattern="[a-z]*" name="user" title="use only alphabets lowercase a-z" />
             <label name="password">Password</label>
             <input type="password" name="password" />
             <input type="submit" value="Login" />
            </form>
           </fieldset>
        </div>
>>>>>>> a81b1877a2a23e739bf285410988c407f3fa01a8:index.php
      </div>
      <div class="button-container">
        <button type="submit"><span>Next</span></button>
      </div>
    </form>
  </div>
</div>
<<<<<<< HEAD:php/index.php
<!-- Portfolio--><a id="portfolio" href="http://andytran.me/" title="View my portfolio!"><i class="fa fa-link"></i></a>
<!-- CodePen--><a id="codepen" href="http://codepen.io/andytran/" title="Follow me!"><i class="fa fa-codepen"></i></a>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="js/index2.js"></script>
=======
<div class="image">
  <img src="this.jpg" width="600px">
  <div>
>>>>>>> a81b1877a2a23e739bf285410988c407f3fa01a8:index.php


<<<<<<< HEAD:php/index.php
=======
  <script src="js/index.js"></script>
>>>>>>> a81b1877a2a23e739bf285410988c407f3fa01a8:index.php


  </body>
</html>
