<?php
$facilityId=$_POST['facilityId'];
$facilityPass=$_POST['facilityPass'];
// Database Connection
$con= new mysqli("localhost","root","","miniproject");
if($con->connect_error){
    die("Failec to connect: ".$con->connect_error);
} else{
    // Validating UserID
    $stmt= $con->prepare("select * from facilitylogin where FacilityId = ?");
    $stmt->bind_param("i",$facilityId);
    $stmt->execute();
    $stmt_result= $stmt->get_result();
    if($stmt_result -> num_rows> 0){
        $data=$stmt_result->fetch_assoc();
        if($data['FacilityPass'] === $facilityPass){     // Validating Password
            // echo "<h2>Login Succesfully</h2>";
            session_start();
            $_SESSION['user']=$facilityId;
            header("location: FacPage.php?view_od");
        }else{
            echo "<script>alert('Invalid Password');</script>";
            echo"<script>window.location.href = 'staffLogin.html'</script>";
        }
    }else{
        echo "<script>alert('Invalid UserID');</script>";
        echo"<script>window.location.href = 'staffLogin.html'</script>";
    }
}
?>