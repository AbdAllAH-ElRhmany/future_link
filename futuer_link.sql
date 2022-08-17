-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2022 at 10:32 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `futuer_link`
--

-- --------------------------------------------------------

--
-- Table structure for table `activeorders`
--

CREATE TABLE `activeorders` (
  `orderId` bigint(20) NOT NULL,
  `empId` bigint(20) NOT NULL,
  `comment` text NOT NULL,
  `deviceSerial` varchar(100) NOT NULL,
  `deviceModel` varchar(200) NOT NULL,
  `cost` float NOT NULL,
  `costComment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activeorders`
--

INSERT INTO `activeorders` (`orderId`, `empId`, `comment`, `deviceSerial`, `deviceModel`, `cost`, `costComment`) VALUES
(1, 7, 'asdfasd', 'fasdfasd', 'eqreqewr', 0, 'sdfsdfdf'),
(5, 1, '', '', '', 0, ''),
(9, 10, 'تم الزيارة', '34534', 'RTYRT', 50.5, 'RTYRT'),
(10, 8, '', '', '', 0, ''),
(11, 7, '', '', '', 0, ''),
(13, 1, 'bbxcvbx', '34345345', 'eqreqewr', 13, 'eqreqewr'),
(14, 7, 'rgsdfgsdfg', '234232', 'RTYRT', 5000, 'RTYRT'),
(15, 10, '', '', '', 0, ''),
(16, 1, 'فتح الجهاز', '2332', 'RTYRT', 60, '20 قطع غيار + 30 زيارة');

-- --------------------------------------------------------

--
-- Stand-in structure for view `active_orders`
-- (See below for the actual view)
--
CREATE TABLE `active_orders` (
`clientId` int(20)
,`orderPhone` varchar(15)
,`orderAddress` varchar(255)
,`deviceType` int(11)
,`status` tinyint(1)
,`openDate` date
,`closeDate` date
,`cost` float
,`costComment` varchar(255)
,`id` bigint(20)
,`name` varchar(120)
,`address` varchar(200)
,`phone` varchar(15)
,`email` varchar(120)
,`clientType` int(11)
,`type` varchar(50)
,`brand` varchar(70)
,`title` varchar(50)
,`content` varchar(150)
,`orderId` bigint(20)
,`empId` bigint(20)
,`comment` text
,`deviceSerial` varchar(100)
,`deviceModel` varchar(200)
,`empName` varchar(120)
);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) NOT NULL,
  `name` varchar(120) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(120) NOT NULL,
  `clientType` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `address`, `phone`, `email`, `clientType`) VALUES
(2, 'مصطفي محروس الرحماني', 'egypt', '01020304050', 'mostafa@mostafa.com', 2),
(3, 'abdallah elrhmany', 'egypt', '01069920781', 'nea76515@gmail.com', 1),
(4, 'محمد الرحماني', 'Damanhur, Buheira', '123456', 'a@a.com', 2),
(5, 'ابراهيم الرحماني', 'Damanhur, Buheira', '12345678999', 'w@w.com', 2);

-- --------------------------------------------------------

--
-- Table structure for table `client_type`
--

CREATE TABLE `client_type` (
  `typeId` int(11) NOT NULL,
  `type` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client_type`
--

INSERT INTO `client_type` (`typeId`, `type`) VALUES
(1, 'شركات'),
(2, 'أفراد'),
(3, 'فنادق');

-- --------------------------------------------------------

--
-- Table structure for table `device_brand`
--

CREATE TABLE `device_brand` (
  `brandId` int(11) NOT NULL,
  `brand` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `device_brand`
--

INSERT INTO `device_brand` (`brandId`, `brand`) VALUES
(1, 'توشيبا'),
(2, 'شارب'),
(3, 'فريش'),
(4, 'sdfss'),
(5, 'asdf'),
(6, 'www'),
(7, 'ee');

-- --------------------------------------------------------

--
-- Table structure for table `device_type`
--

CREATE TABLE `device_type` (
  `typeId` int(11) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `device_type`
--

INSERT INTO `device_type` (`typeId`, `type`) VALUES
(1, 'ثلاجات'),
(2, 'نشافات'),
(3, 'sdafa'),
(4, 'dd'),
(5, 'dfhdfg'),
(6, 'd'),
(7, 'غسالات'),
(8, 'سخان'),
(9, 'غسالاتy');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `empId` bigint(20) NOT NULL,
  `ssn` bigint(20) NOT NULL,
  `name` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL,
  `password` varchar(60) NOT NULL,
  `bdate` date NOT NULL,
  `job` int(11) NOT NULL,
  `rule` int(11) NOT NULL,
  `address` varchar(200) NOT NULL,
  `salary` float NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`empId`, `ssn`, `name`, `email`, `password`, `bdate`, `job`, `rule`, `address`, `salary`, `create_at`, `phone`) VALUES
(1, 1010, 'ahmed ahmed      ', 'a@a.com', '234', '2022-05-18', 2, 1, 'test test', 121.55, '2022-05-29 15:44:02', '01020304050'),
(6, 8798, 'مصطفي محروس الرحماني', 'm@m.com', '', '2020-03-31', 1, 1, 'egypt', 6546, '0000-00-00 00:00:00', '2354632'),
(7, 34534534, 'احمد الرحماني', 'r@r.r.com', '', '2022-05-24', 2, 1, 'egypt', 1254.5, '0000-00-00 00:00:00', '243523452'),
(8, 1234563423, 'مصطفي محروس الرحماني', 'neaa76515@gmail.com', '', '2022-05-29', 2, 1, 'Damanhur, Buheira', 1254.5, '0000-00-00 00:00:00', '+201069920781'),
(9, 12345, 'abdallah elrhmany', 'nea76515@gmail.com', '$2y$10$RDlC5gn1YzX4kw7ixyrIMuk9/js4zlfsM7WSZ9UerxnLpQzfonBvO', '2022-08-19', 1, 1, 'egypt', 1254.5, '0000-00-00 00:00:00', '01069920781'),
(10, 1234567899, 'مصطفي الرحماني', 'aa@aa.com', '$2y$10$dHraPH9fqtcgM4R2gXvuR.zuwoQXabINrz2puon9nAQdezlnkVG9u', '1999-07-12', 2, 1, 'Damanhur, Buheira', 2000, '2022-08-12 17:18:11', '123465789');

-- --------------------------------------------------------

--
-- Table structure for table `emp_rule`
--

CREATE TABLE `emp_rule` (
  `ruleId` int(11) NOT NULL,
  `rule` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emp_rule`
--

INSERT INTO `emp_rule` (`ruleId`, `rule`) VALUES
(1, 'مدير'),
(2, 'فني');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `jobId` int(11) NOT NULL,
  `title` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`jobId`, `title`) VALUES
(1, 'مدير'),
(2, 'فني'),
(3, 'كول سنتر'),
(4, 'سائق'),
(5, 'عامل');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderId` bigint(20) NOT NULL,
  `clientId` int(20) NOT NULL,
  `orderPhone` varchar(15) NOT NULL,
  `orderAddress` varchar(255) NOT NULL,
  `deviceBrand` int(11) NOT NULL,
  `deviceProblem` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `serviceType` int(11) NOT NULL,
  `deviceType` int(11) NOT NULL,
  `openDate` date NOT NULL DEFAULT current_timestamp(),
  `closeDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderId`, `clientId`, `orderPhone`, `orderAddress`, `deviceBrand`, `deviceProblem`, `status`, `serviceType`, `deviceType`, `openDate`, `closeDate`) VALUES
(1, 2, '4566', 'Test', 3, 4, 1, 2, 2, '2022-08-17', '2022-08-17'),
(5, 3, '01069920781', 'egypt', 2, 5, 0, 2, 3, '2022-08-07', NULL),
(7, 0, '', '', 0, 0, 0, 0, 0, '2022-06-07', '0000-00-00'),
(8, 0, '', '', 0, 0, 0, 0, 0, '2022-06-07', '2022-06-07'),
(9, 4, '123456', 'Damanhur, Buheira', 2, 3, 1, 1, 2, '2022-08-12', '2022-08-12'),
(10, 3, '01069920781', 'egypt', 1, 2, 0, 2, 1, '2022-07-12', NULL),
(11, 3, '01069920781', 'egypt', 2, 3, 0, 3, 2, '2022-08-07', NULL),
(13, 2, '01020304050', 'this is address  ', 1, 2, 1, 1, 1, '2022-08-07', '2022-08-07'),
(14, 3, '01069920781', 'egypt', 1, 2, 1, 1, 1, '2022-08-11', '2022-08-11'),
(15, 4, '123456', 'Damanhur, Buheira', 1, 7, 1, 1, 7, '2022-08-11', '2022-08-12'),
(16, 3, '01069920781', 'egypt', 1, 2, 1, 1, 1, '2022-08-12', '2022-08-12');

-- --------------------------------------------------------

--
-- Stand-in structure for view `order_details`
-- (See below for the actual view)
--
CREATE TABLE `order_details` (
`orderId` bigint(20)
,`id` bigint(20)
,`name` varchar(120)
,`address` varchar(200)
,`phone` varchar(15)
,`email` varchar(120)
,`clientType` int(11)
,`clientTypeTitle` varchar(60)
,`type` varchar(50)
,`brand` varchar(70)
,`content` varchar(150)
,`title` varchar(50)
,`clientId` int(20)
,`deviceBrand` int(11)
,`deviceProblem` int(11)
,`status` tinyint(1)
,`serviceType` int(11)
,`deviceType` int(11)
,`orderPhone` varchar(15)
,`orderAddress` varchar(255)
,`openDate` date
,`closeDate` date
);

-- --------------------------------------------------------

--
-- Table structure for table `order_spare_parts`
--

CREATE TABLE `order_spare_parts` (
  `id` bigint(20) NOT NULL,
  `partId` bigint(20) NOT NULL,
  `orderId` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_spare_parts`
--

INSERT INTO `order_spare_parts` (`id`, `partId`, `orderId`) VALUES
(28, 2, 13),
(30, 1, 14),
(31, 3, 9),
(32, 5, 9),
(33, 2, 16);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `cost` float NOT NULL,
  `createdAt` date NOT NULL,
  `is_mainly` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `title`, `cost`, `createdAt`, `is_mainly`) VALUES
(1, 'بنزين', 50.5, '2022-08-10', 0),
(3, 'test', 34534, '2022-06-14', 0),
(6, 'ايجار', 200, '2022-08-01', 1),
(7, 'buying', 10, '2022-08-12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `problems`
--

CREATE TABLE `problems` (
  `problemId` bigint(20) NOT NULL,
  `deviceType` int(11) NOT NULL,
  `content` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `problems`
--

INSERT INTO `problems` (`problemId`, `deviceType`, `content`) VALUES
(1, 7, 'aSD'),
(2, 1, 'SDSDS'),
(3, 2, 'test'),
(4, 2, 'عطل'),
(5, 3, 'werwe'),
(6, 3, 'test'),
(7, 7, 'test'),
(8, 2, 'asd'),
(9, 1, 'باب'),
(10, 5, 'عطل');

-- --------------------------------------------------------

--
-- Table structure for table `service_type`
--

CREATE TABLE `service_type` (
  `serviceId` int(11) NOT NULL,
  `title` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_type`
--

INSERT INTO `service_type` (`serviceId`, `title`) VALUES
(1, 'تنظيف'),
(2, 'صيانة'),
(3, 'تركيب');

-- --------------------------------------------------------

--
-- Table structure for table `spare_parts`
--

CREATE TABLE `spare_parts` (
  `spareId` bigint(20) NOT NULL,
  `name` varchar(150) NOT NULL,
  `serial` varchar(100) NOT NULL,
  `deviceType` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `spare_parts`
--

INSERT INTO `spare_parts` (`spareId`, `name`, `serial`, `deviceType`) VALUES
(1, 'test', '45374554745', 1),
(2, 'test2', '34534', 1),
(3, 'test', '34534', 2),
(4, 'test55', '8979', 3),
(5, 'مروحة', '2332', 2),
(6, 'test222', '234232', 2),
(7, 'مروحة', '34534', 3),
(8, 'اللابال', '34534', 1),
(9, 'asdfa', '8979', 9);

-- --------------------------------------------------------

--
-- Structure for view `active_orders`
--
DROP TABLE IF EXISTS `active_orders`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `active_orders`  AS SELECT `orders`.`clientId` AS `clientId`, `orders`.`orderPhone` AS `orderPhone`, `orders`.`orderAddress` AS `orderAddress`, `orders`.`deviceType` AS `deviceType`, `orders`.`status` AS `status`, `orders`.`openDate` AS `openDate`, `orders`.`closeDate` AS `closeDate`, `activeorders`.`cost` AS `cost`, `activeorders`.`costComment` AS `costComment`, `clients`.`id` AS `id`, `clients`.`name` AS `name`, `clients`.`address` AS `address`, `clients`.`phone` AS `phone`, `clients`.`email` AS `email`, `clients`.`clientType` AS `clientType`, `device_type`.`type` AS `type`, `device_brand`.`brand` AS `brand`, `service_type`.`title` AS `title`, `problems`.`content` AS `content`, `activeorders`.`orderId` AS `orderId`, `activeorders`.`empId` AS `empId`, `activeorders`.`comment` AS `comment`, `activeorders`.`deviceSerial` AS `deviceSerial`, `activeorders`.`deviceModel` AS `deviceModel`, `employees`.`name` AS `empName` FROM (((((((`orders` join `clients` on(`clients`.`id` = `orders`.`clientId`)) join `device_type` on(`device_type`.`typeId` = `orders`.`deviceType`)) join `device_brand` on(`device_brand`.`brandId` = `orders`.`deviceBrand`)) join `service_type` on(`service_type`.`serviceId` = `orders`.`serviceType`)) join `problems` on(`problems`.`problemId` = `orders`.`deviceProblem`)) join `activeorders` on(`activeorders`.`orderId` = `orders`.`orderId`)) join `employees` on(`employees`.`empId` = `activeorders`.`empId`)) ;

-- --------------------------------------------------------

--
-- Structure for view `order_details`
--
DROP TABLE IF EXISTS `order_details`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `order_details`  AS SELECT `orders`.`orderId` AS `orderId`, `clients`.`id` AS `id`, `clients`.`name` AS `name`, `clients`.`address` AS `address`, `clients`.`phone` AS `phone`, `clients`.`email` AS `email`, `clients`.`clientType` AS `clientType`, `client_type`.`type` AS `clientTypeTitle`, `device_type`.`type` AS `type`, `device_brand`.`brand` AS `brand`, `problems`.`content` AS `content`, `service_type`.`title` AS `title`, `orders`.`clientId` AS `clientId`, `orders`.`deviceBrand` AS `deviceBrand`, `orders`.`deviceProblem` AS `deviceProblem`, `orders`.`status` AS `status`, `orders`.`serviceType` AS `serviceType`, `orders`.`deviceType` AS `deviceType`, `orders`.`orderPhone` AS `orderPhone`, `orders`.`orderAddress` AS `orderAddress`, `orders`.`openDate` AS `openDate`, `orders`.`closeDate` AS `closeDate` FROM ((((((`orders` join `clients` on(`clients`.`id` = `orders`.`clientId`)) join `device_type` on(`device_type`.`typeId` = `orders`.`deviceType`)) join `device_brand` on(`device_brand`.`brandId` = `orders`.`deviceBrand`)) join `problems` on(`problems`.`problemId` = `orders`.`deviceProblem`)) join `service_type` on(`service_type`.`serviceId` = `orders`.`serviceType`)) join `client_type` on(`client_type`.`typeId` = `clients`.`clientType`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activeorders`
--
ALTER TABLE `activeorders`
  ADD PRIMARY KEY (`orderId`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `client_type`
--
ALTER TABLE `client_type`
  ADD PRIMARY KEY (`typeId`);

--
-- Indexes for table `device_brand`
--
ALTER TABLE `device_brand`
  ADD PRIMARY KEY (`brandId`);

--
-- Indexes for table `device_type`
--
ALTER TABLE `device_type`
  ADD PRIMARY KEY (`typeId`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`empId`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `ssn` (`ssn`) USING BTREE;

--
-- Indexes for table `emp_rule`
--
ALTER TABLE `emp_rule`
  ADD PRIMARY KEY (`ruleId`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`jobId`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderId`);

--
-- Indexes for table `order_spare_parts`
--
ALTER TABLE `order_spare_parts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `problems`
--
ALTER TABLE `problems`
  ADD PRIMARY KEY (`problemId`);

--
-- Indexes for table `service_type`
--
ALTER TABLE `service_type`
  ADD PRIMARY KEY (`serviceId`);

--
-- Indexes for table `spare_parts`
--
ALTER TABLE `spare_parts`
  ADD PRIMARY KEY (`spareId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activeorders`
--
ALTER TABLE `activeorders`
  MODIFY `orderId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `client_type`
--
ALTER TABLE `client_type`
  MODIFY `typeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `device_brand`
--
ALTER TABLE `device_brand`
  MODIFY `brandId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `device_type`
--
ALTER TABLE `device_type`
  MODIFY `typeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `empId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `emp_rule`
--
ALTER TABLE `emp_rule`
  MODIFY `ruleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `jobId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `order_spare_parts`
--
ALTER TABLE `order_spare_parts`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `problems`
--
ALTER TABLE `problems`
  MODIFY `problemId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `service_type`
--
ALTER TABLE `service_type`
  MODIFY `serviceId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `spare_parts`
--
ALTER TABLE `spare_parts`
  MODIFY `spareId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
