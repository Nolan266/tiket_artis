<!DOCTYPE html>
<html>

<head>
    <title>Hasil Pembelian Tiket</title>
    <link rel="stylesheet" href="style.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

<?php date_default_timezone_set('Asia/Jakarta'); ?>

<div class="topbar">
    Login sebagai <strong><?= $_SESSION['username']; ?></strong>
    &middot;
    <a class="logout-link" href="index.php?page=logout">Logout</a>
</div>

<div class="struk-wrapper">

    <div class="struk">

        <h1>TIKET KONSER</h1>
        <div class="struk-sub">Bukti Pembelian Tiket</div>

        <hr>

        <div class="struk-row">
            <span>Artis</span>
            <span><?= $tiket['nama_artis']; ?></span>
        </div>

        <div class="struk-row">
            <span>Jenis Tiket</span>
            <span><?= $tiket['jenis_tiket']; ?></span>
        </div>

        <div class="struk-row">
            <span>Tanggal</span>
            <span><?= date('d/m/Y H:i:s'); ?></span>
        </div>

        <hr>

        <div class="struk-row">
            <span>Harga Satuan</span>
            <span>Rp <?= number_format($harga, 0, ',', '.'); ?></span>
        </div>

        <div class="struk-row">
            <span>Jumlah</span>
            <span><?= $jumlah; ?></span>
        </div>

        <div class="struk-row">
            <span>Harga Normal</span>
            <span>Rp <?= number_format($hargaNormal, 0, ',', '.'); ?></span>
        </div>

        <?php if ($diskon > 0): ?>

            <div class="struk-row text-green">
                <span>Diskon (<?= $jumlah; ?> tiket)</span>
                <span>- Rp <?= number_format($diskon, 0, ',', '.'); ?></span>
            </div>

        <?php else: ?>

            <div class="struk-row">
                <span>Diskon</span>
                <span>Tidak ada</span>
            </div>

        <?php endif; ?>

        <hr>

        <div class="struk-total">
            <div class="struk-row">
                <span>TOTAL</span>
                <span>Rp <?= number_format($total, 0, ',', '.'); ?></span>
            </div>
        </div>

        <div class="struk-row">
            <span>Bayar</span>
            <span>Rp <?= number_format($bayar, 0, ',', '.'); ?></span>
        </div>

        <?php if ($kembalian < 0): ?>

            <div class="struk-note bad">
                Uang pembayaran kurang!
            </div>

        <?php else: ?>

            <div class="struk-row">
                <span>Kembalian</span>
                <span>Rp <?= number_format($kembalian, 0, ',', '.'); ?></span>
            </div>

            <div class="struk-note ok">
                Pembelian tiket berhasil!
            </div>

            <script>

                Swal.fire({
                    icon: 'success',
                    title: 'Pembelian Tiket Berhasil!',
                    text: 'Kembalian: Rp <?= number_format($kembalian, 0, ',', '.'); ?>',
                    confirmButtonText: 'OK'
                });

            </script>

        <?php endif; ?>

        <div class="struk-footer">
            *** Terima kasih telah membeli tiket ***
        </div>

    </div>

</div>

<div class="struk-actions">

    <a class="btn" href="index.php?page=transaksi">
        Beli Tiket Lagi
    </a>

    <a class="btn btn-secondary" href="index.php?page=produk_tiket">
        Data Tiket
    </a>

</div>

</body>

</html>
