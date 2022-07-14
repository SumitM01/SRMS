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

// $studentid = mysqli_real_escape_string($conn, $_POST['studentid']);
// $studentid = intval($student);

$studentname = mysqli_real_escape_string($conn, $_POST['studentname']);
$roll = mysqli_real_escape_string($conn, $_POST['roll']);
$roll = intval($roll);

$classid = mysqli_real_escape_string($conn, $_POST['classid']);
$classid = intval($classid);

$insert_query = "INSERT INTO tblstudents(StudentId, StudentName, RollId, ClassId) VALUES (NULL, '$studentname', '$roll', '$classid')";

if ($conn->query($insert_query) === TRUE) {
    $message="New student details added successfully";
} 
else {
    $message="Can't add new student details";
}

header("Location:admin_functions.php?insert=$message");
exit();
?>