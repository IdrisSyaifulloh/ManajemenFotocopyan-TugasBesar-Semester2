<?php
include '../koneksi/koneksi.php';

// Check if 'id' parameter is passed
if (isset($_GET['id'])) {
    $id_barang = mysqli_real_escape_string($conn, $_GET['id']);

    // Fetch current data from the database
    $sql = "SELECT * FROM barang WHERE id_barang = '$id_barang'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
    } else {
        die("Item not found.");
    }
} else {
    die("Invalid request.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and get updated data
    $nama_barang = mysqli_real_escape_string($conn, $_POST['nama_barang']);
    $jumlah_stok = mysqli_real_escape_string($conn, $_POST['jumlah_stok']);
    $harga = mysqli_real_escape_string($conn, $_POST['harga']);

    // SQL query to update item in the database
    $update_sql = "UPDATE barang SET nama_barang = '$nama_barang', jumlah_stok = '$jumlah_stok', harga = '$harga' WHERE id_barang = '$id_barang'";

    if (mysqli_query($conn, $update_sql)) {
        // Redirect to barangkaryawan.php after successful update
        header("Location: barangkaryawan.php");
        exit(); // Stop further execution
    } else {
        echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Barang</title>
    <link rel="stylesheet" href="../style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Edit Barang</h2>
    <form method="POST" action="">
        <div class="mb-3">
            <label for="nama_barang" class="form-label">Nama Barang</label>
            <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="<?php echo $data['Nama_barang']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="jumlah_stok" class="form-label">Jumlah Stok</label>
            <input type="number" class="form-control" id="jumlah_stok" name="jumlah_stok" value="<?php echo $data['Jumlah_stok']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga" value="<?php echo $data['Harga']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
