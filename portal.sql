-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 08 Sty 2023, 21:32
-- Wersja serwera: 10.4.20-MariaDB
-- Wersja PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `portal`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `dane_podstawowe`
--

CREATE TABLE `dane_podstawowe` (
  `id` int(11) NOT NULL,
  `imie` text COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` text COLLATE utf8_polish_ci NOT NULL,
  `data_urodzenia_uzytkownika` date NOT NULL,
  `login` text COLLATE utf8_polish_ci NOT NULL,
  `haslo` text COLLATE utf8_polish_ci NOT NULL,
  `email` text COLLATE utf8_polish_ci NOT NULL,
  `data_zalozenia_konta` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `dane_podstawowe`
--

INSERT INTO `dane_podstawowe` (`id`, `imie`, `nazwisko`, `data_urodzenia_uzytkownika`, `login`, `haslo`, `email`, `data_zalozenia_konta`) VALUES
(1, 'Krzysztof ', 'Bicz', '2014-01-01', 'Kris', 'Kris', 'Kris@kris.pl', '2023-01-08 20:30:37'),
(2, 'Rychu', 'Patryka', '2015-01-08', 'Rychu', 'Hasełko', 'email@email.com', '2023-01-08 20:31:07');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `posts`
--

CREATE TABLE `posts` (
  `ID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `PostDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `EditDate` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Post` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Cameleons` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `posts`
--

INSERT INTO `posts` (`ID`, `userID`, `PostDate`, `EditDate`, `Post`, `Cameleons`) VALUES
(1, 1, '2023-01-08 20:31:19', '2023-01-08 20:31:19', 'xDDD', 41412),
(2, 2, '2023-01-08 20:31:27', '2023-01-08 20:31:27', 'Nie xD', 232);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `dane_podstawowe`
--
ALTER TABLE `dane_podstawowe`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `userID` (`userID`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `dane_podstawowe`
--
ALTER TABLE `dane_podstawowe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `posts`
--
ALTER TABLE `posts`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `dane_podstawowe` (`id`),
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `dane_podstawowe` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
