<?php
session_start();
 include '../koneksi/koneksi.php';
 $sql = "SELECT * FROM karyawan";
// Menjalankan query
$barang = mysqli_query($conn, $sql);
// Mengecek apakah pengguna sudah login
if (!isset($_SESSION['id_karyawan'])) {
    // Jika tidak, alihkan pengguna ke halaman login
    header('Location: login.php');
    exit;
}
$nama = isset($_SESSION['Nama']) ? $_SESSION['Nama'] : 'Guest';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- LINK CSS EKSTERNAL -->
    <link rel="stylesheet" href="../style.css">

    <!--LINK CSS BOOSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<style>
  .card {
 width: 600px;   /*lebar card */
 left: 28%; /* memberi jarak dari kiri */
 top: 15px; /*menjaga jarak kebawah */
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
        </li>
      </ul>
      <!-- FORM SEARCH -->
      <a href="logout.php" class="btn btn-secondary" style="margin-right: 10px;">Logout</a>
        <a href="" class="btn btn-secondary"><?php echo $nama; ?></a>

    </div>
  </div>
</nav><!-- PENUTUP NAVBAR -->
<!-- CARD UNTUK MEMBUNGKUS SEBUAH TABEL -->
<div class="card"><!-- PEMBUKA CARD -->
  <div class="card-header">
   KARYAWAN
  </div>
  <br>
  <div class="card-body">
    

 
  <table class="table-responsive w-full rounded">
    <thead style= " background-color: #45103E !important;";>
        <tr>
        <th class="border px-4 py-2"> ID KARYAWAN </th>
        <th class="border px-4 py-2"> NAMA KARYAWAN </th>
        <th class="border w-1/5 px-4 py-2"> ALAMAT </th>
        <th class="border px-8 py-2"> NO TELEPON </th>
        </tr>
    </thead>
    <tbody>
                    <?php while ($data = mysqli_fetch_assoc($barang)): ?>
                        <tr>
                            <td class="border px-4 py-2"><?php echo $data['id_karyawan']; ?></td>
                            <td class="border px-4 py-2"><?php echo $data['Nama']; ?></td>
                            <td class="border px-4 py-2"><?php echo $data['Alamat']; ?></td>
                            <td class="border px-8 py-2"><?php echo $data['No_telepon']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
</table>
  </div>
</div> <!-- PENUTUP CARD -->
<!-- LINK JAVASCRIPT BOOSTRAP-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>