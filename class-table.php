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
?>
<html>
    <title>
        Add Class:Admin :Resulting
    </title>
    <head>
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="LoginPage.css">
    </head>
    <body>
        <video autoplay muted loop id="myVideo">
            <source src="dots.mp4" type="video/mp4">
        </video>  
        <div class="container py-5">
            <div class="row justify-content-center align-items-center">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;  padding:1rem; border: 1rem solid royalblue; margin:1rem;">
                    <div class="col-sm-auto">
                        <a href="admin_functions.php" class="btn btn-dark">Back to admin page</a>
                    </div>
                    <?php
                    $value="";
                    if(isset($_GET['update']))
                    {
                        $value = $_GET['update'];
                        // echo $value;
                    }
                    if(isset($_GET['delete']))
                    {
                        $value = $_GET['delete'];
                        // echo $value;
                    }
                    ?>
                    <p><?php echo $value ?></p>
                    <table id="dtVerticalScrollExample" class="table" style="overflow:auto; margin-bottom: 0px;">
                        <thead>
                            <th class="bg-info">Class Id</th>
                            <th  class="bg-danger">Class</th>
                            <th  class="bg-danger">Section</th>
                            <th class="bg-warning"> Modify </th>
                            <th class="bg-warning"> Delete </th>
                        </thead>
                        <tbody class="table-light">
                                <?php
                                    $classdetails = $conn->query("SELECT * FROM tblclasses");
                                    if(mysqli_num_rows($classdetails))
                                    {
                                        while($classdetailsarray = mysqli_fetch_array($classdetails))
                                        {
                                            $classid = $classdetailsarray['ClassId'];
                                            $classname = $classdetailsarray['ClassName'];
                                            $section = $classdetailsarray['Section'];
                                            ?> 
                                            <tr>
                                            <td><?php echo $classid;?></td>
                                            <td><?php echo $classname; ?></td>
                                            <td><?php echo $section; ?></td>
                                            <td><a href="update-class.php?classid=<?php echo $classdetailsarray['ClassId'] ?>" style="text-decoration: none;">Update</a></td>
                                            <td><a href="delete-class-backend.php?classid=<?php echo $classdetailsarray['ClassId'] ?>" style="text-decoration:none;">Delete</a></td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                ?>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>