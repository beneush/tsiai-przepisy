-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 24 Kwi 2024, 12:56
-- Wersja serwera: 10.4.24-MariaDB
-- Wersja PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `przepisomat`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `recipes`
--

CREATE TABLE `recipes` (
  `ID` int(16) NOT NULL,
  `name` varchar(42) NOT NULL,
  `ingredients` text NOT NULL,
  `how_to_make` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `recipes`
--

INSERT INTO `recipes` (`ID`, `name`, `ingredients`, `how_to_make`) VALUES
(1, 'Naleśniki', '1 szklanka mąki pszennej\r\n2 jajka\r\n1 szklanka mleka\r\n3/4 szklanki wody (najlepiej gazowanej)\r\nszczypta soli\r\n3 łyżki masła lub oleju roślinnego', 'Mąkę wsypać do miski, dodać jajka, mleko, wodę i sól. Zmiksować na gładkie ciasto. Dodać roztopione masło lub olej roślinny i razem zmiksować (lub wykorzystać tłuszcz do smarowania patelni przed smażeniem każdego naleśnika).\r\nNaleśniki smażyć na dobrze rozgrzanej patelni z cienkim dnem np. naleśnikowej. Przewrócić na drugą stronę gdy spód naleśnika będzie już ładnie zrumieniony i ścięty.'),
(2, 'Jajecznica', '4 jaja\r\nsól\r\npieprz\r\nmasło', 'Roztapiasz masło na patelni (tyle żeby pokrywało dół) potem wlewasz jaja i solisz i pieprzysz. Mieszasz co jakiś czas aż się dobrze zetnie, wyciągasz i jesz'),
(9, 'Pierogi z paczki', 'garnek\r\npaczka pierogów\r\nwoda\r\nsól', 'Wlej do gara wodę, poczekaj aż zacznie wrzeć, dodaj do niej soli i zamiaszaj, wrzuć pierogi na około 10min czy tyle co na opakowaniu masz');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `recipes`
--
ALTER TABLE `recipes`
  MODIFY `ID` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
