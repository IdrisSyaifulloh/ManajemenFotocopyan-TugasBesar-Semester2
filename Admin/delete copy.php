<?php
include '../koneksi/koneksi.php';

// Check if 'id' parameter is passed
if (isset($_GET['id'])) {
    $id_barang = mysqli_real_escape_string($conn, $_GET['id']);

    // SQL query to delete item from the database
    $sql = "DELETE FROM barang WHERE id_barang = '$id_barang'";

    if (mysqli_query($conn, $sql)) {
        // Redirect to barangkaryawan.php after successful deletion
        header("Location: barangkaryawan.php");
        exit(); // Stop further execution
    } else {
        echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
        // Redirect to barangkaryawan.php in case of error
        header("Location: barangkaryawan.php");
        exit();
    }
} else {
    die("Invalid request.");
}
?>
