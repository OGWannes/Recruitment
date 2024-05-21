<?php

include_once "../Auth/valid.php";
include "../../Classes/User.php";
include "../../Classes/Job.php";

if(isset($_SESSION['role'])) {
    if ($_SESSION['role'] != 'admin') {
        header('location: ../Auth/login.php');

    }
}


$job = new Job();


if (isset($_GET['jobid'])){
    $app = $job->GetApp($_GET['jobid']);
    $profile = $job->GetProfile($_GET['jobid']);
    $experience = $job->GetExperience($_GET['jobid']);
    $cl = $job->GetUser($_GET['jobid']);
}







?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>TekJob</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/download.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">


    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/styleness.css" rel="stylesheet">
    <style>



        ol {list-style-type: katakana-iroha;}

        button{
            border: none;
            color: white;
            padding: 2px 22px;
            border-radius: 8px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
        }

        .button1{
            background-color: #f44336;;
        }
        .button2{
            background-color: #008CBA;
        }


    </style>

    <!-- =======================================================
    * Template Name: iPortfolio - v3.7.0
    * Template URL: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>

<body>

<!-- ======= Mobile nav toggle button ======= -->
<i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

<!-- ======= Header ======= -->
<header id="header">
    <div class="d-flex flex-column">

        <div class="profile">
            <br>
            <h1 class="text-light"><a href="home.php">TEK JOB</a></h1>
            <div class="social-links mt-3 text-center">
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
            </div>
        </div>

        <nav id="navbar" class="nav-menu navbar">
            <ul>
                <li><a href="home.php" class="nav-link scrollto"><i class="bx bx-home"></i> <span>Accuiell</span></a></li>
                <li><a href="home.php" class="nav-link scrollto"><i class="bx bx-user"></i> <span>Ajouter Utilisateur</span></a></li>
                <li><a href="Consult.php" class="nav-link scrollto"><i class="bx bx-user"></i> <span>Consulter Utilisateurs</span></a></li>
                <li><a href="Contacts.php" class="nav-link scrollto"><i class="bx bx-archive"></i> <span>Consulter Contacts</span></a></li>
                <li><a href="CreateJob.php" class="nav-link scrollto"><i class="bx bx-user-check"></i> <span>Ajouter Job</span></a></li>
                <li><a href="ConsultJobs.php" class="nav-link scrollto"><i class="bx bx-user-check"></i> <span>Consult Jobs</span></a></li>


            </ul>
        </nav><!-- .nav-menu -->
    </div>
</header><!-- End Header -->

<main id="main">


<section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="position-relative">
                            <div class="candidate-profile d-flex align-items-end justify-content-between mx-2">
                                <div class="d-flex align-items-end">
                                    <img src="../images/team/01.jpg" class="rounded-pill shadow border border-3 avatar avatar-medium" height="100" width="100" alt="">

                                    <div class="ms-2">
                                        <h5 class="mb-0"><?php echo $cl['prenom']; ?><?php echo " ",$cl['nom']; ?></h5>
                                        <p class="text-muted mb-0"><?php echo $profile['occup']; ?></p>
</div>
</div>

<a href="candidate-profile-setting.php" class="btn btn-sm btn-icon btn-pills btn-soft-primary"><i data-feather="settings" class="icons"></i></a>
</div>
</div>
</div><!--end col-->
</div><!--end row-->
</div><!--end container-->
</section>

<div class="container mt-4">
    <div class="row g-4">

            </div><!--end row-->

        <div class="col-lg-4 col-md-5 col-12">
            <div class="card bg-light p-4 rounded shadow sticky-bar">
                <h5 class="mb-0">Personal Detail:</h5>
                <div class="mt-3">
                    <div class="d-flex align-items-center justify-content-between mt-3">
                        <span class="d-inline-flex align-items-center text-muted fw-medium"><i data-feather="mail" class="fea icon-sm me-2"></i> Email:</span>
                        <span class="fw-medium"><?php echo $cl['email']?></span>
                    </div>

                    <div class="d-flex align-items-center justify-content-between mt-3">
                        <span class="d-inline-flex align-items-center text-muted fw-medium"><i data-feather="gift" class="fea icon-sm me-2"></i> D.O.B.:</span>
                        <span class="fw-medium"><?php echo $profile['intro']; ?></span>
                    </div>

                    <div class="d-flex align-items-center justify-content-between mt-3">
                        <span class="d-inline-flex align-items-center text-muted fw-medium"><i data-feather="home" class="fea icon-sm me-2"></i> Address:</span>
                        <span class="fw-medium"><?php echo $profile['birth']; ?></span>
                    </div>

                    <div class="d-flex align-items-center justify-content-between mt-3">
                        <span class="d-inline-flex align-items-center text-muted fw-medium"><i data-feather="map-pin" class="fea icon-sm me-2"></i> City:</span>
                        <span class="fw-medium"><?php echo $profile['loc']; ?></span>
                    </div>

                    <div class="d-flex align-items-center justify-content-between mt-3">
                        <span class="d-inline-flex align-items-center text-muted fw-medium"><i data-feather="globe" class="fea icon-sm me-2"></i> Country:</span>
                        <span class="fw-medium"><?php echo $profile['city']; ?></span>
                    </div>

                    <div class="d-flex align-items-center justify-content-between mt-3">
                        <span class="d-inline-flex align-items-center text-muted fw-medium"><i data-feather="phone" class="fea icon-sm me-2"></i> Mobile:</span>
                        <span class="fw-medium"><?php echo $profile['tel']; ?></span>
                    </div>

                    <div class="d-flex align-items-center justify-content-between mt-3">
                        <span class="text-muted fw-medium">Social:</span>

                        <ul class="list-unstyled social-icon text-sm-end mb-0">
                            <li class="list-inline-item"><a href="../../../dribbble.com/shreethemes.html" target="_blank" class="rounded"><i data-feather="dribbble" class="fea icon-sm align-middle" title="dribbble"></i></a></li>
                            <li class="list-inline-item"><a href="../../../linkedin.com/company/shreethemes" target="_blank" class="rounded"><i data-feather="linkedin" class="fea icon-sm align-middle" title="Linkedin"></i></a></li>
                            <li class="list-inline-item"><a href="../../../www.facebook.com/shreethemes.html" target="_blank" class="rounded"><i data-feather="facebook" class="fea icon-sm align-middle" title="facebook"></i></a></li>
                            <li class="list-inline-item"><a href="../../../www.instagram.com/shreethemes/index.html" target="_blank" class="rounded"><i data-feather="instagram" class="fea icon-sm align-middle" title="instagram"></i></a></li>
                            <li class="list-inline-item"><a href="../../../twitter.com/shreethemes.html" target="_blank" class="rounded"><i data-feather="twitter" class="fea icon-sm align-middle" title="twitter"></i></a></li>
                        </ul><!--end icon-->
                    </div>

                    <div class="p-3 rounded shadow bg-white mt-2">
                        <div class="d-flex align-items-center mb-2">
                            <i data-feather="file-text" class="fea icon-md"></i>
                            <h6 class="mb-0 ms-2"><?php echo $profile['cv']; ?></h6>
                        </div>

                        <a href="../images/calvin-carlo-resume.pdf" class="btn btn-primary w-100" download><i data-feather="download" class="fea icon-sm me-1"></i> Download CV</a>
                    </div>
                </div>
            </div>
        </div><!--end col-->
    </div><!--end row-->
</div><!--end container-->
<!-- Footer Start -->
<footer class="bg-footer">
    <div class="py-5">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-md-7">
                    <div class="section-title">
                        <div class="d-flex align-items-center">
                            <i data-feather="bookmark" class="fea icon-lg"></i>
                            <div class="flex-1 ms-3">
                                <h4 class="fw-bold text-white mb-2">Explore a job now!</h4>
                                <p class="text-white-50 mb-0">Search all the open positions on the web. Get your own personalized salary estimate. Read reviews on over 30000+ companies worldwide.</p>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-md-5 mt-4 mt-sm-0">
                    <div class="text-md-end ms-5 ms-sm-0">
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </div><!--end div-->
    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>TEK-JOB</span></strong>
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/ -->
            </div>
        </div>
    </footer><!-- End  Footer -->
</main>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/purecounter/purecounter.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/typed.js/typed.min.js"></script>
    <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>