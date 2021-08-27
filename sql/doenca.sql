-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 28-Ago-2017 às 12:18
-- Versão do servidor: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sisdam`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `doenca`
--

CREATE TABLE `doenca` (
  `id` int(11) NOT NULL,
  `doencanot` varchar(40) DEFAULT NULL,
  `cid` varchar(11) DEFAULT NULL,
  `criado` datetime DEFAULT NULL,
  `usuariocad` varchar(20) DEFAULT 'sistema',
  `alterado` datetime DEFAULT NULL,
  `usuarioalt` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `doenca`
--

INSERT INTO `doenca` (`id`, `doencanot`, `cid`, `criado`, `usuariocad`, `alterado`, `usuarioalt`) VALUES
(1, 'AGRAVOS INUSITADOS', '0', NULL, NULL, NULL, NULL),
(2, 'BOTULISMO', '0', NULL, NULL, NULL, NULL),
(3, 'CARBUNCULO/ANTRAZ', 'NULL', NULL, NULL, '2016-11-21 14:23:52', 'admin'),
(4, 'COLERA', '0', NULL, NULL, NULL, NULL),
(5, 'COQUELUCHE', '0', NULL, NULL, NULL, NULL),
(6, 'DENGUE', 'NULL', NULL, NULL, '2016-11-11 11:19:13', 'admin'),
(7, 'DIFTERIA', '0', NULL, NULL, NULL, NULL),
(8, 'DOENCA DE CHAGAS AGUDA', 'NULL', NULL, NULL, '2016-11-11 15:36:07', 'admin'),
(9, 'DOENCA DE CREUTZFELDT - JACOB', 'NULL', NULL, NULL, '2016-11-11 15:36:28', 'admin'),
(10, 'DOENCA MENINGOCOCICA', 'NULL', NULL, NULL, '2016-11-11 15:36:44', 'admin'),
(11, 'MENINGITES', '0', NULL, NULL, NULL, NULL),
(12, 'DOENCAS DE CHAGAS', 'NULL', NULL, NULL, '2016-11-11 15:37:20', 'admin'),
(13, 'EPIZOOTIAS E/OU MORTE DE ANIMAIS', '0', NULL, NULL, NULL, NULL),
(14, 'ESQUISTOSSOMOSE', '0', NULL, NULL, NULL, NULL),
(15, 'EVENTOS ADVERSOS POS VACINACAO', 'NULL', NULL, NULL, '2016-11-11 15:37:50', 'admin'),
(16, 'FEBRE AMARELA', '0', NULL, NULL, NULL, NULL),
(17, 'FEBRE DO NILO OCIDENTAL', '0', NULL, NULL, NULL, NULL),
(18, 'FEBRE MACULOSA', '0', NULL, NULL, NULL, NULL),
(19, 'FEBRE TIFOIDE', '0', NULL, NULL, NULL, NULL),
(20, 'HANTAVIROSE', '0', NULL, NULL, NULL, NULL),
(21, 'HEPATITES VIRAIS', '0', NULL, NULL, NULL, NULL),
(22, 'HIV', '0', NULL, NULL, NULL, NULL),
(23, 'INFLUENZA HUMANA ', '0', NULL, NULL, NULL, NULL),
(24, 'INFLUENZA HUMANA POR NOVO SUBTIPO', '0', NULL, NULL, NULL, NULL),
(25, 'LEISHMANIOSE TEGUMENTAR AMERICANA', '0', NULL, NULL, NULL, NULL),
(26, 'LEISHMANIOSE VISCERAL', '0', NULL, NULL, NULL, NULL),
(27, 'LEPTOSPIROSE', '0', NULL, NULL, NULL, NULL),
(28, 'MALARIA', '0', NULL, NULL, NULL, NULL),
(29, 'MENINGITE_HAEMOPHILUS INFLUENZAE', '0', NULL, NULL, NULL, NULL),
(30, 'PARALISIA FLACIDA AGUDA', '0', NULL, NULL, NULL, NULL),
(31, 'PESTE', '0', NULL, NULL, NULL, NULL),
(32, 'POLIOMIELITE', '0', NULL, NULL, NULL, NULL),
(33, 'RAIVA HUMANA', '0', NULL, NULL, NULL, NULL),
(34, 'RUBEOLA', '0', NULL, NULL, NULL, NULL),
(35, 'SARAMPO', '0', NULL, NULL, NULL, NULL),
(36, 'SIFILIS CONGENITA', '0', NULL, NULL, NULL, NULL),
(37, 'SIFILIS EM GESTANTE', '0', NULL, NULL, NULL, NULL),
(38, 'AIDS', '0', NULL, NULL, NULL, NULL),
(39, 'RUBEOLA CONGENITA', '0', NULL, NULL, NULL, NULL),
(40, 'SIND. FEBRIL ICTERO-HEMORRAGICA AGUDA', '0', NULL, NULL, NULL, NULL),
(41, 'SIND. RESPIRATORIA AGUDA GRAVE', '0', NULL, NULL, NULL, NULL),
(42, 'SIND. RESPIRATORIA AGUDA GRAVE', '0', NULL, NULL, NULL, NULL),
(43, 'TETANO', '0', NULL, NULL, NULL, NULL),
(44, 'TETANO NEONATAL', '0', NULL, NULL, NULL, NULL),
(45, 'TUBERCULOSE', '0', NULL, NULL, NULL, NULL),
(46, 'TULAREMIA', '0', NULL, NULL, NULL, NULL),
(47, 'VARIOLA', '0', NULL, NULL, NULL, NULL),
(48, 'ROTAVIRUS', '0', NULL, NULL, NULL, NULL),
(49, 'CRIANCA EXPOSTA AO HIV', 'NULL', NULL, NULL, '2016-11-11 14:25:53', 'D788796'),
(50, 'GESTANTE HIV', '0', NULL, NULL, NULL, NULL),
(51, 'CRIANCA EXPOSTA AO HBV/HCV', 'NULL', NULL, NULL, '2016-11-11 15:35:38', 'admin'),
(52, 'ANTI-RABICO', '0', NULL, NULL, NULL, NULL),
(53, 'SIFILIS NAO ESPECIFICADA', '0', NULL, NULL, NULL, NULL),
(54, 'SIND. CORRIMENTO URETRAL', '0', NULL, NULL, NULL, NULL),
(55, 'DST', '0', NULL, NULL, NULL, NULL),
(56, 'ACIDENTE DE TRABALHO', '0', NULL, NULL, NULL, NULL),
(57, 'ACIDENTE COM MATERIAL BIOLOGICO', '0', NULL, 'admin', NULL, NULL),
(58, 'VIOLENCIA INTERPESSOAL/AUTO PROVOCADA', '0', NULL, NULL, NULL, NULL),
(68, 'DOENCA AGUDA PELO VIRUS ZIKA', 'NULL', '2016-11-30 09:37:26', 'D791749', '2017-01-02 10:17:02', 'admin'),
(60, 'CHIKUNGUNYA', '0', NULL, NULL, NULL, NULL),
(61, 'INTOXICACAO EXOGENA', '0', NULL, NULL, NULL, NULL),
(67, 'ACIDENTES POR ANIMAIS PECONHENTOS', 'X-29', '2016-11-17 11:46:24', 'admin', NULL, NULL),
(69, 'HANSENIASE', 'a309', '2016-12-08 07:59:37', 'D701418', NULL, NULL),
(70, 'SRAG', 'j11NULL', '2016-12-13 08:38:03', 'D701418', NULL, NULL),
(71, 'PAROTIDITE', 'NULL', '2016-12-13 08:39:13', 'D701418', NULL, NULL),
(72, 'VARICELA', 'NULL', '2016-12-21 09:10:31', 'D701418', NULL, NULL),
(74, 'AIDS ADULTO', 'NULL', '2017-01-11 09:44:57', 'admin', NULL, NULL),
(75, 'AIDS EM CRIANCA', 'NULL', '2017-01-11 09:51:41', 'admin', NULL, NULL),
(76, 'SURTO DE VARICELA', 'NULL', '2017-01-12 10:48:49', 'admin', NULL, NULL),
(77, 'FEBRE PELO VIRUS ZIKA', 'a 92.8NULL', '2017-03-28 08:12:32', 'D701418', NULL, NULL),
(78, 'GESTANTE COM HBV/HCV', 'O98.4', '2017-06-05 09:50:10', 'admin', '2017-06-05 09:54:00', 'admin'),
(79, 'DOENÃ‡A PRIONICA', 'NULL', '2017-06-27 11:25:35', 'D701418', NULL, NULL),
(80, 'DOENCA PRIONICA', 'NULL', '2017-06-27 11:26:03', 'D701418', NULL, NULL),
(81, 'ESPOROTRICOSE', 'NULL', '2017-07-13 12:30:41', 'D701418', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doenca`
--
ALTER TABLE `doenca`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doenca`
--
ALTER TABLE `doenca`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
