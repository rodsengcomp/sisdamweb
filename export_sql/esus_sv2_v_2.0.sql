-- Comandos sql para atualizar tabelas do banco de dados do esus - covisa --
-- Autor: Rodolfo Romaioli Ribeiro de Jesus - rodolfo.romaioli@gmail.com
-- Criado: 15/04/2020 11:30
-- Alterado em 01/04/2019 às 10:26
-- Última alteração em 25/08/2020

-- Limpando dados das tabelas
TRUNCATE TABLE esus;
TRUNCATE TABLE esus_total;
TRUNCATE TABLE esus_aline;
TRUNCATE TABLE esus_aline_atual;
TRUNCATE TABLE esus_aline_atual_final;
TRUNCATE TABLE esus_aline_atual_final_mes;

-- 1º Passo : Carregar tabelas extraídas do e-SUS Notifica
-- COVID e-SUS Março a Maio : 01/03/2020 a 31/05/2020esus.sql
-- COVID e-SUS Junho a Julho : 01/06/2020 a 30/06/2020
-- COVID e-SUS Junho a Julho : 01/07/2020 a 31/07/2020
-- COVID e-SUS Agosto a Setembro : 01/08/2020 a atual
-- Acesse https://notifica.saude.gov.br/exportacoes ,

-- Antes de executar
-- Script para carregar tabela total de caso do e-SUS Notifica
LOAD DATA INFILE 'e:/csv/esus/esus_/esus_.csv'
INTO TABLE `esus_total`
CHARACTER SET latin1
FIELDS TERMINATED BY ';'
IGNORE 1 ROWS

-- 2º Passo : Carregar tabela online Uvis e-SUS

-- Importar tabela diária Aline Esus (Copiar a tabela online e colocar excel local e editar campos protocolo e cadastro exame para numero)
LOAD DATA INFILE 'e:/csv/esus/esus_/esus_aline_.csv'
INTO TABLE `esus_aline`
CHARACTER SET latin1
FIELDS TERMINATED BY ';'
IGNORE 1 ROWS

-- 3º Passo : Cruzar os dados da tabela diária Aline Esus com o banco extraído do e-SUS Notifica

-- atualizar os dados da tabela esus_aline (https://docs.google.com/spreadsheets/d/1ei-3Ga1F_FEfBzwaJBDwDBFt5Yn_vNmQKzmpHuzVksY/edit?usp=drive_web&ouid=114806634805489556928)
-- com os dados atuais da tabela esus_total (https://notifica.saude.gov.br/login)

-- insert esus_aline_atual
SELECT esus_total.`Nome Completo`, esus_aline.`PROT_ESUS`, esus_total.`Data da Notificação` AS `DT_NOTIFIC`,esus_total.`Telefone 1` AS TEL,
       esus_aline.`CAD_EXAME`, IF(esus_total.`É profissional de saúde?`='Sim','SIM','NAO') AS `PROF_SAUDE`,
       esus_aline.`UBS_ABRANG`, esus_aline.`LOCAL_ATEND`, esus_total.`Tipo de Teste Outros 1` AS `TIP_TEST`,
       esus_total.`Data da Coleta Outros 1` AS `DT_PCR_RAP`,
       UCASE(esus_total.`Resultado Outros 1`) AS `RES_PCR_RAP_ESUS`,
       esus_total.`Data da Coleta Sorológico IgM` AS `DT_SORO_ESUS`,UCASE(esus_total.`Resultado Sorológico IgM`) AS `RES_IGM_ESUS`,
       UCASE(esus_total.`Resultado Sorológico IgG`) AS `RES_IGG_ESUS`, UCASE(esus_total.`Resultado Sorológico IgA`) AS `RES_IGA_ESUS`,
       UCASE(esus_total.`Resultado Outros 2`) AS `RES_TOT_ESUS`,esus_aline.`DT_COL_UVIS`, esus_aline.`RES_UVIS`,
       UCASE(esus_total.`Classificação Final`) AS `CLASS_FIN`, UCASE(esus_total.`Evolução Caso`) AS `EVOLUCAO`,
       esus_aline.INFO, esus_aline.`CONT_EF_1_S_2_N`, esus_aline.`1_CURA_2_INT_3_TENT_ESG_4_OBT`, esus_aline.`DT_ALT_OBT`,
       esus_aline.`MT_NAO_LOC`,esus_aline.`DT_SINT`,esus_aline.`SE_DT_SINT`, UCASE(esus_total.`Raça/Cor`) AS RACA_COR,
       IF (esus_total.`Sintomas`LIKE '%Olf%','SIM','NAO') AS SINT_GUST,
       IF (esus_total.`Sintomas`LIKE '%Olf%','SIM','NAO') AS SINT_OLF,
       IF (esus_total.`Sintomas`LIKE '%Assin%','SIM','NAO') AS SINT_ASS,
       esus_total.`Descrição do Sintoma` AS DESC_SINT, esus_total.`Data de Nascimento` AS DT_NASC, esus_total.`Data de encerramento` AS DT_ENC,
       esus_total.`CNES Notificação` AS NT_CNES, esus_total.`Notificante Email` AS NT_EMAIL, esus_total.`Notificante Nome Completo` AS NT_NOME,
       ruas_jacana_cep_esus.cep AS CEP,
       esus_total.Sexo AS SEXO, esus_total.`Número (ou SN para Sem Número)` AS NU_NM, esus_total.Complemento AS NM_COMP
FROM esus_total RIGHT JOIN esus_aline ON esus_total.`Número da Notificação` = esus_aline.`PROT_ESUS`;


-- 4º Passo : Cruzar os dados e inserir novos casos da tabela esus_total na tabela esus_aline_atual

-- Script para casos novos por cep de ruas (esus_total)
-- insert into esus_1
SELECT esus_total.`Nome Completo` AS NOME, esus_total.`Número da Notificação` AS `PROT_ESUS`, esus_total.`Data da Notificação` AS `DT_NOTIFIC`,esus_total.`Telefone 1` AS TEL,
       ruas.ubs AS `UBS_ABRANG`,esus_total.`Data da Notificação` AS `DT_SINT`,esus_covisa.`SEM_PRI`, esus_total.`Data de Nascimento` AS DT_NASC,
       esus_total.`CNES Notificação` AS NT_CNES, ruas.cep AS CEP, esus_total.Sexo AS SEXO, esus_total.`Número (ou SN para Sem Número)` AS NU_NM,
       esus_total.Complemento AS NM_COMP
FROM (esus_covisa
    LEFT JOIN esus_total ON (esus_covisa.DT_NASC = esus_total.`Data de Nascimento`)
        AND (esus_covisa.NU_NOTIFIC = esus_total.`Número da Notificação`))
         LEFT JOIN ruas ON (esus_covisa.NU_CEP = ruas.cep)
WHERE ((ruas.cep) In (SELECT `cep` FROM `ruas` As Tmp GROUP BY `cep` HAVING Count(*)=1 ))

SELECT esus_covisa.NU_NOTIFIC, esus_covisa.`Data da Notificação`, esus_total.`Telefone 1`, UCASE(esus_aline_atual_final.`NOME`) AS `Nome Completo`,
       CONCAT(RIGHT(esus_total.`Data de Nascimento`,4),"-",MID(esus_total.`Data de Nascimento`,4,2),"-", (LEFT(esus_total.`Data de Nascimento`,2))) AS `Data de Nascimento`,
       IF(esus_total.`Sexo`='Feminino','F','M') AS `Sexo`, esus_aline_atual_final.`DT_SINT`,
       esus_aline_atual_final.`SE_DT_SINT`, esus_total.`Telefone 2`, CONCAT(LEFT(esus_total.CEP,2), MID(esus_total.CEP,4)) AS `cep`,
       UCase(esus_total.Logradouro) AS `Logradouro`,esus_total.Bairro, esus_total.`Número (ou SN para Sem Número)`, esus_total.Complemento,
       esus_aline_atual_final.`UBS_ABRANG` AS Ubs, "UVIS JACANA-TREMEMBE" AS UVIS, "" AS LATSIRGAS,"" AS LONSIRGAS, "" AS Da,
       "" AS CNES
FROM esus_total INNER JOIN esus_aline_atual_final ON esus_total.`Número da Notificação` = esus_aline_atual_final.`PROT_ESUS`
WHERE esus_total.`Evolução Caso`<>'Cancelado';

-- 5° Passo : Atualização da semana epidemiologica na data da dos primeiros sintomas

-- Scrip para criar Se na tabela aline
-- INSERT INTO esus_aline_atual_final
SELECT esus_aline_atual.NOME, esus_aline_atual.`PROT_ESUS`, esus_aline_atual.`DT_NOTIFIC`,esus_aline_atual.`TEL`,
       esus_aline_atual.`PROF_SAUDE`,
       esus_aline_atual.`UBS_ABRANG`, esus_aline_atual.`TIP_TEST`, esus_aline_atual.`DT_PCR_RAP`,
       esus_aline_atual.`RES_PCR_RAP_ESUS`,esus_aline_atual.`DT_SORO_ESUS`,esus_aline_atual.`RES_IGM_ESUS`,
       esus_aline_atual.`RES_IGG_ESUS`, esus_aline_atual.`RES_IGA_ESUS`, esus_aline_atual.`RES_TOT_ESUS`,
       esus_aline_atual.`DT_COL_UVIS`, esus_aline_atual.`RES_UVIS`, esus_aline_atual.`CLASS_FIN`,
       esus_aline_atual.`EVOLUCAO`, esus_aline_atual.INFO, esus_aline_atual.`CONT_EF_1_S_2_N`,
       esus_aline_atual.`1_CURA_2_INT_3_TENT_ESG_4_OBT`, esus_aline_atual.`DT_ALT_OBT`, esus_aline_atual.`MT_NAO_LOC`,
       esus_aline_atual.`DT_SINT`,se.se , esus_aline_atual.RACA_COR, esus_aline_atual.SINT_GUST, esus_aline_atual.SINT_OLF,
       esus_aline_atual.SINT_ASS, esus_aline_atual.DESC_SINT,esus_aline_atual.DT_NASC, esus_aline_atual.DT_ENC,esus_aline_atual.NT_CNES,
       esus_aline_atual.NT_EMAIL, esus_aline_atual.NT_NOME, esus_aline_atual.CEP,
       esus_aline_atual.SEXO, esus_aline_atual.NU_NM, esus_aline_atual.NM_COMP
FROM esus_aline_atual LEFT JOIN se ON esus_aline_atual.`DT_SINT` = se.`dataentrada`;

-- 6º Passo (Apenas se no script 5º Passo acima apresentar novas linhas inseridas):

-- Script para cruzar esus_total (banco Inteiro) com esus Aline Atual Final
-- insert into esus
SELECT esus_total.`Número da Notificação`, esus_total.`Data da Notificação`, esus_total.`Telefone 1`, UCASE(esus_aline_atual_final.`NOME`) AS `Nome Completo`,
       CONCAT(RIGHT(esus_total.`Data de Nascimento`,4),"-",MID(esus_total.`Data de Nascimento`,4,2),"-", (LEFT(esus_total.`Data de Nascimento`,2))) AS `Data de Nascimento`,
       IF(esus_total.`Sexo`='Feminino','F','M') AS `Sexo`, esus_aline_atual_final.`DT_SINT`,
       esus_aline_atual_final.`SE_DT_SINT`, esus_total.`Telefone 2`, CONCAT(LEFT(esus_total.CEP,2), MID(esus_total.CEP,4)) AS `cep`,
       UCase(esus_total.Logradouro) AS `Logradouro`,esus_total.Bairro, esus_total.`Número (ou SN para Sem Número)`, esus_total.Complemento,
       esus_aline_atual_final.`UBS_ABRANG` AS Ubs, "UVIS JACANA-TREMEMBE" AS UVIS, "" AS LATSIRGAS,"" AS LONSIRGAS, "" AS Da,
       "" AS CNES
FROM esus_total INNER JOIN esus_aline_atual_final ON esus_total.`Número da Notificação` = esus_aline_atual_final.`PROT_ESUS`
WHERE esus_total.`Evolução Caso`<>'Cancelado';

-- 7º Passo :

-- Script para inserção de casos novos no sv2 (Apenas se no script 5º Passo acima apresentar novas linhas inseridas):
insert into sv2
SELECT "" AS id, "0000000" AS sinan, esus_covisa.NU_NOTIFIC AS `protocolo`, esus_covisa.DT_NOTIFIC AS datanot,
       "COVID-19" AS agravo, esus_covisa.NM_PACIENT AS nome,CONCAT("0", esus_covisa.NU_IDADE,"A") AS idade,
       IF(esus_covisa.CS_SEXO='Feminino','F','M') AS sexo, DATE_FORMAT(CURRENT_DATE,'%d/%m/%Y') AS dataentrada,CONCAT(LEFT(esus_covisa.SEM_PRI,4),"SE") AS se,
       esus_covisa.DT_SIN_PRI AS data1sint, cnes.estabelecimento AS localate,
       esus_covisa.NU_TELEFONE AS tel, esus_covisa.NU_NUMERO AS num,esus_covisa.NM_COMPLEM AS comp, esus_covisa.COD_DISTRI AS da, CONCAT(LEFT(esus_covisa.NU_CEP,2), MID(esus_covisa.NU_CEP,4)) AS cep,
       ruas_jacana_cep_esus.log AS log, UCASE(esus_covisa.NM_LOGRADO) AS rua, UCASE(esus_covisa.NM_BAIRRO) AS bairro, ruas_jacana_cep_esus.ubs AS localvd, "UVIS JACANA-TREMEMBE" AS suvis,
       "SAO PAULO" AS cidade, ruas_jacana_cep_esus.id AS idrua, "" AS dataobito,NOW() AS criado, ruas_jacana_cep_esus.latitude AS latsv2, ruas_jacana_cep_esus.longitude AS longsv2,
       "sisdamweb D788796" AS usuariocad, "" AS alterado, "" AS usuarioalt, "" AS ocorrencia, "suvis" AS tipo, 0 AS lixeira
FROM esus_covisa
         LEFT JOIN ruas_jacana_cep_esus ON (esus_covisa.NU_CEP = ruas_jacana_cep_esus.cep)
         LEFT JOIN cnes ON (esus_covisa.OP_CNES = cnes.cnes)
         LEFT JOIN sv2 ON (esus_covisa.NU_NOTIFIC = sv2.protocolo)
WHERE sv2.protocolo IS NULL;

-- Scrip para criar Se na tabela aline
INSERT INTO esus_aline_atual_final_mes
SELECT esus_aline_atual_final.NOME, esus_aline_atual_final.`PROT_ESUS`, esus_aline_atual_final.`DT_NOTIFIC`,esus_aline_atual_final.`TEL`,
       esus_aline_atual_final.`CAD_EXAME`, esus_aline_atual_final.`PROF_SAUDE`,
       esus_aline_atual_final.`UBS_ABRANG`, esus_aline_atual_final.`LOCAL_ATEND`, esus_aline_atual_final.`TIP_TEST`, esus_aline_atual_final.`DT_PCR_RAP`,
       esus_aline_atual_final.`RES_PCR_RAP_ESUS`,esus_aline_atual_final.`DT_SORO_ESUS`,esus_aline_atual_final.`RES_IGM_ESUS`,
       esus_aline_atual_final.`RES_IGG_ESUS`, esus_aline_atual_final.`RES_IGA_ESUS`, esus_aline_atual_final.`RES_TOT_ESUS`,
       esus_aline_atual_final.`DT_COL_UVIS`, esus_aline_atual_final.`RES_UVIS`, esus_aline_atual_final.`CLASS_FIN`,
       esus_aline_atual_final.`EVOLUCAO`, esus_aline_atual_final.INFO, esus_aline_atual_final.`CONT_EF_1_S_2_N`,
       esus_aline_atual_final.`1_CURA_2_INT_3_TENT_ESG_4_OBT`, esus_aline_atual_final.`DT_ALT_OBT`, esus_aline_atual_final.`MT_NAO_LOC`,
       esus_aline_atual_final.`DT_SINT`,esus_aline_atual_final.SE_DT_SINT , esus_aline_atual_final.RACA_COR, esus_aline_atual_final.SINT_GUST, esus_aline_atual_final.SINT_OLF,
       esus_aline_atual_final.SINT_ASS, esus_aline_atual_final.DESC_SINT,esus_aline_atual_final.DT_NASC, esus_aline_atual_final.DT_ENC,esus_aline_atual_final.NT_CNES,
       cnes.estabelecimento AS UN_NOTIFIC, esus_aline_atual_final.NT_EMAIL, esus_aline_atual_final.NT_NOME
FROM esus_aline_atual_final LEFT JOIN cnes ON esus_aline_atual_final.`NT_CNES` = cnes.`cnes`;

-- Comando SQL para apagar um ou mais dos de cada registro duplicado esus_total (mantém um dos registros)
DELETE a FROM esus_total AS a, esus_total AS b WHERE a.`Número da Notificação` IS NOT NULL AND b.`Número da Notificação`
IS NOT NULL AND a.`Número da Notificação` > 1 AND b.`Número da Notificação` > 1 AND a.`Número da Notificação`=b.`Número da Notificação`
AND a.id < b.id

-- Comando SQL para apagar um ou mais dos de cada registro duplicado esus_total (mantém um dos registros)
DELETE a FROM sv2 AS a, sv2 AS b WHERE a.`protocolo` IS NOT NULL AND b.`protocolo`
IS NOT NULL AND a.`protocolo` > 1 AND b.`protocolo` > 1 AND a.`protocolo`=b.`protocolo`
AND a.id < b.id

-- Comando SQL para apagar um ou mais dos de cada registro duplicado esus_aline_atual_final (mantém um dos registros)
DELETE a FROM esus_aline_atual_final AS a, esus_aline_atual_final AS b WHERE a.`PROT_ESUS` IS NOT NULL AND b.`PROT_ESUS`
IS NOT NULL AND a.`PROT_ESUS` > 1 AND b.`PROT_ESUS` > 1 AND a.`PROT_ESUS`=b.`PROT_ESUS`
AND a.id < b.id



