-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29-Set-2020 às 05:45
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.6

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
-- Estrutura da tabela `esus_aline`
--

CREATE TABLE `esus_aline` (
  `NOME` varchar(100) DEFAULT NULL,
  `PROT_ESUS` varchar(14) DEFAULT NULL,
  `DT_NOTIFIC` varchar(10) DEFAULT NULL,
  `CAD_EXAME` varchar(10) DEFAULT NULL,
  `PROF_SAUDE` varchar(7) DEFAULT NULL,
  `UBS_ABRANG` varchar(33) DEFAULT NULL,
  `LOCAL_ATEND` varchar(27) DEFAULT NULL,
  `TIP_TEST` varchar(53) DEFAULT NULL,
  `DT_PCR_RAP` varchar(10) DEFAULT NULL,
  `RES_PCR_RAP_ESUS` varchar(8) DEFAULT NULL,
  `DT_SORO_ESUS` varchar(10) DEFAULT NULL,
  `RES_IGM_ESUS` varchar(30) DEFAULT NULL,
  `RES_IGG_ESUS` varchar(30) DEFAULT NULL,
  `RES_IGA_ESUS` varchar(30) DEFAULT NULL,
  `RES_TOT_ESUS` varchar(10) DEFAULT NULL,
  `DT_COL_UVIS` varchar(10) DEFAULT NULL,
  `RES_UVIS` varchar(30) DEFAULT NULL,
  `CLASS_FIN` varchar(50) DEFAULT NULL,
  `EVOLUCAO` varchar(50) DEFAULT NULL,
  `INFO` varchar(28) DEFAULT NULL,
  `CONT_EF_1_S_2_N` varchar(10) DEFAULT NULL,
  `1_CURA_2_INT_3_TENT_ESG_4_OBT` varchar(1) DEFAULT NULL,
  `DT_ALT_OBT` varchar(10) DEFAULT NULL,
  `MT_NAO_LOC` varchar(10) DEFAULT NULL,
  `DT_SINT` varchar(10) DEFAULT NULL,
  `SE_DT_SINT` varchar(4) DEFAULT NULL,
  `RACA_COR` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
