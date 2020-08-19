-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Aug 19, 2020 at 07:43 AM
-- Server version: 5.7.21
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `boutique`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id_article` int(11) NOT NULL,
  `id_distributeur` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `id_sous_categorie` int(11) NOT NULL,
  `nom_article` varchar(100) NOT NULL,
  `auteur_article` varchar(100) NOT NULL,
  `editions_article` varchar(100) NOT NULL,
  `description_article` text NOT NULL,
  `citation_article` varchar(255) NOT NULL,
  `nb_pages` int(11) NOT NULL,
  `annee_parution` year(4) NOT NULL,
  `prix_article` decimal(10,0) NOT NULL,
  `date_ajout` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id_article`, `id_distributeur`, `id_categorie`, `id_sous_categorie`, `nom_article`, `auteur_article`, `editions_article`, `description_article`, `citation_article`, `nb_pages`, `annee_parution`, `prix_article`, `date_ajout`) VALUES
(1, 2, 2, 2, 'Peter Markli', 'Giorgio Azzariti', 'Editions Cosa Mentale', 'À la recherche d’un langage” lit l’œuvre de Peter Märkli en considérant l’héritage de ses pères artistiques, continuellement redécouverts – à la fois dans son architecture et dans ses dessins – à travers une recherche incessante dans la tentative d’en saisir l’essence.', '“À la recherche d’un langage”', 272, 2019, '48', '2020-07-27 15:22:15'),
(2, 2, 2, 1, 'Silences éloquents', 'Carlo Martí Arís', 'Editions Cosa Mentale', 'C’est une forme de révolte spirituelle que Carlos Martí Arís, met en lumière grâce à une analyse transversale de différentes expressions artistiques qui se mêlent et se rencontrent pour enrichir sa réflexion. C’est une invitation à retourner vers de grands thèmes éternels, à l’acceptation de la solitude et de la réserve qui accompagne ce positionnement en marge des modes, pour faire progresser l’œuvre en profondeur plutôt qu’en surface. ', 'c’est une forme de révolte spirituelle', 192, 2019, '22', '2020-08-05 15:22:15'),
(3, 2, 2, 1, 'Spectre 02 Vegetal Trauma', 'auteurs multiples', 'Editions Cosa Mentale', 'Étant des êtres enracinés et profondément sédentaires, les plantes n’ont pas d’autre choix que de subir et de s’adapter. Leur vie est faite d’agressions successives dont elles gardent la mémoire et dont il faut dépasser la violence des effets. Elles portent la trace et les stigmates laissés par les traumatismes d’un cadre de vie qu’il n’est pas possible de fuir. Ce numéro inédit de Spectre invite des artistes contemporains majeurs à livrer leur interprétation photographique du trauma végétal.', 'Les plantes ressentent les pressions, les contraintes et les violences du monde extérieur', 216, 2019, '38', '2020-08-13 15:22:15'),
(4, 2, 2, 1, 'Simplifions', 'Bernard Quirot', 'Editions Cosa Mentale', 'Bernard Quirot est un architecte. Il l’est de tout son corps. Bernard Quirot nous rappelle que l’architecture nous engage entièrement. Que cet engagement nous oblige, à la fois envers une culture et la tradition, et nous oblige aussi à prendre position sur le rôle de l’architecte dans notre société et sur ses conditions d’exercice. L’auteur nous livre ses fondements théoriques et évoque, à travers son propre parcours, une vision critique de la complexification du monde.', 'Que cet engagement nous oblige, à la fois envers une culture et la tradition, et nous oblige aussi à prendre position sur le rôle de l’architecte dans notre société.', 96, 2019, '20', '2020-08-14 15:22:15'),
(5, 2, 2, 9, 'Eloquent Silences', 'Carlo Martí Arís', 'Editions Cosa Mentale', 'C’est une forme de révolte spirituelle que Carlos Martí Arís, met en lumière grâce à une analyse transversale de différentes expressions artistiques qui se mêlent et se rencontrent pour enrichir sa réflexion. C’est une invitation à retourner vers de grands thèmes éternels, à l’acceptation de la solitude et de la réserve qui accompagne ce positionnement en marge des modes, pour faire progresser l’œuvre en profondeur plutôt qu’en surface. Après vingt ans, la leçon de Martí Arís est d’une contemporanéité et d’une importance fondamentale pour notre discipline aujourd’hui.', ' retourner vers de grands thèmes éternels, à l’acceptation de la solitude et de la réserve qui accompagne ce positionnement en marge des modes', 172, 2019, '22', '2020-08-14 15:22:15'),
(6, 2, 2, 1, 'CRAP ZINE volume 5', 'Parc architectes', 'Parc architectes', 'C’est une forme de révolte spirituelle que Carlos Martí Arís, met en lumière grâce à une analyse transversale de différentes expressions artistiques qui se mêlent et se rencontrent pour enrichir sa réflexion. C’est une invitation à retourner vers de grands thèmes éternels, à l’acceptation de la solitude et de la réserve qui accompagne ce positionnement en marge des modes, pour faire progresser l’œuvre en profondeur plutôt qu’en surface. Après vingt ans, la leçon de Martí Arís est d’une contemporanéité et d’une importance fondamentale pour notre discipline aujourd’hui.', ' retourner vers de grands thèmes éternels, à l’acceptation de la solitude et de la réserve qui accompagne ce positionnement en marge des modes', 92, 2016, '10', '2020-08-14 15:22:15'),
(7, 2, 2, 9, 'Project issue 7', 'multi auteurs', 'project journal', 'Featuring: Matthew Allen, Archie_NN, Xristina Argyros & Ryan Neiheiser, Andrew Atwood & Anna Neimark (First Office), Sara Constantino & Emmett Zeifman, Brennan Buck & David Freeland, Peggy Deamer & Manuel Shvartzberg, Neil M. Denari Architects, David Eskenazi, Gabriel Fries-Briggs, Nicholas Pajerski & Brendan Shea (Reimaging), Swarnabh Ghosh, Lindsay Harkema, Hirsuta (Jason Payne), Carolyn L. Kane, Thomas Kelley & Carrie Norman, Jaffer Kolb, Zeina Koreitem (MILLIØNS), M. Casey Rehm (Kinch), Jonah Rowen, Jose Sanchez (Plethora Project), Troy Schaum & Rosalyne Shieh, Andrew Witt (Certain Measures)', 'none', 120, 2018, '20', '2020-08-14 15:22:15'),
(8, 2, 2, 1, 'Project issue 6', 'multi auteurs', 'project journal', 'Featuring: Atelier Olschinsky, Barozzi / Veiga, Marlon Blackwell, Marija Brdarski, John Capen Brough, Roberto de Leon, Britt Eversole, Yvonne Farrell & Shelley McNamara (Grafton Architects), Davide Tommaso Ferrando, Seher Erdogan Ford, Jerome Haferd, Joyce Hwang (Ants of the Prairie), Gavin Keeney, Parsa Khalili, Tina Lechner, Keith Mitnick, Soltani+LeClercq, SPBR Arquitetos', 'none', 132, 2017, '20', '2020-08-14 15:22:15'),
(9, 2, 2, 1, 'Project issue 5', 'multi auteurs', 'project journal', 'Featuring: Michael Abrahamson, Pep Avilés, John Capen Brough, Preston Scott Cohen, Abigail Coover, Nathan Hume & Gillian Shaffer, Cristina Goberna & Urtzi Grau (Fake Industries Architectural Agonism), Parsa Khalili, Andrew Kovacs, MVRDV, Masha Panteleyeva, M. Casey Rehm (with P-A-T-T-E-R-N-S), Reimaging, Garrett Ricciardi & Julian Rose (formlessfinder), Noah Scheinman, Tyler Survant & Mark Talbot, Michael Szivos (SOFTlab), Clark Thenhaus, Young & Ayata, Zago Architecture', 'none', 132, 2017, '20', '2020-08-14 15:22:15'),
(10, 2, 2, 1, 'Project issue 4', 'multi auteurs', 'project journal', 'Featuring:  Andrew Atwood, Erin Besler, Miroslava Brooks, David Eskenazi, E2A Architects, Stephen Froese, Andrew Holder, Florian Idenburg & Jing Liu, Sylvia Lavin, Andrew Leach, Michael Meredith, Kyle Miller, Mark Rakatansky, Austin Smith & Dan Taeyoung, Samuel Stewart-Halevy, Luke Studebaker, Studio Ensamble, Emmett Zeifman', 'none', 116, 2015, '16', '2020-08-14 15:22:15'),
(11, 2, 2, 1, 'Project issue 3', 'multi auteurs', 'project journal', 'Featuring: John Capen Brough, common room & Kim Förster, Reinier de Graaf, Neil Denari, Edward Eigen, Formless Finder, Adam Fure, Michael Jefferson & Suzanne Lettieri, Alexandra Leykauf, John May, Magnus Nilsson, Pezo von Ellrichshausen, Lola Sheppard, Jill Stoner, Luke Studebaker, Valerio Olgiati Architect, Tom Wiscombe', 'none', 108, 2014, '16', '2020-08-14 15:22:15'),
(12, 2, 2, 1, 'Project issue 2', 'multi auteurs', 'project journal', 'Featuring: Amale Andraos & Dan Wood, Becher & Howland (Architectural Association), Kelly Bair, Daniel Berlin, Kyla Chevrier, Joe Day, Amy DeDonato, FreelandBuck, Nathan Hume & Abigail Coover, Keith Johns, Parsa Khalili, Daniel Markiewicz, Caroline O’Donnell, Michael Osman, Dwayne Oyler, Albert Pope, Peter Trummer, Jason Payne, Leah Pires, Productora, Andrew Zago', 'none', 108, 2013, '16', '2020-08-14 15:22:15'),
(13, 2, 2, 1, 'Project issue 1', 'multi auteurs', 'project journal', 'Featuring: Andrew Atwood & Anna Neimark, Pier Vittorio Aureli, John Houck, Bernard Khoury, Andrew Kovacs, Jimenez Lai, Michael Meredith & Hilary Sample, Emmanuel Petit, Jesse Reiser, Soriano y Asociados arquitectos, Xefirotarch, and more', 'none', 108, 2012, '16', '2020-08-14 15:22:15');

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

CREATE TABLE `categorie` (
  `id_categorie` int(11) NOT NULL,
  `nom_categorie` varchar(50) NOT NULL,
  `chemin_category` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `nom_categorie`, `chemin_category`) VALUES
(1, 'musique', ''),
(2, 'art & architecture', ''),
(3, 'littérature', ''),
(4, 'contre-culture', ''),
(5, 'jeunesse', ''),
(6, 'manga', ''),
(7, 'category', '');

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

CREATE TABLE `commande` (
  `id_commande` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  `nom_article` int(11) NOT NULL,
  `prix_article` decimal(10,0) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `date_commande` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `facture`
--

CREATE TABLE `facture` (
  `id_facture` int(11) NOT NULL,
  `id_commande` int(11) NOT NULL,
  `nbr_total_articles` int(11) NOT NULL,
  `prix_total_articles` decimal(10,0) NOT NULL,
  `id_livraison` int(11) NOT NULL,
  `prix_livraison` decimal(10,0) NOT NULL,
  `adresse_facturation` varchar(255) NOT NULL,
  `prix_total` decimal(10,0) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `date_facturation` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `image_article`
--

CREATE TABLE `image_article` (
  `id_image_article` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  `chemin` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `image_article`
--

INSERT INTO `image_article` (`id_image_article`, `id_article`, `chemin`) VALUES
(1, 1, 'uploads/cosa_mentale_Markli_couverture.jpg'),
(2, 2, 'uploads/cosa_mentale_silences-eloquents_couverture.jpg'),
(3, 3, 'uploads/cosa_mentale_spectre_vegetal_trauma_couverture.jpg'),
(4, 4, 'uploads/cosa_mentale_simplifions_couverture.jpg'),
(5, 5, 'uploads/Eloquent_silences_couverture.jpg'),
(6, 6, 'uploads/crapzine_volume5_couverture.jpg'),
(7, 7, 'uploads/Project-7_Cover_Web.jpg'),
(8, 8, 'uploads/PROJECT_Issue-6_Cover-Image.jpg'),
(9, 9, 'uploads/PROJECT_Issue-5_Front-Cover.jpg'),
(10, 10, 'uploads/PROJECT_Issue-4_Front-Cover.jpg'),
(11, 11, 'uploads/PROJECT_Issue-3-Cover.jpg'),
(12, 12, 'uploads/PROJECT_Issue-2_Front-Cover.jpg'),
(13, 13, 'uploads/PROJECT_Issue-1_Front-Cover.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `livraison`
--

CREATE TABLE `livraison` (
  `id_livraison` int(11) NOT NULL,
  `nom_livraison` varchar(255) NOT NULL,
  `prix_livraison` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `livraison`
--

INSERT INTO `livraison` (`id_livraison`, `nom_livraison`, `prix_livraison`) VALUES
(1, 'point-relai', 3.9),
(2, 'colissimo', 5.9),
(3, 'chronopost', 7.9);

-- --------------------------------------------------------

--
-- Table structure for table `message_utilisateurs`
--

CREATE TABLE `message_utilisateurs` (
  `id_message_utilisateur` int(11) NOT NULL,
  `message_utilisateur` text NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `date_message` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `message_vendeur`
--

CREATE TABLE `message_vendeur` (
  `id_message_vendeur` int(11) NOT NULL,
  `email_utilisateur` varchar(100) NOT NULL,
  `message_vendeur` text NOT NULL,
  `description_article_vendeur` varchar(255) NOT NULL,
  `titre_fanzine` varchar(100) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `date_message_vendeur` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id_newsletter` int(11) NOT NULL,
  `email_utilisateur` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id_newsletter`, `email_utilisateur`) VALUES
(1, 'nadia@gmail.com'),
(2, 'machin@gmail.com'),
(3, 'monique@gmail.com'),
(6, 'nadou@gmail.com'),
(7, 'nad@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `sous_categorie`
--

CREATE TABLE `sous_categorie` (
  `id_sous_categorie` int(11) NOT NULL,
  `nom_sous_categorie` varchar(255) NOT NULL,
  `id_categorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sous_categorie`
--

INSERT INTO `sous_categorie` (`id_sous_categorie`, `nom_sous_categorie`, `id_categorie`) VALUES
(1, 'brutalisme', 2),
(2, 'architectes', 2),
(3, 'street art', 4),
(4, 'science-fiction', 3),
(5, 'trap', 1),
(6, 'généraliste', 1),
(7, 'auto-fiction', 3),
(8, 'installations', 2),
(9, 'théorie', 2);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id_stock` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  `nb_articles_stock` int(11) NOT NULL,
  `date_check_stock` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id_stock`, `id_article`, `nb_articles_stock`, `date_check_stock`) VALUES
(1, 1, 13, '2020-08-14 15:22:15'),
(2, 2, 22, '2020-08-14 15:22:15'),
(3, 3, 1, '2020-08-14 15:22:15'),
(4, 4, 9, '2020-08-14 15:22:15'),
(5, 5, 33, '2020-08-14 15:22:15'),
(6, 6, 20, '2020-08-14 15:22:15'),
(7, 7, 10, '2020-08-14 15:22:15'),
(8, 8, 17, '2020-08-14 15:22:15'),
(9, 9, 43, '2020-08-14 15:22:15'),
(10, 10, 42, '2020-08-14 15:22:15'),
(11, 11, 25, '2020-08-14 15:22:15'),
(12, 12, 30, '2020-08-14 15:22:15'),
(13, 13, 30, '2020-08-14 15:22:15');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id_utilisateur` int(11) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `date_registration` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_utilisateur`, `prenom`, `nom`, `gender`, `phone`, `email`, `password`, `is_admin`, `date_registration`) VALUES
(1, 'admin', 'admin', 'non-genré', '0658449105', 'admin@gmail.com', 'Password-1', 1, '2020-08-03 10:00:00'),
(2, 'Nadia', 'RAIS', 'Femme', '0494662823', 'ndrs455@gmail.com', '$2y$10$2T5GS0b30.Oxzo01slrr6OqqS6ZtKs7P2Z/.Jjvx0jWSEEOINnvgS', 0, '2020-08-03 16:51:49'),
(3, 'ruben', 'ruben', 'Homme', '0658449191', 'ruben@gmail.com', '$2y$10$.yFTv1arLWo9dxUc8B15a.05vChbmJ4zypNUdf9p14ffnznYzLcVm', 0, '2020-08-04 09:37:29'),
(4, 'nadia', 'nadia', 'Femme', '0123456789', 'nadia@gmail.com', '$2y$10$aGUljOx4rg.OEr3kQIXF0ukJxYAgE7J2Jiayv56zUMJIoN7pbO5xe', 0, '2020-08-04 14:35:11'),
(6, 'test', 'test', 'Non genré', '0123456789', 'test@gmail.com', '$2y$10$2cU3oOEOKlQ.vx9SrT4QdeSKPrRIATPadZ44KLLQWgf0XRQFgbJ/W', 0, '2020-08-04 16:35:39'),
(13, 'testo', 'testo', 'Non genré', '0123456789', 'testo@gmail.com', '$2y$10$0JwOVe.CAW6USHLEpRio3OBCfmJ5tMt7IBd0ff2At8zCRmEcNxtmy', 0, '2020-08-04 17:01:07'),
(15, 'Juju', 'Julien', 'Femme', '0123456789', 'julien@gmail.com', '$2y$10$p/QNV0YUg0DyQKcLPJOTB.UQQFWJKApWIr/nlIlQyBej7mE.i3JWG', 0, '2020-08-06 18:49:33'),
(16, 'mad', 'nad', 'Homme', '0123456789', 'nad@gmail.com', '$2y$10$8Bn8S/QqDHzI25XSwnqbjOyeusoi1e0nH706ux91sreAQEk18Dc/q', 0, '2020-08-07 09:21:53');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id_wishlist` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_article` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id_article`);

--
-- Indexes for table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Indexes for table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id_commande`);

--
-- Indexes for table `facture`
--
ALTER TABLE `facture`
  ADD PRIMARY KEY (`id_facture`);

--
-- Indexes for table `image_article`
--
ALTER TABLE `image_article`
  ADD PRIMARY KEY (`id_image_article`);

--
-- Indexes for table `livraison`
--
ALTER TABLE `livraison`
  ADD PRIMARY KEY (`id_livraison`);

--
-- Indexes for table `message_utilisateurs`
--
ALTER TABLE `message_utilisateurs`
  ADD PRIMARY KEY (`id_message_utilisateur`);

--
-- Indexes for table `message_vendeur`
--
ALTER TABLE `message_vendeur`
  ADD PRIMARY KEY (`id_message_vendeur`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id_newsletter`);

--
-- Indexes for table `sous_categorie`
--
ALTER TABLE `sous_categorie`
  ADD PRIMARY KEY (`id_sous_categorie`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id_stock`);

--
-- Indexes for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id_wishlist`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id_article` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `commande`
--
ALTER TABLE `commande`
  MODIFY `id_commande` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `facture`
--
ALTER TABLE `facture`
  MODIFY `id_facture` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `image_article`
--
ALTER TABLE `image_article`
  MODIFY `id_image_article` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `livraison`
--
ALTER TABLE `livraison`
  MODIFY `id_livraison` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `message_utilisateurs`
--
ALTER TABLE `message_utilisateurs`
  MODIFY `id_message_utilisateur` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message_vendeur`
--
ALTER TABLE `message_vendeur`
  MODIFY `id_message_vendeur` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id_newsletter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sous_categorie`
--
ALTER TABLE `sous_categorie`
  MODIFY `id_sous_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id_stock` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id_wishlist` int(11) NOT NULL AUTO_INCREMENT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;