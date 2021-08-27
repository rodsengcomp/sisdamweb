-- Comandos sql para atualizar banco de dados --
-- Autor: Rodolfo Romaioli Ribeiro de Jesus - rodolfo.romaioli@gmail.com
-- Criado: 15/05/2018 11:30
-- Alterado em 20/12/2012 às 10:26

-- Script criado para carregar tabelas extraídas de bancos de dados -> SinanNet, Getwin e GAL-Instituto Adolfo Lutz
--
-- Carregando

CREATE TABLE `resultado_ccz` (
  `ENTRADA` varchar(10) DEFAULT NULL,
  `PEDIDO` int(8) DEFAULT NULL,
  `UNIDADE_DE_SAUDE` varchar(30) DEFAULT NULL,
  `D_A` varchar(17) DEFAULT NULL,
  `SUVIS` varchar(30) DEFAULT NULL,
  `SINAN` varchar(8) DEFAULT NULL,
  `PACIENTE` varchar(50) DEFAULT NULL,
  `SEXO` varchar(1) DEFAULT NULL,
  `NASCIMENTO` varchar(10) DEFAULT NULL,
  `Sintoma` varchar(16) DEFAULT NULL,
  `Coleta` varchar(16) DEFAULT NULL,
  `Nr_da_Amostra` varchar(8) DEFAULT NULL,
  `Resultado_IgM_Panbio` varchar(17) DEFAULT NULL,
  `Kit_IgM` varchar(6) DEFAULT NULL,
  `Nova_Coleta_Panbio` varchar(3) DEFAULT NULL,
  `Resultado_IgM_Focus` varchar(17) DEFAULT NULL,
  `Kit_IgM1` varchar(5) DEFAULT NULL,
  `Nova_Coleta_Focus` varchar(3) DEFAULT NULL,
  `NS1` varchar(3) DEFAULT NULL,
  `Nr_AM_NS1` varchar(10) DEFAULT NULL,
  `Resultado_NS1` varchar(12) DEFAULT NULL,
  `Kit_NS1` varchar(6) DEFAULT NULL,
  `LIBERACAO_EM` varchar(10) DEFAULT NULL,
  `OBSERVACAO` varchar(57) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Exportando novos resultados do ccz dengue
LOAD DATA LOCAL INFILE 'c:/Users/SMS/Desktop/csv/RadGridExport.csv'
INTO TABLE `resultado_ccz`
CHARACTER SET latin1
FIELDS TERMINATED BY ';'
IGNORE 1 ROWS
(`ENTRADA`,`PEDIDO`,`UNIDADE_DE_SAUDE`,`D_A`,`SUVIS`,`SINAN`,`PACIENTE`,`SEXO`,`NASCIMENTO`,`Sintoma`,`Coleta`,`Nr_da_Amostra`,`Resultado_IgM_Panbio`,`Kit_IgM`,`Nova_Coleta_Panbio`,`Resultado_IgM_Focus`,`Kit_IgM1`,`Nova_Coleta_Focus`,
  `NS1`,`Nr_AM_NS1`,`Resultado_NS1`,`Kit_NS1`,`LIBERACAO_EM`,`OBSERVACAO`);

-- Exportando novos resultados do ccz dengue
LOAD DATA LOCAL INFILE 'c:/Users/SMS/Desktop/csv/RadGridExportLepto.csv'
INTO TABLE `resultado_ccz_lepto`
CHARACTER SET latin1
FIELDS TERMINATED BY ';'
IGNORE 1 ROWS
(`ENTRADA`, `PEDIDO`, `UNIDADE_DE_SAUDE`, `D_A`, `SUVIS`, `SINAN`, `PACIENTE`, `SEXO`, `NASCIMENTO`, `Nr_da_Amostra`, `Sintoma`, `Coleta`, `RES_ELISA`, `CO`, `DO`, `RES_MAT`,
`NOVA_COLETA`, `1o_SOROVAR`, `1o_TIT`, `2o_SOROVAR`, `2o_TIT`, `3o_SOROVAR`, `3o_TIT`, `4o_SOROVAR`, `4o_TIT`, `5o_SOROVAR`, `5o_TIT`, `6o_SOROVAR`, `6o_TIT`, `7o_SOROVAR`, `7o_TIT`,
 `8o_SOROVAR`, `8o_TIT`, `9o_SOROVAR`, `9o_TIT`, `10o_SOROVAR`, `10o_TIT`, `11o_SOROVAR`, `11o_TIT`, `12o_SOROVAR`, `12o_TIT`, `13_SOROVAR`, `13_TIT`, `14o_SOROVAR`, `14o_TIT`,
  `15o_SOROVAR`, `15o_TIT`, `16o_SOROVAR`, `16o_TIT`, `17o_SOROVAR`, `17o_TIT`, `18o_SOROVAR`, `18o_TIT`, `19o_SOROVAR`, `19o_TIT`, `LIBERACAO_EM`, `OBSERVACAO`);