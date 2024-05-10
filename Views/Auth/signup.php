<?php

global $con;
include_once 'conbase.php';

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['loginpass'];
    $role = $_POST['role'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];

    $hash = password_hash($password, PASSWORD_DEFAULT);

    // Use double quotes to interpolate variables inside the string
    $query = "INSERT INTO user (email,password,nom,prenom,role) VALUES ('$email','$hash','$nom','$prenom','$role')";

    $res = mysqli_query($con, $query);

    if ($res) {
        echo "alert('Added Successfully, Welcome $nom')";
        echo "<script>location.replace('login.php')</script>";
    } else {
        echo "alert('Oops! Something went wrong.')";
        echo "<script>location.replace('signup.php')</script>";
    }
}

?>



<!doctype html>
<html lang="en">

<!-- Mirrored from shreethemes.in/jobnova/layouts/signup.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 18 Apr 2024 13:09:28 GMT -->
<head>
		<meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <title>Jobnova - Job Board & Job Portal Bootstrap 5 Template</title>
	    <meta name="description" content="Job Listing Bootstrap 5 Template" />
	    <meta name="keywords" content="Onepage, creative, modern, bootstrap 5, multipurpose, clean, Job Listing, Job Board, Job, Job Portal" />
	    <meta name="author" content="Shreethemes" />
	    <meta name="website" content="https://shreethemes.in/" />
	    <meta name="email" content="support@shreethemes.in" />
	    <meta name="version" content="1.0.0" />
	    <!-- favicon -->
        <link href="../images/favicon.ico" rel="shortcut icon">
		<!-- Bootstrap core CSS -->
	    <link href="../css/bootstrap.min.css" type="text/css" rel="stylesheet" />
        <link href="../css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
	    <!-- Custom  Css -->
	    <link href="../css/style.min.css" rel="stylesheet" type="text/css" id="theme-opt" />

    </head>

    <body>
        <section class="bg-home d-flex align-items-center" style="background: url('../images/hero/bg3.jpg') center;">
            <div class="bg-overlay bg-linear-gradient-2"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-5 col-12">
                        <div class="p-4 bg-white rounded shadow-md mx-auto w-100" style="max-width: 400px;">
                            <form method="POST" action="">
                                <a href="../Condidate/index.php"><img src="../images/logo-dark.png" class="mb-4 d-block mx-auto" alt=""></a>
                                <h6 class="mb-3 text-uppercase fw-semibold">Register your account</h6>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Nom</label>
                                    <input name="nom" id="nom" type="text" class="form-control" placeholder="Votre Nom" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Prenom</label>
                                    <input name="prenom" id="prenom" type="text" class="form-control" placeholder="Votre Prenom" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Email</label>
                                    <input name="email" id="email" type="email" class="form-control" placeholder="example@website.com" required>
                                </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Votre Ocuupation</label>
                                        <select name="role" class="form-control form-select" id="role">
                                            <option value="">Select an option</option>
                                            <option value="rh">Resource Humaine</option>
                                            <option value="Con">Condidateur</option>
                                        </select>
                                    </div>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold" for="loginpass">Mot de Passe</label>
                                    <input name="loginpass" type="password" class="form-control" id="loginpass" placeholder="Votre Mot de passe " required>
                                </div>

                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-label form-check-label text-muted" for="flexCheckDefault">I Accept <a href="#" class="text-primary">Terms And Condition</a></label>
                                </div>

                                <button name="submit" class="btn btn-primary w-100" type="submit">Register</button>

                                <div class="col-12 text-center mt-3">
                                    <span><span class="text-muted small me-2">Already have an account ? </span> <a href="login.php" class="text-dark fw-semibold small">Sign in</a></span>
                                </div><!--end col-->
                            </form>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </section><!--end section-->
        <!-- ENd Hero -->

        <!-- javascript -->
        <script src="../js/bootstrap.bundle.min.js"></script>
        <script src="../js/feather.min.js"></script>
	    <!-- Custom -->
	    <script src="../js/plugins.init.js"></script>
	    <script src="../js/app.js"></script>
    </body>


<!-- Mirrored from shreethemes.in/jobnova/layouts/signup.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 18 Apr 2024 13:09:28 GMT -->
</html>