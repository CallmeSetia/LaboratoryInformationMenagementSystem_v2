-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2021 at 03:19 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lims`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_data_item_add`
--

CREATE TABLE `tbl_data_item_add` (
  `id_item_add` int(255) NOT NULL,
  `additive` varchar(255) NOT NULL,
  `weight` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_data_item_add`
--

INSERT INTO `tbl_data_item_add` (`id_item_add`, `additive`, `weight`) VALUES
(1, 'AD1274', '160 KG'),
(2, 'AD1319', '163 KG'),
(3, 'AD1341', '194 KG'),
(4, 'AD1354', '185.97 kg'),
(5, 'AD1406', '170 KG'),
(6, 'AD1419', '180 Kg'),
(7, 'AD1440', '193 KG'),
(8, 'AD1441', '199 KG'),
(9, 'AD1456', '198 kg'),
(10, 'AD1473', '160 KG'),
(11, 'AD1504', '189 KG'),
(12, 'AD42V', '18 kg'),
(13, 'BASE OIL AL70P', '200 L'),
(14, 'BASE OIL N100', '200 L'),
(15, 'BASE OIL N460/N150BS', '200 L'),
(16, 'BASE OIL WBASE10', '200 L'),
(17, 'D60', '156 kg'),
(18, 'DJ-56', '185 Kg'),
(19, 'K35', '220 kg'),
(20, 'LG17', '10 KG'),
(21, 'LJ127', '175 kg'),
(22, 'PB HV 100', '170 KG'),
(23, 'TZ1015', '25 KG'),
(24, 'TZ1129', '192 KG'),
(25, 'TZ1143', '175 KG '),
(26, 'TZ1159', '175 Kg'),
(27, 'TZ1183', '190 KG'),
(28, 'TZ1184', '175 KG'),
(29, 'TZ1186', '175 KG'),
(30, 'TZ1210', '203 kg'),
(31, 'TZ1211', '195 KG'),
(32, 'TZ1216', '191 kg'),
(33, 'TZ1217', '189 KG'),
(34, 'TZ1228', '163 kg'),
(35, 'TZ1233', '160 KG'),
(36, 'TZ1253', '175 kg'),
(37, 'TZ1255', '180 KG'),
(38, 'TZ1262', '211 kg'),
(39, 'TZ1270', '195 KG'),
(40, 'TZ1278', '204 KG'),
(41, 'TZ1280', '187 kg'),
(42, 'TZ1282', '200 KG'),
(43, 'TZ1285', '202 KG'),
(44, 'TZ1286', '235 KG'),
(45, 'TZ129C', '190 KG'),
(46, 'TZ1410', '195 Kg'),
(47, 'TZ1416', '204 Kg'),
(48, 'TZ165C', '180 Kg'),
(49, 'TZ176E', '152 Kg'),
(50, 'TZ249A', '204 KG'),
(51, 'TZ259C', '50 Kg'),
(52, 'TZ265M', '175 kg'),
(53, 'TZ265N', '170 kg'),
(54, 'TZ266', '188 kg'),
(55, 'TZ29', '20 Kg'),
(56, 'TZ307B', '17 Kg'),
(57, 'TZ30B', '16 Kg'),
(58, 'TZ30D', '16 Kg'),
(59, 'TZ345', '223 Kg'),
(60, 'TZ354', '160 KG'),
(61, 'TZ35V', '175 Kg'),
(62, 'TZ375B', '176 Kg'),
(63, 'TZ392N', '175 kg'),
(64, 'TZ400', '188 Kg'),
(65, 'TZ410', '190 kg'),
(66, 'TZ424', '15 KG'),
(67, 'TZ425B', '199 KG'),
(68, 'TZ447', '17 kg'),
(69, 'TZ483', '180  kg'),
(70, 'TZ507C', '199 KG'),
(71, 'TZ52C', '240 KG'),
(72, 'TZ536E', '200 KG'),
(73, 'TZ562C', '180 Kg'),
(74, 'TZ571', '180 kg'),
(75, 'TZ606B', '200 kg'),
(76, 'TZ630D', '193 KG'),
(77, 'TZ698', '190 kg'),
(78, 'TZ705B', '190 kg'),
(79, 'TZ734', '180 Kg'),
(80, 'TZ747C', '175 kg'),
(81, 'TZ747F', '175 kg'),
(82, 'TZ773', '16 KG'),
(83, 'TZ802', '175 KG'),
(84, 'TZ804', '229 Kg'),
(85, 'TZ818', '180 Kg'),
(86, 'TZ844', '205 kg'),
(87, 'TZ8460', '213 KG'),
(88, 'TZ916', '193 kg'),
(89, 'TZ925', '204 KG'),
(90, 'TZ948', '197 kg'),
(91, 'TZ960B', '184 Kg'),
(92, 'TZ966', '189 Kg'),
(93, 'UNISOL LIQUID BLUE A', '200 KG'),
(94, 'UNISOL LIQUID GREEN 5B', '20 KG'),
(95, 'UNISOL LIQUID YELLOW DRHF', '20 KG'),
(96, 'AD1483', ''),
(97, 'AD1503', ''),
(98, 'AD1382', ''),
(99, '100 HV-S', ''),
(100, 'YUBASE 3', ''),
(101, 'TZ351E', ''),
(102, 'TZ672', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_data_item_pkg`
--

CREATE TABLE `tbl_data_item_pkg` (
  `id_item_pkg` int(255) NOT NULL,
  `item_code` varchar(255) NOT NULL,
  `packaging_name` varchar(255) NOT NULL,
  `suplier_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_data_item_pkg`
--

INSERT INTO `tbl_data_item_pkg` (`id_item_pkg`, `item_code`, `packaging_name`, `suplier_name`) VALUES
(1, 'P01-111', 'Bottle 0.8L IML New Yml MA 20W40 Silver ', 'KP'),
(2, '-', 'Return IBC Honda 13 CVTF', 'PT. HPM'),
(3, 'P01-011', 'Bottle 4L Eneos Diesl Oil CF-4/DH-1 Gold', 'MIWADA'),
(4, 'P01-012', 'Bottle 1L Eneos Gear Oil 75W90 GL5 White', 'MIWADA'),
(5, 'P01-017', 'Bottle 0.8L Eneos 4C SJ/MA 20W40 White', 'MIWADA'),
(6, 'P01-018', 'Bottle 0.8L Eneos Auto SJ/MB 20W40 White', 'MIWADA'),
(7, 'P01-019', 'Bottle 1L Eneos Trg SL/MA 10W-40 White', 'MIWADA'),
(8, 'P01-020', 'Bottle 1L Eneos Diesl CF4/DH1 15W40 Gold', 'MIWADA'),
(9, 'P01-025', 'Bottle 1L Honda SN-0W20', 'TARUMA'),
(10, 'P01-025', 'Bottle 1L Honda SN-0W20', 'TARUMA'),
(11, 'P01-026', 'Bottle 4L Honda SN-0W20', 'TARUMA'),
(12, 'P01-026', 'Bottle 4L Honda SN-0W20', 'TARUMA'),
(13, 'P01-033', 'Bottle 0.8L Yamalube SL10W40 Gold', 'MIWADA'),
(14, 'P01-034', 'Bottle 0.8L Yamalube SL10W40 Gold', 'TARUMA'),
(15, 'P01-039', 'Bottle 3.5L Honda 05 CVTF', 'TARUMA'),
(16, 'P01-040', 'Bottle 4L Toyota ATF WS Silver', 'MIWADA'),
(17, 'P01-041', 'Bottle 1L Nissan MTF', 'TARUMA'),
(18, 'P01-042', 'Bottle 1L Nissan Matic', 'TARUMA'),
(19, 'P01-043', 'Bottle 0.8L Eneos Eco  SJ/MA 10W30 White', 'MIWADA'),
(20, 'P01-044', 'Bottle 0.8L Eneos Eco SJ/MB 10W30 White', 'MIWADA'),
(21, 'P01-045', 'Bottle 4L Eneos Molyb Asia 10W40 SM Gold', 'MIWADA'),
(22, 'P01-046', 'Bottle 1L Eneos Molyb Asia 10W40 SM Gold', 'MIWADA'),
(23, 'P01-051', 'Bottle 1L MMC MTF 75W80', 'TARUMA'),
(24, 'P01-052', 'Bottle 1L MMC SN 0W20', 'TARUMA'),
(25, 'P01-052', 'Bottle 1L MMC SN 0W20', 'TARUMA'),
(26, 'P01-053', 'Bottle 4L MMC SN 0W20', 'TARUMA'),
(27, 'P01-053', 'Bottle 4L MMC SN 0W20', 'TARUMA'),
(28, 'P01-054', 'Bottle 1L MMC SL 10W30', 'TARUMA'),
(29, 'P01-054', 'Bottle 1L MMC SL 10W30', 'TARUMA'),
(30, 'P01-055', 'Bottle 4L MMC SL 10W30', 'TARUMA'),
(31, 'P01-056', 'Bottle 1L MMC ATF SP III', 'TARUMA'),
(32, 'P01-057', 'Bottle 1L MMC CF 10W40', 'TARUMA'),
(33, 'P01-057', 'Bottle 1L MMC CF 10W40', 'TARUMA'),
(34, 'P01-058', 'Bottle 5L MMC CF 10W40', 'TARUMA'),
(35, 'P01-058', 'Bottle 5L MMC CF 10W40', 'TARUMA'),
(36, 'P01-060', 'Bottle 1L Honda E-Pro Blue SN 5W30', 'TARUMA'),
(37, 'P01-061', 'Bottle 4L Honda E-Pro Blue SN 5W30', 'TARUMA'),
(38, 'P01-062', 'Bottle 4L Toyota CVTF FE Silver', 'MIWADA'),
(39, 'P01-063', 'Bottle 1L Yamalube Super Sport Blue', 'MIWADA'),
(40, 'P01-064', 'Bottle 4L Yamalube Premium Oil Gold', 'MIWADA'),
(41, 'P01-065', 'Bottle 4L Toyota ATF T-IV Silver', 'MIWADA'),
(42, 'P01-066', 'Bottle 1L MMC CF-4 10W30', 'TARUMA'),
(43, 'P01-066', 'Bottle 1L MMC CF-4 10W30', 'TARUMA'),
(44, 'P01-067', 'Bottle 5L MMC CF-4 10W30', 'TARUMA'),
(45, 'P01-067', 'Bottle 5L MMC CF-4 10W30', 'TARUMA'),
(46, 'P01-068', 'Bottle 0.8L Yamalube 2T Black', 'MIWADA'),
(47, 'P01-069', 'Bottle 0.8L Eneos 2T White', 'MIWADA'),
(48, 'P01-072', 'Bottle 1L Eneos Diesel CI-4 15W40 Gold', 'MIWADA'),
(49, 'P01-073', 'Bottle 4L Eneos Diesel CI-4 15W40 Gold', 'MIWADA'),
(50, 'P01-074', 'Bottle 1L Eneos Motor SN/CF 20W50 White', 'MIWADA'),
(51, 'P01-075', 'Bottle 4L Eneos Motor SN/CF 20W50 White', 'MIWADA'),
(52, 'P01-076', 'Bottle 1L Eneos Motor SN/CF 10W30 White', 'MIWADA'),
(53, 'P01-077', 'Bottle 4L Eneos Motor SN/CF 10W30 White', 'MIWADA'),
(54, 'P01-078', 'Bottle 1L Eneos Mtr Oil SN 0W20 White', 'MIWADA'),
(55, 'P01-078', 'Bottle 1L Eneos Mtr Oil SN 0W20 White', 'MIWADA'),
(56, 'P01-079', 'Bottle 4L Eneos Mtr Oil SN 0W20 White', 'MIWADA'),
(57, 'P01-079', 'Bottle 4L Eneos Mtr Oil SN 0W20 White', 'MIWADA'),
(58, 'P01-080', 'Bottle 1L Eneos Sustina SN/ACEA 5W30', 'TARUMA'),
(59, 'P01-081', 'Bottle 1L Honda Oil MPX 3', 'KP'),
(60, 'P01-082', 'Bottle 1L Honda Oil MPX 3 White', 'MIWADA'),
(61, 'P01-083', 'Bottle 0.8L Honda Oil MPX 3', 'KP'),
(62, 'P01-084', 'Bottle 0.8L Honda Oil MPX 3 White', 'MIWADA'),
(63, 'P01-085', 'Bottle 1L Nissan Ester', 'TARUMA'),
(64, 'P01-086', 'Bottle 4L Eneos Sustina SN/ACEA 5W30', 'TARUMA'),
(65, 'P01-088', 'Bottle 0.8L Yamalube 2T', 'TARUMA'),
(66, 'P01-089', 'Bottle 0.8L Honda Oil MPX 3 White', 'UBS'),
(67, 'P01-090', 'Bottle 1L Mercedes Benz MB229.5', 'MAUSER'),
(68, 'P01-091', 'Bottle 1L Toyota TF Gear LF 75W Grey', 'DINITO'),
(69, 'P01-092', 'Bottle 1L Toyota MT Gear LV 75W Grey', 'DINITO'),
(70, 'P01-093', 'Bottle 1L Eneos CVT Fluid Asia Gold', 'MIWADA'),
(71, 'P01-094', 'Bottle 1L Eneos AT Fluid Gold', 'MIWADA'),
(72, 'P01-098', 'Bottle 5L Kubota CF 15W40 Silver', 'TARUMA'),
(73, 'P01-099', 'Bottle IML 1L Yamalube RS4GP Blue', 'MIWADA'),
(74, 'P01-106', 'Bottle 1L MMC ATF SP III New', 'TARUMA'),
(75, 'P01-107', 'Bottle 1L MMC CF 10W40 New', 'TARUMA'),
(76, 'P01-108', 'Bottle 1L Yamalube Super Sport Blue', 'TARUMA'),
(77, 'P01-110', 'Bottle 1L MMC MTF 75W80 SILVER', 'TARUMA'),
(78, 'P01-112', 'Bottle IML 0.8L New Yml MB 20W40 Copper', 'KP'),
(79, 'P01-113', 'Bottle IML 1L New Yamalube 10W40', 'KP'),
(80, 'P01-114', 'Bottle 0.8L IML New Yml MA 20W40 Silver', 'MIWADA'),
(81, 'P01-115', 'Bottle IML 0.8L New Yml MB 20W40 Copper', 'MIWADA'),
(82, 'P01-116', 'Bottle IML 1L Yamalube 10W40 Black', 'MIWADA'),
(83, 'P01-118', 'Bottle 4L TMO CVTF FE Silver', 'MIWADA'),
(84, 'P01-119', 'Bottle 4L Toyota ATF T-IV Silver', 'MIWADA'),
(85, 'P01-120', 'Bottle 4L Toyota TMO ATF WS Silver', 'MIWADA'),
(86, 'P01-121', 'Bottle 1L MMC ATF MA 1', 'TARUMA'),
(87, 'P01-122', 'Bottle 1L MMC ATF MA 1', 'TARUMA'),
(88, 'P01-136', 'Bottle 1L Honda Marine Gear Oil', 'TARUMA'),
(89, 'P01-137', 'Bottle 1L Eneos Molyb Asia 10W40 SN ', 'MIWADA'),
(90, 'P01-138', 'Bottle 4L Eneos Molyb Asia 10W40 SN ', 'MIWADA'),
(91, 'P01-139', 'Bottle 1L Eneos Auto SJ/MB 20W40', 'MIWADA'),
(92, 'P01-140', 'Bottle 1L Eneos Eco SJ/MB 10W30 ', 'MIWADA'),
(93, 'P01-141', 'Bottle 4L Eneos Motor Oil SN 5W30', 'MIWADA'),
(94, 'P01-142', 'Bottle 1L Eneos Motor Oil SN 5W30', 'MIWADA'),
(95, 'P01-143', 'Bottle 0.8L AHM Oil MPX 1', 'KP'),
(96, 'P01-144', 'Bottle 0.8L AHM Oil MPX 1', 'UBS'),
(97, 'P01-145', 'Bottle 1L AHM Oil MPX 1', 'KP'),
(98, 'P01-146', 'Bottle 1L AHM Oil MPX 1', 'UBS'),
(99, 'P01-147', 'Bottle 1.2L AHM Oil MPX 1', 'UBS'),
(100, 'P01-148', 'Bottle 0.8L AHM Oil MPX 2', 'KP'),
(101, 'P01-149', 'Bottle 0.8L AHM Oil MPX 2', 'UBS'),
(102, 'P01-151', 'Bottle 4L MMC SN 0W20 New', 'TARUMA'),
(103, 'P01-152', 'Bottle 1L MMC SL 10W30 SNI', 'TARUMA'),
(104, 'P01-153', 'Bottle 4L MMC SL 10W30 SNI', 'TARUMA'),
(105, 'P01-154', 'Bottle 5L MMC CF 10W40', 'TARUMA'),
(106, 'P01-155', 'Bottle 1L MMC CF-4 10W30', 'TARUMA'),
(107, 'P01-156', 'Bottle 5L MMC CF-4 10W30', 'TARUMA'),
(108, 'P01-157', 'Bottle 5L Yanmar TF 500T', 'UBS'),
(109, 'P01-158', 'Bottle 5L Eneos Diesel Oil CRDi Pro CJ-4 10W30', 'TARUMA'),
(110, 'P01-159', 'Bottle 1L Eneos Diesel Oil CRDi Pro CJ-4 10W30', 'TARUMA'),
(111, 'P01-160', 'Bottle 1L Toyota TF Gear LF 75W Grey New', 'DINITO'),
(112, 'P01-161', 'Bottle 0.8L Yml. Power Matic 10W40', 'IML TECH'),
(113, 'P01-163', 'Bottle 1L Yamalube Super Matic Blue SNI', 'MIWADA'),
(114, 'P01-164', 'Bottle 1L Yamalube Super Sport Blue SNI', 'TARUMA'),
(115, 'P01-165', 'Bottle 0.8L IML New Yml MA 20W40 Silver SNI', 'KP'),
(116, 'P01-166', 'Bottle IML 0.8L New Yml MB 20W40 Copper SNI', 'KP'),
(117, 'P01-167', 'Bottle IML 1L Yamalube 10W40 Black SNI', 'KP'),
(118, 'P01-168', 'Bottle 0.8L IML New Yml MA 20W40 Silver SNI', 'MIWADA'),
(119, 'P01-169', 'Bottle IML 0.8L New Yml MB 20W40 Copper SNI', 'MIWADA'),
(120, 'P01-170', 'Bottle IML 1L Yamalube 10W40 Black SNI', 'MIWADA'),
(121, 'P01-171', 'Bottle 0.8L Yamalube 2T', 'TARUMA'),
(122, 'P01-172', 'Bottle 1L Toyota MT Gear LV 75W Grey', 'DINITO'),
(123, 'P01-173', 'Bottle 0.8L Yamalube 2T SNI', 'TARUMA'),
(124, 'P01-174', 'Bottle 0.8L Yamalube SL10W40 Gold', 'TARUMA'),
(125, 'P01-175', 'Bottle IML 0.8L New Yml MB 20W40 Copper', 'IML TECH'),
(126, 'P01-178', 'Bottle 1L MMC SN 0W20 SNI', 'TARUMA'),
(127, 'P01-179', 'Bottle 4L MMC SN 0W20 SNI', 'TARUMA'),
(128, 'P01-180', 'Bottle 1L Eneos Gear Oil 75W90 GL5 White SNI', 'MIWADA'),
(129, 'P01-181', 'Bottle 0.8L Eneos 4C SJ/MA 20W40 White SNI', 'MIWADA'),
(130, 'P01-182', 'Bottle 0.8L Eneos Auto SJ/MB 20W40 White SNI', 'MIWADA'),
(131, 'P01-183', 'Bottle 1L Eneos Trg SL/MA 10W-40 White SNI', 'MIWADA'),
(132, 'P01-184', 'Bottle 0.8L Eneos Eco  SJ/MA 10W30 White SNI', 'MIWADA'),
(133, 'P01-185', 'Bottle 0.8L Eneos Eco SJ/MB 10W30 White SNI', 'MIWADA'),
(134, 'P01-186', 'Bottle 0.8L Eneos 2T White SNI', 'MIWADA'),
(135, 'P01-187', 'Bottle 1L Eneos Auto SJ/MB 20W40', 'MIWADA'),
(136, 'P01-188', 'Bottle 1L Eneos Eco SJ/MB 10W30 ', 'MIWADA'),
(137, 'P01-189', 'Bottle 1L MMC CF-4 10W30', 'TARUMA'),
(138, 'P01-190', 'Bottle 5L MMC CF-4 10W30', 'TARUMA'),
(139, 'P01-191', 'Bottle 0.8L Honda Oil MPX 3 White', 'UBS'),
(140, 'P01-192', 'Bottle 1L Honda Oil MPX 3 White SNI', 'KP'),
(141, 'P01-193', 'Bottle 0.8L AHM Oil MPX 2 SNI', 'UBS'),
(142, 'P01-194', 'Bottle 0.8L AHM Oil MPX 2 SNI', 'KP'),
(143, 'P01-195', 'Bottle 0.8L AHM Oil MPX 2 SNI', 'MIWADA'),
(144, 'P01-196', 'Bottle 1L Honda Oil MPX 3 White SNI', 'UBS'),
(145, 'P01-197', 'Bottle 0.8L Honda Oil MPX 3 White', 'MIWADA'),
(146, 'P01-198', 'Bottle 0.8L Honda Oil MPX 3 White', 'KP'),
(147, 'P01-199', 'Bottle 1L MMC CF 10W40 SNI', 'TARUMA'),
(148, 'P01-200', 'Bottle 5L MMC CF 10W40 SNI', 'TARUMA'),
(149, 'P01-201', 'Bottle 0.8L AHM Oil MPX 1 SNI', 'UBS'),
(150, 'P01-202', 'Bottle 1L AHM Oil MPX 1 SNI', 'KP'),
(151, 'P01-203', 'Bottle 1L AHM Oil MPX 1 SNI', 'UBS'),
(152, 'P01-204', 'Bottle 1.2L AHM Oil MPX 1 SNI', 'UBS'),
(153, 'P01-205', 'Bottle 1L Eneos Motor SN 20W50 White SNI', 'MIWADA'),
(154, 'P01-206', 'Bottle 4L Eneos Motor SN 20W50 White SNI', 'MIWADA'),
(155, 'P01-207', 'Bottle 1L Eneos Motor SN 10W30 White SNI', 'MIWADA'),
(156, 'P01-208', 'Bottle 4L Eneos Motor SN 10W30 White SNI', 'MIWADA'),
(157, 'P01-209', 'Bottle 1L Eneos Mtr Oil SN 0W20 SNI', 'MIWADA'),
(158, 'P01-210', 'Bottle 4L Eneos Mtr Oil SN 0W20 SNI', 'MIWADA'),
(159, 'P01-221', 'Bottle 4L Eneos Motor Oil SN 5W30', 'MIWADA'),
(160, 'P01-222', 'Bottle 1L Eneos Motor Oil SN 5W30', 'MIWADA'),
(161, 'P01-223', 'Bottle 1L Honda E-Pro Blue SN 5W30 SNI', 'TARUMA'),
(162, 'P01-224', 'Bottle 4L Honda E-Pro Blue SN 5W30 SNI', 'TARUMA'),
(163, 'P01-225', 'Bottle 1L Eneos AT Fluid Gold', 'MIWADA'),
(164, 'P01-231', 'Bottle 1L Yamalube Super Matic Blue SNI NEW', 'MIWADA'),
(165, 'p01-232', 'Bottle 1L Yamalube Super Matic Blue SNI NEW', 'KP'),
(166, 'p01-233', 'Bottle 1L Yamalube Super Sport Blue SNI NEW NPT', 'KP'),
(167, 'p01-234', 'Bottle 1L Yamalube Super Sport Blue SNI NEW', 'MIWADA'),
(168, 'P01-237', 'Bottle 0.8L Yamalube SL10W40 Gold NEW', 'TARUMA'),
(169, 'P01-238', 'Bottle 0.8L Yamalube 2T SNI', 'TARUMA'),
(170, 'p01-239', 'Bottle IML 1L Yamalube RS4GP Blue new', 'KP'),
(171, 'P01-240', 'Bottle 1L Eneos Diesel CI-4 15W40 Gold', 'MIWADA'),
(172, 'P01-241', 'Bottle 4L Eneos Diesel CI-4 15W40 Gold', 'MIWADA'),
(173, 'P01-242', 'Kubota Engine Oil CF15W40 SNI', 'TARUMA'),
(174, 'P01-243', 'Bottle 5L Eneos Diesel Oil CRDi Pro CJ-4 10W30', 'TARUMA'),
(175, 'P01-244', 'Bottle 1L Eneos Diesel Oil CRDi Pro CJ-4 10W30 NEW', 'TARUMA'),
(176, 'P01-245', 'Bottle 1L Eneos Sustina SN/ACEA 5W30 SNI', 'TARUMA'),
(177, 'p01-246', 'Bottle 4L Eneos Sustina SN/ACEA 5W30 SNI', 'TARUMA'),
(178, 'P01-249', 'Bottle 1L Nissan Ester ( NEW )', 'TARUMA'),
(179, 'P01-250', 'Bottle 1L Honda Marine gear oil SNI', 'TARUMA'),
(180, 'P01-251', 'Bottle 4L Honda E-Pro Blue SN 5W30 SNI', 'KP'),
(181, 'p01-252', 'Bottle 1L Nissan MTF new', 'TARUMA'),
(182, 'P01-253', 'YAMALUBE GEAR OIL GL-4 350ML + CAP SEAL', 'ENEOS CORP'),
(183, 'P01-254', 'YAMALUBE GEAR OIL GL-4 750ML + CAP SEAL', 'ENEOS CORP'),
(184, 'P01-255', 'YAMALUBE GEAR OIL GL-5 750ML + CAP SEAL', 'ENEOS CORP'),
(185, 'P01-256', 'Bottle 3.5L Honda 05 CVTF NEW NPT', 'TARUMA'),
(186, 'P01-257', 'Bottle 5L Kubota CF 15W40 Silver NEW', 'TARUMA'),
(187, 'P01-258', 'Bottle 1L MMC CF-4 10W30', 'TARUMA'),
(188, 'P01-259', 'Bottle 4L MMC SN 0W20 New', 'TARUMA'),
(189, 'P01-260', 'Bottle IML 1L Yamalube RS4GP Blue', 'KP'),
(190, 'P01-261', 'Bottle 0.8L AHM Oil MPX 1 SNI NEW NPT', 'UBS'),
(191, 'P01-262', 'Bottle 0.8L AHM Oil MPX 2 SNI NEW NPT', 'UBS'),
(192, 'P01-263', 'Bottle 0.8L AHM Oil MPX 2 SNI NEW', 'KP'),
(193, 'P01-264', 'Bottle 0.8L AHM Oil MPX 2 SNI NEW NPT', 'MIWADA'),
(194, 'P01-265', 'Bottle 1L Eneos Gear oil GL-5  80w90 ', 'MIWADA'),
(195, 'P01-268', 'BOTTLE ENEOS AT FLUID 1L', 'MIWADA'),
(196, 'P01-269', 'Bottle 1L Eneos Diesel CI-4 15W40 GOLD  NEW', 'TARUMA'),
(197, 'p01-270', 'Bottle 5L Eneos Diesel CI-4 15W40 Gold', 'TARUMA'),
(198, 'P01-272', 'Bottle 1L AHM Oil MPX 1 SNI NEW NPT', 'UBS'),
(199, 'p01-273', 'Bottle 1.2L AHM Oil MPX 1', 'UBS'),
(200, 'P01-275', 'Bottle 1L Honda Oil MPX 3 WhiteNEW NPT', 'UBS'),
(201, 'p01-276', 'Bottle 0.8L Honda Oil MPX 3 new', 'UBS'),
(202, 'P01-277', 'Bottle 0.8L Honda Oil MPX 3 White', 'MIWADA'),
(203, 'p01-278', 'Bottle 0.8L Honda Oil MPX 3 White new', 'KP'),
(204, 'P01-279', 'Bottle 1L MMC SN 0W20 NEW LSPr NPB', 'TARUMA'),
(205, 'P01-280', 'Bottle 0.8L Eneos 4C SJ/MA 20W40 White SNI', 'MIWADA'),
(206, 'P01-281', 'Bottle 0.8L Eneos Eco SJ/MB 10W30 SNI ORIGINAL', 'MIWADA'),
(207, 'P01-282', 'Bottle 1L Honda E-Pro Blue SN 5W30 NEW', 'TARUMA'),
(208, 'P01-283', 'Bottle 4L Honda E-Pro Blue SN 5W30 NEW', 'TARUMA'),
(209, 'P01-284', 'Bottle 4L Honda E-Pro Blue SN 5W30 ', 'KP'),
(210, 'P01-286', 'BOTOL YML OBM 2T 1L set cap', 'KP'),
(211, 'P01-287', 'BOTOL YML OBM 2T 4L set cap', 'KP'),
(212, 'p01-290', 'BOTOL ENEOS DIESEL OIL CF-40 5L', 'TARUMA'),
(213, 'P01-291', 'Bottle 0.8L Eneos Auto SJ/MB 20W40 White ORIGINAL SNI', 'MIWADA'),
(214, 'P01-292', 'Bottle 1L Honda Marine Gear Oil ORIGINAL SNI', 'TARUMA'),
(215, 'P01-293', 'Bottle 0.8L Eneos Eco  SJ/MA 10W30 White SNI', 'MIWADA'),
(216, 'P01-294', 'Bottle 1L Eneos Trg SL/MA 10W-40 White NEW', 'MIWADA'),
(217, 'P01-295', 'Bottle 0.8L Yamalube 2T INDONESIA', 'TARUMA'),
(218, 'P01-296', 'Bottle 1L MMC MTF 75W85 1L BLACK', 'TARUMA'),
(219, 'P01-297', 'MMC GEAR OIL ECO LV 75W80 GL4 1L BLACK', 'TARUMA'),
(220, 'p01-298', 'MMC SH GEAR OIL GL-5 80 1L', 'TARUMA'),
(221, 'p01-299', 'BOTTLE DAIHATSU CVT FLUID 1L', 'UBS'),
(222, 'p01-300', 'BOTTLE HONDA E-PRO GOLD SN0W20  1L', 'TARUMA'),
(223, 'p01-302', 'BOTTLE HONDA E-PRO GOLD SN0W20  4L', 'TARUMA'),
(224, 'P01-303', 'BOTTLE HONDA E-PRO GOLD SN0W20  4L', 'KP'),
(225, 'P02-001', 'SK38/23 S5 SFB 18 <*TF*IHS*YMH*BLACK 61', 'BERICAP'),
(226, 'P02-002', 'SK38/23 Cap Yamalube Gold', 'BERICAP'),
(227, 'P02-003', 'SK38/23 CAP YAMALUBE Red 21', 'BERICAP'),
(228, 'P02-005', 'Cap Black No Emboss', 'MIWADA'),
(229, 'P02-005', 'Cap Black No Emboss', 'MIWADA'),
(230, 'P02-007', 'Cap Gold Emboss of ENEOS', 'MIWADA'),
(231, 'P02-008', 'CAP GOLD EMBOSS OF HONDA', 'TARUMA'),
(232, 'P02-009', 'Cap Red Emboss of ENEOS', 'MIWADA'),
(233, 'P02-010', 'Cap RED NO emboss of HONDA ', 'TARUMA'),
(234, 'P02-011', 'Cap Orange No Emboss of NISSAN', 'TARUMA'),
(235, 'P02-014', 'Cap Grey Emboss of MMC', 'TARUMA'),
(236, 'P02-015', 'Cap Blue Emboss of Honda', 'TARUMA'),
(237, 'P02-016', 'Cap Black Emboss of ENEOS', 'MIWADA'),
(238, 'p02-017', 'Cap RED emboss of AHM MPX', 'KP'),
(239, 'P02-018', 'Cap Purple NO Emboss of  NISSAN', 'TARUMA'),
(240, 'P02-019', 'Cap Gold no Emboss', 'TARUMA'),
(241, 'P02-020', 'Cap RED emboss of AHM MPX', 'UBS'),
(242, 'P02-021', 'CAP TOYOTA Grey No Emboss ', 'DINITO'),
(243, 'P02-022', 'Cap Grey no Emboss', 'TARUMA'),
(244, 'P02-025', 'CAP SILVER NO EMBOSS', 'MIWADA'),
(245, 'p02-027', 'Cap Black no emboss of HONDA MARINE ', 'TARUMA'),
(246, 'P02-028', 'Cap Blue emboss of AHM MPX', 'UBS'),
(247, 'P02-030', 'Cap Blue emboss of AHM MPX', 'KP'),
(248, 'p02-031', 'Cap Blue emboss of HONDA new', 'KP'),
(249, 'P02-035', 'Cap Red Emboss Eneos', 'MIWADA'),
(250, 'P02-036', 'Cap RED emboss of MMC', 'TARUMA'),
(251, 'P02-038', 'CAP YAMALUBE BLACK', 'KP'),
(252, 'P02-039', 'CAP YAMALUBE GOLD', 'KP'),
(253, 'P02-040', 'CAP YAMALUBE RED', 'KP'),
(254, 'P02-041', 'CAP RED NO EMBOS DAIHATSU', 'UBS'),
(255, 'P03-003', '(GO) YML SL 10W40 (0.8Lx24)', 'ORIENTAL ASAHI'),
(256, 'P03-003', '(GO) YML SL 10W40 (0.8Lx24)', 'ORIENTAL ASAHI'),
(257, 'P03-009', 'Eneos Diesel Oil CF-4/DH-1 15W-40 (4Lx6)', 'ORIENTAL ASAHI'),
(258, 'P03-009', 'Eneos Diesel Oil CF-4/DH-1 15W-40 (4Lx6)', 'ORIENTAL ASAHI'),
(259, 'P03-010', 'Eneos Gear Oil T/A 75W-90 GL-5 (1Lx12)', 'ORIENTAL ASAHI'),
(260, 'P03-010', 'Eneos Gear Oil T/A 75W-90 GL-5 (1Lx12)', 'ORIENTAL ASAHI'),
(261, 'P03-010', 'Eneos Gear Oil T/A 75W-90 GL-5 (1Lx12)', 'ORIENTAL ASAHI'),
(262, 'P03-010', 'Eneos Gear Oil T/A 75W-90 GL-5 (1Lx12)', 'ORIENTAL ASAHI'),
(263, 'P03-015', 'Eneos 4Cycle Oil C/A SJ/MA 20W40(0.8Lx12)', 'ORIENTAL ASAHI'),
(264, 'P03-015', 'Eneos 4Cycle Oil C/A SJ/MA 20W40(0.8Lx12)', 'ORIENTAL ASAHI'),
(265, 'P03-016', 'Eneos 4Cycle Auto SJ/MB 20W40(0.8Lx12)', 'ORIENTAL ASAHI'),
(266, 'P03-016', 'Eneos 4Cycle Auto SJ/MB 20W40(0.8Lx12)', 'ORIENTAL ASAHI'),
(267, 'P03-017', 'Eneos 4Cycle T/Asia SL/MA 10W40(1.0Lx12)', 'ORIENTAL ASAHI'),
(268, 'P03-017', 'Eneos 4Cycle T/Asia SL/MA 10W40(1.0Lx12)', 'ORIENTAL ASAHI'),
(269, 'P03-018', 'Eneos Diesel Oil CF-4/DH-1 15W-40(1Lx12)', 'ORIENTAL ASAHI'),
(270, 'P03-018', 'Eneos Diesel Oil CF-4/DH-1 15W-40(1Lx12)', 'ORIENTAL ASAHI'),
(271, 'P03-023', 'Nissan (1Lx24)', 'ORIENTAL ASAHI'),
(272, 'P03-023', 'Nissan (1Lx24)', 'ORIENTAL ASAHI'),
(273, 'P03-023', 'Nissan (1Lx24)', 'ORIENTAL ASAHI'),
(274, 'P03-023', 'Nissan (1Lx24)', 'ORIENTAL ASAHI'),
(275, 'P03-023', 'Nissan (1Lx24)', 'ORIENTAL ASAHI'),
(276, 'P03-023', 'Nissan (1Lx24)', 'ORIENTAL ASAHI'),
(277, 'P03-024', 'Yamalube Super Sport (1Lx12)', 'ORIENTAL ASAHI'),
(278, 'P03-024', 'Yamalube Super Sport (1Lx12)', 'ORIENTAL ASAHI'),
(279, 'P03-025', 'Honda 05 CVTF Oil (3.5Lx6)', 'ORIENTAL ASAHI'),
(280, 'P03-025', 'Honda 05 CVTF Oil (3.5Lx6)', 'ORIENTAL ASAHI'),
(281, 'P03-026', 'Toyota ATF WS (4Lx4)', 'ORIENTAL ASAHI'),
(282, 'P03-026', 'Toyota ATF WS (4Lx4)', 'ORIENTAL ASAHI'),
(283, 'P03-026', 'Toyota ATF WS (4Lx4)', 'ORIENTAL ASAHI'),
(284, 'P03-026', 'Toyota ATF WS (4Lx4)', 'ORIENTAL ASAHI'),
(285, 'P03-027', 'Honda E-Pro Gold SN0W20 (1Lx24)', 'ORIENTAL ASAHI'),
(286, 'P03-027', 'Honda E-Pro Gold SN0W20 (1Lx24)', 'ORIENTAL ASAHI'),
(287, 'P03-027', 'Honda E-Pro Gold SN0W20 (1Lx24)', 'ORIENTAL ASAHI'),
(288, 'P03-027', 'Honda E-Pro Gold SN0W20 (1Lx24)', 'ORIENTAL ASAHI'),
(289, 'P03-028', 'Honda E-Pro Gold SN0W20 (4Lx6)', 'ORIENTAL ASAHI'),
(290, 'P03-028', 'Honda E-Pro Gold SN0W20 (4Lx6)', 'ORIENTAL ASAHI'),
(291, 'P03-028', 'Honda E-Pro Gold SN0W20 (4Lx6)', 'ORIENTAL ASAHI'),
(292, 'P03-028', 'Honda E-Pro Gold SN0W20 (4Lx6)', 'ORIENTAL ASAHI'),
(293, 'P03-029', 'Eneos Molybdenum Asia 10W40 SM (4Lx6)', 'ORIENTAL ASAHI'),
(294, 'P03-029', 'Eneos Molybdenum Asia 10W40 SM (4Lx6)', 'ORIENTAL ASAHI'),
(295, 'P03-030', 'Eneos Molybdenum Asia 10W40 SM (1Lx12)', 'ORIENTAL ASAHI'),
(296, 'P03-030', 'Eneos Molybdenum Asia 10W40 SM (1Lx12)', 'ORIENTAL ASAHI'),
(297, 'P03-031', 'Eneos Eco 10W30 SJ/MA (0.8Lx12)', 'ORIENTAL ASAHI'),
(298, 'P03-031', 'Eneos Eco 10W30 SJ/MA (0.8Lx12)', 'ORIENTAL ASAHI'),
(299, 'P03-031', 'Eneos Eco 10W30 SJ/MA (0.8Lx12)', 'ORIENTAL ASAHI'),
(300, 'P03-031', 'Eneos Eco 10W30 SJ/MA (0.8Lx12)', 'ORIENTAL ASAHI'),
(301, 'P03-032', 'Eneos Eco 10W30 SJ/MB (0.8Lx12)', 'ORIENTAL ASAHI'),
(302, 'P03-032', 'Eneos Eco 10W30 SJ/MB (0.8Lx12)', 'ORIENTAL ASAHI'),
(303, 'P03-032', 'Eneos Eco 10W30 SJ/MB (0.8Lx12)', 'ORIENTAL ASAHI'),
(304, 'P03-032', 'Eneos Eco 10W30 SJ/MB (0.8Lx12)', 'ORIENTAL ASAHI'),
(305, 'P03-033', 'Yamalube Power Matic (0.8Lx24)', 'ORIENTAL ASAHI'),
(306, 'P03-033', 'Yamalube Power Matic (0.8Lx24)', 'ORIENTAL ASAHI'),
(307, 'P03-035', 'MMC MTF 75W80 (1Lx12)', 'ORIENTAL ASAHI'),
(308, 'P03-035', 'MMC MTF 75W80 (1Lx12)', 'ORIENTAL ASAHI'),
(309, 'P03-036', 'MMC SN 0W20 (1Lx12)', 'ORIENTAL ASAHI'),
(310, 'P03-036', 'MMC SN 0W20 (1Lx12)', 'ORIENTAL ASAHI'),
(311, 'P03-037', 'MMC SN 0W20 (4Lx6)', 'ORIENTAL ASAHI'),
(312, 'P03-037', 'MMC SN 0W20 (4Lx6)', 'ORIENTAL ASAHI'),
(313, 'P03-038', 'MMC SL 10W30 (1Lx12)', 'ORIENTAL ASAHI'),
(314, 'P03-038', 'MMC SL 10W30 (1Lx12)', 'ORIENTAL ASAHI'),
(315, 'P03-039', 'MMC SL 10W30 (4Lx6)', 'ORIENTAL ASAHI'),
(316, 'P03-039', 'MMC SL 10W30 (4Lx6)', 'ORIENTAL ASAHI'),
(317, 'P03-040', 'MMC ATF SP III (1Lx12)', 'ORIENTAL ASAHI'),
(318, 'P03-040', 'MMC ATF SP III (1Lx12)', 'ORIENTAL ASAHI'),
(319, 'P03-041', 'MMC CF 10W40 (1Lx12)', 'ORIENTAL ASAHI'),
(320, 'P03-041', 'MMC CF 10W40 (1Lx12)', 'ORIENTAL ASAHI'),
(321, 'P03-041', 'MMC CF 10W40 (1Lx12)', 'ORIENTAL ASAHI'),
(322, 'P03-041', 'MMC CF 10W40 (1Lx12)', 'ORIENTAL ASAHI'),
(323, 'P03-042', 'MMC CF 10W40 (5Lx6)', 'ORIENTAL ASAHI'),
(324, 'P03-042', 'MMC CF 10W40 (5Lx6)', 'ORIENTAL ASAHI'),
(325, 'P03-044', 'Toyota CVTF FE (4Lx4)', 'ORIENTAL ASAHI'),
(326, 'P03-044', 'Toyota CVTF FE (4Lx4)', 'ORIENTAL ASAHI'),
(327, 'P03-045', 'MMC CF-4 10W30 (1Lx12)', 'ORIENTAL ASAHI'),
(328, 'P03-045', 'MMC CF-4 10W30 (1Lx12)', 'ORIENTAL ASAHI'),
(329, 'P03-046', 'MMC CF-4 10W30 (5Lx6)', 'ORIENTAL ASAHI'),
(330, 'P03-046', 'MMC CF-4 10W30 (5Lx6)', 'ORIENTAL ASAHI'),
(331, 'P03-047', 'Honda E-Pro Blue (1Lx24)', 'ORIENTAL ASAHI'),
(332, 'P03-047', 'Honda E-Pro Blue (1Lx24)', 'ORIENTAL ASAHI'),
(333, 'P03-047', 'Honda E-Pro Blue (1Lx24)', 'ORIENTAL ASAHI'),
(334, 'P03-047', 'Honda E-Pro Blue (1Lx24)', 'ORIENTAL ASAHI'),
(335, 'P03-048', 'Honda E-Pro Blue (4Lx6)', 'ORIENTAL ASAHI'),
(336, 'P03-048', 'Honda E-Pro Blue (4Lx6)', 'ORIENTAL ASAHI'),
(337, 'P03-048', 'Honda E-Pro Blue (4Lx6)', 'ORIENTAL ASAHI'),
(338, 'P03-048', 'Honda E-Pro Blue (4Lx6)', 'ORIENTAL ASAHI'),
(339, 'P03-049', 'Yamalube Premium Oil (4Lx6)', 'ORIENTAL ASAHI'),
(340, 'P03-049', 'Yamalube Premium Oil (4Lx6)', 'ORIENTAL ASAHI'),
(341, 'P03-050', 'Toyota ATF T-IV (4Lx4)', 'ORIENTAL ASAHI'),
(342, 'P03-050', 'Toyota ATF T-IV (4Lx4)', 'ORIENTAL ASAHI'),
(343, 'P03-050', 'Toyota ATF T-IV (4Lx4)', 'ORIENTAL ASAHI'),
(344, 'P03-050', 'Toyota ATF T-IV (4Lx4)', 'ORIENTAL ASAHI'),
(345, 'P03-052', 'Eneos 2T (0.7Lx12)', 'SKL'),
(346, 'P03-052', 'Eneos 2T (0.7Lx12)', 'SKL'),
(347, 'P03-052', 'Eneos 2T (0.7Lx12)', 'SKL'),
(348, 'P03-052', 'Eneos 2T (0.7Lx12)', 'SKL'),
(349, 'P03-054', 'Eneos Diesel CI-4 15W40 (1Lx12)', 'ORIENTAL ASAHI'),
(350, 'P03-054', 'Eneos Diesel CI-4 15W40 (1Lx12)', 'ORIENTAL ASAHI'),
(351, 'P03-054', 'Eneos Diesel CI-4 15W40 (1Lx12)', 'ORIENTAL ASAHI'),
(352, 'P03-054', 'Eneos Diesel CI-4 15W40 (1Lx12)', 'ORIENTAL ASAHI'),
(353, 'P03-055', 'Eneos Diesel CI-4 15W40 (4Lx6)', 'ORIENTAL ASAHI'),
(354, 'P03-055', 'Eneos Diesel CI-4 15W40 (4Lx6)', 'ORIENTAL ASAHI'),
(355, 'P03-055', 'Eneos Diesel CI-4 15W40 (4Lx6)', 'ORIENTAL ASAHI'),
(356, 'P03-055', 'Eneos Diesel CI-4 15W40 (4Lx6)', 'ORIENTAL ASAHI'),
(357, 'P03-056', 'Eneos Mtr Oil SN/CF 10W30 (1Lx12)', 'ORIENTAL ASAHI'),
(358, 'P03-056', 'Eneos Mtr Oil SN/CF 10W30 (1Lx12)', 'ORIENTAL ASAHI'),
(359, 'P03-057', 'Eneos Mtr Oil SN/CF 10W30 (4Lx6)', 'ORIENTAL ASAHI'),
(360, 'P03-057', 'Eneos Mtr Oil SN/CF 10W30 (4Lx6)', 'ORIENTAL ASAHI'),
(361, 'P03-058', 'Eneos Mtr Oil SN/CF 20W50 (1Lx12)', 'ORIENTAL ASAHI'),
(362, 'P03-058', 'Eneos Mtr Oil SN/CF 20W50 (1Lx12)', 'ORIENTAL ASAHI'),
(363, 'P03-058', 'Eneos Mtr Oil SN/CF 20W50 (1Lx12)', 'ORIENTAL ASAHI'),
(364, 'P03-058', 'Eneos Mtr Oil SN/CF 20W50 (1Lx12)', 'ORIENTAL ASAHI'),
(365, 'P03-059', 'Eneos Mtr Oil SN/CF 20W50 (4Lx6)', 'ORIENTAL ASAHI'),
(366, 'P03-059', 'Eneos Mtr Oil SN/CF 20W50 (4Lx6)', 'ORIENTAL ASAHI'),
(367, 'P03-059', 'Eneos Mtr Oil SN/CF 20W50 (4Lx6)', 'ORIENTAL ASAHI'),
(368, 'P03-059', 'Eneos Mtr Oil SN/CF 20W50 (4Lx6)', 'ORIENTAL ASAHI'),
(369, 'P03-060', 'Eneos Mtr Oil SN 0W20 (1Lx12)', 'ORIENTAL ASAHI'),
(370, 'P03-060', 'Eneos Mtr Oil SN 0W20 (1Lx12)', 'ORIENTAL ASAHI'),
(371, 'P03-060', 'Eneos Mtr Oil SN 0W20 (1Lx12)', 'ORIENTAL ASAHI'),
(372, 'P03-060', 'Eneos Mtr Oil SN 0W20 (1Lx12)', 'ORIENTAL ASAHI'),
(373, 'P03-060', 'Eneos Mtr Oil SN 0W20 (1Lx12)', 'ORIENTAL ASAHI'),
(374, 'P03-060', 'Eneos Mtr Oil SN 0W20 (1Lx12)', 'ORIENTAL ASAHI'),
(375, 'P03-061', 'Eneos Mtr Oil SN 0W20 (4Lx6)', 'ORIENTAL ASAHI'),
(376, 'P03-061', 'Eneos Mtr Oil SN 0W20 (4Lx6)', 'ORIENTAL ASAHI'),
(377, 'P03-061', 'Eneos Mtr Oil SN 0W20 (4Lx6)', 'ORIENTAL ASAHI'),
(378, 'P03-061', 'Eneos Mtr Oil SN 0W20 (4Lx6)', 'ORIENTAL ASAHI'),
(379, 'P03-061', 'Eneos Mtr Oil SN 0W20 (4Lx6)', 'ORIENTAL ASAHI'),
(380, 'P03-061', 'Eneos Mtr Oil SN 0W20 (4Lx6)', 'ORIENTAL ASAHI'),
(381, 'P03-062', 'Eneos Sustina SN/ACEA 5W30 (1Lx12)', 'ORIENTAL ASAHI'),
(382, 'P03-062', 'Eneos Sustina SN/ACEA 5W30 (1Lx12)', 'ORIENTAL ASAHI'),
(383, 'P03-063', 'Eneos Sustina SN/ACEA 5W30 (4Lx6)', 'ORIENTAL ASAHI'),
(384, 'P03-063', 'Eneos Sustina SN/ACEA 5W30 (4Lx6)', 'ORIENTAL ASAHI'),
(385, 'P03-064', 'Kubota Engine Oil (5Lx6)', 'ORIENTAL ASAHI'),
(386, 'P03-064', 'Kubota Engine Oil (5Lx6)', 'ORIENTAL ASAHI'),
(387, 'P03-065', 'Yamalube Motor New SJ/MA 20W40 (0.8LX24)', 'ORIENTAL ASAHI'),
(388, 'P03-065', 'Yamalube Motor New SJ/MA 20W40 (0.8LX24)', 'ORIENTAL ASAHI'),
(389, 'P03-065', 'Yamalube Motor New SJ/MA 20W40 (0.8LX24)', 'ORIENTAL ASAHI'),
(390, 'P03-065', 'Yamalube Motor New SJ/MA 20W40 (0.8LX24)', 'ORIENTAL ASAHI'),
(391, 'P03-065', 'Yamalube Motor New SJ/MA 20W40 (0.8LX24)', 'ORIENTAL ASAHI'),
(392, 'P03-065', 'Yamalube Motor New SJ/MA 20W40 (0.8LX24)', 'ORIENTAL ASAHI'),
(393, 'P03-065', 'Yamalube Motor New SJ/MA 20W40 (0.8LX24)', 'ORIENTAL ASAHI'),
(394, 'P03-065', 'Yamalube Motor New SJ/MA 20W40 (0.8LX24)', 'ORIENTAL ASAHI'),
(395, 'P03-066', 'Yamalube Matic New SJ/MB 20W40 (0.8LX24)', 'ORIENTAL ASAHI'),
(396, 'P03-066', 'Yamalube Matic New SJ/MB 20W40 (0.8LX24)', 'ORIENTAL ASAHI'),
(397, 'P03-066', 'Yamalube Matic New SJ/MB 20W40 (0.8LX24)', 'ORIENTAL ASAHI'),
(398, 'P03-066', 'Yamalube Matic New SJ/MB 20W40 (0.8LX24)', 'ORIENTAL ASAHI'),
(399, 'P03-067', 'Eneos CVT Fluid Asia (1Lx12)', 'ORIENTAL ASAHI'),
(400, 'P03-067', 'Eneos CVT Fluid Asia (1Lx12)', 'ORIENTAL ASAHI'),
(401, 'P03-068', 'Eneos Multi Asia AT Fluid  (1Lx12)', 'ORIENTAL ASAHI'),
(402, 'P03-068', 'Eneos Multi Asia AT Fluid  (1Lx12)', 'ORIENTAL ASAHI'),
(403, 'P03-069', 'AHM Oil MPX 3 (1Lx24)', 'SKL'),
(404, 'P03-069', 'AHM Oil MPX 3 (1Lx24)', 'SKL'),
(405, 'P03-070', 'AHM Oil MPX 3 (0.8Lx24)', 'SKL'),
(406, 'P03-070', 'AHM Oil MPX 3 (0.8Lx24)', 'SKL'),
(407, 'P03-071', 'Mercedes Benz MB229.5 (1Lx12)', 'ORIENTAL ASAHI'),
(408, 'P03-071', 'Mercedes Benz MB229.5 (1Lx12)', 'ORIENTAL ASAHI'),
(409, 'P03-072', 'Toyota TF Gear LF 75W (1Lx12)', 'ORIENTAL ASAHI'),
(410, 'P03-072', 'Toyota TF Gear LF 75W (1Lx12)', 'ORIENTAL ASAHI'),
(411, 'P03-073', 'Toyota MT Gear LV 75W (1Lx12)', 'ORIENTAL ASAHI'),
(412, 'P03-073', 'Toyota MT Gear LV 75W (1Lx12)', 'ORIENTAL ASAHI'),
(413, 'P03-073', 'Toyota MT Gear LV 75W (1Lx12)', 'ORIENTAL ASAHI'),
(414, 'P03-073', 'Toyota MT Gear LV 75W (1Lx12)', 'ORIENTAL ASAHI'),
(415, 'P03-074', 'Yamalube Mtr (Sport) New SL10W40 (1Lx24)', 'ORIENTAL ASAHI'),
(416, 'P03-074', 'Yamalube Mtr (Sport) New SL10W40 (1Lx24)', 'ORIENTAL ASAHI'),
(417, 'p03-077', 'Kubota Engine Oil  CF (5Lx6)', 'ORIENTAL ASAHI'),
(418, 'p03-077', 'Kubota Engine Oil  CF (5Lx6)', 'ORIENTAL ASAHI'),
(419, 'P03-078', 'Yamalube 2T (0.7Lx24)', 'ORIENTAL ASAHI'),
(420, 'P03-078', 'Yamalube 2T (0.7Lx24)', 'ORIENTAL ASAHI'),
(421, 'P03-079', 'Yamalube Super Matic (1Lx12)', 'ORIENTAL ASAHI'),
(422, 'P03-079', 'Yamalube Super Matic (1Lx12)', 'ORIENTAL ASAHI'),
(423, 'P03-080', 'Yamalube RS4GP Blue (1Lx12)', 'ORIENTAL ASAHI'),
(424, 'P03-080', 'Yamalube RS4GP Blue (1Lx12)', 'ORIENTAL ASAHI'),
(425, 'P03-081', 'MMC CF 10W40 (1Lx12) New', 'ORIENTAL ASAHI'),
(426, 'P03-081', 'MMC CF 10W40 (1Lx12) New', 'ORIENTAL ASAHI'),
(427, 'P03-082', 'MMC ATF SP III (1Lx12) New', 'ORIENTAL ASAHI'),
(428, 'P03-082', 'MMC ATF SP III (1Lx12) New', 'ORIENTAL ASAHI'),
(429, 'P03-083', 'MMC MTF 75W80 (1Lx12) New', 'ORIENTAL ASAHI'),
(430, 'P03-083', 'MMC MTF 75W80 (1Lx12) New', 'ORIENTAL ASAHI'),
(431, 'P03-084', 'Toyota CVTF FE (4Lx4)', 'ORIENTAL ASAHI'),
(432, 'P03-084', 'Toyota CVTF FE (4Lx4)', 'ORIENTAL ASAHI'),
(433, 'P03-085', 'MMC ATF MA 1 (1Lx12)', 'ORIENTAL ASAHI'),
(434, 'P03-085', 'MMC ATF MA 1 (1Lx12)', 'ORIENTAL ASAHI'),
(435, 'P03-086', 'MMC ATF PA  (1Lx12)', 'ORIENTAL ASAHI'),
(436, 'P03-086', 'MMC ATF PA  (1Lx12)', 'ORIENTAL ASAHI'),
(437, 'P03-087', 'MMC SN 0W20 (1Lx12)', 'ORIENTAL ASAHI'),
(438, 'P03-087', 'MMC SN 0W20 (1Lx12)', 'ORIENTAL ASAHI'),
(439, 'P03-088', 'AHM Oil MPX 1 (1.2Lx24)', 'SKL'),
(440, 'P03-088', 'AHM Oil MPX 1 (1.2Lx24)', 'SKL'),
(441, 'P03-089', 'AHM Oil MPX 1 (1.0Lx24)', 'SKL'),
(442, 'P03-089', 'AHM Oil MPX 1 (1.0Lx24)', 'SKL'),
(443, 'P03-090', 'AHM Oil MPX 1 (0.8Lx24)', 'SKL'),
(444, 'P03-090', 'AHM Oil MPX 1 (0.8Lx24)', 'SKL'),
(445, 'P03-091', 'AHM Oil MPX 2 (0.8Lx24)', 'SKL'),
(446, 'P03-091', 'AHM Oil MPX 2 (0.8Lx24)', 'SKL'),
(447, 'P03-104', 'Yamalube Power Matic (0.8Lx24)', 'ORIENTAL ASAHI'),
(448, 'P03-104', 'Yamalube Power Matic (0.8Lx24)', 'ORIENTAL ASAHI'),
(449, 'P03-106', 'MMC SN 0W20 (4Lx6) New', 'ORIENTAL ASAHI'),
(450, 'P03-106', 'MMC SN 0W20 (4Lx6) New', 'ORIENTAL ASAHI'),
(451, 'P03-107', 'MMC CF 10W40 (5Lx6) New', 'ORIENTAL ASAHI'),
(452, 'P03-107', 'MMC CF 10W40 (5Lx6) New', 'ORIENTAL ASAHI'),
(453, 'P03-114', 'MMC CF-4 10W30 (1Lx12) New', 'ORIENTAL ASAHI'),
(454, 'P03-114', 'MMC CF-4 10W30 (1Lx12) New', 'ORIENTAL ASAHI'),
(455, 'P03-115', 'MMC SL 10W30 (1Lx12) New', 'ORIENTAL ASAHI'),
(456, 'P03-115', 'MMC SL 10W30 (1Lx12) New', 'ORIENTAL ASAHI'),
(457, 'P03-116', 'MMC SL 10W30 (4Lx6) New', 'ORIENTAL ASAHI'),
(458, 'P03-116', 'MMC SL 10W30 (4Lx6) New', 'ORIENTAL ASAHI'),
(459, 'P03-117', 'MMC CF-4 10W30 (5Lx6) New', 'ORIENTAL ASAHI'),
(460, 'P03-117', 'MMC CF-4 10W30 (5Lx6) New', 'ORIENTAL ASAHI'),
(461, 'P03-118', 'Yanmar TF 500T ( 5Lx6 )', 'ORIENTAL ASAHI'),
(462, 'P03-118', 'Yanmar TF 500T ( 5Lx6 )', 'ORIENTAL ASAHI'),
(463, 'P03-129', 'MMC CF-4 10W30 (1Lx12) SNI', 'ORIENTAL ASAHI'),
(464, 'P03-129', 'MMC CF-4 10W30 (1Lx12) SNI', 'ORIENTAL ASAHI'),
(465, 'P03-130', 'MMC CF-4 10W30 (5Lx6) SNI', 'ORIENTAL ASAHI'),
(466, 'P03-130', 'MMC CF-4 10W30 (5Lx6) SNI', 'ORIENTAL ASAHI'),
(467, 'P03-131', 'Eneos Mtr Oil SN 20W50 (1Lx12)', 'ORIENTAL ASAHI'),
(468, 'P03-131', 'Eneos Mtr Oil SN 20W50 (1Lx12)', 'ORIENTAL ASAHI'),
(469, 'P03-132', 'Eneos Mtr Oil SN 20W50 (4Lx6)', 'ORIENTAL ASAHI'),
(470, 'P03-132', 'Eneos Mtr Oil SN 20W50 (4Lx6)', 'ORIENTAL ASAHI'),
(471, 'P03-133', 'Eneos Mtr Oil SN 10W30 (1Lx12)', 'ORIENTAL ASAHI'),
(472, 'P03-133', 'Eneos Mtr Oil SN 10W30 (1Lx12)', 'ORIENTAL ASAHI'),
(473, 'P03-134', 'Eneos Mtr Oil SN 10W30 (4Lx6)', 'ORIENTAL ASAHI'),
(474, 'P03-134', 'Eneos Mtr Oil SN 10W30 (4Lx6)', 'ORIENTAL ASAHI'),
(475, 'P03-135', 'MMC CF 10W40 (1Lx12) New', 'ORIENTAL ASAHI'),
(476, 'P03-135', 'MMC CF 10W40 (1Lx12) New', 'ORIENTAL ASAHI'),
(477, 'P03-136', 'MMC CF 10W40 (5Lx6) New', 'ORIENTAL ASAHI'),
(478, 'P03-136', 'MMC CF 10W40 (5Lx6) New', 'ORIENTAL ASAHI'),
(479, 'P03-142', '(GO) YML SL 10W40 (0.8Lx24) NEW', 'ORIENTAL ASAHI'),
(480, 'P03-142', '(GO) YML SL 10W40 (0.8Lx24) NEW', 'ORIENTAL ASAHI'),
(481, 'P03-143', 'Yamalube Super SPORT  NEW SNI (1Lx12)', 'ORIENTAL ASAHI'),
(482, 'P03-144', 'CARTON YAMALUBE 2 STROKE 0.7LX24', 'ORIENTAL ASAHI'),
(483, 'P03-145', 'Yamalube Super Matic  NEW SNI (1Lx12)', 'ORIENTAL ASAHI'),
(484, 'P03-146', 'Yamalube RS4GP 10W40 NEW (1Lx12)', 'ORIENTAL ASAHI'),
(485, 'p03-147', 'Yamalube Motor New SJ/MA 20W40 (0.8LX24) NEW SNI', 'ORIENTAL ASAHI'),
(486, 'P03-148', 'Yamalube Matic New SJ/MB 20W40 (0.8LX24) NEW SNI', 'ORIENTAL ASAHI'),
(487, 'P03-149', 'Yamalube Sport SL 10W40 (1Lx24)', 'ORIENTAL ASAHI'),
(488, 'P03-149', 'Yamalube Sport SL 10W40 (1Lx24)', 'ORIENTAL ASAHI'),
(489, 'p03-150', 'Yamalube Power Matic (0.8Lx24) SNI', 'ORIENTAL ASAHI'),
(490, 'p03-150', 'Yamalube Power Matic (0.8Lx24) SNI', 'ORIENTAL ASAHI'),
(491, 'p03-151', 'Eneos Gear Oil T/A 80W-90 GL-5 (1Lx12)', 'ORIENTAL ASAHI'),
(492, 'p03-151', 'Eneos Gear Oil T/A 80W-90 GL-5 (1Lx12)', 'ORIENTAL ASAHI'),
(493, 'P03-154', 'Eneos Diesel CI-4 15W40 (1Lx12)', 'ORIENTAL ASAHI'),
(494, 'P03-154', 'Eneos Diesel CI-4 15W40 (1Lx12)', 'ORIENTAL ASAHI'),
(495, 'P03-155', 'Eneos Diesel CI-4 15W40 (5Lx6)', 'ORIENTAL ASAHI'),
(496, 'P03-155', 'Eneos Diesel CI-4 15W40 (5Lx6)', 'ORIENTAL ASAHI'),
(497, 'P03-156', 'Eneos Multi Asia AT Fluid  (1Lx12) NEW', 'ORIENTAL ASAHI'),
(498, 'P03-156', 'Eneos Multi Asia AT Fluid  (1Lx12) NEW', 'ORIENTAL ASAHI'),
(499, 'P03-157', 'YML OBM GL-4 350ML set partisi', 'HARPACKINDO'),
(500, 'P03-157', 'YML OBM GL-4 350ML set partisi', 'HARPACKINDO'),
(501, 'P03-158', 'YMALUBE OBM GL-4 750ML set partisi', 'HARPACKINDO'),
(502, 'P03-158', 'YMALUBE OBM GL-4 750ML set partisi', 'HARPACKINDO'),
(503, 'P03-160', 'YAMALUBE 2T OBM 1L', 'HARPACKINDO'),
(504, 'P03-160', 'YAMALUBE 2T OBM 1L', 'HARPACKINDO'),
(505, 'P03-161', 'YAMALUBE 2T OBM 4L', 'HARPACKINDO'),
(506, 'P03-161', 'YAMALUBE 2T OBM 4L', 'HARPACKINDO'),
(507, 'P03-162', 'YAMALUBE OBM GL 5 750ML 1 X  12', 'HARPACKINDO'),
(508, 'P03-162', 'YAMALUBE OBM GL 5 750ML 1 X  12', 'HARPACKINDO'),
(509, 'P03-165', 'ENEOS DIESEL OIL CF-40 5LX6', 'ORIENTAL ASAHI'),
(510, 'P03-166', 'Yamalube RS4GP Blue (1Lx12) NEW', 'ORIENTAL ASAHI'),
(511, 'P03-166', 'Yamalube RS4GP Blue (1Lx12) NEW', 'ORIENTAL ASAHI'),
(512, 'P03-167', 'CARTON YAMALUBE 2 STROKE 0.7L NEW', 'ORIENTAL ASAHI'),
(513, 'P03-168', 'AHM Oil MPX 2 (0.8Lx24)', 'HARPACKINDO'),
(514, 'p03-169', 'MMC MTF 75W85 1LX12', 'ORIENTAL ASAHI'),
(515, 'P03-170', 'MMC MULTI GEAR OIL GL-4 75W80 1L', 'ORIENTAL ASAHI'),
(516, 'P03-171', 'MMC S.HYP.GEAR ECO GL-5 80', 'ORIENTAL ASAHI'),
(517, 'p03-172', 'Daihatsu CVTF FLUID 1LX12', 'ORIENTAL ASAHI'),
(518, 'p03-173', 'Yamalube Super Matic  New Design', 'ORIENTAL ASAHI'),
(519, 'p03-174', 'Yamalube SJ/MB New Design', 'ORIENTAL ASAHI'),
(520, 'p03-175', 'Yamalube SJ/MA New Design', 'ORIENTAL ASAHI'),
(521, 'p03-176', 'Yamalube Power Matic 0.8L New Design', 'ORIENTAL ASAHI'),
(522, 'p03-177', 'Yamalube Mtr (Sport) New SL10W40 (1Lx24)', 'ORIENTAL ASAHI'),
(523, 'p03-177', 'Yamalube Mtr (Sport) New SL10W40 (1Lx24)', 'ORIENTAL ASAHI'),
(524, 'P04-009', '209 Liter Drum Toyota CVTF FE (0.9 mm) ', 'PCN'),
(525, 'p04-012', 'Drum Honda E-Pro Blue', 'GPI'),
(526, 'p04-017', 'Drum Yamalube OBM 2T', 'GPI'),
(527, 'P04-020', 'Drum Toyota CVTF FE (0.9 mm) ', 'GPI'),
(528, 'p04-021', '209 Liter New Steel Drum Gold (1.0 mm)', 'GPI'),
(529, 'P05-005', 'Label 0.7L Yamalube 2T', 'PANCAR PRIMA AGUNG'),
(530, 'P05-005', 'Label 0.7L Yamalube 2T', 'PANCAR PRIMA AGUNG'),
(531, 'P05-006', 'Label 0.7L Eneos 2T (Ungu)', 'PANCAR PRIMA AGUNG'),
(532, 'P05-026', 'Label 0.8L Yamalube SL 10W40 Gold Oil', 'PANCAR PRIMA AGUNG'),
(533, 'P05-026', 'Label 0.8L Yamalube SL 10W40 Gold Oil', 'PANCAR PRIMA AGUNG'),
(534, 'P05-030', 'Label 1L Yamalube Super Sport', 'PANCAR PRIMA AGUNG'),
(535, 'P05-030', 'Label 1L Yamalube Super Sport', 'PANCAR PRIMA AGUNG'),
(536, 'P05-032', 'Label 0.8L Yamalube Power Matic', 'PANCAR PRIMA AGUNG'),
(537, 'P05-032', 'Label 0.8L Yamalube Power Matic', 'PANCAR PRIMA AGUNG'),
(538, 'P05-035', 'Label 4L Yamalube Premium Oil', 'PANCAR PRIMA AGUNG'),
(539, 'P05-036', 'Label 1L Yamalube Super Matic', 'PANCAR PRIMA AGUNG'),
(540, 'P05-036', 'Label 1L Yamalube Super Matic', 'PANCAR PRIMA AGUNG'),
(541, 'P05-037', 'Label 1L Eneos CF4/DH1 15W40 (Hijau)', 'PANCAR PRIMA AGUNG'),
(542, 'P05-038', 'Label 4L Eneos CF4/DH1 15W40 (Hijau)', 'PANCAR PRIMA AGUNG'),
(543, 'P05-039', 'Label 1L Eneos Gear Oil 75W90 GL5 (Biru)', 'PANCAR PRIMA AGUNG'),
(544, 'P05-044', 'Label 0.8L Eneos Oil  SJ/MA 20W40 (Ungu)', 'PANCAR PRIMA AGUNG'),
(545, 'P05-045', 'Label 0.8L Eneos SJ/MB 20W40 (Merah)', 'PANCAR PRIMA AGUNG'),
(546, 'P05-046', 'Label 1L Eneos SL/MA 10W-40 (Kuning)', 'PANCAR PRIMA AGUNG'),
(547, 'P05-047', 'Label 0.8L Eneos Eco SJ/MA 10W30 (Grey)', 'PANCAR PRIMA AGUNG'),
(548, 'P05-048', 'Label 0.8L Eneos Eco SJ/MB 10W30 (Hijau)', 'PANCAR PRIMA AGUNG'),
(549, 'P05-049', 'Label 4L Eneos Mol Asia 10W40SM (Grey)', 'PANCAR PRIMA AGUNG'),
(550, 'P05-050', 'Label 1L Eneos Mol Asia 10W40SM (Grey)', 'PANCAR PRIMA AGUNG'),
(551, 'P05-051', 'Label 1L Eneos Diesel CI-4 15W40', 'BEST LABEL'),
(552, 'P05-052', 'Label 4L Eneos Diesel CI-4 15W40', 'BEST LABEL'),
(553, 'P05-053', 'Label 1L Eneos Mtr Oil SN/CF 20W50', 'BEST LABEL'),
(554, 'P05-054', 'Label 4L Eneos Mtr Oil SN/CF 20W50', 'BEST LABEL'),
(555, 'P05-055', 'Label 1L Eneos Mtr Oil SN/CF 10W30', 'BEST LABEL'),
(556, 'P05-056', 'Label 4L Eneos Mtr Oil SN/CF 10W30', 'BEST LABEL'),
(557, 'P05-057', 'Label 1L Eneos Mtr Oil SN 0W20', 'BEST LABEL'),
(558, 'P05-058', 'Label 4L Eneos Mtr Oil SN 0W20', 'BEST LABEL'),
(559, 'P05-059', 'Label 1L Eneos Sustina SN/ACEA 5W30', 'PANCAR PRIMA AGUNG'),
(560, 'P05-060', 'Label 1L Eneos SN/CF 20W50 (Orange)', 'PANCAR PRIMA AGUNG'),
(561, 'P05-061', 'Label 4L Eneos SN/CF 20W50 (Orange)', 'PANCAR PRIMA AGUNG'),
(562, 'P05-062', 'Label 1L Eneos SN 0W20 (Warm Grey)', 'PANCAR PRIMA AGUNG'),
(563, 'P05-063', 'Label 4L Eneos SN 0W20 (Warm Grey)', 'PANCAR PRIMA AGUNG'),
(564, 'P05-067', 'Label 4L Eneos Sustina SN/ACEA 5W30', 'PANCAR PRIMA AGUNG'),
(565, 'P05-072', 'Label 1L Eneos CVT Fluid Asia', 'BEST LABEL'),
(566, 'P05-073', 'Label 1L Eneos Multi Asia AT Fluid', 'BEST LABEL'),
(567, 'P05-081', 'Label 1L Yamalube RS4GP', 'PANCAR PRIMA AGUNG'),
(568, 'P05-140', 'Label 0.8L Eneos Oil  SJ/MA 20W40 (Ungu)', 'PANCAR PRIMA AGUNG'),
(569, 'P05-141', 'Label 0.8L Eneos SJ/MB 20W40 (Merah)', 'PANCAR PRIMA AGUNG'),
(570, 'P05-142', 'Label 1L Eneos SL/MA 10W-40 (Kuning)', 'PANCAR PRIMA AGUNG'),
(571, 'P05-143', 'Label 0.8L Eneos Eco SJ/MA 10W30 (Grey)', 'PANCAR PRIMA AGUNG'),
(572, 'P05-146', 'Label 0.8L Eneos Eco SJ/MB 10W30 (Hijau)', 'PANCAR PRIMA AGUNG'),
(573, 'P05-147', 'Label 1L Eneos SN 0W20 (Warm Grey) SNI', 'PANCAR PRIMA AGUNG'),
(574, 'P05-148', 'Label 4L Eneos SN 0W20 (Warm Grey)', 'PANCAR PRIMA AGUNG'),
(575, 'P05-151', 'Label 1L Eneos SN 20W50 (Orange) SNI', 'PANCAR PRIMA AGUNG'),
(576, 'P05-161', 'Label 0.8L Yamalube SL 10W40 Gold Oil SNI', 'PANCAR PRIMA AGUNG'),
(577, 'P05-162', 'Label 1L Yamalube Super Matic SNI', 'PANCAR PRIMA AGUNG'),
(578, 'P05-162', 'Label 1L Yamalube Super Matic SNI', 'PANCAR PRIMA AGUNG'),
(579, 'P05-163', 'Label 1L Yamalube Super Sport SNI', 'PANCAR PRIMA AGUNG'),
(580, 'P05-164', 'Label 0.7L Yamalube 2T', 'PANCAR PRIMA AGUNG'),
(581, 'P05-164', 'Label 0.7L Yamalube 2T', 'PANCAR PRIMA AGUNG'),
(582, 'P05-178', 'Label 1L Eneos Gear Oil 75W90 GL5 (Biru)', 'PANCAR PRIMA AGUNG'),
(583, 'P05-179', 'Label 0.7L Eneos 2T (Ungu)', 'PANCAR PRIMA AGUNG'),
(584, 'P05-180', 'Label 4L Eneos SN 20W50 (Orange) SNI', 'PANCAR PRIMA AGUNG'),
(585, 'P05-181', 'Label 1L Eneos Mtr Oil SN 10W30 SNI', 'BEST LABEL'),
(586, 'P05-182', 'Label 4L Eneos Mtr Oil SN 10W30 SNI', 'BEST LABEL'),
(587, 'P05-187', 'Label 1L Eneos Multi Asia AT Fluid', 'BEST LABEL'),
(588, 'P05-193', 'Label 1L Eneos Diesel CI-4 15W40 SNI', 'BEST LABEL'),
(589, 'P05-194', 'Label 4L Eneos Diesel CI-4 15W40 SNI', 'BEST LABEL'),
(590, 'P08-002', 'Pail 20L White', 'MIWADA'),
(591, 'P08-007', 'PAIL YAMALUBE 2T OBM 20L', 'KP'),
(592, 'P08-009', 'PAIL WITE 20L', 'NIOPLAS UNGGUL'),
(593, 'P08-035', 'Pail Jerry Can 18L set cap seal', 'PJW');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_add`
--

CREATE TABLE `tbl_detail_add` (
  `id_add` int(255) NOT NULL,
  `item_check` varchar(10) NOT NULL,
  `approval` int(1) NOT NULL,
  `jml_produk` int(100) NOT NULL,
  `tgl_cek` varchar(20) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `nama_psdd` varchar(15) NOT NULL,
  `berat_psdpl` varchar(15) NOT NULL,
  `seal_tdb` varchar(15) NOT NULL,
  `bocorl` varchar(15) NOT NULL,
  `kotoranba` varchar(15) NOT NULL,
  `penyok` varchar(15) NOT NULL,
  `karat` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_detail_add`
--

INSERT INTO `tbl_detail_add` (`id_add`, `item_check`, `approval`, `jml_produk`, `tgl_cek`, `nama_produk`, `nama_psdd`, `berat_psdpl`, `seal_tdb`, `bocorl`, `kotoranba`, `penyok`, `karat`) VALUES
(23, 'additive', 0, 5, '5-Nov-2004', 'ABCD', 'NG1,1', 'NG2,1', 'NG3,1', 'Tidak4,1', 'Tidak5,1', 'Tidak6,1', 'Tidak7,1'),
(2, 'baseOil', 1, 0, '', '', 'OK1,1', 'OK2,1', 'OK3,1', 'Ada4,1', 'Ada5,1', 'Ada6,1', 'Ada7,1'),
(5, 'baseOil', 1, 2000, '29-Aug-2021', 'ADASD', 'OK1,1', 'OK2,1', 'OK3,1', 'Ada4,1', 'Ada5,1', 'Ada6,1', 'Ada7,1'),
(4, 'baseOil', 1, 2000, '29-Aug-2021', 'ADASD', 'OK1,1', 'OK2,1', 'OK3,1', 'Ada4,1', 'Ada5,1', 'Ada6,1', 'Ada7,1'),
(14, 'baseOil', 1, 0, '29-Aug-2021', 'asdsad', 'OK', 'OK', 'OK', 'Ada', 'Ada', 'Ada', 'Tidak'),
(15, 'baseOil', 1, 0, '01-Sep-2021', 'AD1354', 'OK', 'OK', 'OK', 'Ada', 'Ada', 'Ada', 'Ada'),
(16, 'baseOil', 1, 0, '01-Sep-2021', 'AD1419', 'OK', 'OK', 'OK', 'Ada', 'Ada', 'Tidak', 'Tidak'),
(17, 'baseOil', 1, 0, '01-Sep-2021', 'BASE OIL WBASE10', 'OK', 'OK', 'OK', 'Ada', 'Ada', 'Ada', 'Ada'),
(19, 'baseOil', 1, 0, '02-Sep-2021', '', 'OK', 'OK', 'OK', 'Ada', 'Ada', 'Ada', 'Ada'),
(34, 'baseOil', 1, 0, '02-Sep-2021', '', 'OK', 'OK', 'OK', 'Ada', 'Ada', 'Ada', 'Ada');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_pkg_ibc`
--

CREATE TABLE `tbl_detail_pkg_ibc` (
  `id_ibc` int(10) NOT NULL,
  `tgl_cek` varchar(15) NOT NULL,
  `approval` int(1) NOT NULL,
  `jml_produk` int(100) NOT NULL,
  `cek_sampel` int(10) NOT NULL,
  `kondisi_vn` varchar(255) NOT NULL,
  `terdapat_lk` varchar(255) NOT NULL,
  `kotoran` varchar(255) NOT NULL,
  `air_oli` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_pkg_p`
--

CREATE TABLE `tbl_detail_pkg_p` (
  `id_p` int(10) NOT NULL,
  `tgl_cek` varchar(15) NOT NULL,
  `approval` int(1) NOT NULL,
  `jml_produk` int(100) NOT NULL,
  `cek_sampel` int(10) NOT NULL,
  `warna_pail` varchar(255) NOT NULL,
  `terdapat_lk` varchar(255) NOT NULL,
  `terdapat_lpb` varchar(255) NOT NULL,
  `kondisi_seal` varchar(255) NOT NULL,
  `kotoran` varchar(255) NOT NULL,
  `karat` varchar(255) NOT NULL,
  `benda_asing` varchar(255) NOT NULL,
  `kotoran_ytb` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_detail_pkg_p`
--

INSERT INTO `tbl_detail_pkg_p` (`id_p`, `tgl_cek`, `approval`, `jml_produk`, `cek_sampel`, `warna_pail`, `terdapat_lk`, `terdapat_lpb`, `kondisi_seal`, `kotoran`, `karat`, `benda_asing`, `kotoran_ytb`) VALUES
(43, '02-Sep-2021', 1, 0, 214124, 'OK#OK#OK#OK#OK#OK#OK#OK', 'Ada#Ada#Ada#Ada#Ada#Ada#Ada#Ada', 'Ada#Ada#Ada#Ada#Ada#Ada#Ada#Ada', 'NG#OK#OK#OK#OK#OK#OK#OK', 'Ada#Ada#Ada#Ada#Ada#Ada#Ada#Ada', 'Ada#Ada#Ada#Ada#Ada#Ada#Ada#Ada', 'Ada#Ada#Ada#Ada#Ada#Ada#Ada#Ada', 'Ada#Ada#Ada#Ada#Ada#Ada#Ada#Ada');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_pkg_pc`
--

CREATE TABLE `tbl_detail_pkg_pc` (
  `id_pc` int(10) NOT NULL,
  `tgl_cek` varchar(15) NOT NULL,
  `approval` int(1) NOT NULL,
  `jml_produk` int(100) NOT NULL,
  `cek_sampel` int(10) NOT NULL,
  `warna_cap` varchar(255) NOT NULL,
  `kotoran` varchar(255) NOT NULL,
  `goresan_pc` varchar(255) NOT NULL,
  `cacat_pc` varchar(255) NOT NULL,
  `lubang` varchar(255) NOT NULL,
  `kondisi_seal` varchar(255) NOT NULL,
  `terdapat_bami` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_detail_pkg_pc`
--

INSERT INTO `tbl_detail_pkg_pc` (`id_pc`, `tgl_cek`, `approval`, `jml_produk`, `cek_sampel`, `warna_cap`, `kotoran`, `goresan_pc`, `cacat_pc`, `lubang`, `kondisi_seal`, `terdapat_bami`) VALUES
(39, '02-Sep-2021', 1, 0, 2123, 'OK#OK#OK#OK#OK#OK#OK#OK', 'Ada#Ada#Ada#Ada#Ada#Ada#Ada#Ada', 'Ada#Ada#Ada#Ada#Ada#Ada#Ada#Ada', 'Ada#Ada#Ada#Ada#Ada#Ada#Ada#Ada', 'Ada#Ada#Ada#Ada#Ada#Ada#Ada#Ada', 'OK#OK#OK#OK#OK#OK#OK#OK', 'Ada#Ada#Ada#Ada#Ada#Ada#Ada#Ada');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_pkg_pcb`
--

CREATE TABLE `tbl_detail_pkg_pcb` (
  `id_pcb` int(10) NOT NULL,
  `tgl_cek` varchar(15) NOT NULL,
  `approval` int(1) NOT NULL,
  `jml_produk` int(100) NOT NULL,
  `cek_sampel` int(10) NOT NULL,
  `kondisi_cart` varchar(255) NOT NULL,
  `warna_cart` varchar(255) NOT NULL,
  `kotoran_l` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `label` varchar(255) NOT NULL,
  `kotoran_d` varchar(255) NOT NULL,
  `coa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_detail_pkg_pcb`
--

INSERT INTO `tbl_detail_pkg_pcb` (`id_pcb`, `tgl_cek`, `approval`, `jml_produk`, `cek_sampel`, `kondisi_cart`, `warna_cart`, `kotoran_l`, `gambar`, `label`, `kotoran_d`, `coa`) VALUES
(40, '02-Sep-2021', 1, 0, 214, 'OK#NG#OK#OK#OK#OK#OK#OK', 'Ada#Ada#Ada#Ada#Ada#Ada#Ada#Ada', 'Ada#Ada#Ada#Ada#Ada#Ada#Ada#Ada', 'Ada#Ada#Ada#Ada#Ada#Ada#Ada#Ada', 'Ada#Ada#Ada#Ada#Ada#Ada#Ada#Ada', 'OK#OK#OK#OK#OK#OK#OK#OK', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_pkg_pd`
--

CREATE TABLE `tbl_detail_pkg_pd` (
  `id_pd` int(10) NOT NULL,
  `tgl_cek` varchar(15) NOT NULL,
  `approval` int(1) NOT NULL,
  `jml_produk` int(100) NOT NULL,
  `cek_sampel` int(10) NOT NULL,
  `warna_drum` varchar(255) NOT NULL,
  `terdapat_lk` varchar(255) NOT NULL,
  `terdapat_lpb` varchar(255) NOT NULL,
  `kondisi_seal` varchar(255) NOT NULL,
  `kotoran` varchar(255) NOT NULL,
  `karat` varchar(255) NOT NULL,
  `benda_asing` varchar(255) NOT NULL,
  `bau_ytb` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_detail_pkg_pd`
--

INSERT INTO `tbl_detail_pkg_pd` (`id_pd`, `tgl_cek`, `approval`, `jml_produk`, `cek_sampel`, `warna_drum`, `terdapat_lk`, `terdapat_lpb`, `kondisi_seal`, `kotoran`, `karat`, `benda_asing`, `bau_ytb`) VALUES
(42, '02-Sep-2021', 1, 0, 2212, 'OK#OK#OK#OK#OK#OK#OK#OK', 'Ada#Ada#Ada#Ada#Ada#Ada#Ada#Ada', 'Ada#Ada#Ada#Ada#Ada#Ada#Ada#Ada', 'OK#OK#OK#OK#OK#OK#OK#OK', 'Ada#Ada#Ada#Ada#Ada#Ada#Ada#Ada', 'Ada#Ada#Ada#Ada#Ada#Ada#Ada#Ada', 'Ada#Ada#Ada#Ada#Ada#Ada#Ada#Ada', 'Ada#Ada#Ada#Ada#Ada#Ada#Ada#Ada');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_pkg_pm`
--

CREATE TABLE `tbl_detail_pkg_pm` (
  `id_pm` int(255) NOT NULL,
  `tgl_cek` varchar(15) NOT NULL,
  `approval` int(1) NOT NULL,
  `jml_produk` int(100) NOT NULL,
  `cek_sampel` int(10) NOT NULL,
  `warna_botol` varchar(255) NOT NULL,
  `kondisi_screw` varchar(255) NOT NULL,
  `tempat_lubang` varchar(255) NOT NULL,
  `label_depan` varchar(255) NOT NULL,
  `label_belakang` varchar(255) NOT NULL,
  `cacat` varchar(255) NOT NULL,
  `posisi_ldb` varchar(255) NOT NULL,
  `kotoran` varchar(255) NOT NULL,
  `benda_asing` varchar(255) NOT NULL,
  `npt` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_detail_pkg_pm`
--

INSERT INTO `tbl_detail_pkg_pm` (`id_pm`, `tgl_cek`, `approval`, `jml_produk`, `cek_sampel`, `warna_botol`, `kondisi_screw`, `tempat_lubang`, `label_depan`, `label_belakang`, `cacat`, `posisi_ldb`, `kotoran`, `benda_asing`, `npt`) VALUES
(33, '02-Sep-2021', 1, 0, 44, 'OK#OK#OK#OK#OK#OK#OK#OK', 'OK#OK#OK#OK#OK#OK#OK#OK', 'Ada#Ada#Ada#Ada#Ada#Ada#Ada#Ada', 'OK#OK#OK#OK#OK#OK#OK#OK', 'OK#OK#OK#OK#OK#OK#OK#OK', 'Ada#Ada#Ada#Ada#Ada#Ada#Ada#Ada', 'OK#OK#OK#OK#OK#OK#OK#OK', 'Ada#Ada#Ada#Ada#Ada#Ada#Ada#Ada', 'Tidak#Ada#Ada#Ada#Ada#Ada#Ada#Ada', 'Valid'),
(34, '02-Sep-2021', 1, 0, 2111111, 'NG#OK#OK#OK#OK#OK#OK#OK', 'NG#OK#OK#OK#OK#OK#OK#OK', 'Ada#Ada#Ada#Ada#Ada#Ada#Ada#Ada', 'OK#OK#OK#OK#OK#OK#OK#OK', 'OK#OK#OK#OK#OK#OK#OK#OK', 'Tidak#Ada#Ada#Ada#Ada#Ada#Ada#Ada', 'NG#OK#OK#OK#OK#OK#OK#OK', 'Ada#Ada#Ada#Ada#Ada#Ada#Ada#Ada', 'Tidak#Ada#Ada#Ada#Ada#Ada#Ada#Ada', 'Valid'),
(35, '02-Sep-2021', 1, 0, 11111, 'OK#OK#OK#OK#OK#OK#OK#OK', 'OK#OK#OK#OK#OK#OK#OK#OK', 'Ada#Ada#Ada#Ada#Ada#Ada#Ada#Ada', 'OK#OK#OK#OK#OK#OK#OK#OK', 'OK#OK#OK#OK#OK#OK#OK#OK', 'Ada#Ada#Ada#Ada#Ada#Ada#Ada#Ada', 'OK#OK#OK#OK#OK#OK#OK#OK', 'Tidak#Ada#Ada#Ada#Ada#Ada#Ada#Ada', 'Ada#Ada#Ada#Ada#Ada#Ada#Ada#Ada', 'Valid'),
(38, '02-Sep-2021', 1, 0, 4114, 'OK#OK#OK#OK#OK#OK#OK#NG', 'OK#OK#OK#OK#OK#OK#OK#OK', 'Ada#Ada#Ada#Ada#Ada#Ada#Ada#Ada', 'OK#OK#OK#OK#OK#OK#OK#OK', 'OK#OK#OK#OK#OK#OK#OK#OK', 'Ada#Ada#Ada#Ada#Ada#Ada#Ada#Ada', 'OK#OK#OK#OK#OK#OK#OK#OK', 'Ada#Ada#Ada#Ada#Ada#Ada#Ada#Ada', 'Ada#Ada#Ada#Ada#Ada#Ada#Ada#Ada', 'Valid'),
(44, '02-Sep-2021', 1, 0, 214, 'OK#OK#OK#OK#OK#OK#OK#OK', 'OK#OK#OK#OK#OK#OK#OK#OK', 'Ada#Ada#Ada#Ada#Ada#Ada#Ada#Ada', 'OK#OK#OK#OK#OK#OK#OK#OK', 'OK#OK#OK#OK#OK#OK#OK#OK', 'Ada#Ada#Ada#Ada#Ada#Ada#Ada#Ada', 'OK#OK#OK#OK#OK#OK#OK#OK', 'Ada#Ada#Ada#Ada#Ada#Ada#Ada#Ada', 'Ada#Ada#Ada#Ada#Ada#Ada#Ada#Ada', 'Valid'),
(45, '02-Sep-2021', 1, 0, 214, 'OK#OK#OK#OK#OK#OK#OK#OK', 'OK#OK#OK#OK#OK#OK#OK#OK', 'Ada#Ada#Ada#Ada#Ada#Ada#Ada#Ada', 'OK#OK#OK#OK#OK#OK#OK#OK', 'OK#OK#OK#OK#OK#OK#OK#OK', 'Ada#Ada#Ada#Ada#Ada#Ada#Ada#Ada', 'OK#OK#OK#OK#OK#OK#OK#OK', 'Ada#Ada#Ada#Ada#Ada#Ada#Ada#Ada', 'Ada#Ada#Ada#Ada#Ada#Ada#Ada#Ada', 'Valid');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(255) NOT NULL,
  `nama_akun` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_akun`, `username`, `password`, `role`) VALUES
(1, 'Analyst', 'analyst', 'analyst', 'analyst'),
(2, 'Siteman', 'siteman', 'siteman', 'siteman'),
(10, 'tes', 'tes1', 'tes1', 'analyst'),
(11, 'tes', 'tes12', 'tes12', 'siteman'),
(12, 'tes', 'tes12', 'tes12', 'siteman'),
(13, 'tqwtqwt', 'qwrqwr', 'teswqrrw', 'analyst'),
(14, 'tqwtqwt', 'qwrqwr', 'teswqrrw', 'analyst'),
(15, '5rsaf', '214', 'tes', 'siteman');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_utama_add`
--

CREATE TABLE `tbl_utama_add` (
  `id_utama` int(11) NOT NULL,
  `doc_no` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `lot_no` varchar(255) NOT NULL,
  `id_item_add` int(255) NOT NULL,
  `quantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_utama_add`
--

INSERT INTO `tbl_utama_add` (`id_utama`, `doc_no`, `date`, `lot_no`, `id_item_add`, `quantity`) VALUES
(19, 'DN-PC-F-041', '01-Sep-2021', '441251525', 3, 10000),
(20, 'DN-PC-F-041', '02-Sep-2021', '24100', 4, 4411),
(23, 'DN-PC-F-041', '02-Sep-2021', '2151515', 7, 512),
(33, 'DN-PC-F-041', '02-Sep-2021', '2241414', 15, 1000),
(34, 'DN-PC-F-041', '02-Sep-2021', '12344', 6, 21);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_utama_pkg`
--

CREATE TABLE `tbl_utama_pkg` (
  `id_utama` int(255) NOT NULL,
  `doc_no` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `receive_time` varchar(255) NOT NULL,
  `finnish_time` varchar(255) NOT NULL,
  `id_item_pkg` int(255) NOT NULL,
  `item_check` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `packaging_condition` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `submitted` varchar(255) NOT NULL,
  `received` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_utama_pkg`
--

INSERT INTO `tbl_utama_pkg` (`id_utama`, `doc_no`, `date`, `receive_time`, `finnish_time`, `id_item_pkg`, `item_check`, `quantity`, `packaging_condition`, `status`, `remark`, `submitted`, `received`) VALUES
(33, 'DN-PC-F-034', '01-Sep-2021', '22:44', '05:07', 36, 'BOTOL', 1244, 'OK', 'OK', '', 'SETIAAAAA', 'Analyst'),
(34, 'DN-PC-F-034', '02-Sep-2021', '03:04', '05:12', 26, 'BOTOL', 2000, 'GOOD', 'OK', '', 'NANAADF', 'Analyst'),
(35, 'DN-PC-F-034', '02-Sep-2021', '03:04', '05:45', 26, 'BOTOL', 2000, 'GOOD', 'OK', '', 'NANA', 'Analyst'),
(36, 'DN-PC-F-034', '02-Sep-2021', '03:04', '', 26, 'BOTOL', 2000, 'GOOD', 'OK', '', 'NANA', ''),
(37, 'DN-PC-F-034', '02-Sep-2021', '03:04', '', 26, 'BOTOL', 2000, 'GOOD', 'OK', '', 'NANA', ''),
(38, 'DN-PC-F-034', '02-Sep-2021', '03:09', '06:04', 9, 'BOTOL', 1244, 'OK', 'OK', '', 'Siteman', 'Analyst'),
(39, 'DN-PC-F-049', '02-Sep-2021', '05:59', '06:05', 226, 'CAP', 2222, 'Sesuai dengan Spect Product', 'OK', '', 'Siteman', 'Analyst'),
(40, 'DN-PC-F-051', '02-Sep-2021', '06:01', '06:08', 301, 'CARTON', 1000, 'Sesuai dengan Spect Product', 'OK', '', 'Siteman', 'Analyst'),
(41, '', '02-Sep-2021', '06:02', '', 533, 'LABEL', 11, 'Sesuai dengan Spect Product', 'OK', '', 'Siteman', ''),
(42, 'DN-PC-F-034', '02-Sep-2021', '06:02', '07:43', 524, 'DRUM', 241, 'Sesuai dengan Spect Product', 'OK', '', 'Siteman', 'Analyst'),
(43, 'DN-PC-F-034', '02-Sep-2021', '06:03', '06:12', 592, 'PAIL', 1000, 'Sesuai dengan Spect Product', 'OK', '', 'Siteman', 'Analyst'),
(44, 'DN-PC-F-034', '02-Sep-2021', '06:03', '06:12', 183, 'TUBE', 1000, 'Sesuai dengan Spect Product', 'OK', '', 'Siteman', 'Analyst'),
(45, 'DN-PC-F-034', '02-Sep-2021', '06:31', '06:31', 12, 'BOTOL', 1000, 'Sesuai dengan Spect Product', 'OK', '', 'Siteman', 'Analyst');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_data_item_add`
--
ALTER TABLE `tbl_data_item_add`
  ADD PRIMARY KEY (`id_item_add`);

--
-- Indexes for table `tbl_data_item_pkg`
--
ALTER TABLE `tbl_data_item_pkg`
  ADD PRIMARY KEY (`id_item_pkg`);

--
-- Indexes for table `tbl_detail_pkg_pc`
--
ALTER TABLE `tbl_detail_pkg_pc`
  ADD PRIMARY KEY (`id_pc`);

--
-- Indexes for table `tbl_detail_pkg_pm`
--
ALTER TABLE `tbl_detail_pkg_pm`
  ADD PRIMARY KEY (`id_pm`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tbl_utama_add`
--
ALTER TABLE `tbl_utama_add`
  ADD PRIMARY KEY (`id_utama`);

--
-- Indexes for table `tbl_utama_pkg`
--
ALTER TABLE `tbl_utama_pkg`
  ADD PRIMARY KEY (`id_utama`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_data_item_add`
--
ALTER TABLE `tbl_data_item_add`
  MODIFY `id_item_add` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `tbl_data_item_pkg`
--
ALTER TABLE `tbl_data_item_pkg`
  MODIFY `id_item_pkg` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=594;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_utama_add`
--
ALTER TABLE `tbl_utama_add`
  MODIFY `id_utama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_utama_pkg`
--
ALTER TABLE `tbl_utama_pkg`
  MODIFY `id_utama` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
