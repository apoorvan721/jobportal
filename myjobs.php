<?php
include 'config.php';
$admin = new Admin();
$pid = $_SESSION['pid'];
if (!isset($_SESSION['pid'])) {
  $admin->redirect('employer_login.php');
}
?>


<!doctype html>
<html lang="en">

<head>
  <title>Job Portal</title>
  <meta charset="utf-8">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
    <?php if (isset($_SESSION['pid'])) {
      include 'employer_navbar.php';
    } else {
      include 'navbar.php';
    }
    ?>

    <!-- HOME -->
    <section class="section-hero home-section overlay inner-page bg-image"
      style="background-image: url('images/222.png');" id="home-section">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-12">
            <div class="mb-5 text-center">
              <h1 class="text-white font-weight-bold">The Easiest Way To Get Your Dream Job</h1>
              <p>Job Portal Hiring Suite for Employers </p>
            </div>
            <div class="col-md-12">
              <div class="mb-5 text-center">
                <a href="post-job.php" class="btn btn-primary border-width-10 d-none d-lg-inline-block px-3 py-3"><span
                    class="mr-2 text-white font-weight-bold">Post a Job</span></a>
              </div>
            </div>
          </div>
        </div>
      </div>


    </section>


    <section class="site-section" id="next">
      <div class="container">


        <?php $stmt = $admin->ret("SELECT * FROM `jobs` INNER JOIN `provider` ON jobs.provider_id=provider.provider_id WHERE provider.provider_id='$pid'");
        $count = $stmt->rowCount(); ?>
        <div class="row mb-5 justify-content-center">
          <div class="col-md-7 text-center">
            <h2 class="section-title mb-2">
              <?php echo $count ?> Job Listed
            </h2>
          </div>
        </div>

         
            <ul class="job-listings mb-5">
              <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                <div class="d-md-flex">
                <li class="d-sm-flex d-block col-md-10 align-items-center pb-3 pb-sm-0">
                  <a href="#"></a>
                  <div class="job-listing-logo">
                    <img src="controller/<?php echo $row['job_img']; ?>" alt="Image" class="avatar1">
                    <style>
                      .avatar1 {
                        width: 150px;
                        /* Adjust the width as needed */
                        height: 120px;
                        /* Adjust the height as needed */
                        border-radius: 50%;
                        /* Makes it round */
                        margin-right: 50px;
                        padding-left: 40px;
                        /* Adds some space between the avatar and username */
                      }
                    </style>
                  </div>

                  <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
                    <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                      <h2>
                        <?php echo $row['job_role']; ?>
                      </h2>
                      <strong>
                        <?php echo $row['provider_name']; ?>
                      </strong>
                    </div>
                    <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                      <span class="icon-room"></span>
                      <?php echo $row['job_location']; ?>
                    </div>
                    <div class="job-listing-meta">
                      <span class="badge badge-primary">
                        <?php echo $row['job_type']; ?>
                      </span>
                    </div>
                    </div>
                    </li>
                    <li class=" d-sm-flex d-block col-md-10 align-items-center pb-3 pb-sm-0">
                      <span class="text-success mx-5"><a href="edit_job.php?jid=<?php echo $row['job_id'];?>">
                      <i class="material-icons text-success">&#xe22b;</i></a>
                      </span>
                      <span class="text-danger"><a href="controller/deletejob.php?jid=<?php echo $row['job_id'];?>">
                      <i class="material-icons text-danger">delete</i>
                      </span>
                    </li>
                      
                  
                  </div>

                  <?php } ?>
                </li>
                
              </ul>
           

          
        

        <!-- <div class="row pagination-wrap">
          <div class="col-md-6 text-center text-md-left mb-4 mb-md-0">
            <span>Showing 1-7 Of 43,167 Jobs</span>
          </div>
          <div class="col-md-6 text-center text-md-right">
            <div class="custom-pagination ml-auto">
              <a href="#" class="prev">Prev</a>
              <div class="d-inline-block">
                <a href="#" class="active">1</a>
                <a href="#">2</a>
                <a href="#">3</a>
                <a href="#">4</a>
              </div>
              <a href="#" class="next">Next</a>
            </div>
          </div>
        </div> -->

      </div>
    </section>

    <section class="py-5 bg-image overlay-primary fixed overlay" style="background-image: url('images/hero_1.jpg');">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-8">
            <h2 class="text-white">Looking For A Right Candidate?</h2>
            <p class="mb-0 text-white lead">From Campus to Senior Level Hiring, Bouquet of solutions to meet all your
              hiring needs</p>
          </div>
          <div class="col-md-3 ml-auto">
            <a href="post-job.php" class="btn btn-warning btn-block btn-lg">Post A Job</a>
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
  <script src="js/quill.min.js"></script>


  <script src="js/bootstrap-select.min.js"></script>

  <script src="js/custom.js"></script>



</body>

</html>