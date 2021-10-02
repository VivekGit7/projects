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

$docname = $_POST['dname'];
$dis_name = $_POST['dis_name'];
$medicine = $_POST['medicine'];
$note = $_POST['note'];
$report = $_POST['reports'];
$date = $_POST['date'];
$p_id = $_SESSION['p_id'];

$IQuery = "insert into visits(doctor ,dis_name, med_name, note, report, date, p_id)
                 values ('$docname', '$dis_name', '$medicine','$note','$report' ,'$date' ,'$p_id')";
mysqli_query($db, $IQuery);

header("location:visit.php?pid=" . $p_id);

?>

<!-- <script>
    const clicked = urlParams.get('pid')
    window.location.href = "visit.php?pid=" + clicked;
</script> -->