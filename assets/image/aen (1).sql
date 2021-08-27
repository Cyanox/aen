-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 27 août 2021 à 19:39
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `aen`
--

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `ref` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `ht` int(11) NOT NULL,
  `tva` int(11) NOT NULL,
  `ttc` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`ref`, `name`, `description`, `ht`, `tva`, `ttc`) VALUES
('1234ABC', 'Serrure', '', 0, 0, 0),
('12358AB', 'Porte', '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `receipt`
--

DROP TABLE IF EXISTS `receipt`;
CREATE TABLE IF NOT EXISTS `receipt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `ht` int(11) NOT NULL,
  `tva` int(11) NOT NULL,
  `ttc` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `receipt`
--

INSERT INTO `receipt` (`id`, `userid`, `date`, `ht`, `tva`, `ttc`) VALUES
(2, 12, '27/08/2021', 5, 2, 7);

-- --------------------------------------------------------

--
-- Structure de la table `receiptlink`
--

DROP TABLE IF EXISTS `receiptlink`;
CREATE TABLE IF NOT EXISTS `receiptlink` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `receipt` varchar(255) NOT NULL,
  `product` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `rank` int(11) NOT NULL DEFAULT '1',
  `address` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `birthdate` varchar(20) DEFAULT NULL,
  `registerdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `firstname`, `lastname`, `rank`, `address`, `zipcode`, `country`, `birthdate`, `registerdate`) VALUES
(12, 'mat@lin.fr', '1c7b1d7ff4a4a0da601f0b464f1ad9c47b2055fd', 'Matthieu', 'Linel', 1, 'Allee bessie smith', '93100', 'Japon', '27/10/1999', '2021-08-26 22:09:34'),
(11, 'test@test.fr', '16f31eed9ae8e9f8425368538834a7bdbabc890b', 'azeazeraz', 'aze', 1, '2 oiezoief', '30218', 'France', '20/02/2000', '2021-08-26 21:58:02'),
(13, 'Qu@th', '4c38d8705ff98c8c1e89b6694b128122f63ee084', 'Thierry', 'Quentin', 1, '2 rue Michel', '93100', 'usa', '22/01/1970', '2021-08-26 23:12:41'),
(14, 'aaaa@kkkkk.com', '52036e5a96b401419e3b870bb3859828b111afd2', 'Moyse', 'Alexis', 0, '3 rue des potiers', '92165', 'Turquie', '29/08/19', '2021-08-26 23:16:50'),
(15, 'alexis.moyse@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Alexis', 'Moyse', 2, '17 rue de Pontault', '77330', 'France', '29/04/1999', '2021-08-26 23:54:48');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
