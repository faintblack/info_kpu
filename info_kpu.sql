-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Apr 2020 pada 18.54
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.1

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
-- Struktur dari tabel `berita`
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
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id_berita`, `username`, `jenis_berita`, `judul_berita`, `isi_berita`, `gambar_berita`, `waktu`) VALUES
(5, 'bayusugara', 'PILPRES', 'Nama saya bayu', 'saya adalah bayu sugara, mahasiswa uin suska riau jurusan teknik informatika semester 10 dan insyaallah saya akan wisuda disemster 10 ini. aamiin', '464_mp4_snapshot_02_03_2018_10_20_13_09_044.jpg', '2020-03-26 01:25:34'),
(8, 'admin', 'PILPRES', 'tes bos', 'Revert artinya mengembalikan. Perintah ini lebih aman daripada git reset, karena tidak akan menghapus catatan sejarah revisi.\r\nRevert akan akan mengambil kondisi file yang ada di masa lalu, kemudian menggabungkannya dengan commit terakhir.', '1.PNG', '2020-03-26 23:57:36'),
(9, 'mhrdkk', 'PILPRES', 'Cebong', 'Jokowi curang, pakai cit.', 'Screenshot (144).PNG', '2020-03-31 02:27:44'),
(10, 'mhrdkk', 'PILEG', 'Tes Judul mas', 'sdfsdfsd', 'Screenshot_(3).png', '2020-03-31 05:53:22'),
(12, 'mhrdkk', 'PILPRES', '01 pakai cheat!', 'Pihak 01 kedapatan membakar surat suara pemilih 02', 'Screenshot_(114).png', '2020-04-11 02:07:35'),
(13, 'mhrdkk', 'PILPRES', 'Kevin mencalonkan diri sebagai Capres pada pemilu tahun 2019!', 'Sebagaimana kita ketahui, kevin merupakan salah satu selebram tanah air yang terkenal melalui gerakan dance nya yang mantap jiwa.', '1487776555228.jpg', '2020-04-12 09:06:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `calon_pileg`
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
-- Dumping data untuk tabel `calon_pileg`
--

INSERT INTO `calon_pileg` (`id_calon_pileg`, `id_dapil`, `id_parpol`, `no_urut`, `nama_calon`, `gender`) VALUES
(1, 4, 3, 1, 'Abu Janda', 'Perempuan'),
(2, 3, 2, 1, 'Beno Saputra', 'Laki-laki');

-- --------------------------------------------------------

--
-- Struktur dari tabel `calon_pilkada`
--

CREATE TABLE `calon_pilkada` (
  `id_calon_pilkada` int(11) NOT NULL,
  `nama_calon` text NOT NULL,
  `gender` enum('Laki-laki','Perempuan') NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `calon_pilkada`
--

INSERT INTO `calon_pilkada` (`id_calon_pilkada`, `nama_calon`, `gender`, `tgl_lahir`, `alamat`) VALUES
(1, 'Sitole', 'Laki-laki', '2020-04-01', 'Jalan Paus Ujung'),
(2, 'Sinusa', 'Laki-laki', '2020-03-31', 'Jalan jalan'),
(3, 'Sense', 'Laki-laki', '2020-04-02', 'Jalan mawar ujung');

-- --------------------------------------------------------

--
-- Struktur dari tabel `calon_pilpres`
--

CREATE TABLE `calon_pilpres` (
  `id_calon_pilpres` int(11) NOT NULL,
  `nama_calon` text NOT NULL,
  `gender` enum('Laki-laki','Perempuan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `calon_pilpres`
--

INSERT INTO `calon_pilpres` (`id_calon_pilpres`, `nama_calon`, `gender`) VALUES
(4, 'Prabowo Subianto', 'Laki-laki'),
(5, 'Sandiaga Uno', 'Laki-laki'),
(6, 'Joko Widodo', 'Laki-laki'),
(7, 'Ma\'ruf Amin', 'Laki-laki');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dapil`
--

CREATE TABLE `dapil` (
  `id_dapil` int(11) NOT NULL,
  `nama_dapil` varchar(25) NOT NULL,
  `alokasi_kursi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `dapil`
--

INSERT INTO `dapil` (`id_dapil`, `nama_dapil`, `alokasi_kursi`) VALUES
(3, 'Dapil 2', 12),
(4, 'Dapil 1', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_kampanye`
--

CREATE TABLE `jadwal_kampanye` (
  `id_jadwal_kampanye` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `id_paslon_pilpres` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `jadwal_kampanye`
--

INSERT INTO `jadwal_kampanye` (`id_jadwal_kampanye`, `tanggal`, `id_paslon_pilpres`) VALUES
(13, '2020-04-13', 2),
(14, '2020-04-14', 2),
(15, '2020-04-17', 2),
(16, '2020-04-18', 2),
(17, '2020-04-21', 2),
(18, '2020-04-22', 2),
(19, '2020-04-25', 2),
(20, '2020-04-26', 2),
(21, '2020-04-15', 1),
(22, '2020-04-16', 1),
(23, '2020-04-19', 1),
(24, '2020-04-20', 1),
(25, '2020-04-23', 1),
(26, '2020-04-24', 1),
(27, '2020-04-11', 2),
(28, '2020-04-12', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kecamatan`
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
-- Dumping data untuk tabel `kecamatan`
--

INSERT INTO `kecamatan` (`id_kecamatan`, `nama_kecamatan`, `id_dapil`, `jumlah_penduduk`, `jumlah_dpt_lk`, `jumlah_dpt_pr`) VALUES
(2, 'Marpoyan', 3, 2500, 5000, 6000),
(3, 'Tampan', 4, 8506, 4506, 4000),
(4, 'Bukit Raya', 4, 3165, 516, 5151);

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(11) NOT NULL,
  `id_berita` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `isi_komentar` text NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `id_berita`, `username`, `isi_komentar`, `waktu`) VALUES
(8, 5, 'beno', 'i love you bay!', '2020-03-27 17:00:00'),
(10, 8, 'beno', 'weey baik baik lah', '2020-03-26 17:00:00'),
(31, 5, 'mhrdkk', 'assalamualaikum bay', '2020-03-15 17:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasi_kampanye`
--

CREATE TABLE `lokasi_kampanye` (
  `id_lokasi_kampanye` int(11) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `nama_lokasi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `lokasi_kampanye`
--

INSERT INTO `lokasi_kampanye` (`id_lokasi_kampanye`, `id_kecamatan`, `nama_lokasi`) VALUES
(1, 3, 'UIN SUSKA RIAU'),
(2, 3, 'UNRI'),
(3, 2, 'Lapangan Bola Kartama'),
(6, 2, 'Bandara'),
(7, 4, 'Labersa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `parpol`
--

CREATE TABLE `parpol` (
  `id_parpol` int(11) NOT NULL,
  `no_urut_parpol` int(11) NOT NULL,
  `nama_parpol` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `parpol`
--

INSERT INTO `parpol` (`id_parpol`, `no_urut_parpol`, `nama_parpol`) VALUES
(2, 1, 'Gerindra'),
(3, 2, 'PSI'),
(4, 3, 'PKS'),
(6, 4, 'PKB');

-- --------------------------------------------------------

--
-- Struktur dari tabel `parpol_paslon_pilkada`
--

CREATE TABLE `parpol_paslon_pilkada` (
  `id_parpol_paslon_pilkada` int(11) NOT NULL,
  `id_paslon` int(11) NOT NULL,
  `id_parpol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `parpol_paslon_pilkada`
--

INSERT INTO `parpol_paslon_pilkada` (`id_parpol_paslon_pilkada`, `id_paslon`, `id_parpol`) VALUES
(2, 1, 2),
(5, 1, 4),
(7, 1, 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `parpol_paslon_pilpres`
--

CREATE TABLE `parpol_paslon_pilpres` (
  `id_parpol_paslon_pilpres` int(11) NOT NULL,
  `id_paslon_pilpres` int(11) NOT NULL,
  `id_parpol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `parpol_paslon_pilpres`
--

INSERT INTO `parpol_paslon_pilpres` (`id_parpol_paslon_pilpres`, `id_paslon_pilpres`, `id_parpol`) VALUES
(11, 2, 2),
(13, 1, 3),
(15, 2, 4),
(16, 2, 3),
(18, 2, 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `paslon_pilkada`
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

--
-- Dumping data untuk tabel `paslon_pilkada`
--

INSERT INTO `paslon_pilkada` (`id_paslon`, `jenis_pemilihan`, `nomor_urut`, `id_kepala_daerah`, `id_wakil_kepala_daerah`, `jenis_calon`, `status_penetapan`, `keterangan`, `tahun`) VALUES
(1, 'Pemilihan Gubernur', 1, 1, 2, 'Parpol', 'TMS', '', '2017'),
(3, 'Pemilihan Gubernur', 2, 3, 2, 'Perseorangan', 'MS', '', '2019');

-- --------------------------------------------------------

--
-- Struktur dari tabel `paslon_pilpres`
--

CREATE TABLE `paslon_pilpres` (
  `id_paslon_pilpres` int(11) NOT NULL,
  `nomor_urut` int(11) NOT NULL,
  `id_capres` int(11) NOT NULL,
  `id_cawapres` int(11) NOT NULL,
  `tahun` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `paslon_pilpres`
--

INSERT INTO `paslon_pilpres` (`id_paslon_pilpres`, `nomor_urut`, `id_capres`, `id_cawapres`, `tahun`) VALUES
(1, 1, 6, 7, '2019'),
(2, 2, 4, 5, '2019');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `username` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_pengguna` varchar(40) NOT NULL,
  `hak_akses` enum('admin','public') NOT NULL,
  `email` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`username`, `password`, `nama_pengguna`, `hak_akses`, `email`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 'admin', 'Administrator@yahoo.co.id'),
('bayusugara', 'a430e06de5ce438d499c2e4063d60fd6', 'Bayu Sugara', 'admin', 'bayu.sugara@students.uin-suska.ac.id'),
('beno', 'cbf574e1d1e1746041fce0e2a598655d', 'Beno Saputra', 'public', 'beno@gm.com'),
('dadan', 'fd68e8922a6705a916b19669fb356cce', 'Dadan Ganteng', 'public', 'hidayahramadhan@gmail.com'),
('mhrdkk', '7238500f05f9fa38d09ae8318d188080', 'Mahardika Kharisma Adjie', 'admin', 'mahardikakharisma@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `suara_calon_pileg`
--

CREATE TABLE `suara_calon_pileg` (
  `id_suara_calon_pileg` int(11) NOT NULL,
  `id_calon_pileg` int(11) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `jumlah_suara` int(11) NOT NULL,
  `tahun` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `suara_calon_pileg`
--

INSERT INTO `suara_calon_pileg` (`id_suara_calon_pileg`, `id_calon_pileg`, `id_kecamatan`, `jumlah_suara`, `tahun`) VALUES
(1, 1, 3, 0, '2019'),
(2, 2, 2, 1654782, '2019'),
(3, 1, 4, 3, '2015');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tps`
--

CREATE TABLE `tps` (
  `id_tps` int(11) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `nama_tps` varchar(25) NOT NULL,
  `lat` varchar(30) NOT NULL,
  `long` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tps`
--

INSERT INTO `tps` (`id_tps`, `id_kecamatan`, `nama_tps`, `lat`, `long`) VALUES
(1, 4, 'TPS 01 Mantap Jaya', '-7.797068', '110.370529'),
(3, 4, 'TPS 02 Mamanx', '-2.990934', '104.756554'),
(4, 4, 'TPS 03 Kevin', '3.597031', '98.678513');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`),
  ADD KEY `username` (`username`);

--
-- Indeks untuk tabel `calon_pileg`
--
ALTER TABLE `calon_pileg`
  ADD PRIMARY KEY (`id_calon_pileg`),
  ADD KEY `id_dapil` (`id_dapil`),
  ADD KEY `id_parpol` (`id_parpol`);

--
-- Indeks untuk tabel `calon_pilkada`
--
ALTER TABLE `calon_pilkada`
  ADD PRIMARY KEY (`id_calon_pilkada`);

--
-- Indeks untuk tabel `calon_pilpres`
--
ALTER TABLE `calon_pilpres`
  ADD PRIMARY KEY (`id_calon_pilpres`);

--
-- Indeks untuk tabel `dapil`
--
ALTER TABLE `dapil`
  ADD PRIMARY KEY (`id_dapil`);

--
-- Indeks untuk tabel `jadwal_kampanye`
--
ALTER TABLE `jadwal_kampanye`
  ADD PRIMARY KEY (`id_jadwal_kampanye`),
  ADD KEY `jadwal_kampanye_pemilu_ibfk_2` (`id_paslon_pilpres`);

--
-- Indeks untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`),
  ADD KEY `id_dapil` (`id_dapil`);

--
-- Indeks untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`),
  ADD KEY `id_berita` (`id_berita`),
  ADD KEY `username` (`username`);

--
-- Indeks untuk tabel `lokasi_kampanye`
--
ALTER TABLE `lokasi_kampanye`
  ADD PRIMARY KEY (`id_lokasi_kampanye`),
  ADD KEY `id_kecamatan` (`id_kecamatan`);

--
-- Indeks untuk tabel `parpol`
--
ALTER TABLE `parpol`
  ADD PRIMARY KEY (`id_parpol`),
  ADD UNIQUE KEY `no_urut_parpol` (`no_urut_parpol`);

--
-- Indeks untuk tabel `parpol_paslon_pilkada`
--
ALTER TABLE `parpol_paslon_pilkada`
  ADD PRIMARY KEY (`id_parpol_paslon_pilkada`),
  ADD KEY `id_paslon` (`id_paslon`),
  ADD KEY `id_parpol` (`id_parpol`);

--
-- Indeks untuk tabel `parpol_paslon_pilpres`
--
ALTER TABLE `parpol_paslon_pilpres`
  ADD PRIMARY KEY (`id_parpol_paslon_pilpres`),
  ADD KEY `id_paslon_pilpres` (`id_paslon_pilpres`),
  ADD KEY `id_parpol` (`id_parpol`);

--
-- Indeks untuk tabel `paslon_pilkada`
--
ALTER TABLE `paslon_pilkada`
  ADD PRIMARY KEY (`id_paslon`),
  ADD KEY `id_kepala_daerah` (`id_kepala_daerah`),
  ADD KEY `id_wakil_kepala_daerah` (`id_wakil_kepala_daerah`);

--
-- Indeks untuk tabel `paslon_pilpres`
--
ALTER TABLE `paslon_pilpres`
  ADD PRIMARY KEY (`id_paslon_pilpres`),
  ADD UNIQUE KEY `nomor_urut` (`nomor_urut`),
  ADD KEY `id_capres` (`id_capres`),
  ADD KEY `id_cawapres` (`id_cawapres`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `suara_calon_pileg`
--
ALTER TABLE `suara_calon_pileg`
  ADD PRIMARY KEY (`id_suara_calon_pileg`),
  ADD KEY `id_kecamatan` (`id_kecamatan`),
  ADD KEY `id_data_calon_dprd` (`id_calon_pileg`);

--
-- Indeks untuk tabel `tps`
--
ALTER TABLE `tps`
  ADD PRIMARY KEY (`id_tps`),
  ADD KEY `id_kecamatan` (`id_kecamatan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `calon_pileg`
--
ALTER TABLE `calon_pileg`
  MODIFY `id_calon_pileg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `calon_pilkada`
--
ALTER TABLE `calon_pilkada`
  MODIFY `id_calon_pilkada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `calon_pilpres`
--
ALTER TABLE `calon_pilpres`
  MODIFY `id_calon_pilpres` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `dapil`
--
ALTER TABLE `dapil`
  MODIFY `id_dapil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `jadwal_kampanye`
--
ALTER TABLE `jadwal_kampanye`
  MODIFY `id_jadwal_kampanye` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `lokasi_kampanye`
--
ALTER TABLE `lokasi_kampanye`
  MODIFY `id_lokasi_kampanye` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `parpol`
--
ALTER TABLE `parpol`
  MODIFY `id_parpol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `parpol_paslon_pilkada`
--
ALTER TABLE `parpol_paslon_pilkada`
  MODIFY `id_parpol_paslon_pilkada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `parpol_paslon_pilpres`
--
ALTER TABLE `parpol_paslon_pilpres`
  MODIFY `id_parpol_paslon_pilpres` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `paslon_pilkada`
--
ALTER TABLE `paslon_pilkada`
  MODIFY `id_paslon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `paslon_pilpres`
--
ALTER TABLE `paslon_pilpres`
  MODIFY `id_paslon_pilpres` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `suara_calon_pileg`
--
ALTER TABLE `suara_calon_pileg`
  MODIFY `id_suara_calon_pileg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tps`
--
ALTER TABLE `tps`
  MODIFY `id_tps` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `berita_ibfk_1` FOREIGN KEY (`username`) REFERENCES `pengguna` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `calon_pileg`
--
ALTER TABLE `calon_pileg`
  ADD CONSTRAINT `calon_pileg_ibfk_1` FOREIGN KEY (`id_dapil`) REFERENCES `dapil` (`id_dapil`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `calon_pileg_ibfk_2` FOREIGN KEY (`id_parpol`) REFERENCES `parpol` (`id_parpol`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jadwal_kampanye`
--
ALTER TABLE `jadwal_kampanye`
  ADD CONSTRAINT `jadwal_kampanye_ibfk_2` FOREIGN KEY (`id_paslon_pilpres`) REFERENCES `paslon_pilpres` (`id_paslon_pilpres`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD CONSTRAINT `kecamatan_ibfk_1` FOREIGN KEY (`id_dapil`) REFERENCES `dapil` (`id_dapil`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`id_berita`) REFERENCES `berita` (`id_berita`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `komentar_ibfk_2` FOREIGN KEY (`username`) REFERENCES `pengguna` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `lokasi_kampanye`
--
ALTER TABLE `lokasi_kampanye`
  ADD CONSTRAINT `lokasi_kampanye_ibfk_1` FOREIGN KEY (`id_kecamatan`) REFERENCES `kecamatan` (`id_kecamatan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `parpol_paslon_pilkada`
--
ALTER TABLE `parpol_paslon_pilkada`
  ADD CONSTRAINT `parpol_paslon_pilkada_ibfk_1` FOREIGN KEY (`id_paslon`) REFERENCES `paslon_pilkada` (`id_paslon`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `parpol_paslon_pilkada_ibfk_2` FOREIGN KEY (`id_parpol`) REFERENCES `parpol` (`id_parpol`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `parpol_paslon_pilpres`
--
ALTER TABLE `parpol_paslon_pilpres`
  ADD CONSTRAINT `parpol_paslon_pilpres_ibfk_1` FOREIGN KEY (`id_paslon_pilpres`) REFERENCES `paslon_pilpres` (`id_paslon_pilpres`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `parpol_paslon_pilpres_ibfk_2` FOREIGN KEY (`id_parpol`) REFERENCES `parpol` (`id_parpol`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `paslon_pilkada`
--
ALTER TABLE `paslon_pilkada`
  ADD CONSTRAINT `paslon_pilkada_ibfk_1` FOREIGN KEY (`id_kepala_daerah`) REFERENCES `calon_pilkada` (`id_calon_pilkada`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `paslon_pilkada_ibfk_2` FOREIGN KEY (`id_wakil_kepala_daerah`) REFERENCES `calon_pilkada` (`id_calon_pilkada`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `paslon_pilpres`
--
ALTER TABLE `paslon_pilpres`
  ADD CONSTRAINT `paslon_pilpres_ibfk_1` FOREIGN KEY (`id_capres`) REFERENCES `calon_pilpres` (`id_calon_pilpres`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `paslon_pilpres_ibfk_2` FOREIGN KEY (`id_cawapres`) REFERENCES `calon_pilpres` (`id_calon_pilpres`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `suara_calon_pileg`
--
ALTER TABLE `suara_calon_pileg`
  ADD CONSTRAINT `suara_calon_pileg_ibfk_1` FOREIGN KEY (`id_kecamatan`) REFERENCES `kecamatan` (`id_kecamatan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `suara_calon_pileg_ibfk_2` FOREIGN KEY (`id_calon_pileg`) REFERENCES `calon_pileg` (`id_calon_pileg`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tps`
--
ALTER TABLE `tps`
  ADD CONSTRAINT `tps_ibfk_1` FOREIGN KEY (`id_kecamatan`) REFERENCES `kecamatan` (`id_kecamatan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
