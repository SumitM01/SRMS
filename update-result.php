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
if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $single_result = $conn->query("SELECT * FROM tblresult WHERE Id = '$id'");
    $single_result_array = mysqli_fetch_array($single_result);
}
?>
<html>
    <title>
        Update Result Details :Admin :Resulting
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
                    <form action="update-result-backend.php" method="post" style="padding:1rem; border: 5px dashed gold; margin:1rem;">
                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing:1px;">Edit result</h5> 
                        <div class="form-outline mb-4">
                            <input type="text" name="resultid" value="<?php echo $id ?>" readonly>
                            <label for="classid">Id</label>
                        </div>
                        <div class="form-outline mb-4">
                            <input type="text" name="resultstudentid" value="<?php echo $single_result_array['StudentId'] ?>" readonly>
                            <label for="classid">Student Id</label>
                        </div>
                        <div class="form-outline mb-4">
                            <input type="text" name="resultclassid" value="<?php echo $single_result_array['ClassId'] ?>" readonly>
                            <label for="classid">Class Id</label>
                        </div>
                        <div class="form-outline mb-4">
                            <input type="text" placeholder="Enter Subject Name" name="resultsubjectid" value="<?php echo $single_result_array['SubjectId'] ?>">
                            <label for="classid">Subject Id</label>
                        </div>
                        <div class="form-outline mb-4">
                            <input type="text" placeholder="Enter subject marks" name="resultmarks" value="<?php echo $single_result_array['Marks'] ?>">
                            <label for="classid">Subject Marks</label>
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