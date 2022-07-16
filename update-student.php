<?php
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
if(isset($_GET['studentid']))
{
    $studentid = $_GET['studentid'];
    $single_student = $conn->query("SELECT * FROM tblstudents WHERE StudentId = '$studentid'");
    $single_student_array = mysqli_fetch_array($single_student);
}
?>
<html>
    <title>
        Update Student Details :Admin :Resulting
    </title>
    <head>
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="LoginPage.css">
    </head>
    <body>
        <video autoplay muted loop id="myVideo">
            <source src="dots.mp4" type="video/mp4">
        </video>  
        <div class="container py-5">
            <div class="row justify-content-center align-items-center">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem; width:fit-content">
                    <form action="update-student-backend.php" method="post" style="padding:1rem; border: 5px dashed gold; margin:1rem;">
                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing:1px;">Edit student details</h5> 
                        <div class="form-outline mb-4">
                            <input type="text" placeholder="Enter Student Id" name="studentid" value="<?php echo $studentid ?>" readonly>
                            <label for="classid">Student id</label>
                        </div>
                        <div class="form-outline mb-4">
                            <input type="text" placeholder="Enter Name" name="studentname" value="<?php echo $single_student_array['StudentName'] ?>">
                            <label for="classid">Student Name</label>
                        </div>
                        <div class="form-outline mb-4">
                            <input type="text" placeholder="Enter Roll" name="studentroll" value="<?php echo $single_student_array['RollId'] ?>">
                            <label for="classid">Roll</label>
                        </div>
                        <div class="form-outline mb-4">
                            <input type="text" placeholder="Enter Class Id" name="classid" value="<?php echo $single_student_array['ClassId'] ?>">
                            <label for="classid">Class id</label>
                        </div>
                        <input type="submit" class="btn btn-success" value="Submit">
                        <a href="subject-table.php" class="btn btn-outline-warning">Back to tables</a>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>