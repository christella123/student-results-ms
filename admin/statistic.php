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
      <div class="col-md-6"></div>
      
        <div class="col-md-4">
        <br/>   
        <?php
                    include '../connection.php';
	
                    $sql = "SELECT student.reg,student.fname,student.lname,title,score FROM course,teacher,student,score where student.reg=score.reg and score.cid=course.cid 
                    and teacher.ccode=course.cid ";
                    $result = $conn->query($sql);

                
                     
                      while($row = mysqli_fetch_array($result)) {
                      //  $i++;
                       ?>

                      
                   
                      <td><?php //echo $row["3"];?></td>
                      
                   
                   
                     
                     
                 
                       <?php
                      }
                    
                  ?>
        </div>
        <div class="col-md-6"></div>
        <div class="col-md-12" style="margin-top:20px;">
      
      </div>
    </div>
        </div>
        <div class="col-md-4"></div>
        
        <!-- //row -->
<br/>
        <div class="row">
        <!-- <div class="col-md-2"></div> -->
        <div class="col-md-12">
          <div class="row">
        <div class="col-md-4">
          
        <div class="card-header">SEARCH YOUR MARKS</div>
        <div class="card-body">
          <form method="post" id="teacher_login_form">

            

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
              <label>DEPARTMENT NAME</label>
              <select id="inputState" class="form-select" name="dep">
                      
                              
                      <option  value='BIT'>BIT</option>
                      <option  value='STATISTICS'>STATISTICS</option>
                      <option  value='ACCOUNTING'>ACCOUNTING</option>
                     
            
              </select>
            </div>
            <br/>

    

            <div class="form-group">
              <input type="submit" name="submit" id="teacher_login" class="btn btn-info col-md-12" value="GET MARKS" />
              <br><br>

              
            </div>
          </form>
        </div>
      </div>


        </div>  






        <div class="col-md-4">
         
                          </div></div>


        <?php
                    include '../connection.php';

                    @$saci=$_POST["saci"];
                    @$gos=$_POST["s"];
                    
                    
         
                    



                    @$go=$_POST["submit"];
@$s=$_POST["seme"];
@$y=$_POST["year"];
@$d=$_POST["dep"];

if($s=='s1')
{
    $se='1';
}elseif($s=='s2'){
    $se=" 2";
}
else{
    $se='3';
}




      if(isset($go))
    {
                        
	
                    $sql = "SELECT student.reg,student.fname,student.lname,title,score FROM course,teacher,student,score
                     where student.reg=score.reg and score.cid=course.cid and teacher.ccode=course.cid and academic='$y' and semester='$s' and department='$d' ";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {

                      ?>
                      <br>
  
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">List of marks  for student in  deparment of <?php echo $d;?> year  <?php echo $y;?> semester <?php echo $se;?> </h5>
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
         
            
            <!-- <th scope="col">score</th> -->
            <!-- <th scope="col">EMAIL</th>
            <th scope="col">ROLE</th> -->
            <!-- <th scope="col" colspan="3" style="text-align:center">Modify</th> -->
          </tr>
        </thead> 
        <tbody>

        <?php
                    include '../connection.php';
	
                    $sql = "SELECT student.reg,student.fname,student.lname,title,score,semester,academic,score.id,department FROM course,teacher,student,score
                     where student.reg=score.reg and score.cid=course.cid and teacher.ccode=course.cid order by department asc";
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
                  <div class="card">
    <div class="card-body">
      <h5 class="card-title">there is not any recorded</h5>
    </div></div>

                    <?php
                    } 
                   }else{
                    // echo 'hh';
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
