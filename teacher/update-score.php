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

<?php
             include '../connection.php';     
            //  $id= $_GET['id'];

             $sql = "SELECT student.reg,student.fname,student.lname,title,score,semester,academic,score.id FROM course,teacher,student,score where student.reg=score.reg and score.cid=course.cid and teacher.ccode=course.cid and teacher.t_id='$t_id'; ";
                    $result = $conn->query($sql);

                   
                      while($row = mysqli_fetch_array($result)) {
                      //  $i++;
                      

                   
                       $reg=$row["0"];
                       $f=$row["1"];
                       $sn=$row["2"];
                       $t=$row["3"];
                         $m=$row["4"];
                          $ac=$row["6"];
                           $s=$row["5"];
                           $id=$row["7"];


                      }
                      

                                           
                 
                  
                                      ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>student </title>
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
        <div class="col-md-4"></div>


        <div class="col-md-4">
        <div class="col-md-12" style="margin-top:20px;">
      <div class="card">
        <div class="card-header">UPDATE STUDENT</div>
        <div class="card-body">
        <form method="post" id="teacher_login_form" action="update-score.php">

<div class="form-group">
    <label>ACCADEMIC YEAR WAS : <?php echo $ac;  ?></label>
   

    <select id="inputState" class="form-select" name="year">
            
                    
                    <option  value='2022'>2022</option>
                    <option  value='2023'>2023</option>
                    <option  value='2023'>2024</option>
                    <option  value='2023'>2025</option>
          
            </select>
  </div><br/>


  <div class="form-group">
    <label>SEMESTER WAS SEMESTER <?php 

if($s=='s1')
{
    $se='1';
}elseif($s=='s2'){
    $se=" 2";
}
else{
    $se='3';
}
echo $se;


    
    
    ?></label>
   

    <select id="inputState" class="form-select" name="seme">
            
                    
                    <option  value='s1'>Semester 1</option>
                    <option  value='s2'>semester 2</option>
                    <option  value='s3'>semester 3</option>
              
          
            </select>
  </div><br/>




  <div class="form-group">
    <label>STUDENT</label>
    <input type="text" name="names" id="" class="form-control" value="<?php  echo "REG NO :".$reg." NAMES:".$f." ".$sn ?>" disabled/>

   
  </div>


  <br/>
<div class="form-group">
    <label>Course Title</label>
   


    <input type="text" name="title" id="" class="form-control" value=" <?php echo $t; ?>" disabled />
    <span id="error_teacher_password" class="text-danger"></span>
  </div>

  <br/>
<div class="form-group">
    <label>SCORE /100</label>
   


    <input type="text" name="marks" id="" class="form-control" value=" <?php echo $m; ?>" />
    <span id="error_teacher_password" class="text-danger"></span>
  </div>
  <br/>
  </div>



  
  <div class="form-group">
    <input type="submit" name="submit" id="teacher_login" class="btn btn-info" value="SAVE CHANGES" />
  </div>
</form>
        </div>
      </div>
    </div>
        </div>
        <div class="col-md-4"></div>
        </div>
        <!-- //row -->
<br/>
       
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
// @$code=$_POST["code"];
@$marks=$_POST["marks"];
@$year=$_POST["year"];
@$sx=$_POST["seme"];





      if(isset($go))
    {
	

      if($marks!='')
      {
 


            if($marks>=0 && $marks<=100)
        {
           $sql = "UPDATE `score` SET `score` = '$marks', `academic` = '$year', `semester` = '$sx' WHERE `score`.`id` = '$id'";
    
              if (mysqli_query($conn, $sql)) {
    
                echo '<script>alert("marks updated  successfull")</script>';
                echo "<script>window.location='./score.php'</script>";
              } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
              }
    
              mysqli_close($conn);
        }else{
          echo '<script>alert(" marks must between 0-100")</script>';
        }
    
             
          
        }else{
         echo '<script>alert("Make sure all field are filled")</script>';
        }
        
        
        }

?>