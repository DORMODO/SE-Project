<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Donor Dashboard - Charity Management System</title>
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
      --gray-light: #f8f9fa;
    }

    body {
      font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
      background-color: var(--gray-light);
      padding-top: 70px;
      /* Add padding to account for fixed navbar */
    }

    .navbar {
      background-color: white;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      position: fixed;
      top: 0;
      right: 0;
      left: 0;
      z-index: 1030;
    }

    .navbar-brand {
      color: var(--primary-color);
      font-weight: 600;
    }

    .welcome-banner {
      background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
      color: white;
      border-radius: 15px;
      padding: 2rem;
      position: relative;
      overflow: hidden;
    }

    .welcome-banner::after {
      content: '';
      position: absolute;
      right: 0;
      top: 0;
      width: 100%;
      height: 100%;
      background: url('../assets/img/elements/18.jpg') right center;
      opacity: 0.1;
      background-size: cover;
    }

    .stat-card {
      border: none;
      border-radius: 15px;
      transition: transform 0.3s ease;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .stat-card:hover {
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

    .nav-link {
      color: #666;
      padding: 0.5rem 1rem;
      border-radius: 5px;
      transition: all 0.3s ease;
    }

    .nav-link:hover,
    .nav-link.active {
      color: var(--primary-color);
      background-color: var(--light-color);
    }

    .btn-primary {
      background-color: var(--primary-color);
      border-color: var(--primary-color);
    }

    .btn-primary:hover {
      background-color: var(--secondary-color);
      border-color: var(--secondary-color);
    }

    .donation-status {
      padding: 0.35em 0.8em;
      border-radius: 20px;
      font-size: 0.85em;
    }

    .profile-card {
      border: none;
      border-radius: 15px;
      background: white;
    }

    .recurring-donation-card {
      border-left: 4px solid var(--primary-color);
    }

    footer {
      background-color: white;
      padding: 2rem 0;
      margin-top: 3rem;
    }

    .social-links a {
      color: var(--primary-color);
      margin: 0 10px;
      font-size: 1.2rem;
      transition: color 0.3s ease;
    }

    .social-links a:hover {
      color: var(--secondary-color);
    }

    @media (max-width: 768px) {
      .welcome-banner {
        padding: 1.5rem;
      }
    }
  </style>
</head>

<body>
  <!-- Navigation Bar -->
  <?php include_once '../assets/components/navbar.php'; ?>

  <!-- Main Content -->
  <div class="container py-4">
    <!-- Welcome Banner -->
    <div class="welcome-banner mb-4">
      <div class="row align-items-center">
        <div class="col-md-8">
          <h2 class="mb-3">Welcome back, Michael! 🌟</h2>
          <p class="mb-2">Thank you for your continued support in making the world a better place.</p>
          <p class="mb-0">
            <strong>Total Donated:</strong> $12,500
            <span class="mx-3">|</span>
            <strong>Last Donation:</strong> May 10, 2025
          </p>
        </div>
        <div class="col-md-4 text-md-end mt-3 mt-md-0">
          <a href="../donations/donate.php" class="btn btn-light btn-lg"><i class="bi bi-heart-fill me-2"></i>Donate Now</a>
        </div>
      </div>
    </div>

    <!-- Donation Summary Cards -->
    <div class="row g-4 mb-4">
      <div class="col-md-4">
        <div class="card stat-card h-100">
          <div class="card-body text-center">
            <i class="bi bi-heart-fill display-4 text-primary mb-3"></i>
            <h5>Total Donations</h5>
            <h2 class="fw-bold">$12,500</h2>
            <p class="text-muted mb-0">Across 15 donations</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card stat-card h-100">
          <div class="card-body text-center">
            <i class="bi bi-globe display-4 text-success mb-3"></i>
            <h5>Causes Supported</h5>
            <h2 class="fw-bold">8</h2>
            <p class="text-muted mb-0">Making global impact</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card stat-card h-100">
          <div class="card-body text-center">
            <i class="bi bi-arrow-repeat display-4 text-info mb-3"></i>
            <h5>Active Monthly</h5>
            <h2 class="fw-bold">2</h2>
            <p class="text-muted mb-0">Recurring donations</p>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <!-- Main Content Area -->
      <div class="col-lg-8 mb-4">
        <!-- Recent Donations -->
        <div class="card mb-4">
          <div class="card-header bg-white d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">Recent Donations</h5>
            <a href="#" class="btn btn-sm btn-primary">View All</a>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover align-middle">
                <thead>
                  <tr>
                    <th>Cause</th>
                    <th>Amount</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Education for All</td>
                    <td>$500</td>
                    <td>May 10, 2025</td>
                    <td><span class="donation-status bg-success text-white">Completed</span></td>
                    <td><button class="btn btn-sm btn-outline-primary"><i class="bi bi-download me-1"></i>Receipt</button></td>
                  </tr>
                  <tr>
                    <td>Clean Water Initiative</td>
                    <td>$1,000</td>
                    <td>May 5, 2025</td>
                    <td><span class="donation-status bg-success text-white">Completed</span></td>
                    <td><button class="btn btn-sm btn-outline-primary"><i class="bi bi-download me-1"></i>Receipt</button></td>
                  </tr>
                  <tr>
                    <td>Healthcare Access</td>
                    <td>$750</td>
                    <td>May 1, 2025</td>
                    <td><span class="donation-status bg-warning text-dark">Processing</span></td>
                    <td><button class="btn btn-sm btn-outline-primary" disabled><i class="bi bi-clock me-1"></i>Pending</button></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <!-- Explore Causes -->
        <h5 class="mb-3">Featured Causes</h5>
        <div class="row g-4">
          <div class="col-md-6">
            <div class="card cause-card">
              <img src="../assets/img/elements/1.jpg" class="card-img-top" alt="Education">
              <div class="card-body">
                <h5 class="card-title">Education for All</h5>
                <p class="card-text">Help provide quality education to underprivileged children.</p>
                <div class="progress mb-3">
                  <div class="progress-bar bg-primary" style="width: 75%"></div>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                  <small class="text-muted">$15,000 raised of $20,000</small>
                  <a href="../donations/donate.php" class="btn btn-primary">Donate Now</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card cause-card">
              <img src="../assets/img/elements/2.jpg" class="card-img-top" alt="Healthcare">
              <div class="card-body">
                <h5 class="card-title">Healthcare Access</h5>
                <p class="card-text">Support medical care for communities in need.</p>
                <div class="progress mb-3">
                  <div class="progress-bar bg-primary" style="width: 60%"></div>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                  <small class="text-muted">$30,000 raised of $50,000</small>
                  <a href="../donations/donate.php" class="btn btn-primary">Donate Now</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Sidebar -->
      <div class="col-lg-4">
        <!-- Profile Quick View -->
        <div class="card profile-card mb-4">
          <div class="card-body text-center">
            <img src="../assets/img/avatars/1.png" class="rounded-circle mb-3" width="100">
            <h5 class="card-title">Michael Anderson</h5>
            <p class="text-muted mb-3">Donor since 2024</p>
            <div class="text-start">
              <p class="mb-1"><i class="bi bi-envelope me-2"></i>michael.a@example.com</p>
              <p class="mb-3"><i class="bi bi-geo-alt me-2"></i>New York, USA</p>
            </div>
            <button class="btn btn-primary w-100">Edit Profile</button>
          </div>
        </div>

        <!-- Recurring Donations -->
        <div class="card mb-4">
          <div class="card-header bg-white">
            <h5 class="card-title mb-0">Active Monthly Donations</h5>
          </div>
          <div class="card-body">
            <div class="list-group list-group-flush">
              <div class="list-group-item px-0 recurring-donation-card">
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <h6 class="mb-1">Education for All</h6>
                    <p class="text-muted mb-0">$100/month</p>
                  </div>
                  <button class="btn btn-sm btn-outline-primary">Manage</button>
                </div>
              </div>
              <div class="list-group-item px-0 recurring-donation-card">
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <h6 class="mb-1">Clean Water Initiative</h6>
                    <p class="text-muted mb-0">$50/month</p>
                  </div>
                  <button class="btn btn-sm btn-outline-primary">Manage</button>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Quick Actions -->
        <div class="card">
          <div class="card-header bg-white">
            <h5 class="card-title mb-0">Quick Actions</h5>
          </div>
          <div class="card-body">
            <div class="d-grid gap-2">
              <button class="btn btn-outline-primary"><i class="bi bi-plus-circle me-2"></i>Start Monthly Donation</button>
              <button class="btn btn-outline-primary"><i class="bi bi-file-text me-2"></i>Download Tax Report</button>
              <button class="btn btn-outline-primary"><i class="bi bi-envelope me-2"></i>Contact Support</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="footer border-top">
    <div class="container">
      <div class="row">
        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
          <p class="mb-0">&copy; 2025 Charity Management System. All rights reserved.</p>
        </div>
        <div class="col-md-6 text-center text-md-end">
          <div class="social-links">
            <a href="#"><i class="bi bi-facebook"></i></a>
            <a href="#"><i class="bi bi-twitter"></i></a>
            <a href="#"><i class="bi bi-instagram"></i></a>
            <a href="#"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>