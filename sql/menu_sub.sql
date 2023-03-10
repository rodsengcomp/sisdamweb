-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 10.47.171.110:3306
-- Tempo de geração: 19-Ago-2022 às 20:54
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
(1, 8, 'Dengue', 'suvisjt.php', NULL, NULL, 'admin', '2018-01-18 11:30:20'),
(2, 8, 'Chikungunya', 'suvisjt.php', NULL, NULL, 'admin', '2018-01-18 11:30:31'),
(3, 8, 'Febre Amarela', 'suvisjt.php', NULL, NULL, 'admin', '2018-01-18 11:30:45'),
(4, 8, 'Leptospirose', 'suvisjt.php', 'ADMIN', '2017-07-13 21:24:39', 'admin', '2018-01-18 11:30:58'),
(5, 3, 'Cidades', 'suvisjt.php', 'ADMIN', '2017-07-14 01:16:36', 'ADMIN', '2017-07-14 01:30:11'),
(6, 3, 'Cnes', 'suvisjt.php', 'ADMIN', '2017-07-14 01:18:41', NULL, NULL),
(7, 3, 'Agravos', 'suvisjt.php', 'ADMIN', '2017-07-14 01:29:12', 'admin', '2017-07-25 21:44:31'),
(8, 3, 'Endereços', 'suvisjt.php', 'ADMIN', '2017-07-14 01:30:46', NULL, NULL),
(9, 8, 'Zika', 'suvisjt.php', 'ADMIN', '2017-07-14 01:31:20', 'admin', '2018-05-17 18:01:45'),
(10, 5, 'Sv2', 'suvisjt.php', 'ADMIN', '2017-07-14 01:43:32', 'admin', '2017-12-28 13:53:43'),
(11, 4, 'Ccz-Dengue', 'suvisjt.php?pag=list-ccz-dengue', 'ADMIN', '2017-07-14 01:45:40', NULL, NULL),
(12, 7, 'Memo/Ofício', 'suvisjt.php', 'ADMIN', '2017-07-14 01:46:12', 'D788796', '2019-01-23 08:12:17'),
(13, 7, 'Arquivo-Memo/Ofício', 'suvisjt.php', 'ADMIN', '2017-07-19 08:46:24', 'admin', '2018-01-08 10:25:30'),
(14, 5, 'Arquivo-Sv2', 'suvisjt.php', 'admin', '2017-12-26 10:17:27', 'admin', '2017-12-26 10:35:17'),
(15, 7, 'Tid', 'suvisjt.php', 'admin', '2018-02-22 16:23:04', NULL, NULL),
(16, 5, 'Coqueluche', 'suvisjt.php', 'admin', '2018-05-08 12:28:12', NULL, NULL),
(17, 9, 'Protocolo', 'suvisjt.php', 'admin', '2018-05-22 17:26:44', 'admin', '2018-05-25 15:10:45'),
(18, 9, 'Estabelecimentos', 'suvisjt.php', 'admin', '2018-05-25 15:14:57', NULL, NULL),
(19, 10, 'Banco de Dados', 'suvisjt.php', 'admin', '2018-06-27 08:59:18', 'admin', '2018-06-27 09:06:36'),
(20, 10, 'Login', 'suvisjt.php', 'admin', '2018-06-27 09:09:08', NULL, NULL),
(21, 8, 'Estoque', 'suvisjt.php', 'admin', '2018-08-02 12:13:23', 'admin', '2018-08-02 12:13:39'),
(22, 10, 'E-mail', 'suvisjt.php', 'D111111', '2018-08-27 16:11:51', 'D111111', '2018-08-27 16:12:35'),
(23, 13, 'Menu Principal', 'admin.php?', 'D788796', '2019-01-24 09:01:22', NULL, NULL),
(24, 13, 'SubMenus', 'admin.php?', 'D788796', '2019-01-24 09:01:22', NULL, NULL),
(25, 13, 'Menu-Sub-Menus', 'admin.php', 'D788796', '2019-01-24 09:15:01', NULL, NULL),
(26, 11, 'Links Painel', 'admin.php?', 'D788796', '2019-01-24 09:28:13', NULL, NULL),
(27, 11, 'Links System', 'admin.php', 'D788796', '2019-01-24 09:29:51', NULL, NULL),
(28, 14, '2018', 'http://10.47.171.40/sisdamweb-2018', 'D788796', '2019-01-24 10:03:29', 'D788796', '2019-08-22 12:13:15'),
(29, 8, 'PE/IE', 'suvisjt.php', 'D788796', '2019-04-08 09:35:01', NULL, NULL),
(30, 15, 'Himenópteros', 'https://drive.google.com/drive/folders/1QevGRmruieLfD1XU0yJ4bPtqUYHLmG8X?usp=sharing', 'D788796', '2019-05-27 14:22:54', 'D788796', '2019-05-27 14:43:26'),
(31, 15, 'Amostras', 'suvisjt.php', 'D788796', '2019-05-27 14:23:31', NULL, NULL),
(32, 15, 'Bloqueios', 'suvisjt.php', 'D788796', '2019-05-27 14:23:42', NULL, NULL),
(33, 15, 'Caixas/Telas/Piscinas', 'suvisjt.php', 'D788796', '2019-05-27 14:24:01', 'D788796', '2019-05-27 14:24:33'),
(36, 15, 'Nebulização', 'suvisjt.php', 'D788796', '2019-05-27 14:25:31', NULL, NULL),
(37, 15, 'Manuais', 'suvisjt.php', 'D788796', '2019-05-27 14:26:25', NULL, NULL),
(38, 15, 'RH', 'suvisjt.php', 'D788796', '2019-05-27 14:26:53', NULL, NULL),
(39, 15, 'Roedores', 'suvisjt.php', 'D788796', '2019-05-27 14:27:20', 'D788796', '2019-05-27 14:27:40'),
(40, 15, 'Sac', 'suvisjt.php', 'D788796', '2019-05-27 14:27:55', NULL, NULL),
(41, 15, 'Sinantrópicos', 'suvisjt.php', 'D788796', '2019-05-27 14:28:21', NULL, NULL),
(42, 15, 'Supervisão', 'suvisjt.php', 'D788796', '2019-05-27 14:28:33', NULL, NULL),
(43, 15, 'Zoosanitária', 'suvisjt.php', 'D788796', '2019-05-27 14:28:44', NULL, NULL),
(44, 5, 'Sarampo', 'suvisjt.php', 'D788796', '2019-07-17 15:06:44', NULL, NULL),
(45, 3, 'Arquivo', 'suvisjt.php', 'D788796', '2019-10-15 00:00:00', NULL, NULL),
(46, 14, '2019', 'http://10.47.171.40/sisdamweb-2019', 'D788796', '2019-12-30 07:29:09', NULL, NULL),
(47, 28, 'SisdamWeb-2018', 'http://10.47.171.40/sisdamweb-2018', 'D788796', '2019-12-30 12:02:56', NULL, NULL),
(48, 5, 'Anti-Rábica', 'suvisjt.php', 'D788796', '2020-03-23 15:46:32', 'D788796', '2021-01-28 13:46:34'),
(49, 8, 'Esporotricose Animal', 'suvisjt.php', 'D788796', '2022-06-08 14:22:53', 'D788796', '2022-06-13 11:13:14');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `menu_sub`
--
ALTER TABLE `menu_sub`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `menu_sub`
--
ALTER TABLE `menu_sub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
