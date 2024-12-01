<?php
// Mengimpor file functions.php jika ada
require 'functions.php';

// Ambil data di URL
if (isset($_GET["id"])) {
    $Id = $_GET["id"];
}

// Query data mahasiswa berdasarkan id
$row = query("SELECT * FROM mahasiswa WHERE Id ='$Id'")[0];

// Koneksi ke DBMS
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

// Cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {
    
    // Cek apakah data berhasil diubah atau tidak
    if( Ubah($_POST) > 0) {
            echo "<script>
                alert('data berhasil diubah!');
                document.location.href = 'index.php';
                  </script";
    } else {
        echo "<script>
            alert('data gagal diubah!');
            document.location.href = 'index.php';
              </script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
   <title>Ubah data Mahasiswa</title>
</head>
<body>
    <h1>Ubah data Mahasiswa</h1>

    <form action="" method="post">
        <input type="hidden" name="Id" value="<?= $row["Id"]; ?>">
        <ul>
            <li>
                <label for="nama">NAMA      : </label>
                <input type="text" name="nama" id="nama"required value="<?= $row["nama"]; ?>">
            </li>
            <li>
                <label for="nrp">NRP        : </label>
                <input type="text" name="nrp" id="nrp"value="<?= $row["nrp"]; ?>">
            </li>
            <li>
                <label for="email">EMAIL     : </label>
                <input type="text" name="email" id="email"value="<?= $row["email"]; ?>">
            </li>
            <li>
                <label for="jurusan">JURUSAN : </label>
                <input type="text" name="jurusan" id="jurusan"value="<?= $row["jurusan"]; ?>">
            </li>
            <li>
                <label for="gambar">GAMBAR   : </label>
                <input type="text" name="gambar" id="gambar"value="<?= $row["gambar"]; ?>">
            </li>
            <li>
                <button type="submit" name="submit">Ubah Data!</button>
            </li>
        </ul>
</form>
</body>
</html>