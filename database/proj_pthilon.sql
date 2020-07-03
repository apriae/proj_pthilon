-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2020 at 06:16 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proj_pthilon`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone_number` varchar(25) NOT NULL,
  `address` varchar(100) NOT NULL,
  `logo` text NOT NULL,
  `date_modified` datetime NOT NULL,
  `status` varchar(12) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `phone_number`, `address`, `logo`, `date_modified`, `status`) VALUES
(1, 'PT. Indomaret', '021 123456789', 'Jatake, Tangerang', 'indomaret.jpg', '2020-07-03 05:37:04', 'active'),
(2, 'PT. Alfamart', '021 454894651', 'Cikokol, Tangerang', 'alfa.jpg', '2020-07-03 06:11:39', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `pic`
--

CREATE TABLE `pic` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `phone_number` varchar(25) NOT NULL,
  `address` varchar(100) NOT NULL,
  `date_modified` datetime NOT NULL,
  `status` varchar(12) NOT NULL DEFAULT 'active',
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pic`
--

INSERT INTO `pic` (`id`, `name`, `email_address`, `phone_number`, `address`, `date_modified`, `status`, `company_id`) VALUES
(1, 'Mochammad Apri AE', 'aprigeuza@gmail.com', '0812454815166', 'Tigaraksa, Tangerang', '2020-07-03 05:59:19', 'active', 1),
(2, 'Jono', 'jono@gmail.com', '015112', 'tangerang', '2020-07-03 06:05:46', 'active', 1),
(3, 'Jini', 'jini@gmail.com', '021916515', 'Test', '2020-07-03 06:06:03', 'active', 1),
(4, 'Uye', 'uye@gmail.com', '021548451515', 'Test', '2020-07-03 06:09:19', 'active', 0);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `name` varchar(50) NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` longtext NOT NULL,
  `level` varchar(25) NOT NULL,
  `last_login` datetime NOT NULL,
  `name` varchar(50) NOT NULL,
  `obsolete` tinyint(4) NOT NULL DEFAULT 0,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `level`, `last_login`, `name`, `obsolete`, `email`, `phone_number`) VALUES
(1, 'sa', 'be03ccaa6c0cbe1143cd6b8df4fa0a3726e34d3188da0e1668f05f8bd9d175669e6bc82284d4c2d25ec470f377eb5ecfe7926353700dbcec906621674c06bf7cfSqjntJ6tni82OFjrKd18N5wF5xE9Qx2lEigA718pao=', 'sa', '2020-06-27 15:06:45', 'System Administrator', 0, '', ''),
(2, 'user', '6c3fc37baf0057128cc553ae30c6434d62ad64f670ebba1fce9e6a09fe3d530b8570d126c07a243666617901e61de6f05381d73f682adca883a675fab1820d96YHoPhoMj+AiQg86HZ48OlNSnq/Q5bxmCgfz/QI0XkAU=', 'user', '2020-04-19 12:21:14', 'User', 0, '', ''),
(3, 'op01', '73826ed17dfaaf31d611250455d840c9aa1113d70c1338f588d63a2d78d0eb91a684ccbcf046eae816c85ef473c5a9b797cc1ad128e52a3d31953540e6565739PUzFuiOPhO5GIlzVP8RylGPVhJIieom5xy6zZ5qa8pc=', 'operator', '2020-06-23 16:16:34', 'Jhoni', 0, '', ''),
(4, 'op02', '6c3fc37baf0057128cc553ae30c6434d62ad64f670ebba1fce9e6a09fe3d530b8570d126c07a243666617901e61de6f05381d73f682adca883a675fab1820d96YHoPhoMj+AiQg86HZ48OlNSnq/Q5bxmCgfz/QI0XkAU=', 'operator', '2020-05-07 12:15:21', 'Rina', 0, '', ''),
(5, 'op03', '6c3fc37baf0057128cc553ae30c6434d62ad64f670ebba1fce9e6a09fe3d530b8570d126c07a243666617901e61de6f05381d73f682adca883a675fab1820d96YHoPhoMj+AiQg86HZ48OlNSnq/Q5bxmCgfz/QI0XkAU=', 'operator', '2020-04-04 04:28:59', 'Sabeni', 0, '', ''),
(8, 'aprigeuza@gmail.com', '6a44c2bc978f9bd432711b923d96ad4cf67292821ab0e977c1e0f72750d810b2d10cf4a062e6fa586cd15f293c561ec2560230425103fd1157a57159d436fcea5CkK+SrWLcIlXHsG+sG36VziO21aNvlUTI7BOysurJk=', 'user', '2020-06-27 11:55:54', 'Apri', 0, 'aprigeuza@gmail.com', ''),
(9, 'rusiprisie@gmail.com', '0c242282484f71a2bf9a8ed47674b5eedaf42935e4aab691a9686bec15dec840657cfce05902a421a0243bc7b6202dc393b14a673c83f3e05d52856901dd28a9AliZNvIJsAMzA0pV/zFwZN2YfAPupZpe/gLj8jLNvfo=', 'user', '2020-06-10 16:23:37', 'Rusi', 0, 'rusiprisie@gmail.com', ''),
(10, 'user@gmail.com', '4a8f08ba18eb973bd98793d37feceda2ae7aded99140be262f2df5f4d40bc6cc3ad60924b75d288b69b75201a56bff94af4eb7d472d663f0cec532e0d62b124cnkohsSZBkqfvWuqS2fz1Ox+YcMAHOPHcuEFey/o5Zjw=', 'user', '2020-06-23 16:14:10', 'user', 0, 'user@gmail.com', ''),
(11, 'user2@gmail.com', '00d315532c9e7ae3007940e06c328c47cafd39b37379265e105f04dacce61503e86885cf8792fcafe84818ee4bc2e81ae5be69ffed55835971f0090e999f8084wgRx9zB4pa6lLOFSedUNlHeMZKrtQI523K4wZItZlCs=', 'user', '2020-06-23 16:59:44', 'user2', 0, 'user2@gmail.com', ''),
(12, 'doc01', 'd2c58baaadc84cdf3199a66820f0ef26870a370ef83467995030cef4c36fce54dd4dbf6e01a77f408f9d2728ced9fa4db43ad9b299b822b5123a13e4fd57f2ecAYu7rknmxnm6Tuyi2LsGm1Q83iagWkTwBiLYnSFJsHU=', 'doc_checking', '2020-06-27 15:13:08', '', 0, '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pic`
--
ALTER TABLE `pic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pic`
--
ALTER TABLE `pic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
