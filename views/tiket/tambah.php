<!DOCTYPE html>
<html>

<head>
    <title>Tambah Tiket</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

    <h1>Tambah Tiket</h1>

    <form method="POST" action="index.php?page=tambah_tiket">

        <label>Artis</label>

        <select name="artis_id" required>

            <option value="">
                -- Pilih Artis --
            </option>

            <?php while ($a = $artis->fetch_assoc()): ?>

                <option value="<?= $a['id']; ?>">
                    <?= $a['nama_artis']; ?>
                </option>

            <?php endwhile; ?>

        </select>


        <label>Jenis Tiket</label>

        <input
            type="text"
            name="jenis_tiket"
            placeholder="Contoh: VIP"
            required
        >


        <label>Harga</label>

        <input
            type="number"
            name="harga"
            placeholder="Contoh: 500000"
            required
        >


        <label>Stok</label>

        <input
            type="number"
            name="stok"
            placeholder="Contoh: 50"
            min="1"
            required
        >

        <button type="submit">
            Simpan
        </button>

    </form>

    <a class="back-link" href="index.php?page=produk_tiket">
        Kembali
    </a>

</div>

</body>

</html>
