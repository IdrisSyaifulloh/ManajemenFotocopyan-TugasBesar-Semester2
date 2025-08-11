<?php
session_start();
include '../koneksi/koneksi.php';

// Mengecek apakah pengguna sudah login
if (!isset($_SESSION['id_karyawan'])) {
    header('Location: login.php');
    exit;
}

$nama = isset($_SESSION['Nama']) ? $_SESSION['Nama'] : 'Guest';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add'])) {
    $id_karyawan = $_POST['id_karyawan'];
    $nama_karyawan = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_telepon = $_POST['no_telepon'];
    $role = $_POST['role'];

    $sql = "INSERT INTO karyawan (id_karyawan, Nama, Alamat, No_telepon, role) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $id_karyawan, $nama_karyawan, $alamat, $no_telepon, $role);
    $stmt->execute();

    header('Location: datakaryawan.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Karyawan</title>
    <link rel="stylesheet" href="../style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <style>
        
        .card {
            width: 800px;
            margin: 20px auto;
            left: 25px;
        }
    </style>
</head>

<body>

    <div class="card">
        <div class="card-header">Tambah Karyawan</div>
        <div class="card-body">
            <!-- Form Tambah -->
            <form method="POST" class="mb-3">
                <div class="mb-3">
                    <label for="id_karyawan" class="form-label">ID Karyawan</label>
                    <input type="text" name="id_karyawan" id="id_karyawan" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Karyawan</label>
                    <input type="text" name="nama" id="nama" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" name="alamat" id="alamat" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="no_telepon" class="form-label">No Telepon</label>
                    <input type="text" name="no_telepon" id="no_telepon" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label">Role</label>
                    <select name="role" id="role" class="form-select">
                        <option value="admin">Admin</option>
                        <option value="staff">Staff</option>
                    </select>
                </div>
                <button type="submit" name="add" class="btn btn-success">Tambah Karyawan</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
