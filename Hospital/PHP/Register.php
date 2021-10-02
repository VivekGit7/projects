<?php
// header('location:login.php');
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
$email = $_POST['Email'];

$Query = "select * from reception where name = '$name' && email = '$email' ";

$result = mysqli_query($db, $Query);

$cnt = mysqli_num_rows($result);

if ($cnt == 1) {
    echo "<script>
    alert('Pre-exist, Please change Username or E-mail!!!');
    window.location.href='./login.php';
    </script>";
} else {
    $IQuery = "insert into reception(name , password , email) values ('$name', '$pass' ,'$email')";
    mysqli_query($db, $IQuery);
    echo "<script>
    alert('Successful!!!');
    window.location.href='./login.php';
    </script>";
}
