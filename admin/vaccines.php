<?php
include('inc.connection.php');
$sql = "SELECT * FROM `vaccines`";
$result = mysqli_query($conn, $sql);
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>vaccine-system</title>
  <link rel="shortcut icon" type="image/png" href="./assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="./assets/css/styles.min.css" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">

    <!--  App Topstrip -->
   <div class="app-topstrip py-6 px-3 w-100 d-lg-flex align-items-center justify-content-between"
     style="background-color: #b6e2e4; align-items: center; height: 70px;">
  
     <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="./webindex.php" class="text-nowrap logo-img">
            <img src="assets/images/logos/7e06b2c1-8c53-45c0-bd0c-e7c613a0910d-removebg-preview.png" alt="" />
          </a>
        </div>
 <!-- Sliding Text -->
<div class="flex-grow-1 justify-content-end">
  <div class="text-slide-container" style="width: 100%; max-width: 1200px; overflow: hidden; position: relative;">
    <div class="text-slide-content"
         style="white-space: nowrap; display: inline-block; animation: slideText 20s linear infinite; padding-left: 50px;">
      <span style="font-size: 18px; font-weight: 600; color: #025f66; margin-right: 90px;">
        Welcome to the Admin Panel — Efficiently Manage E-Vaccination Records with Confidence and Control.
      </span>
    </div>
  </div>
</div>
</div>
<style>
@keyframes slideText {
  0% { transform: translateX(70%); }   /* start slightly more to the right */
  100% { transform: translateX(-100%); }
}

.brand-logo img{
  height: 170px;
  margin-bottom: -30px;
  margin-left: -40px;
  margin-top: -30px;
  padding: 10px 10px;
}
</style>
    <!-- Sidebar Start -->
    <aside class="left-sidebar" style="margin-top: 7px;">
      <!-- Sidebar scroll-->
      <div>

        <!-- Sidebar navigation-->
       <nav class="sidebar-nav scroll-sidebar"  data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
              <span class="hide-menu">Home</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="index.php" aria-expanded="false">
                <i class="ti ti-user"></i>
                <span class="hide-menu">USER</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="parent-requests.php" aria-expanded="false">
                <i class="ti ti-comments"></i>
                <span class="hide-menu">Parent Requests</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="booking-request.php" aria-expanded="false">
                <i class="ti ti-atom"></i>
                <span class="hide-menu">Booking-Request</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="hospitals.php" aria-expanded="false">
                <i class="ti ti-atom"></i>
                <span class="hide-menu">Hospitals</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="children-list.php" aria-expanded="false">
                <i class="ti ti-atom"></i>
                <span class="hide-menu">Children</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="vaccines.php" aria-expanded="false">
                <i class="ti ti-atom"></i>
                <span class="hide-menu">Vaccines</span>
              </a>
            </li>
             <li class="sidebar-item">
              <a class="sidebar-link" href="vaccination-schedule.php" aria-expanded="false">
                <i class="ti ti-atom"></i>
                <span class="hide-menu">Vaccination-Schedule</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="vaccination-reports.php" aria-expanded="false">
                <i class="ti ti-atom"></i>
                <span class="hide-menu">Vaccination-Reports</span>
              </a>
            </li>
          </ul>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
     <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler " id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link " href="javascript:void(0)" id="drop1" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="ti ti-bell"></i>
                <div class="notification bg-primary rounded-circle"></div>
              </a>
              <div class="dropdown-menu dropdown-menu-animate-up" aria-labelledby="drop1">
                <div class="message-body">
                  <a href="javascript:void(0)" class="dropdown-item">
                    Item 1
                  </a>
                  <a href="javascript:void(0)" class="dropdown-item">
                    Item 2
                  </a>
                </div>
              </div>
            </li>
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
               
              <li class="nav-item dropdown">
                <a class="nav-link " href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <img src="./assets/images/profile/user-1.jpg" alt="" width="35" height="35" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body">
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-user fs-6"></i>
                      <p class="mb-0 fs-3">My Profile</p>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-mail fs-6"></i>
                      <p class="mb-0 fs-3">My Account</p>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-list-check fs-6"></i>
                      <p class="mb-0 fs-3">My Task</p>
                    </a>
                    <a href="../Login.html" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!--  Header End -->
      <div class="body-wrapper-inner">
        <div class="container-fluid">
          <!--  Row 1 -->
          <div class="row" style="margin-top: -30px;">

            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <div class="d-md-flex align-items-center">
                    <div>
                      <h4 class="card-title">VACCINES</h4>
                      <!-- <p class="card-subtitle">
                        Ample Admin Vs Pixel Admin
                      </p> -->
                    </div>

                  </div>
                  <div class="table-responsive mt-4">
                    <table class="table mb-0 text-nowrap varient-table align-middle fs-3">
                      <thead>

                        <tr>
                        <tr>
                          <th scope="col" class="px-3 text-muted">Id</th>
                          <th scope="col" class="px-3 text-muted">Name</th>
                          <th scope="col" class="px-3 text-muted">Description</th>
                          <th scope="col" class="px-3 text-muted">Is-Available</th>
                      </thead>
                      <tbody>
                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                          <tr>
                            <td class="px-3"><?php echo $row['id']; ?></td>
                            <td class="px-3"><?php echo $row['name']; ?></td>
                            <td class="px-3"><?php echo $row['description']; ?></td>
                            <td class="px-3"><?php echo $row['is_available']; ?></td>
                          </tr>
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
    </div>
  </div>
  <script src="./assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="./assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="./assets/js/sidebarmenu.js"></script>
  <script src="./assets/js/app.min.js"></script>
  <script src="./assets/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="./assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="./assets/js/dashboard.js"></script>
  <!-- solar icons -->
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>

</html>