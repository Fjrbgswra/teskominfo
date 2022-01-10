-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 10 Jan 2022 pada 09.42
-- Versi Server: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pegawai_mvc`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai_mvc`
--

CREATE TABLE `pegawai_mvc` (
  `no` int(11) NOT NULL,
  `nama_depan` varchar(40) NOT NULL,
  `nama_belakang` varchar(40) NOT NULL,
  `nip` varchar(40) NOT NULL,
  `alamat` varchar(40) NOT NULL,
  `ttl` varchar(13) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `jabatan` varchar(10) NOT NULL,
  `instansi` varchar(50) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai_mvc`
--

INSERT INTO `pegawai_mvc` (`no`, `nama_depan`, `nama_belakang`, `nip`, `alamat`, `ttl`, `telp`, `jabatan`, `instansi`, `foto`) VALUES
(1631130121, 'Audi', 'B', '2', 'Malang', '2022-12-31', '123', 'Jabatan A', 'Instansi A', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pegawai_mvc`
--
ALTER TABLE `pegawai_mvc`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pegawai_mvc`
--
ALTER TABLE `pegawai_mvc`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1631130127;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
