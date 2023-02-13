-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Apr 2021 pada 03.22
-- Versi server: 10.4.14-MariaDB-log
-- Versi PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_spp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(10) NOT NULL,
  `kompetensi_keahlian` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `kompetensi_keahlian`) VALUES
(1, '10 RPL 1', 'RPL'),
(2, '10 RPL 2', 'RPL'),
(3, '10 TKJ 1', 'TKJ'),
(4, '10 TKJ 2', 'TKJ'),
(5, '10 EI 1', 'EI'),
(6, '10 EI 2', 'EI'),
(7, '10 MM 1', 'MM'),
(8, '10 MM 2', 'MM'),
(9, '10 MM 3', 'MM'),
(10, '10 BC', 'BC'),
(11, '10 AV', 'AV'),
(12, '10 MT 1', 'MT'),
(13, '10 MT 2', 'MT'),
(14, '10 AN', 'AN'),
(15, '11 RPL 1', 'RPL'),
(16, '11 RPL 2', 'RPL'),
(17, '11 TKJ 1', 'TKJ'),
(18, '11 TKJ 2', 'TKJ'),
(19, '11 EI 1', 'EI'),
(20, '11 EI 2', 'EI'),
(21, '11 MM 1', 'MM'),
(22, '11 MM 2', 'MM'),
(23, '11 MM 3', 'MM'),
(24, '11 BC', 'BC'),
(25, '11 AV', 'AV'),
(26, '11 MT 1', 'MT'),
(27, '11 MT 2', 'MT'),
(28, '11 AN', 'AN'),
(29, '12 RPL 1', 'RPL'),
(30, '12 RPL 2', 'RPL'),
(31, '12 TKJ 1', 'TKJ'),
(32, '12 TKJ 2', 'TKJ'),
(33, '12 EI 1', 'EI'),
(34, '12 EI 2', 'EI'),
(35, '12 MM 1', 'MM'),
(36, '12 MM 2', 'MM'),
(37, '12 MM 3', 'MM'),
(38, '12 BC', 'BC'),
(39, '12 AV', 'AV'),
(40, '12 MT 1', 'MT'),
(41, '12 MT 2', 'MT'),
(42, '12 AN', 'AN');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(35) NOT NULL,
  `nisn` varchar(10) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `nama_kelas` varchar(10) NOT NULL,
  `tgl_bayar` varchar(100) NOT NULL,
  `bulan_dibayar` varchar(8) NOT NULL,
  `tahun_dibayar` varchar(4) NOT NULL,
  `id_spp` int(11) NOT NULL,
  `jumlah_bayar` int(11) NOT NULL,
  `sisa` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_petugas`, `nama_petugas`, `nisn`, `nama`, `nama_kelas`, `tgl_bayar`, `bulan_dibayar`, `tahun_dibayar`, `id_spp`, `jumlah_bayar`, `sisa`) VALUES
(4, 1234, 'Pak Paijo', '0039031454', 'Miftakhul Huda', '12 RPL 2', 'Sabtu, 3 April 2021', 'April', '2020', 3, 250000, '200000'),
(5, 1412, 'Alx', '0039565539', 'Shinta Ayu Wulandari', '12 RPL 2', 'Sabtu, 3 April 2021', 'Maret', '2019', 2, 200000, '150000'),
(6, 1412, 'Alx', '0033112076', 'Shalu Fatmawati', '12 RPL 2', 'Minggu, 4 April 2021', 'April', '2020', 3, 250000, '200000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama_petugas` varchar(35) NOT NULL,
  `level` enum('admin','petugas') NOT NULL,
  `foto` varchar(100) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `tgl_lahir` varchar(50) NOT NULL,
  `tempat_tinggal` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_hp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `username`, `password`, `nama_petugas`, `level`, `foto`, `jabatan`, `tgl_lahir`, `tempat_tinggal`, `email`, `no_hp`) VALUES
(1234, 'petugas1', '528a315ba71f2298b993c9f6a3653b2a', 'Pak Paijo', 'petugas', '3.png', '', '', '', '', ''),
(1412, 'admin', '0192023a7bbd73250516f069df18b500', 'Alx', 'admin', '3.png', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat`
--

CREATE TABLE `riwayat` (
  `id_pembayaran` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(35) CHARACTER SET latin1 NOT NULL,
  `nisn` varchar(10) CHARACTER SET latin1 NOT NULL,
  `nama` varchar(35) CHARACTER SET latin1 NOT NULL,
  `nama_kelas` varchar(10) CHARACTER SET latin1 NOT NULL,
  `tgl_bayar` varchar(100) CHARACTER SET latin1 NOT NULL,
  `bulan_dibayar` varchar(8) CHARACTER SET latin1 NOT NULL,
  `tahun_dibayar` varchar(4) CHARACTER SET latin1 NOT NULL,
  `id_spp` int(11) NOT NULL,
  `jumlah_bayar` int(11) NOT NULL,
  `jumlah_dibayar` int(11) NOT NULL,
  `sisa` varchar(11) CHARACTER SET latin1 NOT NULL,
  `status` enum('Lunas','Belum Lunas') CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `riwayat`
--

INSERT INTO `riwayat` (`id_pembayaran`, `id_petugas`, `nama_petugas`, `nisn`, `nama`, `nama_kelas`, `tgl_bayar`, `bulan_dibayar`, `tahun_dibayar`, `id_spp`, `jumlah_bayar`, `jumlah_dibayar`, `sisa`, `status`) VALUES
(1, 1412, 'Alx', '0022302155', 'Rangga Ridho Waskito', '12 RPL 2', 'Sabtu, 3 April 2021', 'Januari', '2018', 1, 150000, 150000, '0', 'Lunas'),
(2, 1412, 'Alx', '0033315310', 'Nazrul Muchlis Sobirin', '12 RPL 2', 'Sabtu, 3 April 2021', 'Juli', '2021', 4, 300000, 300000, '0', 'Lunas'),
(3, 1234, 'Pak Paijo', '0034196960', 'Yonanda Haryono', '12 RPL 2', 'Sabtu, 3 April 2021', 'Oktober', '2019', 2, 200000, 200000, '0', 'Lunas'),
(4, 1234, 'Pak Petugas', '0039031454', 'Miftakhul Huda', '12 RPL 2', 'Sabtu, 3 April 2021', 'April', '2020', 3, 250000, 50000, '200000', 'Belum Lunas'),
(5, 1412, 'Alx', '0039565539', 'Shinta Ayu Wulandari', '12 RPL 2', 'Sabtu, 3 April 2021', 'Maret', '2019', 2, 200000, 50000, '150000', 'Belum Lunas'),
(6, 1412, 'Alx', '0033112076', 'Shalu Fatmawati', '12 RPL 2', 'Minggu, 4 April 2021', 'April', '2020', 3, 250000, 50000, '200000', 'Belum Lunas'),
(7, 4, 'residu', '1234567', 'Miftakhussurur Al Maliki', '12 RPL 2', 'Senin, 5 April 2021', 'April', '2020', 3, 250000, 250000, '0', 'Lunas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `nisn` varchar(10) NOT NULL,
  `nis` varchar(12) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `id_spp` int(11) NOT NULL,
  `nominal` int(11) NOT NULL,
  `level` varchar(15) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`nisn`, `nis`, `nama`, `id_kelas`, `nama_kelas`, `alamat`, `no_telp`, `id_spp`, `nominal`, `level`, `foto`) VALUES
('0022302155', '4316/690.065', 'Rangga Ridho Waskito', 30, '12 RPL 2', 'Jl.Bowling No.44 RT01/RW01', '085755417785', 1, 150000, 'siswa', '1.png'),
('0033112076', '4322/096.065', 'Shalu Fatmawati', 30, '12 RPL 2', 'Dsn. Gebyak Desa Purwoasri RT01/RW05 Singosari Malang', '083835795869', 3, 250000, 'siswa', '1.png'),
('0033134439', '4329/703.065', 'Yamashita Intan Eka Pratiwi', 30, '12 RPL 2', 'Ampeldento - Karangploso', '085331364785', 2, 200000, 'siswa', '1.png'),
('0033315310', '4312/686.065', 'Nazrul Muchlis Sobirin', 30, '12 RPL 2', 'Tejosari, Candirenggo', '082131518280', 4, 300000, 'siswa', '1.png'),
('0034196960', '4334/708.065', 'Yonanda Haryono', 30, '12 RPL 2', 'Perum Bumi Mondoroko Raya Blok AG 42', '082331050979', 2, 200000, 'siswa', '1.png'),
('0039031454', '4302/676.065', 'Miftakhul Huda', 30, '12 RPL 2', 'Jl. Masjid No.54 RT02/RW03 Pagentan Singosari Malang', '081908143464', 3, 250000, 'siswa', '1.png'),
('0039565539', '4323/679.065', 'Shinta Ayu Wulandari', 30, '12 RPL 2', 'Jl. dr. Cipto gg 8 No.26 RT02/RW10 Bedali Lawang', '085791258250', 2, 200000, 'siswa', '1.png'),
('1234567', '12345', 'Miftakhussurur Al Maliki', 30, '12 RPL 2', 'Jl. Bima 2  No 5a RT16/RW04 Junrejo Pendem Kota Batu', '1234567891012', 3, 250000, 'siswa', '1.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `spp`
--

CREATE TABLE `spp` (
  `id_spp` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `nominal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `spp`
--

INSERT INTO `spp` (`id_spp`, `tahun`, `nominal`) VALUES
(1, 2018, 150000),
(2, 2019, 200000),
(3, 2020, 250000),
(4, 2021, 300000),
(5, 2016, 205000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `pembayaran_ibfk_2` (`id_spp`),
  ADD KEY `nisn` (`nisn`),
  ADD KEY `id_petugas` (`id_petugas`),
  ADD KEY `nama_petugas` (`nama_petugas`),
  ADD KEY `jumlah_bayar` (`jumlah_bayar`),
  ADD KEY `nama` (`nama`),
  ADD KEY `nama_kelas` (`nama_kelas`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`),
  ADD KEY `nama_petugas` (`nama_petugas`);

--
-- Indeks untuk tabel `riwayat`
--
ALTER TABLE `riwayat`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nisn`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_spp` (`id_spp`),
  ADD KEY `nominal` (`nominal`),
  ADD KEY `nama` (`nama`),
  ADD KEY `nama_kelas` (`nama_kelas`);

--
-- Indeks untuk tabel `spp`
--
ALTER TABLE `spp`
  ADD PRIMARY KEY (`id_spp`),
  ADD KEY `nominal` (`nominal`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`nama_petugas`) REFERENCES `petugas` (`nama_petugas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembayaran_ibfk_3` FOREIGN KEY (`id_spp`) REFERENCES `siswa` (`id_spp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembayaran_ibfk_4` FOREIGN KEY (`jumlah_bayar`) REFERENCES `siswa` (`nominal`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembayaran_ibfk_5` FOREIGN KEY (`nama`) REFERENCES `siswa` (`nama`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembayaran_ibfk_6` FOREIGN KEY (`nama_kelas`) REFERENCES `siswa` (`nama_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembayaran_ibfk_7` FOREIGN KEY (`nisn`) REFERENCES `siswa` (`nisn`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `siswa_ibfk_2` FOREIGN KEY (`id_spp`) REFERENCES `spp` (`id_spp`),
  ADD CONSTRAINT `siswa_ibfk_3` FOREIGN KEY (`nominal`) REFERENCES `spp` (`nominal`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
