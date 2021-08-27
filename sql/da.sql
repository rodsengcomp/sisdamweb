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
-- Estrutura da tabela `da`
--

CREATE TABLE `da` (
  `id` int(11) NOT NULL,
  `da` varchar(2) NOT NULL,
  `setor` varchar(4) NOT NULL,
  `criado` datetime DEFAULT NULL,
  `usuariocad` varchar(20) DEFAULT NULL,
  `alterado` datetime DEFAULT NULL,
  `usuarioalt` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `da`
--

INSERT INTO `da` (`id`, `da`, `setor`, `criado`, `usuariocad`, `alterado`, `usuarioalt`) VALUES
(1, '38', '3800', NULL, NULL, NULL, NULL),
(2, '38', '3801', NULL, NULL, NULL, NULL),
(3, '38', '3802', NULL, NULL, NULL, NULL),
(4, '38', '3803', NULL, NULL, NULL, NULL),
(5, '38', '3804', NULL, NULL, NULL, NULL),
(6, '38', '3805', NULL, NULL, NULL, NULL),
(7, '38', '3806', NULL, NULL, NULL, NULL),
(8, '38', '3807', NULL, NULL, NULL, NULL),
(9, '38', '3808', NULL, NULL, NULL, NULL),
(10, '38', '3809', NULL, NULL, NULL, NULL),
(11, '38', '3810', NULL, NULL, NULL, NULL),
(12, '38', '3811', NULL, NULL, NULL, NULL),
(13, '38', '3812', NULL, NULL, NULL, NULL),
(14, '38', '3813', NULL, NULL, NULL, NULL),
(15, '38', '3814', NULL, NULL, NULL, NULL),
(16, '83', '8300', NULL, NULL, NULL, NULL),
(17, '83', '8301', NULL, NULL, NULL, NULL),
(18, '83', '8302', NULL, NULL, NULL, NULL),
(19, '83', '8303', NULL, NULL, NULL, NULL),
(20, '83', '8304', NULL, NULL, NULL, NULL),
(21, '83', '8305', NULL, NULL, NULL, NULL),
(22, '83', '8306', NULL, NULL, NULL, NULL),
(23, '83', '8307', NULL, NULL, NULL, NULL),
(24, '83', '8308', NULL, NULL, NULL, NULL),
(25, '83', '8309', NULL, NULL, NULL, NULL),
(26, '83', '8310', NULL, NULL, NULL, NULL),
(27, '83', '8311', NULL, NULL, NULL, NULL),
(28, '83', '8312', NULL, NULL, NULL, NULL),
(29, '83', '8313', NULL, NULL, NULL, NULL),
(30, '83', '8314', NULL, NULL, NULL, NULL),
(31, '83', '8315', NULL, NULL, NULL, NULL),
(32, '83', '8316', NULL, NULL, NULL, NULL),
(33, '83', '8317', NULL, NULL, NULL, NULL),
(34, '83', '8318', NULL, NULL, NULL, NULL),
(35, '83', '8319', NULL, NULL, NULL, NULL),
(36, '83', '8320', NULL, NULL, NULL, NULL),
(37, '38', '3838', NULL, NULL, NULL, NULL),
(38, '83', '8383', NULL, NULL, NULL, NULL),
(39, '00', '0000', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `da`
--
ALTER TABLE `da`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `da`
--
ALTER TABLE `da`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
