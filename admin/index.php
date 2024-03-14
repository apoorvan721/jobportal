<?php
include '../config.php';
$admin = new Admin();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Job Portal</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->

</head>

<body>
  <div class="container-scroller">


    <!-- partial:partials/_navbar.html -->
    <?php include 'navbar.php' ?>
    <!-- partial -->


    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->

      <!-- partial -->


      <!-- partial:partials/_sidebar.html -->
      <?php include 'sidebar.php' ?>
      <!-- partial -->


      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-sm-12">
              <div class="home-tab">

                <div class="tab-content tab-content-basic">
                  <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="card">
                          <div class="card-body">
                            <?php
                            $stmt = $admin->ret("SELECT * FROM `provider`");
                            $row = $stmt->rowCount();
                            ?>
                            <h5 class="card-title">Total Providers</h5>
                            <p class="card-text">Number of Providers:
                              <?php echo $row ?>
                            </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="card">
                          <div class="card-body">
                            <?php
                            $stmt = $admin->ret("SELECT * FROM `seeker`");
                            $row = $stmt->rowCount();
                            ?>
                            <h5 class="card-title">Total Seekers</h5>
                            <p class="card-text">Number of Seekers:
                              <?php echo $row ?>
                            </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="card">
                          <div class="card-body">
                            <?php
                            $stmt = $admin->ret("SELECT * FROM `jobs`");
                            $row = $stmt->rowCount();
                            ?>
                            <h5 class="card-title">Total Jobs Posted</h5>
                            <p class="card-text">Number of Jobs posted:
                              <?php echo $row ?>
                            </p>
                          </div>
                        </div>
                      </div>

                    </div>

                    <div class="row my-5">
                      <div class="col-sm-4">
                        <div class="card">
                          <div class="card-body">
                            <?php
                            $stmt = $admin->ret("SELECT * FROM `Refer`");
                            $row = $stmt->rowCount();
                            ?>
                            <h5 class="card-title">Total Referrals</h5>
                            <p class="card-text">Number of Referrals:
                              <?php echo $row ?>
                            </p>
                          </div>
                        </div>
                      </div>

                      <div class="col-sm-4">
                        <div class="card">
                          <div class="card-body">
                            <?php
                            $stmt = $admin->ret("SELECT * FROM `category`");
                            $row = $stmt->rowCount();
                            ?>
                            <h5 class="card-title">Total Category</h5>
                            <p class="card-text">Number of Category:
                              <?php echo $row ?>
                            </p>
                          </div>
                        </div>
                      </div>


                      <div class="col-sm-4">
                        <div class="card">
                          <div class="card-body">
                            <?php
                            $stmt = $admin->ret("SELECT * FROM `application`");
                            $row = $stmt->rowCount();
                            ?>
                            <h5 class="card-title">Total Application</h5>
                            <p class="card-text">Number of Application:
                              <?php echo $row ?>
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row my-5">
                      <div class="col-sm-4">
                        <div class="card">
                          <div class="card-body">
                            <?php
                            $stmt = $admin->ret("SELECT * FROM `payment`");
                            $row = $stmt->rowCount();
                            ?>
                            <h5 class="card-title">Total Payments</h5>
                            <p class="card-text">Number of Payments:
                              <?php echo $row ?>
                            </p>
                          </div>
                        </div>
                      </div>


                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>


  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <script src="js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->
</body>

</html>