<html>
   
   <head>
      <title>Display Information of Students</title>
      <link rel="stylesheet" href="styles.css">
   </head>
   
   <body>
<?php
   $dbhost = 'localhost:3036';
   $dbuser = 'abhishek';
   $dbpass = 'kohli';
   
   $conn = mysql_connect($dbhost, $dbuser, $dbpass);
   
   if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }
   
   $sql = "SELECT roll, name, dept ". 
            "FROM students ";
   echo "<div id='query'><i> SELECT <span class='fields'>roll, name, dept</span> FROM <span class='sqltable'>students</span>";

   mysql_select_db('cs251');
   $retval = mysql_query( $sql, $conn );
   
   if(! $retval ) {
      die('Could not get data: ' . mysql_error());
   }
   
   echo "<table id='display'>";
         echo "<tr><th id='thdisp'>STUDENT ROLL NO.</th><th id='thdisp'>STUDENT NAME</th><th id='thdisp'>STUDENT DEPARTMENT</th></tr>";
         while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
            echo "<tr><td id='tddisp'>{$row['roll']}</td><td id='tddisp'>{$row['name']}</td><td id='tddisp'>{$row['dept']}</td></tr>";
   }
   
   echo "</table>";
   
   mysql_close($conn);
?>

</body>
</html>
