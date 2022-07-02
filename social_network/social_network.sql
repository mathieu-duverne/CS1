-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 19 juil. 2021 à 23:38
-- Version du serveur :  10.4.19-MariaDB
-- Version de PHP : 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `social_network`
--

-- --------------------------------------------------------

--
-- Structure de la table `social_chat`
--

CREATE TABLE `social_chat` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL,
  `id_shipper` int(11) NOT NULL,
  `id_recipient` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `social_chat`
--

INSERT INTO `social_chat` (`id`, `message`, `id_shipper`, `id_recipient`, `created_at`) VALUES
(12, 'bonsoir', 33, 1, '2021-07-19 18:17:11'),
(13, 'bonjour monsieur !', 41, 1, '2021-07-19 22:32:21'),
(14, 'hello', 1, 41, '2021-07-19 22:32:29'),
(15, 'okay test bon', 41, 1, '2021-07-19 22:32:39'),
(16, 'qssqqsqsqsqs', 1, 41, '2021-07-19 22:32:44'),
(17, 'qs', 1, 41, '2021-07-19 22:32:49'),
(18, 'qsqsqsqs', 1, 33, '2021-07-19 22:33:01');

-- --------------------------------------------------------

--
-- Structure de la table `social_post`
--

CREATE TABLE `social_post` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `texte` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `social_post`
--

INSERT INTO `social_post` (`id`, `title`, `texte`, `id_user`, `created_at`, `updated_at`) VALUES
(44, 'Teacher Assistant', 'Mollitia et occaecati repellat veritatis. Expedita velit odit corporis alias aliquid iusto. Neque sit odit deserunt quam beatae odit non. Asperiores fugiat quasi provident ea nemo.', 32, '2021-07-19 13:49:13', NULL),
(45, 'Electrical Engineering Technician', 'Ad aut dignissimos consequatur. Adipisci recusandae quia voluptatem sed autem. Et harum ipsam in a cupiditate ullam. Molestiae dolore consectetur ullam voluptas.', 33, '2021-07-19 13:49:13', NULL),
(46, 'Molding Machine Operator', 'Architecto est voluptates hic sed. Aut dolorem debitis et. Sint aut voluptas iure in ratione quia. Dolor sit iure est numquam. Ducimus ut nisi ut.', 34, '2021-07-19 13:49:13', NULL),
(47, 'Precious Stone Worker', 'Est iste est accusantium consequatur. Minus qui deleniti aut soluta unde. Ex magnam temporibus aspernatur.', 35, '2021-07-19 13:49:14', NULL),
(48, 'Airfield Operations Specialist', 'Eligendi officiis sed vel minima iste aut recusandae. Nihil eveniet ipsum cum voluptate numquam consequuntur. Eveniet sint dolor itaque dolore deleniti exercitationem enim.', 36, '2021-07-19 13:49:14', NULL),
(49, 'Surgical Technologist', 'Totam incidunt ad quaerat iste sunt beatae quia. Ut sit nemo omnis odit. Alias nulla eos quod eius voluptatibus. Fuga minus facilis consequatur quod blanditiis. Tenetur asperiores ratione sunt neque.', 37, '2021-07-19 13:49:14', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `social_user`
--

CREATE TABLE `social_user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `surname` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `about` text DEFAULT NULL,
  `avatar_url` varchar(255) NOT NULL,
  `connect_status` varchar(20) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `social_user`
--

INSERT INTO `social_user` (`id`, `firstname`, `surname`, `email`, `role`, `password`, `about`, `avatar_url`, `connect_status`, `created_at`, `updated_at`) VALUES
(1, 'Supers', 'Admin', 'admin@admin.fr', 791801, '$2y$10$Ylms6ueNwcFUUbRAKwFlo.PpTugNJOefMaqGghBXHuTFAzxo/HYC.', NULL, 'IMG-60cd17124ef4b6.52185263.png', 'Active now', '2021-06-22 13:53:08', '2021-06-23 15:44:16'),
(32, 'Estevan', 'Yundt', 'kristofer.ward@turcotte.com', 1, '$2y$10$PC5mU1io4QB3cNvLva4J3.9eDdURDPtSu7v31rsweyRaTjQ5Ulhfq', NULL, 'IMG-60cd17124ef4b6.52185263.png', NULL, '2021-07-19 13:49:13', NULL),
(33, 'velda', 'Daniel', 'rashad43@yahoo.com', 1, '$2y$10$lxXWg/4QFc3sQnT4DLaj.OGEIKZbyvZcJQWKnJ4P3elKH/PfUXsPG', 'sisi abiout me', 'IMG-60cd17124ef4b6.52185263.png', 'Offline now', '2021-07-19 13:49:13', '2021-07-19 18:16:41'),
(34, 'Heidi', 'Schaden', 'gordon17@hotmail.com', 1, '$2y$10$rtkiI87kZfMd5ZhP9DCeI.Xc.FnVIw8CgSscNLJea21eQk7lsSnae', NULL, 'IMG-60cd17124ef4b6.52185263.png', NULL, '2021-07-19 13:49:13', NULL),
(35, 'Reinhold', 'Eichmann', 'kristy97@hotmail.com', 1, '$2y$10$9DSAg46G.h8fi0sCBLxaQ.9xt1dxBtgZDkDvGcJEGT5VN9IqbH1jS', NULL, 'IMG-60cd17124ef4b6.52185263.png', NULL, '2021-07-19 13:49:13', NULL),
(36, 'Augusta', 'Jakubowski', 'hamill.martina@yahoo.com', 1, '$2y$10$BP4Lb5TqjgX1pZXZqUB3O.zwMbWXOE6NpY5I/V1triRZsll.q4SLa', NULL, 'IMG-60cd17124ef4b6.52185263.png', NULL, '2021-07-19 13:49:14', NULL),
(37, 'Nelda', 'Lang', 'llueilwitz@olson.com', 1, '$2y$10$pB2NJ8J8vz70NMtlCfYvaezLHS2OQj4hdGm.W0MeUPqblZOd0mkFe', NULL, 'IMG-60cd17124ef4b6.52185263.png', 'Offline now', '2021-07-19 13:49:14', NULL),
(38, 'Hyman', 'Stamm', 'deon91@yahoo.com', 1, '$2y$10$DDJ2Pr8S4j6BV2oB0C532e495ROXHowCESKbFauRspJEB80VDA5EW', NULL, 'IMG-60cd17124ef4b6.52185263.png', 'Offline now', '2021-07-19 13:49:14', NULL),
(40, 'Brando', 'Erdman', 'janae.cassin@mueller.com', 1, '$2y$10$uz/5oRLob4HaLpYWYgFwtuLDL5/F3HpTufVHXCoVWOjaxgaYh/O0W', NULL, 'IMG-60cd17124ef4b6.52185263.png', 'Offline now', '2021-07-19 13:49:14', NULL),
(41, 'John', 'Doe', 'JohnDoe@doe.fr', 1, '$2y$10$OWOrzaWxLV2s00D/fvf8vuCW2GNF/UjLZbNLj6xwECOicd0zbY6Ou', 'sqqsqs', 'IMG-60cd17124ef4b6.52185263.png', 'Offline now', '2021-07-19 22:24:48', '2021-07-19 22:30:13');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `social_chat`
--
ALTER TABLE `social_chat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `msg` (`id_recipient`),
  ADD KEY `msg2` (`id_shipper`);

--
-- Index pour la table `social_post`
--
ALTER TABLE `social_post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clef_userPOST` (`id_user`);

--
-- Index pour la table `social_user`
--
ALTER TABLE `social_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `social_chat`
--
ALTER TABLE `social_chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `social_post`
--
ALTER TABLE `social_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT pour la table `social_user`
--
ALTER TABLE `social_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `social_chat`
--
ALTER TABLE `social_chat`
  ADD CONSTRAINT `msg` FOREIGN KEY (`id_recipient`) REFERENCES `social_user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `msg2` FOREIGN KEY (`id_shipper`) REFERENCES `social_user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Contraintes pour la table `social_post`
--
ALTER TABLE `social_post`
  ADD CONSTRAINT `clef_userPOST` FOREIGN KEY (`id_user`) REFERENCES `social_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
