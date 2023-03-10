-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 10.47.171.110:3306
-- Tempo de geração: 19-Ago-2022 às 20:53
-- Versão do servidor: 10.4.13-MariaDB
-- versão do PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sisdam`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `esporo_medc_erro`
--

CREATE TABLE `esporo_medc_erro` (
  `id_rem` int(3) NOT NULL,
  `id_esp_med` int(3) NOT NULL,
  `nome_mdcm` varchar(11) DEFAULT NULL,
  `dose_mg_dia_1` varchar(3) DEFAULT NULL,
  `data_uem` varchar(10) DEFAULT NULL,
  `jan` varchar(3) DEFAULT NULL,
  `fev` varchar(2) DEFAULT NULL,
  `mar` varchar(2) DEFAULT NULL,
  `abr` varchar(2) DEFAULT NULL,
  `mai` varchar(2) DEFAULT NULL,
  `jun` varchar(3) DEFAULT NULL,
  `jul` varchar(2) DEFAULT NULL,
  `ago` varchar(10) DEFAULT NULL,
  `set` varchar(10) DEFAULT NULL,
  `out` varchar(10) DEFAULT NULL,
  `nov` varchar(10) DEFAULT NULL,
  `dez` varchar(10) DEFAULT NULL,
  `ano_mdcm` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `esporo_medc_erro`
--

INSERT INTO `esporo_medc_erro` (`id_rem`, `id_esp_med`, `nome_mdcm`, `dose_mg_dia_1`, `data_uem`, `jan`, `fev`, `mar`, `abr`, `mai`, `jun`, `jul`, `ago`, `set`, `out`, `nov`, `dez`, `ano_mdcm`) VALUES
(1, 126, 'Itraconazol', '100', '20/01/2021', '', '', '', '', '', '', '', '', '', '', '', '', '2021'),
(2, 180, 'Itraconazol', '100', '20/01/2021', '', '', '', '', '', '', '', '', '', '', '', '', '2021'),
(3, 153, 'Itraconazol', '100', '02/02/2021', '', '30', '', '', '0', '', '', '', '', '', '', '', '2021'),
(4, 88, 'Itraconazol', '100', '14/02/2021', '30', '30', '', '', '', '', '', '', '', '', '', '', '2021'),
(5, 56, 'Itraconazol', '100', '17/02/2021', '', '', '', '', '', '', '', '', '', '', '', '', '2021'),
(6, 89, 'Itraconazol', '100', '30/03/2021', '', '', '', '', '', '', '', '', '', '', '', '', '2021'),
(7, 140, 'Itraconazol', '50', '30/03/2021', '', '', '', '', '', '', '', '', '', '', '', '', '2021'),
(8, 251, 'Itraconazol', '100', '30/03/2021', '', '', '', '', '', '', '', '', '', '', '', '', '2021'),
(9, 262, 'Itraconazol', '50', '30/03/2021', '', '', '', '', '', '', '', '', '', '', '', '', '2021'),
(10, 106, 'Itraconazol', '100', '25/04/2021', '', '', '', '', '', '', '', '', '', '', '', '', '2021'),
(11, 249, 'Itraconazol', '100', '03/06/2021', '', '', '', '', '', '', '', '', '', '', '', '', '2021'),
(12, 93, 'Itraconazol', '100', '09/06/2021', '', '', '', '', '', '', '', '', '', '', '', '', '2021'),
(13, 173, 'Itraconazol', '100', '09/06/2021', '', '', '', '', '', '', '', '', '', '', '', '', '2021'),
(14, 142, 'Itraconazol', '100', '11/06/2021', '', '', '', '', '', '', '', '', '', '', '', '', '2021'),
(15, 107, 'Itraconazol', '100', '20/06/2021', '', '', '', '', '', '', '', '', '', '', '', '', '2021'),
(16, 169, 'Itraconazol', '100', '06/07/2021', '', '', '', '', '', '', '', '', '', '', '', '', '2021'),
(17, 164, 'Itraconazol', '100', '08/07/2021', '', '', '', '', '', '', '', '', '', '', '', '', '2021'),
(18, 55, 'Itraconazol', '100', '14/07/2021', '', '', '', '', '', '', '', '', '', '', '', '', '2021'),
(19, 285, 'Itraconazol', '100', '16/07/2021', '', '', '', '', '', '', '', '', '', '', '', '', '2021'),
(20, 69, 'Itraconazol', '100', '21/07/2021', '', '', '', '', '', '', '', '', '', '', '', '', '2021'),
(21, 78, 'Itraconazol', '100', '21/07/2021', '', '', '', '', '', '', '', '', '', '', '', '', '2021'),
(22, 178, 'Itraconazol', '100', '21/07/2021', '', '', '', '', '', '', '', '', '', '', '', '', '2021'),
(23, 72, 'Itraconazol', '100', '22/07/2021', '', '', '', '', '', '', '', '', '', '', '', '', '2021'),
(24, 161, 'Itraconazol', '100', '28/07/2021', '', '', '', '', '', '', '', '', '', '', '', '', '2021'),
(25, 277, 'Itraconazol', '100', '02/08/2021', '', '', '', '', '', '', '', '', '', '', '', '', '2021'),
(26, 84, 'Itraconazol', '100', '03/08/2021', '', '', '', '', '', '', '', '', '', '', '', '', '2021'),
(27, 177, 'Itraconazol', '100', '03/08/2021', '', '', '', '', '', '', '', '', '', '', '', '', '2021'),
(28, 260, 'Itraconazol', '100', '03/08/2021', '', '', '', '', '', '', '', '', '', '', '', '', '2021'),
(29, 77, 'Itraconazol', '100', '04/08/2021', '', '', '', '', '', '', '', '', '', '', '', '', '2021'),
(30, 87, 'Itraconazol', '100', '12/08/2021', '', '', '', '', '', '', '', '', '', '', '', '', '2021'),
(31, 186, 'Itraconazol', '100', '12/08/2021', '', '', '', '', '', '', '', '', '', '', '', '', '2021'),
(32, 96, 'Itraconazol', '100', '17/08/2021', '', '', '', '', '', '', '', '', '', '', '', '', '2021'),
(33, 100, 'Itraconazol', '100', '17/08/2021', '', '', '', '', '', '', '', '', '', '', '', '', '2021'),
(34, 74, 'Itraconazol', '100', '20/08/2021', '', '', '', '', '', '', '', '', '', '', '', '', '2021'),
(35, 276, 'Itraconazol', '100', '20/08/2021', '', '', '', '', '', '', '', '', '', '', '', '', '2021'),
(36, 278, 'Itraconazol', '100', '23/08/2021', '', '', '', '', '', '', '', '', '', '', '', '', '2021'),
(37, 149, 'Itraconazol', '100', '08/09/2021', '', '', '', '', '', '', '', '', '', '', '', '', '2021'),
(38, 166, 'Itraconazol', '100', '08/09/2021', '', '', '', '', '', '', '', '', '', '', '', '', '2021'),
(39, 131, 'Itraconazol', '100', '15/09/2021', '', '', '', '', '', '', '', '', '', '', '', '', '2021'),
(40, 268, 'Itraconazol', '100', '15/09/2021', '', '', '', '', '', '', '', '', '', '', '', '', '2021'),
(41, 284, 'Itraconazol', '100', '15/09/2021', '', '', '', '', '', '', '', '', '', '', '', '', '2021'),
(42, 148, 'Itraconazol', '100', '16/09/2021', '', '', '', '', '', '', '', '', '', '', '', '', '2021'),
(43, 151, 'Itraconazol', '100', '16/09/2021', '', '', '', '', '', '', '', '', '', '', '', '', '2021'),
(44, 133, 'Itraconazol', '100', '06/10/2021', '', '', '', '', '', '', '', '', '', '', '', '', '2021'),
(45, 138, 'Itraconazol', '100', '25/10/2021', '', '', '', '', '', '', '', '', '', '', '', '', '2021'),
(46, 92, 'Itraconazol', '100', '28/10/2021', '', '', '', '', '', '', '', '', '', '', '', '', '2021'),
(47, 115, 'Itraconazol', '100', '28/10/2021', '', '', '', '', '', '', '', '', '', '', '', '', '2021'),
(48, 116, 'Itraconazol', '100', '28/10/2021', '', '', '', '', '', '', '', '', '', '', '', '', '2021'),
(49, 119, 'Itraconazol', '100', '28/10/2021', '', '', '', '', '', '', '', '', '', '', '', '', '2021'),
(50, 155, 'Itraconazol', '100', '28/10/2021', '', '', '', '', '', '', '', '', '', '', '', '', '2021'),
(51, 273, 'Itraconazol', '100', '28/10/2021', '', '', '', '', '', '', '', '', '', '', '', '', '2021'),
(52, 127, 'Itraconazol', '100', '05/11/2021', '', '', '', '', '', '', '', '', '', '', '', '', '2021'),
(53, 129, 'Itraconazol', '100', '05/11/2021', '', '', '', '', '', '', '', '', '', '', '', '', '2021'),
(54, 108, 'Itraconazol', '100', '09/11/2021', '', '', '', '', '', '', '', '', '', '', '', '', '2021'),
(55, 175, 'Itraconazol', '100', '10/11/2021', '', '', '', '', '', '', '', '', '', '', '', '', '2021'),
(56, 95, 'Itraconazol', '100', '14/11/2021', '', '', '', '', '', '', '', '', '', '', '', '', '2021'),
(57, 114, 'Itraconazol', '100', '14/11/2021', '', '', '', '', '', '', '', '', '', '', '', '', '2021'),
(58, 118, 'Itraconazol', '100', '14/11/2021', '', '', '', '', '', '', '', '', '', '', '', '', '2021'),
(59, 128, 'Itraconazol', '100', '16/11/2021', '', '', '', '', '', '', '', '', '', '', '', '', '2021'),
(60, 265, 'Itraconazol', '100', '19/11/2021', '', '', '', '', '', '', '', '', '', '', '', '', '2021'),
(61, 281, 'Itraconazol', '100', '19/11/2021', '', '', '', '', '', '', '', '', '', '', '', '', '2021'),
(62, 124, 'Itraconazol', '100', '28/11/2021', '', '', '', '', '', '', '', '', '', '', '', '', '2021'),
(63, 58, 'Itraconazol', '100', '01/12/2021', '', '', '', '', '', '', '', '', '', '', '', '', '2021'),
(64, 170, 'Itraconazol', '100', '01/12/2021', '', '', '', '', '', '', '', '', '', '', '', '', '2021'),
(65, 257, 'Itraconazol', '100', '01/12/2021', '', '', '', '', '', '', '', '', '', '', '', '', '2021'),
(66, 259, 'Itraconazol', '100', '01/12/2021', '', '', '', '', '', '', '', '', '', '', '', '', '2021'),
(67, 282, 'Itraconazol', '', '02/12/2021', '', '', '', '', '', '', '', '', '', '', '', '', '2021'),
(68, 91, 'Itraconazol', '100', '03/12/2021', '', '', '', '', '', '', '', '', '', '', '', '', '2021'),
(69, 98, 'Itraconazol', '100', '03/12/2021', '', '', '', '', '', '', '', '', '', '', '', '', '2021'),
(70, 139, 'Itraconazol', '50', '07/12/2021', '', '', '', '', '', '', '', '', '', '', '', '', '2021'),
(71, 152, 'Itraconazol', '100', '07/12/2021', '', '', '', '', '', '', '', '', '', '', '', '', '2021'),
(72, 172, 'Itraconazol', '100', '07/12/2021', '', '', '', '', '', '', '', '', '', '', '', '', '2021'),
(73, 182, 'Itraconazol', '100', '07/12/2021', '', '', '', '', '', '', '', '', '', '', '', '', '2021'),
(74, 184, 'Itraconazol', '50', '07/12/2021', '', '', '', '', '', '', '', '', '', '', '', '', '2021'),
(75, 64, 'Itraconazol', '100', '14/12/2021', '', '', '', '', '', '', '', '', '', '', '', '', '2021'),
(76, 101, 'Itraconazol', '100', '21/12/2021', '', '', '', '', '', '', '', '', '', '', '', '', '2021'),
(77, 145, 'Itraconazol', '100', '21/12/2021', '', '', '', '', '', '', '', '', '', '', '', '', '2021'),
(78, 120, 'Itraconazol', '100', '23/12/2021', '', '', '', '', '', '', '', '', '', '', '', '', '2021'),
(79, 168, 'Itraconazol', '100', '23/12/2021', '', '', '', '', '', '', '', '', '', '', '', '', '2021'),
(80, 221, 'Itraconazol', '100', '05/01/2022', '60', '', '', '', '', '', '', '', '', '', '', '', '2022'),
(81, 213, 'Itraconazol', '100', '06/01/2022', '', '', '', '', '', '', '', '', '', '', '', '', '2022'),
(82, 105, 'Itraconazol', '100', '17/01/2022', '60', '', '', '', '', '', '', '', '', '', '', '', '2022'),
(83, 60, 'Itraconazol', '100', '19/01/2022', '30', '', '', '', '', '', '', '', '', '', '', '', '2022'),
(84, 224, 'Itraconazol', '100', '20/01/2022', '60', '', '', '', '', '', '', '', '', '', '', '', '2022'),
(85, 63, 'Itraconazol', '100', '21/01/2022', '', '', '', '', '', '', '', '', '', '', '', '', '2022'),
(86, 66, 'Itraconazol', '100', '21/01/2022', '', '', '', '', '', '', '', '', '', '', '', '', '2022'),
(87, 81, 'Itraconazol', '100', '21/01/2022', '', '', '', '', '', '', '', '', '', '', '', '', '2022'),
(88, 125, 'Itraconazol', '100', '21/01/2022', '30', '', '', '', '', '', '', '', '', '', '', '', '2022'),
(89, 137, 'Itraconazol', '100', '21/01/2022', '30', '', '', '', '', '', '', '', '', '', '', '', '2022'),
(90, 99, 'Itraconazol', '100', '24/01/2022', '', '', '', '', '', '', '', '', '', '', '', '', '2022'),
(91, 283, 'Itraconazol', '100', '27/01/2022', '60', '', '', '', '', '', '', '', '', '', '', '', '2022'),
(92, 192, 'Itraconazol', '100', '28/01/2022', '60', '', '', '', '', '', '', '', '', '', '', '', '2022'),
(93, 61, 'Itraconazol', '100', '07/02/2022', '', '', '', '', '', '', '', '', '', '', '', '', '2022'),
(94, 73, 'Itraconazol', '100', '07/02/2022', '', '', '60', '', '', '', '', '', '', '', '', '', '2022'),
(95, 83, 'Itraconazol', '100', '07/02/2022', '', '', '', '', '', '', '', '', '', '', '', '', '2022'),
(96, 216, 'Itraconazol', '100', '08/02/2022', '', '60', '', '', '', '', '', '', '', '', '', '', '2022'),
(97, 272, 'Itraconazol', '100', '11/02/2022', '30', '30', '0', '0', '', '', '', '', '', '', '', '', '2022'),
(98, 122, 'Itraconazol', '100', '12/02/2022', '30', '15', '', '', '', '', '', '', '', '', '', '', '2022'),
(99, 47, 'Itraconazol', '100', '21/02/2022', '30', '30', '', '', '', '', '', '', '', '', '', '', '2022'),
(100, 80, 'Itraconazol', '100', '21/02/2022', '30', '30', '', '', '', '', '', '', '', '', '', '', '2022'),
(101, 111, 'Itraconazol', '100', '21/02/2022', '30', '30', '', '', '', '', '', '', '', '', '', '', '2022'),
(102, 113, 'Itraconazol', '100', '21/02/2022', '30', '30', '', '', '', '', '', '', '', '', '', '', '2022'),
(103, 109, 'Itraconazol', '100', '03/03/2022', '120', '', '60', '', '', '', '', '', '', '', '', '', '2022'),
(104, 65, 'Itraconazol', '100', '07/03/2022', '30', '30', '30', '30', '0', '', '', '', '', '', '', '', '2022'),
(105, 110, 'Itraconazol', '100', '09/03/2022', '30', '', '30', '0', '0', '', '', '', '', '', '', '', '2022'),
(106, 226, 'Itraconazol', '100', '14/03/2022', '', '', '30', '', '', '', '', '', '', '', '', '', '2022'),
(107, 203, 'Itraconazol', '100', '17/03/2022', '', '', '60', '0', '0', '', '', '', '', '', '', '', '2022'),
(108, 214, 'Itraconazol', '100', '17/03/2022', '', '', '60', '0', '0', '', '', '', '', '', '', '', '2022'),
(109, 68, 'Itraconazol', '100', '18/03/2022', '30', '30', '30', '', '', '', '', '', '', '', '', '', '2022'),
(110, 183, 'Itraconazol', '100', '18/03/2022', '30', '30', '30', '', '', '', '', '', '', '', '', '', '2022'),
(111, 185, 'Itraconazol', '100', '20/03/2022', '30', '', '', '', '', '', '', '', '', '', '', '', '2022'),
(112, 187, 'Itraconazol', '100', '21/03/2022', '', '', '60', '', '0', '', '', '', '', '', '', '', '2022'),
(113, 248, 'Itraconazol', '100', '21/03/2022', '30', '60', '60', '0', '0', '', '', '', '', '', '', '', '2022'),
(114, 1, 'Itraconazol', '100', '28/03/2022', '20', '30', '30', '', '', '', '', '', '', '', '', '', '2022'),
(115, 190, 'Itraconazol', '100', '28/03/2022', '', '', '60', '', '', '', '', '', '', '', '', '', '2022'),
(116, 102, 'Itraconazol', '100', '29/03/2022', '', '', '60', '', '', '', '', '', '', '', '', '', '2022'),
(117, 70, 'Itraconazol', '100', '30/03/2022', '30', '30', '', '', '', '', '', '', '', '', '', '', '2022'),
(118, 206, 'Itraconazol', '100', '05/04/2022', '', '', '', '60', '', '', '', '', '', '', '', '', '2022'),
(119, 112, 'Itraconazol', '100', '07/04/2022', '', '', '30', '30', '0', '', '', '', '', '', '', '', '2022'),
(120, 231, 'Itraconazol', '50', '07/04/2022', '', '', '', '15', '', '', '', '', '', '', '', '', '2022'),
(121, 232, 'Itraconazol', '100', '07/04/2022', '', '', '', '30', '', '', '', '', '', '', '', '', '2022'),
(122, 75, 'Itraconazol', '100', '12/04/2022', '30', '30', '30', '30', '', '', '', '', '', '', '', '', '2022'),
(123, 57, 'Itraconazol', '100', '13/04/2022', '', '30', '', '30', '', '', '', '', '', '', '', '', '2022'),
(124, 97, 'Itraconazol', '100', '13/04/2022', '30', '30', '30', '30', '', '', '', '', '', '', '', '', '2022'),
(125, 254, 'Itraconazol', '100', '13/04/2022', '30', '30', '30', '30', '', '', '', '', '', '', '', '', '2022'),
(126, 59, 'Itraconazol', '100', '14/04/2022', '', '', '30', '30', '', '', '', '', '', '', '', '', '2022'),
(127, 79, 'Itraconazol', '100', '14/04/2022', '30', '30', '30', '30', '', '', '', '', '', '', '', '', '2022'),
(128, 85, 'Itraconazol', '100', '14/04/2022', '30', '30', '30', '30', '', '', '', '', '', '', '', '', '2022'),
(129, 71, 'Itraconazol', '100', '18/04/2022', '30', '30', '30', '30', '', '', '', '', '', '', '', '', '2022'),
(130, 196, 'Itraconazol', '100', '18/04/2022', '', '', '', '60', '', '', '', '', '', '', '', '', '2022'),
(131, 121, 'Itraconazol', '100', '20/04/2022', '30', '30', '30', '30', '', '', '', '', '', '', '', '', '2022'),
(132, 258, 'Itraconazol', '100', '20/04/2022', '', '30', '', '30', '', '', '', '', '', '', '', '', '2022'),
(133, 280, 'Itraconazol', '100', '20/04/2022', '', '', '', '30', '0', '', '', '', '', '', '', '', '2022'),
(134, 3, 'Itraconazol', '100', '26/04/2022', '', '', '30', '30', '', '', '', '', '', '', '', '', '2022'),
(135, 48, 'Itraconazol', '100', '26/04/2022', '30', '30', '30', '30', '', '', '', '', '', '', '', '', '2022'),
(136, 54, 'Itraconazol', '100', '26/04/2022', '30', '30', '30', '30', '', '', '', '', '', '', '', '', '2022'),
(137, 82, 'Itraconazol', '100', '26/04/2022', '30', '30', '30', '', '', '', '', '', '', '', '', '', '2022'),
(138, 94, 'Itraconazol', '100', '26/04/2022', '', '', '30', '30', '0', '', '', '', '', '', '', '', '2022'),
(139, 144, 'Itraconazol', '100', '26/04/2022', '60', '', '', '60', '', '', '', '', '', '', '', '', '2022'),
(140, 215, 'Itraconazol', '100', '26/04/2022', '', '', '15', '30', '', '', '', '', '', '', '', '', '2022'),
(141, 154, 'Itraconazol', '100', '27/04/2022', '', '', '30', '30', '', '', '', '', '', '', '', '', '2022'),
(142, 230, 'Itraconazol', '100', '27/04/2022', '', '', '', '60', '', '', '', '', '', '', '', '', '2022'),
(143, 267, 'Itraconazol', '100', '27/04/2022', '', '30', '30', '30', '', '', '', '', '', '', '', '', '2022'),
(144, 103, 'Itraconazol', '100', '29/04/2022', '', '60', '', '30', '0', '', '', '', '', '', '', '', '2022'),
(145, 31, 'Itraconazol', '100', '02/05/2022', '', '', '', '', '60', '', '', '', '', '', '', '', '2022'),
(146, 46, 'Itraconazol', '100', '02/05/2022', '30', '', '', '', '55', '', '', '', '', '', '', '', '2022'),
(147, 76, 'Itraconazol', '100', '02/05/2022', '', '60', '', '', '30', '', '', '', '', '', '', '', '2022'),
(148, 188, 'Itraconazol', '100', '02/05/2022', '30', '30', '30', '', '60', '', '', '', '', '', '', '', '2022'),
(149, 233, 'Itraconazol', '100', '02/05/2022', '', '', '', '', '30', '', '', '', '', '', '', '', '2022'),
(150, 261, 'Itraconazol', '100', '02/05/2022', '', '', '', '', '60', '', '', '', '', '', '', '', '2022'),
(151, 269, 'Itraconazol', '100', '02/05/2022', '', '', '', '', '60', '', '', '', '', '', '', '', '2022'),
(152, 195, 'Itraconazol', '100', '03/05/2022', '', '', '', '60', '60', '', '', '', '', '', '', '', '2022'),
(153, 218, 'Itraconazol', '100', '03/05/2022', '', '', '', '', '60', '', '', '', '', '', '', '', '2022'),
(154, 207, 'Itraconazol', '100', '09/05/2022', '', '', '60', '', '30', '', '', '', '', '', '', '', '2022'),
(155, 209, 'Itraconazol', '100', '09/05/2022', '60', '30', '30', '0', '30', '', '', '', '', '', '', '', '2022'),
(156, 220, 'Itraconazol', '100', '09/05/2022', '', '', '60', '', '60', '', '', '', '', '', '', '', '2022'),
(157, 275, 'Itraconazol', '100', '10/05/2022', '', '', '', '', '30', '', '', '', '', '', '', '', '2022'),
(158, 250, 'Itraconazol', '100', '11/05/2022', '', '', '', '', '60', '', '', '', '', '', '', '', '2022'),
(159, 22, 'Itraconazol', '100', '13/05/2022', '', '', '', '', '60', '', '', '', '', '', '', '', '2022'),
(160, 24, 'Itraconazol', '100', '13/05/2022', '', '', '', '', '60', '', '', '', '', '', '', '', '2022'),
(161, 32, 'Itraconazol', '100', '13/05/2022', '', '', '', '', '60', '', '', '', '', '', '', '', '2022'),
(162, 266, 'Itraconazol', '100', '13/05/2022', '', '', '', '', '60', '', '', '', '', '', '', '', '2022'),
(163, 274, 'Itraconazol', '100', '13/05/2022', '', '', '', '', '60', '', '', '', '', '', '', '', '2022'),
(164, 194, 'Itraconazol', '100', '17/05/2022', '', '', '30', '30', '60', '', '', '', '', '', '', '', '2022'),
(165, 123, 'Itraconazol', '100', '19/05/2022', '30', '30', '30', '30', '60', '', '', '', '', '', '', '', '2022'),
(166, 141, 'Itraconazol', '100', '19/05/2022', '30', '30', '30', '30', '60', '', '', '', '', '', '', '', '2022'),
(167, 143, 'Itraconazol', '100', '19/05/2022', '30', '30', '30', '30', '60', '', '', '', '', '', '', '', '2022'),
(168, 160, 'Itraconazol', '100', '19/05/2022', '', '', '30', '30', '60', '', '', '', '', '', '', '', '2022'),
(169, 174, 'Itraconazol', '100', '19/05/2022', '30', '30', '30', '30', '60', '', '', '', '', '', '', '', '2022'),
(170, 205, 'Itraconazol', '100', '19/05/2022', '', '', '30', '30', '60', '', '', '', '', '', '', '', '2022'),
(171, 212, 'Itraconazol', '100', '19/05/2022', '', '60', '30', '30', '30', '', '', '', '', '', '', '', '2022'),
(172, 217, 'Itraconazol', '100', '19/05/2022', '', '60', '', '30', '60', '', '', '', '', '', '', '', '2022'),
(173, 222, 'Itraconazol', '100', '19/05/2022', '', '60', '', '30', '30', '', '', '', '', '', '', '', '2022'),
(174, 225, 'Itraconazol', '100', '19/05/2022', '60', '', '', '30', '60', '', '', '', '', '', '', '', '2022'),
(175, 246, 'Itraconazol', '100', '19/05/2022', '30', '30', '30', '60', '60', '', '', '', '', '', '', '', '2022'),
(176, 256, 'Itraconazol', '100', '19/05/2022', '', '', '', '', '60', '', '', '', '', '', '', '', '2022'),
(177, 279, 'Itraconazol', '100', '19/05/2022', '30', '30', '30', '30', '60', '', '', '', '', '', '', '', '2022'),
(178, 287, 'Itraconazol', '100', '19/05/2022', '', '', '', '', '60', '', '', '', '', '', '', '', '2022'),
(179, 136, 'Itraconazol', '100', '20/05/2022', '30', '30', '30', '', '60', '', '', '', '', '', '', '', '2022'),
(180, 146, 'Itraconazol', '100', '20/05/2022', '30', '30', '30', '', '60', '', '', '', '', '', '', '', '2022'),
(181, 156, 'Itraconazol', '100', '20/05/2022', '30', '30', '30', '30', '60', '', '', '', '', '', '', '', '2022'),
(182, 165, 'Itraconazol', '100', '20/05/2022', '30', '30', '30', '30', '60', '', '', '', '', '', '', '', '2022'),
(183, 200, 'Itraconazol', '100', '20/05/2022', '', '30', '30', '30', '60', '', '', '', '', '', '', '', '2022'),
(184, 201, 'Itraconazol', '100', '20/05/2022', '', '', '60', '30', '50', '', '', '', '', '', '', '', '2022'),
(185, 202, 'Itraconazol', '100', '20/05/2022', '60', '', '60', '30', '60', '', '', '', '', '', '', '', '2022'),
(186, 204, 'Itraconazol', '100', '20/05/2022', '', '30', '30', '30', '60', '', '', '', '', '', '', '', '2022'),
(187, 223, 'Itraconazol', '100', '20/05/2022', '', '', '', '60', '60', '', '', '', '', '', '', '', '2022'),
(188, 227, 'Itraconazol', '100', '20/05/2022', '', '30', '30', '30', '60', '', '', '', '', '', '', '', '2022'),
(189, 228, 'Itraconazol', '100', '20/05/2022', '', '', '60', '', '60', '', '', '', '', '', '', '', '2022'),
(190, 252, 'Itraconazol', '100', '22/05/2022', '', '', '', '', '38', '', '', '', '', '', '', '', '2022'),
(191, 11, 'Itraconazol', '100', '23/05/2022', '', '60', '', '30', '30', '', '', '', '', '', '', '', '2022'),
(192, 16, 'Itraconazol', '100', '23/05/2022', '', '', '', '30', '60', '', '', '', '', '', '', '', '2022'),
(193, 18, 'Itraconazol', '100', '23/05/2022', '', '', '', '', '60', '', '', '', '', '', '', '', '2022'),
(194, 27, 'Itraconazol', '100', '23/05/2022', '', '', '', '', '60', '', '', '', '', '', '', '', '2022'),
(195, 30, 'Itraconazol', '100', '23/05/2022', '', '', '', '', '60', '', '', '', '', '', '', '', '2022'),
(196, 86, 'Itraconazol', '50', '23/05/2022', '30', '', '', '30', '30', '', '', '', '', '', '', '', '2022'),
(197, 90, 'Itraconazol', '100', '23/05/2022', '30', '30', '', '30', '0', '', '', '', '', '', '', '', '2022'),
(198, 191, 'Itraconazol', '100', '23/05/2022', '', '', '60', '', '60', '', '', '', '', '', '', '', '2022'),
(199, 210, 'Itraconazol', '100', '23/05/2022', '', '30', '30', '30', '0', '', '', '', '', '', '', '', '2022'),
(200, 286, 'Itraconazol', '100', '23/05/2022', '', '', '', '', '60', '', '', '', '', '', '', '', '2022'),
(201, 247, 'Itraconazol', '100', '25/05/2022', '', '', '', '', '60', '', '', '', '', '', '', '', '2022'),
(202, 159, 'Itraconazol', '100', '26/05/2022', '30', '30', '30', '30', '0', '', '', '', '', '', '', '', '2022'),
(203, 51, 'Itraconazol', '100', '27/05/2022', '30', '30', '30', '30', '60', '', '', '', '', '', '', '', '2022'),
(204, 189, 'Itraconazol', '100', '27/05/2022', '', '', '30', '30', '60', '', '', '', '', '', '', '', '2022'),
(205, 197, 'Itraconazol', '100', '27/05/2022', '', '', '', '', '60', '', '', '', '', '', '', '', '2022'),
(206, 219, 'Itraconazol', '100', '27/05/2022', '', '30', '30', '30', '60', '', '', '', '', '', '', '', '2022'),
(207, 49, 'Itraconazol', '100', '31/05/2022', '', '', '30', '30', '30', '', '', '', '', '', '', '', '2022'),
(208, 52, 'Itraconazol', '100', '31/05/2022', '', '', '30', '30', '30', '', '', '', '', '', '', '', '2022'),
(209, 234, 'Itraconazol', '100', '01/06/2022', '', '', '', '', '', '60', '', '', '', '', '', '', '2022'),
(210, 35, 'Itraconazol', '50', '03/06/2022', '', '', '', '', '', '20', '', '', '', '', '', '', '2022'),
(211, 36, 'Itraconazol', '', '03/06/2022', '', '', '', '', '', '60', '', '', '', '', '', '', '2022'),
(212, 235, 'Itraconazol', '100', '03/06/2022', '', '', '', '', '', '60', '', '', '', '', '', '', '2022'),
(213, 236, 'Itraconazol', '100', '03/06/2022', '', '', '', '', '', '60', '', '', '', '', '', '', '2022'),
(214, 33, 'Itraconazol', '100', '06/06/2022', '30', '30', '30', '30', '', '60', '', '', '', '', '', '', '2022'),
(215, 50, 'Itraconazol', '100', '06/06/2022', '', '', '30', '30', '', '20', '', '', '', '', '', '', '2022'),
(216, 53, 'Itraconazol', '100', '06/06/2022', '30', '', '', '30', '', '60', '', '', '', '', '', '', '2022'),
(217, 158, 'Itraconazol', '100', '06/06/2022', '30', '30', '', '30', '', '30', '', '', '', '', '', '', '2022'),
(218, 253, 'Itraconazol', '100', '06/06/2022', '30', '30', '30', '30', '', '60', '', '', '', '', '', '', '2022'),
(219, 288, 'Itraconazol', '100', '09/06/2022', '', '', '', '', '', '30', '', '', '', '', '', '', '2022'),
(220, 2, 'Itraconazol', '100', '10/06/2022', '', '', '', '', '30', '60', '', '', '', '', '', '', '2022'),
(221, 4, 'Itraconazol', '100', '13/06/2022', '', '', '', '', '0', '60', '', '', '', '', '', '', '2022'),
(222, 9, 'Itraconazol', '100', '13/06/2022', '', '', '', '60', '', '60', '', '', '', '', '', '', '2022'),
(223, 193, 'Itraconazol', '100', '15/06/2022', '', '', '30', '30', '', '60', '', '', '', '', '', '', '2022'),
(224, 289, 'Itraconazol', '100', '15/06/2022', '', '', '', '', '', '60', '', '', '', '', '', '', '2022'),
(225, 12, 'Itraconazol', '100', '20/06/2022', '', '', '60', '', '30', '60', '', '', '', '', '', '', '2022'),
(226, 29, 'Itraconazol', '100', '20/06/2022', '30', '30', '30', '30', '30', '30', '', '', '', '', '', '', '2022'),
(227, 37, 'Itraconazol', '100', '20/06/2022', '', '', '', '', '30', '30', '', '', '', '', '', '', '2022'),
(228, 38, 'Itraconazol', '100', '20/06/2022', '', '', '', '', '30', '30', '', '', '', '', '', '', '2022'),
(229, 39, 'Itraconazol', '100', '20/06/2022', '', '', '', '', '30', '30', '', '', '', '', '', '', '2022'),
(230, 237, 'Itraconazol', '100', '20/06/2022', '', '', '', '', '', '60', '', '', '', '', '', '', '2022'),
(231, 239, 'Itraconazol', '100', '20/06/2022', '', '', '', '', '', '28', '', '', '', '', '', '', '2022'),
(232, 238, 'Itraconazol', '100', '21/06/2022', '', '', '', '', '', '30', '', '', '', '', '', '', '2022'),
(233, 14, 'Itraconazol', '100', '23/06/2022', '', '50', '', '30', '30', '60', '', '', '', '', '', '', '2022'),
(234, 15, 'Itraconazol', '100', '23/06/2022', '', '', '35', '', '20', '60', '', '', '', '', '', '', '2022'),
(235, 19, 'Itraconazol', '100', '23/06/2022', '', '', '', '', '30', '60', '', '', '', '', '', '', '2022'),
(236, 26, 'Itraconazol', '100', '23/06/2022', '', '', '', '', '30', '60', '', '', '', '', '', '', '2022'),
(237, 34, 'Itraconazol', '100', '23/06/2022', '', '', '', '', '30', '60', '', '', '', '', '', '', '2022'),
(238, 198, 'Itraconazol', '100', '23/06/2022', '', '', '', '', '60', '60', '', '', '', '', '', '', '2022'),
(239, 17, 'Itraconazol', '100', '24/06/2022', '', '', '', '', '', '120', '', '', '', '', '', '', '2022'),
(240, 40, 'Itraconazol', '100', '24/06/2022', '', '', '', '', '', '60', '', '', '', '', '', '', '2022'),
(241, 41, 'Itraconazol', '100', '24/06/2022', '', '', '', '', '', '30', '', '', '', '', '', '', '2022'),
(242, 42, 'Itraconazol', '100', '24/06/2022', '', '', '', '', '', '60', '', '', '', '', '', '', '2022'),
(243, 44, 'Itraconazol', '100', '27/06/2022', '', '', '', '', '', '60', '60', '', '', '', '', '', '2022'),
(244, 23, 'Itraconazol', '100', '28/06/2022', '30', '30', '30', '30', '30', '30', '', '', '', '', '', '', '2022'),
(245, 43, 'Itraconazol', '200', '28/06/2022', '', '', '', '', '', '120', '', '', '', '', '', '', '2022'),
(246, 130, 'Itraconazol', '100', '28/06/2022', '', '', '30', '', '60', '70', '', '', '', '', '', '', '2022'),
(247, 104, 'Itraconazol', '100', '30/06/2022', '', '60', '30', '0', '30', '', '', '', '', '', '', '', '2022'),
(248, 7, 'Itraconazol', '100', '01/07/2022', '60', '', '', '30', '30', '', '30', '', '', '', '', '', '2022'),
(249, 10, 'Itraconazol', '100', '01/07/2022', '', '', '60', '', '60', '', '60', '', '', '', '', '', '2022'),
(250, 13, 'Itraconazol', '100', '01/07/2022', '', '', '', '60', '', '', '30', '', '', '', '', '', '2022'),
(251, 270, 'Itraconazol', '100', '01/07/2022', '', '', '30', '', '30', '', '60', '', '', '', '', '', '2022'),
(252, 241, 'Itraconazol', '100', '06/07/2022', '', '', '', '', '', '', '60', '', '', '', '', '', '2022'),
(253, 240, 'Itraconazol', '100', '07/07/2022', '', '', '', '', '', '', '60', '', '', '', '', '', '2022'),
(254, 5, 'Itraconazol', '100', '08/07/2022', '', '', '', '', '', '', '60', '', '', '', '', '', '2022'),
(255, 6, 'Itraconazol', '100', '08/07/2022', '', '30', '', '30', '', '', '60', '', '', '', '', '', '2022'),
(256, 20, 'Itraconazol', '100', '08/07/2022', '30', '30', '30', '30', '30', '10', '30', '', '', '', '', '', '2022'),
(257, 21, 'Itraconazol', '100', '08/07/2022', '30', '30', '30', '30', '60', '10', '30', '', '', '', '', '', '2022'),
(258, 25, 'Itraconazol', '100', '08/07/2022', '', '', '', '', '', '10', '30', '', '', '', '', '', '2022'),
(259, 28, 'Itraconazol', '100', '08/07/2022', '30', '30', '30', '30', '30', '10', '30', '', '', '', '', '', '2022'),
(260, 243, 'Itraconazol', '100', '11/07/2022', '', '', '', '', '', '', '30', '', '', '', '', '', '2022'),
(261, 244, 'Itraconazol', '100', '12/07/2022', '', '', '', '', '', '', '60', '', '', '', '', '', '2022'),
(262, 199, 'Itraconazol', '100', '14/07/2022', '', '', '', '', '60', '', '60', '', '', '', '', '', '2022'),
(263, 290, 'Itraconazol', '100', '15/07/2022', '', '', '', '', '', '', '30', '', '', '', '', '', '2022'),
(264, 8, 'Itraconazol', '100', '20/07/2022', '', '', '60', '30', '30', '30', '', '', '', '', '', '', '2022'),
(265, 245, 'Itraconazol', '100', '20/07/2022', '', '', '', '', '', '', '60', '', '', '', '', '', '2022'),
(266, 62, 'Itraconazol', '100', '03/0/2022', '30', '30', '30', '30', '60', '', '30', '', '', '', '', '', '2022'),
(267, 45, 'Itraconazol', '100', '0707/2022', '', '', '', '', '', '', '60', '', '', '', '', '', '2022'),
(268, 211, 'Itraconazol', '100', '2005/2022', '', '30', '30', '30', '60', '', '', '', '', '', '', '', '2022'),
(269, 67, 'Itraconazol', '100', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(270, 117, 'Itraconazol', '50', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(271, 132, 'Itraconazol', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(272, 134, 'Itraconazol', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(273, 135, 'Itraconazol', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(274, 147, 'Itraconazol', '100', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(275, 150, 'Itraconazol', '100', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(276, 157, 'Itraconazol', '100', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(277, 162, 'Itraconazol', '100', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(278, 163, 'Itraconazol', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(279, 167, 'Itraconazol', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(280, 171, 'Itraconazol', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(281, 176, 'Itraconazol', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(282, 179, 'Itraconazol', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(283, 181, 'Itraconazol', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(284, 208, 'Itraconazol', '100', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(285, 229, 'Itraconazol', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(286, 242, 'Itraconazol', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(287, 255, 'Itraconazol', '100', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(288, 263, 'Itraconazol', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(289, 264, 'Itraconazol', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(290, 271, 'Itraconazol', '100', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `esporo_medc_erro`
--
ALTER TABLE `esporo_medc_erro`
  ADD PRIMARY KEY (`id_rem`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `esporo_medc_erro`
--
ALTER TABLE `esporo_medc_erro`
  MODIFY `id_rem` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=291;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
