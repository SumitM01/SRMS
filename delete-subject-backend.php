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
if(isset($_GET['subjectid']))
{
    $subjectid = $_GET['subjectid'];
    $subjectid = intval($subjectid);
    $delete_query =  "DELETE FROM `tblsubjects` WHERE `tblsubjects`.`SubjectId` = $subjectid";
    $reset_ai_query = "ALTER TABLE `tblsubjects` AUTO_INCREMENT = $subjectid";
    if ($conn->query($delete_query) === TRUE && $conn->query($reset_ai_query) === TRUE) {
        $message="Subject record deleted successfully";
    } 
    else {
        $message="Can't delete subject record !!" . $conn->error;
    }
    header("Location:subject-table.php?delete=$message&$subjectid");
    exit();
}
?>