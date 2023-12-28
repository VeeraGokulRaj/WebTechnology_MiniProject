<?php
$hodID=$_POST['hodID'];
$hodPass=$_POST['hodPass'];
// Database Connection
$con= new mysqli("localhost","root","","miniproject");
if($con->connect_error){
    die("Failec to connect: ".$con->connect_error);
} else{
    // Validating UserID
    $stmt= $con->prepare("select * from hodlogin where HodID = ?");
    $stmt->bind_param("i",$hodID);
    $stmt->execute();
    $stmt_result= $stmt->get_result();
    if($stmt_result -> num_rows> 0){
        $data=$stmt_result->fetch_assoc();
        if($data['HodPass'] === $hodPass){     // Validating Password
            // echo "<h2>Login Succesfully</h2>";
            header("location: hodPage.php?view_od");
        }else{
            echo "<script>alert('Invalid Password');</script>";
            echo"<script>window.location.href = 'hodLogin.html'</script>";
        }
    }else{
        echo "<script>alert('Invalid UserID');</script>";
        echo"<script>window.location.href = 'hodLogin.html'</script>";
    }
}
?>