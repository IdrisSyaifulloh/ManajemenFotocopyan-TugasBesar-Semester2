<?php
session_start();
include '../koneksi/koneksi.php';

// Mengecek apakah pengguna sudah login
if (!isset($_SESSION['id_karyawan'])) {
    header('Location: login.php');
    exit;
}

$nama = isset($_SESSION['Nama']) ? $_SESSION['Nama'] : 'Guest';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit'])) {
    $id_karyawan = $_POST['id_karyawan'];
    $nama_karyawan = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_telepon = $_POST['no_telepon'];
    $role = $_POST['role'];

    $sql = "UPDATE karyawan SET Nama = ?, Alamat = ?, No_telepon = ?, role = ? WHERE id_karyawan = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $nama_karyawan, $alamat, $no_telepon, $role, $id_karyawan);
    $stmt->execute();

    header('Location: datakaryawan.php');
    exit;
}

$id_edit = isset($_GET['id']) ? $_GET['id'] : null;
$karyawan = null;

if ($id_edit) {
    $sql = "SELECT * FROM karyawan WHERE id_karyawan = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $id_edit);
    $stmt->execute();
    $result = $stmt->get_result();
    $karyawan = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Karyawan</title>
    <link rel="stylesheet" href="../style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body>

    <div class="card">
        <div class="card-header">Edit Karyawan</div>
        <div class="card-body">
            <!-- Form Edit -->
            <form method="POST" class="mb-3">
                <input type="hidden" name="id_karyawan" value="<?php echo $karyawan['id_karyawan']; ?>">

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Karyawan</label>
                    <input type="text" name="nama" id="nama" class="form-control" value="<?php echo $karyawan['Nama']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" name="alamat" id="alamat" class="form-control" value="<?php echo $karyawan['Alamat']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="no_telepon" class="form-label">No Telepon</label>
                    <input type="text" name="no_telepon" id="no_telepon" class="form-control" value="<?php echo $karyawan['No_telepon']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label">Role</label>
                    <select name="role" id="role" class="form-select">
                        <option value="admin" <?php echo $karyawan['role'] == 'admin' ? 'selected' : ''; ?>>Admin</option>
                        <option value="staff" <?php echo $karyawan['role'] == 'staff' ? 'selected' : ''; ?>>Staff</option>
                    </select>
                </div>
                <button type="submit" name="edit" class="btn btn-warning">Update Karyawan</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
