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
if(isset($_GET['subjectid']))
{
    $subjectid = $_GET['subjectid'];
    $single_subject = $conn->query("SELECT * FROM tblsubjects WHERE SubjectId = '$subjectid'");
    $single_subject_array = mysqli_fetch_array($single_subject);
}
?>
<html>
    <title>
        Update Subject Details :Admin :Resulting
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
                    <form action="update-subject-backend.php" method="post" style="padding:1rem; border: 5px dashed gold; margin:1rem;">
                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing:1px;">Edit subject details</h5> 
                        <div class="form-outline mb-4">
                            <input type="text" placeholder="Enter Subject Id" name="subjectid" value="<?php echo $subjectid ?>" readonly>
                            <label for="classid">Subject id</label>
                        </div>
                        <div class="form-outline mb-4">
                            <input type="text" placeholder="Enter Name" name="subjectname" value="<?php echo $single_subject_array['SubjectName'] ?>">
                            <label for="classid">Subject Name</label>
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