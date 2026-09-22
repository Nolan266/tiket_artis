<?php

require_once "../config/database.php";

class Artis
{
    private $db;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->connect();
    }

    public function getAll()
    {
        $query = "SELECT * FROM artis ORDER BY id DESC";

        return $this->db->query($query);
    }

    public function getById($id)
    {
        $query = "SELECT * FROM artis WHERE id = $id";

        return $this->db->query($query)->fetch_assoc();
    }

    public function tambah($nama)
    {
        $query = "INSERT INTO artis (nama_artis)
                  VALUES ('$nama')";

        return $this->db->query($query);
    }

    public function update($id, $nama)
    {
        $query = "UPDATE artis
                  SET nama_artis='$nama'
                  WHERE id=$id";

        return $this->db->query($query);
    }

    public function hapus($id)
    {
        $query = "DELETE FROM artis WHERE id=$id";

        return $this->db->query($query);
    }
}