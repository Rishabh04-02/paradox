<?php
	$con=mysqli_connect("localhost","root","hey","xquizzite");
	if (!$con)
 	 {
 		 die('Could not connect: ' . mysqli_error());
  		echo "could not connect";
  	}
  	session_start();
  	if(!isset($_SESSION['user']))
  	{
  		header("Location:home.php");
  	}
  	$user=$_SESSION['user'];
?>
<!doctype html>
<html>
  <head>
    <title><?php echo $user; ?></title>
    <link rel="stylesheet" type="text/css" href="css/pwdchange.css">
    <script type="text/javascript">
      function validate()
      {
        if(document.change.currentp.value=="")
        {
          alert("Please enter your current Password.");
          document.change.currentp.focus();
          return false;
        }
        if(document.change.pwd1.value=="")
        {
          alert("Please enter the new password.");
          document.change.pwd1.focus();
          return false;
        }
        if(document.change.pwd2.value=="")
        {
          alert("Please enter the new password again.");
          document.change.pwd2.focus();
          return false;
        }
        if(document.change.pwd1.value!=document.change.pwd2.value)
        {
          alert("The Passwords entered did not match");
          document.change.pwd2.focus();
          return false;
        }
        if(document.change.pwd1.value.length<5)
        {
          alert("Please enter a strong password(min length 5 characters)!")
          document.change.pwd1.focus();
          return false;
        }
      }
    </script>
  </head>
  <body>
  <div id="wrap">
    <div id="regbar">
      <div id="navthing">
         <h2 id="hd">PARADOX</h2>
      </div>
    </div>
    <div class="changep">
      <form action="changepwd.php" name="change" method="post" onsubmit="return(validate());">
            <table cellspacing="1" cellpadding="1" border="0">
              <tr>
                <td><label for="currentp"><p id="cap">Current Password:</p></label></td>
                <td><input type="password" name="currentp" id="currentp" placeholder="  Current Password" class="textfield"></td>
              </tr>
              <tr>
                <td><label for="pwd1"><p id="cap">Enter new Password:</p><label></td>
                <td><input type="password" name="pwd1" id="pwd1" placeholder="  New Password" class="textfield"></td>
              </tr>
              <tr>
                <td><label for="pwd2"><p id="cap">Re-Enter Password:</p><label></td>
                <td><input type="password" name="pwd2" id="pwd2" placeholder="  Re-Enter Password" class="textfield"></td>
              </tr>
              <tr>
                <td></td>
                <td><input type="submit" value="Change" id="button"></td>
            </table>
          </form>
          <div class="cancelbut">
            <a href="paradox.php"><button id="button" class="cancel">Cancel</button></a>
          </div>
    </div>
  </div>