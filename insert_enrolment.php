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
               $cid = addslashes ($_POST['cid']);
            }else {
               $cid = $_POST['cid'];
            }
            
            $roll = $_POST['roll'];
            $assn = $_POST['assn'];
            $quiz = $_POST['quiz'];
            $msem = $_POST['msem'];
            $total = $assn + $quiz + $msem ;

            if($total>150){
               $grade = 'A';
            }
            elseif ($total>120) {
               $grade = 'B';
            }
            elseif ($total>80) {
               $grade = 'C';
            }
            elseif ($total>50) {
               $grade = 'D';
            }
            else {
               $grade = 'F';
            }
            
            $sql = "INSERT INTO enrolment ". 
            "(roll,cid,assn,quiz,msem,total,grade) ". 
            "VALUES($roll,'$cid',$assn,$quiz,$msem,$total,'$grade')";
               
            mysql_select_db('cs251');
            echo "<div id='query'><i> INSERT INTO <span class='sqltable'>enrolment</span>(<span class='fields'>roll,cid,assn,quiz,msem,total,grade</span>) VALUES(<span class='values'>$roll,'$cid',$assn,$quiz,$msem,$total,'$grade'</span>)";
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
                        <td width = "100">Course ID</td>
                        <td><input name = "cid" type = "text" 
                           id = "cid"></td>
                     </tr>
                  
                     <tr>
                        <td width = "100">Assignment Marks</td>
                        <td><input name = "assn" type = "text" 
                           id = "assn"></td>
                     </tr>

                     <tr>
                        <td width = "100">Quiz Marks</td>
                        <td><input name = "quiz" type = "text" 
                           id = "quiz"></td>
                     </tr>

                     <tr>
                        <td width = "100">Mid-Sem Marks</td>
                        <td><input name = "msem" type = "text" 
                           id = "msem"></td>
                     </tr>
                     
                     <tr>
                        <td width = "100"> </td>
                        <td> </td>
                     </tr>
                  
                     <tr>
                        <td width = "100"> </td>
                        <td>
                           <input name = "add" type = "submit" id = "add" 
                              value = "Add Student Details">
                        </td>
                     </tr>
                  
                  </table>
               </form>
            
            <?php
         }
      ?>
   
   </body>
</html>
