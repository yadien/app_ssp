-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2014 at 05:53 AM
-- Server version: 5.5.34
-- PHP Version: 5.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbssp`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_info`
--

CREATE TABLE IF NOT EXISTS `tbl_info` (
  `infoid` int(4) NOT NULL AUTO_INCREMENT,
  `judul` varchar(250) NOT NULL,
  `informasi` text NOT NULL,
  PRIMARY KEY (`infoid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jp`
--

CREATE TABLE IF NOT EXISTS `tbl_jp` (
  `jpid` int(4) NOT NULL AUTO_INCREMENT,
  `kd_akun` varchar(7) NOT NULL,
  `kd_jenis` varchar(3) NOT NULL,
  `nm_jenis` varchar(25) NOT NULL,
  `ket` varchar(125) NOT NULL,
  PRIMARY KEY (`jpid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kegiatan`
--

CREATE TABLE IF NOT EXISTS `tbl_kegiatan` (
  `kegiatanid` int(4) NOT NULL AUTO_INCREMENT,
  `nama_kegiatan` varchar(350) NOT NULL,
  `nilai` int(15) NOT NULL,
  PRIMARY KEY (`kegiatanid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE IF NOT EXISTS `tbl_login` (
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `nama_pengguna` varchar(25) NOT NULL,
  `level` varchar(10) NOT NULL,
  `status` enum('ACTIVE','INACTIVE') NOT NULL DEFAULT 'ACTIVE'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`username`, `password`, `nama_pengguna`, `level`, `status`) VALUES
('admin', 'admin', 'administrator', 'ADMIN', 'ACTIVE'),
('adin', 'adin', 'adin pai', 'ADMIN', 'ACTIVE'),
('ali', 'ali', 'ali amakusa', 'USER', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pejabat`
--

CREATE TABLE IF NOT EXISTS `tbl_pejabat` (
  `pejabatid` int(4) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `eselon` varchar(12) NOT NULL,
  PRIMARY KEY (`pejabatid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pp`
--

CREATE TABLE IF NOT EXISTS `tbl_pp` (
  `ppid` int(4) NOT NULL AUTO_INCREMENT,
  `nama` varchar(25) NOT NULL,
  `npwp` varchar(25) NOT NULL,
  `alamat` text NOT NULL,
  `tlp` varchar(25) NOT NULL,
  PRIMARY KEY (`ppid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi`
--

CREATE TABLE IF NOT EXISTS `tbl_transaksi` (
  `kode_tr` int(4) NOT NULL,
  `masa_p` int(2) NOT NULL,
  `tahun_p` year(4) NOT NULL,
  `wpid` int(4) NOT NULL,
  `jpid` int(4) NOT NULL,
  `jml_bayar` int(20) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `kenappn` int(11) NOT NULL,
  `kenapph` int(11) NOT NULL,
  `tgl_tr` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wp`
--

CREATE TABLE IF NOT EXISTS `tbl_wp` (
  `wpid` int(4) NOT NULL AUTO_INCREMENT,
  `npwp` varchar(25) NOT NULL,
  `nama` varchar(125) NOT NULL,
  `alamat` text NOT NULL,
  PRIMARY KEY (`wpid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
