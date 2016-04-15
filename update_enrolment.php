<html>
<head>
   <title> Update Query on Enrolment Table </title>
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
         
         if(! get_magic_quotes_gpc() ) {
               $roll1 = addslashes ($_POST['roll1']);
               $cid1 = addslashes ($_POST['cid1']);
               $total1 = addslashes ($_POST['total1']);
               $grade1 = addslashes ($_POST['grade1']);
            }else {
               $roll1 = $_POST['roll1'];
               $cid1 = $_POST['cid1'];
               $total1 = $_POST['total1'];
               $grade1 = $_POST['grade1'];
            }
            $assn1 = $_POST['assn1'];
               $quiz1 = $_POST['quiz1'];
               $msem1 = $_POST['msem1'];
         
   $first = "";
   $second = NULL;
   $third = NULL;
   
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
   else{
      print "Wrong entry.";
   }
   
   if($roll1)
   { $third = "roll = '$roll1' ";
   }
   elseif($cid1)
   { $third = "cid = '$cid1' ";
   }
   elseif($total1)
   { $third = "total = '$total1' ";
   }
   elseif($grade1)
   { $third = "grade = '$grade1'";
   }
   elseif($assn1)
   { $third = "assn = '$assn1'";
   }
   elseif($quiz1)
   { $third = "quiz = '$quiz1'";
   }
   elseif($msem1)
   { $third = "msem = '$msem1'";
   }
   else{}
   if($third)
   { $first = " where ";
   }
   
   $sql = "update enrolment set $second $first $third";
   mysql_select_db('cs251');
   $retval = mysql_query( $sql, $conn );
   echo "<div id='query'><i> UPDATE <span class='sqltable'>enrolment</span> set <span class='values'>$second</span> $first <span class='fields'>$third</span>";
   
   if(! $retval ) {
      die('Could not get data: ' . mysql_error());
   }
   
    
   echo "Updated data successfully\n";
   
   mysql_close($conn);
}
else {
?>
 <h3>Set</h3>
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
                  
                  </table>
                  
                  <h3> Where </h3>
                  
                  <table width = "400" border = "0" cellspacing = "1" 
                     cellpadding = "2">
                  
                     <tr>
                        <td width = "100">Roll:</td>
                        <td><input name = "roll1" type = "text" 
                           id = "roll1"></td>
                     </tr>
                  
                     <tr>
                        <td width = "100">Course Id:</td>
                        <td><input name = "cid1" type = "text" 
                           id = "cid1"></td>
                     </tr>
                  
                     <tr>
                        <td width = "100">Assignment:</td>
                        <td><input name = "assn1" type = "text" 
                           id = "assn1"></td>
                     </tr>
                  
                     <tr>
                        <td width = "100">Quiz:</td>
                        <td><input name = "quiz1" type = "text" 
                           id = "quiz1"></td>
                     </tr>
                     
                     <tr>
                        <td width = "100">Mid-sem:</td>
                        <td><input name = "msem1" type = "text" 
                           id = "msem1"></td>
                     </tr>
                     
                     <tr>
                        <td width = "100">Total:</td>
                        <td><input name = "total1" type = "text" 
                           id = "total1"></td>
                     </tr>
                     
                     <tr>
                        <td width = "100">Grade:</td>
                        <td><input name = "grade1" type = "text" 
                           id = "grade1"></td>
                     </tr>
                     
                
                        <td width = "100"> </td>
                        <td> </td>
                     </tr>
                  
                     <tr>
                        <td width = "100"> </td>
                        <td>
                           <input name = "add" type = "submit" id = "add" 
                              value = "Update Data in Enrolment">
                        </td>
                     </tr>
                  
                  </table>
               </form>
            
      
      <?php
   }
   ?>
</body>
</html>