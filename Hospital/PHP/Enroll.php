<!-- For infomation.php -->



<?php
// header('location:Information.php');
session_start();


// connect to db

$db = mysqli_connect('localhost', 'root');
if ($db) {
    echo "Connection Successful";
} else {
    echo "Failed to connect";
}

mysqli_select_db($db, 'hospital');

$fname = $_POST['fname'];
$sname = $_POST['sname'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$height = $_POST['height'];
$weight = $_POST['weight'];
$gender = $_POST['gender'];
$date = $_POST['date'];
$disease = $_POST['disease'];

$dis = "";
foreach ($disease as $dis1) {
    $dis .= $dis1 . " | ";
}

$Query = "select * from patients where firstname = '$fname' && surname = '$sname' ";

$result = mysqli_query($db, $Query);

$cnt = mysqli_num_rows($result);

if ($cnt == 1) {
    echo "<script>
    alert('Pre-exits!!!');
    window.location.href='./Information.php';
    </script>";
} else {
    $IQuery = "insert into patients(firstname ,surname, email, contact, height, weight, gender, dob, disease)
                 values ('$fname', '$sname', '$email','$contact','$height' ,'$weight' , '$gender' ,'$date','$dis')";
    mysqli_query($db, $IQuery);
    echo "<script>
    alert('Successful!!!');
    window.location.href='./Information.php';
    </script>";
}

?>