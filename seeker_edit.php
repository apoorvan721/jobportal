<?php
include 'config.php';
$admin = new Admin();
$sid = $_SESSION['sid'];
if (!isset($_SESSION['sid'])) {
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


        <!-- NAVBAR -->

        <!-- NAVBAR -->
        <?php if (isset($_SESSION['sid'])) {
            include 'seeker_navbar.php';
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
                        <h1 class="text-white font-weight-bold">Edit Profile</h1>
                        <div class="custom-breadcrumbs">
                            <a href="#">Home</a> <span class="mx-2 slash">/</span>
                            <span class="text-white"><strong>Edit Profile</strong></span>
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
                            <h2 class="mb-4 text-center">Edit Profile</h2>

                            <form action="controller/seeker_register.php" method="post" class="p-4 border rounded"
                                enctype="multipart/form-data">
                                <?php
                                $stmt = $admin->ret("SELECT * FROM `seeker` where `seeker_id`=$sid;");
                                $row = $stmt->fetch(PDO::FETCH_ASSOC); ?>
                                <div class="row form-group">
                                    <div class="col-md-12 mb-3 mb-md-0">
                                        <label class="text-black" for="name">Name</label>
                                        <input type="text" class="form-control" placeholder="Full Name" id="name"
                                            name="name" value="<?php echo $row['seeker_name']; ?>" required>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-12 mb-3 mb-md-0">
                                        <label class="text-black" for="email">Email</label>
                                        <input type="email" class="form-control" placeholder="Email address" id="email"
                                            name="email" value="<?php echo $row['seeker_email']; ?>" required>
                                    </div>
                                </div>
                                <div class="row form-group mb-4">
                                    <div class="col-md-12 mb-3 mb-md-0">
                                        <label class="text-black" for="phone">Phone</label>
                                        <input type="phone" class="form-control" placeholder="Phone" id="phone"
                                            name="phone" value="<?php echo $row['seeker_phone']; ?>" required>
                                    </div>
                                </div>
                                <div class="row form-group mb-4">
                                    <div class="col-md-12 mb-3 mb-md-0">
                                        <label class="text-black" for="gender">Gender</label></br>
                                        <div class="form-check form-check-inline">
                                            <?php $male = "";
                                            $female = "";

                                            if ($row['seeker_gender'] == "male") {
                                                $male = "checked";
                                            } else {
                                                $female = "checked";
                                            }
                                            ?>
                                            <input class="form-check-input" type="radio" id="gender" name="gender"
                                                value="male" <?php echo $male ?> required>
                                            <label class="form-check-label" for="gender">
                                                Male
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="gender" name="gender"
                                                value="female" <?php echo $female ?>>
                                            <label class="form-check-label" for="gender">
                                                Female
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group mb-4">
                                    <div class="col-md-12">
                                        <label class="text-black" for="qualification">Highest Qualification</label>
                                        <select id="qualification" class="form-control" value="0" name="qualification"
                                            required>
                                            <option value="<?php echo $row['seeker_degree']; ?>">
                                                <?php echo $row['seeker_degree']; ?>


                                            </option>
                                            <option value="BCA">BCA</option>
                                            <option value="MCA">MCA</option>
                                            <option value="B.TECH">B.TECH</option>
                                            <option value="M.TECH">M.TECH</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group mb-4">
                                    <div class="col-md-12 mb-3 mb-md-0">
                                        <label class="text-black" for="skills">Skills</label>
                                        <input type="text" id="skills" class="form-control" placeholder="skills"
                                            name="skills" value="<?php echo $row['seeker_skills']; ?>" required>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <label class="text-black" for="experience">Experience</label>
                                        <select id="experience" class="form-control" value="0" name="experience"
                                            required>
                                            <option value="<?php echo $row['seeker_exp'] ?>">
                                                <?php echo $row['seeker_exp'] ?>

                                            </option>
                                            <option value="Fresher">Fresher</option>
                                            <option value="<2">&lt;2</option>
                                            <option value="2-4">2-4</option>
                                            <option value="4-6">4-6</option>
                                            <option value=">6">&gt;6</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group mb-4">
                                    <div class="col-md-12 mb-3 mb-md-0">
                                        <label class="text-black" for="city">City</label>
                                        <input type="text" id="city" class="form-control" placeholder="City" id="city"
                                            name="city" value="<?php echo $row['seeker_city']; ?>">
                                    </div>
                                </div>


                                <div class="row form-group mb-4">
                                    <div class="col-md-6 mb-3 mb-md-0">
                                        <label for="resume">Upload Updated Resume</label>
                                        <label class="btn btn-primary btn-md btn-file">Browse File<input type="file"
                                                id="resume" name="resume" accept=".pdf" hidden>
                                            <input type="hidden" id="resume_text"
                                                value="<?php echo $row['seeker_resume']; ?>" name="resume_text">
                                        </label>
                                    </div>
                                    <div class="col-md-6 mb-3 mb-md-0">
                                        <label for="resume">Upload Profile Photo</label>
                                        <label class="btn btn-primary btn-md btn-file">Browse File<input type="file"
                                                id="profile" name="profile">
                                            <input type="hidden" id="img_text" value="<?php echo $row['seeker_img']; ?>"
                                                name="img_text">
                                        </label>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <button name="sedit" type="submit"
                                            class="btn px-4 btn-primary text-white">Update</button>
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