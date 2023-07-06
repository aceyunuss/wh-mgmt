/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 100427
 Source Host           : localhost:3306
 Source Schema         : wh-mg

 Target Server Type    : MySQL
 Target Server Version : 100427
 File Encoding         : 65001

 Date: 06/07/2023 15:09:06
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for barang
-- ----------------------------
DROP TABLE IF EXISTS `barang`;
CREATE TABLE `barang`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL,
  `harga` decimal(10, 0) NULL DEFAULT NULL,
  `stok` decimal(10, 0) NULL DEFAULT NULL,
  `satuan` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf32 COLLATE = utf32_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for pembelian
-- ----------------------------
DROP TABLE IF EXISTS `pembelian`;
CREATE TABLE `pembelian`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_pengguna` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL,
  `nomor` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL,
  `tanggal` date NULL DEFAULT NULL,
  `keterangan` text CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL,
  `status` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL,
  `posisi` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL,
  `id_supplier` int NULL DEFAULT NULL,
  `kode_supplier` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL,
  `nama_supplier` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf32 COLLATE = utf32_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for pembelian_barang
-- ----------------------------
DROP TABLE IF EXISTS `pembelian_barang`;
CREATE TABLE `pembelian_barang`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_pembelian` int NOT NULL,
  `id_barang` int NOT NULL,
  `kode` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL,
  `jumlah` decimal(10, 0) NULL DEFAULT NULL,
  `satuan` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL,
  `harga` decimal(10, 2) NULL DEFAULT NULL,
  `total` decimal(10, 2) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf32 COLLATE = utf32_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for pengguna
-- ----------------------------
DROP TABLE IF EXISTS `pengguna`;
CREATE TABLE `pengguna`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(20) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL,
  `jabatan` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL,
  `jenis_kelamin` varchar(10) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL,
  `tgl_lahir` date NULL DEFAULT NULL,
  `telp` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf32 COLLATE = utf32_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for permintaan
-- ----------------------------
DROP TABLE IF EXISTS `permintaan`;
CREATE TABLE `permintaan`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_pengguna` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL,
  `nomor` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL,
  `tanggal` date NULL DEFAULT NULL,
  `keterangan` text CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL,
  `status` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL,
  `posisi` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf32 COLLATE = utf32_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for permintaan_barang
-- ----------------------------
DROP TABLE IF EXISTS `permintaan_barang`;
CREATE TABLE `permintaan_barang`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_permintaan` int NOT NULL,
  `id_barang` int NOT NULL,
  `kode` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL,
  `jumlah` decimal(10, 0) NULL DEFAULT NULL,
  `satuan` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf32 COLLATE = utf32_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for permintaan_pembelian
-- ----------------------------
DROP TABLE IF EXISTS `permintaan_pembelian`;
CREATE TABLE `permintaan_pembelian`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_pengguna` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL,
  `nomor` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL,
  `tanggal` date NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL,
  `posisi` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL,
  `keterangan` text CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf32 COLLATE = utf32_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for permintaan_pembelian_barang
-- ----------------------------
DROP TABLE IF EXISTS `permintaan_pembelian_barang`;
CREATE TABLE `permintaan_pembelian_barang`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_permintaan_pembelian` int NOT NULL,
  `id_barang` int NOT NULL,
  `kode` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL,
  `jumlah` decimal(10, 0) NULL DEFAULT NULL,
  `satuan` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL,
  `harga` decimal(10, 2) NULL DEFAULT NULL,
  `total` decimal(10, 2) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf32 COLLATE = utf32_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for supplier
-- ----------------------------
DROP TABLE IF EXISTS `supplier`;
CREATE TABLE `supplier`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL,
  `kode` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf32 COLLATE = utf32_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- View structure for vw_dash1
-- ----------------------------
DROP VIEW IF EXISTS `vw_dash1`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `vw_dash1` AS select (select sum(`permintaan_pembelian_barang`.`total`) from `permintaan_pembelian_barang`) AS `permintaan_pembelian`,(select sum(`pembelian_barang`.`total`) from `pembelian_barang`) AS `pembelian`;

-- ----------------------------
-- View structure for vw_dash2
-- ----------------------------
DROP VIEW IF EXISTS `vw_dash2`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `vw_dash2` AS select (select count(`pengguna`.`id`) from `pengguna`) AS `pengguna`,(select count(`supplier`.`id`) from `supplier`) AS `supplier`,(select count(`barang`.`id`) from `barang`) AS `barang`;

-- ----------------------------
-- View structure for vw_dash3
-- ----------------------------
DROP VIEW IF EXISTS `vw_dash3`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `vw_dash3` AS select (select count(case when `permintaan`.`status` = 'Disetujui' then 1 else NULL end) from `permintaan`) AS `permintaan_pending`,(select count(`permintaan`.`id`) from `permintaan`) AS `permintaan_total`,(select count(case when `permintaan_pembelian`.`status` = 'Disetujui' then 1 else NULL end) from `permintaan_pembelian`) AS `permintaan_pembelian_pending`,(select count(`permintaan_pembelian`.`id`) from `permintaan_pembelian`) AS `permintaan_pembelian_total`;

-- ----------------------------
-- View structure for vw_list_pekerjaan
-- ----------------------------
DROP VIEW IF EXISTS `vw_list_pekerjaan`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `vw_list_pekerjaan` AS select `permintaan`.`id` AS `id`,`permintaan`.`nomor` AS `nomor`,'Permintaan Barang' AS `kategori`,`permintaan`.`status` AS `status`,`permintaan`.`tanggal` AS `tanggal`,concat('permintaan/proses/',`permintaan`.`id`) AS `link`,`permintaan`.`posisi` AS `posisi`,'icon-box feather' AS `icon` from `permintaan` where `permintaan`.`status` = 'Menunggu Persetujuan' union all select `permintaan_pembelian`.`id` AS `id`,`permintaan_pembelian`.`nomor` AS `nomor`,'Permintaan Pembelian Barang' AS `kategori`,`permintaan_pembelian`.`status` AS `status`,`permintaan_pembelian`.`tanggal` AS `tanggal`,concat('permintaanpembelian/proses/',`permintaan_pembelian`.`id`) AS `link`,`permintaan_pembelian`.`posisi` AS `posisi`,'icon-briefcase feather' AS `icon` from `permintaan_pembelian` where `permintaan_pembelian`.`status` = 'Menunggu Persetujuan' union all select `pembelian`.`id` AS `id`,`pembelian`.`nomor` AS `nomor`,'Pembelian Barang' AS `kategori`,`pembelian`.`status` AS `status`,`pembelian`.`tanggal` AS `tanggal`,concat('pembelian/proses/',`pembelian`.`id`) AS `link`,`pembelian`.`posisi` AS `posisi`,'icon-shopping-bag feather' AS `icon` from `pembelian` where `pembelian`.`status` = 'Menunggu Persetujuan';

SET FOREIGN_KEY_CHECKS = 1;

INSERT INTO pengguna ( nama, username, PASSWORD, jabatan )
VALUES
	(
		'admin',
		'admin',
	'$2y$10$X4cgv4N7X3u7ZcFWy7OoPOllXkEx28vNTNqADwRiSxXLSILuhFqoG',
	'Admin Aplikasi');