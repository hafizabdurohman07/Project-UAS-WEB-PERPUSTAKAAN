<?php
class User_model {
    private $table = 'users';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function login($username, $password) {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE username = :username");
        $this->db->bind('username', $username);
        $user = $this->db->single();

        if($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }
}
