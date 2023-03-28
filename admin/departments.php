<?php
// include 'connection.php';

session_start();

if (!isset($_SESSION['email_name'])) {
    echo "<script>window.location='../login.php'</script>";
} else
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Departments </title>
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
                                <div class="card-header">ADD DEPARTMENT</div>
                                <div class="card-body">
                                    <form method="post" id="teacher_login_form">
                                        <div class="form-group">
                                            <label>College</label>
                                            <input type="text" name="college" id="teacher_password"
                                                class="form-control" />
                                            <span id="error_teacher_password" class="text-danger"></span>
                                        </div>
                                        <br />

                                        <div class="form-group">
                                            <label>School</label>
                                            <input type="text" name="school" id="teacher_password"
                                                class="form-control" />
                                            <span id="error_teacher_password" class="text-danger"></span>
                                        </div>
                                        <br />
                                        <div class="form-group">
                                            <label>Depatment</label>
                                            <input type="text" name="department" id="teacher_password"
                                                class="form-control" />
                                            <span id="error_teacher_password" class="text-danger"></span>
                                        </div>
                                        <br />



                                        <div class="form-group">
                                            <input type="submit" name="submit" id="teacher_login" class="btn btn-info"
                                                value="ADD DEPARTMENT" />

                                            <input type="reset" name="reset" id="teacher_login" class="btn btn-danger"
                                                value="CLEAN DATA" />
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-8">
                        <!-- <div class="col-lg-12"> -->



                        <?php
                        include '../connection.php';

                        $sql = "SELECT * FROM departments";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {

                            ?>
                            <br />

                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">List of Departments</h5>

                                    <!-- Table with stripped rows -->


                                    <table class="table table-striped table-responsive">
                                        <thead>
                                            <tr>
                                                <th scope="col">NO</th>

                                                <th scope="col">College</th>
                                                <th scope="col">School</th>
                                                <th scope="col">Department</th>

                                                <th scope="col">Modify</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            include '../connection.php';

                                            $sql = "SELECT * FROM departments";
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
                                                            <?php echo $row["college"]; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row["school"]; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row["department"]; ?>
                                                        </td>
                                                        <td> <a href="update-department.php?id=<?php echo $row["id"] ?>"><i
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
@$college = $_POST["college"];
@$school = $_POST["school"];
@$department = $_POST["department"];



if (isset($go)) {
    if ($college != '' or $department != '' or $school != '') {

        $sql = "INSERT INTO `departments` (`id`, `college`, `school`, `department`) VALUES (NULL, '$college', '$school', '$department');";

        if (mysqli_query($conn, $sql)) {

            echo '<script>alert("Department added successful")</script>';
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