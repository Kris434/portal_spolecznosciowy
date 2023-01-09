-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 09 Sty 2023, 21:46
-- Wersja serwera: 10.4.25-MariaDB
-- Wersja PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `portal społecznościowy`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `cameleons`
--

CREATE TABLE `cameleons` (
  `ID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `PostID` int(11) NOT NULL,
  `Cameleon` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `cameleons`
--
ALTER TABLE `cameleons`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `userID` (`userID`,`PostID`),
  ADD KEY `PostID` (`PostID`);

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `cameleons`
--
ALTER TABLE `cameleons`
  ADD CONSTRAINT `cameleons_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `dane_podstawowe` (`id`),
  ADD CONSTRAINT `cameleons_ibfk_2` FOREIGN KEY (`PostID`) REFERENCES `posts` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
