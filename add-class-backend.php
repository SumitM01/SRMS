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

// $classid = mysqli_real_escape_string($conn, $_POST['classid']);
// $classid = intval($classid);

$class = mysqli_real_escape_string($conn, $_POST['class']);
$section = mysqli_real_escape_string($conn, $_POST['section']);
$insert_query = "INSERT INTO tblclasses(ClassId, ClassName, Section) VALUES (NULL, '$class', '$section')";

if ($conn->query($insert_query) === TRUE) {
    $message="Class added successfully";
} 
else {
    $message="Can't add new class";
}

header("Location:add-class.php?insert=$message");
exit();
?>