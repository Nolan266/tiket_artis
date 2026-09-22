<!DOCTYPE html>
<html>

<head>
    <title>Data Tiket</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="topbar">
    Login sebagai <strong><?= $_SESSION['username']; ?></strong>
    &middot;
    <a class="logout-link" href="index.php?page=logout">Logout</a>
</div>

<div class="container">

    <h1>Data Tiket</h1>

    <div class="actions-bar">
        <a class="btn" href="index.php?page=tambah_tiket">
            + Tambah Tiket
        </a>
    </div>

    <table>

        <thead>
            <tr>
                <th>No</th>
                <th>Artis</th>
                <th>Jenis Tiket</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>

            <?php $no = 1; ?>

            <?php while ($t = $data->fetch_assoc()): ?>

                <tr>

                    <td>
                        <?= $no++; ?>
                    </td>

                    <td>
                        <?= $t['nama_artis']; ?>
                    </td>

                    <td>
                        <?= $t['jenis_tiket']; ?>
                    </td>

                    <td>
                        Rp <?= number_format($t['harga'], 0, ',', '.'); ?>
                    </td>

                    <td>
                        <?= $t['stok']; ?>
                    </td>

                    <td>

                        <a class="action-link" href="index.php?page=edit_tiket&id=<?= $t['id']; ?>">
                            Edit
                        </a>

                        |

                        <a
                            class="action-link hapus"
                            href="index.php?page=hapus_tiket&id=<?= $t['id']; ?>"
                            onclick="return confirm('Yakin ingin menghapus tiket ini?')"
                        >
                            Hapus
                        </a>

                    </td>

                </tr>

            <?php endwhile; ?>

        </tbody>

    </table>

    <!-- INI LINK PEMBELIAN TIKET -->

    <div class="actions-bar">
        <a class="btn btn-secondary" href="index.php?page=transaksi">
            Pembelian Tiket
        </a>
    </div>

    <a class="back-link" href="index.php?page=artis">
        Data Artis
    </a>

</div>

</body>

</html>
