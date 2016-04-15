<html>
   
   <head>
      <title>Display Information of Courses</title>
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
   
    $sql = "SELECT roll, cid, assn, quiz, msem, total, grade ". 
            "FROM enrolment";
             echo "<div id='query'><i> SELECT <span class='fields'>roll, cid, assn, quiz, msem, total, grade</span> FROM <span class='sqltable'>enrolment</span>";
            mysql_select_db('cs251');
   $retval = mysql_query( $sql, $conn );
   
   if(! $retval ) {
      die('Could not get data: ' . mysql_error());
   }
   
  echo "<table id='display'>";
         echo "<tr><th id='thdisp'>STUDENT ROLL NO.</th><th id='thdisp'>COURSE ID</th><th id='thdisp'>ASSIGNMENT MARKS</th><th id='thdisp'>QUIZ MARKS</th><th id='thdisp'>MID-SEM MARKS</th><th id='thdisp'>TOTAL MARKS</th><th id='thdisp'>GRADE</th></tr>";
         while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
            echo "<tr><td id='tddisp'>{$row['roll']}</td><td id='tddisp'>{$row['cid']}</td><td id='tddisp'>{$row['assn']}</td><td id='tddisp'>{$row['quiz']}</td><td id='tddisp'>{$row['msem']}</td><td id='tddisp'>{$row['total']}</td><td id='tddisp'>{$row['grade']}</td></tr>";
   }
   
     echo "</table";
   
   mysql_close($conn);
?>
 </body>
</html>
