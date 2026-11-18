<?php
include("koneksi.php");

// query untuk menampilkan data
$sql = 'SELECT * FROM data_barang';
$result = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="style.css" rel="stylesheet" type="text/css" />
    <title>Data Barang</title>
</head>
<body>
    <div class="container">
        <h1>Data Barang</h1>
        <div class="main">
            <a href="tambah.php">Tambah Barang</a>
            <table>
            <tr>
                <th>Gambar</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Harga Beli</th>
                <th>Harga Jual</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
            <?php if ($result && mysqli_num_rows($result) > 0): ?>
            <?php while ($row = mysqli_fetch_array($result)): ?>
            <?php
                // data awal hanya menyimpan nama file, data baru menyimpan 'gambar/namafile'
                $img = $row['gambar'];
                if ($img && strpos($img, 'gambar/') !== 0) $img = 'gambar/' . $img;
            ?>
            <tr>
                <td><img src="<?= htmlspecialchars($img); ?>" alt="<?= htmlspecialchars($row['nama']); ?>" width="80"></td>
                <td><?= htmlspecialchars($row['nama']); ?></td>
                <td><?= htmlspecialchars($row['kategori']); ?></td>
                <td><?= $row['harga_beli']; ?></td>
                <td><?= $row['harga_jual']; ?></td>
                <td><?= $row['stok']; ?></td>
                <td>
                    <a href="ubah.php?id=<?= $row['id_barang']; ?>">Ubah</a>
                    <a href="hapus.php?id=<?= $row['id_barang']; ?>" onclick="return confirm('Hapus data ini?')">Hapus</a>
                </td>
            </tr>
            <?php endwhile; else: ?>
            <tr>
                <td colspan="7">Belum ada data</td>
            </tr>
            <?php endif; ?>
            </table>
        </div>
    </div>
</body>
</html>
