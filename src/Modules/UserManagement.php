<?php
class UserManagement
{
  private $db;
  private $roleManager;

  public function __construct($db)
  {
    $this->db = $db;
    $this->roleManager = new RoleManagement($db);
  }

  public function createUser($userData)
  {
    // Validate required fields
    $requiredFields = ['username', 'email', 'password', 'role'];
    foreach ($requiredFields as $field) {
      if (!isset($userData[$field])) {
        throw new Exception("Missing required field: $field");
      }
    }

    // Hash password
    $hashedPassword = password_hash($userData['password'], PASSWORD_DEFAULT);

    $query = "INSERT INTO users (username, email, password, role, created_at) 
                 VALUES (?, ?, ?, ?, NOW())";

    return $this->db->execute($query, [
      $userData['username'],
      $userData['email'],
      $hashedPassword,
      $userData['role']
    ]);
  }

  public function updateUser($userId, $userData)
  {
    $allowedFields = ['username', 'email', 'role', 'status'];
    $updates = [];
    $params = [];

    foreach ($allowedFields as $field) {
      if (isset($userData[$field])) {
        $updates[] = "$field = ?";
        $params[] = $userData[$field];
      }
    }

    if (isset($userData['password'])) {
      $updates[] = "password = ?";
      $params[] = password_hash($userData['password'], PASSWORD_DEFAULT);
    }

    if (empty($updates)) {
      return false;
    }

    $params[] = $userId;
    $query = "UPDATE users SET " . implode(', ', $updates) . " WHERE id = ?";

    return $this->db->execute($query, $params);
  }

  public function deleteUser($userId)
  {
    $query = "UPDATE users SET status = 'inactive', deleted_at = NOW() WHERE id = ?";
    return $this->db->execute($query, [$userId]);
  }

  public function searchUsers($criteria)
  {
    $where = [];
    $params = [];

    if (isset($criteria['role'])) {
      $where[] = "role = ?";
      $params[] = $criteria['role'];
    }

    if (isset($criteria['status'])) {
      $where[] = "status = ?";
      $params[] = $criteria['status'];
    }

    if (isset($criteria['search'])) {
      $where[] = "(username LIKE ? OR email LIKE ?)";
      $params[] = "%{$criteria['search']}%";
      $params[] = "%{$criteria['search']}%";
    }

    $whereClause = !empty($where) ? "WHERE " . implode(' AND ', $where) : "";
    $query = "SELECT * FROM users $whereClause ORDER BY created_at DESC";

    return $this->db->fetchAll($query, $params);
  }

  public function getUserById($userId)
  {
    $query = "SELECT * FROM users WHERE id = ?";
    return $this->db->fetchOne($query, [$userId]);
  }
}
