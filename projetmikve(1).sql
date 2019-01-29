-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 17 jan. 2019 à 12:19
-- Version du serveur :  10.1.36-MariaDB
-- Version de PHP :  7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projetmikve`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(150) NOT NULL,
  `article` text NOT NULL,
  `date` datetime NOT NULL,
  `pages_id` int(10) UNSIGNED NOT NULL,
  `users_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `comment` text NOT NULL,
  `date` datetime NOT NULL,
  `mikves_id` int(10) UNSIGNED NOT NULL,
  `users_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `date`, `mikves_id`, `users_id`) VALUES
(1, 'Super j\'adore le Python', '2018-11-17 11:00:00', 1, 1),
(2, 'Ok c\'est très bien alors', '2018-11-18 13:00:00', 2, 2),
(3, 'Test', '2018-11-19 14:49:29', 3, 3),
(4, 'aaaaa', '2018-11-19 14:49:46', 1, 4),
(5, 'testttt', '2018-11-19 14:50:33', 2, 1),
(6, 'aaa', '2018-11-19 14:51:19', 3, 3),
(9, 'test\r\nzzzz\r\nzzzz', '2018-11-19 14:53:14', 1, 4),
(10, 'salut<br />\r\nzzzz<br />\r\neeee<br />\r\nttt', '2018-11-19 14:54:37', 2, 1),
(11, 'ee<br />\r\nee', '2018-11-20 14:21:56', 3, 2);

-- --------------------------------------------------------

--
-- Structure de la table `equipements`
--

CREATE TABLE `equipements` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `equipements`
--

INSERT INTO `equipements` (`id`, `name`) VALUES
(1, 'eau chaude'),
(2, 'serviette'),
(3, 'baignoire'),
(4, 'sèche-cheveux'),
(5, 'mikvé kallah');

-- --------------------------------------------------------

--
-- Structure de la table `medias`
--

CREATE TABLE `medias` (
  `id` int(10) UNSIGNED NOT NULL,
  `path` varchar(150) NOT NULL,
  `alt` varchar(250) NOT NULL,
  `tables_id` int(10) UNSIGNED DEFAULT NULL,
  `types_id` int(10) UNSIGNED DEFAULT NULL,
  `pages_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `medias`
--

INSERT INTO `medias` (`id`, `path`, `alt`, `tables_id`, `types_id`, `pages_id`) VALUES
(1, 'a.jpg', 'photo intérieur mikvé', 1, 3, 3),
(2, 'b.jpg', 'photo extérieur mikvé', 1, 3, 3),
(3, 'c.jpg', 'photo couloir', 1, 3, 3),
(4, 'd.jpg', 'photo entrée', 1, 2, 3),
(5, 'e.jpg', 'photo soins', 1, 2, 3);

-- --------------------------------------------------------

--
-- Structure de la table `mikveequipements`
--

CREATE TABLE `mikveequipements` (
  `id` int(10) UNSIGNED NOT NULL,
  `mikves_id` int(10) UNSIGNED NOT NULL,
  `equipements_id` int(10) UNSIGNED NOT NULL,
  `price` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `mikveequipements`
--

INSERT INTO `mikveequipements` (`id`, `mikves_id`, `equipements_id`, `price`) VALUES
(1, 1, 1, '15nis'),
(2, 1, 2, '20nis'),
(3, 1, 4, '30nis'),
(4, 2, 3, '10nis'),
(5, 2, 5, '99nis'),
(6, 3, 1, '2nis'),
(7, 3, 3, '100nis'),
(8, 3, 2, '30nis');

-- --------------------------------------------------------

--
-- Structure de la table `mikves`
--

CREATE TABLE `mikves` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(150) NOT NULL,
  `address` varchar(150) NOT NULL,
  `phoneNumber` int(100) DEFAULT NULL,
  `openningTimes` varchar(150) DEFAULT NULL,
  `couv_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `mikves`
--

INSERT INTO `mikves` (`id`, `name`, `address`, `phoneNumber`, `openningTimes`, `couv_id`) VALUES
(1, 'Yémé Hanna', '32 rehov harav Istshak Nissim, Betar Illit, ISRAEL', 139932031, 'Du lundi au jeudi: 10:00 - 20:00\r\nVendredi: 10:00 - 21:00\r\nSamedi: 09:00 - 20:00', 1),
(2, 'PureInstitute', '89 rehov Harav Chakh, Guivat Chaoul, ISRAEL', 626306753, 'Du lundi au jeudi: 10:00 - 20:00\r\nVendredi: 10:00 - 21:00\r\nSamedi: 09:00 - 20:00', 2),
(3, 'Beer Myriam', '10 rehov Nissim Azran, Har Homa, ISRAEL', 1505451452, 'Du lundi au jeudi: 10:00 - 20:00\r\nVendredi: 10:00 - 21:00\r\nSamedi: 09:00 - 20:00', 3);

-- --------------------------------------------------------

--
-- Structure de la table `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(150) NOT NULL,
  `url` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `pages`
--

INSERT INTO `pages` (`id`, `name`, `url`) VALUES
(1, 'index.php', 'http://localhost/DeveloppersInstitute/Projet-Mikve-2019/index.php'),
(2, 'listMikves.php', 'http://localhost/DeveloppersInstitute/Projet-Mikve-2019/listMikves.php'),
(3, 'mikve.php', 'http://localhost/DeveloppersInstitute/Projet-Mikve-2019/mikve.php');

-- --------------------------------------------------------

--
-- Structure de la table `rights`
--

CREATE TABLE `rights` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `rights`
--

INSERT INTO `rights` (`id`, `name`) VALUES
(1, 'Administrateur'),
(2, 'Éditeur'),
(3, 'Utilisateur');

-- --------------------------------------------------------

--
-- Structure de la table `tables`
--

CREATE TABLE `tables` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tables`
--

INSERT INTO `tables` (`id`, `name`) VALUES
(1, 'mikves'),
(2, 'equipements'),
(3, 'mikveequipements'),
(4, 'medias'),
(5, 'pages'),
(6, 'users'),
(7, 'rights'),
(8, 'comments'),
(9, 'articles');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstname` varchar(150) NOT NULL,
  `lastname` varchar(150) NOT NULL,
  `login` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `profil_pic` varchar(150) NOT NULL,
  `rights_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `login`, `password`, `profil_pic`, `rights_id`) VALUES
(1, 'Anaëlle', 'Amar', 'anaelle@gmail.com', 'anaelle', 'anaelle.png', 1),
(2, 'Daniel', 'Amar', 'daniel@gmail.com', 'daniel', 'daniel.jpg', 2),
(3, 'Adrien', 'Rebibo', 'adrien@gmail.com', 'adrien', 'user_1.png', 3),
(4, 'Rudy', 'Hadida', 'rudy@gmail.com', 'rudy', 'user_2.png', 3);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pages_id` (`pages_id`),
  ADD KEY `users_id` (`users_id`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mikves_id` (`mikves_id`),
  ADD KEY `users_id` (`users_id`);

--
-- Index pour la table `equipements`
--
ALTER TABLE `equipements`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `medias`
--
ALTER TABLE `medias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pages_id` (`pages_id`),
  ADD KEY `tables_id` (`tables_id`);

--
-- Index pour la table `mikveequipements`
--
ALTER TABLE `mikveequipements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mikves_id` (`mikves_id`),
  ADD KEY `equipements_id` (`equipements_id`);

--
-- Index pour la table `mikves`
--
ALTER TABLE `mikves`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `rights`
--
ALTER TABLE `rights`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rights_id` (`rights_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `equipements`
--
ALTER TABLE `equipements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `medias`
--
ALTER TABLE `medias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `mikveequipements`
--
ALTER TABLE `mikveequipements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `mikves`
--
ALTER TABLE `mikves`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `rights`
--
ALTER TABLE `rights`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `tables`
--
ALTER TABLE `tables`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`pages_id`) REFERENCES `pages` (`id`),
  ADD CONSTRAINT `articles_ibfk_2` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`mikves_id`) REFERENCES `mikves` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `medias`
--
ALTER TABLE `medias`
  ADD CONSTRAINT `medias_ibfk_1` FOREIGN KEY (`pages_id`) REFERENCES `pages` (`id`),
  ADD CONSTRAINT `medias_ibfk_2` FOREIGN KEY (`tables_id`) REFERENCES `tables` (`id`);

--
-- Contraintes pour la table `mikveequipements`
--
ALTER TABLE `mikveequipements`
  ADD CONSTRAINT `mikveequipements_ibfk_1` FOREIGN KEY (`mikves_id`) REFERENCES `mikves` (`id`),
  ADD CONSTRAINT `mikveequipements_ibfk_2` FOREIGN KEY (`equipements_id`) REFERENCES `equipements` (`id`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`rights_id`) REFERENCES `rights` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
