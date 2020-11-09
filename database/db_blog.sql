-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2020 at 03:26 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idadmin` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idadmin`, `nama`, `email`, `password`) VALUES
(1, 'Admin Satu', 'admin1@test.com', 'e00cf25ad42683b3df678c61f42c6bda'),
(2, 'Admin Dua', 'admin2@test.com', 'c84258e9c39059a89ab77d846ddab909'),
(3, 'Admin Tiga', 'admin3@test.com', '32cacb2f994f6b42183a1300d9a3e8d6');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `idkategori` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`idkategori`, `nama`) VALUES
(1, 'Kategori A'),
(2, 'Kategori B'),
(3, 'Kategori C');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `idkomentar` int(11) NOT NULL,
  `idpost` int(11) NOT NULL,
  `idpenulis` int(11) NOT NULL,
  `isi` text NOT NULL,
  `tgl_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`idkomentar`, `idpost`, `idpenulis`, `isi`, `tgl_update`) VALUES
(1, 1, 2, 'Good job, man!', '2020-10-14 00:00:00'),
(2, 2, 1, 'Mantap betul.', '2020-10-19 00:00:00'),
(3, 3, 3, 'Sangat menarik.', '2020-10-19 00:00:00'),
(4, 4, 2, 'Nice info.', '2020-10-06 00:00:00'),
(5, 5, 3, 'Kurang jelas informasinya.', '2020-10-20 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `penulis`
--

CREATE TABLE `penulis` (
  `idpenulis` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penulis`
--

INSERT INTO `penulis` (`idpenulis`, `nama`, `password`, `alamat`, `kota`, `email`, `no_telp`) VALUES
(1, 'Penulis Satu', 'ff762fa3a84cd363a493b85216b7fe27', 'Jl. Mawar No. 1', 'Semarang', 'penulis1@test.com', '081234567891'),
(2, 'Penulis Dua', 'b8e21b510dc1a6c80d1ce2f27da69e56', 'Jl. Melati No. 2', 'Yogyakarta', 'penulis2@test.com', '082134567892'),
(3, 'Penulis Tiga', '22649f86c63de64abc99b174ffb9df0a', 'Jl. Anggrek No. 3', 'Palembang', 'penulis3@test.com', '083124567893');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `idpost` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `idkategori` int(11) NOT NULL,
  `isi_post` longtext NOT NULL,
  `file_gambar` varchar(100) NOT NULL,
  `tgl_insert` datetime NOT NULL,
  `tgl_update` datetime NOT NULL,
  `idpenulis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`idpost`, `judul`, `idkategori`, `isi_post`, `file_gambar`, `tgl_insert`, `tgl_update`, `idpenulis`) VALUES
(1, 'Kucing', 1, 'Kucing disebut juga kucing domestik atau kucing rumah adalah sejenis mamalia karnivora dari keluarga Felidae. Kata \"kucing\" biasanya merujuk kepada \"kucing\" yang telah dijinakkan, tetapi bisa juga merujuk kepada \"kucing besar\" seperti singa dan harimau.', 'kucing.jpg', '2020-10-05 00:00:00', '2020-10-24 19:41:29', 1),
(2, 'Anjing', 2, 'Anjing adalah mamalia yang telah mengalami domestikasi dari serigala sejak 15.000 tahun yang lalu, bahkan kemungkinan sudah sejak 100.000 tahun yang lalu berdasarkan bukti genetik berupa penemuan fosil dan tes DNA. Penelitian lain mengungkap sejarah domestikasi anjing yang belum begitu lama.', 'anjing.jpg', '2020-10-08 00:00:00', '2020-10-24 19:41:37', 2),
(3, 'Kelinci', 3, 'Kelinci adalah hewan mamalia dari famili Leporidae, yang dapat ditemukan di banyak bagian bumi. Kelinci berkembangbiak dengan cara beranak yang disebut vivipar. Dulunya, hewan ini adalah hewan liar yang hidup di Afrika hingga ke daratan Eropa.', 'kelinci.jpg', '2020-10-01 00:00:00', '2020-10-24 19:41:45', 3),
(4, 'Kuda', 1, 'Kuda adalah salah satu dari sepuluh spesies modern mamalia dari genus Equus. Hewan ini telah lama merupakan salah satu hewan peliharaan yang penting secara ekonomis dan historis, dan telah memegang peranan penting dalam pengangkutan orang dan barang selama ribuan tahun.', 'kuda.jpg', '2020-10-06 00:00:00', '2020-10-24 19:41:52', 3),
(5, 'Ular', 3, 'Ular adalah kelompok reptilia tidak berkaki dan bertubuh panjang yang tersebar luas di dunia. Secara ilmiah, semua jenis ular dikelompokkan dalam satu subordo, yaitu Serpentes dan juga merupakan anggota dari ordo Squamata, bersama-sama dengan kadal.', 'ular.jpg', '2020-10-11 00:00:00', '2020-10-24 20:13:18', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`idkategori`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`idkomentar`),
  ADD KEY `idpenulis` (`idpenulis`),
  ADD KEY `idpost` (`idpost`);

--
-- Indexes for table `penulis`
--
ALTER TABLE `penulis`
  ADD PRIMARY KEY (`idpenulis`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`idpost`),
  ADD KEY `idkategori` (`idkategori`),
  ADD KEY `idpenulis` (`idpenulis`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `idkategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `idkomentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `penulis`
--
ALTER TABLE `penulis`
  MODIFY `idpenulis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `idpost` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`idpenulis`) REFERENCES `penulis` (`idpenulis`),
  ADD CONSTRAINT `komentar_ibfk_2` FOREIGN KEY (`idpost`) REFERENCES `post` (`idpost`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`idkategori`) REFERENCES `kategori` (`idkategori`),
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`idpenulis`) REFERENCES `penulis` (`idpenulis`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
