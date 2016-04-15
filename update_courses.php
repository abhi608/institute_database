<html>
<head>
   <title> Update Query on courses Table </title>
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
               $id = addslashes ($_POST['id']);
               $cname = addslashes ($_POST['cname']);
               $credit = addslashes ($_POST['credit']);
               $fid = addslashes ($_POST['fid']);
            }else {
               $id = $_POST['id'];
               $cname = $_POST['cname'];
               $credit = $_POST['credit'];
               $fid = $_POST['fid'];
            }
         if(! get_magic_quotes_gpc() ) {
               $id1 = addslashes ($_POST['id1']);
               $cname1 = addslashes ($_POST['cname1']);
               $credit1 = addslashes ($_POST['credit1']);
               $fid1 = addslashes ($_POST['fid1']);
            }else {
               $id1 = $_POST['id1'];
               $cname1 = $_POST['cname1'];
               $credit1 = $_POST['credit1'];
               $fid1 = $_POST['fid1'];
            }
         
   $first = "";
   $second = NULL;
   $third = NULL;
   
   if($id)
   { $second = "id = '$id' ";
   }
   elseif($cname)
   { $second = "cname = '$cname' ";
   }
   elseif($credit)
   { $second = "credit = '$credit' ";
   }
   elseif($fid)
   { $second = "fid = '$fid'";
   }
   else{
      print "Wrong entry.";
   }
   
   if($id1)
   { $third = "id = '$id1' ";
   }
   elseif($cname1)
   { $third = "cname = '$cname1' ";
   }
   elseif($credit1)
   { $third = "credit = '$credit1' ";
   }
   elseif($fid1)
   { $third = "fid = '$fid1'";
   }
  
   else{}
   if($third)
   { $first = " where ";
   }
   
   $sql = "update courses set $second $first $third";
   mysql_select_db('cs251');
   $retval = mysql_query( $sql, $conn );
   echo "<div id='query'><i> UPDATE <span class='sqltable'>courses</span> set <span class='values'>$second</span> $first <span class='fields'>$third</span>";
   
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
                        <td width = "100">Course ID:</td>
                        <td><input name = "id" type = "text" 
                           id = "id"></td>
                     </tr>
                  
                     <tr>
                        <td width = "100">Course Name:</td>
                        <td><input name = "cname" type = "text" 
                           id = "cname"></td>
                     </tr>
                  
                     <tr>
                        <td width = "100">Credits:</td>
                        <td><input name = "credit" type = "text" 
                           id = "credit"></td>
                     </tr>
                  
                     <tr>
                        <td width = "100">Faculty ID:</td>
                        <td><input name = "fid" type = "text" 
                           id = "fid"></td>
                     </tr>
                
                        <td width = "100"> </td>
                        <td> </td>
                     </tr>
                  
                  </table>
                  
                  <h3> Where </h3>
                  
                  <table width = "400" border = "0" cellspacing = "1" 
                     cellpadding = "2">
                  
                     <tr>
                        <td width = "100">Course ID:</td>
                        <td><input name = "id1" type = "text" 
                           id = "id1"></td>
                     </tr>
                  
                     <tr>
                        <td width = "100">Course Name:</td>
                        <td><input name = "cname1" type = "text" 
                           id = "cname1"></td>
                     </tr>
                  
                     <tr>
                        <td width = "100">Credits:</td>
                        <td><input name = "credit1" type = "text" 
                           id = "credit1"></td>
                     </tr>
                  
                     <tr>
                        <td width = "100">Faculty ID:</td>
                        <td><input name = "fid1" type = "text" 
                           id = "fid1"></td>
                     </tr>
                     
                
                        <td width = "100"> </td>
                        <td> </td>
                     </tr>
                  
                     <tr>
                        <td width = "100"> </td>
                        <td>
                           <input name = "add" type = "submit" id = "add" 
                              value = "Update Data in courses table">
                        </td>
                     </tr>
                  
                  </table>
               </form>
            
      
      <?php
   }
   ?>
</body>
</html>