<?php

use DateTime;

include_once 'User.php';
include __DIR__ . '/../Controllers/DBController.php';
class Admin extends User
{
    public $db;

    public function __construct()
    {
        $this->db = new DBController();
    }

    public function addUser($userId, $name,  $password, $userType, $email): bool
    {

        if ($this->db->openConnection()) {
            $query = "INSERT INTO user (user_Id,name,password,user_Type, email) VALUES ('$userId', '$name', '$password', '$userType', '$email')";

            if ($this->db->connection->query($query) === TRUE) {
                echo '<script>alert("User added successfully!");</script>';
                return true;
            } else {
                echo '<script>alert("Error: ' . $this->db->connection->error . '");</script>';
                return false;
            }
        }
        return false;
    }


    public function deleteUser($username): bool
    {
        if ($this->db->openConnection()) {
            $query = "DELETE FROM user WHERE name = '$username'";

            if ($this->db->connection->query($query) === TRUE) {
                echo '<script>alert("User deleted successfully!");</script>';
                return true;
            } else {
                echo '<script>alert("Error: ' . $this->db->connection->error . '");</script>';
                return false;
            }
        }
        return false;
    }

    public function editUser(string $userId, string $name, string $password, string $email): bool
    {
        if ($this->db->openConnection()) {
            $query = "UPDATE user SET name = '$name', password = '$password', email = '$email' WHERE userId = '$userId'";

            if ($this->db->connection->query($query) === TRUE) {
                echo '<script>alert("User updated successfully!");</script>';
                return true;
            } else {
                echo '<script>alert("Error: ' . $this->db->connection->error . '");</script>';
                return false;
            }
        }
        return false;
    }

    public function generateReport(string $format): bool
    {
        if ($format === 'pdf') {
        } elseif ($format === 'excel') {
            // Generate Excel report
        }

        return true;
    }
    public function setScheduleReporting(\DateTime $date, string $reportType): bool
    {

        return false;
    }
    public function assignTask(string $task_Id, string $campaign_Id, string $description, DateTime $due_date): bool
    {

        if ($this->db->openConnection()) {
            $query = "INSERT INTO task (task_Id,campaign_Id,description,due_date) VALUES ('$task_Id', '$campaign_Id', '$description',  '$due_date')";

            if ($this->db->connection->query($query) === TRUE) {
                echo '<script>alert("Task added successfully!");</script>';
                return true;
            } else {
                echo '<script>alert("Error: ' . $this->db->connection->error . '");</script>';
                return false;
            }
        }
        return false;
    }
    public function viewLogs(): array
    {
        if ($this->db->openConnection()) {
            $query = "SELECT * FROM user";
            $result = $this->db->connection->query($query);
            $logs = [];
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $logs[] = $row;
                }
            }
            return $logs;
        }

        return [];
    }
    public function viewUsers(string $userName): ?array
    {
        if ($this->db->openConnection()) {
            $query = "SELECT * FROM user WHERE name = '$userName'";
            $result = $this->db->connection->query($query);

            return $result->fetch_assoc();
        }
        return null;
    }

    public function viewDonationRecords(): array
    {
        if ($this->db->openConnection()) {
            $query = "SELECT * FROM donations";
            $result = $this->db->connection->query($query);
            $donations = [];
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $donations[] = $row;
                }
            }
            return $donations;
        }

        return [];
    }

    public function verifyDonation(string $donationID): bool // not yet
    {


        return false;
    }

    public function verifyPayment(string $paymentID): bool // not yet
    { /* TODO */
        return false;
    }

    public function trackDonation(string $donationId): ?Donation
    {
        return null;
    }
    public function refundDonation(string $donationId): bool
    { /* TODO */
        return false;
    }
    public function approveUser(string $userId): bool
    { /* TODO */
        return false;
    }

    public function createNotification(int $userId, string $message): bool
    {
        if ($this->db->openConnection()) {
            $query = "INSERT INTO notifications (userId, message, isRead, createdAt) 
                      VALUES ('$userId', '$message', 0, NOW())";

            if ($this->db->connection->query($query) === TRUE) {
                return true;
            } else {
                echo '<script>alert("Error: ' . $this->db->connection->error . '");</script>';
                return false;
            }
        }
        return false;
    }
   
    public function makeDonation(int $userId, float $amount): bool
    {
        if ($this->db->openConnection()) {
            $query = "INSERT INTO donations (userId, amount, createdAt) 
                      VALUES ('$id', '$donor_name','$email','$amount','$amount', NOW())";

            if ($this->db->connection->query($query) === TRUE) {
                // Create a notification for the donor
                $message = "Thank you for your donation of $$amount!";
                $this->createNotification($userId, $message);

                echo '<script>alert("Donation successful!");</script>';
                return true;
            } else {
                echo '<script>alert("Error: ' . $this->db->connection->error . '");</script>';
                return false;
            }
        }
        return false;
    }
    public function getNotifications(int $userId): array
    {
        if ($this->db->openConnection()) {
            $query = "SELECT * FROM notifications WHERE userId = '$userId' ORDER BY createdAt DESC";
            $result = $this->db->connection->query($query);
            $notifications = [];
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $notifications[] = $row;
                }
            }
            return $notifications;
        }
        return [];
    }
    public function markNotificationAsRead(int $notificationId): bool
    {
        if ($this->db->openConnection()) {
            $query = "UPDATE notifications SET isRead = 1 WHERE notificationId = '$notificationId'";
            return $this->db->connection->query($query) === TRUE;
        }
        return false;
    }
}

$admin = new Admin();
$userId = 1; // Replace with the logged-in user's ID
$notifications = $admin->getNotifications($userId);

foreach ($notifications as $notification) {
    echo "<p>{$notification['message']} - {$notification['createdAt']}</p>";
    if ($notification['isRead'] == 0) {
        echo "<a href='markAsRead.php?id={$notification['notificationId']}'>Mark as Read</a>";
    }
}
