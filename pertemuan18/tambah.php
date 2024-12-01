<?php
session_start();

if( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}
// Mengimpor file functions.php jika ada
require 'functions.php';

// Koneksi ke DBMS
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

// Cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {

    
    // Cek apakah data berhasil di tambahkan atau tidak
    if( submit($_POST) > 0 ) {
            echo "<script>
                alert('data berhasil ditambahkan!');
                document.location.href = 'index.php';
                  </script";
    } else {
        echo "<script>
            alert('data gagal ditambahkan!');
            document.location.href = 'index.php';
              </script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
   <title>Tambah data Mahasiswa</title>
</head>
<body>
    <h1>Tambah data Mahasiswa</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="Nama">NAMA      : </label>
                <input type="text" name="Nama" id="Nama">
            </li>
            <li>
                <label for="Nrp">NRP        : </label>
                <input type="text" name="Nrp" id="Nrp">
            </li>
            <li>
                <label for="Email">EMAIL     : </label>
                <input type="text" name="Email" id="Email">
            </li>
            <li>
                <label for="Jurusan">JURUSAN : </label>
                <input type="text" name="Jurusan" id="Jurusan">
            </li>
            <li>
                <label for="Gambar">GAMBAR   : </label>
                <input type="file" name="Gambar" id="Gambar">
            </li>
            <li>
                <button type="submit" name="submit">Tambah Data!</button>
            </li>
        </ul>
    </from>
</body>
</html>