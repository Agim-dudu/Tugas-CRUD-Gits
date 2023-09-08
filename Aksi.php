<?php
include 'Koneksi.php'; // Sertakan file koneksi.php untuk menghubungkan ke database
include 'LogicCode.php'; // Sertakan file fungsi.php yang berisi fungsi CRUD

if (isset($_POST['tambah_buku'])) {
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $tahun = $_POST['tahun'];

    // Panggil fungsi tambahBuku
    if (tambahBuku($judul, $penulis, $tahun)) {
        echo "Buku berhasil ditambahkan.";
    } else {
        echo "Error: Gagal menambahkan buku.";
    }
}

?>
