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
   
   $sql = "SELECT fid, fname, cid ". 
            "FROM faculty";
            echo "<div id='query'><i> SELECT <span class='fields'>fid, fname, cid</span> FROM <span class='sqltable'>faculty</span>";
            mysql_select_db('cs251');
   $retval = mysql_query( $sql, $conn );
   
   if(! $retval ) {
      die('Could not get data: ' . mysql_error());
   }
   
  echo "<table id='display'>";
         echo "<tr><th id='thdisp'>FACULTY ID</th><th id='thdisp'>FACULTY NAME</th><th id='thdisp'>COURSE ID</th></tr>";
         while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
            echo "<tr><td id='tddisp'>{$row['fid']}</td><td id='tddisp'>{$row['fname']}</td><td id='tddisp'>{$row['cid']}</td></tr>";
   }
   
     echo "</table";
   
   mysql_close($conn);
?>
 </body>
</html>
