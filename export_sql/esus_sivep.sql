-- Comandos sql para apagar tabelas do banco de dados --
-- Autor: Rodolfo Romaioli Ribeiro de Jesus - rodolfo.romaioli@gmail.com
-- Criado: 15/05/2018 11:30
-- Alterado em 01/04/2019 às 10:26

-- drop table esus, sivep;

-- Criando a tabela `esus`
CREATE TABLE `esus` (`Número da Notificação` bigint(12) NOT NULL,`É profissional de saúde?` varchar(3) DEFAULT NULL,`Telefone de Contato` varchar(15) DEFAULT NULL,
`Logradouro` varchar(100) DEFAULT NULL,`Evolução Caso` varchar(50) DEFAULT NULL,`Tipo de Teste` varchar(6) DEFAULT NULL,`Estado de Residência` varchar(9) DEFAULT NULL,
`Número (ou SN para Sem Número)` varchar(10) DEFAULT NULL,`Data da Notificação` varchar(10) DEFAULT NULL,`Tipo de Teste1` varchar(6) DEFAULT NULL,
`CBO` varchar(17) DEFAULT NULL,`Febre` varchar(3) DEFAULT NULL,`Tosse` varchar(3) DEFAULT NULL,`Outros` varchar(3) DEFAULT NULL,`Dor de Garganta` varchar(3) DEFAULT NULL,
`Dispneia` varchar(3) DEFAULT NULL,`CEP` varchar(10) DEFAULT NULL,`Profissional de Segurança` varchar(10) DEFAULT NULL,`Resultado do Teste` varchar(8) DEFAULT NULL,
`Raça/Cor` varchar(10) DEFAULT NULL,`Sexo` varchar(8) DEFAULT NULL,`Estrangeiro` varchar(10) DEFAULT NULL,`Tem CPF?` varchar(3) DEFAULT NULL,
`Estado do Teste` varchar(9) DEFAULT NULL,`CNS` varchar(10) DEFAULT NULL,`Doenças respiratórias crônicas descompensadas` varchar(3) DEFAULT NULL,
`Doenças renais crônicas` varchar(3) DEFAULT NULL,`Portador de doenças cromossômicas` varchar(3) DEFAULT NULL,`Diabetes` varchar(3) DEFAULT NULL,
`Imunossupressão` varchar(3) DEFAULT NULL,`Doenças cardíacas crônicas` varchar(3) DEFAULT NULL,`Gestante de alto risco` varchar(3) DEFAULT NULL,
`Bairro` varchar(12) DEFAULT NULL,`Data de coleta do teste` varchar(10) DEFAULT NULL,`Estado do Teste1` varchar(9) DEFAULT NULL,`Descrição do Sintoma` varchar(10) DEFAULT NULL,
`Data de encerramento` varchar(10) DEFAULT NULL,`Data de Nascimento` varchar(10) DEFAULT NULL,`Classificação Final` varchar(10) DEFAULT NULL,
`Município de Residência` varchar(9) DEFAULT NULL,`Data da Coleta do Teste` varchar(10) DEFAULT NULL,`Complemento` varchar(10) DEFAULT NULL,
`Passaporte` varchar(10) DEFAULT NULL,`CPF` varchar(14) DEFAULT NULL,`Nome Completo` varchar(100) DEFAULT NULL,`Resultado do Teste1` varchar(8) DEFAULT NULL,
`Pais de origem` varchar(10) DEFAULT NULL,`Data do início dos sintomas` varchar(10) DEFAULT NULL,`Nome Completo da Mãe` varchar(10) DEFAULT NULL,
`Telefone Celular` varchar(15) DEFAULT NULL,`Operador CNES` int(7) DEFAULT NULL,`Operador CPF` varchar(14) DEFAULT NULL,`Operador Email` varchar(22) DEFAULT NULL,
`Operador Nome Completo` varchar(23) DEFAULT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `esus`
    ADD PRIMARY KEY (`Número da Notificação`);

-- Exportando novos resultados do esus
LOAD DATA LOCAL INFILE 'c:/Users/sms/Desktop/csv/esus.csv'
INTO TABLE `esus`
CHARACTER SET latin1
FIELDS TERMINATED BY ';'
IGNORE 1 ROWS
(`Número da Notificação`,`É profissional de saúde?`,`Telefone de Contato`,`Logradouro`,`Evolução Caso`,`Tipo de Teste`,`Estado de Residência`,
`Número (ou SN para Sem Número)`,`Data da Notificação`,`Tipo de Teste1`,`CBO`,`Febre`,`Tosse`,`Outros`,`Dor de Garganta`,`Dispneia`,`CEP`,
`Profissional de Segurança`,`Resultado do Teste`,`Raça/Cor`,`Sexo`,`Estrangeiro`,`Tem CPF?`,`Estado do Teste`,`CNS`,
`Doenças respiratórias crônicas descompensadas`,`Doenças renais crônicas`,`Portador de doenças cromossômicas`,`Diabetes`,`Imunossupressão`,
`Doenças cardíacas crônicas`,`Gestante de alto risco`,`Bairro`,`Data de coleta do teste`,`Estado do Teste1`,`Descrição do Sintoma`,
`Data de encerramento`,`Data de Nascimento`,`Classificação Final`,`Município de Residência`,`Data da Coleta do Teste`,`Complemento`,`Passaporte`,
`CPF`,`Nome Completo`,`Resultado do Teste1`,`Pais de origem`,`Data do início dos sintomas`,`Nome Completo da Mãe`,`Telefone Celular`,`Operador CNES`,
 `Operador CPF`,`Operador Email`,`Operador Nome Completo`);

-- Select que verifica novos casos na tabela esus e caso positivo insere todos os novos casos na tabela sv2
insert into sv2
SELECT SV2.id, "0000000" AS sinan, esus.`Número da Notificação`, esus.`Data da Notificação` AS datanot, "COVID-19" AS agravo, UCase(esus.`Nome Completo`) AS nome,CONCAT(FLOOR(DATEDIFF(CURDATE(),esus.`Data de Nascimento`) / 365.25),"A") AS idade, IF(esus.`Sexo`='Feminino','F','M') AS sexo, DATE_FORMAT(CURRENT_DATE,'%d/%m/%Y') AS dataentrada, (SELECT SEMEPI FROM ruas_jacana_cep_esus WHERE DASE =DATE_FORMAT(CURRENT_DATE,'%d/%m/%Y')) AS se,esus.`Data do início dos sintomas` AS data1sint, "BANCO E-ESUS" AS localate, esus.`Telefone Celular` AS tel, esus.`Número (ou SN para Sem Número)` AS num,esus.`Complemento` AS comp, ruas_jacana_cep_esus.DA AS da, CONCAT(LEFT(ruas_jacana_cep_esus.CEP,2), MID(ruas_jacana_cep_esus.CEP,4)) AS cep, ruas_jacana_cep_esus.Log AS log, ruas_jacana_cep_esus.ENDEREÇO AS rua, ruas_jacana_cep_esus.BAIRRO AS bairro, ruas_jacana_cep_esus.UBS AS localvd, "UVIS JACANA" AS suvis,"SAO PAULO" AS cidade, ruas_jacana_cep_esus.ID AS idrua, "" AS dataobito, CURRENT_TIMESTAMP AS criado, ruas_jacana_cep_esus.LAT AS latsv2,ruas_jacana_cep_esus.LONG AS longsv2, "sisdamweb D788796" AS usuariocad, "" AS alterado, "" AS usuarioalt, SV2.nome AS ocorrencia, "suvis" AS tipo FROM SV2 RIGHT JOIN (ruas_jacana_cep_esus INNER JOIN esus ON ruas_jacana_cep_esus.ENDEREÇO = esus.Logradouro) ON SV2.nome = esus.`Nome Completo`WHERE (((SV2.nome) Is Null) AND ((ruas_jacana_cep_esus.CEP) In (SELECT CEP FROM ruas_jacana_cep_esus As Tmp GROUP BY CEP HAVING Count(*)=1)) AND ((esus.`Evolução Caso`)<>"Cancelado" OR (esus.`Evolução Caso`)="" OR (esus.`Evolução Caso`) IS NULL));

-- Criando a tabela `sivep`
CREATE TABLE `sivep` (`NU_NOTIFIC` bigint(12) NOT NULL,`DT_NOTIFIC` varchar(10) DEFAULT NULL,`SEM_NOT` varchar(2) DEFAULT NULL,`DT_SIN_PRI` varchar(10) DEFAULT NULL,
`SEM_PRI` varchar(2) DEFAULT NULL,`SG_UF_NOT` varchar(2) DEFAULT NULL,`ID_REGIONA` varchar(24) DEFAULT NULL,`CO_REGIONA` int(4) DEFAULT NULL,`ID_MUNICIP` varchar(21) DEFAULT NULL,
`CO_MUN_NOT` int(6) DEFAULT NULL,`ID_UNIDADE` varchar(60) DEFAULT NULL,`CO_UNI_NOT` varchar(7) DEFAULT NULL,`NU_CPF` varchar(11) DEFAULT NULL,`NM_PACIENT` varchar(53) DEFAULT NULL,
`CS_SEXO` varchar(1) DEFAULT NULL,`DT_NASC` date DEFAULT NULL,`NU_IDADE_N` int(2) DEFAULT NULL,`TP_IDADE` int(1) DEFAULT NULL,`COD_IDADE` int(4) DEFAULT NULL,
`CS_GESTANT` int(1) DEFAULT NULL,`CS_RACA` varchar(1) DEFAULT NULL,`CS_ETINIA` varchar(10) DEFAULT NULL,`CS_ESCOL_N` varchar(1) DEFAULT NULL,`NM_MAE_PAC` varchar(40) DEFAULT NULL,
`NU_CEP` varchar(8) DEFAULT NULL,`ID_PAIS` varchar(6) DEFAULT NULL,`CO_PAIS` int(1) DEFAULT NULL,`SG_UF` varchar(2) DEFAULT NULL,`ID_RG_RESI` varchar(13) DEFAULT NULL,
`CO_RG_RESI` int(4) DEFAULT NULL,`ID_MN_RESI` varchar(9) DEFAULT NULL,`CO_MUN_RES` int(6) DEFAULT NULL,`NM_BAIRRO` varchar(30) DEFAULT NULL,`NM_LOGRADO` varchar(36) DEFAULT NULL,
`NU_NUMERO` varchar(5) DEFAULT NULL,`NM_COMPLEM` varchar(10) DEFAULT NULL,`NU_DDD_TEL` varchar(2) DEFAULT NULL,`NU_TELEFON` varchar(9) DEFAULT NULL,
`CS_ZONA` varchar(1) DEFAULT NULL,`SURTO_SG` varchar(1) DEFAULT NULL,`NOSOCOMIAL` varchar(1) DEFAULT NULL,`AVE_SUINO` varchar(1) DEFAULT NULL,
`FEBRE` varchar(1) DEFAULT NULL,`TOSSE` varchar(1) DEFAULT NULL,`GARGANTA` varchar(1) DEFAULT NULL,`DISPNEIA` varchar(1) DEFAULT NULL,`DESC_RESP` varchar(1) DEFAULT NULL,
`SATURACAO` varchar(1) DEFAULT NULL,`DIARREIA` varchar(1) DEFAULT NULL,`VOMITO` varchar(1) DEFAULT NULL,`OUTRO_SIN` varchar(1) DEFAULT NULL,`OUTRO_DES` varchar(30) DEFAULT NULL,
`PUERPERA` varchar(1) DEFAULT NULL,`CARDIOPATI` varchar(1) DEFAULT NULL,`HEMATOLOGI` varchar(1) DEFAULT NULL,`SIND_DOWN` varchar(1) DEFAULT NULL,`HEPATICA` varchar(1) DEFAULT NULL,
`ASMA` varchar(1) DEFAULT NULL,`DIABETES` varchar(1) DEFAULT NULL,`NEUROLOGIC` varchar(1) DEFAULT NULL,`PNEUMOPATI` varchar(1) DEFAULT NULL,`IMUNODEPRE` varchar(1) DEFAULT NULL,
`RENAL` varchar(1) DEFAULT NULL,`OBESIDADE` varchar(1) DEFAULT NULL,`OBES_IMC` varchar(4) DEFAULT NULL,`OUT_MORBI` varchar(1) DEFAULT NULL,`MORB_DESC` varchar(30) DEFAULT NULL,
`VACINA` varchar(1) DEFAULT NULL,`DT_UT_DOSE` varchar(10) DEFAULT NULL,`MAE_VAC` varchar(1) DEFAULT NULL,`DT_VAC_MAE` varchar(10) DEFAULT NULL,`M_AMAMENTA` varchar(1) DEFAULT NULL,
`DT_DOSEUNI` varchar(10) DEFAULT NULL,`DT_1_DOSE` varchar(10) DEFAULT NULL,`DT_2_DOSE` varchar(10) DEFAULT NULL,`ANTIVIRAL` varchar(1) DEFAULT NULL,`TP_ANTIVIR` varchar(1) DEFAULT NULL,
`OUT_ANTIV` varchar(10) DEFAULT NULL,`DT_ANTIVIR` varchar(10) DEFAULT NULL,`HOSPITAL` varchar(1) DEFAULT NULL,`DT_INTERNA` varchar(10) DEFAULT NULL,`SG_UF_INTE` varchar(2) DEFAULT NULL,
`ID_RG_INTE` varchar(24) DEFAULT NULL,`CO_RG_INTE` varchar(4) DEFAULT NULL,`ID_MN_INTE` varchar(21) DEFAULT NULL,`CO_MU_INTE` varchar(6) DEFAULT NULL,`NM_UN_INTE` varchar(59) DEFAULT NULL,
`CO_UN_INTE` varchar(7) DEFAULT NULL,`UTI` varchar(1) DEFAULT NULL,`DT_ENTUTI` varchar(10) DEFAULT NULL,`DT_SAIDUTI` varchar(10) DEFAULT NULL,`SUPORT_VEN` varchar(1) DEFAULT NULL,
`RAIOX_RES` varchar(1) DEFAULT NULL,`RAIOX_OUT` varchar(10) DEFAULT NULL,`DT_RAIOX` varchar(10) DEFAULT NULL,`AMOSTRA` varchar(1) DEFAULT NULL,`DT_COLETA` varchar(10) DEFAULT NULL,
`TP_AMOSTRA` varchar(1) DEFAULT NULL,`OUT_AMOST` varchar(10) DEFAULT NULL,`REQUI_GAL` varchar(12) DEFAULT NULL,`IF_RESUL` varchar(1) DEFAULT NULL,`DT_IF` varchar(10) DEFAULT NULL,
`POS_IF_FLU` varchar(1) DEFAULT NULL,`TP_FLU_IF` varchar(10) DEFAULT NULL,`POS_IF_OUT` varchar(1) DEFAULT NULL,`IF_VSR` varchar(10) DEFAULT NULL,`IF_PARA1` varchar(10) DEFAULT NULL,
`IF_PARA2` varchar(10) DEFAULT NULL,`IF_PARA3` varchar(10) DEFAULT NULL,`IF_ADENO` varchar(10) DEFAULT NULL,`IF_OUTRO` varchar(1) DEFAULT NULL,`DS_IF_OUT` varchar(8) DEFAULT NULL,
`LAB_IF` varchar(59) DEFAULT NULL,`CO_LAB_IF` varchar(7) DEFAULT NULL,`PCR_RESUL` varchar(1) DEFAULT NULL,`DT_PCR` varchar(10) DEFAULT NULL,`POS_PCRFLU` varchar(1) DEFAULT NULL,
`TP_FLU_PCR` varchar(1) DEFAULT NULL,`PCR_FLUASU` varchar(1) DEFAULT NULL,`FLUASU_OUT` varchar(10) DEFAULT NULL,`PCR_FLUBLI` varchar(1) DEFAULT NULL,`FLUBLI_OUT` varchar(10) DEFAULT NULL,
`POS_PCROUT` varchar(1) DEFAULT NULL,`PCR_VSR` varchar(10) DEFAULT NULL,`PCR_PARA1` varchar(10) DEFAULT NULL,`PCR_PARA2` varchar(10) DEFAULT NULL,`PCR_PARA3` varchar(10) DEFAULT NULL,
`PCR_PARA4` varchar(10) DEFAULT NULL,`PCR_ADENO` varchar(10) DEFAULT NULL,`PCR_METAP` varchar(10) DEFAULT NULL,`PCR_BOCA` varchar(10) DEFAULT NULL,`PCR_RINO` varchar(10) DEFAULT NULL,
`PCR_OUTRO` varchar(10) DEFAULT NULL,`DS_PCR_OUT` varchar(10) DEFAULT NULL,`LAB_PCR` varchar(50) DEFAULT NULL,`CO_LAB_PCR` varchar(7) DEFAULT NULL,`CLASSI_FIN` varchar(1) DEFAULT NULL,
`CLASSI_OUT` varchar(10) DEFAULT NULL,`CRITERIO` varchar(1) DEFAULT NULL,`EVOLUCAO` varchar(1) DEFAULT NULL,`DT_EVOLUCA` varchar(10) DEFAULT NULL,`DT_ENCERRA` varchar(10) DEFAULT NULL,
`OBSERVA` varchar(250) DEFAULT NULL,`NOME_PROF` varchar(48) DEFAULT NULL,`REG_PROF` varchar(15) DEFAULT NULL,`DT_DIGITA` varchar(10) DEFAULT NULL,`HISTO_VGM` int(1) DEFAULT NULL,
`PAIS_VGM` varchar(10) DEFAULT NULL,`CO_PS_VGM` varchar(10) DEFAULT NULL,`LO_PS_VGM` varchar(10) DEFAULT NULL,`DT_VGM` varchar(10) DEFAULT NULL,`DT_RT_VGM` varchar(10) DEFAULT NULL,
`PCR_SARS2` varchar(10) DEFAULT NULL,`PAC_COCBO` varchar(10) DEFAULT NULL,`PAC_DSCBO` varchar(10) DEFAULT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `sivep`
  ADD PRIMARY KEY (`NU_NOTIFIC`);

-- Exportando novos resultados do ccz dengue
LOAD DATA LOCAL INFILE 'c:/Users/sms/Desktop/csv/sivep.csv'
INTO TABLE `sivep`
CHARACTER SET latin1
FIELDS TERMINATED BY ';'
IGNORE 1 ROWS
(`NU_NOTIFIC`, `DT_NOTIFIC`, `SEM_NOT`, `DT_SIN_PRI`, `SEM_PRI`, `SG_UF_NOT`, `ID_REGIONA`, `CO_REGIONA`, `ID_MUNICIP`, `CO_MUN_NOT`, `ID_UNIDADE`,
`CO_UNI_NOT`, `NU_CPF`, `NM_PACIENT`, `CS_SEXO`, `DT_NASC`, `NU_IDADE_N`, `TP_IDADE`, `COD_IDADE`, `CS_GESTANT`, `CS_RACA`, `CS_ETINIA`, `CS_ESCOL_N`,
`NM_MAE_PAC`, `NU_CEP`, `ID_PAIS`, `CO_PAIS`, `SG_UF`, `ID_RG_RESI`, `CO_RG_RESI`, `ID_MN_RESI`, `CO_MUN_RES`, `NM_BAIRRO`, `NM_LOGRADO`, `NU_NUMERO`,
`NM_COMPLEM`, `NU_DDD_TEL`, `NU_TELEFON`, `CS_ZONA`, `SURTO_SG`, `NOSOCOMIAL`, `AVE_SUINO`, `FEBRE`, `TOSSE`, `GARGANTA`, `DISPNEIA`, `DESC_RESP`,
`SATURACAO`, `DIARREIA`, `VOMITO`, `OUTRO_SIN`, `OUTRO_DES`, `PUERPERA`, `CARDIOPATI`, `HEMATOLOGI`, `SIND_DOWN`, `HEPATICA`, `ASMA`, `DIABETES`,
`NEUROLOGIC`, `PNEUMOPATI`, `IMUNODEPRE`, `RENAL`, `OBESIDADE`, `OBES_IMC`, `OUT_MORBI`, `MORB_DESC`, `VACINA`, `DT_UT_DOSE`, `MAE_VAC`, `DT_VAC_MAE`,
`M_AMAMENTA`, `DT_DOSEUNI`, `DT_1_DOSE`, `DT_2_DOSE`, `ANTIVIRAL`, `TP_ANTIVIR`, `OUT_ANTIV`, `DT_ANTIVIR`, `HOSPITAL`, `DT_INTERNA`, `SG_UF_INTE`,
`ID_RG_INTE`, `CO_RG_INTE`, `ID_MN_INTE`, `CO_MU_INTE`, `NM_UN_INTE`, `CO_UN_INTE`, `UTI`, `DT_ENTUTI`, `DT_SAIDUTI`, `SUPORT_VEN`, `RAIOX_RES`, `RAIOX_OUT`,
`DT_RAIOX`, `AMOSTRA`, `DT_COLETA`, `TP_AMOSTRA`, `OUT_AMOST`, `REQUI_GAL`, `IF_RESUL`, `DT_IF`, `POS_IF_FLU`, `TP_FLU_IF`, `POS_IF_OUT`, `IF_VSR`, `IF_PARA1`,
`IF_PARA2`, `IF_PARA3`, `IF_ADENO`, `IF_OUTRO`, `DS_IF_OUT`, `LAB_IF`, `CO_LAB_IF`, `PCR_RESUL`, `DT_PCR`, `POS_PCRFLU`, `TP_FLU_PCR`, `PCR_FLUASU`, `FLUASU_OUT`,
`PCR_FLUBLI`, `FLUBLI_OUT`, `POS_PCROUT`, `PCR_VSR`, `PCR_PARA1`);


-- Codigo criado por Rodolfo R R de Jesus para consultar casos Sivep & comparar com Sv2 e em seguida inserir no SV2
insert into sv2
SELECT SV2.id, "0000000" AS sinan, sivep.NU_NOTIFIC AS protocolo, sivep.DT_NOTIFIC AS datanot, "COVID-19" AS agravo, sivep.NM_PACIENT AS nome,CONCAT(FLOOR(DATEDIFF(CURDATE(),DT_NASC)/365.25),"A") AS idade, sivep.CS_SEXO AS sexo, DATE_FORMAT(CURRENT_DATE,'%d/%m/%Y') AS dataentrada,(SELECT SEMEPI FROM ruas_jacana_cep_sivep WHERE DASE = DATE_FORMAT(CURRENT_DATE,'%d/%m/%Y')) AS se, sivep.DT_SIN_PRI AS data1sint,sivep.ID_UNIDADE AS localate, CONCAT("(",`NU_DDD_TEL`,")",`NU_TELEFON`) AS tel, sivep.NU_NUMERO AS num, sivep.NM_COMPLEM AS comp, ruas_jacana_cep_sivep.DA AS da, CONCAT(LEFT(ruas_jacana_cep_sivep.`CEP`,5) , "-", MID(ruas_jacana_cep_sivep.`CEP`,6)) AS cep,ruas_jacana_cep_sivep.Log AS log, ruas_jacana_cep_sivep.`ENDEREÇO` AS rua, ruas_jacana_cep_sivep.BAIRRO AS bairro, ruas_jacana_cep_sivep.UBS AS localvd, "UVIS JACANA" AS suvis, "SAO PAULO" AS cidade, ruas_jacana_cep_sivep.ID AS idrua, "" AS dataobito, CURRENT_TIMESTAMP AS criado, ruas_jacana_cep_sivep.LAT AS latsv2, ruas_jacana_cep_sivep.LONG AS longsv2, "sisdamweb D790072" AS usuariocad, "" AS alterado, "" AS usuarioalt, SV2.nome AS ocorrencia, "suvis" AS tipo FROM (sivep INNER JOIN ruas_jacana_cep_sivep ON sivep.NU_CEP = ruas_jacana_cep_sivep.`CEP`) LEFT JOIN SV2 ON sivep.NM_PACIENT = SV2.nome WHERE (((SV2.nome) Is Null) AND ((ruas_jacana_cep_sivep.CEP) In (SELECT `CEP` FROM  ruas_jacana_cep_sivep As Tmp GROUP BY  `CEP` HAVING Count(*)=1)))


-- Script para cruzar esus(banco inteiro) com esus Covisa
SELECT esus_total.`Número da Notificação` AS NU_NOTIFIC, esus_total.`Data da Notificação`, esus_total.`É profissional de saúde?`, esus_total.`Telefone de Contato`, esus_total.`Nome Completo`, esus_total.`Data de Nascimento`, esus_total.Sexo, esus_total.`Data do início dos sintomas`, esus_total.`Telefone Celular`, esus_total.CEP, esus_total.Logradouro, esus_total.`Número (ou SN para Sem Número)`, esus_total.Complemento, esus_geo.NOMEUBS, esus_geo.UVIS, esus_geo.LATSIRGAS, esus_geo.LONSIRGAS, esus_geo.COD_DISTRI, esus_geo.CNES, esus_total.`Resultado do Teste`, esus_total.`Data da Coleta do Teste`, esus_total.`Classificação Final`, esus_total.`Evolução Caso`
FROM esus_total INNER JOIN esus_geo ON esus_total.`Número da Notificação` = esus_geo.NU_NOTIFIC;
