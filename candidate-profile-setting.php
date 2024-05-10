<?php
global $con;
include_once 'conbase.php'; // Assuming this file contains your database connection code
include_once 'delete.php';

// Check if email parameter is set and not empty
if(isset($_GET['email']) && !empty($_GET['email'])) {
    $email = $_GET['email'];

    // Prepare and execute the SELECT statement to fetch profile
    $stmt = $con->prepare("SELECT * FROM profile WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Fetch profile data
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $city = $row['city'];
        $dob = $row['dob'];
        $mobile = $row['mobile'];
        $intro = $row['Introduction'];
        $address = $row['Address'];
    } else {
        // Handle if no profile found for the provided email
        echo "Profile not found!";
    }
    $stmt->close();

    // Check if the form is submitted
    if (isset($_POST['submit'])) {
        // Sanitize and validate input
        $name = $_POST['name'] . " " . $_POST['last_name'];
        $dob = $_POST['dob'];
        $email = $_POST['email'];
        $occ = $_POST['occupation'];
        $location = $_POST['location'];
        $cv = $_POST['cv'];
        $intro = $_POST['introduction'];

        // Prepare and execute the UPDATE statement
        $stmt = $con->prepare("UPDATE profile SET name=?, email=?, dob=?, city=?, country=?, cv=?, Introduction=? WHERE email=?");
        $stmt->bind_param("ssssssss", $name, $email, $dob, $city, $location, $cv, $intro, $email);
        if ($stmt->execute()) {
            echo "Profile updated successfully!";
        } else {
            echo "Error updating profile: " . $stmt->error;
        }
        $stmt->close();
    }
} else {
    // Handle if email parameter is missing or empty
    echo "Email parameter is missing!";
}
?>


<!doctype html>
<html lang="en">
	
<!-- Mirrored from shreethemes.in/jobnova/layouts/candidate-profile-setting.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 18 Apr 2024 13:09:23 GMT -->
<head>
		<meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <title> TekJob - Job Board & Job Portal Bootstrap 5 Template</title>
	    <meta name="description" content="Job Listing Bootstrap 5 Template" />
	    <meta name="keywords" content="Onepage, creative, modern, bootstrap 5, multipurpose, clean, Job Listing, Job Board, Job, Job Portal" />
	    <meta name="author" content="Shreethemes" />
	    <meta name="website" content="https://shreethemes.in/" />
	    <meta name="email" content="support@shreethemes.in" />
	    <meta name="version" content="1.0.0" />
	    <!-- favicon -->
        <link href="Views/images/favicon.ico" rel="shortcut icon">
		<!-- Bootstrap core CSS -->
	    <link href="Views/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
        <link href="Views/css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
	    <!-- Custom  Css -->
	    <link href="Views/css/style.min.css" rel="stylesheet" type="text/css" id="theme-opt" />
	</head>

	<body>
        <!-- Navbar STart -->
        <header id="topnav" class="defaultscroll sticky">
            <div class="container">
<<<<<<< HEAD
                <a class="logo" href="index.php">
=======
                <a class="logo" href="Views/Condidate/index.php">
>>>>>>> 4d5de49 (Commitded for Gestion ADMIN)
                    <img src="Views/images/logo-dark.png" class="logo-light-mode" alt="">
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
                                <img src="Views/images/team/01.jpg" class="img-fluid rounded-pill" alt="">
                            </button>
                            <div class="dropdown-menu dd-menu dropdown-menu-end bg-white rounded shadow border-0 mt-3">
<<<<<<< HEAD
                                <a href="candidate-profile.php" class="dropdown-item fw-medium fs-6"><i data-feather="user" class="fea icon-sm me-2 align-middle"></i>Profile</a>
=======
                                <a href="Views/Condidate/candidate-profile.php" class="dropdown-item fw-medium fs-6"><i data-feather="user" class="fea icon-sm me-2 align-middle"></i>Profile</a>
>>>>>>> 4d5de49 (Commitded for Gestion ADMIN)
                                <a href="candidate-profile-setting.html" class="dropdown-item fw-medium fs-6"><i data-feather="settings" class="fea icon-sm me-2 align-middle"></i>Settings</a>
                                <div class="dropdown-divider border-top"></div>
                                <a href="lock-screen.html" class="dropdown-item fw-medium fs-6"><i data-feather="lock" class="fea icon-sm me-2 align-middle"></i>Lockscreen</a>
                                <a href="Views/Auth/login.php" class="dropdown-item fw-medium fs-6"><i data-feather="log-out" class="fea icon-sm me-2 align-middle"></i>Logout</a>
                            </div>
                        </div>
                    </li>
                </ul>
        
                <div id="navigation">
                    <!-- Navigation Menu-->   
                    <ul class="navigation-menu nav-right">
                        <li class="has-submenu parent-menu-item">
                            <a href="javascript:void(0)">Home</a><span class="menu-arrow"></span>
                            <ul class="submenu">
<<<<<<< HEAD
                                <li><a href="index.php" class="sub-menu-item">Hero One</a></li>
=======
                                <li><a href="Views/Condidate/index.php" class="sub-menu-item">Hero One</a></li>
>>>>>>> 4d5de49 (Commitded for Gestion ADMIN)
                                <li><a href="index-two.html" class="sub-menu-item">Hero Two</a></li>
                                <li><a href="index-three.html" class="sub-menu-item">Hero Three</a></li>
                            </ul>
                        </li>

                        <li class="has-submenu parent-parent-menu-item"><a href="javascript:void(0)"> Jobs </a><span class="menu-arrow"></span>
                            <ul class="submenu">
                                <li><a href="job-categories.html" class="sub-menu-item">Job Categories</a></li>
                        
                                <li class="has-submenu parent-menu-item">
                                    <a href="javascript:void(0)"> Job Grids </a><span class="submenu-arrow"></span>
                                    <ul class="submenu">
                                        <li><a href="job-grid-one.html" class="sub-menu-item">Job Grid One</a></li>
                                        <li><a href="job-grid-two.html" class="sub-menu-item">Job Grid Two</a></li>
                                        <li><a href="job-grid-three.html" class="sub-menu-item">Job Grid Three</a></li>
                                        <li><a href="job-grid-four.html" class="sub-menu-item">Job Grid Four </a></li>
                                    </ul>  
                                </li>

                                <li class="has-submenu parent-menu-item">
                                    <a href="javascript:void(0)"> Job Lists </a><span class="submenu-arrow"></span>
                                    <ul class="submenu">
                                        <li><a href="job-list-one.html" class="sub-menu-item">Job List One</a></li>
                                        <li><a href="job-list-two.html" class="sub-menu-item">Job List Two</a></li>
                                    </ul>  
                                </li>

                                <li class="has-submenu parent-menu-item">
                                    <a href="javascript:void(0)"> Job Detail </a><span class="submenu-arrow"></span>
                                    <ul class="submenu">
                                        <li><a href="job-detail-one.html" class="sub-menu-item">Job Detail One</a></li>
                                        <li><a href="job-detail-two.html" class="sub-menu-item">Job Detail Two</a></li>
                                        <li><a href="job-detail-three.html" class="sub-menu-item">Job Detail Three</a></li>
                                    </ul>  
                                </li>
                
                                <li><a href="job-apply.html" class="sub-menu-item">Job Apply</a></li>
                
                                <li><a href="job-post.html" class="sub-menu-item">Job Post </a></li>
                
                                <li><a href="career.html" class="sub-menu-item">Career </a></li>
                            </ul>  
                        </li>
                
                        <li class="has-submenu parent-menu-item">
                            <a href="javascript:void(0)">Employers</a><span class="menu-arrow"></span>
                            <ul class="submenu">
                                <li><a href="employers.html" class="sub-menu-item">Employers</a></li>
                                <li><a href="employer-profile.html" class="sub-menu-item">Employer Profile</a></li>
                            </ul>
                        </li>
                
                        <li class="has-submenu parent-menu-item">
                            <a href="javascript:void(0)">Candidates</a><span class="menu-arrow"></span>
                            <ul class="submenu">
                                <li><a href="candidates.html" class="sub-menu-item">Candidates</a></li>
<<<<<<< HEAD
                                <li><a href="candidate-profile.php" class="sub-menu-item">Candidate Profile</a></li>
=======
                                <li><a href="Views/Condidate/candidate-profile.php" class="sub-menu-item">Candidate Profile</a></li>
>>>>>>> 4d5de49 (Commitded for Gestion ADMIN)
                                <li><a href="candidate-profile-setting.html" class="sub-menu-item">Profile Setting</a></li>
                            </ul>
                        </li>
                
                        <li class="has-submenu parent-parent-menu-item">
                            <a href="javascript:void(0)">Pages</a><span class="menu-arrow"></span>
                            <ul class="submenu">
                                <li><a href="aboutus.html" class="sub-menu-item">About Us</a></li>
                                <li><a href="services.html" class="sub-menu-item">Services</a></li>
                                <li><a href="pricing.html" class="sub-menu-item">Pricing </a></li>

                                <li class="has-submenu parent-menu-item">
                                    <a href="javascript:void(0)"> Helpcenter </a><span class="submenu-arrow"></span>
                                    <ul class="submenu">
                                        <li><a href="helpcenter-overview.html" class="sub-menu-item">Overview</a></li>
                                        <li><a href="helpcenter-faqs.html" class="sub-menu-item">FAQs</a></li>
                                        <li><a href="helpcenter-guides.html" class="sub-menu-item">Guides</a></li>
                                        <li><a href="helpcenter-support.html" class="sub-menu-item">Support</a></li>
                                    </ul>  
                                </li>

                                <li class="has-submenu parent-menu-item"><a href="javascript:void(0)"> Blog </a><span class="submenu-arrow"></span>
                                    <ul class="submenu">
                                        <li><a href="blogs.html" class="sub-menu-item"> Blogs</a></li>
                                        <li><a href="blog-sidebar.html" class="sub-menu-item"> Blog Sidebar</a></li>
                                        <li><a href="blog-detail.html" class="sub-menu-item"> Blog Detail</a></li>
                                    </ul> 
                                </li>

                                <li class="has-submenu parent-menu-item"><a href="javascript:void(0)"> Auth Pages </a><span class="submenu-arrow"></span>
                                    <ul class="submenu">
                                        <li><a href="Views/Auth/login.php" class="sub-menu-item"> Login</a></li>
                                        <li><a href="Views/Auth/signup.php" class="sub-menu-item"> Signup</a></li>
                                        <li><a href="reset-password.html" class="sub-menu-item"> Forgot Password</a></li>
                                        <li><a href="lock-screen.html" class="sub-menu-item"> Lock Screen</a></li>
                                    </ul> 
                                </li>

                                <li class="has-submenu parent-menu-item"><a href="javascript:void(0)"> Utility </a><span class="submenu-arrow"></span>
                                    <ul class="submenu">
                                        <li><a href="terms.html" class="sub-menu-item">Terms of Services</a></li>
                                        <li><a href="privacy.html" class="sub-menu-item">Privacy Policy</a></li>
                                    </ul>  
                                </li>

                                <li class="has-submenu parent-menu-item"><a href="javascript:void(0)"> Special </a><span class="submenu-arrow"></span>
                                    <ul class="submenu">
                                        <li><a href="comingsoon.html" class="sub-menu-item"> Coming Soon</a></li>
                                        <li><a href="maintenance.html" class="sub-menu-item"> Maintenance</a></li>
                                        <li><a href="error.html" class="sub-menu-item"> 404! Error</a></li>
                                    </ul> 
                                </li>
                            </ul>
                        </li>
                
                        <li><a href="contactus.html" class="sub-menu-item">Contact Us</a></li>
                    </ul><!--end navigation menu-->
                </div><!--end navigation-->
            </div>
        </header>
        <!-- Navbar End -->

        <!-- Start -->
        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="position-relative">
                            <div class="candidate-cover">
                                <div class="profile-banner relative text-transparent">
                                    <input id="pro-banner" name="profile-banner" type="file" class="hidden" onchange="loadFile(event)" />
                                    <div class="relative shrink-0">
                                        <img src="Views/images/hero/bg5.jpg" class="rounded shadow" id="profile-banner" alt="">
                                        <label class="profile-image-label" for="pro-banner"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="candidate-profile d-flex align-items-end mx-2">
                                <div class="profile-pic">
                                    <input id="pro-img" name="profile-image" type="file" class="d-none" onchange="loadFile(event)" />
                                    <div class="position-relative d-inline-block">
                                        <img src="Views/images/team/01.jpg" class="avatar avatar-medium img-thumbnail rounded-pill shadow-sm" id="profile-image" alt="">
                                        <label class="icons position-absolute bottom-0 end-0" for="pro-img"><span class="btn btn-icon btn-sm btn-pills btn-primary"><i data-feather="camera" class="icons"></i></span></label>
                                    </div>
                                </div>

                                <div class="ms-2">
                                    <h5 class="mb-0"><?php $name ?> </h5>
                                    <p class="text-muted mb-0"><?php $occ ?></p>
                                </div>
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->

            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="rounded shadow p-4">
                            <form>
                                <h5>Personal Detail :</h5>
                                <div class="row mt-4">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label fw-semibold">First Name:<span class="text-danger">*</span></label>
                                            <input name="name" id="firstname" type="text" class="form-control" placeholder="First Name">
                                        </div>
                                    </div><!--end col-->
                                    
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label fw-semibold">Last Name:<span class="text-danger">*</span></label>
                                            <input name="lastname" id="lastname" type="text" class="form-control" placeholder="Last Name">
                                        </div>
                                    </div><!--end col-->

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label fw-semibold">Your Email:<span class="text-danger">*</span></label>
                                            <input name="email" id="email2" type="email" class="form-control" placeholder="Your email">
                                        </div> 
                                    </div><!--end col-->

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label fw-semibold">Occupation:</label>
                                            <select class="form-control form-select" id="Type">
                                                <option value="">Select an option</option>
                                                <option value="WD">Web Developer</option>
                                                <option value="UI">UI / UX Desinger</option>
                                                <option value="UI">UI / UX Desinger</option>
                                                <option value="UI">UI / UX Desinger</option>
                                                <option value="UI">UI / UX Desinger</option>
                                            </select>
                                        </div>
                                    </div><!--end col-->

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label fw-semibold">Location:</label>
                                            <select class="form-control form-select" id="Country">
                                                <option value="">Select an option</option>
                                                <option value="CAD">Canada</option>
                                                <option value="CHINA">China</option>
                                                <option value="CHINA">China</option>
                                                <option value="CHINA">China</option>
                                                <option value="CHINA">China</option>
                                                <option value="CHINA">China</option>
                                                <option value="CHINA">China</option>
                                                <option value="CHINA">China</option>
                                                <option value="CHINA">China</option>

                                            </select>
                                        </div>
                                    </div><!--end col-->

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label fw-semibold">Upload Your Cv / Resume :</label>
                                            <input class="form-control" type="file" id="formFile">
                                        </div>                                                                               
                                    </div><!--end col-->

                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label class="form-label fw-semibold">Introduction :</label>
                                            <textarea name="comments" id="comments2" rows="4" class="form-control" placeholder="Introduction :"></textarea>
                                        </div>
                                    </div><!--end col-->

                                    <div class="col-12">
                                        <input type="submit" id="submit2" name="send" class="submitBnt btn btn-primary" value="Save Changes">
                                    </div><!--end col-->
                                </div>
                            </form>
                        </div>

                        <div class="rounded shadow p-4 mt-4">
                            <form>
                                <div class="row">
                                    <div class="col-md-6 mt-4 pt-2">
                                        <h5>Contact Info :</h5>

                                        <form>
                                            <div class="row mt-4">
                                                <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <label class="form-label fw-semibold">Phone No. :</label>
                                                        <input name="number" id="number" type="number" class="form-control" placeholder="Phone :">
                                                    </div>
                                                </div><!--end col-->

                                                <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <label class="form-label fw-semibold">Website :</label>
                                                        <input name="url" id="url" type="url" class="form-control" placeholder="Url :">
                                                    </div>
                                                </div><!--end col-->

                                                <div class="col-lg-12 mt-2 mb-0">
                                                    <button class="btn btn-primary">Add</button>
                                                </div><!--end col-->
                                            </div><!--end row-->
                                        </form>
                                    </div><!--end col-->
                                    
                                    <div class="col-md-6 mt-4 pt-2"> 
                                        <h5>Change password :</h5>
                                        <form>
                                            <div class="row mt-4">
                                                <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <label class="form-label fw-semibold">Old password :</label>
                                                        <input type="password" class="form-control" placeholder="Old password" required="">
                                                    </div>
                                                </div><!--end col-->
            
                                                <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <label class="form-label fw-semibold">New password :</label>
                                                        <input type="password" class="form-control" placeholder="New password" required="">
                                                    </div>
                                                </div><!--end col-->
            
                                                <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <label class="form-label fw-semibold">Re-type New password :</label>
                                                        <input type="password" class="form-control" placeholder="Re-type New password" required="">
                                                    </div>
                                                </div><!--end col-->
            
                                                <div class="col-lg-12 mt-2 mb-0">
                                                    <button class="btn btn-primary">Save password</button>
                                                </div><!--end col-->
                                            </div><!--end row-->
                                        </form>
                                    </div><!--end col-->
                                </div>
                            </form>
                        </div>

                        <div class="rounded shadow p-4 mt-4">
                            <form action="" method="GET">
                                <h5 class="text-danger">Delete Account :</h5>
                                <div class="row mt-4">
                                    <h6 class="mb-0">Do you want to delete the account? Please press below "Delete" button</h6>
                                    <div class="mt-4">
                                        <button name="delete" type="submit" class="btn btn-danger">Delete Account</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
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
                                <a href="job-apply.html" class="btn btn-primary me-1 my-1">Apply Now</a>
                                <a href="contactus.html" class="btn btn-soft-primary my-1">Contact Us</a>
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
<<<<<<< HEAD
                                        <li class="list-inline-item my-2"><a href="index.php" class="text-foot fs-6 fw-medium me-2"><i class="mdi mdi-circle-small"></i> Home</a></li>
=======
                                        <li class="list-inline-item my-2"><a href="Views/Condidate/index.php" class="text-foot fs-6 fw-medium me-2"><i class="mdi mdi-circle-small"></i> Home</a></li>
>>>>>>> 4d5de49 (Commitded for Gestion ADMIN)
                                        <li class="list-inline-item my-2"><a href="services.html" class="text-foot fs-6 fw-medium me-2"><i class="mdi mdi-circle-small"></i> How it works</a></li>
                                        <li class="list-inline-item my-2"><a href="job-post.html" class="text-foot fs-6 fw-medium me-2"><i class="mdi mdi-circle-small"></i> Create a job</a></li>
                                        <li class="list-inline-item my-2"><a href="aboutus.html" class="text-foot fs-6 fw-medium me-2"><i class="mdi mdi-circle-small"></i> About us</a></li>
                                        <li class="list-inline-item my-2"><a href="pricing.html" class="text-foot fs-6 fw-medium"><i class="mdi mdi-circle-small"></i> Plans</a></li>
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
                                <p class="mb-0 fw-medium">© <script>document.write(new Date().getFullYear())</script> TekJob. Design with <i class="mdi mdi-heart text-danger"></i> by <a href="https://shreethemes.in/" target="_blank" class="text-reset">Shreethemes</a>.</p>
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
	    <script src="Views/js/bootstrap.bundle.min.js"></script>
        <script src="Views/js/feather.min.js"></script>
	    <!-- Custom -->
	    <script src="Views/js/plugins.init.js"></script>
	    <script src="Views/js/app.js"></script>
    </body>

<!-- Mirrored from shreethemes.in/jobnova/layouts/candidate-profile-setting.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 18 Apr 2024 13:09:23 GMT -->
</html>