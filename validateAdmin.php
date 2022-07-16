<?php
session_start();
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
// echo("Connection Established Successfully !!");
$id = mysqli_real_escape_string($conn, $_POST['id']);
$password = mysqli_real_escape_string($conn, $_POST['pass']);

// echo(gettype($roll));
$result1 = $conn->query("SELECT * FROM tbladmin WHERE Username = '$id' and Password = '$password'");

if(mysqli_num_rows($result1) == 1)
{
  $array = mysqli_fetch_array($result1);
  $_SESSION['signin'] = "true";
  $_SESSION['name'] = $array['Username'];
  $_SESSION['password'] =$array['Password'];
  header("Location:admin_functions.php");
}
else
{
    $_SESSION['signin'] = "false";
    header("Location:Adminlogin.php");
    exit();
}
?>