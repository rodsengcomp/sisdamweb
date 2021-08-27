-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 28-Ago-2017 às 12:24
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
-- Estrutura da tabela `pag_livre`
--

CREATE TABLE `pag_livre` (
  `id` int(11) NOT NULL,
  `name_pag` varchar(100) DEFAULT NULL,
  `caminho` varchar(100) DEFAULT NULL,
  `usuariocad` varchar(10) DEFAULT NULL,
  `criado` datetime DEFAULT NULL,
  `usuarioalt` varchar(10) DEFAULT NULL,
  `alterado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Extraindo dados da tabela `pag_livre`
--

INSERT INTO `pag_livre` (`id`, `name_pag`, `caminho`, `usuariocad`, `criado`, `usuarioalt`, `alterado`) VALUES
(1, 'list-end-livre', 'form-livre/list/list-end-livre.php', NULL, NULL, 'admin', '2017-08-14 15:37:09'),
(2, 'aaasss', 'aaaazzz', 'admin', '2017-08-14 15:26:07', 'admin', '2017-08-14 15:29:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pag_livre`
--
ALTER TABLE `pag_livre`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pag_livre`
--
ALTER TABLE `pag_livre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
