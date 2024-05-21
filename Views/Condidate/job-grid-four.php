<?php

include_once '../Auth/valid.php';
include_once '../../Classes/Job.php';


if(isset($_SESSION['role'])){
    if($_SESSION['role'] != 'con'){
        header('location: ../Auth/login.php');

    }

}

$job = new Job();

$alljobs = $job->GetJobs();
$liste = [];
while ($J = $alljobs->fetch()){
    $liste[] = $J;

}

$fullTimeCount = $job->GetJobCountByType('Full Time');
$partTimeCount = $job->GetJobCountByType('Part Time');
$freelancingCount = $job->GetJobCountByType('Freelancing');
$fixedPriceCount = $job->GetJobCountByType('Fixed Price');
$remoteCount = $job->GetJobCountByType('Remote');
$hourlyBasisCount = $job->GetJobCountByType('Hourly Basis');


?>
<!doctype html>
<html lang="en">
	
<!-- Mirrored from shreethemes.in/jobnova/layouts/job-grid-four.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 18 Apr 2024 13:09:24 GMT -->
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
        <!-- Navbar STart -->
        <header id="topnav" class="defaultscroll sticky">
            <div class="container">
                <a class="logo" href="index.php">
                    <span class="logo-light-mode">
                        <img src="Views/images/logo-dark.png" class="l-dark" alt="">
                        <img src="Views/images/logo-light.png" class="l-light" alt="">
                    </span>
                    <img src="Views/images/logo-light.png" class="logo-dark-mode" alt="">
                </a>

                <div class="menu-extras">
                    <div class="menu-item">
                        <a class="navbar-toggle" id="isToggle" onclick="toggleMenu()">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                    </div>
                </div>

                <ul class="buy-button list-inline mb-0">
                    <li class="list-inline-item ps-1 mb-0">
                        <div class="dropdown">
                            <button type="button" class="dropdown-toggle btn btn-sm btn-icon btn-pills btn-primary" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i data-feather="search" class="icons"></i>
                            </button>
                            <div class="dropdown-menu dd-menu dropdown-menu-end bg-white rounded border-0 mt-3 p-0" style="width: 240px;">
                                <div class="search-bar">
                                    <div id="itemSearch" class="menu-search mb-0">
                                        <form role="search" method="get" id="searchItemform" class="searchform">
                                            <input type="text" class="form-control rounded border" name="s" id="searchItem" placeholder="Search...">
                                            <input type="submit" id="searchItemsubmit" value="Search">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="list-inline-item ps-1 mb-0">
                        <div class="dropdown dropdown-primary">
                            <button type="button" class="dropdown-toggle btn btn-sm btn-icon btn-pills btn-primary" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="../images/team/01.jpg" class="img-fluid rounded-pill" alt="">
                            </button>
                            <div class="dropdown-menu dd-menu dropdown-menu-end bg-white rounded shadow border-0 mt-3">
                                <a href="candidate-profile.php" class="dropdown-item fw-medium fs-6"><i data-feather="user" class="fea icon-sm me-2 align-middle"></i>Profile</a>
                                <a href="candidate-profile-setting.php" class="dropdown-item fw-medium fs-6"><i data-feather="settings" class="fea icon-sm me-2 align-middle"></i>Settings</a>
                                <div class="dropdown-divider border-top"></div>
                                <a href="../../lock-screen.html" class="dropdown-item fw-medium fs-6"><i data-feather="lock" class="fea icon-sm me-2 align-middle"></i>Lockscreen</a>
                                <a href="../Auth/login.php" class="dropdown-item fw-medium fs-6"><i data-feather="log-out" class="fea icon-sm me-2 align-middle"></i>Logout</a>
                            </div>
                        </div>
                    </li>
                </ul>
        
                <div id="navigation">
                    <!-- Navigation Menu-->   
                    <ul class="navigation-menu nav-right nav-light">
                        <li class="has-submenu parent-menu-item">
                            <a href="javascript:void(0)">Home</a><span class="menu-arrow"></span>
                            <ul class="submenu">
                                <li><a href="index.php" class="sub-menu-item">Hero One</a></li>
                                <li><a href="../../index-two.html" class="sub-menu-item">Hero Two</a></li>
                                <li><a href="../../index-three.html" class="sub-menu-item">Hero Three</a></li>
                            </ul>
                        </li>

                        <li class="has-submenu parent-parent-menu-item"><a href="javascript:void(0)"> Jobs </a><span class="menu-arrow"></span>
                            <ul class="submenu">
                                <li><a href="../../job-categories.html" class="sub-menu-item">Job Categories</a></li>
                        
                                <li class="has-submenu parent-menu-item">
                                    <a href="javascript:void(0)"> Job Grids </a><span class="submenu-arrow"></span>
                                    <ul class="submenu">
                                        <li><a href="../../job-grid-one.html" class="sub-menu-item">Job Grid One</a></li>
                                        <li><a href="../../job-grid-two.html" class="sub-menu-item">Job Grid Two</a></li>
                                        <li><a href="../../job-grid-three.html" class="sub-menu-item">Job Grid Three</a></li>
                                        <li><a href="job-grid-four.html" class="sub-menu-item">Job Grid Four </a></li>
                                    </ul>  
                                </li>

                                <li class="has-submenu parent-menu-item">
                                    <a href="javascript:void(0)"> Job Lists </a><span class="submenu-arrow"></span>
                                    <ul class="submenu">
                                        <li><a href="../../job-list-one.html" class="sub-menu-item">Job List One</a></li>
                                        <li><a href="../../job-list-two.html" class="sub-menu-item">Job List Two</a></li>
                                    </ul>  
                                </li>

                                <li class="has-submenu parent-menu-item">
                                    <a href="javascript:void(0)"> Job Detail </a><span class="submenu-arrow"></span>
                                    <ul class="submenu">
                                        <li><a href="../../job-detail-one.html" class="sub-menu-item">Job Detail One</a></li>
                                        <li><a href="job-detail-two.php" class="sub-menu-item">Job Detail Two</a></li>
                                        <li><a href="../../job-detail-three.html" class="sub-menu-item">Job Detail Three</a></li>
                                    </ul>  
                                </li>
                
                                <li><a href="job-apply.php" class="sub-menu-item">Job Apply</a></li>
                
                                <li><a href="../../job-post.html" class="sub-menu-item">Job Post </a></li>
                
                                <li><a href="../../career.html" class="sub-menu-item">Career </a></li>
                            </ul>  
                        </li>
                
                        <li class="has-submenu parent-menu-item">
                            <a href="javascript:void(0)">Employers</a><span class="menu-arrow"></span>
                            <ul class="submenu">
                                <li><a href="../../employers.html" class="sub-menu-item">Employers</a></li>
                                <li><a href="../../employer-profile.html" class="sub-menu-item">Employer Profile</a></li>
                            </ul>
                        </li>
                
                        <li class="has-submenu parent-menu-item">
                            <a href="javascript:void(0)">Candidates</a><span class="menu-arrow"></span>
                            <ul class="submenu">
                                <li><a href="../../candidates.html" class="sub-menu-item">Candidates</a></li>
                                <li><a href="candidate-profile.php" class="sub-menu-item">Candidate Profile</a></li>
                                <li><a href="candidate-profile-setting.php" class="sub-menu-item">Profile Setting</a></li>
                            </ul>
                        </li>
                
                        <li class="has-submenu parent-parent-menu-item">
                            <a href="javascript:void(0)">Pages</a><span class="menu-arrow"></span>
                            <ul class="submenu">
                                <li><a href="../../aboutus.html" class="sub-menu-item">About Us</a></li>
                                <li><a href="../../services.html" class="sub-menu-item">Services</a></li>
                                <li><a href="../../pricing.html" class="sub-menu-item">Pricing </a></li>

                                <li class="has-submenu parent-menu-item">
                                    <a href="javascript:void(0)"> Helpcenter </a><span class="submenu-arrow"></span>
                                    <ul class="submenu">
                                        <li><a href="../../helpcenter-overview.html" class="sub-menu-item">Overview</a></li>
                                        <li><a href="../../helpcenter-faqs.html" class="sub-menu-item">FAQs</a></li>
                                        <li><a href="../../helpcenter-guides.html" class="sub-menu-item">Guides</a></li>
                                        <li><a href="../../helpcenter-support.html" class="sub-menu-item">Support</a></li>
                                    </ul>  
                                </li>

                                <li class="has-submenu parent-menu-item"><a href="javascript:void(0)"> Blog </a><span class="submenu-arrow"></span>
                                    <ul class="submenu">
                                        <li><a href="../../blogs.html" class="sub-menu-item"> Blogs</a></li>
                                        <li><a href="../../blog-sidebar.html" class="sub-menu-item"> Blog Sidebar</a></li>
                                        <li><a href="../../blog-detail.html" class="sub-menu-item"> Blog Detail</a></li>
                                    </ul> 
                                </li>

                                <li class="has-submenu parent-menu-item"><a href="javascript:void(0)"> Auth Pages </a><span class="submenu-arrow"></span>
                                    <ul class="submenu">
                                        <li><a href="../Auth/login.php" class="sub-menu-item"> Login</a></li>
                                        <li><a href="../Auth/signup.php" class="sub-menu-item"> Signup</a></li>
                                        <li><a href="../../reset-password.html" class="sub-menu-item"> Forgot Password</a></li>
                                        <li><a href="../../lock-screen.html" class="sub-menu-item"> Lock Screen</a></li>
                                    </ul> 
                                </li>

                                <li class="has-submenu parent-menu-item"><a href="javascript:void(0)"> Utility </a><span class="submenu-arrow"></span>
                                    <ul class="submenu">
                                        <li><a href="../../terms.html" class="sub-menu-item">Terms of Services</a></li>
                                        <li><a href="../../privacy.html" class="sub-menu-item">Privacy Policy</a></li>
                                    </ul>  
                                </li>

                                <li class="has-submenu parent-menu-item"><a href="javascript:void(0)"> Special </a><span class="submenu-arrow"></span>
                                    <ul class="submenu">
                                        <li><a href="../../comingsoon.html" class="sub-menu-item"> Coming Soon</a></li>
                                        <li><a href="../../maintenance.html" class="sub-menu-item"> Maintenance</a></li>
                                        <li><a href="../../error.html" class="sub-menu-item"> 404! Error</a></li>
                                    </ul> 
                                </li>
                            </ul>
                        </li>
                
                        <li><a href="contactus.php" class="sub-menu-item">Contact Us</a></li>
                    </ul><!--end navigation menu-->
                </div><!--end navigation-->
            </div>
        </header>
        <!-- Navbar End -->

        <!-- Hero Start -->
        <section class="bg-half-170 d-table w-100" style="background: url('../images/hero/bg.jpg');">
            <div class="bg-overlay bg-gradient-overlay"></div>
            <div class="container">
                <div class="row mt-5 justify-content-center">
                    <div class="col-12">
                        <div class="title-heading text-center">
                            <h5 class="heading fw-semibold mb-0 sub-heading text-white title-dark">Available Jobs</h5>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </section><!--end section-->
        <!-- Hero End -->

        <!-- Start -->
        <section class="section">
            <div class="container">
                <div class="row g-4">
                    <div class="col-lg-50 col-md-12 col-12">
                        <div class="card bg-white p-4 rounded shadow sticky-bar">
                            <form method="POST">
                            <!-- Categories -->
                            <div class="mt-4">
                                <h6 class="mb-0">Categories</h6>
                                <select class="form-select form-control border mt-2" aria-label="Default select example">
                                    <?php foreach ($liste as $c) {
                                        echo "<option value='{$c['job_name']}'>{$c['job_name']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <!-- Categories -->
    
                            <!-- Location -->
                            <div class="mt-4">
                                <h6 class="mb-0">Location</h6>
    
                                <select class="form-select form-control border mt-2" aria-label="Default select example">
                                    <?php foreach ($liste as $c) {
                                        echo "<option value='{$c['loc']}'>{$c['Loc']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <!-- Location -->

                            <!-- Type Start -->
                            <div class="mt-4">
                                <h6>Job Types</h6>

                                <div class="d-flex justify-content-between mt-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="<?php echo $fullTimeCount ?>" id="Full">
                                        <label class="form-check-label" for="Full">Full Time</label>
                                    </div>

                                    <span class="badge bg-soft-primary rounded-pill"><?php echo $fullTimeCount ?></span>
                                </div>

                                <div class="d-flex justify-content-between mt-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="<?php echo $partTimeCount ?>" id="Part">
                                        <label class="form-check-label" for="Part">Part Time</label>
                                    </div>

                                    <span class="badge bg-soft-primary rounded-pill"><?php echo $partTimeCount ?></span>
                                </div>

                                <div class="d-flex justify-content-between mt-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="<?php echo $freelancingCount ?>" id="Freelancer">
                                        <label class="form-check-label" for="Freelancer">Freelancing</label>
                                    </div>

                                    <span class="badge bg-soft-primary rounded-pill"><?php echo $freelancingCount ?></span>
                                </div>

                                <div class="d-flex justify-content-between mt-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="<?php echo $fixedPriceCount ?>" id="Fixed">
                                        <label class="form-check-label" for="Fixed">Fixed Price</label>
                                    </div>

                                    <span class="badge bg-soft-primary rounded-pill"><?php echo $fixedPriceCount ?></span>
                                </div>

                                <div class="d-flex justify-content-between mt-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="<?php echo $remoteCount ?>" id="Remote">
                                        <label class="form-check-label" for="Remote">Remote</label>
                                    </div>

                                    <span class="badge bg-soft-primary rounded-pill"><?php echo $remoteCount ?></span>
                                </div>

                                <div class="d-flex justify-content-between mt-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="<?php echo $hourlyBasisCount ?>" id="Hourly">
                                        <label class="form-check-label" for="Hourly">Hourly Basis</label>
                                    </div>

                                    <span class="badge bg-soft-primary rounded-pill"><?php echo $hourlyBasisCount ?></span>
                                </div>
                            </div>
                            <!-- Type End -->
                            <div class="mt-4">
                                <button type="submit" name="filter" class="btn btn-primary w-100">Apply Filter</button>
                            </div>
                            </form>
                        </div>
                    </div><!--end col-->
                    <?php foreach ($liste as $c) {
                        $timestamp = strtotime($c['Date_Post']);
                        $difference = time() - $timestamp;
                        $days = floor($difference / (60 * 60 * 24));
                        echo "
                    <div class='col-lg-6 col-12'>
                        <div class='job-post rounded shadow bg-white'>
                            <div class='p-4'>
                                <a href='job-detail-two.php?jobid={$c['id']}' class='text-dark title h5'>{$c['job_name']}</a>

                                <p class='text-muted d-flex align-items-center small mt-3'><i data-feather='clock' class='fea icon-sm text-primary me-1'></i>Posted $days Days ago</p>

                                <ul class='list-unstyled d-flex justify-content-between align-items-center mb-0 mt-3'>
                                    <li class='list-inline-item'><span class='badge bg-soft-primary'>{$c['Employee_Type']}</span></li>
                                    <li class='list-inline-item'><span class='text-muted d-flex align-items-center small'><i data-feather='dollar-sign' class='fea icon-sm text-primary me-1'></i>{$c['Salary']}TND</span></li>
                                </ul>
                            </div>
                            <div class='d-flex align-items-center p-4 border-top'>
                                <img src='../images/company/google-logo.png' class='avatar avatar-small rounded shadow p-3 bg-white' alt=''>
                                <div class='ms-3'>
                                    <a href='../../employer-profile.html' class='h5 company text-dark'>TEKUP</a>
                                    <span class='text-muted d-flex align-items-center mt-1'><i data-feather='map-pin' class='fea icon-sm me-1'></i>{$c['Loc']}</span>
                                </div>
                            </div>
                        </div>
                    </div>";
                    } ?>
                </div>
            </div>
            <!--end container-->



            <div class="container mt-100 mt-60">
                <div class="row justify-content-center mb-4 pb-2">
                    <div class="col-12">
                        <div class="section-title text-center">
                            <h4 class="title mb-3">Here's why you'll love it TEK-JOB</h4>
                            <p class="text-muted para-desc mx-auto mb-0">Search all the open positions on the web. Get your own personalized salary estimate. Read reviews on over 30000+ companies worldwide.</p>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->

                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 mt-4 pt-2">
                        <div class="position-relative features text-center p-4 rounded shadow bg-white">
                            <div class="feature-icon bg-soft-primary rounded shadow mx-auto position-relative overflow-hidden d-flex justify-content-center align-items-center">
                                <i data-feather="phone" class="fea icon-ex-md"></i>
                            </div>
    
                            <div class="mt-4">
                                <a href="#" class="title h5 text-dark">24/7 Support</a>
                                <p class="text-muted mt-3 mb-0">Many desktop publishing now use and a search for job.</p>
                                <div class="mt-3">
                                    <a href="#" class="btn btn-link primary text-dark">Read More <i class="mdi mdi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div><!--end col-->
                    
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 mt-4 pt-2">
                        <div class="position-relative features text-center p-4 rounded shadow bg-white">
                            <div class="feature-icon bg-soft-primary rounded shadow mx-auto position-relative overflow-hidden d-flex justify-content-center align-items-center">
                                <i data-feather="cpu" class="fea icon-ex-md"></i>
                            </div>
    
                            <div class="mt-4">
                                <a href="#" class="title h5 text-dark">Tech & Startup Jobs</a>
                                <p class="text-muted mt-3 mb-0">Many desktop publishing now use and a search for job.</p>
                                <div class="mt-3">
                                    <a href="#" class="btn btn-link primary text-dark">Read More <i class="mdi mdi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div><!--end col-->
                    
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 mt-4 pt-2">
                        <div class="position-relative features text-center p-4 rounded shadow bg-white">
                            <div class="feature-icon bg-soft-primary rounded shadow mx-auto position-relative overflow-hidden d-flex justify-content-center align-items-center">
                                <i data-feather="activity" class="fea icon-ex-md"></i>
                            </div>
    
                            <div class="mt-4">
                                <a href="#" class="title h5 text-dark">Quick & Easy</a>
                                <p class="text-muted mt-3 mb-0">Many desktop publishing now use and a search for job.</p>
                                <div class="mt-3">
                                    <a href="#" class="btn btn-link primary text-dark">Read More <i class="mdi mdi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div><!--end col-->
                    
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 mt-4 pt-2">
                        <div class="position-relative features text-center p-4 rounded shadow bg-white">
                            <div class="feature-icon bg-soft-primary rounded shadow mx-auto position-relative overflow-hidden d-flex justify-content-center align-items-center">
                                <i data-feather="clock" class="fea icon-ex-md"></i>
                            </div>
    
                            <div class="mt-4">
                                <a href="#" class="title h5 text-dark">Save Time</a>
                                <p class="text-muted mt-3 mb-0">Many desktop publishing now use and a search for job.</p>
                                <div class="mt-3">
                                    <a href="#" class="btn btn-link primary text-dark">Read More <i class="mdi mdi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </section><!--end section-->
        <!-- End -->

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
                                <a href="contactus.php" class="btn btn-soft-primary my-1">Contact Us</a>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end container-->
            </div><!--end div-->
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="py-5 footer-bar">
                            <div class="row align-items-center">
                                <div class="col-sm-3">
                                    <div class="text-center text-sm-start">
                                        <a href="#"><img src="Views/images/logo-light.png" alt=""></a>
                                    </div>
                                </div>
        
                                <div class="col-sm-9 mt-4 mt-sm-0">
                                    <ul class="list-unstyled footer-list terms-service text-center text-sm-end mb-0">
                                        <li class="list-inline-item my-2"><a href="index.php" class="text-foot fs-6 fw-medium me-2"><i class="mdi mdi-circle-small"></i> Home</a></li>
                                        <li class="list-inline-item my-2"><a href="../../services.html" class="text-foot fs-6 fw-medium me-2"><i class="mdi mdi-circle-small"></i> How it works</a></li>
                                        <li class="list-inline-item my-2"><a href="../../aboutus.html" class="text-foot fs-6 fw-medium me-2"><i class="mdi mdi-circle-small"></i> About us</a></li>
                                        <li class="list-inline-item my-2"><a href="../../pricing.html" class="text-foot fs-6 fw-medium"><i class="mdi mdi-circle-small"></i> Plans</a></li>
                                    </ul>
                                </div><!--end col-->
                            </div><!--end row-->
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->

            <div class="py-4 footer-bar">
                <div class="container text-center">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <div class="text-sm-start">
                                <p class="mb-0 fw-medium">© <script>document.write(new Date().getFullYear())</script> Jobnova. Design with <i class="mdi mdi-heart text-danger"></i> by <a href="https://shreethemes.in/" target="_blank" class="text-reset">Shreethemes</a>.</p>
                            </div>
                        </div>

                        <div class="col-sm-6 mt-4 mt-sm-0 pt-2 pt-sm-0">
                            <ul class="list-unstyled social-icon foot-social-icon text-sm-end mb-0">
                                <li class="list-inline-item"><a href="../../../themeforest.net/item/jobnova-job-board-job-portal-and-job-listing-bootstrap-5-template/49414406f6d8.html" target="_blank" class="rounded"><i data-feather="shopping-cart" class="fea icon-sm align-middle" title="Buy Now"></i></a></li>
                                <li class="list-inline-item"><a href="../../../dribbble.com/shreethemes.html" target="_blank" class="rounded"><i data-feather="dribbble" class="fea icon-sm align-middle" title="dribbble"></i></a></li>
                                <li class="list-inline-item"><a href="../../../linkedin.com/company/shreethemes" target="_blank" class="rounded"><i data-feather="linkedin" class="fea icon-sm align-middle" title="Linkedin"></i></a></li>
                                <li class="list-inline-item"><a href="../../../www.facebook.com/shreethemes.html" target="_blank" class="rounded"><i data-feather="facebook" class="fea icon-sm align-middle" title="facebook"></i></a></li>
                                <li class="list-inline-item"><a href="../../../www.instagram.com/shreethemes/index.html" target="_blank" class="rounded"><i data-feather="instagram" class="fea icon-sm align-middle" title="instagram"></i></a></li>
                                <li class="list-inline-item"><a href="../../../twitter.com/shreethemes.html" target="_blank" class="rounded"><i data-feather="twitter" class="fea icon-sm align-middle" title="twitter"></i></a></li>
                            </ul><!--end icon-->
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end container-->
            </div>
        </footer><!--end footer-->
        <!-- Footer End -->

        <!-- Back to top -->
        <a href="#" onclick="topFunction()" id="back-to-top" class="back-to-top rounded fs-5"><i data-feather="arrow-up" class="fea icon-sm align-middle"></i></a>
        <!-- Back to top -->

        <!-- JAVASCRIPTS -->
	    <script src="../js/bootstrap.bundle.min.js"></script>
        <script src="../js/feather.min.js"></script>
	    <!-- Custom -->
	    <script src="../js/plugins.init.js"></script>
	    <script src="../js/app.js"></script>
    </body>

<!-- Mirrored from shreethemes.in/jobnova/layouts/job-grid-four.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 18 Apr 2024 13:09:24 GMT -->
</html>