-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 11 mars 2024 à 04:25
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_de_note`
--

-- --------------------------------------------------------

--
-- Structure de la table `annee_scolaires`
--

CREATE TABLE `annee_scolaires` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Annee` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `annee_scolaires`
--

INSERT INTO `annee_scolaires` (`id`, `Annee`, `created_at`, `updated_at`) VALUES
(1, '2022-2023', NULL, NULL),
(2, '2023-2024', NULL, NULL),
(4, '2024-2025', '2023-07-31 11:51:53', '2023-07-31 11:51:53');

-- --------------------------------------------------------

--
-- Structure de la table `classe_cegs`
--

CREATE TABLE `classe_cegs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Cycle` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maCycletieres` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `classe_cegs`
--

INSERT INTO `classe_cegs` (`id`, `Cycle`, `maCycletieres`, `created_at`, `updated_at`) VALUES
(1, '6eme', 'A', NULL, NULL),
(2, '5eme', 'A', NULL, NULL),
(3, '4eme', 'A', NULL, NULL),
(4, '3eme', 'A', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `classe_lycees`
--

CREATE TABLE `classe_lycees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Cycle` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maCycletieres` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Code_ecol` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Nom_ecol` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `classe_lycees`
--

INSERT INTO `classe_lycees` (`id`, `Cycle`, `maCycletieres`, `created_at`, `updated_at`, `Code_ecol`, `Nom_ecol`) VALUES
(1, '2nde', 'I', NULL, NULL, '', ''),
(2, '1ere', 'II', NULL, NULL, '', ''),
(3, 'T.L', 'A', NULL, NULL, '', '');

-- --------------------------------------------------------

--
-- Structure de la table `ecoles`
--

CREATE TABLE `ecoles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Code_ecol` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Nom_ecol` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `ecoles`
--

INSERT INTO `ecoles` (`id`, `Code_ecol`, `Nom_ecol`, `created_at`, `updated_at`) VALUES
(1, '1', 'CEG ANDRANOVORIVATO', NULL, NULL),
(2, '2', 'ECOLE PRIVEE MANAOSOA', NULL, NULL),
(3, '1', 'CEG LOVASOA ALAKAMISY ITENINA', NULL, NULL),
(4, '1', 'CEG ANJANAMAHASOA', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `eleves`
--

CREATE TABLE `eleves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Nom_elev` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Prenom_eleve` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Cycle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IM` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `eleves`
--

INSERT INTO `eleves` (`id`, `Nom_elev`, `Prenom_eleve`, `Cycle`, `IM`, `created_at`, `updated_at`) VALUES
(7, 'ANDRIANANDRASANA', 'Nomeniony Samuel', '2nde', '0000', '2023-07-11 01:47:18', '2023-07-12 12:02:32'),
(8, 'RAOAMAMPIONONA', 'Marie Adeline', 'TERMINAL', '0009', '2023-07-14 01:58:27', '2023-07-14 01:58:27');

-- --------------------------------------------------------

--
-- Structure de la table `etudiants`
--

CREATE TABLE `etudiants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Nom_elev` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Prenom_eleve` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Cycle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `IM` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Annee_scolaire` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Date_naissance` date DEFAULT NULL,
  `Lieu_naissances` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Nom_parents` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Adresse_parents` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Mal_MJ1` double DEFAULT 0,
  `Frs_MJ1` double DEFAULT 0,
  `Ang_MJ1` double DEFAULT 0,
  `HG_MJ1` double DEFAULT 0,
  `EC_MJ1` double DEFAULT 0,
  `Mths_MJ1` double DEFAULT 0,
  `PC_MJ1` double DEFAULT 0,
  `SVT_MJ1` double DEFAULT 0,
  `EPS_MJ1` double DEFAULT 0,
  `Mal_EX1` double DEFAULT 0,
  `Frs_EX1` double DEFAULT 0,
  `Ang_EX1` double DEFAULT 0,
  `HG_EX1` double DEFAULT 0,
  `EC_EX1` double DEFAULT 0,
  `Mths_EX1` double DEFAULT 0,
  `PC_EX1` double DEFAULT 0,
  `SVT_EX1` double DEFAULT 0,
  `EPS_EX1` double DEFAULT 0,
  `Mal_MG1` double DEFAULT 0,
  `Frs_MG1` double DEFAULT 0,
  `Ang_MG1` double DEFAULT 0,
  `HG_MG1` double DEFAULT 0,
  `EC_MG1` double DEFAULT 0,
  `Mths_MG1` double DEFAULT 0,
  `PC_MG1` double DEFAULT 0,
  `SVT_MG1` double DEFAULT 0,
  `EPS_MG1` double DEFAULT 0,
  `Mal_MJ2` double DEFAULT 0,
  `Frs_MJ2` double DEFAULT 0,
  `Ang_MJ2` double DEFAULT 0,
  `HG_MJ2` double DEFAULT 0,
  `EC_MJ2` double DEFAULT 0,
  `Mths_MJ2` double DEFAULT 0,
  `PC_MJ2` double DEFAULT 0,
  `SVT_MJ2` double DEFAULT 0,
  `EPS_MJ2` double DEFAULT 0,
  `Mal_EX2` double DEFAULT 0,
  `Frs_EX2` double DEFAULT 0,
  `Ang_EX2` double DEFAULT 0,
  `HG_EX2` double DEFAULT 0,
  `EC_EX2` double DEFAULT 0,
  `Mths_EX2` double DEFAULT 0,
  `PC_EX2` double DEFAULT 0,
  `SVT_EX2` double DEFAULT 0,
  `EPS_EX2` double DEFAULT 0,
  `Mal_MG2` double DEFAULT 0,
  `Frs_MG2` double DEFAULT 0,
  `Ang_MG2` double DEFAULT 0,
  `HG_MG2` double DEFAULT 0,
  `EC_MG2` double DEFAULT 0,
  `Mths_MG2` double DEFAULT 0,
  `PC_MG2` double DEFAULT 0,
  `SVT_MG2` double DEFAULT 0,
  `EPS_MG2` double DEFAULT 0,
  `Mal_MJ3` double DEFAULT 0,
  `Frs_MJ3` double DEFAULT 0,
  `Ang_MJ3` double DEFAULT 0,
  `HG_MJ3` double DEFAULT 0,
  `EC_MJ3` double DEFAULT 0,
  `Mths_MJ3` double DEFAULT 0,
  `PC_MJ3` double DEFAULT 0,
  `SVT_MJ3` double DEFAULT 0,
  `EPS_MJ3` double DEFAULT 0,
  `Mal_EX3` double DEFAULT 0,
  `Frs_EX3` double DEFAULT 0,
  `Ang_EX3` double DEFAULT 0,
  `HG_EX3` double DEFAULT 0,
  `EC_EX3` double DEFAULT 0,
  `Mths_EX3` double DEFAULT 0,
  `PC_EX3` double DEFAULT 0,
  `SVT_EX3` double DEFAULT 0,
  `EPS_EX3` double DEFAULT 0,
  `Mal_MG3` double DEFAULT 0,
  `Frs_MG3` double DEFAULT 0,
  `Ang_MG3` double DEFAULT 0,
  `HG_MG3` double DEFAULT 0,
  `EC_MG3` double DEFAULT 0,
  `Mths_MG3` double DEFAULT 0,
  `PC_MG3` double DEFAULT 0,
  `SVT_MG3` double DEFAULT 0,
  `EPS_MG3` double DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `profession_parents` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Nom_mere` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profession_mere` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Nom_tuteur` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profession_tuteurs` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Etat_actuel` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'PASSANTES',
  `Etat_class` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `code_Nom_ecol` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `etudiants`
--

INSERT INTO `etudiants` (`id`, `Nom_elev`, `Prenom_eleve`, `Cycle`, `IM`, `Annee_scolaire`, `Date_naissance`, `Lieu_naissances`, `Nom_parents`, `Adresse_parents`, `Mal_MJ1`, `Frs_MJ1`, `Ang_MJ1`, `HG_MJ1`, `EC_MJ1`, `Mths_MJ1`, `PC_MJ1`, `SVT_MJ1`, `EPS_MJ1`, `Mal_EX1`, `Frs_EX1`, `Ang_EX1`, `HG_EX1`, `EC_EX1`, `Mths_EX1`, `PC_EX1`, `SVT_EX1`, `EPS_EX1`, `Mal_MG1`, `Frs_MG1`, `Ang_MG1`, `HG_MG1`, `EC_MG1`, `Mths_MG1`, `PC_MG1`, `SVT_MG1`, `EPS_MG1`, `Mal_MJ2`, `Frs_MJ2`, `Ang_MJ2`, `HG_MJ2`, `EC_MJ2`, `Mths_MJ2`, `PC_MJ2`, `SVT_MJ2`, `EPS_MJ2`, `Mal_EX2`, `Frs_EX2`, `Ang_EX2`, `HG_EX2`, `EC_EX2`, `Mths_EX2`, `PC_EX2`, `SVT_EX2`, `EPS_EX2`, `Mal_MG2`, `Frs_MG2`, `Ang_MG2`, `HG_MG2`, `EC_MG2`, `Mths_MG2`, `PC_MG2`, `SVT_MG2`, `EPS_MG2`, `Mal_MJ3`, `Frs_MJ3`, `Ang_MJ3`, `HG_MJ3`, `EC_MJ3`, `Mths_MJ3`, `PC_MJ3`, `SVT_MJ3`, `EPS_MJ3`, `Mal_EX3`, `Frs_EX3`, `Ang_EX3`, `HG_EX3`, `EC_EX3`, `Mths_EX3`, `PC_EX3`, `SVT_EX3`, `EPS_EX3`, `Mal_MG3`, `Frs_MG3`, `Ang_MG3`, `HG_MG3`, `EC_MG3`, `Mths_MG3`, `PC_MG3`, `SVT_MG3`, `EPS_MG3`, `created_at`, `updated_at`, `profession_parents`, `Nom_mere`, `profession_mere`, `Nom_tuteur`, `profession_tuteurs`, `Etat_actuel`, `Etat_class`, `code_Nom_ecol`) VALUES
(3, 'RA', '7', '6eme', '0004', '2023-2024', '2013-10-03', 'FIANARANTSOA', 'RASOLO', '', 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-07-10 03:00:54', '2023-10-03 02:28:49', 'Cultivateur', 'Rasoanandrasana Marie Rosline', 'Cultivateur', NULL, NULL, 'REDOUBLANTE', '0', '326070021'),
(5, 'RAMANANDRAIBE', 'Samuel', '6eme', '0001', '2023-2024', '0000-00-00', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-07-10 03:06:40', '2023-07-15 23:55:51', NULL, NULL, NULL, NULL, NULL, 'REDOUBLANTE', '1', ''),
(6, 'NASOLOSOA', 'Suzatte', '4eme', '0002', '2023-2024', '0000-00-00', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-07-10 03:08:17', '2023-07-15 23:55:34', NULL, NULL, NULL, NULL, NULL, 'REDOUBLANTE', '1', ''),
(7, 'KAMONJA', 'Jons jackobson', '4eme', '0010', '2022-2023', '0000-00-00', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-07-15 00:04:55', '2023-07-15 23:58:17', NULL, NULL, NULL, NULL, NULL, 'REDOUBLANTE', '1', ''),
(8, 'ANDRY', 'Samuel', '6eme', '2345', '2022-2023', '0000-00-00', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-07-17 03:53:14', '2023-07-17 03:53:14', NULL, NULL, NULL, NULL, NULL, 'REDOUBLANTE', '1', ''),
(12, 'RAKOTOMALALA', 'Thonie', '6eme', '0003', '2022-2023', '2005-03-12', 'MAHASOABE', 'RANDRIANASOLO Jean', 'Mahaditra', 23, 13, 2, 2, 2, 2, 2, 50, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-26 07:42:11', '2023-07-26 22:27:25', NULL, NULL, NULL, NULL, NULL, 'PASSANTES', '1', ''),
(13, 'RANDRIAMAMPIONONA', 'Marie Adeline', '6eme', '1234', '2022-2023', '1992-04-12', 'FIANANARANTSOA', 'RANDIANANDRASANA Samuel', 'Mahaditra', 12, 13, 4, 40, 15, 33, 45, 50, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-26 11:46:01', '2023-07-26 22:25:49', NULL, NULL, NULL, NULL, NULL, 'PASSANTES', '1', ''),
(14, 'RANDRIAMAMPIONONA', '7', '6eme', '1209', '2022-2023', '2023-06-27', 'FIANANARANTSOA', 'RANDIANANDRASANA Samuel', 'Mahaditra', 0, 12, 2, 2, 2, 2, 2, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-26 13:23:32', '2023-07-26 22:20:09', NULL, NULL, NULL, NULL, NULL, 'PASSANTES', '1', ''),
(15, 'AKO', 'Ho', '6eme', '1345', '2022-2023', '2017-02-12', 'FIANANARANTSOA', 'RA Be', 'Mahasoabe', 40, 15, 24, 34, 10, 40, 20, 26, 18, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-27 01:06:10', '2023-07-27 01:09:30', NULL, NULL, NULL, NULL, NULL, 'PASSANTES', '1', ''),
(17, 'KAMONJAJON', 'Jacobson', '6eme', '1254', '2022-2023', '2020-08-19', 'FIANANARANTSOA', 'RASOLO Mampiandra', 'Manaotsara', 4, 0, 0, 0, 0, 0, 0, 0, 0, 3, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-27 13:40:36', '2023-07-27 13:41:36', NULL, NULL, NULL, NULL, NULL, 'PASSANTES', '1', ''),
(18, 'ANDRIANANDRASANA', 'Nomeniony Samuel', '6eme', '1287', '2022-2023', '2003-08-15', 'FIANANARANTSOA', 'RAMANANDRAIBE', 'Mahasoabe', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-28 00:42:43', '2023-07-28 00:42:43', NULL, NULL, NULL, NULL, NULL, 'PASSANTES', '1', ''),
(19, 'ANDRIANANDRASANA', 'Zafindraony Masinjaka Samuel', '5eme', '1290', '2022-2023', '2002-01-10', 'MAHASOABE', 'RANDIANANDRASANA Samuel', 'Mahasoabe', 6, 13, 23.23, 2.44444, NULL, NULL, NULL, NULL, NULL, NULL, 13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12, 14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 50, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-28 00:48:17', '2023-08-06 01:08:34', NULL, NULL, NULL, NULL, NULL, 'PASSANTES', '1', ''),
(20, 'SDFG', 'DFG', '6eme', '0000', '2022-2023', '2023-08-02', 'SDF', 'DF', 'SD', 60, 40, 40, 60, 20, 60, 40, 60, 20, 60, 40, 60, 60, 20, 60, 40, 60, 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 60, 40, 40, 60, 20, 60, 40, 60, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-02 09:26:06', '2023-08-09 01:44:15', NULL, NULL, NULL, NULL, NULL, 'REDOUBLANTE', '1', ''),
(21, 'ZAFIMAMPANDRA', 'Esther', '6eme', '1234', '2023-2024', '2000-12-04', 'FIANARANTSOA', 'RASOLO', 'FIZNARANTSOA', 13, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-28 03:06:30', '2023-08-28 03:11:35', NULL, NULL, NULL, NULL, NULL, 'REDOUBLANTE', '1', ''),
(26, 'SDF', 'QSQ', '6eme', '1234', '2022-2023', '2023-08-30', 'DF', 'dddddddddddddd', 'sdf', 12.3, 11, 22, 0, 10, 0, 0, 0, 0, 0.2, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-29 00:33:12', '2023-08-31 15:26:56', 'sd', NULL, NULL, NULL, NULL, 'REDOUBLANTE', '1', ''),
(31, 'ANDRIANANDRASANA', 'Manomeony Samuel', '6eme', '0018', '2023-2024', '2014-12-08', 'FIANARANTSOA', 'RAMANANDRAIBE Samuel', 'Mahasoabe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-08 02:47:36', '2023-10-03 02:23:07', 'Cultivateur', 'Rsoanandrasana Marie Rosline', 'Institutrice', NULL, NULL, 'PASSANTES', '0', '326070021'),
(32, 'ANDONIAINA', 'Helimampitraka Jobel', '6eme', '0019', '2023-2024', '2005-03-09', 'MAHASOABE', NULL, 'Mahasoabe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-08 03:19:51', '2023-09-08 03:19:51', NULL, 'RASOANANDRASANA Marie roseline', 'Cultivateur', NULL, NULL, 'PASSANTES', '1', ''),
(34, 'ZAFIMAMPANDRA', 'Esther', '3eme', '0021', '2023-2024', '2023-09-13', 'MAHASOABE', NULL, 'Mahasoabe', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-13 17:43:53', '2023-10-08 13:29:01', NULL, 'Rsoanandrasana Marie Rosline', 'Professeur', NULL, NULL, 'PASSANTES', '0', '326070021'),
(36, 'SDFG', 'xcfvb', '6eme', '0023', '2023-2024', '2014-12-03', 'FIANARANTSOA', 'RASOLO Seth', 'Mahasoabe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-18 04:32:04', '2023-09-18 04:32:04', 'Cultivateur', NULL, NULL, NULL, NULL, 'PASSANTES', '0', '326070021'),
(39, 'ZAFIMAMPANDRA', 'Esther', '6eme', '0025', '2022-2023', '2003-12-03', 'FIANARANTSOA', 'RASOLO MIKETRIKA', 'FIANARANTSOA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-09-23 13:36:10', '2023-09-23 16:44:36', 'Cultivateur', 'Rsoanandrasana Marie Rosline', 'Professeur', NULL, NULL, 'REDOUBLANTE', '1', '326010001'),
(40, 'ANGELOT', 'Ibraim', '5eme', '0026', '2022-2023', '2000-12-09', 'FIANARANTSOA', 'JIVASON Rock', 'FIANARANTSOA', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-09-24 12:28:39', '2023-09-24 13:13:48', 'Artiste Culturel', NULL, NULL, NULL, NULL, 'PASSANTES', '0', '326071020'),
(44, 'ZAFIMAMPANDRA', 'dfg', '6eme', '0030', '2022-2023', '2003-10-08', 'FIANARANTSOA', 'RASOLO', 'Mahasoabe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-10-08 11:26:47', '2023-10-08 11:27:06', 'Cultivateur', 'Rsoanandrasana Marie Rosline', 'Cultivateur', 'Zarasoa Niaina', 'Footbaleur', 'PASSANTES', '1', '326070021'),
(45, 'X V', 'Esther', '6eme', '0031', '2022-2023', '2003-10-08', 'FIANARANTSOA', 'RAMANANDRAIBE Samuel', 'Mahasoabe', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-10-08 11:53:18', '2023-10-08 11:53:18', 'Cultivateur', 'Rsoanandrasana Marie Rosline', 'Cultivateur', 'ZIVASON Johny Rock Finah', 'Footbaleur', 'REDOUBLANTE', '1', '326070021'),
(46, 'FGH', 'Nirina Christophe', '6eme', '0032', '2022-2023', '2023-10-08', 'DFGHJK', 'SDSS', 'xdcfvbn,', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-10-08 13:25:39', '2023-10-08 13:25:39', 'Cultivateur', NULL, NULL, NULL, NULL, 'REDOUBLANTE', '1', '326070021'),
(47, 'RNJANA', 'Anjanamasina', '6eme', '0033', '2023-2024', '2003-10-23', 'MAHASOABE', 'RASOLO', 'Mahasoabe', 12, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-10-08 14:05:24', '2023-10-08 14:07:22', 'Cultivateur', 'Rsoanandrasana Marie Rosline', 'Cultivateur', 'Zarasoa Niaina', 'Footbaleur', 'PASSANTES', '0', '326070021'),
(48, 'ANDIAMIRADO', 'FULGENCE', '6eme', '0034', '2022-2023', '2003-10-19', 'MAHASOABE', 'RANDIAMIADA Narivo', 'Mahasoabe', 16, 20, 12.5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-10-09 02:21:07', '2023-10-09 02:22:25', 'Cultivateur', 'RASOARIMALALA Mariette', 'Institutrice', 'FINARITRA', 'Footbaleur', 'REDOUBLANTE', '1', '326070021');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant_lycees`
--

CREATE TABLE `etudiant_lycees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Nom_elev` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Prenom_eleve` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Cycle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `IM` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Annee_scolaire` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Date_naissance` date DEFAULT NULL,
  `Lieu_naissances` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Nom_parents` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Adresse_parents` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Mal_MJ1` double DEFAULT 0,
  `Frs_MJ1` double DEFAULT 0,
  `Ang_MJ1` double DEFAULT 0,
  `HG_MJ1` double DEFAULT 0,
  `EC_MJ1` double DEFAULT 0,
  `Mths_MJ1` double DEFAULT 0,
  `PC_MJ1` double DEFAULT 0,
  `SVT_MJ1` double DEFAULT 0,
  `EPS_MJ1` double DEFAULT 0,
  `Mal_EX1` double DEFAULT 0,
  `Frs_EX1` double DEFAULT 0,
  `Ang_EX1` double DEFAULT 0,
  `HG_EX1` double DEFAULT 0,
  `EC_EX1` double DEFAULT 0,
  `Mths_EX1` double DEFAULT 0,
  `PC_EX1` double DEFAULT 0,
  `SVT_EX1` double DEFAULT 0,
  `EPS_EX1` double DEFAULT 0,
  `Mal_MG1` double DEFAULT 0,
  `Frs_MG1` double DEFAULT 0,
  `Ang_MG1` double DEFAULT 0,
  `HG_MG1` double DEFAULT 0,
  `EC_MG1` double DEFAULT 0,
  `Mths_MG1` double DEFAULT 0,
  `PC_MG1` double DEFAULT 0,
  `SVT_MG1` double DEFAULT 0,
  `EPS_MG1` double DEFAULT 0,
  `Mal_MJ2` double DEFAULT 0,
  `Frs_MJ2` double DEFAULT 0,
  `Ang_MJ2` double DEFAULT 0,
  `HG_MJ2` double DEFAULT 0,
  `EC_MJ2` double DEFAULT 0,
  `Mths_MJ2` double DEFAULT 0,
  `PC_MJ2` double DEFAULT 0,
  `SVT_MJ2` double DEFAULT 0,
  `EPS_MJ2` double DEFAULT 0,
  `Mal_EX2` double DEFAULT 0,
  `Frs_EX2` double DEFAULT 0,
  `Ang_EX2` double DEFAULT 0,
  `HG_EX2` double DEFAULT 0,
  `EC_EX2` double DEFAULT 0,
  `Mths_EX2` double DEFAULT 0,
  `PC_EX2` double DEFAULT 0,
  `SVT_EX2` double DEFAULT 0,
  `EPS_EX2` double DEFAULT 0,
  `Mal_MG2` double DEFAULT 0,
  `Frs_MG2` double DEFAULT 0,
  `Ang_MG2` double DEFAULT 0,
  `HG_MG2` double DEFAULT 0,
  `EC_MG2` double DEFAULT 0,
  `Mths_MG2` double DEFAULT 0,
  `PC_MG2` double DEFAULT 0,
  `SVT_MG2` double DEFAULT 0,
  `EPS_MG2` double DEFAULT 0,
  `Mal_MJ3` double DEFAULT 0,
  `Frs_MJ3` double DEFAULT 0,
  `Ang_MJ3` double DEFAULT 0,
  `HG_MJ3` double DEFAULT 0,
  `EC_MJ3` double DEFAULT 0,
  `Mths_MJ3` double DEFAULT 0,
  `PC_MJ3` double DEFAULT 0,
  `SVT_MJ3` double DEFAULT 0,
  `EPS_MJ3` double DEFAULT 0,
  `Mal_EX3` double DEFAULT 0,
  `Frs_EX3` double DEFAULT 0,
  `Ang_EX3` double DEFAULT 0,
  `HG_EX3` double DEFAULT 0,
  `EC_EX3` double DEFAULT 0,
  `Mths_EX3` double DEFAULT 0,
  `PC_EX3` double DEFAULT 0,
  `SVT_EX3` double DEFAULT 0,
  `EPS_EX3` double DEFAULT 0,
  `Mal_MG3` double DEFAULT 0,
  `Frs_MG3` double DEFAULT 0,
  `Ang_MG3` double DEFAULT 0,
  `HG_MG3` double DEFAULT 0,
  `EC_MG3` double DEFAULT 0,
  `Mths_MG3` double DEFAULT 0,
  `PC_MG3` double DEFAULT 0,
  `SVT_MG3` double DEFAULT 0,
  `EPS_MG3` double DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Philo_MJ1` double DEFAULT 0,
  `NES_MJ1` double DEFAULT 0,
  `LEV_MJ1` double DEFAULT 0,
  `TICE_MJ1` double DEFAULT 0,
  `Philo_EX1` double DEFAULT 0,
  `NES_EX1` double DEFAULT 0,
  `LEV_EX1` double DEFAULT 0,
  `TICE_EX1` double DEFAULT 0,
  `Philo_MG1` double DEFAULT 0,
  `NES_MG1` double DEFAULT 0,
  `LEV_MG1` double DEFAULT 0,
  `TICE_MG1` double DEFAULT 0,
  `Philo_MJ2` double DEFAULT 0,
  `NES_MJ2` double DEFAULT 0,
  `LEV_MJ2` double DEFAULT 0,
  `TICE_MJ2` double DEFAULT 0,
  `Philo_EX2` double DEFAULT 0,
  `NES_EX2` double DEFAULT 0,
  `LEV_EX2` double DEFAULT 0,
  `TICE_EX2` double DEFAULT 0,
  `Philo_MG2` double DEFAULT 0,
  `NES_MG2` double DEFAULT 0,
  `LEV_MG2` double DEFAULT 0,
  `TICE_MG2` double DEFAULT 0,
  `Philo_MJ3` double DEFAULT 0,
  `NES_MJ3` double DEFAULT 0,
  `LEV_MJ3` double DEFAULT 0,
  `TICE_MJ3` double DEFAULT 0,
  `Philo_EX3` double DEFAULT 0,
  `NES_EX3` double DEFAULT 0,
  `LEV_EX3` double DEFAULT 0,
  `TICE_EX3` double DEFAULT 0,
  `profession_parents` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Nom_mere` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profession_mere` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Nom_tuteur` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profession_tuteurs` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Etat_actuel` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'PASSANTES',
  `Etat_class` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `code_Nom_ecol` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `etudiant_lycees`
--

INSERT INTO `etudiant_lycees` (`id`, `Nom_elev`, `Prenom_eleve`, `Cycle`, `IM`, `Annee_scolaire`, `Date_naissance`, `Lieu_naissances`, `Nom_parents`, `Adresse_parents`, `Mal_MJ1`, `Frs_MJ1`, `Ang_MJ1`, `HG_MJ1`, `EC_MJ1`, `Mths_MJ1`, `PC_MJ1`, `SVT_MJ1`, `EPS_MJ1`, `Mal_EX1`, `Frs_EX1`, `Ang_EX1`, `HG_EX1`, `EC_EX1`, `Mths_EX1`, `PC_EX1`, `SVT_EX1`, `EPS_EX1`, `Mal_MG1`, `Frs_MG1`, `Ang_MG1`, `HG_MG1`, `EC_MG1`, `Mths_MG1`, `PC_MG1`, `SVT_MG1`, `EPS_MG1`, `Mal_MJ2`, `Frs_MJ2`, `Ang_MJ2`, `HG_MJ2`, `EC_MJ2`, `Mths_MJ2`, `PC_MJ2`, `SVT_MJ2`, `EPS_MJ2`, `Mal_EX2`, `Frs_EX2`, `Ang_EX2`, `HG_EX2`, `EC_EX2`, `Mths_EX2`, `PC_EX2`, `SVT_EX2`, `EPS_EX2`, `Mal_MG2`, `Frs_MG2`, `Ang_MG2`, `HG_MG2`, `EC_MG2`, `Mths_MG2`, `PC_MG2`, `SVT_MG2`, `EPS_MG2`, `Mal_MJ3`, `Frs_MJ3`, `Ang_MJ3`, `HG_MJ3`, `EC_MJ3`, `Mths_MJ3`, `PC_MJ3`, `SVT_MJ3`, `EPS_MJ3`, `Mal_EX3`, `Frs_EX3`, `Ang_EX3`, `HG_EX3`, `EC_EX3`, `Mths_EX3`, `PC_EX3`, `SVT_EX3`, `EPS_EX3`, `Mal_MG3`, `Frs_MG3`, `Ang_MG3`, `HG_MG3`, `EC_MG3`, `Mths_MG3`, `PC_MG3`, `SVT_MG3`, `EPS_MG3`, `created_at`, `updated_at`, `Philo_MJ1`, `NES_MJ1`, `LEV_MJ1`, `TICE_MJ1`, `Philo_EX1`, `NES_EX1`, `LEV_EX1`, `TICE_EX1`, `Philo_MG1`, `NES_MG1`, `LEV_MG1`, `TICE_MG1`, `Philo_MJ2`, `NES_MJ2`, `LEV_MJ2`, `TICE_MJ2`, `Philo_EX2`, `NES_EX2`, `LEV_EX2`, `TICE_EX2`, `Philo_MG2`, `NES_MG2`, `LEV_MG2`, `TICE_MG2`, `Philo_MJ3`, `NES_MJ3`, `LEV_MJ3`, `TICE_MJ3`, `Philo_EX3`, `NES_EX3`, `LEV_EX3`, `TICE_EX3`, `profession_parents`, `Nom_mere`, `profession_mere`, `Nom_tuteur`, `profession_tuteurs`, `Etat_actuel`, `Etat_class`, `code_Nom_ecol`) VALUES
(5, 'DFGH', 'SDFGB', '2nde', '1234', '2022-2023', '2023-10-06', 'MAHASOABE', 'RASOLO', 'Mahasoabe', 12, 30, 30, 40, 10, 60, 20, 20, 0, 34, 23, 30, 40, 20, 45, 19, 20, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, 40, 13, 60, 20, 60, 20, 20, 0, 25, 34, 30, 3, 14, 19, 20, 20, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 23, 13, 12, 15, 17, 2, 20, 20, 0, 24, 34, 35, 20, 12, 5, 20, 20, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-05 10:03:09', '2023-09-21 13:00:21', 12.5, NULL, 60, 60, 20, NULL, 50, 60, NULL, NULL, NULL, NULL, 5, NULL, 60, 60, 20, NULL, 60, 60, NULL, NULL, NULL, NULL, 20, NULL, 60, 60, 10, NULL, 60, 60, 'Vandeur', 'RAVAO Ka mierogna', 'Professeur', NULL, NULL, 'ADMIS', '1', '326071020'),
(6, 'SD', NULL, '2nde', 'sdf', '2022-2023', '2023-09-13', 'SDF', NULL, 'aze', 12, 40, 22, 20, 10, 60, 20, 20, 0, 0.2, 23, 30, 40, 13, 45, 20, 20, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, 40, 13, 60, 20, 60, 20, 20, 0, 25, 34, 30, 3, 14, 19, 20, 20, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 23, 13, 12, 15, 17, 2, 20, 20, 0, 24, 34, 35, 20, 12, 5, 20, 20, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-05 10:03:54', '2023-09-21 12:53:44', 12.5, NULL, 60, 60, 20, NULL, 60, 60, NULL, NULL, NULL, NULL, 5, NULL, 60, 60, 20, NULL, 60, 60, NULL, NULL, NULL, NULL, 20, NULL, 60, 60, 10, NULL, 60, 60, NULL, NULL, NULL, NULL, NULL, 'ADMIS', '1', ''),
(14, 'RASOAMAMPIONONA', 'Marie Elisa', '2nde', '0017', '2022-2023', '2015-12-01', 'FIANARANTSOA', 'RAKOTOMALALA Jean Claude', 'FIANARANTSOA', 12, 13, 22, 20, 10, 60, 20, 20, 0, 0.2, 23, 30, 40, 13, 45, 20, 20, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, 40, 13, 60, 20, 60, 20, 20, 0, 25, 34, 30, 3, 14, 19, 20, 20, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 23, 13, 12, 15, 17, 2, 20, 20, 0, 24, 34, 35, 20, 12, 5, 20, 20, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-11 00:39:43', '2023-09-21 12:52:11', 12.5, NULL, 60, 60, 20, NULL, 60, 60, NULL, NULL, NULL, NULL, 5, NULL, 60, 60, 20, NULL, 60, 60, NULL, NULL, NULL, NULL, 20, NULL, 60, 60, 10, NULL, 60, 60, 'GENDARME', 'RASOAZANANIRAINY Claudine', 'CENATEUR', NULL, NULL, 'ADMIS', '1', ''),
(18, 'RAZAFINDRAMAMPY', 'Tombotsoa Alfa', '2nde', '0019', '2022-2023', '2002-12-09', 'MAHASOABE', 'JEAN CLIN', 'AMBOHIBORY', 12, 11, 30, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-09-21 12:09:45', '2023-09-21 13:47:39', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Cultivateur', 'ZOR Gette', 'Institutrice', NULL, NULL, 'REDOUBLANTE', '1', '326071020'),
(19, 'ABDELASIS', 'thoma flica', '1ére', '0020', '2022-2023', '2004-12-03', 'MAHASOABE', 'RAMANANTSOA Tsiatsafa', 'Mahasoabe', 1.123, 13, 22, 20, 10, 60, 20, 20, NULL, 0.212, 23, 30, 40, 20, 45, 20, 20, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 18, 12, 13, 60, 34, 60, 20, 20, NULL, 25, 34, 30, 3, 14, 19, 20, 11, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 23, 13, 12, 15, 17, 2, 20, 20, NULL, 24, 34, 35, 20, 12, 5, 20, 20, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-09-21 14:16:00', '2023-09-24 15:22:09', 12.5, 0, 60, 60, 20, 0, 60, 60, 0, 0, 0, 0, 5, 0, 60, 60, 20, 0, 60, 60, 0, 0, 0, 0, 20, 0, 60, 60, 10, 0, 60, 60, 'Cultivateur', 'RASOAZANANIAINY Malazavola', 'Institutrice', NULL, NULL, 'PASSANTES', '1', '326070021'),
(20, 'ANDRIANANDRASANA', 'DSDSDS', '2nde', '0021', '2022-2023', '2023-09-28', 'SDGJ;', 'RASOLO MIKETRIKA', 'SDS', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-09-28 14:12:59', '2023-09-28 14:12:59', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'sdf', NULL, NULL, NULL, NULL, 'REDOUBLANTE', '1', '326071020'),
(21, 'FANAMBINANTSOA', 'Gerome Mombrice', '2nde', '0022', '2023-2024', '2008-12-03', 'MAHASOABE', 'DERANDRAIBE Mahaleo Christian', 'Mahasoabe', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-10-03 00:54:34', '2023-10-03 00:54:34', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Enseignant', 'BRENARDINE Marie Veronique', 'Vandeur', 'AIME Jacqueline', 'Boulanger', 'REDOUBLANTE', '0', '326071020'),
(22, 'X V', 'Esther', '2nde', '0023', '2022-2023', '2000-10-11', 'MAHASOABE', 'RASOLO', 'Mahasoabe', 40, 19, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-10-08 12:15:37', '2023-10-09 02:27:29', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Cultivateur', 'Rsoanandrasana Marie Rosline', 'Cultivateur', NULL, NULL, 'REDOUBLANTE', '1', '326071020');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `login`
--

CREATE TABLE `login` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Dren` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Cisco` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Code_Cisco` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Commune` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Zap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Code_ecol` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Nom_ecol` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Nom_utilisateur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Mot_de_passe_utilisateur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `login`
--

INSERT INTO `login` (`id`, `Dren`, `Cisco`, `Code_Cisco`, `Commune`, `Zap`, `Code_ecol`, `Nom_ecol`, `Nom_utilisateur`, `Mot_de_passe_utilisateur`) VALUES
(1, 'Mahatsiatra ambony', 'VOHIBATO', '326\r\n', 'ANDRANOVORIVATO', 'ANDRANOVORIVATO', '22031118E', 'CEG ANDRANOVORIVATO', 'nouvelle_valeur1', 'nomeniony');

-- --------------------------------------------------------

--
-- Structure de la table `lycees`
--

CREATE TABLE `lycees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Code_ecol` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Nom_ecol` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `matiere_cegs`
--

CREATE TABLE `matiere_cegs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `matieres` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Code_matiere` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Coef` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `matiere_cegs`
--

INSERT INTO `matiere_cegs` (`id`, `matieres`, `Code_matiere`, `Coef`, `created_at`, `updated_at`) VALUES
(5, 'Malagasy', '0011', 3.00, '2023-07-17 16:21:13', '2023-07-17 16:21:13'),
(6, 'Français', '0012', 2.00, '2023-07-17 16:21:49', '2023-07-17 16:21:49'),
(7, 'Anglais', '0023', 2.00, '2023-07-17 16:22:25', '2023-07-17 16:22:25'),
(8, 'HG', '0013', 3.00, '2023-07-17 16:23:22', '2023-07-17 16:23:22'),
(9, 'EC', '0033', 1.00, '2023-07-17 16:25:52', '2023-07-17 16:25:52'),
(10, 'MATHS', '0044', 3.00, '2023-07-17 16:26:45', '2023-07-17 16:26:45'),
(11, 'PC', '0044', 2.00, '2023-07-17 16:27:35', '2023-07-17 16:27:35'),
(12, 'SVT', '0055', 3.00, '2023-07-17 16:28:13', '2023-07-17 16:28:13'),
(13, 'EPS', '0016', 1.00, '2023-07-17 16:28:37', '2023-07-17 16:28:37');

-- --------------------------------------------------------

--
-- Structure de la table `matiere_lycees`
--

CREATE TABLE `matiere_lycees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `matieres` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Code_matiere` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Coef` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Cycle` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `matiere_lycees`
--

INSERT INTO `matiere_lycees` (`id`, `matieres`, `Code_matiere`, `Coef`, `created_at`, `updated_at`, `Cycle`) VALUES
(5, 'MAL', 'M2NDE', 2.00, '2023-08-04 00:10:36', '2023-08-05 10:19:32', '2nde'),
(6, 'Français', 'F2NDE', 2.00, '2023-08-04 00:38:27', '2023-08-04 00:38:27', '2nde'),
(7, 'Anglais', 'A2NDE', 2.00, '2023-08-04 00:39:16', '2023-08-04 00:39:16', '2nde'),
(8, 'PHILO', 'Ph2NDE', 1.00, '2023-08-04 00:40:32', '2023-08-05 10:19:51', '2nde'),
(9, 'HG', 'Hg2NDE', 3.00, '2023-08-04 00:41:10', '2023-08-04 00:41:10', '2nde'),
(10, 'EC', 'EC2NDE', 1.00, '2023-08-04 00:41:34', '2023-08-04 00:41:34', '2nde'),
(13, 'MATHS', 'Mat2NDE', 3.00, '2023-08-04 00:44:11', '2023-08-04 00:44:11', '2nde'),
(14, 'PC', 'PC2NDE', 3.00, '2023-08-04 00:44:56', '2023-08-04 00:44:56', '2nde'),
(15, 'TICE', 'TI2NDE', 1.00, '2023-08-04 00:45:30', '2023-08-04 00:45:30', '2nde'),
(16, 'SVT', 'SV2NDE', 3.00, NULL, NULL, '2nde'),
(18, 'EPS', 'EPS2NDE', 1.00, '2023-08-04 00:45:58', '2023-08-04 00:45:58', '2nde'),
(20, 'Malagasy', 'M1ERE', 2.00, '2023-08-07 00:20:22', '2023-08-07 00:20:22', '1ére'),
(21, 'Français', 'F1ERE', 2.00, '2023-08-07 00:22:48', '2023-08-07 00:22:48', '1ére'),
(22, 'Anglais', 'A1ERE', 1.00, '2023-08-07 00:23:26', '2023-08-07 00:23:26', '1ére'),
(23, 'PHILO', 'Ph1ERE', 1.00, '2023-08-07 00:24:21', '2023-08-07 00:24:21', '1ére'),
(24, 'HG', 'Hg1ERE', 1.00, '2023-08-07 00:25:47', '2023-08-07 00:25:47', '1ére'),
(25, 'EC', 'EA1ERE', 0.00, '2023-08-07 00:27:02', '2023-09-09 14:54:17', '1ére'),
(26, 'SES', 'SES1ERE', 0.00, '2023-08-07 00:27:38', '2023-08-07 00:27:38', '1ére'),
(27, 'SPC', 'LV1ERE', 0.00, '2023-08-07 00:29:44', '2023-09-05 14:04:37', '1ére'),
(28, 'MATHS', 'Mat1ERE', 5.00, '2023-08-07 00:30:26', '2023-08-07 00:30:26', '1ére'),
(29, 'PC', 'PC1ERE', 5.00, '2023-08-07 00:30:51', '2023-08-07 00:30:51', '1ére'),
(30, 'SVT', 'SV1ERE', 4.00, '2023-08-07 00:31:20', '2023-08-07 00:31:20', '1ére'),
(31, 'TICE', 'TI1ERE', 0.00, '2023-08-07 01:28:40', '2023-08-07 01:28:40', '1ére'),
(32, 'EPS', 'EPS1ERE', 2.00, '2023-08-07 01:29:20', '2023-08-07 01:29:20', '1ére'),
(33, 'Malagasy', 'MTS', 2.00, '2023-08-09 04:46:24', '2023-08-09 04:46:24', 'T.S'),
(34, 'Français', 'FTS', 2.00, '2023-08-09 04:47:13', '2023-08-09 04:47:13', 'T.S'),
(35, 'Anglais', 'ATS', 2.00, '2023-08-09 04:47:45', '2023-08-09 04:47:45', 'T.S'),
(36, 'PHILO', 'PhTS', 2.00, '2023-08-09 04:48:20', '2023-08-09 04:48:20', 'T.S'),
(37, 'HG', 'HgTS', 3.00, '2023-08-09 04:48:52', '2023-08-09 04:48:52', 'T.S'),
(38, 'EC', 'ECTS', 1.00, '2023-08-09 04:49:50', '2023-08-09 04:49:50', 'T.S'),
(40, 'SPC', 'LETS', 2.00, '2023-08-09 04:51:08', '2023-09-05 14:03:36', 'T.S'),
(41, 'MATHS', 'MatTS', 5.00, '2023-08-09 04:51:48', '2023-08-09 04:51:48', 'T.S'),
(42, 'PC', 'PCTS', 5.00, '2023-08-09 04:52:36', '2023-08-09 04:52:36', 'T.S'),
(43, 'TICE', 'TITS', 2.00, '2023-08-09 04:54:53', '2023-08-09 04:54:53', 'T.S'),
(44, 'SVT', 'SVTS', 5.00, '2023-08-09 04:55:34', '2023-08-09 04:55:34', 'T.S'),
(45, 'EPS', 'EPSTS', 1.00, '2023-08-09 04:56:09', '2023-08-09 04:56:09', 'T.S'),
(46, 'SES', 'SES2NDE', 0.00, '2023-09-05 14:09:08', '2023-09-05 14:09:08', '2nde'),
(47, 'MAL', 'MALTL', 2.00, '2023-09-05 16:05:06', '2023-09-05 16:05:06', 'T.L'),
(48, 'Français', 'FTL', 2.00, '2023-09-05 16:05:53', '2023-09-05 16:05:53', 'T.L'),
(49, 'Anglai', 'AngTL', 3.00, '2023-09-05 16:06:35', '2023-09-05 16:06:35', 'T.L'),
(50, 'PHILO', 'PHTH', 1.00, '2023-09-05 16:07:32', '2023-09-05 16:07:32', 'T.L'),
(51, 'HG', 'HGTL', 5.00, '2023-09-05 16:08:06', '2023-09-05 16:08:06', 'T.L'),
(52, 'EC', 'ECTL', 1.00, '2023-09-05 16:08:25', '2023-09-05 16:08:25', 'T.L'),
(53, 'MTHS', 'MTTL', 2.00, '2023-09-05 16:10:34', '2023-09-05 16:10:34', 'T.L'),
(54, 'PC', 'PCTL', 1.00, '2023-09-05 16:10:53', '2023-09-05 16:10:53', 'T.L'),
(55, 'TICE', 'TITL', 4.00, '2023-09-05 16:11:32', '2023-09-05 16:11:32', 'T.L'),
(56, 'SVT', 'SVTL', 1.00, '2023-09-05 16:15:43', '2023-09-05 16:15:43', 'T.L'),
(57, 'EPS', 'EPTL', 1.00, '2023-09-05 16:16:26', '2023-09-05 16:16:26', 'T.L'),
(58, 'SES', 'SETL', 3.00, '2023-09-05 16:17:02', '2023-09-05 16:17:02', 'T.L');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2023_07_10_034739_create_etudiants_table', 1),
(5, '2023_07_10_063936_create_eleves_table', 1),
(6, '2023_07_11_094248_create_matiere_cegs_table', 1),
(7, '2023_07_12_025252_create_matiere_lycees_table', 1),
(8, '2023_07_12_044025_create_classe_cegs_table', 1),
(9, '2023_07_12_045557_create_classe_lycees_table', 1),
(10, '2023_07_13_130527_create_users_table', 1),
(11, '2023_07_13_174542_create_annee_scolaires_table', 1),
(12, '2023_07_13_190453_create_notes_table', 1),
(13, '2023_07_19_002136_create_ecoles_table', 1),
(14, '2023_07_20_124719_create_ecoles_table', 2),
(15, '2023_07_27_110501_create_lycees_table', 3),
(16, '2023_08_02_035505_create_etudiant_lycees_table', 4);

-- --------------------------------------------------------

--
-- Structure de la table `notes`
--

CREATE TABLE `notes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `matiere` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Num_bulletin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Annee_scolaire` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Note` double(8,2) NOT NULL,
  `IM` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Nom_elev` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Prenom_eleve` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Cycle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_elev` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `notes`
--

INSERT INTO `notes` (`id`, `matiere`, `Num_bulletin`, `Annee_scolaire`, `Note`, `IM`, `Nom_elev`, `Prenom_eleve`, `Cycle`, `created_at`, `updated_at`, `id_elev`) VALUES
(1, 'EPS', '1', '2022-2024', 10.00, '1234', 'RASOARIMALALA', 'Mariette', '6eme', '2023-07-13 16:40:01', '2023-07-13 16:40:01', 0),
(3, 'HG', '1', '2023-2024', 12.00, '0004', 'RA', '7', '6eme', '2023-07-15 01:03:53', '2023-07-16 01:56:30', 0),
(4, 'MALAGASY', '1', '2022-2024', 12.00, '1234', 'RASOARIMALALA', 'Mariette', '6eme', '2023-07-15 03:51:27', '2023-07-15 03:51:27', 0),
(5, 'Anglais', '1', '2022-2023', 12.00, '1209', 'RANDRIAMAMPIONONA', '7', '6eme', '2023-07-27 00:04:32', '2023-07-27 00:04:32', 14),
(6, 'Français', '1', '2022-2023', 13.00, '1234', 'RASOARIMALALA', 'Mariette', '6eme', '2023-07-27 00:05:55', '2023-07-27 00:05:55', 2),
(7, 'Anglais', '1', '2022-2023', 12.00, '1234', 'RASOARIMALALA', 'Mariette', '6eme', '2023-07-27 00:07:15', '2023-07-27 00:07:15', 2),
(8, 'Malagasy', '1', '2022-2023', 12.00, '1234', 'RASOARIMALALA', 'Mariette', '6eme', '2023-07-27 00:08:01', '2023-07-27 00:08:01', 2),
(9, 'HG', '1', '2022-2023', 12.00, '1209', 'RANDRIAMAMPIONONA', '7', '6eme', '2023-07-27 00:09:39', '2023-07-27 00:09:39', 14);

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `divisins` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Zap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Nom_ecol` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `code_Nom_ecol` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DRN` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_DRN` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Cisco` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_Cisco` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commune` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_commune` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fokontany` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_fokontany` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quartier` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `divisins`, `Zap`, `Nom_ecol`, `name`, `password`, `created_at`, `updated_at`, `code_Nom_ecol`, `DRN`, `code_DRN`, `Cisco`, `code_Cisco`, `commune`, `code_commune`, `fokontany`, `code_fokontany`, `quartier`) VALUES
(6, 'ceg', 'MAHASOABE', 'CEG ANJANAMAHASOA', 'NOMENIONY', '$2y$10$u9NuiJGeVBlfeg/gy8S8Auzwef8AVw1iVTgURLqI86t3YFIWhHwqK', '2023-09-02 11:28:29', '2023-09-02 11:28:29', '326070021', 'HAUTE MATSIATRA', '15', 'VOHIBATO', '326', 'MAHASOABE', '32607', 'ANJANAMAHASOA NORD', '3260706', 'AMBODIHARANA'),
(7, 'ceg', 'MAHASOABE', 'ECOLE PRIVE CATHOLIQUE ST LOUIS DE GONZAGUE', 'GONZAGUE', '$2y$10$9ZzWkvT6gmVnAKJbL3lQFOd3FJCeZUcz5RbCtn3rrAlqNcHNBi9qK', '2023-09-19 00:18:25', '2023-09-19 00:18:25', '326071005', 'HAUTE MATSIATRA', '15', 'VOHIBATO', '326', 'MAHASOABE', '32607', 'ALAROBIA I', '3260701', 'ALAROBIA'),
(8, 'lycee', 'MAHASOABE', 'LYCEE PRIVEE LA MERVEILLE MAHASOABE', 'MERVEILLE', '$2y$10$kwZWySrLQeAcTODgLcDWMOdgKbUtvPwbNgxqtGAIgzRrtcYCTDf66', '2023-09-19 00:59:57', '2023-09-19 00:59:57', '326071020', 'HAUTE MATSIATRA', '15', 'VOHIBATO', '326', 'MAHASOABE', '32607', 'ALAROBIA I', '3260701', 'ANDRAKAJAHA'),
(9, 'ceg', 'ALAKAMISY-ITENINA', 'CEG LOVASOA ALAKAMISY', 'LOVASOA', '$2y$10$hIDkIT0DZnX1nWvvcjLzTO.rgizh9IqW8W.FCl.03JJzIFGeAjhbm', '2023-09-19 01:08:54', '2023-09-19 01:08:54', '326010001', 'HAUTE MATSIATRA', '15', 'VOHIBATO', '326', 'ALAKAMISY ITENINA', '32601', 'ALAKAMISY ITENINA', '3260101', 'AMBANIAVARATRA'),
(10, 'lycee', 'MAHASOABE', 'LYCEE AKOFA', 'AKOFA', '$2y$10$VQPaOr91ftwihUT.5tRKSeYTt4/keSJdvkj2mKxgLEwrPiFuBIfDO', '2023-09-24 14:55:46', '2023-09-24 14:55:46', '212', 'HAUTE MATSIATRA', '15', 'VOHIBATO', '326', 'MAHASOABE', '32601', 'ALAROBIA II', '3760790', 'AKOFA');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `annee_scolaires`
--
ALTER TABLE `annee_scolaires`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `classe_cegs`
--
ALTER TABLE `classe_cegs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `classe_lycees`
--
ALTER TABLE `classe_lycees`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ecoles`
--
ALTER TABLE `ecoles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `eleves`
--
ALTER TABLE `eleves`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `etudiants`
--
ALTER TABLE `etudiants`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `etudiant_lycees`
--
ALTER TABLE `etudiant_lycees`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `lycees`
--
ALTER TABLE `lycees`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `matiere_cegs`
--
ALTER TABLE `matiere_cegs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `matiere_lycees`
--
ALTER TABLE `matiere_lycees`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `annee_scolaires`
--
ALTER TABLE `annee_scolaires`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `classe_cegs`
--
ALTER TABLE `classe_cegs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `classe_lycees`
--
ALTER TABLE `classe_lycees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `ecoles`
--
ALTER TABLE `ecoles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `eleves`
--
ALTER TABLE `eleves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `etudiants`
--
ALTER TABLE `etudiants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT pour la table `etudiant_lycees`
--
ALTER TABLE `etudiant_lycees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `lycees`
--
ALTER TABLE `lycees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `matiere_lycees`
--
ALTER TABLE `matiere_lycees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
