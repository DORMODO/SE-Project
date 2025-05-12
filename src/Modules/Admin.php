<?php
// to include User we write 
include_once 'User.php';
include __DIR__ . '/../Controllers/DBController.php';
class Admin extends User
{
    public $db;

    public function __construct()
    {
        // Initialize the DBController instance in the constructor
        $this->db = new DBController();
    }

    public function addUser($userId, $name,  $password, $userType, $email): bool
    {

        // Check if the connection is established
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
        // Check if the connection is established
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

    public function editUser(string $userId): bool
    { /* TODO */
        return false;
    }
    public function generateReport(string $format): Report
    { /* TODO */
        return new Report('', '', new \DateTime());
    }
    public function setScheduleReporting(\DateTime $date, string $reportType): bool
    { /* TODO */
        return false;
    }
    public function assignTask(string $volId, string $taskId): bool
    { /* TODO */
        return false;
    }
    public function viewLogs(): array
    { /* TODO */
        return [];
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
