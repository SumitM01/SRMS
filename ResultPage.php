<?php
if(isset($_GET['classid'])) $classid = $_GET['classid'];
if(isset($_GET['studentid'])) $studentid = $_GET['studentid'];
if(isset($_GET['classname'])) $classname = $_GET['classname'];
if(isset($_GET['section'])) $section = $_GET['section'];
if(isset($_GET['roll'])) $roll = $_GET['roll'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "SRMS";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
<html>
    <title>
        Student Result : Resulting
    </title>
    <head>
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="LoginPage.css">
    </head>
    <section class="vh-100">
        <video autoplay muted loop id="myVideo">
            <source src="dots.mp4" type="video/mp4">
        </video>  
        <div class="container py-5">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row justify-content-sm-center">
                            <div class="col-sm-auto">
                            <h3>Student Name : <?php 
                            $get_student_name = $conn->query("SELECT StudentName FROM tblstudents WHERE StudentId = '$studentid'");
                            $student_name_array = mysqli_fetch_array($get_student_name);
                            echo $student_name_array['StudentName'];
                            ?></h3>
                            </div>
                            <div class="col-sm-auto">
                            <h3>Class : <?php 
                            echo htmlspecialchars("$classname $section");
                            ?></h3>
                            </div>
                            <div class="col-sm-auto">
                            <h3>Roll : <?php 
                            echo htmlspecialchars("$roll");
                            ?></h3>
                            </div>
                        </div>
                        <div class="row justify-content-sm-center">
                            <div class="col-sm-auto">
                                <a href="LoginPage.php" class="btn btn-warning">Back to Login Page</a>
                            </div>
                            <div class="col-sm-auto">
                                <input type="button" href="LoginPage.php" class="btn btn-warning" value="Download Result">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container py-5">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                    <table class="table table-zebra table-bordered table-hover border-warning table-dark">
                        <thead>
                            <th>Subject Name</th>
                            <th>Marks Received</th>
                        </thead>
                        <tbody>
                                <?php
                                    $subjectids_by_classid_studentid = $conn->query("SELECT SubjectId FROM tblresult WHERE StudentId = '$studentid' AND ClassId = '$classid'");
                                    if(mysqli_num_rows($subjectids_by_classid_studentid))
                                    {
                                        while($subjectids_by_classid_studentid_array = mysqli_fetch_array($subjectids_by_classid_studentid))
                                        {
                                            $single_subject_id = $subjectids_by_classid_studentid_array['SubjectId'];
                                            $subject_names = $conn->query("SELECT SubjectName FROM tblsubjects WHERE SubjectId = '$single_subject_id'");
                                            $subject_names_array = mysqli_fetch_array($subject_names);
                                            $single_subject_name = $subject_names_array['SubjectName'];
                                            ?> <td><?php echo $single_subject_name;?></td>
                                            <?php
                                            $subject_mark = $conn->query("SELECT Marks FROM tblresult WHERE SubjectId = '$single_subject_id'");
                                            $subject_mark_array = mysqli_fetch_array($subject_mark);
                                            $single_subject_mark = $subject_mark_array['Marks'];?>
                                            <td><?php echo $single_subject_mark; ?></td>
                                            <?php
                                        }
                                    }
                                ?>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</html>