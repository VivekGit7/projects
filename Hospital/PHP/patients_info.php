<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" /> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="../CSS/drop.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <style>
        body {
            background-color: #1b59ac;
            height: 100vh;
            background-image: url("../images/data.svg");
            background-position: left 2% bottom 2%;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 10%;
            font-family: "Poppins", sans-serif;
        }

        h1,
        th,
        td {
            color: whitesmoke;
        }

        .p_btn {
            border: none;
            height: 100%;
            width: 100%;
            border-radius: 5px;
        }

        .left-nav {
            margin-left: auto;
        }
    </style>
    <script>
        $(document).ready(function() {
            $("button").click(function() {
                $("h1").addClass("intro");
            });
        });

        function get_id(clicked) {
            window.location.href = "visit.php?pid=" + clicked;
        }
    </script>
    <link rel="icon" href="../images/hospital-svgrepo-com (1).svg" />
    <title>info</title>
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
    <div class="container">
        <h1 style="margin: 10px 0;">Patient's List</h1>
        <input class="form-control" id="myInput" type="text" placeholder="Search..." />
        <br />
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>P-ID</th>
                    <th>First Name</th>
                    <th>Surname</th>
                    <th>E-mail</th>
                    <th>Contact</th>
                    <th>Height (cm's)</th>
                    <th>Weight(kg's)</th>
                    <th>Gender</th>
                    <th>Date of birth</th>
                    <th>Known Disease</th>
                    <th>Date & Time</th>
                    <th>Profile</th>
                </tr>
            </thead>
            <tbody id="myTable">
                <?php

                // connect to db

                $db = mysqli_connect('localhost', 'root');
                mysqli_select_db($db, 'hospital');
                $query = "SELECT * FROM patients";
                $results = mysqli_query($db, $query);
                $total = mysqli_num_rows($results);

                if ($total != 0) {
                    while ($row = mysqli_fetch_array($results)) {
                        $btn = $row["p_id"];
                        echo "
                        <tr>
                        <td>" . $row["p_id"] . "</td>
                        <td>" . $row["firstname"] . "</td>
                        <td>" . $row["surname"] . "</td>
                        <td>" . $row["email"] . "</td>                    
                        <td>" . $row["contact"] . "</td>                    
                        <td>" . $row["height"] . "</td>
                        <td>" . $row["weight"] . "</td>
                        <td>" . $row["gender"] . "</td>
                        <td>" . $row["dob"] . "</td>
                        <td>" . $row["disease"] . "</td>
                        <td>" . $row["time"] . "</td>
                        <td><button class='p_btn' id='$btn' onClick='get_id(this.id)'>Show</button></td>
                    </tr>";
                    }
                } else {
                    echo "<p>NO DATA FOUND!!!!!</p>";
                }

                ?>
            </tbody>
        </table>
    </div>

    <script>
        $(document).ready(function() {
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            });
        });
    </script>
</body>

</html>