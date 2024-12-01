<?php
$mahasiswa = [
   ["Vania Ayu Amanda", "045040053", "Teknik Informatika", "vayu25265@gmail.com"],
   ["M. Attar Zaigam Satria", "034040043", "Teknik Industri", "attar@gmail.com"],
];

?>
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Mahasiswa</title>
</head>
<body>

<h1>Daftar Mahasiswa</h1>

<?php foreach( $mahasiswa as $mhs) : ?>
<ul>
    <li>Nama : <?= $mhs[0]; ?></li>
    <li>NRP  : <?= $mhs[1]; ?></li>
    <li>Jurusan : <?= $mhs[2]; ?></li>
    <li>Email :<?= $mhs[3]; ?></li>

</ul>
<?php endforeach; ?>

</body>
</html>