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

<style>
  :root {
    --primary-color: #2d6a4f;
    --secondary-color: #40916c;
    --accent-color: #95d5b2;
    --light-color: #d8f3dc;
  }

  .navbar {
    background-color: rgba(255, 255, 255, 0.95);
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
  }

  .navbar-brand {
    font-weight: 700;
    color: var(--primary-color);
  }

  .counter-box {
    text-align: center;
    padding: 30px;
    border-radius: 10px;
    background: white;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
  }

  .counter-box:hover {
    transform: translateY(-5px);
  }

  .cause-card {
    border: none;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
  }

  .cause-card:hover {
    transform: translateY(-5px);
  }

  .how-it-works-item {
    text-align: center;
    padding: 30px;
  }

  .how-it-works-icon {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    background: var(--light-color);
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 20px;
    font-size: 2rem;
    color: var(--primary-color);
  }


  .btn-primary {
    background-color: var(--primary-color);
    border-color: var(--primary-color);
  }

  .btn-primary:hover {
    background-color: var(--secondary-color);
    border-color: var(--secondary-color);
  }

  .btn-outline-light:hover {
    background-color: var(--light-color);
    color: var(--primary-color);
  }
</style>

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
          <a class="nav-link <?php echo isActive('index.php'); ?>"
            href="<?php echo $base_url; ?>/index.php#contact">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo isActive('index.php'); ?>"
            href="<?php echo $base_url; ?>/index.php#portals">Portals</a>
        </li>
        <li class="nav-item">
          <a class="nav-link btn btn-primary text-white ms-2 px-4"
            href="<?php echo $base_url; ?>/auth/login.php">Login</a>
        </li>
      </ul>
    </div>
  </div>
</nav>