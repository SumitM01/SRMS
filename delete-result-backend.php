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
    $delete_query =  "DELETE FROM `tblresult` WHERE `tblresult`.`StudentId` = $studentid";
    if ($conn->query($delete_query) === TRUE) 
    {
        $get_max_id_query = "SELECT MAX( `Id` ) FROM `tblresult`";
        $max_id_res = $conn->query($get_max_id_query);
        if($max_id_res)
        {
            $max_id_array = mysqli_fetch_array($max_id_res);
            $id = $max_id_array['Id'];
            $id = intval($id);
            $reset_ai_query = "ALTER TABLE `tblresult` AUTO_INCREMENT = $id";
            if($conn->query($reset_ai_query) === TRUE)
            {
                $message="Results deleted successfully for student id '$studentid'";
                header("Location:result-table.php?delete=$message");
                exit();
            }
            else{
                $message="Can't reset ai for tblresult!!" . $conn->error; 
                header("Location:result-table.php?delete=$message");
                exit();
            }
        }
        else{
            $message="Can't access max id from tblresult!!!" . $conn->error; 
            header("Location:result-table.php?delete=$message");
            exit();
        }
    }
    else{
        $message="Can't delete results for student id '$studentid' !!" . $conn->error; 
        header("Location:result-table.php?delete=$message");
        exit();
    }    
}
?>