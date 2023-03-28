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


       
        
        <!-- //row -->
<br/>
        <div class="row">
        <!-- <div class="col-md-2"></div> -->
        <div class="col-md-12">
          <div class="row">
        <div class="col-md-6"></div>  
        <div class="col-md-4">
         
                          </div></div>


        <?php
                    include '../connection.php';
	
                    $sql = "SELECT student.reg,student.fname,student.lname,title,score FROM course,teacher,student,score
                     where student.reg=score.reg and score.cid=course.cid and teacher.ccode=course.cid and teacher.t_id='$t_id'; ";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {

                      ?>
  <br/>
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">List of marks </h5>
      <br/>

      <!-- Table with stripped rows -->

       
      <table class="table table-striped table-responsive">
        <thead>
          <tr>
            <th scope="col">NO</th>
            
            <th scope="col">reg no</th>
            <th scope="col">First name</th>
            <th scope="col">last name</th>
            <th scope="col">title</th>
            <th scope="col">score</th>
            <th scope="col">accademic year </th>
            <th scope="col">semester </th>
            <th scope="col" colspan="2" style="text-align:center">Modify</th>
            <!-- <th scope="col">score</th> -->
            <!-- <th scope="col">EMAIL</th>
            <th scope="col">ROLE</th> -->
            <!-- <th scope="col" colspan="3" style="text-align:center">Modify</th> -->
          </tr>
        </thead> 
        <tbody>

        <?php
                    include '../connection.php';
	
                    $sql = "SELECT student.reg,student.fname,student.lname,title,score,semester,academic,score.id FROM course,teacher,student,score where student.reg=score.reg and score.cid=course.cid and teacher.ccode=course.cid and teacher.t_id='$t_id'; ";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                     $i=0;
                      while($row = mysqli_fetch_array($result)) {
                       $i++;
                       ?>

                          <tr>
                      <th scope="row"><?php echo $i; ?></th>
                      <td><?php echo $row["0"];?></td>
                      <td><?php echo $row["1"];?></td>
                      <td><?php echo $row["2"];?></td>
                      <td><?php echo $row["3"];?></td>
                      <td><?php echo $row["4"];?></td>
                      <td><?php echo $row["6"];?></td>
                      <td><?php echo $row["5"];?></td>
                                           
                      <td> <a href="delete_score.php?id=<?php echo $row["id"]  ?>"><i class="bi bi-trash-fill" ></i> </a></td>
                      <td>  <a href="update-score.php?id=<?php echo $row["id"]  ?>"><i class="bi bi-pencil-square"></i> </a> </td>
                   
                   
                     
                     
                    </tr>
                       <?php
                      }
                    } else {
                      echo "0 results";
                    }
                  ?>
                 
       
       
     
        </tbody>
      </table>
      <!-- End Table with stripped rows -->

    <!-- </div> -->
  </div>

 

  

</div>
</div>
<?php
             }else{
                 ?>
                 <br/>
                  <div class="card">
    <div class="card-body">
      <h5 class="card-title">there is not any recorded</h5>
    </div></div>

                    <?php
                    }
                    ?>
        </div>
        </div>
    

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
           $sql = "INSERT INTO `score` (`id`, `reg`, `cid`, `score`, `academic`, `semester`) VALUES (NULL, '$code', '$c', '$marks', '$year', '$s')";
    
              if (mysqli_query($conn, $sql)) {
    
                echo '<script>alert("marks recorded  successfull")</script>';
                echo "<script>window.location='./score.php'</script>";
              } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
              }
    
              mysqli_close($conn);
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