<html>
<head>
	<title> Select Query on Enrolment Table </title>
   <link rel="stylesheet" href="styles.css">
</head>

<body>

<?php
   if(isset($_POST['add']))
   { $dbhost = 'localhost:3036';
	$dbuser = 'abhishek';
	$dbpass = 'kohli';
   
   $conn = mysql_connect($dbhost, $dbuser, $dbpass);
   
   if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }
   
   if(! get_magic_quotes_gpc() ) {
               $roll = addslashes ($_POST['roll']);
               $cid = addslashes ($_POST['cid']);
               $total = addslashes ($_POST['total']);
               $grade = addslashes ($_POST['grade']);
            }else {
               $roll = $_POST['roll'];
               $cid = $_POST['cid'];
               $total = $_POST['total'];
               $grade = $_POST['grade'];
			   }
            $assn = $_POST['assn'];
               $quiz = $_POST['quiz'];
               $msem = $_POST['msem'];
         
	$first = "";
	$second = NULL;
	
	if($roll)
	{ $second = "roll = '$roll' ";
	}
	elseif($cid)
	{ $second = "cid = '$cid' ";
	}
	elseif($total)
	{ $second = "total = '$total' ";
	}
	elseif($grade)
	{ $second = "grade = '$grade'";
	}
	elseif($assn)
	{ $second = "assn = '$assn'";
	}
	elseif($quiz)
	{ $second = "quiz = '$quiz'";
	}
	elseif($msem)
	{ $second = "msem = '$msem'";
	}
	else{}
	
	if($second)
	{ $first = " where ";
	}
   
   $sql = "SELECT * FROM enrolment $first $second";
   mysql_select_db('cs251');
   echo "<div id='query'><i> SELECT <span class='fields'>*</span> FROM <span class='sqltable'>enrolment</span> $first <span class='values'>$second</span>";
   $retval = mysql_query( $sql, $conn );
   
   if(! $retval ) {
      die('Could not get data: ' . mysql_error());
   }
   
   
      echo "<table id='display'>";
      echo "<tr><th id='thdisp'>STUDENT ROLL NO.</th><th id='thdisp'>COURSE ID</th><th id='thdisp'>ASSIGNMENT MARKS</th><th id='thdisp'>QUIZ MARKS</th><th id='thdisp'>MID-SEM MARKS</th><th id='thdisp'>TOTAL MARKS</th><th id='thdisp'>GRADE</th></tr>";
   while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
      echo "<tr><td id='tddisp'>{$row['roll']}</td><td id='tddisp'>{$row['cid']}</td><td id='tddisp'>{$row['assn']}</td><td id='tddisp'>{$row['quiz']}</td><td id='tddisp'>{$row['msem']}</td><td id='tddisp'>{$row['total']}</td><td id='tddisp'>{$row['grade']}</td></tr>";
   }
   echo "</table>";
   
   echo "Fetched data successfully\n";
   
   mysql_close($conn);
}
else {
?>
		<form method = "post" action = "<?php $_PHP_SELF ?>">
                  <table width = "400" border = "0" cellspacing = "1" 
                     cellpadding = "2">
                  
                     <tr>
                        <td width = "100">Roll:</td>
                        <td><input name = "roll" type = "text" 
                           id = "roll"></td>
                     </tr>
                  
                     <tr>
                        <td width = "100">Course Id:</td>
                        <td><input name = "cid" type = "text" 
                           id = "cid"></td>
                     </tr>
                  
                     <tr>
                        <td width = "100">Assignment:</td>
                        <td><input name = "assn" type = "text" 
                           id = "assn"></td>
                     </tr>
                  
                     <tr>
                        <td width = "100">Quiz:</td>
                        <td><input name = "quiz" type = "text" 
                           id = "quiz"></td>
                     </tr>
                     
                     <tr>
                        <td width = "100">Mid-sem:</td>
                        <td><input name = "msem" type = "text" 
                           id = "msem"></td>
                     </tr>
                     
                     <tr>
                        <td width = "100">Total:</td>
                        <td><input name = "total" type = "text" 
                           id = "total"></td>
                     </tr>
                     
                     <tr>
                        <td width = "100">Grade:</td>
                        <td><input name = "grade" type = "text" 
                           id = "grade"></td>
                     </tr>
                     
					 
                        <td width = "100"> </td>
                        <td> </td>
                     </tr>
                  
                     <tr>
                        <td width = "100"> </td>
                        <td>
                           <input name = "add" type = "submit" id = "add" 
                              value = "Query Data from Enrolment">
                        </td>
                     </tr>
                  
                  </table>
               </form>
            
		
		<?php
	}
	?>
</body>
</html>