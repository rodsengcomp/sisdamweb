-- Comandos sql para atualizar tabelas do banco de dados do esus - covisa --
-- Autor: Rodolfo Romaioli Ribeiro de Jesus - rodolfo.romaioli@gmail.com
-- Criado: 15/04/2020 11:30
-- Alterado em 01/04/2019 às 10:26
-- Última alteração em 25/08/2020

-- Limpando dados das tabelas abaixo para iniciar as atualizações
TRUNCATE TABLE esus;
TRUNCATE TABLE esus_total;
TRUNCATE TABLE esus_aline;
TRUNCATE TABLE esus_aline_atual;
TRUNCATE TABLE esus_aline_atual_final;
TRUNCATE TABLE esus_aline_atual_final_mes;


-- 1º passo : Carregar os registros extraidos no mês do sistema esus-notifica para atualizar o banco - Acesse https://notifica.saude.gov.br/exportacoes

LOAD DATA INFILE 'e:/csv/esus/esus_/esus_0803_2.csv'
INTO TABLE `esus_total`
CHARACTER SET utf8
FIELDS TERMINATED BY ';'
IGNORE 1 ROWS;

-- inserindo o campo "id" na tabela "esus_total"
ALTER TABLE `esus_total` ADD `id` INT NOT NULL AUTO_INCREMENT FIRST, ADD PRIMARY KEY (`id`);

-- deletando os ceps na tabela "esus_total" diferentes dos iniciados por "02.2" ou "02.3"
DELETE a FROM `esus_total` AS a WHERE a.CEP NOT LIKE '02.2%' AND `CEP` NOT LIKE '02.3%';

-- deletandos as linnhas duplicadas da tabela "esus_total"
DELETE a FROM `esus_total` AS a, `esus_total` AS b WHERE a.
`Número da Notificação`=b.`Número da Notificação` AND a.id < b.id;

-- DELETE a FROM `esus_total` AS a WHERE a.`Número da Notificação` < 100;

-- após todas as tratativas com a tabela "esus_total" apagando a coluna "id" da tabela
ALTER TABLE `esus_total` DROP `id`;

-- 2º Passo : Carregar tabela online Uvis e-SUS

-- Importar tabela diária Aline Esus (Copiar a tabela online e colocar excel local e editar campos protocolo e cadastro exame para numero)
LOAD DATA INFILE 'e:/csv/esus/esus_/esus_aline_.csv'
INTO TABLE `esus_aline`
CHARACTER SET utf8
FIELDS TERMINATED BY ';'
IGNORE 1 ROWS;

ALTER TABLE `esus_aline` ADD `id` INT NOT NULL AUTO_INCREMENT FIRST, ADD PRIMARY KEY (`id`);

DELETE a FROM `esus_aline` AS a, `esus_aline` AS b WHERE a.
`PROT_ESUS`=b.`PROT_ESUS` AND a.id < b.id;

DELETE a FROM `esus_aline` AS a WHERE a.`PROT_ESUS` < 100;

ALTER TABLE `esus_aline` DROP id;

-- 3º Passo : Cruzar os dados da tabela diária Aline Esus com o banco extraído do e-SUS Notifica

-- atualizar os dados da tabela esus_aline (https://docs.google.com/spreadsheets/d/1ei-3Ga1F_FEfBzwaJBDwDBFt5Yn_vNmQKzmpHuzVksY/edit?usp=drive_web&ouid=114806634805489556928)
-- com os dados atuais da tabela esus_total (https://notifica.saude.gov.br/login)

insert esus_aline_atual
SELECT esus_total.`Nome Completo`, esus_aline.`PROT_ESUS`, esus_total.`Data da Notificação` AS `DT_NOTIFIC`,esus_total.`Telefone de Contato` AS TEL,
IF(esus_total.`É profissional de saúde?`='Sim','SIM','NAO') AS `PROF_SAUDE`,
esus_aline.`UBS_ABRANG`, esus_aline.`DATA_BANCO`, esus_total.`Tipo de Teste` AS `TIP_TEST`,
esus_total.`Data do Teste (PCR/Rápidos)` AS `DT_PCR_RAP`,
UCASE(esus_total.`Resultado (PCR/Rápidos)`) AS `RES_PCR_RAP_ESUS`,
esus_total.`Data do Teste (Sorologico)` AS `DT_SORO_ESUS`,UCASE(esus_total.`Resultado IgM`) AS `RES_IGM_ESUS`,
UCASE(esus_total.`Resultado IgG`) AS `RES_IGG_ESUS`, UCASE(esus_total.`Resultado IgA`) AS `RES_IGA_ESUS`,
UCASE(esus_total.`Resultado Totais`) AS `RES_TOT_ESUS`,esus_aline.`DT_COL_UVIS`, esus_aline.`RES_UVIS`,
UCASE(esus_total.`Classificação Final`) AS `CLASS_FIN`, UCASE(esus_total.`Evolução Caso`) AS `EVOLUCAO`,
esus_aline.INFO, esus_aline.`CONT_EF_1_S_2_N`, esus_aline.`1_CURA_2_INT_3_TENT_ESG_4_OBT`, esus_aline.`DT_ALT_OBT`,
esus_aline.`MT_NAO_LOC`,esus_aline.`DT_SINT`,esus_aline.`SE_DT_SINT`, UCASE(esus_total.`Raça/Cor`) AS RACA_COR,
IF (esus_total.`Sintoma- Distúrbios Gustativos`='Sim','SIM','NAO') AS SINT_GUST,
IF (esus_total.`Sintoma- Distúrbios Olfativos`='Sim','SIM','NAO') AS SINT_OLF,
IF (esus_total.`Sintoma- Assintomático`='Sim','SIM','NAO') AS SINT_ASS,
esus_total.`Descrição do Sintoma` AS DESC_SINT, esus_total.`Data de Nascimento` AS DT_NASC, esus_total.`Data de encerramento` AS DT_ENC,
esus_total.`Notificante CNES` AS NT_CNES, esus_aline.`UN_NOTIFIC`, esus_total.`Notificante Email` AS NT_EMAIL, esus_total.`Notificante Nome Completo` AS NT_NOME
FROM esus_total RIGHT JOIN esus_aline ON esus_total.`Número da Notificação` = esus_aline.`PROT_ESUS`;


-- 4º Passo : Cruzar os dados e inserir novos casos da tabela esus_total na tabela esus_aline_atual

-- Script para casos novos por cep de ruas (esus_total)
insert into esus_aline_atual
SELECT esus_total.`Nome Completo` AS NOME, esus_total.`Número da Notificação` AS `PROT_ESUS`, esus_total.`Data da Notificação` AS `DT_NOTIFIC`,esus_total.`Telefone de Contato` AS TEL,
IF(esus_total.`É profissional de saúde?`='Sim','SIM','NAO') AS `PROF_SAUDE`,
ruas_jacana_cep_esus.ubs AS `UBS_ABRANG`,
CONCAT("BANCO E-ESUS ",DATE_FORMAT(CURRENT_DATE,'%d')," DE ",CASE DATE_FORMAT(CURRENT_DATE,'%m')
when 1 then "JANEIRO"
when 2 then "FEVEREIRO"
when 3 then "MARCO"
when 4 then "ABRIL"
when 5 then "MAIO"
when 6 then "JUNHO"
when 7 then "JULHO"
when 8 then "AGOSTO"
when 9 then "SETEMBRO"
when 10 then "OUTUBRO"
when 11 then "NOVEMBRO"
when 12 then "DEZEMBRO"
end) AS `DATA_BANCO`, esus_total.`Tipo de Teste` AS `TIP_TEST`, esus_total.`Data do Teste (PCR/Rápidos)` AS `DT_PCR_RAP`,
UCASE(esus_total.`Resultado (PCR/Rápidos)`) AS `RES_PCR_RAP_ESUS`,
esus_total.`Data do Teste (Sorologico)` AS `DT_SORO_ESUS`,UCASE(esus_total.`Resultado IgM`) AS `RES_IGM_ESUS`,
UCASE(esus_total.`Resultado IgG`) AS `RES_IGG_ESUS`, UCASE(esus_total.`Resultado IgA`) AS `RES_IGA_ESUS`,
UCASE(esus_total.`Resultado Totais`) AS `RES_TOT_ESUS`,esus_aline.`DT_COL_UVIS`, esus_aline.`RES_UVIS`,
UCASE(esus_total.`Classificação Final`) AS `CLASS_FIN`, UCASE(esus_total.`Evolução Caso`) AS `EVOLUCAO`,
esus_aline.INFO, esus_aline.`CONT_EF_1_S_2_N`, esus_aline.`1_CURA_2_INT_3_TENT_ESG_4_OBT`, esus_aline.`DT_ALT_OBT`,
esus_aline.`MT_NAO_LOC`,esus_total.`Data da Notificação` AS `DT_SINT`,esus_aline.`SE_DT_SINT`,
UCASE(esus_total.`Raça/Cor`) AS RACA_COR,
IF (esus_total.`Sintoma- Distúrbios Gustativos`='Sim','SIM','NAO') AS SINT_GUST,
IF (esus_total.`Sintoma- Distúrbios Olfativos`='Sim','SIM','NAO') AS SINT_OLF,
IF (esus_total.`Sintoma- Assintomático`='Sim','SIM','NAO') AS SINT_ASS,
esus_total.`Descrição do Sintoma` AS DESC_SINT, esus_total.`Data de Nascimento` AS DT_NASC, esus_total.`Data de encerramento` AS DT_ENC,
esus_total.`Notificante CNES` AS NT_CNES, esus_aline.`UN_NOTIFIC`, esus_total.`Notificante Email` AS NT_EMAIL, esus_total.`Notificante Nome Completo` AS NT_NOME
FROM esus_aline RIGHT JOIN (esus_total INNER JOIN ruas_jacana_cep_esus ON esus_total.CEP = ruas_jacana_cep_esus.cep)
ON esus_aline.`PROT_ESUS` = esus_total.`Número da Notificação` WHERE (((UCase(esus_total.`Evolução Caso`))<>"Cancelado" Or
(UCase(esus_total.`Evolução Caso`))="" Or (UCase(esus_total.`Evolução Caso`)) Is Null) AND ((esus_aline.NOME) Is Null) AND
((ruas_jacana_cep_esus.cep) In (SELECT `cep` FROM `ruas_jacana_cep_esus` As Tmp GROUP BY `cep` HAVING Count(*)=1 )));

-- 5° Passo : Atualização da semana epidemiologica na data da dos primeiros sintomas

-- Scrip para criar Se na tabela aline
INSERT INTO esus_aline_atual_final
SELECT esus_aline_atual.NOME, esus_aline_atual.`PROT_ESUS`, esus_aline_atual.`DT_NOTIFIC`,esus_aline_atual.`TEL`,
esus_aline_atual.`PROF_SAUDE`,
esus_aline_atual.`UBS_ABRANG`, esus_aline_atual.`DATA_BANCO`, esus_aline_atual.`TIP_TEST`, esus_aline_atual.`DT_PCR_RAP`,
esus_aline_atual.`RES_PCR_RAP_ESUS`,esus_aline_atual.`DT_SORO_ESUS`,esus_aline_atual.`RES_IGM_ESUS`,
esus_aline_atual.`RES_IGG_ESUS`, esus_aline_atual.`RES_IGA_ESUS`, esus_aline_atual.`RES_TOT_ESUS`,
esus_aline_atual.`DT_COL_UVIS`, esus_aline_atual.`RES_UVIS`, esus_aline_atual.`CLASS_FIN`,
esus_aline_atual.`EVOLUCAO`, esus_aline_atual.INFO, esus_aline_atual.`CONT_EF_1_S_2_N`,
esus_aline_atual.`1_CURA_2_INT_3_TENT_ESG_4_OBT`, esus_aline_atual.`DT_ALT_OBT`, esus_aline_atual.`MT_NAO_LOC`,
esus_aline_atual.`DT_SINT`,se.se , esus_aline_atual.RACA_COR, esus_aline_atual.SINT_GUST, esus_aline_atual.SINT_OLF,
esus_aline_atual.SINT_ASS, esus_aline_atual.DESC_SINT,esus_aline_atual.DT_NASC, esus_aline_atual.DT_ENC,esus_aline_atual.NT_CNES, esus_aline_atual.`UN_NOTIFIC`,
esus_aline_atual.NT_EMAIL, esus_aline_atual.NT_NOME
FROM esus_aline_atual LEFT JOIN se ON esus_aline_atual.`DT_SINT` = se.`dataentrada`;

-- Scrip para criar Se na tabela aline
INSERT INTO esus_aline_atual_final_mes
SELECT esus_aline_atual_final.NOME, esus_aline_atual_final.`PROT_ESUS`, esus_aline_atual_final.`DT_NOTIFIC`,esus_aline_atual_final.`TEL`,
       esus_aline_atual_final.`PROF_SAUDE`,
       esus_aline_atual_final.`UBS_ABRANG`, esus_aline_atual_final.`DATA_BANCO`, esus_aline_atual_final.`TIP_TEST`, esus_aline_atual_final.`DT_PCR_RAP`,
       esus_aline_atual_final.`RES_PCR_RAP_ESUS`,esus_aline_atual_final.`DT_SORO_ESUS`,esus_aline_atual_final.`RES_IGM_ESUS`,
       esus_aline_atual_final.`RES_IGG_ESUS`, esus_aline_atual_final.`RES_IGA_ESUS`, esus_aline_atual_final.`RES_TOT_ESUS`,
       esus_aline_atual_final.`DT_COL_UVIS`, esus_aline_atual_final.`RES_UVIS`, esus_aline_atual_final.`CLASS_FIN`,
       esus_aline_atual_final.`EVOLUCAO`, esus_aline_atual_final.INFO, esus_aline_atual_final.`CONT_EF_1_S_2_N`,
       esus_aline_atual_final.`1_CURA_2_INT_3_TENT_ESG_4_OBT`, esus_aline_atual_final.`DT_ALT_OBT`, esus_aline_atual_final.`MT_NAO_LOC`,
       esus_aline_atual_final.`DT_SINT`,esus_aline_atual_final.SE_DT_SINT , esus_aline_atual_final.RACA_COR, esus_aline_atual_final.SINT_GUST, esus_aline_atual_final.SINT_OLF,
       esus_aline_atual_final.SINT_ASS, esus_aline_atual_final.DESC_SINT,esus_aline_atual_final.DT_NASC, esus_aline_atual_final.DT_ENC,esus_aline_atual_final.NT_CNES, cnes.estabelecimento AS UN_NOTIFIC,
       esus_aline_atual_final.NT_EMAIL, esus_aline_atual_final.NT_NOME
FROM esus_aline_atual_final LEFT JOIN cnes ON esus_aline_atual_final.`NT_CNES` = cnes.`cnes`;

-- 6º Passo (Apenas se no script 5º Passo acima apresentar novas linhas inseridas):

-- Script para cruzar esus_total (banco Inteiro) com esus Aline Atual Final
insert into esus
SELECT esus_total.`Número da Notificação`, esus_total.`Data da Notificação`, esus_total.`Telefone de Contato`, UCASE(esus_aline_atual_final_mes.`NOME`) AS `Nome Completo`,
CONCAT(RIGHT(esus_total.`Data de Nascimento`,4),"-",MID(esus_total.`Data de Nascimento`,4,2),"-", (LEFT(esus_total.`Data de Nascimento`,2))) AS `Data de Nascimento`,
IF(esus_total.`Sexo`='Feminino','F','M') AS `Sexo`, esus_aline_atual_final_mes.`DT_SINT`,
esus_aline_atual_final_mes.`SE_DT_SINT`, esus_total.`Telefone Celular`, CONCAT(LEFT(esus_total.CEP,2), MID(esus_total.CEP,4)) AS `cep`,
UCase(esus_total.Logradouro) AS `Logradouro`,esus_total.Bairro, esus_total.`Número (ou SN para Sem Número)`, esus_total.Complemento,
esus_aline_atual_final_mes.`UBS_ABRANG` AS Ubs, "UVIS JACANA-TREMEMBE" AS UVIS, "" AS LATSIRGAS,"" AS LONSIRGAS, "" AS Da,
esus_aline_atual_final_mes.`NT_CNES` AS CNES, esus_aline_atual_final_mes.UN_NOTIFIC AS unidade_de_atendimento
FROM esus_total INNER JOIN esus_aline_atual_final_mes ON esus_total.`Número da Notificação` = esus_aline_atual_final_mes.`PROT_ESUS`
WHERE esus_total.`Evolução Caso`<>'Cancelado';


                                        PARA ATUALIZAR OS CASOS DO ANO DE 2021
-- 7º Passo :

-- Script para inserção de casos novos no sv2 (Apenas se no script 5º Passo acima apresentar novas linhas inseridas):
insert into sv2
SELECT "" AS id, "0000000" AS sinan, esus.`Número da Notificação` AS `protocolo`, esus.`Data da Notificação` AS datanot,
"COVID-19" AS agravo, esus.`Nome Completo` AS nome,CONCAT(FLOOR(DATEDIFF(CURDATE(),esus.`Data de Nascimento`) / 365.25),"A") AS idade,
esus.`Sexo` AS sexo, DATE_FORMAT(CURRENT_DATE,'%d/%m/%Y') AS dataentrada,esus.`Se Dt Sint` AS se,esus.`Data do início dos sintomas` AS data1sint,
esus.unidade_de_atendimento AS localate,
esus.`Telefone Celular` AS tel, esus.`Número (ou SN para Sem Número)` AS num,esus.`Complemento` AS comp, esus.Da AS da, esus.`cep` AS cep,
"" AS log, esus.Logradouro AS rua, "" AS bairro, esus.Ubs AS localvd, "UVIS JACANA-TREMEMBE" AS suvis,
"SAO PAULO" AS cidade, "" AS idrua, "" AS dataobito,NOW() AS criado, esus.LATSIRGAS AS latsv2, esus.LONSIRGAS AS longsv2,
"sisdamweb D791749" AS usuariocad, "" AS alterado, "" AS usuarioalt, "" AS ocorrencia, "suvis" AS tipo
FROM sv2 RIGHT JOIN esus ON sv2.protocolo = esus.`Número da Notificação`
WHERE sv2.protocolo IS NULL;


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


                                    PARA ATUALIZAR OS CASOS DO ANO DE 2020

-- Script para inserção de casos novos no sv2 (Apenas se no script 5º Passo acima apresentar novas linhas inseridas):
insert into sv2_2020
SELECT "" AS id, "0000000" AS sinan, esus.`Número da Notificação` AS `protocolo`, esus.`Data da Notificação` AS datanot,
"COVID-19" AS agravo, esus.`Nome Completo` AS nome,CONCAT(FLOOR(DATEDIFF(CURDATE(),esus.`Data de Nascimento`) / 365.25),"A") AS idade,
esus.`Sexo` AS sexo, DATE_FORMAT(CURRENT_DATE,'%d/%m/%Y') AS dataentrada,esus.`Se Dt Sint` AS se,esus.`Data do início dos sintomas` AS data1sint,
esus.unidade_de_atendimento AS localate,
esus.`Telefone Celular` AS tel, esus.`Número (ou SN para Sem Número)` AS num,esus.`Complemento` AS comp, esus.Da AS da, esus.`cep` AS cep,
"" AS log, esus.Logradouro AS rua, "" AS bairro, esus.Ubs AS localvd, "UVIS JACANA-TREMEMBE" AS suvis,
"SAO PAULO" AS cidade, "" AS idrua, "" AS dataobito,NOW() AS criado, esus.LATSIRGAS AS latsv2, esus.LONSIRGAS AS longsv2,
"sisdamweb D791749" AS usuariocad, "" AS alterado, "" AS usuarioalt, "" AS ocorrencia, "suvis" AS tipo
FROM sv2_2020 RIGHT JOIN esus ON sv2_2020.protocolo = esus.`Número da Notificação`
WHERE sv2_2020.protocolo IS NULL;
