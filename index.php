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
      $checkwin=mysqli_query($con,"SELECT * from information where username='$user'");
      $checkwinarr=mysqli_fetch_array($checkwin);
      $checkwinresult=$checkwinarr['flag'];
      if($checkwinresult == 1){
      	$_SESSION['user']=$user;
      	header("Location:end.php");
      }
      else{
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
    }


?>
<!DOCTYPE html>

<html >
  <head>
      <meta charset="UTF-8">
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


      <link rel="stylesheet" href="css/reset2.css">
      <link rel="stylesheet" href="css/style2.css">
         <script src="js/register.min.js"></script>
        <script src="js/index2.js"></script>
        <script src="js/jquery-1.5.1.min.js"></script>

        
      
      
  </head>

  

  <body>
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
   
  <script type="text/javascript">
      
      $(document).ready(function()
      {  
            var min_chars = 3;  
          var characters_error = ' : Minimum no. of characters is 3';  
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
  function hover(element) {
    element.setAttribute('src', 'para1.png');
}
function unhover(element) {
    element.setAttribute('src', 'para2.png');
}
</script>

<!-- <script>
function changeImage() {
    var image = document.getElementById('myImage');
    if (image.src.match("para1")) {
        image.src = "para2.png";
    } else {
        image.src = "para1.png";
    }
}
</script> -->

<!-- Mixins-->
<!-- Pen Title-->
<div class="pen-title">
<img id="my-img" src="para1.png" width="400" onmouseover="hover(this);" onmouseout="unhover(this);" /><br/><br/>
<div id="button1" align="center">
        <span><a href="instructions.php">Instructions</a></span>
      </div>
      <div id="button1" align="center">
        <span><a href="leader.php">Leaderboard</a></span>
      </div>
    <h2 id="newcolor"><?php echo "<br><br>"; echo $sessvar; ?></h2>
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
          
            <span><div><?php echo "<p>{$var}</p>"; ?></div></span>
          
        </div>

      <div class="button-container" title="Login">
      
        <button type="submit"><span>Login</span></button>
      </div>
      
    </form>
  </div>
  <div class="card alt">
    <div class="toggle"></div>
    <h1 class="title">Register
      <div class="close"></div>
    </h1>

    <form action="signingup.php" method="post" name="signup" onsubmit="return(validate());">
      
      <div class="input-container">
        <input type="text" id="user1" name="user" required="required" pattern="[A-Za-z0-9]+" />
            <label for="Username">Username</label>             
            <div class="bar"></div>
            <a href="#" id="check_username_availability" class="check_availaibility"><button>check availablility</button></a>
    <span id="username_availability_result"></span>
        </div>
      

      <div class="input-container">
        <input type="email" id="phn" name="phn" required="required" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" />
        <label for="Password">Email</label>
        <div class="bar"></div>
      </div>
      
      <div class="input-container">
        <input type="password" id="pwd1" name="pwd1" required="required"/>
        <label for="Password">Password</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="password" id="pwd2" name="pwd2" required="required" />
        <label for="Repeat Password">Verify Password</label>
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
</div>


         <script src="js/register.min.js"></script>
        <script src="js/index2.js"></script>
        <script src="js/jquery-1.5.1.min.js"></script>
 
<div id="icn" align="center">

<ul>
  <li><a href="https://www.facebook.com/teamexe/" target="_blank"><img src="img/fb.png"></a> 
  <a href="leader.php"><img src="img/bw.gif" title="Leader board"></a>
   <a target="_blank" href="https://www.youtube.com/channel/UCTIpvLaM1G-uUsthgCDauKw">
  <img src="img/yt.png"></a></li>
</ul>
</div>


        

        <?php
        include("indexcounter.php");
        ?>
  </body>
</html>
