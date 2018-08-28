CREATE TABLE IF NOT EXISTS `021_transaction` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `invoice` varchar(25) NOT NULL COMMENT 'Unique Kode Transaksi dari merchant',
  `amount` double NOT NULL COMMENT 'Nominal yang harus dibayar oleh customer',
  `add_info1` varchar(30) NOT NULL,
  `add_info2` varchar(30) NOT NULL,
  `add_info3` varchar(30) NOT NULL,
  `add_info4` varchar(30) NOT NULL,
  `add_info5` varchar(30) NOT NULL,
  `timeout` int(11) NOT NULL COMMENT 'batas validasi transaksi dalam satuan menit',
  `return_url` varchar(250) NOT NULL COMMENT 'URL untuk menerima response dari 021 engine',
  `trax_type` varchar(20) NOT NULL COMMENT 'Kategori kiriman data dari 021 engine',
  `payment_code` varchar(20) NOT NULL COMMENT 'Kode bayar 021',
  `result_code` varchar(2) NOT NULL COMMENT 'Kode Proses 021',
  `result_desc` varchar(30) NOT NULL COMMENT 'Deskripsi Proses 021',
  `log_no` varchar(30) NOT NULL COMMENT 'Kode Referensi 021',
  `payment_source` varchar(30) NOT NULL COMMENT 'Sumber pembayaran 021',
  PRIMARY KEY (`id`),
  UNIQUE KEY `invoice` (`invoice`)
) AUTO_INCREMENT=4 ;

--
-- Dumping data for table `021_transaction`
--

INSERT INTO `021_transaction` (`id`, `invoice`, `amount`, `add_info1`, `add_info2`, `add_info3`, `add_info4`, `add_info5`, `timeout`, `return_url`, `trax_type`, `payment_code`, `result_code`, `result_desc`, `log_no`, `payment_source`) VALUES
(1, '95382995', 1000, 'INVOICE 95382995', '', '', '', '', 60, 'http://192.168.20.130/finnet/195/SHO009/195_return_url.php', '195Code', '0195756480255', '', '', '', ''),
(2, '90505065', 1000, 'INVOICE 90505065', '', '', '', '', 60, 'http://192.168.20.130/finnet/195/SHO009/195_return_url.php', 'Payment', '0195757879638', '05', 'Transaction Expired', '', ''),
(3, '37910766', 1000, 'INVOICE 37910766', '', '', '', '', 60, 'http://192.168.20.130/finnet/195/SHO009/195_return_url_secure.php', 'Payment', '0195756920257', '00', 'Success', '8668781098', 'webdev');
