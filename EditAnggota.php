<!DOCTYPE html>
<html>
<head>
    <title>Perpustakaan - Edit Anggota</title>
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
    <h1>Edit Data Anggota</h1>

    <?php
    include 'Koneksi.php';
    include 'LogicCode.php';

    $success_message = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $anggota_id = $_POST['anggota_id']; // Mengambil anggota_id dari form

        if (editAnggota($anggota_id, $nama, $alamat)) {
            $success_message = "Data anggota berhasil diubah.";
        } else {
            $success_message = "Error: Gagal mengubah data anggota.";
        }
    }

    // Ambil data anggota yang akan diubah
    if (isset($_GET['id'])) {
        $anggota_id = $_GET['id'];
        $data_anggota = tampilAnggotaByID($anggota_id);
    } else {
        echo "ID anggota tidak ditemukan.";
        exit;
    }

    ?>

    <form action="EditAnggota.php?id=<?php echo $anggota_id; ?>" method="post">
        <input type="hidden" name="anggota_id" value="<?php echo $anggota_id; ?>">
        <label for="nama">Nama Anggota:</label>
        <input type="text" name="nama" required value="<?php echo $data_anggota['nama']; ?>">
        <br><br>

        <label for="alamat">Alamat:</label>
        <input type="text" name="alamat" required value="<?php echo $data_anggota['alamat']; ?>">
        <br><br>

        <input type="submit" name="edit_anggota" value="Simpan Perubahan">
    </form>

    <?php
    if (!empty($success_message)) {
        echo '<div class="success-message">' . $success_message . '</div>';
    }
    ?>

    <br>
    <a href="index.php">Kembali ke Daftar Anggota</a>
</body>
</html>
