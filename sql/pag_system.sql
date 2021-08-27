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
-- Estrutura da tabela `pag_system`
--

CREATE TABLE `pag_system` (
  `id` int(11) NOT NULL,
  `name_pag` varchar(100) DEFAULT NULL,
  `caminho` varchar(100) DEFAULT NULL,
  `usuariocad` varchar(10) DEFAULT NULL,
  `criado` datetime DEFAULT NULL,
  `usuarioalt` varchar(10) DEFAULT NULL,
  `alterado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Extraindo dados da tabela `pag_system`
--

INSERT INTO `pag_system` (`id`, `name_pag`, `caminho`, `usuariocad`, `criado`, `usuarioalt`, `alterado`) VALUES
(1, 'cad-sv2-suvis', 'form-system/cad/sv2/cad-sv2-suvis.php', 'admin', '2017-07-01 04:12:37', 'ADMIN', '2017-07-07 23:53:42'),
(2, 'proc-cad-sv2-suvis', 'form-system/cad/sv2/proc-cad-sv2/cad-sv2-suvis.php', 'admin', '2017-07-01 22:05:04', 'ADMIN', '2017-07-07 23:54:48'),
(3, 'list-sv2', 'form-system/list/list-sv2.php', 'admin', '2017-07-01 22:09:52', 'admin', '2017-07-07 01:02:38'),
(4, 'arq-sv2-2016', 'form-system/list/list-sv2-2016.php', 'ADMIN', '2017-07-07 11:30:45', 'ADMIN', '2017-07-07 11:37:16'),
(5, 'cad-memo-oficio', 'form-system/cad/cad-memo-oficio.php', 'ADMIN', '2017-07-07 22:38:20', 'ADMIN', '2017-07-07 22:38:57'),
(6, 'list-memo-oficio', 'form-system/list/list-memo-oficio.php', 'ADMIN', '2017-07-07 23:42:27', NULL, NULL),
(7, 'cad-sv2-outros', 'form-system/cad/sv2/cad-sv2-outros.php', 'ADMIN', '2017-07-08 00:09:56', NULL, NULL),
(8, 'proc-cad-sv2-outros', 'form-system/cad/sv2/proc-cad-sv2/cad-sv2-outros.php', 'ADMIN', '2017-07-08 00:51:33', NULL, NULL),
(9, 'cad-sv2-siva', 'form-system/cad/sv2/cad-sv2-siva.php', 'ADMIN', '2017-07-08 01:11:41', NULL, NULL),
(10, 'cad-sv2-surto', 'form-system/cad/sv2/cad-sv2-surto.php', 'ADMIN', '2017-07-08 01:12:43', NULL, NULL),
(11, 'proc-cad-sv2-siva', 'form-system/cad/sv2/proc-cad-sv2/cad-sv2-siva.php', 'ADMIN', '2017-07-08 01:13:23', NULL, NULL),
(12, 'proc-cad-sv2-surto', 'form-system/cad/sv2/proc-cad-sv2/cad-sv2-surto.php', 'ADMIN', '2017-07-08 01:14:05', 'ADMIN', '2017-07-08 01:33:22'),
(13, 'del-sv2', 'form-system/del/del-sv2.php', 'ADMIN', '2017-07-09 00:50:00', NULL, NULL),
(14, 'proc-cad-sv2-siva-outros', 'form-system/cad/sv2/proc-cad-sv2/cad-sv2-siva-outros.php', 'ADMIN', '2017-07-09 01:08:18', NULL, NULL),
(15, 'cad-sv2-siva-outros', 'form-system/cad/sv2/cad-sv2-siva-outros.php', 'ADMIN', '2017-07-09 01:09:06', NULL, NULL),
(16, 'proc-cad-memo-oficio', 'form-system/cad/proc-cad-system/cad-memo-oficio.php', 'ADMIN', '2017-07-10 00:22:40', NULL, NULL),
(17, 'edit-memo-oficio', 'form-system/edit/edit-memo-oficio.php', 'ADMIN', '2017-07-10 01:02:47', NULL, NULL),
(18, 'del-memo-oficio', 'form-system/del/del-memo-oficio.php', 'ADMIN', '2017-07-10 01:05:15', NULL, NULL),
(19, 'edit-sv2-suvis', 'form-system/edit/sv2/edit-sv2-suvis.php', 'ADMIN', '2017-07-10 01:30:35', NULL, NULL),
(20, 'edit-sv2-outros', 'form-system/edit/sv2/edit-sv2-outros.php', 'ADMIN', '2017-07-10 01:31:46', NULL, NULL),
(21, 'edit-sv2-siva', 'form-system/edit/sv2/edit-sv2-siva.php', 'ADMIN', '2017-07-10 01:32:57', NULL, NULL),
(22, 'edit-sv2-siva-outros', 'form-system/edit/sv2/edit-sv2-siva-outros.php', 'ADMIN', '2017-07-10 01:33:54', NULL, NULL),
(23, 'edit-sv2-surto', 'form-system/edit/sv2/edit-sv2-surto.php', 'ADMIN', '2017-07-10 01:34:18', NULL, NULL),
(24, 'proc-edit-sv2-suvis', 'form-system/edit/sv2/proc-edit-sv2/edit-sv2-suvis.php', 'ADMIN', '2017-07-10 01:48:37', NULL, NULL),
(25, 'proc-edit-sv2-outros', 'form-system/edit/sv2/proc-edit-sv2/edit-sv2-outros.php', 'ADMIN', '2017-07-10 01:49:37', NULL, NULL),
(26, 'proc-edit-sv2-siva', 'form-system/edit/sv2/proc-edit-sv2/edit-sv2-siva.php', 'ADMIN', '2017-07-10 01:50:37', 'ADMIN', '2017-07-10 01:51:37'),
(27, 'proc-edit-sv2-siva-outros', 'form-system/edit/sv2/proc-edit-sv2/edit-sv2-siva-outros.php', 'ADMIN', '2017-07-10 01:51:15', NULL, NULL),
(28, 'proc-edit-sv2-surto', 'form-system/edit/sv2/proc-edit-sv2/edit-sv2-surto.php', 'ADMIN', '2017-07-10 01:52:28', NULL, NULL),
(29, 'proc-edit-memo-oficio', 'form-system/edit/proc-edit-system/edit-memo-oficio.php', 'ADMIN', '2017-07-11 01:23:08', NULL, NULL),
(30, 'detal-sv2', 'form-system/list/detal-sv2.php', 'ADMIN', '2017-07-19 06:58:32', NULL, NULL),
(31, 'list-cidade', 'form-system/list/list-cidade.php', 'ADMIN', '2017-07-19 16:04:00', NULL, NULL),
(32, 'list-cnes', 'form-system/list/list-cnes.php', 'ADMIN', '2017-07-19 16:21:41', NULL, NULL),
(33, 'list-agravo', 'form-system/list/list-agravo.php', 'ADMIN', '2017-07-19 16:22:06', 'admin', '2017-07-25 21:42:46'),
(34, 'list-end', 'form-system/list/list-end.php', 'ADMIN', '2017-07-19 16:22:27', 'ADMIN', '2017-07-19 17:04:38'),
(35, 'list-bloq-1via-dengue', 'form-system/list/list-bloq-dengue.php', 'admin', '2017-07-21 15:09:48', NULL, NULL),
(36, 'ficha-bloqueio-1via', 'form-system/bloq/ficha-bloqueio-1via.php', 'admin', '2017-07-21 15:51:04', NULL, NULL),
(37, 'cad-cidade', 'form-system/cad/cad-cidade.php', 'admin', '2017-07-25 09:33:56', NULL, NULL),
(38, 'proc-cad-cidade', 'form-system/cad/proc-cad-system/cad-cidade.php', 'admin', '2017-07-25 10:40:06', 'admin', '2017-07-25 10:41:22'),
(39, 'edit-cidade', 'form-system/edit/edit-cidade.php', 'admin', '2017-07-25 14:14:45', 'admin', '2017-07-25 14:36:45'),
(40, 'proc-edit-cidade', 'form-system/edit/proc-edit-system/edit-cidade.php', 'admin', '2017-07-25 14:37:26', NULL, NULL),
(41, 'cad-cnes', 'form-system/cad/cad-cnes.php', 'admin', '2017-07-25 15:07:41', NULL, NULL),
(42, 'edit-cnes', 'form-system/edit/edit-cnes.php', 'admin', '2017-07-25 15:08:07', NULL, NULL),
(43, 'proc-cad-cnes', 'form-system/cad/proc-cad-system/cad-cnes.php', 'admin', '2017-07-25 15:08:51', 'admin', '2017-07-25 15:09:34'),
(44, 'proc-edit-cnes', 'form-system/edit/proc-edit-system/edit-cnes.php', 'admin', '2017-07-25 15:09:23', 'admin', '2017-07-25 15:57:39'),
(45, 'cad-agravo', 'form-system/cad/cad-agravo.php', 'admin', '2017-07-25 20:47:24', 'admin', '2017-07-25 21:43:05'),
(46, 'edit-agravo', 'form-system/edit/edit-agravo.php', 'admin', '2017-07-25 20:47:55', 'admin', '2017-07-25 22:42:09'),
(47, 'proc-cad-agravo', 'form-system/cad/proc-cad-system/cad-agravo.php', 'admin', '2017-07-25 20:48:50', 'admin', '2017-07-25 22:31:32'),
(48, 'proc-edit-agravo', 'form-system/edit/proc-edit-system/edit-agravo.php', 'admin', '2017-07-25 20:49:42', 'admin', '2017-07-25 21:43:58'),
(49, 'cad-end', 'form-system/cad/cad-end.php', 'admin', '2017-07-25 20:50:47', NULL, NULL),
(50, 'edit-end', 'form-system/edit/edit-end.php', 'admin', '2017-07-25 20:51:21', NULL, NULL),
(51, 'proc-cad-end', 'form-system/cad/proc-cad-system/cad-end.php', 'admin', '2017-07-25 20:52:01', NULL, NULL),
(52, 'proc-edit-end', 'form-system/edit/proc-edit-system/edit-end.php', 'admin', '2017-07-25 20:52:23', NULL, NULL),
(53, 'map-end', 'form-system/maps/map-end.php', 'admin', '2017-07-28 16:49:35', 'admin', '2017-07-31 07:35:11'),
(54, 'edit-perfil-user', 'form-system/edit/edit-perfil-user.php', 'admin', '2017-08-01 14:34:00', 'admin', '2017-08-01 14:34:17'),
(55, 'proc-edit-perfil', 'form-system/edit/proc-edit-system/edit-perfil.php', 'admin', '2017-08-01 14:36:50', NULL, NULL),
(56, 'proc-edit-senha', 'form-system/edit/proc-edit-system/edit-senha.php', 'admin', '2017-08-01 14:37:25', NULL, NULL),
(57, 'aaa', 'asssddddddddd', 'admin', '2017-08-25 15:33:20', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pag_system`
--
ALTER TABLE `pag_system`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pag_system`
--
ALTER TABLE `pag_system`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
