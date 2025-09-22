-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2025 at 04:12 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fotocopy`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` varchar(255) NOT NULL,
  `Nama_barang` varchar(255) DEFAULT NULL,
  `Jumlah_stok` varchar(255) DEFAULT NULL,
  `Harga` bigint(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `Nama_barang`, `Jumlah_stok`, `Harga`) VALUES
('12414', '12515', '3513513', 135135),
('1242', '124', '1124', 124),
('1251635746857', '124524635768', '13425467', 1232556),
('125215', '12312', '124124', 1531),
('125246', '152', '4615', 124),
('1253643576856', '4325465', '43254657', 12453264),
('125415', '124141', '12421412', 124214),
('125415512', '124', '13', 12),
('141', '124', '53123', 1244),
('1411', '124', '12', 12),
('141144', '123412', '134', 12),
('141144151', '12312', '12', 412),
('FC008', 'pensil warna', '250', 25000),
('FC009', 'pensil mekanik', '200', 8000),
('FC010', 'pulpen gel', '270', 5000),
('FC011', 'pulpen rollerball', '200', 12000),
('FC012', 'spidol permanen', '450', 10000),
('FC013', 'spidol whiteboard', '450', 8000),
('FC014', 'spidol highlighter', '300', 5000),
('FC015', 'penghapus pensil', '200', 4000),
('FC016', 'penghapus papan tulis', '200', 10000),
('FC017', 'kertas printer', '1000', 200),
('FC018', 'buku catatan kotak', '400', 5000),
('FC019', 'klip kertas', '9000', 500),
('FC020', 'stapler', '200', 25000),
('FC021', 'map kertas', '1000', 2000),
('FC022', 'folder plastic', '200', 3000),
('FC023', 'penggaris lurus', '350', 5000),
('FC024', 'penggaris geometri', '350', 5000),
('FC025', 'selotip', '300', 6000),
('FC026', 'cutter', '240', 8000),
('FC027', 'gunting', '250', 7000),
('FC028', 'tipe-x', '200', 5000),
('FC029', 'correction tape', '200', 12000),
('FC030', 'lem stik', '400', 4000),
('FC040', 'lem cair', '400', 4000),
('FC041', 'stempel', '400', 30000),
('FC042', 'tinta stemple', '200', 18000),
('FC043', 'stiker kertas', '200', 6000),
('FC044', 'label alamat', '400', 5000),
('FC045', 'kalkulator', '200', 30000),
('FC046', 'peta dunia', '300', 50000),
('FC047', 'cat air', '330', 40000),
('FC048', 'cat pastel', '430', 40000),
('FC049', 'ID card nametag', '300', 3000),
('FC050', 'plastik binder strip', '300', 7000),
('FC051', 'sticky notes', '300', 4000),
('FC052', 'binder 20 ring', '200', 55000),
('FC053', 'binder 26 ring', '200', 73000),
('FC054', 'mesin laminating', '1', 1000),
('FC055', 'kertas jeruk', '300', 2000),
('FC056', 'isi stapler', '200', 5000),
('FC057', 'double tape', '200', 7000),
('FC058', 'bendera merah putih', '200', 73000),
('FC059', 'flashdisk 16GB', '110', 100000),
('FC060', 'tinta printer', '400', 50000),
('FC061', 'buku A5', '200', 8000),
('FC062', 'kotak pensil', '300', 10000),
('FC063', 'pulpen 0', '5mm', 300),
('FC064', 'refill lem tembak', '500', 800),
('FC065', 'lem tembak besar', '200', 50000),
('FC066', 'lem tembak kecil', '200', 19000),
('FC067', 'lakban bening 48mm', '200', 10000),
('FC068', 'zebra kokoro', '500', 5000),
('FC069', 'kenko isi cutter', '300', 2000),
('FC070', 'joyko brush pen isi 12', '250', 31000),
('FC071', 'kenko cutter', '300', 13000),
('FC072', 'tombow pen soft', '300', 23000),
('FC073', 'joyko kuas Lukis', '300', 11000),
('FC074', 'Vtec kuas Lukis', '300', 26000),
('FC075', 'lem korea', '500', 6000),
('FC076', 'snowman brushpen', '300', 5000),
('FC077', 'lem fox', '200', 6000),
('FC078', 'snowman paint marker', '200', 13000),
('FC079', 'kenko pembolong kecil', '200', 15000),
('FC080', 'lem uhu', '200', 7000),
('FC081', 'palet Lukis', '200', 6000),
('FC082', 'push pin isi 30', '200', 4000),
('FC083', 'pulpen standart', '200', 2000),
('FC084', 'metalic pen isi 12', '200', 50000),
('FC085', 'zebra sarasa', '150', 15000),
('FC086', 'debozz gel pen', '200', 3000),
('FC087', 'loose leaf binder', '200', 22000),
('FC088', 'joyko drawing pen', '150', 55000),
('FC089', 'artline marker', '200', 25000),
('FC090', 'kertas double folio', '300', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` varchar(255) NOT NULL,
  `Nama_C` varchar(255) DEFAULT NULL,
  `No_telepon` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `Nama_C`, `No_telepon`) VALUES
('cusr1', 'IDRIS SYAIFULLOH', '0919807'),
('P45R1', 'chimi', '088895463767'),
('P45R2', 'pijor', '087723097149'),
('P45R3', 'zea', '085209547823'),
('P45R4', 'haykal', '809856401374'),
('P45R5', 'apip', '089752840462');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` varchar(255) NOT NULL,
  `Nama` varchar(255) DEFAULT NULL,
  `Alamat` varchar(255) DEFAULT NULL,
  `No_telepon` int(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `Nama`, `Alamat`, `No_telepon`, `role`) VALUES
('124142', '124', '124', 214, 'staff'),
('tc12', 'ZAN', 'BOGOT', 123, ''),
('tc1234', 'Farid Riyadsmara', 'Bekasi', 1095105701, ''),
('tc12345', 'micheellle', 'gtw', 879865746, 'admin'),
('tc325', 'IDRIS SAYIFULLOH', 'BOGOT', 214, ''),
('tc431', 'IDRIS SAYIFULLOH', 'Bekasi', 879865746, ''),
('TFC054', 'Rifky', 'sukapura', 2147483647, ''),
('TFC070', 'Michelle', 'sukabirus', 2147483647, ''),
('TFC077', 'Idris', 'sukapura', 2147483647, 'admin'),
('TFC0775', 'IDRIS', 'JAKARTA', 98765432, 'staff'),
('TFC120', 'ZAN', 'BOGOT', 12312412, ''),
('TFC120123', 'idris', 'asu', 123, '');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` varchar(255) NOT NULL,
  `id_customer` varchar(255) DEFAULT NULL,
  `id_karyawan` varchar(255) DEFAULT NULL,
  `id_barang` varchar(255) DEFAULT NULL,
  `jumlah` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `id_customer`, `id_karyawan`, `id_barang`, `jumlah`) VALUES
('', 'P45R1', 'TFC054', 'FC001', '1'),
('12341', '', 'TFC120123', 'FC023', '124'),
('1241525', 'cusr1', 'tc12', 'FC024', '12'),
('5566', 'P45R2', 'TFC120123', 'FC024', '13'),
('a12', 'P45R1', 'TFC077', 'FC024', '2'),
('O125135', 'cusr1', 'tc325', 'FC011', '12'),
('OR01T1', 'P45R1', 'TFC054', 'FC053', '2'),
('OR01T11', 'P45R1', 'TFC120', 'FC024', ''),
('OR01T1112', 'P45R1', 'TFC070', 'FC023', ''),
('OR01T11241', '', 'TFC120123', 'FC022', '124'),
('OR01T112415', '', 'TFC120123', 'FC022', '12'),
('OR01T1125', 'P45R1', 'tc12', 'FC025', '12'),
('OR01T11256623', 'P45R3', 'TFC070', 'FC040', '124'),
('OR01T155', 'P45R1', 'TFC120123', 'FC023', '1'),
('OR01T165', 'P45R1', 'TFC120', 'FC023', '2'),
('OR01T180', 'cusr1', 'tc1234', 'FC013', '12'),
('OR01T4III', 'cusr1', 'tc1234', 'FC015', '12'),
('OR21T3', 'P45R2', 'TFC077', 'FC068', '3'),
('OR25T2', 'P45R5', 'TFC070', 'FC059', '1'),
('OR30T2', 'P45R4', 'TFC054', 'FC080', '4'),
('OR35T8', 'P45R3', 'TFC077', 'FC025', '5');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(255) NOT NULL,
  `id_customer` varchar(255) DEFAULT NULL,
  `id_karyawan` varchar(255) DEFAULT NULL,
  `id_pesanan` varchar(255) DEFAULT NULL,
  `id_barang` varchar(255) DEFAULT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_customer`, `id_karyawan`, `id_pesanan`, `id_barang`, `jumlah`, `harga`) VALUES
('1212454135', 'P45R3', 'TFC070', 'OR01T11256623', 'FC040', 124, NULL),
('12415', '', '', '', '', 0, 0.00),
('12415164', '', '', '', '', 0, 0.00),
('124213411', '', '', '', '', 0, 0.00),
('a12415124', 'cusr1', 'tc1234', 'OR01T4III', 'FC015', 12, NULL),
('a2', '', '', '', '', 0, 0.00),
('a27890', '', '', '', '', 0, 0.00),
('anjayy', 'cusr1', 'tc1234', 'OR01T180', 'FC013', 12, NULL),
('HB8123', '', '', '', '', 0, 0.00),
('HB8219', 'P45R4', 'TFC054', 'OR30T2', 'FC080', 0, NULL),
('KL6743', 'P45R5', 'TFC070', 'OR25T2', 'FC059', 0, NULL),
('TR0087', 'P45R1', 'TFC054', 'OR01T1', 'FC053', 23, 1679000.00),
('UY6478', 'P45R3', 'TFC077', 'OR35T8', 'FC025', 0, NULL),
('YT6723', 'P45R2', 'TFC077', 'OR21T3', 'FC068', 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `id_customer` (`id_customer`),
  ADD KEY `id_karyawan` (`id_karyawan`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_customer` (`id_customer`),
  ADD KEY `id_karyawan` (`id_karyawan`),
  ADD KEY `id_pesanan` (`id_pesanan`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_2` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
