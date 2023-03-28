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
                    <h5 class="card-title text-center pb-0 fs-4">WELCAME STUDENT MARKS MANAGEMENT SYSTEM </h5>

                  </div>

                  <!-- <form class="row g-3 needs-validation"  method='POST' novalidate> -->

                  <img src="./assets/lg.png" alt="" style='height:7cm;width:80%'>


                  <div class="col-12">
                    <a href="./studentLogin.php">
                      <button class="btn btn-primary w-100" type="submit" name='login'>
                        LOGIN AS STUDENT</button>
                    </a>

                    <br> <br>
                    <a href="./login.php">
                      <button class="btn btn-primary w-100" type="submit" name='login'> LOGIN AS USER</button>
                    </a>
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


  <script src="assets/js/main.js"></script>

</body>

</html>