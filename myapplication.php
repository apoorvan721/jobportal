<?php
include 'config.php';
$admin = new Admin();
$sid = $_SESSION['sid'];
if (!isset($_SESSION['sid'])) {
  $admin->redirect('login');
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
            <div class="d-flex flex-column mb-3 mt-2"> <!-- Added mt-md-5 to d-flex -->
              <style>
                .mt-2 {
                  margin-top: 150px !important;
                  /* Adjust the pixel value as needed */
                }
              </style>
              <div class="container">
                <?php
                $num_per_page = 2;

                if (isset($_GET['page'])) {
                  $page = $_GET['page'];
                } else {
                  $page = 1;
                }
                $offset = ($page - 1) * $num_per_page;
                $stmt = $admin->ret("SELECT * FROM `application` INNER JOIN `jobs` ON application.job_id=jobs.job_id INNER JOIN `provider` ON jobs.provider_id=provider.provider_id where application.seeker_id='$sid' limit $offset,$num_per_page");
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                  <div class="card flex-grow-5 mb-3"> <!-- Added flex-grow-1 to stretch the card -->
                    <h5 class="card-header text-left bg-primary border-radius text-light font-weight-bold border-primary">
                      Application Status <span><span> </h5>
                    <div class="card-body border-white rounded">
                      <div class="row">
                        <div class="col-md-10">
                          <h4 class="card-title text-left font-weight-bold ">
                            <?php echo $row['job_role']; ?>
                          </h4>
                          <h5 class="card-title text-left">
                            <?php echo $row['provider_name']; ?>
                          </h5>

                          <?php if ($row['application_status'] == "Application sent") { ?>
                            <div class="badge badge-success px-3 py-2">
                              <?php echo $row['application_status']; ?>
                            </div><br>

                          <?php } else if ($row['application_status'] == "Shortlisted") { ?>
                            <div class="badge badge-success px-3 py-2">
                              <?php echo $row['application_status']; ?>
                                </div><br>
                              <span>You're Resume has been shortlisted!! Kinldy wait for the futher updates from team via
                                mail</span>
                          <?php } else if ($row['application_status'] == "Selected") { ?>
                                <div class="badge badge-success px-3 py-2">
                              <?php echo $row['application_status']; ?>
                                </div>
                          <?php } else { ?>
                                <div class="badge badge-danger px-3 py-2">
                              <?php echo $row['application_status']; ?>
                                </div>
                          <?php } ?>
                        </div>
                        <div class="col-md-2">
                          <img src="controller/<?php echo $row['provider_img'] ?>" class="img" alt="alt">
                          <style>
                            .img {
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
                        </div>

                        <style>
                          .large-badge {
                            font-size: 0.8rem;
                            /* Adjust the font size as needed */
                            padding: 8px 12px;
                            /* Adjust the padding as needed */
                            border: 1px solid #28a745;
                            /* Use your desired border color */
                            border-radius: 4px;
                            /* Adjust the border radius as needed */
                          }
                        </style>
                      </div>
                    </div>


                  </div>
                <?php } ?>
                <div class="row mb-5 justify-content-center pagination-wrap">
                  <div class="col-md-6 text-center">
                  </div>
                  <div class="col-md-6 text-center text-md-right">
                    <div class="custom-pagination ml-auto">
                      <a href="#" class="prev">Prev</a>
                      <div class="d-inline-block">
                        <?php $stmt = $admin->ret("SELECT * FROM `application` WHERE `seeker_id`='$sid' ");
                        $count = $stmt->rowCount();
                        $total_page = ceil($count / $num_per_page);
                        for ($i = 1; $i <= $total_page; $i++) { ?>
                          <a href='myapplication.php?page=<?php echo $i ?>' class="active">
                            <?php echo $i ?>
                          </a>
                        <?php } ?>

                      </div>
                      <a href="#" class="next">Next</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
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

  <script src="js/bootstrap-select.min.js"></script>

  <script src="js/custom.js"></script>


</body>

</html>