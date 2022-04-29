-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 19 avr. 2022 à 20:38
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mythologie`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id_cat` bigint(20) UNSIGNED NOT NULL,
  `nom_cat` text,
  `desc_cat` text,
  `illu_cat` text,
  PRIMARY KEY (`id_cat`),
  UNIQUE KEY `id_cat` (`id_cat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_cat`, `nom_cat`, `desc_cat`, `illu_cat`) VALUES
(1, 'Mythologie grecque', 'Pour les Grecs de l\'Antiquité, religion et mythologie étaient intimement liées. C\'est d\'ailleurs surtout par les mythes, tels que nous les rapportent Homère et les auteurs anciens, que les religions de la Grèce antique nous sont connues. Les dieux du panthéon grec, empruntés pour la plupart aux cultures des peuples conquis par les Grecs, ont une forme humaine et des personnalités très marquées, même si beaucoup nous sont mieux connus aujourd\'hui sous le nom que leur ont donné les Romains : Jupiter et Zeus, Mars et Arès ou Vénus et Aphrodite. Entre le moment de ses origines, en dehors de la Grèce, et jusqu\'à la rencontre avec le christianisme, l\'histoire de la religion grecque couvre une période d\'environ deux mille ans. La mythologie grecque présente plusieurs aspects : système d\'explication du monde, elle fait intervenir l\'épopée, où les héros, intermédiaires entre les dieux et les hommes, doivent sans cesse affirmer leur valeur ; liée à l\'histoire, elle permet aux Grecs d\'expliquer l\'origine de leurs cités.', 'mytho_grecque.png\r\n'),
(2, 'Mythologie romaine\r\n', 'La mythologie romaine est l’ensemble des mythes concernant les dieux de la religion romaine.\r\n\r\nLes premiers dieux romains étaient très différents des dieux grecs. Ils n\'avaient pas d\'histoire et leur nom se réduisait souvent à celui de la vertu qu\'ils incarnaient : Victoire, Abondance, etc... Les premiers dieux romains étaient ceux de la nature. Ce qui est important, pour les Romains, c\'est d\'obéir aux rites (la praxis) plus que d\'expliquer l\'origine des choses et de croire au niveau individuel. La religion a une grande place dans la vie des Romains, qui honorent les dieux car ils protègent leurs cités, et garantissent la prospérité de la famille et de la patrie.\r\n\r\nIl n\'y a pas de lieu ni d\'activité sans un dieu. Les Romains consultent leurs dieux avec des fêtes et des cérémonies.\r\n\r\nLa Pax deorum (paix avec les dieux) était impérative. Les Romains s\'inquiétaient ainsi d\'avoir attisé la colère des dieux quand ils étaient confrontés à des problématiques au sein de leur État.\r\n\r\nLa mythologie romaine reprend en grande partie les légendes de la mythologie grecque. La mythologie romaine a également été influencée à l’origine par les divinités de la mythologie étrusque, comme Mnerva qui est devenue Minerve ; et au fil du temps les Romains ont adopté des dieux d’autres origines, comme la déesse égyptienne Isis, ou le dieu perse Mithra qui était très honoré dans l’armée romaine.\r\n\r\nLa mythologie romaine décline au sein des croyances romaines à mesure que le christianisme prend son essor autour de la Méditerranée. Aujourd\'hui, on considère cette religion polythéiste comme éteinte, ce qui n\'empêche pas ces différentes figures de la mythologie d\'être souvent mentionnées dans des œuvres artistiques.', 'mytho_romaine.png'),
(3, 'Mythologie égyptienne', 'Il est généralement admis que les égyptiens de l’Antiquité étaient polythéistes. Les dieux égyptiens étaient la personnification des éléments naturels, des événements de la vie et des sentiments. Le panthéon égyptien fut l’un des plus imposants du monde. Pour eux, les dieux habitaient sur terre (dans les temples), et il fallait les honorer pour qu’ils continuent à y résider. Pour cela ils priaient, dansaient, chantaient et leur apportaient des offrandes de nourriture et d’objets précieux. Seul Akhénaton, connu sous le nom du pharaon hérétique, imposa, durant son court règne, la religion monothéiste du disque solaire Aton. Durant les cinq mille ans de l’histoire de l’Égypte pharaonique, la religion n’a que peu évolué. Cependant, selon les périodes, certains dieux sont devenus prédominants alors que d’autres passaient au second plan. De plus, chaque culte étant originaire d’une région différente, la place de chaque dieu variait aussi selon la région.\r\nLes dieux étaient des êtres à la fois invisibles (Amon) et visibles (Apis). Il est important de noter que les habitants des rives du Nil vénéraient les symboles qu’ils représentaient. Ainsi les Egyptiens se doutaient bien que la déesse de la maternité (Taouret) n’était pas réellement un être hybride, d’ailleurs les dieux étaient vénérés sous des noms donnés par les humains. Leurs vrais noms étaient connus de leurs personnes : Isis pouvait se vanter de connaître le nom secret du soleil, et d’avoir donc tous les pouvoirs sur sa personne !\r\n\r\nLes dieux, malgré l’aspect polythéiste (plus de sept-cent divinités), ne faisaient qu’un : tout simplement appelé Dieu... Le divin était à la fois multiple et Unique.\r\n\r\nSelon une théologie du Nouvel empire, tous les dieux ne sont que trois : Ptah, Amon et Rê.\r\n\r\n', 'mytho_egypt.png'),
(4, 'Mythologie nordique', 'La mythologie nordique est l\'ensemble des mythes provenant d\'Europe du Nord (plus particulièrement de la Scandinavie) à la base du système religieux polythéiste pratiqué dans ces régions au haut Moyen Âge avant leur christianisation. Il s\'agit d\'une variante régionale et historique de la plus vaste mythologie germanique, qui fait elle-même partie de la mythologie conjecturelle indo-européenne dont d\'autres variantes sont la mythologie grecque ou encore la mythologie perse, et qui a donné lieu à de nombreuses spéculations pseudo-historiques. Comme les autres, la mythologie nordique met en scène un nombre important de divinités, de créatures fabuleuses et de héros.\r\n\r\nPendant des siècles, les mythes nordiques étaient transmis oralement, notamment par la poésie scaldique qui éleva la narration d\'épopées mythologiques en une expression artistique. Un certain nombre de ces poèmes mythologiques a été compilé au xiiie siècle dans l\'Edda poétique. L\'historien islandais chrétien Snorri Sturluson s\'est servi de la culture orale ancienne pour rédiger son Edda en Prose au xiiie siècle. Ces sources constituent la majorité de nos connaissances sur cette mythologie, complétées par quelques sagas nordiques (dont la plus importante est la Völsunga saga) et textes evhéméristes (comme la Geste des Danois).\r\n\r\nLongtemps oubliée, cette mythologie a été redécouverte dès le xviiie siècle avec le courant romantique en Europe. Si ces sources demeurent contestées pour de possibles influences chrétiennes, elles mettent en lumière un univers très riche et vaste sur les croyances nordiques anciennes.', 'mytho_nordique.png');

-- --------------------------------------------------------

--
-- Structure de la table `lieu`
--

DROP TABLE IF EXISTS `lieu`;
CREATE TABLE IF NOT EXISTS `lieu` (
  `id_lieu` bigint(20) UNSIGNED NOT NULL,
  `nom_lieu` text,
  `desc_lieu` text,
  `illu_lieu` text,
  PRIMARY KEY (`id_lieu`),
  UNIQUE KEY `id_lieu` (`id_lieu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `lieu_mythe`
--

DROP TABLE IF EXISTS `lieu_mythe`;
CREATE TABLE IF NOT EXISTS `lieu_mythe` (
  `id_lieu` bigint(20) UNSIGNED DEFAULT NULL,
  `id_mythe` bigint(20) UNSIGNED DEFAULT NULL,
  KEY `lieu_mythe_ibfk_2` (`id_lieu`),
  KEY `lieu_mythe_ibfk_1` (`id_mythe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `mythe`
--

DROP TABLE IF EXISTS `mythe`;
CREATE TABLE IF NOT EXISTS `mythe` (
  `id_mythe` bigint(20) UNSIGNED NOT NULL,
  `titre` text,
  `illu_mythe` text,
  `desc_mythe` text,
  `epoque` text,
  `id_cat` bigint(20) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id_mythe`),
  UNIQUE KEY `id_mythe` (`id_mythe`),
  KEY `mythe_ibfk_1` (`id_cat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `personnage`
--

DROP TABLE IF EXISTS `personnage`;
CREATE TABLE IF NOT EXISTS `personnage` (
  `id_perso` bigint(20) UNSIGNED NOT NULL,
  `nom_perso` text,
  `sexe` text,
  `fct_perso` text,
  `desc_perso` text,
  `illu_perso` text,
  `id_parent1` bigint(20) UNSIGNED DEFAULT NULL,
  `id_parent2` bigint(20) UNSIGNED DEFAULT NULL,
  `id_race` bigint(20) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id_perso`),
  UNIQUE KEY `id_perso` (`id_perso`),
  KEY `personnage_ibfk_1` (`id_race`),
  KEY `personnage_ibfk_2` (`id_parent1`),
  KEY `personnage_ibfk_3` (`id_parent2`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `perso_mythe`
--

DROP TABLE IF EXISTS `perso_mythe`;
CREATE TABLE IF NOT EXISTS `perso_mythe` (
  `id_perso` bigint(20) UNSIGNED DEFAULT NULL,
  `id_mythe` bigint(20) UNSIGNED DEFAULT NULL,
  KEY `perso_mythe_ibfk_2` (`id_perso`),
  KEY `perso_mythe_ibfk_1` (`id_mythe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `race`
--

DROP TABLE IF EXISTS `race`;
CREATE TABLE IF NOT EXISTS `race` (
  `id_race` bigint(20) UNSIGNED NOT NULL,
  `nom_race` text,
  `desc_race` text,
  `illu_race` text,
  PRIMARY KEY (`id_race`),
  UNIQUE KEY `id_race` (`id_race`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `lieu_mythe`
--
ALTER TABLE `lieu_mythe`
  ADD CONSTRAINT `lieu_mythe_ibfk_1` FOREIGN KEY (`id_mythe`) REFERENCES `mythe` (`id_mythe`),
  ADD CONSTRAINT `lieu_mythe_ibfk_2` FOREIGN KEY (`id_lieu`) REFERENCES `lieu` (`id_lieu`);

--
-- Contraintes pour la table `mythe`
--
ALTER TABLE `mythe`
  ADD CONSTRAINT `mythe_ibfk_1` FOREIGN KEY (`id_cat`) REFERENCES `categorie` (`id_cat`);

--
-- Contraintes pour la table `personnage`
--
ALTER TABLE `personnage`
  ADD CONSTRAINT `personnage_ibfk_1` FOREIGN KEY (`id_race`) REFERENCES `race` (`id_race`),
  ADD CONSTRAINT `personnage_ibfk_2` FOREIGN KEY (`id_parent1`) REFERENCES `personnage` (`id_perso`),
  ADD CONSTRAINT `personnage_ibfk_3` FOREIGN KEY (`id_parent2`) REFERENCES `personnage` (`id_perso`);

--
-- Contraintes pour la table `perso_mythe`
--
ALTER TABLE `perso_mythe`
  ADD CONSTRAINT `perso_mythe_ibfk_1` FOREIGN KEY (`id_mythe`) REFERENCES `mythe` (`id_mythe`),
  ADD CONSTRAINT `perso_mythe_ibfk_2` FOREIGN KEY (`id_perso`) REFERENCES `personnage` (`id_perso`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
