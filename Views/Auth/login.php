<?php

include_once 'valid.php';

?>

<!doctype html>
<html lang="en">
	
<!-- Mirrored from shreethemes.in/jobnova/layouts/login.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 18 Apr 2024 13:09:23 GMT -->
<head>
		<meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <title>TekJob</title>
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
        <!-- Start Hero -->
        <section class="bg-home d-flex align-items-center" style="background: url('../images/hero/bg3.jpg') center;">
            <div class="bg-overlay bg-linear-gradient-2"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-5 col-12">
                        <div class="p-4 bg-white rounded shadow-md mx-auto w-100" style="max-width: 400px;">
                            <form action="" method="POST">
                                <a href="../Condidate/index.php"><img src="../images/logo-dark.png" class="mb-4 d-block mx-auto" alt=""></a>
                                <h6 class="mb-3 text-uppercase fw-semibold">Please sign in</h6>
                            
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Your Email</label>
                                    <input name="email" id="email" type="email" class="form-control" placeholder="example@website.com" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold" for="loginpass">Password</label>
                                    <input name="password" type="password" class="form-control" id="loginpass" placeholder="Password" required>
                                </div>
                            
                                <div class="d-flex justify-content-between">
                                    <div class="mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-label form-check-label text-muted" for="flexCheckDefault">Remember me</label>
                                        </div>
                                    </div>
                                    <span class="forgot-pass text-muted small mb-0"><a href="../../reset-password.html" class="text-muted">Forgot password ?</a></span>
                                </div>
                
                                <button name="submit" class="btn btn-primary w-100" type="submit">Sign in</button>

                                <div class="col-12 text-center mt-3">
                                    <span><span class="text-muted me-2 small">Don't have an account ?</span> <a href="signup.php" class="text-dark fw-semibold small">Sign Up</a></span>
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

<!-- Mirrored from shreethemes.in/jobnova/layouts/login.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 18 Apr 2024 13:09:23 GMT -->
</html>