-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 05, 2018 at 08:42 PM
-- Server version: 5.7.21-0ubuntu0.17.10.1
-- PHP Version: 7.1.11-0ubuntu0.17.10.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem_karyawan`
--

-- --------------------------------------------------------

--
-- Table structure for table `agama`
--

CREATE TABLE `agama` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agama`
--

INSERT INTO `agama` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(2, 'Islam', '2018-01-27 21:20:42', '2018-02-05 20:36:06');

-- --------------------------------------------------------

--
-- Stand-in structure for view `getkaryawanfull`
-- (See below for the actual view)
--
CREATE TABLE `getkaryawanfull` (
`id` int(11)
,`kode` varchar(255)
,`nama` varchar(255)
,`jenis_kelamin` char(1)
,`status_kawin` varchar(255)
,`jumlah_anak` tinyint(4)
,`pendidikan_terakhir` varchar(255)
,`agama` varchar(255)
,`jabatan` varchar(255)
,`status_karyawan` varchar(255)
,`tempat_lahir` varchar(255)
,`tanggal_lahir` date
,`alamat_asal` text
,`alamat_sekarang` text
,`no_telp` varchar(255)
,`no_ktp` varchar(255)
,`no_npwp` varchar(255)
,`no_bpjs_kes` varchar(255)
,`no_bpjs_kerja` varchar(255)
,`email` varchar(255)
,`mulai_kerja` date
,`sk_kontrak` varchar(255)
,`sk_karyawan` varchar(255)
,`created_at` datetime
,`updated_at` datetime
);

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(2, 'Administrator', '2018-01-28 09:32:51', '2018-01-28 09:32:51');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id` int(11) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis_kelamin` char(1) NOT NULL,
  `status_kawin` tinyint(4) NOT NULL,
  `jumlah_anak` tinyint(4) NOT NULL,
  `pendidikan_terakhir` tinyint(4) NOT NULL,
  `agama` tinyint(4) NOT NULL,
  `jabatan` int(11) NOT NULL,
  `status_karyawan` int(11) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat_asal` text,
  `alamat_sekarang` text NOT NULL,
  `no_telp` varchar(255) DEFAULT NULL,
  `no_ktp` varchar(255) DEFAULT NULL,
  `no_npwp` varchar(255) DEFAULT NULL,
  `no_bpjs_kes` varchar(255) DEFAULT NULL,
  `no_bpjs_kerja` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mulai_kerja` date DEFAULT NULL,
  `sk_kontrak` varchar(255) DEFAULT NULL,
  `sk_karyawan` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id`, `kode`, `nama`, `jenis_kelamin`, `status_kawin`, `jumlah_anak`, `pendidikan_terakhir`, `agama`, `jabatan`, `status_karyawan`, `tempat_lahir`, `tanggal_lahir`, `alamat_asal`, `alamat_sekarang`, `no_telp`, `no_ktp`, `no_npwp`, `no_bpjs_kes`, `no_bpjs_kerja`, `email`, `mulai_kerja`, `sk_kontrak`, `sk_karyawan`, `created_at`, `updated_at`) VALUES
(2, 'KAR0001', 'Gema Aji Wardian', 'L', 2, 0, 1, 2, 2, 2, 'Bandung', '1999-11-13', 'Jl. Sukagalih', 'Bandung', '0128371232314', '', '', '', '', '', '0000-00-00', '', '', '2018-02-05 19:15:55', '2018-02-05 19:27:34');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan_anak`
--

CREATE TABLE `karyawan_anak` (
  `id` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `level` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `additional_info` text,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id`, `level`, `message`, `additional_info`, `created_at`) VALUES
(1, 'info', 'Login authentication failed.', '{\"username\":\"admin\",\"ip_address\":\"127.0.0.1\",\"browser\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:57.0) Gecko\\/20100101 Firefox\\/57.0\",\"fallback_ip_address\":\"localhost\"}', '2018-01-23 14:29:28'),
(2, 'info', 'Login authentication success.', '{\"username\":\"admin\",\"ip_address\":\"127.0.0.1\",\"browser\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:57.0) Gecko\\/20100101 Firefox\\/57.0\",\"fallback_ip_address\":\"localhost\"}', '2018-01-23 14:30:27'),
(3, 'info', 'Login authentication success.', '{\"username\":\"admin\",\"ip_address\":\"127.0.0.1\",\"browser\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:57.0) Gecko\\/20100101 Firefox\\/57.0\",\"fallback_ip_address\":\"localhost\"}', '2018-01-23 14:30:37'),
(4, 'info', 'Login authentication success.', '{\"username\":\"admin\",\"ip_address\":\"127.0.0.1\",\"browser\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:57.0) Gecko\\/20100101 Firefox\\/57.0\",\"fallback_ip_address\":\"localhost\"}', '2018-01-23 16:09:57'),
(5, 'info', 'Login authentication success.', '{\"username\":\"admin\",\"ip_address\":\"127.0.0.1\",\"browser\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:58.0) Gecko\\/20100101 Firefox\\/58.0\",\"fallback_ip_address\":\"localhost\"}', '2018-01-25 10:16:44'),
(6, 'info', 'Login authentication success.', '{\"username\":\"admin\",\"ip_address\":\"127.0.0.1\",\"browser\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64; rv:59.0) Gecko\\/20100101 Firefox\\/59.0\",\"fallback_ip_address\":\"DESKTOP-N3DUSOA\"}', '2018-01-27 20:28:07'),
(7, 'info', 'Login authentication success.', '{\"username\":\"admin\",\"ip_address\":\"127.0.0.1\",\"browser\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64; rv:59.0) Gecko\\/20100101 Firefox\\/59.0\",\"fallback_ip_address\":\"DESKTOP-N3DUSOA\"}', '2018-01-28 05:45:01'),
(8, 'info', 'Login authentication success.', '{\"username\":\"admin\",\"ip_address\":\"127.0.0.1\",\"browser\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64; rv:59.0) Gecko\\/20100101 Firefox\\/59.0\",\"fallback_ip_address\":\"DESKTOP-N3DUSOA\"}', '2018-01-28 09:23:03'),
(9, 'info', 'Login authentication success.', '{\"username\":\"admin\",\"ip_address\":\"127.0.0.1\",\"browser\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64; rv:59.0) Gecko\\/20100101 Firefox\\/59.0\",\"fallback_ip_address\":\"DESKTOP-N3DUSOA\"}', '2018-01-28 12:00:40'),
(10, 'info', 'Login authentication success.', '{\"username\":\"test\",\"ip_address\":\"127.0.0.1\",\"browser\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64; rv:59.0) Gecko\\/20100101 Firefox\\/59.0\",\"fallback_ip_address\":\"DESKTOP-N3DUSOA\"}', '2018-01-28 12:18:36'),
(11, 'info', 'Login authentication success.', '{\"username\":\"admin\",\"ip_address\":\"127.0.0.1\",\"browser\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64; rv:59.0) Gecko\\/20100101 Firefox\\/59.0\",\"fallback_ip_address\":\"DESKTOP-N3DUSOA\"}', '2018-01-28 12:18:49'),
(12, 'info', 'Login authentication success.', '{\"username\":\"admin\",\"ip_address\":\"127.0.0.1\",\"browser\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64; rv:59.0) Gecko\\/20100101 Firefox\\/59.0\",\"fallback_ip_address\":\"DESKTOP-N3DUSOA\"}', '2018-01-28 12:20:08'),
(13, 'info', 'Login authentication success.', '{\"username\":\"test\",\"ip_address\":\"127.0.0.1\",\"browser\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64; rv:59.0) Gecko\\/20100101 Firefox\\/59.0\",\"fallback_ip_address\":\"DESKTOP-N3DUSOA\"}', '2018-01-28 12:20:14'),
(14, 'info', 'Login authentication success.', '{\"username\":\"admin\",\"ip_address\":\"127.0.0.1\",\"browser\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64; rv:59.0) Gecko\\/20100101 Firefox\\/59.0\",\"fallback_ip_address\":\"DESKTOP-N3DUSOA\"}', '2018-01-28 12:20:19'),
(15, 'info', 'Login authentication success.', '{\"username\":\"admin\",\"ip_address\":\"127.0.0.1\",\"browser\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:58.0) Gecko\\/20100101 Firefox\\/58.0\",\"fallback_ip_address\":\"localhost\"}', '2018-02-05 18:59:21');

-- --------------------------------------------------------

--
-- Table structure for table `pendidikanterakhir`
--

CREATE TABLE `pendidikanterakhir` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendidikanterakhir`
--

INSERT INTO `pendidikanterakhir` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'SMA', '2018-01-28 09:32:23', '2018-02-05 20:41:55');

-- --------------------------------------------------------

--
-- Table structure for table `statuskaryawan`
--

CREATE TABLE `statuskaryawan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statuskaryawan`
--

INSERT INTO `statuskaryawan` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(2, 'Tetap', '2018-01-28 09:32:59', '2018-01-28 09:32:59');

-- --------------------------------------------------------

--
-- Table structure for table `statuskawin`
--

CREATE TABLE `statuskawin` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statuskawin`
--

INSERT INTO `statuskawin` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(2, 'Single', '2018-01-28 09:29:23', '2018-01-28 09:29:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password_hash`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$A0ricd85gX.y0irdAfaxNOW4l0sP59nq67ga7jfc.nhTpZOvs0qd.', 1, '2018-01-23 14:30:10', '2018-01-23 14:30:12');

-- --------------------------------------------------------

--
-- Structure for view `getkaryawanfull`
--
DROP TABLE IF EXISTS `getkaryawanfull`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `getkaryawanfull`  AS  (select `karyawan`.`id` AS `id`,`karyawan`.`kode` AS `kode`,`karyawan`.`nama` AS `nama`,`karyawan`.`jenis_kelamin` AS `jenis_kelamin`,`statuskawin`.`nama` AS `status_kawin`,`karyawan`.`jumlah_anak` AS `jumlah_anak`,`pendidikanterakhir`.`nama` AS `pendidikan_terakhir`,`agama`.`nama` AS `agama`,`jabatan`.`nama` AS `jabatan`,`statuskaryawan`.`nama` AS `status_karyawan`,`karyawan`.`tempat_lahir` AS `tempat_lahir`,`karyawan`.`tanggal_lahir` AS `tanggal_lahir`,`karyawan`.`alamat_asal` AS `alamat_asal`,`karyawan`.`alamat_sekarang` AS `alamat_sekarang`,`karyawan`.`no_telp` AS `no_telp`,`karyawan`.`no_ktp` AS `no_ktp`,`karyawan`.`no_npwp` AS `no_npwp`,`karyawan`.`no_bpjs_kes` AS `no_bpjs_kes`,`karyawan`.`no_bpjs_kerja` AS `no_bpjs_kerja`,`karyawan`.`email` AS `email`,`karyawan`.`mulai_kerja` AS `mulai_kerja`,`karyawan`.`sk_kontrak` AS `sk_kontrak`,`karyawan`.`sk_karyawan` AS `sk_karyawan`,`karyawan`.`created_at` AS `created_at`,`karyawan`.`updated_at` AS `updated_at` from (((((`karyawan` join `agama`) join `jabatan`) join `pendidikanterakhir`) join `statuskaryawan`) join `statuskawin`) where ((`karyawan`.`agama` = `agama`.`id`) and (`karyawan`.`jabatan` = `jabatan`.`id`) and (`karyawan`.`pendidikan_terakhir` = `pendidikanterakhir`.`id`) and (`karyawan`.`status_karyawan` = `statuskaryawan`.`id`) and (`statuskawin`.`id` = `karyawan`.`status_kawin`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agama`
--
ALTER TABLE `agama`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karyawan_anak`
--
ALTER TABLE `karyawan_anak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendidikanterakhir`
--
ALTER TABLE `pendidikanterakhir`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statuskaryawan`
--
ALTER TABLE `statuskaryawan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statuskawin`
--
ALTER TABLE `statuskawin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agama`
--
ALTER TABLE `agama`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `karyawan_anak`
--
ALTER TABLE `karyawan_anak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `pendidikanterakhir`
--
ALTER TABLE `pendidikanterakhir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `statuskaryawan`
--
ALTER TABLE `statuskaryawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `statuskawin`
--
ALTER TABLE `statuskawin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
