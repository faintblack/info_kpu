-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2020 at 05:01 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `info_kpu`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `jenis_berita` enum('PILEG','PILPRES','PILKADA') NOT NULL,
  `isi_berita` text NOT NULL,
  `gambar_berita` text NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dapil`
--

CREATE TABLE `dapil` (
  `id_dapil` int(11) NOT NULL,
  `nama_dapil` varchar(25) NOT NULL,
  `alokasi_kursi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dapil`
--

INSERT INTO `dapil` (`id_dapil`, `nama_dapil`, `alokasi_kursi`) VALUES
(1, 'Dapil 1', 7),
(2, 'Dapil 2', 5);

-- --------------------------------------------------------

--
-- Table structure for table `data_kecamatan`
--

CREATE TABLE `data_kecamatan` (
  `id_data_kecamatan` int(11) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `jumlah_penduduk` int(11) NOT NULL,
  `jumlah_dpt_lk` int(11) NOT NULL,
  `jumlah_dpt_pr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `info_kampanye`
--

CREATE TABLE `info_kampanye` (
  `id_info_kampanye` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `lokasi` text NOT NULL,
  `jadwal_mulai` date NOT NULL,
  `jadwal_selesai` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kecamatan` int(11) NOT NULL,
  `nama_kecamatan` varchar(50) NOT NULL,
  `id_dapil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(11) NOT NULL,
  `id_berita` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `isi_komentar` text NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `parpol`
--

CREATE TABLE `parpol` (
  `id_parpol` int(11) NOT NULL,
  `nama_parpol` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `parpol_paslon`
--

CREATE TABLE `parpol_paslon` (
  `id_parpol_paslon` int(11) NOT NULL,
  `id_paslon` int(11) NOT NULL,
  `id_parpol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `paslon`
--

CREATE TABLE `paslon` (
  `id_paslon` int(11) NOT NULL,
  `jenis_pemilihan` enum('Pemilihan Walikota') NOT NULL,
  `nomor_urut` int(11) NOT NULL,
  `nama_kepala_daerah` text NOT NULL,
  `nama_wakil_kepala_daerah` text NOT NULL,
  `jenis_calon` enum('Perseorangan','Parpol') NOT NULL,
  `status_penetapan` enum('MS','TMS') NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `username` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_pengguna` varchar(40) NOT NULL,
  `hak_akses` enum('admin','public') NOT NULL,
  `email` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tps`
--

CREATE TABLE `tps` (
  `id_tps` int(11) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `nama_tps` varchar(25) NOT NULL,
  `lat` varchar(30) NOT NULL,
  `long` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `dapil`
--
ALTER TABLE `dapil`
  ADD PRIMARY KEY (`id_dapil`);

--
-- Indexes for table `data_kecamatan`
--
ALTER TABLE `data_kecamatan`
  ADD PRIMARY KEY (`id_data_kecamatan`),
  ADD KEY `id_kecamatan` (`id_kecamatan`);

--
-- Indexes for table `info_kampanye`
--
ALTER TABLE `info_kampanye`
  ADD PRIMARY KEY (`id_info_kampanye`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`),
  ADD KEY `id_dapil` (`id_dapil`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`),
  ADD KEY `id_berita` (`id_berita`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `parpol`
--
ALTER TABLE `parpol`
  ADD PRIMARY KEY (`id_parpol`);

--
-- Indexes for table `parpol_paslon`
--
ALTER TABLE `parpol_paslon`
  ADD PRIMARY KEY (`id_parpol_paslon`),
  ADD KEY `id_paslon` (`id_paslon`),
  ADD KEY `id_parpol` (`id_parpol`);

--
-- Indexes for table `paslon`
--
ALTER TABLE `paslon`
  ADD PRIMARY KEY (`id_paslon`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `tps`
--
ALTER TABLE `tps`
  ADD PRIMARY KEY (`id_tps`),
  ADD KEY `id_kecamatan` (`id_kecamatan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dapil`
--
ALTER TABLE `dapil`
  MODIFY `id_dapil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `data_kecamatan`
--
ALTER TABLE `data_kecamatan`
  MODIFY `id_data_kecamatan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `info_kampanye`
--
ALTER TABLE `info_kampanye`
  MODIFY `id_info_kampanye` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parpol`
--
ALTER TABLE `parpol`
  MODIFY `id_parpol` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parpol_paslon`
--
ALTER TABLE `parpol_paslon`
  MODIFY `id_parpol_paslon` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paslon`
--
ALTER TABLE `paslon`
  MODIFY `id_paslon` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tps`
--
ALTER TABLE `tps`
  MODIFY `id_tps` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `berita_ibfk_1` FOREIGN KEY (`username`) REFERENCES `pengguna` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `data_kecamatan`
--
ALTER TABLE `data_kecamatan`
  ADD CONSTRAINT `data_kecamatan_ibfk_1` FOREIGN KEY (`id_kecamatan`) REFERENCES `kecamatan` (`id_kecamatan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD CONSTRAINT `kecamatan_ibfk_1` FOREIGN KEY (`id_dapil`) REFERENCES `dapil` (`id_dapil`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`id_berita`) REFERENCES `berita` (`id_berita`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `komentar_ibfk_2` FOREIGN KEY (`username`) REFERENCES `pengguna` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `parpol_paslon`
--
ALTER TABLE `parpol_paslon`
  ADD CONSTRAINT `parpol_paslon_ibfk_1` FOREIGN KEY (`id_paslon`) REFERENCES `paslon` (`id_paslon`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `parpol_paslon_ibfk_2` FOREIGN KEY (`id_parpol`) REFERENCES `parpol` (`id_parpol`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tps`
--
ALTER TABLE `tps`
  ADD CONSTRAINT `tps_ibfk_1` FOREIGN KEY (`id_kecamatan`) REFERENCES `kecamatan` (`id_kecamatan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
