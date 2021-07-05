-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2021 at 02:01 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `easypay`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(255) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `email` varchar(500) NOT NULL,
  `bname` text NOT NULL,
  `gstin` text NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `country` text NOT NULL,
  `mobile_number` text NOT NULL,
  `user` varchar(500) NOT NULL,
  `public_id` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `first_name`, `last_name`, `email`, `bname`, `gstin`, `city`, `state`, `country`, `mobile_number`, `user`, `public_id`) VALUES
(22, 'Ratnesh', 'Karbhari', 'ratneshkarbhari74@gmail.com', '', '', 'Mumbai', 'Maharashtra', 'India', '9137976398', '1', '60d6cd949e7f6');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(255) NOT NULL,
  `public_id` varchar(500) NOT NULL,
  `customer_data` longtext NOT NULL,
  `payment_data` longtext NOT NULL,
  `status` varchar(500) NOT NULL,
  `validity` text NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `currency` text NOT NULL,
  `user` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `public_id`, `customer_data`, `payment_data`, `status`, `validity`, `amount`, `currency`, `user`) VALUES
(29, '60d6cdb7c71de', '{\"first_name\":\"Ratnesh\",\"last_name\":\"Karbhari\",\"email\":\"ratneshkarbhari74@gmail.com\",\"mobile_number\":\"9137976398\",\"bname\":\"\",\"gstin\":\"\",\"city\":\"Mumbai\",\"state\":\"Maharashtra\",\"country\":\"India\"}', '{\"product_service\":\"Web Dev.\",\"amount\":\"5\",\"currency\":\"USD\"}', 'created', '22-09-2022', '5.00', 'USD', '1');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(255) NOT NULL,
  `public_id` varchar(500) NOT NULL,
  `customer_data` longtext NOT NULL,
  `payment_data` longtext NOT NULL,
  `status` varchar(500) NOT NULL,
  `merchant_redirect_url` text NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `currency` text NOT NULL,
  `user` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `public_id`, `customer_data`, `payment_data`, `status`, `merchant_redirect_url`, `amount`, `currency`, `user`) VALUES
(1, '60d6c8952262c', '{\"first_name\":\"Ratnesh\",\"last_name\":\"Karbhari\",\"email\":\"ratneshkarbhari74@gmail.com\",\"mobile_number\":\"9137976398\",\"bname\":\"\",\"gstin\":\"\",\"city\":\"Mumbai\",\"state\":\"Maharashtra\",\"country\":\"India\"}', '{\"product_service\":null,\"amount\":\"10.00\",\"currency\":\"USD\"}', 'created', '', '10.00', 'USD', '1'),
(2, '60d6c8a4cedf7', '{\"first_name\":\"Ratnesh\",\"last_name\":\"Karbhari\",\"email\":\"ratneshkarbhari74@gmail.com\",\"mobile_number\":\"9137976398\",\"bname\":\"\",\"gstin\":\"\",\"city\":\"Mumbai\",\"state\":\"Maharashtra\",\"country\":\"India\"}', '{\"product_service\":null,\"amount\":\"10.00\",\"currency\":\"USD\"}', 'created', '', '10.00', 'USD', '1'),
(3, '60d6c994019bc', '{\"first_name\":\"Ratnesh\",\"last_name\":\"Karbhari\",\"email\":\"ratneshkarbhari74@gmail.com\",\"mobile_number\":\"9137976398\",\"bname\":\"\",\"gstin\":\"\",\"city\":\"Mumbai\",\"state\":\"Maharashtra\",\"country\":\"India\"}', '{\"purpose\":\"Web Development\",\"amount\":\"10.00\",\"currency\":\"USD\"}', 'created', '', '10.00', 'USD', '1'),
(4, '60d6d5f92e6dc', '{\"first_name\":\"Ratnesh\",\"last_name\":\"Karbhari\",\"email\":\"ratneshkarbhari74@gmail.com\",\"mobile_number\":\"9137976398\",\"bname\":\"\",\"gstin\":\"\",\"city\":\"Mumbai\",\"state\":\"Maharashtra\",\"country\":\"India\"}', '{\"purpose\":\"Web Development\",\"amount\":\"10.00\",\"currency\":\"USD\"}', 'created', '', '10.00', 'USD', '1'),
(5, '60d6f593e6068', '{\"first_name\":\"Ratnesh\",\"last_name\":\"Karbhari\",\"email\":\"ratneshkarbhari74@gmail.com\",\"mobile_number\":\"9137976398\",\"bname\":\"\",\"gstin\":\"\",\"city\":\"Mumbai\",\"state\":\"Maharashtra\",\"country\":\"India\"}', '{\"purpose\":\"Web Development\",\"amount\":\"10.00\",\"currency\":\"USD\"}', 'created', '', '10.00', 'USD', '1'),
(6, '60d6f5d552a05', '{\"first_name\":\"Ratnesh\",\"last_name\":\"Karbhari\",\"email\":\"ratneshkarbhari74@gmail.com\",\"mobile_number\":\"9137976398\",\"bname\":\"\",\"gstin\":\"\",\"city\":\"Mumbai\",\"state\":\"Maharashtra\",\"country\":\"India\"}', '{\"purpose\":\"Web Development\",\"amount\":\"10.00\",\"currency\":\"USD\"}', 'created', '', '10.00', 'USD', '1'),
(7, '60d6f60e84c18', '{\"first_name\":\"Ratnesh\",\"last_name\":\"Karbhari\",\"email\":\"ratneshkarbhari74@gmail.com\",\"mobile_number\":\"9137976398\",\"bname\":\"\",\"gstin\":\"\",\"city\":\"Mumbai\",\"state\":\"Maharashtra\",\"country\":\"India\"}', '{\"purpose\":\"Web Development\",\"amount\":\"10.00\",\"currency\":\"USD\"}', 'created', '', '10.00', 'USD', '1'),
(8, '60d6f6319bfe1', '{\"first_name\":\"Ratnesh\",\"last_name\":\"Karbhari\",\"email\":\"ratneshkarbhari74@gmail.com\",\"mobile_number\":\"9137976398\",\"bname\":\"\",\"gstin\":\"\",\"city\":\"Mumbai\",\"state\":\"Maharashtra\",\"country\":\"India\"}', '{\"purpose\":\"Web Development\",\"amount\":\"10.00\",\"currency\":\"USD\"}', 'created', '', '10.00', 'USD', '1'),
(9, '60d6f6496f02f', '{\"first_name\":\"Ratnesh\",\"last_name\":\"Karbhari\",\"email\":\"ratneshkarbhari74@gmail.com\",\"mobile_number\":\"9137976398\",\"bname\":\"\",\"gstin\":\"\",\"city\":\"Mumbai\",\"state\":\"Maharashtra\",\"country\":\"India\"}', '{\"purpose\":\"Web Development\",\"amount\":\"10.00\",\"currency\":\"USD\"}', 'created', '', '10.00', 'USD', '1'),
(10, '60d6f666bdfbc', '{\"first_name\":\"Ratnesh\",\"last_name\":\"Karbhari\",\"email\":\"ratneshkarbhari74@gmail.com\",\"mobile_number\":\"9137976398\",\"bname\":\"\",\"gstin\":\"\",\"city\":\"Mumbai\",\"state\":\"Maharashtra\",\"country\":\"India\"}', '{\"purpose\":\"Web Development\",\"amount\":\"10.00\",\"currency\":\"USD\"}', 'created', '', '10.00', 'USD', '1'),
(11, '60d6f67809a18', '{\"first_name\":\"Ratnesh\",\"last_name\":\"Karbhari\",\"email\":\"ratneshkarbhari74@gmail.com\",\"mobile_number\":\"9137976398\",\"bname\":\"\",\"gstin\":\"\",\"city\":\"Mumbai\",\"state\":\"Maharashtra\",\"country\":\"India\"}', '{\"purpose\":\"Web Development\",\"amount\":\"10.00\",\"currency\":\"USD\"}', 'created', '', '10.00', 'USD', '1'),
(12, '60d6f7227de2f', '{\"first_name\":\"Ratnesh\",\"last_name\":\"Karbhari\",\"email\":\"ratneshkarbhari74@gmail.com\",\"mobile_number\":\"9137976398\",\"bname\":\"\",\"gstin\":\"\",\"city\":\"Mumbai\",\"state\":\"Maharashtra\",\"country\":\"India\"}', '{\"purpose\":\"Web Development\",\"amount\":\"10.00\",\"currency\":\"USD\"}', 'created', '', '10.00', 'USD', '1'),
(13, '60d6f73948bee', '{\"first_name\":\"Ratnesh\",\"last_name\":\"Karbhari\",\"email\":\"ratneshkarbhari74@gmail.com\",\"mobile_number\":\"9137976398\",\"bname\":\"\",\"gstin\":\"\",\"city\":\"Mumbai\",\"state\":\"Maharashtra\",\"country\":\"India\"}', '{\"purpose\":\"Web Development\",\"amount\":\"10.00\",\"currency\":\"USD\"}', 'created', '', '10.00', 'USD', '1'),
(14, '60d6f78892a62', '{\"first_name\":\"Ratnesh\",\"last_name\":\"Karbhari\",\"email\":\"ratneshkarbhari74@gmail.com\",\"mobile_number\":\"9137976398\",\"bname\":\"\",\"gstin\":\"\",\"city\":\"Mumbai\",\"state\":\"Maharashtra\",\"country\":\"India\"}', '{\"purpose\":\"Web Development\",\"amount\":\"10.00\",\"currency\":\"USD\"}', 'created', '', '10.00', 'USD', '1'),
(15, '60d6f7a6d92a5', '{\"first_name\":\"Ratnesh\",\"last_name\":\"Karbhari\",\"email\":\"ratneshkarbhari74@gmail.com\",\"mobile_number\":\"9137976398\",\"bname\":\"\",\"gstin\":\"\",\"city\":\"Mumbai\",\"state\":\"Maharashtra\",\"country\":\"India\"}', '{\"purpose\":\"Web Development\",\"amount\":\"10.00\",\"currency\":\"USD\"}', 'created', '', '10.00', 'USD', '1'),
(16, '60d6f7ba8e78c', '{\"first_name\":\"Ratnesh\",\"last_name\":\"Karbhari\",\"email\":\"ratneshkarbhari74@gmail.com\",\"mobile_number\":\"9137976398\",\"bname\":\"\",\"gstin\":\"\",\"city\":\"Mumbai\",\"state\":\"Maharashtra\",\"country\":\"India\"}', '{\"purpose\":\"Web Development\",\"amount\":\"10.00\",\"currency\":\"USD\"}', 'created', '', '10.00', 'USD', '1'),
(17, '60d6f7bd13759', '{\"first_name\":\"Ratnesh\",\"last_name\":\"Karbhari\",\"email\":\"ratneshkarbhari74@gmail.com\",\"mobile_number\":\"9137976398\",\"bname\":\"\",\"gstin\":\"\",\"city\":\"Mumbai\",\"state\":\"Maharashtra\",\"country\":\"India\"}', '{\"purpose\":\"Web Development\",\"amount\":\"10.00\",\"currency\":\"USD\"}', 'created', '', '10.00', 'USD', '1'),
(18, '60d6f80fe5409', '{\"first_name\":\"Ratnesh\",\"last_name\":\"Karbhari\",\"email\":\"ratneshkarbhari74@gmail.com\",\"mobile_number\":\"9137976398\",\"bname\":\"\",\"gstin\":\"\",\"city\":\"Mumbai\",\"state\":\"Maharashtra\",\"country\":\"India\"}', '{\"purpose\":\"Web Development\",\"amount\":\"10.00\",\"currency\":\"USD\"}', 'created', '', '10.00', 'USD', '1'),
(19, '60d6f83295d1f', '{\"first_name\":\"Ratnesh\",\"last_name\":\"Karbhari\",\"email\":\"ratneshkarbhari74@gmail.com\",\"mobile_number\":\"9137976398\",\"bname\":\"\",\"gstin\":\"\",\"city\":\"Mumbai\",\"state\":\"Maharashtra\",\"country\":\"India\"}', '{\"purpose\":\"Web Development\",\"amount\":\"10.00\",\"currency\":\"USD\"}', 'created', '', '10.00', 'USD', '1'),
(20, '60d6f85e1d18f', '{\"first_name\":\"Ratnesh\",\"last_name\":\"Karbhari\",\"email\":\"ratneshkarbhari74@gmail.com\",\"mobile_number\":\"9137976398\",\"bname\":\"\",\"gstin\":\"\",\"city\":\"Mumbai\",\"state\":\"Maharashtra\",\"country\":\"India\"}', '{\"purpose\":\"Web Development\",\"amount\":\"10.00\",\"currency\":\"USD\"}', 'created', '', '10.00', 'USD', '1'),
(21, '60d6f87453de4', '{\"first_name\":\"Ratnesh\",\"last_name\":\"Karbhari\",\"email\":\"ratneshkarbhari74@gmail.com\",\"mobile_number\":\"9137976398\",\"bname\":\"\",\"gstin\":\"\",\"city\":\"Mumbai\",\"state\":\"Maharashtra\",\"country\":\"India\"}', '{\"purpose\":\"Web Development\",\"amount\":\"10.00\",\"currency\":\"USD\"}', 'created', '', '10.00', 'USD', '1'),
(22, '60d6f8a769048', '{\"first_name\":\"Ratnesh\",\"last_name\":\"Karbhari\",\"email\":\"ratneshkarbhari74@gmail.com\",\"mobile_number\":\"9137976398\",\"bname\":\"\",\"gstin\":\"\",\"city\":\"Mumbai\",\"state\":\"Maharashtra\",\"country\":\"India\"}', '{\"purpose\":\"Web Development\",\"amount\":\"10.00\",\"currency\":\"USD\"}', 'created', '', '10.00', 'USD', '1'),
(23, '60d6f8a93ce6e', '{\"first_name\":\"Ratnesh\",\"last_name\":\"Karbhari\",\"email\":\"ratneshkarbhari74@gmail.com\",\"mobile_number\":\"9137976398\",\"bname\":\"\",\"gstin\":\"\",\"city\":\"Mumbai\",\"state\":\"Maharashtra\",\"country\":\"India\"}', '{\"purpose\":\"Web Development\",\"amount\":\"10.00\",\"currency\":\"USD\"}', 'created', '', '10.00', 'USD', '1'),
(24, '60d6f8c9ed22d', '{\"first_name\":\"Ratnesh\",\"last_name\":\"Karbhari\",\"email\":\"ratneshkarbhari74@gmail.com\",\"mobile_number\":\"9137976398\",\"bname\":\"\",\"gstin\":\"\",\"city\":\"Mumbai\",\"state\":\"Maharashtra\",\"country\":\"India\"}', '{\"purpose\":\"Web Development\",\"amount\":\"10.00\",\"currency\":\"USD\"}', 'created', '', '10.00', 'USD', '1'),
(25, '60d6f8cb8c44b', '{\"first_name\":\"Ratnesh\",\"last_name\":\"Karbhari\",\"email\":\"ratneshkarbhari74@gmail.com\",\"mobile_number\":\"9137976398\",\"bname\":\"\",\"gstin\":\"\",\"city\":\"Mumbai\",\"state\":\"Maharashtra\",\"country\":\"India\"}', '{\"purpose\":\"Web Development\",\"amount\":\"10.00\",\"currency\":\"USD\"}', 'created', '', '10.00', 'USD', '1'),
(26, '60d6f90c8f524', '{\"first_name\":\"Ratnesh\",\"last_name\":\"Karbhari\",\"email\":\"ratneshkarbhari74@gmail.com\",\"mobile_number\":\"9137976398\",\"bname\":\"\",\"gstin\":\"\",\"city\":\"Mumbai\",\"state\":\"Maharashtra\",\"country\":\"India\"}', '{\"purpose\":\"Web Development\",\"amount\":\"10.00\",\"currency\":\"USD\"}', 'created', '', '10.00', 'USD', '1'),
(27, '60d6fa401fcdd', '{\"first_name\":\"Ratnesh\",\"last_name\":\"Karbhari\",\"email\":\"ratneshkarbhari74@gmail.com\",\"mobile_number\":\"9137976398\",\"bname\":\"\",\"gstin\":\"\",\"city\":\"Mumbai\",\"state\":\"Maharashtra\",\"country\":\"India\"}', '{\"purpose\":\"Web Development\",\"amount\":\"10.00\",\"currency\":\"USD\"}', 'created', '', '10.00', 'USD', '1'),
(28, '60d6fa8fc0c75', '{\"first_name\":\"Ratnesh\",\"last_name\":\"Karbhari\",\"email\":\"ratneshkarbhari74@gmail.com\",\"mobile_number\":\"9137976398\",\"bname\":\"\",\"gstin\":\"\",\"city\":\"Mumbai\",\"state\":\"Maharashtra\",\"country\":\"India\"}', '{\"purpose\":\"Web Development\",\"amount\":\"10.00\",\"currency\":\"USD\"}', 'created', '', '10.00', 'USD', '1'),
(29, '60d6fa9769c32', '{\"first_name\":\"Ratnesh\",\"last_name\":\"Karbhari\",\"email\":\"ratneshkarbhari74@gmail.com\",\"mobile_number\":\"9137976398\",\"bname\":\"\",\"gstin\":\"\",\"city\":\"Mumbai\",\"state\":\"Maharashtra\",\"country\":\"India\"}', '{\"purpose\":\"Web Development\",\"amount\":\"10.00\",\"currency\":\"USD\"}', 'created', '', '10.00', 'USD', '1'),
(30, '60d6faa562a40', '{\"first_name\":\"Ratnesh\",\"last_name\":\"Karbhari\",\"email\":\"ratneshkarbhari74@gmail.com\",\"mobile_number\":\"9137976398\",\"bname\":\"\",\"gstin\":\"\",\"city\":\"Mumbai\",\"state\":\"Maharashtra\",\"country\":\"India\"}', '{\"purpose\":\"Web Development\",\"amount\":\"10.00\",\"currency\":\"USD\"}', 'created', '', '10.00', 'USD', '1'),
(31, '60d6faa6cc1be', '{\"first_name\":\"Ratnesh\",\"last_name\":\"Karbhari\",\"email\":\"ratneshkarbhari74@gmail.com\",\"mobile_number\":\"9137976398\",\"bname\":\"\",\"gstin\":\"\",\"city\":\"Mumbai\",\"state\":\"Maharashtra\",\"country\":\"India\"}', '{\"purpose\":\"Web Development\",\"amount\":\"10.00\",\"currency\":\"USD\"}', 'created', '', '10.00', 'USD', '1'),
(32, '60d6fabdd239d', '{\"first_name\":\"Ratnesh\",\"last_name\":\"Karbhari\",\"email\":\"ratneshkarbhari74@gmail.com\",\"mobile_number\":\"9137976398\",\"bname\":\"\",\"gstin\":\"\",\"city\":\"Mumbai\",\"state\":\"Maharashtra\",\"country\":\"India\"}', '{\"purpose\":\"Web Development\",\"amount\":\"10.00\",\"currency\":\"USD\"}', 'created', '', '10.00', 'USD', '1'),
(33, '60d6fabf35182', '{\"first_name\":\"Ratnesh\",\"last_name\":\"Karbhari\",\"email\":\"ratneshkarbhari74@gmail.com\",\"mobile_number\":\"9137976398\",\"bname\":\"\",\"gstin\":\"\",\"city\":\"Mumbai\",\"state\":\"Maharashtra\",\"country\":\"India\"}', '{\"purpose\":\"Web Development\",\"amount\":\"10.00\",\"currency\":\"USD\"}', 'created', '', '10.00', 'USD', '1'),
(34, '60d6fad8212c2', '{\"first_name\":\"Ratnesh\",\"last_name\":\"Karbhari\",\"email\":\"ratneshkarbhari74@gmail.com\",\"mobile_number\":\"9137976398\",\"bname\":\"\",\"gstin\":\"\",\"city\":\"Mumbai\",\"state\":\"Maharashtra\",\"country\":\"India\"}', '{\"purpose\":\"Web Development\",\"amount\":\"10.00\",\"currency\":\"USD\"}', 'created', '', '10.00', 'USD', '1'),
(35, '60d6faed90fff', '{\"first_name\":\"Ratnesh\",\"last_name\":\"Karbhari\",\"email\":\"ratneshkarbhari74@gmail.com\",\"mobile_number\":\"9137976398\",\"bname\":\"\",\"gstin\":\"\",\"city\":\"Mumbai\",\"state\":\"Maharashtra\",\"country\":\"India\"}', '{\"purpose\":\"Web Development\",\"amount\":\"10.00\",\"currency\":\"USD\"}', 'created', '', '10.00', 'USD', '1'),
(36, '60d6faefc8551', '{\"first_name\":\"Ratnesh\",\"last_name\":\"Karbhari\",\"email\":\"ratneshkarbhari74@gmail.com\",\"mobile_number\":\"9137976398\",\"bname\":\"\",\"gstin\":\"\",\"city\":\"Mumbai\",\"state\":\"Maharashtra\",\"country\":\"India\"}', '{\"purpose\":\"Web Development\",\"amount\":\"10.00\",\"currency\":\"USD\"}', 'created', '', '10.00', 'USD', '1'),
(37, '60d6fb1727911', '{\"first_name\":\"Ratnesh\",\"last_name\":\"Karbhari\",\"email\":\"ratneshkarbhari74@gmail.com\",\"mobile_number\":\"9137976398\",\"bname\":\"\",\"gstin\":\"\",\"city\":\"Mumbai\",\"state\":\"Maharashtra\",\"country\":\"India\"}', '{\"purpose\":\"Web Development\",\"amount\":\"10.00\",\"currency\":\"USD\"}', 'created', '', '10.00', 'USD', '1'),
(38, '60d6fb282df14', '{\"first_name\":\"Ratnesh\",\"last_name\":\"Karbhari\",\"email\":\"ratneshkarbhari74@gmail.com\",\"mobile_number\":\"9137976398\",\"bname\":\"\",\"gstin\":\"\",\"city\":\"Mumbai\",\"state\":\"Maharashtra\",\"country\":\"India\"}', '{\"purpose\":\"Web Development\",\"amount\":\"10.00\",\"currency\":\"USD\"}', 'created', '', '10.00', 'USD', '1'),
(39, '60d6fb7b5b9dc', '{\"first_name\":\"Ratnesh\",\"last_name\":\"Karbhari\",\"email\":\"ratneshkarbhari74@gmail.com\",\"mobile_number\":\"9137976398\",\"bname\":\"\",\"gstin\":\"\",\"city\":\"Mumbai\",\"state\":\"Maharashtra\",\"country\":\"India\"}', '{\"purpose\":\"Web Development\",\"amount\":\"10.00\",\"currency\":\"USD\"}', 'created', '', '10.00', 'USD', '1'),
(40, '60d6fb7e93dc1', '{\"first_name\":\"Ratnesh\",\"last_name\":\"Karbhari\",\"email\":\"ratneshkarbhari74@gmail.com\",\"mobile_number\":\"9137976398\",\"bname\":\"\",\"gstin\":\"\",\"city\":\"Mumbai\",\"state\":\"Maharashtra\",\"country\":\"India\"}', '{\"purpose\":\"Web Development\",\"amount\":\"10.00\",\"currency\":\"USD\"}', 'created', '', '10.00', 'USD', '1'),
(41, '60d6fbbb4a85c', '{\"first_name\":\"Ratnesh\",\"last_name\":\"Karbhari\",\"email\":\"ratneshkarbhari74@gmail.com\",\"mobile_number\":\"9137976398\",\"bname\":\"\",\"gstin\":\"\",\"city\":\"Mumbai\",\"state\":\"Maharashtra\",\"country\":\"India\"}', '{\"purpose\":\"Web Development\",\"amount\":\"10.00\",\"currency\":\"USD\"}', 'created', '', '10.00', 'USD', '1'),
(42, '60d6fc1596dad', '{\"first_name\":\"Ratnesh\",\"last_name\":\"Karbhari\",\"email\":\"ratneshkarbhari74@gmail.com\",\"mobile_number\":\"9137976398\",\"bname\":\"\",\"gstin\":\"\",\"city\":\"Mumbai\",\"state\":\"Maharashtra\",\"country\":\"India\"}', '{\"purpose\":\"Web Development\",\"amount\":\"10.00\",\"currency\":\"USD\"}', 'created', '', '10.00', 'USD', '1'),
(43, '60d6fc1751829', '{\"first_name\":\"Ratnesh\",\"last_name\":\"Karbhari\",\"email\":\"ratneshkarbhari74@gmail.com\",\"mobile_number\":\"9137976398\",\"bname\":\"\",\"gstin\":\"\",\"city\":\"Mumbai\",\"state\":\"Maharashtra\",\"country\":\"India\"}', '{\"purpose\":\"Web Development\",\"amount\":\"10.00\",\"currency\":\"USD\"}', 'created', '', '10.00', 'USD', '1'),
(44, '60d6fc5268d90', '{\"first_name\":\"Ratnesh\",\"last_name\":\"Karbhari\",\"email\":\"ratneshkarbhari74@gmail.com\",\"mobile_number\":\"9137976398\",\"bname\":\"\",\"gstin\":\"\",\"city\":\"Mumbai\",\"state\":\"Maharashtra\",\"country\":\"India\"}', '{\"purpose\":\"Web Development\",\"amount\":\"10.00\",\"currency\":\"USD\"}', 'created', '', '10.00', 'USD', '1'),
(45, '60d6fda4a6e8a', '{\"first_name\":\"Ratnesh\",\"last_name\":\"Karbhari\",\"email\":\"ratneshkarbhari74@gmail.com\",\"mobile_number\":\"9137976398\",\"bname\":\"\",\"gstin\":\"\",\"city\":\"Mumbai\",\"state\":\"Maharashtra\",\"country\":\"India\"}', '{\"purpose\":\"Web Development\",\"amount\":\"10.00\",\"currency\":\"USD\"}', 'created', '', '10.00', 'USD', '1'),
(46, '60d6fe03324f8', '{\"first_name\":\"Ratnesh\",\"last_name\":\"Karbhari\",\"email\":\"ratneshkarbhari74@gmail.com\",\"mobile_number\":\"9137976398\",\"bname\":\"\",\"gstin\":\"\",\"city\":\"Mumbai\",\"state\":\"Maharashtra\",\"country\":\"India\"}', '{\"purpose\":\"Web Development\",\"amount\":\"10.00\",\"currency\":\"USD\"}', 'created', '', '10.00', 'USD', '1'),
(47, '60d6fe4c31aed', '{\"first_name\":\"Ratnesh\",\"last_name\":\"Karbhari\",\"email\":\"ratneshkarbhari74@gmail.com\",\"mobile_number\":\"9137976398\",\"bname\":\"\",\"gstin\":\"\",\"city\":\"Mumbai\",\"state\":\"Maharashtra\",\"country\":\"India\"}', '{\"purpose\":\"Web Development\",\"amount\":\"10.00\",\"currency\":\"USD\"}', 'created', '', '10.00', 'USD', '1'),
(48, '60d6fe5197293', '{\"first_name\":\"Ratnesh\",\"last_name\":\"Karbhari\",\"email\":\"ratneshkarbhari74@gmail.com\",\"mobile_number\":\"9137976398\",\"bname\":\"\",\"gstin\":\"\",\"city\":\"Mumbai\",\"state\":\"Maharashtra\",\"country\":\"India\"}', '{\"purpose\":\"Web Development\",\"amount\":\"10.00\",\"currency\":\"USD\"}', 'created', '', '10.00', 'USD', '1'),
(49, '60d6ff4aeaf05', '{\"first_name\":\"Ratnesh\",\"last_name\":\"Karbhari\",\"email\":\"ratneshkarbhari74@gmail.com\",\"mobile_number\":\"9137976398\",\"bname\":\"\",\"gstin\":\"\",\"city\":\"Mumbai\",\"state\":\"Maharashtra\",\"country\":\"India\"}', '{\"purpose\":\"Web Development\",\"amount\":\"10.00\",\"currency\":\"USD\"}', 'created', '', '10.00', 'USD', '1'),
(50, '60d6ff676b380', '{\"first_name\":\"Ratnesh\",\"last_name\":\"Karbhari\",\"email\":\"ratneshkarbhari74@gmail.com\",\"mobile_number\":\"9137976398\",\"bname\":\"\",\"gstin\":\"\",\"city\":\"Mumbai\",\"state\":\"Maharashtra\",\"country\":\"India\"}', '{\"purpose\":\"Web Development\",\"amount\":\"10.00\",\"currency\":\"USD\"}', 'created', '', '10.00', 'USD', '1'),
(51, '60d6ff803391d', '{\"first_name\":\"Ratnesh\",\"last_name\":\"Karbhari\",\"email\":\"ratneshkarbhari74@gmail.com\",\"mobile_number\":\"9137976398\",\"bname\":\"\",\"gstin\":\"\",\"city\":\"Mumbai\",\"state\":\"Maharashtra\",\"country\":\"India\"}', '{\"purpose\":\"Web Development\",\"amount\":\"10.00\",\"currency\":\"USD\"}', 'created', '', '10.00', 'USD', '1'),
(52, '60d6ff857f593', '{\"first_name\":\"Ratnesh\",\"last_name\":\"Karbhari\",\"email\":\"ratneshkarbhari74@gmail.com\",\"mobile_number\":\"9137976398\",\"bname\":\"\",\"gstin\":\"\",\"city\":\"Mumbai\",\"state\":\"Maharashtra\",\"country\":\"India\"}', '{\"purpose\":\"Web Development\",\"amount\":\"10.00\",\"currency\":\"USD\"}', 'created', '', '10.00', 'USD', '1'),
(53, '60d6ffc6c6d01', '{\"first_name\":\"Ratnesh\",\"last_name\":\"Karbhari\",\"email\":\"ratneshkarbhari74@gmail.com\",\"mobile_number\":\"9137976398\",\"bname\":\"\",\"gstin\":\"\",\"city\":\"Mumbai\",\"state\":\"Maharashtra\",\"country\":\"India\"}', '{\"purpose\":\"Web Development\",\"amount\":\"10.00\",\"currency\":\"USD\"}', 'created', '', '10.00', 'USD', '1'),
(54, '60d6fff8446b1', '{\"first_name\":\"Ratnesh\",\"last_name\":\"Karbhari\",\"email\":\"ratneshkarbhari74@gmail.com\",\"mobile_number\":\"9137976398\",\"bname\":\"\",\"gstin\":\"\",\"city\":\"Mumbai\",\"state\":\"Maharashtra\",\"country\":\"India\"}', '{\"purpose\":\"Web Development\",\"amount\":\"10.00\",\"currency\":\"USD\"}', 'created', '', '10.00', 'USD', '1'),
(55, '60d6fff9e781e', '{\"first_name\":\"Ratnesh\",\"last_name\":\"Karbhari\",\"email\":\"ratneshkarbhari74@gmail.com\",\"mobile_number\":\"9137976398\",\"bname\":\"\",\"gstin\":\"\",\"city\":\"Mumbai\",\"state\":\"Maharashtra\",\"country\":\"India\"}', '{\"purpose\":\"Web Development\",\"amount\":\"10.00\",\"currency\":\"USD\"}', 'created', '', '10.00', 'USD', '1'),
(56, '60d700073fe89', '{\"first_name\":\"Ratnesh\",\"last_name\":\"Karbhari\",\"email\":\"ratneshkarbhari74@gmail.com\",\"mobile_number\":\"9137976398\",\"bname\":\"\",\"gstin\":\"\",\"city\":\"Mumbai\",\"state\":\"Maharashtra\",\"country\":\"India\"}', '{\"purpose\":\"Web Development\",\"amount\":\"10.00\",\"currency\":\"USD\"}', 'created', '', '10.00', 'USD', '1'),
(57, '60d7002839801', '{\"first_name\":\"Ratnesh\",\"last_name\":\"Karbhari\",\"email\":\"ratneshkarbhari74@gmail.com\",\"mobile_number\":\"9137976398\",\"bname\":\"\",\"gstin\":\"\",\"city\":\"Mumbai\",\"state\":\"Maharashtra\",\"country\":\"India\"}', '{\"purpose\":\"Web Development\",\"amount\":\"10.00\",\"currency\":\"USD\"}', 'created', '', '10.00', 'USD', '1'),
(58, '60d70039c063f', '{\"first_name\":\"Ratnesh\",\"last_name\":\"Karbhari\",\"email\":\"ratneshkarbhari74@gmail.com\",\"mobile_number\":\"9137976398\",\"bname\":\"\",\"gstin\":\"\",\"city\":\"Mumbai\",\"state\":\"Maharashtra\",\"country\":\"India\"}', '{\"purpose\":\"Web Development\",\"amount\":\"10.00\",\"currency\":\"USD\"}', 'created', '', '10.00', 'USD', '1'),
(59, '60d7003feb600', '{\"first_name\":\"Ratnesh\",\"last_name\":\"Karbhari\",\"email\":\"ratneshkarbhari74@gmail.com\",\"mobile_number\":\"9137976398\",\"bname\":\"\",\"gstin\":\"\",\"city\":\"Mumbai\",\"state\":\"Maharashtra\",\"country\":\"India\"}', '{\"purpose\":\"Web Development\",\"amount\":\"10.00\",\"currency\":\"USD\"}', 'created', '', '10.00', 'USD', '1'),
(60, '60d7004205564', '{\"first_name\":\"Ratnesh\",\"last_name\":\"Karbhari\",\"email\":\"ratneshkarbhari74@gmail.com\",\"mobile_number\":\"9137976398\",\"bname\":\"\",\"gstin\":\"\",\"city\":\"Mumbai\",\"state\":\"Maharashtra\",\"country\":\"India\"}', '{\"purpose\":\"Web Development\",\"amount\":\"10.00\",\"currency\":\"USD\"}', 'created', '', '10.00', 'USD', '1'),
(61, '60d700706a41a', '{\"first_name\":\"Ratnesh\",\"last_name\":\"Karbhari\",\"email\":\"ratneshkarbhari74@gmail.com\",\"mobile_number\":\"9137976398\",\"bname\":\"\",\"gstin\":\"\",\"city\":\"Mumbai\",\"state\":\"Maharashtra\",\"country\":\"India\"}', '{\"purpose\":\"Web Development\",\"amount\":\"10.00\",\"currency\":\"USD\"}', 'created', '', '10.00', 'USD', '1'),
(62, '60d7043760fc8', '{\"first_name\":\"Ratnesh\",\"last_name\":\"Karbhari\",\"email\":\"ratneshkarbhari74@gmail.com\",\"mobile_number\":\"9137976398\",\"bname\":\"\",\"gstin\":\"\",\"city\":\"Mumbai\",\"state\":\"Maharashtra\",\"country\":\"India\"}', '{\"purpose\":\"Web Development\",\"amount\":\"10.00\",\"currency\":\"USD\"}', 'created', '', '10.00', 'USD', '1'),
(63, '60d7051318300', '{\"first_name\":\"Ratnesh\",\"last_name\":\"Karbhari\",\"email\":\"ratneshkarbhari74@gmail.com\",\"mobile_number\":\"9137976398\",\"bname\":\"\",\"gstin\":\"\",\"city\":\"Mumbai\",\"state\":\"Maharashtra\",\"country\":\"India\"}', '{\"purpose\":\"Web Development\",\"amount\":\"10.00\",\"currency\":\"USD\"}', 'created', '', '10.00', 'USD', '1'),
(64, '60d70522d6697', '{\"first_name\":\"Ratnesh\",\"last_name\":\"Karbhari\",\"email\":\"ratneshkarbhari74@gmail.com\",\"mobile_number\":\"9137976398\",\"bname\":\"\",\"gstin\":\"\",\"city\":\"Mumbai\",\"state\":\"Maharashtra\",\"country\":\"India\"}', '{\"purpose\":\"Web Development\",\"amount\":\"10.00\",\"currency\":\"USD\"}', 'created', '', '10.00', 'USD', '1'),
(65, '60d70524aed48', '{\"first_name\":\"Ratnesh\",\"last_name\":\"Karbhari\",\"email\":\"ratneshkarbhari74@gmail.com\",\"mobile_number\":\"9137976398\",\"bname\":\"\",\"gstin\":\"\",\"city\":\"Mumbai\",\"state\":\"Maharashtra\",\"country\":\"India\"}', '{\"purpose\":\"Web Development\",\"amount\":\"10.00\",\"currency\":\"USD\"}', 'created', '', '10.00', 'USD', '1'),
(66, '60d7052df27da', '{\"first_name\":\"Ratnesh\",\"last_name\":\"Karbhari\",\"email\":\"ratneshkarbhari74@gmail.com\",\"mobile_number\":\"9137976398\",\"bname\":\"\",\"gstin\":\"\",\"city\":\"Mumbai\",\"state\":\"Maharashtra\",\"country\":\"India\"}', '{\"purpose\":\"Web Development\",\"amount\":\"10.00\",\"currency\":\"USD\"}', 'created', '', '10.00', 'USD', '1'),
(67, '60d7055eee45b', '{\"first_name\":\"Ratnesh\",\"last_name\":\"Karbhari\",\"email\":\"ratneshkarbhari74@gmail.com\",\"mobile_number\":\"9137976398\",\"bname\":\"\",\"gstin\":\"\",\"city\":\"Mumbai\",\"state\":\"Maharashtra\",\"country\":\"India\"}', '{\"purpose\":\"Web Development\",\"amount\":\"10.00\",\"currency\":\"USD\"}', 'created', '', '10.00', 'USD', '1'),
(68, '60d70571988aa', '{\"first_name\":\"Ratnesh\",\"last_name\":\"Karbhari\",\"email\":\"ratneshkarbhari74@gmail.com\",\"mobile_number\":\"9137976398\",\"bname\":\"\",\"gstin\":\"\",\"city\":\"Mumbai\",\"state\":\"Maharashtra\",\"country\":\"India\"}', '{\"purpose\":\"Web Development\",\"amount\":\"10.00\",\"currency\":\"USD\"}', 'created', '', '10.00', 'USD', '1'),
(69, '60d7058ca47b8', '{\"first_name\":\"Ratnesh\",\"last_name\":\"Karbhari\",\"email\":\"ratneshkarbhari74@gmail.com\",\"mobile_number\":\"9137976398\",\"bname\":\"\",\"gstin\":\"\",\"city\":\"Mumbai\",\"state\":\"Maharashtra\",\"country\":\"India\"}', '{\"purpose\":\"Web Development\",\"amount\":\"10.00\",\"currency\":\"USD\"}', 'created', '', '10.00', 'USD', '1'),
(70, '60d7066f44bea', '{\"first_name\":\"Ratnesh\",\"last_name\":\"Karbhari\",\"email\":\"ratneshkarbhari74@gmail.com\",\"mobile_number\":\"9137976398\",\"bname\":\"\",\"gstin\":\"\",\"city\":\"Mumbai\",\"state\":\"Maharashtra\",\"country\":\"India\"}', '{\"purpose\":\"Web Development\",\"amount\":\"10.00\",\"currency\":\"USD\"}', 'created', '', '10.00', 'USD', '1'),
(71, '60d7068106a96', '{\"first_name\":\"Ratnesh\",\"last_name\":\"Karbhari\",\"email\":\"ratneshkarbhari74@gmail.com\",\"mobile_number\":\"9137976398\",\"bname\":\"\",\"gstin\":\"\",\"city\":\"Mumbai\",\"state\":\"Maharashtra\",\"country\":\"India\"}', '{\"purpose\":\"Web Development\",\"amount\":\"10.00\",\"currency\":\"USD\"}', 'created', '', '10.00', 'USD', '1'),
(72, '60d7068c032c9', '{\"first_name\":\"Ratnesh\",\"last_name\":\"Karbhari\",\"email\":\"ratneshkarbhari74@gmail.com\",\"mobile_number\":\"9137976398\",\"bname\":\"\",\"gstin\":\"\",\"city\":\"Mumbai\",\"state\":\"Maharashtra\",\"country\":\"India\"}', '{\"purpose\":\"Web Development\",\"amount\":\"10.00\",\"currency\":\"USD\"}', 'created', '', '10.00', 'USD', '1'),
(73, '60d706a06e5a4', '{\"first_name\":\"Ratnesh\",\"last_name\":\"Karbhari\",\"email\":\"ratneshkarbhari74@gmail.com\",\"mobile_number\":\"9137976398\",\"bname\":\"\",\"gstin\":\"\",\"city\":\"Mumbai\",\"state\":\"Maharashtra\",\"country\":\"India\"}', '{\"purpose\":\"Web Development\",\"amount\":\"10.00\",\"currency\":\"USD\"}', 'created', '', '10.00', 'USD', '1'),
(74, '60d706ccb554b', '{\"first_name\":\"Ratnesh\",\"last_name\":\"Karbhari\",\"email\":\"ratneshkarbhari74@gmail.com\",\"mobile_number\":\"9137976398\",\"bname\":\"\",\"gstin\":\"\",\"city\":\"Mumbai\",\"state\":\"Maharashtra\",\"country\":\"India\"}', '{\"purpose\":\"Web Development\",\"amount\":\"10.00\",\"currency\":\"USD\"}', 'created', '', '10.00', 'USD', '1'),
(75, '60d70710426ed', '{\"first_name\":\"Ratnesh\",\"last_name\":\"Karbhari\",\"email\":\"ratneshkarbhari74@gmail.com\",\"mobile_number\":\"9137976398\",\"bname\":\"\",\"gstin\":\"\",\"city\":\"Mumbai\",\"state\":\"Maharashtra\",\"country\":\"India\"}', '{\"purpose\":\"Web Development\",\"amount\":\"10.00\",\"currency\":\"USD\"}', 'created', '', '10.00', 'USD', '1'),
(76, '60d70724026e3', '{\"first_name\":\"Ratnesh\",\"last_name\":\"Karbhari\",\"email\":\"ratneshkarbhari74@gmail.com\",\"mobile_number\":\"9137976398\",\"bname\":\"\",\"gstin\":\"\",\"city\":\"Mumbai\",\"state\":\"Maharashtra\",\"country\":\"India\"}', '{\"purpose\":\"Web Development\",\"amount\":\"10.00\",\"currency\":\"USD\"}', 'created', '', '10.00', 'USD', '1'),
(77, '60d7072e167ea', '{\"first_name\":\"Ratnesh\",\"last_name\":\"Karbhari\",\"email\":\"ratneshkarbhari74@gmail.com\",\"mobile_number\":\"9137976398\",\"bname\":\"\",\"gstin\":\"\",\"city\":\"Mumbai\",\"state\":\"Maharashtra\",\"country\":\"India\"}', '{\"purpose\":\"Web Development\",\"amount\":\"10.00\",\"currency\":\"USD\"}', 'created', '', '10.00', 'USD', '1'),
(78, '60d70744d6653', '{\"first_name\":\"Ratnesh\",\"last_name\":\"Karbhari\",\"email\":\"ratneshkarbhari74@gmail.com\",\"mobile_number\":\"9137976398\",\"bname\":\"\",\"gstin\":\"\",\"city\":\"Mumbai\",\"state\":\"Maharashtra\",\"country\":\"India\"}', '{\"purpose\":\"Web Development\",\"amount\":\"10.00\",\"currency\":\"USD\"}', 'created', '', '10.00', 'USD', '1'),
(79, '60d7079c694d1', '{\"first_name\":\"Ratnesh\",\"last_name\":\"Karbhari\",\"email\":\"ratneshkarbhari74@gmail.com\",\"mobile_number\":\"9137976398\",\"bname\":\"\",\"gstin\":\"\",\"city\":\"Mumbai\",\"state\":\"Maharashtra\",\"country\":\"India\"}', '{\"purpose\":\"Web Development\",\"amount\":\"10.00\",\"currency\":\"USD\"}', 'created', '', '10.00', 'USD', '1'),
(80, '60d70a25aaa1d', '{\"first_name\":\"Ratnesh\",\"last_name\":\"Karbhari\",\"email\":\"ratneshkarbhari74@gmail.com\",\"mobile_number\":\"9137976398\",\"bname\":\"\",\"gstin\":\"\",\"city\":\"Mumbai\",\"state\":\"Maharashtra\",\"country\":\"India\"}', '{\"purpose\":\"Web Development\",\"amount\":\"10.00\",\"currency\":\"USD\"}', 'created', '', '10.00', 'USD', '1');

-- --------------------------------------------------------

--
-- Table structure for table `settlements`
--

CREATE TABLE `settlements` (
  `id` int(255) NOT NULL,
  `user_id` text NOT NULL,
  `amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(255) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `email` varchar(500) NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `country` text NOT NULL,
  `date` text NOT NULL,
  `status` text NOT NULL,
  `phone` text NOT NULL,
  `public_id` text NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `currency` text NOT NULL,
  `gw_tx_id` text NOT NULL,
  `invoice` text NOT NULL,
  `orderId` text NOT NULL,
  `user` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `first_name`, `last_name`, `email`, `city`, `state`, `country`, `date`, `status`, `phone`, `public_id`, `amount`, `currency`, `gw_tx_id`, `invoice`, `orderId`, `user`) VALUES
(4, 'Ratnesh', 'Karbhari', 'ratneshkarbhari74@gmail.com', 'Mumbai', '', 'India', '26-06-2021 05:24 AM', 'processing', '9137976398', '60d7007481997', '10.00', 'USD', '', '', '60d700706a41a', 1),
(5, 'Ratnesh', 'Karbhari', 'ratneshkarbhari74@gmail.com', 'Mumbai', '', 'India', '26-06-2021 05:26 AM', 'processing', '9137976398', '60d700dc0ede1', '10.00', 'USD', '', '', '60d700706a41a', 1),
(6, 'Ratnesh', 'Karbhari', 'ratneshkarbhari74@gmail.com', 'Mumbai', '', 'India', '26-06-2021 05:28 AM', 'processing', '9137976398', '60d7015dd82e8', '10.00', 'USD', '', '', '60d700706a41a', 1),
(7, 'Ratnesh', 'Karbhari', 'ratneshkarbhari74@gmail.com', 'Mumbai', '', 'India', '26-06-2021 05:28 AM', 'processing', '9137976398', '60d701660bbc5', '10.00', 'USD', '', '', '60d700706a41a', 1),
(8, 'Ratnesh', 'Karbhari', 'ratneshkarbhari74@gmail.com', 'Mumbai', '', 'India', '26-06-2021 05:29 AM', 'processing', '9137976398', '60d7017c6db33', '10.00', 'USD', '', '', '60d700706a41a', 1),
(9, 'Ratnesh', 'Karbhari', 'ratneshkarbhari74@gmail.com', 'Mumbai', '', 'India', '26-06-2021 05:29 AM', 'processing', '9137976398', '60d70196b042c', '10.00', 'USD', '', '', '60d700706a41a', 1),
(10, 'Ratnesh', 'Karbhari', 'ratneshkarbhari74@gmail.com', 'Mumbai', '', 'India', '26-06-2021 05:29 AM', 'processing', '9137976398', '60d7019a0361b', '10.00', 'USD', '', '', '60d700706a41a', 1),
(11, 'Ratnesh', 'Karbhari', 'ratneshkarbhari74@gmail.com', 'Mumbai', '', 'India', '26-06-2021 05:29 AM', 'processing', '9137976398', '60d701a55127d', '10.00', 'USD', '', '', '60d700706a41a', 1),
(12, 'Ratnesh', 'Karbhari', 'ratneshkarbhari74@gmail.com', 'Mumbai', '', 'India', '26-06-2021 05:30 AM', 'processing', '9137976398', '60d701bb8e4fd', '5.00', 'USD', '', '60d6cdb7c71de', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `email` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `role` text NOT NULL,
  `logo` varchar(500) NOT NULL,
  `bname` text NOT NULL,
  `gstin` text NOT NULL,
  `pan` text NOT NULL,
  `tan` text NOT NULL,
  `cin` text NOT NULL,
  `plan_expires` text NOT NULL,
  `public_id` text NOT NULL,
  `apiKey` longtext NOT NULL,
  `email_verified` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `role`, `logo`, `bname`, `gstin`, `pan`, `tan`, `cin`, `plan_expires`, `public_id`, `apiKey`, `email_verified`) VALUES
(1, 'Ratnesh', 'Karbhari', 'ratneshkarbhari74@gmail.com', '$2y$10$3lHDn/p8JQIiTD2lZPQQ6ODZwxUL4tUVPUp/nqxGwHzKvvaK3/0gy', 'user', 'testlogo.png', 'Code Seva Co.', '', '', '', '', '22-07-2021', '', 'aoTndJXancTycHph00ihkw==', 'yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settlements`
--
ALTER TABLE `settlements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `settlements`
--
ALTER TABLE `settlements`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
