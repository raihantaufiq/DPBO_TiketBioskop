-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2022 at 07:00 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbtiketbioskop`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbioskop`
--

CREATE TABLE `tbioskop` (
  `idbioskop` int(4) NOT NULL,
  `namabioskop` varchar(50) NOT NULL,
  `kota` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbioskop`
--

INSERT INTO `tbioskop` (`idbioskop`, `namabioskop`, `kota`) VALUES
(1, 'btes', 'los'),
(2, 'cool', 'bandung');

-- --------------------------------------------------------

--
-- Table structure for table `ttiketbioskop`
--

CREATE TABLE `ttiketbioskop` (
  `idtiket` int(4) NOT NULL,
  `judulfilm` varchar(50) NOT NULL,
  `waktu` datetime NOT NULL,
  `namapemesan` varchar(50) NOT NULL,
  `idbioskop` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ttiketbioskop`
--

INSERT INTO `ttiketbioskop` (`idtiket`, `judulfilm`, `waktu`, `namapemesan`, `idbioskop`) VALUES
(7, '9', '2022-06-24 21:50:00', 'saya', 1),
(8, 'spider', '2022-06-24 22:10:00', 'hello', 2);

-- --------------------------------------------------------

--
-- Table structure for table `ttiketbioskopantrian`
--

CREATE TABLE `ttiketbioskopantrian` (
  `idtiket` int(4) NOT NULL,
  `judulfilm` varchar(50) NOT NULL,
  `waktu` datetime NOT NULL,
  `namapemesan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ttiketbioskopantrian`
--

INSERT INTO `ttiketbioskopantrian` (`idtiket`, `judulfilm`, `waktu`, `namapemesan`) VALUES
(9, 'aqua', '2022-06-22 23:20:00', 'herman'),
(10, 'spider', '2022-06-23 23:20:00', 'sell');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbioskop`
--
ALTER TABLE `tbioskop`
  ADD PRIMARY KEY (`idbioskop`);

--
-- Indexes for table `ttiketbioskop`
--
ALTER TABLE `ttiketbioskop`
  ADD PRIMARY KEY (`idtiket`),
  ADD KEY `idbioskop` (`idbioskop`);

--
-- Indexes for table `ttiketbioskopantrian`
--
ALTER TABLE `ttiketbioskopantrian`
  ADD PRIMARY KEY (`idtiket`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbioskop`
--
ALTER TABLE `tbioskop`
  MODIFY `idbioskop` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ttiketbioskopantrian`
--
ALTER TABLE `ttiketbioskopantrian`
  MODIFY `idtiket` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ttiketbioskop`
--
ALTER TABLE `ttiketbioskop`
  ADD CONSTRAINT `ttiketbioskop_ibfk_1` FOREIGN KEY (`idbioskop`) REFERENCES `tbioskop` (`idbioskop`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
