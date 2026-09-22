<?php

require_once "../config/database.php";

class User
{
    private $db;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->connect();
    }

    public function getByUsername($username)
    {
        $username = $this->db->real_escape_string($username);

        $query = "SELECT * FROM users WHERE username = '$username'";

        return $this->db->query($query)->fetch_assoc();
    }

    public function tambah($username, $passwordHash)
    {
        $username = $this->db->real_escape_string($username);
        $passwordHash = $this->db->real_escape_string($passwordHash);

        $query = "INSERT INTO users (username, password)
                  VALUES ('$username', '$passwordHash')";

        return $this->db->query($query);
    }
}
