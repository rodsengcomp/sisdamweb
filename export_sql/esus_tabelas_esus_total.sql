-- Comandos sql para apagar tabelas do banco de dados --
-- Autor: Rodolfo Romaioli Ribeiro de Jesus - rodolfo.romaioli@gmail.com
-- Criado: 15/05/2018 11:30
-- Alterado em 01/04/2019 às 10:26

-- drop table esus_total;
-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24-Set-2020 às 17:15
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
-- Estrutura da tabela `esus_total`
--

CREATE TABLE `esus_total` (`Número da Notificação` bigint(13) DEFAULT NULL,`Estado da Notificação` varchar(14) DEFAULT NULL,
`Município da Notificação` varchar(21) DEFAULT NULL,`É profissional de saúde?` varchar(3) DEFAULT NULL,`Telefone de Contato` varchar(15) DEFAULT NULL,
`Etnia` varchar(10) DEFAULT NULL,`Logradouro` varchar(46) DEFAULT NULL,`Evolução Caso` varchar(10) DEFAULT NULL,`Tipo de Teste` varchar(53) DEFAULT NULL,
`Estado de Residência` varchar(9) DEFAULT NULL,`Número (ou SN para Sem Número)` varchar(11) DEFAULT NULL,`Resultado Totais` varchar(10) DEFAULT NULL,
`Data da Notificação` varchar(10) DEFAULT NULL,`Resultado IgA` varchar(10) DEFAULT NULL,`CBO` varchar(53) DEFAULT NULL,
`Sintoma- Dor de Garganta` varchar(3) DEFAULT NULL,`Sintoma- Dispneia` varchar(3) DEFAULT NULL,`Sintoma- Febre` varchar(3) DEFAULT NULL,
`Sintoma- Tosse` varchar(3) DEFAULT NULL,`Sintoma- Outros` varchar(3) DEFAULT NULL,`Sintoma- Dor de Cabeça` varchar(3) DEFAULT NULL,
`Sintoma- Distúrbios Gustativos` varchar(3) DEFAULT NULL,`Sintoma- Distúrbios Olfativos` varchar(3) DEFAULT NULL,`Sintoma- Coriza` varchar(3) DEFAULT NULL,
`Sintoma- Assintomático` varchar(3) DEFAULT NULL,`CEP` varchar(10) DEFAULT NULL,`Profissional de Segurança` varchar(3) DEFAULT NULL,
`Resultado (PCR/Rápidos)` varchar(8) DEFAULT NULL,`Raça/Cor` varchar(50) DEFAULT NULL,`Teste Sorológico` varchar(10) DEFAULT NULL,
`Sexo` varchar(10) DEFAULT NULL,`Estrangeiro` varchar(3) DEFAULT NULL,`Tem CPF?` varchar(3) DEFAULT NULL,`Resultado IgM` varchar(10) DEFAULT NULL,
`Estado do Teste` varchar(20) DEFAULT NULL,`Data do Teste (Sorologico)` varchar(10) DEFAULT NULL,`Resultado IgG` varchar(10) DEFAULT NULL,
`CNS` varchar(34) DEFAULT NULL,`Condições- Doenças resp` varchar(3) DEFAULT NULL,`Condições- Doenças car` varchar(3) DEFAULT NULL,
`Condições- Diabetes` varchar(3) DEFAULT NULL,`Condições- Doenças renais crôn` varchar(3) DEFAULT NULL,`Condições- Imunossupressão` varchar(3) DEFAULT NULL,
`Condições- Gestante` varchar(3) DEFAULT NULL,`Condições- Portador de doe=` varchar(3) DEFAULT NULL,`Condições- Puérpera (até 45 dias do parto)` varchar(3) DEFAULT NULL,
`Condições- Obesidade` varchar(3) DEFAULT NULL,`Bairro` varchar(42) DEFAULT NULL,`Data do Teste (PCR/Rápidos)` varchar(10) DEFAULT NULL,
`Descrição do Sintoma` varchar(98) DEFAULT NULL,`Data de encerramento` varchar(10) DEFAULT NULL,`Data de Nascimento` varchar(10) DEFAULT NULL,
`Classificação Final` varchar(23) DEFAULT NULL,`Município de Residência` varchar(9) DEFAULT NULL,`Complemento` varchar(46) DEFAULT NULL,
`Passaporte` varchar(10) DEFAULT NULL,`CPF` varchar(14) DEFAULT NULL,`Nome Completo` varchar(41) DEFAULT NULL,`Pais de origem` varchar(10) DEFAULT NULL,
`Data do início dos sintomas` varchar(10) DEFAULT NULL,`Nome Completo da Mãe` varchar(39) DEFAULT NULL,`Telefone Celular` varchar(15) DEFAULT NULL,
`Notificante CNES` varchar(11) DEFAULT NULL,`Notificante CPF` varchar(14) DEFAULT NULL,`Notificante Email` varchar(52) DEFAULT NULL,
`Notificante Nome Completo` varchar(41) DEFAULT NULL,`Notificante CNPJ` varchar(18) DEFAULT NULL
2) ENGINE=InnoDB DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
