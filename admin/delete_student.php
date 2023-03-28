<?php
             include '../connection.php';     
                   $id= $_GET['reg'];
                   
                 
                  
                 
                    // $x= $team_id;
                    //echo '<script>alert("Welcome to Geeks for Geeks")</script>';
                  
                      $my_q ="delete from student  WHERE `reg` ='$id'";
                      $results= $conn->query($my_q);
                      if ($results) {
                        
                        $my_q ="delete from score  WHERE `reg` ='$id'";
                        $results= $conn->query($my_q);

                        // $my_q1 ="delete from project_feedback WHERE `team_id` ='$team_id'";
                        // $results= $conn->query($my_q1);


                        // $my_q3 ="update  project set team_id='unsigned', 
                        // status='unsigned',start_date='not yet',end_date='not yet' where team_id='$team_id'";
                        // $results= $conn->query($my_q3);


                        echo '<script>alert("Well deleted")</script>';
                        echo "<script>window.location='./student.php'</script>";
                  
                        
                      } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                      }
                  
                      mysqli_close($conn);
                  
                                      ?>