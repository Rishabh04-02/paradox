<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">

  <title>Paradox</title>

    <link rel="stylesheet" href="css/register.css">
    <script type="text/javascript">
    function validate()
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
          alert("The Passwords entered did not match");
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

  <div id="wrap">
  <div id="regbar">
    <div id="navthing">
      <h2 id="hd">PARADOX</h2>
    </div>
      <div class="regform">
        <form action="signingup.php" name="signup" method="post" onsubmit="return(validate());">
            <table cellspacing="1" cellpadding="1" border="0">
              <tr>
                <td><label for="user"><h2>Username:</h2></label></td>
                <td><input type="text" name="user" id="user" pattern="[a-z],[0-9]*" placeholder="  Username" class="textfield"></td>
                <td><input type="button" id="check_username_availability" class="checkbut" value="Check availability"> <div id="username_availability_result"></div></td>
              </tr>
              <tr>
                <td><label for="inst"><h2>Contact Number:</h2></label></td>
                <td><input type="text" name="inst" id="inst" placeholder="  Contact Number" class="textfield"></td>
              </tr>
              <tr>
                <td><label for="pwd1"><h2>Enter Password:</h2><label></td>
                <td><input type="password" name="pwd1" id="pwd1" pattern="[a-z],[0-9]*" placeholder="  Password" class="textfield"></td>
              </tr>
              <tr>
                <td><label for="pwd2"><h2>Re-Enter Password:</h2><label></td>
                <td><input type="password" name="pwd2" id="pwd2" pattern="[a-z],[0-9]*" placeholder="  Re-Enter Password" class="textfield"></td>
              </tr>
              <tr>
                <td></td>
                <td><input type="submit" value="Sign-Up" id="button"></td>
            </table>
          </form> 
      </div>
  </div>
</div>

  <script src='http://codepen.io/assets/libs/fullpage/jquery.js'></script>

  <script src="js/index.js"></script>
  <script type="text/javascript">
      
      $(document).ready(function()
      {  
            var min_chars = 3;  
          var characters_error = 'Minimum amount of chars is 3';  
            var checking_html = 'Checking...';    
            $('#check_username_availability').click(function()
            {   
                if($('#user').val().length < min_chars){    
                  $('#username_availability_result').html(characters_error);  
              }
              else
              {    
                  $('#username_availability_result').html(checking_html);  
                  check_availability();  
              }  
          });  
  
      });  
    function check_availability(){  
        var username = $('#user').val();   
        $.post("checkusername.php", { user: username },  
            function(result){    
                if(result == 1){    
                    $('#username_availability_result').html(username + ' is Available ');  
                }else{    
                    $('#username_availability_result').html(username + ' is not Available ');  
                }  
        });  
  
}  
    </script>

</body>

</html>
