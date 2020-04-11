-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2020 at 03:48 AM
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
  `judul_berita` varchar(75) NOT NULL,
  `isi_berita` text NOT NULL,
  `gambar_berita` text NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `username`, `jenis_berita`, `judul_berita`, `isi_berita`, `gambar_berita`, `waktu`) VALUES
(5, 'bayusugara', 'PILPRES', '', 'saya adalah bayu sugara, mahasiswa uin suska riau jurusan teknik informatika semester 10 dan insyaallah saya akan wisuda disemster 10 ini. aamiin', '464_mp4_snapshot_02_03_2018_10_20_13_09_044.jpg', '2020-03-26 01:25:34'),
(8, 'admin', 'PILPRES', '', 'Revert artinya mengembalikan. Perintah ini lebih aman daripada git reset, karena tidak akan menghapus catatan sejarah revisi.\r\nRevert akan akan mengambil kondisi file yang ada di masa lalu, kemudian menggabungkannya dengan commit terakhir.', '1.PNG', '2020-03-26 23:57:36'),
(9, 'mhrdkk', 'PILPRES', '', 'Jokowi curang, pakai cit.', 'Screenshot_(144).png', '2020-03-31 02:27:44'),
(10, 'mhrdkk', 'PILEG', '', 'sdfsdfsd', 'Screenshot_(3).png', '2020-03-31 05:53:22');

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

--
-- Dumping data for table `calon_pileg`
--

INSERT INTO `calon_pileg` (`id_calon_pileg`, `id_dapil`, `id_parpol`, `no_urut`, `nama_calon`, `gender`) VALUES
(1, 4, 3, 1, 'Abu Janda', 'Perempuan'),
(2, 3, 2, 1, 'Beno Saputra', 'Laki-laki');

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

--
-- Dumping data for table `calon_pilkada`
--

INSERT INTO `calon_pilkada` (`id_calon_pilkada`, `nama_calon`, `gender`, `tgl_lahir`, `alamat`) VALUES
(1, 'Sitole', 'Laki-laki', '2020-04-01', 'Jalan Paus Ujung'),
(2, 'Sinusa', 'Laki-laki', '2020-03-31', 'Jalan jalan');

-- --------------------------------------------------------

--
-- Table structure for table `calon_pilpres`
--

CREATE TABLE `calon_pilpres` (
  `id_calon_pilpres` int(11) NOT NULL,
  `nama_calon` text NOT NULL,
  `gender` enum('Laki-laki','Perempuan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `calon_pilpres`
--

INSERT INTO `calon_pilpres` (`id_calon_pilpres`, `nama_calon`, `gender`) VALUES
(4, 'Prabowo Subianto', 'Laki-laki'),
(5, 'Sandiaga Uno', 'Laki-laki'),
(6, 'Joko Widodo', 'Laki-laki'),
(7, 'Ma\'ruf Amin', 'Laki-laki');

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
(3, 'Dapil 2', 12),
(4, 'Dapil 1', 6);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_kampanye_pemilu`
--

CREATE TABLE `jadwal_kampanye_pemilu` (
  `id_jadwal_kampanye_pemilu` int(11) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `id_paslon_pilpres` int(11) NOT NULL
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

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id_kecamatan`, `nama_kecamatan`, `id_dapil`, `jumlah_penduduk`, `jumlah_dpt_lk`, `jumlah_dpt_pr`) VALUES
(2, 'Marpoyan', 3, 2500, 5000, 6000),
(3, 'Tampan', 4, 8506, 4506, 4000),
(4, 'Bukit Raya', 4, 3165, 516, 5151);

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

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `id_berita`, `username`, `isi_komentar`, `waktu`) VALUES
(8, 5, 'beno', 'i love you bay!', '2020-03-27 17:00:00'),
(10, 8, 'beno', 'weey baik baik lah', '2020-03-26 17:00:00'),
(30, 8, 'ezu', 'iya iya iya', '2020-03-30 17:00:00'),
(31, 5, 'mhrdkk', 'assalamualaikum bay', '2020-03-15 17:00:00');

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
  `nama_parpol` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `parpol`
--

INSERT INTO `parpol` (`id_parpol`, `no_urut_parpol`, `nama_parpol`) VALUES
(2, 1, 'Gerindra'),
(3, 2, 'PSI'),
(4, 3, 'PKS'),
(6, 4, 'PKB');

-- --------------------------------------------------------

--
-- Table structure for table `parpol_paslon_pilkada`
--

CREATE TABLE `parpol_paslon_pilkada` (
  `id_parpol_paslon_pilkada` int(11) NOT NULL,
  `id_paslon` int(11) NOT NULL,
  `id_parpol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `parpol_paslon_pilpres`
--

CREATE TABLE `parpol_paslon_pilpres` (
  `id_parpol_paslon_pilpres` int(11) NOT NULL,
  `id_paslon_pilpres` int(11) NOT NULL,
  `id_parpol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `parpol_paslon_pilpres`
--

INSERT INTO `parpol_paslon_pilpres` (`id_parpol_paslon_pilpres`, `id_paslon_pilpres`, `id_parpol`) VALUES
(11, 2, 2),
(13, 1, 3),
(15, 2, 4);

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
  `id_cawapres` int(11) NOT NULL,
  `tahun` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `paslon_pilpres`
--

INSERT INTO `paslon_pilpres` (`id_paslon_pilpres`, `nomor_urut`, `id_capres`, `id_cawapres`, `tahun`) VALUES
(1, 1, 6, 7, '2019'),
(2, 2, 4, 5, '2019');

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

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`username`, `password`, `nama_pengguna`, `hak_akses`, `email`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 'admin', 'Administrator@yahoo.co.id'),
('bayusugara', 'a430e06de5ce438d499c2e4063d60fd6', 'Bayu Sugara', 'admin', 'bayu.sugara@students.uin-suska.ac.id'),
('beno', 'cbf574e1d1e1746041fce0e2a598655d', 'Beno Saputra', 'public', 'beno@gm.com'),
('dadan', 'fd68e8922a6705a916b19669fb356cce', 'Dadan Ganteng', 'public', 'hidayahramadhan@gmail.com'),
('ezu', 'e28801fda7ac1c80b32b4c9d3df3d250', 'ezuuu', 'public', 'e'),
('mhrdkk', '7238500f05f9fa38d09ae8318d188080', 'Mahardika Kharisma Adjie', 'admin', 'mahardikakharisma@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `suara_calon_pileg`
--

CREATE TABLE `suara_calon_pileg` (
  `id_suara_calon_pileg` int(11) NOT NULL,
  `id_calon_pileg` int(11) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `jumlah_suara` int(11) NOT NULL,
  `tahun` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `suara_calon_pileg`
--

INSERT INTO `suara_calon_pileg` (`id_suara_calon_pileg`, `id_calon_pileg`, `id_kecamatan`, `jumlah_suara`, `tahun`) VALUES
(1, 1, 3, 0, '2019'),
(2, 2, 2, 1654782, '2019');

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
  ADD KEY `jadwal_kampanye_pemilu_ibfk_2` (`id_paslon_pilpres`);

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
  ADD UNIQUE KEY `no_urut_parpol` (`no_urut_parpol`);

--
-- Indexes for table `parpol_paslon_pilkada`
--
ALTER TABLE `parpol_paslon_pilkada`
  ADD PRIMARY KEY (`id_parpol_paslon_pilkada`),
  ADD KEY `id_paslon` (`id_paslon`),
  ADD KEY `id_parpol` (`id_parpol`);

--
-- Indexes for table `parpol_paslon_pilpres`
--
ALTER TABLE `parpol_paslon_pilpres`
  ADD PRIMARY KEY (`id_parpol_paslon_pilpres`),
  ADD KEY `id_paslon_pilpres` (`id_paslon_pilpres`),
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
-- Indexes for table `suara_calon_pileg`
--
ALTER TABLE `suara_calon_pileg`
  ADD PRIMARY KEY (`id_suara_calon_pileg`),
  ADD KEY `id_kecamatan` (`id_kecamatan`),
  ADD KEY `id_data_calon_dprd` (`id_calon_pileg`);

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
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `calon_pileg`
--
ALTER TABLE `calon_pileg`
  MODIFY `id_calon_pileg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `calon_pilkada`
--
ALTER TABLE `calon_pilkada`
  MODIFY `id_calon_pilkada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `calon_pilpres`
--
ALTER TABLE `calon_pilpres`
  MODIFY `id_calon_pilpres` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `dapil`
--
ALTER TABLE `dapil`
  MODIFY `id_dapil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jadwal_kampanye_pemilu`
--
ALTER TABLE `jadwal_kampanye_pemilu`
  MODIFY `id_jadwal_kampanye_pemilu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `lokasi_kampanye_pemilu`
--
ALTER TABLE `lokasi_kampanye_pemilu`
  MODIFY `id_lokasi_kampanye_pemilu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parpol`
--
ALTER TABLE `parpol`
  MODIFY `id_parpol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `parpol_paslon_pilkada`
--
ALTER TABLE `parpol_paslon_pilkada`
  MODIFY `id_parpol_paslon_pilkada` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parpol_paslon_pilpres`
--
ALTER TABLE `parpol_paslon_pilpres`
  MODIFY `id_parpol_paslon_pilpres` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `paslon_pilkada`
--
ALTER TABLE `paslon_pilkada`
  MODIFY `id_paslon` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paslon_pilpres`
--
ALTER TABLE `paslon_pilpres`
  MODIFY `id_paslon_pilpres` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `suara_calon_pileg`
--
ALTER TABLE `suara_calon_pileg`
  MODIFY `id_suara_calon_pileg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  ADD CONSTRAINT `jadwal_kampanye_pemilu_ibfk_2` FOREIGN KEY (`id_paslon_pilpres`) REFERENCES `paslon_pilpres` (`id_paslon_pilpres`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `parpol_paslon_pilkada`
--
ALTER TABLE `parpol_paslon_pilkada`
  ADD CONSTRAINT `parpol_paslon_pilkada_ibfk_1` FOREIGN KEY (`id_paslon`) REFERENCES `paslon_pilkada` (`id_paslon`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `parpol_paslon_pilkada_ibfk_2` FOREIGN KEY (`id_parpol`) REFERENCES `parpol` (`id_parpol`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `parpol_paslon_pilpres`
--
ALTER TABLE `parpol_paslon_pilpres`
  ADD CONSTRAINT `parpol_paslon_pilpres_ibfk_1` FOREIGN KEY (`id_paslon_pilpres`) REFERENCES `paslon_pilpres` (`id_paslon_pilpres`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `parpol_paslon_pilpres_ibfk_2` FOREIGN KEY (`id_parpol`) REFERENCES `parpol` (`id_parpol`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `suara_calon_pileg`
--
ALTER TABLE `suara_calon_pileg`
  ADD CONSTRAINT `suara_calon_pileg_ibfk_1` FOREIGN KEY (`id_kecamatan`) REFERENCES `kecamatan` (`id_kecamatan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `suara_calon_pileg_ibfk_2` FOREIGN KEY (`id_calon_pileg`) REFERENCES `calon_pileg` (`id_calon_pileg`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tps`
--
ALTER TABLE `tps`
  ADD CONSTRAINT `tps_ibfk_1` FOREIGN KEY (`id_kecamatan`) REFERENCES `kecamatan` (`id_kecamatan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
