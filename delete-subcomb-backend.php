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
if(isset($_GET['subjectid']) && isset($_GET['classid']))
{
    $classid = $_GET['classid'];
    $classid = intval($classid);
    $subjectid = $_GET['subjectid'];
    $subjectid = intval($subjectid);
    $delete_query =  "DELETE FROM `tblsubjectcombination` WHERE `tblsubjectcombination`.`SubjectId` = $subjectid AND `tblsubjectcombination`.`ClassId` = $classid";
    // $reset_ai_query = "ALTER TABLE `tblsubjects` AUTO_INCREMENT = $subjectid";
    if ($conn->query($delete_query) === TRUE) {
        $message="Subject combination record deleted successfully";
    } 
    else {
        $message="Can't delete subject combination record !!" . $conn->error;
    }
    header("Location:subcomb-table.php?delete=$message");
    exit();
}
?>