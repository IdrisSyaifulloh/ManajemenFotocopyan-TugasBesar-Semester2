<?php
include '../koneksi/koneksi.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and get form data
    $id_barang = mysqli_real_escape_string($conn, $_POST['id_barang']);
    $nama_barang = mysqli_real_escape_string($conn, $_POST['nama_barang']);
    $jumlah_stok = mysqli_real_escape_string($conn, $_POST['jumlah_stok']);
    $harga = mysqli_real_escape_string($conn, $_POST['harga']);
    
    // SQL query to insert data into barang table
    $sql = "INSERT INTO barang (id_barang, nama_barang, jumlah_stok, harga) 
            VALUES ('$id_barang', '$nama_barang', '$jumlah_stok', '$harga')";

    // Execute query and check if it was successful
    if ($conn->query($sql) === TRUE) {
        // Show success message with the correct variables
        echo "<script>
            alert('Data berhasil disimpan!\\n\\nID Barang: $id_barang\\nNama Barang: $nama_barang\\nJumlah Stok: $jumlah_stok\\nHarga: $harga');
            window.location.href = 'barangkaryawan.php'; // Redirect ke halaman lain setelah pop-up
        </script>";
    } else {
        // Show error message with more detailed information
        echo "<script>
            alert('Error menyimpan data: " . $conn->error . "');
            window.history.back(); // Go back if error occurs
        </script>";
    }

    // Close connection
    $conn->close();
}
?>
