<?php
// Memulai session untuk memeriksa apakah pengguna sudah login
session_start();

// Mengecek apakah pengguna sudah login
if (!isset($_SESSION['id_karyawan'])) {
    // Jika tidak, alihkan pengguna ke halaman login
    header('Location: login.php');
    exit;
}


// Mendapatkan nama pengguna dari session
$nama = $_SESSION['Nama'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <style>
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
<h1 class="text-center my-4">Selamat datang, Staff <?php echo $nama; ?>!</h1>
  <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
        aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div> 
    <div class="carousel-inner">
      <div class="carousel-item active" data-bs-interval="10000">
        <img src="1.jpg" class="d-block w-1000" alt="gambar1">
        <div class="carousel-caption d-none d-md-block">
          <h5>First slide label</h5>
          <p>Some representative placeholder content for the first slide.</p>
        </div>
      </div>
      <div class="carousel-item" data-bs-interval="2000">
        <img src="2.jpeg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Second slide label</h5>
          <p>Some representative placeholder content for the second slide.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="3jpg.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Third slide label</h5>
          <p>Some representative placeholder content for the third slide.</p>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
</body>

</html>