<?php

session_start();

if (isset($_SESSION['username'])) {
    header('location:Information.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../CSS/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="../CSS/drop.css">
    <link rel="icon" href="../images/hospital-svgrepo-com (1).svg" />
</head>

<body style="background-image:url('../images/log.svg'); background-color: #1b59ac;">
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="font-weight: 500; font-size: 16px;">
        <div class="container-fluid">
            <a class="navbar-brand" href="../index.html""><img src=" ../images/hospital-svgrepo-com (1).svg" alt="img"></a>
            <button class=" navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./patients_info.php">Patient's Info</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./login.php">Reception</a>
                    <li class="nav-item">
                        <a class="nav-link" href="./patient_appoint.php">Appointment</a>
                    </li>
                </ul>
                <div class="left-nav" style="margin-left: auto;">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="./app_approve.php">Approve</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./Results.php">Users</a>
                        </li>
                        <li class="nav-item">
                            <div class="dropdown" style="float:right;">
                                <button class="dropbtn">About</button>
                                <div class="dropdown-content">
                                    <a href="#">Contact Number: +91-1234567890</a>
                                    <a href="#">E-Mail Address: Vcare123@gmail.com</a>
                                    <a href="#">Visiting Hours: (IST) 9 AM to 7 PM Monday to Saturday</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="fcard">
            <div class="row">
                <div class="col-md-6">
                    <div class="left_part">

                        <!-- Login -->
                        <form class="myform text-center" id="login" action="validation.php" method="POST">
                            <header>LOGIN
                                <i class="material-icons" style="left:0px; top:2px;">login</i>
                            </header>
                            <div class="form_group">
                                <i class="material-icons">person</i>
                                <input class="finput" type="text" placeholder="Username" name="Username" required>
                            </div>
                            <div class="form_group">
                                <i class="material-icons">no_encryption</i>
                                <input class="finput" type="password" placeholder="Password" name="Password" required>
                            </div>
                            <!-- error message -->
                            <?php
                            if (isset($_GET['error']) == true) {
                                echo '<p align="center"><font color="red">Username or Password is wrong!!!</font></p>';
                            }
                            ?>

                            <div class="form_group">
                                <label>
                                    <input name="check" id="check" type="checkbox"><span> Remember me</span>
                                    </input>
                                    <div class="invalid_feedback"></div>
                                </label>
                            </div>
                            <input type="submit" class="button" value="Login" name="user_login">
                        </form>

                        <!-- Register -->


                        <form class="myform text-center" id="register" action="Register.php" method="POST">
                            <header>REGISTER
                                <i class="material-icons" style="left:0px; top: 4px;">how_to_reg</i>
                            </header>
                            <div class="form_group">
                                <i class="material-icons">person</i>
                                <input class="finput" type="text" placeholder="Username" name="Username" required>
                            </div>
                            <div class="form_group">
                                <i class="material-icons">local_post_office</i>
                                <input class="finput" type="text" placeholder="E-mail ID" name="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
                            </div>
                            <div class="form_group">
                                <i class="material-icons">no_encryption</i>
                                <input class="finput" type="password" placeholder="Password" name="Password" pattern=".{8,}" required>
                            </div>
                            <div class="form_group">
                                <label>
                                    <input name="check" id="r_check" type="checkbox" required><span> I accept the terms & condtions.</span>
                                    </input>
                                    <div class="invalid_feedback"></div>
                                </label>
                            </div>
                            <input type="submit" class="button" value="Register" name="user_register">
                        </form>
                        <div class="icon">
                            <a href="https://www.google.com"><img src="../images/gg.svg" alt="google"></a>
                            <a href="https://www.facebook.com"><img src="../images/ff.svg" alt="facebook"></a>
                            <a href="https://www.twitter.com"><img src="../images/tt.svg" alt="twitter"></a>
                        </div>
                    </div>
                </div>

                <!-- Side info -->

                <div class="col-md-6">
                    <div class="right_part">
                        <div class="box1" id="infor">
                            <header>CREATE A NEW ACCOUNT</header>
                            <p>New Users Please Create a new Account First!!!
                            </p>
                            <button onclick="buttonfun()" class="button">Register</button>
                            <!-- <button onclick="buttonfun()" class="button" id="infol">Login</button> -->
                        </div>
                        <div class="box2" id="infol">
                            <header>LOGIN WITH EXISTING ACCOUNT</header>
                            <!-- <p>If you haven't already, quickly create your scoial account now!!!
                        </p> -->
                            <!-- <button onclick="buttonfun()" class="button" id="infor">Register</button> -->
                            <button onclick="buttonfun()" class="button">Login</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var w = document.getElementById("register");
        var x = document.getElementById("login");
        var y = document.getElementById("infor");
        var z = document.getElementById("infol");

        function buttonfun() {
            if (x.style.display === "none") {
                w.style.display = "none";
                x.style.display = "block";
                y.style.display = "block";
                z.style.display = "none";
            } else {
                w.style.display = "block";
                x.style.display = "none";
                y.style.display = "none";
                z.style.display = "block";
            }
        }
    </script>
</body>

</html>