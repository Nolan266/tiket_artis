<?php

require_once "../models/Tiket.php";
require_once "../models/Transaksi.php";

class TransaksiController
{
    private $tiket;
    private $transaksi;

    public function __construct()
    {
        $this->tiket = new Tiket();
        $this->transaksi = new Transaksi();
    }

    public function index()
    {
        $data = $this->tiket->getAll();

        include "../views/transaksi/index.php";
    }

    public function proses()
    {
        $tiketId = (int) $_POST['tiket_id'];
        $jumlah = (int) $_POST['jumlah'];
        $bayar = (int) $_POST['bayar'];

        $tiket = $this->tiket->getById($tiketId);

        $harga = (int) $tiket['harga'];
        $stok = (int) $tiket['stok'];

        // Cek stok
        if ($jumlah > $stok) {
            ?>
            <!DOCTYPE html>
            <html>

            <head>
                <title>Stok Kurang</title>
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            </head>

            <body>

            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'STOK TIKET KURANG!',
                    text: 'Stok <?= $tiket['jenis_tiket']; ?> hanya tersedia <?= $stok; ?>.',
                    confirmButtonText: 'Kembali'
                }).then(() => {
                    window.location.href = 'index.php?page=transaksi';
                });
            </script>

            </body>
            </html>
            <?php
            exit;
        }

        // Harga normal
        $hargaNormal = $harga * $jumlah;

        // Default tidak ada diskon
        $diskon = 0;
        $total = $hargaNormal;

        // Diskon 5% jika membeli 5-9 tiket
        if ($jumlah >= 5 && $jumlah < 10) {

            $diskon = $hargaNormal * 0.05;

            $total = $hargaNormal - $diskon;
        }

        // Diskon 10% jika membeli 10 tiket atau lebih
        elseif ($jumlah >= 10) {

            $diskon = $hargaNormal * 0.10;

            $total = $hargaNormal - $diskon;
        }

        // Cek uang pembayaran
        if ($bayar < $total) {
            ?>
            <!DOCTYPE html>
            <html>

            <head>
                <title>Pembayaran Kurang</title>
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            </head>

            <body>

            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'UANG TIDAK CUKUP!',
                    text: 'Uang pembayaran kurang dari total pembelian tiket.',
                    confirmButtonText: 'Kembali'
                }).then(() => {
                    window.location.href = 'index.php?page=transaksi';
                });
            </script>

            </body>
            </html>
            <?php
            exit;
        }

        // Hitung kembalian
        $kembalian = $bayar - $total;

        // Simpan transaksi
        $this->transaksi->tambah(
            $tiketId,
            $jumlah,
            $total,
            $bayar,
            $kembalian
        );

        // Tampilkan hasil
        include "../views/transaksi/hasil.php";
    }
}