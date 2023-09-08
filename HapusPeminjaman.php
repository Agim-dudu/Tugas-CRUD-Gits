<?php
include 'Koneksi.php';
include 'LogicCode.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if (hapusPeminjaman($id)) {
        // Peminjaman berhasil dihapus
        header("Location: index.php"); // Redirect kembali ke halaman utama atau daftar peminjaman
        exit;
    } else {
        echo "Gagal menghapus data peminjaman.";
    }
} else {
    echo "ID peminjaman tidak ditemukan.";
}
?>
