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
if(isset($_GET['studentid']))
{
    $studentid = $_GET['studentid'];
    $studentid = intval($studentid);
    $delete_query =  "DELETE FROM `tblstudents` WHERE `tblstudents`.`StudentId` = $studentid";
    $reset_ai_query = "ALTER TABLE `tblstudents` AUTO_INCREMENT = $studentid";
    if ($conn->query($delete_query) === TRUE && $conn->query($reset_ai_query) === TRUE) {
        $message="Student record deleted successfully";
    } 
    else {
        $message="Can't delete student record !!" . $conn->error;
    }
    header("Location:student-table.php?delete=$message&$studentid");
    exit();
}
?>