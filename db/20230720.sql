ALTER TABLE `wh-mg`.`permintaan_barang`
ADD COLUMN `harga` decimal(10, 2) NULL ,
ADD COLUMN `total` decimal(10, 2) NULL ;

ALTER TABLE `wh-mg`.`permintaan_pembelian` 
ADD COLUMN `nomor_permintaan` varchar(255) NULL ;

ALTER TABLE `wh-mg`.`pembelian` 
ADD COLUMN `nomor_permintaan_pembelian` varchar(255) NULL ;
