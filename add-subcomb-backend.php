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

$subjectid = mysqli_real_escape_string($conn, $_POST['subjectid']);
$subjectid = intval($subjectid);

$classid = mysqli_real_escape_string($conn, $_POST['classid']);
$classid = intval($classid);

$insert_query = "INSERT INTO tblsubjectcombination(ClassId, SubjectId) VALUES ('$classid','$subjectid')";

if ($conn->query($insert_query) === TRUE) {
    $message="New subject combination added successfully";
} 
else {
    $message="Can't add new subject combination";
}

header("Location:admin_functions.php?insert=$message");
exit();
?>