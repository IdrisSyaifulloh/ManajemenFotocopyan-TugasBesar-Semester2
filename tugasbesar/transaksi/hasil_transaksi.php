<?php
// Koneksi ke database
include 'koneksi/koneksi.php';

// Ambil ID pesanan dari URL
$id_pesanan = $_GET['id_pesanan'];

// Query untuk mengambil data pesanan beserta detail customer, karyawan, dan barang
$sql = "
    SELECT 
        pesanan.id_pesanan,
        customer.Nama AS customer_nama,
        karyawan.Nama AS karyawan_nama,
        barang.Nama_barang,
        pesanan.jumlah,
        barang.Harga,
        (barang.Harga * pesanan.jumlah) AS total_harga
    FROM pesanan
    JOIN customer ON pesanan.id_customer = customer.id_customer
    JOIN karyawan ON pesanan.id_karyawan = karyawan.id_karyawan
    JOIN barang ON pesanan.id_barang = barang.id_barang
    WHERE pesanan.id_pesanan = '$id_pesanan'
";
$result = mysqli_query($conn, $sql);

// Cek jika ada hasil
if ($row = mysqli_fetch_assoc($result)) {
    // Menampilkan data hasil transaksi
    $total_harga = number_format($row['total_harga'], 2, ',', '.');
} else {
    echo "Pesanan tidak ditemukan.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Detail Transaksi</h2>
        <table class="table">
            <tr>
                <th>ID Pesanan</th>
                <td><?php echo $row['id_pesanan']; ?></td>
            </tr>
            <tr>
                <th>Nama Customer</th>
                <td><?php echo $row['Nama']; ?></td>
            </tr>
            <tr>
                <th>Nama Karyawan</th>
                <td><?php echo $row['karyawan_nama']; ?></td>
            </tr>
            <tr>
                <th>Nama Barang</th>
                <td><?php echo $row['Nama_barang']; ?></td>
            </tr>
            <tr>
                <th>Jumlah</th>
                <td><?php echo $row['jumlah']; ?></td>
            </tr>
            <tr>
                <th>Total Harga</th>
                <td>Rp. <?php echo $total_harga; ?></td>
            </tr>
        </table>

        <a href="index.php" class="btn btn-primary">Kembali ke Beranda</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
