-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2022 at 05:35 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skpm_hunter`
--

-- --------------------------------------------------------

--
-- Table structure for table `absen`
--

CREATE TABLE `absen` (
  `ID_ABSEN` int(20) NOT NULL,
  `NISN` varchar(20) COLLATE latin1_general_cs DEFAULT NULL,
  `ID_MAPEL` varchar(20) COLLATE latin1_general_cs DEFAULT NULL,
  `TANGGAL_ABSEN` date DEFAULT NULL,
  `KETERANGAN` varchar(20) COLLATE latin1_general_cs DEFAULT NULL,
  `ID_SEMESTER` varchar(20) COLLATE latin1_general_cs NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `absen`
--

INSERT INTO `absen` (`ID_ABSEN`, `NISN`, `ID_MAPEL`, `TANGGAL_ABSEN`, `KETERANGAN`, `ID_SEMESTER`) VALUES
(181, '0017865000', 'BINDO-7', '2022-10-13', 'HADIR', 'GANJIL2022/2023'),
(182, '0027865000', 'BINDO-7', '2022-10-13', 'HADIR', 'GANJIL2022/2023'),
(183, '0037865000', 'BINDO-7', '2022-10-13', 'HADIR', 'GANJIL2022/2023'),
(184, '0047865000', 'BINDO-7', '2022-10-13', 'HADIR', 'GANJIL2022/2023'),
(185, '0057865000', 'BINDO-7', '2022-10-13', 'HADIR', 'GANJIL2022/2023'),
(186, '0067865000', 'BINDO-7', '2022-10-13', 'HADIR', 'GANJIL2022/2023'),
(187, '0077865000', 'BINDO-7', '2022-10-13', 'HADIR', 'GANJIL2022/2023'),
(188, '0087865000', 'BINDO-7', '2022-10-13', 'HADIR', 'GANJIL2022/2023'),
(189, '0097865000', 'BINDO-7', '2022-10-13', 'HADIR', 'GANJIL2022/2023'),
(190, '0107865000', 'BINDO-7', '2022-10-13', 'HADIR', 'GANJIL2022/2023'),
(191, '0017865000', 'BINDO-7', '2022-10-05', 'HADIR', 'GANJIL2022/2023'),
(192, '0027865000', 'BINDO-7', '2022-10-05', 'HADIR', 'GANJIL2022/2023'),
(193, '0037865000', 'BINDO-7', '2022-10-05', 'HADIR', 'GANJIL2022/2023'),
(194, '0047865000', 'BINDO-7', '2022-10-05', 'HADIR', 'GANJIL2022/2023'),
(195, '0057865000', 'BINDO-7', '2022-10-05', 'HADIR', 'GANJIL2022/2023'),
(196, '0067865000', 'BINDO-7', '2022-10-05', 'HADIR', 'GANJIL2022/2023'),
(197, '0077865000', 'BINDO-7', '2022-10-05', 'HADIR', 'GANJIL2022/2023'),
(198, '0087865000', 'BINDO-7', '2022-10-05', 'HADIR', 'GANJIL2022/2023'),
(199, '0097865000', 'BINDO-7', '2022-10-05', 'HADIR', 'GANJIL2022/2023'),
(200, '0107865000', 'BINDO-7', '2022-10-05', 'HADIR', 'GANJIL2022/2023');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID_ADMIN` varchar(20) COLLATE latin1_general_cs NOT NULL,
  `USERNAME` varchar(20) COLLATE latin1_general_cs DEFAULT NULL,
  `PASSWORD` varchar(20) COLLATE latin1_general_cs DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID_ADMIN`, `USERNAME`, `PASSWORD`) VALUES
('001', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `belajar`
--

CREATE TABLE `belajar` (
  `ID_KELAS` varchar(20) COLLATE latin1_general_cs NOT NULL,
  `ID_MAPEL` varchar(20) COLLATE latin1_general_cs NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `belajar`
--

INSERT INTO `belajar` (`ID_KELAS`, `ID_MAPEL`) VALUES
('7A', 'BINDO-7'),
('7A', 'BING-7'),
('7A', 'MTK-7'),
('7B', 'BINDO-7'),
('7B', 'BING-7'),
('7B', 'MTK-7'),
('8A', 'BINDO-8'),
('8A', 'BING-8'),
('8A', 'MTK-8'),
('8B', 'BINDO-8'),
('8B', 'BING-8'),
('8B', 'MTK-8'),
('9A', 'BINDO-9'),
('9A', 'BING-9'),
('9A', 'MTK-9'),
('9B', 'BINDO-9'),
('9B', 'BING-9'),
('9B', 'MTK-9');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `ID_GURU` varchar(20) COLLATE latin1_general_cs NOT NULL,
  `ID_ADMIN` varchar(20) COLLATE latin1_general_cs DEFAULT NULL,
  `USERNAME_GURU` varchar(20) COLLATE latin1_general_cs DEFAULT NULL,
  `PASSWORD_GURU` varchar(20) COLLATE latin1_general_cs DEFAULT NULL,
  `NAMA_GURU` longtext COLLATE latin1_general_cs DEFAULT NULL,
  `JK_GURU` char(1) COLLATE latin1_general_cs DEFAULT NULL,
  `HP_GURU` decimal(13,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`ID_GURU`, `ID_ADMIN`, `USERNAME_GURU`, `PASSWORD_GURU`, `NAMA_GURU`, `JK_GURU`, `HP_GURU`) VALUES
('G1', '001', 'yesi', 'yesi123', 'Yesi Fatrina', 'P', '81256783456'),
('G2', '001', 'antonius', 'antonius123', 'Antonius Suliyanto', 'L', '81256786547'),
('G3', '001', 'abu', 'abu123', 'Abu Darim', 'L', '81256543240');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `ID_KELAS` varchar(20) COLLATE latin1_general_cs NOT NULL,
  `ID_ADMIN` varchar(20) COLLATE latin1_general_cs DEFAULT NULL,
  `KELAS` varchar(6) COLLATE latin1_general_cs DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`ID_KELAS`, `ID_ADMIN`, `KELAS`) VALUES
('7A', '001', 'VII-A'),
('7B', '001', 'VII-B'),
('8A', '001', 'VIII-A'),
('8B', '001', 'VIII-B'),
('9A', '001', 'XI-A'),
('9B', '001', 'XI-B');

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `ID_MAPEL` varchar(20) COLLATE latin1_general_cs NOT NULL,
  `ID_GURU` varchar(20) COLLATE latin1_general_cs DEFAULT NULL,
  `ID_ADMIN` varchar(20) COLLATE latin1_general_cs DEFAULT NULL,
  `MAPEL` varchar(20) COLLATE latin1_general_cs DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`ID_MAPEL`, `ID_GURU`, `ID_ADMIN`, `MAPEL`) VALUES
('BINDO-7', 'G1', '001', 'B.INDONESIA VII'),
('BINDO-8', 'G1', '001', 'B.INDONESIA VIII'),
('BINDO-9', 'G1', '001', 'B.INDONESIA IX'),
('BING-7', 'G2', '001', 'B.INGGRIS VII'),
('BING-8', 'G2', '001', 'B.INGGRIS VIII'),
('BING-9', 'G2', '001', 'B.INGGRIS XI'),
('MTK-7', 'G3', '001', 'MATEMATIKA VII'),
('MTK-8', 'G3', '001', 'MATEMATIKA VIII'),
('MTK-9', 'G3', '001', 'MATEMATIKA IX');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `ID_NILAI` int(20) NOT NULL,
  `ID_SEMESTER` varchar(20) COLLATE latin1_general_cs NOT NULL,
  `ID_MAPEL` varchar(20) COLLATE latin1_general_cs DEFAULT NULL,
  `NISN` varchar(20) COLLATE latin1_general_cs DEFAULT NULL,
  `NILAI` decimal(3,0) DEFAULT NULL,
  `JENIS` varchar(12) COLLATE latin1_general_cs DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`ID_NILAI`, `ID_SEMESTER`, `ID_MAPEL`, `NISN`, `NILAI`, `JENIS`) VALUES
(23, 'GANJIL2022/2023', 'BINDO-7', '0017865000', '1', 'PENGETAHUAN'),
(24, 'GANJIL2022/2023', 'BINDO-7', '0027865000', '1', 'PENGETAHUAN'),
(25, 'GANJIL2022/2023', 'BINDO-7', '0037865000', '1', 'PENGETAHUAN'),
(26, 'GANJIL2022/2023', 'BINDO-7', '0047865000', '1', 'PENGETAHUAN'),
(27, 'GANJIL2022/2023', 'BINDO-7', '0057865000', '1', 'PENGETAHUAN'),
(28, 'GANJIL2022/2023', 'BINDO-7', '0067865000', '1', 'PENGETAHUAN'),
(29, 'GANJIL2022/2023', 'BINDO-7', '0077865000', '1', 'PENGETAHUAN'),
(30, 'GANJIL2022/2023', 'BINDO-7', '0087865000', '1', 'PENGETAHUAN'),
(31, 'GANJIL2022/2023', 'BINDO-7', '0097865000', '1', 'PENGETAHUAN'),
(32, 'GANJIL2022/2023', 'BINDO-7', '0107865000', '1', 'PENGETAHUAN'),
(33, 'GANJIL2022/2023', 'BINDO-7', '0017865000', '1', 'KETERAMPILAN'),
(34, 'GANJIL2022/2023', 'BINDO-7', '0027865000', '0', 'KETERAMPILAN'),
(35, 'GANJIL2022/2023', 'BINDO-7', '0037865000', '0', 'KETERAMPILAN'),
(36, 'GANJIL2022/2023', 'BINDO-7', '0047865000', '0', 'KETERAMPILAN'),
(37, 'GANJIL2022/2023', 'BINDO-7', '0057865000', '0', 'KETERAMPILAN'),
(38, 'GANJIL2022/2023', 'BINDO-7', '0067865000', '0', 'KETERAMPILAN'),
(39, 'GANJIL2022/2023', 'BINDO-7', '0077865000', '0', 'KETERAMPILAN'),
(40, 'GANJIL2022/2023', 'BINDO-7', '0087865000', '0', 'KETERAMPILAN'),
(41, 'GANJIL2022/2023', 'BINDO-7', '0097865000', '0', 'KETERAMPILAN'),
(42, 'GANJIL2022/2023', 'BINDO-7', '0107865000', '0', 'KETERAMPILAN');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `ID_SEMESTER` varchar(20) COLLATE latin1_general_cs NOT NULL,
  `ID_ADMIN` varchar(20) COLLATE latin1_general_cs DEFAULT NULL,
  `MASUKKAN_NILAI` tinyint(1) DEFAULT NULL,
  `MEMBAGI_RAPORT` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`ID_SEMESTER`, `ID_ADMIN`, `MASUKKAN_NILAI`, `MEMBAGI_RAPORT`) VALUES
('GANJIL2022/2023', NULL, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `NISN` varchar(20) COLLATE latin1_general_cs NOT NULL,
  `ID_KELAS` varchar(20) COLLATE latin1_general_cs DEFAULT NULL,
  `ID_ADMIN` varchar(20) COLLATE latin1_general_cs DEFAULT NULL,
  `USERNAME_SISWA` varchar(20) COLLATE latin1_general_cs DEFAULT NULL,
  `PASSWORD_SISWA` varchar(20) COLLATE latin1_general_cs DEFAULT NULL,
  `NAMA_SISWA` varchar(20) COLLATE latin1_general_cs DEFAULT NULL,
  `JK_SISWA` char(1) COLLATE latin1_general_cs DEFAULT NULL,
  `HP_SISWA` decimal(13,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`NISN`, `ID_KELAS`, `ID_ADMIN`, `USERNAME_SISWA`, `PASSWORD_SISWA`, `NAMA_SISWA`, `JK_SISWA`, `HP_SISWA`) VALUES
('0017865000', '7A', '001', 'ahmad', 'ahmad123', 'Ahmad Budianto', 'L', '85245789765'),
('0027865000', '7A', '001', 'raditya', 'raditya123', 'Raditya Hedi', 'L', '85245785498'),
('0037865000', '7A', '001', 'shofi', 'shofi123', 'Shofi Layuza', 'P', '85276889765'),
('0047865000', '7A', '001', 'siti', 'siti123', 'Siti Maulidia', 'P', '85254327665'),
('0057865000', '7A', '001', 'alfian', 'alfian123', 'Alfian Fajar', 'L', '85266749765'),
('0067865000', '7A', '001', 'ali', 'ali123', 'Ali Zainal', 'L', '8228889765'),
('0077865000', '7A', '001', 'asmi', 'asmi123', 'Asmi Izhaty', 'P', '85244876165'),
('0087865000', '7A', '001', 'diah', 'diah123', 'Diah Salma', 'P', '85245786655'),
('0097865000', '7A', '001', 'dian', 'dian123', 'Dian Lestari', 'P', '85245437788'),
('0107865000', '7A', '001', 'fara', 'fara123', 'Fara Novianti', 'P', '85247688265'),
('0117865000', '7B', '001', 'hasya', 'hasya123', 'Hasya Ratu', 'P', '85277779765'),
('0127865000', '7B', '001', 'joana', 'joana123', 'Joana Adrey', 'P', '81367785498'),
('0137865000', '7B', '001', 'rizky', 'rizky123', 'Rizky Naufal', 'L', '85278977765'),
('0147865000', '7B', '001', 'radja', 'radja123', 'Radja Danenra', 'L', '85254125465'),
('0157865000', '7B', '001', 'naura', 'naura123', 'Naura Fitri', 'P', '85266884765'),
('0167865000', '7B', '001', 'rahmad', 'rahmad123', 'Rahmad Tri', 'L', '8221289765'),
('0177865000', '7B', '001', 'revaldo', 'revaldo123', 'Revaldo Karlos', 'L', '85244871111'),
('0187865000', '7B', '001', 'dhea', 'dhea123', 'Dhea Renata', 'P', '85245456655'),
('0197865000', '7B', '001', 'fani', 'fani123', 'Fani Anggraini', 'P', '85245436722'),
('0207865000', '7B', '001', 'gracia', 'gracia123', 'Gracia Aurelia', 'P', '85247562815'),
('0217865000', '8A', '001', 'fajar', 'fajar123', 'Fajar Kurniawan', 'L', '85271111765'),
('0227865000', '8A', '001', 'siti', 'siti123', 'Siti Maulidia', 'P', '81368822228'),
('0237865000', '8A', '001', 'stefanus', 'stefanus123', 'Stefanus Novan', 'L', '85270055885'),
('0247865000', '8A', '001', 'ali', 'ali123', 'Ali Zainal', 'L', '85257866945'),
('0257865000', '8A', '001', 'asmi', 'asmi23', 'Asmi Izhaty', 'P', '85266112125'),
('0267865000', '8A', '001', 'cantika', 'cantika123', 'Cantika Putri', 'P', '8256569255'),
('0277865000', '8A', '001', 'rachma', 'rachma123', 'Rachma Dewi', 'L', '85246877811'),
('0287865000', '8A', '001', 'shafyra', 'shafyra123', 'Shafyra Irda', 'P', '85245890455'),
('0297865000', '8A', '001', 'alfaridzi', 'alfaridzi123', 'Alfaridzi Wiratama', 'L', '85261262722'),
('0307865000', '8A', '001', 'abdullah', 'abdullah123', 'Abdullah Rino', 'L', '85789762815'),
('0317865000', '8B', '001', 'amirah', 'amirah123', 'Amirah Nailah', 'P', '85271322365'),
('0327865000', '8B', '001', 'ananda', 'ananda123', 'Ananda Daniesha', 'P', '81675422228'),
('0337865000', '8B', '001', 'ananur', 'ananur123', 'Ananur Fadilah', 'P', '87855055885'),
('0347865000', '8B', '001', 'brilliant', 'brilliant123', 'Brilliant Yusuf', 'L', '85157566945'),
('0357865000', '8B', '001', 'cornelius', 'cornelius23', 'Cornelius Ardiyanto', 'P', '85267799125'),
('0367865000', '8B', '001', 'daffa', 'daffa123', 'Daffa Mada', 'L', '82500007255'),
('0377865000', '8B', '001', 'eka', 'eka123', 'Eka Ayu', 'P', '85243312811'),
('0387865000', '8B', '001', 'elisya', 'elisya123', 'Elisya Auliya', 'P', '85249056455'),
('0397865000', '8B', '001', 'erikha', 'erikha123', 'Erikha Talitha', 'P', '85277092722'),
('0407865000', '8B', '001', 'firman', 'firman123', 'Firman Ilham', 'L', '85789157415'),
('0417865000', '9A', '001', 'fitria', 'fitria123', 'Fitria Arifah', 'P', '85275576365'),
('0427865000', '9A', '001', 'ida', 'ida123', 'Ida Bagus', 'P', '81672365228'),
('0437865000', '9A', '001', 'intan', 'intan123', 'Intan Nur', 'P', '87855089005'),
('0447865000', '9A', '001', 'iqbal', 'iqbal123', 'Iqbal Zahy', 'L', '85157565115'),
('0457865000', '9A', '001', 'kusuma', 'kusuma123', 'Kusuma Dewi', 'P', '85267800125'),
('0467865000', '9A', '001', 'lydia', 'lydia123', 'Lydia Cahyaningtiyas', 'P', '82503557255'),
('0477865000', '9A', '001', 'mauzul', 'mauzul123', 'Mauzul Raauffi', 'L', '85248933811'),
('0487865000', '9A', '001', 'nasrina', 'nasrina123', 'Nasrina Salsabilla', 'P', '85249890055'),
('0497865000', '9A', '001', 'nisrina', 'nisrina123', 'Nisrina Tazkiya', 'P', '85245872722'),
('0507865000', '9A', '001', 'nofandie', 'nofandie123', 'Nofandie Pandoe', 'L', '85784487415'),
('0517865000', '9B', '001', 'nurlaila', 'nurlaila123', 'Nurlaila Putri', 'P', '85275545125'),
('0527865000', '9B', '001', 'oktavia', 'oktavia123', 'Oktavia Artikawati', 'P', '81679753228'),
('0537865000', '9B', '001', 'paksi', 'paksi123', 'Paksi Sakseno', 'L', '87859054005'),
('0547865000', '9B', '001', 'panggung', 'panggung123', 'Panggung Eka', 'L', '85157226615'),
('0557865000', '9B', '001', 'rizqa', 'rizqa123', 'Rizqa Zebina', 'P', '85285300125'),
('0567865000', '9B', '001', 'vika', 'vika123', 'Vika Intan', 'P', '82503554886'),
('0577865000', '9B', '001', 'vinny', 'vinny123', 'Vinny Riswara', 'P', '85248934982'),
('0587865000', '9B', '001', 'agraha', 'agraha123', 'Agraha Pudyas', 'L', '85249096555'),
('0597865000', '9B', '001', 'alviola', 'alviola123', 'Alviola Tri', 'L', '85245125522'),
('0607865000', '9B', '001', 'anjora', 'anjora123', 'Anjora Zefanya', 'L', '85789477415');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`ID_ABSEN`),
  ADD KEY `FK_ABSEN_MAPEL` (`ID_MAPEL`),
  ADD KEY `FK_MELAKUKAN_ABSEN` (`NISN`),
  ADD KEY `FK_ABSEN_SEMESTER` (`ID_SEMESTER`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID_ADMIN`);

--
-- Indexes for table `belajar`
--
ALTER TABLE `belajar`
  ADD PRIMARY KEY (`ID_KELAS`,`ID_MAPEL`),
  ADD KEY `FK_BELAJAR2` (`ID_MAPEL`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`ID_GURU`),
  ADD KEY `FK_MEMBUAT_AKUN_GURU` (`ID_ADMIN`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`ID_KELAS`),
  ADD KEY `FK_MENAMBAH_KELAS` (`ID_ADMIN`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`ID_MAPEL`),
  ADD KEY `FK_MENAMBAH_MAPEL` (`ID_ADMIN`),
  ADD KEY `FK_MENGAJAR` (`ID_GURU`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`ID_NILAI`),
  ADD KEY `FK_MEMILIKI` (`ID_SEMESTER`),
  ADD KEY `FK_MENDAPAT` (`NISN`),
  ADD KEY `FK_NILAI_MAPEL` (`ID_MAPEL`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`ID_SEMESTER`),
  ADD KEY `FK_MENGUBAH` (`ID_ADMIN`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`NISN`),
  ADD KEY `FK_MEMBUAT_AKUN_SISWA` (`ID_ADMIN`),
  ADD KEY `FK_TERDIRI_DARI` (`ID_KELAS`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absen`
--
ALTER TABLE `absen`
  MODIFY `ID_ABSEN` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `ID_NILAI` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absen`
--
ALTER TABLE `absen`
  ADD CONSTRAINT `FK_ABSEN_MAPEL` FOREIGN KEY (`ID_MAPEL`) REFERENCES `mapel` (`ID_MAPEL`),
  ADD CONSTRAINT `FK_ABSEN_SEMESTER` FOREIGN KEY (`ID_SEMESTER`) REFERENCES `semester` (`ID_SEMESTER`),
  ADD CONSTRAINT `FK_MELAKUKAN_ABSEN` FOREIGN KEY (`NISN`) REFERENCES `siswa` (`NISN`);

--
-- Constraints for table `belajar`
--
ALTER TABLE `belajar`
  ADD CONSTRAINT `FK_BELAJAR` FOREIGN KEY (`ID_KELAS`) REFERENCES `kelas` (`ID_KELAS`),
  ADD CONSTRAINT `FK_BELAJAR2` FOREIGN KEY (`ID_MAPEL`) REFERENCES `mapel` (`ID_MAPEL`);

--
-- Constraints for table `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `FK_MEMBUAT_AKUN_GURU` FOREIGN KEY (`ID_ADMIN`) REFERENCES `admin` (`ID_ADMIN`);

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `FK_MENAMBAH_KELAS` FOREIGN KEY (`ID_ADMIN`) REFERENCES `admin` (`ID_ADMIN`);

--
-- Constraints for table `mapel`
--
ALTER TABLE `mapel`
  ADD CONSTRAINT `FK_MENAMBAH_MAPEL` FOREIGN KEY (`ID_ADMIN`) REFERENCES `admin` (`ID_ADMIN`),
  ADD CONSTRAINT `FK_MENGAJAR` FOREIGN KEY (`ID_GURU`) REFERENCES `guru` (`ID_GURU`);

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `FK_MEMILIKI` FOREIGN KEY (`ID_SEMESTER`) REFERENCES `semester` (`ID_SEMESTER`),
  ADD CONSTRAINT `FK_MENDAPAT` FOREIGN KEY (`NISN`) REFERENCES `siswa` (`NISN`),
  ADD CONSTRAINT `FK_NILAI_MAPEL` FOREIGN KEY (`ID_MAPEL`) REFERENCES `mapel` (`ID_MAPEL`);

--
-- Constraints for table `semester`
--
ALTER TABLE `semester`
  ADD CONSTRAINT `FK_MENGUBAH` FOREIGN KEY (`ID_ADMIN`) REFERENCES `admin` (`ID_ADMIN`);

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `FK_MEMBUAT_AKUN_SISWA` FOREIGN KEY (`ID_ADMIN`) REFERENCES `admin` (`ID_ADMIN`),
  ADD CONSTRAINT `FK_TERDIRI_DARI` FOREIGN KEY (`ID_KELAS`) REFERENCES `kelas` (`ID_KELAS`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
