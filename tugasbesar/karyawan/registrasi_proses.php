<?php
require '../koneksi/koneksi.php';

$id_karyawan = $_POST['id_karyawan'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$no_telepon = $_POST['no_telepon'];

// 3. Validasi data
$errors = [];
if (empty($id_karyawan)) {
    $errors[] = "ID Karyawan wajib diisi.";
}
if (empty($nama)) {
    $errors[] = "Nama wajib diisi.";
}
if (empty($alamat)) {
    $errors[] = "Alamat wajib diisi.";
}
if (empty($no_telepon) || !is_numeric($no_telepon)) {
    $errors[] = "Nomor telepon wajib diisi dan harus berupa angka.";
}

// Jika ada error, tampilkan pesan dan hentikan proses
if (!empty($errors)) {
    foreach ($errors as $error) {
        echo "<p style='color: red;'>$error</p>";
    }
    exit();
}

// 4. Simpan data ke database
$sql = "INSERT INTO karyawan (id_karyawan, nama, alamat, no_telepon) 
        VALUES ('$id_karyawan', '$nama', '$alamat', '$no_telepon')";

// Eksekusi query
if ($conn->query($sql) === TRUE) {
    // Tampilkan pesan pop-up menggunakan JavaScript
    echo "<script>
        alert('Data berhasil disimpan!\\n\\nID Karyawan: $id_karyawan\\nNama: $nama\\nAlamat: $alamat\\nNo. Telepon: $no_telepon');
        window.location.href = '../utama.html'; // Redirect ke halaman lain setelah pop-up
    </script>";
} else {
    // Tampilkan pesan error di pop-up
    echo "<script>
        alert('Error menyimpan data: " . $conn->error . "');
        window.history.back(); // Kembali ke halaman sebelumnya jika ada error
    </script>";
}

// 5. Tutup koneksi
$conn->close();
?>
