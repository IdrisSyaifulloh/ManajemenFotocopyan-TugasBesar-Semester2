<?php
session_start();
include '../koneksi/koneksi.php';
// Mengecek apakah pengguna sudah login
if (!isset($_SESSION['id_karyawan'])) {
   // Jika tidak, alihkan pengguna ke halaman login
   header('Location: login.php');
   exit;
}
$nama = isset($_SESSION['Nama']) ? $_SESSION['Nama'] : 'Guest';
$sql = "SELECT 
            pesanan.id_pesanan,
            customer.Nama_C,
            karyawan.Nama,
            barang.nama_barang,
            barang.harga,
            pesanan.jumlah,
            (barang.Harga * pesanan.jumlah) AS total_harga
        FROM 
            pesanan
        JOIN customer ON pesanan.id_customer = customer.id_customer
        JOIN karyawan ON pesanan.id_karyawan = karyawan.id_karyawan
        JOIN barang ON pesanan.id_barang = barang.id_barang";
$barang = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .card {
            width: 900px;
            left: 20%;
            top: 15px;
        }
        .bg-custom {
            background-color: #45103E !important;
        }
    </style>
</head>
<body>
   <!-- NAVIGASI PADA HALAMAN UTAMA WEB -->
   <nav class="navbar navbar-expand-lg navbar-dark bg-primary bg-custom">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Fotocopy</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="utama.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="barangkaryawan.php">Barang</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="datakaryawan.php">Karyawan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pesanan.php">Pesanan</a>
          </li>
      </ul>
      <!-- FORM SEARCH -->
      <a href="logout.php" class="btn btn-secondary" style="margin-right: 10px;">Logout</a>
        <a href="" class="btn btn-secondary"><?php echo $nama; ?></a>

    </div>
  </div>
</nav><!-- PENUTUP NAVBAR -->

    <div class="card">
        <div class="card-header">
            Pesanan
        </div>
        <br>
        <div class="card-body">
            <table class="table-responsive w-full rounded">
                <thead style="background-color: #45103E !important;">
                    <tr>
                        <th class="border px-4 py-2">ID PESANAN</th>
                        <th class="border px-4 py-2">NAMA CUSTOMER</th>
                        <th class="border px-4 py-2">NAMA KARYAWAN</th>
                        <th class="border px-4 py-2">NAMA BARANG</th>
                        <th class="border px-4 py-2">HARGA BARANG</th>
                        <th class="border px-4 py-2">JUMLAH</th>
                        <th class="border px-4 py-2">TOTAL HARGA</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($data = mysqli_fetch_assoc($barang)): ?>
                        <tr>
                            <td class="border px-4 py-2"><?php echo $data['id_pesanan']; ?></td>
                            <td class="border px-4 py-2"><?php echo $data['Nama_C']; ?></td>
                            <td class="border px-4 py-2"><?php echo $data['Nama']; ?></td>
                            <td class="border px-4 py-2"><?php echo $data['nama_barang']; ?></td>
                            <td class="border px-4 py-2">Rp. <?php echo number_format($data['harga'], 0, ',', '.'); ?></td>
                            <td class="border px-4 py-2"><?php echo $data['jumlah']; ?></td>
                            <td class="border px-4 py-2">Rp. <?php echo number_format($data['total_harga'], 0, ',', '.'); ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
