<!DOCTYPE html>

<?php
session_start();

$get_pid = $_GET["pid"];

$_SESSION['p_id'] = $get_pid;

?>

<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous" />
    <link rel="stylesheet" href="../CSS/Detailstyle.css">
    <link rel="icon" href="../images/hospital-svgrepo-com (1).svg" />
    <link rel="stylesheet" href="../CSS/drop.css">
    <title>Visit</title>
    <style>
        body {
            background-color: #1b59ac;
            height: 100vh;
            background-repeat: no-repeat;
            font-family: "Poppins", sans-serif;
            display: block;
            background-image: url("../images/data.svg");
            background-position: right 2% top 20%;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 10%;
        }

        .dash {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 90%;

        }

        .dashboard {
            margin: 20px;
        }

        .p_btn {
            border: none;
            padding: 3px;
            height: 100%;
            width: 100%;
            border-radius: 5px;
        }

        .send_mail .s_btn {
            border: none;
            padding: 5px;
            border-radius: 5px;
            width: 50px;
        }

        h1,
        th,
        td {
            color: whitesmoke;
        }

        .left-nav {
            margin-left: auto;
        }

        .send_mail {
            display: none;
        }

        .send_mail input {
            height: 40px;
            width: 40%;
            outline: none;
            border: 1px solid #ccc;
            border-radius: 10px;
            padding-left: 10px;
            font-size: 15px;
            border-bottom-width: 2px;
            transition: all 0.3s ease;
        }

        .show {
            display: block;
            margin: 10px 0px;
        }
    </style>
    <script>
        function send_id(clicked) {
            // var uid = clicked;
            // document.getElementById("show").innerHTML = uid;
            document.getElementById('v_form').submit();
            window.location.href = "visit.php?pid=" + clicked;
        }

        function show_field() {
            document.getElementById("m_btn").classList.add("show");
        }
    </script>
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
    <div class="dash">
        <div class="dashboard">
            <div class="title">Details Input</div>
            <form action="Enroll_visit.php" method="POST" id="v_form">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Doctor's Name </span>
                        <input type="text" placeholder="Enter Doctor's Name" name="dname" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Treated Disease </span>
                        <input type="text" placeholder="Disease's Name" name="dis_name" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Medicine </span>
                        <input type="text" placeholder="Medicine's Name" name="medicine" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Doctor's Note </span>
                        <textarea name="note" rows="4" cols="35" placeholder="Add Personal Note"></textarea>
                    </div>
                </div>
                <div class="gender-detail">
                    <span class="gender-title">Reports Done</span>
                    <div class="category">
                        <label for="">
                            <input class="dot" type="radio" name="reports" value="yes">
                            <span class="reports">Yes</span>
                        </label>
                        <label for="">
                            <input class="dot" type="radio" name="reports" value="no">
                            <span class="reports">No</span>
                        </label>
                        <label for="">
                            <input class="dot" type="radio" name="reports" value="self done">
                            <span class="reports">Done form other source</span>
                        </label>
                    </div>
                </div>
                <div class="Next_visit">
                    <span class="next-title">Next Visit </span>
                    <input class="n_visit" type="date" name="date">
                </div>
                <div class="button">
                    <input type="submit" name="submit" value="Enter">
                </div>
            </form>
        </div>

        <!-- enter into visit table -->

        <div class="new">
            <h1>Last Visited</h1>
            <div class="send_mail" id="m_btn">
                <form action="../send_mail.php" method="POST" target="_blank">
                    <input type="text" name="smail" placeholder="Enter V-ID" required>
                    <input type="submit" class="s_btn" value="SEND">
                </form>
            </div>
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>V-ID</th>
                        <th>Doctor's Name</th>
                        <th>Disease</th>
                        <th>Medicine</th>
                        <th>Notes</th>
                        <th>Reports</th>
                        <th>Date</th>
                        <th>Mail</th>
                    </tr>
                </thead>
                <tbody id="myTable">

                    <?php

                    // connect to db



                    $db = mysqli_connect('localhost', 'root');
                    mysqli_select_db($db, 'hospital');


                    //display table

                    $query = "SELECT * FROM visits WHERE visits.p_id=$get_pid";
                    $results = mysqli_query($db, $query);
                    $total = mysqli_num_rows($results);

                    if ($total != 0) {
                        while ($row = mysqli_fetch_array($results)) {
                            $btn = $row["p_id"];
                            echo "
                                <tr>
                                <td>" . $row["v_id"] . "</td>
                                <td>" . $row["doctor"] . "</td>
                                <td>" . $row["dis_name"] . "</td>
                                <td>" . $row["med_name"] . "</td>                    
                                <td>" . $row["note"] . "</td>                    
                                <td>" . $row["report"] . "</td>                    
                                <td>" . $row["date"] . "</td> 
                                <td><button class='p_btn' onclick='show_field()'>Send</button></td>                   
                            </tr>";
                        }
                    } else {
                        echo "<p>No Records !!!</p>";
                    }


                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>