<?php
$stuId=$_POST['stuID'];
$stuPass=$_POST['stuPass'];
// Database Connection
$con= new mysqli("localhost","root","","miniproject");
if($con->connect_error){
    die("Failed to connect: ".$con->connect_error);
} else{
    // Validating UserID
    $stmt= $con->prepare("select * from studentlogin where StudentID = ?");
    $stmt->bind_param("i",$stuId);
    $stmt->execute();
    $stmt_result= $stmt->get_result();
    if($stmt_result -> num_rows> 0){
        $data=$stmt_result->fetch_assoc();
        if($data['StudentPass'] === $stuPass){     // Validating Password
            // echo "Login Succesfully ";
            session_start();
            $_SESSION['user']=$stuId;
            header("location: form1.php");
        }else{
            echo "<script>alert('Invalid Password');</script>";
            // header("location:stuLogin.html");
            echo"<script>window.location.href = 'stuLogin.html'</script>";
        }
    }else{
        echo "<script>alert('Invalid UserID');</script>";
        echo"<script>window.location.href = 'stuLogin.html'</script>";
    }
}
?>