-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2022 at 05:49 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portofolio1`
--

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE `paket` (
  `id_paket` int(11) NOT NULL,
  `nama_paket` varchar(30) NOT NULL,
  `harga` bigint(20) NOT NULL,
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`id_paket`, `nama_paket`, `harga`, `catatan`) VALUES
(1, 'Makanan 250 pax', 1500000, 'Paket Catering untuk 500 orang/ 250 undangan ini sudah mencakup peralatan seperti meja, sendok, piring, dekorasi catering, bunga di meja serta petugas waiter selama acara berlangsung. Tidak hanya itu dengan pesan catering prasmanan minimal 500 porsi Anda juga mendapat tambahan menarik lainnya. '),
(2, 'Dekorasi ', 22500000, 'Paket Dekorasi Gedung sangat membantu mewujudkan acara yang megah dan mewah agar menciptakan suasana bahagia saat dipandang dan membuat kenangan yang indah. Dekorasi yang bagus merupakan cara untuk menghormati tamu undangan yang hadir. Jadikan moment penting Anda pantas dikenang, jangan ragu, gunakan budget Anda secara efektif.'),
(3, 'Hiburan', 1300000, 'Paket Hiburan dalam penyelenggaraan pesta yang meriah membuat Anda dapat merasakan konsep hiburan yang berkesan, serta membuat Anda menjadi lebih fokus dan hemat. Paket ini mencakup Band/Organ Tunggal + Singer yang disertai daftar lagu yang bagus dan harmonis serta 1 Vocal, 1 Keyboard, 1 Bass,1 Violin/ Saxophone Sound 3000 watt. ');

-- --------------------------------------------------------

--
-- Table structure for table `reservasi`
--

CREATE TABLE `reservasi` (
  `id_reservasi` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `nama_pemesan` varchar(50) NOT NULL,
  `tanggal_pemesanan` datetime NOT NULL,
  `paket` varchar(100) NOT NULL,
  `acara` varchar(30) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah_tamu` int(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `status_bayar` enum('Lunas','Belum lunas') NOT NULL,
  `bukti_bayar` varchar(250) NOT NULL,
  `reservedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservasi`
--

INSERT INTO `reservasi` (`id_reservasi`, `id_user`, `nama_pemesan`, `tanggal_pemesanan`, `paket`, `acara`, `harga`, `jumlah_tamu`, `email`, `no_hp`, `status_bayar`, `bukti_bayar`, `reservedAt`) VALUES
(30, 49, 'Rizky Febian', '2022-01-21 12:14:00', 'Makanan 250 pax,Dekorasi ,Hiburan', 'Lamaran', 25300000, 100, 'risky@gmail.com', '08123456789', 'Belum lunas', '', '2022-01-10 14:12:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(10) NOT NULL,
  `level` enum('pengunjung','admin') NOT NULL,
  `createdAt` datetime NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_hp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `level`, `createdAt`, `nama`, `email`, `no_hp`) VALUES
(38, 'Ferda Ayu Dwi Putri Febrianti ', '12345', 'admin', '2022-01-06 23:48:57', 'Ferda Ayu Dwi Putri Febrianti', 'admin.ferda@gmail.com', '082334886028'),
(49, 'sule', 'sule', 'pengunjung', '2022-01-10 16:38:34', 'Sule Prikitiw', 'sule@gmail.com', '08888888888');

-- --------------------------------------------------------

--
-- Table structure for table `venue`
--

CREATE TABLE `venue` (
  `id_venue` int(11) NOT NULL,
  `nama_venue` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `venue`
--

INSERT INTO `venue` (`id_venue`, `nama_venue`) VALUES
(1, 'Pernikahan'),
(2, 'Lamaran'),
(3, 'Arisan'),
(4, 'Ulang Tahun');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indexes for table `reservasi`
--
ALTER TABLE `reservasi`
  ADD PRIMARY KEY (`id_reservasi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `venue`
--
ALTER TABLE `venue`
  ADD PRIMARY KEY (`id_venue`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `paket`
--
ALTER TABLE `paket`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `reservasi`
--
ALTER TABLE `reservasi`
  MODIFY `id_reservasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `venue`
--
ALTER TABLE `venue`
  MODIFY `id_venue` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
