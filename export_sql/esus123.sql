-- Limpando dados das tabelas abaixo para iniciar as atualizações
TRUNCATE TABLE esus_total;
TRUNCATE TABLE esus_covisa;
TRUNCATE TABLE esus_sv2;
TRUNCATE TABLE esus_aline;
TRUNCATE TABLE esus_aline_atual;
TRUNCATE TABLE esus_aline_atual_final;
TRUNCATE TABLE esus_aline_atual_final_esus;
TRUNCATE TABLE esus_aline_atual_final_mes;

-- 1º passo :
--
-- Carregar os registros extraidos no mês do sistema esus-notifica para atualizar o banco - Acesse https://notifica.saude.gov.br/exportacoes
LOAD DATA INFILE 'e:/csv/esus/esus_/esus_0803_2.csv'
INTO TABLE `esus_total`
CHARACTER SET utf8
FIELDS TERMINATED BY ';'
IGNORE 1 ROWS;

-- Carregar os registros extraidos no mês do Covisa Intranet para atualizar o banco - Acesse http://covisa.prodam/SUVIS/Resp.aspx (ESUSVEGEO_NORTE.ZIP)
LOAD DATA INFILE 'e:/csv/esus/esus_3108/esus_covisa_mar_20.csv'
INTO TABLE `esus_covisa`
CHARACTER SET utf8
FIELDS TERMINATED BY ';'
IGNORE 1 ROWS;



-- 2º Passo : Cruzar os dados e inserir novos casos das tabelas esus_covisa x esus_total na tabela esus_aline

-- Script para casos novos esus_covisa x esus_total
insert into esus_aline
SELECT DISTINCT esus_total.`Nome Completo` AS NOME, esus_total.`Número da Notificação` AS `PROT_ESUS`, esus_total.`Data da Notificação` AS `DT_NOTIFIC`,esus_total.`Telefone de Contato` AS TEL,
                IF(esus_total.`É profissional de saúde?`='Sim','SIM','NAO') AS `PROF_SAUDE`, "" AS `UBS_ABRANG`,
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
                    end) AS `DATA_BANCO`, esus_total.`Tipo de Teste` AS `TIP_TEST`, esus_total.`Data do Teste (PCR/Rápidos)` AS `DT_PCR_RAP`, UCASE(esus_total.`Resultado (PCR/Rápidos)`) AS `RES_PCR_RAP_ESUS`,
                esus_total.`Data do Teste (Sorologico)` AS `DT_SORO_ESUS`,UCASE(esus_total.`Resultado IgM`) AS `RES_IGM_ESUS`, UCASE(esus_total.`Resultado IgG`) AS `RES_IGG_ESUS`, UCASE(esus_total.`Resultado IgA`) AS `RES_IGA_ESUS`,
                UCASE(esus_total.`Resultado Totais`) AS `RES_TOT_ESUS`,"" AS `DT_COL_UVIS`, "" AS `RES_UVIS`, UCASE(esus_total.`Classificação Final`) AS `CLASS_FIN`, UCASE(esus_total.`Evolução Caso`) AS `EVOLUCAO`,
                "" AS INFO, "" AS `CONT_EF_1_S_2_N`, "" AS `1_CURA_2_INT_3_TENT_ESG_4_OBT`, "" AS `DT_ALT_OBT`, "" AS `MT_NAO_LOC`,esus_total.`Data da Notificação` AS `DT_SINT`,"" AS `SE_DT_SINT`,
                UCASE(esus_total.`Raça/Cor`) AS RACA_COR,
                IF (esus_total.`Sintoma- Distúrbios Gustativos`='Sim','SIM','NAO') AS SINT_GUST,
                IF (esus_total.`Sintoma- Distúrbios Olfativos`='Sim','SIM','NAO') AS SINT_OLF,
                IF (esus_total.`Sintoma- Assintomático`='Sim','SIM','NAO') AS SINT_ASS,
                esus_total.`Descrição do Sintoma` AS DESC_SINT, esus_total.`Data de Nascimento` AS DT_NASC, esus_total.`Data de encerramento` AS DT_ENC,
                esus_total.`Notificante CNES` AS NT_CNES, "" AS `UN_NOTIFIC`, esus_total.`Notificante Email` AS NT_EMAIL, esus_total.`Notificante Nome Completo` AS NT_NOME,
                esus_total.`CEP` AS CEP, IF(esus_total.`Sexo`='Feminino','F','M') AS `SEXO`, esus_total.`Número (ou SN para Sem Número)` AS NU_NM, esus_total.Complemento AS NM_COMP
FROM esus_covisa LEFT JOIN esus_total ON esus_covisa.`NU_NOTIFIC` = esus_total.`Número da Notificação` WHERE esus_total.`Evolução Caso`<>'CANCELADO' ;

-- 3º Passo : Cruzar os dados de ruas com esus_aline e inserir novos casos da tabela esus_aline_atual com UBS por cep

-- Script para casos novos por cep de ruas (esus_total)
insert into esus_aline_atual
SELECT DISTINCT esus_aline.NOME, esus_aline.`PROT_ESUS`, esus_aline.`DT_NOTIFIC`,esus_aline.TEL, esus_aline.`PROF_SAUDE`, ruas_jacana_cep_esus.ubs AS `UBS_ABRANG`,
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
                    end) AS `DATA_BANCO`, esus_aline.`TIP_TEST`, esus_aline.`DT_PCR_RAP`, esus_aline.`RES_PCR_RAP_ESUS`, esus_aline.`DT_SORO_ESUS`,esus_aline.`RES_IGM_ESUS`,
                esus_aline.`RES_IGG_ESUS`, esus_aline.`RES_IGA_ESUS`, esus_aline.`RES_TOT_ESUS`,"" AS `DT_COL_UVIS`, "" AS `RES_UVIS`, esus_aline.`CLASS_FIN`, esus_aline.`EVOLUCAO`,
                "" AS INFO, "" AS `CONT_EF_1_S_2_N`, "" AS `1_CURA_2_INT_3_TENT_ESG_4_OBT`, "" AS `DT_ALT_OBT`, "" AS `MT_NAO_LOC`,esus_aline.`DT_SINT`,"" AS `SE_DT_SINT`, esus_aline.RACA_COR,
                esus_aline.SINT_GUST,esus_aline.SINT_OLF, esus_aline.SINT_ASS, esus_aline.DESC_SINT, esus_aline.DT_NASC, esus_aline.DT_ENC, esus_aline.NT_CNES, "" AS `UN_NOTIFIC`,
                esus_aline.NT_EMAIL, esus_aline.NT_NOME, esus_aline.CEP, esus_aline.SEXO, esus_aline.NU_NM, esus_aline.NM_COMP
FROM esus_aline LEFT JOIN ruas_jacana_cep_esus ON esus_aline.CEP = ruas_jacana_cep_esus.cep;

-- inserindo o campo "id" na tabela "esus_aline_atual" para futuro dell de casos duplicados
ALTER TABLE `esus_aline_atual` ADD `id` INT NOT NULL AUTO_INCREMENT FIRST, ADD PRIMARY KEY (`id`);

-- deletandos as linhas duplicadas da tabela "esus_aline_atual"
DELETE a FROM `esus_aline_atual` AS a, `esus_aline_atual` AS b WHERE a.
PROT_ESUS=b.PROT_ESUS AND a.id < b.id;

-- após todas as tratativas de dell com a tabela "esus_aline_atual" apagando a coluna "id" da tabela
ALTER TABLE `esus_aline_atual` DROP `id`;

-- 4° Passo : Atualização da semana epidemiologica na data da dos primeiros sintomas e inserção dos dados na tabela "esus_aline_atual_final"

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
       esus_aline_atual.NT_EMAIL, esus_aline_atual.NT_NOME, esus_aline_atual.CEP, esus_aline_atual.SEXO, esus_aline_atual.NU_NM, esus_aline_atual.NM_COMP
FROM esus_aline_atual LEFT JOIN se ON esus_aline_atual.`DT_SINT` = se.`dataentrada`;


-- 5° Passo : Atualização das unidades notificantes por CNES com nome da unidade e inserção dos dados na tabela "esus_aline_atual_final_mes"

INSERT INTO esus_aline_atual_final_esus
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
       esus_aline_atual_final.NT_EMAIL, esus_aline_atual_final.NT_NOME, esus_aline_atual_final.CEP, esus_aline_atual_final.SEXO, esus_aline_atual_final.NU_NM, esus_aline_atual_final.NM_COMP
FROM esus_aline_atual_final LEFT JOIN cnes ON esus_aline_atual_final.`NT_CNES` = cnes.`cnes`;

-- Aqui extrair a tabela "esus_aline_atual_final_mes" no formato de excel

-- 6º Passo : Cruzar esus_total (banco Inteiro) com esus Aline Atual Final para

insert into esus_sv2
SELECT esus_aline_atual_final_esus.PROT_ESUS, esus_aline_atual_final_esus.DT_NOTIFIC, UCASE(esus_aline_atual_final_esus.NOME),
       CONCAT(RIGHT(esus_aline_atual_final_esus.DT_NASC,4),"-",MID(esus_aline_atual_final_esus.DT_NASC,4,2),"-", (LEFT(esus_aline_atual_final_esus.DT_NASC,2))),
       esus_aline_atual_final_esus.SEXO, esus_aline_atual_final_esus.DT_SINT, esus_aline_atual_final_esus.SE_DT_SINT,
       esus_aline_atual_final_esus.TEL AS TEL_CEL, CONCAT(LEFT(esus_aline_atual_final_esus.CEP,2), MID( esus_aline_atual_final_esus.CEP,4)), ruas_jacana_cep_esus.log AS LOG,
       ruas_jacana_cep_esus.rua AS RUA, ruas_jacana_cep_esus.bairro AS BAIRRO, esus_aline_atual_final_esus.NU_NM, esus_aline_atual_final_esus.NM_COMP AS Complemento,
       ruas_jacana_cep_esus.id AS IDRUA, ruas_jacana_cep_esus.ubs AS UBS, "UVIS JACANA-TREMEMBE" AS uvis, ruas_jacana_cep_esus.latitude AS latsv2,
       ruas_jacana_cep_esus.longitude AS longsv2, ruas_jacana_cep_esus.da AS da, esus_aline_atual_final_esus.UN_NOTIFIC AS UN_NOT
FROM esus_aline_atual_final_esus LEFT JOIN ruas_jacana_cep_esus ON esus_aline_atual_final_esus.CEP = ruas_jacana_cep_esus.cep;

-- inserindo o campo "id" na tabela "esus_aline_atual" para futuro dell de casos duplicados
ALTER TABLE `esus_sv2` ADD `id` INT NOT NULL AUTO_INCREMENT FIRST, ADD PRIMARY KEY (`id`);

-- deletandos as linnhas duplicadas da tabela "esus_total"
DELETE a FROM `esus_sv2` AS a, `esus_sv2` AS b WHERE a.PROT_ESUS=b.PROT_ESUS AND a.id < b.id;

-- após todas as tratativas com a tabela "esus_total" apagando a coluna "id" da tabela
ALTER TABLE `esus_sv2` DROP `id`;

-- 7° Passo : Atualização das unidades notificantes por CNES com nome da unidade e inserção dos dados na tabela "esus_aline_atual_final_mes"

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
       esus_aline_atual_final.SINT_ASS, esus_aline_atual_final.DESC_SINT,esus_aline_atual_final.DT_NASC, esus_aline_atual_final.DT_ENC,esus_aline_atual_final.NT_CNES, esus_aline_atual_final.UN_NOTIFIC,
       esus_aline_atual_final.NT_EMAIL, esus_aline_atual_final.NT_NOME
FROM esus_aline_atual_final;

PARA ATUALIZAR OS CASOS DO ANO DE 2021

-- 8º Passo :

-- Script para inserção de casos novos no sv2 (Apenas se no script 5º Passo acima apresentar novas linhas inseridas):
insert into sv2
SELECT "" AS id, "0000000" AS sinan, esus_sv2.PROT_ESUS AS protocolo, esus_sv2.DT_NOTIFIC AS datanot, "COVID-19" AS agravo, esus_sv2.NOME AS nome,
       CONCAT(FLOOR(DATEDIFF(CURDATE(),esus_sv2.DT_NASC) / 365.25),"A") AS idade, esus_sv2.SEXO AS sexo, DATE_FORMAT(CURRENT_DATE,'%d/%m/%Y') AS dataentrada,
       esus_sv2.SE_DT_SINT AS se,esus_sv2.DT_SINT AS data1sint, esus_sv2.UN_NOT AS localate, esus_sv2.TEL_CEL AS tel, esus_sv2.NU_NM AS num,esus_sv2.NM_COMP AS comp,
       esus_sv2.DA AS da, esus_sv2.CEP AS cep, esus_sv2.LOG AS log, esus_sv2.RUA AS rua, esus_sv2.BAIRRO AS bairro, esus_sv2.UBS AS localvd, "UVIS JACANA-TREMEMBE" AS suvis,
       "SAO PAULO" AS cidade, esus_sv2.ID_RUA AS idrua, "" AS dataobito,NOW() AS criado, esus_sv2.LATSIRGAS AS latsv2, esus_sv2.LONSIRGAS AS longsv2,
       "sisdamweb D788796" AS usuariocad, "" AS alterado, "" AS usuarioalt, "" AS ocorrencia, "suvis" AS tipo, '0' AS lixeira
FROM sv2 RIGHT JOIN esus_sv2 ON sv2.protocolo = esus_sv2.PROT_ESUS
WHERE sv2.protocolo IS NULL;


-- Comando SQL para apagar um ou mais dos de cada registro duplicado esus_total (mantém um dos registros)
DELETE a FROM esus_total AS a, esus_total AS b WHERE a.`Número da Notificação` IS NOT NULL AND b.`Número da Notificação`
IS NOT NULL AND a.`Número da Notificação` > 1 AND b.`Número da Notificação` > 1 AND a.`Número da Notificação`=b.`Número da Notificação`
AND a.id < b.id;

-- Comando SQL para apagar um ou mais dos de cada registro duplicado esus_total (mantém um dos registros)
DELETE a FROM sv2 AS a, sv2 AS b WHERE a.`protocolo` IS NOT NULL AND b.`protocolo`
IS NOT NULL AND a.`protocolo` > 1 AND b.`protocolo` > 1 AND a.`protocolo`=b.`protocolo`
AND a.id < b.id;

-- Comando SQL para apagar um ou mais dos de cada registro duplicado esus_aline_atual_final (mantém um dos registros)
DELETE a FROM esus_aline_atual_final AS a, esus_aline_atual_final AS b WHERE a.`PROT_ESUS` IS NOT NULL AND b.`PROT_ESUS`
IS NOT NULL AND a.`PROT_ESUS` > 1 AND b.`PROT_ESUS` > 1 AND a.`PROT_ESUS`=b.`PROT_ESUS`
AND a.id < b.id;

                   -- PARA ATUALIZAR OS CASOS DO ANO DE 2020

-- Script para inserção de casos novos no sv2 (Apenas se no script 5º Passo acima apresentar novas linhas inseridas):
insert into sv2_2020
SELECT "" AS id, "0000000" AS sinan, esus_sv2.PROT_ESUS AS protocolo, esus_sv2.DT_NOTIFIC AS datanot, "COVID-19" AS agravo, esus_sv2.NOME AS nome,
       CONCAT(FLOOR(DATEDIFF(CURDATE(),esus_sv2.DT_NASC) / 365.25),"A") AS idade, esus_sv2.SEXO AS sexo, DATE_FORMAT(CURRENT_DATE,'%d/%m/%Y') AS dataentrada,
       esus_sv2.SE_DT_SINT AS se,esus_sv2.DT_SINT AS data1sint, esus_sv2.UN_NOT AS localate, esus_sv2.TEL_CEL AS tel, esus_sv2.NU_NM AS num,esus_sv2.NM_COMP AS comp,
       esus_sv2.DA AS da, esus_sv2.CEP AS cep, esus_sv2.LOG AS log, esus_sv2.RUA AS rua, esus_sv2.BAIRRO AS bairro, esus_sv2.UBS AS localvd, "UVIS JACANA-TREMEMBE" AS suvis,
       "SAO PAULO" AS cidade, esus_sv2.ID_RUA AS idrua, "" AS dataobito,NOW() AS criado, esus_sv2.LATSIRGAS AS latsv2, esus_sv2.LONSIRGAS AS longsv2,
       "sisdamweb D788796" AS usuariocad, "" AS alterado, "" AS usuarioalt, "" AS ocorrencia, "suvis" AS tipo, '0' AS lixeira
FROM sv2_2020 RIGHT JOIN esus_sv2 ON sv2_2020.protocolo = esus_sv2.PROT_ESUS
WHERE sv2_2020.protocolo IS NULL;