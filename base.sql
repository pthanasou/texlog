
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Βάση: `base`
--
CREATE DATABASE IF NOT EXISTS `base` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `base`;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `anafores`
--

CREATE TABLE IF NOT EXISTS `anafores` (
  `id_anaforas` int(11) NOT NULL AUTO_INCREMENT,
  `perigrafi` varchar(3000) NOT NULL,
  `apantisi` varchar(3000) NOT NULL,
  `lat` float(30,10) NOT NULL,
  `lng` float(30,10) NOT NULL,
  `mera_anathesis` date NOT NULL,
  `mera_epilisis` date NOT NULL,
  `photo1` varchar(200) NOT NULL,
  `photo2` varchar(200) NOT NULL,
  `photo3` varchar(200) NOT NULL,
  `photo4` varchar(200) NOT NULL,
  `katigoria` varchar(100) NOT NULL,
  `email_user` varchar(100) NOT NULL,
  `email_admin` varchar(100) NOT NULL,
  PRIMARY KEY (`id_anaforas`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Άδειασμα δεδομένων του πίνακα `anafores`
--

INSERT INTO `anafores` (`id_anaforas`, `perigrafi`, `apantisi`, `lat`, `lng`, `mera_anathesis`, `mera_epilisis`, `photo1`, `photo2`, `photo3`, `photo4`, `katigoria`, `email_user`, `email_admin`) VALUES
(6, 'test', '', 21.7511062622, 38.2414169312, '2016-01-20', '0000-00-00', '783_746kastro.jpg', '', '', '', 'Διασκέδαση', 'admin@admin.gr', '');

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
('Διασκέδαση'),
('Ιστορία'),
('Υπηρεσίες');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `paragontes`
--

CREATE TABLE IF NOT EXISTS `paragontes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `typos` varchar(100) NOT NULL,
  `x` float(20,10) NOT NULL,
  `y` float(20,10) NOT NULL,
  `measure` float(20,10) NOT NULL,
  `entos` varchar(100) NOT NULL,
  `perigrafi` varchar(3000) NOT NULL,
  `titlos` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Άδειασμα δεδομένων του πίνακα `paragontes`
--

INSERT INTO `paragontes` (`id`, `typos`, `x`, `y`, `measure`, `entos`, `perigrafi`, `titlos`) VALUES
(4, 'Ακτινικός', 21.7445621490, 38.2368850708, 34.0000000000, 'Θετικός', 'ερς', 'τεστ1');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `theseis`
--

CREATE TABLE IF NOT EXISTS `theseis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(1000) NOT NULL,
  `x` float(20,10) NOT NULL,
  `y` float(20,10) NOT NULL,
  `perigrafi` varchar(3000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `theseis_paragontes`
--

CREATE TABLE IF NOT EXISTS `theseis_paragontes` (
  `id_paragontas` int(11) NOT NULL,
  `id_thesi` int(11) NOT NULL,
  PRIMARY KEY (`id_paragontas`,`id_thesi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `onoma` varchar(200) NOT NULL,
  `til` varchar(30) NOT NULL,
  `typos` varchar(100) NOT NULL,
  PRIMARY KEY (`email`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `users`
--

INSERT INTO `users` (`email`, `password`, `onoma`, `til`, `typos`) VALUES
('admin@admin.gr', 'admin', 'Admin Admin', '1111234234', 'admin'),
('user@user.gr', 'user', 'Ανδρέου Κώστας', '2102312321', 'user');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
