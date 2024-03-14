<?php
$pid = $_SESSION['pid'];
$stmt = $admin->ret("SELECT * FROM `provider` where `provider_id`='$pid'");
$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<header class="site-navbar mt-3">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="site-logo col-6"><a href="index.html">Job Portal</a></div>

            <nav class="mx-auto site-navigation">
                <ul class="site-menu js-clone-nav d-none d-xl-block ml-0 pl-0">
                    <li><a href="employer_index.php" class="nav-link">Home</a></li>
                    <li><a href="myjobs.php">My Jobs</a></li>
                    <li><a href="view_application.php">View Applications</a></li>
                    <li class="has-children">
                        <a href="#">Job Seeker</a>
                        <ul class="dropdown" style="border-radius:10px">
                            <li><a href="login.php">Seeker Login</a></li>
                            <li><a href="register.php">Seeker Register</a></li>
                        </ul>
                    </li>
                    <li><a href="view_referrals.php">View Referrals</a></li>
                    
                </ul>

            </nav>

            <style>
          .site-menu a {
            display: inline-block;
            padding: 8px 8px;
            margin: 0 5px;
            text-decoration: none;
            border-radius: 10px;
            box-shadow: 0 3px 4px rgba(0, 0, 0, 0.5);
            /* Subtle box shadow */
          }

         

          .site-menu a:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            /* Box shadow on hover for emphasis */
          }
        </style>

            <div class="right-cta-menu text-right d-flex align-items-center col-6">
                <!-- <div class="ml-auto">
                        <a href="login.php" class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span
                                class="mr-2 icon-add_outline"></span>Post a Job</a>
                    </div>

                    <a href="#" class="site-menu-toggle js-menu-toggle d-inline-block d-xl-none mt-lg-2 ml-3">
                        <span class="icon-menu h3 m-0 p-0 mt-2"></span>
                    </a> -->

                <div class="ml-auto">
                    <!-- User Profile Section with Dropdown -->
                    <div class="user-profile dropdown">

                        <button class="btn btn-link dropdown-toggle" type="button" id="userDropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="controller/<?php echo $row['provider_img']; ?>" alt="User Avatar" class="avatar">

                            <style>
                                .avatar {
                                    width: 30px;
                                    /* Adjust the width as needed */
                                    height: 30px;
                                    /* Adjust the height as needed */
                                    border-radius: 50%;
                                    /* Makes it round */
                                    margin-right: 8px;
                                    /* Adds some space between the avatar and username */
                                }
                            </style>
                        </button>

                        <div class="dropdown-menu" aria-labelledby="userDropdown">
                            <span class="username text-black mx-4">
                                <?php echo $row['provider_name']; ?>
                            </span>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="employer_edit.php">Edit Profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="controller/seeker_logout.php">Logout</a>
                        </div>
                    </div>
                </div>







            </div>
        </div>
</header>