-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 20, 2026 at 04:18 AM
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
-- Database: `kfc_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `menu_id` varchar(10) NOT NULL,
  `menu_name` varchar(255) NOT NULL,
  `menu_price` double NOT NULL,
  `menu_image` text NOT NULL,
  `type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`menu_id`, `menu_name`, `menu_price`, `menu_image`, `type_id`) VALUES
('M01', 'เครื่องดื่มเป๊บซี่', 35, 'https://images.ctfassets.net/n4pc9wlortyn/6vvUyuXaRROoCVhOY3nmLX/a248ffc9305534fbdedb16e695ee3892/Pepsi_1_Glass_480x388.png?h=900&w=1200&fm=webp&fit=fill', 5),
('M02', 'ทาร์ตไข่คิทแคทโอเวอร์โหลด', 35, 'https://images.ctfassets.net/n4pc9wlortyn/2OArAOq82M7pWOzQIMrGll/1f69081bcb31e0075dfc7f02ab68003c/1pc_Egg-Tart-KITKAT-Overload.png?h=900&w=1200&fm=webp&fit=fill', 4),
('M03', 'เดอะบอกซ์ ซิกเนเจอร์', 159, 'https://images.ctfassets.net/n4pc9wlortyn/7BoZpkNiyICqN9CLgBl9J8/2450d9dcfeada69618d4819a3b59b3ef/JPU_The_Box_Signature_480x388.png?h=900&w=1200&fm=webp&fit=fill', 1),
('M04', 'ชุดซิงเกอร์เบอร์เกอร์', 119, 'https://images.ctfassets.net/n4pc9wlortyn/6xIGgEQ7eJdaKdTRSUGajq/6cb51e9d63e6f7982aae7d01038465c1/JPU_Zinger_Set_480x388.png?h=900&w=1200&fm=webp&fit=fill', 2),
('M05', 'ปาร์ตี้ วิงซ์ภูเขาไฟระเบิด', 299, 'https://images.ctfassets.net/n4pc9wlortyn/7xilbNXvGJeHjfh2ywRidG/3e2cdb7304e2e7c59912aceb10b7b153/Volcano-wingz_Party.png?h=900&w=1200&fm=webp&fit=fill', 3),
('M06', 'แม่ไก่', 9, 'https://media.istockphoto.com/id/1930591987/photo/a-red-hen.webp?b=1&s=612x612&w=0&k=20&c=OP5n4h8joDmJpxoKfC6W5oz_XLkXzoXpNymJKg25uEI=', 3);

-- --------------------------------------------------------

--
-- Table structure for table `menu_types`
--

CREATE TABLE `menu_types` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu_types`
--

INSERT INTO `menu_types` (`type_id`, `type_name`) VALUES
(1, 'เดอะบอกซ์'),
(2, 'ชุดอิ่มเดี่ยว'),
(3, 'ชุดอิ่มกลุ่ม'),
(4, 'ของหวาน'),
(5, 'เครื่องดื่ม');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`menu_id`),
  ADD KEY `type_id` (`type_id`);

--
-- Indexes for table `menu_types`
--
ALTER TABLE `menu_types`
  ADD PRIMARY KEY (`type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu_types`
--
ALTER TABLE `menu_types`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `menu_types` (`type_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
