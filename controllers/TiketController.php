<?php

require_once "../models/Tiket.php";
require_once "../models/Artis.php";

class TiketController
{
    private $tiket;
    private $artis;

    public function __construct()
    {
        $this->tiket = new Tiket();
        $this->artis = new Artis();
    }

    public function index()
    {
        $data = $this->tiket->getAll();

        include "../views/tiket/index.php";
    }

    public function tambah()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $artisId = $_POST['artis_id'];
            $jenisTiket = $_POST['jenis_tiket'];
            $harga = $_POST['harga'];
            $stok = $_POST['stok'];

            $this->tiket->tambah(
                $artisId,
                $jenisTiket,
                $harga,
                $stok
            );

            header("Location: index.php?page=produk_tiket");
            exit;
        }

        $artis = $this->artis->getAll();

        include "../views/tiket/tambah.php";
    }

    public function edit()
    {
        $id = $_GET['id'];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $artisId = $_POST['artis_id'];
            $jenisTiket = $_POST['jenis_tiket'];
            $harga = $_POST['harga'];
            $stok = $_POST['stok'];

            $this->tiket->update(
                $id,
                $artisId,
                $jenisTiket,
                $harga,
                $stok
            );

            header("Location: index.php?page=produk_tiket");
            exit;
        }

        $tiket = $this->tiket->getById($id);
        $artis = $this->artis->getAll();

        include "../views/tiket/edit.php";
    }

    public function hapus()
    {
        $id = $_GET['id'];

        $this->tiket->hapus($id);

        header("Location: index.php?page=produk_tiket");
        exit;
    }
}