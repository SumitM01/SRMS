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
        Student Table :Admin :Resulting
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
                    <div class="card" style="border-radius: 1rem;">
                    <div class="col-sm-auto">
                        <a href="admin_functions.php" class="btn btn-dark" style="justify-content:center">Back to admin page</a>
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
                    <table class="table" style="margin-bottom: 0px;">
                        <thead>
                            <th class="bg-info">Subject Id</th>
                            <th  class="bg-danger">Subject Name</th>
                            <th class="bg-warning"> Modify </th>
                            <th class="bg-warning"> Delete </th>
                        </thead>
                        <tbody class="table-light">
                                <?php
                                    $subjectdetails = $conn->query("SELECT * FROM tblsubjects");
                                    if(mysqli_num_rows($subjectdetails))
                                    {
                                        while($subjectdetailsarray = mysqli_fetch_array($subjectdetails))
                                        {
                                            $subjectid = $subjectdetailsarray['SubjectId'];
                                            $subjectname = $subjectdetailsarray['SubjectName'];
                                            ?> 
                                            <tr>
                                            <td><?php echo $subjectid;?></td>
                                            <td><?php echo $subjectname; ?></td>
                                            <td><a href="update-subject.php?subjectid=<?php echo $subjectdetailsarray['SubjectId'] ?>" style="text-decoration: blue;">Update</a></td>
                                            <td><a href="delete-subject-backend.php?subjectid=<?php echo $subjectdetailsarray['SubjectId'] ?>" style="text-decoration:crimson;">Delete</a></td>
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