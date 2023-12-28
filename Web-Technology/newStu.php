<?php
$stuName=$_POST['stuName'];    //Variable Declaration
$regNo=$_POST['regNo'];
$con= new mysqli("localhost","root","","miniproject");  //DataBase connectivity FileReq '$reqFile'
    if($con->connect_error){
        die("Failec to connect: ".$con->connect_error);
    }
    
    $sql="INSERT INTO studentlogin (StudentID,StudentPass) VALUES('$stuName','$regNo');";
    if(mysqli_query($con,$sql)){
        echo "<script>alert('Inserted Succesfully');</script>";
        echo '<script type="text/javascript">window.location.replace("FacPage.php");</script>';
        // header("location: form.html");
    }
    else{
        echo"error";
    }
?>