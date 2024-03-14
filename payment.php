<?php
include 'config.php';
$admin = new Admin();
$sid=$_SESSION['sid'];
if(!isset($_SESSION['sid'])){
  $admin->redirect('login');
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
<!-- <script src="https://checkout.razorpay.com/v1/checkout.js"></script> -->
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
    <?php if(isset($_SESSION['sid'])){
        include 'seeker_navbar.php' ;
    }
    else{
        include 'navbar.php';
    }
    ?>

    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('images/hero_1.jpg');"
      id="home-section">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <h1 class="text-white font-weight-bold">Payment Page</h1>
            <div class="custom-breadcrumbs">
              <a href="#">Home</a> <span class="mx-2 slash">/</span>
              <span class="text-white"><strong>Payment</strong></span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <script>
      document.addEventListener('DOMContentLoaded', function () {
        var textInput = document.getElementById('name');
        var phoneInput = document.getElementById('phone');
        var emailInput = document.getElementById('email');
        var cityInput = document.getElementById('city');

        textInput.addEventListener('input', function (event) {
          var inputValue = event.target.value;

          // Use a regular expression to check if the input contains only alphabetic characters, special characters, and space
          if (!/^[a-zA-Z\s!"#$%&'()*+,-./:;<=>?@[\\\]^_`{|}~]+$/.test(inputValue)) {
            // If not, remove non-alphabetic characters, special characters, and space
            event.target.value = inputValue.replace(/[^a-zA-Z\s!"#$%&'()*+,-./:;<=>?@[\\\]^_`{|}~]/g, '');
          }
        });

        emailInput.addEventListener('input', function (event) {
          var inputValue = event.target.value;
          if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(inputValue)) {
            event.target.setCustomValidity(''); // Reset custom validity
            event.target.setCustomValidity('Please enter a valid email address.');
          } else {
            event.target.setCustomValidity('');
          }
        });

        phoneInput.addEventListener('input', function (event) {
          var inputValue = event.target.value;
          // Use a regular expression to check if the input is a valid phone number
          if (!/^\d{0,10}$/.test(inputValue)) {
            phoneWarning.textContent = 'Phone number should be 10 digits';
            event.target.value = inputValue.replace(/[^\d]/g, '').slice(0, 10);
          }
          else {
            phoneWarning.textContent = '';
            // If not, remove invalid characters
          }
        });

        cityInput.addEventListener('input', function (event) {
          var inputValue = event.target.value;

          // Use a regular expression to check if the input contains only alphabetic characters, special characters, and space
          if (!/^[a-zA-Z\s!"#$%&'()*+,-./:;<=>?@[\\\]^_`{|}~]+$/.test(inputValue)) {
            // If not, remove non-alphabetic characters, special characters, and space
            event.target.value = inputValue.replace(/[^a-zA-Z\s!"#$%&'()*+,-./:;<=>?@[\\\]^_`{|}~]/g, '');
          }
        });

       

      });
    </script>

    <section class="site-section">
      <div class="container mx-10">
        <div class="row">
          <div class="col-lg-12 mb-5">
            <h2 class="mb-4 text-center">Make Payment</h2>
            <form action="controller/payment.php" method="POST" class="p-4 border rounded">
            <?php $stmt=$admin->ret("SELECT * FROM `seeker` WHERE `seeker_id`='$sid'");
             $row=$stmt->fetch(PDO::FETCH_ASSOC);?>
              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="name">Name</label>
                  <input type="text" class="form-control" value="<?php echo $row['seeker_name']; ?>" id="name" name="name" required >
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="email">Email</label>
                  <input type="email" class="form-control" value="<?php echo $row['seeker_email']; ?>" id="email" name="email" required>
                </div>
              </div>
              <div class="row form-group mb-4">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="phone">Phone</label>
                  <input type="phone" class="form-control" value="<?php echo $row['seeker_phone']; ?>" id="phone" name="phone" required>
                </div>
              </div>
              <div class="row form-group mb-4">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="city">City</label>
                  <input type="text" class="form-control" value="<?php echo $row['seeker_city']; ?>" id="city" name="city">
                </div>
              </div>
              <div class="row form-group mb-4">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="price">Price</label>
                  <input type="text" class="form-control" value="<?php echo $_GET['price'];?>" id="price" name="price">
                </div>
              </div>


              <div class="row form-group">
                <div class="col-md-12">
                  <button name="spayment" type="submit" value="Sign Up" class="btn px-4 btn-primary text-white">Make Payment</button>
                </div>
              </div>
             

            </form>
          </div>
        </div>
      </div>
    </section>

    <?php include 'footer.php' ?>

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