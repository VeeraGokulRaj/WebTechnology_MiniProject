<?php
session_start();
$FileReq = $_FILES['cretificate']['name'];
$tempName = $_FILES['cretificate']['tmp_name'];
move_uploaded_file($tempName, "CertificateValidation/$FileReq");

$con = new mysqli("localhost", "root", "", "miniproject"); //DataBase connectivity FileReq '$reqFile'
if ($con->connect_error) {
    die("Failec to connect: " . $con->connect_error);
}

$sql_check = "SELECT 1 FROM certificate_verify WHERE Regno = '$regno'";
$result = mysqli_query($con, $sql_check);
// if ($result && mysqli_num_rows($result) == 0) {
//     echo "<script>alert('Submit OD request!!');</script>";
//     echo '<script type="text/javascript">window.location.replace("form1.php");</script>';
// }
// else{
    $query = "UPDATE certificate_verify SET FileReq = '$FileReq' WHERE Regno = '" . $_SESSION['user'] . "'";

    if (mysqli_query($con, $query)) {
        echo "<script>alert('Certificate Uploaded');</script>";
        echo '<script type="text/javascript">window.location.replace("form1.php");</script>';
    }
// }
?>