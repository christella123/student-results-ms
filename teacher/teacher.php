<?php
// include 'connection.php';

session_start();
   $t_id=$_SESSION['t_id'];
   $c=$_SESSION['code'];
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

  <title>TEACHER DASHBOARD </title>
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
          
      


        <div class="row statistics"  style=" background-color: rgb(206, 253, 203)">
        <div class="col-md-4" style="background-color:whitesmoke;border:5px solid lightgreen">
        <center><h3 style="margin-top:1cm">students<br/>
    
          
    <?php

    include '../connection.php';
	
  $sql = "SELECT count(reg)	FROM student";
  $result = $conn->query($sql);


    while($row = mysqli_fetch_array($result)) {
     $c=$row['0'];
    }
    echo $c;
     ?>
</h3></center>
    
          </div>
          


          <div class="col-md-4" style="background-color:whitesmoke;border:5px solid lightgreen">
        <center><h3 style="margin-top:1cm">students got marks<br/>
    
          
    <?php

    include '../connection.php';
	
  $sql = "SELECT count(student.reg) FROM course,teacher,student,score
  where student.reg=score.reg and score.cid=course.cid and teacher.ccode=course.cid and teacher.t_id='$t_id'; ";
  $result = $conn->query($sql);


    while($row = mysqli_fetch_array($result)) {
     $c=$row['0'];
    }
    echo $c;
     ?>
</h3></center>
    
          </div>
        
        </div>
      
      
      
      
      
      
      </div>
        <!-- <div class="col-md-12">  </div> -->
  
    </div>
</div>







  

</body>

</html>