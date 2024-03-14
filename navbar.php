<header class="site-navbar mt-3 ">
  <div class="container-fluid">
    <div class="row align-items-center">
      <div class="site-logo col-6"><a href="index.php">Job Portal</a></div>

      <nav class="mx-auto site-navigation">
        <ul class="site-menu js-clone-nav d-none d-xl-block ml-0 pl-0">
          <li><a href="index.php" class="nav-link ">Home</a></li>
          <li><a href="job-listings.php">Jobs</a></li>
          <li><a href="companies.php">Companies</a></li>
          <li><a href="cg.php">Career Guidance</a></li>
          <li class="has-children">
            <a href="#">For Employers</a>
            <ul class="dropdown" style="border-radius:10px">
              <li><a href="employer_login.php">Employer Login</a></li>
              <li><a href="employer_register.php">Employer Register</a></li>
            </ul>
          </li>
        </ul>
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
      </nav>

      <div class="right-cta-menu text-right d-flex aligin-items-center col-6">
        <div class="ml-auto">
          <a href="login.php" class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span
              class="mr-2 icon-lock_outline"></span>Log In</a>
        </div>
        <a href="#" class="site-menu-toggle js-menu-toggle d-inline-block d-xl-none mt-lg-2 ml-3"><span
            class="icon-menu h3 m-0 p-0 mt-2"></span></a>
      </div>

    </div>
  </div>
</header>