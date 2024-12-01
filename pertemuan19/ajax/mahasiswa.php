<?php
require '../functions.php';

$keyword = $_GET["keyword"];

$query = "SELECT * FROM mahasiswa
                 WHERE
                nama LIKE '%$keyword%' OR
                nrp LIKE '%$keyword%' OR
                email LIKE '%$keyword%' OR
                jurusan LIKE '%$keyword%' 
             ";
$mahasiswa = query($query);
?>
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