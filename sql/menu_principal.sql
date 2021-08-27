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
-- Estrutura da tabela `menu_principal`
--

CREATE TABLE `menu_principal` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `tipomenu` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `usuariocad` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `criado` datetime DEFAULT NULL,
  `usuarioalt` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `alterado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Extraindo dados da tabela `menu_principal`
--

INSERT INTO `menu_principal` (`id`, `nome`, `tipomenu` , `usuariocad`, `criado`, `usuarioalt`, `alterado`) VALUES
(1, 'Pesquisar', 'System' , 'ADMIN', '2017-07-13 21:05:22', 'ADMIN', '2017-07-14 01:10:15'),
(2, 'Pesquisar', 'System' , 'ADMIN', '2017-07-13 21:05:22', 'ADMIN', '2017-07-14 01:10:15'),
(3, 'Pesquisar', 'System' , 'ADMIN', '2017-07-13 21:05:22', 'ADMIN', '2017-07-14 01:10:15'),
(4, 'Pesquisar', 'System' , 'ADMIN', '2017-07-13 21:05:22', 'ADMIN', '2017-07-14 01:10:15'),
(5, 'Epidemiológica', 'System' , 'ADMIN', '2017-07-14 01:11:51', NULL, NULL),
(6, 'Pesquisar', 'System' , 'ADMIN', '2017-07-13 21:05:22', 'ADMIN', '2017-07-14 01:10:15'),
(7, 'Administrativo', 'System' , 'ADMIN', '2017-07-14 01:12:33', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu_principal`
--
ALTER TABLE `menu_principal`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu_principal`
--
ALTER TABLE `menu_principal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
