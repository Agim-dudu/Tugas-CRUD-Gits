<?php
include 'Koneksi.php';
include 'LogicCode.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Hapus terlebih dahulu semua peminjaman yang terkait dengan anggota ini
    hapusPeminjamanByAnggotaID($id);

    // Setelah semua peminjaman terkait dihapus, Anda dapat menghapus anggota
    if (hapusAnggota($id)) {
        // Anggota berhasil dihapus
        header("Location: index.php"); // Redirect kembali ke halaman utama atau daftar anggota
        exit;
    } else {
        echo "Gagal menghapus anggota.";
    }
} else {
    echo "ID anggota tidak ditemukan.";
}
?>
