<?php

session_start();

require_once "../controllers/ArtisController.php";
require_once "../controllers/TiketController.php";
require_once "../controllers/TransaksiController.php";
require_once "../controllers/AuthController.php";

$authController = new AuthController();

$page = $_GET['page'] ?? 'artis';

// =========================
// HALAMAN YANG TIDAK PERLU LOGIN
// =========================

$halamanPublik = ['login', 'register'];

if (!in_array($page, $halamanPublik) && empty($_SESSION['user_id'])) {
    header("Location: index.php?page=login");
    exit;
}

switch ($page) {

    // =========================
    // AUTH
    // =========================

    case 'login':
        $authController->login();
        break;

    case 'register':
        $authController->register();
        break;

    case 'logout':
        $authController->logout();
        break;


    // =========================
    // ARTIS
    // =========================

    case 'artis':
        $artisController = new ArtisController();
        $artisController->index();
        break;

    case 'tambah_artis':
        $artisController = new ArtisController();
        $artisController->tambah();
        break;

    case 'edit_artis':
        $artisController = new ArtisController();
        $artisController->edit();
        break;

    case 'hapus_artis':
        $artisController = new ArtisController();
        $artisController->hapus();
        break;


    // =========================
    // TIKET
    // =========================

    case 'produk_tiket':
        $tiketController = new TiketController();
        $tiketController->index();
        break;

    case 'tambah_tiket':
        $tiketController = new TiketController();
        $tiketController->tambah();
        break;

    case 'edit_tiket':
        $tiketController = new TiketController();
        $tiketController->edit();
        break;

    case 'hapus_tiket':
        $tiketController = new TiketController();
        $tiketController->hapus();
        break;


    // =========================
    // TRANSAKSI / PEMBELIAN
    // =========================

    case 'transaksi':
        $transaksiController = new TransaksiController();
        $transaksiController->index();
        break;

    case 'proses_transaksi':
        $transaksiController = new TransaksiController();
        $transaksiController->proses();
        break;


    // =========================
    // HALAMAN TIDAK DITEMUKAN
    // =========================

    default:
        echo "Halaman tidak ditemukan.";
        break;
}
