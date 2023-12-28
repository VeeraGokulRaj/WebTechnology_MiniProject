<?php
$name = $_POST['stuName']; //Variable Declaration
$regno = $_POST['regNo'];
$dept = $_POST['dep'];
$year = $_POST['year'];
$sem = $_POST['sem'];
$availed = $_POST['daysAvailed'];
$ODstDate = $_POST['stDate'];
$ODendDate = $_POST['endDate'];
$ODreqDays = $_POST['ODreq'];

if (isset($_POST['scholar'])) {
    $scholar = $_POST['scholar'];
} else {
    die("Please select an Scholar.");
}

if (isset($_POST['sec'])) {
    $section = $_POST['sec'];
} else {
    die("Please select an Scholar.");
}
if ($section == 0)
    $section = 1021201;
else
    $section = 1021202;

$FileReq = $_FILES['filereq']['name'];
$tempName = $_FILES['filereq']['tmp_name'];
move_uploaded_file($tempName, "Doc_Req/$FileReq");
$reason = $_POST['reason'];

$con = new mysqli("localhost", "root", "", "miniproject"); //DataBase connectivity FileReq '$reqFile'
if ($con->connect_error) {
    die("Failec to connect: " . $con->connect_error);
}
//Value insertion

if ($scholar == "hostel") {
    // $sql = "INSERT INTO warden_page (Name,Regno,Dept,Year,Sem,Availed,ODstDate,ODendDate,ODreqDays,FileReq,Reason,FacilityID) VALUES('$name','$regno','$dept','$year','$sem','$availed','$ODstDate','$ODendDate','$ODreqDays','$FileReq' ,'$reason','$section');";
    // $sql1 = "INSERT INTO od_details (Name,Regno,Dept,Year,Sem,Availed,ODstDate,ODendDate,ODreqDays,FileReq,Reason) VALUES('$name','$regno','$dept','$year','$sem','$availed','$ODstDate','$ODendDate','$ODreqDays','$FileReq' ,'$reason');";
    $sql_check = "SELECT 1 FROM stuformdetail WHERE Regno = '$regno'";
    $result = mysqli_query($con, $sql_check);
    $sql_check1= "SELECT 1 FROM hodpage WHERE Regno = '$regno'";
    $result1 = mysqli_query($con, $sql_check1);
    $sql_check2= "SELECT 1 FROM certificate_verify WHERE Regno = '$regno'";
    $result2 = mysqli_query($con, $sql_check2);

    if (mysqli_num_rows($result) == 0&&mysqli_num_rows($result1) == 0 &&mysqli_num_rows($result2) == 0) {
        // Regno does not exist in hodpage, insert data into stuformdetail
        $sql = "INSERT INTO warden_page (Name, Regno, Dept, Year, Sem, Availed, ODstDate, ODendDate, ODreqDays, FileReq, Reason, FacilityID, Scholar)
            VALUES ('$name', '$regno', '$dept', '$year', '$sem', '$availed', '$ODstDate', '$ODendDate', '$ODreqDays', '$FileReq', '$reason', '$section','$scholar')";
        $sql1 = "INSERT INTO od_details (Name,Regno,Dept,Year,Sem,Availed,ODstDate,ODendDate,ODreqDays,FileReq,Reason) VALUES('$name','$regno','$dept','$year','$sem','$availed','$ODstDate','$ODendDate','$ODreqDays','$FileReq' ,'$reason');";
        if (mysqli_query($con, $sql) && mysqli_query($con, $sql1)) {
            echo "<script>alert('Requested Succesfully');</script>";
            echo '<script type="text/javascript">window.location.replace("form1.php");</script>';
        } else {
            echo "<script>alert('Request in queue');</script>";
            echo '<script type="text/javascript">window.location.replace("form1.php");</script>';
        }
    } else {
        echo "<script>alert('Request in queue');</script>";
        echo '<script type="text/javascript">window.location.replace("form1.php");</script>';
    }
} else {
    // $sql="INSERT INTO stuformdetail (Name,Regno,Dept,Year,Sem,Availed,ODstDate,ODendDate,ODreqDays,FileReq,Reason,FacilityID) VALUES('$name','$regno','$dept','$year','$sem','$availed','$ODstDate','$ODendDate','$ODreqDays','$FileReq' ,'$reason','$section') WHERE hodpage Regno<>'$regno';";
    // $sql1 = "INSERT INTO od_details (Name,Regno,Dept,Year,Sem,Availed,ODstDate,ODendDate,ODreqDays,FileReq,Reason) VALUES('$name','$regno','$dept','$year','$sem','$availed','$ODstDate','$ODendDate','$ODreqDays','$FileReq' ,'$reason');";

    $sql_check = "SELECT 1 FROM hodpage WHERE Regno = '$regno'";
    $result = mysqli_query($con, $sql_check);
    $sql_check2= "SELECT 1 FROM certificate_verify WHERE Regno = '$regno'";
    $result2 = mysqli_query($con, $sql_check2);


    if (mysqli_num_rows($result) == 0 && mysqli_num_rows($result2) == 0) {
        // Regno does not exist in hodpage, insert data into stuformdetail
        $sql = "INSERT INTO stuformdetail (Name, Regno, Dept, Year, Sem, Availed, ODstDate, ODendDate, ODreqDays, FileReq, Reason, FacilityID, Scholar)
            VALUES ('$name', '$regno', '$dept', '$year', '$sem', '$availed', '$ODstDate', '$ODendDate', '$ODreqDays', '$FileReq', '$reason', '$section','$scholar')";
        $sql1 = "INSERT INTO od_details (Name,Regno,Dept,Year,Sem,Availed,ODstDate,ODendDate,ODreqDays,FileReq,Reason) VALUES('$name','$regno','$dept','$year','$sem','$availed','$ODstDate','$ODendDate','$ODreqDays','$FileReq' ,'$reason');";
        if (mysqli_query($con, $sql) && mysqli_query($con, $sql1)) {
            echo "<script>alert('Requested Succesfully');</script>";
            echo '<script type="text/javascript">window.location.replace("form1.php");</script>';
        }else {
            echo "<script>alert('Request in queue');</script>";
            echo '<script type="text/javascript">window.location.replace("form1.php");</script>';
        }
    } else {
        echo "<script>alert('Request in queue');</script>";
        echo '<script type="text/javascript">window.location.replace("form1.php");</script>';
    }


}
?>