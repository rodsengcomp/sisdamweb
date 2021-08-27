-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 28-Ago-2017 às 12:26
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
-- Estrutura da tabela `ubs`
--

CREATE TABLE `ubs` (
  `id` int(11) NOT NULL,
  `cnes` int(7) DEFAULT NULL,
  `ubs` varchar(18) DEFAULT NULL,
  `criado` datetime DEFAULT NULL,
  `usuariocad` varchar(20) DEFAULT NULL,
  `alterado` datetime DEFAULT NULL,
  `usuarioalt` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `ubs`
--

INSERT INTO `ubs` (`id`, `cnes`, `ubs`, `criado`, `usuariocad`, `alterado`, `usuarioalt`) VALUES
(1, 6666666, 'AMA WAMBERTO', NULL, NULL, NULL, NULL),
(2, 2027690, 'UBS MARIQUINHA', NULL, NULL, NULL, NULL),
(3, 2042541, 'UBS JOSE TOLEDO', NULL, NULL, NULL, NULL),
(4, 2068044, 'UBS HORTO', NULL, NULL, NULL, NULL),
(5, 2787172, 'UBS J APUANA', NULL, NULL, NULL, NULL),
(6, 5621267, 'UBS J FLOR DE MAIO', NULL, NULL, NULL, NULL),
(7, 2091720, 'UBS J FONTALIS', NULL, NULL, NULL, NULL),
(8, 2787520, 'UBS J JOAMAR', NULL, NULL, NULL, NULL),
(9, 2787962, 'UBS JACANA', NULL, NULL, NULL, NULL),
(10, 3323331, 'UBS J DAS PEDRAS', NULL, NULL, NULL, NULL),
(11, 2788306, 'UBS PQ EDU CHAVES', NULL, NULL, NULL, NULL),
(12, 2027275, 'UBS V ALBERTINA', NULL, NULL, NULL, NULL),
(13, 2789108, 'UBS V N GALVAO', NULL, NULL, NULL, NULL),
(14, 0, 'OUTROS', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ubs`
--
ALTER TABLE `ubs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ubs`
--
ALTER TABLE `ubs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
