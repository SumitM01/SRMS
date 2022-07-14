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
$subjectname = mysqli_real_escape_string($conn, $_POST['subjectname']);

$update_query = "UPDATE tblsubjects SET SubjectName = '$subjectname' WHERE SubjectId = '$subjectid'";

if ($conn->query($update_query) === TRUE) {
    $message="Subject Details updated successfully";
} 
else {
    $message="Can't update Subject Details";
}

header("Location:subject-table.php?update=$message");
exit();
?>