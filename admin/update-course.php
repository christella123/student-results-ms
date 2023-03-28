<?php
// include 'connection.php';

session_start();

if (!isset($_SESSION['email_name'])) {
  echo "<script>window.location='../login.php'</script>";
} else
?>

<?php
include '../connection.php';
$id = $_GET['id'];

$sql = "SELECT cid,duration,title	 FROM course where cid='$id'";
$result = $conn->query($sql);

while ($row = mysqli_fetch_array($result)) {

  $d = $row['duration'];
  $t = $row['title'];
  // $email=$row['email'];
  // $dep=$row['department'];

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
                  <form method="post" id="teacher_login_form">



                    <div class="form-group">
                      <label>DURATION</label>
                      <input type="text" name="d" value="<?php echo $d; ?>" id="teacher_password"
                        class="form-control" />
                      <span id="error_teacher_password" class="text-danger"></span>
                    </div>
                    <br />

                    <div class="form-group">
                      <label>TITLE</label>
                      <input type="text" name="t" value="<?php echo $t; ?>" id="teacher_password"
                        class="form-control" />
                      <span id="error_teacher_password" class="text-danger"></span>
                    </div>
                    <br />
                    <br />

                    <div class="form-group">
                      <input type="submit" name="submit" id="teacher_login" class="btn btn-info" value="SAVE CHANGES" />

                      <input type="reset" name="reset" id="teacher_login" class="btn btn-danger" value="CLEAN DATA" />
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4"></div>
        </div>
        <!-- //row -->
        <br />

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
// @$reg=$_POST["reg"];
@$d = $_POST["d"];
@$t = $_POST["t"];
// @$lname=$_POST["lname"];
// @$dep=$_POST["dep"];



if (isset($go)) {
  if ($d != '' or $t != '') {


    //echo '<script>alert("Welcome to Geeks for Geeks")</script>';

    $sql = "UPDATE `course` SET `duration` = '$d', `title` = '$t' 
         WHERE `course`.`cid` = $id;";

    if (mysqli_query($conn, $sql)) {

      echo '<script>alert("Well updated")</script>';
      echo "<script>window.location='./course.php'</script>";
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);

  } else {
    echo '<script>alert("Make sure all field are filled")</script>';
  }



}



?>