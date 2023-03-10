-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 10.47.171.110:3306
-- Tempo de geração: 19-Ago-2022 às 20:55
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

INSERT INTO `menu_principal` (`id`, `nome`, `tipomenu`, `usuariocad`, `criado`, `usuarioalt`, `alterado`) VALUES
(3, 'Pesquisar', 'System', 'D788796', '2017-07-13 21:05:22', 'D788796', '2021-03-03 09:11:44'),
(5, 'Epidemiológica', 'System', 'D788796', '2017-07-14 01:11:51', NULL, NULL),
(7, 'Administrativo', 'System', 'D788796', '2017-07-14 01:12:33', NULL, NULL),
(8, 'Ambiental', 'System', 'D788796', '2018-01-18 11:22:57', NULL, NULL),
(9, 'Sanitária', 'System', 'D788796', '2018-05-22 17:25:30', NULL, NULL),
(10, 'Ajuda', 'System', 'D788796', '2018-06-27 08:57:48', NULL, NULL),
(11, 'Links', 'Admin', 'D788796', '2018-12-27 00:00:00', NULL, NULL),
(12, 'Icones', 'Admin', 'D788796', '2018-12-27 00:00:00', NULL, NULL),
(13, 'Menus', 'Admin', NULL, NULL, NULL, NULL),
(14, 'Arquivo', 'System', 'D788796', '2019-01-24 10:00:07', NULL, NULL),
(15, 'Impressos', 'System', 'D788796', '2019-05-27 14:21:51', NULL, NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `menu_principal`
--
ALTER TABLE `menu_principal`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `menu_principal`
--
ALTER TABLE `menu_principal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
