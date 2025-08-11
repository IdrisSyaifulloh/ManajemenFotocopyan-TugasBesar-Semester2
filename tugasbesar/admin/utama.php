<?php
session_start();
if (!isset($_SESSION['id_karyawan']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
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
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
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
                        <a class="nav-link" href="../transaksi/transaksi.php">Transaksi</a>
                    </li>
                </ul>
                <!-- FORM SEARCH -->
                <a href="logout.php" class="btn btn-secondary" style="margin-right: 10px;">Logout</a>
                <a href="#" class="btn btn-secondary"><?php echo htmlspecialchars($_SESSION['Nama']); ?></a>
            </div>
        </div>
    </nav><!-- PENUTUP NAVBAR -->

    <h1 class="text-center my-4">Selamat datang, Admin <?php echo htmlspecialchars($_SESSION['Nama']); ?>!</h1>

    <!-- CAROUSEL -->
    <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="10000">
                <img src="1.jpg" class="d-block w-100" alt="Slide 1">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Slide Pertama</h5>
                    <p>Deskripsi untuk slide pertama.</p>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="2.jpeg" class="d-block w-100" alt="Slide 2">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Slide Kedua</h5>
                    <p>Deskripsi untuk slide kedua.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="3jpg.jpg" class="d-block w-100" alt="Slide 3">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Slide Ketiga</h5>
                    <p>Deskripsi untuk slide ketiga.</p>
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
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>
