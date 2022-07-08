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
// echo("Connection Established Successfully !!");
$class = mysqli_real_escape_string($conn, $_POST['class']);
$section = mysqli_real_escape_string($conn, $_POST['section']);
$roll = mysqli_real_escape_string($conn,$_POST['roll']);

$class = intval($class);
$roll = intval($roll);
// echo(gettype($roll));
$result1 = $conn->query("SELECT * FROM tblclasses WHERE ClassName = '$class' and Section = '$section'");

echo($array['ClassName']);
if(mysqli_num_rows($result1) == 1)
{
  $array = mysqli_fetch_array($result1);
  $classid = intval($array['ClassId']);
  $result2 = $conn->query("SELECT * FROM tblstudents WHERE RollId = '$roll' AND ClassId = '$classid'");
  if(mysqli_num_rows($result2) == 1)
  {
    $array2 = mysqli_fetch_array($result2);
    $studentid = intval($array2['StudentId']);
    header("Location:ResultPage.php?signin=true&classid=$classid&studentid=$studentid&classname=$class&section=$section&roll=$roll");
    exit();
  }
  else
  {
    header("Location: LoginPage.php?signin=error");
    exit();
  }
}
else
{
  header("Location:LoginPage.php?signin=error");
  exit();
}
?>