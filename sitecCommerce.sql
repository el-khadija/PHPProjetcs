-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 02 juil. 2023 à 00:46
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sitecommerce`
--

-- --------------------------------------------------------

--
-- Structure de la table `catégorie`
--

CREATE TABLE `catégorie` (
  `ID_Categ` int(11) NOT NULL,
  `nom_Categ` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `catégorie`
--

INSERT INTO `catégorie` (`ID_Categ`, `nom_Categ`) VALUES
(1, 'Electronique'),
(2, 'Beauté'),
(3, 'Fashion'),
(4, 'Sports'),
(5, 'Maison');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `num_P` int(11) NOT NULL,
  `ID_Categ` int(11) DEFAULT NULL,
  `libelle` varchar(255) DEFAULT NULL,
  `pu` decimal(10,2) DEFAULT NULL,
  `qte_stk` int(11) DEFAULT NULL,
  `url_img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`num_P`, `ID_Categ`, `libelle`, `pu`, `qte_stk`, `url_img`) VALUES
(7, NULL, 'Shoes', '400.00', 8, 'upload/shoes.PNG'),
(8, NULL, 'Baggy Jeans', '170.00', 5, 'upload/pantalon.PNG'),
(9, NULL, 'T-shirts Shorts', '186.00', 16, 'upload/T-shirt short.PNG'),
(10, NULL, 'Sweatshirts', '195.00', 4, 'upload/hoody.PNG'),
(11, NULL, 'Anime Tshirt ', '103.00', 20, 'upload/jujutsu.PNG'),
(13, NULL, 'shoes', '250.00', 50, 'upload/Choeees.PNG'),
(14, NULL, 'Hooded T shirt', '98.00', 35, 'upload/hh.PNG'),
(15, NULL, 'Neklaces', '40.00', 75, 'upload/jewe.PNG'),
(16, NULL, 'Shoes', '230.00', 45, 'upload/shoeees.PNG'),
(17, NULL, 'Cardigan Kimono', '199.00', 55, 'upload/Capture.PNG'),
(18, NULL, 'Chain Necklace', '14.00', 120, 'upload/neck.PNG'),
(19, NULL, 'Shoes', '210.00', 130, 'upload/shoees.PNG');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `catégorie`
--
ALTER TABLE `catégorie`
  ADD PRIMARY KEY (`ID_Categ`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`num_P`),
  ADD KEY `fk_categorie` (`ID_Categ`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `catégorie`
--
ALTER TABLE `catégorie`
  MODIFY `ID_Categ` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `num_P` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `fk_categorie` FOREIGN KEY (`ID_Categ`) REFERENCES `catégorie` (`ID_Categ`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
