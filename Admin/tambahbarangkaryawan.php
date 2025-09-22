<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['id_karyawan'])) {
    // If not logged in, redirect to login page
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Registrasi Barang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background: #fff;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }
        h2 {
            text-align: center;
            color: #45103E;
        }
        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: bold;
        }
        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 0.8rem;
            margin-bottom: 1rem;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        button {
            width: 100%;
            padding: 0.8rem;
            background-color: black;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
        }
        button:hover {
            background-color: #45103E;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Tambah Barang</h2>
        <form action="tambah_proses.php" method="POST">
            <label for="id_barang">ID Barang:</label>
            <input type="text" name="id_barang" id="id_barang" placeholder="Contoh: B001" pattern="^[A-Za-z]+\d{3}$" required>

            <label for="nama_barang">Nama Barang:</label>
            <input type="text" name="nama_barang" id="nama_barang" placeholder="Masukkan nama barang" required>

            <label for="jumlah_stok">Jumlah Stok:</label>
            <input type="number" name="jumlah_stok" id="jumlah_stok" placeholder="Masukkan jumlah stok" required>

            <label for="harga">Harga:</label>
            <input type="number" name="harga" id="harga" placeholder="Masukkan harga" required>

            href="logout.php"<button type="submit" href="barangkaryawan.php">Tambah Barang</button>
        </form>
    </div>
</body>
</html>
