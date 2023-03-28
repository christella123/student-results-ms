<?php
// include 'connection.php';

session_start();
include('../connection.php');
if (!isset($_SESSION['email_name'])) {
  echo "<script>window.location='../login.php'</script>";
} else

  $departments = mysqli_query($conn, "SELECT * FROM departments");
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
          <div class="col-md-4">
            <div class="col-md-12" style="margin-top:20px;">
              <div class="card">
                <div class="card-header">ADD STUDENT</div>
                <div class="card-body">
                  <form method="post" id="teacher_login_form">

                    <div class="form-group">
                      <label>STUDENT REGNUMBER</label>
                      <input type="text" name="reg" id="teacher_emailid" class="form-control" />
                      <span id="error_teacher_emailid" class="text-danger"></span>
                    </div>
                    <br />

                    <div class="form-group">
                      <label>FIRST NAME</label>
                      <input type="text" name="fname" id="teacher_password" class="form-control" />
                      <span id="error_teacher_password" class="text-danger"></span>
                    </div>
                    <br />

                    <div class="form-group">
                      <label>LAST NAME</label>
                      <input type="text" name="lname" id="teacher_password" class="form-control" />
                      <span id="error_teacher_password" class="text-danger"></span>
                    </div>
                    <br />

                    <div class="form-group">
                      <label>EMAIL</label>
                      <input type="email" name="email" id="teacher_password" class="form-control" />
                      <span id="error_teacher_password" class="text-danger"></span>
                    </div>
                    <br />

                    <div class="form-group">
                      <label>DEPARTMENT NAME</label>
                      <select id="inputState" class="form-select" name="dep">
                        <?php
                        while ($row = mysqli_fetch_array($departments)) {
                          echo "<option value='" . $row['department'] . "'>" . $row['department'] . "</option>";
                        }
                        ?>
                      </select>
                    </div>
                    <br />
                    <div class="form-group">
                      <label>Password</label>
                      <input type="password" name="pass" id="teacher_password" class="form-control" />
                      <span id="error_teacher_password" class="text-danger"></span>
                    </div>
                    <br />
                    <br />

                    <div class="form-group">
                      <input type="submit" name="submit" id="teacher_login" class="btn btn-info" value="ADD STUDENT" />

                      <input type="reset" name="reset" id="teacher_login" class="btn btn-danger" value="CLEAN DATA" />
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- </div> -->




















          <div class="col-md-8">
            <div>

              <!-- <div class="col-md-4"></div> -->
            </div>
            <!-- //row -->
            <br />
            <div class="row">
              <div class="col-md-12">
                <!-- <div class="col-lg-12"> -->



                <?php
                include '../connection.php';

                $sql = "SELECT * FROM student";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {

                  ?>

                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">List of students</h5>

                      <!-- Table with stripped rows -->


                      <table class="table table-striped table-responsive">
                        <thead>
                          <tr>
                            <th scope="col">NO</th>

                            <th scope="col">FIRST NAME</th>
                            <th scope="col">LAST NAME</th>
                            <th scope="col">EMAIL</th>
                            <th scope="col">DEPARTMENT</th>
                            <th scope="col" colspan="3" style="text-align:center">Modify</th>
                          </tr>
                        </thead>
                        <tbody>

                          <?php
                          include '../connection.php';

                          $sql = "SELECT reg,fname,lname,email,department		 FROM student";
                          $result = $conn->query($sql);

                          if ($result->num_rows > 0) {
                            $i = 0;
                            while ($row = mysqli_fetch_array($result)) {
                              $i++;
                              ?>

                              <tr>
                                <th scope="row">
                                  <?php echo $i; ?>
                                </th>
                                <td>
                                  <?php echo $row["fname"]; ?>
                                </td>
                                <td>
                                  <?php echo $row["lname"]; ?>
                                </td>
                                <td>
                                  <?php echo $row["email"]; ?>
                                </td>
                                <td>
                                  <?php echo $row["department"]; ?>
                                </td>

                                <td> <a href="delete_student.php?reg=<?php echo $row["reg"] ?>"><i
                                      class="bi bi-trash-fill"></i> </a></td>
                                <td> <a href="update-student.php?id=<?php echo $row["reg"] ?>"><i
                                      class="bi bi-pencil-square"></i> </a> </td>

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

                  <?php
                } else {
                  ?>
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">there is no student recorded</h5>
                    </div>
                  </div>

                  <?php
                }
                ?>

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
include '../connection.php';




@$go = $_POST["submit"];
@$reg = $_POST["reg"];
@$fname = $_POST["fname"];
@$email = $_POST["email"];
@$lname = $_POST["lname"];
@$dep = $_POST["dep"];
@$pass = $_POST["pass"];



if (isset($go)) {
  if ($reg != '' or $fname != '' or $lname != '' or $dep != '' or $email != '' or $pass != '') {

    $sql = "SELECT * FROM student where  reg='$reg'";
    $result = $conn->query($sql);

    if ($result->num_rows === 0) {
      //echo '<script>alert("Welcome to Geeks for Geeks")</script>';

      $sql = "INSERT INTO `student` (`reg`, `fname`, `lname`, `email`, `department`, `password`) VALUES ('$reg', '$fname', '$lname', '$email', '$dep', '$pass')";

      if (mysqli_query($conn, $sql)) {

        echo '<script>alert("Well Added")</script>';
        echo "<script>window.location='./student.php'</script>";
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }

      mysqli_close($conn);
    } else {
      echo '<script>alert("that member already exist")</script>';
    }
  } else {
    echo '<script>alert("Make sure all field are filled")</script>';
  }



}



?>