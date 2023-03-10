-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 28-Ago-2017 às 12:25
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
-- Estrutura da tabela `tipodoc`
--

CREATE TABLE `tipodoc` (
  `id` int(11) NOT NULL,
  `tipodoc` varchar(100) DEFAULT NULL,
  `usuariocad` varchar(20) DEFAULT 'sistema',
  `criado` datetime DEFAULT NULL,
  `usuarioalt` varchar(20) DEFAULT NULL,
  `alterado` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Extraindo dados da tabela `tipodoc`
--

INSERT INTO `tipodoc` (`id`, `tipodoc`, `usuariocad`, `criado`, `usuarioalt`, `alterado`) VALUES
(1, 'MEMORANDO', 'sistema', NULL, NULL, NULL),
(2, 'OFICIO', 'sistema', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tipodoc`
--
ALTER TABLE `tipodoc`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tipodoc`
--
ALTER TABLE `tipodoc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
