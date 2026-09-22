<!DOCTYPE html>
<html>

<head>
    <title>Edit Artis</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

    <h1>Edit Artis</h1>

    <form method="POST" action="index.php?page=edit_artis&id=<?= $artis['id']; ?>">

        <label>Nama Artis</label>

        <input
            type="text"
            name="nama_artis"
            value="<?= $artis['nama_artis']; ?>"
            required
        >

        <button type="submit">
            Update
        </button>

    </form>

    <a class="back-link" href="index.php?page=artis">
        Kembali
    </a>

</div>

</body>

</html>
