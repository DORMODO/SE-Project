<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volunteer Portal - Charity Management System</title>
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
        }

        .navbar {
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            color: var(--primary-color);
            font-weight: 600;
        }

        .stat-card {
            border: none;
            border-radius: 15px;
            transition: transform 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .welcome-banner {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            border-radius: 15px;
            padding: 2rem;
            margin: 1rem 0;
        }

        .profile-card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
        }

        .event-card {
            border: none;
            border-radius: 15px;
            margin-bottom: 1rem;
        }

        .nav-link {
            color: #666;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .nav-link:hover, .nav-link.active {
            color: var(--primary-color);
            background-color: var(--light-color);
        }

        .status-badge {
            padding: 0.35em 0.8em;
            border-radius: 20px;
            font-size: 0.85em;
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-primary:hover {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
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
    <nav class="navbar navbar-expand-lg navbar-light sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="bi bi-heart-fill me-2"></i>
                Charity System
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#"><i class="bi bi-house-door me-2"></i>Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="bi bi-calendar-event me-2"></i>Events</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="bi bi-clock me-2"></i>My Schedule</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="bi bi-envelope me-2"></i>Messages</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="bi bi-person me-2"></i>Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="#"><i class="bi bi-box-arrow-right me-2"></i>Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container py-4">
        <!-- Welcome Banner -->
        <div class="welcome-banner">
            <h2 class="mb-2">Welcome back, Sarah! 👋</h2>
            <p class="mb-0">"The best way to find yourself is to lose yourself in the service of others." - Mahatma Gandhi</p>
        </div>

        <!-- Stats Overview -->
        <div class="row g-4 mb-4">
            <div class="col-md-4">
                <div class="card stat-card h-100">
                    <div class="card-body text-center">
                        <i class="bi bi-calendar2-check display-4 text-primary mb-3"></i>
                        <h5>Total Events Assigned</h5>
                        <h2 class="fw-bold">12</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card stat-card h-100">
                    <div class="card-body text-center">
                        <i class="bi bi-clock-history display-4 text-warning mb-3"></i>
                        <h5>Upcoming Events</h5>
                        <h2 class="fw-bold">5</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card stat-card h-100">
                    <div class="card-body text-center">
                        <i class="bi bi-check2-circle display-4 text-success mb-3"></i>
                        <h5>Completed Tasks</h5>
                        <h2 class="fw-bold">7</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Main Content Area -->
            <div class="col-lg-8 mb-4">
                <!-- Upcoming Events -->
                <div class="card event-card">
                    <div class="card-header bg-white">
                        <h5 class="card-title mb-0">Upcoming Events</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead>
                                    <tr>
                                        <th>Event</th>
                                        <th>Date & Time</th>
                                        <th>Location</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Food Distribution Drive</td>
                                        <td>May 15, 2025<br>9:00 AM</td>
                                        <td>Community Center</td>
                                        <td><span class="status-badge bg-warning text-dark">Pending</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-primary">Accept</button>
                                            <button class="btn btn-sm btn-outline-danger">Decline</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Education Workshop</td>
                                        <td>May 18, 2025<br>2:00 PM</td>
                                        <td>Public Library</td>
                                        <td><span class="status-badge bg-success text-white">Confirmed</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-success">Mark Complete</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Fundraising Event</td>
                                        <td>May 20, 2025<br>6:00 PM</td>
                                        <td>City Hall</td>
                                        <td><span class="status-badge bg-info text-white">New</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-primary">Accept</button>
                                            <button class="btn btn-sm btn-outline-danger">Decline</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Recent Messages -->
                <div class="card event-card mt-4">
                    <div class="card-header bg-white d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Recent Messages</h5>
                        <a href="#" class="btn btn-sm btn-primary">View All</a>
                    </div>
                    <div class="card-body">
                        <div class="list-group list-group-flush">
                            <div class="list-group-item border-0 d-flex align-items-center px-0">
                                <img src="../assets/img/avatars/1.png" class="rounded-circle me-3" width="45">
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">Event Update: Food Distribution Drive</h6>
                                    <p class="text-muted mb-0">Please arrive 30 minutes before the event starts...</p>
                                    <small class="text-muted">2 hours ago</small>
                                </div>
                            </div>
                            <div class="list-group-item border-0 d-flex align-items-center px-0">
                                <img src="../assets/img/avatars/5.png" class="rounded-circle me-3" width="45">
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">Task Completion Confirmation</h6>
                                    <p class="text-muted mb-0">Thank you for completing your assigned task...</p>
                                    <small class="text-muted">1 day ago</small>
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
                        <img src="../assets/img/avatars/7.png" class="rounded-circle mb-3" width="100">
                        <h5 class="card-title">Sarah Johnson</h5>
                        <p class="text-muted mb-3">Volunteer Since 2024</p>
                        <div class="mb-3">
                            <span class="badge bg-primary">Education</span>
                            <span class="badge bg-success">Food Distribution</span>
                            <span class="badge bg-info">Fundraising</span>
                        </div>
                        <hr>
                        <div class="text-start">
                            <p class="mb-1"><i class="bi bi-envelope me-2"></i>sarah.j@example.com</p>
                            <p class="mb-1"><i class="bi bi-telephone me-2"></i>(555) 123-4567</p>
                            <p class="mb-3"><i class="bi bi-geo-alt me-2"></i>New York, USA</p>
                        </div>
                        <button class="btn btn-primary w-100">Edit Profile</button>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="card event-card">
                    <div class="card-header bg-white">
                        <h5 class="card-title mb-0">Quick Actions</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-grid gap-2">
                            <button class="btn btn-outline-primary"><i class="bi bi-calendar-plus me-2"></i>Browse Events</button>
                            <button class="btn btn-outline-primary"><i class="bi bi-clock-history me-2"></i>View Schedule</button>
                            <button class="btn btn-outline-primary"><i class="bi bi-file-text me-2"></i>Download Certificate</button>
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