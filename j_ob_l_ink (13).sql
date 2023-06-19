-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 20 juin 2023 à 00:52
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `j_ob_l_ink`
--

-- --------------------------------------------------------

--
-- Structure de la table `candidate`
--

CREATE TABLE `candidate` (
  `CandidateID` int(11) NOT NULL,
  `full_name` varchar(50) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `PhoneNumber` varchar(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `city` varchar(120) DEFAULT NULL,
  `reset_token` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT '664-6643641_avatar-transparent-background-user-icon-hd-png-download.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `candidate`
--

INSERT INTO `candidate` (`CandidateID`, `full_name`, `Email`, `PhoneNumber`, `password`, `city`, `reset_token`, `img`) VALUES
(2, 'mahmmod', 'johndoe@email.com', '555-1234', NULL, NULL, NULL, '664-6643641_avatar-transparent-background-user-icon-hd-png-download.png'),
(3, 'nourdin', 'johndoe@email.com', '555-1234', NULL, NULL, NULL, '664-6643641_avatar-transparent-background-user-icon-hd-png-download.png'),
(4, 'mourad', 'johndoe@email.com', '555-1234', NULL, NULL, NULL, '664-6643641_avatar-transparent-background-user-icon-hd-png-download.png'),
(5, 'nourdin', 'johndoe@email.com', '555-1234', NULL, NULL, NULL, '664-6643641_avatar-transparent-background-user-icon-hd-png-download.png'),
(14, 'yassine moundelssi', 'mode@gmail.com', '0605466397', 'c05fd5aef63ca29d40b928eab8342dcc', 'TANGER', NULL, 'Picsart_23-04-03_21-21-16-790_auto_x2_colored_toned_light_ai.jpg'),
(15, 'yassine moundelssi', 'moun.solicode@gmail.com', '0605466397', '7de98002fd8b456d5dcf3e5c05f36d1c', 'TANGER', NULL, '664-6643641_avatar-transparent-background-user-icon-hd-png-download.png'),
(16, 'yassine moundelssi', 'moun.sde@gmail.com', '0605466397', '8b6aaf43779311183030a2f91b94d4b1', 'TANGER', NULL, '664-6643641_avatar-transparent-background-user-icon-hd-png-download.png'),
(17, 'hind hadad', 'hind.hadad@gmail.com', '0605466397', '0712f5e82238de66574b66c2ffbb06c1', 'TANGER', NULL, '664-6643641_avatar-transparent-background-user-icon-hd-png-download.png'),
(18, 'yassine moundelssi', 'moundelssi.yassine.solicode@gmail.com', '0605466397', '5acb86aee467f18e335e069a01590077', 'TANGER', 'hgh', '664-6643641_avatar-transparent-background-user-icon-hd-png-download.png'),
(19, 'yassine moundelssi', 'moundelssi.olicode@gmail.com', '0605466397', '792b6b6c7e4ddc884b7d2c0b7e6eefe0', 'TANGER', 'hgh', 'Picsart_23-04-03_21-21-16-790.jpg'),
(20, 'yassine moundelssi', 'moundelse.solicode@gmail.com', '+212605466397', '74feb4e23a9061886ecb6b03168e173c', 'Tanger', NULL, '664-6643641_avatar-transparent-background-user-icon-hd-png-download.png'),
(21, 'yassine moundelssi', 'admin@gmail.com', '+212605466397', '75d23af433e0cea4c0e45a56dba18b30', 'Tanger', NULL, '664-6643641_avatar-transparent-background-user-icon-hd-png-download.png'),
(22, 'yassine moundelssi', 'mouine.solicode@gmail.com', '0605466397', 'defbcbf195aa8acb8f9b02c4de21acad', 'TANGER', NULL, 'Picsart_23-04-03_21-21-16-790.jpg'),
(23, 'yassine moundelssi', 'mouiicode@gmail.com', '0605466397', 'e6fee4a0d45cfd498f7a03092cf1a00e', 'TANGER', NULL, '664-6643641_avatar-transparent-background-user-icon-hd-png-download.png'),
(24, 'yassine moundelssi', 'mlicode@gmail.com', '0605466397', 'f2ccfbbdaa15ffc8e32ebff43b8f8742', 'TANGER', NULL, '664-6643641_avatar-transparent-background-user-icon-hd-png-download.png'),
(25, 'yassine moundelssi', 'mouineicode@gmail.com', '0605466397', '57efcd0b13fcdae36969e79a8cbb4347', 'TANGER', NULL, 'Picsart_23-04-03_21-21-16-790.jpg'),
(26, 'yassine moundelssi', 'mouicode@gmail.com', '0605466397', 'ac782b5ccff7386557bedb11e9ec38c4', 'TANGER', NULL, '664-6643641_avatar-transparent-background-user-icon-hd-png-download.png');

-- --------------------------------------------------------

--
-- Structure de la table `cv`
--

CREATE TABLE `cv` (
  `CVID` int(11) NOT NULL,
  `CandidateID` int(11) DEFAULT NULL,
  `Filename` varchar(555) DEFAULT NULL,
  `cover_letter` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `cv`
--

INSERT INTO `cv` (`CVID`, `CandidateID`, `Filename`, `cover_letter`) VALUES
(1, 1, 'johndoe_cv.pdf', 'Madame, Monsieur,\n\nJe suis très intéressé par le poste de  Responsable Magasin que vous avez publié sur votre site web. En tant que développeur expérimenté, je suis convaincu que mes compétences et mes expériences correspondent parfaitement à ce poste.\n'),
(2, 1, 'johndoe_cv.pdf', 'Madame, Monsieur,\n\nJe suis très intéressé par le poste de  Responsable Magasin que vous avez publié sur votre site web. En tant que développeur expérimenté, je suis convaincu que mes compétences et mes expériences correspondent parfaitement à ce poste.\n'),
(3, 2, 'johndoe_cv.pdf', 'Madame, Monsieur,\n\nJe suis très intéressé par le poste de  Responsable Magasin que vous avez publié sur votre site web. En tant que développeur expérimenté, je suis convaincu que mes compétences et mes expériences correspondent parfaitement à ce poste.\n'),
(4, 6, 'johndoe_cv.pdf', 'Madame, Monsieur,\n\nJe suis très intéressé par le poste de  Responsable Magasin que vous avez publié sur votre site web. En tant que développeur expérimenté, je suis convaincu que mes compétences et mes expériences correspondent parfaitement à ce poste.\n'),
(5, 6, 'johndoe_cv.pdf', 'Madame, Monsieur,\n\nJe suis très intéressé par le poste de  Responsable Magasin que vous avez publié sur votre site web. En tant que développeur expérimenté, je suis convaincu que mes compétences et mes expériences correspondent parfaitement à ce poste.\n'),
(6, 2, 'EZFEZF', 'Madame, Monsieur,\n\nJe suis très intéressé par le poste de  Responsable Magasin que vous avez publié sur votre site web. En tant que développeur expérimenté, je suis convaincu que mes compétences et mes expériences correspondent parfaitement à ce poste.\n'),
(7, 2, 'EZFEZF', 'Madame, Monsieur,\n\nJe suis très intéressé par le poste de  Responsable Magasin que vous avez publié sur votre site web. En tant que développeur expérimenté, je suis convaincu que mes compétences et mes expériences correspondent parfaitement à ce poste.\n'),
(8, 1, '6475082c3238f.', 'Madame, Monsieur,\n\nJe suis très intéressé par le poste de  Responsable Magasin que vous avez publié sur votre site web. En tant que développeur expérimenté, je suis convaincu que mes compétences et mes expériences correspondent parfaitement à ce poste.\n'),
(9, 1, '6475085b60e82.', 'Madame, Monsieur,\n\nJe suis très intéressé par le poste de  Responsable Magasin que vous avez publié sur votre site web. En tant que développeur expérimenté, je suis convaincu que mes compétences et mes expériences correspondent parfaitement à ce poste.\n'),
(10, 1, '647509fd96b76.', 'Madame, Monsieur,\n\nJe suis très intéressé par le poste de  Responsable Magasin que vous avez publié sur votre site web. En tant que développeur expérimenté, je suis convaincu que mes compétences et mes expériences correspondent parfaitement à ce poste.\n'),
(11, 1, '64750a0619c2d.', 'Madame, Monsieur,\n\nJe suis très intéressé par le poste de  Responsable Magasin que vous avez publié sur votre site web. En tant que développeur expérimenté, je suis convaincu que mes compétences et mes expériences correspondent parfaitement à ce poste.\n'),
(14, 1, '64750b290e0c1.pdf', 'Madame, Monsieur,\n\nJe suis très intéressé par le poste de  Responsable Magasin que vous avez publié sur votre site web. En tant que développeur expérimenté, je suis convaincu que mes compétences et mes expériences correspondent parfaitement à ce poste.\n'),
(15, 1, '64750c9a7d2c0.pdf', 'Madame, Monsieur,\n\nJe suis très intéressé par le poste de  Responsable Magasin que vous avez publié sur votre site web. En tant que développeur expérimenté, je suis convaincu que mes compétences et mes expériences correspondent parfaitement à ce poste.\n'),
(16, 1, '64750ce53bfd4.pdf', 'Madame, Monsieur,\n\nJe suis très intéressé par le poste de  Responsable Magasin que vous avez publié sur votre site web. En tant que développeur expérimenté, je suis convaincu que mes compétences et mes expériences correspondent parfaitement à ce poste.\n'),
(17, 1, '64750ce63ec51.pdf', 'Madame, Monsieur,\n\nJe suis très intéressé par le poste de  Responsable Magasin que vous avez publié sur votre site web. En tant que développeur expérimenté, je suis convaincu que mes compétences et mes expériences correspondent parfaitement à ce poste.\n'),
(18, 1, '64750ce6653c2.pdf', 'Madame, Monsieur,\n\nJe suis très intéressé par le poste de  Responsable Magasin que vous avez publié sur votre site web. En tant que développeur expérimenté, je suis convaincu que mes compétences et mes expériences correspondent parfaitement à ce poste.\n'),
(19, 1, '64750ce6842cc.pdf', 'Madame, Monsieur,\n\nJe suis très intéressé par le poste de  Responsable Magasin que vous avez publié sur votre site web. En tant que développeur expérimenté, je suis convaincu que mes compétences et mes expériences correspondent parfaitement à ce poste.\n'),
(20, 1, '64750ce6dc97f.pdf', 'Madame, Monsieur,\n\nJe suis très intéressé par le poste de  Responsable Magasin que vous avez publié sur votre site web. En tant que développeur expérimenté, je suis convaincu que mes compétences et mes expériences correspondent parfaitement à ce poste.\n'),
(21, 1, '64750dd4cb021.pdf', 'Madame, Monsieur,\n\nJe suis très intéressé par le poste de  Responsable Magasin que vous avez publié sur votre site web. En tant que développeur expérimenté, je suis convaincu que mes compétences et mes expériences correspondent parfaitement à ce poste.\n'),
(22, 1, '64750e1e7f61d.pdf', 'Madame, Monsieur,\n\nJe suis très intéressé par le poste de  Responsable Magasin que vous avez publié sur votre site web. En tant que développeur expérimenté, je suis convaincu que mes compétences et mes expériences correspondent parfaitement à ce poste.\n'),
(23, 1, '64750e1f6ea5c.pdf', 'Madame, Monsieur,\n\nJe suis très intéressé par le poste de  Responsable Magasin que vous avez publié sur votre site web. En tant que développeur expérimenté, je suis convaincu que mes compétences et mes expériences correspondent parfaitement à ce poste.\n'),
(24, 1, '64750e5594db3.pdf', 'Madame, Monsieur,\n\nJe suis très intéressé par le poste de  Responsable Magasin que vous avez publié sur votre site web. En tant que développeur expérimenté, je suis convaincu que mes compétences et mes expériences correspondent parfaitement à ce poste.\n'),
(25, 1, '64750e59d0ff6.pdf', 'Madame, Monsieur,\n\nJe suis très intéressé par le poste de  Responsable Magasin que vous avez publié sur votre site web. En tant que développeur expérimenté, je suis convaincu que mes compétences et mes expériences correspondent parfaitement à ce poste.\n'),
(26, 1, '64750e5a770d9.pdf', 'Madame, Monsieur,\n\nJe suis très intéressé par le poste de  Responsable Magasin que vous avez publié sur votre site web. En tant que développeur expérimenté, je suis convaincu que mes compétences et mes expériences correspondent parfaitement à ce poste.\n'),
(27, 1, '647510007cf16.pdf', 'Madame, Monsieur,\n\nJe suis très intéressé par le poste de  Responsable Magasin que vous avez publié sur votre site web. En tant que développeur expérimenté, je suis convaincu que mes compétences et mes expériences correspondent parfaitement à ce poste.\n'),
(28, 1, '6475100d43c9c.pdf', 'HHHHHHHHHHHHHHHHHHHHHHHH'),
(29, 1, '647510f7bcd5a.pdf', 'HHHHHHHHHHHHHHHHHHHHHHHH'),
(30, 1, '6475110c87cb1.pdf', 'HHHHHHHHHHHHHHHHHHHHHHHH'),
(31, 1, '64751150f1296.pdf', 'HHHHHHHHHHHHHHHHHHHHHHHH'),
(32, 1, '647515a775314.pdf', 'HHHHHHHHHHHHHHHHHHHHHHHH'),
(33, 1, '647515b2aee3d.png', 'hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh'),
(34, 1, '647517631d3ba.pdf', 'dfffffffffffffff'),
(35, 1, '6475177213d8f.pdf', 'dfffffffffffffff'),
(36, 1, '6475177b3f9fd.pdf', 'dfffffffffffffff'),
(37, 1, '647518f487d0c.pdf', 'dfffffffffffffff'),
(38, 1, '64751928f36eb.pdf', 'vvbbbbbb'),
(39, 1, '6475df9390a53.docx', 'jlojlmk,mlk'),
(40, 13, '647724301c51a.jpg', 'sqdsqdsqdsdq'),
(41, 13, '647765c2f1bc2.pdf', 'coucou\r\n'),
(42, 13, '64776808d05b6.pdf', 'trgt'),
(43, 13, '647768d6ec1bb.pdf', 'wqwq'),
(44, 13, '6477b5361ddac.pdf', 'gvhjhgj'),
(45, 13, '6477b55b47b70.pdf', 'gvhjhgj'),
(46, 13, '6477b5eb1475b.pdf', 'gvhjhgj'),
(47, 13, '6477b604ccc34.pdf', 'hjkujk'),
(48, 13, '6477b6ba97bec.pdf', 'hjkujk'),
(49, 13, '6477cdb2aa4e1.pdf', 'xwcxw'),
(50, 13, '6477cdbdcde5d.pdf', 'wxcwxc'),
(51, 13, '6477cdc92612b.pdf', 'wxcwx'),
(52, 13, '6477cf925d2b3.pdf', 'sfdvfsv'),
(53, 13, '6477cf9d59139.pdf', 'sdvvdsv'),
(54, 13, '6477cfa8f04ae.pdf', 'sdvdsv'),
(55, 13, '647895732e221.pdf', 'dqsdqsdsdsq'),
(56, 13, '6478978889fa4.pdf', 'Madame, Monsieur,\n\nJe suis très intéressé par le poste de  Responsable Magasin que vous avez publié sur votre site web. En tant que développeur expérimenté, je suis convaincu que mes compétences et mes expériences correspondent parfaitement à ce poste.\n'),
(57, 17, '647e0269dd3b6.pdf', 'Madame, Monsieur,\r\n\r\nJe suis très intéressé par le poste de  Responsable Magasin que vous avez publié sur votre site web. En tant que développeur expérimenté, je suis convaincu que mes compétences et mes expériences correspondent parfaitement à ce poste.\r'),
(58, 13, '647f6f2714c02.pdf', 'At TalentKompass Deutschland, we are committed to helping our interns develop their skills and reach their full potential. Our client is a reputable Management Consulting firm that will provide invaluable experience in a competitive industry. Don\'t miss t'),
(59, 21, '64807d2d6efed.pdf', 'zezeazeaze'),
(60, 19, '6480c4b41ffff.pdf', 'At TalentKompass Deutschland, we are committed to helping our interns develop their skills and reach their full potential. Our client is a reputable Management Consulting firm that will provide invaluable experience in a competitive industry. Don\'t miss t'),
(61, 22, '6480d5eb3eeea.pdf', 'At TalentKompass Deutschland, we are committed to helping our interns develop their skills and reach their full potential. Our client is a reputable Management Consulting firm that will provide invaluable experience in a competitive industry. Don\'t miss t'),
(62, 22, '6480d692e3114.pdf', 'At TalentKompass Deutschland, we are committed to helping our interns develop their skills and reach their full potential. Our client is a reputable Management Consulting firm that will provide invaluable experience in a competitive industry. Don\'t miss t'),
(63, 22, '6480d69f48e9e.pdf', 'At TalentKompass Deutschland, we are committed to helping our interns develop their skills and reach their full potential. Our client is a reputable Management Consulting firm that will provide invaluable experience in a competitive industry. Don\'t miss t'),
(64, 22, '6480d6cb6dce1.pdf', 'At TalentKompass Deutschland, we are committed to helping our interns develop their skills and reach their full potential. Our client is a reputable Management Consulting firm that will provide invaluable experience in a competitive industry. Don\'t miss t'),
(65, 22, '6484fe62c4342.pdf', 'hgjkghj'),
(66, 25, '6484fee0d3403.pdf', 'bv,hvb,');

-- --------------------------------------------------------

--
-- Structure de la table `employeur`
--

CREATE TABLE `employeur` (
  `EmployeurID` int(11) NOT NULL,
  `CompanyName` varchar(100) DEFAULT NULL,
  `ContactPerson` varchar(50) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `PhoneNumber` varchar(20) DEFAULT NULL,
  `Address` varchar(200) DEFAULT NULL,
  `IMG` varchar(255) DEFAULT 'default.png',
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `employeur`
--

INSERT INTO `employeur` (`EmployeurID`, `CompanyName`, `ContactPerson`, `Email`, `PhoneNumber`, `Address`, `IMG`, `password`) VALUES
(1, 'ntt data', 'Yassine moundelssi', 'jane@acme.com', '555-5678', '456 Oak St', 'default.png', 'jane@acme.com'),
(2, 'Marketing casa', 'mouhammed samid', 'janev@acme.com', '555-5678', '456 Oak St', 'default.png', 'janev@acme.com'),
(3, 'Daher', 'abdlkhafar ben talb', 'jane@acme.com', '555-5678', '456 Oak St', 'default.png', ''),
(4, 'Acme Inc.', 'Khamza tchimayl', 'jane@acme.com', '555-5678', '456 Oak St', 'default.png', ''),
(5, 'Cocacola', 'habib chamyel', 'jane@acme.com', '555-5678', '456 Oak St', 'default.png', ''),
(6, 'solicode', 'yassine moundelssi', 'mouine.solicode@gmail.com', '0605466397', 'HAFID IBN ABDALBAR TANGER108', 'default.png', 'mouine.solicode@gmail.com'),
(7, 'solicode', 'yassine moundelssi', 'mouine.solicode@gmail.com', '0605466397', 'HAFID IBN ABDALBAR TANGER108', 'default.png', 'mouine.solicode@gmail.com'),
(8, 'solicode', 'yassine moundelssi', 'mouide@gmail.com', '0605466397', 'HAFID IBN ABDALBAR TANGER108', 'default.png', 'mouide@gmail.com'),
(9, 'Ntt data', 'hicham andaloussi', 'mocode@gmail.com', '+212605466397', 'Av. Hafid Ibn Abdelbar', 'default.png', 'mocode@gmail.com'),
(10, 'Ntt data', 'hicham andaloussi', 'mouode@gmail.com', '+212605466397', 'Av. Hafid Ibn Abdelbar', 'default.png', 'mouode@gmail.com'),
(11, 'solicode', 'hicham andaloussi', 'moundelssi.ysolicode@gmail.com', '+212605466397', 'Av. Hafid Ibn Abdelbar', 'default.png', 'moundelssi.ysolicode@gmail.com'),
(12, 'solicode', 'yassine moundelssi', 'mode@gmail.com', '0605466397', 'HAFID IBN ABDALBAR TANGER108', 'default.png', 'mode@gmail.com'),
(13, 'solicode', 'yassine moundelssi', 'mode@gmail.com', '0605466397', 'HAFID IBN ABDALBAR TANGER108', 'default.png', 'mode@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

CREATE TABLE `inscription` (
  `InscriptionID` int(11) NOT NULL,
  `JobID` int(11) DEFAULT NULL,
  `CVID` int(11) DEFAULT NULL,
  `CandidateID` int(11) DEFAULT NULL,
  `ApplicationDate` date DEFAULT NULL,
  `Status` varchar(200) NOT NULL DEFAULT 'En attente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `inscription`
--

INSERT INTO `inscription` (`InscriptionID`, `JobID`, `CVID`, `CandidateID`, `ApplicationDate`, `Status`) VALUES
(10, 5, 39, 1, '2023-05-30', 'En attente'),
(25, 2, 56, 13, '2023-06-01', 'Reject'),
(26, 2, 57, 17, '2023-06-05', 'Interview'),
(27, 3, 58, 13, '2023-06-06', 'Interview'),
(28, 29, 59, 21, '2023-06-07', 'Interview'),
(29, 5, 60, 19, '2023-06-07', 'En attente'),
(31, 56, 62, 22, '2023-06-07', 'Reject'),
(32, 5, 63, 22, '2023-06-07', 'En attente'),
(34, 2, 65, 22, '2023-06-11', 'Interview');

--
-- Déclencheurs `inscription`
--
DELIMITER $$
CREATE TRIGGER `insc_status_trigger` AFTER UPDATE ON `inscription` FOR EACH ROW BEGIN
  IF NEW.Status <> OLD.Status THEN
    INSERT INTO `Notifications` (`UserID`, `Message`) VALUES (NEW.CandidateID, CONCAT('Inscription status changed to ', NEW.Status));
  END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `notifications`
--

CREATE TABLE `notifications` (
  `NotificationID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Message` varchar(255) NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `offres`
--

CREATE TABLE `offres` (
  `JobID` int(11) NOT NULL,
  `JobTitle` varchar(100) DEFAULT NULL,
  `JobDescription` text DEFAULT NULL,
  `Qualifications` text DEFAULT NULL,
  `ExperienceRequired` text DEFAULT NULL,
  `Salary` varchar(50) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `EmployeurID` int(11) DEFAULT NULL,
  `type_post` varchar(255) DEFAULT NULL,
  `date_publee` date NOT NULL DEFAULT current_timestamp(),
  `category` varchar(255) DEFAULT NULL,
  `duree_contrat` varchar(255) DEFAULT NULL,
  `num_condidate` int(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `offres`
--

INSERT INTO `offres` (`JobID`, `JobTitle`, `JobDescription`, `Qualifications`, `ExperienceRequired`, `Salary`, `city`, `EmployeurID`, `type_post`, `date_publee`, `category`, `duree_contrat`, `num_condidate`, `img`) VALUES
(2, 'Software Engineer', 'We are seeking a talented software engineer to join our team. The ideal candidate will have a strong foundation in computer science, experience with a variety of programming languages and technologies, and a passion for building innovative software products.\r\n\r\nIn this role, you will be responsible for designing, developing, and testing software applications. You will also work with other engineers to architect and implement new features, and you will be responsible for the quality and performance of your work.\r\n\r\nWe are looking for someone who is self-motivated, able to work independently, and able to meet deadlines. You should also be able to work well in a team environment and be able to communicate effectively with both technical and non-technical audiences.\r\n\r\nIf you are a talented software engineer with a passion for building great products, we encourage you to apply.', 'Bachelor\'s degree in Computer Science or related field', '3+ years of experience in software development', '$50,000-$60,000', 'Tanger', 1, 'CDD', '2023-05-25', 'IT', ' 6 mois.', 23, 'NTT-Data.jpg'),
(3, 'Marketing Coordinator', 'We are seeking a Marketing Coordinator to assist with our marketing campaigns. The ideal candidate will have a strong understanding of marketing principles and strategies, as well as experience with a variety of marketing tools and platforms.', 'Bachelor\'s degree in Marketing or related field', '1+ years of experience in marketing', '$50,000-$60,000', 'casablanca', 2, 'CDI', '2023-05-25', 'Marketing', ' 6 mois.', 233, 'marketing.jpeg'),
(4, 'Accountant', 'We are looking for an accountant to manage our financial records.', 'Bachelor\'s degree in Accounting or related field', '3+ years of experience in accounting', '$40000-$50000', 'Tanger', 3, 'CDI', '2023-05-25', 'Finance', ' 3 mois', 5, 'accountant.jpg'),
(5, 'Mécanique', 'We are seeking a Marketing Coordinator to assist with our marketing campaigns. The ideal candidate will have a strong understanding of marketing principles and strategies, as well as experience with a variety of marketing tools and platforms.\n\nIn this role, you will be responsible for the following:\n\nDevelop and execute marketing plans for a variety of products and services. This includes researching target audiences, developing marketing messages, and creating marketing materials.\nDevelop marketing plans for a variety of products and services, including identifying target audiences, developing marketing messages, and creating marketing materials.\nWork with cross-functional teams to ensure that marketing plans are aligned with business goals.\nTrack and report on the performance of marketing campaigns.\nCreate and manage marketing content, such as website copy, blog posts, and social media posts. This includes writing, editing, and proofreading content, as well as scheduling and publishing content.\nCreate and manage marketing content for a variety of channels, including website, blog, social media, and email.\nWrite clear and concise content that is engaging and informative.\nEdit and proofread content for accuracy and clarity.\nSchedule and publish content on a timely basis.\nTrack and analyze marketing results to measure the effectiveness of campaigns. This includes collecting data from various sources, such as website analytics, social media analytics, and email marketing analytics.\nCollect data from a variety of sources, including website analytics, social media analytics, and email marketing analytics.\nAnalyze data to identify trends and patterns.\nReport on the performance of marketing campaigns to stakeholders.', 'Bachelor\'s degree in Marketing or related field', '5+ years of experience in marketing', '$100,000-$120,000', 'casablanca', 3, 'CDI', '2023-05-25', 'Category', ' 12 mois', 2, 'mecanique.jpg'),
(56, 'daher', 'At TalentKompass Deutschland, we are committed to helping our interns develop their skills and reach their full potential. Our client is a reputable Management Consulting firm that will provide invaluable experience in a competitive industry. Don\'t miss this incredible opportunity to jump-start your career in software development – apply now!', 'bac +3', '', '3000-6000', 'Sale', 2, 'CDD', '2023-06-07', NULL, ' 6 mois.', NULL, '2eeed4d68461f341.jpg'),
(57, 'Blackbox', 'At TalentKompass Deutschland, we are committed to helping our interns develop their skills and reach their full potential. Our client is a reputable Management Consulting firm that will provide invaluable experience in a competitive industry. Don\'t miss this incredible opportunity to jump-start your career in software development – apply now!', 'bac +3', '', '2001-3000', 'El Kelaa des Srarhna', 2222, 'CDD', '2023-06-07', NULL, ' 6 mois.', NULL, '13ef5e961896509a.jpg'),
(58, 'Blackbox', 'At TalentKompass Deutschland, we are committed to helping our interns develop their skills and reach their full potential. Our client is a reputable Management Consulting firm that will provide invaluable experience in a competitive industry. Don\'t miss this incredible opportunity to jump-start your career in software development – apply now!', 'bac +3', '', '2001-3000', 'El Kelaa des Srarhna', 2222, 'CDD', '2023-06-07', NULL, ' 6 mois.', NULL, '4495adecb7af5dbb.jpg'),
(133, 'ffffffffff', 'fffffffffff', 'fffffffffffffffffffffffff', '', '-', 'Fnidq', NULL, NULL, '2023-06-17', NULL, '', NULL, '3abec2196db15217.jpg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `candidate`
--
ALTER TABLE `candidate`
  ADD PRIMARY KEY (`CandidateID`);

--
-- Index pour la table `cv`
--
ALTER TABLE `cv`
  ADD PRIMARY KEY (`CVID`);

--
-- Index pour la table `employeur`
--
ALTER TABLE `employeur`
  ADD PRIMARY KEY (`EmployeurID`);

--
-- Index pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD PRIMARY KEY (`InscriptionID`);

--
-- Index pour la table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`NotificationID`);

--
-- Index pour la table `offres`
--
ALTER TABLE `offres`
  ADD PRIMARY KEY (`JobID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `candidate`
--
ALTER TABLE `candidate`
  MODIFY `CandidateID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `cv`
--
ALTER TABLE `cv`
  MODIFY `CVID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT pour la table `employeur`
--
ALTER TABLE `employeur`
  MODIFY `EmployeurID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `inscription`
--
ALTER TABLE `inscription`
  MODIFY `InscriptionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT pour la table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `NotificationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT pour la table `offres`
--
ALTER TABLE `offres`
  MODIFY `JobID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
