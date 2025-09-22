<?php
include '../koneksi/koneksi.php';

// Mengecek apakah ada data yang dikirimkan
if (isset($_POST['id_transaksi'])) {
    $id_transaksi = $_POST['id_transaksi'];
    $nama_customer = $_POST['nama_customer'];
    $nama_barang = $_POST['nama_barang'];
    $harga_barang = $_POST['harga_barang'];
    $jumlah = $_POST['jumlah'];
    $total_harga = $harga_barang * $jumlah;  // Menghitung total harga

    // Query untuk update data transaksi
    $query = "UPDATE transaksi SET 
                id_customer = (SELECT id_customer FROM customer WHERE Nama_C = '$nama_customer'),
                id_barang = (SELECT id_barang FROM barang WHERE Nama_barang = '$nama_barang'),
                Harga = '$harga_barang',
                jumlah = '$jumlah',
                harga = '$total_harga'
              WHERE id_transaksi = '$id_transaksi'";

    if ($conn->query($query)) {
        header('Location: transaksi.php');  // Redirect ke halaman transaksi setelah sukses
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "ID Transaksi tidak ditemukan.";
}
?>