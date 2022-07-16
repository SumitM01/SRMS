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
        Student Login : Resulting
    </title>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>    
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="LoginPage.css">
    </head>
    <section class="vh-100">
        <video autoplay muted loop id="myVideo">
            <source src="dots.mp4" type="video/mp4">
        </video>  
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">

                        <div class="row g-0">
                            
                            <div class="col-md-6 col-lg-5 d-block">
                                <img src="https://i.imgur.com/jkj1HgU.jpg" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                            </div>

                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">
                                    <form action="validateLogin.php" method="post">
                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <i class="fas fa-cubes fa-2x me-3" style="color:#ff6219;"></i>
                                            <span class="h1 fw-bold mb-0">Resulting</span>
                                        </div>

                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing:1px;">Provide details to access results</h5>

                                        <?php 
                                        if(isset($_GET['signin']))
                                        {
                                            $error = $_GET['signin'];
                                            echo("<p style = 'color:red'>Provided Credentials are wrong</p>");
                                        }
                                        ?>

                                        <div class="form-outline mb-4">
                                            <select name="class" class="form-control" id="class" required="required">
                                            <option selected>Select Class</option>
                                            <?php
                                            $result = mysqli_query($conn, "SELECT * FROM tblclasses GROUP BY ClassName");
                                            while($row = mysqli_fetch_array($result)){
                                            ?>
                                            <option value="<?php echo $row['ClassName'];?>"><?php echo $row["ClassName"];?></option>
                                            <?php
                                            }
                                            ?>
                                            </select>
                                            <label for="class">Class</label>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <!-- <input type="text" min="1" max="12" id="section" name="section" class="form-control form-control-lg"> -->
                                            <select name="section" class="form-control" id="section" required="required">
                                            <option selected>Select Section</option>
                                            <?php
                                            $result = mysqli_query($conn, "SELECT * FROM tblclasses GROUP BY Section");
                                            while($row = mysqli_fetch_array($result)){
                                            ?>
                                            <option value="<?php echo $row['Section'];?>"><?php echo $row["Section"];?></option>
                                            <?php
                                            }
                                            ?>
                                            </select>
                                            <label class="form-label" for="section">Section</label>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <!-- <input type="number" min="1" max="70" id="roll" name="roll" class="form-control form-control-lg"> -->
                                            <select name="roll" class="form-control" id="roll" required="required">
                                            <option selected>Select Roll</option>
                                            </select>
                                            <label class="form-label" for="roll">Roll</label>
                                        </div>

                                        <div class="pt-1 mb-4 d-flex justify-content-start">
                                        <input type="submit" class="btn btn-dark btn-lg btn-block" type="button" value="Show result">
                                        <a href="Homepage.php" class="btn btn-info btn-lg">Back to home</a>
                                        </div>
                                        
                                        <!-- <a class="small text-muted" href="#!">Forgot password?</a> -->
                                        <p class="mb-5 pb-lg-2" style="color:#393f81;">New Student? <a href="#!" style="color: #393f81; text-decoration: none;">Register yourself here</a></p>
                                        <a href="#!" class="small-text-muted" style="text-decoration:none">Terms of use.</a>
                                        <a href="#!" class="small text-muted" style="text-decoration:none">Privacy policy</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</html>
<script>
    $(document).ready(function() {
        $('#section').on('change', function(){
            var classname = $('#class').val();
            var section = this.value
            console.log(classname);
            console.log(section);
            $.ajax({
                url: "roll-by-class.php",
                type:"POST",
                data:{
                    ClassName : classname,
                    Section : section
                },
                cache: false,
                success: function(result){
                    console.log(result);
                    $("#roll").html(result);
                }
            });
        });
    });
</script>