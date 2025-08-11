<?php
include '../koneksi/koneksi.php'; // Koneksi ke database

// Proses input data jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_transaksi = $_POST['id_transaksi'];
    $id_customer = $_POST['id_customer'];
    $id_karyawan = $_POST['id_karyawan'];
    $id_pesanan = $_POST['id_pesanan'];
    $id_barang = $_POST['id_barang'];
    $jumlah = $_POST['jumlah'];

    // Query untuk menyimpan data ke tabel transaksi
    $query_transaksi = "INSERT INTO transaksi (id_transaksi, id_customer, id_karyawan, id_pesanan, id_barang, jumlah)
                        VALUES ('$id_transaksi', '$id_customer', '$id_karyawan', '$id_pesanan', '$id_barang', '$jumlah')";

    // Query untuk menyimpan data ke tabel pesanan
    $query_pesanan = "INSERT INTO pesanan (id_pesanan, id_customer, id_karyawan, id_barang, jumlah)
                      VALUES ('$id_pesanan', '$id_customer', '$id_karyawan', '$id_barang', '$jumlah')";

    // Jalankan kedua query
    if ($conn->query($query_transaksi) === TRUE && $conn->query($query_pesanan) === TRUE) {
        echo "<script>alert('Data berhasil ditambahkan ke tabel transaksi dan pesanan!');</script>";
    } else {
        echo "<script>alert('Gagal menambahkan data: " . $conn->error . "');</script>";
    }
}

// Query untuk menampilkan data transaksi
$query = "SELECT 
            transaksi.id_transaksi,
            customer.Nama_C AS nama_customer,
            karyawan.Nama AS nama_karyawan,
            barang.Nama_barang AS nama_barang,
            transaksi.jumlah
          FROM 
            transaksi
          JOIN 
            customer ON transaksi.id_customer = customer.id_customer
          JOIN 
            karyawan ON transaksi.id_karyawan = karyawan.id_karyawan
          JOIN 
            barang ON transaksi.id_barang = barang.id_barang";

$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input dan History Transaksi</title>
    <style>
        /* Styling umum */
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            margin: 0;
            padding: 0;
        }

        h1, h4 {
            text-align: center;
            color: #45103E;
        }

        /* Styling tabel */
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        table, th, td {
            border: 1px solid #45103E;
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
        }
        th {
            background-color: #45103E;
            color: white;
        }
        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        /* Styling form */
        form {
            margin: 20px auto;
            width: 80%;
            max-width: 500px;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        input[type="text"], input[type="number"], select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        button {
            background-color: #45103E;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
        }
        button:hover {
            background-color: #5a1d74;
        }

        .container {
            max-width: 1100px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h4>Input Data Transaksi</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="">
                <!-- Input ID Transaksi -->
                <div class="mb-3">
                    <label for="id_transaksi" class="form-label">ID Transaksi</label>
                    <input type="text" class="form-control" id="id_transaksi" name="id_transaksi" required>
                </div>

                <!-- Pilih Customer -->
                <div class="mb-3">
                    <label for="id_customer" class="form-label">Pilih Customer</label>
                    <select class="form-select" id="id_customer" name="id_customer" required>
                        <option value="" disabled selected>Pilih Customer</option>
                        <?php
                        $result_customer = $conn->query("SELECT id_customer, Nama_C FROM customer");
                        while ($row = $result_customer->fetch_assoc()) {
                            echo "<option value='{$row['id_customer']}'>{$row['Nama_C']}</option>";
                        }
                        ?>
                    </select>
                </div>

                <!-- Pilih Karyawan -->
                <div class="mb-3">
                    <label for="id_karyawan" class="form-label">Pilih Karyawan</label>
                    <select class="form-select" id="id_karyawan" name="id_karyawan" required>
                        <option value="" disabled selected>Pilih Karyawan</option>
                        <?php
                        $result_karyawan = $conn->query("SELECT id_karyawan, Nama FROM karyawan");
                        while ($row = $result_karyawan->fetch_assoc()) {
                            echo "<option value='{$row['id_karyawan']}'>{$row['Nama']}</option>";
                        }
                        ?>
                    </select>
                </div>

                <!-- Input ID Pesanan -->
                <div class="mb-3">
                    <label for="id_pesanan" class="form-label">ID Pesanan</label>
                    <input type="text" class="form-control" id="id_pesanan" name="id_pesanan" required>
                </div>

                <!-- Pilih Barang -->
                <div class="mb-3">
                    <label for="id_barang" class="form-label">Pilih Barang</label>
                    <select class="form-select" id="id_barang" name="id_barang" required>
                        <option value="" disabled selected>Pilih Barang</option>
                        <?php
                        $result_barang = $conn->query("SELECT id_barang, Nama_barang FROM barang");
                        while ($row = $result_barang->fetch_assoc()) {
                            echo "<option value='{$row['id_barang']}'>{$row['Nama_barang']}</option>";
                        }
                        ?>
                    </select>
                </div>

                <!-- Input Jumlah -->
                <div class="mb-3">
                    <label for="jumlah" class="form-label">Jumlah</label>
                    <input type="number" class="form-control" id="jumlah" name="jumlah" required>
                </div>

                <!-- Tombol Submit -->
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="../utama.html" class="btn btn-secondary">Halaman Utama</a>
            </form>
        </div>
    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
</body>
</html>
