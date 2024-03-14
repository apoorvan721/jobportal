<?php
include 'config.php';
$admin = new Admin();
$pid = $_SESSION['pid'];
if (!isset($_SESSION['pid'])) {
  $admin->redirect('employer_login');
}
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
    <?php if (isset($_SESSION['pid'])) {
      include 'employer_navbar.php';
    } else {
      include 'navbar.php';
    }
    ?>

    <section class="home-section section-hero overlay bg-image" style="background-image: url('images/333.png');"
      id="home-section">

      <div class="container px-3 py-3">
        <div class="row">
          <div class="col-md-12">
            <div class="d-flex flex-column mb-3 mt-2"> <!-- Added mt-md-5 to d-flex -->
              <style>
                .mt-2 {
                  margin-top: 100px !important;
                  /* Adjust the pixel value as needed */
                }
              </style>
              <div class="scrollable-section" style="max-height: 600px; overflow-y: auto;">
                <?php $stmt = $admin->ret("SELECT * FROM `refer` INNER JOIN `seeker` ON refer.seeker_id=seeker.seeker_id INNER JOIN `provider` ON refer.provider_id=provider.provider_id where refer.provider_id='$pid'");
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                  <div class="card flex-grow-5 mb-3"> <!-- Added flex-grow-1 to stretch the card -->
                    <h5 class="card-header text-left bg-primary border-radius text-light font-weight-bold border-primary">
                      Referral Status <span><span> </h5>
                    <div class="card-body border-white rounded">
                      <div class="row">
                        <div class="col-md-10">
                          <h4 class="card-title text-left font-weight-bold ">
                            <?php echo $row['refer_role']; ?>
                          </h4>
                          <span class="card-title text-left mb-2">
                            <?php echo $row['refer_name']; ?>
                          </span><br>
                          <span class="card-title text-left mb-1">
                            <?php echo $row['refer_email']; ?>
                          </span><br>
                          <span class="card-title text-left mb-3">
                            <?php echo $row['refer_phone']; ?>
                          </span><br>
                          <a href="controller/<?php echo $row["refer_resume"] ?>" class="btn btn-dark mb-3">
                            Resume
                          </a>
                          <!-- <div>
                    <img src="" alt="img" class="text-right">
              </div> -->

                        </div>
                        <div class="col-md-2 d-flex flex-column mb-3">
                        <h5 class="card-title text-left font-weight-bold ">Referred By
                           <h6> <?php echo $row['seeker_name']; ?><h6>
                          </h5>

                          <!-- <a href="controller/select_application.php?app_status=<?php echo $row["application_status"]; ?>&app_id=<?php echo $row["application_id"]; ?>"
                            <?php if ($row['application_status'] == "Application sent") { ?> class="btn btn-success mb-3">
                              Accept</a>
                          <?php } else if ($row['application_status'] == "Shortlisted") { ?>
                              <label class="btn btn-outline-success mb-3"> Shortlisted</label></a>

                          <?php } else if ($row['application_status'] == "Selected") { ?>
                                <label class="btn btn-outline-success mb-3">Selected</label></a>

                          <?php } ?>

                          <a href="controller/reject_application.php?app_status=<?php echo $row["application_status"]; ?>&app_id=<?php echo $row["application_id"]; ?>"
                            <?php if ($row['application_status'] == "Rejected") { ?>><label
                                class="btn btn-outline-danger">Not Shortlisted</a>
                          <?php } else if ($row['application_status'] == "Selected") { ?>
                              </a>
                          <?php } else { ?>
                              class="btn btn-danger"> Reject</a>
                          <?php } ?> -->
                        </div>

                        <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->

                      </div>
                    </div>
                  </div>
                <?php } ?>
              </div>


            </div>
          </div>
        </div>
      </div>


    </section>







    <?php include 'employer_footer.php'?>

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