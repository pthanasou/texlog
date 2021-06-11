-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Φιλοξενητής: localhost
-- Χρόνος δημιουργίας: 25 Σεπ 2014 στις 15:14:23
-- Έκδοση διακομιστή: 5.6.12-log
-- Έκδοση PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Βάση: `dbuniv`
--
CREATE DATABASE IF NOT EXISTS `dbuniv` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `dbuniv`;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `anafores`
--

CREATE TABLE IF NOT EXISTS `anafores` (
  `id_anaforas` int(11) NOT NULL AUTO_INCREMENT,
  `perigrafi` varchar(3000) NOT NULL,
  `apantisi` varchar(3000) NOT NULL,
  `x` varchar(50) NOT NULL,
  `y` varchar(50) NOT NULL,
  `xronos_anathesis` date NOT NULL,
  `xronos_epilisis` date NOT NULL,
  `epilisis` int(1) NOT NULL,
  `photo1` varchar(200) NOT NULL,
  `photo2` varchar(200) NOT NULL,
  `photo3` varchar(200) NOT NULL,
  `photo4` varchar(200) NOT NULL,
  `katigoria` varchar(100) NOT NULL,
  `email_user` varchar(100) NOT NULL,
  `email_admin` varchar(100) NOT NULL,
  PRIMARY KEY (`id_anaforas`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Άδειασμα δεδομένων του πίνακα `anafores`
--

INSERT INTO `anafores` (`id_anaforas`, `perigrafi`, `apantisi`, `x`, `y`, `xronos_anathesis`, `xronos_epilisis`, `epilisis`, `photo1`, `photo2`, `photo3`, `photo4`, `katigoria`, `email_user`, `email_admin`) VALUES
(4, 'test', 'werwer', '21.765964508231264', '38.26221530213073', '2014-09-25', '2014-09-25', 1, '4492e1.jpg', '', '', '', 'Δρόμος', 'a@upatras.gr', 'a@upatras.gr'),
(5, 'kjljklkj', '', '21.740515709097963', '38.245432516429354', '2014-09-25', '0000-00-00', 0, '190533.jpg', '', '', '', 'Δρόμος', 'a@upatras.gr', '');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `katigories`
--

CREATE TABLE IF NOT EXISTS `katigories` (
  `katigoria` varchar(100) NOT NULL,
  PRIMARY KEY (`katigoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `katigories`
--

INSERT INTO `katigories` (`katigoria`) VALUES
('Αίθουσα'),
('Γραφεία'),
('Δρόμος'),
('Εργαστήριο'),
('Καθαριότητα');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `onoma` varchar(200) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `typos_xristi` varchar(10) NOT NULL,
  PRIMARY KEY (`email`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `users`
--

INSERT INTO `users` (`email`, `password`, `onoma`, `phone`, `typos_xristi`) VALUES
('a@upatras.gr', 'aaaa', 'admin', '43223423', 'admin'),
('b@upatras.gr', '3333', 'user', '237287', 'user'),
('c@upatras.gr', '1234', 'dsh', 'lwekrj', 'user');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
