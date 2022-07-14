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

$id = mysqli_real_escape_string($conn, $_POST['resultid']);
$id = intval($id);
$subjectid = mysqli_real_escape_string($conn, $_POST['subjectid']);
$subjectid = intval($subjectid);
$marks = mysqli_real_escape_string($conn, $_POST['resultmarks']);
$marks = floatval($marks);

$update_query = "UPDATE tblresult SET SubjectId = '$subjectid' AND Marks = '$marks' WHERE Id = '$id'";

if ($conn->query($update_query) === TRUE) {
    $message="Result Details updated successfully";
} 
else {
    $message="Can't update Result Details";
}

header("Location:result-table.php?update=$message");
exit();
?>