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

$sql = "SELECT * FROM departments where id='$id'";
$result = $conn->query($sql);

while ($row = mysqli_fetch_array($result)) {

    $college = $row['college'];
    $school = $row['school'];
    $department = $row['department'];

}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Update Department </title>
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
                                <div class="card-header">UPDATE DEPARTMENT</div>
                                <div class="card-body">
                                    <form method="post" id="teacher_login_form">



                                        <div class="form-group">
                                            <label>COLLEGE</label>
                                            <input type="text" name="college" value="<?php echo $college; ?>"
                                                id="teacher_password" class="form-control" />
                                            <span id="error_teacher_password" class="text-danger"></span>
                                        </div>
                                        <br />

                                        <div class="form-group">
                                            <label>SCHOOL</label>
                                            <input type="text" name="school" value="<?php echo $school; ?>"
                                                id="teacher_password" class="form-control" />
                                            <span id="error_teacher_password" class="text-danger"></span>
                                        </div>
                                        <br />
                                        <div class="form-group">
                                            <label>DEPARTMENT</label>
                                            <input type="text" name="department" value="<?php echo $department; ?>"
                                                id="teacher_password" class="form-control" />
                                            <span id="error_teacher_password" class="text-danger"></span>
                                        </div>
                                        <br />
                                        <br />

                                        <div class="form-group">
                                            <input type="submit" name="submit" id="teacher_login" class="btn btn-info"
                                                value="SAVE CHANGES" />

                                            <input type="reset" name="reset" id="teacher_login" class="btn btn-danger"
                                                value="CLEAN DATA" />
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
@$college = $_POST["college"];
@$school = $_POST["school"];
@$department = $_POST["department"];



if (isset($go)) {
    if ($college != '' or $school != '' or $department != '') {


        //echo '<script>alert("Welcome to Geeks for Geeks")</script>';

        $sql = "UPDATE `departments` SET `college` = '$college', `school` = '$school', `department` = '$department'
         WHERE `id` = $id;";

        if (mysqli_query($conn, $sql)) {

            echo '<script>alert("Well updated")</script>';
            echo "<script>window.location='./departments.php'</script>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        mysqli_close($conn);

    } else {
        echo '<script>alert("Make sure all field are filled")</script>';
    }



}



?>