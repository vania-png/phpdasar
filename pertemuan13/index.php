<?php
require 'functions.php';
$mahasiswa = query("SELECT * FROM mahasiswa");

// Tombol cari ditekan
if( isset($_POST["cari"]) ) {
    $mahasiswa = cari($_POST["keyword"]);
}


?>

<!DOCTYPE html>
<html>
<head>
      <title>Halaman Admin</title>
</head>
<body>

<h1>Daftar Mahasiswa</h1>

<a href="tambah.php">Tambah Data Mahasiswa</a>
<br></br>

<form action="" method="post">

      <input type="text" name="keyword" size="40" autofocus placeholder="masukkan keyword pencarian..." autocomplete="off">
      <button type="submit" name="cari">Cari</button>

</form>

<br>
<table border="1" cellpadding="10" cellspacing="0">

    <tr>
        <th>No.</th>
        <th>Aksi</th>
        <th>Gambar</th>
        <th>Nama</th>
        <th>Nrp</th>
        <th>Email</th>
        <th>Jurusan</th>
    </tr>

    <?php $i = 1; ?>
    <?php foreach( $mahasiswa as $row ): ?>
    <tr>
        <td><?= $i; ?></td>
        <td>
        <a href="ubah.php?id=<?= $row['Id']; ?>">ubah</a> |
        <a href="hapus.php?id=<?= $row['Id']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">hapus</a>
        </td>
        <td><img src="img/<?= $row["gambar"]; ?> " width="50px"></td>
        <td><?= $row["nama"]; ?></td>
        <td><?= $row["nrp"]; ?></td>
        <td><?= $row["email"]; ?></td>
        <td><?= $row["jurusan"]; ?></td>
    </tr> 
    <?php $i++; ?>
    <?php endforeach; ?>

</table>

</body>
</html>