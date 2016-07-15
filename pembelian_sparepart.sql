/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50620
Source Host           : localhost:3306
Source Database       : pembelian_sparepart

Target Server Type    : MYSQL
Target Server Version : 50620
File Encoding         : 65001

Date: 2016-07-16 06:00:32
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `barang`
-- ----------------------------
DROP TABLE IF EXISTS `barang`;
CREATE TABLE `barang` (
  `kode_part` varchar(15) NOT NULL,
  `nama_part` varchar(100) NOT NULL,
  `stok` int(11) NOT NULL,
  PRIMARY KEY (`kode_part`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of barang
-- ----------------------------
INSERT INTO `barang` VALUES ('151890-001', 'Stopper Rubber', '2');
INSERT INTO `barang` VALUES ('151951-001', 'Spring', '2');
INSERT INTO `barang` VALUES ('152923-001', 'Thread Timmer Roller', '7');
INSERT INTO `barang` VALUES ('153141-001', 'Roller Holder Cover', '10');

-- ----------------------------
-- Table structure for `form_request`
-- ----------------------------
DROP TABLE IF EXISTS `form_request`;
CREATE TABLE `form_request` (
  `id_request` int(11) NOT NULL AUTO_INCREMENT,
  `nik` int(12) NOT NULL,
  `kode_part` varchar(15) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `status_request` varchar(20) NOT NULL,
  `date_request` date NOT NULL,
  PRIMARY KEY (`id_request`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of form_request
-- ----------------------------
INSERT INTO `form_request` VALUES ('2', '201502445', '151890-001', '2', 'accept', '2016-07-13');
INSERT INTO `form_request` VALUES ('3', '201502445', '151951-001', '3', 'accept', '2016-07-13');
INSERT INTO `form_request` VALUES ('4', '201502445', '152923-001', '3', 'canceled', '2016-07-14');
INSERT INTO `form_request` VALUES ('5', '201502445', '153141-001', '3', 'awaiting', '2016-07-15');

-- ----------------------------
-- Table structure for `karyawan`
-- ----------------------------
DROP TABLE IF EXISTS `karyawan`;
CREATE TABLE `karyawan` (
  `nik` int(12) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `divisi` varchar(20) NOT NULL,
  `level` varchar(20) NOT NULL,
  PRIMARY KEY (`nik`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of karyawan
-- ----------------------------
INSERT INTO `karyawan` VALUES ('123456789', 'Bella', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'akunting', 'admin');
INSERT INTO `karyawan` VALUES ('199267245', 'Jajang Rihandi', 'jajang', '21232f297a57a5a743894a0e4a801fc3', 'mekanik', 'mekanik');
INSERT INTO `karyawan` VALUES ('201502445', 'Owi', 'mekanik', '21232f297a57a5a743894a0e4a801fc3', 'mekanik', 'mekanik');

-- ----------------------------
-- Table structure for `penerimaan`
-- ----------------------------
DROP TABLE IF EXISTS `penerimaan`;
CREATE TABLE `penerimaan` (
  `no_invoice` varchar(15) NOT NULL,
  `kode_part` varchar(15) NOT NULL,
  `id_suplier` int(11) NOT NULL,
  `jml_barang` int(11) NOT NULL,
  PRIMARY KEY (`no_invoice`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of penerimaan
-- ----------------------------
INSERT INTO `penerimaan` VALUES ('inv-001', '151890-001', '1', '5');
INSERT INTO `penerimaan` VALUES ('inv-002', '151890-001', '1', '3');

-- ----------------------------
-- Table structure for `suplier`
-- ----------------------------
DROP TABLE IF EXISTS `suplier`;
CREATE TABLE `suplier` (
  `id_suplier` int(11) NOT NULL AUTO_INCREMENT,
  `nama_suplier` varchar(50) NOT NULL,
  `alamat_suplier` varchar(100) NOT NULL,
  `telp_suplier` varchar(20) NOT NULL,
  PRIMARY KEY (`id_suplier`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of suplier
-- ----------------------------
INSERT INTO `suplier` VALUES ('1', 'CV.  SEMPURNA TECH', 'Tangerang', '081212121212');
INSERT INTO `suplier` VALUES ('2', 'PT STARINDO GEMILANG', 'Jakarta', '085656565656');
INSERT INTO `suplier` VALUES ('3', 'CV. PELANGI', 'Tangerang', '083838383838');
