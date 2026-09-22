<?php

require_once "../config/database.php";

class Tiket
{
    private $db;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->connect();
    }

    public function getAll()
    {
        $query = "SELECT tiket.*, artis.nama_artis
                  FROM tiket
                  JOIN artis ON tiket.artis_id = artis.id
                  ORDER BY tiket.id DESC";

        return $this->db->query($query);
    }

    public function getById($id)
    {
        $query = "SELECT tiket.*, artis.nama_artis
                  FROM tiket
                  JOIN artis ON tiket.artis_id = artis.id
                  WHERE tiket.id = $id";

        return $this->db->query($query)->fetch_assoc();
    }

    public function tambah($artisId, $jenisTiket, $harga, $stok)
    {
        $query = "INSERT INTO tiket
                  (artis_id, jenis_tiket, harga, stok)
                  VALUES
                  ('$artisId', '$jenisTiket', '$harga', '$stok')";

        return $this->db->query($query);
    }

    public function update($id, $artisId, $jenisTiket, $harga, $stok)
    {
        $query = "UPDATE tiket
                  SET
                    artis_id='$artisId',
                    jenis_tiket='$jenisTiket',
                    harga='$harga',
                    stok='$stok'
                  WHERE id=$id";

        return $this->db->query($query);
    }

    public function hapus($id)
    {
        $query = "DELETE FROM tiket WHERE id=$id";

        return $this->db->query($query);
    }
}