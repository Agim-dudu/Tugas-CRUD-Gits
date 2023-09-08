<?php
include 'Koneksi.php';

// query sql bagian buku
function tambahBuku($judul, $penulis, $tahun) {
    global $conn;
    $sql = "INSERT INTO Buku (judul, penulis, tahun) VALUES ('$judul', '$penulis', '$tahun')";
    return $conn->query($sql);
}

function tampilkanBuku() {
    global $conn;
    $sql = "SELECT * FROM Buku";
    return $conn->query($sql);
}

// Function untuk mengedit data buku
function editBuku($id, $judul, $penulis, $tahun) {
    global $conn;
    $sql = "UPDATE Buku SET judul = '$judul', penulis = '$penulis', tahun = '$tahun' WHERE id = $id";
    return $conn->query($sql);
}

// Function untuk menampilkan data buku berdasarkan ID
function tampilkanBukuByID($id) {
    global $conn;
    $sql = "SELECT * FROM Buku WHERE id = $id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return false;
    }
}

function hapusBuku($id) {
    global $conn;
    $sql = "DELETE FROM Buku WHERE id=$id";
    return $conn->query($sql);
}



// query sql bagian anggota
function tampilkananggota() {
    global $conn;
    $sql = "SELECT * FROM anggota";
    return $conn->query($sql);
}

function tambahanggota($nama, $alamat) {
    global $conn;

    // Melarikan data sebelum digunakan dalam query
    $nama = mysqli_real_escape_string($conn, $nama);
    $alamat = mysqli_real_escape_string($conn, $alamat);

    // Menggunakan CURRENT_TIMESTAMP untuk 'created_at' dan 'updated_at'
    $sql = "INSERT INTO anggota (nama, alamat, created_at, updated_at) VALUES ('$nama', '$alamat', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";

    return $conn->query($sql);
}

// Function untuk mengedit data anggota
function editAnggota($id, $nama, $alamat) {
    global $conn;
    $sql = "UPDATE anggota SET nama = '$nama', alamat = '$alamat' WHERE id = $id";
    return $conn->query($sql);
}

// Function untuk menampilkan data anggota berdasarkan ID
function tampilAnggotaByID($id) {
    global $conn;
    $sql = "SELECT * FROM anggota WHERE id = $id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return false;
    }
}

function hapusAnggota($id) {
    global $conn;
    $sql = "DELETE FROM anggota WHERE id=$id";
    return $conn->query($sql);
}




// query sql bagian peminjaman
function tampilkanpeminjam() {
    global $conn;
    $sql = "SELECT * FROM peminjaman";
    return $conn->query($sql);
}

function tambahpeminjaman($anggota_id, $buku_id, $tanggal, $status) {
    global $conn;
    $sql = "INSERT INTO Peminjaman (anggota_id, buku_id, tanggal, status) VALUES ('$anggota_id', '$buku_id', '$tanggal', '$status')";
    return $conn->query($sql);
}

// Function untuk menghapus semua peminjaman yang terkait dengan buku berdasarkan ID buku
function hapusPeminjamanByBukuID($buku_id) {
    global $conn;
    $sql = "DELETE FROM peminjaman WHERE buku_id = $buku_id";
    return $conn->query($sql);
}

// Function untuk menghapus semua peminjaman yang terkait dengan anggota berdasarkan ID anggota
function hapusPeminjamanByAnggotaID($anggota_id) {
    global $conn;
    $sql = "DELETE FROM peminjaman WHERE anggota_id = $anggota_id";
    return $conn->query($sql);
}

// Function untuk menghapus data peminjaman berdasarkan ID peminjaman
function hapusPeminjaman($peminjaman_id) {
    global $conn;
    $sql = "DELETE FROM peminjaman WHERE id = $peminjaman_id";
    return $conn->query($sql);
}

// Function untuk mengedit data peminjaman
function editPeminjaman($id, $anggota_id, $buku_id, $tanggal, $status) {
    global $conn;
    $sql = "UPDATE Peminjaman SET anggota_id='$anggota_id', buku_id='$buku_id', tanggal='$tanggal', status='$status' WHERE id=$id";
    return $conn->query($sql);
}

// Function untuk menampilkan data peminjaman berdasarkan ID
function tampilPeminjamanByID($id) {
    global $conn;
    $sql = "SELECT * FROM Peminjaman WHERE id = $id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return false;
    }
}




?>
