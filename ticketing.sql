-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2021 at 01:03 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ticketing`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_ticket`
--

CREATE TABLE `tb_ticket` (
  `id_ticket` int(11) NOT NULL,
  `id_requestor` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `judul_ticket` varchar(100) NOT NULL,
  `keterangan_ticket` text NOT NULL,
  `level_ticket` enum('1','2','3') NOT NULL COMMENT '1=low,2=medium,3=high',
  `status_ticket` enum('1','2','3','4') NOT NULL COMMENT '1=Requested,2=Progress,3=Completed,4=Cancelled',
  `tgl_buat` datetime NOT NULL,
  `tgl_proses` datetime DEFAULT NULL,
  `tgl_selesai` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ticket`
--

INSERT INTO `tb_ticket` (`id_ticket`, `id_requestor`, `id_user`, `judul_ticket`, `keterangan_ticket`, `level_ticket`, `status_ticket`, `tgl_buat`, `tgl_proses`, `tgl_selesai`) VALUES
(1, 4, 5, 'Testing', 'sdfsdfsdfsdfsfdsdf', '1', '3', '2021-09-19 11:22:30', '2021-09-19 15:48:01', '2021-09-19 15:56:37'),
(2, 4, 1, 'Lorem Ipsum Testing', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris ullamcorper finibus luctus. Aliquam fringilla, velit a mattis mattis, neque ante tempor sapien, at malesuada augue ipsum id diam. Duis quis magna nec nisl efficitur tempus a at diam. Ut sed nulla ante. Sed malesuada ultricies metus, vel pulvinar purus imperdiet ut. Curabitur ultrices imperdiet ante, in pellentesque lorem viverra sit amet. Quisque tempor risus mauris, consectetur cursus tellus cursus a. Suspendisse potenti. Nunc vitae eleifend lorem. Nullam sagittis tellus ut massa maximus, eget interdum sapien fermentum. Aliquam ex magna, egestas ut metus in, eleifend iaculis urna.', '2', '2', '2021-09-19 16:33:44', '2021-09-19 16:35:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `departemen` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `level` enum('1','2','3') NOT NULL COMMENT '1=Admin,2=Manager,3=User',
  `tgl_buat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `nama_lengkap`, `departemen`, `email`, `level`, `tgl_buat`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500', 'Administrator', 'Information Technology', 'admin@admin.com', '1', '2021-09-19'),
(4, 'rico', '17f53b55ba7e8e3d703b04c4f391fec1', 'Rico Jetvendra', 'Marketing', 'ricojetvendra@gmail.com', '3', '2021-09-19'),
(5, 'felix', '89da7a2c2e5da1656f1fea20b2279ef0', 'Felic Kjelberg', 'General Affair', 'felix@gmail.com', '1', '2021-09-19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_ticket`
--
ALTER TABLE `tb_ticket`
  ADD PRIMARY KEY (`id_ticket`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_ticket`
--
ALTER TABLE `tb_ticket`
  MODIFY `id_ticket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
