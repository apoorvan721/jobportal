<?php
include 'config.php';
$admin = new Admin();
$pid=$_SESSION['pid'];
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

    <!-- HOME -->
    <section class="home-section section-hero overlay bg-image" style="background-image: url('images/bg.png');"
      id="home-section">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-12">
            <div class="mt-5 mb-1 text-center">
              <h1 class="text-white font-weight-bold">Job Portal Hiring Suite for Employers</h1>
              <p class="mb-1">"Connecting Talent with Opportunities: Igniting Potential, and Fostering Growth in the
                World of Endless Possibilities."</p>
              </p>
              <div class="col-md-12">
                <div class="mt-5 text-center">
                  <a href="post-job.php"
                    class="btn btn-primary border-width-10 d-none d-lg-inline-block px-3 py-2 text-center"><span
                      class="mr-2 text-white font-weight-bold">Post a Job</span></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>



    </section>

    <section class="py-5 bg-image overlay-primary fixed overlay" id="next"
      style="background-image: url('images/bg.png');">
      <div class="container">
        <div class="row mb-5 justify-content-center">
          <div class="col-md-7 text-center">
            <h2 class="section-title mb-2 text-white">Job  Site Stats</h2>
            <p class="lead text-white">From Campus to Senior Level Hiring, Bouquet of solutions to meet all your hiring needs</p>
          </div>
        </div>
        <div class="row pb-0 block__19738 section-counter">

          <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
            <div class="d-flex align-items-center justify-content-center mb-2">
              <?php $stmt=$admin->ret("SELECT * FROM `seeker`");
              $count=$stmt->rowCount();?>
              <strong class="number" data-number="<?php echo $count;?>">0</strong>
            </div>
            <span class="caption">Candidates</span>
          </div>

          <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
            <div class="d-flex align-items-center justify-content-center mb-2">
            <?php $stmt=$admin->ret("SELECT * FROM `jobs`");
              $count=$stmt->rowCount();?>
              <strong class="number" data-number="<?php echo $count;?>">0</strong>
            </div>
            <span class="caption">Jobs Posted</span>
          </div>

          <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
            <div class="d-flex align-items-center justify-content-center mb-2">
            <?php $stmt=$admin->ret("SELECT * FROM `application`");
              $count=$stmt->rowCount();?>
              <strong class="number" data-number="<?php echo $count;?>">0</strong>
            </div>
            <span class="caption">Jobs Filled</span>
          </div>

          <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
            <div class="d-flex align-items-center justify-content-center mb-2">
            <?php $stmt=$admin->ret("SELECT * FROM `provider`");
              $count=$stmt->rowCount();?>
              <strong class="number" data-number="<?php echo $count;?>">0</strong>
            </div>
            <span class="caption">Companies</span>
          </div>


        </div>
      </div>
    </section>



    <section class="site-section" id="next">
      <div class="container">

        
        <?php
          $stmt = $admin->ret("SELECT * FROM `jobs` INNER JOIN `provider` ON jobs.provider_id=provider.provider_id WHERE jobs.provider_id='$pid'");
        $count = $stmt->rowCount();?>
        <div class="row mb-5 justify-content-center">
          <div class="col-md-7 text-center">
            <h2 class="section-title mb-2">
              <?php echo $count ?> Job Listed
            </h2>
          </div>
        </div>
        <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
          <ul class="job-listings mb-5">
            <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
              <a href="job-single.php?job_id=<?php echo $row['job_id'];?>"> </a>
              <div class="job-listing-logo">
                <img src="controller/<?php echo $row['job_img']; ?>" alt="Image" class="avatar1">
                <style>as needed */
                    height: 100px;
                    /* Adjust the height 
                  .avatar1 {
                    width: 150px;
                    /* Adjust the width as needed */
                    border-radius: 50%;
                    /* Makes it round */
                    margin-right: 50px;
                    padding-left: 40px;
                    /* Adds some space between the avatar and username */

                </style>
              </div>

              <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
                <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                  <h2><?php echo $row['job_role'];?></h2>
                  <strong><?php echo $row['provider_name'];?></strong>
                </div>
                <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                  <span class="icon-room"></span> <?php echo $row['job_location'];?>
                </div>
                <div class="job-listing-meta">
                  <span class="badge badge-danger"><?php echo $row['job_type'];?></span>
                </div>
              </div>

            </li>
         




        </ul>
        <?php } ?>
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

    <section class="py-5 bg-image overlay-primary fixed overlay" style="background-image: url('images/bg.png');">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-8">
            <h2 class="text-white">Looking For A Right Candidate?</h2>
            <p class="mb-0 text-white lead">From Campus to Senior Level Hiring, Bouquet of solutions to meet all your hiring needs</p>
          </div>
          <div class="col-md-3 ml-auto">
            <a href="post-job.php" class="btn btn-warning btn-block btn-lg">Post a Job</a>
          </div>
        </div>
      </div>
    </section>


    <section class="site-section py-4">
      <div class="container">

        <div class="row align-items-center">
          <div class="col-12 text-center mt-4 mb-5">
            <div class="row justify-content-center">
              <div class="col-md-7">
                <h2 class="section-title mb-2">Company We've Helped</h2>
                <p class="lead">From Campus to Senior Level Hiring, Bouquet of solutions to meet all your hiring needs</p>
              </div>
            </div>

          </div>
          <div class="col-6 col-lg-3 col-md-6 text-center">
            <img src="controller/images/deloitee.png" alt="Image" class="img-fluid logo-1">
          </div>
          <div class="col-6 col-lg-3 col-md-6 text-center">
            <img src="controller/images/dataqueue systems.png" alt="Image" class="img-fluid logo-2">
          </div>
          <div class="col-6 col-lg-3 col-md-6 text-center">
            <img src="controller/images/infosys.png" alt="Image" class="img-fluid logo-3">
          </div>
          <div class="col-6 col-lg-3 col-md-6 text-center">
            <img src="controller/images/tcs.png" alt="Image" class="img-fluid logo-4">
          </div>

          
        </div>
      </div>
    </section>


    <!-- <section class="bg-light pt-5 testimony-full">

      <div class="owl-carousel single-carousel">


        <div class="container">
          <div class="row">
            <div class="col-lg-6 align-self-center text-center text-lg-left">
              <blockquote>
                <p>&ldquo;Soluta quasi cum delectus eum facilis recusandae nesciunt molestias accusantium libero dolores
                  repellat id in dolorem laborum ad modi qui at quas dolorum voluptatem voluptatum repudiandae.&rdquo;
                </p>
                <p><cite> &mdash; Corey Woods, @Dribbble</cite></p>
              </blockquote>
            </div>
            <div class="col-lg-6 align-self-end text-center text-lg-right">
              <img src="images/person_transparent_2.png" alt="Image" class="img-fluid mb-0">
            </div>
          </div>
        </div>

        <div class="container">
          <div class="row">
            <div class="col-lg-6 align-self-center text-center text-lg-left">
              <blockquote>
                <p>&ldquo;Soluta quasi cum delectus eum facilis recusandae nesciunt molestias accusantium libero dolores
                  repellat id in dolorem laborum ad modi qui at quas dolorum voluptatem voluptatum repudiandae.&rdquo;
                </p>
                <p><cite> &mdash; Chris Peters, @Google</cite></p>
              </blockquote>
            </div>
            <div class="col-lg-6 align-self-end text-center text-lg-right">
              <img src="images/person_transparent.png" alt="Image" class="img-fluid mb-0">
            </div>
          </div>
        </div>

      </div>

    </section> -->

    <?php include 'employer_footer.php';?>

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