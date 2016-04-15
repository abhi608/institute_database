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
               $fid = addslashes ($_POST['fid']);
               $fname = addslashes ($_POST['fname']);
               $cid = addslashes ($_POST['cid']);
            }else {
               $fid = $_POST['fid'];
               $fname = $_POST['fname'];
               $cid = $_POST['cid'];
            }
         
         if(! get_magic_quotes_gpc() ) {
               $fid1 = addslashes ($_POST['fid1']);
               $fname1 = addslashes ($_POST['fname1']);
               $cid1 = addslashes ($_POST['cid1']);
               
            }else {
               $fid1 = $_POST['fid1'];
               $fname1 = $_POST['fname1'];
               $cid1 = $_POST['cid1'];
               
            }
         
   $first = "";
   $second = NULL;
   $third = NULL;
   
   if($fid)
   { $second = "fid = '$fid' ";
   }
   elseif($fname)
   { $second = "fname = '$fname' ";
   }
   elseif($cid)
   { $second = "cid = '$cid' ";
   }
   else{
      print "Wrong entry.";
   }
   
   if($fid1)
   { $third = "fid = '$fid1' ";
   }
   elseif($fname1)
   { $third = "fname = '$fname1' ";
   }
   elseif($cid1)
   { $third = "cid = '$cid1' ";
   }
   else{}
   if($third)
   { $first = " where ";
   }
   
   $sql = "update faculty set $second $first $third";
   mysql_select_db('cs251');
   $retval = mysql_query( $sql, $conn );
   echo "<div id='query'><i> UPDATE <span class='sqltable'>faculty</span> set <span class='values'>$second</span> $first <span class='fields'>$third</span>";
   
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
                        <td width = "100">Faculty ID:</td>
                        <td><input name = "fid" type = "text" 
                           id = "fid"></td>
                     </tr>
                  
                     <tr>
                        <td width = "100">Faculty Name:</td>
                        <td><input name = "fname" type = "text" 
                           id = "fname"></td>
                     </tr>
                  
                     <tr>
                        <td width = "100">Course ID:</td>
                        <td><input name = "cid" type = "text" 
                           id = "cid"></td>
                     </tr>
                     
                
                        <td width = "100"> </td>
                        <td> </td>
                     </tr>
                  
                  </table>
                  
                  <h3> Where </h3>
                  
                  <table width = "400" border = "0" cellspacing = "1" 
                     cellpadding = "2">
                  
                     <tr>
                        <td width = "100">Faculty ID:</td>
                        <td><input name = "fid1" type = "text" 
                           id = "fid1"></td>
                     </tr>
                  
                     <tr>
                        <td width = "100">Faculty Name:</td>
                        <td><input name = "fname1" type = "text" 
                           id = "fname1"></td>
                     </tr>
                  
                     <tr>
                        <td width = "100">Course ID:</td>
                        <td><input name = "cid1" type = "text" 
                           id = "cid1"></td>
                     </tr>
                
                        <td width = "100"> </td>
                        <td> </td>
                     </tr>
                  
                     <tr>
                        <td width = "100"> </td>
                        <td>
                           <input name = "add" type = "submit" id = "add" 
                              value = "Update Data in faculty table">
                        </td>
                     </tr>
                  
                  </table>
               </form>
            
      
      <?php
   }
   ?>
</body>
</html>