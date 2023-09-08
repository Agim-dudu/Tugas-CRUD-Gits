<?php
include 'Koneksi.php';
include 'LogicCode.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Hapus terlebih dahulu semua peminjaman yang terkait dengan buku ini
    hapusPeminjamanByBukuID($id);

    // Setelah semua peminjaman terkait dihapus, Anda dapat menghapus buku
    if (hapusBuku($id)) {
        // Buku berhasil dihapus
        header("Location: index.php"); // Redirect kembali ke halaman utama atau daftar buku
        exit;
    } else {
        echo "Gagal menghapus buku.";
    }
} else {
    echo "ID buku tidak ditemukan.";
}
?>
