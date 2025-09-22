<?php
// delete_karyawan.php
include '../koneksi/koneksi.php';

if (isset($_GET['delete'])) {
    $id_karyawan = $_GET['delete'];
    $sql = "DELETE FROM karyawan WHERE id_karyawan = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $id_karyawan);
    $stmt->execute();
    header('Location: datakaryawan.php');
    exit;
}
?>
