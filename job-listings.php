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

  <!-- <div id="overlayer"></div>
  <div class="loader">
    <div class="spinner-border text-primary" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div> -->


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
    <section class="home-section section-hero overlay bg-image" style="background-image: url('images/bg.png');"
      id="home-section">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-12">
            <div class="text-center">
             
             
            </div>
            <!-- <form action="" method="get" class="search-jobs-form"> -->
              <div class="row mb-5">
              <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                  <select class="form-control" value="" id="role" name="role" title="Job Role" style="height: 50px; font-size: 16px;" >
                    <option value="">Choose Role</option>
                    <?php $stmt=$admin->ret("SELECT DISTINCT(`job_role`) FROM `jobs`");
                    while($row1=$stmt->fetch(PDO::FETCH_ASSOC)){;?>
                    <option value="<?php echo $row1['job_role'];?>"><?php echo $row1['job_role'];?></option>
                    
                    <?php }?>
                  </select>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                  <select class="form-control" value="" id="category" name="category" title="Select Category" style="height: 50px; font-size: 16px;">
                    <option value="">Choose category</option>
                    <?php $stmt = $admin->ret("SELECT * FROM `category`");
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                      <option value="<?php echo $row['category_id']; ?>">

                        <?php echo $row['category_name']; ?>

                      </option>
                    <?php } ?>
                  </select>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                  <select class="form-control" value="" id="type" name="type" title="Job Type" style="height: 50px; font-size: 16px;" >
                    <option value="">Choose Job Type</option>
                    <option value="Part Time">Part Time</option>
                    <option value="Full Time">Full Time</option>
                    <option value="Internship">Internship</option>
                  </select>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-1 mb-4 mb-lg-0">
                  <button type="submit" onclick="Search()" 
                    class="btn btn-primary btn-lg btn-block text-white btn-search"><span
                      class="icon-search icon mr-2"></span></button>
                </div>
                
                <div class="col-12 col-sm-6 col-md-6 col-lg-1 mb-4 mb-lg-0">
                  <a href="job-listings.php" style="height: 50px; font-size: 16px;"
                    class="btn btn-primary btn-lg btn-block text-white text btn-search"><span
                    class="icon-refresh icon mr-2"></span></a>
                </div>
              </div>
            <!-- </form> -->
          </div>
        </div>
      </div>

      <!-- <a href="#next" class="scroll-button smoothscroll">
  <span class=" icon-keyboard_arrow_down"></span>
</a> -->
    </section>


    <section class="site-section" id="filtered_data" >
      <div class="container" >
        <?php
        $num_per_page = 4;

        if(isset($_GET['page'])){
          $page=$_GET['page'];
        }else{
          $page=1;
        }
        $offset=($page-1)*$num_per_page;
        $stmt = $admin->ret("SELECT * FROM `jobs` INNER JOIN `provider` ON jobs.provider_id=provider.provider_id limit $offset,$num_per_page");
        $count = $stmt->rowCount(); ?>

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
              <a href="job-single.php?job_id=<?php echo $row['job_id']; ?>"> </a>
              <div class="job-listing-logo">
                <img src="controller/<?php echo $row['job_img']; ?>" alt="Image" class="avatar1">
                <style>
                  as needed */ height: 100px;
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
                  <span class="badge badge-danger">
                    <?php echo $row['job_type']; ?>
                  </span>
                </div>
              </div>

            </li>
          </ul>
        <?php } ?>
        <div class="row pagination-wrap">
          <div class="col-md-6 text-center text-md-left mb-4 mb-md-0">
            
            <span>Showing Jobs</span>
          </div>
          <div class="col-md-6 text-center text-md-right">
            <div class="custom-pagination ml-auto">
              <a href="#" class="prev">Prev</a>
              <div class="d-inline-block">
                <?php $stmt = $admin->ret("SELECT * FROM `jobs` INNER JOIN `provider` ON jobs.provider_id=provider.provider_id ");
                $count = $stmt->rowCount();
                $total_page = ceil($count / $num_per_page);
                for ($i=1; $i <= $total_page; $i++) {?>
                  <a href='job-listings.php?page=<?php echo $i?>' class="active"><?php echo $i?></a>
                <?php } ?>
                
              </div>
              <a href="#" class="next">Next</a>
            </div>
          </div>
        </div>

      </div>
    </section>

<script>
function Search() {
   // Get the selected job type from the dropdown
   var type = document.getElementById("type").value;
   var category= document.getElementById("category").value;
   var role=document.getElementById("role").value;

   var xhttp = new XMLHttpRequest();
   xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
         document.getElementById("filtered_data").innerHTML = this.responseText;
      }
   };
   // Include the selected job type in the URL
   xhttp.open("GET", `controller/filter.php?type=${encodeURIComponent(type)}&category=${encodeURIComponent(category)}&role=${encodeURIComponent(role)}`, true);
  //  xhttp.open("GET", url, true);
   xhttp.send();
}

</script>




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