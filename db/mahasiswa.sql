-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Mar 2019 pada 03.11
-- Versi server: 10.1.34-MariaDB
-- Versi PHP: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mahasiswa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(10) NOT NULL,
  `nama` text NOT NULL,
  `tgl_lahir` date NOT NULL,
  `ipk` decimal(11,2) NOT NULL,
  `kelas` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `tgl_lahir`, `ipk`, `kelas`) VALUES
('6701171069', 'Indah Riski', '1998-12-06', '3.20', '42-01'),
('6701171070', 'Sonia Catherina', '1998-06-06', '3.60', '42-01'),
('6701171071', 'Nava Adiana', '1998-12-06', '3.30', '42-01'),
('6701171072', 'Alifia Nessa', '1998-06-06', '3.10', '42-01'),
('6701171073', 'Yoga Setiwan', '1998-11-03', '3.70', '42-01'),
('6701171074', 'M. Khoirudin', '1998-01-03', '3.50', '42-01'),
('6701171075', 'Rafata Baharansyah', '1998-04-02', '3.90', '42-01'),
('6701171076', 'Rizsa El Akbar', '1998-03-11', '3.80', '42-01'),
('6701171077', 'M Yusuf Ramadhan', '1998-12-17', '3.65', '42-01'),
('6701171078', 'M Dafa Prima Aji ', '1998-08-11', '3.80', '42-01'),
('6701171079', 'Egan Kusmaya', '1998-02-07', '3.40', '42-02'),
('6701171080', 'Aan Yuni Saputri', '1998-07-26', '3.33', '42-02'),
('6701171081', 'Nining Parwati ', '1998-12-06', '3.45', '42-02'),
('6701171082', 'Elisa Dwi Oktaviani', '1998-06-06', '3.46', '42-02'),
('6701171083', 'Putri Aulianti', '1998-11-15', '3.67', '42-02'),
('6701171084', 'Sri Hartini', '1998-03-23', '3.15', '42-02'),
('6701171085', 'Desi Julianti', '1998-04-22', '3.40', '42-02'),
('6701171086', 'Martya Almira', '1998-05-16', '3.50', '42-02'),
('6701171087', 'Dyah ayu', '1998-12-28', '3.54', '42-02'),
('6701171088', 'Nur Latifiyah', '1998-04-21', '3.47', '42-02');

--
-- Trigger `mahasiswa`
--
DELIMITER $$
CREATE TRIGGER `after_mahasiswa_insert` AFTER INSERT ON `mahasiswa` FOR EACH ROW BEGIN
INSERT INTO mahasiswa_audit
SET aksi = 'Insert',
nim = NEW.nim,
nama = NEW.nama,
tglubah = NOW();
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `before_mahasiswa_update` BEFORE UPDATE ON `mahasiswa` FOR EACH ROW BEGIN
INSERT INTO mahasiswa_audit
SET aksi = 'update',
nim = OLD.nim,
nama = OLD.nama,
tglubah = NOW();
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
