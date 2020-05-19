-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 19 mai 2020 à 11:31
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;




-- --------------------------------------------------------

--
-- Structure de la table `albums`
--

DROP TABLE IF EXISTS `albums`;
CREATE TABLE IF NOT EXISTS `albums` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `artist_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `artist_id` (`artist_id`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `albums`
--

INSERT INTO `albums` (`id`, `name`, `year`, `artist_id`) VALUES
(1, 'Lucky Jim', 1993, 6),
(5, 'Fire of love', 1981, 6),
(8, 'The Doors', 1967, 15),
(10, 'The Stooges', 1969, 3),
(13, 'Funhouse', 1970, 3),
(42, 'Brothers In Arms', 1985, 42),
(49, 'Dire Straits', 1978, 42),
(69, 'Doolittle', 1989, 54),
(72, '	Lady Marlène', 1982, 68),
(75, 'Xscape', 2014, 59);

-- --------------------------------------------------------

--
-- Structure de la table `artists`
--

DROP TABLE IF EXISTS `artists`;
CREATE TABLE IF NOT EXISTS `artists` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `biography` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `label_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `label_id` (`label_id`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `artists`
--

INSERT INTO `artists` (`id`, `name`, `biography`, `image`, `label_id`) VALUES
(3, 'The Stooges', 'stooges', '', 2),
(6, 'The Gun Club', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi vel erat non mauris convallis vehicula. Nulla et sapien.', '', 2),
(15, 'The Doors', 'Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor.', '15.jpg', 2),
(33, 'Pink Floyd', 'Integer quis metus vitae elit lobortis egestas. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', '33.jpg', 2),
(42, 'Dire Straits', 'stooges', '', NULL),
(54, 'Pixies', 'Praesent blandit odio eu enim.', '', 2),
(57, 'David Bowie', '   David Robert Jones dit David Bowie [ˈdeɪvɪd ˈbəʊi] est un auteur-compositeur-interprète et acteur anglais né le 8 janvier 1947 à Londres     ', '', NULL),
(58, 'madonna', 'Madonna, née Madonna Louise Ciccone le 16 août 1958 à Bay City dans le Michigan, est une chanteuse, danseuse, actrice, réalisatrice et femme d\'affaires .        ', '58.jpeg', 2),
(59, 'Michael Jackson', '        Michael Jackson [ˈmaɪkəl ˈd͡ʒæksən], né le 29 août 1958 à Gary (Indiana) et mort le 25 juin 2009 à Los Angeles (Californie),', '59.jpg', 2),
(60, 'Bob Dylan', 'Bob Dylan [bɑb ˈdɪlən], né Robert Allen Zimmerman le 24 mai 1941 à Duluth, dans le Minnesota, est un auteur-compositeur-interprète, musicien, peintre, sculpteur et poète américain. Il est l\'une des figures majeures de la musique populaire occidentale', '60.png', 2),
(62, 'Christophe', '      Christophe, nom de scène de Daniel Bevilacqua, né le 13 octobre 1945 à Juvisy-sur-Orge et mort le 16 avril 2020 à Brest, est un auteur-compositeur, chanteur  ', '', 2),
(63, 'test_1', '       ghg,hfjh         ', NULL, 7),
(68, 'Daniel Balavoine', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.', '68.png', 15),
(69, 'Elton Hercules John', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.', '69.png', 8),
(71, 'Céline Dion', ' née le 30 mars 1968 à Charlemagne, au Québec, est une chanteuse canadienne. Dernière d\'une famille de quatorze enfants', '71.png', 15);

-- --------------------------------------------------------

--
-- Structure de la table `artists_labels`
--

DROP TABLE IF EXISTS `artists_labels`;
CREATE TABLE IF NOT EXISTS `artists_labels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `artist_id` int(11) NOT NULL,
  `label_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `artists_labels_label_id` (`label_id`) USING BTREE,
  KEY `artists_labels_artist_id` (`artist_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `artists_labels`
--

INSERT INTO `artists_labels` (`id`, `artist_id`, `label_id`) VALUES
(2, 42, 2),
(3, 15, 9),
(4, 15, 3),
(5, 63, 9);

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `main_image` varchar(255) NOT NULL,
  `artist_id` int(11) NOT NULL,
  `src_image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `artist_id` (`artist_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `labels`
--

DROP TABLE IF EXISTS `labels`;
CREATE TABLE IF NOT EXISTS `labels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `labels`
--

INSERT INTO `labels` (`id`, `name`) VALUES
(2, 'Universal music'),
(3, 'PolyGram'),
(4, 'CBS Records'),
(5, 'BMG Entertainment \r\n'),
(6, 'Island Records'),
(7, 'Tréma'),
(8, 'Warner Electra Atlantic Records'),
(9, 'Roy Music'),
(10, 'Warner Electra Atlantic Records'),
(15, 'Adone'),
(18, 'Sony Music');

-- --------------------------------------------------------

--
-- Structure de la table `songs`
--

DROP TABLE IF EXISTS `songs`;
CREATE TABLE IF NOT EXISTS `songs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `artist_id` int(11) NOT NULL,
  `album_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `artist_id` (`artist_id`,`album_id`),
  KEY `songs_album_id` (`album_id`)
) ENGINE=InnoDB AUTO_INCREMENT=131 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `songs`
--

INSERT INTO `songs` (`id`, `title`, `artist_id`, `album_id`) VALUES
(1, 'I Wanna Be Your Dog', 3, 10),
(18, 'She\'s like Heroin to Me', 6, 5),
(24, 'Hey', 54, 69),
(25, 'No Fun', 3, 10),
(38, 'Money for Nothing', 42, 42),
(56, 'Break on Through (To the other side)', 15, 8),
(63, 'Gouge Away', 54, 69),
(76, 'Light My Fire', 15, 8),
(98, 'Sex Beat', 6, 5),
(122, 'Sultans of Swing', 42, 49),
(123, 'Mon fils ma bataille', 68, 72),
(130, 'Love Never Felt So Good', 59, 75);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lastname` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `albums`
--
ALTER TABLE `albums`
  ADD CONSTRAINT `albums_artist_id` FOREIGN KEY (`artist_id`) REFERENCES `artists` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `artists`
--
ALTER TABLE `artists`
  ADD CONSTRAINT `artists_label_id` FOREIGN KEY (`label_id`) REFERENCES `labels` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `artists_labels`
--
ALTER TABLE `artists_labels`
  ADD CONSTRAINT `artists_labels_artist_id` FOREIGN KEY (`artist_id`) REFERENCES `artists` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `artists_labels_label_id` FOREIGN KEY (`label_id`) REFERENCES `labels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_artist_id` FOREIGN KEY (`artist_id`) REFERENCES `artists` (`id`);

--
-- Contraintes pour la table `songs`
--
ALTER TABLE `songs`
  ADD CONSTRAINT `songs_album_id` FOREIGN KEY (`album_id`) REFERENCES `albums` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `songs_artist_id` FOREIGN KEY (`artist_id`) REFERENCES `artists` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
