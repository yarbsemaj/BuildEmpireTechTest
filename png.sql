-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: mysql:3306
-- Generation Time: Apr 23, 2019 at 01:35 AM
-- Server version: 5.7.25
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `png`
--

-- --------------------------------------------------------

--
-- Table structure for table `goods`
--

CREATE TABLE `goods` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `quote_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` longtext NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `product_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `product_type_id`) VALUES
(1, 'Teaching course', 'Th’art nesh thee nay lad soft lad wacken thi sen up t’foot o’ our stairs. Nay lad where’s tha bin. Th’art nesh thee a pint ‘o mild any rooad t’foot o’ our stairs. Where there’s muck there’s brass t’foot o’ our stairs ah’ll gi’ thee a thick ear. Ah’ll learn thi tintintin tell thi summat for nowt soft lad mardy bum. Chuffin’ nora ah’ll box thi ears soft lad ee by gum tell thi summat for nowt ah’ll gi’ thee a thick ear. Bobbar nay lad. Breadcake soft southern pansy wacken thi sen up. Be reet where’s tha bin mardy bum mardy bum. Tell thi summat for nowt where there’s muck there’s brass shu’ thi gob. Dahn t’coil oil. That’s champion ey up will ‘e ‘eckerslike shurrup by ‘eck. Eeh. Shu’ thi gob face like a slapped arse god’s own county soft lad th’art nesh thee tha daft apeth.', '49.99', 1),
(2, 'Teaching Session', 'Ne’ermind soft lad th’art nesh thee gi’ o’er ah’ll box thi ears shurrup. Tha knows wacken thi sen up cack-handed nay lad gi’ o’er ne’ermind. Ee by gum. Tintintin ah’ll box thi ears aye tha what ne’ermind big girl’s blouse. Nay lad tintintin face like a slapped arse what’s that when it’s at ooam. Michael palin ah’ll gi’ thee a thick ear. By ‘eck that’s champion mardy bum mardy bum t’foot o’ our stairs appens as maybe. Will ‘e ‘eckerslike. Big girl’s blouse nay lad tha knows. Eeh ah’ll gi’ thee a thick ear. Where there’s muck there’s brass. Shurrup where there’s muck there’s brass. Aye. T’foot o’ our stairs cack-handed where’s tha bin. Soft lad.', '25.00', 2),
(3, 'Text Book', 'Nobbut a lad big girl’s blouse nay lad is that thine shurrup. By ‘eck th’art nesh thee shu’ thi gob. Bloomin’ ‘eck nay lad tintintin god’s own county. Chuffin’ nora breadcake nobbut a lad shu’ thi gob. How much that’s champion how much shu’ thi gob. Sup wi’ ‘im bobbar shurrup where there’s muck there’s brass. Shu’ thi gob bobbar. Ah’ll learn thi god’s own county where’s tha bin. Bloomin’ ‘eck ne’ermind. Dahn t’coil oil th’art nesh thee that’s champion wacken thi sen up ah’ll gi’ thee a thick ear. Bobbar ee by gum is that thine. Cack-handed. Soft lad ey up big girl’s blouse nay lad that’s champion.\r\n\r\n', '9.50', 3);

-- --------------------------------------------------------

--
-- Table structure for table `product_types`
--

CREATE TABLE `product_types` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `model` text NOT NULL,
  `price_per` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_types`
--

INSERT INTO `product_types` (`id`, `name`, `model`, `price_per`) VALUES
(1, 'Subscription', 'Subscription', 'Day'),
(2, 'Service', 'Service', 'Hour'),
(3, 'Goods', 'Good', 'Unit');

-- --------------------------------------------------------

--
-- Table structure for table `quotes`
--

CREATE TABLE `quotes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `weekday_id` int(11) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `length` int(11) NOT NULL,
  `quote_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `quote_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `first_name` text NOT NULL,
  `surname` text NOT NULL,
  `password` longtext NOT NULL,
  `phone_number` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `weekdays`
--

CREATE TABLE `weekdays` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `weekdays`
--

INSERT INTO `weekdays` (`id`, `name`) VALUES
(1, 'Monday'),
(2, 'Tuesday'),
(3, 'Wednesday'),
(4, 'Thursday'),
(5, 'Friday'),
(6, 'Saturday');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_type_id` (`product_type_id`);

--
-- Indexes for table `product_types`
--
ALTER TABLE `product_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotes`
--
ALTER TABLE `quotes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `weekdays`
--
ALTER TABLE `weekdays`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_types`
--
ALTER TABLE `product_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `quotes`
--
ALTER TABLE `quotes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `weekdays`
--
ALTER TABLE `weekdays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`product_type_id`) REFERENCES `product_types` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
