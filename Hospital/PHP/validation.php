<?php
session_start();


// connect to db

$db = mysqli_connect('localhost', 'root');
if ($db) {
    echo "Connection Successful";
} else {
    echo "Failed to connect";
}

mysqli_select_db($db, 'hospital');

$name = $_POST['Username'];
$pass = $_POST['Password'];

$Query = "select * from reception where name = '$name' && password = '$pass' ";

$result = mysqli_query($db, $Query);

$cnt = mysqli_num_rows($result);

if ($cnt == 1) {
    $_SESSION['username'] = $name;
    header('location:Information.php');
} else {
    header("location:login.php?error=1");
}



//sql

// SELECT visits.v_id,visits.doctor,visits.date
// FROM visits
// INNER JOIN patients
// ON visits.p_id = patients.p_id
// WHERE visits.p_id=1;
