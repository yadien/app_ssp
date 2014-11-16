-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.34 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             8.3.0.4694
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for dbssp
CREATE DATABASE IF NOT EXISTS `dbssp` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `dbssp`;


-- Dumping structure for table dbssp.tbl_belanja
CREATE TABLE IF NOT EXISTS `tbl_belanja` (
  `belanjaid` int(2) NOT NULL,
  `belanja` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table dbssp.tbl_belanja: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_belanja` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_belanja` ENABLE KEYS */;


-- Dumping structure for table dbssp.tbl_detail_transaksi
CREATE TABLE IF NOT EXISTS `tbl_detail_transaksi` (
  `iddetail` int(10) NOT NULL,
  `jpid` int(3) NOT NULL,
  `nilai_pajak` double NOT NULL,
  `npwp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table dbssp.tbl_detail_transaksi: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_detail_transaksi` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_detail_transaksi` ENABLE KEYS */;


-- Dumping structure for table dbssp.tbl_info
CREATE TABLE IF NOT EXISTS `tbl_info` (
  `infoid` int(4) NOT NULL AUTO_INCREMENT,
  `judul` varchar(250) NOT NULL,
  `informasi` text NOT NULL,
  PRIMARY KEY (`infoid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table dbssp.tbl_info: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_info` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_info` ENABLE KEYS */;


-- Dumping structure for table dbssp.tbl_jp
CREATE TABLE IF NOT EXISTS `tbl_jp` (
  `jpid` int(4) NOT NULL AUTO_INCREMENT,
  `kd_akun` varchar(7) NOT NULL,
  `kd_jenis` varchar(3) NOT NULL,
  `nm_jenis` varchar(25) NOT NULL,
  `ket` varchar(125) NOT NULL,
  PRIMARY KEY (`jpid`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table dbssp.tbl_jp: ~8 rows (approximately)
/*!40000 ALTER TABLE `tbl_jp` DISABLE KEYS */;
INSERT INTO `tbl_jp` (`jpid`, `kd_akun`, `kd_jenis`, `nm_jenis`, `ket`) VALUES
	(1, '411211', '100', 'PPN', 'Setoran Masa PPN'),
	(2, '411128', '402', 'PPh Pasal 4(2)', 'PPh Pasal 4 ayat (2) atas Pembelian Tanah dan/atau Bangunan'),
	(3, '411128', '403', 'PPh Pasal 4(2)', 'PPh Pasal 4 ayat (2) Sewa Tanah dan/atau Bangunan'),
	(4, '411128', '409', 'PPh Pasal 4(2)', 'Jasa Konstruksi'),
	(5, '411121', '100', 'PPh Pasal 21', 'Rutin/Bulanan'),
	(6, '411121', '402', 'PPh Pasal 21', 'Kegiatan'),
	(7, '411122', '100', 'PPh Pasal 22', 'Pembelian Barang, Pengadaan ATK'),
	(8, '411124', '100', 'PPh Pasal 23', 'Jasa dan Catering (tidak kena PPN)');
/*!40000 ALTER TABLE `tbl_jp` ENABLE KEYS */;


-- Dumping structure for table dbssp.tbl_login
CREATE TABLE IF NOT EXISTS `tbl_login` (
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `nama_pengguna` varchar(25) NOT NULL,
  `level` varchar(10) NOT NULL,
  `status` enum('ACTIVE','INACTIVE') NOT NULL DEFAULT 'ACTIVE'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table dbssp.tbl_login: ~3 rows (approximately)
/*!40000 ALTER TABLE `tbl_login` DISABLE KEYS */;
INSERT INTO `tbl_login` (`username`, `password`, `nama_pengguna`, `level`, `status`) VALUES
	('admin', 'admin', 'administrator', 'ADMIN', 'ACTIVE'),
	('adin', 'adin', 'adin pai', 'ADMIN', 'ACTIVE'),
	('ali', 'ali', 'ali amakusa', 'USER', 'ACTIVE');
/*!40000 ALTER TABLE `tbl_login` ENABLE KEYS */;


-- Dumping structure for table dbssp.tbl_pejabat
CREATE TABLE IF NOT EXISTS `tbl_pejabat` (
  `pejabatid` int(4) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `eselon` varchar(12) NOT NULL,
  PRIMARY KEY (`pejabatid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table dbssp.tbl_pejabat: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_pejabat` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_pejabat` ENABLE KEYS */;


-- Dumping structure for table dbssp.tbl_pp
CREATE TABLE IF NOT EXISTS `tbl_pp` (
  `ppid` int(4) NOT NULL AUTO_INCREMENT,
  `nama` varchar(25) NOT NULL,
  `npwp` varchar(25) NOT NULL,
  `alamat` text NOT NULL,
  `tlp` varchar(25) NOT NULL,
  PRIMARY KEY (`ppid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table dbssp.tbl_pp: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_pp` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_pp` ENABLE KEYS */;


-- Dumping structure for table dbssp.tbl_transaksi
CREATE TABLE IF NOT EXISTS `tbl_transaksi` (
  `kode_tr` int(4) NOT NULL,
  `masa_p` int(2) NOT NULL,
  `tahun_p` year(4) NOT NULL,
  `wpid` int(4) NOT NULL,
  `ppid` int(4) NOT NULL,
  `nilai_belanja` double NOT NULL,
  `tgl_manual` date NOT NULL,
  `tgl_otomatis` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `uraian` text NOT NULL,
  `pejabatid` int(1) NOT NULL,
  KEY `FK_tbl_transaksi_tbl_wp` (`wpid`),
  KEY `FK_tbl_transaksi_tbl_pp` (`ppid`),
  CONSTRAINT `FK_tbl_transaksi_tbl_pp` FOREIGN KEY (`ppid`) REFERENCES `tbl_pp` (`ppid`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_tbl_transaksi_tbl_wp` FOREIGN KEY (`wpid`) REFERENCES `tbl_wp` (`wpid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table dbssp.tbl_transaksi: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_transaksi` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_transaksi` ENABLE KEYS */;


-- Dumping structure for table dbssp.tbl_wp
CREATE TABLE IF NOT EXISTS `tbl_wp` (
  `wpid` int(4) NOT NULL AUTO_INCREMENT,
  `npwp` varchar(25) NOT NULL,
  `nama` varchar(125) NOT NULL,
  `alamat` text NOT NULL,
  PRIMARY KEY (`wpid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table dbssp.tbl_wp: ~1 rows (approximately)
/*!40000 ALTER TABLE `tbl_wp` DISABLE KEYS */;
INSERT INTO `tbl_wp` (`wpid`, `npwp`, `nama`, `alamat`) VALUES
	(1, '71.157.929.2-014.000', 'Ahmad Alimuddin', 'Jl Bangka V No. 28 ');
/*!40000 ALTER TABLE `tbl_wp` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
