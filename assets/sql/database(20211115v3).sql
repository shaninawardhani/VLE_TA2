-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2021 at 05:53 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kp_vle_sdn_kopo`
--
DROP DATABASE IF EXISTS `kp_vle_sdn_kopo`;
CREATE DATABASE IF NOT EXISTS `kp_vle_sdn_kopo` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `kp_vle_sdn_kopo`;

-- --------------------------------------------------------

--
-- Table structure for table `jawaban`
--

CREATE TABLE `jawaban` (
  `id` int(11) NOT NULL,
  `user_id_siswa` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `soal_id` int(11) NOT NULL,
  `nilai_id` int(11) NOT NULL,
  `kuis_id` int(11) NOT NULL,
  `jawaban` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jawaban`
--

INSERT INTO `jawaban` (`id`, `user_id_siswa`, `kelas_id`, `soal_id`, `nilai_id`, `kuis_id`, `jawaban`) VALUES
(13, 7, 4, 3, 2, 7, 'd'),
(14, 7, 4, 4, 2, 7, 'a'),
(15, 7, 4, 5, 3, 8, 'b'),
(16, 7, 4, 6, 3, 8, 'a'),
(17, 7, 4, 7, 3, 8, 'a'),
(18, 7, 4, 8, 4, 9, 'a'),
(19, 7, 4, 9, 4, 9, 'b'),
(20, 7, 4, 10, 4, 9, 'a'),
(21, 7, 4, 11, 4, 9, 'a'),
(22, 7, 4, 8, 5, 10, 'lala 1'),
(23, 7, 4, 9, 5, 10, 'lele 2'),
(24, 7, 4, 10, 6, 11, 'hoho');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `tingkat` int(1) NOT NULL,
  `rombel` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `tingkat`, `rombel`) VALUES
(1, 1, 'A'),
(2, 1, 'B'),
(3, 2, 'A'),
(4, 3, 'A'),
(5, 4, 'A'),
(6, 5, 'A'),
(7, 6, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `kuis`
--

CREATE TABLE `kuis` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tema_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `judul_kuis` text NOT NULL,
  `tipe_soal` varchar(100) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `due_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kuis`
--

INSERT INTO `kuis` (`id`, `user_id`, `tema_id`, `kelas_id`, `judul_kuis`, `tipe_soal`, `date_created`, `date_updated`, `due_date`) VALUES
(6, 5, 1, 4, 'Kuis Subtema 1 : Pembelajaran 1.1', 'Isian', '2021-11-12 09:17:13', '2021-11-13 19:31:31', '2021-11-12 11:00:00'),
(7, 5, 3, 4, 'Kuis Subtema 1 : Pembelajaran 1.5', 'Pilihan Ganda', '2021-11-13 18:59:04', NULL, '2021-11-20 19:00:00'),
(8, 5, 2, 4, 'Kuis tema 2', 'Pilihan Ganda', '2021-11-13 22:55:02', NULL, '2021-11-13 23:00:00'),
(9, 5, 1, 4, 'Kuis tema 1 llalala', 'Pilihan Ganda', '2021-11-13 23:33:43', NULL, '2021-11-13 23:45:00'),
(10, 5, 4, 4, 'Kuis tema 4', 'Isian', '2021-11-13 23:51:20', NULL, '2021-11-13 23:59:00'),
(11, 5, 1, 4, 'Test 1', 'Isian', '2021-11-14 02:16:31', NULL, '2021-11-16 02:16:00');

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tema_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `nama_file` varchar(128) NOT NULL,
  `file_materi` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`id`, `user_id`, `tema_id`, `kelas_id`, `nama_file`, `file_materi`, `is_active`, `date_created`, `date_updated`) VALUES
(12, 5, 4, 4, 'Coba coba 2', '', 1, '2021-11-08 09:42:40', '2021-11-10 12:42:53'),
(13, 5, 1, 1, 'Coba coba', '', 1, '2021-11-08 09:43:34', NULL),
(14, 5, 4, 4, 'sub tema 1 : pembelajaran baru 11', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/file/materi/Konfirmasi_Pembayaran_Sep_2021.pdf', 1, '2021-11-11 06:37:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_kuis`
--

CREATE TABLE `nilai_kuis` (
  `id` int(11) NOT NULL,
  `user_id_siswa` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `kuis_id` int(11) NOT NULL,
  `nilai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai_kuis`
--

INSERT INTO `nilai_kuis` (`id`, `user_id_siswa`, `kelas_id`, `kuis_id`, `nilai`) VALUES
(1, 7, 4, 6, 100),
(2, 7, 4, 7, 50),
(3, 7, 4, 8, 67),
(4, 7, 4, 9, 25),
(5, 7, 4, 10, 80),
(6, 7, 4, 11, 70),
(7, 9, 4, 11, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_penugasan`
--

CREATE TABLE `nilai_penugasan` (
  `id` int(11) NOT NULL,
  `user_id_siswa` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `penugasan_id` int(11) NOT NULL,
  `nilai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai_penugasan`
--

INSERT INTO `nilai_penugasan` (`id`, `user_id_siswa`, `kelas_id`, `penugasan_id`, `nilai`) VALUES
(1, 7, 4, 14, NULL),
(2, 9, 4, 14, NULL),
(3, 7, 4, 15, NULL),
(4, 9, 4, 15, NULL),
(5, 7, 4, 16, NULL),
(6, 9, 4, 16, NULL),
(7, 7, 4, 17, NULL),
(8, 9, 4, 17, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `penugasan`
--

CREATE TABLE `penugasan` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tema_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `judul_penugasan` varchar(128) NOT NULL,
  `deskripsi_tugas` varchar(1000) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `due_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penugasan`
--

INSERT INTO `penugasan` (`id`, `user_id`, `tema_id`, `kelas_id`, `judul_penugasan`, `deskripsi_tugas`, `date_created`, `date_updated`, `due_date`) VALUES
(5, 5, 3, 5, 'Tugas 5', 'Test 5', '2021-11-10 22:31:13', '2021-11-10 15:31:54', '2021-11-10 16:30:36'),
(17, 5, 1, 4, 'ha', 'ha', '2021-11-15 23:49:35', NULL, '2021-11-18 23:49:00');

-- --------------------------------------------------------

--
-- Table structure for table `soal_essay`
--

CREATE TABLE `soal_essay` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `kuis_id` int(11) NOT NULL,
  `soal` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `soal_essay`
--

INSERT INTO `soal_essay` (`id`, `user_id`, `kelas_id`, `kuis_id`, `soal`) VALUES
(6, 5, 4, 6, 'soal 1'),
(7, 5, 4, 6, 'soal 2'),
(8, 5, 4, 10, 'test 1'),
(9, 5, 4, 10, 'test 2'),
(10, 5, 4, 11, 'soal 1 baru');

-- --------------------------------------------------------

--
-- Table structure for table `soal_pg`
--

CREATE TABLE `soal_pg` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `kuis_id` int(11) NOT NULL,
  `soal` text NOT NULL,
  `a` varchar(1000) NOT NULL,
  `b` varchar(1000) NOT NULL,
  `c` varchar(1000) NOT NULL,
  `d` varchar(1000) NOT NULL,
  `kunci` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `soal_pg`
--

INSERT INTO `soal_pg` (`id`, `user_id`, `kelas_id`, `kuis_id`, `soal`, `a`, `b`, `c`, `d`, `kunci`) VALUES
(3, 5, 4, 7, 'Anda memilih siapa ?', 'mantan pertama', 'mantan kedua', 'mantan ketiga', 'pacar', 'd'),
(4, 5, 4, 7, 'Jika dompet tertinggal maka kita harus ?', 'Minta minta', 'Mencuri', 'Kasbon', 'Bilang apa adanya', 'c'),
(5, 5, 4, 8, 'AAAAA', 'A', 'B', 'C', 'D', 'a'),
(6, 5, 4, 8, 'BBBBB', 'A', 'B', 'C', 'D', 'a'),
(7, 5, 4, 8, 'CCCCC', 'A', 'B', 'C', 'D', 'a'),
(8, 5, 4, 9, '1', 'a', 'a', 'a', 'a', 'b'),
(9, 5, 4, 9, '2', 'a', 'a', 'a', 'a', 'b'),
(10, 5, 4, 9, '3', 'a', 'a', 'a', 'a', 'b'),
(11, 5, 4, 9, '4', 'a', 'a', 'a', 'a', 'b');

-- --------------------------------------------------------

--
-- Table structure for table `status_kuis`
--

CREATE TABLE `status_kuis` (
  `id` int(11) NOT NULL,
  `user_id_siswa` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `kuis_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_kuis`
--

INSERT INTO `status_kuis` (`id`, `user_id_siswa`, `kelas_id`, `kuis_id`, `status`, `date_updated`) VALUES
(1, 7, 4, 6, 1, '2021-11-14 01:54:12'),
(2, 7, 4, 7, 1, '2021-11-13 22:53:01'),
(3, 7, 4, 8, 1, '2021-11-13 23:27:09'),
(4, 7, 4, 9, 1, '2021-11-13 23:43:56'),
(5, 7, 4, 10, 1, '2021-11-14 01:32:48'),
(6, 7, 4, 11, 1, '2021-11-14 15:52:10'),
(7, 9, 4, 11, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `status_tugas`
--

CREATE TABLE `status_tugas` (
  `id` int(11) NOT NULL,
  `user_id_siswa` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `penugasan_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_tugas`
--

INSERT INTO `status_tugas` (`id`, `user_id_siswa`, `kelas_id`, `penugasan_id`, `status`, `date_updated`) VALUES
(4, 7, 4, 14, 1, '2021-11-14 08:53:32'),
(5, 9, 4, 14, 0, NULL),
(6, 7, 4, 15, 1, '2021-11-15 23:35:45'),
(7, 9, 4, 15, 0, NULL),
(8, 7, 4, 16, 1, '2021-11-15 23:44:22'),
(9, 9, 4, 16, 0, NULL),
(10, 7, 4, 17, 1, '2021-11-15 23:50:08'),
(11, 9, 4, 17, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tema`
--

CREATE TABLE `tema` (
  `id` int(11) NOT NULL,
  `nama_tema` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tema`
--

INSERT INTO `tema` (`id`, `nama_tema`) VALUES
(1, 'Tema 1'),
(2, 'Tema 2'),
(3, 'Tema 3'),
(4, 'Tema 4'),
(5, 'Tema 5'),
(6, 'Tema 6'),
(7, 'Tema 7'),
(8, 'Tema 8'),
(9, 'Tema 9');

-- --------------------------------------------------------

--
-- Table structure for table `tugas`
--

CREATE TABLE `tugas` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tema_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `penugasan_id` int(11) NOT NULL,
  `url` varchar(128) NOT NULL,
  `nilai` int(3) NOT NULL,
  `status` varchar(128) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tugas`
--

INSERT INTO `tugas` (`id`, `user_id`, `tema_id`, `kelas_id`, `penugasan_id`, `url`, `nilai`, `status`, `date_created`) VALUES
(1, 7, 1, 4, 2, 'Coba coba 2', 80, '', '2021-11-25 00:37:44'),
(2, 7, 1, 4, 3, 'http://localhost/KP_VLE_SDN-KOPO-01/assets/file/tugas/Konfirmasi_Pembayaran_Apr_2021.pdf', 90, '', '2021-11-30 20:51:39'),
(3, 7, 2, 4, 4, 'http://localhost/KP_VLE_SDN-KOPO-01/assets/file/tugas/Konfirmasi_Pembayaran_Jan_2021.pdf', 70, '', '2021-11-10 22:25:05'),
(4, 8, 4, 6, 3, 'testlalalal', 0, '', '2021-11-10 22:33:57'),
(7, 7, 1, 4, 14, 'http://localhost/KP_VLE_SDN-KOPO-01/assets/file/tugas/Konfirmasi_Pembayaran_Apr_20211.pdf', 0, '', '2021-11-14 08:53:32'),
(8, 7, 1, 4, 17, 'http://localhost/KP_VLE_SDN-KOPO-01/assets/file/tugas/E3kgy44UYAMZhLh1.jpg', 0, '', '2021-11-15 23:50:08');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `nuptk_nisn` bigint(16) NOT NULL,
  `jabatan` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `kelas_id`, `nuptk_nisn`, `jabatan`, `date_created`) VALUES
(3, 'Dicky Febrian Dwiputra', 'admin@gmail.com', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/img/profile/default.jpg', '$2y$10$tKTwfWRfQnkHBPOlgJyZyOpdYqgkdb6ethtXMxoAY6aOnHDQw3vi6', 1, 1, 0, 123456789010111, '', 1631208163),
(5, 'Akun Guru Bakti', 'guru@gmail.com', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/img/profile/default.jpg', '$2y$10$/Zg2xYpuZ43qwdsutJIvz.b08g/MEDkw3AGyoF9VhVRKUV7fIu7Di', 2, 1, 4, 12345678, 'Sekretaris', 1636039693),
(7, 'Siswa Berbakti', 'siswa@gmail.com', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/img/profile/default.jpg', '$2y$10$xdLkj3XYX31m6iyda0lWWOsFPrmaOQUhO34SsO4mAI3RrOYmpxg82', 3, 1, 4, 9970017151, '', 1636084746),
(8, 'siswa 2', 'siswa2@gmail.com', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/img/profile/default.jpg', '$2y$10$6TIjG95yDJ4tGQaUIGR/ROw.7DznIGplhuWBmxhPmaT7thyMf17tK', 3, 1, 6, 23523252, 'wrwrw', 1636364236),
(9, 'Siswa 2', 'siswabaru@gmail.com', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/img/profile/default.jpg', '$2y$10$zId2xloBpqAkdXYnzwZATuwGHnmfUk91mo6VdOBQ.QtfZgh37UAQ6', 3, 1, 4, 9970017152, '', 1636830953),
(10, 'Guru Baru', 'gurubaru@gmail.com', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/img/profile/default.jpg', '$2y$10$hzEUYJktUX9iwCtW7apmye5xUJ1qLW/6ZH8qWKaH.PoZ88p/G4G6C', 2, 1, 3, 12345678987456123, 'Wali kelas', 1636918531);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'Teacher'),
(3, 'Student'),
(4, 'Test Menu');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Guru'),
(3, 'Siswa');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Beranda', 'admin', 'fas fa-home fa-fw', 1),
(2, 1, 'Akun', 'admin/akun', 'fas fa-user fa-fw', 1),
(3, 1, 'Kelas', 'admin/kelas', 'fas fa-chalkboard-teacher fa-fw', 1),
(4, 2, 'Beranda', 'teacher', 'fas fa-home fa-fw', 1),
(5, 2, 'Materi', 'teacher/materi', 'fas fa-book-reader fa-fw', 1),
(6, 2, 'Penugasan', 'teacher/penugasan', 'fas fa-tasks fa-fw', 1),
(7, 2, 'Kuis', 'teacher/kuis', 'fab fa-quora fa-fw', 1),
(8, 3, 'Beranda', 'student', 'fas fa-home fa-fw', 1),
(9, 3, 'Materi', 'student/materi', 'fas fa-book-reader fa-fw', 1),
(10, 3, 'Tugas', 'student/tugas', 'fas fa-tasks fa-fw', 1),
(11, 3, 'Kuis', 'student/kuis', 'fab fa-quora fa-fw', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jawaban`
--
ALTER TABLE `jawaban`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kuis`
--
ALTER TABLE `kuis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai_kuis`
--
ALTER TABLE `nilai_kuis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai_penugasan`
--
ALTER TABLE `nilai_penugasan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penugasan`
--
ALTER TABLE `penugasan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `soal_essay`
--
ALTER TABLE `soal_essay`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `soal_pg`
--
ALTER TABLE `soal_pg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_kuis`
--
ALTER TABLE `status_kuis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_tugas`
--
ALTER TABLE `status_tugas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tema`
--
ALTER TABLE `tema`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jawaban`
--
ALTER TABLE `jawaban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kuis`
--
ALTER TABLE `kuis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `nilai_kuis`
--
ALTER TABLE `nilai_kuis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `nilai_penugasan`
--
ALTER TABLE `nilai_penugasan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `penugasan`
--
ALTER TABLE `penugasan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `soal_essay`
--
ALTER TABLE `soal_essay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `soal_pg`
--
ALTER TABLE `soal_pg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `status_kuis`
--
ALTER TABLE `status_kuis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `status_tugas`
--
ALTER TABLE `status_tugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tema`
--
ALTER TABLE `tema`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
