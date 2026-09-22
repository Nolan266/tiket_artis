<!DOCTYPE html>
<html>

<head>
    <title>Data Artis</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="topbar">
    Login sebagai <strong><?= $_SESSION['username']; ?></strong>
    &middot;
    <a class="logout-link" href="index.php?page=logout">Logout</a>
</div>

<div class="container">

    <h1>Data Artis</h1>

    <div class="actions-bar">
        <a class="btn" href="index.php?page=tambah_artis">
            + Tambah Artis
        </a>
    </div>

    <table>

        <thead>
            <tr>
                <th>No</th>
                <th>Nama Artis</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>

            <?php $no = 1; ?>

            <?php while ($a = $data->fetch_assoc()): ?>

                <tr>

                    <td>
                        <?= $no++; ?>
                    </td>

                    <td>
                        <?= $a['nama_artis']; ?>
                    </td>

                    <td>

                        <a class="action-link" href="index.php?page=edit_artis&id=<?= $a['id']; ?>">
                            Edit
                        </a>

                        |

                        <a
                            class="action-link hapus"
                            href="index.php?page=hapus_artis&id=<?= $a['id']; ?>"
                            onclick="return confirm('Yakin ingin menghapus artis ini?')"
                        >
                            Hapus
                        </a>

                    </td>

                </tr>

            <?php endwhile; ?>

        </tbody>

    </table>

    <a class="back-link" href="index.php?page=produk_tiket">
        Data Tiket
    </a>

</div>

</body>

</html>
