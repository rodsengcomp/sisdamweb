-- Comandos sql para consultar tabelas do banco de dados de violencia para a Aline --
-- Autor: Rodolfo Romaioli Ribeiro de Jesus - rodolfo.romaioli@gmail.com
-- Criado: 29/07/2021 08:30

-- Limpando dados das tabelas abaixo para iniciar as atualizações
TRUNCATE TABLE sv2_2020;
TRUNCATE TABLE vio_2020;
TRUNCATE TABLE vio_aline_2020;


-- 1º passo : Limpar as tabelas violenet
TRUNCATE TABLE violenet;
TRUNCATE TABLE violenetuvis;

-- 2º passo : Carregar a tabela violenet
LOAD DATA INFILE 'E:/csv/VIOLENET.csv'
INTO TABLE `violenet` CHARACTER SET latin1 FIELDS TERMINATED BY ';' IGNORE 1 ROWS;

-- 3º Passo : Filtrar os dados da tabela violenet e inseri-los na tabela violenetuvis
INSERT INTO violenetuvis
SELECT NU_NOTIFIC, DT_NOTIFIC, NM_PACIENT, CONCAT(RIGHT(violenet.DT_NASC,4),"-",MID(violenet.DT_NASC,4,2),"-", (LEFT(violenet.DT_NASC,2))) AS NU_IDADE_N, CS_SEXO,
       DT_OCOR, ID_UNIDADE, CONCAT("(",DDD,")",FONE) AS TEL, NU_NUMERO, DS_COMPL, ID_BAIRRO,
       CONCAT("0", LEFT(violenet.NU_CEP,4),"-", RIGHT (violenet.NU_CEP,3)) AS NU_CEP, NM_LOGRADO,DT_OBITO
FROM `violenet`;

-- 4º Passo : Filtrar casos por endereço e distrito 70

INSERT INTO sv2_violencia_2020_uvis
SELECT distinct "" AS id, NU_NOTIFIC AS sinan, "" AS `protocolo`, DT_NOTIFIC AS datanot,
       "VIOLENCIA INTERPESSOAL/AUTO PROVOCADA" AS agravo, NM_PACIENT AS nome,CONCAT(FLOOR(DATEDIFF(CURDATE(),NU_IDADE_N) / 365.25),"A") AS idade,
       CS_SEXO AS sexo, DATE_FORMAT(CURRENT_DATE,'%d/%m/%Y') AS dataentrada,"32SE" AS se,DT_OCOR AS data1sint, ID_UNIDADE AS localate,
       TEL AS tel, NU_NUMERO AS num,DS_COMPL AS comp, ID_BAIRRO AS da, NU_CEP AS cep,
       ruas.log AS log, ruas.rua AS rua, ruas.bairro AS bairro, ruas.ubs AS localvd, "UVIS JACANA-TREMEMBE" AS suvis,
       "SAO PAULO" AS cidade, ruas.id AS idrua, DT_OBITO AS dataobito,NOW() AS criado, ruas.latitude AS latsv2, ruas.longitude AS longsv2,
       "sisdamweb D788796" AS usuariocad, "" AS alterado, "" AS usuarioalt, "" AS ocorrencia, "suvis" AS tipo, "0" AS lixeira
FROM violenetuvis LEFT JOIN ruas ON violenetuvis.NU_CEP = ruas.cep

INSERT INTO sv2_violencia_2020_uvis_final
SELECT "" AS id, sinan, "" AS protocolo, datanot, agravo, nome, idade, sexo, dataentrada, se, data1sint, cnes.estabelecimento AS localate,
       tel, num, comp, da, cep, log, rua, bairro, localvd, suvis, cidade, idrua, dataobito, sv2_violencia_2020_uvis.criado, latsv2, longsv2, sv2_violencia_2020_uvis.usuariocad, sv2_violencia_2020_uvis.alterado, sv2_violencia_2020_uvis.usuarioalt, ocorrencia,
       tipo, lixeira
FROM sv2_violencia_2020_uvis LEFT JOIN cnes ON sv2_violencia_2020_uvis.localate = cnes.cnes

    INSERT INTO sv2_2020
SELECT "" AS id, sv2_violencia_2020_uvis_final.sinan, "" AS protocolo, sv2_violencia_2020_uvis_final.datanot, sv2_violencia_2020_uvis_final.agravo,
sv2_violencia_2020_uvis_final.nome, sv2_violencia_2020_uvis_final.idade, sv2_violencia_2020_uvis_final.sexo, sv2_violencia_2020_uvis_final.dataentrada,
sv2_violencia_2020_uvis_final.se, sv2_violencia_2020_uvis_final.data1sint, sv2_violencia_2020_uvis_final.localate,sv2_violencia_2020_uvis_final.tel,
sv2_violencia_2020_uvis_final.num, sv2_violencia_2020_uvis_final.comp, sv2_violencia_2020_uvis_final.da, sv2_violencia_2020_uvis_final.cep, sv2_violencia_2020_uvis_final.log,
sv2_violencia_2020_uvis_final.rua, sv2_violencia_2020_uvis_final.bairro, sv2_violencia_2020_uvis_final.localvd, sv2_violencia_2020_uvis_final.suvis,
sv2_violencia_2020_uvis_final.cidade, sv2_violencia_2020_uvis_final.idrua, sv2_violencia_2020_uvis_final.dataobito, sv2_violencia_2020_uvis_final.criado,
sv2_violencia_2020_uvis_final.latsv2, sv2_violencia_2020_uvis_final.longsv2, sv2_violencia_2020_uvis_final.usuariocad, sv2_violencia_2020_uvis_final.alterado,
sv2_violencia_2020_uvis_final.usuarioalt, sv2_violencia_2020_uvis_final.ocorrencia, sv2_violencia_2020_uvis_final.tipo
FROM sv2_2020 RIGHT JOIN sv2_violencia_2020_uvis_final ON sv2_2020.sinan = sv2_violencia_2020_uvis_final.sinan
WHERE sv2_2020.sinan IS NULL
ORDER BY `sv2_violencia_2020_uvis_final`.`sinan` ASC

-- Comando SQL para apagar um ou mais dos de cada registro duplicado esus_total (mantém um dos registros)
DELETE a FROM sv2_violencia_2020_uvis_final AS a, sv2_violencia_2020_uvis_final AS b WHERE a.sinan IS NOT NULL AND b.sinan
IS NOT NULL AND a.sinan > 1 AND b.sinan > 1 AND a.sinan=b.sinan
AND a.id < b.id;

CREATE TABLE `violenetuvis` (`NU_NOTIFIC` varchar(7) DEFAULT NULL,`DT_NOTIFIC` varchar(10) DEFAULT NULL,`NM_PACIENT` varchar(49) DEFAULT NULL,`NU_IDADE_N` int(12) DEFAULT NULL,
                             `CS_SEXO` varchar(1) DEFAULT NULL,`DT_OCOR` varchar(10) DEFAULT NULL, `ID_UNIDADE` varchar(7) DEFAULT NULL, `TEL` varchar(15) DEFAULT NULL, `NU_NUMERO` varchar(6) DEFAULT NULL,
                             `DS_COMPL` varchar(30) DEFAULT NULL, `ID_BAIRRO` varchar(2) DEFAULT NULL, `NU_CEP` varchar(9) DEFAULT NULL, `NM_LOGRADO` varchar(59) DEFAULT NULL,
                             `DT_OBITO` varchar(10) DEFAULT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8;

















-- PARA ATUALIZAR OS CASOS DE VIOLENCIA ALINE - ANO DE 2020

SELECT vio_2020.NU_NOTIFIC AS sinan, vio_2020.DT_NOTIFIC AS datanot, vio_2020.ID_AGRAVO AS agravo, vio_2020.NM_PACIENT AS nome,vio_2020.DT_NASC AS idade, vio_2020.CS_SEXO AS sexo,
       vio_2020.DT_OCOR AS data1sint, vio_2020.ID_UNIDADE AS cnes_vio
FROM sv2_2020 RIGHT JOIN vio_2020 ON sv2_2020.sinan = vio_2020.NU_NOTIFIC
WHERE sv2_2020.sinan IS NULL

SELECT vio_aline_2020.sinan, vio_aline_2020.datanot, vio_aline_2020.agravo, vio_aline_2020.nome,vio_aline_2020.idade, vio_aline_2020.sexo, vio_aline_2020.data1sint, vio_aline_2020.cnes_vio AS cnes, cnes.estabelecimento AS notificante
FROM vio_aline_2020 LEFT JOIN cnes ON vio_aline_2020.cnes_vio = cnes.`cnes`;

-- Comando SQL para apagar um ou mais dos de cada registro duplicado esus_total (mantém um dos registros)
DELETE a FROM sv2_2020 AS a, sv2_2020 AS b WHERE a.`sinan` IS NOT NULL AND b.`sinan`
IS NOT NULL AND a.`sinan` > 1 AND b.`sinan` > 1 AND a.`sinan`=b.`sinan`
AND a.id < b.id;