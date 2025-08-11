<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['id_karyawan'])) {
    // If not logged in, redirect to login page
    header('Location: login.php');
    exit;
}

include '../koneksi/koneksi.php'; // Make sure this path is correct

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and get form data
    $id_barang = $_POST['id_barang'];
    $nama_barang = $_POST['nama_barang'];
    $jumlah_stok = $_POST['jumlah_stok'];
    $harga = $_POST['harga'];

    // Prepare SQL query using prepared statements to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO barang (id_barang, nama_barang, jumlah_stok, harga) VALUES (?, ?, ?, ?)");
    
    // Bind parameters (s = string, i = integer)
    $stmt->bind_param("ssii", $id_barang, $nama_barang, $jumlah_stok, $harga);

    // Execute the query and check if it was successful
    if ($stmt->execute()) {
        // If successful, show a success message and redirect
        echo "<script>
            alert('Data berhasil disimpan!\\n\\nID Barang: " . htmlspecialchars($id_barang) . "\\nNama Barang: " . htmlspecialchars($nama_barang) . "\\nJumlah Stok: " . htmlspecialchars($jumlah_stok) . "\\nHarga: " . htmlspecialchars($harga) . "');
            window.location.href = 'addbarang.php'; // Redirect ke halaman lain setelah pop-up
        </script>";
    } else {
        // If there's an error, show an error message
        echo "<script>
            alert('Error menyimpan data: " . $stmt->error . "');
            window.history.back(); // Go back if error occurs
        </script>";
    }

    // Close the prepared statement and connection
    $stmt->close();
    $conn->close();
}
?>
