<?php

session_start();

if (!isset($_SESSION['username'])) {
    header('location:login.php');
}

?>

<!-- Enroll.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/Detailstyle.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="icon" href="../images/hospital-svgrepo-com (1).svg" />
    <link rel="stylesheet" href="../CSS/drop.css">
    <title>Infomation</title>
</head>

<body>
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
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./patient_appoint.php">Appointment</a>
                    </li>
                </ul>
                <div class="left-nav" style="margin-left: auto;">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <!-- <a class="nav-link" href="./Results.php">Users</a> -->
                            <div class="user">
                                <span class="name" style="font-size: 16px; margin:12px;">Welcome <?php echo $_SESSION['username']; ?></span>
                                <form action="logout.php">
                                    <div class="button">
                                        <input type="submit" value="LOGOUT">
                                    </div>
                                </form>
                            </div>
                        </li>
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
    <div class="box">
        <div class="dashboard">
            <div class="title">Details Input</div>
            <form action="Enroll.php" method="POST">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">First Name </span>
                        <input type="text" placeholder="Enter First name" name="fname" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Surname </span>
                        <input type="text" placeholder="Enter Surname" name="sname" required>
                    </div>
                    <div class="input-box">
                        <span class="details">E-mail </span>
                        <input type="text" placeholder="Enter e-mail" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Contact </span>
                        <input type="text" placeholder="Enter Contact no." name="contact" pattern="[0-9]{10}" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Heigh(cm's) </span>
                        <input type="text" placeholder="ex. 175" name="height" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Weight(kg's) </span>
                        <input type="text" placeholder="ex. 70" name="weight" required>
                    </div>
                </div>
                <div class="gender-detail">
                    <span class="gender-title">Gender</span>
                    <div class="category">
                        <label for="">
                            <input class="dot" type="radio" name="gender" value="male">
                            <span class="gender">Male</span>
                        </label>
                        <label for="">
                            <input class="dot" type="radio" name="gender" value="female">
                            <span class="gender">Female</span>
                        </label>
                        <label for="">
                            <input class="dot" type="radio" name="gender" value="unspecified">
                            <span class="gender">Prefer not to say</span>
                        </label>
                    </div>
                </div>
                <div class="age-detail">
                    <span class="age-title">Date of birth </span>
                    <input class="age" type="date" name="date" required>
                </div>
                <div class="disease">
                    <span class="d_title">Known Disease</span>
                    <div class="type">
                        <label for="">
                            <input type="checkbox" name="disease[]" value="Hypertention">
                            <span>Hypertention</span>
                        </label>
                        <label for="">
                            <input type="checkbox" name="disease[]" value="Diabetic">
                            <span>Diabetic</span>
                        </label>
                        <label for="">
                            <input type="checkbox" name="disease[]" value="Thyroid">
                            <span>Thyroid</span>
                        </label>
                        <label for="">
                            <input type="checkbox" name="disease[]" value="G6PD">
                            <span>G6PD</span>
                        </label>
                        <label for="">
                            <input type="checkbox" name="disease[]" value="None">
                            <span>None</span>
                        </label>
                    </div>
                </div>
                <div class="button">
                    <input type="submit" name="submit" value="Enter">
                </div>
            </form>
        </div>
    </div>
</body>

</html>