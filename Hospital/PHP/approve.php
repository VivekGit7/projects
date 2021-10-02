<?php

if (isset($_GET['aid'])) {
    $id = $_GET['aid'];
    $db = mysqli_connect('localhost', 'root');
    mysqli_select_db($db, 'hospital');
    $query = "UPDATE appointment SET status = 1 WHERE a_id = $id;";
    $results = mysqli_query($db, $query);
}

if (isset($_GET['did'])) {
    $id = $_GET['did'];
    $db = mysqli_connect('localhost', 'root');
    mysqli_select_db($db, 'hospital');
    $query = "DELETE FROM appointment WHERE a_id = $id;";
    $results = mysqli_query($db, $query);
}




header('location:app_approve.php');
