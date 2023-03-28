<?php
             include '../connection.php';     
             $id= $_GET['id'];



        //echo '<script>alert("Welcome to Geeks for Geeks")</script>';

          $sql = "UPDATE `teacher` SET `ccode` = ''
         WHERE `teacher`.`ccode` = $id";

          if (mysqli_query($conn, $sql)) {

            echo '<script>alert("Well updated")</script>';
            echo "<script>window.location='./assign.php'</script>";
          } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          }

        
      
	  
	  
	  
	  
	  


?>