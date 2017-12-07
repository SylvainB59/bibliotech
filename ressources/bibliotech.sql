-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 07 Décembre 2017 à 11:55
-- Version du serveur :  5.7.20-0ubuntu0.16.04.1
-- Version de PHP :  7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bibliotech`
--

-- --------------------------------------------------------

--
-- Structure de la table `books`
--

CREATE TABLE `books` (
  `id` int(10) UNSIGNED NOT NULL,
  `typeId` tinyint(1) UNSIGNED NOT NULL,
  `author` varchar(100) NOT NULL,
  `title` varchar(255) NOT NULL,
  `publicationDate` smallint(4) NOT NULL,
  `summary` text NOT NULL,
  `borrowBy` varchar(50) DEFAULT NULL,
  `stock` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `books`
--

INSERT INTO `books` (`id`, `typeId`, `author`, `title`, `publicationDate`, `summary`, `borrowBy`, `stock`) VALUES
(1, 1, 'Max Brooks', 'Guide de survie en territoire zombie', 2010, 'Plus question de se demander pourquoi ni comment les zombies ont débarqué, il faut survivre. Et si les règles pour leur résister étaient dans ce détournement en règle de tous les guides de survie ? Exemple : les zombies ignorent la peur, faites de même,coupez-leur la tête, mais utilisez la vôtre.Un best-seller du fantastique.', '123456', 0),
(2, 2, 'Robert Goddard', 'Le Secret d\'Edwin Strafford', 2014, '1977. Martin Radford, jeune historien londonien, arrive sur l’île de Madère. Il y rencontre Leo Sellick, qui habite l’ancienne propriété de Edwin Strafford, mort en 1951. En 1908, Strafford a été ministre de l’Intérieur aux côtés de Lloyd George et de Churchill, avant de démissionner brutalement en 1910. Le manuscrit de ses mémoires, retrouvé dans la villa, devrait pouvoir expliquer cette mystérieuse rupture, mais la lecture qu’en fait Martin pose de nouvelles questions. En particulier sur le rôle d’Elizabeth, une suffragette avec qui Strafford a vécu une histoire d’amour passionnée. Fasciné par les énigmes qui jalonnent le destin de cet homme, Martin décide d’éclaircir cette affaire. Il va bientôt comprendre que beaucoup ont intérêt à ce que le voile ne se lève jamais sur le secret d’Edwin Strafford…', NULL, 1),
(3, 3, 'Alice Zeniter', 'L\'art de perdre', 2017, ' L’Algérie dont est originaire sa famille n’a longtemps été pour Naïma qu’une toile de fond sans grand intérêt. Pourtant, dans une société française traversée par les questions identitaires, tout semble vouloir la renvoyer à ses origines. Mais quel lien pourrait-elle avoir avec une histoire familiale qui jamais ne lui a été racontée ?\r\nSon grand-père Ali, un montagnard kabyle, est mort avant qu’elle ait pu lui demander pourquoi l’Histoire avait fait de lui un « harki ».\r\nYema, sa grand-mère, pourrait peut-être répondre mais pas dans une langue que Naïma comprenne.\r\nQuant à Hamid, son père, arrivé en France à l’été 1962 dans les camps de transit hâtivement mis en place, il ne parle plus depuis longtemps de l’Algérie de son enfance.\r\nComment faire ressurgir un pays du silence ?', NULL, 1),
(4, 2, 'Christian Jacq', 'Urgence absolue', 2017, 'La Machine règne sur le monde. Créée par les humains eux-mêmes, elle les contrôle dans tous les domaines.   Qui la dirige ? Personne. Elle s’autoalimente, réduisant, au nom du progrès, tous les espaces de liberté. Spirale infernale de l’intelligence artificielle.   Seule une poignée d’alchimistes, héritiers de la sagesse des anciens d’Égypte, ont osé l’affronter. La Machine les a éliminés les uns après les autres. Tous, sauf un : John Patmos, le gardien d’un temple perdu dans une oasis égyptienne qui, sous la menace, a pris la fuite.   Unique soldat d’une armée réduite à lui-même, Patmos est le seul, avec ses pouvoirs de chaman, à pouvoir terrasser la Machine.   Pour le journaliste écossais Bruce Reuchlin, une urgence absolue : retrouver celui qui représente le dernier espoir de l’humanité.   De la Sibérie à New York, une terrifiante course contre la montre.', NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `types`
--

CREATE TABLE `types` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `typeName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `types`
--

INSERT INTO `types` (`id`, `typeName`) VALUES
(1, 'fantastique'),
(2, 'polar'),
(3, 'roman');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `idNumber` int(10) UNSIGNED NOT NULL,
  `idBookBorrow` int(10) UNSIGNED DEFAULT NULL,
  `returnDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `lastName`, `firstName`, `idNumber`, `idBookBorrow`, `returnDate`) VALUES
(1, 'robert', 'jean', 123456, 1, NULL);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `types`
--
ALTER TABLE `types`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
