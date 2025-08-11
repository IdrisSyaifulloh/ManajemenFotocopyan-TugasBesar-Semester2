<?php
session_start();
include '../koneksi/koneksi.php';

// Mengecek apakah pengguna sudah login
if (!isset($_SESSION['id_karyawan'])) {
    header('Location: login.php');
    exit;
}

$nama = isset($_SESSION['Nama']) ? $_SESSION['Nama'] : 'Guest';

// Cek apakah id_transaksi ada di URL atau POST
if (isset($_POST['id_transaksi'])) {
    $id_transaksi = $_POST['id_transaksi'];

    // Query untuk mendapatkan data transaksi berdasarkan id_transaksi
    $query = "SELECT 
                transaksi.id_transaksi,
                customer.Nama_C,
                karyawan.Nama,
                transaksi.id_pesanan,
                barang.Nama_barang,
                barang.Harga,
                pesanan.jumlah,
                (barang.Harga * pesanan.jumlah) AS total_harga
              FROM 
                transaksi
              JOIN 
                customer ON transaksi.id_customer = customer.id_customer
              JOIN 
                karyawan ON transaksi.id_karyawan = karyawan.id_karyawan
              JOIN 
                barang ON transaksi.id_barang = barang.id_barang
              JOIN
                pesanan ON transaksi.id_pesanan = pesanan.id_pesanan
              WHERE transaksi.id_transaksi = '$id_transaksi'";

    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Simpan data transaksi ke dalam variabel
        $id_transaksi = $row['id_transaksi'];
        $nama_customer = $row['Nama_C'];
        $nama_barang = $row['Nama_barang'];
        $harga_barang = $row['Harga'];
        $jumlah = $row['jumlah'];
        $total_harga = $row['total_harga'];
    } else {
        echo "Data transaksi tidak ditemukan.";
        exit;
    }
} else {
    echo "ID Transaksi tidak ditemukan.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <style>
    .bg-custom {
            background-color: #45103E !important;
        }</style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary bg-custom">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Fotocopy</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="utama.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="../admin/barangkaryawan.php">Barang</a></li>
                    <li class="nav-item"><a class="nav-link" href="../admin/datakaryawan.php">Karyawan</a></li>
                    <li class="nav-item"><a class="nav-link" href="transaksi.php">Transaksi</a></li>
                </ul>
                <a href="../admin/logout.php" class="btn btn-secondary" style="margin-right: 10px;">Logout</a>
                <a href="" class="btn btn-secondary"><?php echo $nama; ?></a>
            </div>
        </div>
    </nav>

    <h1 class="text-center">Edit Transaksi</h1>

    <div class="container">
        <!-- Form untuk edit transaksi -->
        <form method="POST" action="proses_edit.php">
            <input type="hidden" name="id_transaksi" value="<?php echo $id_transaksi; ?>">

            <div class="mb-3">
                <label for="nama_customer" class="form-label">Nama Customer</label>
                <input type="text" class="form-control" id="nama_customer" name="nama_customer" value="<?php echo $nama_customer; ?>" required>
            </div>

            <div class="mb-3">
                <label for="nama_barang" class="form-label">Nama Barang</label>
                <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="<?php echo $nama_barang; ?>" required>
            </div>

            <div class="mb-3">
                <label for="harga_barang" class="form-label">Harga Barang</label>
                <input type="number" class="form-control" id="harga_barang" name="harga_barang" value="<?php echo $harga_barang; ?>" required>
            </div>

            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah</label>
                <input type="number" class="form-control" id="jumlah" name="jumlah" value="<?php echo $jumlah; ?>" required>
            </div>

            <div class="mb-3">
                <label for="total_harga" class="form-label">Total Harga</label>
                <input type="number" class="form-control" id="total_harga" name="total_harga" value="<?php echo $total_harga; ?>" readonly>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
