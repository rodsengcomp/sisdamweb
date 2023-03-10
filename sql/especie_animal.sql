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
-- Estrutura da tabela `especie_animal`
--

CREATE TABLE `especie_animal` (
  `id_especie` int(11) NOT NULL,
  `especie` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `especie_animal`
--

INSERT INTO `especie_animal` (`id_especie`, `especie`) VALUES
(1, ''),
(2, 'CAO'),
(3, 'GATO');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `especie_animal`
--
ALTER TABLE `especie_animal`
  ADD PRIMARY KEY (`id_especie`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `especie_animal`
--
ALTER TABLE `especie_animal`
  MODIFY `id_especie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
