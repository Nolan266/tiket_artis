<!DOCTYPE html>
<html>

<head>
    <title>Tambah Artis</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

    <h1>Tambah Artis</h1>

    <form method="POST" action="index.php?page=tambah_artis">

        <label>Nama Artis</label>

        <input
            type="text"
            name="nama_artis"
            required
        >

        <button type="submit">
            Simpan
        </button>

    </form>

    <a class="back-link" href="index.php?page=artis">
        Kembali
    </a>

</div>

</body>

</html>
