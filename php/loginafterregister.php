<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Paradox</title>


    <link rel="stylesheet" href="css/reset2.css">

    <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
<link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

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
        if(document.signup.user.value=="")
        {
          alert("Please enter your Username.");
          document.signup.user.focus();
          return false;
    
        }
        if(document.signup.inst.value=="")
        {
          alert("Please enter the name of your Institution.");
          document.signup.inst.focus();
          return false;
        }
        if(document.signup.pwd1.value=="")
        {
          alert("Please enter the password.");
          document.signup.pwd1.focus();
          return false;
        }
        if(document.signup.pwd2.value=="")
        {
          alert("Please enter the password again.");
          document.signup.pwd2.focus();
          return false;
        }
        if(document.signup.pwd1.value!=document.signup.pwd2.value)
        {
         // alert("The Passwords entered did not match");
          document.getElementById('invalidreturn').innerHTML="Passwords do not match";
          document.signup.pwd2.focus();
          return false;
        }
        if(document.signup.pwd1.value.length<5)
        {
          alert("Please enter a strong password(min length 5 characters)!")
          document.signup.pwd1.focus();
          return false;
        }
        var r=confirm("Confirming the details you have entered???")
          if(r==true)
            return( true );
          else
            return false;
      }

    </script>
  </head>

  <body>


<!-- Mixins-->
<!-- Pen Title-->
<div class="pen-title">
  <h1>You have successfully registered. Please log in to continue !</h1><span>Pen <i class='fa fa-code'></i> by <a href='http://andytran.me'>Andy Tran</a></span>
</div>
<div class="rerun"><a href="">Rerun Pen</a></div>
<div class="container">
  <div class="card"></div>
  <div class="card">
    <h1 class="title">Login</h1>
    <form action="login.php" name="login" method="post" onsubmit="return(validate());">
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

      <!-- <div class="input-container">
        <input type="text" id="Username" name="user"required="required"/>
        <label for="Username">Username</label>
        <div class="bar"></div>
      </div>

      <div class="input-container">
        <input type="text" id="Username" name="user"required="required"/>
        <label for="Username">Username</label>
        <div class="bar"></div>
      </div>
 -->
      <div class="input-container">
        <input type="password" id="Password" pattern="[A-Za-z0-9]{8,30}" oninvalid="setCustomValidity('Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters')" name="pwd1" required="required"/>
        <label for="Password">Password</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="password" id="Repeat Password" name="pwd2" required="required"/>
        <label for="Repeat Password">Repeat Password</label>
        <div class="bar"></div>
      </div>
      <div class="button-container">
        <button type="submit"><span>Next</span></button>
      </div>
    </form>
  </div>
</div>
<!-- Portfolio--><a id="portfolio" href="http://andytran.me/" title="View my portfolio!"><i class="fa fa-link"></i></a>
<!-- CodePen--><a id="codepen" href="http://codepen.io/andytran/" title="Follow me!"><i class="fa fa-codepen"></i></a>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="js/index2.js"></script>




  </body>
</html>
