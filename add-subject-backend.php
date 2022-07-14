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

// $subjectid = mysqli_real_escape_string($conn, $_POST['subjectid']);
// $subjectid = intval($subjectid);

$subjectname = mysqli_real_escape_string($conn, $_POST['subjectname']);

$insert_query = "INSERT INTO tblsubjects(SubjectId, SubjectName) VALUES (NULL, '$subjectname')";

if ($conn->query($insert_query) === TRUE) {
    $message="New subject details added successfully";
} 
else {
    $message="Can't add new subject details";
}

header("Location:admin_functions.php?insert=$message");
exit();
?>