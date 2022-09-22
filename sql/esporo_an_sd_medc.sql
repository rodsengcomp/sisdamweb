-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 10.47.171.110:3306
-- Tempo de geração: 19-Ago-2022 às 20:53
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
-- Estrutura da tabela `esporo_an_sd_medc`
--

CREATE TABLE `esporo_an_sd_medc` (
  `id_sd` int(11) NOT NULL,
  `id_an_esp` int(11) NOT NULL,
  `data_medc` date NOT NULL,
  `id_medc` int(11) NOT NULL,
  `dsg_medc` int(11) NOT NULL DEFAULT 100,
  `qtd_medc` int(11) NOT NULL,
  `nm_ent_medc` text NOT NULL,
  `nm_rec_medc` text NOT NULL,
  `lixeira` int(11) NOT NULL DEFAULT 0,
  `criado` text NOT NULL,
  `data_criado` datetime NOT NULL DEFAULT current_timestamp(),
  `alterado` text NOT NULL,
  `data_alterado` text NOT NULL,
  `excluido` text NOT NULL,
  `data_excluido` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `esporo_an_sd_medc`
--

INSERT INTO `esporo_an_sd_medc` (`id_sd`, `id_an_esp`, `data_medc`, `id_medc`, `dsg_medc`, `qtd_medc`, `nm_ent_medc`, `nm_rec_medc`, `lixeira`, `criado`, `data_criado`, `alterado`, `data_alterado`, `excluido`, `data_excluido`) VALUES
(1, 1, '0000-00-00', 1, 100, 0, '', '', 0, 'D788796', '2022-08-10 11:20:54', 'D788796', '2022-08-18 09:23:56', '', ''),
(2, 1, '0000-00-00', 1, 100, 0, '', '', 0, 'D788796', '2022-08-10 11:24:39', 'D788796', '2022-08-18 09:23:56', '', ''),
(3, 1, '0000-00-00', 1, 100, 0, '', '', 0, 'D788796', '2022-08-10 11:25:54', 'D788796', '2022-08-18 09:23:56', '', ''),
(4, 88, '2022-01-14', 1, 100, 30, 'DVZ', 'RODOLFO', 0, 'D788796', '2022-08-10 11:27:01', '', '', '', ''),
(5, 88, '2022-02-14', 1, 100, 30, 'UVIS', 'RODOLFO', 0, 'D788796', '2022-08-10 11:27:19', '', '', '', ''),
(6, 60, '2022-01-19', 1, 100, 30, 'DVZ', 'RODOLFO', 0, 'D788796', '2022-08-10 11:27:48', '', '', '', ''),
(7, 125, '2022-01-21', 1, 100, 30, 'DVZ', 'RODOLFO', 0, 'D788796', '2022-08-10 11:28:10', 'D788796', '2022-08-19 10:10:11', 'D788796', '2022-08-19 11:22:28'),
(8, 137, '2022-01-21', 1, 100, 30, 'DVZ', 'RODOLFO', 0, 'D788796', '2022-08-10 11:28:26', '', '', '', ''),
(9, 137, '2022-05-19', 1, 100, 29, 'UVIS29', 'MALA29', 0, 'MALAca29', '2022-08-11 11:23:33', '', '', '', ''),
(10, 327, '2022-08-12', 1, 100, 26, 'DVZ', 'RODS', 0, 'D788796', '2022-08-12 07:39:58', '', '', '', ''),
(11, 328, '2022-08-12', 1, 100, 56, 'DVZ', 'SAE', 0, 'D788796', '2022-08-12 07:49:07', '', '', '', ''),
(12, 328, '2022-08-12', 1, 100, 58, 'UVIS', 'ASE', 0, 'D788796', '2022-08-12 07:49:07', '', '', '', ''),
(13, 329, '2022-08-12', 1, 100, 32, 'DVZ', 'ERI', 0, 'D788796', '2022-08-12 08:10:42', '', '', '', ''),
(14, 329, '2022-08-12', 1, 100, 25, 'UVIS', 'DOG', 0, 'D788796', '2022-08-12 08:10:42', '', '', '', ''),
(15, 1, '0000-00-00', 1, 100, 0, '', '', 0, 'D788796', '2022-08-18 09:28:42', '', '', '', ''),
(16, 1, '2022-08-08', 1, 100, 24, 'UVIS', 'WALLACE', 0, 'D788796', '2022-08-18 09:31:36', '', '', '', ''),
(17, 1, '1970-01-01', 0, 0, 0, '', '', 0, 'D788796', '2022-08-18 09:48:07', '', '', '', ''),
(18, 1, '1970-01-01', 0, 0, 0, '', '', 0, 'D788796', '2022-08-18 09:49:28', '', '', '', ''),
(19, 1, '2022-08-08', 1, 50, 54, 'UVIS', 'WALLACE', 0, 'D788796', '2022-08-18 09:56:28', '', '', '', ''),
(20, 183, '2022-08-08', 1, 95, 20, 'UVIS', 'RODOLFO MACHAO', 0, 'D788796', '2022-08-18 11:24:07', 'D788796', '2022-08-18 13:56:26', 'D788796', '2022-08-19 15:10:06'),
(21, 183, '2022-08-08', 1, 50, 22, 'UVIS', 'DAVID', 0, 'D788796', '2022-08-18 11:30:08', 'D788796', '2022-08-19 14:55:07', 'D788796', '2022-08-19 14:44:55'),
(22, 183, '2022-08-08', 1, 86, 53, 'DVZ', 'MARCELO', 0, 'D788796', '2022-08-18 11:30:52', '', '', 'D788796', '2022-08-19 14:45:04'),
(23, 183, '2022-08-08', 1, 50, 65, 'UVIS', 'CRIS', 0, 'D788796', '2022-08-18 13:56:53', '', '', 'D788796', '2022-08-19 14:45:12'),
(24, 125, '2022-08-08', 1, 100, 31, 'DVZ', 'RODOLFO', 1, 'D788796', '2022-08-19 09:53:19', 'D788796', '2022-08-19 10:28:10', 'D788796', '2022-08-19 11:22:20'),
(25, 125, '2022-08-08', 1, 95, 23, 'UVIS', 'WALLACE', 0, 'D788796', '2022-08-19 09:55:23', 'D788796', '2022-08-19 10:11:14', 'D788796', '2022-08-19 11:21:58');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `esporo_an_sd_medc`
--
ALTER TABLE `esporo_an_sd_medc`
  ADD PRIMARY KEY (`id_sd`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `esporo_an_sd_medc`
--
ALTER TABLE `esporo_an_sd_medc`
  MODIFY `id_sd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
