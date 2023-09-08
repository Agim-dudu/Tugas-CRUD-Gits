<!DOCTYPE html>
<html>

<head>
    <title>Perpustakaan</title>
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
            width: 60%;
            text-align: center;
            border-radius: 20px;
            margin: 20px auto;
        }

        h2 {
            margin-top: 20px;
        }

        .container {
            width: 90%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th,
        table td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
        }

        table th {
            background-color: #007bff;
            color: #fff;
        }

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .btn {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            margin-right: 5px;
        }

        .btn.edit {
            background-color: #28a745;
        }

        .btn.delete {
            background-color: #dc3545;
        }

        .btn.add {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            margin-right: 5px;
        }

        .btn:hover {
            text-decoration: none;
        }
    </style>
</head>

<body>
    <h1>Mini Perpustakaan</h1>

    <div class="container">
        <h2>Daftar Buku</h2>
        <a class='btn add' style="font-size: larger;" href='TambahBuku.php'>Tambah</a>
        <?php
        include 'LogicCode.php';
        $result = tampilkanBuku();
        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>ID</th><th>Judul</th><th>Penulis</th><th>Tahun</th><th>Aksi</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["judul"] . "</td>";
                echo "<td>" . $row["penulis"] . "</td>";
                echo "<td>" . $row["tahun"] . "</td>";
                echo "<td><a class='btn edit' href='EditBuku.php?id=" . $row["id"] . "'>Edit</a><a class='btn delete' href='HapusBuku.php?id=" . $row["id"] . "'>Hapus</a></td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "Tidak ada buku yang tersedia <a class='btn add' href='TambahBuku.php'>Tambah</a>";
        }
        ?>
    </div>

    <div class="container">
        <h2>Daftar Anggota</h2>
        <a class='btn add' style="font-size: larger;" href='TambahAnggota.php'>Tambah</a>
        <?php
        $result = tampilkananggota();
        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>ID</th><th>Nama</th><th>Alamat</th><th>Aksi</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["nama"] . "</td>";
                echo "<td>" . $row["alamat"] . "</td>";
                echo "<td><a class='btn edit' href='EditAnggota.php?id=" . $row["id"] . "'>Edit</a><a class='btn delete' href='HapusAnggota.php?id=" . $row["id"] . "'>Hapus</a></td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "Tidak ada anggota yang tersedia <a class='btn add' href='TambahAnggota.php'>Tambah</a>";
        }
        ?>
    </div>

    <div class="container">
        <h2>Daftar Peminjam</h2>
        <a class='btn add' style="font-size: larger;" href='TambahPeminjam.php'>Tambah</a>
        <?php
        $result = tampilkanpeminjam();
        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>ID</th><th>Nama Anggota</th><th>Judul Buku</th><th>Tanggal Pinjam</th><th>Status</th><th>Aksi</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";

                // Mengganti ID anggota dengan nama anggota
                $anggota_id = $row["anggota_id"];
                $query_anggota = "SELECT nama FROM Anggota WHERE id = $anggota_id";
                $result_anggota = $conn->query($query_anggota);
                if ($result_anggota->num_rows > 0) {
                    $row_anggota = $result_anggota->fetch_assoc();
                    echo "<td>" . $row_anggota["nama"] . "</td>";
                } else {
                    echo "<td>Tidak Diketahui</td>";
                }

                // Mengganti ID buku dengan judul buku
                $buku_id = $row["buku_id"];
                $query_buku = "SELECT judul FROM Buku WHERE id = $buku_id";
                $result_buku = $conn->query($query_buku);
                if ($result_buku->num_rows > 0) {
                    $row_buku = $result_buku->fetch_assoc();
                    echo "<td>" . $row_buku["judul"] . "</td>";
                } else {
                    echo "<td>Tidak Diketahui</td>";
                }

                echo "<td>" . $row["tanggal"] . "</td>";
                echo "<td>" . $row["status"] . "</td>";
                echo "<td><a class='btn edit' href='EditPeminjam.php?id=" . $row["id"] . "'>Edit</a><a class='btn delete' href='HapusPeminjaman.php?id=" . $row["id"] . "'>Hapus</a></td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "Tidak ada data peminjam yang tersedia";
        }
        ?>
    </div>
</body>

</html>
