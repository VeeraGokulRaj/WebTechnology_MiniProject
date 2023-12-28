<!DOCTYPE html>
<html lang="en">
<?php
    $con= new mysqli("localhost","root","","miniproject");  //DataBase connectivity FileReq '$reqFile'
    if($con->connect_error){
        die("Failed to connect: ".$con->connect_error);
    }
    if(isset($_GET['reg'])){
        list($reg, $date, $sts) = [$_GET['reg'], $_GET['date'], $_GET['sts']];
        if($sts==1){
            $query='INSERT INTO stuformdetail SELECT * FROM warden_page WHERE Regno='.$reg;
            $query1='delete from warden_page where Regno='.$reg;
            if(mysqli_query($con,$query)&&mysqli_query($con,$query1)){
                echo "<script>window.alert('Updated to Class advisor')</script>";
            }
        }else if($sts==0){
            $query = 'UPDATE warden_page SET Status="declined" WHERE Regno=' . $reg . ' AND ODstDate="' . $date . '"';
            $query1 = 'UPDATE od_details SET Status="declined" WHERE Regno=' . $reg . ' AND ODstDate="' . $date . '"';
            if(mysqli_query($con,$query)&&mysqli_query($con,$query1)){
                echo "<script>window.alert('Status updated')</script>";
            }
            $query='delete from warden_page where Regno='.$reg;
            $res = mysqli_query($con,$query);
        }
    }
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warden page</title>
    <link rel="shortcut icon" type="x-icon" href="logo.jpg">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="HomeStyle.css">
    <style>
        p{
            font-size: 1.25rem;
            padding: 1rem 0 1rem 0;
        }
        tbody{
            font-size: 1.15rem;
        }
        .dataFetch,.dataFetch td,.dataFetch th {
            border: 1px solid black;
            border-collapse: collapse;
            padding: .75rem;
        }

        .dataFetch {
            width: 70%;
            margin: auto;
        }
    </style>
</head>

<body>
    <!-- Nav-bar -->
    <nav class="nav">
        <div class="logohead">
            <a href="Home.html"><img src="logo.jpg" width="100px" height="80px" alt="Logo"></a>
            <h3>V.P.S<span class="clg"> College of Technology</span></h3>
        </div>
        <ul>
            <li><a href="Home.html">Home</a></li>
            <li><a href="stuLogin.html">Student Login</a></li>
            <li><a href="wardenLogin.html">LogOut</a></li>
            <li><a href="#OD">OD Request</a></li>
            <!-- <li><a href="#alumni">Alumni</a></li> -->
        </ul>
    </nav>
    <!-- banner -->
    <section class="banner">
        <h2>V.P.S College of Technology</h2>
        <p>Light Your Life</p>
        <img src="wave1.png" alt="">
    </section>

    <!-- form -->
    <!-- <h2 class="title" style="margin-bottom: 3rem;">Faculty Page</h2> -->
    <article class=" form" id="OD">
        <section class="OD_img">
            <!-- <img src="form-cover.png" alt=""> -->
            <nav class="dataFetch_ul">
                <ul>
                    <a href="wardenPage.php?view_od" class="option"><li>View OD Details</li></a>
                    <a href="wardenPage.php?hod_update" class="option"><li>HOD Updates</li></a>
                </ul>
            </nav>
        </section>
        <section class="ODForm">

            <?php 
            
            // Student OD Details
            if(isset($_GET['view_od'])){
                include('DataFetchWarden.php');
            }
            // HOD updates
            if(isset($_GET['hod_update'])){
                    $con = new mysqli("localhost", "root", "", "miniproject"); //DataBase connectivity FileReq '$reqFile'
                    if ($con->connect_error) {
                        die("Failed to connect: " . $con->connect_error);
                    }
                    $query = "select * from fac_ref where Scholar='hostel'";
                    $res = mysqli_query($con, $query);
                    $numRow = mysqli_num_rows($res);
                    if ($numRow > 0) {
                        echo '<table class="dataFetch">';
                        echo '<tr>';
                        echo '<th>Name</th>';
                        echo '<th>Regno</th>';
                        echo '<th>ODstDate</th>';
                        echo '<th>ODendDate</th>';
                        echo '<th>ODreqDays</th>';
                        echo '<th>Reason</th>';
                        echo '<th>Status</th>';
                        echo '</tr>';
                        while ($row = mysqli_fetch_assoc($res)) {
                            $DocReq = $row['FileReq'];
                            echo '<pre>';

                            echo '<tr>';
                            echo '<td>' . $row['Name'] . '</td>';
                            echo '<td>' . $row['Regno'] . '</td>';
                            echo '<td>' . $row['ODstDate'] . '</td>';
                            echo '<td>' . $row['ODendDate'] . '</td>';
                            echo '<td>' . $row['ODreqDays'] . '</td>';
                            echo '<td>' . $row['Reason'] . '</td>';
                            echo "<td>" . $row['Status'] . "</td>";
                            echo '</tr>';
                            // print_r($row);
                
                            echo '<pre>';
                        }
                        echo "</table>";
                    } else {
                        echo    "<h3 class='recNotFound'style='color: green;font-size: 30px;  text-align: center;'>Record not Found!</h3>";
                    }
                }
            ?>
        </section>
    </article>

    <!-- footer -->
    <footer>
        <section class="footer">
            <img src="wave2.png" alt="">
            <div class="main foot-div">
                <article>
                    <div>
                        <a href="Home.html"><img src="logo.jpg" alt="logo"></a>
                        <p class="foot-p">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Delectus voluptate
                            voluptates nobis
                        </p>
                    </div>
                </article>
                <article>
                    <h3 class="foot-p">Contact Us</h3>
                    <p class="foot-p" style="margin-top: 0.7rem;"><i class="bi bi-telephone-fill"></i> &nbsp;&nbsp;+91
                        12345678890</p>
                    <p class="foot-p" style="margin-top: 0.7rem;"><i class="bi bi-envelope-fill"></i>
                        &nbsp;&nbsp;pssubramani@gmail.com</p>
                    <p class="foot-p" style="margin-top: 0.7rem;"><i class="bi bi-geo-alt-fill"></i> &nbsp;&nbsp;PSS
                        Nagar, Kattankulathur - 603 203. Chengalpattu District, Tamil Nadu</p>

                </article>
                <article class="foot-icone">
                    <h3 class="foot-p">Social media</h3>
                    <a class="foot-p" href="https://www.instagram.com/"><i
                            class="bi bi-instagram"></i>&nbsp;&nbsp;Instagram</a>
                    <a class="foot-p" href="https://www.facebook.com/"><i
                            class="bi bi-facebook"></i>&nbsp;&nbsp;Facebook</a>
                    <a class="foot-p"
                        href="https://twitter.com/i/flow/login?input_flow_data=%7B%22requested_variant%22%3A%22eyJsYW5nIjoiZW4ifQ%3D%3D%22%7D"><i
                            class="bi bi-twitter"></i>&nbsp;&nbsp;Twitter</a>
                </article>
            </div>
            <hr class="main">
            <p class="main foot-p" style="text-align: center; font-size: 1.1rem; ">Copyrights 2023 - P.S.Subramani
                College of Technology</p>
        </section>
    </footer>
</body>

</html>