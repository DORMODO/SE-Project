<?php
class DBController {  
    public $dbHost = "localhost";  
    public $dbUser = "root";  
    public $dbPassword = "";  
    public $dbName = "charity";  
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

    public function closeConnection(){  
        if ($this->connection){ 
            $this->connection->close(); 
        } 
        else {  
            echo "connection is closed"; 
        } 
    } 
    public function select($query) {  
        $result = $this->connection->query($query);  
        if ($result) { 
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {  
            echo "Error: " . $this->connection->error;  
            return false;  
        }  
    }
public function insert($query) {  
    $result = $this->connection->query($query);  
    if ($result === TRUE) {  
        return true;  
    } else {  
        echo "Error: " . $this->connection->error;  
        return false;  
    }  
}

}
?>