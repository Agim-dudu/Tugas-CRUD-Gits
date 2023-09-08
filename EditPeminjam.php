<!DOCTYPE html>
<html>

<head>
    <title>Perpustakaan - Edit Peminjaman</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        h1 {
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 10px;
            text-decoration: none;
            color: #007bff;
        }

        a:hover {
            text-decoration: underline;
        }

        .success-message {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <h1>Edit Data Peminjaman</h1>

    <?php
    include 'Koneksi.php';
    include 'LogicCode.php';

    $success_message = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $anggota_id = $_POST['anggota_id'];
        $buku_id = $_POST['buku_id'];
        $tanggal = $_POST['tanggal'];
        $status = $_POST['status'];
        $peminjaman_id = $_POST['peminjaman_id']; // Ambil ID peminjaman dari form

        if (editPeminjaman($peminjaman_id, $anggota_id, $buku_id, $tanggal, $status)) {
            $success_message = "Data peminjaman berhasil diubah.";
        } else {
            $success_message = "Error: Gagal mengubah data peminjaman.";
        }
    }

    // Ambil data peminjaman yang akan diubah
    if (isset($_GET['id'])) {
        $peminjaman_id = $_GET['id'];
        $data_peminjaman = tampilPeminjamanByID($peminjaman_id);
    } else {
        echo "ID peminjaman tidak ditemukan.";
        exit;
    }
    ?>

    <form action="EditPeminjam.php?id=<?php echo $peminjaman_id; ?>" method="post">
        <input type="hidden" name="peminjaman_id" value="<?php echo $peminjaman_id; ?>"> <!-- Kirim ID peminjaman -->
        <label for="anggota_id">ID Anggota:</label>
        <input type="text" name="anggota_id" required value="<?php echo $data_peminjaman['anggota_id']; ?>">
        <br><br>

        <label for="buku_id">ID Buku:</label>
        <input type="text" name="buku_id" required value="<?php echo $data_peminjaman['buku_id']; ?>">
        <br><br>

        <label for="tanggal">Tanggal Pinjam:</label>
        <input type="text" name="tanggal" required value="<?php echo $data_peminjaman['tanggal']; ?>">
        <br><br>

        <label for="status">Status:</label>
        <select name="status" required>
            <option value="Dipinjam" <?php if ($data_peminjaman['status'] == 'Dipinjam') echo 'selected'; ?>>Pinjam</option>
            <option value="Dikembalikan" <?php if ($data_peminjaman['status'] == 'Dikembalikan') echo 'selected'; ?>>Kembalikan</option>
        </select>
        <br><br>

        <input type="submit" name="EditPeminjam" value="Simpan Perubahan">
    </form>

    <?php
    if (!empty($success_message)) {
        echo '<div class="success-message">' . $success_message . '</div>';
    }
    ?>

    <br>
    <a href="index.php">Kembali ke Daftar Peminjaman</a>
</body>

</html>
