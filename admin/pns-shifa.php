<?php
include('inc.connection.php');

$sql = "SELECT hospitals.*, users.name AS creator_name 
        FROM hospitals 
        LEFT JOIN users ON hospitals.created_by = users.id";

$result = mysqli_query($conn, $sql);
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>agha-khan</title>
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
              <a class="sidebar-link" href="pns-shifa.php" aria-expanded="false">
                <i class="ti ti-atom"></i>
                <span class="hide-menu">Vaccine-Reservation</span>
              </a>
            </li>
             <li class="sidebar-item">
              <a class="sidebar-link" href="pns-schedule.php" aria-expanded="false">
                <i class="ti ti-atom"></i>
                <span class="hide-menu">Schedule</span>
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
                                            <h4 class="card-title">VACCINE RESERVATION</h4>
                                            <!-- <p class="card-subtitle">
                        Ample Admin Vs Pixel Admin
                      </p> -->
                                        </div>

                                    </div>
                                    <div class="table-responsive mt-4">
                                        <table class="table mb-0 text-nowrap varient-table align-middle fs-3">
                                            <thead>
                                                <tr>
                                                   <th scope="col" class="px-3 text-muted">Id</th>
                                                    <th scope="col" class="px-3 text-muted">Parent-Id</th>
                                                    <th scope="col" class="px-3 text-muted">Child-Id</th>
                                                    <th scope="col" class="px-3 text-muted">Vaccine_Id</th>
                                                    <th scope="col" class="px-3 text-muted">Hospital_Id</th>
                                                    <th scope="col" class="px-3 text-muted">Preferred_Date</th>
                                                    <th scope="col" class="px-3 text-muted">Status</th>
                                                    <th scope="col" class="px-3 text-muted">Requested_At</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                          <tr>
                            <td class="px-3"><?php echo $row['id']; ?></td>
                            <td class="px-3"><?php echo $row['parent_id']; ?></td>
                            <td class="px-3"><?php echo $row['child_id']; ?></td>
                            <td class="px-3"><?php echo $row['vaccine_id']; ?></td>
                            <td class="px-3"><?php echo $row['hospital_id']; ?></td>
                            <td class="px-3"><?php echo $row['preferred_date']; ?></td>
                            <td class="px-3"><?php echo $row['status']; ?></td>
                            <td class="px-3"><?php echo $row['requested_at']; ?></td>
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