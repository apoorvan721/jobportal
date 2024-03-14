<?php
$sid = $_SESSION['sid'];
$stmt = $admin->ret("SELECT * FROM `seeker` where `seeker_id`='$sid'");
$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<header class="site-navbar">
    <div class="container-fluid">
        <div class="row">
            <div class="col-3">
                <div class="site-logo"><a href="index.php">Job Portal</a></div>
            </div>
            <div class="col-8">
                <nav class="site-navigation w-100 mx-auto">
                    <ul class="site-menu js-clone-nav d-none d-xl-block ml-0 pl-0 ">
                        <li><a href="index.php" class="nav-link">Home</a></li>
                        <li><a href="job-listings.php">Jobs</a></li>
                        <li><a href="companies.php">Companies</a></li>
                        <li><a href="myapplication.php">My Application</a></li>
                        <li><a href="cg.php">Career Guidance</a></li>
                        <?php $stmt1 = $admin->ret("SELECT * FROM `application` INNER JOIN `jobs` ON application.job_id=jobs.job_id INNER JOIN `provider` ON provider.provider_id=jobs.provider_id WHERE  application.seeker_id='$sid' ORDER BY `application_regdate` DESC ");
                        $count1 = $stmt1->rowCount();
                        $row1 = $stmt1->fetch(PDO::FETCH_ASSOC);
                        if ($count1 > 0) {
                            ?>
                            <li><a href="refer.php?pid=<?php echo $row1['provider_id']; ?>">Refer a Friend</a></li>
                        <?php } else { ?>

                            <li></li>
                        <?php } ?>

                    </ul>



                </nav>
            </div>
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


            <div class="col-1">
                <div class="right-cta-menu text-right d-flex">
                    <div class="ml-auto">
                        <!-- User Profile Section with Dropdown -->
                        <div class="user-profile dropdown">

                            <button class="btn btn-link dropdown-toggle" type="button" id="userDropdown"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="controller/<?php echo $row['seeker_img']; ?>" alt="User Avatar"
                                    class="avatar">
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
                                    <?php echo $row['seeker_name']; ?>
                                </span>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="seeker_edit.php">Edit Profile</a>
                                <?php $stmt2 = $admin->ret("SELECT * FROM `application` INNER JOIN `jobs` ON application.job_id=jobs.job_id INNER JOIN `provider` ON provider.provider_id=jobs.provider_id WHERE `application_status`='Selected' AND application.seeker_id='$sid' ORDER BY `application_regdate` DESC");
                                $count2 = $stmt2->rowCount();
                                $row2 = $stmt2->fetch(PDO::FETCH_ASSOC);
                                if ($count2 > 0) { ?>
                                    <a class="dropdown-item" href="">Company :
                                        <?php echo $row2['provider_name']; ?>
                                    </a>
                                <?php } else { ?>
                                <?php } ?>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="controller/seeker_logout.php">Logout</a>
                            </div>
                        </div>
                    </div>
                    <a href="#" class="site-menu-toggle js-menu-toggle d-inline-block d-xl-none mt-lg-2 ml-3">
                        <span class="icon-menu h3 m-0 p-0 mt-2"></span>
                    </a>
                </div>
            </div>

            <a href="#" class="site-menu-toggle js-menu-toggle d-inline-block d-xl-none mt-lg-2 ml-3">
                <span class="icon-menu h3 m-0 p-0 mt-2"></span>
            </a>

        </div>

    </div>

</header>