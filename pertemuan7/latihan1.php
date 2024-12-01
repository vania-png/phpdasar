<?php 
// $_GET
$mahasiswa =[
    [
    "nama" => "vania",
    "nrp" => "043040022",
    "email" => "vania242560@gmail.com",
    "jurusan" => "rekayasa perangkat lunak",
    "gambar" => "foto4.jpg"
    ],
    [
        "nama" => "Trafalgar Law",
        "nrp" => "043040023",
        "email" => "torazon@gmail.com",
        "jurusan" => "teknik informatika",
        "gambar" => "foto3.jpg"
        ]
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>GET</title>
</head>
<body>
    <h1>Daftar mahasiswa</h1>
    <ul>    <?php foreach( $mahasiswa as $mhs ): ?>
        <li>
          <a href="latihan2.php?nama=<?=$mhs["nama"];?>%nrp=<?= $mhs["nrp"];?>&email=<?= $mhs["email"];?>&jurusan=<?= $mhs["jurusan"];?>"><?= $mhs["nama"]; ?></a>
        </li>
        <?php endforeach; ?>
    
    </ul>

</body>
</html>