-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 28-Ago-2017 às 12:21
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
-- Estrutura da tabela `footer`
--

CREATE TABLE `footer` (
  `id` int(11) NOT NULL,
  `sistema` varchar(200) DEFAULT NULL,
  `versao` varchar(50) DEFAULT NULL,
  `direitos` varchar(200) DEFAULT NULL,
  `desenvolvedor` varchar(200) DEFAULT NULL,
  `email_contato` varchar(100) DEFAULT NULL,
  `ano` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `footer`
--

INSERT INTO `footer` (`id`, `sistema`, `versao`, `direitos`, `desenvolvedor`, `email_contato`, `ano`) VALUES
(1, 'Sisdam Web', '1.9', 'Todos os direitos reservados', 'Rodolfo R R de Jesus', 'sisdamjt@gmail.com', 2013);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `footer`
--
ALTER TABLE `footer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `footer`
--
ALTER TABLE `footer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
