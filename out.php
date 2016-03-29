<!DOCTYPE html>
<html>
<head>
  <title>Mysql</title>
</head>
<body>

<table width="100%">
  


<?php

$con=mysqli_connect("localhost","root","strongpassword","paradox");

$connection=mysql_connect("localhost","root","strongpassword")
            or die("Couldn't connect to server");

            $db=mysql_select_db("paradox",$connection)
            or die("couldn't connect to database1");

            $query="SELECT * FROM questions";
            //$query="SELECT AES_DECRYPT('question', 'key'), AES_DECRYPT('answer', 'key') FROM questions";

            $result=mysql_query($query)
            or die("Couldn't connect to database2");

            echo "<tr>";
            echo "<th>S.NO.</th><th>Photo name</th><th>Answer</th>";
            echo "</tr>";

//mysql_fetch_array("SELECT AES_DECRYPT(question, 'key'), AES_DECRYPT(answer, 'key') FROM questions");
            //$sql = 'SELECT question, answer FROM questions';
            //$retval = mysql_query( $sql, $connection );
            //printing all the data from database
            $result1=mysqli_query($con,"SELECT AES_DECRYPT(answer,'key') from questions where ind='9'");
      $out1=mysqli_fetch_array($result1);
      $anss=$out1['answer'];
    echo "$out1<br>$result1";


//   while($row=mysql_fetch_array($result))
//{
//echo "<tr>";

//echo "<td>",$row['ind'],"</td> <td>",$row['AES_DECRYPT(question,'key')']," </td> <td>",$row['AES_DECRYPT(answer,'key')']," </td>";
//echo "</tr>";
//$as=AES_DECRYPT($first,'key');

//}
            
 //           mysql_fetch_array(mysql_query("SELECT AES_DECRYPT(question, 'key'), AES_DECRYPT(answer, 'key') FROM questions"))
?>
</table>

</body>
</html>
