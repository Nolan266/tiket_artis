<?php

require_once "../models/Artis.php";

class ArtisController
{
    private $artis;

    public function __construct()
    {
        $this->artis = new Artis();
    }

    public function index()
    {
        $data = $this->artis->getAll();

        include "../views/artis/index.php";
    }

    public function tambah()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $nama = $_POST['nama_artis'];

            $this->artis->tambah($nama);

            header("Location: index.php?page=artis");
            exit;
        }

        include "../views/artis/tambah.php";
    }

    public function edit()
    {
        $id = $_GET['id'];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $nama = $_POST['nama_artis'];

            $this->artis->update($id, $nama);

            header("Location: index.php?page=artis");
            exit;
        }

        $artis = $this->artis->getById($id);

        include "../views/artis/edit.php";
    }

    public function hapus()
    {
        $id = $_GET['id'];

        $this->artis->hapus($id);

        header("Location: index.php?page=artis");
        exit;
    }
}