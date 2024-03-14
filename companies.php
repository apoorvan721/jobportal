<?php
include 'config.php';
$admin = new Admin();
?>
<!doctype html>
<html lang="en">

<head>
    <title>Job Portal</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="stylesheet" href="css/custom-bs.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="css/bootstrap-select.min.css">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="fonts/line-icons/style.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/quill.snow.css">


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

        <!-- HOME -->
        <section class="section-hero overlay inner-page bg-image" style="background-image: url('images/222.png');"
            id="home-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <h1 class="text-white font-weight-bold">Companies</h1>
                        
                    </div>
                </div>
            </div>
        </section>

        <section class="site-section services-section bg-light block__62849" id="next-section">
            <div class="container">

                <div class="row">
                    <div class="col-md-12 mb-4 mb-lg-5">
                        <?php $stmt = $admin->ret('SELECT * FROM `provider` WHERE `provider_status`="Approved"');
                        $count = $stmt->rowCount(); ?>
                        <h2 class="section-title mb-2 text-center">
                            <?php echo $count ?> Companies Listed
                        </h2>
                    </div>
                </div>
                <div class="row">
                    <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { 
                        if($row['provider_status']!="Pending"){?>
                        <div class="col-6 col-md-6 col-lg-4 mb-4 mb-lg-5">

                            <a href="#" class="block__16443 text-center d-block">
                            <img src="controller/<?php echo $row['provider_img']; ?>" alt="Image" class="avatar1">
                                <h3><?php echo $row['provider_name'];?></h3>
                                <style>
                                .avatar1 {
                                    width: 120px;
                                    /* Adjust the width as needed */
                                    height: 120px;
                                    /* Adjust the height as needed */
                                    border-radius: 50%;
                                    /* Makes it round */
                                    margin-right: 8px;
                                    /* Adds some space between the avatar and username */
                                }
                            </style>
                                <p class="mb-2">Company headquater: <?php echo $row['provider_headquater'];?></p>
                                <p>Company Size: <?php if ($row['provider_size'] == 1) {
                                  echo "<50";
                                } else if ($row['provider_size'] == 2) {
                                  echo "50-200";
                                } else if ($row['provider_size'] == 3) {
                                  echo "200-500";
                                } else if ($row['provider_size'] == 4) {
                                  echo "500-1000";
                                } else if ($row['provider_size'] == 5) {
                                  echo ">1000";
                                }
                                ?></p>
                            </a>

                        </div>
                    <?php } }?>
                </div>


            </div>
        </section>

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
    <script src="js/quill.min.js"></script>


    <script src="js/bootstrap-select.min.js"></script>

    <script src="js/custom.js"></script>



</body>

</html>