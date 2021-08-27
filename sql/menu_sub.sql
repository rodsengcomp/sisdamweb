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
-- Estrutura da tabela `menu_sub`
--

CREATE TABLE `menu_sub` (
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
-- Extraindo dados da tabela `menu_sub`
--

INSERT INTO `menu_sub` (`id`, `id_menu`, `nome`, `pag`, `usuariocad`, `criado`, `usuarioalt`, `alterado`) VALUES
(1, 6, 'Dengue', 'suvisjt.php', NULL, NULL, 'ADMIN', '2017-07-14 01:12:59'),
(2, 6, 'Chikungunya', 'suvisjt.php', NULL, NULL, 'ADMIN', '2017-07-14 01:13:12'),
(3, 6, 'Febre Amarela', 'suvisjt.php', NULL, NULL, 'ADMIN', '2017-07-14 01:28:05'),
(4, 6, 'Leptospirose', 'suvisjt.php', 'ADMIN', '2017-07-13 21:24:39', 'ADMIN', '2017-07-14 01:32:30'),
(5, 3, 'Cidades', 'suvisjt.php', 'ADMIN', '2017-07-14 01:16:36', 'ADMIN', '2017-07-14 01:30:11'),
(6, 3, 'Cnes', 'suvisjt.php', 'ADMIN', '2017-07-14 01:18:41', NULL, NULL),
(7, 3, 'Agravos', 'suvisjt.php', 'ADMIN', '2017-07-14 01:29:12', 'admin', '2017-07-25 21:44:31'),
(8, 3, 'Endereços', 'suvisjt.php', 'ADMIN', '2017-07-14 01:30:46', NULL, NULL),
(9, 6, 'Zika', 'suvisjt.php', 'ADMIN', '2017-07-14 01:31:20', 'ADMIN', '2017-07-14 01:32:39'),
(10, 5, 'Sv2-2017', 'suvisjt.php', 'ADMIN', '2017-07-14 01:43:32', NULL, NULL),
(11, 4, 'Ccz-Dengue', 'suvisjt.php?pag=list-ccz-dengue', 'ADMIN', '2017-07-14 01:45:40', NULL, NULL),
(12, 4, 'Ial-Dengue', 'suvisjt.php?pag=list-ial-dengue', 'ADMIN', '2017-07-14 01:46:12', NULL, NULL),
(13, 7, 'Memorando/Ofício', 'suvisjt.php', 'ADMIN', '2017-07-19 08:46:24', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu_sub`
--
ALTER TABLE `menu_sub`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu_sub`
--
ALTER TABLE `menu_sub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
