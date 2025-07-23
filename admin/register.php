<?php
require('inc.connection.php');

$register = $name = $email = $password = $role = $address = $phone = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['registerBtn'])) {

  // Sanitize input
  $name = safe_input($_POST['name']);
  $email = safe_input($_POST['email']);
  $password = safe_input($_POST['password']);
  $role = safe_input($_POST['role']);
  $address = safe_input($_POST['address']);
  $phone = safe_input($_POST['phone']);

  // Check if email already exists
  $sql = "SELECT * FROM users WHERE email = '$email'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    $register = "Email already registered.";
  } else {
    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert new user
    $insert_sql = "INSERT INTO users (name, email, password, role, address ,phone) 
                   VALUES ('$name', '$email', '$hashed_password', '$role', '$address','$phone')";

    if (mysqli_query($conn, $insert_sql)) {
      $register = "Registration successful. You can now log in.";
    } else {
      $register = "Something went wrong. Please try again.";
    }
  }
}
?>




<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Vaccine System - Register</title>
  <link rel="shortcut icon" type="image/png" href="./assets/images/logos/logo.png" />
  <link rel="stylesheet" href="./assets/css/styles.min.css" />
  <style>
    .row .card-body img {
      margin-top: -60px;
      margin-bottom: -60px;
      height: 200px;
      width: 250px;
      padding: 5px 0px;
    }
  </style>
</head>

<body>
  <div class="bg-img-blur position-absolute top-0 start-0 w-100 h-100"></div>
  <div class="page-wrapper position-relative z-1" id="main-wrapper">
    <div class="position-relative min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-6 col-lg-5 col-xl-4">
            <div class="card shadow-sm rounded-4 mb-0">
              <div class="card-body p-2">


                <div class="text-center mb-2">
                  <img src="./assets/images/logos/2092fc4b-f777-437b-a14d-dbad6615c9c0-removebg-preview.png" alt="Logo" class="img-fluid" style="max-width: 200px;">
                </div>

                <p class="text-center mb-4" style="color: darkcyan; font-size: 1.1rem;"><b>Registration Form</b></p>

                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                  <?php if (!empty($register)): ?>
                    <div class="alert alert-info py-2 px-3 small" role="alert" style="font-size: 0.85rem;">
                      <?= $register ?>
                    </div>
                  <?php endif; ?>

                  <div class="mb-2">
                    <label class="form-label">Username</label>
                    <input type="text" class="form-control form-control-sm" name="name" value="<?php echo $name; ?>" required>
                  </div>

                  <div class="mb-2">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control form-control-sm" name="email" value="<?php echo $email; ?>" required>
                  </div>

                  <div class="mb-2">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control form-control-sm" name="password" required>
                  </div>
                  <div class="mb-2">
                    <label class="form-label">Role</label>
                    <input type="text" class="form-control form-control-sm" name="role" value="parent">
                  </div>

                  <div class="mb-2">
                    <label class="form-label">Phone</label>
                    <input type="int" class="form-control form-control-sm" name="phone" value="<?php echo $phone; ?>" required>
                  </div>
                  <div class="mb-2">
                    <label class="form-label">Address</label>
                    <input type="text" class="form-control form-control-sm" name="address" value="<?php echo $address; ?>" required>
                  </div>

                  <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" id="rememberCheck" checked>
                    <label class="form-check-label" for="rememberCheck">
                      Remember this device
                    </label>
                  </div>

                  <button type="submit" name="registerBtn" class="btn btn-primary w-100 py-1 fs-6 rounded-2">Register</button>

                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="./assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="./assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>

</html>