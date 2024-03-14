<?php
include 'config.php';
$admin = new Admin();
if (!isset($_SESSION['pid'])) {
    $admin->redirect('employer_login');
}
$pid = $_SESSION['pid'];
$jid = $_GET['jid'];
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
                            <?php $stmt = $admin->ret("SELECT * FROM `jobs` INNER JOIN `category` ON category.category_id=jobs.jcategory_id where jobs.job_id='$jid'");
                            $row=$stmt->fetch(PDO::FETCH_ASSOC); ?>

                            <div class="form-group">
                                <label for="job-title">Job Title</label>
                                <input type="text" class="form-control" id="job-title" name="jname" value="<?php echo $row['job_role'];?>" required>
                            </div>

                            <div class="form-group">
                                <label for="job-region">Job Location</label>
                                <select class="form-control" id="job-region" title="Select Region" name="jlocation"
                                    required>
                                    <option value="<?php echo $row['job_location'];?>" ><?php echo $row['job_location'];?></option>
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
                                    <option value="<?php echo $row['job_type'];?>">
                                    <?php echo $row['job_type'];?></option>
                                    <option value="Part Time">Part Time</option>
                                    <option value="Full Time">Full Time</option>
                                    <option value="Internship">Internship</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="job-type">Job Category</label>
                                <select class="form-control" id="job-type" title="Select Job Type" name="jcategory" required>
                                    <option value="<?php echo $row['jcategory_id'];?>"><?php echo $row['category_name'];?></option>
                                    <?php $stmt1 = $admin->ret("SELECT * FROM `category`");
                                    while ($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)) {
                                        ?>       
                                        <option value="<?php echo $row1['category_id']; ?>">
                                            <?php echo $row1['category_name']; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="job-salary">Job Salary</label>
                                <input type="number" class="form-control" id="job-salary" placeholder="25,000"
                                    name="jsalary" value=<?php echo $row['job_salary'];?> required>
                            </div>
                            <div class="form-group">
                                <label for="job-exp">Job Experience</label>
                                <input type="text" class="form-control" id="job-exp" placeholder="Fresher" name="jexp" value="<?php echo $row['job_exp'];?> "
                                    required>
                            </div>

                            <div class="form-group">
                                <label for="company-website">Website </label>
                                <input type="text" class="form-control" id="company-website" name="jwebsite"
                                    placeholder="https://" value="<?php echo $row['job_site'];?>" required>
                            </div>

                            <div class="form-group">
                                <label for="jlast_date">Last date to apply</label>
                                <input type="date" class="form-control" id="last_date" name="jlast_date"
                                    placeholder="25-5-2023" value="<?php echo $row['last_date'];?>" required>
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
                                <textarea class="form-control" id="desc" name="jdesc" required value="<?php echo $row['job_desc'];?>"><?php echo $row['job_desc'];?></textarea>
                            </div>
                            <input type="hidden" value="<?php echo $jid;?>" name="job_id">
                            <button class="btn btn-block btn-primary btn-md" name="ujob">Update Job</button>
                    </div>

                </div>
                </form>
            </div>


    </div>
    </div>
    </section>



    <footer class="site-footer">

        <a href="#top" class="smoothscroll scroll-top">
            <span class="icon-keyboard_arrow_up"></span>
        </a>

        <div class="container">
            <div class="row mb-5">
                <div class="col-6 col-md-3 mb-4 mb-md-0">
                    <h3>Search Trending</h3>
                    <ul class="list-unstyled">
                        <li><a href="#">Web Design</a></li>
                        <li><a href="#">Graphic Design</a></li>
                        <li><a href="#">Web Developers</a></li>
                        <li><a href="#">Python</a></li>
                        <li><a href="#">HTML5</a></li>
                        <li><a href="#">CSS3</a></li>
                    </ul>
                </div>
                <div class="col-6 col-md-3 mb-4 mb-md-0">
                    <h3>Company</h3>
                    <ul class="list-unstyled">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Career</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Resources</a></li>
                    </ul>
                </div>
                <div class="col-6 col-md-3 mb-4 mb-md-0">
                    <h3>Support</h3>
                    <ul class="list-unstyled">
                        <li><a href="#">Support</a></li>
                        <li><a href="#">Privacy</a></li>
                        <li><a href="#">Terms of Service</a></li>
                    </ul>
                </div>
                <div class="col-6 col-md-3 mb-4 mb-md-0">
                    <h3>Contact Us</h3>
                    <div class="footer-social">
                        <a href="#"><span class="icon-facebook"></span></a>
                        <a href="#"><span class="icon-twitter"></span></a>
                        <a href="#"><span class="icon-instagram"></span></a>
                        <a href="#"><span class="icon-linkedin"></span></a>
                    </div>
                </div>
            </div>

            <div class="row text-center">
                <div class="col-12">
                    <p class="copyright"><small>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;
                            <script>document.write(new Date().getFullYear());</script> All rights reserved | This
                            template is made
                            with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a
                                href="https://colorlib.com" target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </small></p>
                </div>
            </div>
        </div>
    </footer>

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