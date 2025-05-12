  <?php
  // Get the current page path
  $current_page = $_SERVER['PHP_SELF'];
  $base_url = '/charity-management-system/src/views';

  // Function to check if the current page matches a specific path
  function isActive($path)
  {
    global $current_page;
    return strpos($current_page, $path) !== false ? 'active' : '';
  }
  ?>

  <nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <div class="container">
      <a class="navbar-brand" href="<?php echo $base_url; ?>/index.php">
        <i class="bi bi-heart-fill me-2"></i>
        CharityMS
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link <?php echo isActive('index.php'); ?>"
              href="<?php echo $base_url; ?>/index.php#home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo isActive('index.php'); ?>"
              href="<?php echo $base_url; ?>/index.php#about">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo isActive('index.php'); ?>"
              href="<?php echo $base_url; ?>/index.php#causes">Causes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo isActive('donate.php'); ?>"
              href="<?php echo $base_url; ?>/donations/donate.php">Donate</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo isActive('index.php'); ?>"
              href="<?php echo $base_url; ?>/index.php#contact">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn btn-primary text-white ms-2 px-4"
              href="<?php echo $base_url; ?>/auth/login.php">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>