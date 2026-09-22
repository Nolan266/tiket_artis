<?php

require_once "../config/database.php";

class Transaksi
{
    private $db;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->connect();
    }

    public function tambah($tiketId, $jumlah, $total, $bayar, $kembalian)
    {
        $query = "INSERT INTO transaksi
                  (tiket_id, jumlah, total, bayar, kembalian)
                  VALUES
                  ('$tiketId', '$jumlah', '$total', '$bayar', '$kembalian')";

        return $this->db->query($query);
    }
}