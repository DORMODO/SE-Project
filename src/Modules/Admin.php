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
            $query = "INSERT INTO user (userId,name,password,userType, email) VALUES ('$userId', '$name', '$password', '$userType', '$email')";

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

    public function generateReport(string $format): Report // not yet implemented
    {
        if ($format === 'pdf') {
        } elseif ($format === 'excel') {
            // Generate Excel report
        }

        return new Report('', '', new \DateTime());
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
    public function viewUser(string $userId): ?array
    {
        if ($this->db->openConnection()) {
            $query = "SELECT * FROM user WHERE userId = '$userId'";
            $result = $this->db->connection->query($query);
            if ($result->num_rows > 0) {
                return $result[0];
            }
        }
        return null;
    }

    public function viewDonationRecords(): array
    { /* TODO */
        return [];
    }
    public function verifyDonation(string $donationID): bool
    { /* TODO */
        return false;
    }
    public function verifyPayment(string $paymentID): bool
    { /* TODO */
        return false;
    }
    public function trackDonation(string $donationId): ?Donation
    { /* TODO */
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
}
