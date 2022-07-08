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

$classname = $_POST["ClassName"];
$section = $_POST["Section"];
$result = mysqli_query($conn, "SELECT * FROM tblclasses WHERE ClassName = '$classname' AND Section = '$section'");
$array1 = mysqli_fetch_array($result);
$classid = $array1["ClassId"];
$result2 = mysqli_query($conn, "SELECT * FROM tblstudents WHERE ClassId = '$classid'");
// $array2 = mysqli_fetch_array($result2);
// echo($array2["ClassId"]);
?>

<?php
while($row = mysqli_fetch_array($result2)){
?>
<option value="<?php echo $row["RollId"];?>"><?php echo $row["RollId"];?></option>
<?php
}
?>