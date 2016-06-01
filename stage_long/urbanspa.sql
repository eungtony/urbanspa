-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 01 Juin 2016 à 10:34
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `urbanspa`
--

-- --------------------------------------------------------

--
-- Structure de la table `agenda`
--

CREATE TABLE IF NOT EXISTS `agenda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mois` varchar(20) NOT NULL,
  `contenu` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `agenda`
--

INSERT INTO `agenda` (`id`, `mois`, `contenu`) VALUES
(1, 'Janvier', 'Month 1'),
(2, 'Février', 'Evenement du mois de février'),
(3, 'Mars', 'Des événements au mois de mars'),
(4, 'Avril', 'month4'),
(5, 'Mai', '<p>Ev&egrave;nements du mois de mai</p>\r\n<p>Un truc comme &ccedil;a !</p>\r\n<p>Un autre &eacute;v&eacute;nement cool !</p>'),
(6, 'Juin', 'month6'),
(7, 'Juillet', 'Month7'),
(8, 'Aout', 'Month8'),
(9, 'Septembre', 'month9'),
(10, 'Octobre', 'Month10'),
(11, 'Novembre', 'month11'),
(12, 'Décembre', 'Month12');

-- --------------------------------------------------------

--
-- Structure de la table `cadeaus`
--

CREATE TABLE IF NOT EXISTS `cadeaus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `prenom` text COLLATE utf8_unicode_ci NOT NULL,
  `nom` text COLLATE utf8_unicode_ci NOT NULL,
  `ville` text COLLATE utf8_unicode_ci NOT NULL,
  `code_postal` int(5) NOT NULL,
  `mail` text COLLATE utf8_unicode_ci NOT NULL,
  `numero_telephone` int(11) NOT NULL,
  `code` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `fin_cadeau` date NOT NULL,
  `formule` text COLLATE utf8_unicode_ci NOT NULL,
  `jours` int(11) NOT NULL,
  `type_paiement` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `prix_total` int(11) NOT NULL,
  `adresse` text COLLATE utf8_unicode_ci NOT NULL,
  `debut` date NOT NULL,
  `paye` tinyint(1) NOT NULL,
  `transaction_id` text COLLATE utf8_unicode_ci NOT NULL,
  `payer_id` text COLLATE utf8_unicode_ci NOT NULL,
  `token` text COLLATE utf8_unicode_ci NOT NULL,
  `date_done` tinyint(1) NOT NULL,
  `debut_sejour` date NOT NULL,
  `fin_sejour` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=35 ;

--
-- Contenu de la table `cadeaus`
--

INSERT INTO `cadeaus` (`id`, `created_at`, `updated_at`, `prenom`, `nom`, `ville`, `code_postal`, `mail`, `numero_telephone`, `code`, `fin_cadeau`, `formule`, `jours`, `type_paiement`, `prix_total`, `adresse`, `debut`, `paye`, `transaction_id`, `payer_id`, `token`, `date_done`, `debut_sejour`, `fin_sejour`) VALUES
(32, '2016-05-31 19:04:25', '2016-05-31 19:06:28', 'Tony', 'Eung', 'Troyes', 10000, 'eungtony@outlook.fr', 626941599, 'rnB8n', '2017-05-31', 'base', 2, 'paypal', 410, '3 rue des noëls', '2016-05-31', 1, 'PAY-0B461349AE3300100K5G7YMY', 'NJDMC5SDSDM3U', 'EC-3C920175T9531264B', 1, '2016-06-29', '2016-07-01'),
(33, '2016-06-01 06:12:57', '2016-06-01 06:14:22', 'Tony', 'Eung', 'Troyes', 10000, 'eungtony@outlook.fr', 626941599, 'FyxO9', '2017-06-01', 'base', 2, 'espece', 410, '3 rue des noëls', '2016-06-01', 1, '', '', '', 1, '2016-06-20', '2016-06-22'),
(34, '2016-06-01 06:26:03', '2016-06-01 06:26:03', 'Tony', 'Eung', 'Troyes', 10000, 'eungtony@outlook.fr', 626941599, 'oYyBq', '2017-06-01', 'base', 3, 'paypal', 590, '3 rue des noëls', '2016-06-01', 0, '', '', '', 0, '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `date_reservations`
--

CREATE TABLE IF NOT EXISTS `date_reservations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  `code` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=206 ;

--
-- Contenu de la table `date_reservations`
--

INSERT INTO `date_reservations` (`id`, `date`, `created_at`, `updated_at`, `code`) VALUES
(184, '2016-06-27', '2016-05-31 12:23:46', '2016-05-31 12:23:46', 'FKYPB'),
(185, '2016-06-28', '2016-05-31 12:23:46', '2016-05-31 12:23:46', 'FKYPB'),
(188, '2016-07-13', '2016-05-31 18:44:54', '2016-05-31 18:44:54', 'YS3Cb'),
(189, '2016-07-14', '2016-05-31 18:44:54', '2016-05-31 18:44:54', 'YS3Cb'),
(195, '2016-06-29', '2016-05-31 19:06:27', '2016-05-31 19:06:27', 'rnB8n'),
(196, '2016-06-30', '2016-05-31 19:06:28', '2016-05-31 19:06:28', 'rnB8n'),
(197, '2016-06-09', '2016-06-01 05:09:18', '2016-06-01 05:09:18', 'oHpwz'),
(198, '2016-06-10', '2016-06-01 05:09:18', '2016-06-01 05:09:18', 'oHpwz'),
(199, '2016-06-15', '2016-06-01 05:10:36', '2016-06-01 05:10:36', 'OCWAr'),
(200, '2016-06-16', '2016-06-01 05:10:36', '2016-06-01 05:10:36', 'OCWAr'),
(201, '2016-06-17', '2016-06-01 05:10:36', '2016-06-01 05:10:36', 'OCWAr'),
(202, '2016-06-20', '2016-06-01 06:14:07', '2016-06-01 06:14:07', 'FyxO9'),
(203, '2016-06-21', '2016-06-01 06:14:07', '2016-06-01 06:14:07', 'FyxO9'),
(204, '2016-06-23', '2016-06-01 06:19:12', '2016-06-01 06:19:12', 'wGwz1'),
(205, '2016-06-24', '2016-06-01 06:19:12', '2016-06-01 06:19:12', 'wGwz1');

-- --------------------------------------------------------

--
-- Structure de la table `formules`
--

CREATE TABLE IF NOT EXISTS `formules` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `titre_formule` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `prix` int(11) NOT NULL,
  `titre_formule_ang` text COLLATE utf8_unicode_ci NOT NULL,
  `description_ang` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `image` tinyint(1) NOT NULL,
  `online` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Contenu de la table `formules`
--

INSERT INTO `formules` (`id`, `created_at`, `updated_at`, `titre_formule`, `description`, `prix`, `titre_formule_ang`, `description_ang`, `image`, `online`) VALUES
(1, NULL, '2016-05-31 09:06:09', 'base', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, dolore ducimus est expedita maxime molestias neque nihil nobis reiciendis totam! Accusantium corporis cum eos ex in nobis quam, quia temporibus? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, dolore ducimus est expedita maxime molestias neque nihil nobis reiciendis totam! Accusantium corporis cum eos ex in nobis quam, quia temporibus?</p>', 180, 'basic', '<p>You lived before you met me?! Belligerent and numerous. When I was first asked to make a film about my nephew, Hubert Farnsworth, I thought "Why should I?" Then later, Leela made the film. But if I did make it, you can bet there would have been more topless women on motorcycles. Roll film! Goodbye, friends.</p>', 0, 1),
(2, NULL, '2016-05-31 13:28:09', 'romantique', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, dolore ducimus est expedita maxime molestias neque nihil nobis reiciendis totam! Accusantium corporis cum eos ex in nobis quam, quia temporibus? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, dolore ducimus est expedita maxime molestias neque nihil nobis reiciendis totam! Accusantium corporis cum eos ex in nobis quam, quia temporibus?</p>', 230, 'romantic', '<p>You lived before you met me?! Belligerent and numerous. When I was first asked to make a film about my nephew, Hubert Farnsworth, I thought "Why should I?" Then later, Leela made the film. But if I did make it, you can bet there would have been more topless women on motorcycles. Roll film! Goodbye, friends. I never thought I''d die like this. But I always really hoped.</p>', 0, 1),
(3, NULL, '2016-05-31 09:07:39', 'detente', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, dolore ducimus est expedita maxime molestias neque nihil nobis reiciendis totam! Accusantium corporis cum eos ex in nobis quam, quia temporibus? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, dolore ducimus est expedita maxime molestias neque nihil nobis reiciendis totam! Accusantium corporis cum eos ex in nobis quam, quia temporibus?</p>', 230, 'relaxation', '<p>You lived before you met me?! Belligerent and numerous. When I was first asked to make a film about my nephew, Hubert Farnsworth, I thought "Why should I?" Then later, Leela made the film. But if I did make it, you can bet there would have been more topless women on motorcycles. Roll film! Goodbye, friends. I never thought I''d die like this. But I always really hoped.</p>', 1, 1),
(4, NULL, '2016-05-31 18:39:13', 'gastronomie', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, dolore ducimus est expedita maxime molestias neque nihil nobis reiciendis totam! Accusantium corporis cum eos ex in nobis quam, quia temporibus? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, dolore ducimus est expedita maxime molestias neque nihil nobis reiciendis totam! Accusantium corporis cum eos ex in nobis quam, quia temporibus?</p>', 230, 'gastronomy', '<p>You lived before you met me?! Belligerent and numerous. When I was first asked to make a film about my nephew, Hubert Farnsworth, I thought "Why should I?" Then later, Leela made the film. But if I did make it, you can bet there would have been more topless women on motorcycles. Roll film! Goodbye, friends. I never thought I''d die like this. But I always really hoped.</p>', 0, 0),
(5, '2016-05-28 13:55:16', '2016-05-31 13:31:09', 'Saint Valentin', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At dicta, eaque error excepturi fugiat ipsum labore necessitatibus nulla officia officiis optio placeat praesentium reprehenderit sint tempora tenetur ullam voluptatem voluptatibus</p>', 230, 'Saint Valentin', '<p>You lived before you met me?! Belligerent and numerous. When I was first asked to make a film about my nephew, Hubert Farnsworth, I thought "Why should I?" Then later, Leela made the film. But if I did make it, you can bet there would have been more topless women on motorcycles. Roll film!</p>', 1, 0),
(6, '2016-05-31 13:03:48', '2016-06-01 05:42:47', 'Fête des mères', '<p style="text-align: center;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, dolore ducimus est expedita maxime molestias neque nihil nobis reiciendis totam! Accusantium corporis cum eos ex in nobis quam, quia temporibus? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, dolore ducimus est expedita maxime molestias neque nihil nobis reiciendis totam! Accusantium corporis cum eos ex in nobis quam, quia temporibus?</p>', 230, 'Mothers''s day', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, dolore ducimus est expedita maxime molestias neque nihil nobis reiciendis totam! Accusantium corporis cum eos ex in nobis quam, quia temporibus? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, dolore ducimus est expedita maxime molestias neque nihil nobis reiciendis totam! Accusantium corporis cum eos ex in nobis quam, quia temporibus?</p>', 1, 0),
(10, '2016-05-31 18:34:42', '2016-05-31 18:35:48', '14 juillet', '<p><span style="color: #ebebeb; font-family: caviardreams; font-size: 15px; line-height: 21.4286px; text-align: center; background-color: rgba(0, 0, 0, 0.901961);">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, dolore ducimus est expedita maxime molestias neque nihil nobis reiciendis totam! Accusantium corporis cum eos ex in nobis quam, quia temporibus? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, dolore ducimus est expedita maxime molestias neque nihil nobis reiciendis totam! Accusantium corporis cum eos ex in nobis quam, quia temporibus?</span></p>', 240, 'July 14th', '<p><span style="color: #ebebeb; font-family: caviardreams; font-size: 15px; line-height: 21.4286px; text-align: center; background-color: rgba(0, 0, 0, 0.901961);">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, dolore ducimus est expedita maxime molestias neque nihil nobis reiciendis totam! Accusantium corporis cum eos ex in nobis quam, quia temporibus? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, dolore ducimus est expedita maxime molestias neque nihil nobis reiciendis totam! Accusantium corporis cum eos ex in nobis quam, quia temporibus?</span></p>', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_05_05_113028_create_reservations_table', 1),
('2016_05_05_185400_create_formules_table', 2),
('2016_05_10_115812_create_date_reservations_table', 3),
('2016_05_10_154300_create_options_table', 4),
('2016_05_10_200352_ajout_description_formules', 5),
('2016_05_11_142306_addPayOrNotTransactionId', 6),
('2016_05_23_124530_create_prestations_table', 7),
('2016_05_25_083307_create_cadeaus_table', 7),
('2016_05_30_125653_create_options_resas_table', 8);

-- --------------------------------------------------------

--
-- Structure de la table `options`
--

CREATE TABLE IF NOT EXISTS `options` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `options` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `formule_id` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `infos` text COLLATE utf8_unicode_ci NOT NULL,
  `option_ang` text COLLATE utf8_unicode_ci NOT NULL,
  `infos_ang` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=26 ;

--
-- Contenu de la table `options`
--

INSERT INTO `options` (`id`, `created_at`, `updated_at`, `options`, `formule_id`, `prix`, `infos`, `option_ang`, `infos_ang`) VALUES
(5, NULL, '2016-05-28 12:41:33', 'Pétales de roses', 1, 20, 'Pleins de pétales de rose ....', 'Rose petal', 'Too much work. Let''s burn it and say we dumped it in the sewer.'),
(7, NULL, '2016-05-28 11:53:27', 'Panier gourmand', 1, 50, 'Spécialités locales, fromages, charcuterie, macarons, pain pour 50€ !', '', ''),
(8, NULL, '2016-05-28 11:53:27', 'Panier cinéma', 1, 50, 'DVD, pop-corn, bonbons, boissons pour un panier à 50€ !', '', ''),
(9, NULL, '2016-05-28 11:53:27', 'Panier détente', 1, 50, 'Savon, gommage, huile de massage pour un panier à 50€ !', '', ''),
(15, NULL, NULL, 'Panier gourmand', 2, 50, 'Spécialités locales, fromages, charcuterie, macarons, pain pour 50€ !', '', ''),
(16, NULL, NULL, 'Panier cinéma', 2, 50, 'DVD, pop-corn, bonbons, boissons pour un panier à 50€ !', '', ''),
(17, NULL, NULL, 'Panier détente', 2, 50, 'Savon, gommage, huile de massage pour un panier à 50€ !', '', ''),
(20, NULL, NULL, 'Pétales de roses', 3, 20, '', '', ''),
(21, NULL, NULL, 'Panier gourmand', 3, 50, 'Spécialités locales, fromages, charcuterie, macarons, pain pour 50€ !', '', ''),
(22, NULL, NULL, 'Panier cinéma', 3, 50, 'DVD, pop-corn, bonbons, boissons pour un panier à 50€ !', '', ''),
(23, NULL, NULL, 'Pétales de roses', 4, 20, '', '', ''),
(24, NULL, NULL, 'Panier cinéma', 4, 50, 'DVD, pop-corn, bonbons, boissons pour un panier à 50€ !', '', ''),
(25, NULL, NULL, 'Panier détente', 4, 50, 'Savon, gommage, huile de massage pour un panier à 50€ !', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `options_resas`
--

CREATE TABLE IF NOT EXISTS `options_resas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nom_option` text COLLATE utf8_unicode_ci NOT NULL,
  `reservation_id` int(11) NOT NULL,
  `cadeau_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=37 ;

--
-- Contenu de la table `options_resas`
--

INSERT INTO `options_resas` (`id`, `created_at`, `updated_at`, `nom_option`, `reservation_id`, `cadeau_id`) VALUES
(25, '2016-05-31 12:23:46', '2016-05-31 12:23:46', 'Ménage', 55, 0),
(29, '2016-05-31 18:44:54', '2016-05-31 18:44:54', 'Ménage', 56, 0),
(30, '2016-05-31 18:44:54', '2016-05-31 18:44:54', 'Massage', 56, 0),
(31, '2016-05-31 19:04:25', '2016-05-31 19:04:25', 'Arrivée_anticipée_+_Départ_tardif', 0, 32),
(32, '2016-06-01 05:09:19', '2016-06-01 05:09:19', 'Arrivée_anticipée_+_Départ_tardif', 58, 0),
(33, '2016-06-01 05:09:19', '2016-06-01 05:09:19', 'Ménage', 58, 0),
(34, '2016-06-01 06:12:57', '2016-06-01 06:12:57', 'Arrivée_anticipée_+_Départ_tardif', 0, 33),
(35, '2016-06-01 06:19:13', '2016-06-01 06:19:13', 'Massage', 60, 0),
(36, '2016-06-01 06:26:03', '2016-06-01 06:26:03', 'Arrivée_anticipée_+_Départ_tardif', 0, 34);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

CREATE TABLE IF NOT EXISTS `reservations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `formule` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jours` int(11) NOT NULL,
  `debut` date NOT NULL,
  `fin` date NOT NULL,
  `paye` tinyint(1) NOT NULL,
  `transaction_id` text COLLATE utf8_unicode_ci NOT NULL,
  `prix_total` int(11) NOT NULL,
  `payer_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adresse` text COLLATE utf8_unicode_ci NOT NULL,
  `code_postal` int(11) NOT NULL,
  `ville` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `numero_telephone` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type_paiement` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=61 ;

--
-- Contenu de la table `reservations`
--

INSERT INTO `reservations` (`id`, `created_at`, `updated_at`, `nom`, `formule`, `prenom`, `jours`, `debut`, `fin`, `paye`, `transaction_id`, `prix_total`, `payer_id`, `token`, `adresse`, `code_postal`, `ville`, `numero_telephone`, `mail`, `type_paiement`, `code`) VALUES
(55, '2016-05-31 12:23:46', '2016-05-31 12:31:23', 'Eung', 'detente', 'Tony', 2, '2016-06-27', '2016-06-29', 1, '', 490, '', '', '3 rue des noëls', 10000, 'Troyes', '0626941599', 'eungtony@outlook.fr', 'espece', 'FKYPB'),
(56, '2016-05-31 18:44:54', '2016-05-31 18:45:44', 'Eung', '14 juillet', 'Tony', 2, '2016-07-13', '2016-07-15', 1, 'PAY-6JR312009A382672WK5G7PIA', 275, 'NJDMC5SDSDM3U', 'EC-9NB85038YD921522E', '3 rue des noëls', 10000, 'Troyes', '0626941599', 'eungtony@outlook.fr', 'paypal', 'YS3Cb'),
(58, '2016-06-01 05:09:18', '2016-06-01 05:09:55', 'Eung', 'base', 'Tony', 2, '2016-06-09', '2016-06-11', 1, 'PAY-8PD51941F7224672VK5HIT6A', 220, 'NJDMC5SDSDM3U', 'EC-8TH17221PA165621D', '3 rue des noëls', 10000, 'Troyes', '0626941599', 'eungtony@outlook.fr', 'paypal', 'oHpwz'),
(59, '2016-06-01 05:10:37', '2016-06-01 05:11:27', 'Eung', 'base', 'Tony', 3, '2016-06-15', '2016-06-18', 1, '', 540, '', '', '3 rue des noëls', 10000, 'Troyes', '0626941599', 'eungtony@outlook.fr', 'espece', 'OCWAr'),
(60, '2016-06-01 06:19:13', '2016-06-01 06:20:03', 'Eung', 'detente', 'Tony', 2, '2016-06-23', '2016-06-25', 1, 'PAY-05C04321M9908591JK5HJUWQ', 260, 'NJDMC5SDSDM3U', 'EC-1DY39793M40527847', '3 rue des noëls', 10000, 'Troyes', '0626941599', 'eungtony@outlook.fr', 'paypal', 'wGwz1');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'john@doe.com', '$2y$10$BbChcnIRZWg2y7Ak3sGX5ewvfEWDX/qJmBo5a7WytC7r70khMalbq', 'J1xZRvcLE0T5ag4ThnAbCUitOGx9Eg8LNaYhKvRd8v0YINqisiuTLQhzoL8g', '2016-05-19 07:02:30', '2016-06-01 06:16:42');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
