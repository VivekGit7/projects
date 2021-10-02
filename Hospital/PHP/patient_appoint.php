<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" href="../CSS/drop.css" />
    <link rel="stylesheet" href="../CSS/Detailstyle.css">
    <link rel="icon" href="../images/hospital-svgrepo-com (1).svg" />
    <title>Appointment</title>
    <style>
        .appoint {
            display: flex;
        }

        .age-detail,
        .settime {
            display: flex;
            flex-direction: column;
            width: 100%;
            font-size: 17px;
            font-weight: 500;
            margin-bottom: 5px;
        }

        .age-detail .age,
        .settime .appt {
            width: 60%;
            margin: 10px 0px;
            padding: 10px;
            border-radius: 15px;
            border: 1px solid #ccc;
            outline: none;
        }

        .left-nav {
            margin-left: auto;
        }
    </style>
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
                    <li class="nav-item">
                        <a class="nav-link" href="./patient_appoint.php">Appointment</a>
                    </li>
                </ul>
                <div class="left-nav">
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
    <div class="box">
        <div class="dashboard">
            <div class="title">Details Input</div>
            <form action="appoint.php" method="POST">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">First Name </span>
                        <input type="text" placeholder="Enter First name" name="fname" required>
                    </div>
                    <div class="input-box">
                        <span class="details">E-mail </span>
                        <input type="text" placeholder="Enter e-mail" name="email" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Contact </span>
                        <input type="text" placeholder="Enter Contact no." name="contact" pattern="[0-9]{10}" required>
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
                <div class="appoint">
                    <div class="age-detail">
                        <span class="age-title">Date of Appointment </span>
                        <input class="age" type="date" name="date" required>
                    </div>
                    <div class="settime">
                        <span class="time-title">Set time <small>(9 AM to 7 PM)</small></span>
                        <input class="appt" type="time" name="appt" min="09:00" max="19:00" required>
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