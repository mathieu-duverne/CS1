-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 21 avr. 2021 à 16:16
-- Version du serveur :  10.4.18-MariaDB
-- Version de PHP : 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `boutique`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `nom_categorie` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `nom_categorie`) VALUES
(6, 'whisky'),
(7, 'sake'),
(8, 'vodka'),
(9, 'cognac'),
(11, 'armagnac'),
(12, 'rhum'),
(13, 'gin'),
(14, 'absinthe');

-- --------------------------------------------------------

--
-- Structure de la table `client_commande`
--

CREATE TABLE `client_commande` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `telephone` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `addresse` text NOT NULL,
  `addresse_comp` text NOT NULL,
  `ville` varchar(255) NOT NULL,
  `code_postale` int(11) NOT NULL,
  `id_utilisateur` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client_commande`
--

INSERT INTO `client_commande` (`id`, `nom`, `prenom`, `telephone`, `email`, `addresse`, `addresse_comp`, `ville`, `code_postale`, `id_utilisateur`) VALUES
(14, 'duvern', 'mathieu', '0623788863', 'mat.duverne@gmail.com', '83 boulevard du redon', '83 boulevard du redon', 'Marseille', 13009, '15'),
(15, 'duverne', 'mathieu', '0623788863', 'mat.duverne@hotmail.fr', '29 rue de candau', 'siisisisaaaasaasa', 'Avignon', 84000, 'imn86nuhqout1cmli5lp4jjj6s'),
(16, 'duverne', 'zorkin', '0672289809', 'zorkin@gmail.com', '27 rue de yeayii', 'zkjdk;', 'Marseille', 13001, 'onm5412kdvblpurfimfiffntlf'),
(13, 'admin', 'admin', '0678886221', 'mat.duverne@gmail.com', 'apellez-moi sur mon numéro', 'apellez-moi sur mon numéro', 'Marseille', 13001, '0'),
(12, 'duverne', 'mathieu', '0623788863', 'mat.duverne@gmail.com', '83 boulevard du redon', '83 boulevard du redon', 'Marseille', 13009, '14'),
(11, 'duverne', 'mathieu', '0623788863', 'mat.duverne@gmail.com', '83 boulevard du redon', '83 boulevard du redon', 'Marseille', 13009, '14'),
(17, 'dkdfjkldfjdfjkl', 'djiokrfjhjk', '062378863', 'mathieu.duverne@laplateforme.io', '29 rue de saint-tronc', 'derriere le portail', 'Les Angles', 30133, 'pi53v5kn6f0ou9nebt84j5gs6b'),
(18, 'djdjk', 'mathifj', '0621263333', 'mathieu.duverne@laplateforme.io', '29 rue de saint-tronc', 'dlmldm', 'Marseille', 13013, 'rg4818bqf3ejscv9nnacspaq44'),
(19, 'djdjk', 'mathifj', '0621263333', 'mathieu.duverne@laplateforme.io', '29 rue de saint-tronc', 'dlmldm', 'Marseille', 13013, 'rg4818bqf3ejscv9nnacspaq44'),
(20, 'zzdzdzdzd', 'aszszz', '0623554544', 'sdkdkd@ddssd.fr', 'zszzszs', 'zszszszszs', 'Marseille', 13014, '3g1hl2gmcguqb2cneppt6carpd'),
(21, 'huuuuuu', 'fggfffffff', '062378863', 'mathieu.duverne@laplateforme.io', 'ghfh', 'ghghughjh', 'Marseille', 13014, '45cnh3238fje51vdbc8ipl1q3e'),
(22, 'vssvsdvsdvvsdsdv', 'xcvvxcxcvcv', '062378863', 'mathieu.duverne@laplateforme.io', 'djlklzdsdjkjkds', 'egrggrrgrg', 'Marseille', 13001, 'h3uso1d0tkm8hedf58pi4lrl4r'),
(23, 'uyhuygug', 'fgdfj', '0623788863', 'mathieu.duverne@laplateforme.io', 'jhggkgykjh', 'jhjuhluhio', 'Marseille', 13001, 'detd4nq5tavqbdbo9ps1sa6cpa'),
(24, 'dssdfsfdfdssdf', 'rrfrfgzds', '0623788863', 'mat.duverne@gmail.com', 'sdsddsssds', 'sdsddsddd', 'Marseille', 13001, 'cpvtrnkra918lf430otet6mf55'),
(27, 'sdfsdfsdffd', 'edfdssfd', '062378863', 'sdssd@ddzzddzd.fr', 'zdzdzdzdz', 'zdzddzzdzdzd', 'Marseille', 13001, '99mc5l6hlc2oa1uhrk631bgm73'),
(26, 'duverne', 'mathie', '0612354966', 'mat.duverne@gmail.com', 'zssssss', 'zssssss', 'Marseille', 13013, '16'),
(28, 'sdfsdfsdffd', 'ddsdfsdfsdf', '062378863', 'sofiane1ziri@gmail.com', 'ssdssdsdsd', 'sddssdsdsddssdsd', 'Marseille', 13013, 'oakj31pupb5v3hqvcqefjt3rfs'),
(29, 'sisiletes', 'cuntest', '062378863', 'mat.duverne@gmail.com', '3 rue de la rotonde ', 'it\'s mya true address shit ddrrrr grrr', 'Marseille', 13013, 'n4psct9l9q27dfmg4mtldq13c0'),
(30, 'dndnsdfn', 'dfsdfjjksd', '0623788863', 'mathieu.duverne@laplateforme.io', 'dzdsssds', 'sdsdsdsdsd', 'Marseille', 13013, 'qqp84t6fn91i94t7t9eq87vurr'),
(31, 'fsdsdfsdfsdfsdf', 'dssdfsdfsdff', '0623788863', 'mathieu.duverne@laplateforme.io', 'sdsdsdsdsd', 'sdsdsdsdsd', 'Marseille', 13013, 'c535aqfjiggd5uv6em15h577og'),
(32, 'sdsdsddsds', 'sddsdssd', '0623788863', 'mat.duverne@gmail.com', 'sdsdsdsdds', 'dsdssddsds', 'Marseille', 13013, 'mo64k80r0vqfbd9q6u7dotq6be');

-- --------------------------------------------------------

--
-- Structure de la table `code_promo`
--

CREATE TABLE `code_promo` (
  `id` int(11) NOT NULL,
  `code_promo` varchar(20) NOT NULL,
  `promo` int(11) NOT NULL,
  `cart_min_value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `code_promo`
--

INSERT INTO `code_promo` (`id`, `code_promo`, `promo`, `cart_min_value`) VALUES
(1, 'WEB', 40, 0);

-- --------------------------------------------------------

--
-- Structure de la table `droits`
--

CREATE TABLE `droits` (
  `id` int(11) NOT NULL,
  `nom` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `droits`
--

INSERT INTO `droits` (`id`, `nom`) VALUES
(1, 'utilisateurs'),
(909, 'administrateur');

-- --------------------------------------------------------

--
-- Structure de la table `factures`
--

CREATE TABLE `factures` (
  `id` int(11) NOT NULL,
  `numero_commande` varchar(255) NOT NULL,
  `id_client_commande` int(11) NOT NULL,
  `id_utilisateur` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `factures`
--

INSERT INTO `factures` (`id`, `numero_commande`, `id_client_commande`, `id_utilisateur`) VALUES
(61, '96', 26, '16'),
(62, '37', 26, '16'),
(63, '8', 32, 'mo64k80r0vqfbd9q6u7dotq6be'),
(64, '71', 32, 'mo64k80r0vqfbd9q6u7dotq6be'),
(65, '16', 32, 'mo64k80r0vqfbd9q6u7dotq6be'),
(66, '100', 26, '16');

-- --------------------------------------------------------

--
-- Structure de la table `liste_commande`
--

CREATE TABLE `liste_commande` (
  `id` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `id_utilisateur` varchar(255) NOT NULL,
  `quantite` int(11) NOT NULL,
  `statut` int(11) NOT NULL,
  `numero_commande` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `liste_commande`
--

INSERT INTO `liste_commande` (`id`, `id_produit`, `id_utilisateur`, `quantite`, `statut`, `numero_commande`) VALUES
(185, 38, '16', 1, 1, '96'),
(186, 40, '16', 1, 1, '37'),
(187, 39, '16', 1, 1, '100'),
(188, 38, '16', 1, 1, '100'),
(189, 40, '16', 1, 1, '100'),
(190, 41, '16', 1, 1, '100');

-- --------------------------------------------------------

--
-- Structure de la table `liste_commande_cookie`
--

CREATE TABLE `liste_commande_cookie` (
  `id` int(11) NOT NULL,
  `id_produit_cookie` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `id_utilisateur_cookie` varchar(100) NOT NULL,
  `statut` int(11) NOT NULL,
  `numero_commande` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `liste_commande_cookie`
--

INSERT INTO `liste_commande_cookie` (`id`, `id_produit_cookie`, `quantite`, `id_utilisateur_cookie`, `statut`, `numero_commande`) VALUES
(98, 39, 1, 'mo64k80r0vqfbd9q6u7dotq6be', 1, 8),
(99, 39, 1, 'mo64k80r0vqfbd9q6u7dotq6be', 1, 71),
(100, 38, 1, 'mo64k80r0vqfbd9q6u7dotq6be', 1, 71),
(101, 39, 1, 'mo64k80r0vqfbd9q6u7dotq6be', 1, 16);

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `prix` int(11) NOT NULL,
  `image_url` text NOT NULL,
  `stock` int(11) NOT NULL,
  `date_ajout` datetime NOT NULL DEFAULT current_timestamp(),
  `id_categorie` int(11) NOT NULL,
  `id_region` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `nom`, `description`, `prix`, `image_url`, `stock`, `date_ajout`, `id_categorie`, `id_region`) VALUES
(23, 'Talisker', 'Un whisky iodé et fort en bouche provenant de l\'angleterre', 75, 'IMG-602929921aa852.51952212.jpg', 35, '2021-04-17 12:25:46', 6, 8),
(24, 'Paddy', 'Un whisky traditionnel irlandais de la marque mythique, doux et sucré il ravira les amateurs.', 28, 'IMG-602929cbae8b29.83628837.jpg', 46, '2021-04-17 12:25:46', 6, 9),
(25, 'Hennesey', 'Un Cognac de qualité produit dans la célèbre région du même nom, il saura mettre à l\'honneur votre table en apéritif.', 80, 'IMG-60292ad315e6c9.17743705.jpg', 43, '2021-04-17 12:25:46', 9, 10),
(26, 'Clé des Ducs', 'Armagnac traditionnel, très fort, parfait comme digestif après un repas copieux.', 45, 'IMG-60292d021e4f82.90048656.jpg', 40, '2021-04-17 12:25:46', 11, 10),
(27, 'Charette', 'Rhum sucré, élégant et traditionnel, il vous fera voyager au bout du monde.', 45, 'IMG-60292d9e53ab23.04532946.jpg', 60, '2021-04-17 12:25:46', 12, 11),
(28, 'Bombay', 'Gin anglais mythique et son mélange d\'épices incroyable, il ravira votre palet et votre odorat.', 60, 'IMG-60292ddd28ba99.14490329.jpg', 34, '2021-04-17 12:25:46', 13, 12),
(29, 'Poliakov', 'Vodka russe par excellence elle se déguste pur ou se mélange très bien en cocktail.', 45, 'IMG-60292e031dfac9.03637405.jpg', 45, '2021-04-17 12:25:46', 8, 13),
(30, 'Absolut', 'Vodka de qualité, elle se sert on the ice en soirée.', 70, 'IMG-60292e2ce0a556.25459909.jpg', 44, '2021-04-17 12:25:46', 8, 10),
(31, 'Takara', 'Saké traditionnel qui se déguste dans les règles de l\'art.', 80, 'IMG-60292e4adbfd95.64880345.jpg', 40, '2021-04-17 12:25:46', 7, 14),
(32, 'Bercloux', 'Abstinte mythique qui fait tourner la tête des artistes depuis des siècles.', 100, 'IMG-60292e77c9ad39.44179346.jpg', 20, '2021-04-17 12:25:46', 14, 10),
(33, 'Caol Ila', 'Whisky provenant de l\'ile d\'Islay, connue comme étant productrice des meilleurs whisky tourbés au monde.', 75, 'IMG-6029352febf971.01563466.png', 34, '2021-04-17 12:25:46', 6, 8),
(34, 'Boyard', 'Cognac doux et floral il saura mettre en valeur votre apéritif.', 45, 'IMG-602935c763f175.23518157.jpg', 47, '2021-04-17 12:25:46', 9, 10),
(35, 'Goudoulin', 'Armagnac de la region du Gers, charpenté et corsé il est parfait en digestif.', 46, 'IMG-6029363f2afa16.23324033.jpg', 67, '2021-04-17 12:25:46', 11, 10),
(36, 'Gordon', 'Le Gin londonien classique et adoré des anglais.', 30, 'IMG-602936bd35f459.70315606.jpg', 33, '2021-04-17 12:25:46', 13, 12),
(37, 'Citadelle', 'Gin français de la maison citadelle, parfait en cocktail et en aperitif de soirée.', 48, 'IMG-6029373dcefd66.00315259.jpg', 65, '2021-04-17 12:25:46', 13, 10),
(38, 'Explorer', 'Rhum de Guyane très typé, très moderne.', 65, 'IMG-602937c36e8cd1.99173076.jpg', 37, '2021-04-17 12:25:46', 12, 10),
(39, 'Thoreau', 'Thoreau se distingue par une robe dorée aux reflets vieil or. Le nez dévoile une très large palette aromatique complexe et exaltante.', 35, 'IMG-607abdf048ef35.65633699.jpeg', 5, '2021-04-17 12:52:32', 9, 13),
(40, 'napoleon', 'On y trouve une certaines note d\'agrumes patat', 1260, 'IMG-607ad0c67da007.95088588.webp', 2, '2021-04-17 14:12:54', 6, 8),
(41, 'meunier', 'oh celui ci jacqueline estune douceur exscuise je dirais meme qu\'on peux s\'y noyer de la piquete babab', 5, 'IMG-607ad11c4cc486.95359108.jpg', 1500, '2021-04-17 14:14:20', 9, 10);

-- --------------------------------------------------------

--
-- Structure de la table `regions`
--

CREATE TABLE `regions` (
  `id` int(11) NOT NULL,
  `nom_region` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `regions`
--

INSERT INTO `regions` (`id`, `nom_region`) VALUES
(8, 'ecosse'),
(9, 'irlande'),
(10, 'france'),
(11, 'martinique'),
(12, 'angleterre'),
(13, 'russie'),
(14, 'japon');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `login` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_droits` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `email`, `password`, `id_droits`) VALUES
(0, 'admin', 'admin@admin.admi', '$2y$10$znRLoHoJ/FclVRVVxDPs1u6FpJF2T8SSpisQc0M8jyj80pHRE6XoS', 909),
(8, 'modifié', 'mathieu.duverne@laplateforme.io', '$2y$10$tFLaR5UNG5.OqTiLn9nBY.1W/b6IW.MRutUCD4vXhW.iR01NGhyOG', 1),
(9, 'wouhoussse', 'mathieu.duverne@laplateforme.io', '$2y$10$qcmRkN6EjXZ7vfmaEb9zhuEMG0tk1Wc37wsdbD44A5s4h.dkyTv6.', 1),
(10, 'allright', 'mathieu.duverne@laplateforme.io', '$2y$10$.TOE8M927Ih9HeejkPb3Q.TMLvh8Sm.debfiTztMJf6Hp5Vx7I0ci', 1),
(11, 'zorkin30', 'zorkin.zorkin@zorkin.fr', '$2y$10$wVpdNWPVSNnYNrcJsDqYfektvZIkH8dNo3jwWzqG2KIBouGaUzAwK', 1),
(12, 'mat', 'ccarre@hotmail.fr', '$2y$10$xJM1u/JCxVyRUhdf54ojTOlFfR1Jc47Ilv6X7B/qyZaGLXCQ7mhLG', 1),
(14, 'zorkine', 'mat.duverne@gmail.com', '$2y$10$mlLe29slzqCq/0ImjjHj5u2ERAQE3Bmf/XQZ.GEAMRtGdf3j.6veW', 1),
(15, 'shun', 'sun@shun.fr', '$2y$10$BeacXKcSktRjd2njMLBvkuH3YF5pep6XHzUp.2L1A8gIIP4Dq9/oS', 1),
(16, 'zorkin', 'mathieu.duverne@laplateforme.io', '$2y$10$KoZohatCt3wOwNcIvljmVOZKptqpVMuwH3RRWTodsg8R95/PlTaRO', 1),
(17, 'tetardo', 'mathieu.duverne@laplateforme.io', '$2y$10$ewtKRHeNTctv7TcCLarul.Y7p1I1QyqgvuRib2bxkbb1IOnczzEs2', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `client_commande`
--
ALTER TABLE `client_commande`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `code_promo`
--
ALTER TABLE `code_promo`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `droits`
--
ALTER TABLE `droits`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `factures`
--
ALTER TABLE `factures`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `liste_commande`
--
ALTER TABLE `liste_commande`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `liste_commande_cookie`
--
ALTER TABLE `liste_commande_cookie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `client_commande`
--
ALTER TABLE `client_commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT pour la table `code_promo`
--
ALTER TABLE `code_promo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `droits`
--
ALTER TABLE `droits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=910;

--
-- AUTO_INCREMENT pour la table `factures`
--
ALTER TABLE `factures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT pour la table `liste_commande`
--
ALTER TABLE `liste_commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;

--
-- AUTO_INCREMENT pour la table `liste_commande_cookie`
--
ALTER TABLE `liste_commande_cookie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT pour la table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
