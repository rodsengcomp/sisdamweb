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
-- Estrutura da tabela `pag_admin`
--

CREATE TABLE `pag_admin` (
  `id` int(11) NOT NULL,
  `name_pag` varchar(100) DEFAULT NULL,
  `caminho` varchar(300) DEFAULT NULL,
  `usuariocad` varchar(20) DEFAULT NULL,
  `criado` datetime DEFAULT NULL,
  `usuarioalt` varchar(10) DEFAULT NULL,
  `alterado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Extraindo dados da tabela `pag_admin`
--

INSERT INTO `pag_admin` (`id`, `name_pag`, `caminho`, `usuariocad`, `criado`, `usuarioalt`, `alterado`) VALUES
(1, 'cad-user', 'form-admin/cad/cad-user.php', NULL, NULL, 'admin', '2017-07-07 02:00:36'),
(2, 'edit-user', 'form-admin/edit/edit-user.php', NULL, NULL, NULL, NULL),
(3, 'list-user', 'form-admin/list/list-user.php', NULL, NULL, NULL, NULL),
(4, 'cad-pag-admin', 'form-admin/cad/cad-pag-admin.php', NULL, NULL, NULL, NULL),
(5, 'edit-pag-admin', 'form-admin/edit/edit-pag-admin.php', NULL, NULL, NULL, NULL),
(6, 'list-pag-admin', 'form-admin/list/list-pag-admin.php', NULL, NULL, 'admin', '2017-06-28 09:38:00'),
(7, 'cad-pag-system', 'form-admin/cad/cad-pag-system.php', NULL, NULL, NULL, NULL),
(8, 'edit-pag-system', 'form-admin/edit/edit-pag-system.php', NULL, NULL, NULL, NULL),
(9, 'list-pag-system', 'form-admin/list/list-pag-system.php', NULL, NULL, NULL, NULL),
(10, 'edit-perfil-user', 'form-admin/edit/edit-perfil-user.php', NULL, NULL, NULL, NULL),
(11, 'edit-menu-system', 'form-admin/edit/edit-menu-system.php', NULL, NULL, NULL, NULL),
(12, 'del-pag-admin', 'form-admin/del/del-pag-admin.php', 'admin', '2017-06-28 08:28:30', 'admin', '2017-06-28 09:31:32'),
(13, 'del-pag-system', 'form-admin/del/del-pag-system.php', 'admin', '2017-06-28 09:53:01', 'admin', '2017-07-07 02:48:44'),
(14, 'del-user', 'form-admin/del/del-user.php', 'admin', '2017-06-28 09:58:44', 'admin', '2017-06-28 10:01:00'),
(15, 'list-menu', 'form-admin/list/list-menu.php', 'admin', '2017-06-29 10:57:57', 'ADMIN', '2017-07-13 20:56:41'),
(16, 'list-submenu', 'form-admin/list/list-submenu.php', 'ADMIN', '2017-07-13 18:43:30', 'ADMIN', '2017-07-13 21:49:31'),
(17, 'list-menu-submenu', 'form-admin/list/list-menu-submenu.php', 'ADMIN', '2017-07-13 18:45:50', 'ADMIN', '2017-07-13 22:18:42'),
(18, 'cad-menu', 'form-admin/cad/cad-menu.php', 'ADMIN', '2017-07-13 19:34:09', 'ADMIN', '2017-07-13 20:57:04'),
(19, 'edit-menu', 'form-admin/edit/edit-menu.php', 'ADMIN', '2017-07-13 20:02:05', 'ADMIN', '2017-07-13 20:57:22'),
(20, 'del-menu', 'form-admin/del/del-menu.php', 'ADMIN', '2017-07-13 20:14:35', 'ADMIN', '2017-07-13 20:57:40'),
(21, 'cad-submenu', 'form-admin/cad/cad-submenu.php', 'ADMIN', '2017-07-13 20:49:25', 'ADMIN', '2017-07-13 22:20:47'),
(22, 'edit-submenu', 'form-admin/edit/edit-submenu.php', 'ADMIN', '2017-07-13 21:47:39', NULL, NULL),
(23, 'cad-menu-submenu', 'form-admin/cad/cad-menu-submenu.php', 'ADMIN', '2017-07-13 22:24:25', NULL, NULL),
(24, 'edit-menu-submenu', 'form-admin/edit/edit-menu-submenu.php', 'ADMIN', '2017-07-13 23:51:57', NULL, NULL),
(25, 'del-submenu', 'form-admin/del/del-submenu.php', 'ADMIN', '2017-07-14 00:04:01', NULL, NULL),
(26, 'del-menu-submenu', 'form-admin/del/del-menu-submenu.php', 'ADMIN', '2017-07-14 00:04:31', 'admin', '2017-07-21 12:59:07'),
(27, 'list-submenu-livre', 'form-admin/list/list-submenu-livre.php', 'admin', '2017-08-17 10:07:47', NULL, NULL),
(28, 'cad-submenu-livre', 'form-admin/cad/cad-submenu-livre.php', 'admin', '2017-08-17 10:10:58', 'admin', '2017-08-17 10:11:32'),
(31, 'list-pag-livre', 'form-admin/list/list-pag-livre.php', 'admin', '2017-08-25 15:31:25', 'admin', '2017-08-25 15:32:42'),
(32, 'del-pag-livre', 'form-admin/del/del-pag-livre.php', 'admin', '2017-08-25 15:37:44', NULL, NULL),
(33, 'list-menu-livre', 'form-admin/list/list-menu-livre.php', 'admin', '2017-08-25 16:01:15', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pag_admin`
--
ALTER TABLE `pag_admin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pag_admin`
--
ALTER TABLE `pag_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
