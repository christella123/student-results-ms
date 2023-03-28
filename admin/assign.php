<?php
// include 'connection.php';

session_start();

  if(!isset($_SESSION['email_name']))
  {
    echo "<script>window.location='../login.php'</script>";
  }else
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>ADMIN DASHBOARD </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <?php
            include 'bot.php';
         ?>

</head>

<body>

<div class="container-fluid ">
    <div class="row header">
  
        <?php
            include 'header.php';
         ?>
       
    </div>

    <div class="row">
        <div class="col-md-1">  
        

        </div>
        <div class="col-md-10"> 

        <div class="row"> 
      <!-- //empt -->
    


        <div class="col-md-4">
        <div class="col-md-12" style="margin-top:20px;">
      <div class="card">
        <div class="card-header">ASSIGN COURSE FORM</div>
        <div class="card-body">
          <form method="post" id="teacher_login_form" action="assign.php">
            <div class="form-group">
              <label>COURSE</label>
             

              <select id="inputState" class="form-select" name="code">
                      <!-- <option selected>Choose...</option> -->

                      <?php
                            include '../connection.php';
          
                            $sql = "SELECT cid,title FROM course,teacher where teacher.ccode!=course.cid";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                              // output data of each row
                              while($row = mysqli_fetch_array($result)) {
                              // echo "id: " . $row["id"]. " - Name: " . $row["reg_number"]. " " . $row["1"]. "<br>";
                              ?>
                            
                              
                              <option  value='<?php echo $row["0"];?>'><?php echo $row["1"];?></option>
                              
                              <?php
                              }
                            } else {
                              echo "0 results";
                            }
                          ?>
                                
                        
                      </select>
            </div>


            <br/><br/>
      <div class="form-group">
              <label>TEACHER</label>
             

              <select id="inputState" class="form-select" name="tcode">
                      <!-- <option selected>Choose...</option> -->

                      <?php
                            include '../connection.php';
          
                            $sql = "SELECT t_id,fname,lname FROM teacher where ccode=''";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                              // output data of each row
                              while($row = mysqli_fetch_array($result)) {

                                // $name=;
                              // echo "id: " . $row["id"]. " - Name: " . $row["reg_number"]. " " . $row["1"]. "<br>";
                              ?>
                            
                              
                              <option  value='<?php echo $row["0"];?>'><?php echo $row['1']." ".$row['2']?></option>
                              
                              <?php
                              }
                            } else {
                              echo "0 results";
                            }
                          ?>
                                
                        
                      </select>
            </div>



            <br/>
            
            <div class="form-group">
              <input type="submit" name="submit" id="teacher_login" class="btn btn-info" value="ASSIGN" />
            </div>
          </form>
        </div>
      </div>
    </div>
        </div>
        

        
        <div class="col-md-8">
        <!-- <div class="col-lg-12"> -->
          <?php

        $sql = "SELECT title,fname,lname,ccode FROM course,teacher where teacher.ccode=course.cid";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                     $i=0;
                     ?>
  <br/>
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">List of courses and their corresponding teachers</h5>
      <br/>

      <!-- Table with stripped rows -->

       
      <table class="table table-striped table-responsive">
        <thead>
          <tr>
            <th scope="col">#</th>
            
            <th scope="col">course title</th>
            <th scope="col">teacher name</th>
            <!-- <th scope="col">EMAIL</th>
            <th scope="col">ROLE</th> -->
            <!-- <th scope="col" colspan="3" style="text-align:center">Modify</th> -->
          </tr>
        </thead> 
        <tbody>

        <?php
                    include '../connection.php';
	
                  
                      while($row = mysqli_fetch_array($result)) {
                       $i++;
                       ?>

                          <tr>
                      <th scope="row"><?php echo $i; ?></th>
                      <td><?php echo $row["title"];?></td>
                      <td><?php echo $row["fname"];?></td>
                      <td> <a href="delete_assign.php?id=<?php echo $row["ccode"] ?>"><i class="bi bi-trash-fill" ></i> </a></td>
                   
                     
                     
                    </tr>
                       <?php
                      }
                    } else {
                      ?>
                      <br/>
                      <div class="card">
        <div class="card-body">
          <h5 class="card-title">there is no course has lecturer</h5>
        </div></div>
    
                        <?php
                    }
                  ?>
                 
       
       
     
        </tbody>
      </table>
      <!-- End Table with stripped rows -->

    <!-- </div> -->
  </div>

 

  

</div>
</div>
        </div>
        </div>
    

        <!-- //main cont -->
        </div>
      
      </div>
        <!-- <div class="col-md-12">  </div> -->
  
    </div>
</div>







  

</body>

</html>
<?php

@$go=$_POST["submit"];
// @$reg=$_POST["reg"];
@$code=$_POST["code"];
@$tcode=$_POST["tcode"];




      if(isset($go))
    {
	

        //echo '<script>alert("Welcome to Geeks for Geeks")</script>';

          $sql = "UPDATE `teacher` SET `ccode` = '$code' WHERE `teacher`.`t_id` = '$tcode'";

          if (mysqli_query($conn, $sql)) {

            
            echo '<script>alert("Well assigned")</script>';
            echo "<script>window.location='./assign.php'</script>";
          }else{
            echo '<script>alert("not done")</script>';
          }
        }

?>