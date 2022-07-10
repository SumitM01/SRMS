<?php ?>
<html>
    <title>
        Admin Section : Resulting
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
                                    <div class="align-items-center mb-3 pb-1">
                                        <i class="fas fa-cubes fa-2x me-3" style="color:#ff6219;"></i>
                                        <span class="h1 fw-bold mb-0">Resulting</span>
                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing:1px;">Admin Functions</h5>
                                        <?php
                                        if(isset($_GET['insert']))
                                            {
                                                $value = $_GET['insert'];
                                                echo $value;
                                            }
                                        ?>
                                    </div>

                                    <div class="btn-group-vertical" role="group">
                                        <div class="btn-group btn-group-lg dropend" role="group">
                                            <button type="button" class="btn btn-warning" style="width:200px; height:75px;">Classes</button>
                                            <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false"></button>
                                            <ul class="dropdown-menu bg-dark">
                                                <li class="dropdown-item" style="font-size:125%; width:200px;"><a href="add-class.php">Add Class</a></li>
                                                <li class="dropdown-item" style="font-size:125%; width:200px;"><a href="class-table.php">Classes Table</a></li>
                                                <!-- <li class="dropdown-item" style="font-size:125%; width:200px;"><a href="#">Delete Class</a></li> -->
                                            </ul>
                                        </div>
                                        <div class="btn-group btn-group-lg dropend" role="group">
                                            <button type="button" class="btn btn-danger" style="width:200px; height:75px;">Student</button>
                                            <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false"></button>
                                            <ul class="dropdown-menu bg-dark">
                                                <li class="dropdown-item" style="font-size:125%; width:200px;"><a href="#">Add Student</a></li>
                                                <li class="dropdown-item" style="font-size:125%; width:200px;"><a href="#">Students Table</a></li>
                                                <!-- <li class="dropdown-item" style="font-size:125%; width:200px;"><a href="#">Delete Student</a></li> -->
                                            </ul>
                                        </div>
                                        <div class="btn-group btn-group-lg dropend" role="group">
                                            <button type="button" class="btn btn-primary" style="width:200px; height:75px;">Subjects</button>
                                            <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false"></button>
                                            <ul class="dropdown-menu bg-dark">
                                                <li class="dropdown-item" style="font-size:125%; width:200px;"><a href="#">Add Subject</a></li>
                                                <li class="dropdown-item" style="font-size:125%; width:200px;"><a href="#">Subjects Table</a></li>
                                                <!-- <li class="dropdown-item" style="font-size:125%; width:200px;"><a href="#">Delete Subject</a></li> -->
                                            </ul>
                                        </div>   
                                        <div class="btn-group btn-group-lg dropend" role="group">
                                            <button type="button" class="btn btn-success" style="width:200px; height:75px;">Subject Combinations</button>
                                            <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false"></button>
                                            <ul class="dropdown-menu bg-dark">
                                                <li class="dropdown-item" style="font-size:125%;"><a href="#">Add Subject Combination</a></li>
                                                <li class="dropdown-item" style="font-size:125%;"><a href="#">Subject Combinations Table</a></li>
                                                <!-- <li class="dropdown-item" style="font-size:125%;"><a href="#">Delete Subject Combination</a></li> -->
                                            </ul>
                                        </div>   
                                        <div class="btn-group btn-group-lg dropend" role="group">
                                            <button type="button" class="btn btn-info" style="width:200px; height:75px;">Results</button>
                                            <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false"></button>
                                            <ul class="dropdown-menu bg-dark">
                                                <li class="dropdown-item" style="font-size:125%; width:200px;"><a href="#">Add Result</a></li>
                                                <li class="dropdown-item" style="font-size:125%; width:200px;"><a href="#">Results Table</a></li>
                                                <!-- <li class="dropdown-item" style="font-size:125%; width:200px;"><a href="#">Update Result</a></li> -->
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</html>