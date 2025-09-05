<?php
session_start();
require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../models/User.php';

class AuthController {
    private $db;
    private $user;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->user = new User($this->db);
    }

    public function register($username, $password) {
        $this->user->username = $username;
        $this->user->password = $password;
        return $this->user->register();
    }

    public function login($username, $password) {
        $this->user->username = $username;
        $this->user->password = $password;
        $user = $this->user->login();
        if ($user) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            return true;
        }
        return false;
    }

    public function logout() {
        session_destroy();
        header("Location: /views/auth/login.php");
        exit;
    }
}
