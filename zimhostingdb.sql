-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 10 mai 2021 à 23:29
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `zimhosting`
--

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

CREATE TABLE `avis` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `commentaire` text NOT NULL,
  `repondue` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_avis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `blog_poste`
--

CREATE TABLE `blog_poste` (
  `id` int(11) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `fonds` varchar(255) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `article` text NOT NULL,
  `id_article` varchar(255) NOT NULL,
  `actif` varchar(255) NOT NULL,
  `date_article` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id` int(11) NOT NULL,
  `id_page` varchar(255) NOT NULL,
  `name_page` varchar(255) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `actif` varchar(255) NOT NULL,
  `id_commentaire` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `forum_reponses`
--

CREATE TABLE `forum_reponses` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `correspondance_sujet` varchar(255) NOT NULL,
  `date_reponse` timestamp NOT NULL DEFAULT current_timestamp(),
  `actif` varchar(255) NOT NULL,
  `id_reponses` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'text'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `forum_sujet`
--

CREATE TABLE `forum_sujet` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `date_derniere_reponse` timestamp NOT NULL DEFAULT current_timestamp(),
  `actif` varchar(255) NOT NULL,
  `id_sujet` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `ip_client`
--

CREATE TABLE `ip_client` (
  `id` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `appareil` varchar(255) NOT NULL,
  `navigateur` varchar(255) NOT NULL,
  `pays` varchar(255) NOT NULL,
  `connexions` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `lastconnexion` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `search_data`
--

CREATE TABLE `search_data` (
  `id` int(11) NOT NULL,
  `element` varchar(255) NOT NULL,
  `article` varchar(255) NOT NULL,
  `contenue` text NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `id_sujet` varchar(255) NOT NULL,
  `actif` varchar(255) NOT NULL,
  `data_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `search_data`
--

INSERT INTO `search_data` (`id`, `element`, `article`, `contenue`, `auteur`, `link`, `id_sujet`, `actif`, `data_date`) VALUES
(1, 'zone du geek', 'Installer une rom Android personnalisé sur un smartphone', 'Personnaliser votre téléphone Android par une version personnaliser d’Android vous intéresserait, alors que vous connaissez rien en ce type de manipulation. Ce tutoriel est donc fait pour vous et c\'est le moment de vous l\'apprendre...', 'zimhosting', 'geek/installer-une-rom-android-personnalisé-sur-un-smartphone.php', 'zimhosting001', 'yes', '2021-05-10 21:24:45'),
(2, 'zone du geek', 'Comment réaliser son propre chargeur USB, Chapitre 1 ', 'Hey les Web viewer comment allez-vous en ce moment. Bon il y a peu de temps sur ce site je vous avais fait un cours sur \"comment coder une page en HTML\" ,je vous est parlé des bases du langage. Et bien la, accrochée vous bien parce que aujourd’hui nous allons parler électronique et principalement, je vais vous montrer comment réaliser un chargeur USB...', 'zimhosting', 'geek/comment-réaliser-son-propre-chargeur-usb-chapitre1.php', 'zimhosting002', 'yes', '2021-05-10 21:24:45'),
(3, 'zone du geek', 'Comment réaliser son propre chargeur USB, Chapitre 2', 'Dans le chapitre précédent je vous est parlé du principal intérêt que créer son propre chargeur pouvait avoir et du coup dans ce chapitre il est temps que je vous parle de toute la partie théorique concernant la réalisation du chargeur...', 'zimhosting', 'geek/comment-réaliser-son-propre-chargeur-usb-chapitre2.php', 'zimhosting003', 'yes', '2021-05-10 21:24:45'),
(4, 'zone du geek', 'Comment réaliser son propre chargeur USB, Chapitre 3', 'Hey me revoilà de retours. Dans le chapitre précédent je vous avais parlé de la théorie sur la réalisation d\'un chargeur USB et donc c\'est parti nous allons passer à la face de réalisation de la carte avec les finitions du produit finale...', 'zimhosting', 'geek/comment-réaliser-son-propre-chargeur-usb-chapitre3.php', 'zimhosting004', 'yes', '2021-05-10 21:24:45'),
(5, 'zone du geek', 'Developper un site web en html, css, php et JS, Chapitre 1', ' Hey les internautes, comment allez-vous aujourd’hui. Bon je pense que si vous avez découvert mon site internet et bien vous avez été curieux de découvrir ce qu’il y avait dessus. Mais vous vous êtes déjà demandé comment il était programmé. Et bien c\'est ce que nous allons voir dans ce tutoriel.\r\n\r\nJe pense que vous êtes pressée de savoir quels sont les différents éléments que nous allons avoir besoin afin de réaliser un site et bien préparez vous. Oui car c\'est ce que nous allons voir dans le tutoriel d’aujourd’hui.\r\n\r\nCommencent par parler des principaux langages composent la base d\'un site. Parmi ces différents langages nous allons retrouver le HTML, le CSS, le PHP et puis le JavaScript. Sachant que le HTML reste le langage le plus fondamental concernent la réalisation d\'une pages web et bien pour commencer ce cours et nous allons principalement nous concentrer sur ce langage. Mais après nous verront aussi le CSS, PHP et le JavaScript. Parce que oui vous verrez que chacun de ces langages à un rôle particulier dans un site web...', 'zimhosting', 'geek/developper-un-site-web-en-html-css-php-et-javascript-chapitre1.php', 'zimhosting005', 'yes', '2021-05-10 21:24:45'),
(6, 'zone de jeux', 'Hextris', 'Play...', 'zimhosting', 'game/hextris/', 'zimgosting006', 'yes', '2021-05-10 21:24:45'),
(7, 'zone de jeux', 'Snake', 'Commencer à jouer...', 'zimhosting', 'game/snake/', 'zimhosting007', 'yes', '2021-05-10 21:24:45');

-- --------------------------------------------------------

--
-- Structure de la table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `parametre` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `setting`
--

INSERT INTO `setting` (`id`, `parametre`, `value`) VALUES
(1, 'pageytbdisplay', 'no'),
(2, 'pagecvdisplay', 'no');

-- --------------------------------------------------------

--
-- Structure de la table `sociale_compte_statue`
--

CREATE TABLE `sociale_compte_statue` (
  `id` int(11) NOT NULL,
  `name_compte` varchar(255) NOT NULL,
  `with_compte` varchar(255) NOT NULL,
  `statue_friends` varchar(255) NOT NULL,
  `date_statue_friends` varchar(255) NOT NULL,
  `statue_follow` varchar(255) NOT NULL,
  `date_statue_follow` varchar(255) NOT NULL,
  `actif` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `sociale_discussions`
--

CREATE TABLE `sociale_discussions` (
  `id` int(11) NOT NULL,
  `emetteur` varchar(255) NOT NULL,
  `destinataire` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `date_message` timestamp NOT NULL DEFAULT current_timestamp(),
  `actif` varchar(255) NOT NULL,
  `id_message` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `sociale_poste`
--

CREATE TABLE `sociale_poste` (
  `id` int(11) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `poste` text NOT NULL,
  `confidentiality` varchar(255) NOT NULL,
  `date_poste` timestamp NOT NULL DEFAULT current_timestamp(),
  `actif` varchar(255) NOT NULL,
  `id_poste` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `profil_picture` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `actif` varchar(255) NOT NULL,
  `cle` varchar(255) NOT NULL,
  `recoverycle` varchar(255) NOT NULL,
  `recoverydate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `pseudo`, `prenom`, `nom`, `password`, `class`, `profil_picture`, `date`, `actif`, `cle`, `recoverycle`, `recoverydate`) VALUES
(1, 'administrateur@zimhosting.fr', 'administrateur', 'Emile', 'Zimmer', '$2y$12$VZ/tjDF0OQRuypUmyTC2LugPuQFlN744uvaY3lDnfAtOzQrbcyW8m', 'administrateur', '<img id=\'profil-picture\' src=\'../img/default-icon-users.png\'>', '2021-02-23 20:17:18', 'yes', '01e52a0cf4d6b5277e306d68247b933f', '01e52a0cf4d6b5277e306d68247b933f', '2021-02-23 08:17:18');

-- --------------------------------------------------------

--
-- Structure de la table `users_data`
--

CREATE TABLE `users_data` (
  `id` int(11) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `data_link` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `data_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_data` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `avis`
--
ALTER TABLE `avis`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `blog_poste`
--
ALTER TABLE `blog_poste`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `forum_reponses`
--
ALTER TABLE `forum_reponses`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `forum_sujet`
--
ALTER TABLE `forum_sujet`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ip_client`
--
ALTER TABLE `ip_client`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `search_data`
--
ALTER TABLE `search_data`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sociale_compte_statue`
--
ALTER TABLE `sociale_compte_statue`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sociale_discussions`
--
ALTER TABLE `sociale_discussions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sociale_poste`
--
ALTER TABLE `sociale_poste`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `pseudo` (`pseudo`);

--
-- Index pour la table `users_data`
--
ALTER TABLE `users_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `avis`
--
ALTER TABLE `avis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `blog_poste`
--
ALTER TABLE `blog_poste`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `forum_reponses`
--
ALTER TABLE `forum_reponses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `forum_sujet`
--
ALTER TABLE `forum_sujet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `ip_client`
--
ALTER TABLE `ip_client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `search_data`
--
ALTER TABLE `search_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `sociale_compte_statue`
--
ALTER TABLE `sociale_compte_statue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sociale_discussions`
--
ALTER TABLE `sociale_discussions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sociale_poste`
--
ALTER TABLE `sociale_poste`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `users_data`
--
ALTER TABLE `users_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
