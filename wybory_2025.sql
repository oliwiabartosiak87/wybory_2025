-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2025 at 08:51 PM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wybory_2025`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `glosy`
--

CREATE TABLE `glosy` (
  `id` int(11) NOT NULL,
  `kandydat_id` int(11) NOT NULL,
  `data_glosu` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kandydaci`
--

CREATE TABLE `kandydaci` (
  `id` int(11) NOT NULL,
  `imie` varchar(50) NOT NULL,
  `nazwisko` varchar(50) NOT NULL,
  `wiek` int(11) NOT NULL,
  `miejscowosc` varchar(100) NOT NULL,
  `wyksztalcenie` varchar(100) NOT NULL,
  `zawod` varchar(100) NOT NULL,
  `miejsce_pracy` varchar(100) NOT NULL,
  `partia` varchar(100) NOT NULL,
  `oswiadczenie_lustracyjne` enum('tak','nie') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kandydaci`
--

INSERT INTO `kandydaci` (`id`, `imie`, `nazwisko`, `wiek`, `miejscowosc`, `wyksztalcenie`, `zawod`, `miejsce_pracy`, `partia`, `oswiadczenie_lustracyjne`) VALUES
(1, 'Artur', 'Bartoszewicz', 51, 'Warszawa', 'wyższe', 'nauczyciel akademicki', 'Szkoła Główna Handlowa w Warszawie', '-', ''),
(2, 'Magdalena Agnieszka', 'Biejat', 43, 'Warszawa', 'wyższe', 'senatorka', 'Senat Rzeczypospolitej Polskiej', '-', ''),
(3, 'Grzegorz Michał', 'Braun', 58, 'Rzeszów', 'wyższe', 'poseł do Parlamentu Europejskiego', 'Parlament Europejski', 'Konfederacja Korony Polskiej', ''),
(4, 'Szymon Franciszek', 'Hołownia', 48, 'Otwock', 'średnie', 'Marszałek Sejmu RP', 'Sejm Rzeczypospolitej Polskiej', 'Polska 2050 Szymona Hołowni', ''),
(5, 'Marek', 'Jakubiak', 66, 'Warszawa', 'średnie', 'polityk', 'Sejm Rzeczypospolitej Polskiej', 'Federacja dla Rzeczypospolitej', ''),
(6, 'Maciej', 'Maciak', 54, 'Włocławek', 'średnie', 'dziennikarz', 'Portal Włocławek', '-', ''),
(7, 'Sławomir Jerzy', 'Mentzen', 38, 'Toruń', 'wyższe', 'doradca podatkowy', 'Kancelaria Mentzen sp. z o.o.', 'Konfederacja Wolność i Niepodległość', ''),
(9, 'Joanna', 'Senyszyn', 76, 'Warszawa', 'wyższe', 'dziennikarz', 'Tygodnik „Fakty po Mitach”', '-', ''),
(10, 'Krzysztof Jakub', 'Stanowski', 42, 'Wilcza Góra', 'średnie', 'dziennikarz', 'Kanał Zero S.A.', '-', ''),
(11, 'Rafał Kazimierz', 'Trzaskowski', 53, 'Warszawa', 'wyższe', 'pracownik samorządowy', 'Urząd m.st. Warszawy', 'Platforma Obywatelska RP', ''),
(12, 'Marek Marian', 'Woch', 46, 'Kąkolewnica', 'wyższe', 'prawnik', 'KRP Kancelaria Rzecznika Przedsiębiorców PSA', 'Bezpartyjni Samorządowcy - Łączy nas Polska', ''),
(20, 'Karol', 'Nawrocki', 42, 'Gdańsk', 'wyższe', 'wyższy urzędnik państwowy', 'Instytut Pamięci Narodowej - Komisja Ścigania Zbrodni Przeciwko Narodowi Polskiemu', '-', ''),
(25, 'Franek', 'Dettlaff', 29, 'Radomsko', 'Wyższe', 'Nauczyciel', 'TAU', 'PIS', '');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `glosy`
--
ALTER TABLE `glosy`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kandydat_id` (`kandydat_id`);

--
-- Indeksy dla tabeli `kandydaci`
--
ALTER TABLE `kandydaci`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `glosy`
--
ALTER TABLE `glosy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kandydaci`
--
ALTER TABLE `kandydaci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `glosy`
--
ALTER TABLE `glosy`
  ADD CONSTRAINT `glosy_ibfk_1` FOREIGN KEY (`kandydat_id`) REFERENCES `kandydaci` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
