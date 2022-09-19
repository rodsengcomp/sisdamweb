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
(2, 1, 'Bloqueios', 'suvisjt.php?pag=list-bloq-dengue&sinan=dengnet&tabela=tbldengue&buttons=dengue&agravo=DENGUE&ial=dengue_ial&list=dengue', NULL, NULL, 'D788796', '2021-03-12 11:22:03'),
(5, 3, 'IAL-Exames', 'suvisjt.php?pag=list-lab-ial&sinan=famarnet&ial=febrea_ial&buttons=febrea&agravo=FEBRE AMARELA', 'ADMIN', '2017-07-13 23:27:27', 'D788796', '2019-03-15 16:09:48'),
(6, 5, 'Cadastrar', 'suvisjt.php?pag=cad-cidade', 'ADMIN', '2017-07-14 01:38:14', NULL, NULL),
(7, 5, 'Listar', 'suvisjt.php?pag=list-cidade', 'ADMIN', '2017-07-14 01:38:38', NULL, NULL),
(8, 6, 'Cadastrar', 'suvisjt.php?pag=cad-cnes', 'ADMIN', '2017-07-14 01:39:41', NULL, NULL),
(9, 6, 'Listar', 'suvisjt.php?pag=list-cnes', 'ADMIN', '2017-07-14 01:39:54', NULL, NULL),
(10, 7, 'Cadastrar', 'suvisjt.php?pag=cad-agravo', 'ADMIN', '2017-07-14 01:40:15', 'admin', '2017-07-25 21:44:47'),
(11, 7, 'Listar', 'suvisjt.php?pag=list-agravo', 'ADMIN', '2017-07-14 01:40:31', 'admin', '2017-07-25 21:45:09'),
(12, 8, 'Cadastrar', 'suvisjt.php?pag=cad-end', 'ADMIN', '2017-07-14 01:40:49', 'admin', '2017-07-26 09:57:42'),
(13, 8, 'Listar', 'suvisjt.php?pag=list-end', 'ADMIN', '2017-07-14 01:41:03', 'ADMIN', '2017-07-19 17:04:54'),
(15, 9, 'Bloqueios', 'suvisjt.php?pag=list-bloq-ial&sinan=zikanet&tabela=tblzika&buttons=zika&agravo=FEBRE PELO VIRUS ZIKA&ial=zika_ial&list=ial', 'ADMIN', '2017-07-14 01:41:53', 'D788796', '2019-05-16 11:52:01'),
(16, 10, 'Cadastrar', 'suvisjt.php?pag=cad-sv2-suvis', 'ADMIN', '2017-07-14 01:44:20', 'ADMIN', '2017-07-15 00:25:31'),
(17, 10, 'Listar', 'suvisjt.php?pag=list-sv2', 'ADMIN', '2017-07-14 01:44:38', 'ADMIN', '2017-07-15 00:26:03'),
(18, 12, 'Cadastrar', 'suvisjt.php?pag=cad-memo-oficio', 'ADMIN', '2017-07-19 08:47:50', 'admin', '2017-12-29 11:44:59'),
(19, 12, 'Listar', 'suvisjt.php?pag=list-memo-oficio', 'ADMIN', '2017-07-19 08:48:50', 'admin', '2017-12-29 11:44:55'),
(20, 8, 'Mapa', 'suvisjt.php?pag=map-end', 'admin', '2017-07-28 16:50:32', 'admin', '2017-07-31 07:34:19'),
(21, 14, 'Sv2-2016', 'suvisjt.php?pag=list-sv2-arquivo&year=2016', 'admin', '2017-12-26 10:19:29', 'admin', '2017-12-26 10:38:49'),
(22, 14, 'Sv2-2017', 'suvisjt.php?pag=list-sv2-arquivo&year=2017', 'admin', '2017-12-26 10:37:08', 'admin', '2017-12-26 10:48:08'),
(24, 13, 'Memo/Ofício-2017', 'suvisjt.php?pag=list-memo-oficio-arquivo&year=2017', 'admin', '2017-12-29 11:46:50', 'admin', '2018-01-08 10:25:57'),
(25, 15, 'Cadastrar', 'suvisjt.php?pag=cad-tid', 'admin', '2018-02-22 16:25:14', 'admin', '2018-02-23 08:32:59'),
(26, 15, 'Listar Tid Aberto', 'suvisjt.php?pag=list-tid-aberto', 'admin', '2018-02-23 08:31:06', 'admin', '2018-02-23 08:33:11'),
(27, 16, 'Listar', 'suvisjt.php?pag=list-sinan-ial-coque', 'admin', '2018-02-23 10:56:30', 'admin', '2018-05-08 12:31:16'),
(28, 1, 'Exames-CCZ-Dengue', 'suvisjt.php?pag=list-ccz-dengue', 'admin', '2018-04-06 08:14:35', 'admin', '2018-06-05 11:12:40'),
(29, 2, 'IAL-Exames', 'suvisjt.php?pag=list-lab-ial&sinan=chikonnet&ial=chiku_ial&buttons=chiku&agravo=CHIKUNGUNYA', 'admin', '2018-05-08 11:09:26', 'D788796', '2019-03-15 16:19:54'),
(30, 16, 'IAL-Exames', 'suvisjt.php?pag=list-coque-ial', 'admin', '2018-05-08 12:29:38', 'D788796', '2019-03-15 16:24:10'),
(31, 3, 'Bloqueios', 'suvisjt.php?pag=list-bloq-ial&sinan=famarnet&tabela=tblfebrea&ial=febrea_ial&list=febrea&buttons=febrea&agravo=FEBRE AMARELA', 'admin', '2018-05-11 11:07:11', 'D788796', '2019-03-14 09:56:14'),
(32, 2, 'Bloqueios', 'suvisjt.php?pag=list-bloq-ial&sinan=chikonnet&tabela=tblchiku&ial=chiku_ial&list=chiku&buttons=chiku&agravo=CHIKUNGUNYA', 'admin', '2018-05-17 16:30:16', 'D788796', '2019-03-14 09:56:41'),
(33, 9, 'IAL-Exames', 'suvisjt.php?pag=list-lab-ial&sinan=zikanet&ial=zika_ial&buttons=zika&agravo=FEBRE PELO VIRUS ZIKA', 'admin', '2018-05-18 15:04:10', 'D788796', '2019-05-16 11:52:13'),
(34, 17, 'Listar', 'suvisjt.php?pag=list-adm-sanitaria', 'admin', '2018-05-22 17:28:18', NULL, NULL),
(35, 17, 'Cadastrar', 'suvisjt.php?pag=cad-prot-sanitaria', 'admin', '2018-05-24 09:13:44', 'admin', '2018-05-29 14:24:24'),
(36, 18, 'Cadastrar', 'suvisjt.php?pag=cad-est-sanitaria', 'admin', '2018-05-25 15:17:37', NULL, NULL),
(37, 4, 'Bloqueios', 'suvisjt.php?pag=list-bloq-lepto&sinan=leptonet&tabela=tbllepto&buttons=lepto&agravo=LEPTOSPIROSE&ial=lepto_ial&list=lepto', 'admin', '2018-05-30 10:44:43', 'D788796', '2019-04-05 14:51:04'),
(38, 4, 'Exames-CCZ-Lepto', 'suvisjt.php?pag=list-ccz-lepto', 'admin', '2018-06-05 11:12:19', NULL, NULL),
(40, 1, 'IAL-Exames', 'suvisjt.php?pag=list-lab-ial&sinan=dengnet&ial=dengue_ial&buttons=dengue&agravo=DENGUE', 'admin', '2018-06-05 11:59:46', 'D788796', '2020-12-21 07:32:36'),
(41, 1, 'Relatórios', 'suvisjt.php?pag=list-rel-amb-dengue&tabela=tbldengue&sinan=dengnet&ccz=resultado_ccz&buttons=dengue&agravo=DENGUE', 'admin', '2018-06-06 11:31:28', 'admin', '2018-06-25 14:52:02'),
(42, 3, 'Relatórios', 'suvisjt.php?pag=list-rel-amb-ial&tabela=tblfebrea&sinan=famarnet&ccz=febrea_ial&buttons=febrea&agravo=FEBRE AMARELA', 'admin', '2018-06-25 14:56:35', NULL, NULL),
(43, 2, 'Relatórios', 'suvisjt.php?pag=list-rel-amb-ial&tabela=tblchiku&sinan=chikonnet&ial=chiku_ial&buttons=chiku&agravo=CHIKUNGUNYA', 'admin', '2018-06-27 07:53:24', 'D788796', '2018-11-01 15:15:22'),
(44, 4, 'Relatórios', 'suvisjt.php?pag=list-rel-amb-ial&tabela=tbllepto&sinan=lepto&ccz=resultado_lepto&buttons=lepto&agravo=LEPTOSPIROSE', 'admin', '2018-06-27 07:55:12', 'admin', '2018-06-27 07:55:52'),
(45, 9, 'Relatórios', 'suvisjt.php?pag=list-rel-amb-ial&tabela=tblzika&sinan=zikanet&ial=zika_ial&buttons=zika&agravo=FEBRE PELO VIRUS ZIKA', 'admin', '2018-06-27 08:45:56', 'D788796', '2019-05-16 11:52:34'),
(46, 19, 'Extração Sinan Net', 'suvisjt.php?pag=extracao-banco-de-dados-sinan-net', 'admin', '2018-06-27 09:05:14', 'D111111', '2018-08-22 10:33:20'),
(47, 19, 'Extração GAL', 'suvisjt.php?pag=extracao-banco-de-dados-gal', 'admin', '2018-06-27 09:11:21', 'D111111', '2018-08-22 10:32:54'),
(48, 20, 'Primeiro Acesso', 'suvisjt.php?pag=login-primeiro-acesso', 'admin', '2018-06-27 09:14:07', NULL, NULL),
(49, 21, 'Entradas', 'suvisjt.php?pag=list-entrada-material', 'admin', '2018-08-02 12:19:53', NULL, NULL),
(50, 19, 'Extração GetWyn', 'suvisjt.php?pag=extracao-banco-de-dados-getwyn', 'D111111', '2018-08-22 10:31:42', NULL, NULL),
(51, 22, 'Conta', 'suvisjt.php?pag=conta-email', 'D111111', '2018-08-27 16:13:32', NULL, NULL),
(52, 22, 'Morto', 'suvisjt.php?pag=morto-email', 'D111111', '2018-08-27 16:14:06', NULL, NULL),
(53, 19, 'Extração Dengue On Line', 'suvisjt.php?pag=extracao-banco-de-dados-dengue-on-line', 'D111111', '2018-09-24 16:17:09', 'D111111', '2018-09-24 16:40:26'),
(54, 19, 'Importação de Bancos de Dados', 'suvisjt.php?pag=importacao-banco-de-dados', 'D111111', '2018-09-24 16:37:49', 'D111111', '2018-09-24 16:39:35'),
(55, 14, 'Sv2-2018', 'suvisjt.php?pag=list-sv2-arquivo&year=2018', 'D788796', '2019-01-22 10:01:09', NULL, NULL),
(56, 13, 'Memo/Ofício-2018', 'suvisjt.php?pag=list-memo-oficio-arquivo&year=2018', 'D788796', '2019-01-22 10:51:36', NULL, NULL),
(57, 23, 'Listar', 'admin.php?pag=list-menu', 'D788796', '2019-01-24 09:05:22', NULL, NULL),
(58, 24, 'Listar', 'admin.php?pag=list-submenu', 'D788796', '2019-01-24 09:05:22', NULL, NULL),
(59, 25, 'Listar', 'admin.php?pag=list-menu-submenu', 'D788796', '2019-01-24 09:05:22', NULL, NULL),
(60, 1, 'Mapa', 'suvisjt.php?pag=mapa-dengue', 'D788796', '2019-01-29 14:24:16', NULL, NULL),
(61, 2, 'Mapa', 'suvisjt.php?pag=mapa-chiku', 'D788796', '2019-01-29 15:55:42', NULL, NULL),
(62, 29, 'Cadastrar', 'suvisjt.php?pag=cad-pe-ie-jt', 'D788796', '2019-04-08 09:36:14', 'D788796', '2019-04-08 09:37:06'),
(63, 29, 'Listar', 'suvisjt.php?pag=list-pe-ie-jt', 'D788796', '2019-04-08 09:36:52', NULL, NULL),
(64, 29, 'Mapa', 'suvisjt.php?pag=mapa-pe-ie', 'D788796', '2019-04-12 10:25:34', NULL, NULL),
(65, 29, 'edit lat long', 'suvisjt.php?pag=edit-pe-ie-jt-edit', 'D788796', '2019-04-12 14:34:44', 'D788796', '2019-04-12 15:10:07'),
(66, 30, 'Aviso Atendimento', 'https://drive.google.com/file/d/1PXIYx7MEEIUR6Z3R4d3CSuv_J9Vi_bri/view?usp=sharing', 'D788796', '2019-05-27 14:44:57', 'D788796', '2019-06-05 09:20:45'),
(67, 30, 'Aviso Responsabilidade', 'https://drive.google.com/file/d/1qLhrOcf3snUn7Jzv_bhSpNS1CR6P9dOa/view?usp=sharing', 'D788796', '2019-05-27 14:46:22', 'D788796', '2019-05-28 11:02:35'),
(68, 30, 'Rel. Supervisão', 'https://drive.google.com/file/d/18QIwDrVuGHqf49wy835PhxlfSnljoZ5d/view?usp=sharing', 'D788796', '2019-05-27 14:47:27', NULL, NULL),
(69, 30, 'Sol. Contr. Abelhas', 'https://drive.google.com/file/d/1mdB8sKDlC_l_mI9qeuK1cK8c2lEQrH1j/view?usp=sharing', 'D788796', '2019-05-27 14:51:03', NULL, NULL),
(70, 15, 'Teste', 'teste', 'D788796', '2019-05-27 14:52:08', 'D788796', '2019-05-27 14:57:57'),
(71, 30, 'Aviso Responsabilidade', 'https://drive.google.com/file/d/1qLhrOcf3snUn7Jzv_bhSpNS1CR6P9dOa/view?usp=sharing', 'D788796', '2019-05-27 14:46:22', 'D788796', '2019-05-28 11:02:35'),
(72, 44, 'Sinan X IAL-Exames', 'suvisjt.php?pag=list-sinan-ial-sarampo', 'D788796', '2019-07-17 16:03:45', 'D788796', '2019-07-18 14:23:32'),
(73, 44, 'IAL-Exames', 'suvisjt.php?pag=list-ial-sarampo', 'D788796', '2019-07-29 12:09:51', NULL, NULL),
(74, 44, 'Mapa-Sarampo', 'suvisjt.php?pag=mapa-sarampo', 'D788796', '2019-08-12 11:44:48', NULL, NULL),
(75, 31, 'Cont. Nº de Amostras', 'https://drive.google.com/open?id=1lBK8OimYgDQVVI__04qPwSJJoeFJqsuq', 'D788796', '2019-08-22 09:14:07', NULL, NULL),
(76, 31, 'Enc. de Amostras', 'https://drive.google.com/open?id=11wz5NQb9oOn4AMJhI6gqmg7mNFh29Gjm', 'D788796', '2019-08-22 09:15:18', NULL, NULL),
(77, 31, 'Etiquetas Amostra', 'https://drive.google.com/open?id=1BzxLUIkk_IhyPHvFexnEsBiu13xim27U', 'D788796', '2019-08-22 09:16:24', NULL, NULL),
(78, 31, 'Ficha Cont. Amostras', 'https://drive.google.com/file/d/10e2I2xVdezMOYID00OuAq7-GK-ukH1UB/view?usp=sharing', 'D788796', '2019-08-22 09:37:01', NULL, NULL),
(79, 31, 'Pedido Id. Larvária', 'https://drive.google.com/open?id=1gZeN-zpVw6KH6TM6hyL9FYOpYw5KYH4f', 'D788796', '2019-08-22 09:38:25', NULL, NULL),
(80, 32, 'Ficha Bloq. Frente', 'https://drive.google.com/open?id=1jjLe0GFptx1lwH_zOgkczLpPLU1Bz1QB', 'D788796', '2019-08-22 11:43:52', 'D788796', '2019-08-22 11:44:18'),
(81, 32, 'Ficha Bloq. Verso', 'https://drive.google.com/open?id=1GVUh7sJ8pOBnAfnZzwqJDn2NZ1MvDBVy', 'D788796', '2019-08-22 11:47:13', NULL, NULL),
(82, 32, 'Relatório de Supervisão', 'https://drive.google.com/open?id=1w4CdxiZTGOk67jmUSUjDtvPVUorH1eKT', 'D788796', '2019-08-22 11:48:28', NULL, NULL),
(83, 33, 'Telas/Tampas-Equipe', 'https://drive.google.com/open?id=1qqhgR1mLYxudlWKo-qlhw_e3AAxpze3T', 'D788796', '2019-08-23 12:29:02', NULL, NULL),
(84, 33, 'Telas/Tampas-UBS', 'https://drive.google.com/open?id=1TzahzTDiB528_oYmx1eMOpUnuVa2W5HH', 'D788796', '2019-08-23 12:31:19', NULL, NULL),
(85, 33, 'Casa Fechada-C.DÁgua', 'https://drive.google.com/open?id=1GhgfMpp-00kYY9e6C734eB1h_qbQeJx-', 'D788796', '2019-08-23 12:34:03', NULL, NULL),
(86, 33, 'Acumulador', 'https://drive.google.com/open?id=1V-AEVQwX6qJOCu3lRF4mSmi1m87GESi0', 'D788796', '2019-08-23 14:23:57', NULL, NULL),
(87, 33, 'Casa Fechada', 'https://drive.google.com/open?id=1xragflor6N7W_3hJ-CHVocnYIofoKJut', 'D788796', '2019-08-23 14:25:12', NULL, NULL),
(88, 33, 'Terreno', 'https://drive.google.com/open?id=1OfDYMIUagLmRpUzeZyKzTAbNhTK_DEED', 'D788796', '2019-08-23 14:26:37', NULL, NULL),
(89, 33, 'Dosagem Cloro', 'https://drive.google.com/open?id=15y4UNXAbYrnMlKyYEsQ24C9sZWDZAENq', 'D788796', '2019-08-23 14:27:58', NULL, NULL),
(90, 33, 'Lei Piscina', 'https://drive.google.com/open?id=1-eAMg6INDUHdS-dryLXdpxsY3GJRfM_q', 'D788796', '2019-08-23 14:29:27', NULL, NULL),
(91, 33, 'Entrega Tela', 'https://drive.google.com/open?id=1Jygx1Js-eIT-nzMhdJZD4_0nEN949dHu', 'D788796', '2019-08-23 14:30:12', NULL, NULL),
(92, 33, 'Termo Tela', 'https://drive.google.com/open?id=1P2TafP6O2W5wABjuermgkgV1-3o2QawE', 'D788796', '2019-08-23 14:32:23', NULL, NULL),
(93, 38, 'Autorização Comp.', 'https://drive.google.com/open?id=1LrdDDAJBo5F6uGLaySWNfuUUy1vThWgp', 'D788796', '2019-08-23 15:10:04', NULL, NULL),
(94, 38, 'Autorização Folga', 'https://drive.google.com/open?id=1XU4QffgV1SCbyUJwaXe4R66C1_nF1OlR', 'D788796', '2019-08-23 15:10:33', NULL, NULL),
(95, 44, 'Relatórios', 'suvisjt.php?pag=list-rel-epid-sarampo-ial&tabela=tblsarampo&sinan=exantnet&ial=sarampo_ial&buttons=sarampo&agravo=SARAMPO', 'D788796', '2019-09-26 15:21:26', 'D788796', '2019-09-26 15:26:06'),
(96, 1, 'Fechamento', 'suvisjt.php?pag=rel-fecha-dengue', 'D788796', '2019-11-05 12:42:00', NULL, NULL),
(97, 46, 'SisdamWeb-2019', 'http://10.47.171.110/sisdamweb-2019', 'D788796', '2019-12-30 12:01:38', 'D788796', '2021-01-05 09:47:08'),
(98, 28, 'SisdamWeb-2018', 'http://10.47.171.110/sisdamweb-2018', 'D788796', '2019-12-30 12:22:27', 'D788796', '2021-01-05 09:47:26'),
(99, 13, 'Memo/Ofício-2019', 'suvisjt.php?pag=list-memo-oficio-arquivo&year=2019', 'D788796', '2020-01-23 11:19:00', NULL, NULL),
(100, 14, 'Sv2-2019', 'suvisjt.php?pag=list-sv2-arquivo&year=2019', 'D788796', '2019-01-22 10:01:09', NULL, NULL),
(101, 48, 'Listar', 'suvisjt.php?pag=list-anti-rabica', 'D788796', '2020-03-23 15:47:22', 'D788796', '2021-01-28 13:47:27'),
(102, 14, 'Sv2-2020', 'suvisjt.php?pag=list-sv2-arquivo&year=2020', 'D788796', '2021-01-05 09:37:03', NULL, NULL),
(103, 13, 'Memo/Ofício-2020', 'suvisjt.php?pag=list-memo-oficio-arquivo&year=2020', 'D788796', '2021-01-05 09:38:19', NULL, NULL),
(104, 13, 'Memo/Oficio-2021', 'suvisjt.php?pag=list-memo-oficio-arquivo&year=2021', 'D788796', '2022-01-04 10:16:41', NULL, NULL),
(105, 14, 'Sv2-2021', 'suvisjt.php?pag=list-sv2-arquivo&year=2021', 'D788796', '2022-01-04 10:22:08', NULL, NULL),
(106, 49, 'Cadastrar', 'suvisjt.php?pag=cadastro-esporotricose-animal', 'D788796', '2022-06-08 14:24:06', NULL, NULL),
(107, 49, 'Listar', 'suvisjt.php?pag=list-esporo-animal', 'D788796', '2022-06-08 14:24:06', NULL, NULL),
(108, 49, 'Exames-CCZ-Esporo-Animal', 'suvisjt.php?pag=list-lab-esporo', 'D788796', '2022-07-21 11:38:59', NULL, NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `menu_sub_sub`
--
ALTER TABLE `menu_sub_sub`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `menu_sub_sub`
--
ALTER TABLE `menu_sub_sub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
