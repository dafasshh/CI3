-- BAGIAN PERBAIKAN: Membuat dan Memilih Database Otomatis
CREATE DATABASE IF NOT EXISTS web_wisata;
USE web_wisata;

-- KODE ASLI (Lanjutan):
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Table structure for table `destinasi`
--

CREATE TABLE `destinasi` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `gambar` varchar(150) DEFAULT NULL,
  `harga_domestik` int(11) NOT NULL,
  `harga_mancanegara` int(11) NOT NULL,
  `parkir_motor` int(11) NOT NULL,
  `parkir_mobil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `destinasi`
--

INSERT INTO `destinasi` (`id`, `nama`, `lokasi`, `kategori`, `deskripsi`, `gambar`, `harga_domestik`, `harga_mancanegara`, `parkir_motor`, `parkir_mobil`) VALUES
(1, 'Pantai Pelabuhan Ratu', 'Sukabumi', 'Pantai', 'Pantai populer di Sukabumi', 'pantai.jpg', 25000, 100000, 5000, 10000),
(2, 'Curug Cikaso', 'Sukabumi', 'Air Terjun', 'Air terjun alami', 'curug.jpg', 20000, 75000, 3000, 8000),
(3, 'Geopark Ciletuh', 'Sukabumi', 'Alam', 'Geopark dunia', 'ciletuh.jpg', 30000, 120000, 5000, 12000),
(4, 'Situ Gunung Suspension Bridge', 'Sukabumi', 'Alam', 'Jembatan gantung terpanjang di Asia Tenggara (243m) yang membentang indah di atas lembah Taman Nasional Gunung Gede Pangrango. Menawarkan pengalaman wisata alam yang memacu adrenalin, pemandangan hutan tropis yang hijau, serta akses mudah menuju air terjun Curug Sawer.', '1767511020_Suspension_Bridge.jpg', 50, 100, 5, 10);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `id_pemesanan` int(11) DEFAULT NULL,
  `status` enum('Menunggu','Lunas','Ditolak') DEFAULT 'Menunggu'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `id_pemesanan`, `status`) VALUES
(1, 1, 'Lunas');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id` int(11) NOT NULL,
  `id_wisata` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tipe` varchar(20) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `metode_pembayaran` varchar(30) NOT NULL,
  `tanggal_pesan` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) NOT NULL DEFAULT 'Menunggu'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id`, `id_wisata`, `nama`, `no_hp`, `jumlah`, `tipe`, `total_harga`, `metode_pembayaran`, `tanggal_pesan`, `status`) VALUES
(1, 1, 'Daffa', '089', 1, 'Domestik', 25000, 'DANA', '2026-01-04 02:53:02', 'Lunas'),
(2, 1, 'ade', '081', 2, 'Domestik', 50000, 'OVO', '2026-01-04 06:15:40', 'Lunas');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', 'admin123', 'admin'),
(2, 'user', 'user123', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `destinasi`
--
ALTER TABLE `destinasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_pemesanan` (`id_pemesanan`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_wisata` (`id_wisata`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `destinasi`
--
ALTER TABLE `destinasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_pemesanan`) REFERENCES `pemesanan` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`id_wisata`) REFERENCES `destinasi` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;