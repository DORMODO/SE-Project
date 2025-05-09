<?php 
class DBController { 
    public $dbHost = "localhost"; 
    public $dbUser = "root"; 
    public $dbPassword = ""; 
    public $dbName = ""; 
    public $connection; 
    
    public function openConnection() { 
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
} 
?>
