<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title> Login </title>
  <meta content="" name="description">
  <meta content="" name="keywords">


  <?php
  include 'link_of_boot.php';

  ?>

  <link href="assets/css/style.css" rel="stylesheet">


</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">



              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">User Login </h5>
                    <img src="./assets/lg.png" alt="" style='height:4cm;width:80%'>
                    <!-- <p class="text-center small">Enter your username & password to login</p> -->
                  </div>

                  <form class="row g-3 needs-validation" action='login.php' method='POST' novalidate>

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">email</label>
                      <div class="input-group has-validation">
                        <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
                        <input type="email" name="email" class="form-control" id="yourUsername" required>
                        <div class="invalid-feedback">Please enter your email.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <div class="input-group has-validation">
                        <!-- <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-key"></i></span> -->
                        <input type="password" name="password" class="form-control" id="yourPassword" required>
                        <div class="invalid-feedback">Please enter your password!</div>
                      </div>
                    </div>


                    <div class="col-md-12">
                      <label for="yourpannel" class="form-label">User</label>
                      <select id="inputState" class="form-select" name="user">

                        <!-- <option  value='member'>member</option> -->
                        <option value='teacher'>Lecturer</option>
                        <option value='admin'>admin</option>
                      </select>
                    </div>


                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit" name='login'>Login</button>
                    </div>

                  </form>

                </div>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->
  <?php




  include 'connection.php';

  @$login = $_POST["login"];
  @$user = $_POST["user"];
  @$email = $_POST["email"];
  @$pass = $_POST["password"];


  if (isset($login)) {

    if ($user == 'admin') {
      $sql = "SELECT * FROM admin WHERE email='$email' AND password='$pass'";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) === 1) {
        // $row = mysqli_fetch_assoc($result);
  
        // if ($row['user_name'] === $uname && $row['password'] === $pass) {
  
        //   echo "Logged in!";
        $_SESSION['email_name'] = $email;
        //   $_SESSION['id'] = $id;
        // $_SESSION['name'] = $row['name'];
        // $_SESSION['id'] = $row['id'];
        // header("location:./admin/index.php");
        echo "<script>window.location='./admin/admin.php'</script>";
        // exit();
  
      } else {

        // header("Location: index.php?error=Incorect User name or password");
        // echo 'Incorect cridentios';
        echo '<script>alert("Incorect cridentios")</script>';

        // exit();
  
      }

    } elseif ($user === 'teacher') {
      $sql = "SELECT * FROM teacher WHERE email='$email' AND password='$pass'";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) === 1) {

        $sql1 = "SELECT t_id,ccode FROM teacher WHERE email='$email' AND password='$pass'";
        $result1 = mysqli_query($conn, $sql1);
        while ($row = mysqli_fetch_array($result1)) {
          $id = $row['t_id'];
          $code = $row['ccode'];
          //   $reg= $row['reg_number'];
  


        }

        // echo "Logged in!";
        $_SESSION['t_id'] = $id;
        $_SESSION['code'] = $code;
        // $_SESSION['name'] = $name;
        // $_SESSION['team_id'] = $id;
        // $_SESSION['email_name'] = $email;
        echo "<script>window.location='./teacher/teacher.php'</script>";


      } else {
        echo '<script>alert("Incorect cridentios")</script>';

      }

    } else {
      echo '<script>alert("please choose user!")</script>';
    }

  }





  ?>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>