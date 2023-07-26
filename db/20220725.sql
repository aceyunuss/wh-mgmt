CREATE OR REPLACE VIEW `wh-mg`.`vw_list_pekerjaan` AS SELECT
	`permintaan`.`id` AS `id`,
	`permintaan`.`nomor` AS `nomor`,
	'Pesanan Barang' AS `kategori`,
	`permintaan`.`status` AS `status`,
	`permintaan`.`tanggal` AS `tanggal`,
	concat( 'permintaan/proses/', `permintaan`.`id` ) AS `link`,
	`permintaan`.`posisi` AS `posisi`,
	to_days(
	CURRENT_TIMESTAMP ()) - to_days( `permintaan`.`tanggal_po` ) AS `deadline`,
	'icon-box feather' AS `icon` 
FROM
	`permintaan` 
WHERE
	`permintaan`.`status` = 'Menunggu Persetujuan' UNION ALL
SELECT
	`permintaan_pembelian`.`id` AS `id`,
	`permintaan_pembelian`.`nomor` AS `nomor`,
	'Pesanan Pembelian Barang' AS `kategori`,
	`permintaan_pembelian`.`status` AS `status`,
	`permintaan_pembelian`.`tanggal` AS `tanggal`,
	concat( 'permintaanpembelian/proses/', `permintaan_pembelian`.`id` ) AS `link`,
	`permintaan_pembelian`.`posisi` AS `posisi`,
	to_days(
	CURRENT_TIMESTAMP ()) - to_days( `permintaan_pembelian`.`tanggal_po` ) AS `deadline`,
	'icon-briefcase feather' AS `icon` 
FROM
	`permintaan_pembelian` 
WHERE
	`permintaan_pembelian`.`status` = 'Menunggu Persetujuan' UNION ALL
SELECT
	`pembelian`.`id` AS `id`,
	`pembelian`.`nomor` AS `nomor`,
	'Pembelian Barang' AS `kategori`,
	`pembelian`.`status` AS `status`,
	`pembelian`.`tanggal` AS `tanggal`,
	concat( 'pembelian/proses/', `pembelian`.`id` ) AS `link`,
	`pembelian`.`posisi` AS `posisi`,
	to_days(
	CURRENT_TIMESTAMP ()) - to_days( `pembelian`.`tanggal_po` ) AS `deadline`,
	'icon-shopping-bag feather' AS `icon` 
FROM
	`pembelian` 
WHERE
	`pembelian`.`status` = 'Menunggu Persetujuan';