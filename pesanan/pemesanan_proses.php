<?php
// Koneksi ke database
include '../koneksi/koneksi.php';

// Ambil data dari form
$id_pesanan = $_POST['id_pesanan'];
$id_customer = $_POST['id_customer'];
$id_karyawan = $_POST['id_karyawan'];
$id_barang = $_POST['id_barang'];
$jumlah = $_POST['jumlah'];

// Query untuk menyimpan data
$sql = "INSERT INTO pesanan (id_pesanan, id_customer, id_karyawan, id_barang, jumlah)
        VALUES ('$id_pesanan', '$id_customer', '$id_karyawan', '$id_barang', '$jumlah')";

if ($conn->query($sql) === TRUE) {
    echo "<script>
            alert('Data berhasil disimpan.');
            window.location.href = 'pesanan.php';
          </script>";
} else {
    echo "<script>
            alert('Error: " . addslashes($conn->error) . "');
            window.history.back();
          </script>";
}

$conn->close();
?>
