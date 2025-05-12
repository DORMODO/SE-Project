<?php
include_once '../../Modules/User.php';     
include_once '../../Controllers/AuthController.php';     

$err_msg = "";     

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (
        isset($_POST['username'], $_POST['email'], $_POST['password'], $_POST['userType']) &&
        !empty(trim($_POST['username'])) &&
        !empty(trim($_POST['email'])) &&
        !empty(trim($_POST['password'])) &&
        !empty(trim($_POST['userType']))
    ) {
        if (session_status() === PHP_SESSION_NONE) {     
            session_start();     
        } 

        $user = new User(
            ,
            $_POST['username'],
            $_POST['email'],
            password_hash($_POST['password'], PASSWORD_DEFAULT),
            $_POST['userType']
        );

        $auth = new AuthController();  

        if ($auth->checkForUser($_POST['email'])) {     
            $err_msg = "Email already exists.";     
        } else { 
            if ($auth->register($user)) {     
                $_SESSION['userType'] = $user->getUserType();  
                if ($_SESSION['userType'] == "donor") {     
                    header("Location: ../donations/donations.php");     
                    exit; 
                } elseif ($_SESSION['userType'] == "volunteer") {     
                    header("Location: ../");     
                    exit; 
                } else {     
                    header("Location: ../index.php");     
                    exit; 
                }  
            } else {     
                $err_msg = "Registration failed.";      
            } 
        } 
    } else {     
        $err_msg = "Please fill in all fields.";     
    }     
}
?>


<!DOCTYPE html> 
<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free"> 
<head> 
  <meta charset="utf-8" /> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" /> 
  <title>Register</title> 
  <meta name="description" content="Create an account to access our services." /> 

  <link rel="preconnect" href="https://fonts.googleapis.com" /> 
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin /> 
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet" /> 
  <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" /> 
  <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" /> 
  <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" /> 
  <link rel="stylesheet" href="../assets/css/demo.css" /> 
  <link rel="stylesheet" href="../assets/vendor/css/pages/page-auth.css" /> 
  <script src="../assets/vendor/js/helpers.js"></script> 
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
        <div class="card"> 
          <div class="card-body"> 
            <h4 class="mb-2">Adventure starts here 🚀</h4> 
            <p class="mb-4">Make your app management easy and fun!</p> 

            <?php if (!empty($err_msg)): ?>
              <div class="alert alert-danger"><?= htmlspecialchars($err_msg) ?></div>
            <?php endif; ?>

            <form id="formAuthentication" class="mb-3" action="register.php" method="POST"> 
              <div class="mb-3"> 
                <label for="username" class="form-label">Username</label> 
                <input 
                  type="text" 
                  class="form-control" 
                  id="username" 
                  name="username" 
                  placeholder="Enter your username" 
                  required 
                /> 
              </div> 

              <div class="mb-3"> 
                <label for="email" class="form-label">Email</label> 
                <input 
                  type="email" 
                  class="form-control" 
                  id="email" 
                  name="email" 
                  placeholder="Enter your email" 
                  required 
                  pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" 
                  oninvalid="this.setCustomValidity('Please enter a valid email address')" 
                  oninput="this.setCustomValidity('')" 
                /> 
              </div> 

              <div class="mb-3 form-password-toggle"> 
                <label class="form-label" for="password">Password</label> 
                <div class="input-group input-group-merge"> 
                  <input 
                    type="password" 
                    id="password" 
                    class="form-control" 
                    name="password" 
                    placeholder="••••••••" 
                    aria-describedby="password" 
                    required 
                  /> 
                  <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span> 
                </div> 
              </div> 

              <div class="mb-3"> 
                <label for="userType" class="form-label">User Type</label> 
                <select name="userType" id="userType" class="form-control" required> 
                  <option value="">Select user type</option> 
                  <option value="donor">Donor</option> 
                  <option value="volunteer">Volunteer</option> 
                </select> 
              </div> 

              <div class="mb-3"> 
                <div class="form-check"> 
                  <input 
                    class="form-check-input" 
                    type="checkbox" 
                    id="terms-conditions" 
                    name="terms" 
                    required 
                  /> 
                  <label class="form-check-label" for="terms-conditions"> 
                    I agree to 
                    <a href="javascript:void(0);">privacy policy & terms</a> 
                  </label> 
                </div> 
              </div> 

              <button class="btn btn-primary d-grid w-100" type="submit">Register</button> 
            </form> 

            <p class="text-center"> 
              <span>Already have an account?</span> 
              <a href="auth-login-basic.html"><span>Sign in instead</span></a> 
            </p> 
          </div> 
        </div> 
      </div> 
    </div> 
  </div> 

  <!-- footer --> 
  <?php include '../assets/components/footer.php'; ?> 
  <!-- /footer --> 

  <!-- Core JS --> 
  <script src="../assets/vendor/libs/jquery/jquery.js"></script> 
  <script src="../assets/vendor/libs/popper/popper.js"></script> 
  <script src="../assets/vendor/js/bootstrap.js"></script> 
  <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script> 
  <script src="../assets/vendor/js/menu.js"></script> 
  <script src="../assets/js/main.js"></script> 
  <script async defer src="https://buttons.github.io/buttons.js"></script> 
</body> 
</html>
