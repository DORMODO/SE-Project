<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <style>
            body {
                background-color: #f8f9fa;
                font-family: Arial, sans-serif;
            }
            h1 {
                color: #343a40;
                font-weight: bold;
                text-transform: uppercase;
                letter-spacing: 1px;
                margin-bottom: 30px;
            }
            .list-group-item {
                font-size: 1.1rem;
                font-weight: 500;
                color: #495057;
                transition: all 0.3s ease;
            }
            .list-group-item:hover {
                background-color: #007bff;
                color: white;
                transform: scale(1.02);
            }
            .list-group-item:active {
                background-color: #0056b3;
                color: white;
            }
            .container {
                background: white;
                padding: 30px;
                border-radius: 10px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }
        </style>
        <h1 class="text-center">Admin Panel</h1>
        <div class="row mt-4">
            <div class="col-md-6 offset-md-3">
                <div class="list-group">
                    <button href ="#" class="list-group-item list-group-item-action" id="viewUsers">View Users</button>
                    <button href="#" class="list-group-item list-group-item-action" id="manageDonations">Manage Donations</button>
                    <button href="#" class="list-group-item list-group-item-action" id="viewReports">View Reports</button>
                    <button href="#" class="list-group-item list-group-item-action" id="editUser">Edit User</button>
                    <button href="#" class="list-group-item list-group-item-action" id="assignTask">Assign Task</button>
                    <button href="#" class="list-group-item list-group-item-action" id="viewLogs">View Logs</button>
                    <button href="#" class="list-group-item list-group-item-action" id="viewDonationRecords">View Donation Records</button>
                    <button href="#" class="list-group-item list-group-item-action" id="verifyDonation">Verify Donation</button>
                    <button href="#" class="list-group-item list-group-item-action" id="verifyPayment">Verify Payment</button>
                    <button href="#" class="list-group-item list-group-item-action" id="trackDonation">Track Donation</button>
                    <button href="#" class="list-group-item list-group-item-action" id="refundDonation">Refund Donation</button>
                    <button href="#" class="list-group-item list-group-item-action" id="approveUser">Approve User</button>
                </div>
            </div>
        </div>
    </div>

</body>
</html>