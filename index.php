<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">

  <title>Paradox</title>

    <link rel="stylesheet" href="css/style.css">
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
             <input type="text" pattern="[a-z],[0-9]*" name="user" value="" />
             <label name="password">Password</label>
             <input type="password" name="password" />
             <input type="submit" value="Login" />
            </form>
           </fieldset>
        </div>
      </div>
    </div>
    </div>
  </div>
</div>
<div class="image">
  <img src="images/1.png" width="600px" height="630px">
  <div>

  <script src='http://codepen.io/assets/libs/fullpage/jquery.js'></script>

  <script src="js/index.js"></script>

</body>

</html>
