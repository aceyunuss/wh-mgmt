ALTER TABLE `wh-mg`.`permintaan` 
ADD COLUMN `nomor_po` varchar(255) NULL,
ADD COLUMN `tanggal_po` date NULL;

ALTER TABLE `wh-mg`.`permintaan_pembelian` 
ADD COLUMN `nomor_po` varchar(255) NULL,
ADD COLUMN `tanggal_po` date NULL;