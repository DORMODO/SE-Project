<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Charity Management System</title>
  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <style>
    :root {
      --primary-color: #2d6a4f;
      --secondary-color: #40916c;
      --accent-color: #95d5b2;
      --light-color: #d8f3dc;
    }

    body {
      font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
    }

    .navbar {
      background-color: rgba(255, 255, 255, 0.95);
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .navbar-brand {
      font-weight: 700;
      color: var(--primary-color);
    }

    .hero-section {
      background: linear-gradient(rgba(45, 106, 79, 0.9), rgba(45, 106, 79, 0.9)),
        url('assets/img/backgrounds/18.jpg');
      background-size: cover;
      background-position: center;
      padding: 120px 0;
      color: white;
    }

    .section-padding {
      padding: 80px 0;
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

    .cta-section {
      background: linear-gradient(rgba(45, 106, 79, 0.95), rgba(45, 106, 79, 0.95)),
        url('assets/img/backgrounds/18.jpg');
      background-size: cover;
      background-position: center;
      color: white;
      padding: 80px 0;
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

    footer {
      background-color: #1b4332;
      color: white;
      padding: 60px 0 30px;
    }

    .social-icons a {
      color: white;
      margin: 0 10px;
      font-size: 1.5rem;
      transition: color 0.3s ease;
    }

    .social-icons a:hover {
      color: var(--accent-color);
    }
  </style>
</head>

<body>
  <?php include_once './assets/components/navbar.php'; ?>

  <section class="hero-section" id="home">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-8 mx-auto text-center">
          <h1 class="display-4 fw-bold mb-3">Empower Change, One Donation at a Time</h1>
          <p class="lead mb-4">Join us in making a difference. Together we can create positive change and build a better future for those in need.</p>
          <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
            <a href="donations/donate.php" class="btn btn-primary btn-lg px-4 gap-3">Donate Now</a>
            <a href="auth/register.php" class="btn btn-outline-light btn-lg px-4">Join as Volunteer</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section-padding" id="about">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto text-center mb-5">
          <h2 class="fw-bold mb-3">About Our Charity</h2>
          <p class="lead text-muted">We are dedicated to creating lasting change in communities worldwide through sustainable development, education, and humanitarian aid.</p>
        </div>
      </div>
      <div class="row g-4">
        <div class="col-md-4 text-center">
          <div class="p-4">
            <i class="bi bi-heart-fill display-4 text-primary mb-3"></i>
            <h4>Transparency</h4>
            <p>We believe in complete transparency in all our operations and fund utilization.</p>
          </div>
        </div>
        <div class="col-md-4 text-center">
          <div class="p-4">
            <i class="bi bi-people-fill display-4 text-primary mb-3"></i>
            <h4>Community Impact</h4>
            <p>Our projects are designed to create lasting positive impact in communities.</p>
          </div>
        </div>
        <div class="col-md-4 text-center">
          <div class="p-4">
            <i class="bi bi-hand-thumbs-up-fill display-4 text-primary mb-3"></i>
            <h4>Support</h4>
            <p>24/7 support for donors, volunteers, and beneficiaries.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section-padding bg-light">
    <div class="container">
      <div class="row g-4">
        <div class="col-md-3 col-6">
          <div class="counter-box">
            <i class="bi bi-people-fill display-4 text-primary mb-3"></i>
            <h2 class="fw-bold">5,000+</h2>
            <p class="mb-0">Total Donors</p>
          </div>
        </div>
        <div class="col-md-3 col-6">
          <div class="counter-box">
            <i class="bi bi-currency-dollar display-4 text-primary mb-3"></i>
            <h2 class="fw-bold">$2M+</h2>
            <p class="mb-0">Total Raised</p>
          </div>
        </div>
        <div class="col-md-3 col-6">
          <div class="counter-box">
            <i class="bi bi-flag-fill display-4 text-primary mb-3"></i>
            <h2 class="fw-bold">50+</h2>
            <p class="mb-0">Active Campaigns</p>
          </div>
        </div>
        <div class="col-md-3 col-6">
          <div class="counter-box">
            <i class="bi bi-person-heart display-4 text-primary mb-3"></i>
            <h2 class="fw-bold">1,000+</h2>
            <p class="mb-0">Volunteers</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section-padding" id="causes">
    <div class="container">
      <div class="row mb-5">
        <div class="col-lg-8 mx-auto text-center">
          <h2 class="fw-bold mb-3">Featured Causes</h2>
          <p class="lead text-muted">Support our current initiatives and help make a difference.</p>
        </div>
      </div>
      <div class="row g-4">
        <div class="col-md-4">
          <div class="card cause-card">
            <img src="assets/img/elements/1.jpg" class="card-img-top" alt="Education">
            <div class="card-body">
              <h5 class="card-title">Education for All</h5>
              <p class="card-text">Support underprivileged children's education and help build a brighter future.</p>
              <div class="progress mb-3">
                <div class="progress-bar bg-primary" style="width: 75%"></div>
              </div>
              <div class="d-flex justify-content-between mb-3">
                <span>Raised: $15,000</span>
                <span>Goal: $20,000</span>
              </div>
              <a href="donations/donate.php" class="btn btn-primary w-100">Donate Now</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card cause-card">
            <img src="assets/img/elements/2.jpg" class="card-img-top" alt="Healthcare">
            <div class="card-body">
              <h5 class="card-title">Healthcare Access</h5>
              <p class="card-text">Provide medical assistance and healthcare services to rural communities.</p>
              <div class="progress mb-3">
                <div class="progress-bar bg-primary" style="width: 60%"></div>
              </div>
              <div class="d-flex justify-content-between mb-3">
                <span>Raised: $30,000</span>
                <span>Goal: $50,000</span>
              </div>
              <a href="donations/donate.php" class="btn btn-primary w-100">Donate Now</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card cause-card">
            <img src="assets/img/elements/3.jpg" class="card-img-top" alt="Environment">
            <div class="card-body">
              <h5 class="card-title">Clean Water Initiative</h5>
              <p class="card-text">Help provide clean drinking water to communities in need.</p>
              <div class="progress mb-3">
                <div class="progress-bar bg-primary" style="width: 85%"></div>
              </div>
              <div class="d-flex justify-content-between mb-3">
                <span>Raised: $17,000</span>
                <span>Goal: $20,000</span>
              </div>
              <a href="donations/donate.php" class="btn btn-primary w-100">Donate Now</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section-padding bg-light">
    <div class="container">
      <div class="row mb-5">
        <div class="col-lg-8 mx-auto text-center">
          <h2 class="fw-bold mb-3">How It Works</h2>
          <p class="lead text-muted">Making a difference is easy with our simple process.</p>
        </div>
      </div>
      <div class="row g-4">
        <div class="col-md-3">
          <div class="how-it-works-item">
            <div class="how-it-works-icon">
              <i class="bi bi-search"></i>
            </div>
            <h4>Choose Cause</h4>
            <p>Browse and select a cause you want to support</p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="how-it-works-item">
            <div class="how-it-works-icon">
              <i class="bi bi-credit-card"></i>
            </div>
            <h4>Make Donation</h4>
            <p>Securely donate any amount you wish</p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="how-it-works-item">
            <div class="how-it-works-icon">
              <i class="bi bi-receipt"></i>
            </div>
            <h4>Get Receipt</h4>
            <p>Receive confirmation and tax receipt</p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="how-it-works-item">
            <div class="how-it-works-icon">
              <i class="bi bi-graph-up"></i>
            </div>
            <h4>Track Impact</h4>
            <p>See how your donation makes a difference</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="cta-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto text-center">
          <h2 class="fw-bold mb-4">Ready to Make a Difference?</h2>
          <p class="lead mb-4">Join our community of donors and volunteers to create positive change.</p>
          <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
            <a href="donations/donate.php" class="btn btn-primary btn-lg px-5">Become a Donor</a>
            <a href="auth/register.php" class="btn btn-outline-light btn-lg px-5">Volunteer Today</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section-padding bg-light">
    <div class="container">
      <div class="row mb-4">
        <div class="col-lg-8 mx-auto text-center">
          <h2 class="fw-bold mb-3">Access Portal</h2>
          <p class="lead text-muted">Login or register based on your role</p>
        </div>
      </div>
      <div class="row g-4 justify-content-center">
        <div class="col-md-3">
          <a href="auth/login.php?role=admin" class="text-decoration-none">
            <div class="card text-center h-100">
              <div class="card-body">
                <i class="bi bi-person-workspace display-4 text-primary mb-3"></i>
                <h5 class="card-title">Admin Login</h5>
              </div>
            </div>
          </a>
        </div>
        <div class="col-md-3">
          <a href="auth/login.php?role=donor" class="text-decoration-none">
            <div class="card text-center h-100">
              <div class="card-body">
                <i class="bi bi-heart display-4 text-primary mb-3"></i>
                <h5 class="card-title">Donor Login</h5>
              </div>
            </div>
          </a>
        </div>
        <div class="col-md-3">
          <a href="auth/login.php?role=volunteer" class="text-decoration-none">
            <div class="card text-center h-100">
              <div class="card-body">
                <i class="bi bi-people display-4 text-primary mb-3"></i>
                <h5 class="card-title">Volunteer Login</h5>
              </div>
            </div>
          </a>
        </div>
        <div class="col-md-3">
          <a href="auth/login.php?role=manager" class="text-decoration-none">
            <div class="card text-center h-100">
              <div class="card-body">
                <i class="bi bi-calendar-event display-4 text-primary mb-3"></i>
                <h5 class="card-title">Event Manager</h5>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </section>

  <?php include_once './assets/components/footer.php'; ?>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>