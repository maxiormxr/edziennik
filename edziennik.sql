-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
<<<<<<< HEAD
-- Czas generowania: 09 Kwi 2018, 10:21
=======
-- Czas generowania: 14 Kwi 2018, 19:48
>>>>>>> Patryk
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
  `id_uzytkownika` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `daneuzytkownika`
--

CREATE TABLE `daneuzytkownika` (
  `id_uzytkownika` int(11) NOT NULL,
  `imie` varchar(25) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` varchar(25) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `adress` varchar(50) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `nrdomu` varchar(10) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `miasto` varchar(25) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `pesel` varchar(11) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
<<<<<<< HEAD
=======

--
-- Zrzut danych tabeli `daneuzytkownika`
--

INSERT INTO `daneuzytkownika` (`id_uzytkownika`, `imie`, `nazwisko`, `adress`, `nrdomu`, `miasto`, `pesel`) VALUES
(1, 'Patryk', 'Kurowski', 'adres', '2', 'opole', '99999999'),
(5, 'Mateusz', 'Lech', 'asdsa', '666', 'Opole', '486483413'),
(6, 'Łukasz', 'Szorc', 'Sosnowiec', '8', 'Sosnowiec', '000411'),
(7, 'Adam', 'Nowak', 'jakis', 'inny', 'jakies', '959884'),
(8, 'Mateusz', 'Machcinski', 'asfa', '111', 'asfsdf', '2123');
>>>>>>> Patryk

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klasa`
--

CREATE TABLE `klasa` (
  `id_klasy` int(11) NOT NULL,
  `nazwa` varchar(11) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
<<<<<<< HEAD

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `nauczyciele_klasa_przedmiot`
--

=======

--
-- Zrzut danych tabeli `klasa`
--

INSERT INTO `klasa` (`id_klasy`, `nazwa`) VALUES
(1, '1A'),
(2, '1B');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `nauczyciele_klasa_przedmiot`
--

>>>>>>> Patryk
CREATE TABLE `nauczyciele_klasa_przedmiot` (
  `id_klasa` int(11) NOT NULL,
  `id_użytkownika` int(11) DEFAULT NULL,
  `id_przedmiotu` int(11) DEFAULT NULL,
<<<<<<< HEAD
  `id_oceny` int(11) NOT NULL,
  `id_klasy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
=======
  `id_klasy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `nauczyciele_klasa_przedmiot`
--

INSERT INTO `nauczyciele_klasa_przedmiot` (`id_klasa`, `id_użytkownika`, `id_przedmiotu`, `id_klasy`) VALUES
(1, 5, 1, 1),
(2, 8, 2, 2);
>>>>>>> Patryk

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `oceny`
--

CREATE TABLE `oceny` (
  `id_oceny` int(11) NOT NULL,
  `id_przemiotu` int(11) NOT NULL,
  `ocena` int(11) NOT NULL,
  `id_uzytkownika` int(11) NOT NULL,
<<<<<<< HEAD
  `waga` text COLLATE utf8_polish_ci NOT NULL
=======
  `waga` text COLLATE utf8_polish_ci NOT NULL,
  `id_klasy` int(11) NOT NULL
>>>>>>> Patryk
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `oceny`
--

INSERT INTO `oceny` (`id_oceny`, `id_przemiotu`, `ocena`, `id_uzytkownika`, `waga`, `id_klasy`) VALUES
(11, 1, 5, 1, '1', 1),
(12, 2, 2, 1, '2', 1),
(13, 2, 2, 6, '2', 1),
(14, 2, 3, 7, '2', 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `przedmioty`
<<<<<<< HEAD
--

CREATE TABLE `przedmioty` (
  `id_przedmiotu` int(11) NOT NULL,
  `nazwa` varchar(11) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
=======
--

CREATE TABLE `przedmioty` (
  `id_przedmiotu` int(11) NOT NULL,
  `nazwa` varchar(11) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `przedmioty`
--

INSERT INTO `przedmioty` (`id_przedmiotu`, `nazwa`) VALUES
(1, 'matematyka'),
(2, 'polski');
>>>>>>> Patryk

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id_uzytkownika` int(11) NOT NULL,
  `login` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `haslo` varchar(20) COLLATE utf8_polish_ci NOT NULL,
<<<<<<< HEAD
  `Rola` int(2) NOT NULL
=======
  `rola` varchar(5) COLLATE utf8_polish_ci NOT NULL,
  `rodzaj` varchar(40) COLLATE utf8_polish_ci NOT NULL
>>>>>>> Patryk
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `uzytkownicy`
--

<<<<<<< HEAD
INSERT INTO `uzytkownicy` (`id_uzytkownika`, `login`, `haslo`, `Rola`) VALUES
(1, 'pat', 'qaz', 0),
(5, 'mat', 'qaz', 0);
=======
INSERT INTO `uzytkownicy` (`id_uzytkownika`, `login`, `haslo`, `rola`, `rodzaj`) VALUES
(1, 'patkur', 'qaz', '1', 'Uczen'),
(5, 'matlec', 'qaz', '2', 'Nauczyciel'),
(6, 'lukszo', 'qaz', '1', 'Uczen'),
(7, 'adanow', 'now', '1', 'Uczen'),
(8, 'matmac', 'mac', '2', 'Nauczyciel');
>>>>>>> Patryk

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `aktualnosci`
--
ALTER TABLE `aktualnosci`
  ADD PRIMARY KEY (`id_aktualnosci`),
  ADD KEY `Id_uzytkownika` (`id_uzytkownika`);
<<<<<<< HEAD

--
-- Indeksy dla tabeli `daneuzytkownika`
--
ALTER TABLE `daneuzytkownika`
  ADD PRIMARY KEY (`id_uzytkownika`),
  ADD KEY `id_uzytkownika` (`id_uzytkownika`);

--
-- Indeksy dla tabeli `klasa`
--
=======

--
-- Indeksy dla tabeli `daneuzytkownika`
--
ALTER TABLE `daneuzytkownika`
  ADD PRIMARY KEY (`id_uzytkownika`);

--
-- Indeksy dla tabeli `klasa`
--
>>>>>>> Patryk
ALTER TABLE `klasa`
  ADD PRIMARY KEY (`id_klasy`);

--
-- Indeksy dla tabeli `nauczyciele_klasa_przedmiot`
--
ALTER TABLE `nauczyciele_klasa_przedmiot`
  ADD PRIMARY KEY (`id_klasa`),
  ADD KEY `id_klasy` (`id_klasy`),
<<<<<<< HEAD
  ADD KEY `id_użytkownika` (`id_użytkownika`,`id_przedmiotu`,`id_oceny`),
  ADD KEY `id_oceny` (`id_oceny`),
=======
  ADD KEY `id_użytkownika` (`id_użytkownika`,`id_przedmiotu`),
>>>>>>> Patryk
  ADD KEY `id_przedmiotu` (`id_przedmiotu`);

--
-- Indeksy dla tabeli `oceny`
--
ALTER TABLE `oceny`
  ADD PRIMARY KEY (`id_oceny`),
  ADD KEY `id_przemiotu` (`id_przemiotu`),
<<<<<<< HEAD
  ADD KEY `id_uzytkownika` (`id_uzytkownika`);
=======
  ADD KEY `id_uzytkownika` (`id_uzytkownika`),
  ADD KEY `id_klasy` (`id_klasy`);
>>>>>>> Patryk

--
-- Indeksy dla tabeli `przedmioty`
--
ALTER TABLE `przedmioty`
  ADD PRIMARY KEY (`id_przedmiotu`);

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
  MODIFY `id_aktualnosci` int(11) NOT NULL AUTO_INCREMENT;

--
<<<<<<< HEAD
-- AUTO_INCREMENT dla tabeli `oceny`
--
ALTER TABLE `oceny`
  MODIFY `id_oceny` int(11) NOT NULL AUTO_INCREMENT;
=======
-- AUTO_INCREMENT dla tabeli `nauczyciele_klasa_przedmiot`
--
ALTER TABLE `nauczyciele_klasa_przedmiot`
  MODIFY `id_klasa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `oceny`
--
ALTER TABLE `oceny`
  MODIFY `id_oceny` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
>>>>>>> Patryk

--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id_uzytkownika` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `aktualnosci`
--
ALTER TABLE `aktualnosci`
  ADD CONSTRAINT `aktualnosci_ibfk_1` FOREIGN KEY (`id_uzytkownika`) REFERENCES `uzytkownicy` (`id_uzytkownika`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `daneuzytkownika`
--
ALTER TABLE `daneuzytkownika`
  ADD CONSTRAINT `daneuzytkownika_ibfk_1` FOREIGN KEY (`id_uzytkownika`) REFERENCES `uzytkownicy` (`id_uzytkownika`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `nauczyciele_klasa_przedmiot`
--
ALTER TABLE `nauczyciele_klasa_przedmiot`
  ADD CONSTRAINT `nauczyciele_klasa_przedmiot_ibfk_1` FOREIGN KEY (`id_klasy`) REFERENCES `klasa` (`id_klasy`) ON DELETE CASCADE ON UPDATE CASCADE,
<<<<<<< HEAD
  ADD CONSTRAINT `nauczyciele_klasa_przedmiot_ibfk_2` FOREIGN KEY (`id_oceny`) REFERENCES `oceny` (`id_oceny`) ON DELETE CASCADE ON UPDATE CASCADE,
=======
>>>>>>> Patryk
  ADD CONSTRAINT `nauczyciele_klasa_przedmiot_ibfk_3` FOREIGN KEY (`id_przedmiotu`) REFERENCES `przedmioty` (`id_przedmiotu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nauczyciele_klasa_przedmiot_ibfk_4` FOREIGN KEY (`id_użytkownika`) REFERENCES `uzytkownicy` (`id_uzytkownika`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `oceny`
--
ALTER TABLE `oceny`
  ADD CONSTRAINT `oceny_ibfk_1` FOREIGN KEY (`id_przemiotu`) REFERENCES `przedmioty` (`id_przedmiotu`) ON DELETE CASCADE ON UPDATE CASCADE,
<<<<<<< HEAD
  ADD CONSTRAINT `oceny_ibfk_2` FOREIGN KEY (`id_uzytkownika`) REFERENCES `uzytkownicy` (`id_uzytkownika`) ON DELETE CASCADE ON UPDATE CASCADE;
=======
  ADD CONSTRAINT `oceny_ibfk_2` FOREIGN KEY (`id_uzytkownika`) REFERENCES `uzytkownicy` (`id_uzytkownika`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `oceny_ibfk_3` FOREIGN KEY (`id_klasy`) REFERENCES `klasa` (`id_klasy`) ON DELETE CASCADE ON UPDATE CASCADE;
>>>>>>> Patryk
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
