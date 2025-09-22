<?php
// Mulai session
session_start();

// Include file koneksi ke database
include '../koneksi/koneksi.php';

// Mengecek apakah form telah disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mengambil data dari form
    $id_customer = $_POST['id_customer'];
    $Nama_C = $_POST['Nama_C'];
    $No_telepon = $_POST['No_telepon'];

    // Validasi apakah data sudah ada sebelumnya
    $sql_check = "SELECT * FROM customer WHERE id_customer = '$id_customer'";
    $result_check = mysqli_query($conn, $sql_check);

    if (mysqli_num_rows($result_check) > 0) {
        echo "<script>
            alert('ID Customer sudah terdaftar, silakan gunakan ID lain.');
            window.location.href='registrasi_form.php';
        </script>";
        exit;
    }

    // Query untuk menyimpan data ke tabel customer
    $sql_insert = "INSERT INTO customer (id_customer, Nama_C, No_telepon) 
                   VALUES ('$id_customer', '$Nama_C', '$No_telepon')";

    if (mysqli_query($conn, $sql_insert)) {
        echo "<script>
            alert('Registrasi customer berhasil!');
            window.location.href='customer.php';
        </script>";
    } else {
        echo "<script>
            alert('Gagal menyimpan data: " . mysqli_error($conn) . "');
            window.history.back();
        </script>";
    }
} else {
    echo "<script>
        alert('Akses tidak diizinkan!');
        window.location.href='registrasi_form.php';
    </script>";
}
