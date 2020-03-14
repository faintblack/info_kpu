-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2020 at 08:34 AM
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
-- Table structure for table `calon_pileg`
--

CREATE TABLE `calon_pileg` (
  `id_calon_pileg` int(11) NOT NULL,
  `id_dapil` int(11) NOT NULL,
  `id_parpol` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `nama_calon` text NOT NULL,
  `gender` enum('Laki-laki','Perempuan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `calon_pilkada`
--

CREATE TABLE `calon_pilkada` (
  `id_calon_pilkada` int(11) NOT NULL,
  `nama_calon` text NOT NULL,
  `gender` enum('Laki-laki','Perempuan') NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `calon_pilpres`
--

CREATE TABLE `calon_pilpres` (
  `id_calon_pilpres` int(11) NOT NULL,
  `nama_calon` text NOT NULL,
  `gender` enum('Laki-laki','Perempuan') NOT NULL
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
-- Table structure for table `jadwal_kampanye_pemilu`
--

CREATE TABLE `jadwal_kampanye_pemilu` (
  `id_jadwal_kampanye_pemilu` int(11) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `pendukung_capres` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kecamatan` int(11) NOT NULL,
  `nama_kecamatan` varchar(50) NOT NULL,
  `id_dapil` int(11) NOT NULL,
  `jumlah_penduduk` int(11) NOT NULL,
  `jumlah_dpt_lk` int(11) NOT NULL,
  `jumlah_dpt_pr` int(11) NOT NULL
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
-- Table structure for table `lokasi_kampanye_pemilu`
--

CREATE TABLE `lokasi_kampanye_pemilu` (
  `id_lokasi_kampanye_pemilu` int(11) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `nama_lokasi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `parpol`
--

CREATE TABLE `parpol` (
  `id_parpol` int(11) NOT NULL,
  `no_urut_parpol` int(11) NOT NULL,
  `nama_parpol` text NOT NULL,
  `pendukung_capres` int(11) NOT NULL
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
-- Table structure for table `paslon_pilkada`
--

CREATE TABLE `paslon_pilkada` (
  `id_paslon` int(11) NOT NULL,
  `jenis_pemilihan` enum('Pemilihan Walikota','Pemilihan Gubernur','Pemilihan Bupati') NOT NULL,
  `nomor_urut` int(11) NOT NULL,
  `id_kepala_daerah` int(11) NOT NULL,
  `id_wakil_kepala_daerah` int(11) NOT NULL,
  `jenis_calon` enum('Perseorangan','Parpol') NOT NULL,
  `status_penetapan` enum('MS','TMS') NOT NULL,
  `keterangan` text NOT NULL,
  `tahun` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `paslon_pilpres`
--

CREATE TABLE `paslon_pilpres` (
  `id_paslon_pilpres` int(11) NOT NULL,
  `nomor_urut` int(11) NOT NULL,
  `id_capres` int(11) NOT NULL,
  `id_cawapres` int(11) NOT NULL
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
-- Table structure for table `perolehan_kursi`
--

CREATE TABLE `perolehan_kursi` (
  `id_perolehan_kursi` int(11) NOT NULL,
  `id_dapil` int(11) NOT NULL,
  `id_parpol` int(11) NOT NULL,
  `jumlah_suara_sah` int(11) NOT NULL,
  `jumlah_kursi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `suara_calon_pileg`
--

CREATE TABLE `suara_calon_pileg` (
  `id_suara_calon_pileg` int(11) NOT NULL,
  `id_calon_pileg` int(11) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `jumlah_suara` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `suara_parpol_pileg`
--

CREATE TABLE `suara_parpol_pileg` (
  `id_suara_parpol_pileg` int(11) NOT NULL,
  `id_parpol` int(11) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `jumlah_suara` int(11) NOT NULL
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
-- Indexes for table `calon_pileg`
--
ALTER TABLE `calon_pileg`
  ADD PRIMARY KEY (`id_calon_pileg`),
  ADD KEY `id_dapil` (`id_dapil`),
  ADD KEY `id_parpol` (`id_parpol`);

--
-- Indexes for table `calon_pilkada`
--
ALTER TABLE `calon_pilkada`
  ADD PRIMARY KEY (`id_calon_pilkada`);

--
-- Indexes for table `calon_pilpres`
--
ALTER TABLE `calon_pilpres`
  ADD PRIMARY KEY (`id_calon_pilpres`);

--
-- Indexes for table `dapil`
--
ALTER TABLE `dapil`
  ADD PRIMARY KEY (`id_dapil`);

--
-- Indexes for table `jadwal_kampanye_pemilu`
--
ALTER TABLE `jadwal_kampanye_pemilu`
  ADD PRIMARY KEY (`id_jadwal_kampanye_pemilu`),
  ADD KEY `id_kecamatan` (`id_kecamatan`),
  ADD KEY `jadwal_kampanye_pemilu_ibfk_2` (`pendukung_capres`);

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
-- Indexes for table `lokasi_kampanye_pemilu`
--
ALTER TABLE `lokasi_kampanye_pemilu`
  ADD PRIMARY KEY (`id_lokasi_kampanye_pemilu`),
  ADD KEY `id_kecamatan` (`id_kecamatan`);

--
-- Indexes for table `parpol`
--
ALTER TABLE `parpol`
  ADD PRIMARY KEY (`id_parpol`),
  ADD UNIQUE KEY `no_urut_parpol` (`no_urut_parpol`),
  ADD KEY `parpol_ibfk_1` (`pendukung_capres`);

--
-- Indexes for table `parpol_paslon`
--
ALTER TABLE `parpol_paslon`
  ADD PRIMARY KEY (`id_parpol_paslon`),
  ADD KEY `id_paslon` (`id_paslon`),
  ADD KEY `id_parpol` (`id_parpol`);

--
-- Indexes for table `paslon_pilkada`
--
ALTER TABLE `paslon_pilkada`
  ADD PRIMARY KEY (`id_paslon`),
  ADD KEY `id_kepala_daerah` (`id_kepala_daerah`),
  ADD KEY `id_wakil_kepala_daerah` (`id_wakil_kepala_daerah`);

--
-- Indexes for table `paslon_pilpres`
--
ALTER TABLE `paslon_pilpres`
  ADD PRIMARY KEY (`id_paslon_pilpres`),
  ADD UNIQUE KEY `nomor_urut` (`nomor_urut`),
  ADD KEY `id_capres` (`id_capres`),
  ADD KEY `id_cawapres` (`id_cawapres`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `perolehan_kursi`
--
ALTER TABLE `perolehan_kursi`
  ADD PRIMARY KEY (`id_perolehan_kursi`),
  ADD KEY `id_dapil` (`id_dapil`),
  ADD KEY `id_parpol` (`id_parpol`);

--
-- Indexes for table `suara_calon_pileg`
--
ALTER TABLE `suara_calon_pileg`
  ADD PRIMARY KEY (`id_suara_calon_pileg`),
  ADD KEY `id_kecamatan` (`id_kecamatan`),
  ADD KEY `id_data_calon_dprd` (`id_calon_pileg`);

--
-- Indexes for table `suara_parpol_pileg`
--
ALTER TABLE `suara_parpol_pileg`
  ADD PRIMARY KEY (`id_suara_parpol_pileg`),
  ADD KEY `id_parpol` (`id_parpol`),
  ADD KEY `id_kecamatan` (`id_kecamatan`);

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
-- AUTO_INCREMENT for table `calon_pileg`
--
ALTER TABLE `calon_pileg`
  MODIFY `id_calon_pileg` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `calon_pilkada`
--
ALTER TABLE `calon_pilkada`
  MODIFY `id_calon_pilkada` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `calon_pilpres`
--
ALTER TABLE `calon_pilpres`
  MODIFY `id_calon_pilpres` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dapil`
--
ALTER TABLE `dapil`
  MODIFY `id_dapil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jadwal_kampanye_pemilu`
--
ALTER TABLE `jadwal_kampanye_pemilu`
  MODIFY `id_jadwal_kampanye_pemilu` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `lokasi_kampanye_pemilu`
--
ALTER TABLE `lokasi_kampanye_pemilu`
  MODIFY `id_lokasi_kampanye_pemilu` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `paslon_pilkada`
--
ALTER TABLE `paslon_pilkada`
  MODIFY `id_paslon` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paslon_pilpres`
--
ALTER TABLE `paslon_pilpres`
  MODIFY `id_paslon_pilpres` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `perolehan_kursi`
--
ALTER TABLE `perolehan_kursi`
  MODIFY `id_perolehan_kursi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `suara_calon_pileg`
--
ALTER TABLE `suara_calon_pileg`
  MODIFY `id_suara_calon_pileg` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `suara_parpol_pileg`
--
ALTER TABLE `suara_parpol_pileg`
  MODIFY `id_suara_parpol_pileg` int(11) NOT NULL AUTO_INCREMENT;

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
-- Constraints for table `calon_pileg`
--
ALTER TABLE `calon_pileg`
  ADD CONSTRAINT `calon_pileg_ibfk_1` FOREIGN KEY (`id_dapil`) REFERENCES `dapil` (`id_dapil`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `calon_pileg_ibfk_2` FOREIGN KEY (`id_parpol`) REFERENCES `parpol` (`id_parpol`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jadwal_kampanye_pemilu`
--
ALTER TABLE `jadwal_kampanye_pemilu`
  ADD CONSTRAINT `jadwal_kampanye_pemilu_ibfk_1` FOREIGN KEY (`id_kecamatan`) REFERENCES `kecamatan` (`id_kecamatan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jadwal_kampanye_pemilu_ibfk_2` FOREIGN KEY (`pendukung_capres`) REFERENCES `paslon_pilpres` (`id_paslon_pilpres`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `lokasi_kampanye_pemilu`
--
ALTER TABLE `lokasi_kampanye_pemilu`
  ADD CONSTRAINT `lokasi_kampanye_pemilu_ibfk_1` FOREIGN KEY (`id_kecamatan`) REFERENCES `kecamatan` (`id_kecamatan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `parpol`
--
ALTER TABLE `parpol`
  ADD CONSTRAINT `parpol_ibfk_1` FOREIGN KEY (`pendukung_capres`) REFERENCES `paslon_pilpres` (`id_paslon_pilpres`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `parpol_paslon`
--
ALTER TABLE `parpol_paslon`
  ADD CONSTRAINT `parpol_paslon_ibfk_1` FOREIGN KEY (`id_paslon`) REFERENCES `paslon_pilkada` (`id_paslon`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `parpol_paslon_ibfk_2` FOREIGN KEY (`id_parpol`) REFERENCES `parpol` (`id_parpol`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `paslon_pilkada`
--
ALTER TABLE `paslon_pilkada`
  ADD CONSTRAINT `paslon_pilkada_ibfk_1` FOREIGN KEY (`id_kepala_daerah`) REFERENCES `calon_pilkada` (`id_calon_pilkada`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `paslon_pilkada_ibfk_2` FOREIGN KEY (`id_wakil_kepala_daerah`) REFERENCES `calon_pilkada` (`id_calon_pilkada`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `paslon_pilpres`
--
ALTER TABLE `paslon_pilpres`
  ADD CONSTRAINT `paslon_pilpres_ibfk_1` FOREIGN KEY (`id_capres`) REFERENCES `calon_pilpres` (`id_calon_pilpres`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `paslon_pilpres_ibfk_2` FOREIGN KEY (`id_cawapres`) REFERENCES `calon_pilpres` (`id_calon_pilpres`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `perolehan_kursi`
--
ALTER TABLE `perolehan_kursi`
  ADD CONSTRAINT `perolehan_kursi_ibfk_1` FOREIGN KEY (`id_dapil`) REFERENCES `dapil` (`id_dapil`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `perolehan_kursi_ibfk_2` FOREIGN KEY (`id_parpol`) REFERENCES `parpol` (`id_parpol`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `suara_calon_pileg`
--
ALTER TABLE `suara_calon_pileg`
  ADD CONSTRAINT `suara_calon_pileg_ibfk_1` FOREIGN KEY (`id_kecamatan`) REFERENCES `kecamatan` (`id_kecamatan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `suara_calon_pileg_ibfk_2` FOREIGN KEY (`id_calon_pileg`) REFERENCES `calon_pileg` (`id_calon_pileg`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `suara_parpol_pileg`
--
ALTER TABLE `suara_parpol_pileg`
  ADD CONSTRAINT `suara_parpol_pileg_ibfk_1` FOREIGN KEY (`id_parpol`) REFERENCES `parpol` (`id_parpol`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `suara_parpol_pileg_ibfk_2` FOREIGN KEY (`id_kecamatan`) REFERENCES `kecamatan` (`id_kecamatan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tps`
--
ALTER TABLE `tps`
  ADD CONSTRAINT `tps_ibfk_1` FOREIGN KEY (`id_kecamatan`) REFERENCES `kecamatan` (`id_kecamatan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
