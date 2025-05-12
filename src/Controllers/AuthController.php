<?php 

include_once __DIR__ . '/../Modules/User.php';  
include_once __DIR__ . '/DBController.php';  

class AuthController  
{ 
    private $db; 

    public function __construct() { 
        $this->db = new DBController(); 
        if (!$this->db->openConnection()) { 
            die("Database connection failed."); 
        } 
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    } 

    public function login(User $user) { 
        $query = "SELECT * FROM user WHERE email = '".$user->getEmail()."' AND password = '".$user->getPassword()."'"; 
        $result = $this->db->select($query); 

        if (is_array($result)) { 
            if (count($result) === 0) { 
                $_SESSION['err_msg'] = "Invalid email or password"; 
                return false; 
            } else { 
                $_SESSION['userId'] = $result[0]["userId"]; 
                $_SESSION['userName'] = $result[0]["name"]; 
                $_SESSION['userEmail'] = $result[0]["email"]; 
                $_SESSION['userRole'] = $result[0]["userRole"]; 
                return true; 
            } 
        } else { 
            $_SESSION['err_msg'] = "Query execution failed."; 
            return false; 
        } 
    } 

    public function register(User $user) { 
        $query = "INSERT INTO user (name, password, email) 
                  VALUES ('".$user->getName()."', '".$user->getPassword()."', '".$user->getEmail()."')"; 
        $result = $this->db->connection->query($query); 

        if ($result) { 
            echo "Registration successful"; 
            return true; 
        } else { 
            $_SESSION['err_msg'] = "Error: " . $this->db->connection->error; 
            return false; 
        } 
    } 

    // public function __destruct() {
    //     $this->db->closeConnection();
    // }
}
?>
