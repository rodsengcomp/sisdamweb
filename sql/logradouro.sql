-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 28-Ago-2017 às 12:22
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
-- Estrutura da tabela `logradouro`
--

CREATE TABLE `logradouro` (
  `id` int(11) NOT NULL,
  `abreviatura` varchar(8) DEFAULT NULL,
  `log` varchar(20) DEFAULT NULL,
  `criado` datetime DEFAULT NULL,
  `usuariocad` varchar(20) DEFAULT NULL,
  `alterado` datetime DEFAULT NULL,
  `usuarioalt` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `logradouro`
--

INSERT INTO `logradouro` (`id`, `abreviatura`, `log`, `criado`, `usuariocad`, `alterado`, `usuarioalt`) VALUES
(1, 'ACAMP', 'ACAMPAMENTO', NULL, '', NULL, NULL),
(2, 'AC', 'ACESSO', NULL, '', NULL, NULL),
(3, 'AD', 'ADRO', NULL, '', NULL, NULL),
(4, 'ERA', 'AEROPORTO', NULL, '', NULL, NULL),
(5, 'AL', 'ALAMEDA', NULL, '', NULL, NULL),
(6, 'AT', 'ALTO', NULL, '', NULL, NULL),
(7, 'A', 'AREA', NULL, '', NULL, NULL),
(8, 'AE', 'AREA ESPECIAL', NULL, '', NULL, NULL),
(9, 'ART', 'ARTERIA', NULL, '', NULL, NULL),
(10, 'ATL', 'ATALHO', NULL, '', NULL, NULL),
(11, 'AV', 'AVENIDA', NULL, '', NULL, NULL),
(12, 'AV-CONT', 'AVENIDA CONTORNO', NULL, '', NULL, NULL),
(13, 'BX', 'BAIXA', NULL, '', NULL, NULL),
(14, 'BLO', 'BALAO', NULL, '', NULL, NULL),
(15, 'BAL', 'BALNEARIO', NULL, '', NULL, NULL),
(16, 'BC', 'BECO', NULL, '', NULL, NULL),
(17, 'BELV', 'BELVEDERE', NULL, '', NULL, NULL),
(18, 'BL', 'BLOCO', NULL, '', NULL, NULL),
(19, 'BSQ', 'BOSQUE', NULL, '', NULL, NULL),
(20, 'BVD', 'BOULEVARD', NULL, '', NULL, NULL),
(21, 'BCO', 'BURACO', NULL, '', NULL, NULL),
(22, 'C', 'CAIS', NULL, '', NULL, NULL),
(23, 'CALC', 'CALCADA', NULL, '', NULL, NULL),
(24, 'CAM', 'CAMINHO', NULL, '', NULL, NULL),
(25, 'CPO', 'CAMPO', NULL, '', NULL, NULL),
(26, 'CAN', 'CANAL', NULL, '', NULL, NULL),
(27, 'CHAP', 'CHACARA', NULL, '', NULL, NULL),
(28, 'CHAP', 'CHAPADAO', NULL, '', NULL, NULL),
(29, 'CIRC', 'CIRCULAR', NULL, '', NULL, NULL),
(30, 'COL', 'COLONIA', NULL, '', NULL, NULL),
(31, 'CMP-VR', 'COMPLEXO VIARIO', NULL, '', NULL, NULL),
(32, 'COND', 'CONDOMINIO', NULL, '', NULL, NULL),
(33, 'CJ', 'CONJUNTO', NULL, '', NULL, NULL),
(34, 'COR', 'CORREDOR', NULL, '', NULL, NULL),
(35, 'CRG', 'CORREGO', NULL, '', NULL, NULL),
(36, 'DSC', 'DESCIDA', NULL, '', NULL, NULL),
(37, 'DSV', 'DESVIO', NULL, '', NULL, NULL),
(38, 'DT', 'DISTRITO', NULL, '', NULL, NULL),
(39, 'EVD', 'ELEVADA', NULL, '', NULL, NULL),
(40, 'ENT-PART', 'ENTRADA PARTICULAR', NULL, '', NULL, NULL),
(41, 'EQ', 'ENTRE QUADRA', NULL, '', NULL, NULL),
(42, 'ESC', 'ESCADA', NULL, '', NULL, NULL),
(43, 'ETC', 'ESTACAO', NULL, '', NULL, NULL),
(44, 'ESTC', 'ESTACIONAMENTO', NULL, '', NULL, NULL),
(45, 'ETD', 'ESTADIO', NULL, '', NULL, NULL),
(46, 'ETN', 'ESTANCIA', NULL, '', NULL, NULL),
(47, 'EST', 'ESTRADA', NULL, '', NULL, NULL),
(48, 'EST-MUN', 'ESTRADA MUNICIPAL', NULL, '', NULL, NULL),
(49, 'FAV', 'FAVELA', NULL, '', NULL, NULL),
(50, 'FAZ', 'FAZENDA', NULL, '', NULL, NULL),
(51, 'FRA', 'FEIRA', NULL, '', NULL, NULL),
(52, 'FER', 'FERROVIA', NULL, '', NULL, NULL),
(53, 'FNT', 'FONTE', NULL, '', NULL, NULL),
(54, 'FTE', 'FORTE', NULL, '', NULL, NULL),
(55, 'GAL', 'GALERIA', NULL, '', NULL, NULL),
(56, 'GJA', 'GRANJA', NULL, '', NULL, NULL),
(57, 'HAB', 'HABITACIONAL', NULL, '', NULL, NULL),
(58, 'IA', 'ILHA', NULL, '', NULL, NULL),
(59, 'JD', 'JARDIM', NULL, '', NULL, NULL),
(60, 'JDE', 'JARDINETE', NULL, '', NULL, NULL),
(61, 'LD', 'LADEIRA', NULL, '', NULL, NULL),
(62, 'LG', 'LAGO', NULL, '', NULL, NULL),
(63, 'LGA', 'LAGOA', NULL, '', NULL, NULL),
(64, 'LRG', 'LARGO', NULL, '', NULL, NULL),
(65, 'LOT', 'LOTEAMENTO', NULL, '', NULL, NULL),
(66, 'MNA', 'MARINA', NULL, '', NULL, NULL),
(67, 'MOD', 'MODULO', NULL, '', NULL, NULL),
(68, 'TEM', 'MONTE', NULL, '', NULL, NULL),
(69, 'MRO', 'MORRO', NULL, '', NULL, NULL),
(70, 'NUC', 'NUCLEO', NULL, '', NULL, NULL),
(71, 'PDA', 'PARADA', NULL, '', NULL, NULL),
(72, 'PDO', 'PARADOURO', NULL, '', NULL, NULL),
(73, 'PAR', 'PARALELA', NULL, '', NULL, NULL),
(74, 'PRQ', 'PARQUE', NULL, '', NULL, NULL),
(75, 'PSG', 'PASSAGEM', NULL, '', NULL, NULL),
(76, 'PSC-SUB', 'PASSAGEM SUBTERRANEA', NULL, '', NULL, NULL),
(77, 'PSA', 'PASSARELA', NULL, '', NULL, NULL),
(78, 'PAS', 'PASSEIO', NULL, '', NULL, NULL),
(79, 'PAT', 'PATIO', NULL, '', NULL, NULL),
(80, 'PNT', 'PONTA', NULL, '', NULL, NULL),
(81, 'PTE', 'PONTE', NULL, '', NULL, NULL),
(82, 'PTO', 'PORTO', NULL, '', NULL, NULL),
(83, 'PC', 'PRACA', NULL, '', NULL, NULL),
(84, 'PC-ESP', 'PRACA DE ESPORTES', NULL, '', NULL, NULL),
(85, 'PR', 'PRAIA', NULL, '', NULL, NULL),
(86, 'PRL', 'PROLONGAMENTO', NULL, '', NULL, NULL),
(87, 'Q', 'QUADRA', NULL, '', NULL, NULL),
(88, 'QTA', 'QUINTA', NULL, '', NULL, NULL),
(89, 'QTAS', 'QUINTA', NULL, '', NULL, NULL),
(90, 'RMP', 'RAMPA', NULL, '', NULL, NULL),
(91, 'REC', 'RECANTO', NULL, '', NULL, NULL),
(92, 'RES', 'RESIDENCIAL', NULL, '', NULL, NULL),
(93, 'RET', 'RETA', NULL, '', NULL, NULL),
(94, 'RER', 'RETIRO', NULL, '', NULL, NULL),
(95, 'RTN', 'RETORNO', NULL, '', NULL, NULL),
(96, 'ROD-AN', 'RODOANEL', NULL, '', NULL, NULL),
(97, 'ROD', 'RODOVIA', NULL, '', NULL, NULL),
(98, 'RTT', 'ROTATORIA', NULL, '', NULL, NULL),
(99, 'ROT', 'ROTULA', NULL, '', NULL, NULL),
(100, 'R', 'RUA', NULL, '', NULL, NULL),
(101, 'R-LIG', 'RUA DE LIGACAO', NULL, '', NULL, NULL),
(102, 'R-PED', 'RUA DE PEDESTRE', NULL, '', NULL, NULL),
(103, 'SRV', 'SERVIDAO', NULL, '', NULL, NULL),
(104, 'ST', 'SETOR', NULL, '', NULL, NULL),
(105, 'SIT', 'SITIO', NULL, '', NULL, NULL),
(106, 'SUB', 'SUBIDA', NULL, '', NULL, NULL),
(107, 'TER', 'TERMINAL', NULL, '', NULL, NULL),
(108, 'TV', 'TRAVESSA', NULL, '', NULL, NULL),
(109, 'TV-PART', 'TRAVESSA PARTICULAR', NULL, '', NULL, NULL),
(110, 'TRV', 'TRECHO', NULL, '', NULL, NULL),
(111, 'TRV', 'TREVO', NULL, '', NULL, NULL),
(112, 'TCH', 'TRINCHEIRA', NULL, '', NULL, NULL),
(113, 'TUN', 'TUNEL', NULL, '', NULL, NULL),
(114, 'UNID', 'UNIDADE', NULL, '', NULL, NULL),
(115, 'VAL', 'VALA', NULL, '', NULL, NULL),
(116, 'VLE', 'VALE', NULL, '', NULL, NULL),
(117, 'VRTE', 'VARIANTE', NULL, '', NULL, NULL),
(118, 'VER', 'VEREDA', NULL, '', NULL, NULL),
(119, 'V', 'VIA', NULL, '', NULL, NULL),
(120, 'V-AC', 'VIA DE ACESSO', NULL, '', NULL, NULL),
(121, 'V-PED', 'VIA DE PEDESTRE', NULL, '', NULL, NULL),
(122, 'V-EVD', ' VIA ELEVADO', NULL, '', NULL, NULL),
(123, 'V-EXP', 'VIA EXPRESSA', NULL, '', NULL, NULL),
(124, 'VD', 'VIADUTO', NULL, '', NULL, NULL),
(125, 'VLA', 'VIELA', NULL, '', NULL, NULL),
(126, 'VL', 'VILA', NULL, '', NULL, NULL),
(127, 'ZIG-ZAG', 'ZIGUE-ZAGUE', NULL, '', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `logradouro`
--
ALTER TABLE `logradouro`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `logradouro`
--
ALTER TABLE `logradouro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
