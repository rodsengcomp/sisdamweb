-- Comandos sql para atualizar tabelas do banco de dados do esus - covisa --
-- Autor: Rodolfo Romaioli Ribeiro de Jesus - rodolfo.romaioli@gmail.com
-- Criado: 15/04/2020 11:30
-- Alterado em 01/04/2019 às 10:26
-- Última alteração em 25/08/2020

-- esus atualizado para a aline (esus total)
insert esus_aline_atual
SELECT esus_aline.NOME, esus_total.`Número da Notificação` AS `PROT_ESUS`, esus_total.`Data da Notificação` AS `DT_NOTIFIC`,
esus_aline.`CAD_EXAME`, IF(esus_total.`É profissional de saúde?`='Sim','SIM','NAO') AS `PROF_SAUDE`,
esus_aline.`UBS_ABRANG`, esus_aline.`LOCAL_ATEND`, esus_total.`Tipo de Teste` AS `TIP_TEST`,
esus_total.`Data do Teste (PCR/Rápidos)` AS `DT_PCR_RAP`,
UCASE(esus_total.`Resultado (PCR/Rápidos)`) AS `RES_PCR_RAP_ESUS`,
esus_total.`Data do Teste (Sorologico)` AS `DT_SORO_ESUS`,UCASE(esus_total.`Resultado IgM`) AS `RES_IGM_ESUS`,
UCASE(esus_total.`Resultado IgG`) AS `RES_IGG_ESUS`, UCASE(esus_total.`Resultado IgA`) AS `RES_IGA_ESUS`,
UCASE(esus_total.`Resultado Totais`) AS `RES_TOT_ESUS`,esus_aline.`DT_COL_UVIS`, esus_aline.`RES_UVIS`,
UCASE(esus_total.`Classificação Final`) AS `CLASS_FIN`, UCASE(esus_total.`Evolução Caso`) AS `EVOLUCAO`,
esus_aline.INFO, esus_aline.`CONT_EF_1_S_2_N`, esus_aline.`1_CURA_2_INT_3_TENT_ESG_4_OBT`, esus_aline.`DT_ALT_OBT`,
esus_aline.`MT_NAO_LOC`,esus_aline.`DT_SINT`,esus_aline.`SE_DT_SINT`,
UCASE(esus_total.`Raça/Cor`) AS RACA_COR, esus_total.`CEP` AS `CEP_ALINE`
FROM esus_total RIGHT JOIN esus_aline ON esus_total.`Número da Notificação` = esus_aline.`PROT_ESUS`

-- esus atualizado para a aline (esus total)
insert esus_aline_atual_final
SELECT esus_aline_atual.NOME, esus_aline_atual.`PROT_ESUS`, esus_aline_atual.`DT_NOTIFIC`,
esus_aline_atual.`CAD_EXAME`, esus_aline_atual.`PROF_SAUDE`,
ruas_jacana_cep_esus.ubs AS `UBS_ABRANG`, esus_aline_atual.`LOCAL_ATEND`, esus_aline_atual.`TIP_TEST`, esus_aline_atual.`DT_PCR_RAP`,
esus_aline_atual.`RES_PCR_RAP_ESUS`, esus_aline_atual.`DT_SORO_ESUS`,esus_aline_atual.`RES_IGM_ESUS`,esus_aline_atual.`RES_IGG_ESUS`,
esus_aline_atual.`RES_IGA_ESUS`,esus_aline_atual.`RES_TOT_ESUS`,esus_aline_atual.`DT_COL_UVIS`, esus_aline_atual.`RES_UVIS`,
esus_aline_atual.`CLASS_FIN`, esus_aline_atual.`EVOLUCAO`, esus_aline_atual.INFO, esus_aline_atual.`CONT_EF_1_S_2_N`,
esus_aline_atual.`1_CURA_2_INT_3_TENT_ESG_4_OBT`, esus_aline_atual.`DT_ALT_OBT`, esus_aline_atual.`MT_NAO_LOC`,esus_aline_atual.`DT_SINT`,
esus_aline_atual.`SE_DT_SINT`, esus_aline_atual.RACA_COR, esus_aline_atual.CEP_ALINE
FROM ruas_jacana_cep_esus RIGHT JOIN esus_aline_atual ON ruas_jacana_cep_esus.`CEP` = esus_aline_atual.`CEP_ALINE`

-- Comando SQL para apagar um ou mais dos de cada registro duplicado (mantém um dos registros)
DELETE a FROM esus_aline_atual_final AS a, esus_aline_atual_final AS b WHERE a.`PROT_ESUS` IS NOT NULL AND b.`PROT_ESUS` IS NOT NULL AND a.`PROT_ESUS` > 1 AND b.`PROT_ESUS` > 1 AND a.`PROT_ESUS`=b.`PROT_ESUS` AND a.id < b.id
