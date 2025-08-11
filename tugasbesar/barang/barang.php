<?php
 include '../koneksi/koneksi.php';
 $sql = "SELECT * FROM barang";
// Menjalankan query
$barang = mysqli_query($conn, $sql);
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
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
        aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarScroll">
        <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/tugasbesar/utama.html">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="barang.php"> Barang </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="../customer/customer.php"> Customer </a>
          </li>
            <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="../pesanan/pesanan.php"> Pesan </a>
          </li>
        </ul>
        <a href="../karyawan/login.php" class="btn btn-secondary">LOGIN</a>


      </div>
    </div>
  </nav><!-- PENUTUP NAVBAR -->

<!-- CARD UNTUK MEMBUNGKUS SEBUAH TABEL -->
<div class="card"><!-- PEMBUKA CARD -->
  <div class="card-header">
    Barang
  </div>
  <br>
  <div class="card-body">
    

 
  <table class="table-responsive w-full rounded">
    <thead  style= " background-color: #45103E !important;";>
        <tr>
        <th class="border px-4 py-2"> ID BARANG </th>
        <th class="border px-4 py-2"> NAMA BARANG </th>
        <th class="border w-1/5 px-4 py-2"> STOK BARANG </th>
        <th class="border px-8 py-2"> HARGA </th>
        </tr>
    </thead>
    <tbody>
                    <?php while ($data = mysqli_fetch_assoc($barang)): ?>
                        <tr>
                            <td class="border px-4 py-2"><?php echo $data['id_barang']; ?></td>
                            <td class="border px-4 py-2"><?php echo $data['Nama_barang']; ?></td>
                            <td class="border px-4 py-2"><?php echo $data['Jumlah_stok']; ?></td>
                            <td class="border px-8 py-2">Rp. <?php echo $data['Harga']; ?></td>
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