-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  jeu. 26 août 2021 à 21:52
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `aen`
--

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE `product` (
  `ref` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `manufacturer` varchar(255) NOT NULL,
  `provider` varchar(255) NOT NULL,
  `labor` int(11) NOT NULL,
  `loss` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`ref`, `name`, `price`, `manufacturer`, `provider`, `labor`, `loss`) VALUES
('1234ABC', 'Serrure', 25, 'Vachette', '123Serrure', 20, 10),
('12358AB', 'Porte', 275, 'Tryba', '123Serrure', 50, 20);

-- --------------------------------------------------------

--
-- Structure de la table `receipt`
--

CREATE TABLE `receipt` (
  `id` int(11) NOT NULL,
  `emitter` varchar(255) NOT NULL,
  `recepter` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `receipt`
--

INSERT INTO `receipt` (`id`, `emitter`, `recepter`, `date`) VALUES
(1, 'LEP', 'Vinci', '2021-08-10');

-- --------------------------------------------------------

--
-- Structure de la table `receiptlink`
--

CREATE TABLE `receiptlink` (
  `id` int(11) NOT NULL,
  `receipt` varchar(255) NOT NULL,
  `product` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `rank` int(11) NOT NULL DEFAULT '1',
  `address` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `birthdate` varchar(20) DEFAULT NULL,
  `registerdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `firstname`, `lastname`, `rank`, `address`, `zipcode`, `country`, `birthdate`, `registerdate`) VALUES
(12, 'mat@lin.fr', '1c7b1d7ff4a4a0da601f0b464f1ad9c47b2055fd', 'Matthieu', 'Linel', 1, 'Allee bessie smith', '93100', 'Japon', '27/10/1999', '2021-08-26 22:09:34'),
(11, 'test@test.fr', '16f31eed9ae8e9f8425368538834a7bdbabc890b', 'azeazeraz', 'aze', 1, '2 oiezoief', '30218', 'France', '20/02/2000', '2021-08-26 21:58:02'),
(13, 'Qu@th', '4c38d8705ff98c8c1e89b6694b128122f63ee084', 'Thierry', 'Quentin', 1, '2 rue Michel', '93100', 'usa', '22/01/1970', '2021-08-26 23:12:41'),
(14, 'aaaa@kkkkk.com', '52036e5a96b401419e3b870bb3859828b111afd2', 'Moyse', 'Alexis', 1, '3 rue des potiers', '92165', 'Turquie', '29/08/19', '2021-08-26 23:16:50');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `receiptlink`
--
ALTER TABLE `receiptlink`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `receiptlink`
--
ALTER TABLE `receiptlink`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
