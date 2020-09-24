-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Sep 24, 2020 at 01:31 PM
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
  `date_registration` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id_article`, `id_distributeur`, `id_categorie`, `id_sous_categorie`, `nom_article`, `auteur_article`, `editions_article`, `description_article`, `citation_article`, `nb_pages`, `annee_parution`, `prix_article`, `date_registration`) VALUES
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
(13, 2, 2, 1, 'Project issue 1', 'multi auteurs', 'project journal', 'Featuring: Andrew Atwood & Anna Neimark, Pier Vittorio Aureli, John Houck, Bernard Khoury, Andrew Kovacs, Jimenez Lai, Michael Meredith & Hilary Sample, Emmanuel Petit, Jesse Reiser, Soriano y Asociados arquitectos, Xefirotarch, and more', 'none', 108, 2012, '16', '2020-08-14 15:22:15'),
(14, 5, 1, 10, 'Une autre histoire du DIY', 'Adrien Durand', 'Le Gospel', '\"Le faire soi même\" \r\nOdd Future \r\nLil B & Clams Casino \r\nArthur Russell \r\nUne histoire de l’antifolk et du folkpunk \r\nEarly black metal \r\n>Mountain Goats \r\n>Circuit bending \r\n>Sun City Girls', 'none', 80, 2020, '6', '2020-09-20 15:22:15'),
(15, 5, 1, 10, 'Musique & lutte des classes', 'Adrien Durand', 'Le Gospel', 'Revival rock et gentrification à New York \r\nLa musique électronique bourgeoise: une tradition française \r\nPoison Girls \r\nThe Coup \r\nPatty Hearst \r\nCamera Silens \r\nRadio Dept. \r\nLeftöver Crack \r\nDans les yeux de celles qui ont filmé les années no wave', 'none', 80, 2020, '6', '2020-09-20 15:22:15'),
(16, 5, 4, 3, 'Gran Paris', 'inconnu', 'Big Cartel', 'Cet objet éditorial présente une série de photographies réalisée par 100navigo.\\n21 x 14,8cm, 64 pages couleurs. Papier 90 grammes.\\nImposé, imprimé et façonné dans notre four. Reliure en piqûre à cheval.\\nCouverture sérigraphiée en deux couleurs par nos soins.\\n30 exemplaires numérotés.\\nAccompagné d’une photographie A3 imprimé en sérigraphie par nos soins également.\'', 'Couverture sérigraphiée en deux couleurs par nos soins. ', 40, 2020, '9', '2020-09-20 15:22:15'),
(17, 7, 4, 10, 'CARACAS NUESTRA ', 'Ronald Pizzoferrato', 'éditions nuits noires', 'Le photographe et graffeur Ronald Pizzoferrato présente dans Caracas Nuestra un ensemble d’archives photographiques né de ses premières sorties dans le métro ultra surveillé et sécurisé de la capitale Vénézuélienne. Il offre une vision intime d’un Caracas que peu de gens connaissent et qu’il compare à une boîte de Pandore : ce réseau souterrain unique, ordonné, aligné, rampant, contraste avec la ville du dessus et offre un terrain de jeu sans fin, jusqu’alors jamais exploré ni vandalisé. Ces images témoignent du début d’un phénomène né secrètement, dans l’obscurité totale et l’anxiété la plus complète. Cette « Caracas Nuestra », seulement comprise des caraqueños et de ces graffeurs passionnés est une ville souterraine encore plus dangereuse que la surface', 'Cette « Caracas Nuestra », seulement comprise des caraqueños et de ces graffeurs passionnés est une ville souterraine encore plus dangereuse que la surface.\', \'Cette « Caracas Nuestra », seulement comprise des caraqueños et de ces graffeurs passionnés...', 70, 2019, '15', '2020-09-20 15:22:15'),
(18, 7, 4, 10, 'PHÉNIX', 'Emilie désir', 'éditions nuits noires', 'Cette série de cinq fanzines, publiée au cours des années 2019/2020, témoigne des manifestations parisiennes issues du mouvement inédit des gilets jaunes.\\nChaque tome est destiné à aborder un thème lié à ce mouvement contestataire : flammes, armes, actions violentes, portraits des manifestants et des forces de l’ordre etc...\\nLa photographe Émilie Désir a couvert la quasi-totalité des rassemblements au plus près de l’action. Des scènes de protestation pures naissent des images très esthétiques et composées. Le résultat en est une vision en cinq actes, à la fois documentaire et puissamment dramatique.\\n\\nTome 1 : Phénix\\nPublié à l’occasion de l’exposition collective « Documenting Paris » à la Retramp Gallery de Berlin en juillet 2019, le fanzine Phénix est le premier tome de la série. Émilie Désir s’est ici confrontée aux flammes nées de la colère : feux violents, fumées asphyxiantes et aveuglantes, pompiers en action, tous ces instants brûlants sont captés par le reflex argentique de la photographe.', 'Des scènes de protestation pures naissent des images très esthétiques et composées. Le résultat en est une vision en cinq actes, à la fois documentaire et puissamment dramatique.', 52, 2020, '10', '2020-09-20 15:22:15'),
(19, 9, 4, 10, 'KX en Y', 'Adrien Vautier', 'éditions nuits noires', 'KX en Y : un modèle de moto, une figure de cross. L\'ouvrage et son titre tiennent dans ces deux éléments clés qui définissent le cross-bitume. Le reste, ce sont les riders suivis par Adrien Vautier qui le construisent.Le photojournaliste a couvert le quotidien de ces jeunes passionnés de cross qui brûlent régulièrement le goudron de leurs banlieues jusqu\'à Paris en prenant tous les risques. Il en livre une vision complète et tranchante, à l\'image du péril permanent auquel se confrontent ces bikers lors de leurs sorties de groupe. Le documentaire photographique raconte cette histoire : le groupe, l\'oublie des clans, le danger, l\'euphorie, les accidents, la police qui est partout. La passion pour le bitume n\'a ni âge, ni milieu, ni limite. Parcourir des yeux KX en Y, c\'est sentir son rythme cardiaque s\'accélérer et prendre soi-même une dose d\'adrénaline.\', ', '\'Le documentaire photographique raconte cette histoire : le groupe, l\'oublie des clans, le danger, l\'euphorie, les accidents, la police qui est partout.', 50, 2019, '18', '2020-09-20 15:22:15'),
(20, 9, 1, 6, 'punk Slash magazine', 'Ryan Richardson', 'slash', 'The importance of Slash to the L.A. punk scene, and really to the worldwide punk scene in general, cannot be overstated.  The writing of Claude “Kickboy Face” Bessy, Jeffrey Lee Pierce, and Chris D. helped to define the attitude and outlook of the nascent subculture, while the imagery of illustrators Gary Panter and Mark Vallen established punk as an art movement working outside of—but in conjunction with—the music scene. Photographers like Ed Colver and Jenny Lens provided essential documentation of the era, making names for themselves producing some of the most important rock photography ever captured.', 'The importance of Slash to the L.A. punk scene, and really to the worldwide punk scene in general, cannot be overstated.', 30, 1970, '15', '2020-09-20 15:22:15'),
(21, 2, 3, 4, 'Ailleurs & Autres n° 11', 'Francis VALERY ', 'A & A Infos', 'bel ailleurs ', 'none', 25, 1978, '55', '2020-09-20 15:22:15'),
(22, 2, 3, 4, 'A-Z', 'Graham Masterton', 'catalogue analytique', 'catalogue analytique\', \'principalement consacré à la littérature, mais on y trouvait aussi quelques sujets cinéma. Entre 1985 et 1988 il y eu 23 numéros ainsi que plusieurs hors-série ', 'none', 30, 1991, '11', '2020-09-20 15:22:15'),
(23, 2, 3, 4, 'Faille temporelle', 'Moebius', 'aucune', 'fanzine était lui plutôt spécialisé dans la BD, avec notamment ce n° 3 datant de janvier 1991.', 'none', 30, 1991, '39', '2020-09-20 15:22:15'),
(24, 2, 3, 7, 'Jungle Juice n° 02', 'multi auteurs', 'les presses du réel', 'les presses du réel, 40 auteurs, poètes et plasticiens se passent le relais page après page de ce numéro littéraire empreint de désobéissance et de vacarme. 114 pages articulées autour de textes théoriques sur la musique (Bernard Sjazner, « Plaidoyer pour écoute sensible de la musique », Pauline Nadrigny « L\'atelier d\'écoutes N°5 », ...), de textes narratifs (Francis avec « Hibakusha » qui relate l\'explosion de la centrale de Flamanville 48 heures avant l\'explosion du 9 février 2017, Marie Debray « Au seuil »...) et de poésie (Emmanuelle K, « Quand l\'obéissance est devenue impossible », Edith Msika, Rosalie Bribes, François Salmeron, Marin Fouqué...). ', 'none', 20, 2015, '9', '2020-09-20 15:22:15'),
(25, 12, 5, 11, 'Les mutants', 'multi auteurs', 'Biscoto', 'Le journal qui change de peau.', 'Le journal qui change de peau.', 22, 2016, '4', '2020-09-20 15:22:15'),
(26, 12, 5, 11, 'Par là-bas', 'Alexis Grasset', 'Paper cut', 'Alexis Grasset nous peint ici de nombreux paysages, aux ambiances toutes différentes, dans lesquels This et That viennent vivre leur récit. Tantôt forêt, tantôt grotte, tantôt volcan, son monde change au gré de son histoire et de ses envies, construisant un univers tout aussi palpable que grandiose. Chaque page est une grande illustration colorée aux multiples détails à contempler, dans laquelle les yeux se perdent avec plaisir.', 'none', 16, 2020, '10', '2020-09-20 15:22:15'),
(27, 12, 5, 11, 'Rencontre2', 'Amelie Patin', 'Paper cut', 'Ce leporello raconte l\'histoire d\'un rocher qui rêve de grandir et d\'une jeune fille qui recherche son jardin parfait.', 'none', 16, 2018, '85', '2020-09-20 15:22:15'),
(28, 12, 5, 11, 'Le culte', 'Daphné Geisler', 'Paper cut', 'Dans son journal intitulé Le Culte, Daphné Geisler donne à ses personnages This et That le costume de scientifiques, observant et analysant un objet qui va les perdre dans ses mystères. Son trait en noir et blanc organique mélangé à son découpage franc donne une dynamique temporelle à son récit parfois proche de la cinématographie.', 'Un étrange monolithe est apparu en plein milieu du désert.', 16, 2019, '10', '2020-09-20 15:22:15'),
(29, 12, 5, 11, 'Longcourci', 'Margaux Meissonnier', 'Paper cut', 'Margaux Meissonnier nous emmène ici dans une ballade où le temps et l’espace ne semblent pas fonctionner de la même façon que dans notre réalité. This et That sont égarés dans un univers fantastique, où comètes et oiseaux à 3 yeux ne semblent étonner personne. L’autrice nous laisse nous perdre dans ces paysages aussi magnifiques qu’immenses, rappelant à tous que ce n’est pas la destination qui compte, mais bien le voyage.', 'Finalement, est-il important de savoir où ce raccourci nous emmènera? Dépêchons-nous de prendre le temps, Pressons-nous d’aller lentement, qu’importe! Tant que le voyage n’est pas solitaire…', 16, 2019, '10', '2020-09-20 15:22:15'),
(30, 15, 1, 10, 'So Young', 'multi auteurs', 'So Young', 'So Young is a printed publication, fully illustrated by emerging and contemporary illustrators, our limited print runs make So Young an item to be collected and treasured.', 'So Young is a printed publication, fully illustrated by emerging and contemporary illustrators, our limited print runs make So Young an item to be collected and treasured.', 50, 2020, '10', '2020-09-20 15:22:15'),
(31, 15, 1, 10, 'So Young #26', 'multi auteurs', 'So Young', 'So Young is a printed publication, fully illustrated by emerging and contemporary illustrators, our limited print runs make So Young an item to be collected and treasured.', 'So Young is a printed publication, fully illustrated by emerging and contemporary illustrators, our limited print runs make So Young an item to be collected and treasured.', 50, 2020, '10', '2020-09-20 15:22:15'),
(32, 15, 1, 10, 'So Young #25', 'multi auteurs', 'So Young', 'So Young is a printed publication, fully illustrated by emerging and contemporary illustrators, our limited print runs make So Young an item to be collected and treasured.', 'So Young is a printed publication, fully illustrated by emerging and contemporary illustrators, our limited print runs make So Young an item to be collected and treasured.', 50, 2020, '10', '2020-09-20 15:22:15'),
(33, 15, 1, 10, 'So Young #24', 'multi auteurs', 'So Young', 'So Young is a printed publication, fully illustrated by emerging and contemporary illustrators, our limited print runs make So Young an item to be collected and treasured.', 'So Young is a printed publication, fully illustrated by emerging and contemporary illustrators, our limited print runs make So Young an item to be collected and treasured.', 50, 2020, '10', '2020-09-20 15:22:15'),
(34, 15, 1, 10, 'So Young #23', 'multi auteurs', 'So Young', 'So Young is a printed publication, fully illustrated by emerging and contemporary illustrators, our limited print runs make So Young an item to be collected and treasured.', 'So Young is a printed publication, fully illustrated by emerging and contemporary illustrators, our limited print runs make So Young an item to be collected and treasured.', 50, 2020, '10', '2020-09-20 15:22:15'),
(35, 15, 1, 10, 'So Young #22', 'multi auteurs', 'So Young', 'So Young is a printed publication, fully illustrated by emerging and contemporary illustrators, our limited print runs make So Young an item to be collected and treasured.', 'So Young is a printed publication, fully illustrated by emerging and contemporary illustrators, our limited print runs make So Young an item to be collected and treasured.', 50, 2020, '10', '2020-09-20 15:22:15'),
(36, 22, 6, 12, 'Les vies imaginaires', 'Emre Orhum', 'Le dernier cri', 'les vies imaginaires', 'les vies imaginaires', 32, 2013, '35', '2020-09-20 15:22:15');

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

CREATE TABLE `categorie` (
  `id_categorie` int(11) NOT NULL,
  `nom_categorie` varchar(50) NOT NULL,
  `date_registration` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `nom_categorie`, `date_registration`) VALUES
(1, 'musique', '2020-09-01 17:20:45'),
(2, 'art & architecture', '2020-09-01 17:20:45'),
(3, 'littérature', '2020-09-01 17:20:45'),
(4, 'contre-culture', '2020-09-01 17:20:45'),
(5, 'jeunesse', '2020-09-01 17:20:45'),
(6, 'bande-dessinée', '2020-09-01 17:20:45'),
(7, 'category', '2020-09-01 17:20:45');

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

CREATE TABLE `commande` (
  `id_commande` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `date_commande` datetime NOT NULL,
  `statut_commande` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `commande`
--

INSERT INTO `commande` (`id_commande`, `id_utilisateur`, `date_commande`, `statut_commande`) VALUES
(107, 27, '2020-09-06 10:29:45', 1),
(108, 27, '2020-09-06 12:24:19', 1),
(109, 27, '2020-09-06 12:35:27', 1),
(110, 27, '2020-09-06 13:19:04', 1),
(111, 27, '2020-09-07 21:22:19', 1),
(112, 27, '2020-09-21 15:50:01', 1),
(113, 27, '2020-09-21 15:51:59', 2),
(114, 26, '2020-09-22 17:24:45', 1),
(115, 26, '2020-09-22 18:16:19', 1),
(116, 26, '2020-09-22 18:29:32', 1),
(117, 26, '2020-09-23 11:11:33', 1),
(118, 26, '2020-09-23 11:16:07', 1),
(119, 26, '2020-09-23 11:19:33', 1),
(120, 26, '2020-09-23 11:22:27', 1),
(121, 26, '2020-09-23 11:26:37', 1),
(122, 26, '2020-09-23 11:29:29', 1),
(123, 26, '2020-09-23 11:32:50', 1),
(124, 26, '2020-09-23 11:33:26', 1),
(125, 26, '2020-09-23 11:39:47', 1),
(126, 26, '2020-09-23 11:42:53', 1),
(127, 26, '2020-09-23 11:50:32', 1),
(128, 26, '2020-09-23 12:10:12', 1),
(129, 26, '2020-09-23 16:21:31', 1),
(130, 26, '2020-09-24 09:40:51', 1);

-- --------------------------------------------------------

--
-- Table structure for table `detail_commande`
--

CREATE TABLE `detail_commande` (
  `id_detail_commande` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  `titre_article` varchar(100) NOT NULL,
  `quantite_article` int(11) NOT NULL,
  `id_commande` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `detail_commande`
--

INSERT INTO `detail_commande` (`id_detail_commande`, `id_article`, `titre_article`, `quantite_article`, `id_commande`) VALUES
(98, 13, 'Project issue 1', 1, 107),
(99, 6, 'CRAP ZINE volume 5', 1, 108),
(100, 10, 'Project issue 4', 1, 108),
(101, 9, 'Project issue 5', 1, 109),
(102, 1, 'Peter Markli', 1, 110),
(103, 1, 'Peter Markli', 1, 111),
(104, 2, 'Silences éloquents', 1, 112),
(105, 1, 'Peter Markli', 2, 113),
(106, 6, 'CRAP ZINE volume 5', 1, 114),
(107, 1, 'Peter Markli', 2, 115),
(108, 1, 'Peter Markli', 1, 116),
(109, 15, 'Musique & lutte des classes', 2, 117),
(110, 15, 'Musique & lutte des classes', 1, 119),
(111, 14, 'Une autre histoire du DIY', 1, 120),
(112, 14, 'Une autre histoire du DIY', 1, 121),
(113, 14, 'Une autre histoire du DIY', 1, 122),
(114, 15, 'Musique & lutte des classes', 1, 123),
(115, 15, 'Musique & lutte des classes', 1, 124),
(116, 2, 'Silences éloquents', 1, 125),
(117, 1, 'Peter Markli', 1, 126),
(118, 1, 'Peter Markli', 1, 127),
(119, 4, 'Simplifions', 1, 127),
(120, 15, 'Musique & lutte des classes', 1, 128),
(121, 1, 'Peter Markli', 1, 129),
(122, 10, 'Project issue 4', 1, 129),
(123, 9, 'Project issue 5', 1, 130);

-- --------------------------------------------------------

--
-- Table structure for table `facture`
--

CREATE TABLE `facture` (
  `id_facture` int(11) NOT NULL,
  `id_commande` int(11) NOT NULL,
  `nbr_total_articles` int(11) NOT NULL,
  `prix_total_articles` float NOT NULL,
  `prix_livraison` float NOT NULL,
  `id_livraison` int(11) NOT NULL,
  `adresse_facturation` varchar(255) NOT NULL,
  `prix_total` float NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `date_facturation` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `facture`
--

INSERT INTO `facture` (`id_facture`, `id_commande`, `nbr_total_articles`, `prix_total_articles`, `prix_livraison`, `id_livraison`, `adresse_facturation`, `prix_total`, `id_utilisateur`, `date_facturation`) VALUES
(32, 107, 1, 16, 3.9, 3, 'la creux', 19.9, 27, '2020-09-06 10:29:45'),
(33, 108, 2, 26, 3.9, 0, '27 chemin modigliani 83260 la Crau', 29.9, 27, '2020-09-06 12:24:19'),
(34, 109, 1, 20, 5.9, 2, 'la crau', 25.9, 27, '2020-09-06 12:35:27'),
(35, 110, 1, 48, 5.9, 2, 'nadia', 53.9, 27, '2020-09-06 13:19:04'),
(36, 111, 1, 48, 5.9, 2, 'la crau', 53.9, 27, '2020-09-07 21:22:19'),
(37, 113, 2, 96, 7.9, 3, 'mla ville de marseille', 103.9, 27, '2020-09-21 15:51:59'),
(38, 115, 2, 96, 5.9, 2, 'la crau', 101.9, 26, '2020-09-22 18:16:19'),
(39, 126, 1, 48, 5.9, 2, 'rue de la paix', 53.9, 26, '2020-09-23 11:42:53'),
(40, 127, 2, 68, 5.9, 2, 'rue de la paix 13001 marseille', 73.9, 26, '2020-09-23 11:50:32'),
(41, 128, 1, 6, 5.9, 2, 'rue de la plateforme 13001 marseille', 11.9, 26, '2020-09-23 12:10:12'),
(42, 129, 2, 64, 5.9, 2, 'rue de la paix 13001 marseille', 69.9, 26, '2020-09-23 16:21:31'),
(43, 130, 1, 20, 3.9, 1, 'rue de la paix 13001 marseille', 23.9, 26, '2020-09-24 09:40:51');

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
(0, 0, 'uploads/image_default.jpg'),
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
(13, 13, 'uploads/PROJECT_Issue-1_Front-Cover.jpg'),
(14, 14, 'uploads/le gospel-diy.jpg'),
(15, 15, 'uploads/le gospel-lutte des classes.jpg'),
(16, 16, 'uploads/versionbigcartel.jpg'),
(17, 17, 'uploads/couvBC.jpg'),
(18, 18, 'uploads/coverphenix.jpg'),
(19, 19, 'uploads/kxeny.jpg'),
(20, 20, 'uploads/slash.jpg'),
(21, 21, 'uploads/abc.jpg'),
(22, 22, 'uploads/az.jpg'),
(23, 23, 'uploads/faille.jpg'),
(24, 24, 'uploads/juice.jpg'),
(25, 25, 'uploads/biscoto.jpg'),
(26, 26, 'uploads/labas.png'),
(27, 27, 'uploads/rencontre.png'),
(28, 28, 'uploads/leculte.png'),
(29, 29, 'uploads/longcourci.png'),
(30, 30, 'uploads/So-Young-27.jpg'),
(31, 31, 'uploads/So-young-26.jpg'),
(32, 32, 'uploads/So-young-25.jpg'),
(33, 33, 'uploads/So-young-24.jpg'),
(34, 34, 'uploads/So-young-23.jpg'),
(35, 35, 'uploads/So-young-22.jpg'),
(36, 36, 'uploads/Les-vies-imaginaires.jpg');

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
  `id_distributeur` int(11) NOT NULL,
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
(7, 'nad@gmail.com'),
(20, 'nana@gmail.com'),
(21, 'nad@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `news_index`
--

CREATE TABLE `news_index` (
  `id_news` int(11) NOT NULL,
  `text_news` text NOT NULL,
  `date_news` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news_index`
--

INSERT INTO `news_index` (`id_news`, `text_news`, `date_news`) VALUES
(1, 'edition spéciale rentrée littéraire à paraitre le 05 septembre 2020', '2020-08-31 09:00:15'),
(2, 'super news', '2020-08-31 17:29:08'),
(3, 'super news', '2020-08-31 17:31:56'),
(4, 'super news', '2020-08-31 17:32:05');

-- --------------------------------------------------------

--
-- Table structure for table `sous_categorie`
--

CREATE TABLE `sous_categorie` (
  `id_sous_categorie` int(11) NOT NULL,
  `nom_sous_categorie` varchar(255) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `date_registration` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sous_categorie`
--

INSERT INTO `sous_categorie` (`id_sous_categorie`, `nom_sous_categorie`, `id_categorie`, `date_registration`) VALUES
(1, 'brutalisme', 2, '2020-09-02 16:31:36'),
(2, 'architectes', 2, '2020-09-02 16:31:36'),
(3, 'street art', 4, '2020-09-02 16:31:36'),
(4, 'science-fiction', 3, '2020-09-02 16:31:36'),
(5, 'trap', 1, '2020-09-02 16:31:36'),
(6, 'généraliste', 1, '2020-09-02 16:31:36'),
(7, 'auto-fiction', 3, '2020-09-02 16:31:36'),
(8, 'installations', 2, '2020-09-02 16:31:36'),
(9, 'théorie', 2, '2020-09-02 16:31:36'),
(10, 'indépendante', 1, '2020-09-02 16:31:36'),
(11, 'illustrations', 5, '2020-09-02 16:31:36'),
(12, 'bd ', 6, '2020-09-02 16:31:36'),
(13, 'manga', 6, '2020-09-02 16:31:36');

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
(1, 1, 47, '2020-09-23 16:21:31'),
(2, 2, 20, '2020-09-23 11:39:47'),
(3, 3, 0, '2020-09-03 12:15:53'),
(4, 4, 42, '2020-09-23 11:50:32'),
(5, 5, 50, '2020-08-14 15:22:15'),
(6, 6, 47, '2020-09-22 17:24:45'),
(7, 7, 100, '2020-08-14 15:22:15'),
(8, 8, 19, '2020-09-06 10:13:23'),
(9, 9, 36, '2020-09-24 09:40:51'),
(10, 10, 32, '2020-09-23 16:21:31'),
(11, 11, 25, '2020-08-14 15:22:15'),
(12, 12, 29, '2020-09-06 10:13:23'),
(13, 13, 29, '2020-09-06 10:29:45'),
(14, 14, 26, '2020-09-23 11:29:29'),
(15, 15, 23, '2020-09-23 12:10:12'),
(16, 16, 78, '2020-09-23 12:10:12'),
(17, 17, 100, '2020-09-23 12:10:12'),
(18, 18, 67, '2020-09-23 12:10:12'),
(19, 19, 98, '2020-09-23 12:10:12'),
(20, 20, 76, '2020-09-23 12:10:12'),
(21, 21, 43, '2020-09-23 12:10:12'),
(22, 22, 20, '2020-09-23 12:10:12'),
(23, 23, 67, '2020-09-23 12:10:12'),
(24, 24, 32, '2020-09-23 12:10:12'),
(25, 25, 11, '2020-09-23 12:10:12'),
(26, 26, 11, '2020-09-23 12:10:12'),
(27, 27, 76, '2020-09-23 12:10:12'),
(28, 28, 13, '2020-09-23 12:10:12'),
(29, 29, 34, '2020-09-23 12:10:12'),
(30, 30, 43, '2020-09-23 12:10:12'),
(31, 31, 43, '2020-09-23 12:10:12'),
(32, 32, 67, '2020-09-23 12:10:12'),
(33, 33, 43, '2020-09-23 12:10:12'),
(34, 34, 98, '2020-09-23 12:10:12'),
(35, 35, 54, '2020-09-23 12:10:12'),
(38, 36, 23, '2020-09-23 12:10:12');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id_transaction` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_commande` int(11) NOT NULL,
  `total_transaction` float NOT NULL,
  `date_transaction` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id_transaction`, `id_utilisateur`, `id_commande`, `total_transaction`, `date_transaction`) VALUES
(18, 27, 106, -23.9, '2020-09-21 18:47:53'),
(19, 27, 107, 19.9, '2020-09-06 10:29:45'),
(20, 27, 108, 29.9, '2020-09-06 12:24:19'),
(21, 27, 109, 25.9, '2020-09-06 12:35:27'),
(22, 27, 110, 53.9, '2020-09-06 13:19:04'),
(23, 27, 111, 53.9, '2020-09-07 21:22:19'),
(24, 27, 112, 27.9, '2020-09-21 15:50:01'),
(25, 27, 113, 103.9, '2020-09-21 15:51:59'),
(26, 26, 114, 17.9, '2020-09-22 17:24:45'),
(27, 26, 115, 101.9, '2020-09-22 18:16:19'),
(28, 26, 116, 51.9, '2020-09-22 18:29:32'),
(29, 26, 117, 15.9, '2020-09-23 11:11:33'),
(30, 26, 118, 5.9, '2020-09-23 11:16:07'),
(31, 26, 119, 9.9, '2020-09-23 11:19:33'),
(32, 26, 120, 9.9, '2020-09-23 11:22:27'),
(33, 26, 121, 9.9, '2020-09-23 11:26:37'),
(34, 26, 122, 11.9, '2020-09-23 11:29:29'),
(35, 26, 123, 9.9, '2020-09-23 11:32:50'),
(36, 26, 124, 9.9, '2020-09-23 11:33:26'),
(37, 26, 125, 27.9, '2020-09-23 11:39:47'),
(38, 26, 126, 53.9, '2020-09-23 11:42:53'),
(39, 26, 127, 73.9, '2020-09-23 11:50:32'),
(40, 26, 128, 11.9, '2020-09-23 12:10:12'),
(41, 26, 129, 69.9, '2020-09-23 16:21:31'),
(42, 26, 130, 23.9, '2020-09-24 09:40:51');

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
(18, 'admin', 'admin', 'Non genré', '0123456789', 'admin-test@gmail.com', '$2y$10$vIuhFdiwg7pWb/UR1iiboeJ8ubALuVwhoBvl2N3LZi2205CVeHjdO', 0, '2020-08-26 08:49:21'),
(25, 'nana', 'nana', 'Femme', '0123456789', 'nana1@gmail.com', '$2y$10$DfJ1P2Gs8QrpLGKj8.hqLe5mktgao8YMkf5RcJaNgWu3ZWQiQwYVy', 0, '2020-08-26 09:15:27'),
(26, 'nana', 'nana', 'Femme', '0123456789', 'nana@gmail.com', '$2y$10$l0OHzipjRD90JJPkQTRZvOa515BJkDMZki.Osj9d26IXDmjRfAtny', 0, '2020-08-26 09:16:41'),
(27, 'nad', 'mad', 'Non genré', '0123456789', 'nad@gmail.com', '$2y$10$iZbh1MPAT04hkMiBisu9sOLQ12DMeIIKq4dYlyIxOAb8m6JvRHqgi', 1, '2020-08-27 15:52:50');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id_wishlist` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  `date_registration` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id_wishlist`, `id_utilisateur`, `id_article`, `date_registration`) VALUES
(1, 1, 2, '2020-09-03 11:14:29'),
(2, 1, 2, '2020-09-03 11:14:29'),
(3, 1, 2, '2020-09-03 11:14:29'),
(4, 1, 2, '2020-09-03 11:14:29'),
(5, 1, 2, '2020-09-03 11:14:29'),
(6, 1, 2, '2020-09-03 11:14:29'),
(7, 1, 2, '2020-09-03 11:14:29'),
(8, 1, 2, '2020-09-03 11:14:29'),
(9, 1, 2, '2020-09-03 11:14:29');

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
-- Indexes for table `detail_commande`
--
ALTER TABLE `detail_commande`
  ADD PRIMARY KEY (`id_detail_commande`);

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
-- Indexes for table `news_index`
--
ALTER TABLE `news_index`
  ADD PRIMARY KEY (`id_news`);

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
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id_transaction`);

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
  MODIFY `id_article` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `commande`
--
ALTER TABLE `commande`
  MODIFY `id_commande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `detail_commande`
--
ALTER TABLE `detail_commande`
  MODIFY `id_detail_commande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `facture`
--
ALTER TABLE `facture`
  MODIFY `id_facture` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `image_article`
--
ALTER TABLE `image_article`
  MODIFY `id_image_article` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

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
  MODIFY `id_newsletter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `news_index`
--
ALTER TABLE `news_index`
  MODIFY `id_news` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sous_categorie`
--
ALTER TABLE `sous_categorie`
  MODIFY `id_sous_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id_stock` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id_transaction` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id_wishlist` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
