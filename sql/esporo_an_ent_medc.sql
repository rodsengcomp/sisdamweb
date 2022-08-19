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
-- Estrutura da tabela `esporo_an_ent_medc`
--

CREATE TABLE `esporo_an_ent_medc` (
  `id_esp_ent` int(11) NOT NULL,
  `nm_esp_medc` int(11) NOT NULL,
  `dsg_esp_medc` int(11) NOT NULL,
  `qdt_esp_medc` int(11) NOT NULL,
  `criado` text NOT NULL,
  `dt_criado` timestamp NOT NULL DEFAULT current_timestamp(),
  `alterado` text NOT NULL,
  `dt_alterado` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `esporo_an_ent_medc`
--

INSERT INTO `esporo_an_ent_medc` (`id_esp_ent`, `nm_esp_medc`, `dsg_esp_medc`, `qdt_esp_medc`, `criado`, `dt_criado`, `alterado`, `dt_alterado`) VALUES
(1, 1, 100, 250, 'D788796', '2022-08-11 17:28:29', '', ''),
(2, 1, 100, 50, 'D788796', '2022-08-11 17:28:29', '', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `esporo_an_ent_medc`
--
ALTER TABLE `esporo_an_ent_medc`
  ADD PRIMARY KEY (`id_esp_ent`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `esporo_an_ent_medc`
--
ALTER TABLE `esporo_an_ent_medc`
  MODIFY `id_esp_ent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
