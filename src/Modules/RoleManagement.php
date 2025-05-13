<?php
class RoleManagement
{
  private $db;
  private $validRoles = ['admin', 'donor', 'volunteer', 'event_manager', 'accountant'];

  public function __construct($db)
  {
    $this->db = $db;
  }

  public function assignRole($userId, $role)
  {
    if (!in_array($role, $this->validRoles)) {
      throw new Exception("Invalid role specified");
    }

    $query = "UPDATE users SET role = ? WHERE id = ?";
    return $this->db->execute($query, [$role, $userId]);
  }

  public function getUserRole($userId)
  {
    $query = "SELECT role FROM users WHERE id = ?";
    return $this->db->fetchOne($query, [$userId]);
  }

  public function getRolePermissions($role)
  {
    $permissions = [
      'admin' => [
        'manage_users' => true,
        'manage_donations' => true,
        'manage_events' => true,
        'manage_volunteers' => true,
        'view_reports' => true
      ],
      'donor' => [
        'make_donation' => true,
        'view_donation_history' => true,
        'update_profile' => true
      ],
      'volunteer' => [
        'view_events' => true,
        'join_event' => true,
        'update_profile' => true,
        'view_schedule' => true
      ],
      'event_manager' => [
        'create_event' => true,
        'manage_event' => true,
        'manage_volunteers' => true,
        'view_reports' => true
      ],
      'accountant' => [
        'view_donations' => true,
        'manage_transactions' => true,
        'generate_reports' => true
      ]
    ];

    return isset($permissions[$role]) ? $permissions[$role] : [];
  }
}
