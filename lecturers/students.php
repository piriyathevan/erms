<?php
$title = "View Student | Online Examination Result Management System | SLGTI";
$description = "Online Examination Result Management System (ERMS)-SLGTI";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once("../head.php"); ?>
    <?php include_once('../databases/config.php'); ?>
</head>

<body>
    <div class="page-wrapper toggled bg2 border-radius-on light-theme">
            <?php include_once("nav.php"); ?>

            <!-- delete start -->
            <?php
                if (isset($_GET['delete'])) {
                $student_id = $_GET['delete'];
                $sql_delete = "DELETE FROM `student` WHERE `student`.`id` = '$student_id'";
                if (mysqli_query($con, $sql_delete)) {
                echo '<div class="alert alert-success" role="alert">
                Successfully Deleted!
                </div>';
                }
                else { 
                    echo "Error deleting record: " . mysqli_error($con); 
                }
                }
                ?>
                <!-- delete end -->

        <main class="">
            <div class="container-fluid p-5">
                <!-- #1 Insert Your Content-->
                <div class="container">

                <!-- 1st row start -->
                <div class="card">
                <div class="card-header">
                <div class="row">
                <h5 class="col-8"><?php echo "$title" ?></h5>
                <div class="col-1"></div>
                <div class='col-2'>
                <input class="form-control" type="search" placeholder="Registration No." aria-label="Search">
                </div>
                <button class="btn btn-outline-success col-1-sm" type="submit">Search</button>
                </div>
                </div>
                <div class="card-body">
                <h6 class="card-title">
                
                </h6>

                <div class="row">
                    <div class="form-group col-md-12 table-responsive">
                    <table class='table align-middle '>
                    <thead class='thead-dark'>
                        <tr>
                            <th scope='col'>Registration No</th>
                            <th scope='col'>Student Name</th>
                            <th scope='col'>Enrolled Course</th>
                            <th scope='col'>Batch</th>
                            <th scope='col'>Contact Number</th>
                            <th scope='col'>ACTIONS</th>
                        </tr>
                        <?php
                        $sql = "SELECT 
                        `student`.`id`,`student`.`full_name`,`student_enroll`.`course_id`,
                        `student_enroll`.`academic_year`,`student`.`phone_no`
                        FROM student 
                        LEFT JOIN student_enroll
                        ON `student`.`id` = `student_enroll`.`id`
                        ORDER BY `id` ASC";
                        $result = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td scope='col'>
                            <?php echo $row['id']; ?>
                            </td>
                            <td scope='col'>
                            <?php echo $row['full_name']; ?>
                            </td>
                            <td scope='col'>
                            <?php echo $row['course_id']; ?>
                            </td>
                            <td scope='col'>
                            <?php echo $row['academic_year']; ?>
                            </td>
                            <td scope='col'>
                            <?php echo $row['phone_no']; ?>
                            </td>
                            <td scope='col'>
                            <a class="btn btn-info btn-sm" href="?view=<?php echo $row['id']; ?>">Full View</a>
                            </td>
                            <?php
                            }
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                    </div>
                </div>
                </div>
                <div class="card-footer text-muted">
                </div>
                </div>
                <!-- 1st row end -->

                <!-- #1 Insert Your Content" -->
            </div>
        </main>
    </div>
    <?php include_once("../script.php"); ?>
</body>

</html>