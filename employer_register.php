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
    <?php include 'navbar.php' ?>

    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('images/hero_1.jpg');"
      id="home-section">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <h1 class="text-white font-weight-bold">Sign Up</h1>
            <div class="custom-breadcrumbs">
              <a href="#">Home</a> <span class="mx-2 slash">/</span>
              <span class="text-white"><strong>Sign In</strong></span>
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
        var headquaterInput = document.getElementById('headquater');

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

        // phoneInput.addEventListener('input', function (event) {
        //   var inputValue = event.target.value;
        //   // Use a regular expression to check if the input is a valid phone number
        //   if (!/^\d{0,10}$/.test(inputValue)) {
        //     phoneWarning.textContent = 'Phone number should be 10 digits';
        //     event.target.value = inputValue.replace(/[^\d]/g, '').slice(0, 10);
        //   }
        //   else {
        //     phoneWarning.textContent = '';
        //     // If not, remove invalid characters
        //   }
        // });

        headquaterInput.addEventListener('input', function (event) {
          var inputValue = event.target.value;

          // Use a regular expression to check if the input contains only alphabetic characters, special characters, and space
          if (!/^[a-zA-Z\s!"#$%&'()*+,-./:;<=>?@[\\\]^_`{|}~]+$/.test(inputValue)) {
            // If not, remove non-alphabetic characters, special characters, and space
            event.target.value = inputValue.replace(/[^a-zA-Z\s!"#$%&'()*+,-./:;<=>?@[\\\]^_`{|}~]/g, '');
          }
        });

        passInput.addEventListener('input', function (event) {
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
            <h2 class="mb-4 text-center">Sign Up To Job Portal</h2>
            <form action="controller/employer_register.php" method="post" class="p-4 border rounded"
              enctype="multipart/form-data">

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="name">Company Name</label>
                  <input type="text" class="form-control" placeholder="Full Name" id="name" name="name" required>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="email">Company Email</label>
                  <input type="email" class="form-control" placeholder="Email address" id="email" name="email" required>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="password">Password</label>
                  <input type="password" class="form-control" placeholder="Password" id="password" name="password"
                    required>
                </div>
              </div>
              <div class="row form-group mb-4">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="phone">Contact Details</label>
                  <input type="tel" class="form-control" pattern="^[0-9]{10}$" maxlength="10" placeholder="Phone"
                    id="phone" name="phone" title="Please enter a 10-digit mobile number" inputmode="tel" required>
                </div>
              </div>
              <script>
                document.getElementById('phone').addEventListener('input', function (event) {
                  // Remove non-numeric characters
                  event.target.value = event.target.value.replace(/\D/g, '');
                });
              </script>
              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="name">Company Registered No</label>
                  <input type="text" class="form-control" placeholder="Registered No" id="registered_no"
                    name="registered_no" required>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="name">Company Headquater</label>
                  <input type="text" class="form-control" placeholder="Headquater" id="headquater" name="headquater"
                    required>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="name">Found year</label>
                  <input type="date" class="form-control" placeholder="Year" id="year" name="year" min="1800-01-01"
                    max=CURDATE() required>
                  <script>
                    // Set the max attribute to the current date
                    document.getElementById('year').max = new Date().toISOString().split('T')[0];
                  </script>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="experience">Company Size</label>
                  <select id="experience" class="form-control" value="0" name="size" required>
                    <option disabled selected>Experience</option>
                    <option value="<50">&lt 50</option>
                    <option value="50-200">50-200</option>
                    <option value="200-500">200-500</option>
                    <option value="500-1000">500-1000</option>
                    <option value=">1000">&gt1000</option>
                  </select>
                </div>
              </div>

              <div class="row form-group mb-4">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label for="img">Company Image</label>
                  <label class="btn btn-primary btn-md btn-file">Browse File<input type="file" id="img" name="img"
                      hidden required>
                  </label>
                </div>
              </div>


              <div class="row form-group">
                <div class="col-md-12">
                  <button name="eregister" type="submit" value="Sign Up" class="btn px-4 btn-primary text-white">Sign
                    Up</button>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12">
                  <p class="text-muted mb-0">Already have an account? <a href="employer_login.php">Sign In</a></p>
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