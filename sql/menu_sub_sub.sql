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
-- Estrutura da tabela `menu_sub_sub`
--

CREATE TABLE `menu_sub_sub` (
  `id` int(11) NOT NULL,
  `id_menu_sub` int(11) NOT NULL,
  `nome` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `pag` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `usuariocad` varchar(10) DEFAULT NULL,
  `criado` datetime DEFAULT NULL,
  `usuarioalt` varchar(10) DEFAULT NULL,
  `alterado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Extraindo dados da tabela `menu_sub_sub`
--

INSERT INTO `menu_sub_sub` (`id`, `id_menu_sub`, `nome`, `pag`, `usuariocad`, `criado`, `usuarioalt`, `alterado`) VALUES
(1, 1, 'Cadastrar', 'suvisjt.php?pag=cad-dengue', NULL, NULL, 'admin', '2017-07-25 21:48:33'),
(2, 1, 'Bloqueios', 'suvisjt.php?pag=list-bloq-1via-dengue', NULL, NULL, 'ADMIN', '2017-07-14 01:34:31'),
(3, 2, 'Cadastrar', 'suvisjt.php?pag=cad-chiku', NULL, NULL, 'ADMIN', '2017-07-13 23:57:39'),
(4, 2, 'Listar', 'suvisjt.php?pag=list-chiku', NULL, NULL, 'ADMIN', '2017-07-13 23:58:01'),
(5, 3, 'Cadastrar', 'suvisjt.php?pag=cad-febre-a', 'ADMIN', '2017-07-13 23:27:27', 'ADMIN', '2017-07-13 23:58:45'),
(6, 5, 'Cadastrar', 'suvisjt.php?pag=cad-cidade', 'ADMIN', '2017-07-14 01:38:14', NULL, NULL),
(7, 5, 'Listar', 'suvisjt.php?pag=list-cidade', 'ADMIN', '2017-07-14 01:38:38', NULL, NULL),
(8, 6, 'Cadastrar', 'suvisjt.php?pag=cad-cnes', 'ADMIN', '2017-07-14 01:39:41', NULL, NULL),
(9, 6, 'Listar', 'suvisjt.php?pag=list-cnes', 'ADMIN', '2017-07-14 01:39:54', NULL, NULL),
(10, 7, 'Cadastrar', 'suvisjt.php?pag=cad-agravo', 'ADMIN', '2017-07-14 01:40:15', 'admin', '2017-07-25 21:44:47'),
(11, 7, 'Listar', 'suvisjt.php?pag=list-agravo', 'ADMIN', '2017-07-14 01:40:31', 'admin', '2017-07-25 21:45:09'),
(12, 8, 'Cadastrar', 'suvisjt.php?pag=cad-end', 'ADMIN', '2017-07-14 01:40:49', 'admin', '2017-07-26 09:57:42'),
(13, 8, 'Listar', 'suvisjt.php?pag=list-end', 'ADMIN', '2017-07-14 01:41:03', 'ADMIN', '2017-07-19 17:04:54'),
(14, 9, 'Cadastrar', 'suvisjt.php?pag=cad-zika', 'ADMIN', '2017-07-14 01:41:18', NULL, NULL),
(15, 9, 'Bloqueios', 'suvisjt.php?pag=list-bloq-1via-zika', 'ADMIN', '2017-07-14 01:41:53', NULL, NULL),
(16, 10, 'Cadastrar', 'suvisjt.php?pag=cad-sv2-suvis', 'ADMIN', '2017-07-14 01:44:20', 'ADMIN', '2017-07-15 00:25:31'),
(17, 10, 'Listar', 'suvisjt.php?pag=list-sv2', 'ADMIN', '2017-07-14 01:44:38', 'ADMIN', '2017-07-15 00:26:03'),
(18, 13, 'Cadastrar', 'suvisjt.php?pag=cad-memo-oficio', 'ADMIN', '2017-07-19 08:47:50', 'ADMIN', '2017-07-19 15:03:42'),
(19, 13, 'Listar', 'suvisjt.php?pag=list-memo-oficio', 'ADMIN', '2017-07-19 08:48:50', 'ADMIN', '2017-07-19 15:03:55'),
(20, 8, 'Mapa', 'suvisjt.php?pag=map-end', 'admin', '2017-07-28 16:50:32', 'admin', '2017-07-31 07:34:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu_sub_sub`
--
ALTER TABLE `menu_sub_sub`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu_sub_sub`
--
ALTER TABLE `menu_sub_sub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
