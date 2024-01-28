-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2024 at 07:51 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kiosk`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `admin_id` varchar(20) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`admin_id`, `admin_name`, `admin_password`) VALUES
('AD001', 'Ansley', 'ansley3318');

-- --------------------------------------------------------

--
-- Table structure for table `food_vendor`
--

CREATE TABLE `food_vendor` (
  `vendor_id` varchar(20) NOT NULL,
  `vendor_name` varchar(50) NOT NULL,
  `vendor_password` varchar(50) NOT NULL,
  `vendor_email` varchar(50) NOT NULL,
  `vendor_address` varchar(100) NOT NULL,
  `vendor_phonenum` varchar(20) NOT NULL,
  `vendor_qrcode` varchar(100) NOT NULL,
  `approvalStatus` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food_vendor`
--

INSERT INTO `food_vendor` (`vendor_id`, `vendor_name`, `vendor_password`, `vendor_email`, `vendor_address`, `vendor_phonenum`, `vendor_qrcode`, `approvalStatus`) VALUES
('F001', 'Rozita Cafe', 'rozita4684', 'rozita84@gmail.com', 'Faculty of Computing, Kampus Pekan, Pahang', '0134879654', '1706466997.png', 'Approved'),
('F002', 'Roha Ent', 'roha1846', 'roha@gmail.com', '7,JALAN TINGKAT BETEK 2,', '01162489611', '1706467014.png', 'Approved'),
('F003', 'Zairul bin Sakri', 'zairul5566', 'zairul@gmail.com', 'Faculty of Computing, Kampus Pekan, Pahang', '01162489611', '1706467019.png', 'Approved'),
('F004', 'Shawarma Shop', 'shawarma123', 'shawarma@gmail.com', 'Kafe Blok C, UMPSA Pekan', '0125487652', '1706467026.png', 'Approved'),
('F005', 'FK Cafe', 'fk365985', 'fk@gmail.com', 'Taman Harmoni 11, Pekan', '0124356879', '1706465379.png', 'Approved'),
('F006', 'FKP Cafe', 'fkp56794', 'fkp@gmail.com', 'Taman Beruas Jaya 2, Pekan', '0121235684', '1706465418.png', 'Approved'),
('F007', 'Yeman Cafe', 'yeman5689', 'yeman@gmail.com', 'Taman Melor 6, Pekan', '0124356666', '1706465446.png', 'Pending'),
('F008', 'Cafe Zul', 'zul25468', 'zul@gmail.com', 'Taman Beruas Jaya 11, Pekan', '0125698745', '1706465469.png', 'Pending'),
('F009', 'Cafe Maju', 'majutydd', 'maju@gmail.com', 'Taman Beruas Jaya', '0134895678', '1706465514.png', 'Pending'),
('F010', 'Eco Cafe', 'eco56984', 'eco@gmail.com', 'Taman Harmoni 8, Pekan', '0165479951', '1706465542.png', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `list_of_menu`
--

CREATE TABLE `list_of_menu` (
  `id` int(11) NOT NULL,
  `vendor_id` varchar(255) NOT NULL,
  `menu_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `list_of_menu`
--

INSERT INTO `list_of_menu` (`id`, `vendor_id`, `menu_name`, `quantity`, `price`) VALUES
(17, 'F001', 'Nasi Lemak', 10, 2.00),
(18, 'F001', 'Nasi Goreng', 7, 5.00),
(19, 'F002', 'Chicken Chop', 2, 10.00),
(20, 'F001', 'Bihun Goreng', 15, 2.00),
(22, 'F002', 'Lamb Chop', 5, 15.00),
(34, 'F003', 'Jus Epal', 15, 3.00),
(35, 'F004', 'Beef Shawarma', 5, 8.00),
(36, 'F004', 'Chicken Shawarma', 8, 5.00),
(37, 'F004', 'Falafel', 4, 10.00);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` varchar(10) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_address` varchar(100) NOT NULL,
  `user_phonenum` varchar(20) NOT NULL,
  `user_qrcode` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_password`, `user_email`, `user_address`, `user_phonenum`, `user_qrcode`) VALUES
('R001', 'Lianna', 'lianna0225', 'lianna@gmail.com', 'Block G, KK5, Kampus Pekan, Pahang', '0125698745', '1706467009.png'),
('R002', 'izzati', 'izzati123', 'nnrzty@gmail.com	', 'Kg Delek', '0123456789', '1706467049.png'),
('R003', 'veniess', 'veniess1029', 'veniess29@gmail.com', '138, Lorong Melor 11, Taman Melor, 26600 Pekan, Pahang', '0165987878', '1706467414.png'),
('R004', 'Amir', 'amir5648', 'amir@gmail.com', '138, Lorong 7, Taman Makmur Beruas Jaya, Pekan, Pahang', '0134895678', '1706465307.png'),
('R005', 'Fionna', 'fionna1123', 'fionna@gmail.com', '666, Taman Melor 6, Pekan', '0165479951', '1706467042.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `food_vendor`
--
ALTER TABLE `food_vendor`
  ADD PRIMARY KEY (`vendor_id`);

--
-- Indexes for table `list_of_menu`
--
ALTER TABLE `list_of_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `list_of_menu`
--
ALTER TABLE `list_of_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
