<?php

class Notification
{
    public $db;

    private string    $notificationId;
    private string    $recipientId;
    private string    $message;
    private \DateTime $date;



    public function createNotification($recipient_Id, $date, $message): bool
    {
        if ($this->db->openConnection()) {
            $query = "INSERT INTO notifications (recipient_Id,date ,message ) 
                      VALUES ('$recipient_Id', '$date', '$message'";

            if ($this->db->connection->query($query) === TRUE) {
                return true;
            } else {
                echo '<script>alert("Error: ' . $this->db->connection->error . '");</script>';
                return false;
            }
        }
        return false;
    }
    public function view(): string
    {
        return $this->message;
    }

    // Getters & Setters...
}
