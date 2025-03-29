-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mar 19, 2025 alle 10:58
-- Versione del server: 10.4.32-MariaDB
-- Versione PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbecogreenu`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `tblpaymentmethods`
--

CREATE TABLE `tblpaymentmethods` (
  `idPaymentMethod` int(11) NOT NULL,
  `name` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `tblpaymentmethods`
--

INSERT INTO `tblpaymentmethods` (`idPaymentMethod`, `name`) VALUES
(1, 'Bank transfer'),
(2, 'VISA'),
(3, 'MasterCard'),
(4, 'Debit card');

-- --------------------------------------------------------

--
-- Struttura della tabella `tblpayments`
--

CREATE TABLE `tblpayments` (
  `idPayment` int(11) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `description` char(150) DEFAULT NULL,
  `emission` datetime NOT NULL,
  `paymentMethod` int(11) NOT NULL,
  `public` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `tblprojects`
--

CREATE TABLE `tblprojects` (
  `idProject` int(11) NOT NULL,
  `img` char(100) NOT NULL,
  `title` char(30) NOT NULL,
  `description` char(250) NOT NULL,
  `fundraiser` int(11) NOT NULL,
  `targetAmount` decimal(10,0) NOT NULL,
  `deadline` datetime NOT NULL,
  `status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `tblprojects`
--

INSERT INTO `tblprojects` (`idProject`, `img`, `title`, `description`, `fundraiser`, `targetAmount`, `deadline`, `status`) VALUES
(1, 'img_1.jpg', 'Forest Restoration Initiative', 'Reforestation project to restore degraded areas and promote biodiversity.', 1, 50000, '2025-12-31 23:59:59', '0');

-- --------------------------------------------------------

--
-- Struttura della tabella `tblusers`
--

CREATE TABLE `tblusers` (
  `idUser` int(11) NOT NULL,
  `name` char(50) NOT NULL,
  `surname` char(50) NOT NULL,
  `email` char(255) NOT NULL,
  `phoneNumber` char(20) DEFAULT NULL,
  `passwordHash` char(128) NOT NULL,
  `profilePicPath` char(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `tblusers`
--

INSERT INTO `tblusers` (`idUser`, `name`, `surname`, `email`, `phoneNumber`, `passwordHash`, `profilePicPath`) VALUES
(1, 'Mario', 'Rossi', 'mario.rossi@example.com', '+39 347 2345678', '$2y$10$gf1Xwk8FlL3S9xKn18hs..u3G7jDljXcXAoi9r1AbYABweqPTT3OK', NULL);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `tblpaymentmethods`
--
ALTER TABLE `tblpaymentmethods`
  ADD PRIMARY KEY (`idPaymentMethod`);

--
-- Indici per le tabelle `tblpayments`
--
ALTER TABLE `tblpayments`
  ADD PRIMARY KEY (`idPayment`),
  ADD KEY `paymentMethod` (`paymentMethod`);

--
-- Indici per le tabelle `tblprojects`
--
ALTER TABLE `tblprojects`
  ADD KEY `fundraiser` (`fundraiser`);

--
-- Indici per le tabelle `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `tblpaymentmethods`
--
ALTER TABLE `tblpaymentmethods`
  MODIFY `idPaymentMethod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT per la tabella `tblpayments`
--
ALTER TABLE `tblpayments`
  MODIFY `idPayment` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `tblpayments`
--
ALTER TABLE `tblpayments`
  ADD CONSTRAINT `tblpayments_ibfk_1` FOREIGN KEY (`paymentMethod`) REFERENCES `tblpaymentmethods` (`idPaymentMethod`);

--
-- Limiti per la tabella `tblprojects`
--
ALTER TABLE `tblprojects`
  ADD CONSTRAINT `tblprojects_ibfk_1` FOREIGN KEY (`fundraiser`) REFERENCES `tblusers` (`idUser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
