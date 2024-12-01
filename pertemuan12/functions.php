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

    $nama = htmlspecialchars($data["nama"]);
    $nrp = htmlspecialchars($data["nrp"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $gambar = htmlspecialchars($data["gambar"]);
    
    $query = "INSERT INTO mahasiswa
                VALUES
              ('','$nama', '$nrp', '$email', '$jurusan', '$gambar')
              ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}


function ubah($data) {
    global $conn;

    $Id = $data["id"];

    $nama = htmlspecialchars($data["nama"]);
    $nrp = htmlspecialchars($data["nrp"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $gambar = htmlspecialchars($data["gambar"]);
    
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