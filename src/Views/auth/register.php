<?php  
include_once '../../Modules/User.php';  
include_once '../../Controllers/AuthController.php';  
if (session_status() === PHP_SESSION_NONE) {  
    session_start();  
}  

$err_msg = "";  

if (
    !empty($_POST['username']) &&
    !empty($_POST['email']) &&
    !empty($_POST['password']) &&
    !empty($_POST['userType'])
) {  
    $user = new User();  
    $user->setEmail($_POST['email']);  
    $user->setPassword($_POST['password']);  
    $user->setName($_POST['username']);  
    $user->($_POST['userType']);
    $auth = new AuthController();  

    if ($auth->register($user)) {  
        if ($_SESSION['userRole'] == "donor") {   
            header("Location: /charity-management-system/Views/donations/donations.php");   
        } else if ($_SESSION['userRole'] == "volunteer") {   
            header("Location: /charity-management-system/Views/volunteer/index.php");   
        } else {   
            header("Location: /charity-management-system/Views/charity/index.php");   
        }
        exit;
    } else {  
        $err_msg = "Registration failed.";   
    }  
} else if ($_SERVER['REQUEST_METHOD'] === 'POST') {  
    $err_msg = "Please fill in all fields.";  
}  
?>





<!DOCTYPE html>
<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta
    name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Register</title>

  <meta name="description" content="Create an account to access our services." />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet" />

  <!-- Icons. Uncomment required icon fonts -->
  <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

  <!-- Core CSS -->
  <link
    rel="stylesheet"
    href="../assets/vendor/css/core.css"
    class="template-customizer-core-css" />
  <link
    rel="stylesheet"
    href="../assets/vendor/css/theme-default.css"
    class="template-customizer-theme-css" />
  <link rel="stylesheet" href="../assets/css/demo.css" />

  <!-- Page CSS -->
  <!-- Page -->
  <link rel="stylesheet" href="../assets/vendor/css/pages/page-auth.css" />
  <!-- Helpers -->
  <script src="../assets/vendor/js/helpers.js"></script>

  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="../assets/js/config.js"></script>
</head>

<body>
  <!-- navbar -->
  <?php include '../assets/components/navbar.php'; ?>
  <!-- /navbar -->

  <!-- Content -->
  <div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner">
        <!-- Register Card -->
        <div class="card">
          <div class="card-body">
            <h4 class="mb-2">Adventure starts here 🚀</h4>
            <p class="mb-4">Make your app management easy and fun!</p>

            <form
              id="formAuthentication"
              class="mb-3"
              action="register.php"
              method="POST">
              <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input
                  type="text"
                  class="form-control"
                  id="username"
                  name="username"
                  placeholder="Enter your username"
                  autofocus />
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input
                  type="text"
                  class="form-control"
                  id="email"
                  name="email"
                  placeholder="Enter your email" />
              </div>
              <div class="mb-3 form-password-toggle">
                <label class="form-label" for="password">Password</label>
                <div class="input-group input-group-merge">
                  <input
                    type="password"
                    id="password"
                    class="form-control"
                    name="password"
                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                    aria-describedby="password" />
                  <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  <select name="userType" required>
                  <option value="">Select user type</option>
                  <option value="donor">Donor</option>
                  <option value="volunteer">Volunteer</option>
                </select>
                </div>
              </div>

              <div class="mb-3">
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="checkbox"
                    id="terms-conditions"
                    name="terms" />
                  <label class="form-check-label" for="terms-conditions">
                    I agree to
                    <a href="javascript:void(0);">privacy policy & terms</a>
                  </label>
                </div>
              </div>

              <button class="btn btn-primary d-grid w-100" name="action" value="delete" type="submit">delete</button>
              <button class="btn btn-primary d-grid w-100" name="action" value="add" type="submit">add</button>
            </form>

            <p class="text-center">
              <span>Already have an account?</span>
              <a href="auth-login-basic.html">
                <span>Sign in instead</span>
              </a>
            </p>
          </div>
        </div>
        <!-- /Register Card -->
      </div>
    </div>
  </div>

  <!-- footer -->
  <?php include '../assets/components/footer.php'; ?>
  <!-- /footer -->

  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
  <script src="../assets/vendor/libs/jquery/jquery.js"></script>
  <script src="../assets/vendor/libs/popper/popper.js"></script>
  <script src="../assets/vendor/js/bootstrap.js"></script>
  <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

  <script src="../assets/vendor/js/menu.js"></script>
  <!-- endbuild -->

  <!-- Vendors JS -->

  <!-- Main JS -->
  <script src="../assets/js/main.js"></script>

  <!-- Page JS -->

  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>