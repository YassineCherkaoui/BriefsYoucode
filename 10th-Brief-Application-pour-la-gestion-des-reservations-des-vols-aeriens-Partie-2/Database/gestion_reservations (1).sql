-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2020 at 02:01 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gestion_reservations`
--

-- --------------------------------------------------------

--
-- Table structure for table `passager`
--

CREATE TABLE `passager` (
  `id` int(11) NOT NULL,
  `nom` varchar(254) DEFAULT NULL,
  `prenom` varchar(254) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `pays` varchar(254) DEFAULT NULL,
  `adresse` varchar(254) DEFAULT NULL,
  `tele` int(11) DEFAULT NULL,
  `email` varchar(254) DEFAULT NULL,
  `num_passport` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `passager`
--

INSERT INTO `passager` (`id`, `nom`, `prenom`, `age`, `pays`, `adresse`, `tele`, `email`, `num_passport`) VALUES
(71, 'a', 'a', 1, 'a', 'a', 212, 'a@a.a', 12345678),
(70, 'a', 'a', 1, 'a', 'a', 212, 'a@a.a', 12345678),
(76, 'cherkaoui', 'ya', 17, 'Morocco', '31,Agadir', 621114160, 'yassin.che@gmail.com', 4123223),
(75, 'yassin', 'ch', 20, 'Mo', '31 agadir', 62111, 'yassine.money2019@hotmail.com', 86754675),
(74, 'fdsffsdfsd', 'dsfs', 2, 'Morocco', 'N 31 Rue IDOUCHAINANE', 2, 'bz18oo9@themail3.net', 2);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `vol_id` int(11) DEFAULT NULL,
  `passager_id` int(11) DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `date_reservation` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `vol_id`, `passager_id`, `id_user`, `date_reservation`) VALUES
(86, 12, 64, 9, '2020-05-27 10:30:26'),
(85, 17, 63, 9, '2020-05-26 22:42:45'),
(87, 14, 65, 9, '2020-05-29 09:44:42'),
(95, 12, 76, 16, '2020-05-31 17:08:15'),
(94, 12, 75, 13, '2020-05-31 14:12:12');

--
-- Triggers `reservation`
--
DELIMITER $$
CREATE TRIGGER `decrementer` AFTER INSERT ON `reservation` FOR EACH ROW BEGIN
 DECLARE SELECTED INT;
   set SELECTED=NEW.vol_id;
    UPDATE vols
        SET num_place=num_place - 1
        WHERE id = SELECTED;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `statut` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nom`, `prenom`, `email`, `password`, `statut`) VALUES
(1, 'Yassine', 'cherkaoui', 'admin@gmail.com', 'admin', 'Admin'),
(16, 'yassin', 'ch', 'yassin@gmail.com', 'yassin', 'User'),
(13, 'testt', 'test', 'test@gmail.com', 'test', 'User'),
(15, 'test2', 'test2', 'test2@gmail.com', 'test2', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `vols`
--

CREATE TABLE `vols` (
  `id` int(11) NOT NULL,
  `depart` varchar(254) DEFAULT NULL,
  `destination` varchar(254) DEFAULT NULL,
  `date_depart` timestamp NULL DEFAULT NULL,
  `num_place` int(11) DEFAULT NULL,
  `prix` int(11) DEFAULT NULL,
  `statut` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vols`
--

INSERT INTO `vols` (`id`, `depart`, `destination`, `date_depart`, `num_place`, `prix`, `statut`) VALUES
(13, 'Marrakech', 'Paris', '2020-05-26 06:15:00', 300, 5000, 'Valide'),
(12, 'Agadir', 'Paris', '2020-05-26 11:45:00', 192, 3000, 'valide'),
(14, 'Agadir', 'Londres', '2020-05-26 20:45:00', 247, 4000, 'Unvalide'),
(15, 'Marrakech', 'Londres', '2020-05-26 11:30:00', 150, 3000, 'valide'),
(28, 'Agadir', 'Tanger', '2020-05-15 21:32:00', 31, 1000, 'Valide'),
(27, 'Agadir', 'Safi', '2020-05-31 20:52:00', 31, 1000, 'UnValide'),
(29, 'Agadir', 'Tiznit', '2020-05-30 17:56:00', 31, 1000, 'UnValide'),
(30, 'Agadir', 'Rabat', '2020-05-30 22:13:00', 23, 2999, 'Valide');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `passager`
--
ALTER TABLE `passager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Association_1` (`vol_id`),
  ADD KEY `FK_Association_2` (`passager_id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `vols`
--
ALTER TABLE `vols`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `passager`
--
ALTER TABLE `passager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `vols`
--
ALTER TABLE `vols`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
