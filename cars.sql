-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  lun. 18 sep. 2017 à 18:07
-- Version du serveur :  10.1.26-MariaDB
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `cars`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997');

-- --------------------------------------------------------

--
-- Structure de la table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `posted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `blog`
--

INSERT INTO `blog` (`id`, `title`, `url`, `content`, `posted_at`) VALUES
(1, 'Essai, Ford Focus RS option Pack Performance : l’art de la courbe', 'ford', 'Depuis Juin, la déjà célèbre Ford Focus RS, se voit dotée (en option) d’un pack performance, alors plus de puissance ? Non, c’est la même ! Mais de toute façon, avec ses 350 ch, elle était déjà suffisante.\r\n\r\nEn fait, l’amélioration est surtout destinée au pilote : avec un meilleur grip en courbe, l’auto procure encore plus de plaisir au volant.', '2017-09-01 11:10:13'),
(2, 'Interdite en France : essai, Mustang Shelby GT 350 R (Vlog)', 'mustang', 'Aujourd’hui, on vous propose la plus puissante des Mustang Shelby V8 ! La Ford Mustang Shelby GT 350 R dont l’homologation ne permet pas d’être commercialisée en France restera donc rare sur nos routes.', '2017-09-02 15:32:37'),
(3, 'Essai, Mazda CX-5 2017 : en embuscade !', 'mazda', 'Dans la jungle des SUV familiaux, Mazda faisait jusque là un peu office d’outsider avec un CX-5 plus vraiment au goût du jour face à une concurrence de plus en plus fournie. De façon à affronter ses nombreux rivaux et mieux s’inscrire dans la gamme du constructeur, le SUV nippon vient de se mettre à jour à tous les niveaux. A-t-il désormais les armes pour briller et se démarquer dans ce segment si concurrentiel ?', '2017-09-03 10:24:36'),
(4, 'Essai vidéo : nouveau Mazda CX-5 diesel 175 ch (Vlog)', 'mazdacx', 'Victor, notre essayeur auto, teste cette semaine le nouveau Mazda CX-5 et son diesel de 175 ch. Le constructeur japonais a re-travaillé en profondeur le style de son SUV pour relancer ses ventes…\r\n\r\n', '2017-09-04 14:15:13');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `created_at` datetime NOT NULL,
  `blog_id` int(11) NOT NULL,
  `online` int(11) NOT NULL,
  `url_blog` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `name`, `comment`, `created_at`, `blog_id`, `online`, `url_blog`) VALUES
(1, 'Cyril', 'Amateur de belles mécaniques, mon rêve de gamin : avoir la vie de Magnum mais sans la moustache. Ma voiture préférée : Rolls Royce Wraith. Ma voiture de rêve : Ferrari 250 california châssis court.', '2017-09-05 11:33:15', 1, 0, 'ford'),
(2, 'Flow', 'Fondateur et rédacteur, passionné d\'automobile, mon rêve de gamin : pilote essayeur, designer, et plusieurs milliers de rêves... Ma voiture préférée : une Maserati Quattroporte GTS. Bienvenue dans notre univers automobile et moto légèrement déjanté ;-)', '2017-09-05 08:15:23', 2, 0, 'mustang'),
(3, 'Blog Mazda', 'La Mazda se démarque avec cette CX-5 2.2 SKYACTIV dont le look et la dynamique des roues motrices se démarquent de la concurrence ce qui est vraiment à saluer pour cette nippone qui a longtemps cherché à trouver sa place sur le marché Select des « tout à faire ». Au final on peut dire que c’est mission réussie !', '2017-09-04 14:12:27', 3, 1, 'mazda'),
(4, 'Flow', 'Objectivement bien sûr. Pour dire vrai c’est un bon véhicule SUV polyvalent avec un bon rapport Qualité/prix/équipement. Seuls le comportement dynamique et une consommation élevée abaissent la note. Côté fiabilité avec ce moteur 2.2d et sa distribution à chaîne (non courroie), il n’y aura pas de problème sur ce point. L’avenir nous le dira.', '2017-09-06 09:30:24', 3, 1, 'mazda'),
(5, 'Flow', 'Fondateur et rédacteur, passionné d\'automobile, mon rêve de gamin : pilote essayeur, designer, et plusieurs milliers de rêves... Ma voiture préférée : une Maserati Quattroporte GTS. Bienvenue dans notre univers automobile et moto légèrement déjanté ;-)', '2017-09-07 10:14:29', 4, 0, 'mazdacx');

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `reset` varchar(255) DEFAULT NULL,
  `token_confirmed` varchar(255) DEFAULT NULL,
  `created_at` date NOT NULL,
  `confirmed` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `reset`, `token_confirmed`, `created_at`, `confirmed`) VALUES
(1, 'guillaume', 'gdussart1@gmail.com', '$2y$10$2ocQNXVgxrDFxG3UWwOIC.IzSOmpu6rITuOpyPqhegfAD3U0BGtae', NULL, NULL, '2017-09-16', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
