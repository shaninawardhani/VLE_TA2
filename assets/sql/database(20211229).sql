-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2021 at 05:48 AM
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
  `jawaban` text NOT NULL
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
(24, 7, 4, 10, 6, 11, 'hoho'),
(25, 82, 7, 11, 10, 13, 'Letak geografis Asia Tenggara berada di antara tiga perairan, yaitu: Samudra Hindia dan Teluk Bengga'),
(26, 82, 7, 12, 10, 13, 'Perikanan air payau dilakukan di tepi-tepi pantai yang datar dalam bentuk tambak atau empang. Jenis '),
(27, 82, 7, 13, 20, 14, 'b'),
(28, 82, 7, 14, 20, 14, 'a'),
(29, 82, 7, 13, 30, 15, 'Cimahi');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `tingkat` int(1) NOT NULL,
  `rombel` varchar(128) NOT NULL,
  `tahun` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `tingkat`, `rombel`, `tahun`) VALUES
(1, 1, 'A', '2021/2022'),
(2, 1, 'B', '2021/2022'),
(3, 2, 'A', '2021/2022'),
(4, 3, 'A', '2021/2022'),
(5, 4, 'A', '2021/2022'),
(6, 5, 'A', '2021/2022'),
(7, 6, 'A', '2021/2022'),
(16, 6, 'B', '2021/2022');

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
(13, 21, 1, 7, 'Kuis tema 1', 'Isian', '2021-11-24 01:58:04', NULL, '2021-11-24 02:10:00'),
(14, 21, 2, 7, 'Kuis tema 2', 'Pilihan Ganda', '2021-11-24 01:59:01', NULL, '2021-11-24 02:20:00'),
(15, 21, 3, 7, 'Kuis tema 3', 'Isian', '2021-11-24 13:20:00', NULL, '2021-11-25 14:20:00'),
(16, 21, 6, 7, 'Kuis tema 6', 'Pilihan Ganda', '2021-12-27 23:05:22', NULL, '2021-12-29 23:05:00');

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
(17, 21, 2, 7, 'Persatuan Dalam Perbedaan', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/file/materi/Buku_Siswa_Kelas_6_Tema_2_Revisi_2018_ayomadrasah.pdf', 1, '2021-11-24 03:50:30', NULL),
(18, 21, 3, 7, 'Tokoh Dalam Penemuan', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/file/materi/Buku_Siswa_Kelas_6_Tema_3_Revisi_2018_ayomadrasah.pdf', 1, '2021-11-24 03:51:36', NULL),
(19, 21, 4, 7, 'Globalisasi', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/file/materi/Buku_Siswa_Kelas_6_Tema_4_Revisi_2018_ayomadrasah.pdf', 1, '2021-11-24 03:51:54', NULL),
(21, 21, 5, 7, 'Selamatkan Makhluk Hidup TEMA 5', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/file/materi/photo_2021-11-24_10-37-261.jpg', 1, '2021-11-24 08:29:15', '2021-11-24 08:30:02'),
(22, 15, 1, 1, 'Diriku', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/file/materi/photo_2021-11-24_10-37-262.jpg', 1, '2021-11-24 08:48:07', NULL),
(23, 21, 2, 7, 'Selamatkan Makhluk Hidup TEMA 2', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/file/materi/photo_2021-11-24_10-37-263.jpg', 1, '2021-11-24 08:54:34', NULL);

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
(7, 9, 4, 11, NULL),
(8, 7, 4, 12, NULL),
(9, 9, 4, 12, NULL),
(10, 82, 7, 13, 100),
(11, 83, 7, 13, NULL),
(12, 84, 7, 13, NULL),
(13, 85, 7, 13, NULL),
(14, 86, 7, 13, NULL),
(15, 87, 7, 13, NULL),
(16, 88, 7, 13, NULL),
(17, 89, 7, 13, NULL),
(18, 90, 7, 13, NULL),
(19, 91, 7, 13, NULL),
(20, 82, 7, 14, 50),
(21, 83, 7, 14, NULL),
(22, 84, 7, 14, NULL),
(23, 85, 7, 14, NULL),
(24, 86, 7, 14, NULL),
(25, 87, 7, 14, NULL),
(26, 88, 7, 14, NULL),
(27, 89, 7, 14, NULL),
(28, 90, 7, 14, NULL),
(29, 91, 7, 14, NULL),
(30, 82, 7, 15, NULL),
(31, 83, 7, 15, NULL),
(32, 84, 7, 15, NULL),
(33, 85, 7, 15, NULL),
(34, 86, 7, 15, NULL),
(35, 87, 7, 15, NULL),
(36, 88, 7, 15, NULL),
(37, 89, 7, 15, NULL),
(38, 90, 7, 15, NULL),
(39, 91, 7, 15, NULL),
(40, 82, 7, 16, NULL),
(41, 83, 7, 16, NULL),
(42, 84, 7, 16, NULL),
(43, 85, 7, 16, NULL),
(44, 86, 7, 16, NULL),
(45, 87, 7, 16, NULL),
(46, 88, 7, 16, NULL),
(47, 89, 7, 16, NULL),
(48, 99, 7, 16, NULL),
(49, 90, 7, 16, NULL),
(50, 91, 7, 16, NULL);

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
(8, 9, 4, 17, NULL),
(9, 7, 4, 18, NULL),
(10, 9, 4, 18, NULL),
(11, 7, 4, 19, NULL),
(12, 9, 4, 19, NULL),
(13, 82, 7, 20, NULL),
(14, 83, 7, 20, NULL),
(15, 84, 7, 20, NULL),
(16, 85, 7, 20, NULL),
(17, 86, 7, 20, NULL),
(18, 87, 7, 20, NULL),
(19, 88, 7, 20, NULL),
(20, 89, 7, 20, NULL),
(21, 90, 7, 20, NULL),
(22, 91, 7, 20, NULL),
(23, 82, 7, 21, NULL),
(24, 83, 7, 21, NULL),
(25, 84, 7, 21, NULL),
(26, 85, 7, 21, NULL),
(27, 86, 7, 21, NULL),
(28, 87, 7, 21, NULL),
(29, 88, 7, 21, NULL),
(30, 89, 7, 21, NULL),
(31, 90, 7, 21, NULL),
(32, 91, 7, 21, NULL),
(33, 82, 7, 22, NULL),
(34, 83, 7, 22, NULL),
(35, 84, 7, 22, NULL),
(36, 85, 7, 22, NULL),
(37, 86, 7, 22, NULL),
(38, 87, 7, 22, NULL),
(39, 88, 7, 22, NULL),
(40, 89, 7, 22, NULL),
(41, 99, 7, 22, NULL),
(42, 90, 7, 22, NULL),
(43, 91, 7, 22, NULL);

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
(20, 21, 1, 7, 'Tugas Menuju Masyarakat Sejahtera', 'Isi tugas tersebut dengan file pdf', '2021-11-24 01:56:04', '2021-11-24 03:53:46', '2021-11-24 10:53:00'),
(21, 21, 2, 7, 'Tugas Globalisasi', 'masukan pdf', '2021-11-24 13:17:51', NULL, '2021-11-25 13:50:00'),
(22, 21, 3, 7, 'Tugas Baru', 'test tugas', '2021-12-27 22:52:34', NULL, '2021-12-28 10:56:00');

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
(11, 21, 7, 13, 'Jelaskan kondisi geografis Asia Tenggara?'),
(12, 21, 7, 13, 'Apa perbedaaan perikanan air payau dan perikanan air tawar?'),
(13, 21, 7, 15, 'Alamat UNJANI berada dimana ?');

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
(13, 21, 7, 14, 'ASEAN didirikan pada tahun ', '1965', '1956', '1967', '1976', 'c'),
(14, 21, 7, 14, 'Kota di Malaysia yang terdaftar dalam UNESCO World Heritage yaitu ', 'George Town', 'George Park', 'George World', 'George Hill', 'a'),
(15, 21, 7, 16, 'ASEAN didirikan pada tahun ', '1965', '1956', '1967', '1976', 'a');

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
(7, 9, 4, 11, 0, NULL),
(8, 7, 4, 12, 0, NULL),
(9, 9, 4, 12, 0, NULL),
(10, 82, 7, 13, 1, '2021-11-24 02:03:28'),
(11, 83, 7, 13, 0, NULL),
(12, 84, 7, 13, 0, NULL),
(13, 85, 7, 13, 0, NULL),
(14, 86, 7, 13, 0, NULL),
(15, 87, 7, 13, 0, NULL),
(16, 88, 7, 13, 0, NULL),
(17, 89, 7, 13, 0, NULL),
(18, 90, 7, 13, 0, NULL),
(19, 91, 7, 13, 0, NULL),
(20, 82, 7, 14, 1, '2021-11-24 02:04:00'),
(21, 83, 7, 14, 0, NULL),
(22, 84, 7, 14, 0, NULL),
(23, 85, 7, 14, 0, NULL),
(24, 86, 7, 14, 0, NULL),
(25, 87, 7, 14, 0, NULL),
(26, 88, 7, 14, 0, NULL),
(27, 89, 7, 14, 0, NULL),
(28, 90, 7, 14, 0, NULL),
(29, 91, 7, 14, 0, NULL),
(30, 82, 7, 15, 1, '2021-11-24 13:23:37'),
(31, 83, 7, 15, 0, NULL),
(32, 84, 7, 15, 0, NULL),
(33, 85, 7, 15, 0, NULL),
(34, 86, 7, 15, 0, NULL),
(35, 87, 7, 15, 0, NULL),
(36, 88, 7, 15, 0, NULL),
(37, 89, 7, 15, 0, NULL),
(38, 90, 7, 15, 0, NULL),
(39, 91, 7, 15, 0, NULL),
(40, 82, 7, 16, 0, NULL),
(41, 83, 7, 16, 0, NULL),
(42, 84, 7, 16, 0, NULL),
(43, 85, 7, 16, 0, NULL),
(44, 86, 7, 16, 0, NULL),
(45, 87, 7, 16, 0, NULL),
(46, 88, 7, 16, 0, NULL),
(47, 89, 7, 16, 0, NULL),
(48, 99, 7, 16, 0, NULL),
(49, 90, 7, 16, 0, NULL),
(50, 91, 7, 16, 0, NULL);

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
(11, 9, 4, 17, 0, NULL),
(12, 7, 4, 18, 1, '2021-11-19 10:13:44'),
(13, 9, 4, 18, 0, NULL),
(14, 7, 4, 19, 0, NULL),
(15, 9, 4, 19, 0, NULL),
(16, 82, 7, 20, 1, '2021-11-24 02:02:20'),
(17, 83, 7, 20, 0, NULL),
(18, 84, 7, 20, 0, NULL),
(19, 85, 7, 20, 0, NULL),
(20, 86, 7, 20, 0, NULL),
(21, 87, 7, 20, 0, NULL),
(22, 88, 7, 20, 0, NULL),
(23, 89, 7, 20, 0, NULL),
(24, 90, 7, 20, 0, NULL),
(25, 91, 7, 20, 0, NULL),
(26, 82, 7, 21, 1, '2021-11-24 13:22:48'),
(27, 83, 7, 21, 0, NULL),
(28, 84, 7, 21, 0, NULL),
(29, 85, 7, 21, 0, NULL),
(30, 86, 7, 21, 0, NULL),
(31, 87, 7, 21, 0, NULL),
(32, 88, 7, 21, 0, NULL),
(33, 89, 7, 21, 0, NULL),
(34, 90, 7, 21, 0, NULL),
(35, 91, 7, 21, 0, NULL),
(36, 82, 7, 22, 0, NULL),
(37, 83, 7, 22, 0, NULL),
(38, 84, 7, 22, 0, NULL),
(39, 85, 7, 22, 0, NULL),
(40, 86, 7, 22, 0, NULL),
(41, 87, 7, 22, 0, NULL),
(42, 88, 7, 22, 0, NULL),
(43, 89, 7, 22, 0, NULL),
(44, 99, 7, 22, 0, NULL),
(45, 90, 7, 22, 0, NULL),
(46, 91, 7, 22, 0, NULL);

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
(8, 7, 1, 4, 17, 'http://localhost/KP_VLE_SDN-KOPO-01/assets/file/tugas/E3kgy44UYAMZhLh1.jpg', 100, '', '2021-11-15 23:50:08'),
(9, 7, 1, 4, 18, 'http://localhost/KP_VLE_SDN-KOPO-01/assets/file/tugas/Banana.png', 0, '', '2021-11-19 10:13:44'),
(10, 82, 6, 7, 20, 'http://localhost/KP_VLE_SDN-KOPO-01/assets/file/tugas/File_Tugas_pdf.pdf', 85, '', '2021-11-24 02:02:20'),
(11, 82, 2, 7, 21, 'http://localhost/KP_VLE_SDN-KOPO-01/assets/file/tugas/photo_2021-11-24_10-37-26.jpg', 0, '', '2021-11-24 13:22:48');

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
  `nuptk_nisn` varchar(16) NOT NULL,
  `jabatan` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `kelas_id`, `nuptk_nisn`, `jabatan`, `date_created`) VALUES
(3, 'Ardiana', 'admin@gmail.com', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/img/profile/default.jpg', '$2y$10$N.CDZNnYtMPKbzGBKciubODGQyv5eHJXl6uGSq24f8ltBQrvpw7mC', 1, 1, 0, '1234567890987654', 'Operator', 1631208163),
(15, 'Herliah, S.Pd', 'herliahkelas1a@gmail.com', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/img/profile/default.jpg', '$2y$10$ONlgce1PMEvdgj1StQdliuWHx0dpGg/ZmUdDs92kun/MXfYKE73lm', 2, 1, 1, '3235741642300043', 'Guru Kelas', 1637650876),
(16, 'Lilis Tati Cantini, A.Ma.Pd', 'liliskelas1b@gmail.com', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/img/profile/default.jpg', '$2y$10$pkEn/wO8aCVOydjHaq/cGu.CDl9eJoWLZJlgbMxAD7r8SH5ZOS8Mq', 2, 1, 2, '7660740641300042', 'Guru Kelas', 1637650972),
(17, 'Eti, S.Pd.SD', 'etikelas2a@gmail.com', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/img/profile/default.jpg', '$2y$10$CUpDMdTTK1Xn.poOR3qMi.qDXdN3MW4pr6WBaSAbksruG9G53XPVG', 2, 1, 3, '8538740641300072', 'Guru Kelas', 1637651025),
(18, 'Sadiyah, S.Pd', 'sadiyahkelas3a@gmail.com', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/img/profile/default.jpg', '$2y$10$LC0obc/VlFHtkP/lybCTpeGMN4MVf42mtNK/p4jztp6n7zBmHFYxq', 2, 1, 4, '3656751652300032', 'Guru Kelas', 1637651074),
(19, 'Eneng Rukmanah, S.Pd.SD', 'enengkelas4a@gmail.com', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/img/profile/default.jpg', '$2y$10$34bBX49rH68NKkRRXvMOE.gOl9AuFaLdZoTJ9F7QoWD7e9eSD9rcG', 2, 1, 5, '2458746649300033', 'Guru Kelas', 1637651115),
(20, 'Nina Herlina Effendi, S.Pd', 'ninakelas5a@gmail.com', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/img/profile/default.jpg', '$2y$10$odZfiTwLG1IB.Nc19u2FxugiBKUyGVF4eEDloKfYXlMqqTDYKalnK', 2, 1, 6, '2346754655300023', 'Guru Kelas', 1637651159),
(21, 'Ida Wahyuni, S.Pd', 'idakelas6a@gmail.com', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/img/profile/default.jpg', '$2y$10$5Bc0m8uy.RqAwg9xgmbyyujIKLkPveCnKCJ46LLO6wiRmzn8TdOzO', 2, 1, 7, '6143768669130093', 'Guru Kelas', 1637651205),
(22, 'Agus Muhammad Arrasyid', 'agusmuhammadarrayid@gmail.com', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/img/profile/default.jpg', '$2y$10$jyGDZsnQIb2PuzLw5O.tJeOaqN5tF29nfZFa3qHYezpcmQxNJrHZ.', 3, 1, 1, '3133970542', '', 1637651355),
(23, 'Ayunda Sopia Ghandy', 'ayundasopiaghandy@gmail.com', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/img/profile/default.jpg', '$2y$10$X3zWKpbY96XtQU3EWR5af.fZVYNd7LoFObWBI54SeejwMB/iUGGnm', 3, 1, 1, '0144674577', '', 1637651385),
(24, 'Destia Gani Andini', 'destiaganiandini@gmail.com', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/img/profile/default.jpg', '$2y$10$bKKIc.XEvC.CUSQnf1B/KeC7QRnkmJqNAd6vqORlqbKjy..OOgWhG', 3, 1, 1, '3145972185', '', 1637651812),
(25, 'Kenji Okza Kurnia', 'kenjiokzakurnia@gmail.com', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/img/profile/default.jpg', '$2y$10$zXgUGqu/9fWJwW0ZJ0vrIedZ2MVlIwiSmtFJDKIhsKlvokNVR5C0.', 3, 1, 1, '3137735542', '', 1637651852),
(26, 'Kita Herliana', 'kitaherliana@gmail.com', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/img/profile/default.jpg', '$2y$10$G5go91dVJWXguT6QZU1ya.V7zbtTOVDQEAXf/Dx4q7wnMPAZ15DKm', 3, 1, 1, '3132634130', '', 1637651879),
(27, 'Mahira Hasna Kamila', 'mahirahasnakamila@gmail.com', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/img/profile/default.jpg', '$2y$10$3CEcg.Tsr3ET3WGBI3KOju.Wc55CPwDFcOzvCO2uEPIIA2GAmZyOi', 3, 1, 1, '0137452644', '', 1637651922),
(28, 'Mikka Nevan Febian', 'mikkanevanfebian@gmail.com', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/img/profile/default.jpg', '$2y$10$ZhSQaXjToeulK8KXtW84UOzOHBCO6ouPdbbp1oGe7UbKjWKHI6Zsy', 3, 1, 1, '3143279231', '', 1637651967),
(29, 'Moch. Farhan Al Habsyi', 'mochfarhanalhabsyi@gmail.com', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/img/profile/default.jpg', '$2y$10$YgtL5HnSGtwkeDshCeiCGub1W/vMef86UigjlUb8qVPvl.3b7pwQG', 3, 1, 1, '3131018033', '', 1637652031),
(30, 'Muhamad Aldena Agus Ramadan', 'muhamadaldenaagusramadan@gmail.com', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/img/profile/default.jpg', '$2y$10$GcPko0jfYpgWLWORQL/RWeis6pZd2mGf0AC0hBeiWz.cALRdZO5Eu', 3, 1, 1, '3131816280', '', 1637652076),
(31, 'Muhamad Jaki Abdullooh', 'muhamadjakiabdullooh@gmail.com', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/img/profile/default.jpg', '$2y$10$qEYeJ3ZjIx9zAdFPcpPfEeuxOfcnEZyEfzsM7KW6cXzX5eXoPT5lS', 3, 1, 1, '3139336011', '', 1637652111),
(32, 'Athaya Putri Salsabil ', 'athayaputrisalsabil@gmail.com', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/img/profile/default.jpg', '$2y$10$zFh5cayhgADMskEmPq4u2.Dt5PITtWjS78LLfQw71mNy4W5vXjgKe', 3, 1, 2, '0131971579', '', 1637652172),
(33, 'Azkia Labibah', 'azkialabibah@gmail.com', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/img/profile/default.jpg', '$2y$10$QDvouy5Kla77.EY5y8XAmuJdT1rmoXizGYJNiDuFbm3TAExmrcxFG', 3, 1, 2, '3140890703', '', 1637652208),
(34, 'Dimas Airlangga Gunawan', 'dimasairlanggagunawan@gmail.com', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/img/profile/default.jpg', '$2y$10$WFv2/o69XUf22EUmyVvsse0FmyxSDbzolPrsZqjnt7sKm3MoK8/Ti', 3, 1, 2, '3137082163', '', 1637652244),
(35, 'Kirei Hana Zaida', 'kireihanazaida@gmail.com', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/img/profile/default.jpg', '$2y$10$teE7.Ey33moxJVbDHmWKaeVhFMm3nP9LUVcar0f4cEDE4xNpmk66W', 3, 1, 2, '3143937912', '', 1637652281),
(36, 'Lulu Nurfauziah', 'lulunurfauziah@gmail.com', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/img/profile/default.jpg', '$2y$10$dc.ly0cXhNlNdgbr73pX3u3s.5ubrYruNLW2vY7lxbzTgT5mi/CRy', 3, 1, 2, '3146280190', '', 1637652326),
(37, 'Maryam Fitri Fhadilah', 'maryamfitrifhadilah@gmail.com', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/img/profile/default.jpg', '$2y$10$TLHZmm9BZolAss4LD7mpce7GI2TaWqkHiipxt0SRrSq6sWIeRvT2G', 3, 1, 2, '3137511020', '', 1637652387),
(38, 'Mikko Adlan Al Tamis', 'mikkoadlanaltamis@gmail.com', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/img/profile/default.jpg', '$2y$10$fzmD5H/tatH6omFazLUz2.QXszdESJsw8nNLlBgmJ1nayd/aU5CgO', 3, 1, 2, '3143116265', '', 1637652426),
(39, 'Muhamad Adam', 'muhamadadam@gmail.com', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/img/profile/default.jpg', '$2y$10$6ERCrbAR.r0z1G7DpaOo.eK17Nzhkb22tfofmD6M9aDZo3r/HWSdO', 3, 1, 2, '3137064943', '', 1637652455),
(40, 'Muhamad Ferdiansyah', 'muhamadferdiansyah@gmail.com', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/img/profile/default.jpg', '$2y$10$0a7mcGyFnlhZXCB9w4WSdui2mfoULVfd2elU01hw0X60zv2OHfbee', 3, 1, 2, '3143525961', '', 1637652517),
(41, 'Muhamad Padil Aldian', 'muhamadpadilaldian@gmail.com', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/img/profile/default.jpg', '$2y$10$Kf2S9TwRWoDBVy6Ei2yFFeYrodIe4.4.86YuwTkCs6Bb8D7fXVEQe', 3, 1, 2, '3134845600', '', 1637652548),
(42, 'Adbdulloh Annis', 'adbdullohannis@gmail.com', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/img/profile/default.jpg', '$2y$10$y.O2vZ6L5sEmJazxow0rvOI7F94e5DKMpNyDbYKkt55vyLoeJZ1Xi', 3, 1, 3, '3126072321', '', 1637652590),
(43, 'Ai Nursiti', 'ainursiti@gmail.com', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/img/profile/default.jpg', '$2y$10$UZJEgGlViZ/R9mt9QkqCy.l2rwTvuM5AXnTN3x6JR97bRAe8begia', 3, 1, 3, '3125908165', '', 1637652621),
(44, 'Ainiya Hana Tsalitsa', 'ainiyahanatsalitsa@gmail.com', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/img/profile/default.jpg', '$2y$10$eD8a4au75KMjr6jEuPELteEDS.susrPIVtld2bBJiHSPydOWnddiK', 3, 1, 3, '3136332146', '', 1637652660),
(45, 'Anugrah Maulana', 'anugrahmaulana@gmail.com', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/img/profile/default.jpg', '$2y$10$uOOZpqxetYrLXlv5gTw.8enNEtCHO9nHYoI6j9pUfIS5cA3u0dTKy', 3, 1, 3, '0124920365', '', 1637652688),
(46, 'Ariel Maulana', 'arielmaulana@gmail.com', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/img/profile/default.jpg', '$2y$10$g5XtyUkTCoibFXvu4xBBBOB4uS7qI9vF469Y6QpJqRUmHX5H646NK', 3, 1, 3, '3129206567', '', 1637652721),
(47, 'Aurelia Queena Fidela', 'aureliaqueenafidela@gmail.com', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/img/profile/default.jpg', '$2y$10$06E4hXKo9YrFTi4TL5/ZEuc/onqS6ATe0grTc9ZwqUUPc/r.1KgzC', 3, 1, 3, '3139484078', '', 1637652747),
(48, 'Azzam Nazruloh', 'azzamnazruloh@gmail.com', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/img/profile/default.jpg', '$2y$10$GHsxzJl5flovuB20Mny6WeCmhkoHK6pjSiT8ZNxGEAqsRP6qytU2q', 3, 1, 3, '3121822545', '', 1637652778),
(49, 'Cucu Cuparna', 'cucucuparna@gmail.com', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/img/profile/default.jpg', '$2y$10$1rsqIxbC9bOggdKtp8AqfOGZa9am6DlHiQKLmKHen4qDVHl8eOqZW', 3, 1, 3, '3129206350', '', 1637652819),
(50, 'Davian Pratama Putra', 'davianpratamaputra@gmail.com', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/img/profile/default.jpg', '$2y$10$B8ir/TZSFIWm/1nfThurLuoDkH8hen3HuxnxUyLPe7R.NgOxFG4Oa', 3, 1, 3, '0122917340', '', 1637652852),
(51, 'Desti Anggraeni Putri Rosadi', 'destianggraeniputrirosadi@gmail.com', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/img/profile/default.jpg', '$2y$10$soBdhnO0xwG4.AA.hlqGT.0q6FMN.1XZKqjuSquhUMyTqbai2m5..', 3, 1, 3, '0124427917', '', 1637652903),
(52, 'Abdi Sukma Madani', 'abdisukmamadani@gmail.com', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/img/profile/default.jpg', '$2y$10$xKVm34/0qT5twHLSncPKwOPSmOo8KPJSVxGnrTp6TxFadlRcKIbEi', 3, 1, 4, '0114525413', '', 1637652962),
(53, 'Abim Misbah Haikal', 'abimmisbahhaikal@gmail.com', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/img/profile/default.jpg', '$2y$10$QAqrqWiO8XeVwikSSkJEy./yA9vmFwUkxIcBJK/Ibb3dDuANdi0Yu', 3, 1, 4, '0112816804', '', 1637652990),
(54, 'Ahmad Rizky Fauzan', 'ahmadrizkyfauzan@gmail.com', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/img/profile/default.jpg', '$2y$10$Us9bTdgbnrQrNMK42EjMgub5BfnWS7bzfAZ/Xr2uHgKpQFOUyhL0.', 3, 1, 4, '0113628731', '', 1637653020),
(55, 'Andini', 'andini@gmail.com', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/img/profile/default.jpg', '$2y$10$C46.EjGoelk4kyHshd9P1OJKzWbP6XSS9WYsmip93lVIK7T5h77hO', 3, 1, 4, '0112220722', '', 1637653048),
(56, 'Asep Aji', 'asepaji@gmail.com', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/img/profile/default.jpg', '$2y$10$Y3JGSj1RQnCbhRXV.qqiCOPPyrgHDRkZRw0i17.ZWBlAoDC30alCO', 3, 1, 4, '0112283051', '', 1637653070),
(57, 'Azmi Nur Tsania Assya\'bani', 'azminurtsaniaassyabani@gmail.com', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/img/profile/default.jpg', '$2y$10$cj1FtT7nu0KcN2vmzJmwfeEar78otTOM.WNKLkg2xTMpAM/iC/MDy', 3, 1, 4, '0114576121', '', 1637653103),
(58, 'Cici Astuti Nurjanah', 'ciciastutinurjanah@gmail.com', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/img/profile/default.jpg', '$2y$10$rReuauxTLPCT4u2cP05wHuiNJDBW2914cPOJaJPBxxttCOYx.feUC', 3, 1, 4, '0129668829', '', 1637653127),
(59, 'Cinta Nurmala Sari', 'cintanurmalasari@gmail.com', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/img/profile/default.jpg', '$2y$10$k9g4vqXv9UoHrkOTNlCHFulyb75y8jIjVay/cQ9V7qc23o428YG/O', 3, 1, 4, '0123573806', '', 1637653159),
(60, 'Dara Wulandari', 'darawulandari@gmail.com', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/img/profile/default.jpg', '$2y$10$64tORSjPGRSGa9FUfusBVORiRmNtX/HgthrKPN9dQv44VvZ6m2s6u', 3, 1, 4, '0113167575', '', 1637653187),
(61, 'Devandra Arya Saputra', 'devandraaryasaputra@gmail.com', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/img/profile/default.jpg', '$2y$10$T1NY.zcge3453B2hELY.AOJ/XPZRV5.iEMM9vo5iCgI02qrOWvmwW', 3, 1, 4, '3122897776', '', 1637653220),
(62, 'Agung Eka Nugraha', 'agungekanugraha@gmail.com', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/img/profile/default.jpg', '$2y$10$vcDSGYsdN6QGmyoUrfGA4eGgBSnzv3Ug.YgSbvi71q6bbTYJ6b/Mm', 3, 1, 5, '0108016679', '', 1637653259),
(63, 'Arham Rainanda Sabililhaq', 'arhamrainandasabililhaq@gmail.com', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/img/profile/default.jpg', '$2y$10$kQctrOVoocsmgnTPJIyZMe8W2543.9YNSWFD0mCjZdzJsap2a18T.', 3, 1, 5, '0105657237', '', 1637653285),
(64, 'Arini Dzakiyya Dwi Hamdani', 'arinidzakiyyadwihamdani@gmail.com', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/img/profile/default.jpg', '$2y$10$VKkd.gRytIo2ME9HD9Hj5eCk3XfHbDtM2tM/5LKfy0Axhy.3ZYZpm', 3, 1, 5, '0106799190', '', 1637653363),
(65, 'Astira Widara', 'astirawidara@gmail.com', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/img/profile/default.jpg', '$2y$10$GlnkRZTBtH.f3T2C0QGHye/rheGBovcArXym7s7K.FiAtNQWYn/9K', 3, 1, 5, '0108692951', '', 1637653385),
(66, 'Aura Nishfa Ramadhany', 'auranishfaramadhany@gmail.com', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/img/profile/default.jpg', '$2y$10$ANlWsg6U1ekT3t7adBzrHetMk/wUmg9XhfeM5XYzVg5VdrZCxsTAK', 3, 1, 5, '0117942886', '', 1637653533),
(67, 'Bagas Adhitya Gunawan', 'bagasadhityagunawan@gmail.com', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/img/profile/default.jpg', '$2y$10$wo4DMMNjse231OMqGyzs6ueprixNt7hGeThS5IhD6rceJcS8A3D/.', 3, 1, 5, '0106784412', '', 1637653641),
(68, 'Daffa Firmansyah', 'daffafirmansyah@gmail.com', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/img/profile/default.jpg', '$2y$10$tTFcSPDeB1IaCfu5BpwpMe90dBqxUkiHVSQ3Fh1PZ26e8throm9Ce', 3, 1, 5, '0096474919', '', 1637653668),
(69, 'Daffa Nadhir Ilham', 'daffanadhirilham@gmail.com', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/img/profile/default.jpg', '$2y$10$uhT/v/kmtDO.Pn3mXai8uOekeKqSRluajJlODqoV28GVsBWZtmlAG', 3, 1, 5, '0117622064', '', 1637654137),
(70, 'Danish Teguh Khawarizmi', 'danishteguhkhawarizmi@gmail.com', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/img/profile/default.jpg', '$2y$10$AcZ4O17Lw5RXa.I2kF6pVeRAV1L/dlXnP3P7359gglstauLVC6ivm', 3, 1, 5, '0119189463', '', 1637657337),
(71, 'Davin Pebrian Putra', 'davinpebrianputra@gmail.com', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/img/profile/default.jpg', '$2y$10$wdQfhf6UgPdwZpUdu5Uecus0jI4ckf6TGIXK9ZUI9iMVUw1wkt0cm', 3, 1, 5, '0114079592', '', 1637657363),
(72, 'Adi Irvan Nurdiansyah', 'adiirvannurdiansyah@gmail.com', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/img/profile/default.jpg', '$2y$10$4dauE23Kw.UidBg0lcLLS.oGJ/p4AP/2673TxX3mnCAjGUv65f0Fe', 3, 1, 6, '0099889884', '', 1637657591),
(73, 'Adi Nur Saputra', 'adinursaputra@gmail.com', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/img/profile/default.jpg', '$2y$10$LIL.kbBpaud5mO4BY.Z0u.ZLJ8qOOeKa3X04XtU5Oq6AwbcidxWZa', 3, 1, 6, '0094605254', '', 1637657619),
(74, 'Aditya Pratama', 'adityapratama@gmail.com', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/img/profile/default.jpg', '$2y$10$dOmaqx6usY/iJkjQ2H/OBuIb92lF.JDHyv2a2rSbDkpCeG8rSinia', 3, 1, 6, '0108188398', '', 1637657642),
(75, 'Akbar Assidiq', 'akbarassidiq@gmail.com', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/img/profile/default.jpg', '$2y$10$595Glmr9U2aYSoAvrSl7Wu6tLGKZPSxO24vF/OVY1OqVU2lEpIi/q', 3, 1, 6, '0103742263', '', 1637657663),
(76, 'Alia Ayu Hanifa', 'aliaayuhanifa@gmail.com', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/img/profile/default.jpg', '$2y$10$3/kZvMaltQYSRtvyM.lzsO07B3AiYINF4V79OFdgmQ8SwwuWSnAJy', 3, 1, 6, '0091375002', '', 1637657686),
(77, 'Alpian Hadi', 'alpianhadi@gmail.com', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/img/profile/default.jpg', '$2y$10$JWA7oOy0VYEsQEMN4SesuOpND9PQneXFV3C5Pm1qXsvF0c1Kccfhi', 3, 1, 6, '0103746704', '', 1637657724),
(78, 'Annisa Lutpiana Qolbi', 'annisalutpianaqolbi@gmail.com', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/img/profile/default.jpg', '$2y$10$XLtFHLJgaaO9EAfbcheDwu4VPtVdVgJFSXTSw.st0H5kVJM7tsKu.', 3, 1, 6, '0095767759', '', 1637657746),
(79, 'Ari Prahana', 'ariprahana@gmail.com', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/img/profile/default.jpg', '$2y$10$z8ps.qJiEoJ0Zyw7zB4eQeJDqspr0nG5Zx4Tyr0HoMhIs1DOuXvZC', 3, 1, 6, '0103502761', '', 1637657777),
(80, 'Arif Rahman Hakim', 'arifrahmanhakim@gmail.com', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/img/profile/default.jpg', '$2y$10$OSxFGtjOQD.P4h0VJOcOBOjz2d7DGgPaSh08mggpapTxz00BkU3zm', 3, 1, 6, '0103893579', '', 1637657798),
(81, 'Astri Nurhayati', 'astrinurhayati@gmail.com', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/img/profile/default.jpg', '$2y$10$9R4O6yn5QH4awFh0mj/u0u7ozl7uYvkJTEyfUfkXhJArN9Ru7GaRO', 3, 1, 6, '0104016140', '', 1637657848),
(82, 'Aas Siti Fatimah', 'aassitifatimah@gmail.com', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/img/profile/default.jpg', '$2y$10$imGwKOd57HPonHE0UN89o.dfkxtnERcgOIqWLZPEzzNIUzdZdiVLK', 3, 1, 7, '0091375682', '', 1637657927),
(83, 'Aiesha Humaira Gusmardi', 'aieshahumairagusmardi@gmail.com', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/img/profile/default.jpg', '$2y$10$Eqwikwpf3AxRUy0nXyEU8OfYwhCUjBqdT76OVOKyshhqj2dUfP/3C', 3, 1, 7, '0099017244', '', 1637657950),
(84, 'Ailani Zul Adha', 'ailanizuladha@gmail.com', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/img/profile/default.jpg', '$2y$10$wuixopXZLZoBokuHBIx2Be/Kc9iWhXZBWVlZg.7AZjmeAh/16q84.', 3, 1, 7, '0082928317', '', 1637657975),
(85, 'Amira Hasna Najibah', 'amirahasnanajibah@gmail.com', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/img/profile/default.jpg', '$2y$10$qPr9.ROuDxn.p5ZalcaTHOQAcJhqi/TLZ6pZ5n1sGUUlo7ot/wijC', 3, 1, 7, '0081399663', '', 1637658033),
(86, 'Arni Hera Khumaera', 'arniherakhumaera@gmail.com', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/img/profile/default.jpg', '$2y$10$kH7EL7U.DczCGJXS7QOMju40c2C7ijA/sdg6KI/yfGJjv6Sr7rIuy', 3, 1, 7, '0097441060', '', 1637658058),
(87, 'Asti Feby Febrianti', 'astifebyfebrianti@gmail.com', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/img/profile/default.jpg', '$2y$10$ghpJrEDz57dIOPKWHnNoouoHkXMdyLJbe9ugYu6w.3njQgRX5CSQq', 3, 1, 7, '0093205441', '', 1637658084),
(88, 'Bobi Saputra', 'bobisaputra@gmail.com', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/img/profile/default.jpg', '$2y$10$jM82kwx6cKeciA9CMbuoy.NnG2st47DmybhNW4K5rhAYQda0OkH1.', 3, 1, 7, '0095978211', '', 1637658111),
(89, 'Denis Agustian Pirdaus', 'denisagustianpirdaus@gmail.com', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/img/profile/default.jpg', '$2y$10$p7pZlQs07e5Jxrr7iDS3h.lf15mAVIp/M7FUXZUQa8.dVeGcHrqbS', 3, 1, 7, '0081307737', '', 1637658163),
(90, 'Dika Waluyo Saputra', 'dikawaluyosaputra@gmail.com', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/img/profile/default.jpg', '$2y$10$6gOkapW5Kmnkl5E5gHjxcO7Fya1j3RxqlcsM0V.Ih6DbDL4daD/kq', 3, 1, 7, '0086421266', '', 1637658186),
(91, 'Dini Dwi Aprilian', 'dinidwiaprilian@gmail.com', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/img/profile/default.jpg', '$2y$10$XpxyB6wXEAj/yOerz.QGNOnHtU8GuGrFf/72hB4rRnfTUeoUYPPEG', 3, 1, 7, '0091682919', '', 1637658212),
(97, 'Dicky Febrian Dwiputra', 'febriandwiputra@gmail.com', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/img/profile/default.jpg', '$2y$10$hLUa2b9M.f0TQFBirIcRSueEuFZs/GnfczXrU3TE/gC3SKGwgvLC6', 2, 1, 7, '1234567897878987', 'Guru Kelas', 1637742359),
(99, 'Dicky Febrian Dwiputra', 'febriandwi@gmail.com', 'http://localhost/KP_VLE_SDN-KOPO-01/assets/img/profile/default.jpg', '$2y$10$XAhomil/nF/zOHEM8lCNP.Lo2nKJltG.0xTH1T2YRicyey1D.pB.S', 3, 1, 7, '9991878787', '', 1637742465);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unik` (`tingkat`,`rombel`,`tahun`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `kuis`
--
ALTER TABLE `kuis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `nilai_kuis`
--
ALTER TABLE `nilai_kuis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `nilai_penugasan`
--
ALTER TABLE `nilai_penugasan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `penugasan`
--
ALTER TABLE `penugasan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `soal_essay`
--
ALTER TABLE `soal_essay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `soal_pg`
--
ALTER TABLE `soal_pg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `status_kuis`
--
ALTER TABLE `status_kuis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `status_tugas`
--
ALTER TABLE `status_tugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `tema`
--
ALTER TABLE `tema`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

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
