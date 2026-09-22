<?php

class Database
{
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "tiket_mvc";

    public function connect()
    {
        $conn = new mysqli(
            $this->host,
            $this->username,
            $this->password,
            $this->database
        );

        if ($conn->connect_error) {
            die("Koneksi gagal: " . $conn->connect_error);
        }

        $conn->query("SET time_zone = '+07:00'");

        return $conn;
    }
}