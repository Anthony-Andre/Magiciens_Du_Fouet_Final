-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 11 fév. 2022 à 20:25
-- Version du serveur :  5.7.17
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `les_magiciens_du_fouet_v2`
--

-- --------------------------------------------------------

--
-- Structure de la table `chef`
--

CREATE TABLE `chef` (
  `chefID` int(11) NOT NULL,
  `nomDuChef` varchar(30) NOT NULL,
  `prenomDuChef` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `chef`
--

INSERT INTO `chef` (`chefID`, `nomDuChef`, `prenomDuChef`) VALUES
(1, 'Chebest', 'Ed'),
(2, 'Cotesdeporc', 'Yves'),
(3, 'Reblochon', 'Joël'),
(4, 'Thé', 'Maï'),
(5, 'Coffre', 'Jean-Pierre'),
(6, 'Des Roses', 'Hélène'),
(8, 'Gignac', 'Cyril');

-- --------------------------------------------------------

--
-- Structure de la table `etape`
--

CREATE TABLE `etape` (
  `recetteID` int(11) NOT NULL,
  `etapeDescription` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `etape`
--

INSERT INTO `etape` (`recetteID`, `etapeDescription`) VALUES
(1, 'test description 1');

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `membreID` int(11) NOT NULL,
  `pseudo` varchar(25) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`membreID`, `pseudo`, `password`) VALUES
(1, 'anthony', '222222'),
(3, 'carl', '555555'),
(4, 'jacky', '123456'),
(5, 'jacky', '123456');

-- --------------------------------------------------------

--
-- Structure de la table `recette`
--

CREATE TABLE `recette` (
  `recetteID` int(11) NOT NULL,
  `nomRecette` varchar(30) NOT NULL,
  `chefID` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `cout` int(11) NOT NULL,
  `difficulte` int(11) NOT NULL,
  `ingredients` varchar(500) NOT NULL,
  `etapes` varchar(2000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `recette`
--

INSERT INTO `recette` (`recetteID`, `nomRecette`, `chefID`, `description`, `cout`, `difficulte`, `ingredients`, `etapes`) VALUES
(1, 'Choux à la crème', 2, 'Une recette incontournable, des petits choux hiboux cailloux à croquer ! ', 2, 4, 'Choux,,#,Crème,,#,Sucre,,#,Poney,,#', 'Préparer la pâte : faire préchauffer le four à 200°C (thermostat 6/7).#,Faire chauffer dans une casserole le beurre, l\'eau, le sel et le sucre. Dès que tout est fondu, verser toute la farine d\'un coup et bien mélanger avec une cuillère en bois, jusqu\'à ce que la pâte n’adhère plus à la cuillère ni à la casserole.#,Hors du feu, ajouter les œufs un à un, puis mélanger à chaque fois ce que le mélange soit bon.#'),
(2, 'Croque-Monsieur', 1, 'La fameuse recette pour croquer monsieur', 2, 1, 'Pain de mie,,#,Fromage,,#,Jambon,,#,Beurre,,#', 'Beurrez les 8 tranches de pain de mie sur une seule face. #,Posez 1 tranche de fromage sur chaque tranche de pain de mie. #,Posez 1 tranche de jambon plié en deux sur 4 tranches de pain de mie. #,Recouvrez avec les autres tartines (face non beurrée au-dessus). #,Dans un bol mélanger le fromage râpé avec le lait, le sel, le poivre et la muscade. #,Répartissez le mélange sur les croque-monsieur. #,Placez sur une plaque au four sous le grill pendant 10 mn.#'),
(6, 'Tartiflette super facile', 1, 'L\'hiver approche, il est temps de préparer une bonne tartiflette des familles...', 4, 3, 'De la tarte,,#,De la flette,,#,Du Fromage De Poney,,#', 'Cuire les pommes de terre à l’eau pendant 20 minutes, puis les éplucher et les couper en rondelles. #,Emincer les oignons et les faire revenir dans un peu de beurre. #,Ajouter les lardons fumés et laisser également revenir à feu assez doux (une dizaine de minutes) en remuant régulièrement. #,Préparer un plat de cuisson (j’utilise un plat rond en terre cuite de 40 cm de diamètre, 10 cm de haut). #'),
(80, 'tarte à la fraise', 1, 'tartempion', 1, 1, 'fraise,100,grammes,lait,100,ml', 'etape 1#,etape 2 fruase#,zrzerzer#'),
(81, 'test #', 1, 'efjhefoihef', 1, 1, 'framboise,100,grammes#,eau,200,litres#', 'ezfdzer#,dezedez#'),
(82, 'Crumble Aux Fruits Rouges', 6, 'Recette de la Saint Valentin', 2, 2, 'Baies Rouges Mélangées,500,grammes#,Pommes,3,#,Poires,2,#,Beurre,100,grammes#,Sucre En Poudre,100,grammes#,Farine,100,grammes#,Cannelle En Poudre,1,Cuillérée à café#', 'Triez les baies, de façon à ne garder que celles qui sont parfaitement saines, et équeutez-les.#,Pelez les pommes et les poires#,Coupez les en quatre et retirez le coeur#');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `chef`
--
ALTER TABLE `chef`
  ADD PRIMARY KEY (`chefID`);

--
-- Index pour la table `etape`
--
ALTER TABLE `etape`
  ADD PRIMARY KEY (`recetteID`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`membreID`);

--
-- Index pour la table `recette`
--
ALTER TABLE `recette`
  ADD PRIMARY KEY (`recetteID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `chef`
--
ALTER TABLE `chef`
  MODIFY `chefID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `membreID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `recette`
--
ALTER TABLE `recette`
  MODIFY `recetteID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
