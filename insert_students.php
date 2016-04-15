<html>
   
   <head>
      <title>Add New Record in students table</title>
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
               $name = addslashes ($_POST['name']);
               $dept = addslashes ($_POST['dept']);
               $roll = addslashes ($_POST['roll']);
            }else {
               $name = $_POST['name'];
               $dept = $_POST['dept'];
               $roll = $_POST['roll'];
            }
            
            
            $sql = "INSERT INTO students ". 
            "(roll,name,dept) ". 
            "VALUES($roll,'$name','$dept')";
               
            mysql_select_db('cs251');

            echo "<div id='query'><i> INSERT INTO <span class='sqltable'>students</span>(<span class='fields'>roll, name, dept</span>) VALUES(<span class='values'>$roll,'$name','$dept'</span>)";
            
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
                        <td width = "100">Student Roll No.</td>
                        <td><input name = "roll" type = "text" 
                           id = "roll"></td>
                     </tr>
                  
                     <tr>
                        <td width = "100">Student Name</td>
                        <td><input name = "name" type = "text" 
                           id = "name"></td>
                     </tr>
                  
                     <tr>
                        <td width = "100">Student Department</td>
                        <td><input name = "dept" type = "text" 
                           id = "dept"></td>
                     </tr>
<tr>
                        <td width = "100"> </td>
                        <td> </td>
                     </tr>
                  
                     <tr>
                        <td width = "100"> </td>
                        <td>
                           <input name = "add" type = "submit" id = "add" 
                              value = "Add Student">
                        </td>
                     </tr>
                  
                  </table>
               </form>
            
            <?php
         }
      ?>
   
   </body>
</html>
