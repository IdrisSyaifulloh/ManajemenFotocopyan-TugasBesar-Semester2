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


// Query untuk menampilkan data transaksi dengan total harga yang dihitung
$query = "SELECT 
            transaksi.id_transaksi,
            customer.Nama_C,
            karyawan.Nama,
            transaksi.id_pesanan,
            barang.Nama_barang,
            barang.Harga,
            pesanan.jumlah,
            (barang.Harga * pesanan.jumlah) AS total_harga
          FROM 
            transaksi
          JOIN 
            customer ON transaksi.id_customer = customer.id_customer
          JOIN 
            karyawan ON transaksi.id_karyawan = karyawan.id_karyawan
          JOIN 
            barang ON transaksi.id_barang = barang.id_barang
          JOIN
            pesanan ON transaksi.id_pesanan = pesanan.id_pesanan";  // Ensure 'pesanan' table is joined correctly

// Execute the query and handle errors
$result = $conn->query($query);

if (!$result) {
    die("Query failed: " . $conn->error);  // Display the error message if the query fails
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input dan History Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <style>
        .bg-custom {
            background-color: #45103E !important;
        }
        /* Styling umum */
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: #45103E;
            margin-top: 20px;
        }

        /* Styling tabel */
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        table, th, td {
            border: 1px solid #45103E;
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
        }
        th {
            background-color: #45103E;
            color: white;
        }
        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        /* Styling form */
        form {
            margin: 20px auto;
            width: 80%;
            max-width: 500px;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #45103E;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #5a1d74;
        }

        /* Styling buttons */
        .btn {
            padding: 5px 10px;
            background-color: #45103E;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }
        .btn:hover {
            background-color: #5a1d74;
        }

        .action-btns {
            display: flex;
            gap: 10px;
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
          <a class="nav-link active" aria-current="page" href="../admin/utama.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../admin/barangkaryawan.php">Barang</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../admin/datakaryawan.php">Karyawan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="transaksi.php">Transaksi</a>
          </li>
      </ul>
      <!-- FORM SEARCH -->
      <a href="../admin/logout.php" class="btn btn-secondary" style="margin-right: 10px;">Logout</a>
        <a href="" class="btn btn-secondary"><?php echo $nama; ?></a>

    </div>
  </div>
</nav><!-- PENUTUP NAVBAR -->

    <h1>History Transaksi</h1>

    <!-- Tabel History Transaksi -->
    <table>
        <thead>
            <tr>
                <th>ID Transaksi</th>
                <th>Nama Customer</th>
                <th>Nama Karyawan</th>
                <th>ID Pesanan</th>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Check if $result is not null and contains rows
            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id_transaksi'] . "</td>";
                    echo "<td>" . $row['Nama_C'] . "</td>";
                    echo "<td>" . $row['Nama'] . "</td>";
                    echo "<td>" . $row['id_pesanan'] . "</td>";
                    echo "<td>" . $row['Nama_barang'] . "</td>";
                    echo "<td>" . $row['Harga'] . "</td>";
                    echo "<td>" . $row['jumlah'] . "</td>";
                    echo "<td>" . $row['total_harga'] . "</td>";
                    echo "<td class='action-btns'>
                            <form method='POST' action='edit.php'>
                             <input type='hidden' name='id_transaksi' value='" . $row['id_transaksi'] . "'>
                              <button type='submit' class='btn'>Edit</button>
                            </form>
                            <form method='GET' action='delete.php' onsubmit='return confirm(\"Apakah Anda yakin ingin menghapus?\")'>
                            <input type='hidden' name='id' value='" . $row['id_transaksi'] . "'>
                            <button type='submit' class='btn btn-danger'>Delete</button>
                        </form>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='9'>Tidak ada data transaksi</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>
</html>
