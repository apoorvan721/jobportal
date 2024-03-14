<?php
include '../config.php';
$admin = new Admin();

if (isset($_GET['type']) && isset($_GET['category'])&&isset($_GET['role'])) {
    $type = $_GET['type'];
    $category = $_GET['category'];
    $role = $_GET['role'];
    $stmt_filter = $admin->ret("SELECT * FROM `jobs` INNER JOIN `provider` ON jobs.provider_id=provider.provider_id WHERE `job_type`='$type' AND `jcategory_id`='$category' AND `job_role`='$role'");  

}

?>
 <div class="container" >


<?php
$stmt = $admin->ret("SELECT * FROM `jobs` INNER JOIN `provider` ON jobs.provider_id=provider.provider_id ");
$count = $stmt_filter->rowCount(); ?>
<div class="row mb-5 justify-content-center">
  <div class="col-md-7 text-center">
    <h2 class="section-title mb-2">
      <?php echo $count ?> Job Listed
    </h2>
  </div>
</div>
<?php while ($row = $stmt_filter->fetch(PDO::FETCH_ASSOC)) { ?>
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



