



SELECT esus_aline_atual_final.NOME, esus_aline_atual_final.`PROT_ESUS`, esus_aline_atual_final.`DT_NOTIFIC`,esus_aline_atual_final.`TEL`,
       esus_aline_atual_final.`PROF_SAUDE`,
       esus_aline_atual_final.`UBS_ABRANG`, esus_aline_atual_final.`DATA_BANCO`, esus_aline_atual_final.`TIP_TEST`, esus_aline_atual_final.`DT_PCR_RAP`,
       esus_aline_atual_final.`RES_PCR_RAP_ESUS`,esus_aline_atual_final.`DT_SORO_ESUS`,esus_aline_atual_final.`RES_IGM_ESUS`,
       esus_aline_atual_final.`RES_IGG_ESUS`, esus_aline_atual_final.`RES_IGA_ESUS`, esus_aline_atual_final.`RES_TOT_ESUS`,
       esus_aline_atual_final.`DT_COL_UVIS`, esus_aline_atual_final.`RES_UVIS`, esus_aline_atual_final.`CLASS_FIN`,
       esus_aline_atual_final.`EVOLUCAO`, esus_aline_atual_final.INFO, esus_aline_atual_final.`CONT_EF_1_S_2_N`,
       esus_aline_atual_final.`1_CURA_2_INT_3_TENT_ESG_4_OBT`, esus_aline_atual_final.`DT_ALT_OBT`, esus_aline_atual_final.`MT_NAO_LOC`,
       esus_aline_atual_final.`DT_SINT`,esus_aline_atual_final.SE_DT_SINT , esus_aline_atual_final.RACA_COR, esus_aline_atual_final.SINT_GUST, esus_aline_atual_final.SINT_OLF,
       esus_aline_atual_final.SINT_ASS, esus_aline_atual_final.DESC_SINT,esus_aline_atual_final.DT_NASC, esus_aline_atual_final.DT_ENC,esus_aline_atual_final.NT_CNES,
       esus_aline_atual_final.NT_EMAIL, esus_aline_atual_final.NT_NOME, result_bio.`Unidade`, result_bio.`Posto`, result_bio.`Nome do paciente`, result_bio.`Código SUS`,
       result_bio.`Exame realizado`, result_bio.`Idade`, result_bio.`Data de nascimento`,
       result_bio.`Data de cadastro`, result_bio.`Sexo`, result_bio.`Número da requisição`, result_bio.`Nome do solicitante`, result_bio.`Material coletado`, result_bio.`Resultado`
FROM esus_aline_atual_final LEFT JOIN result_bio ON esus_aline_atual_final.`NOME` = `Nome do paciente`
WHERE esus_aline_atual_final.DT_NASC = result_bio.`Data de nascimento`;

SELECT esus_aline_atual_final.NOME, esus_aline_atual_final.`PROT_ESUS`, esus_aline_atual_final.`DT_NOTIFIC`, esus_aline_atual_final.`UBS_ABRANG`,
       esus_aline_atual_final.`DATA_BANCO`, esus_aline_atual_final.`TIP_TEST`, esus_aline_atual_final.`DT_PCR_RAP`,
       esus_aline_atual_final.`RES_PCR_RAP_ESUS`,esus_aline_atual_final.`DT_SORO_ESUS`,esus_aline_atual_final.`RES_IGM_ESUS`,
       esus_aline_atual_final.`RES_IGG_ESUS`, esus_aline_atual_final.`RES_IGA_ESUS`, esus_aline_atual_final.`RES_TOT_ESUS`,
       esus_aline_atual_final.`DT_COL_UVIS`, esus_aline_atual_final.`RES_UVIS`, esus_aline_atual_final.`CLASS_FIN`,
       esus_aline_atual_final.`EVOLUCAO`, esus_aline_atual_final.INFO, esus_aline_atual_final.`CONT_EF_1_S_2_N`,
       esus_aline_atual_final.`1_CURA_2_INT_3_TENT_ESG_4_OBT`, esus_aline_atual_final.`DT_ALT_OBT`, esus_aline_atual_final.`MT_NAO_LOC`,
       esus_aline_atual_final.`DT_SINT`,esus_aline_atual_final.SE_DT_SINT , esus_aline_atual_final.RACA_COR, esus_aline_atual_final.SINT_GUST, esus_aline_atual_final.SINT_OLF,
       esus_aline_atual_final.SINT_ASS, esus_aline_atual_final.DESC_SINT,esus_aline_atual_final.DT_NASC, esus_aline_atual_final.DT_ENC,esus_aline_atual_final.NT_CNES,
       esus_aline_atual_final.NT_EMAIL, esus_aline_atual_final.NT_NOME, result_bio.`Unidade`, result_bio.`Posto`, result_bio.`Nome do paciente`, result_bio.`Código SUS`,
       result_bio.`Exame realizado`, result_bio.`Idade`, result_bio.`Data de nascimento`,
       result_bio.`Data de cadastro`, result_bio.`Sexo`, result_bio.`Número da requisição`, result_bio.`Nome do solicitante`, result_bio.`Material coletado`, result_bio.`Resultado`
FROM esus_aline_atual_final LEFT JOIN result_bio ON esus_aline_atual_final.`NOME` = `Nome do solicitante`
WHERE esus_aline_atual_final.DT_NASC = result_bio.`Data de nascimento`;