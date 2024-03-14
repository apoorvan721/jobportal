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
      <div class="theme-setting-wrapper">
      </div>
      <!-- partial -->

      <?php include 'sidebar.php' ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-10">
                    <h3 class="mb-3 font-weight-bold">Job Seekers</h3>
                    </div>

                    <div class="table-responsive">
                      <table class="table table-striped table-borderless">
                        <thead>
                          <tr>
                            <th>Sl no</th>
                            <th>Seeker Name</th>
                            <th>Seeker Email</th>
                            <th>Seeker Contact</th>
                            <th>Seeker Gender</th>
                            <th>Seeker City</th>
                            <th>Manage</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $stmt = $admin->ret("SELECT * FROM `seeker`");
                          $i = 1;
                          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                            <tr>
                              <td>
                                <?php
                                $count = $stmt->rowCount();
                                while ($i <= $count) {
                                  echo $i;
                                  $i++;
                                  break;
                                }
                                ?>
                              </td>
                              <!-- <td class="py-1">
                                <img src="../controller/<?php echo $row['provider_img'] ?>" alt="image" />
                              </td> -->
                              <td>
                                <?php echo $row['seeker_name']; ?>
                              </td>
                              <td>
                                <?php echo $row['seeker_email']; ?>
                              </td>
                              <td>
                                <?php echo $row['seeker_phone']; ?>
                              </td>
                              <td>
                                <?php echo $row['seeker_gender']; ?>
                              </td>
                              <td>
                                <?php echo $row['seeker_city']; ?>
                              </td>
                              



                              <td><a href="controller/category.php?ed_id=<?php echo $row[('seeker_id')] ?>"
                                  class="btn btn-primary" name="cdelete">Delete</i></a>
                              </td>
                            <?php } ?>

                        </tbody>
                      </table>
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

    <!-- partial:partials/_footer.html -->
    <?php include 'footer.php' ?>
    <!-- partial -->

    <!-- container-scroller ends -->
  </div>







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