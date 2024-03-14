<?php
include 'config.php';
$admin = new Admin();
?>
<!doctype html>
<html lang="en">

<head>
    <style>
        .avatar {
            width: 30px;
            /* Adjust the width as needed */
            height: 30px;
            /* Adjust the height as needed */
            border-radius: 50%;
            /* Makes it round */
            margin-right: 8px;
            /* Adds some space between the avatar and username */
        }
    </style>

    <title>Job Portal</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="Free-Template.co" />
    <link rel="shortcut icon" href="ftco-32x32.png">

    <link rel="stylesheet" href="css/custom-bs.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="css/bootstrap-select.min.css">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="fonts/line-icons/style.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/animate.min.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body id="top">
    <div id="overlayer"></div>
    <div class="loader">
        <div class="spinner-border text-primary" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>


    <div class="site-wrap">

        <div class="site-mobile-menu site-navbar-target">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close mt-3">
                    <span class="icon-close2 js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div> <!-- .site-mobile-menu -->


        <!-- NAVBAR -->
        <?php if (isset($_SESSION['sid'])) {
            include 'seeker_navbar.php';
        } else {
            include 'navbar.php';
        }
        ?>
        <section class="home-section section-hero overlay bg-image" style="background-image: url('images/333.png');"
            id="home-section">

            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mt-2"> <!-- Added mt-md-5 to d-flex -->
                            <style>
                                .mt-2 {
                                    margin-top: 190px !important;
                                    /* Adjust the pixel value as needed */
                                }
                            </style>
                            <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
                                <div class="col">
                                    <div class="card mb-4 rounded-3 shadow-sm">
                                        <div class="card-header py-3">
                                            <h4 class="my-0 fw-normal">Basic</h4>
                                        </div>
                                        <div class="card-body">
                                            <h1 class="card-title pricing-card-title text-black">99<small
                                                    class="text-body-secondary fw-light">/mo</small></h1>
                                            <ul class="list-unstyled mt-3 mb-4">
                                                <li>One on one session</li>
                                                <li>Resume creation</li>
                                                <li>Career Webinars</li>
                                                <li>Skill Assesments</li>
                                            </ul>
                                            <a href="payment.php?price=99" type="button" class="w-100 btn btn-lg btn-primary">Get Started
                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card mb-4 rounded-3 shadow-sm">
                                        <div class="card-header py-3">
                                            <h4 class="my-0 fw-normal">Pro</h4>
                                        </div>
                                        <div class="card-body">
                                            <h1 class="card-title pricing-card-title text-black">999<small
                                                    class="text-body-secondary fw-light">/mo</small></h1>
                                            <ul class="list-unstyled mt-3 mb-4">
                                                <li>One on one session</li>
                                                <li>Interview Preparation</li>
                                                <li>Skill Assesments</li>
                                                <li>Job Assistance</li>
                                            </ul>
                                            <a href="payment.php?price=999" type="button" class="w-100 btn btn-lg btn-primary">Get
                                                started</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card mb-4 rounded-3 shadow-sm ">
                                        <div class="card-header py-3 text-bg-primary ">
                                            <h4 class="my-0 fw-normal">Enterprise</h4>
                                        </div>
                                        <div class="card-body">
                                            <h1 class="card-title pricing-card-title text-black">1999<small
                                                    class="text-body-secondary fw-light">/mo</small></h1>
                                            <ul class="list-unstyled mt-3 mb-4">
                                                <li>One On One session</li>
                                                <li>Interview Preparation</li>
                                                <li>Job Assistance</li>
                                                <li>Project Support</li>
                                            </ul>
                                            <a href="payment.php?price=1999" type="button" class="w-100 btn btn-lg btn-primary">Get Started</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php include 'footer.php'?>

    </div>

    <!-- SCRIPTS -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/stickyfill.min.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>

    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>

    <script src="js/bootstrap-select.min.js"></script>

    <script src="js/custom.js"></script>


</body>

</html>