-- Comandos sql para apagar tabelas do banco de dados --
-- Autor: Rodolfo Romaioli Ribeiro de Jesus - rodolfo.romaioli@gmail.com
-- Criado: 15/05/2018 11:30
-- Alterado em 01/04/2019 às 10:26

-- drop table esus_total;

-- Estrutura da tabela `esus_total`
--

CREATE TABLE `esus_total` (`Número da Notificação` bigint(13) DEFAULT NULL,`Estado da Notificação` varchar(14) DEFAULT NULL,
  `Município da Notificação` varchar(21) DEFAULT NULL,`É profissional de saúde?` varchar(3) DEFAULT NULL,`Telefone de Contato` varchar(15) DEFAULT NULL,
  `Etnia` varchar(10) DEFAULT NULL,`Logradouro` varchar(46) DEFAULT NULL,`Evolução Caso` varchar(50) DEFAULT NULL,`Tipo de Teste` varchar(53) DEFAULT NULL,
  `Estado de Residência` varchar(9) DEFAULT NULL,`Número (ou SN para Sem Número)` varchar(11) DEFAULT NULL,`Resultado Totais` varchar(10) DEFAULT NULL,
  `Data da Notificação` varchar(10) DEFAULT NULL,`Resultado IgA` varchar(10) DEFAULT NULL,`CBO` varchar(53) DEFAULT NULL,`Sintoma- Dor de Garganta` varchar(3) DEFAULT NULL,
  `Sintoma- Dispneia` varchar(3) DEFAULT NULL,`Sintoma- Febre` varchar(3) DEFAULT NULL,`Sintoma- Tosse` varchar(3) DEFAULT NULL,
  `Sintoma- Outros` varchar(3) DEFAULT NULL,`Sintoma- Dor de Cabeça` varchar(3) DEFAULT NULL,`Sintoma- Distúrbios Gustativos` varchar(3) DEFAULT NULL,
  `Sintoma- Distúrbios Olfativos` varchar(3) DEFAULT NULL,`Sintoma- Coriza` varchar(3) DEFAULT NULL,`Sintoma- Assintomático` varchar(3) DEFAULT NULL,
  `CEP` varchar(10) DEFAULT NULL,`Profissional de Segurança` varchar(3) DEFAULT NULL,`Resultado (PCR/Rápidos)` varchar(8) DEFAULT NULL,
  `Raça/Cor` varchar(7) DEFAULT NULL,`Teste Sorológico` varchar(10) DEFAULT NULL,`Sexo` varchar(10) DEFAULT NULL,`Estrangeiro` varchar(3) DEFAULT NULL,
  `Tem CPF?` varchar(3) DEFAULT NULL,`Resultado IgM` varchar(10) DEFAULT NULL,`Estado do Teste` varchar(20) DEFAULT NULL,`Data do Teste (Sorologico)` varchar(10) DEFAULT NULL,
  `Resultado IgG` varchar(10) DEFAULT NULL,`CNS` varchar(34) DEFAULT NULL,`Condições- Doenças resp` varchar(3) DEFAULT NULL,
  `Condições- Doenças car` varchar(3) DEFAULT NULL,`Condições- Diabetes` varchar(3) DEFAULT NULL,`Condições- Doenças renais crôn` varchar(3) DEFAULT NULL,
  `Condições- Imunossupressão` varchar(3) DEFAULT NULL,`Condições- Gestante` varchar(3) DEFAULT NULL,`Condições- Portador de doe=` varchar(3) DEFAULT NULL,
  `Condições- Puérpera (até 45 dias do parto)` varchar(3) DEFAULT NULL,`Condições- Obesidade` varchar(3) DEFAULT NULL,`Bairro` varchar(42) DEFAULT NULL,
  `Data do Teste (PCR/Rápidos)` varchar(10) DEFAULT NULL,`Descrição do Sintoma` varchar(98) DEFAULT NULL,`Data de encerramento` varchar(10) DEFAULT NULL,
  `Data de Nascimento` varchar(10) DEFAULT NULL,`Classificação Final` varchar(50) DEFAULT NULL,`Município de Residência` varchar(9) DEFAULT NULL,
  `Nulo` varchar(10) DEFAULT NULL,`Complemento` varchar(46) DEFAULT NULL,`Passaporte` varchar(10) DEFAULT NULL,`CPF` varchar(14) DEFAULT NULL,
  `Nome Completo` varchar(41) DEFAULT NULL,`Pais de origem` varchar(10) DEFAULT NULL,`Data do início dos sintomas` varchar(10) DEFAULT NULL,
  `Nome Completo da Mãe` varchar(39) DEFAULT NULL,`Telefone Celular` varchar(15) DEFAULT NULL,`Notificante CNES` varchar(11) DEFAULT NULL,
  `Notificante CPF` varchar(14) DEFAULT NULL,`Notificante Email` varchar(52) DEFAULT NULL,`Notificante Nome Completo` varchar(41) DEFAULT NULL,
  `Notificante CNPJ` varchar(18) DEFAULT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ALTER TABLE `esus_total` ADD PRIMARY KEY (`Número da Notificação`);

-- Criando a tabela `esus`
CREATE TABLE `esus` (`Número da Notificação` bigint(12) DEFAULT NULL,`Data da Notificação` varchar(10) DEFAULT NULL,`É profissional de saúde?` varchar(3) DEFAULT NULL,`Telefone de Contato` varchar(17) DEFAULT NULL,
  `Nome Completo` varchar(108) DEFAULT NULL,`Data de Nascimento` varchar(10) DEFAULT NULL,`Sexo` varchar(1) DEFAULT NULL,`Data do início dos sintomas` varchar(10) DEFAULT NULL,`Telefone Celular` varchar(17) DEFAULT NULL,
  `CEP` varchar(10) DEFAULT NULL,`Logradouro` varchar(200) DEFAULT NULL,`Número (ou SN para Sem Número)` varchar(30) DEFAULT NULL,`Complemento` varchar(100) DEFAULT NULL,`Ubs` varchar(200) DEFAULT NULL,`UVIS` varchar(15) DEFAULT NULL,
  `LATSIRGAS` varchar(33) DEFAULT NULL,`LONSIRGAS` varchar(33) DEFAULT NULL,`Da` varchar(2) DEFAULT NULL,`CNES` varchar(7) DEFAULT NULL,`Resultado do Teste` varchar(50) DEFAULT NULL,`Data de coleta do teste` varchar(10) DEFAULT NULL,
  `Classificação Final` varchar(100) DEFAULT NULL,`Evolução Caso` varchar(53) DEFAULT NULL,`Tipo de Teste` varchar(53) DEFAULT NULL,`Raça/Cor` varchar(70) DEFAULT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Criando a tabela `esus_geo`
CREATE TABLE `esus_geo` (`NU_NOTIFIC` bigint(13) DEFAULT NULL,`NU_CEP` varchar(10) DEFAULT NULL,`LATSIRGAS` varchar(10) DEFAULT NULL,`LONSIRGAS` varchar(10) DEFAULT NULL,`COD_DISTRI` int(2) DEFAULT NULL,`CNES` int(7) DEFAULT NULL,
  `NOMEUBS` varchar(100) DEFAULT NULL)ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Criando a Tabela Aline
CREATE TABLE `esus_aline` (`Nome` varchar(200) DEFAULT NULL,`Protocolo e-SUS` bigint(13) DEFAULT NULL,`Data Notif` varchar(10) DEFAULT NULL,`Cadastro Exame` varchar(200) DEFAULT NULL,
  `PROFIS SAÚDE` varchar(3) DEFAULT NULL,`UBS abrangência` varchar(130) DEFAULT NULL,`Local de Atendimento` varchar(100) DEFAULT NULL,`RESULTADO ESUS` varchar(50) DEFAULT NULL,`DATA COLETA EXAME` varchar(10) DEFAULT NULL,
  `RESULTADO UVIS` varchar(50) DEFAULT NULL,`DATA COLETA UVIS` varchar(10) DEFAULT NULL,`Classificação Final` varchar(25) DEFAULT NULL,`Evolução Caso` varchar(40) DEFAULT NULL,`Informações` varchar(200) DEFAULT NULL,
  `PROTOCOLO ANTERIOR (para uso da informática)` varchar(3) DEFAULT NULL,`CASO ENCERRADO 1- SIM 2- NÃO (para uso da informática)` varchar(1) DEFAULT NULL,`Contato efetuado 1- Sim 2- Não` varchar(1) DEFAULT NULL,
  `1- Cura 2- Internação 3- tentativas esgotadas de contato 4- óbit` varchar(1) DEFAULT NULL,`Data da alta/ óbito` varchar(10) DEFAULT NULL,`Motivo de não localizado 1- endereço incorreto (não é da pessoa)` varchar(3) DEFAULT NULL,
  `Data do início dos sintomas` varchar(10) DEFAULT NULL,`Se Dt Sint` varchar(5) DEFAULT NULL,`Tipo de Teste` varchar(100) DEFAULT NULL,`Raça/Cor` varchar(100) DEFAULT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8;

