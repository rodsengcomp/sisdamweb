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
-- Estrutura da tabela `ocorrenciasurto`
--

CREATE TABLE `ocorrenciasurto` (
  `id` int(11) NOT NULL,
  `localsurto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `ocorrenciasurto`
--

INSERT INTO `ocorrenciasurto` (`id`, `localsurto`) VALUES
(1, 'RESIDENCIA'),
(2, 'ASILO'),
(3, 'HOSPITAL/UBS'),
(4, 'CASOS DISPERSOS EM MAIS DE UM MUNICIPIO'),
(5, 'OUTRAS INSTITUICOES(ALOJAMENTO/TRABALHO)'),
(6, 'CASOS DISPERSOS NO BAIRRO'),
(7, 'OUTROS'),
(8, 'RESTAURANTE/PADARIA'),
(9, 'CASOS DISPERSOS PELO MUNICIPIO'),
(10, 'CRECHE/ESCOLA'),
(11, 'EVENTOS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ocorrenciasurto`
--
ALTER TABLE `ocorrenciasurto`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ocorrenciasurto`
--
ALTER TABLE `ocorrenciasurto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
