<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "phpdasar");


function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }
    return $rows;
}

function hapus($Id)
{
    global $conn;
    // Pastikan Anda melindungi query dengan prepared statements atau escaping agar terhindar dari SQL Injection
    $query = "DELETE FROM mahasiswa WHERE Id = '$Id'";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function submit($data) 
{
    global $conn;

    $nama = htmlspecialchars($data["ama"]);
    $nrp = htmlspecialchars($data["rp"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);

    // upload gambar
    $gambar = upload();
    if( !$gambar ) {
        return false;
    }
    
    $query = "INSERT INTO mahasiswa
                VALUES
              ('','$nama', '$nrp', '$email', '$jurusan', '$gambar')
              ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}


function upload() {
    
    $namaFile = $_FILES['Gambar']['name'];
    $ukuranFile = $_FILES['Gambar']['size'];
    $error = $_FILES['Gambar']['error'];
    $tmpName = $_FILES['Gambar']['tmp_name'];

    // Cek apakah tidak ada gambar yang di upload
    if( $error === 4 ) {
        echo "<script>
                alert('pilih gambar terlebih dahulu!');
              </script>";
        return false;
    }

    // Cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if( !in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
                alert('yang anda upload bukan gambar!');
             </script>";
        return false; 
    }

    // Cek jika ukurannya terlalu besar
    if( $ukuranFile > 1000000 ) {
        echo "<script>
                alert('ukuran gambar terlalu besar!');
             </script>";
        return false; 
    }

    // Lolos pengecekkan, gambar siap diupload
    // Gemerate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

    return $namaFileBaru;



}


function ubah($data) {
    global $conn;

    $Id = $data["id"];

    $nama = htmlspecialchars($data["Nama"]);
    $nrp = htmlspecialchars($data["Nrp"]);
    $email = htmlspecialchars($data["Email"]);
    $jurusan = htmlspecialchars($data["Jurusan"]);
    $gambarLama = htmlspecialchars($data["GambarLama"]);

    // Cek apakah user pilih gambar baru atau tidak
    if( $_FILES['Gambar']['error']===4 ) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }
    
    $query = "UPDATE mahasiswa SET
                Nama = '$nama',
                Nrp = '$nrp',
                Email = '$email',
                Jurusan = '$jurusan',
                Gambar = '$gambar'
              WHERE Id = '$Id'
                ";
    
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function cari($keyword) {
    $query = "SELECT * FROM mahasiswa
                 WHERE
                nama LIKE '%$keyword%' OR
                nrp LIKE '%$keyword%' OR
                email LIKE '%$keyword%' OR
                jurusan LIKE '%$keyword%' 
             ";
    return query($query);
}




?>