-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2021 at 08:59 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `info_sistem`
--

-- --------------------------------------------------------

--
-- Table structure for table `fotografije`
--

CREATE TABLE `fotografije` (
  `id` int(11) NOT NULL,
  `naziv` varchar(255) COLLATE utf8_bin NOT NULL,
  `nekretnina_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `fotografije`
--

INSERT INTO `fotografije` (`id`, `naziv`, `nekretnina_id`) VALUES
(17, './slike/603a086416c5a.', 19),
(18, './slike/603a086416c5a.', 19),
(19, './slike/60395c287e119.jpg', 20),
(22, './slike/60395c91f03ed.jpg', 22),
(23, './slike/60395c91f2aaa.jpg', 22),
(24, './slike/60395ce7e85a4.jpg', 23),
(25, './slike/60395d1532271.jpg', 24),
(26, './slike/60395d1536220.jpg', 24),
(29, './slike/60395ee72177c.jpg', 26),
(30, './slike/60395ee723149.jpg', 26),
(33, './slike/603a073c316d3.jpg', 28),
(36, './slike/603aa104dd77b.jpg', 30);

-- --------------------------------------------------------

--
-- Table structure for table `grad`
--

CREATE TABLE `grad` (
  `id` int(11) NOT NULL,
  `naziv` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `grad`
--

INSERT INTO `grad` (`id`, `naziv`) VALUES
(1, 'Podgorica'),
(2, 'Nikšic'),
(3, 'Cetinje'),
(4, 'Budva'),
(5, 'Bar'),
(6, 'Bijelo Polje'),
(7, 'Herceg Novi'),
(8, 'Berane'),
(9, 'Žabljak'),
(10, 'Pljevlja'),
(11, 'Ulcinj'),
(12, 'Tivat'),
(13, 'Kotor');

-- --------------------------------------------------------

--
-- Table structure for table `nekretnine`
--

CREATE TABLE `nekretnine` (
  `id` int(11) NOT NULL,
  `grad_id` int(11) NOT NULL,
  `tip_oglasa_id` int(11) NOT NULL,
  `tip_nekretnine_id` int(11) NOT NULL,
  `povrsina` double NOT NULL,
  `cijena` decimal(65,0) NOT NULL,
  `godina_izgradnje` varchar(255) COLLATE utf8_bin NOT NULL,
  `opis` text COLLATE utf8_bin DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_bin NOT NULL,
  `datum_prodaje` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `nekretnine`
--

INSERT INTO `nekretnine` (`id`, `grad_id`, `tip_oglasa_id`, `tip_nekretnine_id`, `povrsina`, `cijena`, `godina_izgradnje`, `opis`, `status`, `datum_prodaje`) VALUES
(19, 1, 1, 2, 80, '89000', '2015', 'Kuća se nalazi u naselju Tološi. Dvosobna je, sa terasom. ', 'Prodato', '2020-11-11'),
(20, 4, 2, 4, 120, '2000', '2018', 'Poslovni prostor nalazi se na trećem spratu hotela sa četiri zvjezdice.       ', '', NULL),
(22, 7, 2, 1, 60, '250', '2017', 'Stan je smješten u Zelenici. Ima pogled na more.          ', '', NULL),
(23, 1, 2, 3, 18, '100', '2007', 'Na Starom Aerodromu.                    \r\n                    ', '', NULL),
(24, 13, 1, 4, 40, '110000', '2014', 'Kompletno opremljen poslovni prostor, naselje Dobrota.      \r\n                    ', '', NULL),
(26, 5, 1, 2, 120, '130000', '2014', 'Kuća na dva sprata, sa velikom terasom i pogledom na more, trosobna.                \r\n                    ', '', NULL),
(28, 2, 1, 2, 210, '100000', '2009', 'Nalazi se na placu površine 920 m2, prizemlje 100m2, dvosobna.                    \r\n                    ', '', NULL),
(30, 12, 2, 1, 60, '300', '2017', 'Dvosoban stan, 300 m od mora, iza hotela Helada.      \r\n                    ', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tip_nekretnine`
--

CREATE TABLE `tip_nekretnine` (
  `id` int(11) NOT NULL,
  `naziv1` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tip_nekretnine`
--

INSERT INTO `tip_nekretnine` (`id`, `naziv1`) VALUES
(1, 'Stan'),
(2, 'Kuća'),
(3, 'Garaža'),
(4, 'Poslovni prostor');

-- --------------------------------------------------------

--
-- Table structure for table `tip_oglasa`
--

CREATE TABLE `tip_oglasa` (
  `id` int(11) NOT NULL,
  `ime` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tip_oglasa`
--

INSERT INTO `tip_oglasa` (`id`, `ime`) VALUES
(1, 'Prodaja'),
(2, 'Iznajmljivanje'),
(3, 'Kompenzacija');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fotografije`
--
ALTER TABLE `fotografije`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_fotografije_nekretnine` (`nekretnina_id`);

--
-- Indexes for table `grad`
--
ALTER TABLE `grad`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nekretnine`
--
ALTER TABLE `nekretnine`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_nekretnine_grad` (`grad_id`),
  ADD KEY `fk_nekretnine_tip_oglasa` (`tip_oglasa_id`),
  ADD KEY `fk_nekretnine_tip_nekretnine` (`tip_nekretnine_id`);

--
-- Indexes for table `tip_nekretnine`
--
ALTER TABLE `tip_nekretnine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tip_oglasa`
--
ALTER TABLE `tip_oglasa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fotografije`
--
ALTER TABLE `fotografije`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `grad`
--
ALTER TABLE `grad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT for table `nekretnine`
--
ALTER TABLE `nekretnine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tip_nekretnine`
--
ALTER TABLE `tip_nekretnine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tip_oglasa`
--
ALTER TABLE `tip_oglasa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fotografije`
--
ALTER TABLE `fotografije`
  ADD CONSTRAINT `fk_fotografije_nekretnine` FOREIGN KEY (`nekretnina_id`) REFERENCES `nekretnine` (`id`);

--
-- Constraints for table `nekretnine`
--
ALTER TABLE `nekretnine`
  ADD CONSTRAINT `fk_nekretnine_grad` FOREIGN KEY (`grad_id`) REFERENCES `grad` (`id`),
  ADD CONSTRAINT `fk_nekretnine_tip_nekretnine` FOREIGN KEY (`tip_nekretnine_id`) REFERENCES `tip_nekretnine` (`id`),
  ADD CONSTRAINT `fk_nekretnine_tip_oglasa` FOREIGN KEY (`tip_oglasa_id`) REFERENCES `tip_oglasa` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
