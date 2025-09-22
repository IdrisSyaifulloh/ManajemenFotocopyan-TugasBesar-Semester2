<?php
include '../koneksi/koneksi.php';

// Cek apakah parameter id_transaksi tersedia
if (isset($_GET['id_transaksi'])) {
    $id_transaksi = $conn->real_escape_string($_GET['id_transaksi']);

    // Query untuk menghapus data
    $query = "DELETE FROM nama_tabel WHERE id_transaksi = '$id_transaksi'";

    if ($conn->query($query) === TRUE) {
        echo "Data dengan ID Transaksi $id_transaksi berhasil dihapus.";
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "ID Transaksi tidak ditemukan.";
}

// Tutup koneksi
$conn->close();
?>
