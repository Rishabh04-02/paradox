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
      <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
      
  </head>

  <script type="text/javascript">

    function validate()
      {
       
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
        if (document.signup.phn.value!="") {

        };
        if(document.signup.pwd1.value!=document.signup.pwd2.value)
        {
          alert("The Passwords entered did not match");
          document.getElementById("pwd1").value="";
          document.getElementById("pwd2").value="";
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
    <form action="" name="login" method="post">
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

    <form action="signingup.php" method="post" name="signup" onsubmit="return(validate());">
      
      <div class="input-container">
        <input type="text" id="user1" name="user" required="required" pattern="[A-Za-z0-9]{}" />
            <label for="Username">Username</label>             
            <div class="bar"></div>
            <a href="#" id="check_username_availability" class="check_availaibility"><button>check availablility</button></a>
    <span id="username_availability_result"></span>
        </div>
      

      <div class="input-container">
        <input type="email" id="phn" name="phn" required="required"/>
        <label for="Phone">Email</label>
        <div class="bar"></div>
      </div>
      
      <div class="input-container">
        <input type="password" id="pwd1" name="pwd1" required="required"/>
        <label for="Password">Password</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="password" id="pwd2" name="pwd2" required="required" onchange="checkpassmatch();" />
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
<ul>
  <li><a href="https://www.facebook.com/teamexe/" target="_blank"><img src="img/fb.png"></a> 
  <a href="leader.php"><img src="img/bw.gif" title="Leader board"></a>
   <a target="_blank" href="https://www.youtube.com/channel/UCTIpvLaM1G-uUsthgCDauKw">
  <img src="img/yt.png"></a></li>
</ul>
</div>


         <script src="js/register.min.js"></script>
        <script src="js/index2.js"></script>

  <script type="text/javascript">
      
      $(document).ready(function()
      {  
            var min_chars = 3;  
          var characters_error = ' : Minimum amount of chars is 3';  
            var checking_html = ' : Checking...';    
            $('#check_username_availability').click(function()
            {   
                if($('#user1').val().length < min_chars){    
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
        var username = $('#user1').val();   
        $.post("checkusername.php", { user1: username },  
            function(result){    
                if(result == 1){    
                    $('#username_availability_result').html(' : '+username + ' is Available ');  
                }else{    
                    $('#username_availability_result').html(' : '+username + ' is not Available ');  
                }  
        });  
  
}  
    </script>
      <script type="text/javascript">
        $(document).ready(function(){
            $("#pwd2").keyup(checkpassmatch);

        });

           function checkpassmatch(){
              var passwd=$("#pwd1").val();
              var cnfpasswd=$("#pwd2").val();
              if(passwd!=cnfpasswd){
                $("#passmismatch").html("MISjaskfdj");
              }

        });
    </script>


  </body>
</html>
