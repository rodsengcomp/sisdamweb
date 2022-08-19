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
(2, 'proc-cad-sv2', 'form-system/cad/proc-cad-system/sv2/proc-cad-sv2.php', 'admin', '2017-07-01 22:05:04', 'admin', '2018-05-02 11:33:20'),
(3, 'list-sv2', 'form-system/epidemio/list/list-sv2.php', 'admin', '2017-07-01 22:09:52', 'admin', '2018-05-08 11:21:01'),
(4, 'arq-sv2-2016', 'form-system/list/list-sv2-arq/list-sv2-2016.php', 'ADMIN', '2017-07-07 11:30:45', 'admin', '2017-12-28 14:57:09'),
(5, 'cad-memo-oficio', 'form-system/cad/cad-memo-oficio.php', 'ADMIN', '2017-07-07 22:38:20', 'admin', '2017-12-26 15:54:46'),
(6, 'list-memo-oficio', 'form-system/list/list-memo-oficio.php', 'ADMIN', '2017-07-07 23:42:27', 'admin', '2017-12-26 15:55:09'),
(7, 'cad-sv2-outros', 'form-system/cad/sv2/cad-sv2-outros.php', 'ADMIN', '2017-07-08 00:09:56', NULL, NULL),
(9, 'cad-sv2-siva', 'form-system/cad/sv2/cad-sv2-siva.php', 'ADMIN', '2017-07-08 01:11:41', NULL, NULL),
(10, 'cad-sv2-surto', 'form-system/cad/sv2/cad-sv2-surto.php', 'ADMIN', '2017-07-08 01:12:43', NULL, NULL),
(13, 'del-sisdamweb', 'form-system/del/del-sisdamweb.php', 'ADMIN', '2017-07-09 00:50:00', 'admin', '2018-05-05 10:59:40'),
(15, 'cad-sv2-siva-outros', 'form-system/cad/sv2/cad-sv2-siva-outros.php', 'ADMIN', '2017-07-09 01:09:06', 'D788796', '2020-10-15 09:51:17'),
(16, 'proc-cad-memo-oficio', 'form-system/cad/proc-cad-system/cad-memo-oficio.php', 'ADMIN', '2017-07-10 00:22:40', 'admin', '2017-12-26 15:55:31'),
(17, 'edit-memo-oficio', 'form-system/edit/edit-memo-oficio.php', 'ADMIN', '2017-07-10 01:02:47', NULL, NULL),
(18, 'del-memo-oficio', 'form-system/del/del-memo-oficio.php', 'ADMIN', '2017-07-10 01:05:15', NULL, NULL),
(19, 'edit-sv2-suvis', 'form-system/epidemio/edit/edit-sv2-suvis.php', 'ADMIN', '2017-07-10 01:30:35', 'admin', '2018-05-08 11:48:04'),
(20, 'edit-sv2-outros', 'form-system/epidemio/edit/edit-sv2-outros.php', 'ADMIN', '2017-07-10 01:31:46', 'admin', '2018-05-08 11:48:09'),
(21, 'edit-sv2-siva', 'form-system/epidemio/edit/edit-sv2-siva.php', 'ADMIN', '2017-07-10 01:32:57', 'D111111', '2018-08-13 10:06:24'),
(22, 'edit-sv2-siva-outros', 'form-system/epidemio/edit/edit-sv2-siva-outros.php', 'ADMIN', '2017-07-10 01:33:54', 'admin', '2018-05-08 11:48:19'),
(23, 'edit-sv2-surto', 'form-system/epidemio/edit/edit-sv2-surto.php', 'ADMIN', '2017-07-10 01:34:18', 'admin', '2018-05-08 11:48:32'),
(24, 'proc-edit-sv2', 'form-system/epidemio/edit/proc-edit-epidemio/proc-edit-sv2.php', 'ADMIN', '2017-07-10 01:48:37', 'admin', '2018-05-08 11:47:38'),
(29, 'proc-edit-memo-oficio', 'form-system/edit/proc-edit-system/edit-memo-oficio.php', 'ADMIN', '2017-07-11 01:23:08', NULL, NULL),
(30, 'detal-sv2', 'form-system/list/detal-sv2.php', 'ADMIN', '2017-07-19 06:58:32', NULL, NULL),
(31, 'list-cidade', 'form-system/epidemio/list/list-cidade.php', 'ADMIN', '2017-07-19 16:04:00', 'admin', '2018-05-08 11:26:26'),
(32, 'list-cnes', 'form-system/epidemio/list/list-cnes.php', 'ADMIN', '2017-07-19 16:21:41', 'admin', '2018-05-08 11:26:50'),
(33, 'list-agravo', 'form-system/epidemio/list/list-agravo.php', 'ADMIN', '2017-07-19 16:22:06', 'admin', '2018-05-08 11:26:02'),
(34, 'list-end', 'form-system/list/list-end.php', 'ADMIN', '2017-07-19 16:22:27', 'ADMIN', '2017-07-19 17:04:38'),
(35, 'list-bloq-dengue', 'form-system/ambiental/list/list-bloq-dengue.php', 'admin', '2017-07-21 15:09:48', 'admin', '2018-06-06 09:53:22'),
(37, 'cad-cidade', 'form-system/cad/cad-cidade.php', 'admin', '2017-07-25 09:33:56', NULL, NULL),
(38, 'proc-cad-cidade', 'form-system/cad/proc-cad-system/cad-cidade.php', 'admin', '2017-07-25 10:40:06', 'admin', '2017-07-25 10:41:22'),
(39, 'edit-cidade', 'form-system/epidemio/edit/edit-cidade.php', 'admin', '2017-07-25 14:14:45', 'admin', '2018-05-08 11:39:00'),
(40, 'proc-edit-cidade', 'form-system/epidemio/edit/proc-edit-epidemio/edit-cidade.php', 'admin', '2017-07-25 14:37:26', 'admin', '2018-05-08 11:39:24'),
(41, 'cad-cnes', 'form-system/cad/cad-cnes.php', 'admin', '2017-07-25 15:07:41', NULL, NULL),
(42, 'edit-cnes', 'form-system/epidemio/edit/edit-cnes.php', 'admin', '2017-07-25 15:08:07', 'admin', '2018-05-08 11:40:07'),
(43, 'proc-cad-cnes', 'form-system/cad/proc-cad-system/cad-cnes.php', 'admin', '2017-07-25 15:08:51', 'admin', '2017-07-25 15:09:34'),
(45, 'cad-agravo', 'form-system/cad/cad-agravo.php', 'admin', '2017-07-25 20:47:24', 'admin', '2017-07-25 21:43:05'),
(46, 'edit-agravo', 'form-system/epidemio/edit/edit-agravo.php', 'admin', '2017-07-25 20:47:55', 'admin', '2018-05-08 11:30:55'),
(47, 'proc-cad-agravo', 'form-system/cad/proc-cad-system/cad-agravo.php', 'admin', '2017-07-25 20:48:50', 'admin', '2017-07-25 22:31:32'),
(48, 'proc-edit-agravo', 'form-system/epidemio/edit/proc-edit-epidemio/edit-agravo.php', 'admin', '2017-07-25 20:49:42', 'admin', '2018-05-08 11:31:10'),
(49, 'cad-end', 'form-system/cad/cad-end.php', 'admin', '2017-07-25 20:50:47', NULL, NULL),
(50, 'edit-end', 'form-system/edit/edit-end.php', 'admin', '2017-07-25 20:51:21', NULL, NULL),
(51, 'proc-cad-end', 'form-system/cad/proc-cad-system/cad-end.php', 'admin', '2017-07-25 20:52:01', NULL, NULL),
(52, 'proc-edit-end', 'form-system/edit/proc-edit-system/edit-end.php', 'admin', '2017-07-25 20:52:23', NULL, NULL),
(53, 'map-end', 'form-system/maps/map-end.php', 'admin', '2017-07-28 16:49:35', 'admin', '2017-07-31 07:35:11'),
(54, 'edit-perfil-user', 'form-system/edit/edit-perfil-user.php', 'admin', '2017-08-01 14:34:00', 'admin', '2017-08-01 14:34:17'),
(55, 'proc-edit-perfil', 'form-system/edit/proc-edit-system/edit-perfil.php', 'admin', '2017-08-01 14:36:50', NULL, NULL),
(56, 'proc-edit-senha', 'form-system/edit/proc-edit-system/edit-senha.php', 'admin', '2017-08-01 14:37:25', NULL, NULL),
(58, 'cad-memo-oficio-2017', 'form-system/cad/cad-memo-oficio-2017.php', 'admin', '2017-12-26 13:08:57', 'admin', '2017-12-29 12:24:46'),
(59, 'list-memo-oficio-arquivo', 'form-system/list/list-arq-system/list-memo-oficio-arquivo.php', 'admin', '2017-12-26 13:09:32', 'admin', '2017-12-29 11:59:41'),
(60, 'proc-cad-memo-oficio-2017', 'form-system/cad/proc-cad-system/cad-memo-oficio-2017.php', 'admin', '2017-12-26 13:10:15', 'admin', '2017-12-29 11:54:33'),
(61, 'edit-memo-oficio-2018', 'form-system/edit/edit-memo-oficio-2018.php', 'admin', '2017-12-26 13:10:33', NULL, NULL),
(62, 'del-memo-oficio-2018', 'form-system/del/del-memo-oficio-2018.php', 'admin', '2017-12-26 13:11:03', NULL, NULL),
(63, 'proc-edit-memo-oficio-2018', 'form-system/edit/proc-edit-system/edit-memo-oficio-2018.php', 'admin', '2017-12-26 13:12:13', NULL, NULL),
(64, 'arq-sv2-2017', 'form-system/list/list-sv2-arq/list-sv2-2017.php', 'admin', '2017-12-28 14:58:08', NULL, NULL),
(65, 'list-lab-ial', 'form-system/ambiental/list/list-lab-ial.php', 'admin', '2018-01-18 11:34:09', 'D788796', '2019-03-15 16:03:18'),
(66, 'list-tid-aberto', 'form-system/list/list-tid-aberto.php', 'admin', '2018-02-22 16:21:43', NULL, NULL),
(67, 'cad-tid', 'form-system/cad/cad-tid.php', 'admin', '2018-02-22 16:29:29', NULL, NULL),
(68, 'proc-cad-tid', 'form-system/cad/proc-cad-system/cad-tid.php', 'admin', '2018-02-22 16:30:05', NULL, NULL),
(69, 'edit-tid', 'form-system/edit/edit-tid.php', 'admin', '2018-03-05 16:04:37', 'admin', '2018-03-05 16:07:51'),
(70, 'proc-edit-tid', 'form-system/edit/proc-edit-system/edit-tid.php', 'admin', '2018-03-06 11:10:54', NULL, NULL),
(71, 'list-ccz-dengue', 'form-system/ambiental/list/list-ccz-dengue.php', 'admin', '2018-04-05 15:47:25', 'admin', '2018-05-11 09:26:53'),
(72, 'altera-tr', 'form-system/ambiental/edit/proc-edit-ambiental/altera-tr.php', 'admin', '2018-04-11 10:28:27', 'admin', '2018-05-17 16:08:21'),
(74, 'list-bloq-2via-dengue', 'form-system/ambiental/list/list-dengue-2via.php', 'admin', '2018-04-11 11:14:20', 'admin', '2018-05-11 09:27:19'),
(76, 'impressao-ambiental', 'form-system/ambiental/edit/proc-edit-ambiental/impressao-ambiental.php', 'admin', '2018-04-11 14:48:54', 'admin', '2018-05-16 11:49:27'),
(77, 'edit-end-ambiental', 'form-system/ambiental/edit/edit-end-ambiental.php', 'admin', '2018-04-19 09:54:31', 'admin', '2018-05-17 14:21:21'),
(78, 'proc-edit-end-ambiental', 'form-system/ambiental/edit/proc-edit-ambiental/edit-end-ambiental.php', 'admin', '2018-04-26 11:03:02', 'admin', '2018-05-16 16:23:31'),
(79, 'edit-ambiental', 'form-system/ambiental/edit/edit-ambiental.php', 'admin', '2018-04-27 16:09:38', 'admin', '2018-05-17 17:09:10'),
(80, 'bloqueio-ccz', 'form-system/ambiental/bloq/bloqueio-ccz.php', 'admin', '2018-05-02 13:35:12', 'admin', '2018-06-05 10:37:25'),
(82, 'list-chiku-ial', 'form-system/ambiental/list/list-ial-chiku.php', 'admin', '2018-05-08 11:08:59', 'admin', '2018-05-11 09:29:51'),
(83, 'list-coque', 'form-system/list/list-coque.php', 'admin', '2018-05-08 11:16:52', NULL, NULL),
(84, 'list-coque-ial', 'form-system/epidemio/list/list-ial-coque.php', 'admin', '2018-05-08 12:27:26', 'admin', '2018-05-08 12:32:24'),
(85, 'list-sinan-ial-coque', 'form-system/epidemio/list/list-sinan-ial-coque.php', 'admin', '2018-05-08 12:32:11', NULL, NULL),
(86, 'list-bloq-ial', 'form-system/ambiental/list/list-bloq-ial.php', 'admin', '2018-05-11 11:06:24', 'admin', '2018-06-05 08:03:00'),
(87, 'list-bloq-2via-febre-a', 'form-system/ambiental/list/list-febre-a-2via.php', 'admin', '2018-05-12 11:11:29', NULL, NULL),
(88, 'proc-edit-ambiental', 'form-system/ambiental/edit/proc-edit-ambiental/edit-ambiental.php', 'admin', '2018-05-14 10:55:33', 'admin', '2018-05-16 14:33:46'),
(90, 'list-bloq-2via', 'form-system/ambiental/list/list-bloq-2via.php', 'admin', '2018-05-18 17:53:15', NULL, NULL),
(91, 'bloqueio-ial', 'form-system/ambiental/bloq/bloqueio-ial.php', 'admin', '2018-05-21 16:04:33', NULL, NULL),
(92, 'list-adm-sanitaria', 'form-system/sanitaria/list/list-adm-sanitaria.php', 'admin', '2018-05-22 17:07:25', 'admin', '2018-05-22 17:08:17'),
(93, 'proc-list-adm-sanitaria', 'form-system/sanitaria/list/proc-list-sanitaria/list-adm-sanitaria.php', 'admin', '2018-05-22 17:08:06', NULL, NULL),
(94, 'cad-prot-sanitaria', 'form-system/sanitaria/cad-prot-sanitaria.php', 'admin', '2018-05-23 17:36:19', 'admin', '2018-05-29 14:23:52'),
(95, 'proc-prot-sanitaria', 'form-system/sanitaria/proc-prot-sanitaria.php', 'admin', '2018-05-24 09:54:46', 'admin', '2018-05-29 14:47:43'),
(96, 'edit-prot-sanitaria', 'form-system/sanitaria/edit-prot-sanitaria.php', 'admin', '2018-05-26 09:30:27', 'admin', '2018-05-29 14:26:34'),
(97, 'list-bloq-lepto', 'form-system/ambiental/list/list-bloq-lepto.php', 'admin', '2018-05-30 10:43:11', 'admin', '2018-06-06 09:54:10'),
(98, 'list-ccz-lepto', 'form-system/ambiental/list/list-ccz-lepto.php', 'admin', '2018-06-05 11:11:22', NULL, NULL),
(99, 'list-dengue-ial', 'form-system/ambiental/list/list-ial-dengue.php', 'admin', '2018-06-05 11:52:03', 'D788796', '2019-10-23 16:09:55'),
(100, 'list-rel-amb-dengue', 'form-system/ambiental/list/list-rel-amb-dengue.php', 'admin', '2018-06-06 11:31:14', 'admin', '2018-06-25 14:51:16'),
(101, 'list-rel-amb-ial', 'form-system/ambiental/list/list-rel-amb-ial.php', 'admin', '2018-06-25 14:54:14', NULL, NULL),
(102, 'cad-est-sanitaria', 'form-system/sanitaria/cad-est-sanitaria.php', 'admin', '2018-06-27 08:54:16', NULL, NULL),
(103, 'extracao-banco-de-dados-sinan-net', 'ajuda/banco_de_dados/extracao/extracao-banco-de-dados-sinan-net.php', 'admin', '2018-06-27 09:02:10', 'D111111', '2018-09-24 09:38:19'),
(104, 'extracao-banco-de-dados-gal', 'ajuda/banco_de_dados/extracao/extracao-banco-de-dados-gal.php', 'admin', '2018-06-27 09:11:56', 'D111111', '2018-09-24 09:38:39'),
(105, 'login-primeiro-acesso', 'ajuda/login-primeiro-acesso.php', 'admin', '2018-06-27 09:15:33', NULL, NULL),
(106, 'cad-insumo', 'form-system/cad/cad-insumo.php', 'admin', '2018-08-02 12:01:42', NULL, NULL),
(107, 'list-entrada-material', 'form-system/ambiental/list/list-entrada-material.php', 'admin', '2018-08-02 12:12:10', NULL, NULL),
(108, 'cad-entrada-material', 'form-system/ambiental/cad/cad-entrada-material.php', 'admin', '2018-08-06 11:58:44', NULL, NULL),
(109, 'proc-cad-entrada-material', 'form-system/ambiental/cad/proc-cad-ambiental/cad-entrada-material.php', 'D111111', '2018-08-09 12:11:56', NULL, NULL),
(110, 'edit-entrada-material', 'form-system/ambiental/cad/edit-entrada-material.php', 'D111111', '2018-08-14 10:57:42', 'D111111', '2018-08-14 11:23:01'),
(111, 'extracao-banco-de-dados-getwyn', 'ajuda/banco_de_dados/extracao/extracao-banco-de-dados-getwyn.php', 'D111111', '2018-08-22 11:35:46', 'D111111', '2018-09-24 09:38:48'),
(112, 'importacao-banco-de-dados', 'ajuda/banco_de_dados/importacao/importacao-banco-de-dados.php', 'D111111', '2018-09-24 16:15:11', NULL, NULL),
(113, 'extracao-banco-de-dados-dengue-on-line', 'ajuda/banco_de_dados/extracao/extracao-banco-de-dados-dengue-on-line.php', 'D111111', '2018-09-24 16:37:04', NULL, NULL),
(114, 'list-sv2-arquivo', 'form-system/list/list-arq-system/list-sv2-arquivo.php', 'D788796', '2019-01-22 09:58:03', NULL, NULL),
(116, '2018', 'http://10.43.74.178/sisdamweb-2018/', 'D788796', '2019-01-24 10:02:38', NULL, NULL),
(117, 'mapa-dengue', 'form-system/ambiental/maps/mapa-dengue.php', 'D788796', '2019-01-29 14:33:35', 'D788796', '2019-01-31 12:25:18'),
(118, 'mapa-chiku', 'form-system/ambiental/maps/mapa-chiku.php', 'D788796', '2019-01-29 15:55:01', NULL, NULL),
(119, 'mapa-dengue-marker', 'form-system/ambiental/maps/markers/mapa-dengue.php', 'D788796', '2019-02-05 10:35:50', NULL, NULL),
(120, 'list-rel-amb-chiku', 'form-system/ambiental/list/list-rel-amb-chiku.php', 'D788796', '2019-03-01 08:19:36', NULL, NULL),
(121, 'list-bloq-chiku', 'form-system/ambiental/list/list-bloq-chiku.php', 'D788796', '2019-03-01 10:51:56', NULL, NULL),
(122, 'bloqueio-ial-modal', 'form-system/ambiental/bloq/bloqueio-ial-modal.php', 'D788796', '2019-03-07 10:55:41', 'D788796', '2019-03-07 10:59:16'),
(123, 'cad-pe-ie-jt', 'form-system/ambiental/cad/cad-pe-ie.php', 'D788796', '2019-04-08 10:25:01', NULL, NULL),
(124, 'edit-pe-ie-jt', 'form-system/ambiental/edit/edit-pe-ie.php', 'D788796', '2019-04-08 11:51:31', 'D788796', '2019-04-08 11:52:23'),
(125, 'proc-pe-ie', 'form-system/ambiental/cad/proc-cad-ambiental/proc-pe-ie.php', 'D788796', '2019-04-09 09:58:32', 'D788796', '2019-04-10 15:27:12'),
(126, 'list-pe-ie-jt', 'form-system/ambiental/list/list-pe-ie.php', 'D788796', '2019-04-10 16:15:37', 'D788796', '2019-04-11 08:39:37'),
(127, 'mapa-pe-ie', 'form-system/ambiental/maps/mapa-pe-ie.php', 'D788796', '2019-04-12 10:21:45', 'D788796', '2019-04-12 10:24:45'),
(128, 'edit-pe-ie-jt-edit', 'form-system/ambiental/edit/edit-pe-ie-edit.php', 'D788796', '2019-04-12 14:35:16', 'D788796', '2019-04-12 15:09:56'),
(129, 'mapa-dengue-positivo', 'form-system/ambiental/maps/mapa-dengue-positivo.php', 'D788796', '2019-04-22 16:14:28', NULL, NULL),
(130, 'proc-edit-end-ambiental-sv2', 'form-system/ambiental/edit/proc-edit-ambiental/edit-end-ambiental-sv2.php', 'D788796', '2019-05-16 15:28:59', NULL, NULL),
(131, 'edit-end-ambiental-sv2', 'form-system/ambiental/edit/edit-end-ambiental-sv2.php', 'D788796', '2019-05-16 15:29:51', NULL, NULL),
(132, 'list-sinan-ial-sarampo', 'form-system/epidemio/list/list-sinan-ial-sarampo.php', 'D788796', '2019-07-17 16:04:39', NULL, NULL),
(133, 'list-ial-sarampo', 'form-system/epidemio/list/list-ial-sarampo.php', 'D788796', '2019-07-29 12:08:30', NULL, NULL),
(134, 'edit-end-epidemio', 'form-system/epidemio/edit/edit-end-epidemio.php', 'D788796', '2019-08-05 11:59:37', NULL, NULL),
(135, 'proc-edit-end-epidemio', 'form-system/epidemio/edit/proc-edit-epidemio/edit-end-epidemio.php', 'D788796', '2019-08-05 12:00:18', NULL, NULL),
(136, 'mapa-sarampo', 'form-system/epidemio/maps/mapa-sarampo.php', 'D788796', '2019-08-12 11:40:57', NULL, NULL),
(137, 'mapa-sarampo-positivo', 'form-system/epidemio/maps/mapa-sarampo-positivo.php', 'D788796', '2019-08-12 11:42:26', NULL, NULL),
(138, 'edit-epidemio', 'form-system/epidemio/edit/edit-epidemio.php', 'D788796', '2019-08-23 09:50:30', NULL, NULL),
(139, 'list-rel-epid-sarampo-ial', 'form-system/epidemio/list/list-rel-epid-sarampo-ial.php', 'D788796', '2019-09-26 15:01:04', 'D788796', '2019-09-26 15:28:02'),
(140, 'rel-fecha-dengue', 'form-system/ambiental/list/list-fecha-amb-dengue.php', 'D788796', '2019-11-05 12:43:00', NULL, NULL),
(141, 'list-sivep-ial-covid-19', 'form-system/epidemio/list/list-sivep-ial-covid-19.php', 'D788796', '2020-03-23 15:53:48', 'D788796', '2020-03-23 15:54:32'),
(142, 'list-anti-rabica', 'form-system/epidemio/list/list-anti-rabica.php', 'D788796', '2020-07-02 09:11:54', 'D788796', '2021-01-28 13:48:13'),
(143, 'proc-edit-cnes', 'form-system/epidemio/edit/proc-edit-epidemio/edit-cnes.php', NULL, NULL, NULL, NULL),
(144, 'list-esporo-animal', 'form-system/ambiental/list/list-esporo-animal.php', 'D788796', '2022-07-21 11:07:45', NULL, NULL),
(145, 'list-lab-esporo', 'form-system/ambiental/list/list-lab-esporo.php', 'D788796', '2022-07-21 11:37:41', NULL, NULL),
(146, 'cad-esporo-animal', 'form-system/ambiental/cad/cad-espo-animal.php', 'D788796', '2022-07-28 15:24:45', NULL, NULL),
(147, 'edit-esporo-animal', 'form-system/ambiental/edit/edit-esporo-animal.php', 'D788796', '2022-07-28 15:36:33', NULL, NULL),
(148, 'proc-cad-esporo-animal', 'form-system/ambiental/cad/proc-cad-ambiental/proc-cad-esporo-animal.php', 'D788796', '2022-08-02 09:27:19', NULL, NULL),
(149, 'proc-edit-esporo-animal', 'form-system/ambiental/edit/proc-edit-ambiental/proc-edit-esporo-animal.php', 'D788796', '2022-08-12 14:24:20', NULL, NULL),
(150, 'cad-med-an-esp-an', 'form-system/ambiental/cad/cad-med-sd-espo-animal.php', 'D788796', '2022-08-15 11:24:32', NULL, NULL),
(151, 'imprimir-ficha-esporo-animal', 'form-system/ambiental/print/print-esporo-animal.php', 'D788796', '2022-08-19 15:08:18', NULL, NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `pag_system`
--
ALTER TABLE `pag_system`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `pag_system`
--
ALTER TABLE `pag_system`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
