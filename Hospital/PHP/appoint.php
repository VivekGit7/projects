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

$firstname = $_POST['fname'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$gender = $_POST['gender'];
$date = $_POST['date'];
$time = $_POST['appt'];
$status = 0;


$IQuery = "insert into appointment(firstname ,email, contact, gender, date, time, status)
                 values ('$firstname', '$email', '$contact','$gender','$date' ,'$time' ,'$status')";
mysqli_query($db, $IQuery);

echo "<script>
alert('Successful!!!');
window.location.href='./patient_appoint.php';
</script>";
