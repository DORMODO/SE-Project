<?php
class DBController
{
    public $dbHost = "localhost";
    public $dbUser = "root";
    public $dbPassword = "";
    public $dbName = "charity";
    public $connection;

    public function openConnection()
    {
        $this->connection = new mysqli(
            $this->dbHost,
            $this->dbUser,
            $this->dbPassword,
            $this->dbName
        );

        if ($this->connection->connect_error) {
            echo "Connection Error: " . $this->connection->connect_error;
            return false;
        }
        return true;
    }

    public function closeConnection()
    {
        if ($this->connection) {
            $this->connection->close();
        } else {
            echo "connection is closed";
        }
    }
    public function select($query)
    {
        $result = $this->connection->query($query);
        if ($result === TRUE) {
            $result->fetch_all(MYSQLI_ASSOC);
            return true;
        } else {
            echo "Error: " . mysqli_error($this->connection);
            return false;
        }
    }
}
