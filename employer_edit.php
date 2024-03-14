<?php
include 'config.php';
$admin = new Admin();
$pid = $_SESSION['pid'];
if (!isset($_SESSION['pid'])) {
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


        <?php if (isset($_SESSION['pid'])) {
            include 'employer_navbar.php';
        } else {
            include 'navbar.php';
        }
        ?>

        <!-- HOME -->
        <section class="section-hero overlay inner-page bg-image" style="background-image: url('images/333.png');"
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

                headquaterInput.addEventListener('input', function (event) {
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
                        <h2 class="mb-4 text-center">Edit Company Profile</h2>
                        <form action="controller/employer_register.php" method="post" class="p-4 border rounded"
                            enctype="multipart/form-data">
                            <?php $stmt = $admin->ret("SELECT * FROM `provider` WHERE `provider_id`='$pid'");
                            $row = $stmt->fetch(PDO::FETCH_ASSOC)?>
                                <div class="row form-group">
                                    <div class="col-md-12 mb-3 mb-md-0">
                                        <label class="text-black" for="name">Company Name</label>
                                        <input type="text" class="form-control" value="<?php echo $row['provider_name'] ?>"
                                            id="name" name="name" required>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-12 mb-3 mb-md-0">
                                        <label class="text-black" for="email">Company Email</label>
                                        <input type="email" class="form-control" value="<?php echo $row['provider_email'] ?>"
                                            id="email" name="email" required>
                                    </div>
                                </div>
                                <div class="row form-group mb-4">
                                    <div class="col-md-12 mb-3 mb-md-0">
                                        <label class="text-black" for="phone">Contact details</label>
                                        <input type="phone" class="form-control"
                                            value="<?php echo $row['provider_contact'] ?>" id="phone" name="phone" required>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-12 mb-3 mb-md-0">
                                        <label class="text-black" for="name">Company Registered No</label>
                                        <input type="text" class="form-control" value="<?php echo $row['provider_regno'] ?>"
                                            id="registered_no" name="registered_no" required>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-12 mb-3 mb-md-0">
                                        <label class="text-black" for="name">Company Headquater</label>
                                        <input type="text" class="form-control"
                                            value="<?php echo $row['provider_headquater'] ?>" id="headquater"
                                            name="headquater" required>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-12 mb-3 mb-md-0">
                                        <label class="text-black" for="name">Founded year</label>
                                        <input type="date" class="form-control"
                                            value="<?php echo $row['provider_founded'] ?>" id="year" name="year" required>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <label class="text-black" for="experience">Company Size</label>
                                        <select id="experience" class="form-control" value="" name="size" required>
                                            <option value="<?php echo $row['provider_size'] ?>" disabled selected>
                                                <?php echo $row['provider_size'] ?>
                                            </option>
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
                                        <label class="btn btn-primary btn-md btn-file">Browse File<input type="file"
                                                id="img" name="img" hidden>
                                            <input type="hidden" id="img_text" name="img_text"
                                                value="<?php echo $row['provider_img']; ?>">
                                        </label>
                                    </div>
                                </div>
                        

                            <div class="row form-group">
                                <div class="col-md-12">
                                    <button name="e_edit" type="submit"
                                        class="btn px-4 btn-primary text-white">Update</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </section>

        <?php include 'employer_footer.php' ?>

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