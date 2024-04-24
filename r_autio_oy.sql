-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 24, 2024 at 09:58 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `r_autio_oy`
--

-- --------------------------------------------------------

--
-- Table structure for table `asukas`
--

CREATE TABLE `asukas` (
  `asukasID` int(11) NOT NULL,
  `asuntoID` int(11) NOT NULL,
  `etunimi` varchar(100) NOT NULL,
  `sukunimi` varchar(100) NOT NULL,
  `tunnus` varchar(50) NOT NULL,
  `salasana` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `asukas`
--

INSERT INTO `asukas` (`asukasID`, `asuntoID`, `etunimi`, `sukunimi`, `tunnus`, `salasana`) VALUES
(1, 1, 'Erkki', 'Esimerkki', 'erk_esi', 'salasana1'),
(2, 2, 'Saana', 'Saarinen', 'saa_saa', 'salasana2');

-- --------------------------------------------------------

--
-- Table structure for table `asunto`
--

CREATE TABLE `asunto` (
  `asuntoID` int(11) NOT NULL,
  `taloyhtioID` int(11) NOT NULL,
  `asunnon_numero` int(11) NOT NULL,
  `tilan_tyyppi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `asunto`
--

INSERT INTO `asunto` (`asuntoID`, `taloyhtioID`, `asunnon_numero`, `tilan_tyyppi`) VALUES
(1, 1, 1, 'asunto'),
(2, 1, 2, 'asunto'),
(3, 2, 1, 'asunto'),
(4, 2, 2, 'asunto'),
(5, 2, 3, 'asunto');

-- --------------------------------------------------------

--
-- Table structure for table `taloyhtio`
--

CREATE TABLE `taloyhtio` (
  `taloyhtioID` int(11) NOT NULL,
  `nimi` varchar(100) NOT NULL,
  `osoite` varchar(100) NOT NULL,
  `postinumero` varchar(100) NOT NULL,
  `kaupunki` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `taloyhtio`
--

INSERT INTO `taloyhtio` (`taloyhtioID`, `nimi`, `osoite`, `postinumero`, `kaupunki`) VALUES
(1, 'Asuntola oy', 'Suurtie 10', '00100', 'Helsinki'),
(2, 'Leporanta oy', 'Leporannantie 5', '33100', 'Tampere');

-- --------------------------------------------------------

--
-- Table structure for table `tyontekija`
--

CREATE TABLE `tyontekija` (
  `tyontekijaID` int(11) NOT NULL,
  `etunimi` varchar(50) NOT NULL,
  `sukunimi` varchar(100) NOT NULL,
  `rooli` varchar(100) NOT NULL,
  `tunnus` varchar(50) NOT NULL,
  `salasana` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tyontekija`
--

INSERT INTO `tyontekija` (`tyontekijaID`, `etunimi`, `sukunimi`, `rooli`, `tunnus`, `salasana`, `status`) VALUES
(1, 'Teppo', 'Työmies', 'huoltomies', 'tep_tyo', 'salasana3', 0),
(2, 'Pertti', 'Pomo', 'esimies', 'per_pom', 'salasana4', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tyotehtava`
--

CREATE TABLE `tyotehtava` (
  `tyotehtavaID` int(11) NOT NULL,
  `vikailmoitusID` int(11) NOT NULL,
  `tyontekijaID` int(11) NOT NULL,
  `kuvaus` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `korjaustoimenpide` text NOT NULL,
  `valmistumisaika` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tyotehtava`
--

INSERT INTO `tyotehtava` (`tyotehtavaID`, `vikailmoitusID`, `tyontekijaID`, `kuvaus`, `status`, `korjaustoimenpide`, `valmistumisaika`) VALUES
(1, 1, 1, 'Asukkaan mukaan hanasta tulee vain kylmää vettä.', 0, '', NULL),
(2, 2, 1, 'Asukkaan mukaan pistorasiasta ei tule sähköä', 1, 'Sulaketaulusta oli sulake kärähtänyt, vaihdettiin tilalle uusi sulake.', '2024-04-24 10:58:04');

-- --------------------------------------------------------

--
-- Table structure for table `vikailmoitus`
--

CREATE TABLE `vikailmoitus` (
  `vikailmoitusID` int(11) NOT NULL,
  `asuntoID` int(11) NOT NULL,
  `kuvaus` text NOT NULL,
  `luontipaiva` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `vikailmoitus`
--

INSERT INTO `vikailmoitus` (`vikailmoitusID`, `asuntoID`, `kuvaus`, `luontipaiva`) VALUES
(1, 1, 'Hanasta tulee vain kylmää vettä.', '2024-04-23 16:56:29'),
(2, 2, 'Pistorasiasta ei tule sähköä.', '2024-04-23 16:58:39');

-- --------------------------------------------------------

--
-- Table structure for table `yhteydenotto`
--

CREATE TABLE `yhteydenotto` (
  `yhteydenottoID` int(11) NOT NULL,
  `nimi` varchar(100) NOT NULL,
  `puhelin` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `syy` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `yhteydenotto`
--

INSERT INTO `yhteydenotto` (`yhteydenottoID`, `nimi`, `puhelin`, `email`, `syy`) VALUES
(1, 'Hanna Helmi', '0400-345665', 'hanna@email.com', 'Haluaisin tiedustella talvikunnossapidon hinnoista.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asukas`
--
ALTER TABLE `asukas`
  ADD PRIMARY KEY (`asukasID`),
  ADD KEY `asuntoID` (`asuntoID`);

--
-- Indexes for table `asunto`
--
ALTER TABLE `asunto`
  ADD PRIMARY KEY (`asuntoID`),
  ADD KEY `taloyhtioID` (`taloyhtioID`);

--
-- Indexes for table `taloyhtio`
--
ALTER TABLE `taloyhtio`
  ADD PRIMARY KEY (`taloyhtioID`);

--
-- Indexes for table `tyontekija`
--
ALTER TABLE `tyontekija`
  ADD PRIMARY KEY (`tyontekijaID`);

--
-- Indexes for table `tyotehtava`
--
ALTER TABLE `tyotehtava`
  ADD PRIMARY KEY (`tyotehtavaID`),
  ADD KEY `vikailmoitusID` (`vikailmoitusID`),
  ADD KEY `tyontekijaID` (`tyontekijaID`);

--
-- Indexes for table `vikailmoitus`
--
ALTER TABLE `vikailmoitus`
  ADD PRIMARY KEY (`vikailmoitusID`),
  ADD KEY `asuntoID` (`asuntoID`);

--
-- Indexes for table `yhteydenotto`
--
ALTER TABLE `yhteydenotto`
  ADD PRIMARY KEY (`yhteydenottoID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asukas`
--
ALTER TABLE `asukas`
  MODIFY `asukasID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `asunto`
--
ALTER TABLE `asunto`
  MODIFY `asuntoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `taloyhtio`
--
ALTER TABLE `taloyhtio`
  MODIFY `taloyhtioID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tyontekija`
--
ALTER TABLE `tyontekija`
  MODIFY `tyontekijaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tyotehtava`
--
ALTER TABLE `tyotehtava`
  MODIFY `tyotehtavaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vikailmoitus`
--
ALTER TABLE `vikailmoitus`
  MODIFY `vikailmoitusID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `yhteydenotto`
--
ALTER TABLE `yhteydenotto`
  MODIFY `yhteydenottoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `asukas`
--
ALTER TABLE `asukas`
  ADD CONSTRAINT `asukas_ibfk_1` FOREIGN KEY (`asuntoID`) REFERENCES `asunto` (`asuntoID`);

--
-- Constraints for table `asunto`
--
ALTER TABLE `asunto`
  ADD CONSTRAINT `asunto_ibfk_1` FOREIGN KEY (`taloyhtioID`) REFERENCES `taloyhtio` (`taloyhtioID`);

--
-- Constraints for table `tyotehtava`
--
ALTER TABLE `tyotehtava`
  ADD CONSTRAINT `tyotehtava_ibfk_1` FOREIGN KEY (`vikailmoitusID`) REFERENCES `vikailmoitus` (`vikailmoitusID`),
  ADD CONSTRAINT `tyotehtava_ibfk_2` FOREIGN KEY (`tyontekijaID`) REFERENCES `tyontekija` (`tyontekijaID`);

--
-- Constraints for table `vikailmoitus`
--
ALTER TABLE `vikailmoitus`
  ADD CONSTRAINT `vikailmoitus_ibfk_1` FOREIGN KEY (`asuntoID`) REFERENCES `asunto` (`asuntoID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
