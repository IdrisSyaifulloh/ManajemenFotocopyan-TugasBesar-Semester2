<?php
// Memulai session untuk menyimpan data pengguna yang login
session_start();
// Memasukkan file koneksi database
include "../koneksi/koneksi.php";

// Mengecek apakah request dilakukan dengan metode POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mengamankan input 'id_karyawan' dari karakter berbahaya untuk mencegah SQL Injection
    $id_karyawan = mysqli_real_escape_string($conn, $_POST['id_karyawan']);

    // Query untuk mengambil data pengguna berdasarkan id_karyawan
    $sql = "SELECT * FROM karyawan WHERE id_karyawan = '$id_karyawan'";
    // Menjalankan query
    $result = mysqli_query($conn, $sql);

    // Mengecek apakah ada hasil query (user ditemukan)
    if (mysqli_num_rows($result) > 0) {
        // Mendapatkan baris data pengguna dari hasil query
        $row = mysqli_fetch_assoc($result);
        // Menyimpan data pengguna ke session
        $_SESSION['id_karyawan'] = $row['id_karyawan'];
        $_SESSION['Nama'] = $row['Nama'];
        // Mengarahkan pengguna ke halaman utama setelah login berhasil
        echo "<script>alert('Anda berhasil login!'); window.location.href='utama.php';</script>";
        exit;
    } else {
        // Menampilkan pesan error jika id pengguna tidak ditemukan
        echo "<div class='error'>ID tidak ditemukan.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Menentukan karakter encoding yang digunakan -->
    <meta charset="UTF-8">
    <!-- Mengatur viewport agar halaman responsif di berbagai perangkat -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Judul halaman -->
    <title>Login Pengguna</title>
    <!-- Menambahkan gaya CSS internal -->
    <style>
        /* Menata tampilan dasar body */
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
        /* Menata tampilan kontainer login */
        .container {
            background: #fff;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }
        /* Judul di dalam kontainer */
        .container h2 {
            margin-bottom: 1.5rem;
            color: #45103E;
        }
        /* Label untuk input form */
        .container label {
            display: block;
            text-align: left;
            margin-bottom: 0.5rem;
            font-weight: bold;
        }
        /* Input teks */
        .container input[type="text"] {
            width: 100%;
            padding: 0.8rem;
            margin-bottom: 1rem;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        /* Tombol submit */
        .container input[type="submit"] {
            background-color: black;
            color: white;
            padding: 0.8rem 1.5rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
        }
        /* Hover efek untuk tombol submit */
        .container input[type="submit"]:hover {
            background-color: #45103E;
        }
        /* Paragraf tambahan */
        .container p {
            margin-top: 1rem;
        }
        /* Link tambahan */
        .container a {
            color: black;
            text-decoration: none;
        }
        /* Hover efek untuk link */
        .container a:hover {
            text-decoration: underline;
        }
        /* Menata pesan error */
        .error {
            color: red;
            margin-top: 1rem;
        }
    </style>
</head>
<body>
    <!-- Kontainer form login -->
    <div class="container">
        <!-- Judul form -->
        <h2>Login Karyawan</h2>
        <!-- Form login -->
        <form method="POST" action="">
            <!-- Input untuk ID pengguna -->
            <label>ID Karyawan:</label>
            <input type="text" name="id_karyawan" required>
            <!-- Tombol submit -->
            <input type="submit" value="Login">
        </form>
        <!-- Link ke halaman registrasi -->
        <p>Anda Admin? <a href="../admin/login.php">Admin Silahkan Login Di Sini</a></p>
        <p>Belum punya akun? <a href="registrasi.php">Registrasi di sini</a></p>
        <p>Kembali Ke Halaman Utama? <a href="../utama.html">Halaman Utama</a></p>
    </div>
</body>
</html>
