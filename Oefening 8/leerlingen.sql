-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2023 at 01:42 PM
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
-- Database: `leerlingen`
--

-- --------------------------------------------------------

--
-- Table structure for table `leerlingen`
--

CREATE TABLE `leerlingen` (
  `id` int(11) NOT NULL,
  `naam` text NOT NULL,
  `voornaam` text NOT NULL,
  `klas` text NOT NULL,
  `straat` text NOT NULL,
  `postcode` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `postcode`
--

CREATE TABLE `postcode` (
  `postcode` text NOT NULL,
  `plaats` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `postcode`
--

INSERT INTO `postcode` (`postcode`, `plaats`) VALUES
('2500', 'Lier'),
('2800', 'Mechelen');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `leerlingen`
--
ALTER TABLE `leerlingen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `postcode`
--
ALTER TABLE `postcode`
  ADD PRIMARY KEY (`postcode`(4));

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `leerlingen`
--
ALTER TABLE `leerlingen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
