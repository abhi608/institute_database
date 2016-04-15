<html>
   
   <head>
      <title>Add New Record in faculty table</title>
      <link rel="stylesheet" href="styles.css">
   </head>
   
   <body>
      <?php
         if(isset($_POST['add'])) {
            $dbhost = 'localhost:3036';
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
            
            
            $sql = "INSERT INTO faculty ". 
            "(fid,fname,cid) ". 
            "VALUES('$fid','$fname','$cid')";
               
            mysql_select_db('cs251');
            echo "<div id='query'><i> INSERT INTO <span class='sqltable'>faculty</span>(<span class='fields'>fid,fname,cid</span>) VALUES(<span class='values'>'$fid','$fname','$cid'</span>)";
$retval = mysql_query( $sql, $conn );
            
            if(! $retval ) {
               die('Could not enter data: ' . mysql_error());
            }
            
            echo "Entered data successfully\n";
            
            mysql_close($conn);
         }else {
            ?>
            
               <form method = "post" action = "<?php $_PHP_SELF ?>">
                  <table width = "400" border = "0" cellspacing = "1" 
                     cellpadding = "2">
                  
                     <tr>
                        <td width = "100">Faculty ID</td>
                        <td><input name = "fid" type = "text" 
                           id = "fid"></td>
                     </tr>
                  
                     <tr>
                        <td width = "100">Faculty Name</td>
                        <td><input name = "fname" type = "text" 
                           id = "fname"></td>
                     </tr>
                  
                     <tr>
                        <td width = "100">Course ID</td>
                        <td><input name = "cid" type = "text" 
                           id = "cid"></td>
                     </tr>
<tr>
                        <td width = "100"> </td>
                        <td> </td>
                     </tr>
                  
                     <tr>
                        <td width = "100"> </td>
                        <td>
                           <input name = "add" type = "submit" id = "add" 
                              value = "Add Faculty">
                        </td>
                     </tr>
                  
                  </table>
               </form>
            
            <?php
         }
      ?>
   
   </body>
</html>
