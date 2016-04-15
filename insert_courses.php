<html>
   
   <head>
      <title>Add New Record in courses table</title>
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
               $id = addslashes ($_POST['id']);
               $cname = addslashes ($_POST['cname']);
               $fid = addslashes ($_POST['fid']);
               $credit = addslashes ($_POST['credit']);
            }else {
               $id = $_POST['id'];
               $cname = $_POST['cname'];
               $fid = $_POST['fid'];
               $credit = $_POST['credit'];
            }
            
            
            
            $sql = "INSERT INTO courses ". 
            "(id,cname,credit,fid) ". 
            "VALUES('$id','$cname',$credit,'$fid')";
               
            mysql_select_db('cs251');
            echo "<div id='query'><i> INSERT INTO <span class='sqltable'>courses</span>(<span class='fields'>id,cname,credit,fid</span>) VALUES(<span class='values'>'$id','$cname',$credit,'$fid'</span>)";
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
                        <td width = "100">Course ID</td>
                        <td><input name = "id" type = "text" 
                           id = "id"></td>
                     </tr>
                  
                     <tr>
                        <td width = "100">Course Name</td>
                        <td><input name = "cname" type = "text" 
                           id = "cname"></td>
                     </tr>
                  
                     <tr>
                        <td width = "100">Credits</td>
                        <td><input name = "credit" type = "text" 
                           id = "credit"></td>
                     </tr>

                      <tr>
                        <td width = "100">Faculty ID</td>
                        <td><input name = "fid" type = "text" 
                           id = "fid"></td>
                     </tr>
                     
                     <tr>
                        <td width = "100"> </td>
                        <td> </td>
                     </tr>
                  
                     <tr>
                        <td width = "100"> </td>
                        <td>
                           <input name = "add" type = "submit" id = "add" 
                              value = "Add Course">
                        </td>
                     </tr>
                  
                  </table>
               </form>
            
            <?php
         }
      ?>
   
   </body>
</html>
