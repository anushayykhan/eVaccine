<?php
include('inc.connection.php');

$sql = "SELECT booking_requests.*, hospitals.name AS hospital_name 
        FROM booking_requests
        JOIN hospitals ON booking_requests.hospital_id = hospitals.id";

$result = mysqli_query($conn, $sql);
// Approve action
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['approveBtn'])) {
  $booking_id = $_POST['booking_id'];
  $child_id = $_POST['child_id'];
  $vaccine_id = $_POST['vaccine_id'];
  $hospital_id = $_POST['hospital_id'];
  $preferred_date = $_POST['preferred_date'];

  $insert_schedule = "INSERT INTO vaccination_schedule (child_id, vaccine_id, hospital_id, scheduled_date, status)
                      VALUES ('$child_id', '$vaccine_id', '$hospital_id', '$preferred_date', 'Pending')";
  mysqli_query($conn, $insert_schedule);

  $update_booking = "UPDATE booking_requests SET status = 'Approved' WHERE id = '$booking_id'";
  mysqli_query($conn, $update_booking);
}

// Reject action
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['rejectBtn'])) {
  $booking_id = $_POST['booking_id'];
  $delete_booking = "DELETE FROM booking_requests WHERE id = '$booking_id'";
  mysqli_query($conn, $delete_booking);
}

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

    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>

        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="./webindex.php" class="text-nowrap logo-img">
            <img src="assets/images/logos/logo.svg" alt="" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-6"></i>
          </div>
        </div>

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
                    <a href="./authentication-login.html" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <div class="body-wrapper-inner">
        <div class="container-fluid">
          <!--  Row 1 -->
          <div class="row" style="margin-top: -30px;">

            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <div class="d-md-flex align-items-center">
                    <div>
                      <h4 class="card-title">BOOKING_REQUEST</h4>
                      
                    </div>

                  </div>
                  <div class="table-responsive mt-4">
                    <table class="table mb-0 text-nowrap varient-table align-middle fs-3">
                      <thead>

                        <tr>
                        <tr>
                          <th scope="col" class="px-3 text-muted">Id</th>
                          <th scope="col" class="px-3 text-muted">Parent-Id</th>
                          <th scope="col" class="px-3 text-muted">Child-Id</th>
                          <th scope="col" class="px-3 text-muted">Vaccine_Id</th>
                          <th scope="col" class="px-3 text-muted">Hospital_Id</th>
                          <th scope="col" class="px-3 text-muted">Preferred_Date</th>
                          <th scope="col" class="px-3 text-muted">Requested_At</th>
                          <th scope="col" class="px-3 text-muted">Status</th>
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
                            <td class="px-3"><?php echo $row['requested_at']; ?></td>
                            <td class="px-3">
                              <?php
                              $today = date('Y-m-d');
                              $is_missed = ($row['status'] === 'Pending' && $row['preferred_date'] < $today);

                              if ($row['status'] === 'Approved') {
                                echo "<span class='badge bg-success'>Approved</span>";
                              } elseif ($is_missed) {
                                echo "<span class='badge bg-danger'>Missed</span>";
                              } else { ?>
                                <form method="post" style="display: flex; gap: 5px;">
                                  <input type="hidden" name="booking_id" value="<?php echo $row['id']; ?>">
                                  <input type="hidden" name="child_id" value="<?php echo $row['child_id']; ?>">
                                  <input type="hidden" name="vaccine_id" value="<?php echo $row['vaccine_id']; ?>">
                                  <input type="hidden" name="hospital_id" value="<?php echo $row['hospital_id']; ?>">
                                  <input type="hidden" name="preferred_date" value="<?php echo $row['preferred_date']; ?>">
                                  <button type="submit" name="approveBtn" class="btn btn-sm btn-success">Approve</button>
                                  <button type="submit" name="rejectBtn" class="btn btn-sm btn-danger">Reject</button>
                                </form>
                              <?php } ?>
                            </td>


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