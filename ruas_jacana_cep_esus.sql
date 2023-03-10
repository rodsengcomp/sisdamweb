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
-- Estrutura da tabela `ruas_jacana_cep_esus`
--

CREATE TABLE `ruas_jacana_cep_esus` (
  `id` int(11) NOT NULL,
  `da` int(2) DEFAULT NULL,
  `setor` varchar(4) DEFAULT NULL,
  `log` varchar(30) DEFAULT NULL,
  `atual` varchar(3) NOT NULL DEFAULT 'NAO',
  `rua` varchar(200) DEFAULT NULL,
  `bairro` varchar(100) DEFAULT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `pgguia` varchar(8) DEFAULT NULL,
  `ubs` varchar(50) DEFAULT NULL,
  `ruagoogle` varchar(300) DEFAULT NULL,
  `latitude` varchar(20) DEFAULT NULL,
  `longitude` varchar(20) DEFAULT NULL,
  `usuariocad` varchar(7) DEFAULT NULL,
  `criado` varchar(16) DEFAULT NULL,
  `alterado` varchar(16) DEFAULT NULL,
  `usuarioalt` varchar(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `ruas_jacana_cep_esus`
--
ALTER TABLE `ruas_jacana_cep_esus`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `ruas_jacana_cep_esus`
--
ALTER TABLE `ruas_jacana_cep_esus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
