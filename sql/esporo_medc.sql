-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 10.47.171.110:3306
-- Tempo de geração: 19-Set-2022 às 21:23
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
-- Estrutura da tabela `esporo_medc`
--

CREATE TABLE `esporo_medc` (
  `id_med_esp` int(11) NOT NULL,
  `nm_mdc_esp_an` text NOT NULL,
  `criado` text NOT NULL,
  `data_criado` timestamp NOT NULL DEFAULT current_timestamp(),
  `alterado` text NOT NULL,
  `data_alterado` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `esporo_medc`
--

INSERT INTO `esporo_medc` (`id_med_esp`, `nm_mdc_esp_an`, `criado`, `data_criado`, `alterado`, `data_alterado`) VALUES
(1, 'ITRACONAZOL', 'D788796', '2022-08-02 17:18:42', '', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `esporo_medc`
--
ALTER TABLE `esporo_medc`
  ADD PRIMARY KEY (`id_med_esp`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `esporo_medc`
--
ALTER TABLE `esporo_medc`
  MODIFY `id_med_esp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
