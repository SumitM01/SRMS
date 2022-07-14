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

$classid = mysqli_real_escape_string($conn, $_GET['classid']);
$classid = intval($classid);
$delete_query =  "DELETE FROM `tblclasses` WHERE `tblclasses`.`ClassId` = $classid";
$reset_ai_query = "ALTER TABLE `tblclasses` AUTO_INCREMENT = $classid";
if ($conn->query($delete_query) === TRUE && $conn->query($reset_ai_query) === TRUE) {
    $message="Class deleted successfully";
} 
else {
    $message="Can't delete class";
}
header("Location:class-table.php?delete=$message");
exit();
?>