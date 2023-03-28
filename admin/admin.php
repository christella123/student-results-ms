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

<div class="container-fluid">
    <div class="row header">

        <?php
            include 'header.php';
         ?>
      
    </div>

    <div class="row">
        <div class="col-md-1">  
        

        </div>
        <div class="col-md-10"> 
          
      


        <div class="row statistics" style=" background-color: rgb(206, 253, 203)">
        <div class="col-md-4" style="background-color:whitesmoke;border:5px solid lightgreen">
        <center><h3 style="margin-top:1cm">teacher<br/>
    
          
    <?php

    include '../connection.php';
	
  $sql = "SELECT count(t_id)	FROM teacher";
  $result = $conn->query($sql);


    while($row = mysqli_fetch_array($result)) {
     $c=$row['0'];
    }
    echo $c;
     ?>
</h3></center>
    
          </div>




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
        <center><h3 style="margin-top:1cm">courses<br/>
    
          
    <?php

    include '../connection.php';
	
  $sql = "SELECT count(cid)	FROM course";
  $result = $conn->query($sql);


    while($row = mysqli_fetch_array($result)) {
     $c=$row['0'];
    }
    echo $c;
     ?>
</h3></center>
    
          </div>

          <!-- <div class="col-md-4"></div>
          <div class="col-md-4"></div>
          <div class="col-md-4"></div> -->
        </div>
      
      
      
      
      
      
      </div>
        <!-- <div class="col-md-12">  </div> -->
  
    </div>
</div>







  

</body>

</html>