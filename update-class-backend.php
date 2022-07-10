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

$classid = mysqli_real_escape_string($conn, $_POST['classid']);
$classid = intval($classid);

$class = mysqli_real_escape_string($conn, $_POST['class']);
$section = mysqli_real_escape_string($conn, $_POST['section']);
$update_query = "UPDATE tblclasses SET ClassName = '$class', Section = '$section' WHERE ClassId = '$classid'";

if ($conn->query($update_query) === TRUE) {
    $message="Class updated successfully";
} 
else {
    $message="Can't update class";
}

header("Location:class-table.php?update=$message");
exit();
?>