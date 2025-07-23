<?php
include('inc.connection.php');

$sql = "SELECT children.*, users.name AS parent_name 
        FROM children 
        LEFT JOIN users ON children.parent_id = users.id
        ORDER BY children.created_at DESC";


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
        <div class="app-topstrip bg-dark py-6 px-3 w-100 d-lg-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center justify-content-center gap-5 mb-2 mb-lg-0">
                <a class="d-flex justify-content-center" href="#">
                    <img src="assets/images/logos/logo-wrappixel.svg" alt="" width="150">
                </a>


            </div>

            <div class="d-lg-flex align-items-center gap-2">
                <h3 class="text-white mb-2 mb-lg-0 fs-5 text-center">Check Flexy Premium Version</h3>
                <div class="d-flex align-items-center justify-content-center gap-2">

                    <div class="dropdown d-flex">
                        <a class="btn btn-primary d-flex align-items-center gap-1 " href="javascript:void(0)" id="drop4"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="ti ti-shopping-cart fs-5"></i>
                            Buy Now
                            <i class="ti ti-chevron-down fs-5"></i>
                        </a>
                    </div>
                </div>
            </div>

        </div>
        <!-- Sidebar Start -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div>
              
                <!-- Sidebar navigation-->
                 <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
              <span class="hide-menu">Home</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="index.php" aria-expanded="false">
                <i class="ti ti-atom"></i>
                <span class="hide-menu">USER</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="parent-requests.php" aria-expanded="false">
                <i class="ti ti-atom"></i>
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
                                            <h4 class="card-title">CHILDREN</h4>
                                            <!-- <p class="card-subtitle">
                        Ample Admin Vs Pixel Admin
                      </p> -->
                                        </div>

                                    </div>
                                    <div class="table-responsive mt-4">
                                        <table class="table mb-0 text-nowrap varient-table align-middle fs-3">
                                            <thead>
                                                <tr>
                                                    <th class="px-3 text-muted">ID</th>
                                                    <th class="px-3 text-muted">Name</th>
                                                    <th class="px-3 text-muted">Parent</th>
                                                    <th class="px-3 text-muted">Date of Birth</th>
                                                    <th class="px-3 text-muted">Gender</th>
                                                    <th class="px-3 text-muted">Blood Group</th>
                                                    <th class="px-3 text-muted">Created At</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                                    <tr>
                                                        <td class="px-3"><?php echo $row['id']; ?></td>
                                                        <td class="px-3"><?php echo $row['name']; ?></td>
                                                        <td class="px-3"><?php echo $row['parent_id'] . " - " . $row['parent_name']; ?></td>
                                                        <td class="px-3"><?php echo $row['date_of_birth']; ?></td>
                                                        <td class="px-3"><?php echo ucfirst($row['gender']); ?></td>
                                                        <td class="px-3"><?php echo $row['blood_group']; ?></td>
                                                        <td class="px-3"><?php echo $row['created_at']; ?></td>
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