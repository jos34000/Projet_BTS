-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 02 juin 2023 à 13:28
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet_bts`
--

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id_message` int(100) NOT NULL,
  `titre_message` varchar(25) CHARACTER SET utf32 COLLATE utf32_general_ci NOT NULL,
  `texte_message` varchar(500) CHARACTER SET utf32 COLLATE utf32_general_ci NOT NULL,
  `date_message` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id_message`, `titre_message`, `texte_message`, `date_message`, `id_user`) VALUES
(1, 'Test de l\'admin', 'C\'est le test pour voir les messages !', '2023-05-31 11:23:02', 1),
(2, 'Test numéro 2', 'Hey, c\'est le second test pour voir à quoi ressemble le 2e message! D\'ailleurs ce message va être long !\r\n\r\n1-Lorem ipsum, dolor sit amet consectetur adipisicing elit. Libero, suscipit consectetur? Hic mollitia a vitae quaerat quos neque repellendus aspernatur ducimus cum, architecto, adipisci fugit nesciunt accusantium deleniti voluptatibus beatae?\r\n\r\n2- Lorem ipsum, dolor sit amet consectetur adipisicing elit. Libero, suscipit consectetur? Hic mollitia a vitae quaerat quos neque repellendus as', '2023-05-31 22:56:57', 1),
(6, 'Test nouveau message', 'XD', '2023-06-01 08:21:23', 1);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_user` int(11) NOT NULL,
  `pseudo_user` varchar(50) CHARACTER SET utf32 COLLATE utf32_general_ci NOT NULL,
  `mdp_user` varchar(50) CHARACTER SET utf32 COLLATE utf32_general_ci NOT NULL,
  `email_user` varchar(50) CHARACTER SET utf32 COLLATE utf32_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_user`, `pseudo_user`, `mdp_user`, `email_user`) VALUES
(1, 'admin', 'admin', 'admin@admin.com');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id_message`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id_message` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
