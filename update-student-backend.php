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

$studentid = mysqli_real_escape_string($conn, $_POST['studentid']);
$studentid = intval($studentid);

$studentname = mysqli_real_escape_string($conn, $_POST['studentname']);
$roll = mysqli_real_escape_string($conn, $_POST['studentroll']);
$classid = mysqli_real_escape_string($conn, $_POST['classid']);
$classid = intval($classid);
// UPDATE `tblstudents` SET `RollId` = '24' WHERE `tblstudents`.`StudentId` = 3;
$update_query = "UPDATE tblstudents SET StudentName = '$studentname', RollId = '$roll', ClassId = '$classid' WHERE StudentId = '$studentid'";

if ($conn->query($update_query) === TRUE) {
    $message="Student Details updated successfully";
} 
else {
    $message="Can't update Student Details";
}

header("Location:student-table.php?update=$message");
exit();
?>