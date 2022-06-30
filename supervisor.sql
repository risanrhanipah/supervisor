-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2020 at 04:36 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `supervisor`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `status`) VALUES
('kurikulum', 'kurikulum', 1),
('kepala', 'kepala', 2);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(11) NOT NULL,
  `nama_mapel` varchar(60) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `kelas` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id`, `nama_mapel`, `nama`, `username`, `password`, `kelas`) VALUES
(1, 'Bahasa Indonesia', 'Lia Apriliani', 'lia', 'lia', 'RPL XI'),
(2, 'PBO', 'Rachelia', 'rachel', 'rachel', 'RPL XII');

-- --------------------------------------------------------

--
-- Table structure for table `kepala`
--

CREATE TABLE `kepala` (
  `tanggal` varchar(60) NOT NULL,
  `file` varchar(90) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kepala`
--

INSERT INTO `kepala` (`tanggal`, `file`, `deskripsi`) VALUES
('2020-08-21', '1197551097_Perbaikan Pemrograman Web Perangkat Bergerak.pdf', 'asd'),
('2020-08-27', '1545744432_11800425 Risa Nurhanipah RPL XII-1 LKDP3.pdf', 'bagus'),
('2020-08-19', '312806994_MATXIITI-2-3-4.pdf', 'iya ini'),
('2020-08-27', '2109590900_11800425 Risa Nurhanipah RPL XII-1 LKDP3.pdf', 'bagus sekali');

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `tanggal` varchar(90) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `file` varchar(90) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `email` varchar(90) NOT NULL,
  `password` varchar(60) NOT NULL,
  `nama` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`email`, `password`, `nama`) VALUES
('risaanurhanipah@gmail.com', 'risasa', 'sasasa');

-- --------------------------------------------------------

--
-- Table structure for table `supervisor`
--

CREATE TABLE `supervisor` (
  `id` int(11) NOT NULL,
  `nama` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supervisor`
--

INSERT INTO `supervisor` (`id`, `nama`) VALUES
(1, 'asd'),
(2, 'GINGIN');

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE `upload` (
  `tanggal` varchar(60) NOT NULL,
  `mapel` varchar(60) NOT NULL,
  `guru` varchar(60) NOT NULL,
  `kkm` int(11) NOT NULL,
  `file` varchar(90) NOT NULL,
  `status` varchar(60) DEFAULT NULL,
  `pesan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upload`
--

INSERT INTO `upload` (`tanggal`, `mapel`, `guru`, `kkm`, `file`, `status`, `pesan`) VALUES
('2020-08-14', 'Bahasa Indonesia', 'Lia Apriliani', 76, '1336165731_11800425 Risa Nurhanipah RPL XII-1 LKDP3.pdf', '<h5 style=\"color : red\">tolak</h5>', 'tidak tepat waktu'),
('2020-08-21', 'Bahasa Indonesia', 'Lala', 76, '1617359924_Modul Kantin Digital.pdf', '<h5 style=\"color : red\">tolak</h5>', 'Kok Kurang'),
('2020-08-20', 'Matematika', 'Budi', 21, '928773352_Perbaikan Pemrograman Web Perangkat Bergerak.pdf', '<h5 style=\"color : green\">terima</h5>', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`status`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`tanggal`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `upload`
--
ALTER TABLE `upload`
  ADD PRIMARY KEY (`file`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
