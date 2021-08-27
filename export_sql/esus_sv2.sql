SELECT esus.`Número da Notificação`, esus.`Data da Notificação`, esus.`Nome Completo`, sv2.agravo, sv2.protocolo, sv2.datanot
FROM esus INNER JOIN sv2 ON (esus.`Data da Notificação` = sv2.datanot) AND (esus.`Nome Completo` = sv2.nome)
WHERE (((sv2.agravo)="COVID-19" Or (sv2.agravo)="SRAG"));

SELECT sv2.`id`, sv2.`sinan`, sivep.`prot_sivep` AS `protocolo`, sv2.`datanot`, sv2.`agravo`, sv2.`nome`, sv2.`idade`, sv2.`sexo`,
sv2.`dataentrada`,sv2.`se`,sv2.`data1sint`, sv2.`localate`, sv2.`tel`, sv2.`num`, sv2.`comp`, sv2.`da`, sv2.`cep`, sv2.`log`, sv2.`rua`,
sv2.`bairro`, sv2.`localvd`,sv2.`suvis`, sv2.`cidade`, sv2.`idrua`, sv2.`dataobito`, sv2.`criado`, sv2.`latsv2`, sv2.`longsv2`, sv2.`usuariocad`,
sv2.`alterado`, sv2.`usuarioalt`,sv2.`ocorrencia`, sv2.`tipo`
FROM sivep INNER JOIN sv2 ON (sivep.`dt_notific_sivep` = sv2.`datanot`) AND (sivep.`nome_sivep` = sv2.`nome`);

SELECT sv2.`id`, sv2.`sinan`, esus.`prot_esus` AS `protocolo`, sv2.`datanot`, sv2.`agravo`, sv2.`nome`, sv2.`idade`, sv2.`sexo`,
sv2.`dataentrada`,sv2.`se`,sv2.`data1sint`, sv2.`localate`, sv2.`tel`, sv2.`num`, sv2.`comp`, sv2.`da`, sv2.`cep`, sv2.`log`, sv2.`rua`,
sv2.`bairro`, sv2.`localvd`,sv2.`suvis`, sv2.`cidade`, sv2.`idrua`, sv2.`dataobito`, sv2.`criado`, sv2.`latsv2`, sv2.`longsv2`, sv2.`usuariocad`,
sv2.`alterado`, sv2.`usuarioalt`,sv2.`ocorrencia`, sv2.`tipo`
FROM esus INNER JOIN sv2 ON (esus.`dt_notific_esus` = sv2.`datanot`) AND (esus.`nome_esus` = sv2.`nome`);

SELECT sv2.`id`, sv2.`sinan`, sivep.`prot_sivep` AS `protocolo`, sv2.`datanot`, sv2.`agravo`, sv2.`nome`, sv2.`idade`, sv2.`sexo`, sv2.`dataentrada`,sv2.`se`,sv2.`data1sint`, sv2.`localate`, sv2.`tel`, sv2.`num`, sv2.`comp`, sv2.`da`, sv2.`cep`, sv2.`log`, sv2.`rua`, sv2.`bairro`, sv2.`localvd`,sv2.`suvis`, sv2.`cidade`, sv2.`idrua`, sv2.`dataobito`, sv2.`criado`, sv2.`latsv2`, sv2.`longsv2`, sv2.`usuariocad`, sv2.`alterado`, sv2.`usuarioalt`,sv2.`ocorrencia`, sv2.`tipo` FROM sivep RIGHT OUTER JOIN sv2 ON (sivep.`dt_notific_sivep` = sv2.`datanot`) AND (sivep.`nome_sivep` = sv2.`nome`) ORDER BY `sv2`.`id` ASC

SELECT sv2.`id`, sivep.`prot_sivep` AS `protocolo`, sv2.`datanot`,sivep.`dt_notific_sivep` FROM sivep INNER JOIN sv2 ON sivep.`nome_sivep` = sv2.`nome`

-- Exportando novos resultados do esus total
LOAD DATA INFILE 'C:/Users/Rodolfo/Downloads/projeto_sv2_08072020/esus_0.csv'
INTO TABLE `esus_total`
CHARACTER SET latin1
FIELDS TERMINATED BY ';'
IGNORE 1 ROWS

-- Exportando novos resultados do esus aline
LOAD DATA INFILE 'C:/Users/Rodolfo/Downloads/projeto_sv2_08072020/esus_aline.csv'
INTO TABLE `esus_aline`
CHARACTER SET latin1
FIELDS TERMINATED BY ';'
IGNORE 1 ROWS

-- Select que verifica novos casos na tabela esus e caso positivo insere todos os novos casos na tabela sv2
insert into sv2
SELECT SV2.id, "0000000" AS sinan, esus.`Número da Notificação` AS `protocolo`, esus.`Data da Notificação` AS datanot, "COVID-19" AS agravo, esus.`Nome Completo` AS nome,CONCAT(FLOOR(DATEDIFF(CURDATE(),esus.`Data de Nascimento`) / 365.25),"A") AS idade, esus.`Sexo` AS sexo, DATE_FORMAT(CURRENT_DATE,'%d/%m/%Y') AS dataentrada, (SELECT SEMEPI FROM ruas_jacana_cep_esus WHERE DASE =DATE_FORMAT(CURRENT_DATE,'%d/%m/%Y')) AS se,esus.`Data do início dos sintomas` AS data1sint, "BANCO E-ESUS" AS localate, esus.`Telefone Celular` AS tel, esus.`Número (ou SN para Sem Número)` AS num,esus.`Complemento` AS comp, esus.Da AS da, esus.`cep` AS cep, ruas_jacana_cep_esus.Log AS log, ruas_jacana_cep_esus.ENDEREÇO AS rua, ruas_jacana_cep_esus.BAIRRO AS bairro, ruas_jacana_cep_esus.UBS AS localvd, "UVIS JACANA-TREMEMBE" AS suvis,"SAO PAULO" AS cidade, ruas_jacana_cep_esus.ID AS idrua, "" AS dataobito, CURRENT_TIMESTAMP AS criado, ruas_jacana_cep_esus.LAT AS latsv2, ruas_jacana_cep_esus.LONG AS longsv2, "sisdamweb D788796" AS usuariocad, "" AS alterado, "" AS usuarioalt, SV2.nome AS ocorrencia, "suvis" AS tipo FROM SV2 RIGHT JOIN (ruas_jacana_cep_esus INNER JOIN esus ON ruas_jacana_cep_esus.ENDEREÇO = esus.Logradouro) ON SV2.nome = esus.`Nome Completo`WHERE (((SV2.nome) Is Null) AND ((ruas_jacana_cep_esus.CEP) In (SELECT CEP FROM ruas_jacana_cep_esus As Tmp GROUP BY CEP HAVING Count(*)=1)) AND ((esus.`Evolução Caso`)<>"Cancelado" OR (esus.`Evolução Caso`)="" OR (esus.`Evolução Caso`) IS NULL));

SELECT sv2.`protocolo`, sv2.`agravo`, sv2.`nome`, esus.nome_esus, esus.prot_esus FROM sv2 INNER JOIN esus ON sv2.nome = esus.nome_esus WHERE (((esus.prot_esus) In (SELECT prot_esus FROM `esus` As Tmp GROUP BY prot_esus HAVING Count(*)=1)))

SELECT sv2.id,sv2.`protocolo`, sv2.`agravo`, sv2.`nome`, esus.nome_esus, esus.prot_esus FROM esus RIGHT JOIN sv2 ON esus.nome_esus = sv2.nome WHERE (((esus.prot_esus) In (SELECT prot_esus FROM `esus` As Tmp GROUP BY prot_esus HAVING Count(*)=1))) ORDER BY `sv2`.`id` ASC