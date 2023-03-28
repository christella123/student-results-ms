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
                    <h5 class="card-title text-center pb-0 fs-4">STUDENT LOGIN</h5>
                    <img src="./assets/lg.png" alt="" style='height:4cm;width:80%'>

                  </div>

                  <form class="row g-3 needs-validation" action='studentLogin.php' method='POST' novalidate>

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">REG NUMBER</label>
                      <div class="input-group has-validation">

                        <input type="number" name="reg" class="form-control" id="yourUsername" required>
                        <div class="invalid-feedback">Please enter regnumber.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <div class="input-group has-validation">

                        <input type="password" name="password" class="form-control" id="yourPassword" required>
                        <div class="invalid-feedback">Please enter your password!</div>
                      </div>
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
  @$reg = $_POST["reg"];
  @$pass = $_POST["password"];


  if (isset($login)) {
    $sql = "SELECT * FROM student WHERE reg='$reg' AND password='$pass'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) === 1) {

      $sql1 = "SELECT reg,fname FROM student WHERE reg='$reg' AND password='$pass'";
      $result1 = mysqli_query($conn, $sql1);
      while ($row = mysqli_fetch_array($result1)) {
        $id = $row['reg'];
        $fname = $row['fname'];
      }
      $_SESSION['reg'] = $id;
      $_SESSION['fname'] = $fname;
      echo "<script>window.location='./student/index.php'</script>";
    } else {
      echo '<script>alert("Incorect cridentios")</script>';

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