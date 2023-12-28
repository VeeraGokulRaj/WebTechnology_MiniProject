<!DOCTYPE html>
<html lang="en">
<?php
session_start();
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StudentOD Form</title>
    <link rel="shortcut icon" type="x-icon" href="logo.jpg">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="HomeStyle.css">
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
            <!-- <li><a href="stuLogin.html">Student Login</a></li> -->
            <li><a href="stuLogin.html">LogOut</a></li>
            <li><a href="staffLogin.html">Facility Login</a></li>
            <li><a href="#OD">OD Form</a></li>
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
    <article class="main OD-form" id="OD">
        <section class="OD-img">
            <img src="form-cover.png" alt="">
        </section>
        <section class="ODForm">
            <form action="http://localhost/Web-Technology/Form.php" method="post" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td><label for="stuName">Student Name</label></td>
                        <td><input type="text" name="stuName" id="stuName" required></td>
                    </tr>
                    <tr>
                        <td><label for="regNo">Register Number</label></td>
                        <td><input type="tel" name="regNo" id="regNo" required></td>
                    </tr>
                    <tr>
                        <td><label for="dep">Depatrment</label></td>
                        <td><select name="dep" id="dep" required>
                                <option value="#">-Select your Department-</option>
                                <option value="IT">Information Technology</option>
                                <option value="CS">Computer Science</option>
                                <option value="AIDS">Artificial intelligence</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="year">Year</label></td>
                        <td><select name="year" id="year" required>
                                <option value="#">-Select your Year-</option>
                                <option value="1">I</option>
                                <option value="2">II</option>
                                <option value="3">III</option>
                                <option value="4">IV</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="sem">Semester</label></td>
                        <td><select name="sem" id="sem" required>
                                <option value="#">-Select your Sem-</option>
                                <option value="1">I</option>
                                <option value="2">II</option>
                                <option value="3">III</option>
                                <option value="4">IV</option>
                                <option value="5">V</option>
                                <option value="6">VI</option>
                                <option value="7">VII</option>
                                <option value="8">VIII</option>
                            </select>
                        </td>
                    </tr>
                    <!-- <tr>
                        <td><label>Section</label></td>
                        <td><label for="secA">A&nbsp;</label><input required type="radio" name="sec" id="secA" value="secA">
                        <label for="secB">&nbsp;&nbsp;B&nbsp;</label><input required type="radio" name="sec" id="secB" value="secB">    
                    </td> -->
                    <tr>
                        <td><label>Section</label></td>
                        <td><label for="secA">A&nbsp;</label><input required type="radio" name="sec"
                                id="secA" value="0">
                            <label for="secB">&nbsp;&nbsp;B&nbsp;</label><input required type="radio"
                                name="sec" id="secB" value="1">
                        </td>
                    </tr>
                    <tr>
                        <td><label>Scholar</label></td>
                        <td><label for="daySch">Day Scholar&nbsp;</label><input required type="radio" name="scholar"
                                id="daySch" value="daySch">
                            <label for="hostel">&nbsp;&nbsp;Hosteller&nbsp;</label><input required type="radio"
                                name="scholar" id="hostel" value="hostel">
                        </td>
                    </tr>
                    <tr>
                        <td><label for="daysAvailed">No. of days leave Availed</label></td>
                        <td><input type="number" name="daysAvailed" id="daysAvailed" min="0" max="20" required></td>
                    </tr>
                    <tr>
                        <td><label for="stDate">OD Req From-To</label></td>
                        <td><input type="date" name="stDate" id="stDate" required>&nbsp;&nbsp;-&nbsp;&nbsp;<input
                                type="date" name="endDate" id=""></td>
                    </tr>
                    <tr>
                        <td><label for="ODreq">No. of OD required</label></td>
                        <td><input type="number" name="ODreq" id="ODreq" min="1" max="10" required></td>
                    </tr>
                    <!-- <tr>
                        <td><label for="stuEmail">Student Email</label></td>
                        <td><input type="email" name="stuEmail" id="stuEmail" required></td>
                    </tr> -->
                    <tr>
                        <td><label for="filereq">Required File</label></td>
                        <td><input type="file" name="filereq" id="filereq"></td>
                    </tr>
                    <tr>
                        <td><label for="reason">Reason for On-Duty</label></td>
                        <td><textarea name="reason" id="reason" cols="35" rows="7" required></textarea></td>
                    </tr>
                </table>
                <input class="button1" type="submit" name="login" value="Submit">
            </form>

            <form action="http://localhost/Web-Technology/certificateValidation.php" method="post" enctype="multipart/form-data" style="padding-top:5px; margin-bottom:0;">
                <table>
                    <tr>
                        <td><input class="button1" type="submit" name="cretificateVerify" value="Verify Certificate"></td>
                        <td><input type="file" name="cretificate" id="cretificate" style="padding-left:3rem;"></td>
                        
                    </tr>
                </table>
            </form>

            <a href="form1.php?view_sts"><button class="button1" style="margin-top:1.5rem;">View OD Details</button></a>
            <section class="odDetailsTable" style="margin-top:1rem;">
                <?php
                if (isset($_GET['view_sts'])) {
                    $con = new mysqli("localhost", "root", "", "miniproject"); //DataBase connectivity FileReq '$reqFile'
                    if ($con->connect_error) {
                        die("Failed to connect: " . $con->connect_error);
                    }
                    $reg = $_SESSION['user'];
                    $query = "select * from od_details where Regno=$reg";
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

                            echo '<pre>';
                        }
                        echo "</table>";
                    } else {
                        echo "Record not Found";
                    }
                }
                ?>

            </section>
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