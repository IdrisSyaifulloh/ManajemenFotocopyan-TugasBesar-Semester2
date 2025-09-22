<?php
session_start();
include '../koneksi/koneksi.php'; // Koneksi database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_karyawan = $_POST['id_karyawan'];
    $nama = $_POST['nama'];

    // Validasi input
    if (empty($id_karyawan) || empty($nama)) {
        echo "<script>alert('ID Karyawan dan Nama tidak boleh kosong!');</script>";
    } else {
        // Menggunakan prepared statement untuk mencegah SQL Injection
        $stmt = $conn->prepare("SELECT * FROM karyawan WHERE id_karyawan = ? AND Nama = ?");
        $stmt->bind_param("ss", $id_karyawan, $nama);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $karyawan = $result->fetch_assoc();
            $_SESSION['id_karyawan'] = $karyawan['id_karyawan'];
            $_SESSION['Nama'] = $karyawan['Nama'];
            $_SESSION['role'] = $karyawan['role'];

            // Redirect berdasarkan role
            header("Location: utama.php");
            exit;
        } else {
            echo "<script>alert('ID Karyawan atau Nama salah!');</script>";
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Login</title>
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
            text-align: center;
        }
        .container h2 {
            margin-bottom: 1.5rem;
            color: #45103E;
        }
        .container label {
            display: block;
            text-align: left;
            margin-bottom: 0.5rem;
            font-weight: bold;
        }
        .container input[type="text"] {
            width: 100%;
            padding: 0.8rem;
            margin-bottom: 1rem;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .container input[type="submit"] {
            background-color: black;
            color: white;
            padding: 0.8rem 1.5rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
        }
        .container input[type="submit"]:hover {
            background-color: #45103E;
        }
        .container p {
            margin-top: 1rem;
        }
        .container a {
            color: black;
            text-decoration: none;
        }
        .container a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Login Admin</h2>
        <form method="POST">
            <label for="id_karyawan">ID Karyawan:</label>
            <input type="text" id="id_karyawan" name="id_karyawan" required>

            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required>

            <input type="submit" value="Login">
            <p>Kembali Ke Halaman Utama? <a href="../utama.html">Halaman Utama</a></p>
        </form>
    </div>
</body>
</html>
