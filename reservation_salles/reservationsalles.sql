-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 19 jan. 2021 à 17:23
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `reservationsalles`
--

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `debut` datetime NOT NULL,
  `fin` datetime NOT NULL,
  `id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`id`, `titre`, `description`, `debut`, `fin`, `id_utilisateur`) VALUES
(137, 'psls', 'slslls', '2021-01-14 09:00:00', '2021-01-14 10:00:00', 21),
(138, 'ouziei', 'ouzieiei', '2021-01-15 10:00:00', '2021-01-15 11:00:00', 21),
(139, 'dldkdldl', 'slslslsl', '2021-01-14 10:00:00', '2021-01-14 11:00:00', 21),
(140, 'skkskks', 'sksksk', '2021-01-21 10:00:00', '2021-01-21 11:00:00', 21),
(141, 'sportifff', 'ceci un est fuckinnnggggg test', '2021-01-22 10:00:00', '2021-01-22 11:00:00', 21),
(142, 'kdkdkk', 'kdkdkdk', '2021-01-19 18:00:00', '2021-01-19 19:00:00', 21),
(143, 'etstueide', 'dcndndk', '2021-01-20 09:00:00', '2021-01-20 10:00:00', 21),
(144, 'sss', 'sss', '2021-01-18 09:00:00', '2021-01-18 10:00:00', 21),
(145, 'ouiouill', 'ozddj', '2021-01-25 09:00:00', '2021-01-25 10:00:00', 21),
(146, 'ouiepe', 'slslslls', '2021-01-25 10:00:00', '2021-01-25 11:00:00', 21),
(147, 'attention', 'a toi heheheh', '2021-01-26 10:00:00', '2021-01-26 11:00:00', 21),
(148, 'OEOEOE', 'sosksk', '2021-01-27 09:00:00', '2021-01-27 10:00:00', 21),
(149, 'test', 'sjskk', '2021-01-28 09:00:00', '2021-01-28 10:00:00', 21),
(150, 'ououillele', 'sisisi', '2021-01-29 09:00:00', '2021-01-29 10:00:00', 21),
(152, 'sisiis', 'ososo', '2021-01-28 10:00:00', '2021-01-28 11:00:00', 35),
(153, 'sisi', 'sisiis', '2021-01-28 11:00:00', '2021-01-28 12:00:00', 35),
(154, 'skdiij', 'dkdkdkk', '2021-01-20 10:00:00', '2021-01-20 11:00:00', 35);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`) VALUES
(1, 'sisi', '$2y$10$MTSCA1Em0HnBNedC6YeM9.Erzt9E2Z.q54kiGVE/bb09AF/iDwMN6'),
(3, 'sis', '$2y$10$aqyn.Y/M0twLVOX.P7xsmOdRupv/TpfuaWL7vOO3IwR4xkzABAfYq'),
(6, 'oklm', '$2y$10$ict3CoI5UiWF6UDxe2F06ev.i67v3uQe9tQwnQanOUTQ6lHIyUbDS'),
(9, 'oeoe', '$2y$10$b1bP.suwBqE4DxN2iWRdNu9ASon3kNHwvpUYtFmqgVrqad8thlplG'),
(12, 'koxxkxk', '$2y$10$5nwGhAnRb7pbGVF7TAGwlufZWii8joNWw3GO7EnMnBgJBLowq5pfu'),
(17, 'zorkin', '$2y$10$5urkvTpBEGRmpfQV9PMZveQq7x5ttNk8tMGGWpwGd/npDteRLsfAq'),
(18, 'pipi', '$2y$10$l1l4A/4bf9yip9xMBfBZY.PUKhpx.NMwPnUNkUqLFIzN6vhTC6/fy'),
(19, 'soso', '$2y$10$DSUBsZdjX.EHYyKztL7iwOYRmguht4lUI1aK3jHPSfJPjtma5Rrlq'),
(20, 'kaka', '$2y$10$tRnKRomotLgPYZKUeNviC.23vohYfJpZYKpRmsaxMvYCUD9DrnQQe'),
(21, 'cacas', '$2y$10$xwFi0yWp/Qh4GAWxjhER3.tWv9BwkuAyznuUBiwaCuOV7F6pajHlu'),
(22, 'prout', '$2y$10$ieQKYNZM5/JOv96VUGaDreuJdTC8SxNEAkn5AOsVppCcel6bH.MlO'),
(23, 'testuelle', '$2y$10$wHQkEPJI4mXix4odS9v3E.p/vRmzkwH7DvHe24t2mnfnzZ6eRaucy'),
(24, 'laziz', '$2y$10$y3Vy85ITAeZf7f4pFS8XqOnAmUyJhqqOC8rNouILcIl629W6.4fc2'),
(25, 's', '$2y$10$WxCUWawiSxtgk7wFAgZ9DOaMbIA4iSf4Tu83DP6zUIKR3IjXj5quq'),
(26, 'testuell', 'za'),
(27, 'cacasse', '$2y$10$MavMTRO4BW3N7LfwGEunoumejg8IVo1ZLx0rGKKUDWTcbrhTXJlv.'),
(29, 'mol', '$2y$10$9jRk81Hr7BQUVoSPVFwohOMfT8O7hDZ3eiJJ/Zf.ldM.rcSf7u/8C'),
(30, 'molo', '$2y$10$7iiqezYihXzbFHihmWC2LulpoRsSy/SgVzUV3o0/sLvCRHtD1Zuyu'),
(31, 'moloooo', '$2y$10$/YQjzGvgyTMoerni2nhQX.PdNR1/w0taei.1wYy2IZ3A0TT5kdgdG'),
(32, 'zerrez', '$2y$10$L8Q4cF0zC1CnCHo4/jRX/uWGVtaO4yLyrZ.UwwcG8Dukt1c61uHuK'),
(34, 'ouiokkk', '$2y$10$aBfYjJj7R/xffWrWPsjWdegjvHO1rOa/eU.4Z97kIFrh/KkheieNK'),
(35, 'bilbo', '$2y$10$pDoeoVZzrVgXCaFbs851E.qEZrCtCRGbqhLahQUTsouXcMesEbJM6'),
(38, 'wei', '$2y$10$T4ufA6hp6LI0TsG5C6OQHuAlHhAxdXmkySJpqD4iqRcVdhVtDlk8i'),
(39, 'pile', '$2y$10$umrx1V/mG280pETEtKHL3uebSljyS90a9DoNRggQR7Jht50gTye8G'),
(40, 'caca', '$2y$10$hXfiBF01U5tLzPeBREqxReDY4eX7ykCC4.ephBhdK5bj5eOj6wIYu');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `reservations`
--
ALTER TABLE `reservations`
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
-- AUTO_INCREMENT pour la table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
