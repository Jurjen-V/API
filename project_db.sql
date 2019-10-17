-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 09 sep 2019 om 20:18
-- Serverversie: 10.1.26-MariaDB
-- PHP-versie: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_db`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `admins`
--

CREATE TABLE `admins` (
  `gebruikersnaam` varchar(10) NOT NULL,
  `wachtwoord` varchar(10) NOT NULL,
  `rol` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `apikey`
--

CREATE TABLE `apikey` (
  `ApiKey` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `apikey`
--

INSERT INTO `apikey` (`ApiKey`) VALUES
('a');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `categorie`
--

CREATE TABLE `categorie` (
  `Categorie_ID` int(11) NOT NULL,
  `Categorie_naam` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `categorie`
--

INSERT INTO `categorie` (`Categorie_ID`, `Categorie_naam`) VALUES
(1, 'p.Categorie_naam'),
(2, 'p.Categorie_naam'),
(3, 'p.Categorie_naam');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `lener`
--

CREATE TABLE `lener` (
  `Lener_ID` int(10) UNSIGNED NOT NULL,
  `Lener_naam` varchar(25) NOT NULL,
  `Lener_mobiel` varchar(15) NOT NULL,
  `Lener_email` varchar(25) NOT NULL,
  `Lener_afd` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `lener`
--

INSERT INTO `lener` (`Lener_ID`, `Lener_naam`, `Lener_mobiel`, `Lener_email`, `Lener_afd`) VALUES
(1, 'Jurjen', '06123456', 'test@test.nl', 'ICT'),
(2, 'Bas', '0624589546', 'Test3@test.nl', 'Verzorging');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `object`
--

CREATE TABLE `object` (
  `Object_ID` int(10) UNSIGNED NOT NULL,
  `Object_naam` varchar(25) NOT NULL,
  `Object_merk` varchar(25) NOT NULL,
  `Object_type` varchar(25) NOT NULL,
  `Object_status` int(10) UNSIGNED NOT NULL,
  `Categorie_ID` int(10) UNSIGNED NOT NULL,
  `Object_img` varchar(255) NOT NULL,
  `Object_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `object`
--

INSERT INTO `object` (`Object_ID`, `Object_naam`, `Object_merk`, `Object_type`, `Object_status`, `Categorie_ID`, `Object_img`, `Object_description`) VALUES
(1, '.$_GET[\'Object_naam\'].', '.$_GET[\'Object_merk\'].', '.$_GET[\'Object_type\'].', 1, 2, 'harmen.png', 'Kapot man'),
(2, '      7 dagen per week th', 'ASUS', 'Laptop', 0, 1, 'remon.jpg', '');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `uitleen`
--

CREATE TABLE `uitleen` (
  `Uitleen_ID` int(10) UNSIGNED NOT NULL,
  `Lener_ID` int(10) UNSIGNED NOT NULL,
  `Object_ID` varchar(25) NOT NULL,
  `Uitleendatum` date NOT NULL,
  `Inleverdatum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `uitleen`
--

INSERT INTO `uitleen` (`Uitleen_ID`, `Lener_ID`, `Object_ID`, `Uitleendatum`, `Inleverdatum`) VALUES
(2, 1, '1', '2019-06-18', '2019-06-26'),
(3, 2, '1', '2019-06-13', '2019-06-15'),
(4, 2, '1', '2019-06-13', '2019-06-15'),
(5, 2, '1', '2019-06-13', '2019-06-15');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(2048) NOT NULL,
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ApiKey` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `email`, `password`, `created`, `modified`, `ApiKey`) VALUES
(5, 'jurjen', 'Veenstra', 'jurjen.veenstra@hotmail.nl', '$2y$10$pICrbC3f1sMLksc9TniNk.jOKfsVYDdFZWhqVORRO42//oiNCnjfG', '2019-06-28 14:22:10', '2019-06-28 12:22:10', 'w5KrALcTvJ');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`Categorie_ID`);

--
-- Indexen voor tabel `lener`
--
ALTER TABLE `lener`
  ADD PRIMARY KEY (`Lener_ID`);

--
-- Indexen voor tabel `object`
--
ALTER TABLE `object`
  ADD PRIMARY KEY (`Object_ID`);

--
-- Indexen voor tabel `uitleen`
--
ALTER TABLE `uitleen`
  ADD PRIMARY KEY (`Uitleen_ID`);

--
-- Indexen voor tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `categorie`
--
ALTER TABLE `categorie`
  MODIFY `Categorie_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `uitleen`
--
ALTER TABLE `uitleen`
  MODIFY `Uitleen_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT voor een tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
