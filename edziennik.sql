-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 08 Kwi 2018, 22:48
-- Wersja serwera: 10.1.31-MariaDB
-- Wersja PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `edziennik`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `aktualnosci`
--

CREATE TABLE `aktualnosci` (
  `id_aktualnosci` int(11) NOT NULL,
  `tekst` text COLLATE utf8_polish_ci NOT NULL,
  `imie` varchar(25) COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` varchar(25) COLLATE utf8_polish_ci NOT NULL,
  `Id_uzytkownika` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `aktualnosci`
--

INSERT INTO `aktualnosci` (`id_aktualnosci`, `tekst`, `imie`, `nazwisko`, `Id_uzytkownika`) VALUES
(1, '', '', '', 0),
(2, '', '', '', 0),
(3, 'asdf', '', '', 0),
(4, '', '', '', 0),
(5, 'sadd', '', '', 0),
(6, '', '', '', 0),
(7, 'asf', '', '', 0),
(8, '', '', '', 0),
(9, '', '', '', 0),
(10, 'dzvzdf', '', '', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klasa`
--

CREATE TABLE `klasa` (
  `id_klasy` int(11) NOT NULL,
  `nazwa` varchar(11) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `nauczyciele_klasa_przedmiot`
--

CREATE TABLE `nauczyciele_klasa_przedmiot` (
  `id_naucz_klasa_przedmioti` int(11) NOT NULL,
  `id_nauczyciela` int(11) DEFAULT NULL,
  `id_klasy` int(11) DEFAULT NULL,
  `id_przedmiotu` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `oceny`
--

CREATE TABLE `oceny` (
  `id_oceny` int(11) NOT NULL,
  `id_przemiotu` int(11) NOT NULL,
  `ocena` int(11) NOT NULL,
  `Id_uzytkownika` int(11) NOT NULL,
  `waga` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `przedmioty`
--

CREATE TABLE `przedmioty` (
  `id_przedmiotu` int(11) NOT NULL,
  `nazwa` varchar(11) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id_uzytkownika` int(11) NOT NULL,
  `login` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `haslo` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `Imie` text COLLATE utf8_polish_ci NOT NULL,
  `Nazwisko` text COLLATE utf8_polish_ci NOT NULL,
  `adres` text COLLATE utf8_polish_ci NOT NULL,
  `telefon` int(11) NOT NULL,
  `Rola` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id_uzytkownika`, `login`, `haslo`, `Imie`, `Nazwisko`, `adres`, `telefon`, `Rola`) VALUES
(1, 'pat', 'qaz', '', '', '', 0, 0),
(5, 'mat', 'qaz', '', '', '', 0, 0);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `aktualnosci`
--
ALTER TABLE `aktualnosci`
  ADD PRIMARY KEY (`id_aktualnosci`);

--
-- Indeksy dla tabeli `oceny`
--
ALTER TABLE `oceny`
  ADD PRIMARY KEY (`id_oceny`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id_uzytkownika`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `aktualnosci`
--
ALTER TABLE `aktualnosci`
  MODIFY `id_aktualnosci` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT dla tabeli `oceny`
--
ALTER TABLE `oceny`
  MODIFY `id_oceny` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id_uzytkownika` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
