-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 04, 2020 at 11:01 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `4qr`
--

-- --------------------------------------------------------

--
-- Table structure for table `denda_gaji`
--

CREATE TABLE `denda_gaji` (
  `id_denda` int(11) NOT NULL,
  `tanggal_update` date NOT NULL,
  `nominal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `denda_gaji`
--

INSERT INTO `denda_gaji` (`id_denda`, `tanggal_update`, `nominal`) VALUES
(1, '2020-09-03', 25000);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` tinyint(4) NOT NULL,
  `nama_role` varchar(30) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `nama_role`, `status`) VALUES
(1, 'manajer', 1),
(2, 'admin', 1),
(3, 'karyawan', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_absensi`
--

CREATE TABLE `tbl_absensi` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nohp` varchar(30) NOT NULL,
  `status` varchar(32) NOT NULL,
  `date_inserted_at` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gaji`
--

CREATE TABLE `tbl_gaji` (
  `id` int(11) NOT NULL,
  `level` varchar(32) NOT NULL,
  `gaji` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gaji_pegawai`
--

CREATE TABLE `tbl_gaji_pegawai` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_absen` date NOT NULL,
  `nominal` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_gaji_pegawai`
--

INSERT INTO `tbl_gaji_pegawai` (`id`, `id_user`, `tgl_absen`, `nominal`) VALUES
(1, 23, '2020-08-31', 30000),
(9, 23, '2020-09-02', 60000),
(11, 23, '2020-09-03', 50000),
(12, 26, '2020-09-03', 25000),
(13, 27, '2020-09-03', 60000),
(14, 27, '2020-09-04', 50000),
(15, 22, '2020-09-04', 60000),
(16, 25, '2020-09-04', 60000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kehadiran`
--

CREATE TABLE `tbl_kehadiran` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `in_time` time NOT NULL,
  `out_time` time NOT NULL,
  `attendance_date` date NOT NULL,
  `status` enum('Masuk','Pulang','Ijin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kehadiran`
--

INSERT INTO `tbl_kehadiran` (`id`, `id_user`, `in_time`, `out_time`, `attendance_date`, `status`) VALUES
(1, 23, '14:02:23', '14:19:37', '2020-08-31', 'Pulang'),
(9, 23, '16:11:20', '16:11:20', '2020-09-02', 'Ijin'),
(12, 23, '09:46:50', '09:47:44', '2020-09-03', 'Pulang'),
(13, 26, '09:49:20', '09:49:41', '2020-09-03', 'Pulang'),
(14, 27, '09:51:10', '09:51:10', '2020-09-03', 'Ijin'),
(15, 22, '02:45:04', '02:50:44', '2020-09-04', 'Pulang'),
(16, 27, '02:49:40', '02:50:32', '2020-09-04', 'Pulang'),
(18, 25, '03:10:51', '03:10:51', '2020-09-04', 'Ijin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengajuan`
--

CREATE TABLE `tbl_pengajuan` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jenis_pengajuan` varchar(30) NOT NULL,
  `reason` text NOT NULL,
  `pengajuan_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pengajuan`
--

INSERT INTO `tbl_pengajuan` (`id`, `id_user`, `jenis_pengajuan`, `reason`, `pengajuan_date`) VALUES
(9, 23, 'Sakit', 'sakit katanya', '2020-09-02'),
(10, 27, 'Sakit', 'sakit katanya', '2020-09-03'),
(12, 25, 'Cuti', 'mager', '2020-09-04');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_qrcode`
--

CREATE TABLE `tbl_qrcode` (
  `id` int(11) NOT NULL,
  `thumbnail` text NOT NULL,
  `tanggal` date NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_pulang` time NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_qrcode`
--

INSERT INTO `tbl_qrcode` (`id`, `thumbnail`, `tanggal`, `jam_masuk`, `jam_pulang`, `created_at`, `created_by`) VALUES
(1, 'a79d4d4a0aee199f9ffaf11baed6f180.png', '2020-08-30', '03:44:00', '14:00:00', '2020-08-29 20:54:41', 1810651008),
(6, '041d7fccff9c39b0681ffcd0595349b8.png', '2020-09-03', '09:40:00', '09:48:00', '2020-09-03 02:49:34', 1810651008),
(7, '9dde86b2629ff8222b486d0842fd4807.png', '2020-09-04', '03:00:00', '02:00:00', '2020-09-03 19:50:24', 1810651008);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slip_gaji`
--

CREATE TABLE `tbl_slip_gaji` (
  `id` int(11) NOT NULL,
  `id_role` tinyint(4) NOT NULL,
  `nominal` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_slip_gaji`
--

INSERT INTO `tbl_slip_gaji` (`id`, `id_role`, `nominal`) VALUES
(6, 1, 60000),
(7, 2, 60000),
(8, 3, 50000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `id_role` tinyint(4) NOT NULL,
  `nik` varchar(100) NOT NULL,
  `passcode` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `registered_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `id_role`, `nik`, `passcode`, `nama`, `status`, `registered_date`) VALUES
(21, 1, '1810651007', '1810651007', 'Abraham Yanto', 1, '2020-08-07'),
(22, 2, '1810651008', '1810651008', 'Idris Sukoretno', 1, '2020-08-07'),
(23, 3, '1810651006', '1810651006', 'Dwi Candra Irawan', 1, '2020-08-06'),
(24, 1, 'E41171252', 'coba', 'niko wahyu fitrianto', 1, '2020-08-29'),
(25, 2, '41171251', 'coba', 'niko wahyu', 1, '2020-08-29'),
(26, 3, '41171255', 'coba', 'yuke prisilia putri', 1, '2020-08-29'),
(27, 3, '4117125123', 'coba', 'halo bro', 1, '2020-09-03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `denda_gaji`
--
ALTER TABLE `denda_gaji`
  ADD PRIMARY KEY (`id_denda`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `tbl_absensi`
--
ALTER TABLE `tbl_absensi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`,`nama`,`status`,`date_inserted_at`);

--
-- Indexes for table `tbl_gaji`
--
ALTER TABLE `tbl_gaji`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`,`level`,`gaji`);

--
-- Indexes for table `tbl_gaji_pegawai`
--
ALTER TABLE `tbl_gaji_pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_kehadiran`
--
ALTER TABLE `tbl_kehadiran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pengajuan`
--
ALTER TABLE `tbl_pengajuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_qrcode`
--
ALTER TABLE `tbl_qrcode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_slip_gaji`
--
ALTER TABLE `tbl_slip_gaji`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `denda_gaji`
--
ALTER TABLE `denda_gaji`
  MODIFY `id_denda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_absensi`
--
ALTER TABLE `tbl_absensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_gaji`
--
ALTER TABLE `tbl_gaji`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_gaji_pegawai`
--
ALTER TABLE `tbl_gaji_pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_kehadiran`
--
ALTER TABLE `tbl_kehadiran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_pengajuan`
--
ALTER TABLE `tbl_pengajuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_qrcode`
--
ALTER TABLE `tbl_qrcode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_slip_gaji`
--
ALTER TABLE `tbl_slip_gaji`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
