ALTER TABLE `wh-mg`.`barang` 
MODIFY COLUMN `kode` varchar(10) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL,
MODIFY COLUMN `nama` varchar(100) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL,
MODIFY COLUMN `satuan` varchar(10) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL;

ALTER TABLE `wh-mg`.`pembelian` 
MODIFY COLUMN `nama_pengguna` varchar(50) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL AFTER `id`,
MODIFY COLUMN `nomor` varchar(20) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL AFTER `nama_pengguna`,
MODIFY COLUMN `status` varchar(30) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL AFTER `keterangan`,
MODIFY COLUMN `posisi` varchar(15) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL AFTER `status`,
MODIFY COLUMN `kode_supplier` varchar(10) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL AFTER `id_supplier`,
MODIFY COLUMN `nama_supplier` varchar(100) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL AFTER `kode_supplier`,
MODIFY COLUMN `nomor_po` varchar(25) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL AFTER `note`;

ALTER TABLE `wh-mg`.`pengguna` 
MODIFY COLUMN `password` varchar(100) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL AFTER `username`,
MODIFY COLUMN `nama` varchar(50) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL AFTER `password`,
MODIFY COLUMN `jabatan` varchar(50) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL AFTER `nama`,
MODIFY COLUMN `telp` varchar(15) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL AFTER `tgl_lahir`;

ALTER TABLE `wh-mg`.`permintaan` 
MODIFY COLUMN `nama_pengguna` varchar(50) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL AFTER `id`,
MODIFY COLUMN `nomor` varchar(25) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL AFTER `nama_pengguna`,
MODIFY COLUMN `status` varchar(30) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL AFTER `keterangan`,
MODIFY COLUMN `posisi` varchar(15) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL AFTER `status`,
MODIFY COLUMN `nomor_po` varchar(25) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL AFTER `note`;

ALTER TABLE `wh-mg`.`pembelian_barang` 
MODIFY COLUMN `kode` varchar(10) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL AFTER `id_barang`,
MODIFY COLUMN `nama` varchar(50) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL AFTER `kode`,
MODIFY COLUMN `satuan` varchar(10) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL AFTER `jumlah`;

ALTER TABLE `wh-mg`.`permintaan_barang` 
MODIFY COLUMN `kode` varchar(10) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL AFTER `id_barang`,
MODIFY COLUMN `nama` varchar(50) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL AFTER `kode`,
MODIFY COLUMN `satuan` varchar(10) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL AFTER `jumlah`,
MODIFY COLUMN `status` varchar(30) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL AFTER `satuan`;

ALTER TABLE `wh-mg`.`permintaan_pembelian` 
MODIFY COLUMN `nama_pengguna` varchar(50) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL AFTER `id`,
MODIFY COLUMN `nomor` varchar(25) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL AFTER `nama_pengguna`,
MODIFY COLUMN `status` varchar(30) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL AFTER `tanggal`,
MODIFY COLUMN `posisi` varchar(15) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL AFTER `status`,
MODIFY COLUMN `nomor_po` varchar(25) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL AFTER `note`,
MODIFY COLUMN `nomor_permintaan` varchar(25) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL AFTER `tanggal_po`;

ALTER TABLE `wh-mg`.`permintaan_pembelian_barang` 
MODIFY COLUMN `kode` varchar(10) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL AFTER `id_barang`,
MODIFY COLUMN `nama` varchar(50) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL AFTER `kode`,
MODIFY COLUMN `satuan` varchar(10) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL AFTER `jumlah`;

ALTER TABLE `wh-mg`.`supplier` 
MODIFY COLUMN `nama` varchar(50) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL AFTER `id`,
MODIFY COLUMN `kode` varchar(10) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL AFTER `nama`,
MODIFY COLUMN `alamat` varchar(100) CHARACTER SET utf32 COLLATE utf32_unicode_ci NULL DEFAULT NULL AFTER `kode`;

ALTER TABLE `wh-mg`.`permintaan` 
ADD COLUMN `file_po` varchar(50) NULL;
ALTER TABLE `wh-mg`.`permintaan_pembelian` 
ADD COLUMN `file_po` varchar(50) NULL;
ALTER TABLE `wh-mg`.`pembelian` 
ADD COLUMN `file_po` varchar(50) NULL;