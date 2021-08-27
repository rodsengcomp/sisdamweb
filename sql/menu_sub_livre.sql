-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 28-Ago-2017 às 12:23
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
-- Estrutura da tabela `menu_sub_livre`
--

CREATE TABLE `menu_sub_livre` (
  `id` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `nome` varchar(255) CHARACTER SET utf8 NOT NULL,
  `pag` varchar(255) CHARACTER SET utf8 NOT NULL,
  `usuariocad` varchar(10) DEFAULT NULL,
  `criado` datetime DEFAULT NULL,
  `usuarioalt` varchar(10) DEFAULT NULL,
  `alterado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Extraindo dados da tabela `menu_sub_livre`
--

INSERT INTO `menu_sub_livre` (`id`, `id_menu`, `nome`, `pag`, `usuariocad`, `criado`, `usuarioalt`, `alterado`) VALUES
(1, 1, 'Endereços', 'livre.php?pag=list-end-livre', 'admin', '2017-08-14 14:40:04', 'admin', '2017-08-14 15:50:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu_sub_livre`
--
ALTER TABLE `menu_sub_livre`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu_sub_livre`
--
ALTER TABLE `menu_sub_livre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
