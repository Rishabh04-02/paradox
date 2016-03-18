<?php
	$con=mysqli_connect("localhost","root","strongpassword","paradox");
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
  	$result=mysqli_query($con,"SELECT * FROM information where username='$user'");
  	$out=mysqli_fetch_array($result);
  	$level=$out['level']+1;
  	$answer=$_POST['ans'];
  	$result1=mysqli_query($con,"SELECT answer from questions where ind='$level'");
  	$out1=mysqli_fetch_array($result1);
  	$anss=$out1['answer'];
    if($level==23)
    {
      if(strcasecmp($answer,$user)==0)
      {
        header("Location:end.php");
      }
      else
      {
        ?>
       <html>
       <head>
         <title><?php echo $user; ?></title>
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
                  font-family:"Microsoft Sans Serif";
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
                  font-family:"Microsoft Sans Serif";
                }
         </style>
       </head>
       <body onload="javascript:func()">
              <div id="bg_mask">
                <div id="front_layer">
                  <p id="text">Wrong Answer</p>
                  <a href="paradox.php"><input type="button" value="OK" id="but"/></a>
                </div>
              </div>
       </body>
       </html>
       <?php
      }
    }
    else
    {
  	if(strcasecmp($anss,$answer)==0)
  	{
  		mysqli_query($con,"UPDATE information set level='$level' where username='$user'");
  		header("Location:paradox.php");
  	}
  	else
  	{  
    		?>
       <html>
       <head>
         <title><?php echo $user; ?></title>
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
                  font-family:"Microsoft Sans Serif";
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
                  font-family:"Microsoft Sans Serif";
                }
         </style>
       </head>
       <body onload="javascript:func()">
              <div id="bg_mask">
                <div id="front_layer">
                  <p id="text">Wrong Answer</p>
                  <a href="paradox.php"><input type="button" value="OK" id="but"/></a>
                </div>
              </div>
       </body>
       </html>
       <?php
		  }
    }
?>