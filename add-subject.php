
<html>
    <title>
        Add Subject :Admin :Resulting
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
                    <div class="row g-0">
                        <div class="col-md-6 col-lg-5 d-block">
                            <img src="https://i.imgur.com/jkj1HgU.jpg" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                        </div>
                        <div class="col-md-6 col-lg-7 d-flex align-items-center">
                            <div class="card-body p-4 p-lg-5 text-black">
                                <div class="align-items-center mb-3 pb-1">
                                    <i class="fas fa-cubes fa-2x me-3" style="color:#ff6219;"></i>
                                    <span class="h1 fw-bold mb-0">Resulting</span>
                                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing:1px;">Provide subject details to add subject</h5>

                                    <form action="add-subject-backend.php" method="post">
                                        <!-- <div class="form-outline mb-4">
                                            <input type="text" class="form-control" placeholder="Enter Class Id" name="subjectid">
                                            <label for="classid">Student id</label>
                                        </div> -->
                                        <div class="form-outline mb-4">
                                            <input type="text" class="form-control" placeholder="Enter Subject Name" name="subjectname">
                                            <label for="classid">Subject Name</label>
                                        </div>
                                        <input type="submit" class="btn btn-success" value="Add subject">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>