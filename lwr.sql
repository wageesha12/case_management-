-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2021 at 04:16 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lwr`
--

-- --------------------------------------------------------

--
-- Table structure for table `casecycle_details`
--

CREATE TABLE `casecycle_details` (
  `finact` int(1) NOT NULL,
  `status` varchar(2) NOT NULL,
  `casecycle_key` int(11) NOT NULL,
  `casedetails_key` int(11) NOT NULL,
  `enter_date` date NOT NULL,
  `noof_casedefined` int(11) NOT NULL,
  `nextcourt_dte` date DEFAULT NULL,
  `status_cycle` varchar(100) DEFAULT NULL,
  `discuss_status` int(11) NOT NULL,
  `sys_enterdte` datetime NOT NULL DEFAULT current_timestamp(),
  `act_perosn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `casecycle_details`
--

INSERT INTO `casecycle_details` (`finact`, `status`, `casecycle_key`, `casedetails_key`, `enter_date`, `noof_casedefined`, `nextcourt_dte`, `status_cycle`, `discuss_status`, `sys_enterdte`, `act_perosn`) VALUES
(0, 'A', 1, 1, '2021-08-05', 1, '2021-08-17', '1 set', 0, '2021-08-05 10:20:35', 1);

-- --------------------------------------------------------

--
-- Table structure for table `casepayment_details`
--

CREATE TABLE `casepayment_details` (
  `finact` int(1) NOT NULL,
  `status` varchar(2) NOT NULL,
  `casepayment_key` int(11) NOT NULL,
  `casedetails_key` int(11) NOT NULL,
  `datos` date NOT NULL,
  `client_key` int(11) NOT NULL,
  `amount` double NOT NULL,
  `sys_enterdte` datetime NOT NULL DEFAULT current_timestamp(),
  `act_perosn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `casepayment_details`
--

INSERT INTO `casepayment_details` (`finact`, `status`, `casepayment_key`, `casedetails_key`, `datos`, `client_key`, `amount`, `sys_enterdte`, `act_perosn`) VALUES
(0, 'A', 1, 1, '2021-08-13', 1, 20000, '2021-08-05 10:20:53', 1);

-- --------------------------------------------------------

--
-- Table structure for table `case_details`
--

CREATE TABLE `case_details` (
  `finact` int(1) NOT NULL,
  `status` varchar(2) NOT NULL,
  `casedetail_key` int(11) NOT NULL,
  `case_date` date NOT NULL,
  `case_code` varchar(100) NOT NULL,
  `lawyer_key` int(11) NOT NULL,
  `case_key` int(11) NOT NULL,
  `court_key` int(11) NOT NULL,
  `courttype_key` int(11) NOT NULL,
  `client_key` int(11) NOT NULL,
  `compalintype_key` int(11) NOT NULL,
  `case_year` int(11) NOT NULL,
  `amount` double DEFAULT NULL,
  `support_no` int(11) NOT NULL,
  `party` varchar(600) DEFAULT NULL,
  `sys_enterdte` datetime NOT NULL DEFAULT current_timestamp(),
  `act_person` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `case_details`
--

INSERT INTO `case_details` (`finact`, `status`, `casedetail_key`, `case_date`, `case_code`, `lawyer_key`, `case_key`, `court_key`, `courttype_key`, `client_key`, `compalintype_key`, `case_year`, `amount`, `support_no`, `party`, `sys_enterdte`, `act_person`) VALUES
(0, 'A', 1, '2021-08-05', '2DVC0012021', 1, 1, 94, 2, 1, 3, 2021, 50000, 1, 'Third', '2021-08-05 10:20:12', 1),
(0, 'A', 2, '2021-08-06', '2BOR0012021', 1, 2, 99, 2, 1, 1, 2021, NULL, 1, 'Third', '2021-08-06 19:09:23', 1),
(0, 'A', 3, '2021-08-13', '2DVC0022021', 1, 1, 94, 2, 1, 1, 2021, NULL, 2, 'fgg', '2021-08-06 19:10:07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `case_master`
--

CREATE TABLE `case_master` (
  `finact` int(1) NOT NULL,
  `status` varchar(2) NOT NULL,
  `casemas_key` int(11) NOT NULL,
  `case_name` varchar(150) NOT NULL,
  `case_code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `case_master`
--

INSERT INTO `case_master` (`finact`, `status`, `casemas_key`, `case_name`, `case_code`) VALUES
(0, 'A', 1, 'Divorce Case', 'DVC'),
(0, 'A', 2, 'Land/ACQ Case', 'BOR'),
(0, 'A', 3, 'Money Recovery', 'MOR'),
(0, 'A', 4, 'Criminal Case', 'CRM');

-- --------------------------------------------------------

--
-- Table structure for table `client_master`
--

CREATE TABLE `client_master` (
  `finact` int(1) NOT NULL,
  `status` varchar(2) NOT NULL,
  `client_key` int(11) NOT NULL,
  `client_name` varchar(300) NOT NULL,
  `address` varchar(250) NOT NULL,
  `mobile_no` varchar(10) NOT NULL,
  `tp_no` varchar(10) DEFAULT NULL,
  `nic_no` varchar(20) NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `email_address` varchar(300) DEFAULT NULL,
  `password` varchar(300) NOT NULL,
  `sys_enterdte` datetime NOT NULL DEFAULT current_timestamp(),
  `lowyer_key` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `client_master`
--

INSERT INTO `client_master` (`finact`, `status`, `client_key`, `client_name`, `address`, `mobile_no`, `tp_no`, `nic_no`, `nationality`, `email_address`, `password`, `sys_enterdte`, `lowyer_key`) VALUES
(0, 'A', 1, 'Lahiru Chathuranga', '151 දොම්පෙ', '0714710081', '0714710088', '922555666V', 'Sri lanka', 'lahiruc700@gmail.com', '202cb962ac59075b964b07152d234b70', '2021-07-16 09:56:11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `complaintype_master`
--

CREATE TABLE `complaintype_master` (
  `finact` int(1) NOT NULL,
  `status` varchar(2) NOT NULL,
  `complaintypemas_key` int(11) NOT NULL,
  `complain_name` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `complaintype_master`
--

INSERT INTO `complaintype_master` (`finact`, `status`, `complaintypemas_key`, `complain_name`) VALUES
(0, 'A', 1, 'Plaint'),
(0, 'A', 2, 'Amended Plaints'),
(0, 'A', 3, 'Answer'),
(0, 'A', 4, 'Replication');

-- --------------------------------------------------------

--
-- Table structure for table `courttype_master`
--

CREATE TABLE `courttype_master` (
  `finact` int(1) NOT NULL,
  `status` varchar(2) NOT NULL,
  `courttype_key` int(11) NOT NULL,
  `courtype_name` varchar(150) NOT NULL,
  `courttype_code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `courttype_master`
--

INSERT INTO `courttype_master` (`finact`, `status`, `courttype_key`, `courtype_name`, `courttype_code`) VALUES
(0, 'A', 1, 'Magistrate Court ', 'MST'),
(0, 'A', 2, 'District Court', 'DC'),
(0, 'A', 3, 'High Court', 'HGH'),
(0, 'A', 4, 'Court of Appeal', 'CAP'),
(0, 'A', 5, 'Suprime Court', 'SUP'),
(0, 'A', 6, 'Labour Tribunal', 'LBT');

-- --------------------------------------------------------

--
-- Table structure for table `court_master`
--

CREATE TABLE `court_master` (
  `finact` int(1) NOT NULL,
  `status` varchar(1) NOT NULL,
  `courtmas_key` int(11) NOT NULL,
  `courttype_key` int(11) NOT NULL,
  `court_name` varchar(500) NOT NULL,
  `telephone_no` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `court_master`
--

INSERT INTO `court_master` (`finact`, `status`, `courtmas_key`, `courttype_key`, `court_name`, `telephone_no`) VALUES
(0, 'A', 1, 2, 'Kalmunai', '0672229291'),
(0, 'A', 2, 1, 'Kalmunai', '0672229291'),
(0, 'A', 3, 2, 'Kalutara', '0342222293'),
(0, 'A', 4, 1, 'Kalutara', '0342222291'),
(0, 'A', 5, 3, 'Kalutara', '0342222487'),
(0, 'A', 6, 3, 'Kandy', '0812384667'),
(0, 'A', 7, 2, 'Kandy', '0812384665'),
(0, 'A', 8, 1, 'Kandy', '0812384671'),
(0, 'A', 9, 1, 'Kanthale', '0262234505'),
(0, 'A', 10, 3, 'Kegalle', '0352223501'),
(0, 'A', 11, 2, 'Kegalle', '0352222293'),
(0, 'A', 12, 1, 'Kekirawa', '0252264291'),
(0, 'A', 13, 1, 'Kesbewa', '0112703618'),
(0, 'A', 14, 1, 'Kilinochchi', '0212285303'),
(0, 'A', 15, 2, 'Kilinochchi', '0212285303'),
(0, 'A', 16, 3, 'Kuliyapitiya', '0372059552'),
(0, 'A', 17, 2, 'Kuliyapitiya', '0372281293'),
(0, 'A', 18, 1, 'Kuliyapitiya', '0372281291'),
(0, 'A', 19, 3, 'Kurunegala', '0372222190'),
(0, 'A', 20, 2, 'Kurunegala', '0372222193'),
(0, 'A', 21, 1, 'Kurunegala', '0372222291'),
(0, 'A', 22, 1, 'Mahara', '0112926046'),
(0, 'A', 23, 1, 'Mahiyanganaya', '0552258121'),
(0, 'A', 24, 1, 'Maligakanda', '0112695711'),
(0, 'A', 25, 2, 'Mannar', '0232232293'),
(0, 'A', 26, 1, 'Mannar', '0232232291'),
(0, 'A', 27, 2, 'Matale', '0662222291'),
(0, 'A', 28, 1, 'Matale', '0662222291'),
(0, 'A', 29, 3, 'Matara', '0412222541'),
(0, 'A', 30, 2, 'Matara', '0412222293'),
(0, 'A', 31, 1, 'Matara', '0412222291'),
(0, 'A', 32, 1, 'Mallakam', '0213214068'),
(0, 'A', 33, 2, 'Mallakam', '0213214068'),
(0, 'A', 34, 1, 'Mawanella', '0352246291'),
(0, 'A', 35, 2, 'Mawanella', '0352246291'),
(0, 'A', 36, 2, 'Mathugama', '0342247292'),
(0, 'A', 37, 1, 'Mathugama', '0342247290'),
(0, 'A', 38, 1, 'Moratuwa', '0112627291'),
(0, 'A', 39, 2, 'Moratuwa', '0112627291'),
(0, 'A', 40, 1, 'Marawila', '0322254291'),
(0, 'A', 41, 2, 'Marawila', '0322254291'),
(0, 'A', 42, 2, 'Nugegoda', '0112809157'),
(0, 'A', 43, 1, 'Nugegoda', '0112852639'),
(0, 'A', 44, 3, 'Nuwaraeliya', '0522222546'),
(0, 'A', 45, 2, 'Nuwaraeliya', '0522222588'),
(0, 'A', 46, 1, 'Nuwaraeliya', '0522222593'),
(0, 'A', 47, 3, 'Negombo', '0312222372'),
(0, 'A', 48, 2, 'Negombo', '0312222293'),
(0, 'A', 49, 1, 'Negombo', '0312222291'),
(0, 'A', 50, 2, 'Nikaweratiya', '0372260306'),
(0, 'A', 51, 1, 'Nikaweratiya', '0372260306'),
(0, 'A', 52, 1, 'Pelmadulla', '0472275601'),
(0, 'A', 53, 1, 'Pilessa', '0372267291'),
(0, 'A', 54, 2, 'Point Pedro', '0212263058'),
(0, 'A', 55, 1, 'Point Pedro', '0212263058'),
(0, 'A', 56, 2, 'Polonnaruwa', '0272222293'),
(0, 'A', 57, 3, 'Polonnaruwa', '0272226514'),
(0, 'A', 58, 1, 'Polgahawela', '0372243232'),
(0, 'A', 59, 1, 'Pottuvil', '0632248336'),
(0, 'A', 60, 2, 'Pottuvil', '0632248336'),
(0, 'A', 61, 1, 'Pugoda', '0112405291'),
(0, 'A', 62, 2, 'Pugoda', '0112405291'),
(0, 'A', 63, 1, 'Puttalm', '0322265291'),
(0, 'A', 64, 2, 'Puttalm', '0322265291'),
(0, 'A', 65, 3, 'Ratnapura', '0452222177'),
(0, 'A', 66, 2, 'Ratnapura', '0452222293'),
(0, 'A', 67, 1, 'Ratnapura', '0452222291'),
(0, 'A', 68, 1, 'Rambadagalle', '0373988343'),
(0, 'A', 69, 1, 'Ruwanwella', '0362266915'),
(0, 'A', 70, 2, 'Tangalle', '0472240291'),
(0, 'A', 71, 1, 'Tangalle', '0472240291'),
(0, 'A', 72, 1, 'Tambuttegama', '0252276271'),
(0, 'A', 73, 1, 'Teldeniya', '0602803391'),
(0, 'A', 74, 1, 'Tissamaharama', '0472237291'),
(0, 'A', 75, 2, 'Tissamaharama', '0472237291'),
(0, 'A', 76, 3, 'Trincomalee', '0262222086'),
(0, 'A', 77, 2, 'Trincomalee', '0262222293'),
(0, 'A', 78, 3, 'Tangalle', '0472240110'),
(0, 'A', 79, 3, 'Vavuniya', '0242220293'),
(0, 'A', 80, 2, 'Vavuniya', '0242220291'),
(0, 'A', 81, 1, 'Walasmulla', '0472245291'),
(0, 'A', 82, 2, 'Walasmulla', '0472245291'),
(0, 'A', 83, 2, 'Warakapola', '0372278155'),
(0, 'A', 84, 1, 'Wariyapola', '0372267291'),
(0, 'A', 85, 1, 'Wattala', '0112925575'),
(0, 'A', 86, 1, 'Wellawaya', '0552274890'),
(0, 'A', 87, 1, 'Welimada', '0752245191'),
(0, 'A', 88, 1, 'Agunukola Pelessa', '0472228291'),
(0, 'A', 89, 1, 'Akkaraipattu', '0672277491'),
(0, 'A', 90, 2, 'Akkaraipattu', '0672279471'),
(0, 'A', 91, 3, 'Ampara', '0632222289'),
(0, 'A', 92, 2, 'Ampara', '0632222293'),
(0, 'A', 93, 3, 'Anuradhapura', '0252222693'),
(0, 'A', 94, 2, 'Anuradhapura', '0252222293'),
(0, 'A', 95, 1, 'Anuradhapura', '0252222291'),
(0, 'A', 96, 1, 'Attanagalla', '0332287001'),
(0, 'A', 97, 2, 'Attanagalla', '0332287001'),
(0, 'A', 98, 3, 'Awissawella', '0362222422'),
(0, 'A', 99, 2, 'Awissawella', '0362222293'),
(0, 'A', 100, 1, 'Awissawella', '0362222470'),
(0, 'A', 101, 1, 'Baddegama', '0912292291'),
(0, 'A', 102, 3, 'Badulla', '0552222443'),
(0, 'A', 103, 2, 'Badulla', '0552222291'),
(0, 'A', 104, 1, 'Badulla', '0552222093'),
(0, 'A', 105, 1, 'Balangoda', '0452287291'),
(0, 'A', 106, 3, 'Balapitiya', '0912258578'),
(0, 'A', 107, 2, 'Balapitiya', '0912258293'),
(0, 'A', 108, 1, 'Balapitiya', '0912258291'),
(0, 'A', 109, 2, 'Bandarawela', '0572222291'),
(0, 'A', 110, 1, 'Bandarawela', '0572222821'),
(0, 'A', 111, 3, 'Batticaloa', '0652224474'),
(0, 'A', 112, 2, 'Batticaloa', '0652222293'),
(0, 'A', 113, 1, 'Batticaloa', '0652225459'),
(0, 'A', 114, 1, 'Bibila', 'NA'),
(0, 'A', 115, 1, 'Chavakachcheri', '0212227783'),
(0, 'A', 116, 2, 'Chavakachcheri', '0212227783'),
(0, 'A', 117, 3, 'Chilaw', '0322220595'),
(0, 'A', 118, 2, 'Chilaw', '0322222291'),
(0, 'A', 119, 3, 'Colombo', '0112438893'),
(0, 'A', 120, 2, 'Colombo', '0112421732'),
(0, 'A', 121, 1, 'Colombo', '0112434350'),
(0, 'A', 122, 1, 'Colombo Fort', '0112432393'),
(0, 'A', 123, 1, 'Dambulla', '0662284791'),
(0, 'A', 124, 1, 'Dehiattakandiya', '0272250181'),
(0, 'A', 125, 1, 'Deiyandara', '0412268953'),
(0, 'A', 126, 2, 'Deiyandara', '0412268953'),
(0, 'A', 127, 2, 'Elpitiya', '0912290017'),
(0, 'A', 128, 1, 'Elpitiya', '0912291291'),
(0, 'A', 129, 2, 'Embilipitiya', '0472230294'),
(0, 'A', 130, 1, 'Embilipitiya', '0472230291'),
(0, 'A', 131, 3, 'Galle', '0912259976'),
(0, 'A', 132, 2, 'Galle', '0912234293'),
(0, 'A', 133, 1, 'Galle', '0912234291'),
(0, 'A', 134, 1, 'Galgamuwa', '0372253091'),
(0, 'A', 135, 3, 'Gampaha', '0332222295'),
(0, 'A', 136, 2, 'Gampaha', '0332222293'),
(0, 'A', 137, 1, 'Gampaha', '0332222291'),
(0, 'A', 138, 1, 'Gampola', '0812352291'),
(0, 'A', 139, 2, 'Gampola', '0812352291'),
(0, 'A', 140, 3, 'Hambanthota', '0472220279'),
(0, 'A', 141, 2, 'Hambanthota', '0472220291'),
(0, 'A', 142, 1, 'Hambanthota', '0472220291'),
(0, 'A', 143, 1, 'Higurakgoda', '0273287450'),
(0, 'A', 144, 2, 'Higurakgoda', '0273287450'),
(0, 'A', 145, 1, 'Hatton', '0512222291'),
(0, 'A', 146, 2, 'Hatton', '0512222291'),
(0, 'A', 147, 3, 'Homagama', '0112855733'),
(0, 'A', 148, 2, 'Homagama', '0112855263'),
(0, 'A', 149, 1, 'Homagama', '0112098224'),
(0, 'A', 150, 2, 'Horana', '0342261291'),
(0, 'A', 151, 1, 'Horana', '0342265220'),
(0, 'A', 152, 3, 'Jaffna', '0212222582'),
(0, 'A', 153, 2, 'Jaffna', '0212223671'),
(0, 'A', 154, 1, 'Jaffna', '0212223671'),
(0, 'A', 155, 1, 'Kebithigollewa', '0252298691'),
(0, 'A', 156, 1, 'Kaduwela', '0112571254'),
(0, 'A', 157, 5, 'Supreme Court', '0112435446'),
(0, 'A', 158, 4, 'Court of Appeal', '0112433466'),
(0, 'A', 159, 4, 'High Court of Civil Appeal Colombo', '0112441241'),
(0, 'A', 160, 3, 'Commercial High Court', '0113136705'),
(0, 'A', 168, 6, 'Anuradhapura', '252224964'),
(0, 'A', 169, 6, 'Avissawella', '362232706'),
(0, 'A', 170, 6, 'Badulla', '552224973'),
(0, 'A', 171, 6, 'Bandarawela', '572224758'),
(0, 'A', 172, 6, 'Battaramulla', '112053362'),
(0, 'A', 173, 6, 'Chillaw', '322221070'),
(0, 'A', 174, 6, 'Colombo 01', '112684008'),
(0, 'A', 175, 6, 'Colombo 02', '112684015'),
(0, 'A', 176, 6, 'Colombo 08', '112684025'),
(0, 'A', 177, 6, 'Colombo 13', '112684023'),
(0, 'A', 178, 6, 'Battaramulla', '112053362'),
(0, 'A', 179, 6, 'Galle', '912233198'),
(0, 'A', 180, 6, 'Gampaha', '332229468'),
(0, 'A', 181, 6, 'Homagama', '112891850'),
(0, 'A', 182, 6, 'Jafna', '212213957'),
(0, 'A', 183, 6, 'Kaduwela', '112579997'),
(0, 'A', 184, 6, 'Kalutara', '342226904'),
(0, 'A', 185, 6, 'Kandy', '812384670'),
(0, 'A', 186, 6, 'Kegalla', '352222477'),
(0, 'A', 187, 6, 'Kuliyapitiya', '372283720'),
(0, 'A', 188, 6, 'Kurunegala', '372234359'),
(0, 'A', 189, 6, 'Matara', '412232929'),
(0, 'A', 190, 6, 'Mathale', '662220494'),
(0, 'A', 191, 6, 'Nawalapitiya', '542222856'),
(0, 'A', 192, 6, 'Negambo', '312222682'),
(0, 'A', 193, 6, 'Nuwara ELiya', '522222156'),
(0, 'A', 194, 6, 'Panadura', '383398970'),
(0, 'A', 195, 6, 'Rathmalana', '112731455'),
(0, 'A', 196, 6, 'Rathnapura', '452226019'),
(0, 'A', 197, 6, 'Thalawakele', '522258350'),
(0, 'A', 198, 6, 'Trinco', '263207145'),
(0, 'A', 199, 6, 'Wattala', '112949396');

-- --------------------------------------------------------

--
-- Table structure for table `images_details`
--

CREATE TABLE `images_details` (
  `finact` int(1) NOT NULL,
  `status` varchar(2) NOT NULL,
  `imgdetails_key` int(11) NOT NULL,
  `requestdoc_key` int(11) NOT NULL,
  `casedetails_key` int(11) NOT NULL,
  `casecycle_key` int(11) NOT NULL,
  `document_name` varchar(300) NOT NULL,
  `img_path` varchar(300) NOT NULL,
  `sys_enterdate` datetime NOT NULL DEFAULT current_timestamp(),
  `act_person` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `images_details`
--

INSERT INTO `images_details` (`finact`, `status`, `imgdetails_key`, `requestdoc_key`, `casedetails_key`, `casecycle_key`, `document_name`, `img_path`, `sys_enterdate`, `act_person`) VALUES
(0, 'A', 1, 1, 1, 1, 'NIC', 'a1.jpg', '2021-08-05 14:29:07', 1),
(0, 'A', 2, 1, 1, 1, 'NIC', 'a2.jpg', '2021-08-05 14:29:07', 1),
(0, 'A', 3, 1, 1, 1, 'NIC', 'a3.jpg', '2021-08-05 14:29:08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `initialimages_details`
--

CREATE TABLE `initialimages_details` (
  `finact` int(1) NOT NULL,
  `status` varchar(2) NOT NULL,
  `initialimages_key` int(11) NOT NULL,
  `case_key` int(11) NOT NULL,
  `initialimg_name` varchar(200) NOT NULL,
  `sys_enterdte` datetime NOT NULL DEFAULT current_timestamp(),
  `act_person` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `initialimages_details`
--

INSERT INTO `initialimages_details` (`finact`, `status`, `initialimages_key`, `case_key`, `initialimg_name`, `sys_enterdte`, `act_person`) VALUES
(0, 'A', 1, 1, 'NIC', '2021-06-14 20:51:44', 1),
(0, 'A', 2, 1, 'Marrage Certificate', '2021-06-14 20:51:52', 1),
(0, 'A', 3, 1, 'Telephone Bill', '2021-06-18 09:39:11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lawyerfeehistory_details`
--

CREATE TABLE `lawyerfeehistory_details` (
  `finact` int(1) NOT NULL,
  `status` varchar(2) NOT NULL,
  `lawyerfeehistory_key` int(11) NOT NULL,
  `casedetails_key` int(11) NOT NULL,
  `casecycle_key` int(11) NOT NULL,
  `fee` double NOT NULL,
  `reasons` varchar(300) DEFAULT NULL,
  `date` date NOT NULL,
  `sys_enterdate` datetime NOT NULL DEFAULT current_timestamp(),
  `act_person` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lawyerfeehistory_details`
--

INSERT INTO `lawyerfeehistory_details` (`finact`, `status`, `lawyerfeehistory_key`, `casedetails_key`, `casecycle_key`, `fee`, `reasons`, `date`, `sys_enterdate`, `act_person`) VALUES
(0, 'A', 1, 1, 1, 50000, 'Initial Fees', '2021-08-12', '2021-08-05 10:20:43', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lowyer_registration`
--

CREATE TABLE `lowyer_registration` (
  `finact` int(1) NOT NULL,
  `status` varchar(2) NOT NULL,
  `lowyer_key` int(11) NOT NULL,
  `lowyer_name` varchar(300) NOT NULL,
  `contact_no` varchar(10) NOT NULL,
  `office_address` varchar(150) NOT NULL,
  `nic_no` varchar(100) NOT NULL,
  `qulification` varchar(150) DEFAULT NULL,
  `email` varchar(250) NOT NULL,
  `user_nme` varchar(100) NOT NULL,
  `password` varchar(300) NOT NULL,
  `created_dte` datetime NOT NULL DEFAULT current_timestamp(),
  `act_person` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lowyer_registration`
--

INSERT INTO `lowyer_registration` (`finact`, `status`, `lowyer_key`, `lowyer_name`, `contact_no`, `office_address`, `nic_no`, `qulification`, `email`, `user_nme`, `password`, `created_dte`, `act_person`) VALUES
(0, 'A', 1, 'Serarathne ddfs', '0715522227', '145,SSS,DDDSS', '', 'Atn.Lawss', 'lahiruc700@gmail.com', 'senarathne', '202cb962ac59075b964b07152d234b70', '2021-01-13 16:27:56', 1),
(0, 'A', 2, 'Kasun', '0712233344', 'Colombo', '', 'LLB', '', 'kasun', '8af95fe2ab1a54b488ef8efb3f3b0797', '2021-01-16 19:54:37', 3),
(0, 'A', 3, 'Sarath Wanninayake', '0713002001', 'Colombo High Court', '', 'BBA', '', 'sarath', '8af95fe2ab1a54b488ef8efb3f3b0797', '2021-06-01 21:18:27', 5),
(0, 'A', 4, 'Irasha', '0716672803', '152 B3, Hulftsdorp Street, Colombo 12.', '', 'LLB(Colombo) Attorney at Law ', '', 'irasha12', '81dc9bdb52d04dc20036dbd8313ed055', '2021-06-18 09:34:04', 1),
(0, 'A', 5, 'fdfsdf', '0716534253', 'abc', 'ssdV', 'ddsdsa', 'lahiruc700@gmail.com', 'ssd', '202cb962ac59075b964b07152d234b70', '2021-08-15 21:35:55', 1);

-- --------------------------------------------------------

--
-- Table structure for table `observation_details`
--

CREATE TABLE `observation_details` (
  `finact` int(1) NOT NULL,
  `status` varchar(2) NOT NULL,
  `observationdetail_key` int(11) NOT NULL,
  `casedetails_key` int(11) NOT NULL,
  `casecycle_key` int(11) NOT NULL,
  `paragraph` int(11) NOT NULL,
  `observationn` varchar(1000) NOT NULL,
  `sys_enterdte` datetime NOT NULL DEFAULT current_timestamp(),
  `act_person` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `observation_details`
--

INSERT INTO `observation_details` (`finact`, `status`, `observationdetail_key`, `casedetails_key`, `casecycle_key`, `paragraph`, `observationn`, `sys_enterdte`, `act_person`) VALUES
(0, 'A', 1, 1, 1, 1, 'asfas', '2021-08-05 10:22:41', 1);

-- --------------------------------------------------------

--
-- Table structure for table `prepairpoints_details`
--

CREATE TABLE `prepairpoints_details` (
  `finact` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `perparepoints_key` int(11) NOT NULL,
  `paragraph` int(11) NOT NULL,
  `casedetails_key` int(11) NOT NULL,
  `casecycle_key` int(11) NOT NULL,
  `points` varchar(1200) DEFAULT NULL,
  `sys_enterdte` datetime NOT NULL DEFAULT current_timestamp(),
  `act_person` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prepairpoints_details`
--

INSERT INTO `prepairpoints_details` (`finact`, `status`, `perparepoints_key`, `paragraph`, `casedetails_key`, `casecycle_key`, `points`, `sys_enterdte`, `act_person`) VALUES
(0, 0, 1, 1, 1, 1, 'asdff', '2021-08-05 10:22:35', 1);

-- --------------------------------------------------------

--
-- Table structure for table `requestdocument_details`
--

CREATE TABLE `requestdocument_details` (
  `finact` int(1) NOT NULL,
  `status` varchar(2) NOT NULL,
  `requestdoc_key` int(11) NOT NULL,
  `casedetails_key` int(11) NOT NULL,
  `casecycle_key` int(11) NOT NULL,
  `request_dte` date NOT NULL,
  `lawyer_key` int(11) NOT NULL,
  `document_name` varchar(700) NOT NULL,
  `submission_date` date DEFAULT NULL,
  `upload_dte` date DEFAULT NULL,
  `client_key` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `requestdocument_details`
--

INSERT INTO `requestdocument_details` (`finact`, `status`, `requestdoc_key`, `casedetails_key`, `casecycle_key`, `request_dte`, `lawyer_key`, `document_name`, `submission_date`, `upload_dte`, `client_key`) VALUES
(0, 'A', 1, 1, 1, '2021-08-13', 1, 'NIC', '2021-08-20', '2021-08-13', 1),
(0, 'A', 2, 1, 1, '2021-08-13', 1, 'Marrage Certificate', '2021-08-20', NULL, NULL),
(0, 'A', 3, 1, 1, '2021-08-10', 1, 'Telephone Bill', '2021-08-12', NULL, NULL),
(0, 'A', 4, 1, 1, '2021-08-13', 1, 'Birth Certificate', '2021-08-28', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_master`
--

CREATE TABLE `user_master` (
  `finact` int(1) NOT NULL,
  `status` varchar(2) NOT NULL,
  `user_key` int(11) NOT NULL,
  `full_name` varchar(150) NOT NULL,
  `contact_no` varchar(10) NOT NULL,
  `address` varchar(200) NOT NULL,
  `user_nme` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL,
  `sys_enterdte` datetime NOT NULL DEFAULT current_timestamp(),
  `act_person` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`finact`, `status`, `user_key`, `full_name`, `contact_no`, `address`, `user_nme`, `password`, `sys_enterdte`, `act_person`) VALUES
(0, 'A', 1, 'Lahiru', '0714444444', '1234,AAA,DDD', 'la', '202cb962ac59075b964b07152d234b70', '2021-01-13 15:31:24', 0),
(0, 'A', 2, 'Dumindu', '07155525', '1234,GGG,HJHH', 'dumindu', 'c20ad4d76fe97759aa27a0c99bff6710', '2021-01-13 16:18:46', 1),
(0, 'A', 3, 'Mr Wageesha', '0712222222', '112,SSD,LLD', 'wageesha', '202cb962ac59075b964b07152d234b70', '2021-01-16 19:50:36', 1),
(0, 'A', 4, 'ssd', '577878', 'hjjhjhhjh', 'sdf', '8af95fe2ab1a54b488ef8efb3f3b0797', '2021-05-08 13:45:39', 1),
(0, 'A', 5, 'anusha', '0714002001', '151 Jayanthi Road, Meegahawatta,Dompe', 'anusha', '202cb962ac59075b964b07152d234b70', '2021-06-01 21:15:33', 1),
(0, 'A', 6, 'Wageesha Lakshan', '0773111394', 'No 11, 4th cross road, Walpola.', 'wageesha12', '81dc9bdb52d04dc20036dbd8313ed055', '2021-06-18 09:43:18', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `casecycle_details`
--
ALTER TABLE `casecycle_details`
  ADD PRIMARY KEY (`casecycle_key`);

--
-- Indexes for table `casepayment_details`
--
ALTER TABLE `casepayment_details`
  ADD PRIMARY KEY (`casepayment_key`);

--
-- Indexes for table `case_details`
--
ALTER TABLE `case_details`
  ADD PRIMARY KEY (`casedetail_key`);

--
-- Indexes for table `case_master`
--
ALTER TABLE `case_master`
  ADD PRIMARY KEY (`casemas_key`);

--
-- Indexes for table `client_master`
--
ALTER TABLE `client_master`
  ADD PRIMARY KEY (`client_key`);

--
-- Indexes for table `complaintype_master`
--
ALTER TABLE `complaintype_master`
  ADD PRIMARY KEY (`complaintypemas_key`);

--
-- Indexes for table `courttype_master`
--
ALTER TABLE `courttype_master`
  ADD PRIMARY KEY (`courttype_key`);

--
-- Indexes for table `court_master`
--
ALTER TABLE `court_master`
  ADD PRIMARY KEY (`courtmas_key`);

--
-- Indexes for table `images_details`
--
ALTER TABLE `images_details`
  ADD PRIMARY KEY (`imgdetails_key`);

--
-- Indexes for table `initialimages_details`
--
ALTER TABLE `initialimages_details`
  ADD PRIMARY KEY (`initialimages_key`);

--
-- Indexes for table `lawyerfeehistory_details`
--
ALTER TABLE `lawyerfeehistory_details`
  ADD PRIMARY KEY (`lawyerfeehistory_key`);

--
-- Indexes for table `lowyer_registration`
--
ALTER TABLE `lowyer_registration`
  ADD PRIMARY KEY (`lowyer_key`);

--
-- Indexes for table `observation_details`
--
ALTER TABLE `observation_details`
  ADD PRIMARY KEY (`observationdetail_key`);

--
-- Indexes for table `prepairpoints_details`
--
ALTER TABLE `prepairpoints_details`
  ADD PRIMARY KEY (`perparepoints_key`);

--
-- Indexes for table `requestdocument_details`
--
ALTER TABLE `requestdocument_details`
  ADD PRIMARY KEY (`requestdoc_key`);

--
-- Indexes for table `user_master`
--
ALTER TABLE `user_master`
  ADD PRIMARY KEY (`user_key`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `casecycle_details`
--
ALTER TABLE `casecycle_details`
  MODIFY `casecycle_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `casepayment_details`
--
ALTER TABLE `casepayment_details`
  MODIFY `casepayment_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `case_details`
--
ALTER TABLE `case_details`
  MODIFY `casedetail_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `case_master`
--
ALTER TABLE `case_master`
  MODIFY `casemas_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `client_master`
--
ALTER TABLE `client_master`
  MODIFY `client_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `complaintype_master`
--
ALTER TABLE `complaintype_master`
  MODIFY `complaintypemas_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `courttype_master`
--
ALTER TABLE `courttype_master`
  MODIFY `courttype_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `court_master`
--
ALTER TABLE `court_master`
  MODIFY `courtmas_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200;

--
-- AUTO_INCREMENT for table `images_details`
--
ALTER TABLE `images_details`
  MODIFY `imgdetails_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `initialimages_details`
--
ALTER TABLE `initialimages_details`
  MODIFY `initialimages_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lawyerfeehistory_details`
--
ALTER TABLE `lawyerfeehistory_details`
  MODIFY `lawyerfeehistory_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lowyer_registration`
--
ALTER TABLE `lowyer_registration`
  MODIFY `lowyer_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `observation_details`
--
ALTER TABLE `observation_details`
  MODIFY `observationdetail_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `prepairpoints_details`
--
ALTER TABLE `prepairpoints_details`
  MODIFY `perparepoints_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `requestdocument_details`
--
ALTER TABLE `requestdocument_details`
  MODIFY `requestdoc_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_master`
--
ALTER TABLE `user_master`
  MODIFY `user_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
