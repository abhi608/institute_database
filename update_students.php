<html>
<head>
   <title> Update Query on student Table </title>
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
               $name = addslashes ($_POST['name']);
               $dept = addslashes ($_POST['dept']);
            }else {
               $roll = $_POST['roll'];
               $name = $_POST['name'];
               $dept = $_POST['dept'];
            }
         
         if(! get_magic_quotes_gpc() ) {
               $roll1 = addslashes ($_POST['roll1']);
               $name1 = addslashes ($_POST['name1']);
               $dept1 = addslashes ($_POST['dept1']);
               
            }else {
               $roll1 = $_POST['roll1'];
               $name1 = $_POST['name1'];
               $dept1 = $_POST['dept1'];
               
            }
         
   $first = "";
   $second = NULL;
   $third = NULL;
   
   if($roll)
   { $second = "roll = '$roll' ";
   }
   elseif($name)
   { $second = "name = '$name' ";
   }
   elseif($dept)
   { $second = "dept = '$dept' ";
   }
   else{
      print "Wrong entry.";
   }
   
   if($roll1)
   { $third = "roll = '$roll1' ";
   }
   elseif($name1)
   { $third = "name = '$name1' ";
   }
   elseif($dept1)
   { $third = "dept = '$dept1' ";
   }
   else{}
   if($third)
   { $first = " where ";
   }
   
   $sql = "update students set $second $first $third";
   mysql_select_db('cs251');
   $retval = mysql_query( $sql, $conn );
   echo "<div id='query'><i> UPDATE <span class='sqltable'>students</span> set <span class='values'>$second</span> $first <span class='fields'>$third</span>";
   
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
                        <td width = "100">Student Roll No.:</td>
                        <td><input name = "roll" type = "text" 
                           id = "roll"></td>
                     </tr>
                  
                     <tr>
                        <td width = "100">Student Name:</td>
                        <td><input name = "name" type = "text" 
                           id = "name"></td>
                     </tr>
                  
                     <tr>
                        <td width = "100">Student Department:</td>
                        <td><input name = "dept" type = "text" 
                           id = "dept"></td>
                     </tr>
                     
                
                        <td width = "100"> </td>
                        <td> </td>
                     </tr>
                  
                  </table>
                  
                  <h3> Where </h3>
                  
                  <table width = "400" border = "0" cellspacing = "1" 
                     cellpadding = "2">
                  
                     <tr>
                        <td width = "100">Student Roll No.:</td>
                        <td><input name = "roll1" type = "text" 
                           id = "roll1"></td>
                     </tr>
                  
                     <tr>
                        <td width = "100">Student Name:</td>
                        <td><input name = "name1" type = "text" 
                           id = "name1"></td>
                     </tr>
                  
                     <tr>
                        <td width = "100">Student Department:</td>
                        <td><input name = "dept1" type = "text" 
                           id = "dept1"></td>
                     </tr>
                
                        <td width = "100"> </td>
                        <td> </td>
                     </tr>
                  
                     <tr>
                        <td width = "100"> </td>
                        <td>
                           <input name = "add" type = "submit" id = "add" 
                              value = "Update Data in student table">
                        </td>
                     </tr>
                  
                  </table>
               </form>
            
      
      <?php
   }
   ?>
</body>
</html>