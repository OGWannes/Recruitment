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

if(isset($_POST['ajout'])){
    $users->AjoutUser($_POST);
    header("location: home.php");
}

$allusers = $users->GetUsers();
$listeU = [];
while ($U = $allusers->fetch()){
    $listeU[] = $U;

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>HACO Shipyard</title>
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
                <li><a href="#consultall" class="nav-link scrollto"><i class="bx bx-user"></i> <span>Consulter Utilisateurs</span></a></li>
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
    <section id="consultall" class="consultall">
        <div class="container">

            <div class="section-title">
                <h2>Consulté</h2>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-7">

                            <form action="" method="GET">
                                <div class="input-group mb-3">
                                    <input type="text" name="search" placeholder="Nom/Prenom/EMAIL" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search data">
                                    <button type="submit" class="btn btn-primary">Cherche</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Prenom</th>
                        <th scope="col">Nom</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (isset($_GET['search'])) {
                        $filtervalues = $_GET['search'];
                        $query = "SELECT * FROM user WHERE CONCAT (prenom,Nom,email) LIKE '%$filtervalues%' ";
                        $query_run = mysqli_query($con, $query);
                        if (mysqli_num_rows($query_run) > 0) {
                            foreach ($query_run as $items) {
                                ?>
                                <tr>
                                    <td><?= $items['id']; ?></td>
                                    <td><?= $items['prenom']; ?></td>
                                    <td><?= $items['nom']; ?></td>
                                    <td><?= $items['email'] ?></td>
                                    <td>
                                        <button class="btn btn-primary"><?php echo '<a href="update.php?updateid='.$items['id'].'" class="text-light">Mise a jour</a>'?></button>
                                        <button class="btn btn-danger"><?php echo '<a href="?deleteid='.$items['id'].'"  class="text-light">Delete</a> '?></button>
                                        </center></td>
                                </tr>
                                <?php
                            }
                        } else {
                            ?>
                            <?php
                        }
                    }else {

                        foreach ($listeU as $c) {
                            echo "<tr>
        <td>{$c['id']}</td>
        <td>{$c['prenom']}</td>
        <td>{$c['nom']}</td>
        <td>{$c['email']}</td>
        <td><button class='btn btn-primary'><a href='update.php?updateid='.{$c['id']} class='text-light'>Mise a jour</a></button>
        <button class='btn btn-danger'><a href='?deleteid='{$c['id']}  class='text-light'>Delete</a></button> 
        </td>
        </tr>";
                        }

                    }?>
                    </tbody>
                </table>


            </div>


        </div>
        </div>

        </div>
    </section><!-- End Resume Section -->

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