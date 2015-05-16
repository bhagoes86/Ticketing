-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2015 at 06:29 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ticketing2`
--

-- --------------------------------------------------------

--
-- Table structure for table `acara`
--

CREATE TABLE IF NOT EXISTS `acara` (
  `ID_ACARA` int(11) NOT NULL AUTO_INCREMENT,
  `NAMA_ACARA` varchar(1000) NOT NULL,
  `HARGA_ACARA` int(11) NOT NULL,
  `MIN_TIKET` int(11) NOT NULL,
  `MAX_TIKET` int(11) NOT NULL,
  `URL_ACARA` text,
  `CP_ACARA` varchar(20) NOT NULL,
  PRIMARY KEY (`ID_ACARA`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `acara`
--

INSERT INTO `acara` (`ID_ACARA`, `NAMA_ACARA`, `HARGA_ACARA`, `MIN_TIKET`, `MAX_TIKET`, `URL_ACARA`, `CP_ACARA`) VALUES
(1, 'Closing Dekan Cup FK 2015', 55000, 0, 0, 'http://www.haiunair.com/assets/img/fk_dk', '085731020766'),
(2, 'Seminar Entreprenuership', 12500, 2, 9, 'http://www.haiunair.com/assets/poster/Seminar201504305757', '08998199189');

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE IF NOT EXISTS `akun` (
  `ID_AKUN` int(11) NOT NULL AUTO_INCREMENT,
  `USERNAME` varchar(100) DEFAULT NULL,
  `PASSWORD` varchar(100) DEFAULT NULL,
  `DAFTAR_AKUN` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `STATUS` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID_AKUN`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `beli`
--

CREATE TABLE IF NOT EXISTS `beli` (
  `ID_BELI` int(11) NOT NULL AUTO_INCREMENT,
  `ID_VOUCHER` int(11) DEFAULT NULL,
  `ID_AKUN` int(11) DEFAULT NULL,
  `QUANTITY` int(11) DEFAULT NULL,
  `TOTAL_HARGA` int(11) DEFAULT NULL,
  `TGL_AMBIL` date DEFAULT NULL,
  `TGL_BAYAR` date DEFAULT NULL,
  `STATUS_BELI` int(11) DEFAULT '0',
  PRIMARY KEY (`ID_BELI`),
  KEY `FK_MELAKUKAN` (`ID_AKUN`),
  KEY `FK_MENGAMBIL` (`ID_VOUCHER`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi`
--

CREATE TABLE IF NOT EXISTS `konfirmasi` (
  `ID_KONFIRMASI` int(11) NOT NULL AUTO_INCREMENT,
  `ID_AKUN` int(11) NOT NULL,
  `NAMA_PENGIRIM` varchar(400) NOT NULL,
  `NAMA_BANK` varchar(400) NOT NULL,
  `TANGGAL_BAYAR` date NOT NULL,
  `BIAYA` int(11) NOT NULL,
  `STATUS_KONFIRMASI` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID_KONFIRMASI`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tiket`
--

CREATE TABLE IF NOT EXISTS `tiket` (
  `ID_TIKET` int(11) NOT NULL AUTO_INCREMENT,
  `ID_ACARA` tinyint(4) NOT NULL,
  `ID_AKUN` int(11) DEFAULT NULL,
  `NAMA` varchar(100) DEFAULT NULL,
  `NO_TIKET` int(11) DEFAULT NULL,
  `E_MAIL` varchar(100) DEFAULT NULL,
  `NO_HP` varchar(30) DEFAULT NULL,
  `ASAL_INSTANSI` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID_TIKET`),
  KEY `FK_MEMILIKI` (`ID_AKUN`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `voucher`
--

CREATE TABLE IF NOT EXISTS `voucher` (
  `ID_VOUCHER` int(11) NOT NULL AUTO_INCREMENT,
  `KODE_VOUCHER` varchar(100) DEFAULT NULL,
  `STATUS_VOUCHER` int(11) DEFAULT '0',
  PRIMARY KEY (`ID_VOUCHER`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=304 ;

--
-- Dumping data for table `voucher`
--

INSERT INTO `voucher` (`ID_VOUCHER`, `KODE_VOUCHER`, `STATUS_VOUCHER`) VALUES
(6, '202', 0),
(5, '201', 0),
(7, '203', 0),
(8, '204', 0),
(9, '205', 0),
(10, '206', 0),
(11, '207', 0),
(12, '208', 0),
(13, '209', 0),
(14, '210', 0),
(15, '211', 0),
(16, '212', 0),
(17, '213', 0),
(18, '214', 0),
(19, '215', 0),
(20, '216', 0),
(21, '217', 0),
(22, '218', 0),
(23, '219', 0),
(24, '220', 0),
(25, '221', 0),
(26, '222', 0),
(27, '223', 0),
(28, '224', 0),
(29, '225', 0),
(30, '226', 0),
(31, '227', 0),
(32, '228', 0),
(33, '229', 0),
(34, '230', 0),
(35, '231', 0),
(36, '232', 0),
(37, '233', 0),
(38, '234', 0),
(39, '235', 0),
(40, '236', 0),
(41, '237', 0),
(42, '238', 0),
(43, '239', 0),
(44, '240', 0),
(45, '241', 0),
(46, '242', 0),
(47, '243', 0),
(48, '244', 0),
(49, '245', 0),
(50, '246', 0),
(51, '247', 0),
(52, '248', 0),
(53, '249', 0),
(54, '250', 0),
(55, '251', 0),
(56, '252', 0),
(57, '253', 0),
(58, '254', 0),
(59, '255', 0),
(60, '256', 0),
(61, '257', 0),
(62, '258', 0),
(63, '259', 0),
(64, '260', 0),
(65, '261', 0),
(66, '262', 0),
(67, '263', 0),
(68, '264', 0),
(69, '265', 0),
(70, '266', 0),
(71, '267', 0),
(72, '268', 0),
(73, '269', 0),
(74, '270', 0),
(75, '271', 0),
(76, '272', 0),
(77, '273', 0),
(78, '274', 0),
(79, '275', 0),
(80, '276', 0),
(81, '277', 0),
(82, '278', 0),
(83, '279', 0),
(84, '280', 0),
(85, '281', 0),
(86, '282', 0),
(87, '283', 0),
(88, '284', 0),
(89, '285', 0),
(90, '286', 0),
(91, '287', 0),
(92, '288', 0),
(93, '289', 0),
(94, '290', 0),
(95, '291', 0),
(96, '292', 0),
(97, '293', 0),
(98, '294', 0),
(99, '295', 0),
(100, '296', 0),
(101, '297', 0),
(102, '298', 0),
(103, '299', 0),
(104, '300', 0),
(105, '301', 0),
(106, '302', 0),
(107, '303', 0),
(108, '304', 0),
(109, '305', 0),
(110, '306', 0),
(111, '307', 0),
(112, '308', 0),
(113, '309', 0),
(114, '310', 0),
(115, '311', 0),
(116, '312', 0),
(117, '313', 0),
(118, '314', 0),
(119, '315', 0),
(120, '316', 0),
(121, '317', 0),
(122, '318', 0),
(123, '319', 0),
(124, '320', 0),
(125, '321', 0),
(126, '322', 0),
(127, '323', 0),
(128, '324', 0),
(129, '325', 0),
(130, '326', 0),
(131, '327', 0),
(132, '328', 0),
(133, '329', 0),
(134, '330', 0),
(135, '331', 0),
(136, '332', 0),
(137, '333', 0),
(138, '334', 0),
(139, '335', 0),
(140, '336', 0),
(141, '337', 0),
(142, '338', 0),
(143, '339', 0),
(144, '340', 0),
(145, '341', 0),
(146, '342', 0),
(147, '343', 0),
(148, '344', 0),
(149, '345', 0),
(150, '346', 0),
(151, '347', 0),
(152, '348', 0),
(153, '349', 0),
(154, '350', 0),
(155, '351', 0),
(156, '352', 0),
(157, '353', 0),
(158, '354', 0),
(159, '355', 0),
(160, '356', 0),
(161, '357', 0),
(162, '358', 0),
(163, '359', 0),
(164, '360', 0),
(165, '361', 0),
(166, '362', 0),
(167, '363', 0),
(168, '364', 0),
(169, '365', 0),
(170, '366', 0),
(171, '367', 0),
(172, '368', 0),
(173, '369', 0),
(174, '370', 0),
(175, '371', 0),
(176, '372', 0),
(177, '373', 0),
(178, '374', 0),
(179, '375', 0),
(180, '376', 0),
(181, '377', 0),
(182, '378', 0),
(183, '379', 0),
(184, '380', 0),
(185, '381', 0),
(186, '382', 0),
(187, '383', 0),
(188, '384', 0),
(189, '385', 0),
(190, '386', 0),
(191, '387', 0),
(192, '388', 0),
(193, '389', 0),
(194, '390', 0),
(195, '391', 0),
(196, '392', 0),
(197, '393', 0),
(198, '394', 0),
(199, '395', 0),
(200, '396', 0),
(201, '397', 0),
(202, '398', 0),
(203, '399', 0),
(204, '400', 0),
(205, '401', 0),
(206, '402', 0),
(207, '403', 0),
(208, '404', 0),
(209, '405', 0),
(210, '406', 0),
(211, '407', 0),
(212, '408', 0),
(213, '409', 0),
(214, '410', 0),
(215, '411', 0),
(216, '412', 0),
(217, '413', 0),
(218, '414', 0),
(219, '415', 0),
(220, '416', 0),
(221, '417', 0),
(222, '418', 0),
(223, '419', 0),
(224, '420', 0),
(225, '421', 0),
(226, '422', 0),
(227, '423', 0),
(228, '424', 0),
(229, '425', 0),
(230, '426', 0),
(231, '427', 0),
(232, '428', 0),
(233, '429', 0),
(234, '430', 0),
(235, '431', 0),
(236, '432', 0),
(237, '433', 0),
(238, '434', 0),
(239, '435', 0),
(240, '436', 0),
(241, '437', 0),
(242, '438', 0),
(243, '439', 0),
(244, '440', 0),
(245, '441', 0),
(246, '442', 0),
(247, '443', 0),
(248, '444', 0),
(249, '445', 0),
(250, '446', 0),
(251, '447', 0),
(252, '448', 0),
(253, '449', 0),
(254, '450', 0),
(255, '451', 0),
(256, '452', 0),
(257, '453', 0),
(258, '454', 0),
(259, '455', 0),
(260, '456', 0),
(261, '457', 0),
(262, '458', 0),
(263, '459', 0),
(264, '460', 0),
(265, '461', 0),
(266, '462', 0),
(267, '463', 0),
(268, '464', 0),
(269, '465', 0),
(270, '466', 0),
(271, '467', 0),
(272, '468', 0),
(273, '469', 0),
(274, '470', 0),
(275, '471', 0),
(276, '472', 0),
(277, '473', 0),
(278, '474', 0),
(279, '475', 0),
(280, '476', 0),
(281, '477', 0),
(282, '478', 0),
(283, '479', 0),
(284, '480', 0),
(285, '481', 0),
(286, '482', 0),
(287, '483', 0),
(288, '484', 0),
(289, '485', 0),
(290, '486', 0),
(291, '487', 0),
(292, '488', 0),
(293, '489', 0),
(294, '490', 0),
(295, '491', 0),
(296, '492', 0),
(297, '493', 0),
(298, '494', 0),
(299, '495', 0),
(300, '496', 0),
(301, '497', 0),
(302, '498', 0),
(303, '499', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
