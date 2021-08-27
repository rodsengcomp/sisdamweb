-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 28-Ago-2017 às 12:26
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
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `login` varchar(7) DEFAULT NULL,
  `nome` varchar(36) DEFAULT NULL,
  `email` varchar(57) DEFAULT NULL,
  `senha` varchar(40) DEFAULT NULL,
  `nivel_acesso_id` int(1) DEFAULT NULL,
  `status` varchar(7) DEFAULT NULL,
  `usuariocad` varchar(5) DEFAULT NULL,
  `criado` datetime DEFAULT NULL,
  `usuarioalt` varchar(7) DEFAULT NULL,
  `alterado` datetime DEFAULT NULL,
  `loginenvioemailsenha` varchar(10) DEFAULT NULL,
  `chavesetsenha` varchar(200) DEFAULT NULL,
  `datapedidochavesetsenha` datetime DEFAULT NULL,
  `datafeitonovasenha` datetime DEFAULT NULL,
  `dataenvioemailsenha` datetime DEFAULT NULL,
  `emailenviadosenha` varchar(3) NOT NULL DEFAULT 'NAO',
  `telefone` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `login`, `nome`, `email`, `senha`, `nivel_acesso_id`, `status`, `usuariocad`, `criado`, `usuarioalt`, `alterado`, `loginenvioemailsenha`, `chavesetsenha`, `datapedidochavesetsenha`, `datafeitonovasenha`, `dataenvioemailsenha`, `emailenviadosenha`, `telefone`) VALUES
(1, 'admin', 'ADMINISTRADOR DO SISTEMA', 'sisdamjt@gmail.com', '60899872b62e559d4c195e7c99c26d7366379665', 1, 'ATIVO', '', '0000-00-00 00:00:00', 'admin', '2017-07-21 12:44:22', 'admin', 'http://10.47.171.110/sisdamjt1/alterar-a-senha.php?chave=875b84018275c57a307821ba18b8110bd4cf9f7d', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', '(11)9910913653'),
(2, 'D800218', 'ALINE DANIELA SANT ANNA', 'adsantanna@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(3, 'D799178', 'AMANDA LANDULFO LIMA', 'aaa@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', 'admin', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(4, 'D720208', 'ANA LUCIA SILVA DE OLIVEIRA', 'alsoliveira@prefeitura.sp.gov.br', '31d410422581ae27540256015c1f9333ff03ea8f', 3, 'ATIVO', '', '0000-00-00 00:00:00', 'D720208', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(5, 'D806622', 'ANA PAULA PEREIRA TEIXEIRA', 'appteixeira@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(6, 'D798490', 'ANDERSON MALLOZZIA', 'andersonmallozzi@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', 'admin', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(7, 'D757597', 'ANTONIO LUIZ DA SILVA', 'Antonio Luiz da Silva@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(8, 'D757496', 'CAIO ALEXANDRE IERICH', 'Caio Alexandre Ierich@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(9, 'D735585', 'CARLOS FERNANDES BALIEIRO', 'Carlos Fernandes Balieiro@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(10, 'D637841', 'CARMECY LOPES DE ALMEIDA', 'camecylopes@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(11, 'D806226', 'CAROLINE COTRIM AIRES', 'carolinecotrim@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(12, 'D820255', 'CAROLINE RAMOS FERREIRA LEITE', 'crleite@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(13, 'D701418', 'CLEIDE APARECIDA SILVA DE MOURA DIAS', 'cadias@prefeitura.sp.gov.br', '664043db859e336fc069cfb7e4f7272fff7b478e', 1, 'ATIVO', '', '0000-00-00 00:00:00', 'admin', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(14, 'D758016', 'CLOVIS EDUARDO DA SILVA PACHECO', 'Clovis Eduardo da Silva Pacheco@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(15, 'D708158', 'CRISTINA DE OLIVEIRA', 'Cristina de Oliveira@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(16, 'D758074', 'DANIEL CARLOS NASCIMENTO', 'Daniel Carlos Nascimento@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(17, 'D714691', 'DANIEL ROCHA MESSIAS', 'Daniel Rocha Messias@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(18, 'D779559', 'DANIELA SILVA DE SALES', 'danielasales@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(19, 'D788764', 'DANILO CHINAGLIA', 'Danilo Chinaglia@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(20, 'D790072', 'DAVID RICARDO DE JESUS SPAGOLLA', 'dspagolla@prefeitura.sp.gov.br', 'db764a9fcb4b38b4423f96569045b1e1b6f8b776', 1, 'INATIVO', '', '0000-00-00 00:00:00', 'admin', '2017-08-21 17:41:33', '', 'http://10.47.171.110/sisdamjt1/alterar-a-senha.php?chave=254e574cca6c7ea5b82aec86d6f9ed16466c8d1b', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(21, 'D788824', 'DEJAIR PENTEADO', 'Dejair Penteado@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(22, 'D563990', 'DJALMA JOSE TITARA', 'Djalma Jose Titara@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(23, 'D788810', 'DULCE GONCALVES DA SILVA MORAES', 'dulcegoncalvesdasilvamoraes@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', 'admin', '2017-08-25 11:47:11', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(24, 'D750338', 'EDNA ALVES DA SILVA DE TOLEDO', 'eastoledo@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(25, 'D731897', 'EDSON ANTONIO DOS SANTOS', 'Edson Antonio dos Santos@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(26, 'D789093', 'EDSON CASTRO', 'Edson Castro@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(27, 'D788098', 'EDUARDO RIZZI PIRES', 'Eduardo Rizzi Pires@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(28, 'D554986', 'ELAINE PECCINATO KOPCZYNSKI', 'peccinato@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(29, 'D529968', 'ELISABETE OZEKI', 'eozeki@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(30, 'D701682', 'ERNANDE SENA RIBEIRO', 'Ernande Sena Ribeiro@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(31, 'D707121', 'EUNICE DIAS LAURENTINO', 'Eunice Dias Laurentino@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(32, 'D788690', 'FLAVIO ROGERIO SALES SILVA', 'Flavio Rogerio Sales Silva@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(33, 'D709791', 'FRANCIELE DE PAULA ESPI­RITO SANTO', 'rhsuvisjtc@gmail.com', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', 'admin', '2017-08-25 11:48:16', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(34, 'D798270', 'GILBERTO DE MORAIS', 'Gilberto de Morais@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(35, 'D587198', 'GLAUCIA MARIA MUNIZ QUERINO', 'gquerinop@prefeitura.sp.gov.br', 'b10faeca8790f05b0f872f7f8658df7ec5d6baa5', 3, 'ATIVO', '', '0000-00-00 00:00:00', 'D587198', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(36, 'D754683', 'HUMBERTO CELSO DE OLIVEIRA', 'hcelso@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(37, 'D614879', 'IAMARA APARECIDA DA SILVA', 'iamarasilva@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(38, 'D549008', 'IARA MARIA FERREIRA', 'iaraferreira@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(39, 'D726843', 'ISABEL CRISTINA FERREIRA DE LIMA', 'isabellima@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(40, 'D726365', 'ISMAR DO AMARAL SANTOS', 'Ismar do Amaral Santos@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(41, 'D788807', 'JADSON TAIANNY DANTAS XAVIER', 'Jadson Taianny Dantas Xavier@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(42, 'D709213', 'JAIME ARAUJO DE CARVALHO', 'Jaime Araujo de Carvalho@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(43, 'D706423', 'JERUSA DOS SANTOS', 'jerusasantos@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(44, 'D792770', 'JOILSON BARBOSA SANTOS', 'Joilson Barbosa Santos@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(45, 'D758053', 'JONATHAN LEITE BAHIA DOS SANTOS', 'Jonathan Leite Bahia dos Santos@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(46, 'D579405', 'JOSE LUIZ DE ALMEIDA', 'Jose Luiz de Almeida@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(47, 'D854063', 'JUSSARA LUCIANO DA SILVA', 'jmenezes@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', 'admin', '2017-08-25 11:47:36', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(48, 'D726010', 'JUCELINO JOAQUIM DE ALMEIDA', 'Jucelino Joaquim de Almeida@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(49, 'D797609', 'JULIANA GRANJA COELHO', 'jgcoelho@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(50, 'D789726', 'KLEBER PERUCHI DA COSTA', 'Kleber Peruchi da Costa@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(51, 'D735921', 'LAUDEMIR CARDOSO FELISBERTO', 'Laudemir Cardoso Felisberto@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(52, 'D757482', 'LEANDRO DE MORAES GERONYMO', 'Leandro de Moraes Geronymo@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(53, 'D727672', 'LEILA FONSECA SILVA', 'leilasilva@prefeitura.sp.gov.br', 'b2cf30fba8a9c286c06fbc03188e3c4e66f35863', 2, 'ATIVO', '', '0000-00-00 00:00:00', 'admin', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(54, 'D819257', 'LEONARDO PAROCHE DE MATOS', 'lparoche@prefeitura.sp.gov.br', '8fd827f29fc8544bbfbe0e79f0916a04052e17ff', 2, 'ATIVO', '', '0000-00-00 00:00:00', 'admin', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(55, 'D799180', 'LUANA APARECIDA CAMPOS', 'Luana Aparecida Campos@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(56, 'D797371', 'LUCAS FILIPE DOS SANTOS', 'Lucas Filipe dos Santos@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(57, 'D784319', 'LUCIANA CRISTINE DE AZEVEDO RIBEIRO', 'lcaribeiro@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(58, 'D708171', 'LUCIANE MARTINS DE CARVALHO', 'Luciane Martins de Carvalho@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(59, 'D790967', 'LUCIANO ALVES', 'Luciano Alves@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(60, 'D778448', 'LUCY ROCHA', 'lucyrocha@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(61, 'D806835', 'LUIS ERNESTO DE SOUZA BERNARDI', 'luizbernardi@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(62, 'D793463', 'MARCOS ANTONIO PEREIRA', 'Marcos Antonio Pereira@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(63, 'D812292', 'MARIA LUCIANA GOMES CAMARGOS', 'mlgcamargos@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(64, 'D750515', 'MARIAZETTE ALVES', 'mariazettealves@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(65, 'D750515', 'MARIAZETTE ALVES', 'Mariazette Alves@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(66, 'D746379', 'MARISA ISABEL ALVES', 'marialves@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(67, 'D538229', 'MARTA REGINA MUNHOZ', 'martamulnhoz@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(68, 'D798817', 'MAURICIO GOMES DA SILVA', 'Mauricio Gomes da Silva@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(69, 'D797398', 'MAYARA GONÃ§ALVES ROCHA', 'Mayara GonÃ§alves Rocha@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(70, 'D708529', 'MINEIIA MACIA RIBEIRO DE OLIVEIRA', 'MineiamaciaribeirodeOliveira@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', 'admin', '2017-08-25 11:49:56', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(72, 'D789802', 'NIVALDO MOURA DO NASCIMENTO JUNIOR', 'Nivaldo Moura do Nascimento Junior@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(73, 'D788786', 'NIVALDO OLIVEIRA DA SILVA', 'Nivaldo Oliveira da Silva@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(74, 'D709292', 'PATRICINEIA PRADO VENANNCIO', 'Patricineiapradovenancio@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', 'admin', '2017-08-25 11:49:05', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(75, 'D789403', 'PLINIO EDUARDO PEREIRA HONORATO', 'Plinio Eduardo Pereira Honorato@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(76, 'D788788', 'REGINALDO JOSÃ© DE CASTRO', 'Reginaldo JosÃ© de Castro@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(77, 'D797445', 'RENAN COLOMBANI DA COSTA', 'Renan Colombani da Costa@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(78, 'D798370', 'RENATO DE FREITAS DOS SANTOS', 'Renato de Freitas dos Santos@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(79, 'D784549', 'RENATO SINNHOFER SUGIMOTO', 'rsugimoto@prefeitura.sp.gov.br', 'e1da74ec29c17fe9e5b43a3825a7abcec139786e', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 'http://10.47.171.110/sisdamjt1/alterar-a-senha.php?chave=dd9eb5527a713722cb6881f921fc07918b91d449', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(80, 'D725941', 'RICARDO DA COSTA ALMEIDA SOUZA', 'Ricardo da Costa Almeida Souza@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(81, 'D708547', 'RICARDO GOMES FACCHETTI', 'Ricardo Gomes Facchetti@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(82, 'D787373', 'RICARDO MACHADO DE SOUZA', 'Ricardo Machado de Souza@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(83, 'D726025', 'RITA DE CÃ¡SSIA MENDES DA SILVA', 'Rita de CÃ¡ssia Mendes da Silva@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(84, 'D708909', 'ROBERTO GOMES FACCHETTI', 'Roberto Gomes Facchetti@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(85, 'D797455', 'ROBSON ALEXSANDRO LEITE DA SILVA', 'Robson Alexsandro Leite da Silva@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(86, 'D788796', 'RODOLFO ROMAIOLI RIBEIRO DE JESUS', 'rrrjesus@prefeitura.sp.gov.br', '7b280d85dab0379cd024e922d43caa9e44b6fb21', 3, 'ATIVO', '', '0000-00-00 00:00:00', 'D788796', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(87, 'D797321', 'RODRIGO BARBOSA DE ARAÃºJO', 'Rodrigo Barbosa de AraÃºjo@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(88, 'D787943', 'RogÃ©rio Costa de Andrade ', 'RogÃ©rio Costa de Andrade@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(89, 'D725722', 'ROSE ELI DOS SANTOS', 'Rose Eli dos Santos@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(90, 'D750512', 'ROSELY LYCIA RODRIGUES', 'Rosely Lycia Rodrigues@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(91, 'D750566', 'ROSEMARY APARECIDA DA SILVA FERREIRA', 'rferre@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(92, 'D750566', 'ROSEMARY APARECIDA DA SILVA FERREIRA', 'Rosemary Aparecida da Silva Ferreira@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(93, 'D789936', 'ROSEMEIRE NASCIMENTO ANDRADE', 'Rosemeire Nascimento Andrade@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(94, 'D609140', 'RUTE DA COSTA', '', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 'http://localhost/sisdamjt1/alterasenha/alterar-a-senha.php?chave=b28fa3ab9c4da557ec84b127a5e6bd7009e934d6', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(95, 'D526162', 'SANDRA APARECIDA DE GODOY BUENO', '', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 'http://localhost/sisdamjt1/alterasenha/alterar-a-senha.php?chave=b28fa3ab9c4da557ec84b127a5e6bd7009e934d6', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(96, 'D729155', 'SELMA APARECIDA GRANDI PINHEIRO', 'sgrandi@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(97, 'D725949', 'SELMA VALLEJO DIAS', 'sgrandi@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(98, 'D725949', 'SELMA VALLEJO DIAS', 'Selma Vallejo Dias@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(99, 'D798792', 'SIDNEI AUGUSTO RODRIGUES', 'Sidnei Augusto Rodrigues@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(100, 'D806620', 'SILVANA MARIA DA SILVA', 'silvanamdasilva@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(101, 'D797337', 'SIMONE DOS SANTOS MENEZES', 'Simone dos Santos Menezes@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(102, 'suvis', 'SUVIS JACANA-TREMEMBE', 'suvisjacana@prefeitura.sp.gov.br', '3c5c59c684c1781a2b2a9a350b08c7e8f8d48fb3', 3, 'ATIVO', '', '0000-00-00 00:00:00', 'admin', '2017-08-25 11:52:53', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(103, 'D809539', 'TABATA CASSILHA ZERBINI', 'tczerbini@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(104, 'D787935', 'TARCISIO GEORGE DE OLIVEIRA SILVA', 'Tarcisio George de Oliveira Silva@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(105, 'D790567', 'THIAGO VERÃ­SSIMO CORREA', 'Thiago VerÃ­ssimo Correa@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(106, 'D778447', 'TIAGO BARBOSA DOS SANTOS', 'tbarbosasantos@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(107, 'D548393', 'VALERIA TIVERON DE SOUZA', 'valeriativeron@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(108, 'D788920', 'VÃ¢NIO BRASIL', 'VÃ¢nio Brasil@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(109, 'D000000', 'VISITANTE SIDAMJT', 'visitante@gmail.com', 'c66170a4319b22e1b0b788475ec09123a933790e', 4, 'INATIVO', 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(110, 'D791749', 'WALLACE RAUL MARTINS', 'wallacemartins@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(111, 'D708766', 'WESLEY ANTÃ´NIO CÃ´RREA', 'Wesley AntÃ´nio CÃ´rrea@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(112, 'D797400', 'YURI GIRÃ£O WALKER', 'Yuri GirÃ£o Walker@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(113, 'D750329', 'ZENEIDE ALVES BATISTA DA SILVA', 'Zeneide Alves Batista da Silva@prefeitura.sp.gov.br', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(114, 'd123456', 'TESTE', '123@123.com', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', 'admin', '2017-06-00 00:00:00', '', '2017-06-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(116, 'D366661', 'RODS1', 'sisdamjt11@gmail.com', 'mudar123', 0, '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(117, 'D366622', 'RODS1A', 'sisdamjt12@gmail.com', 'mudar123', 0, '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(118, 'D366632', 'RODS1A', 'sisdamj@gmail.com', 'mudar123', 0, '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(119, 'D366688', 'RODS1A', 'sisdam@gmail.com', 'mudar123', 0, '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(120, 'D366222', 'RODS', 'sisdamaa@gmail.com', 'mudar123', 0, '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(125, 'D788796', 'ROOSSS', 'sisdamjte@gmail.com', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(130, 'visitan', 'VISITANTE', 'a@w', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 2, 'ATIVO', 'admin', '0000-00-00 00:00:00', 'admin', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(132, 'D788796', 'ASSS', 'a@aa', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(133, 'D788796', 'ASSSA', 'a@aaa', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(134, 'D788796', 'ADMINISTRADOR DO SISTEMAA', 'cidinha.romaioli@gmail.com', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 'http://192.168.1.15/sisdamweb/alterar-a-senha.php?chave=d1887b2864fdda950848f471bcb14b45404f10b5', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NAO', ''),
(135, 'D000123', 'SSSS', 'a@ddd.com', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab', 0, 'INATIVO', 'admin', '2017-07-21 12:44:38', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'NAO', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
