<?php
include_once '../Auth/valid.php';
include "../../Classes/Admin.php";

if(isset($_SESSION['role'])){

    if($_SESSION['role'] != 'admin'){
        header('location: ../Auth/login.php');

    }

}else{
    header('location: ../Auth/login.php');
}

$users = new Admin();
if(isset($_GET['deleteid'])){
    $users->DeleteUser($_GET['deleteid']);
    echo "alert('User Deleted')";
    header("location: home.php");
}

if(isset($_POST['ajoutjob'])){
    $users->AjoutJob($_POST);
    header("location: ConsultJobs.php");
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

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Bonjour TEKJOB Administrateur</h2>
                <?php echo date("d/m/Y"); ?>
                <?php echo date("h:i:s");?>
                <ol>

                    <li><strong><button type="button" class="button1"><a href="../../Classes/Logout.php" class="text-light">Desconnect</a></button></strong></li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <section id="home" class="d-flex flex-column justify-content-center align-items-center">
        <div class="home" data-aos="fade-in">
            <h1>TEK JOB</h1>
            <center><span class="typed" data-typed-items="Wait for it, Wait... , LEGENDARYYYYYYY"></span></center>
        </div>
    </section>
</main><!-- End #main -->

<main id="main">
    <!-- ======= About Section ======= -->
    <section id="ajout" class="about">
        <div class="container">
            <div class="section-title">
                <h2>Ajout Job</h2>
                <form id="addemployee" class="clearfix" method="POST" action="">
                    <strong><div class="section_subtitle left">Données job</div></strong>
                    <form action="" id="manage_employee">
                        <div class="row">
                            <div class="col-md-6 border-right">
                                <div class="form-group">
                                    <label for="" class="control-label">Job Name</label>
                                    <input type="text" name="job_name" class="form-control form-control-sm" >
                                </div>
                                <div class="form-group">
                                    <label for="" class="control-label">Employee Type</label>
                                    <select type="text" name="Employee_Type" class="form-control form-control-sm" >
                                        <option value="">Select option</option>
                                        <option value="Full Time">Full Time</option>
                                        <option value="Part Time">Part Time</option>
                                        <option value="Freelancing">Freelancing</option>
                                        <option value="Fixed Price">Fixed Price</option>
                                        <option value="Remote">Remote</option>
                                        <option value="Hourly Basis">Hourly Basis</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="" class="control-label">Location</label>
                                    <input type="text" name="loc" class="form-control form-control-sm" >
                                </div>
                                <div class="form-group">
                                    <label for="" class="control-label">Experience</label>
                                    <select type="text" name="Experience" class="form-control form-control-sm">
                                        <option value="">Select option</option>
                                        <option value="0 - 1 Year">0 - 1 Years</option>
                                        <option value="2 - 4 Years">2 - 3 Years</option>
                                        <option value="4 - 5+ Years">4 - 5+ Years</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="" class="control-label">Qualification</label>
                                    <input type="text" name="qualification" class="form-control form-control-sm" >
                                </div>
                                <div class="form-group">
                                    <label for="" class="control-label">Salary En TND</label>
                                    <input type="text" name="Salary" class="form-control form-control-sm" >
                                </div>
                                <div class="form-group">
                                    <label for="" class="control-label">Date END</label>
                                    <input type="date" name="date_end" class="form-control form-control-sm" >
                                </div>
                                <div class="form-group">
                                    <label for="" class="control-label">Job Description</label>
                                    <textarea type="text" name="Desc" class="form-control form-control-sm" ></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="" class="control-label">Responsibilities and Duties:</label>
                                    <textarea type="text" name="RD" class="form-control form-control-sm" ></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="" class="control-label">Required Experience, Skills and Qualifications:</label>
                                    <textarea type="text" name="RESQ" class="form-control form-control-sm" ></textarea>
                                </div>
                                <br>
                                <div class="input-box">
                                    <center><button type="submit" name="ajoutjob" class="btn btn-primary mr-2">Ajouter</button></center>


                                </div>

                    </form>

            </div>

        </div>
    </section><!-- End About Section -->

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