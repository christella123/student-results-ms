<?php
// include 'connection.php';

session_start();

$reg=$_SESSION['reg'];
$fname=$_SESSION['fname'];

  if(!isset($_SESSION['reg']))
  {
    echo "<script>window.location='../login1.php'</script>";
  }else
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>student</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <?php
            include 'bot.php';
         ?>

</head>

<body>

<body class="">

    <div class="container">
    <div class="row headerx" style='background-color: rgb(179, 249, 175);color:black'>

<?php
    include 'header.php';
 ?>

</div>

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">



            

                <div class="card o-hidden border-0  my-5 myp" style='background-color: rgb(179, 249, 175)'>
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row" style="padding:0.7cm ;">
                            <div class="col-lg-5 d-none d-lg-block">
                            <div class="card" style="padding:0cm ;">
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
              <input type="submit" name="submit" id="teacher_login" class="btn btn-info col-md-12" value="GET MARKS" />

              
            </div>
          </form>
        </div>
      </div>
                            </div>
                            <div class="col-lg-7 ">
                                <div class="p-5">
                                    <div class="text-left">



                                    

                                    <?php
                    include '../connection.php';

                    @$go=$_POST["submit"];
// @$reg=$_POST["reg"];
@$s=$_POST["seme"];
@$y=$_POST["year"];

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

        ?>

        <h5>Marks for academic year <?php echo $y ?> in semester   <?php echo $se ?> </h5>

        <br/>
        <!-- Names: <?php //echo $fname." ".$lname ?> -->

        
        <table style="width: 50%">
        <?php

        

        
	
	
                    $sql = "SELECT student.reg,student.fname,student.lname,title,score,semester,academic FROM course,teacher,student,score where student.reg=score.reg 
                    and score.cid=course.cid and teacher.ccode=course.cid and academic='$y' and semester='$s' and student.reg='$reg' ";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                     $i=0;
                      while($row = mysqli_fetch_array($result)) {
                       $i++;

                       $reg=$row["0"];
                       $fname=$row["1"];
                       $lname=$row["2"];
                       $title=$row["3"];
                       $score=$row["4"];

                       ?>

                      <tr>
                        <td><?php echo $title; ?></td> <td><?php echo $score; ?></td>
                      </tr>

                       

                       

                       <?php
                      }?>
                      </table>
                      <a href='login.php'>    <button name="login" onclick=print(); type='submit'class="btn btn-info btn-user btn-block" style="margin-top:2.5cm ;">
                                    print
                                </button></a>
                      
                      <?php
                    } else {
                     ?>
                     <div class="card-body" style="background-color: whitesmoke;">
      <h5 class="card-title">there is no marks  recorded in academic year <?php echo $y; ?> and trimester <?php echo $se; ?></h5>
    </div></div>


<?php
                    }
                }else{

               
                  ?>

                                     <h1 class="h5 text-gray-900 mb-4"><b>SEACHING MARKS TERMS AND CONDITION</b> </h1>
                                    </div>
                                    <p>
                                       Make sure you choose write accademic year and semester in other ways you will gnot get your marks
                                       property
    

                                    </p>
                                   
                                    <!-- <hr> -->
                                <br/> 
                                    <a href=''>    <button name="login" type='submit'class="btn btn-primary btn-user btn-block col-md-6">
                                    readmore....
                                </button></a>










<?php
 }

?>









                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>




</body>


  

</body>

</html>