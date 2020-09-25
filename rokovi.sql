-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 25, 2020 at 07:45 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rokovi`
--

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `dodajNovogRadnika`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `dodajNovogRadnika` (IN `ime` VARCHAR(256) CHARSET utf8, IN `sifra` VARCHAR(512) CHARSET utf8, IN `poslovnicaID` INT)  NO SQL
INSERT INTO radnik (`RADNIK_ID`, `POS_ID`, `RADNIK_LOZINKA`, `RADNIK_KorisnickoIme`) VALUES (NULL,poslovnicaID,sifra,ime)$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `dobavljaci`
--

DROP TABLE IF EXISTS `dobavljaci`;
CREATE TABLE IF NOT EXISTS `dobavljaci` (
  `DOB_ID` int(11) NOT NULL AUTO_INCREMENT,
  `DOB_Naziv` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DOB_GranicaPovratka` int(11) NOT NULL,
  PRIMARY KEY (`DOB_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dobavljaci`
--

INSERT INTO `dobavljaci` (`DOB_ID`, `DOB_Naziv`, `DOB_GranicaPovratka`) VALUES
(1, 'Rubin', 45),
(2, 'Frutti', 61),
(3, 'Jamnica-Mivela', 30),
(4, 'Simex-Zlat.voda', 30),
(5, 'Jedini pravi', 14),
(6, 'Knjaz Milos', 30),
(7, 'Carlsberg', 30),
(8, 'Fruvita', 45),
(9, 'Bahus', 91),
(10, 'Coca Cola HBC', 30),
(11, 'Frutella', 61),
(12, 'Minakva', 30),
(13, 'Catic-Waltz', 61),
(14, 'Dali Trade', 61),
(15, 'Draginja', 91),
(16, 'Elixir', 30),
(17, 'Strauss', 30),
(18, 'Mixtrade', 15),
(19, 'Atlantic', 30),
(20, 'Takovo', 61),
(21, 'Vrnjci', 61);

-- --------------------------------------------------------

--
-- Table structure for table `dozvola`
--

DROP TABLE IF EXISTS `dozvola`;
CREATE TABLE IF NOT EXISTS `dozvola` (
  `DOZ_ID` int(11) NOT NULL AUTO_INCREMENT,
  `DOZ_Naziv` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`DOZ_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dozvola`
--

INSERT INTO `dozvola` (`DOZ_ID`, `DOZ_Naziv`) VALUES
(1, 'citanje_liste_dobavljaca'),
(2, 'citanje_liste_proizvoda'),
(3, 'dodavanje_dobavljaca'),
(4, 'dodavanje_proizvoda'),
(5, 'brisanje_proizvoda'),
(6, 'brisanje_dobavljaca'),
(7, 'dodavanje_radnika'),
(8, 'dodavanje_privilegija'),
(9, 'citanje_liste_poslovnica'),
(10, 'citanje_liste_radnika');

-- --------------------------------------------------------

--
-- Table structure for table `grad`
--

DROP TABLE IF EXISTS `grad`;
CREATE TABLE IF NOT EXISTS `grad` (
  `GRAD_ID` int(11) NOT NULL AUTO_INCREMENT,
  `GRAD_Naziv` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`GRAD_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `grad`
--

INSERT INTO `grad` (`GRAD_ID`, `GRAD_Naziv`) VALUES
(9, 'Novi grad'),
(7, 'Sarajevo Centar'),
(8, 'Sarajevo');

-- --------------------------------------------------------

--
-- Table structure for table `imadobavljaca`
--

DROP TABLE IF EXISTS `imadobavljaca`;
CREATE TABLE IF NOT EXISTS `imadobavljaca` (
  `DOB_ID` int(11) NOT NULL,
  `POS_ID` int(11) NOT NULL,
  PRIMARY KEY (`DOB_ID`,`POS_ID`),
  KEY `FK_ImaDobavljaca2` (`POS_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `listadozvola`
--

DROP TABLE IF EXISTS `listadozvola`;
CREATE TABLE IF NOT EXISTS `listadozvola` (
  `DOZ_ID` int(11) NOT NULL,
  `UL_ID` int(11) NOT NULL,
  PRIMARY KEY (`DOZ_ID`,`UL_ID`),
  KEY `FK_VaziZaUlogu` (`UL_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `listadozvola`
--

INSERT INTO `listadozvola` (`DOZ_ID`, `UL_ID`) VALUES
(1, 1),
(1, 2),
(2, 1),
(3, 2),
(4, 1),
(5, 1),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(10, 2);

-- --------------------------------------------------------

--
-- Table structure for table `listauloga`
--

DROP TABLE IF EXISTS `listauloga`;
CREATE TABLE IF NOT EXISTS `listauloga` (
  `UL_ID` int(11) NOT NULL,
  `RADNIK_ID` int(11) NOT NULL,
  PRIMARY KEY (`UL_ID`,`RADNIK_ID`),
  KEY `FK_ImaUloge` (`RADNIK_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `listauloga`
--

INSERT INTO `listauloga` (`UL_ID`, `RADNIK_ID`) VALUES
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 8),
(1, 10),
(1, 12),
(1, 13),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 22),
(1, 23),
(1, 25),
(1, 26),
(2, 1),
(2, 3),
(2, 5),
(2, 7),
(2, 8),
(2, 10),
(2, 11),
(2, 12),
(2, 14),
(2, 15),
(2, 18),
(2, 20),
(2, 22),
(2, 23),
(2, 24),
(2, 26),
(2, 27),
(2, 28),
(2, 29);

-- --------------------------------------------------------

--
-- Table structure for table `poslovnica`
--

DROP TABLE IF EXISTS `poslovnica`;
CREATE TABLE IF NOT EXISTS `poslovnica` (
  `POS_ID` int(11) NOT NULL AUTO_INCREMENT,
  `GRAD_ID` int(11) DEFAULT NULL,
  `POS_Naziv` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`POS_ID`),
  KEY `FK_UGradu` (`GRAD_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `poslovnica`
--

INSERT INTO `poslovnica` (`POS_ID`, `GRAD_ID`, `POS_Naziv`) VALUES
(13, 8, 'Poslovnica Mojmilo'),
(12, 7, 'Poslovnica Sarajevo 1');

-- --------------------------------------------------------

--
-- Table structure for table `proizvodi`
--

DROP TABLE IF EXISTS `proizvodi`;
CREATE TABLE IF NOT EXISTS `proizvodi` (
  `PROIZ_ID` int(11) NOT NULL AUTO_INCREMENT,
  `DOB_ID` int(11) NOT NULL,
  `POS_ID` int(11) NOT NULL,
  `PROIZ_Naziv` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PROIZ_DatumIsteka` date NOT NULL,
  `zaVracanje` tinyint(1) DEFAULT NULL,
  `vracen` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`PROIZ_ID`),
  KEY `FK_Dobavlja` (`DOB_ID`),
  KEY `FK_ImaProizvode` (`POS_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=75 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `proizvodi`
--

INSERT INTO `proizvodi` (`PROIZ_ID`, `DOB_ID`, `POS_ID`, `PROIZ_Naziv`, `PROIZ_DatumIsteka`, `zaVracanje`, `vracen`) VALUES
(40, 1, 1, 'Vinjak 1L', '2020-08-05', 0, 0),
(44, 1, 1, 'Kokice', '2022-04-26', 0, 1),
(45, 8, 1, 'Coca cola zero limun limenka', '2020-02-18', 0, 1),
(53, 1, 2, 'Toalet papir', '2020-08-05', 0, 1),
(54, 1, 1, 'Obicna Voda', '2022-11-22', 0, 0),
(69, 15, 12, 'Vinjak', '2020-09-02', 0, 1),
(74, 8, 13, 'Sok jabuka', '2020-11-12', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `radnik`
--

DROP TABLE IF EXISTS `radnik`;
CREATE TABLE IF NOT EXISTS `radnik` (
  `RADNIK_ID` int(11) NOT NULL AUTO_INCREMENT,
  `POS_ID` int(11) NOT NULL,
  `RADNIK_LOZINKA` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `RADNIK_KorisnickoIme` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`RADNIK_ID`),
  KEY `FK_RadnikPoslovnice` (`POS_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `radnik`
--

INSERT INTO `radnik` (`RADNIK_ID`, `POS_ID`, `RADNIK_LOZINKA`, `RADNIK_KorisnickoIme`) VALUES
(26, 12, 'eacb13c99dd7e3c897dbd9ca28b55f6d', 'Radnik-Sef'),
(27, 13, '21232f297a57a5a743894a0e4a801fc3', 'Admin'),
(30, 13, '716b64c0f6bad9ac405aab3f00958dd1', 'Korisnik'),
(25, 12, 'a64e5d0dc60a5bcd98270c2f96ba3dbd', 'Radnik');

-- --------------------------------------------------------

--
-- Table structure for table `uloga`
--

DROP TABLE IF EXISTS `uloga`;
CREATE TABLE IF NOT EXISTS `uloga` (
  `UL_ID` int(11) NOT NULL AUTO_INCREMENT,
  `UL_Naziv` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`UL_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `uloga`
--

INSERT INTO `uloga` (`UL_ID`, `UL_Naziv`) VALUES
(1, 'Radnik'),
(2, 'Šef');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
