-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2021 at 05:34 PM
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
-- Table structure for table `kelas`
--

DROP TABLE IF EXISTS `kelas`;
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
-- Table structure for table `materi`
--

DROP TABLE IF EXISTS `materi`;
CREATE TABLE `materi` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tema_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `nama_file` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`id`, `user_id`, `tema_id`, `kelas_id`, `nama_file`, `url`, `is_active`, `date_created`) VALUES
(1, 1, 1, 1, 'Subtema 1 : Pembelajaran 1.1', 'testfile1.pdf', 1, 1631208163),
(2, 1, 2, 1, 'Subtema 1 : Pembelajaran 1.2', 'testfile2.pdf', 0, 1631400000);

-- --------------------------------------------------------

--
-- Table structure for table `penugasan`
--

DROP TABLE IF EXISTS `penugasan`;
CREATE TABLE `penugasan` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tema_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `judul_penugasan` varchar(128) NOT NULL,
  `deskripsi_tugas` varchar(1000) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `profil_admin`
--

DROP TABLE IF EXISTS `profil_admin`;
CREATE TABLE `profil_admin` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nuptk` int(16) NOT NULL,
  `jabatan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `profil_guru`
--

DROP TABLE IF EXISTS `profil_guru`;
CREATE TABLE `profil_guru` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `nuptk` int(16) NOT NULL,
  `jabatan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `profil_siswa`
--

DROP TABLE IF EXISTS `profil_siswa`;
CREATE TABLE `profil_siswa` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `nisn` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tema`
--

DROP TABLE IF EXISTS `tema`;
CREATE TABLE `tema` (
  `id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `nama_tema` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tugas`
--

DROP TABLE IF EXISTS `tugas`;
CREATE TABLE `tugas` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tema_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `penugasan_id` int(11) NOT NULL,
  `url` varchar(128) NOT NULL,
  `nilai` int(3) NOT NULL,
  `status` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(3, 'Dicky Febrian Dwiputra', 'febriandwiputra@gmail.com', 'default.jpg', '$2y$10$tKTwfWRfQnkHBPOlgJyZyOpdYqgkdb6ethtXMxoAY6aOnHDQw3vi6', 1, 1, 1631208163),
(4, 'SHANINA AISYAH WARDHANI', 'shaninawardhani@gmail.com', 'default.jpg', '$2y$10$5X5FTPEcdGztrmHa032EDOJMQjJHS/e7KQqdrAoCna5lXXB93sn2e', 3, 1, 1631695344);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

DROP TABLE IF EXISTS `user_access_menu`;
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

DROP TABLE IF EXISTS `user_menu`;
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

DROP TABLE IF EXISTS `user_role`;
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

DROP TABLE IF EXISTS `user_sub_menu`;
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
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penugasan`
--
ALTER TABLE `penugasan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profil_admin`
--
ALTER TABLE `profil_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profil_guru`
--
ALTER TABLE `profil_guru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profil_siswa`
--
ALTER TABLE `profil_siswa`
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
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `penugasan`
--
ALTER TABLE `penugasan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profil_admin`
--
ALTER TABLE `profil_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profil_guru`
--
ALTER TABLE `profil_guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profil_siswa`
--
ALTER TABLE `profil_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tema`
--
ALTER TABLE `tema`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
