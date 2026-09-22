<!DOCTYPE html>
<html>

<head>
    <title>Pembelian Tiket</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="topbar">
    Login sebagai <strong><?= $_SESSION['username']; ?></strong>
    &middot;
    <a class="logout-link" href="index.php?page=logout">Logout</a>
</div>

<div class="container">

    <h1>Pembelian Tiket</h1>

    <form method="POST" action="index.php?page=proses_transaksi">

        <label>Pilih Tiket</label>

        <select name="tiket_id" required>

            <option value="">
                -- Pilih Tiket --
            </option>

            <?php while ($t = $data->fetch_assoc()): ?>

                <option value="<?= $t['id']; ?>">

                    <?= $t['nama_artis']; ?>
                    -
                    <?= $t['jenis_tiket']; ?>
                    -
                    Rp <?= number_format($t['harga'], 0, ',', '.'); ?>

                </option>

            <?php endwhile; ?>

        </select>


        <label>Jumlah Tiket</label>

        <input
            type="number"
            name="jumlah"
            min="1"
            required
        >


        <label>Bayar</label>

        <input
            type="number"
            name="bayar"
            min="0"
            required
        >

        <button type="submit">
            Beli Tiket
        </button>

    </form>

    <a class="back-link" href="index.php?page=produk_tiket">
        Data Tiket
    </a>

</div>

</body>

</html>
