<?php
include_once '../../Modules/Admin.php';

// Initialize the Admin object
$admin = new Admin();

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Add User form submission
    if (isset($_POST['add_user'])) {
        $userId = $_POST['userId'];
        $name = $_POST['name'];
        $password = $_POST['password']; // In a real app, this should be hashed
        $userType = $_POST['userType'];
        $email = $_POST['email'];
        
        $admin->addUser($userId, $name, $password, $userType, $email);
    }
    
    // Delete User form submission
    if (isset($_POST['delete_user'])) {
        $username = $_POST['username'];
        
        $admin->deleteUser($username);
    }
}

// Fetch users for display (this functionality isn't in the provided Admin class)
// In a real implementation, you would add a method to fetch all users
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        :root {
            --primary: #1b4332;
            --primary-dark:rgb(3, 56, 36);
            --secondary: #6c757d;
            --success: #28a745;
            --danger: #dc3545;
            --warning: #ffc107;
            --info: #17a2b8;
            --light: #f8f9fa;
            --dark: #343a40;
        }
        
        body {
            font-family: 'SF Pro Display', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, sans-serif;
            background-color: var(--light);
            color: #333;
            line-height: 1.5;
        }
        
        .admin-sidebar {
            background-color: var(--dark);
            min-height: 100vh;
            color: white;
            padding-top: 20px;
            transition: all 0.3s ease;
        }
        
        .admin-sidebar .nav-link {
            color: rgba(255,255,255,.75);
            padding: 12px 20px;
            border-radius: 8px;
            margin: 8px 0;
            transition: all 0.3s;
        }
        
        .admin-sidebar .nav-link:hover, 
        .admin-sidebar .nav-link.active {
            background-color: rgba(255,255,255,.1);
            color: white;
            transform: translateX(5px);
        }
        
        .admin-sidebar .nav-link i {
            margin-right: 12px;
            width: 20px;
            text-align: center;
        }
        
        .admin-content {
            padding: 24px;
        }
        
        .card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 4px 6px rgba(0,0,0,.1);
            margin-bottom: 24px;
            transition: all 0.3s ease;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0,0,0,.1);
        }
        
        .card-header {
            background-color: var(--primary);
            color: white;
            border-radius: 16px 16px 0 0 !important;
            padding: 16px 24px;
            font-weight: 600;
        }
        
        .btn {
            border-radius: 8px;
            padding: 8px 16px;
            font-weight: 500;
            transition: all 0.3s;
        }
        
        .btn-primary {
            background-color: var(--primary);
            border: none;
        }
        
        .btn-primary:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
        }
        
        .btn-danger {
            background-color: var(--danger);
            border: none;
        }
        
        .btn-danger:hover {
            background-color: #c82333;
            transform: translateY(-2px);
        }
        
        .stat-card {
            border-radius: 16px;
            overflow: hidden;
            transition: all 0.3s;
        }
        
        .stat-card:hover {
            transform: scale(1.03);
        }
        
        .form-control, .form-select {
            border-radius: 8px;
            padding: 12px;
            border: 1px solid #ced4da;
        }
        
        .form-control:focus, .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
        }
        
        @media (max-width: 768px) {
            .admin-sidebar {
                position: fixed;
                width: 100%;
                height: auto;
                z-index: 1000;
                min-height: auto;
                padding-top: 0;
            }
            
            .admin-content {
                margin-top: 60px;
            }
            
            .sidebar-toggle {
                display: block !important;
            }
            
            .sidebar-menu {
                display: none;
            }
            
            .sidebar-menu.show {
                display: block;
            }
        }
        
        /* Animation classes */
        .fade-in {
            animation: fadeIn 0.5s ease;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 admin-sidebar">
                <div class="d-flex justify-content-between align-items-center p-3 d-md-none">
                    <h3 class="m-0">Admin</h3>
                    <button class="btn btn-outline-light sidebar-toggle" type="button">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
                
                <div class="sidebar-menu d-md-block">
                    <h3 class="text-center mb-4 d-none d-md-block">Admin Panel</h3>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a href="#dashboard" class="nav-link active" data-bs-toggle="tab">
                                <i class="fas fa-tachometer-alt"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#user-management" class="nav-link" data-bs-toggle="tab">
                                <i class="fas fa-users"></i> User Management
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#donations" class="nav-link" data-bs-toggle="tab">
                                <i class="fas fa-donate"></i> Donations
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#reports" class="nav-link" data-bs-toggle="tab">
                                <i class="fas fa-chart-bar"></i> Reports
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#logs" class="nav-link" data-bs-toggle="tab">
                                <i class="fas fa-list"></i> Activity Logs
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            
            <!-- Main Content -->
            <div class="col-md-9 col-lg-10 admin-content">
                <div class="tab-content">
                    <!-- Dashboard Tab -->
                    <div id="dashboard" class="tab-pane fade show active fade-in">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h2>Dashboard</h2>
                            <span class="badge bg-primary p-2">Admin View</span>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-4 mb-4">
                                <div class="card text-white bg-primary stat-card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <h5 class="card-title">Total Users</h5>
                                                <p class="card-text display-4">0</p>
                                            </div>
                                            <div class="align-self-center">
                                                <i class="fas fa-users fa-3x opacity-50"></i>
                                            </div>
                                        </div>
                                        <a href="#user-management" class="btn btn-light mt-3" data-bs-toggle="tab">
                                            Manage Users <i class="fas fa-arrow-right ms-1"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-4 mb-4">
                                <div class="card text-white bg-success stat-card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <h5 class="card-title">Total Donations</h5>
                                                <p class="card-text display-4">0</p>
                                            </div>
                                            <div class="align-self-center">
                                                <i class="fas fa-donate fa-3x opacity-50"></i>
                                            </div>
                                        </div>
                                        <a href="#donations" class="btn btn-light mt-3" data-bs-toggle="tab">
                                            View Donations <i class="fas fa-arrow-right ms-1"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-4 mb-4">
                                <div class="card text-white bg-info stat-card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <h5 class="card-title">Pending Tasks</h5>
                                                <p class="card-text display-4">0</p>
                                            </div>
                                            <div class="align-self-center">
                                                <i class="fas fa-tasks fa-3x opacity-50"></i>
                                            </div>
                                        </div>
                                        <a href="#tasks" class="btn btn-light mt-3" data-bs-toggle="tab">
                                            Manage Tasks <i class="fas fa-arrow-right ms-1"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h5 class="mb-0">Recent Activity</h5>
                                        <button class="btn btn-sm btn-light">Refresh</button>
                                    </div>
                                    <div class="card-body">
                                        <div class="alert alert-info">
                                            <i class="fas fa-info-circle me-2"></i> No recent activity to display.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6 mb-4">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h5 class="mb-0">System Status</h5>
                                        <span class="badge bg-success">All Systems Operational</span>
                                    </div>
                                    <div class="card-body">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                Database Connection
                                                <span class="badge bg-success rounded-pill">Online</span>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                User Authentication
                                                <span class="badge bg-success rounded-pill">Online</span>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                Payment Processing
                                                <span class="badge bg-success rounded-pill">Online</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- User Management Tab -->
                    <div id="user-management" class="tab-pane fade fade-in">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h2>User Management</h2>
                            <button class="btn btn-outline-primary" type="button" data-bs-toggle="collapse" data-bs-target="#addUserForm">
                                <i class="fas fa-plus me-2"></i> Add New User
                            </button>
                        </div>
                        
                        <div class="collapse mb-4" id="addUserForm">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0">Add New User</h5>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="" id="userForm" class="needs-validation" novalidate>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="userId" class="form-label">User ID</label>
                                                <input type="text" class="form-control" id="userId" name="userId" required>
                                                <div class="invalid-feedback">
                                                    Please provide a user ID.
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6 mb-3">
                                                <label for="name" class="form-label">Username</label>
                                                <input type="text" class="form-control" id="name" name="name" required>
                                                <div class="invalid-feedback">
                                                    Please provide a username.
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" class="form-control" id="email" name="email" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid email.
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6 mb-3">
                                                <label for="password" class="form-label">Password</label>
                                                <div class="input-group">
                                                    <input type="password" class="form-control" id="password" name="password" required>
                                                    <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                </div>
                                                <div class="invalid-feedback">
                                                    Please provide a password.
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for="userType" class="form-label">User Type</label>
                                            <select class="form-select" id="userType" name="userType" required>
                                                <option value="">Select User Type</option>
                                                <option value="admin">Admin</option>
                                                <option value="volunteer">Volunteer</option>
                                                <option value="donor">Donor</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Please select a user type.
                                            </div>
                                        </div>
                                        
                                        <div class="d-flex justify-content-end gap-2">
                                            <button type="button" class="btn btn-secondary" data-bs-toggle="collapse" data-bs-target="#addUserForm">
                                                Cancel
                                            </button>
                                            <button type="submit" name="add_user" class="btn btn-primary">
                                                <i class="fas fa-user-plus me-2"></i> Add User
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Delete User</h5>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="" class="needs-validation" novalidate>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Enter username to delete" id="username" name="username" required>
                                        <button type="submit" name="delete_user" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user? This action cannot be undone.');">
                                            <i class="fas fa-user-minus me-2"></i> Delete User
                                        </button>
                                    </div>
                                </form>
                                
                                <div class="alert alert-warning mt-3">
                                    <i class="fas fa-exclamation-triangle me-2"></i> Warning: Deleting a user is permanent and cannot be undone.
                                </div>
                            </div>
                        </div>
                        
                        <div class="card mt-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">User List</h5>
                                <div class="input-group" style="width: 300px;">
                                    <input type="text" class="form-control" placeholder="Search users...">
                                    <button class="btn btn-outline-secondary" type="button">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="alert alert-info">
                                    <i class="fas fa-info-circle me-2"></i> User list display requires implementing a method to fetch users from the database.
                                </div>
                                
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>User ID</th>
                                                <th>Username</th>
                                                <th>Email</th>
                                                <th>User Type</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="5" class="text-center">No users found</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Donations Tab -->
                    <div id="donations" class="tab-pane fade fade-in">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h2>Donations Management</h2>
                            <div class="btn-group">
                                <button class="btn btn-outline-primary">
                                    <i class="fas fa-filter me-2"></i> Filter
                                </button>
                                <button class="btn btn-outline-success">
                                    <i class="fas fa-download me-2"></i> Export
                                </button>
                            </div>
                        </div>
                        
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0">Recent Donations</h5>
                            </div>
                            <div class="card-body">
                                <div class="alert alert-info">
                                    <i class="fas fa-info-circle me-2"></i> Donation tracking functionality is under development.
                                </div>
                                
                                <div class="d-flex justify-content-center mt-3">
                                    <div class="spinner-border text-primary" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Reports Tab -->
                    <div id="reports" class="tab-pane fade fade-in">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h2>Generate Reports</h2>
                            <button class="btn btn-primary">
                                <i class="fas fa-plus me-2"></i> New Report
                            </button>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="mb-0">Available Reports</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="list-group">
                                            <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h6 class="mb-1">User Activity Report</h6>
                                                    <small class="text-muted">Track user logins and actions</small>
                                                </div>
                                                <span class="badge bg-primary rounded-pill">Generate</span>
                                            </a>
                                            <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h6 class="mb-1">Donation Summary</h6>
                                                    <small class="text-muted">Overview of donations by time period</small>
                                                </div>
                                                <span class="badge bg-primary rounded-pill">Generate</span>
                                            </a>
                                            <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h6 class="mb-1">Volunteer Hours</h6>
                                                    <small class="text-muted">Summary of volunteer contributions</small>
                                                </div>
                                                <span class="badge bg-primary rounded-pill">Generate</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6 mb-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="mb-0">Schedule Reports</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="alert alert-info">
                                            <i class="fas fa-info-circle me-2"></i> Report scheduling functionality is under development.
                                        </div>
                                        
                                        <form class="mt-3">
                                            <div class="mb-3">
                                                <label for="reportType" class="form-label">Report Type</label>
                                                <select class="form-select" id="reportType" disabled>
                                                    <option>Select report type</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="scheduleDate" class="form-label">Schedule Date</label>
                                                <input type="date" class="form-control" id="scheduleDate" disabled>
                                            </div>
                                            <div class="mb-3">
                                                <label for="frequency" class="form-label">Frequency</label>
                                                <select class="form-select" id="frequency" disabled>
                                                    <option>One-time</option>
                                                    <option>Daily</option>
                                                    <option>Weekly</option>
                                                    <option>Monthly</option>
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-primary" disabled>
                                                Schedule Report
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Logs Tab -->
                    <div id="logs" class="tab-pane fade fade-in">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h2>Activity Logs</h2>
                            <div class="btn-group">
                                <button class="btn btn-outline-secondary">
                                    <i class="fas fa-sync-alt me-2"></i> Refresh
                                </button>
                                <button class="btn btn-outline-primary">
                                    <i class="fas fa-filter me-2"></i> Filter
                                </button>
                            </div>
                        </div>
                        
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0">System Logs</h5>
                            </div>
                            <div class="card-body">
                                <div class="alert alert-info">
                                    <i class="fas fa-info-circle me-2"></i> Log viewing functionality is under development.
                                </div>
                                
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Timestamp</th>
                                                <th>User</th>
                                                <th>Action</th>
                                                <th>IP Address</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="5" class="text-center">No logs found</td>
                                            </tr>
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
    
    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Form validation
            const forms = document.querySelectorAll('.needs-validation');
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
            
            // Password toggle
            const togglePassword = document.getElementById('togglePassword');
            const password = document.getElementById('password');
            
            if (togglePassword && password) {
                togglePassword.addEventListener('click', function() {
                    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                    password.setAttribute('type', type);
                    this.querySelector('i').classList.toggle('fa-eye');
                    this.querySelector('i').classList.toggle('fa-eye-slash');
                });
            }
            
            // Mobile sidebar toggle
            const sidebarToggle = document.querySelector('.sidebar-toggle');
            const sidebarMenu = document.querySelector('.sidebar-menu');
            
            if (sidebarToggle && sidebarMenu) {
                sidebarToggle.addEventListener('click', function() {
                    sidebarMenu.classList.toggle('show');
                });
            }
            
            // Tab animations
            const tabs = document.querySelectorAll('.nav-link');
            tabs.forEach(tab => {
                tab.addEventListener('click', function() {
                    tabs.forEach(t => t.classList.remove('active'));
                    this.classList.add('active');
                    
                    // Close sidebar on mobile when tab is clicked
                    if (window.innerWidth < 768) {
                        sidebarMenu.classList.remove('show');
                    }
                });
            });
        });
    </script>
</body>
</html>