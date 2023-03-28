<?php
// include 'connection.php';

session_start();
   $t_id=$_SESSION['t_id'];
   $c=$_SESSION['code'];


  //  <?php
   include '../connection.php';

  //  $sql = "SELECT student.reg,student.fname,student.lname,title,score FROM course,teacher,student,score where student.reg=score.reg and score.cid=course.cid and teacher.ccode=course.cid and teacher.t_id='$t_id'; ";
  //  $result = $conn->query($sql);

  //  if ($result->num_rows > 0) {

  



  if(!isset($_SESSION['t_id']))
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
      <div class="col-md-2"></div>
      
        <div class="col-md-4">
        <br/>
        <div class="card">
        <div class="card-header"> REASONS INFORMATION<br/>
        course title:  




        <?php
                    include '../connection.php';
	
                    $sql = "SELECT title FROM course,teacher where  teacher.ccode=course.cid and teacher.t_id='$t_id'; ";
                    $result = $conn->query($sql);

                    if (mysqli_num_rows($result) === 1)
                    {
                      while($row = mysqli_fetch_array($result)) {
                      //  $i++;
                       ?>

                      <td><?php echo $row["0"];?></td>
     
                       <?php
                      }
                    }else{
                      echo "not yet assigned module";
                    }
                    
                  ?>
                 



        



        </div>
        <!-- <div class="card-body"> -->

        <!-- </div> -->
        </div>

        </div>


        <div class="col-md-4">
        <div class="col-md-12" style="margin-top:20px;">
      <div class="card">
        <div class="card-header"> COURSE FORM</div>
        <div class="card-body">
          <form method="post" id="teacher_login_form" action="score.php">

          <div class="form-group">
              <label>ACCADEMIC YEAR</label>
             

              <select id="inputState" class="form-select" name="year">
                      
                              
                              <option  value='2022'>2022</option>
                              <option  value='2023'>2023</option>
                             
                    
                      </select>
            </div><br/>


            <div class="form-group">
              <label>SEMESTER</label>
             

              <select id="inputState" class="form-select" name="seme">
                      
                              
                              <option  value='s1'>Semester 1</option>
                              <option  value='s2'>semester 2</option>
                              <option  value='s3'>semester 3</option>
                        
                    
                      </select>
            </div><br/>




            <div class="form-group">
              <label>STUDENT</label>
             

              <select id="inputState" class="form-select" name="code">
                      <!-- <option selected>Choose...</option> -->

                      <?php
                            include '../connection.php';
          
                            $sql = "SELECT reg,fname,lname FROM student";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                              // output data of each row
                              while($row = mysqli_fetch_array($result)) {
                              // echo "id: " . $row["id"]. " - Name: " . $row["reg_number"]. " " . $row["1"]. "<br>";
                              ?>
                            
                              
                              <option  value='<?php echo $row["0"];?>'><?php echo $row["0"]." ".$row["1"]." ".$row["2"];?></option>
                              
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
              <label>SCORE /100</label>
             

  
              <input type="number" name="marks" id="" class="form-control" />
              <span id="error_teacher_password" class="text-danger"></span>
            </div>
            <br/>
            </div>



            
            <div class="form-group">
              <input type="submit" name="submit" id="teacher_login" class="btn btn-info col-md-6" value="ADD MARKS" />
            </div>
          </form>
        </div>
      </div>
    </div>
        </div>
        <div class="col-md-4"></div>
        
        <!-- //row -->
<br/>
        <div class="row">
        <!-- <div class="col-md-2"></div> -->
        <div class="col-md-12">
          
 

  


    

        <!-- //main cont -->
        </div>
      
      </div>
        <!-- <div class="col-md-12">  </div> -->
  
    </div>
</div>

</div>





  

</body>

</html>
<?php

@$go=$_POST["submit"];
// @$reg=$_POST["reg"];
@$code=$_POST["code"];
@$marks=$_POST["marks"];
@$year=$_POST["year"];
@$s=$_POST["seme"];





      if(isset($go))
    {
	

      if($marks!='')
      {
        
    $sql = "SELECT * FROM score where  reg='$code' and cid='$c'";
      $result = $conn->query($sql);
    
      if ($result->num_rows ===0) 
              {
            //echo '<script>alert("Welcome to Geeks for Geeks")</script>';


            if($marks>=0 && $marks<=100)
        {



          $sql = "SELECT title FROM course,teacher where  teacher.ccode=course.cid and teacher.t_id='$t_id'; ";
          $result = $conn->query($sql);

          if (mysqli_num_rows($result) === 1)
          {
            while($row = mysqli_fetch_array($result)) {
            //  $i++;
            

$sql = "INSERT INTO `score` (`id`, `reg`, `cid`, `score`, `academic`, `semester`) VALUES (NULL, '$code', '$c', '$marks', '$year', '$s')";
    
    if (mysqli_query($conn, $sql)) {

      echo '<script>alert("marks recorded  successfull")</script>';
      echo "<script>window.location='./score.php'</script>";
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);



            
            }
          }else{
            echo '<script>alert("you are not yet assigned to course you cant not record marks with out course")</script>';
          }


       





        }else{
          echo '<script>alert(" marks must between 0-100")</script>';
        }
    
             
          }else{
        echo '<script>alert("that marks already recorded")</script>';
        }
        }else{
         echo '<script>alert("Make sure all field are filled")</script>';
        }
        
        
        }

?>