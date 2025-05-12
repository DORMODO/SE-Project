<?php
include_once 'PlateFormUser.php';

class User implements PlateFormUser
{
    private string $userId;
    private string $name;
    private string $email;
    private string $password;
    private string $userType;
    private bool   $loggedIn = false;

    public function __construct(string $userId, string $name, string $email, string $userType, string $password)
    {
        $this->userId   = $userId;
        $this->name     = $name;
        $this->email    = $email;
        $this->userType = $userType;
        $this->password = $password;
    }

    public function login(string $userName, string $password): bool
    {
        // TODO
        return false;
    }

    public function updateProfile(array $newData): bool
    {
        // TODO
        return false;
    }

    public function logout(): bool
    {
        $this->loggedIn = false;
        return true;
    }

    public function deleteAccount(string $password): bool
    {
        // TODO
        return false;
    }

    // PlateformUser methods
    public function register(array $userData): bool
    { /* TODO */
        return false;
    }

    // Getters & Setters
    public function getUserId(): string
    {
        return $this->userId;
    }
    public function setUserId(string $id): void
    {
        $this->userId = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function isLoggedIn(): bool
    {
        return $this->loggedIn;
    }
    public function setLoggedIn(bool $flag): void
    {
        $this->loggedIn = $flag;
    }
    public function getUserType(): string
    {
        return $this->userType;
    }
    public function setUserType(string $userType): void
    {
        $this->userType = $userType;
    }
}
