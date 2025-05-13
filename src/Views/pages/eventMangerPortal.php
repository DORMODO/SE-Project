<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Manager Portal</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #1b4332;
        }

        body {
            background-color: #f8f9fa;
            padding-top: 70px;
        }

        .dashboard-header {
            background-color: var(--primary-color);
            color: white;
            padding: 2rem 0;
            margin-bottom: 2rem;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            margin-bottom: 1.5rem;
        }

        .card-header {
            background-color: var(--primary-color);
            color: white;
            border-radius: 10px 10px 0 0 !important;
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-primary:hover {
            background-color: #15352a;
            border-color: #15352a;
        }

        .stats-card {
            text-align: center;
            padding: 1.5rem;
        }

        .stats-icon {
            font-size: 2rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <?php include_once '../assets/components/navbar.php'; ?>

    <!-- Main Content -->
    <div class="container">
        <!-- Stats Row -->
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card stats-card">
                    <i class="fas fa-calendar-alt stats-icon"></i>
                    <h3>12</h3>
                    <p class="text-muted mb-0">Active Events</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card stats-card">
                    <i class="fas fa-users stats-icon"></i>
                    <h3>245</h3>
                    <p class="text-muted mb-0">Total Attendees</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card stats-card">
                    <i class="fas fa-envelope stats-icon"></i>
                    <h3>89</h3>
                    <p class="text-muted mb-0">Invitations Sent</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card stats-card">
                    <i class="fas fa-check-circle stats-icon"></i>
                    <h3>56</h3>
                    <p class="text-muted mb-0">Confirmed RSVPs</p>
                </div>
            </div>
        </div>

        <!-- Events Management Section -->
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Upcoming Events</h5>
                            <button class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#createEventModal">
                                <i class="fas fa-plus me-2"></i>Create Event
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Event Name</th>
                                        <th>Date</th>
                                        <th>Attendees</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Summer Fundraiser</td>
                                        <td>Aug 15, 2024</td>
                                        <td>45</td>
                                        <td><span class="badge bg-success">Active</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary me-1">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Charity Gala</td>
                                        <td>Sep 20, 2024</td>
                                        <td>78</td>
                                        <td><span class="badge bg-warning">Pending</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary me-1">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Quick Actions</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary">
                                <i class="fas fa-envelope me-2"></i>Send Invitations
                            </button>
                            <button class="btn btn-outline-primary">
                                <i class="fas fa-file-export me-2"></i>Export Reports
                            </button>
                            <button class="btn btn-outline-primary">
                                <i class="fas fa-cog me-2"></i>Settings
                            </button>
                        </div>
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="card-header">
                        <h5 class="mb-0">Recent Activity</h5>
                    </div>
                    <div class="card-body">
                        <div class="activity-feed">
                            <div class="mb-3">
                                <small class="text-muted">2 hours ago</small>
                                <p class="mb-0">New event "Summer Fundraiser" created</p>
                            </div>
                            <div class="mb-3">
                                <small class="text-muted">5 hours ago</small>
                                <p class="mb-0">15 new RSVPs received</p>
                            </div>
                            <div class="mb-3">
                                <small class="text-muted">1 day ago</small>
                                <p class="mb-0">Event "Spring Gala" completed</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Event Modal -->
    <div class="modal fade" id="createEventModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create New Event</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="createEventForm" class="needs-validation" novalidate>
                        <div class="mb-3">
                            <label for="eventName" class="form-label">Event Name</label>
                            <input type="text" class="form-control" id="eventName" required>
                        </div>
                        <div class="mb-3">
                            <label for="eventDate" class="form-label">Date</label>
                            <input type="date" class="form-control" id="eventDate" required>
                        </div>
                        <div class="mb-3">
                            <label for="eventLocation" class="form-label">Location</label>
                            <input type="text" class="form-control" id="eventLocation" required>
                        </div>
                        <div class="mb-3">
                            <label for="eventDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="eventDescription" rows="3" required></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" form="createEventForm" class="btn btn-primary">Create Event</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include_once '../assets/components/footer.php'; ?>
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Form validation
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('createEventForm');

            form.addEventListener('submit', function(event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    </script>
</body>

</html>