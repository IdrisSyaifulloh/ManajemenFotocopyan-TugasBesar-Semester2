<?php
session_start();
include '../koneksi/koneksi.php';

// Mengecek apakah pengguna sudah login
if (!isset($_SESSION['id_karyawan'])) {
    header('Location: login.php');
    exit;
}

$nama = isset($_SESSION['Nama']) ? $_SESSION['Nama'] : 'Guest';

// Query data karyawan
$sql = "SELECT * FROM karyawan";
$barang = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Karyawan</title>
    <link rel="stylesheet" href="../style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <style>
        .card {
            width: 800px;
            margin: 20px auto;
            left: 25px;
        }
        .bg-custom {
            background-color: #45103E !important;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary bg-custom">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Fotocopy</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto navbar-nav-scroll">
                    <li class="nav-item"><a class="nav-link active" href="utama.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="barangkaryawan.php">Barang</a></li>
                    <li class="nav-item"><a class="nav-link" href="datakaryawan.php">Karyawan</a></li>
                    <li class="nav-item"><a class="nav-link" href="../transaksi/transaksi.php">Transaksi</a></li>
                </ul>
                <a href="logout.php" class="btn btn-secondary me-2">Logout</a>
                <span class="btn btn-secondary"><?php echo $nama; ?></span>
            </div>
        </div>
    </nav>

    <!-- Card -->
    <div class="card">
        <div class="card-header">Data Karyawan</div>
        <div class="card-body">
            <!-- Tabel -->
            <a href="add_karyawan.php" class="btn btn-success mb-3">Tambah Karyawan</a>
            <table class="table table-bordered">
                <thead class="bg-custom text-white">
                    <tr>
                        <th>ID Karyawan</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>No Telepon</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($data = $barang->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $data['id_karyawan']; ?></td>
                            <td><?php echo $data['Nama']; ?></td>
                            <td><?php echo $data['Alamat']; ?></td>
                            <td><?php echo $data['No_telepon']; ?></td>
                            <td><?php echo $data['role']; ?></td>
                            <td>
                                <a href="edit_karyawan.php?id=<?php echo $data['id_karyawan']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="delete_karyawan.php?delete=<?php echo $data['id_karyawan']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">Hapus</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
