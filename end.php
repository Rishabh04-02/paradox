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
    ?>

<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript">
    
   		 history.pushState(null, null, 'paradox.php');
  	  window.addEventListener('popstate', function(event) {
   			 history.pushState(null, null, 'paradox.php');
   			 });
</script>
	<title>
		
	</title>
</head>
<body>
<div align="center">
<br/>
<h1>Congratulations !! You have successfully completed the PARADOX</h1>
<br/>
</div>
<?php require('leader.php'); ?>
</body>
</html>

<!--      <html>
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
         <script type="text/javascript">
            function func()
            {
                document.getElementById('bg_mask').style.visibility='visible';
                document.getElementById('frontlayer').style.visibility='visible';
            }
          </script>

          	<script type="text/javascript">
    
   		 history.pushState(null, null, 'paradox.php');
  	  window.addEventListener('popstate', function(event) {
   			 history.pushState(null, null, 'paradox.php');
   			 });
</script>
  	
         <style type="text/css">
                #bg_mask
                {
                    position: absolute;
                    top: 0;
                    right: 0;
                    bottom: 0;
                    left: 0;
                    margin: auto;
                    width: 320px;
                    height: 120px;
                    background : #FAFAFA center;
                    border-width:20px;
                    border-style: solid;
                    border-radius:7px;
                    border-color:00BCD4;
                    z-index: 10;
                    visibility: hidden;
                    text-align: center;

                }
                #text
                {
                  color:00BCD4;
                  font-weight: bold;
                  font-size: 20px;
                  font-family:"Microsoft Sans Serif";
                }
                #but
                {
                  height:50px;
                  width:110px;
                  background-color: 00BCD4;
                  border-right-width:5px;
                  border-bottom-width:5px;
                  border-top-width:2px;
                  border-left-width:2px;
                  border-style:outset;
                  border-top-color:#233240;
                  border-left-color:#233240;
                  border-bottom-color:#233240;
                  border-right-color:#233240;
                  color:white;
                  font-weight: bold;
                  font-size: 13px;
                  font-family:"Microsoft Sans Serif";
                }
         </style>
       </head>
       <body onload="javascript:func()">
           <body bgcolor="BBDEFB">
           <body background="paradox.jpg">
              <div id="bg_mask">
                <div id="front_layer">
                  <p id="text"><u>CONGRATULATIONS</u></p>
                  <p id="text">You won</p>
                  <a href="logout.php"><input type="button" value=":)" id="but"/></a>
                </div>
                  <p></p>
                 <footer>
                 <a href="leader.php"><input type="button" value="Leaderboard" id="but"/></a>
                           
                 </footer>
              </div> 
             </body>      
             </body>
       </body>
       </html>
 -->