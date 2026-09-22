<!DOCTYPE html>
<html>

<head>
    <title>Edit Tiket</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

    <h1>Edit Tiket</h1>

    <form
        method="POST"
        action="index.php?page=edit_tiket&id=<?= $tiket['id']; ?>"
    >

        <label>Artis</label>

        <select name="artis_id" required>

            <?php while ($a = $artis->fetch_assoc()): ?>

                <option
                    value="<?= $a['id']; ?>"
                    <?= $a['id'] == $tiket['artis_id'] ? 'selected' : ''; ?>
                >
                    <?= $a['nama_artis']; ?>
                </option>

            <?php endwhile; ?>

        </select>


        <label>Jenis Tiket</label>

        <input
            type="text"
            name="jenis_tiket"
            value="<?= $tiket['jenis_tiket']; ?>"
            required
        >


        <label>Harga</label>

        <input
            type="number"
            name="harga"
            value="<?= $tiket['harga']; ?>"
            required
        >


        <label>Stok</label>

        <input
            type="number"
            name="stok"
            value="<?= $tiket['stok']; ?>"
            min="1"
            required
        >

        <button type="submit">
            Update
        </button>

    </form>

    <a class="back-link" href="index.php?page=produk_tiket">
        Kembali
    </a>

</div>

</body>

</html>
