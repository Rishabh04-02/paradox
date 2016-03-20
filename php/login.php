<?php
	$con=mysqli_connect("localhost","root","hey","paradox");
	if (!$con)
 	 {
 		 die('Could not connect: ' . mysqli_error());
  		echo "could not connect";
  	}
  	session_start();
    if($_POST==NULL)
    {
    	header("Location:index.php");
    }
    if(!isset($_POST['user']))
    {
      header("Location:index.php");
    }
     else
    {
    	$user=$_POST["user"];
    	$pwd=md5(mysql_real_escape_string($_POST["password"]));
    	$result=mysqli_query($con,"SELECT * FROM information where username='$user' and password='$pwd'");
      if(mysqli_num_rows($result)>0)
      {
        $_SESSION['user']=$user;
        $out=mysqli_fetch_array($result);
        $level=$out['level'];
        header("Location:paradox.php");
      }
    	else
    	{   
    		?>
       <html>
       <head>
         <title>Paradox</title>
         <script type="text/javascript">
            function func()
            {
                document.getElementById('bg_mask').style.visibility='visible';
                document.getElementById('frontlayer').style.visibility='visible';
            }
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
                    background : #c8cccf center;
                    border-width:20px;
                    border-style: solid;
                    border-radius:7px;
                    border-color:#2c3e50;
                    z-index: 10;
                    visibility: hidden;
                    text-align: center;

                }
                #text
                {
                  color:#2c3e50;
                  font-weight: bold;
                  font-size: 20px;
                  font-family:"Ubuntu";
                }
                #but
                {
                  height:50px;
                  width:110px;
                  background-color: #2c3e50;
                  border-right-width:5px;
                  border-bottom-width:5px;
                  border-top-width:1px;
                  border-left-width:1px;
                  border-style:outset;
                  border-bottom-color:#233240;
                  border-right-color:#233240;
                  color:white;
                  font-weight: bold;
                  font-size: 13px;
                  font-family:"Ubuntu";
                }
         </style>
       </head>
       <body onload="javascript:func()">
              <div id="bg_mask">
                <div id="front_layer">
                  <p id="text">Wrong Email or Password</p>
                  <a href="index.php"><input type="button" value="OK" id="but"/></a>
                </div>
              </div>
       </body>
       </html>
       <?php
		  }
	  }
?>