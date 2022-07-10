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
if(isset($_GET['classid']))
{
    $classid = $_GET['classid'];
    $single_class = $conn->query("SELECT * FROM tblclasses WHERE ClassId = '$classid'");
    $single_class_array = mysqli_fetch_array($single_class);
}
?>
<html>
    <title>
        Add Class:Admin :Resulting
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
                    <div class="card" style="border-radius: 1rem;">
                    <form action="update-class-backend.php" method="post">
                        <div class="form-outline mb-4">
                            <input type="text" placeholder="Enter Class Id" name="classid" value="<?php echo $classid ?>" readonly>
                            <label for="classid">Class id</label>
                        </div>
                        <div class="form-outline mb-4">
                            <input type="text" placeholder="Enter Class" name="class" value="<?php echo $single_class_array['ClassName'] ?>">
                            <label for="classid">Class</label>
                        </div>
                        <div class="form-outline mb-4">
                            <input type="text" placeholder="Enter Section" name="section" value="<?php echo $single_class_array['Section'] ?>">
                            <label for="classid">Section</label>
                        </div>
                        <input type="submit" class="btn btn-success" value="Submit">
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>