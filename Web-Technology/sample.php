<!DOCTYPE html>
<html lang="en">

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
            <li><a href="stuLogin.html">Student Login</a></li>
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
    <article class="main form" id="OD">
        <section class="OD_img">
            <img src="form-cover.png" alt="">
        </section>
        <section class="ODForm">
            <?php
                include("DataFetch.php");
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