-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mar 01, 2024 alle 11:43
-- Versione del server: 10.4.32-MariaDB
-- Versione PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cista`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `cast`
--

CREATE TABLE `cast` (
  `id` int(11) NOT NULL,
  `nome` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `cast`
--

INSERT INTO `cast` (`id`, `nome`) VALUES
(2, 'suca2'),
(3, 'aaaaaaa'),
(4, 'swag'),
(5, 'alessandro'),
(6, 'cunfupanda');

-- --------------------------------------------------------

--
-- Struttura della tabella `dbmsutenti`
--

CREATE TABLE `dbmsutenti` (
  `nome` varchar(16) NOT NULL,
  `password` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dump dei dati per la tabella `dbmsutenti`
--

INSERT INTO `dbmsutenti` (`nome`, `password`) VALUES
('matteo', 'matteo');

-- --------------------------------------------------------

--
-- Struttura della tabella `film`
--

CREATE TABLE `film` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `film`
--

INSERT INTO `film` (`id`, `nome`) VALUES
(1, '0'),
(2, '0'),
(3, 'ader');

-- --------------------------------------------------------

--
-- Struttura della tabella `partecipazione`
--

CREATE TABLE `partecipazione` (
  `codice` int(11) NOT NULL,
  `film` int(11) NOT NULL,
  `attore` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dump dei dati per la tabella `partecipazione`
--

INSERT INTO `partecipazione` (`codice`, `film`, `attore`) VALUES
(1, 3, 5);

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE `utente` (
  `id` int(11) NOT NULL,
  `nome` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `utente`
--

INSERT INTO `utente` (`id`, `nome`) VALUES
(1, 'utente1');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `cast`
--
ALTER TABLE `cast`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `partecipazione`
--
ALTER TABLE `partecipazione`
  ADD PRIMARY KEY (`codice`),
  ADD KEY `1` (`attore`),
  ADD KEY `2` (`film`);

--
-- Indici per le tabelle `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `cast`
--
ALTER TABLE `cast`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT per la tabella `film`
--
ALTER TABLE `film`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `partecipazione`
--
ALTER TABLE `partecipazione`
  MODIFY `codice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la tabella `utente`
--
ALTER TABLE `utente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `partecipazione`
--
ALTER TABLE `partecipazione`
  ADD CONSTRAINT `1` FOREIGN KEY (`attore`) REFERENCES `cast` (`id`),
  ADD CONSTRAINT `partecipazione_ibfk_1` FOREIGN KEY (`film`) REFERENCES `film` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
