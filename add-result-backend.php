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
// $id = mysqli_real_escape_string($conn, $_POST['id']);
// $id = intval($id);

$studentid = mysqli_real_escape_string($conn, $_POST['studentid']);
$studentid = intval($studentid);

$subjectid = mysqli_real_escape_string($conn, $_POST['subjectid']);
$subjectid = intval($subjectid);

$classid = mysqli_real_escape_string($conn, $_POST['classid']);
$classid = intval($classid);

$mark = mysqli_real_escape_string($conn, $_POST['marks']);
$mark = floatval($mark);

$insert_query = "INSERT INTO tblresult(Id, StudentId, ClassId, SubjectId, Marks) VALUES (NULL, '$studentid', '$classid','$subjectid', '$mark')";

if ($conn->query($insert_query) === TRUE) {
    $message="New result added successfully";
} 
else {
    $message="Can't add new result !!";
}

header("Location:admin_functions.php?insert=$message");
exit();
?>