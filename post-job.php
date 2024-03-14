<?php
include 'config.php';
$admin = new Admin();
if (!isset($_SESSION['pid'])) {
  $admin->redirect('employer_login');
}
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
    <?php if (isset($_SESSION['pid'])) {
      include 'employer_navbar.php';
    } else {
      include 'navbar.php';
    }
    ?>

    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('images/hero_1.jpg');"
      id="home-section">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <h1 class="text-white font-weight-bold">Post A Job
              
            </h1>
            <div class="custom-breadcrumbs">
              <a href="#">Home</a> <span class="mx-2 slash">/</span>
              <a href="#">Job</a> <span class="mx-2 slash">/</span>
              <span class="text-white"><strong>Post a Job</strong></span>
            </div>
          </div>
        </div>
      </div>
    </section>


    <section class="site-section">

      <div class="container">

        <div class="row align-items-center mb-5">
          <div class="col-lg-8 mb-4 mb-lg-0">
            <div class="d-flex align-items-center">
              <div>
                <h2>Post A Job</h2>
              </div>
            </div>
          </div>
        </div>
        <div class="row mb-5">
          <div class="col-lg-12">
            <form class="p-4 p-md-5 border rounded" action="controller/addjob.php" method="post"
              enctype="multipart/form-data">
              <h3 class="text-black mb-5 border-bottom pb-2">Job Details</h3>


              <div class="form-group">
                <label for="job-title">Job Title</label>
                <input type="text" class="form-control" id="job-title" name="jname" placeholder="Product Designer" required>
              </div>

              <div class="form-group">
                <label for="job-region">Job Location</label>
                <select class="form-control" id="job-region" title="Select Region" name="jlocation" required>
                  <option value="Bangalore">Bangalore</option>
                  <option value="Mangalore">Mangalore</option>
                  <option value="Pune">Pune</option>
                  <option value="Mumbai">Mumbai</option>
                  <option value="Calcutta">Calcutta</option>
                  <option value="Pune">Pune</option>
                  <option value="Gurgaon">Gurgaon</option>
                  <option vaue="Hyderbad">Hyderbad</option>
                  <option value="Chennai">Chennai</option>
                </select>
              </div>

              <div class="form-group">
                <label for="job-type">Job Type</label>
                <select class="form-control" id="job-type" title="Select Job Type" name="jtype" required>
                  <option value="Part Time">Part Time</option>
                  <option value="Full Time">Full Time</option>
                  <option value="Internship">Internship</option>
                </select>
              </div>

              <div class="form-group">
                <label for="job-type">Job Category</label>
                <select class="form-control" id="job-type" title="Select Job Type" name="jcategory" required>
                  <?php $stmt = $admin->ret("SELECT * FROM `category`");
                  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <option value="<?php echo $row['category_id']; ?>">
                      <?php echo $row['category_name']; ?>
                    </option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <label for="job-salary">Job Salary</label>
                <input type="number" class="form-control" id="job-salary" placeholder="25,000" name="jsalary" required>
              </div>
              <div class="form-group">
                <label for="job-exp">Job Experience</label>
                <input type="text" class="form-control" id="job-exp" placeholder="Fresher" name="jexp" required>
              </div>

              <div class="form-group">
                <label for="company-website">Website </label>
                <input type="text" class="form-control" id="company-website" name="jwebsite" placeholder="https://" required>
              </div>

              <div class="form-group">
                <label for="jlast_date">Last date to apply</label>
                <input type="date" class="form-control" id="last_date" name="jlast_date" placeholder="25-5-2023" required>
              </div>
              <script>
                // Set the min attribute to the current date
                document.getElementById('last_date').min = new Date().toISOString().split('T')[0];

                // Set the max attribute to one year from now
                const maxDate = new Date();
                maxDate.setFullYear(maxDate.getFullYear() + 1);
                document.getElementById('last_date').max = maxDate.toISOString().split('T')[0];
              </script>

              <div class="form-group">
                <label for="job-description">Job Description</label>
                <textarea type="text" class="form-control" id="desc" name="jdesc"required
                  placeholder=" Job Description"></textarea>
              </div>
              <button class="btn btn-block btn-primary btn-md" name="job">Save Job</button>
          </div>
          
        </div>
        </form>
      </div>


  </div>
  </div>
  </section>



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
  <script src="js/quill.min.js"></script>


  <script src="js/bootstrap-select.min.js"></script>

  <script src="js/custom.js"></script>



</body>

</html>