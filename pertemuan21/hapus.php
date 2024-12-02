<?php
session_start();

if( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}

require 'functions.php';
$Id = $_GET["id"]; // Pastikan parameter 'id' sesuai dengan query string di URL

if (hapus($Id) > 0) {
    echo "<script>
            alert('Data berhasil dihapus!');
            document.location.href = 'index.php';
          </script>";
} else {
    echo "<script>
            alert('Data gagal dihapus!');
            document.location.href = 'index.php';
          </script>";
}
?>