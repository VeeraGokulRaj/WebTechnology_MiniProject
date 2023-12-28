<!DOCTYPE html>
<html lang="en">
<?php
$con = new mysqli("localhost", "root", "", "miniproject"); //DataBase connectivity FileReq '$reqFile'
if ($con->connect_error) {
    die("Failed to connect: " . $con->connect_error);
}
if (isset($_GET['reg'])) {
    $reg = $_GET['reg'];
    $date = $_GET['date'];
    $sts = $_GET['sts'];

    if ($sts == 0 || $sts == 1) {
        if ($sts == 1) {
            $query = 'UPDATE hodpage SET Status="UploadCertificate" WHERE Regno=' . $reg . ' AND ODstDate="' . $date . '"';
            $query1 = 'UPDATE od_details SET Status="UploadCertificate" WHERE Regno=' . $reg . ' AND ODstDate="' . $date . '"';
            $query2 = 'INSERT INTO certificate_verify SELECT * FROM hodpage WHERE Regno=' . $reg;
            $query3 = 'UPDATE certificate_verify SET FileReq = "YetToUplode" WHERE Regno=' . $reg;
            $res = mysqli_query($con, $query2);
            $res = mysqli_query($con, $query3);

            // $query = 'UPDATE hodpage SET Status="approved" WHERE Regno=' . $reg . ' AND ODstDate="' . $date . '"';
            // $query1 = 'UPDATE od_details SET Status="approved" WHERE Regno=' . $reg . ' AND ODstDate="' . $date . '"';
        } else if ($sts == 0) {
            $query = 'UPDATE hodpage SET Status="declined" WHERE Regno=' . $reg . ' AND ODstDate="' . $date . '"';
            $query1 = 'UPDATE od_details SET Status="declined" WHERE Regno=' . $reg . ' AND ODstDate="' . $date . '"';
        }
        if (mysqli_query($con, $query) && mysqli_query($con, $query1)) {
            echo "<script>window.alert('status updated')</script>";
        }
        $query = 'INSERT INTO fac_ref SELECT * FROM hodpage WHERE Regno=' . $reg;
        $res = mysqli_query($con, $query);
        $query = 'delete from hodpage where Regno=' . $reg;
        $res = mysqli_query($con, $query);

        $res = mysqli_query($con, $query);

        $query = 'delete from stuformdetail where Regno=' . $reg;
        $res = mysqli_query($con, $query);
    }

    else{
        if ($sts == 3) {
            $query = 'UPDATE certificate_verify SET Status="approved" WHERE Regno=' . $reg . ' AND ODstDate="' . $date . '"';
            $query1 = 'UPDATE od_details SET Status="approved" WHERE Regno=' . $reg . ' AND ODstDate="' . $date . '"';
        }
        else if ($sts == 4) {
            $query = 'UPDATE certificate_verify SET Status="declined" WHERE Regno=' . $reg . ' AND ODstDate="' . $date . '"';
            $query1 = 'UPDATE od_details SET Status="declined" WHERE Regno=' . $reg . ' AND ODstDate="' . $date . '"';
        }
        if (mysqli_query($con, $query) && mysqli_query($con, $query1)) {
            echo '<script>window.alert("Status Updatede")</script>';
        }
        $query = 'INSERT INTO fac_ref SELECT * FROM certificate_verify WHERE Regno=' . $reg;
        $res = mysqli_query($con, $query);
        $query = 'DELETE FROM certificate_verify WHERE Regno=' . $reg;
        $res = mysqli_query($con, $query);
        $query = 'DELETE FROM stuformdetail WHERE Regno=' . $reg;
        $res = mysqli_query($con, $query);
    }
}
?>


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOD page</title>
    <link rel="shortcut icon" type="x-icon" href="logo.jpg">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="HomeStyle.css">
    <style>
        p {
            font-size: 1.25rem;
            padding: 1rem 0 1rem 0;
        }

        tbody {
            font-size: 1.15rem;
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
            <li><a href="staffLogin.html">Faculty Login</a></li>
            <li><a href="hodLogin.html">LogOut</a></li>
            <li><a href="#OD">OD Request</a></li>
        </ul>
    </nav>
    <!-- banner -->
    <section class="banner">
        <h2>V.P.S College of Technology</h2>
        <p>Light Your Life</p>
        <img src="wave1.png" alt="">
    </section>

    <!-- form -->
    <article class=" form" id="OD">
        <section class="OD_img">
            <nav class="dataFetch_ul">
                <ul>
                    <a href="hodPage.php?view_od" class="option">
                        <li>View OD Details</li>
                    </a>
                    <a href="hodPage.php?OD_records" class="option">
                        <li>OD Records</li>
                    </a>
                    <a href="hodPage.php?cer_valid" class="option">
                        <li>Certificate Details</li>
                    </a>
                    <a href="hodPage.php?DeleteOD_records" class="option">
                        <li>Delete OD Records</li>
                    </a>
                </ul>
            </nav>
        </section>
        <section class="ODForm">
            <?php

            if (isset($_GET['view_od'])) {
                include('DataFetchHOD.php');
            }
            if (isset($_GET['OD_records'])) {
                include('viewDetails.php');
            }
            if (isset($_GET['cer_valid'])) {
                include('DataFetchCertificate.php');
            }

            if (isset($_GET['DeleteOD_records'])) {
                $con = new mysqli("localhost", "root", "", "miniproject");
                if ($con->connect_error) {
                    die("Connection failed: " . $con->connect_error);
                }

                $sql = "TRUNCATE od_details";
                $result = mysqli_query($con, $sql);
                if ($result) {
                    echo "<script>alert('Records Deleted');</script>";
                    echo '<script type="text/javascript">window.location.replace("hodpage.php");</script>';
                } else {
                    echo "nahhh";
                }
                $sql = "TRUNCATE fac_ref";
                $result = mysqli_query($con, $sql);
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