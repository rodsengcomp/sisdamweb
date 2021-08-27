<?php
//Código desenvolvido por Rodolfo Romaioli Ribeiro de Jesus - início 13/06/2018
//Email: rodolfo.romaioli@gmail.com

//contagens
$count_ndoc = "COUNT($table_sql.nDoc)";

//exames
$positivo = 'Reagente';
$negativo = "Não Reagente";
$sem_col = "Exame Não Realizado";
$col_ina = "Coleta Inadequada";
$inconclusivo = "Inconclusivo";

//Unidades
$ama_joamar = 'AMA J JOAMAR'; $ama_wamberto = 'AMA WAMBERTO DIAS DA COSTA';
$ubs_albertina = 'UBS V ALBERTINA DR OSVALDO MARCAL'; $ubs_mariquinha = 'UBS DONA MARIQUINHA SCIASCIA'; $ubs_toledo = 'UBS DR JOSE TOLEDO PIZA'; $ubs_apuana = 'UBS J APUANA';
$ubs_flor = 'UBS J FLOR DE MAIO'; $ubs_fontalis = 'UBS J FONTALIS'; $ubs_joamar = 'UBS J JOAMAR'; $ubs_jacana = 'UBS JACANA'; $ubs_pedras = 'UBS JARDIM DAS PEDRAS';
$ubs_edu = 'UBS PQ EDU CHAVES'; $ubs_galvao = 'UBS V NOVA GALVAO'; $gonzaga = 'HOSP SAO LUIZ GONZAGA'; $ubs_jova = 'UBS JOVA RURAL';$ama_ubs_joamar = 'AMA UBS INTEGRADA J JOAMAR';

//Unidades de Residencia
$un_res = "SELECT COUNT($table_sql.nDoc) FROM $table_sql
WHERE UBS1='$ubs_albertina' OR UBS1='$ubs_apuana' OR UBS1='$ubs_edu' OR UBS1='$ubs_flor' OR UBS1='$ubs_fontalis' OR UBS1='$ubs_galvao' OR UBS1='$ubs_joamar' OR UBS1='$ubs_pedras'
OR UBS1='$ubs_jacana' OR UBS1='$ubs_mariquinha' OR UBS1='$ubs_toledo' OR UBS1='$ubs_jova'";

//Unidades de Notificação
$un_not = "SELECT COUNT($table_sql.nDoc)
FROM $table_sinan INNER JOIN $table_sql ON dengnet.NU_NOTIFIC = tbldengue.nDoc  
WHERE UnidadeNotificadora='$ubs_albertina' OR UnidadeNotificadora='$ubs_apuana' 
OR UnidadeNotificadora='$ubs_edu' OR UnidadeNotificadora='$ubs_flor' OR UnidadeNotificadora='$ubs_fontalis' OR UnidadeNotificadora='$ubs_galvao' 
OR UnidadeNotificadora='$ama_ubs_joamar' OR UnidadeNotificadora='$ubs_pedras' OR UnidadeNotificadora='$ubs_jacana' OR UnidadeNotificadora='$ubs_mariquinha' 
OR UnidadeNotificadora='$ubs_toledo' OR UnidadeNotificadora='$ubs_jova'";

//Ubs de Residencia
$ubs_res_albertina = "SELECT COUNT($table_sql.nDoc) FROM $table_sql WHERE UBS1='$ubs_albertina'";
$ubs_res_apuana = "SELECT COUNT($table_sql.nDoc) FROM $table_sql WHERE UBS1='$ubs_apuana'";
$ubs_res_edu = "SELECT COUNT($table_sql.nDoc) FROM $table_sql WHERE UBS1='$ubs_edu'";
$ubs_res_flor = "SELECT COUNT($table_sql.nDoc) FROM $table_sql WHERE UBS1='$ubs_flor'";
$ubs_res_fontalis = "SELECT COUNT($table_sql.nDoc) FROM $table_sql WHERE UBS1='$ubs_fontalis'";
$ubs_res_galvao = "SELECT COUNT($table_sql.nDoc) FROM $table_sql WHERE UBS1='$ubs_galvao'";
$ubs_res_joamar = "SELECT COUNT($table_sql.nDoc) FROM $table_sql WHERE UBS1='$ubs_joamar'";
$ubs_res_pedras = "SELECT COUNT($table_sql.nDoc) FROM $table_sql WHERE UBS1='$ubs_pedras'";
$ubs_res_jacana = "SELECT COUNT($table_sql.nDoc) FROM $table_sql WHERE UBS1='$ubs_jacana'";
$ubs_res_jova = "SELECT COUNT($table_sql.nDoc) FROM $table_sql WHERE UBS1='$ubs_jova'";
$ubs_res_mariquinha = "SELECT COUNT($table_sql.nDoc) FROM $table_sql WHERE UBS1='$ubs_mariquinha'";
$ubs_res_toledo = "SELECT COUNT($table_sql.nDoc) FROM $table_sql WHERE UBS1='$ubs_toledo'";

//Unidade Notificacao
$un_not_albertina = "SELECT COUNT($table_sql.nDoc) FROM $table_sql WHERE UnidadeNotificadora='$ubs_albertina'";
$un_not_ama_joamar = "SELECT COUNT($table_sql.nDoc) FROM $table_sql WHERE UnidadeNotificadora='$ama_joamar'";
$un_not_apuana = "SELECT COUNT($table_sql.nDoc) FROM $table_sql WHERE UnidadeNotificadora='$ubs_apuana'";
$un_not_edu = "SELECT COUNT($table_sql.nDoc) FROM $table_sql WHERE UnidadeNotificadora='$ubs_edu'";
$un_not_flor = "SELECT COUNT($table_sql.nDoc) FROM $table_sql WHERE UnidadeNotificadora='$ubs_flor'";
$un_not_fontalis = "SELECT COUNT($table_sql.nDoc) FROM $table_sql WHERE UnidadeNotificadora='$ubs_fontalis'";
$un_not_galvao = "SELECT COUNT($table_sql.nDoc) FROM $table_sql WHERE UnidadeNotificadora='$ubs_galvao'";
$un_not_joamar = "SELECT COUNT($table_sql.nDoc) FROM $table_sql WHERE UnidadeNotificadora LIKE '%JOAMAR%'";
$un_not_pedras = "SELECT COUNT($table_sql.nDoc) FROM $table_sql WHERE UnidadeNotificadora='$ubs_pedras'";
$un_not_jacana = "SELECT COUNT($table_sql.nDoc) FROM $table_sql WHERE UnidadeNotificadora='$ubs_jacana'";
$un_not_jova = "SELECT COUNT($table_sql.nDoc) FROM $table_sql WHERE UnidadeNotificadora='$ubs_jova'";
$un_not_mariquinha = "SELECT COUNT($table_sql.nDoc) FROM $table_sql WHERE UnidadeNotificadora='$ubs_mariquinha'";
$un_not_toledo = "SELECT COUNT($table_sql.nDoc) FROM $table_sql WHERE UnidadeNotificadora='$ubs_toledo'";
$un_not_gonzaga = "SELECT COUNT($table_sql.nDoc) FROM $table_sql WHERE UnidadeNotificadora='$gonzaga'";

//Sql Sem Coleta UBS
$sem_col_ubs_albertina = "SELECT COUNT($table_sql.nDoc) FROM $table_sql LEFT JOIN $table_ccz 
ON $table_sql.nDoc = $table_ccz.SINAN WHERE UBS1='$ubs_albertina' AND $table_sql.ResultadoTr='$sem_col' AND $table_ccz.Resultado_IgM_Focus IS NULL AND $table_ccz.Resultado_NS1 IS NULL;";
$sem_col_ubs_apuana = "SELECT COUNT($table_sql.nDoc) FROM $table_sql LEFT JOIN $table_ccz 
ON $table_sql.nDoc = $table_ccz.SINAN WHERE UBS1='$ubs_apuana' AND $table_sql.ResultadoTr='$sem_col' AND $table_ccz.Resultado_IgM_Focus IS NULL AND $table_ccz.Resultado_NS1 IS NULL;";
$sem_col_ubs_edu = "SELECT COUNT($table_sql.nDoc) FROM $table_sql LEFT JOIN $table_ccz 
ON $table_sql.nDoc = $table_ccz.SINAN WHERE UBS1='$ubs_edu' AND $table_sql.ResultadoTr='$sem_col' AND $table_ccz.Resultado_IgM_Focus IS NULL AND $table_ccz.Resultado_NS1 IS NULL;";
$sem_col_ubs_flor = "SELECT COUNT($table_sql.nDoc) FROM $table_sql LEFT JOIN $table_ccz 
ON $table_sql.nDoc = $table_ccz.SINAN WHERE UBS1='$ubs_flor' AND $table_sql.ResultadoTr='$sem_col' AND $table_ccz.Resultado_IgM_Focus IS NULL AND $table_ccz.Resultado_NS1 IS NULL;";
$sem_col_ubs_fontalis = "SELECT COUNT($table_sql.nDoc) FROM $table_sql LEFT JOIN $table_ccz 
ON $table_sql.nDoc = $table_ccz.SINAN WHERE UBS1='$ubs_fontalis' AND $table_sql.ResultadoTr='$sem_col' AND $table_ccz.Resultado_IgM_Focus IS NULL AND $table_ccz.Resultado_NS1 IS NULL;";
$sem_col_ubs_galvao = "SELECT COUNT($table_sql.nDoc) FROM $table_sql LEFT JOIN $table_ccz 
ON $table_sql.nDoc = $table_ccz.SINAN WHERE UBS1='$ubs_galvao' AND $table_sql.ResultadoTr='$sem_col' AND $table_ccz.Resultado_IgM_Focus IS NULL AND $table_ccz.Resultado_NS1 IS NULL;";
$sem_col_ubs_joamar = "SELECT COUNT($table_sql.nDoc) FROM $table_sql LEFT JOIN $table_ccz 
ON $table_sql.nDoc = $table_ccz.SINAN WHERE UBS1='$ubs_joamar' AND $table_sql.ResultadoTr='$sem_col' AND $table_ccz.Resultado_IgM_Focus IS NULL AND $table_ccz.Resultado_NS1 IS NULL;";
$sem_col_ubs_pedras = "SELECT COUNT($table_sql.nDoc) FROM $table_sql LEFT JOIN $table_ccz 
ON $table_sql.nDoc = $table_ccz.SINAN WHERE UBS1='$ubs_pedras' AND $table_sql.ResultadoTr='$sem_col' AND $table_ccz.Resultado_IgM_Focus IS NULL AND $table_ccz.Resultado_NS1 IS NULL;";
$sem_col_ubs_jova = "SELECT COUNT($table_sql.nDoc) FROM $table_sql LEFT JOIN $table_ccz 
ON $table_sql.nDoc = $table_ccz.SINAN WHERE UBS1='$ubs_jova' AND $table_sql.ResultadoTr='$sem_col' AND $table_ccz.Resultado_IgM_Focus IS NULL AND $table_ccz.Resultado_NS1 IS NULL;";
$sem_col_ubs_jacana = "SELECT COUNT($table_sql.nDoc) FROM $table_sql LEFT JOIN $table_ccz 
ON $table_sql.nDoc = $table_ccz.SINAN WHERE UBS1='$ubs_jacana' AND $table_sql.ResultadoTr='$sem_col' AND $table_ccz.Resultado_IgM_Focus IS NULL AND $table_ccz.Resultado_NS1 IS NULL;";
$sem_col_ubs_mariquinha = "SELECT COUNT($table_sql.nDoc) FROM $table_sql LEFT JOIN $table_ccz 
ON $table_sql.nDoc = $table_ccz.SINAN WHERE UBS1='$ubs_mariquinha' AND $table_sql.ResultadoTr='$sem_col' AND $table_ccz.Resultado_IgM_Focus IS NULL AND $table_ccz.Resultado_NS1 IS NULL;";
$sem_col_ubs_toledo = "SELECT COUNT($table_sql.nDoc) FROM $table_sql LEFT JOIN $table_ccz 
ON $table_sql.nDoc = $table_ccz.SINAN WHERE UBS1='$ubs_toledo' AND $table_sql.ResultadoTr='$sem_col' AND $table_ccz.Resultado_IgM_Focus IS NULL AND $table_ccz.Resultado_NS1 IS NULL;";

//Sql Coleta Inadequada UBS
$col_ina_ubs_albertina = "SELECT COUNT($table_sql.nDoc) FROM $table_sql LEFT JOIN $table_ccz 
ON $table_sql.nDoc = $table_ccz.SINAN WHERE UBS1='$ubs_albertina' AND $table_ccz.Resultado_IgM_Focus='$col_ina' 
OR UBS1='$ubs_albertina' AND $table_ccz.Resultado_NS1='$col_ina'";
$col_ina_ubs_apuana = "SELECT COUNT($table_sql.nDoc) FROM $table_sql LEFT JOIN $table_ccz 
ON $table_sql.nDoc = $table_ccz.SINAN WHERE UBS1='$ubs_apuana' AND $table_ccz.Resultado_IgM_Focus='$col_ina' 
OR UBS1='$ubs_apuana' AND $table_ccz.Resultado_NS1='$col_ina'";
$col_ina_ubs_edu = "SELECT COUNT($table_sql.nDoc) FROM $table_sql LEFT JOIN $table_ccz 
ON $table_sql.nDoc = $table_ccz.SINAN WHERE UBS1='$ubs_edu' AND $table_ccz.Resultado_IgM_Focus='$col_ina' 
OR UBS1='$ubs_edu' AND $table_ccz.Resultado_NS1='$col_ina'";
$col_ina_ubs_flor = "SELECT COUNT($table_sql.nDoc) FROM $table_sql LEFT JOIN $table_ccz 
ON $table_sql.nDoc = $table_ccz.SINAN WHERE UBS1='$ubs_flor' AND $table_ccz.Resultado_IgM_Focus='$col_ina' 
OR UBS1='$ubs_flor' AND $table_ccz.Resultado_NS1='$col_ina'";
$col_ina_ubs_fontalis = "SELECT COUNT($table_sql.nDoc) FROM $table_sql LEFT JOIN $table_ccz 
ON $table_sql.nDoc = $table_ccz.SINAN WHERE UBS1='$ubs_fontalis' AND $table_ccz.Resultado_IgM_Focus='$col_ina' 
OR UBS1='$ubs_fontalis' AND $table_ccz.Resultado_NS1='$col_ina'";
$col_ina_ubs_galvao = "SELECT COUNT($table_sql.nDoc) FROM $table_sql LEFT JOIN $table_ccz 
ON $table_sql.nDoc = $table_ccz.SINAN WHERE UBS1='$ubs_galvao' AND $table_ccz.Resultado_IgM_Focus='$col_ina' 
OR UBS1='$ubs_galvao' AND $table_ccz.Resultado_NS1='$col_ina'";
$col_ina_ubs_joamar = "SELECT COUNT($table_sql.nDoc) FROM $table_sql LEFT JOIN $table_ccz 
ON $table_sql.nDoc = $table_ccz.SINAN WHERE UBS1='$ubs_joamar' AND $table_ccz.Resultado_IgM_Focus='$col_ina' 
OR UBS1='$ubs_joamar' AND $table_ccz.Resultado_NS1='$col_ina'";
$col_ina_ubs_pedras = "SELECT COUNT($table_sql.nDoc) FROM $table_sql LEFT JOIN $table_ccz 
ON $table_sql.nDoc = $table_ccz.SINAN WHERE UBS1='$ubs_pedras' AND $table_ccz.Resultado_IgM_Focus='$col_ina' 
OR UBS1='$ubs_pedras' AND $table_ccz.Resultado_NS1='$col_ina'";
$col_ina_ubs_jacana = "SELECT COUNT($table_sql.nDoc) FROM $table_sql LEFT JOIN $table_ccz 
ON $table_sql.nDoc = $table_ccz.SINAN WHERE UBS1='$ubs_jacana' AND $table_ccz.Resultado_IgM_Focus='$col_ina' 
OR UBS1='$ubs_jacana' AND $table_ccz.Resultado_NS1='$col_ina'";
$col_ina_ubs_jova = "SELECT COUNT($table_sql.nDoc) FROM $table_sql LEFT JOIN $table_ccz 
ON $table_sql.nDoc = $table_ccz.SINAN WHERE UBS1='$ubs_jova' AND $table_ccz.Resultado_IgM_Focus='$col_ina' 
OR UBS1='$ubs_jova' AND $table_ccz.Resultado_NS1='$col_ina'";
$col_ina_ubs_mariquinha = "SELECT COUNT($table_sql.nDoc) FROM $table_sql LEFT JOIN $table_ccz 
ON $table_sql.nDoc = $table_ccz.SINAN WHERE UBS1='$ubs_mariquinha' AND $table_ccz.Resultado_IgM_Focus='$col_ina' 
OR UBS1='$ubs_mariquinha' AND $table_ccz.Resultado_NS1='$col_ina'";
$col_ina_ubs_toledo = "SELECT COUNT($table_sql.nDoc) FROM $table_sql LEFT JOIN $table_ccz 
ON $table_sql.nDoc = $table_ccz.SINAN WHERE UBS1='$ubs_toledo' AND $table_ccz.Resultado_IgM_Focus='$col_ina' 
OR UBS1='$ubs_toledo' AND $table_ccz.Resultado_NS1='$col_ina'";

//Inconclusivo CCZ
$inco_ubs_albertina = "SELECT COUNT($table_sql.nDoc) FROM $table_sql LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN
    WHERE UBS1='$ubs_albertina' AND $table_ccz.Resultado_IgM_Focus='$inconclusivo'
    OR UBS1='$ubs_albertina' AND $table_ccz.Resultado_NS1='$inconclusivo'";
$inco_ubs_apuana = "SELECT COUNT($table_sql.nDoc) FROM $table_sql LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN
    WHERE UBS1='$ubs_apuana' AND $table_ccz.Resultado_IgM_Focus='$inconclusivo'
    OR UBS1='$ubs_apuana' AND $table_ccz.Resultado_NS1='$inconclusivo'";
$inco_ubs_edu = "SELECT COUNT($table_sql.nDoc) FROM $table_sql LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN  
    WHERE UBS1='$ubs_edu' AND $table_ccz.Resultado_IgM_Focus='$inconclusivo'
    OR UBS1='$ubs_edu' AND $table_ccz.Resultado_NS1='$inconclusivo'";
$inco_ubs_flor = "SELECT COUNT($table_sql.nDoc) FROM $table_sql LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN  
    WHERE UBS1='$ubs_flor' AND $table_ccz.Resultado_IgM_Focus='$inconclusivo'
    OR UBS1='$ubs_flor' AND $table_ccz.Resultado_NS1='$inconclusivo'";
$inco_ubs_fontalis = "SELECT COUNT($table_sql.nDoc) FROM $table_sql LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN  
    WHERE UBS1='$ubs_fontalis' AND $table_ccz.Resultado_IgM_Focus='$inconclusivo'
    OR UBS1='$ubs_fontalis' AND $table_ccz.Resultado_NS1='$inconclusivo'";
$inco_ubs_galvao = "SELECT COUNT($table_sql.nDoc) FROM $table_sql LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN  
    WHERE UBS1='$ubs_galvao' AND $table_ccz.Resultado_IgM_Focus='$inconclusivo'
    OR UBS1='$ubs_galvao' AND $table_ccz.Resultado_NS1='$inconclusivo'";
$inco_ubs_joamar = "SELECT COUNT($table_sql.nDoc) FROM $table_sql LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN  
    WHERE UBS1='$ubs_joamar' AND $table_ccz.Resultado_IgM_Focus='$inconclusivo'
    OR UBS1='$ubs_joamar' AND $table_ccz.Resultado_NS1='$inconclusivo'";
$inco_ubs_pedras = "SELECT COUNT($table_sql.nDoc) FROM $table_sql LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN  
    WHERE UBS1='$ubs_pedras' AND $table_ccz.Resultado_IgM_Focus='$inconclusivo'
    OR UBS1='$ubs_pedras' AND $table_ccz.Resultado_NS1='$inconclusivo'";
$inco_ubs_jacana = "SELECT COUNT($table_sql.nDoc) FROM $table_sql LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN  
    WHERE UBS1='$ubs_jacana' AND $table_ccz.Resultado_IgM_Focus='$inconclusivo'
    OR UBS1='$ubs_jacana' AND $table_ccz.Resultado_NS1='$inconclusivo'";
$inco_ubs_jova = "SELECT COUNT($table_sql.nDoc) FROM $table_sql LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN  
    WHERE UBS1='$ubs_jova' AND $table_ccz.Resultado_IgM_Focus='$inconclusivo'
    OR UBS1='$ubs_jova' AND $table_ccz.Resultado_NS1='$inconclusivo'";
$inco_ubs_mariquinha = "SELECT COUNT($table_sql.nDoc) FROM $table_sql LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN  
    WHERE UBS1='$ubs_mariquinha' AND $table_ccz.Resultado_IgM_Focus='$inconclusivo'
    OR UBS1='$ubs_mariquinha' AND $table_ccz.Resultado_NS1='$inconclusivo'";
$inco_ubs_toledo = "SELECT COUNT($table_sql.nDoc) FROM $table_sql LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN  
    WHERE UBS1='$ubs_toledo' AND $table_ccz.Resultado_IgM_Focus='$inconclusivo'
    OR UBS1='$ubs_toledo' AND $table_ccz.Resultado_NS1='$inconclusivo'";

/*Sql IGM Positivo das Unidades (Panbio e Focus)*/
$igm_pos_ubs_albertina= "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC 
LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN
WHERE UBS1='$ubs_albertina' AND $table_ccz.Resultado_IgM_Focus='$positivo' AND $table_sinan.CLASSI_FIN>9
OR UBS1='$ubs_albertina' AND $table_ccz.Resultado_IgM_Panbio='$positivo' AND $table_sinan.CLASSI_FIN>9
OR UBS1='$ubs_albertina' AND $table_ccz.Resultado_Igm_Focus IS NULL AND RESUL_SORO='1' AND CLASSI_FIN>9
OR UBS1='$ubs_albertina' AND $table_ccz.Resultado_Igm_Panbio IS NULL AND RESUL_SORO='1' AND CLASSI_FIN>9";

$igm_pos_ubs_apuana = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC 
LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN
WHERE UBS1='$ubs_apuana' AND $table_ccz.Resultado_IgM_Focus='$positivo' AND $table_sinan.CLASSI_FIN>9
OR UBS1='$ubs_apuana' AND $table_ccz.Resultado_IgM_Panbio='$positivo' AND $table_sinan.CLASSI_FIN>9
OR UBS1='$ubs_apuana' AND $table_ccz.Resultado_Igm_Focus IS NULL AND RESUL_SORO='1' AND CLASSI_FIN>9
OR UBS1='$ubs_apuana' AND $table_ccz.Resultado_Igm_Panbio IS NULL AND RESUL_SORO='1' AND CLASSI_FIN>9";

$igm_pos_ubs_edu = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC 
LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN
WHERE UBS1='$ubs_edu' AND $table_ccz.Resultado_IgM_Focus='$positivo' AND $table_sinan.CLASSI_FIN>9
OR UBS1='$ubs_edu' AND $table_ccz.Resultado_IgM_Panbio='$positivo' AND $table_sinan.CLASSI_FIN>9
OR UBS1='$ubs_edu' AND $table_ccz.Resultado_Igm_Focus IS NULL AND RESUL_SORO='1' AND CLASSI_FIN>9
OR UBS1='$ubs_edu' AND $table_ccz.Resultado_Igm_Panbio IS NULL AND RESUL_SORO='1' AND CLASSI_FIN>9";

$igm_pos_ubs_flor = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC 
LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN
WHERE UBS1='$ubs_flor' AND $table_ccz.Resultado_IgM_Focus='$positivo' AND $table_sinan.CLASSI_FIN>9
OR UBS1='$ubs_flor' AND $table_ccz.Resultado_IgM_Panbio='$positivo' AND $table_sinan.CLASSI_FIN>9
OR UBS1='$ubs_flor' AND $table_ccz.Resultado_Igm_Focus IS NULL AND RESUL_SORO='1' AND CLASSI_FIN>9
OR UBS1='$ubs_flor' AND $table_ccz.Resultado_Igm_Panbio IS NULL AND RESUL_SORO='1' AND CLASSI_FIN>9";

$igm_pos_ubs_fontalis = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC 
LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN
WHERE UBS1='$ubs_fontalis' AND $table_ccz.Resultado_IgM_Focus='$positivo' AND $table_sinan.CLASSI_FIN>9
OR UBS1='$ubs_fontalis' AND $table_ccz.Resultado_IgM_Panbio='$positivo' AND $table_sinan.CLASSI_FIN>9
OR UBS1='$ubs_fontalis' AND $table_ccz.Resultado_Igm_Focus IS NULL AND RESUL_SORO='1' AND CLASSI_FIN>9
OR UBS1='$ubs_fontalis' AND $table_ccz.Resultado_Igm_Panbio IS NULL AND RESUL_SORO='1' AND CLASSI_FIN>9";

$igm_pos_ubs_galvao = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC 
LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN
WHERE UBS1='$ubs_galvao' AND $table_ccz.Resultado_IgM_Focus='$positivo' AND $table_sinan.CLASSI_FIN>9
OR UBS1='$ubs_galvao' AND $table_ccz.Resultado_IgM_Panbio='$positivo' AND $table_sinan.CLASSI_FIN>9
OR UBS1='$ubs_galvao' AND $table_ccz.Resultado_Igm_Focus IS NULL AND RESUL_SORO='1' AND CLASSI_FIN>9
OR UBS1='$ubs_galvao' AND $table_ccz.Resultado_Igm_Panbio IS NULL AND RESUL_SORO='1' AND CLASSI_FIN>9";

$igm_pos_ubs_joamar = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC 
LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN
WHERE UBS1='$ubs_joamar' AND $table_ccz.Resultado_IgM_Focus='$positivo' AND $table_sinan.CLASSI_FIN>9
OR UBS1='$ubs_joamar' AND $table_ccz.Resultado_IgM_Panbio='$positivo' AND $table_sinan.CLASSI_FIN>9
OR UBS1='$ubs_joamar' AND $table_ccz.Resultado_Igm_Focus IS NULL AND RESUL_SORO='1' AND CLASSI_FIN>9
OR UBS1='$ubs_joamar' AND $table_ccz.Resultado_Igm_Panbio IS NULL AND RESUL_SORO='1' AND CLASSI_FIN>9";

$igm_pos_ubs_pedras = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC 
LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN
WHERE UBS1='$ubs_pedras' AND $table_ccz.Resultado_IgM_Focus='$positivo' AND $table_sinan.CLASSI_FIN>9
OR UBS1='$ubs_pedras' AND $table_ccz.Resultado_IgM_Panbio='$positivo' AND $table_sinan.CLASSI_FIN>9
OR UBS1='$ubs_pedras' AND $table_ccz.Resultado_Igm_Focus IS NULL AND RESUL_SORO='1' AND CLASSI_FIN>9
OR UBS1='$ubs_pedras' AND $table_ccz.Resultado_Igm_Panbio IS NULL AND RESUL_SORO='1' AND CLASSI_FIN>9";

$igm_pos_ubs_jacana = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC 
LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN
WHERE UBS1='$ubs_jacana' AND $table_ccz.Resultado_IgM_Focus='$positivo' AND $table_sinan.CLASSI_FIN>9
OR UBS1='$ubs_jacana' AND $table_ccz.Resultado_IgM_Panbio='$positivo' AND $table_sinan.CLASSI_FIN>9
OR UBS1='$ubs_jacana' AND $table_ccz.Resultado_Igm_Focus IS NULL AND RESUL_SORO='1' AND CLASSI_FIN>9
OR UBS1='$ubs_jacana' AND $table_ccz.Resultado_Igm_Panbio IS NULL AND RESUL_SORO='1' AND CLASSI_FIN>9";

$igm_pos_ubs_jova = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC 
LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN
WHERE UBS1='$ubs_jova' AND $table_ccz.Resultado_IgM_Focus='$positivo' AND $table_sinan.CLASSI_FIN>9
OR UBS1='$ubs_jova' AND $table_ccz.Resultado_IgM_Panbio='$positivo' AND $table_sinan.CLASSI_FIN>9
OR UBS1='$ubs_jova' AND $table_ccz.Resultado_Igm_Focus IS NULL AND RESUL_SORO='1' AND CLASSI_FIN>9
OR UBS1='$ubs_jova' AND $table_ccz.Resultado_Igm_Panbio IS NULL AND RESUL_SORO='1' AND CLASSI_FIN>9";

$igm_pos_ubs_mariquinha = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC 
LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN
WHERE UBS1='$ubs_mariquinha' AND $table_ccz.Resultado_IgM_Focus='$positivo' AND $table_sinan.CLASSI_FIN>9
OR UBS1='$ubs_mariquinha' AND $table_ccz.Resultado_IgM_Panbio='$positivo' AND $table_sinan.CLASSI_FIN>9
OR UBS1='$ubs_mariquinha' AND $table_ccz.Resultado_Igm_Focus IS NULL AND RESUL_SORO='1' AND CLASSI_FIN>9
OR UBS1='$ubs_mariquinha' AND $table_ccz.Resultado_Igm_Panbio IS NULL AND RESUL_SORO='1' AND CLASSI_FIN>9";

$igm_pos_ubs_toledo = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC 
LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN
WHERE UBS1='$ubs_toledo' AND $table_ccz.Resultado_IgM_Focus='$positivo' AND $table_sinan.CLASSI_FIN>9
OR UBS1='$ubs_toledo' AND $table_ccz.Resultado_IgM_Panbio='$positivo' AND $table_sinan.CLASSI_FIN>9
OR UBS1='$ubs_toledo' AND $table_ccz.Resultado_Igm_Focus IS NULL AND RESUL_SORO='1' AND CLASSI_FIN>9
OR UBS1='$ubs_toledo' AND $table_ccz.Resultado_Igm_Panbio IS NULL AND RESUL_SORO='1' AND CLASSI_FIN>9";

/*Sql NS1 Positivo das Unidades*/
$ns1_pos_ubs_albertina = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC
LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN
WHERE UBS1='$ubs_albertina' AND $table_ccz.Resultado_NS1='$positivo' AND $table_sinan.CLASSI_FIN>9";

$ns1_pos_ubs_apuana = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC
LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN
WHERE UBS1='$ubs_apuana' AND $table_ccz.Resultado_NS1='$positivo' AND $table_sinan.CLASSI_FIN>9";

$ns1_pos_ubs_edu = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC
LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN
WHERE UBS1='$ubs_edu' AND $table_ccz.Resultado_NS1='$positivo' AND $table_sinan.CLASSI_FIN>9";

$ns1_pos_ubs_flor = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC
LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN
WHERE UBS1='$ubs_flor' AND $table_ccz.Resultado_NS1='$positivo' AND $table_sinan.CLASSI_FIN>9";

$ns1_pos_ubs_fontalis = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC
LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN
WHERE UBS1='$ubs_fontalis' AND $table_ccz.Resultado_NS1='$positivo' AND $table_sinan.CLASSI_FIN>9";

$ns1_pos_ubs_galvao = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC
LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN
WHERE UBS1='$ubs_galvao' AND $table_ccz.Resultado_NS1='$positivo' AND $table_sinan.CLASSI_FIN>9";

$ns1_pos_ubs_joamar = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC
LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN
WHERE UBS1='$ubs_joamar' AND $table_ccz.Resultado_NS1='$positivo' AND $table_sinan.CLASSI_FIN>9";

$ns1_pos_ubs_pedras = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC
LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN
WHERE UBS1='$ubs_pedras' AND $table_ccz.Resultado_NS1='$positivo' AND $table_sinan.CLASSI_FIN>9";

$ns1_pos_ubs_jacana = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC
LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN
WHERE UBS1='$ubs_jacana' AND $table_ccz.Resultado_NS1='$positivo' AND $table_sinan.CLASSI_FIN>9";

$ns1_pos_ubs_jova = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC
LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN
WHERE UBS1='$ubs_jova' AND $table_ccz.Resultado_NS1='$positivo' AND $table_sinan.CLASSI_FIN>9";

$ns1_pos_ubs_mariquinha = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC
LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN
WHERE UBS1='$ubs_mariquinha' AND $table_ccz.Resultado_NS1='$positivo' AND $table_sinan.CLASSI_FIN>9";

$ns1_pos_ubs_toledo = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC
LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN WHERE UBS1='$ubs_toledo' AND $table_ccz.Resultado_NS1='$positivo' AND $table_sinan.CLASSI_FIN>9";

/*Sql Teste Rápido Positivo das Unidades*/
$tr_pos_ubs_albertina = "SELECT COUNT($table_sql.nDoc) FROM $table_sql
INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC
LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN
WHERE UBS1='$ubs_albertina' AND $table_sql.ResultadoTr='$positivo' AND $table_ccz.Resultado_IgM_Focus IS NULL AND $table_sinan.CLASSI_FIN>9
OR UBS1='$ubs_albertina' AND $table_sql.ResultadoTr='$positivo' AND $table_ccz.Resultado_NS1 IS NULL AND $table_sinan.CLASSI_FIN>9";

$tr_pos_ubs_apuana = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN
    WHERE UBS1='$ubs_apuana' AND $table_sql.ResultadoTr='$positivo' AND $table_ccz.Resultado_IgM_Focus IS NULL AND $table_sinan.CLASSI_FIN>9
    OR UBS1='$ubs_apuana' AND $table_sql.ResultadoTr='$positivo' AND $table_ccz.Resultado_NS1 IS NULL AND $table_sinan.CLASSI_FIN>9";

$tr_pos_ubs_edu = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN  
    WHERE UBS1='$ubs_edu' AND $table_sql.ResultadoTr='$positivo' AND $table_ccz.Resultado_IgM_Focus IS NULL AND $table_sinan.CLASSI_FIN>9
    OR UBS1='$ubs_edu' AND $table_sql.ResultadoTr='$positivo' AND $table_ccz.Resultado_NS1 IS NULL AND $table_sinan.CLASSI_FIN>9";

$tr_pos_ubs_flor = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN  
    WHERE UBS1='$ubs_flor' AND $table_sql.ResultadoTr='$positivo' AND $table_ccz.Resultado_IgM_Focus IS NULL AND $table_sinan.CLASSI_FIN>9
    OR UBS1='$ubs_flor' AND $table_sql.ResultadoTr='$positivo' AND $table_ccz.Resultado_NS1 IS NULL AND $table_sinan.CLASSI_FIN>9";

$tr_pos_ubs_fontalis = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN  
    WHERE UBS1='$ubs_fontalis' AND $table_sql.ResultadoTr='$positivo' AND $table_ccz.Resultado_IgM_Focus IS NULL AND $table_sinan.CLASSI_FIN>9
    OR UBS1='$ubs_fontalis' AND $table_sql.ResultadoTr='$positivo' AND $table_ccz.Resultado_NS1 IS NULL AND $table_sinan.CLASSI_FIN>9";

$tr_pos_ubs_galvao = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN  
    WHERE UBS1='$ubs_galvao' AND $table_sql.ResultadoTr='$positivo' AND $table_ccz.Resultado_IgM_Focus IS NULL AND $table_sinan.CLASSI_FIN>9
    OR UBS1='$ubs_galvao' AND $table_sql.ResultadoTr='$positivo' AND $table_ccz.Resultado_NS1 IS NULL AND $table_sinan.CLASSI_FIN>9";

$tr_pos_ubs_joamar = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN  
    WHERE UBS1='$ubs_joamar' AND $table_sql.ResultadoTr='$positivo' AND $table_ccz.Resultado_IgM_Focus IS NULL AND $table_sinan.CLASSI_FIN>9
    OR UBS1='$ubs_joamar' AND $table_sql.ResultadoTr='$positivo' AND $table_ccz.Resultado_NS1 IS NULL AND $table_sinan.CLASSI_FIN>9";

$tr_pos_ubs_pedras = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN  
    WHERE UBS1='$ubs_pedras' AND $table_sql.ResultadoTr='$positivo' AND $table_ccz.Resultado_IgM_Focus IS NULL AND $table_sinan.CLASSI_FIN>9
    OR UBS1='$ubs_pedras' AND $table_sql.ResultadoTr='$positivo' AND $table_ccz.Resultado_NS1 IS NULL AND $table_sinan.CLASSI_FIN>9";

$tr_pos_ubs_jacana = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN  
    WHERE UBS1='$ubs_jacana' AND $table_sql.ResultadoTr='$positivo' AND $table_ccz.Resultado_IgM_Focus IS NULL AND $table_sinan.CLASSI_FIN>9
    OR UBS1='$ubs_jacana' AND $table_sql.ResultadoTr='$positivo' AND $table_ccz.Resultado_NS1 IS NULL AND $table_sinan.CLASSI_FIN>9";

$tr_pos_ubs_jova = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN  
    WHERE UBS1='$ubs_jova' AND $table_sql.ResultadoTr='$positivo' AND $table_ccz.Resultado_IgM_Focus IS NULL AND $table_sinan.CLASSI_FIN>9
    OR UBS1='$ubs_jova' AND $table_sql.ResultadoTr='$positivo' AND $table_ccz.Resultado_NS1 IS NULL AND $table_sinan.CLASSI_FIN>9";

$tr_pos_ubs_mariquinha = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN  
    WHERE UBS1='$ubs_mariquinha' AND $table_sql.ResultadoTr='$positivo' AND $table_ccz.Resultado_IgM_Focus IS NULL AND $table_sinan.CLASSI_FIN>9
    OR UBS1='$ubs_mariquinha' AND $table_sql.ResultadoTr='$positivo' AND $table_ccz.Resultado_NS1 IS NULL AND $table_sinan.CLASSI_FIN>9";

$tr_pos_ubs_toledo = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN  
    WHERE UBS1='$ubs_toledo' AND $table_sql.ResultadoTr='$positivo' AND $table_ccz.Resultado_IgM_Focus IS NULL AND $table_sinan.CLASSI_FIN>9
    OR UBS1='$ubs_toledo' AND $table_sql.ResultadoTr='$positivo' AND $table_ccz.Resultado_NS1 IS NULL AND $table_sinan.CLASSI_FIN>9";

/*Sql Total de Positivo das Unidades*/
$reag_ubs_albertina = "SELECT COUNT($table_sql.nDoc) 
FROM $table_sql
INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC
LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN  
WHERE UBS1='$ubs_albertina' AND $table_ccz.Resultado_IgM_Focus='$positivo' AND $table_sinan.CLASSI_FIN>9
OR UBS1='$ubs_albertina' AND $table_ccz.Resultado_IgM_Panbio='$positivo' AND $table_sinan.CLASSI_FIN>9
OR UBS1='$ubs_albertina' AND $table_ccz.Resultado_Igm_Focus IS NULL AND RESUL_SORO='1' AND CLASSI_FIN>9
OR UBS1='$ubs_albertina' AND $table_ccz.Resultado_Igm_Panbio IS NULL AND RESUL_SORO='1' AND CLASSI_FIN>9
OR UBS1='$ubs_albertina' AND $table_ccz.Resultado_NS1='$positivo' AND $table_sinan.CLASSI_FIN>9
OR UBS1='$ubs_albertina' AND $table_sql.ResultadoTr='$positivo' AND $table_ccz.Resultado_IgM_Focus IS NULL AND $table_sinan.CLASSI_FIN>9
OR UBS1='$ubs_albertina' AND $table_sql.ResultadoTr='$positivo' AND $table_ccz.Resultado_IgM_Panbio IS NULL AND $table_sinan.CLASSI_FIN>9
OR UBS1='$ubs_albertina' AND $table_sql.ResultadoTr='$positivo' AND $table_ccz.Resultado_NS1 IS NULL AND $table_sinan.CLASSI_FIN>9";


$reag_ubs_apuana = "SELECT COUNT($table_sql.nDoc)
FROM $table_sql
INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC
LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN  
WHERE UBS1='$ubs_apuana' AND $table_ccz.Resultado_IgM_Focus='$positivo' AND $table_sinan.CLASSI_FIN>9
OR UBS1='$ubs_apuana' AND $table_ccz.Resultado_IgM_Panbio='$positivo' AND $table_sinan.CLASSI_FIN>9
OR UBS1='$ubs_apuana' AND $table_ccz.Resultado_Igm_Focus IS NULL AND RESUL_SORO='1' AND CLASSI_FIN>9
OR UBS1='$ubs_apuana' AND $table_ccz.Resultado_Igm_Panbio IS NULL AND RESUL_SORO='1' AND CLASSI_FIN>9
OR UBS1='$ubs_apuana' AND $table_ccz.Resultado_NS1='$positivo' AND $table_sinan.CLASSI_FIN>9
OR UBS1='$ubs_apuana' AND $table_sql.ResultadoTr='$positivo' AND $table_ccz.Resultado_IgM_Focus IS NULL AND $table_sinan.CLASSI_FIN>9
OR UBS1='$ubs_apuana' AND $table_sql.ResultadoTr='$positivo' AND $table_ccz.Resultado_IgM_Panbio IS NULL AND $table_sinan.CLASSI_FIN>9
OR UBS1='$ubs_apuana' AND $table_sql.ResultadoTr='$positivo' AND $table_ccz.Resultado_NS1 IS NULL AND $table_sinan.CLASSI_FIN>9";

$reag_ubs_edu = "SELECT COUNT($table_sql.nDoc)
FROM $table_sql
INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC
LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN  
WHERE UBS1='$ubs_edu' AND $table_ccz.Resultado_IgM_Focus='$positivo' AND $table_sinan.CLASSI_FIN>9
OR UBS1='$ubs_edu' AND $table_ccz.Resultado_IgM_Panbio='$positivo' AND $table_sinan.CLASSI_FIN>9
OR UBS1='$ubs_edu' AND $table_ccz.Resultado_Igm_Focus IS NULL AND RESUL_SORO='1' AND CLASSI_FIN>9
OR UBS1='$ubs_edu' AND $table_ccz.Resultado_Igm_Panbio IS NULL AND RESUL_SORO='1' AND CLASSI_FIN>9
OR UBS1='$ubs_edu' AND $table_ccz.Resultado_NS1='$positivo' AND $table_sinan.CLASSI_FIN>9
OR UBS1='$ubs_edu' AND $table_sql.ResultadoTr='$positivo' AND $table_ccz.Resultado_IgM_Focus IS NULL AND $table_sinan.CLASSI_FIN>9
OR UBS1='$ubs_edu' AND $table_sql.ResultadoTr='$positivo' AND $table_ccz.Resultado_IgM_Panbio IS NULL AND $table_sinan.CLASSI_FIN>9
OR UBS1='$ubs_edu' AND $table_sql.ResultadoTr='$positivo' AND $table_ccz.Resultado_NS1 IS NULL AND $table_sinan.CLASSI_FIN>9";

$reag_ubs_flor = "SELECT COUNT($table_sql.nDoc)
FROM $table_sql
INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC
LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN  
WHERE UBS1='$ubs_flor' AND $table_ccz.Resultado_IgM_Focus='$positivo' AND $table_sinan.CLASSI_FIN>9
OR UBS1='$ubs_flor' AND $table_ccz.Resultado_IgM_Panbio='$positivo' AND $table_sinan.CLASSI_FIN>9
OR UBS1='$ubs_flor' AND $table_ccz.Resultado_Igm_Focus IS NULL AND RESUL_SORO='1' AND CLASSI_FIN>9
OR UBS1='$ubs_flor' AND $table_ccz.Resultado_Igm_Panbio IS NULL AND RESUL_SORO='1' AND CLASSI_FIN>9
OR UBS1='$ubs_flor' AND $table_ccz.Resultado_NS1='$positivo' AND $table_sinan.CLASSI_FIN>9
OR UBS1='$ubs_flor' AND $table_sql.ResultadoTr='$positivo' AND $table_ccz.Resultado_IgM_Focus IS NULL AND $table_sinan.CLASSI_FIN>9
OR UBS1='$ubs_flor' AND $table_sql.ResultadoTr='$positivo' AND $table_ccz.Resultado_IgM_Panbio IS NULL AND $table_sinan.CLASSI_FIN>9
OR UBS1='$ubs_flor' AND $table_sql.ResultadoTr='$positivo' AND $table_ccz.Resultado_NS1 IS NULL AND $table_sinan.CLASSI_FIN>9";


$reag_ubs_fontalis = "SELECT COUNT($table_sql.nDoc)
FROM $table_sql
INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC
LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN  
WHERE UBS1='$ubs_fontalis' AND $table_ccz.Resultado_IgM_Focus='$positivo' AND $table_sinan.CLASSI_FIN>9
OR UBS1='$ubs_fontalis' AND $table_ccz.Resultado_IgM_Panbio='$positivo' AND $table_sinan.CLASSI_FIN>9
OR UBS1='$ubs_fontalis' AND $table_ccz.Resultado_Igm_Focus IS NULL AND RESUL_SORO='1' AND CLASSI_FIN>9
OR UBS1='$ubs_fontalis' AND $table_ccz.Resultado_Igm_Panbio IS NULL AND RESUL_SORO='1' AND CLASSI_FIN>9
OR UBS1='$ubs_fontalis' AND $table_ccz.Resultado_NS1='$positivo' AND $table_sinan.CLASSI_FIN>9
OR UBS1='$ubs_fontalis' AND $table_sql.ResultadoTr='$positivo' AND $table_ccz.Resultado_IgM_Focus IS NULL AND $table_sinan.CLASSI_FIN>9
OR UBS1='$ubs_fontalis' AND $table_sql.ResultadoTr='$positivo' AND $table_ccz.Resultado_IgM_Panbio IS NULL AND $table_sinan.CLASSI_FIN>9
OR UBS1='$ubs_fontalis' AND $table_sql.ResultadoTr='$positivo' AND $table_ccz.Resultado_NS1 IS NULL AND $table_sinan.CLASSI_FIN>9";

$reag_ubs_galvao = "SELECT COUNT($table_sql.nDoc)
FROM $table_sql
INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC
LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN  
WHERE UBS1='$ubs_galvao' AND $table_ccz.Resultado_IgM_Focus='$positivo' AND $table_sinan.CLASSI_FIN>9
OR UBS1='$ubs_galvao' AND $table_ccz.Resultado_IgM_Panbio='$positivo' AND $table_sinan.CLASSI_FIN>9
OR UBS1='$ubs_galvao' AND $table_ccz.Resultado_Igm_Focus IS NULL AND RESUL_SORO='1' AND CLASSI_FIN>9
OR UBS1='$ubs_galvao' AND $table_ccz.Resultado_Igm_Panbio IS NULL AND RESUL_SORO='1' AND CLASSI_FIN>9
OR UBS1='$ubs_galvao' AND $table_ccz.Resultado_NS1='$positivo' AND $table_sinan.CLASSI_FIN>9
OR UBS1='$ubs_galvao' AND $table_sql.ResultadoTr='$positivo' AND $table_ccz.Resultado_IgM_Focus IS NULL AND $table_sinan.CLASSI_FIN>9
OR UBS1='$ubs_galvao' AND $table_sql.ResultadoTr='$positivo' AND $table_ccz.Resultado_IgM_Panbio IS NULL AND $table_sinan.CLASSI_FIN>9
OR UBS1='$ubs_galvao' AND $table_sql.ResultadoTr='$positivo' AND $table_ccz.Resultado_NS1 IS NULL AND $table_sinan.CLASSI_FIN>9";

$reag_ubs_joamar = "SELECT COUNT($table_sql.nDoc)
FROM $table_sql
INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC
LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN  
WHERE UBS1='$ubs_joamar' AND $table_ccz.Resultado_IgM_Focus='$positivo' AND $table_sinan.CLASSI_FIN>9
OR UBS1='$ubs_joamar' AND $table_ccz.Resultado_IgM_Panbio='$positivo' AND $table_sinan.CLASSI_FIN>9
OR UBS1='$ubs_joamar' AND $table_ccz.Resultado_Igm_Focus IS NULL AND RESUL_SORO='1' AND CLASSI_FIN>9
OR UBS1='$ubs_joamar' AND $table_ccz.Resultado_Igm_Panbio IS NULL AND RESUL_SORO='1' AND CLASSI_FIN>9
OR UBS1='$ubs_joamar' AND $table_ccz.Resultado_NS1='$positivo' AND $table_sinan.CLASSI_FIN>9
OR UBS1='$ubs_joamar' AND $table_sql.ResultadoTr='$positivo' AND $table_ccz.Resultado_IgM_Focus IS NULL AND $table_sinan.CLASSI_FIN>9
OR UBS1='$ubs_joamar' AND $table_sql.ResultadoTr='$positivo' AND $table_ccz.Resultado_IgM_Panbio IS NULL AND $table_sinan.CLASSI_FIN>9
OR UBS1='$ubs_joamar' AND $table_sql.ResultadoTr='$positivo' AND $table_ccz.Resultado_NS1 IS NULL AND $table_sinan.CLASSI_FIN>9";

$reag_ubs_pedras = "SELECT COUNT($table_sql.nDoc)
FROM $table_sql
INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC
LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN  
WHERE UBS1='$ubs_pedras' AND $table_ccz.Resultado_IgM_Focus='$positivo' AND $table_sinan.CLASSI_FIN>9
OR UBS1='$ubs_pedras' AND $table_ccz.Resultado_IgM_Panbio='$positivo' AND $table_sinan.CLASSI_FIN>9
OR UBS1='$ubs_pedras' AND $table_ccz.Resultado_Igm_Focus IS NULL AND RESUL_SORO='1' AND CLASSI_FIN>9
OR UBS1='$ubs_pedras' AND $table_ccz.Resultado_Igm_Panbio IS NULL AND RESUL_SORO='1' AND CLASSI_FIN>9
OR UBS1='$ubs_pedras' AND $table_ccz.Resultado_NS1='$positivo' AND $table_sinan.CLASSI_FIN>9
OR UBS1='$ubs_pedras' AND $table_sql.ResultadoTr='$positivo' AND $table_ccz.Resultado_IgM_Focus IS NULL AND $table_sinan.CLASSI_FIN>9
OR UBS1='$ubs_pedras' AND $table_sql.ResultadoTr='$positivo' AND $table_ccz.Resultado_IgM_Panbio IS NULL AND $table_sinan.CLASSI_FIN>9
OR UBS1='$ubs_pedras' AND $table_sql.ResultadoTr='$positivo' AND $table_ccz.Resultado_NS1 IS NULL AND $table_sinan.CLASSI_FIN>9";

$reag_ubs_jacana = "SELECT COUNT($table_sql.nDoc)
FROM $table_sql
INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC
LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN  
WHERE UBS1='$ubs_jacana' AND $table_ccz.Resultado_IgM_Focus='$positivo' AND $table_sinan.CLASSI_FIN>9
OR UBS1='$ubs_jacana' AND $table_ccz.Resultado_IgM_Panbio='$positivo' AND $table_sinan.CLASSI_FIN>9
OR UBS1='$ubs_jacana' AND $table_ccz.Resultado_Igm_Focus IS NULL AND RESUL_SORO='1' AND CLASSI_FIN>9
OR UBS1='$ubs_jacana' AND $table_ccz.Resultado_Igm_Panbio IS NULL AND RESUL_SORO='1' AND CLASSI_FIN>9
OR UBS1='$ubs_jacana' AND $table_ccz.Resultado_NS1='$positivo' AND $table_sinan.CLASSI_FIN>9
OR UBS1='$ubs_jacana' AND $table_sql.ResultadoTr='$positivo' AND $table_ccz.Resultado_IgM_Focus IS NULL AND $table_sinan.CLASSI_FIN>9
OR UBS1='$ubs_jacana' AND $table_sql.ResultadoTr='$positivo' AND $table_ccz.Resultado_IgM_Panbio IS NULL AND $table_sinan.CLASSI_FIN>9
OR UBS1='$ubs_jacana' AND $table_sql.ResultadoTr='$positivo' AND $table_ccz.Resultado_NS1 IS NULL AND $table_sinan.CLASSI_FIN>9";

$reag_ubs_jova = "SELECT COUNT($table_sql.nDoc)
FROM $table_sql
INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC
LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN  
WHERE UBS1='$ubs_jova' AND $table_ccz.Resultado_IgM_Focus='$positivo' AND $table_sinan.CLASSI_FIN>9
OR UBS1='$ubs_jova' AND $table_ccz.Resultado_IgM_Panbio='$positivo' AND $table_sinan.CLASSI_FIN>9
OR UBS1='$ubs_jova' AND $table_ccz.Resultado_Igm_Focus IS NULL AND RESUL_SORO='1' AND CLASSI_FIN>9
OR UBS1='$ubs_jova' AND $table_ccz.Resultado_Igm_Panbio IS NULL AND RESUL_SORO='1' AND CLASSI_FIN>9
OR UBS1='$ubs_jova' AND $table_ccz.Resultado_NS1='$positivo' AND $table_sinan.CLASSI_FIN>9
OR UBS1='$ubs_jova' AND $table_sql.ResultadoTr='$positivo' AND $table_ccz.Resultado_IgM_Focus IS NULL AND $table_sinan.CLASSI_FIN>9
OR UBS1='$ubs_jova' AND $table_sql.ResultadoTr='$positivo' AND $table_ccz.Resultado_IgM_Panbio IS NULL AND $table_sinan.CLASSI_FIN>9
OR UBS1='$ubs_jova' AND $table_sql.ResultadoTr='$positivo' AND $table_ccz.Resultado_NS1 IS NULL AND $table_sinan.CLASSI_FIN>9";

$reag_ubs_mariquinha = "SELECT COUNT($table_sql.nDoc)
FROM $table_sql
INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC
LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN  
WHERE UBS1='$ubs_mariquinha' AND $table_ccz.Resultado_IgM_Focus='$positivo' AND $table_sinan.CLASSI_FIN>9
OR UBS1='$ubs_mariquinha' AND $table_ccz.Resultado_IgM_Panbio='$positivo' AND $table_sinan.CLASSI_FIN>9
OR UBS1='$ubs_mariquinha' AND $table_ccz.Resultado_Igm_Focus IS NULL AND RESUL_SORO='1' AND CLASSI_FIN>9
OR UBS1='$ubs_mariquinha' AND $table_ccz.Resultado_Igm_Panbio IS NULL AND RESUL_SORO='1' AND CLASSI_FIN>9
OR UBS1='$ubs_mariquinha' AND $table_ccz.Resultado_NS1='$positivo' AND $table_sinan.CLASSI_FIN>9
OR UBS1='$ubs_mariquinha' AND $table_sql.ResultadoTr='$positivo' AND $table_ccz.Resultado_IgM_Focus IS NULL AND $table_sinan.CLASSI_FIN>9
OR UBS1='$ubs_mariquinha' AND $table_sql.ResultadoTr='$positivo' AND $table_ccz.Resultado_IgM_Panbio IS NULL AND $table_sinan.CLASSI_FIN>9
OR UBS1='$ubs_mariquinha' AND $table_sql.ResultadoTr='$positivo' AND $table_ccz.Resultado_NS1 IS NULL AND $table_sinan.CLASSI_FIN>9";

$reag_ubs_toledo = "SELECT COUNT($table_sql.nDoc)
FROM $table_sql
INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC
LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN  
WHERE UBS1='$ubs_toledo' AND $table_ccz.Resultado_IgM_Focus='$positivo' AND $table_sinan.CLASSI_FIN>9
OR UBS1='$ubs_toledo' AND $table_ccz.Resultado_IgM_Panbio='$positivo' AND $table_sinan.CLASSI_FIN>9
OR UBS1='$ubs_toledo' AND $table_ccz.Resultado_Igm_Focus IS NULL AND RESUL_SORO='1' AND CLASSI_FIN>9
OR UBS1='$ubs_toledo' AND $table_ccz.Resultado_Igm_Panbio IS NULL AND RESUL_SORO='1' AND CLASSI_FIN>9
OR UBS1='$ubs_toledo' AND $table_ccz.Resultado_NS1='$positivo' AND $table_sinan.CLASSI_FIN>9
OR UBS1='$ubs_toledo' AND $table_sql.ResultadoTr='$positivo' AND $table_ccz.Resultado_IgM_Focus IS NULL AND $table_sinan.CLASSI_FIN>9
OR UBS1='$ubs_toledo' AND $table_sql.ResultadoTr='$positivo' AND $table_ccz.Resultado_IgM_Panbio IS NULL AND $table_sinan.CLASSI_FIN>9
OR UBS1='$ubs_toledo' AND $table_sql.ResultadoTr='$positivo' AND $table_ccz.Resultado_NS1 IS NULL AND $table_sinan.CLASSI_FIN>9";

/*Sql IGM Negativo das Unidades*/
$igm_neg_ubs_albertina= "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC 
LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN
WHERE UBS1='$ubs_albertina' AND $table_ccz.Resultado_IgM_Focus='$negativo'";

$igm_neg_ubs_apuana = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC 
LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN
WHERE UBS1='$ubs_apuana' AND $table_ccz.Resultado_IgM_Focus='$negativo'";

$igm_neg_ubs_edu = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC 
LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN
WHERE UBS1='$ubs_edu' AND $table_ccz.Resultado_IgM_Focus='$negativo'";

$igm_neg_ubs_flor = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC 
LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN
WHERE UBS1='$ubs_flor' AND $table_ccz.Resultado_IgM_Focus='$negativo'";

$igm_neg_ubs_fontalis = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC 
LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN
WHERE UBS1='$ubs_fontalis' AND $table_ccz.Resultado_IgM_Focus='$negativo'";

$igm_neg_ubs_galvao = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC 
LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN
WHERE UBS1='$ubs_galvao' AND $table_ccz.Resultado_IgM_Focus='$negativo'";

$igm_neg_ubs_joamar = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC 
LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN
WHERE UBS1='$ubs_joamar' AND $table_ccz.Resultado_IgM_Focus='$negativo'";

$igm_neg_ubs_pedras = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC 
LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN
WHERE UBS1='$ubs_pedras' AND $table_ccz.Resultado_IgM_Focus='$negativo'";

$igm_neg_ubs_jacana = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC 
LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN
WHERE UBS1='$ubs_jacana' AND $table_ccz.Resultado_IgM_Focus='$negativo'";

$igm_neg_ubs_jova = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC 
LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN
WHERE UBS1='$ubs_jova' AND $table_ccz.Resultado_IgM_Focus='$negativo'";

$igm_neg_ubs_mariquinha = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC 
LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN
WHERE UBS1='$ubs_mariquinha' AND $table_ccz.Resultado_IgM_Focus='$negativo'";

$igm_neg_ubs_toledo = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC 
LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN
WHERE UBS1='$ubs_toledo' AND $table_ccz.Resultado_IgM_Focus='$negativo'";

/*Sql NS1 Negativo das Unidades*/
$ns1_neg_ubs_albertina = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC
LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN
WHERE UBS1='$ubs_albertina' AND $table_ccz.Resultado_NS1='$negativo'";

$ns1_neg_ubs_apuana = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC
LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN
WHERE UBS1='$ubs_apuana' AND $table_ccz.Resultado_NS1='$negativo'";

$ns1_neg_ubs_edu = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC
LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN
WHERE UBS1='$ubs_edu' AND $table_ccz.Resultado_NS1='$negativo'";

$ns1_neg_ubs_flor = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC
LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN
WHERE UBS1='$ubs_flor' AND $table_ccz.Resultado_NS1='$negativo'";

$ns1_neg_ubs_fontalis = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC
LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN
WHERE UBS1='$ubs_fontalis' AND $table_ccz.Resultado_NS1='$negativo'";

$ns1_neg_ubs_galvao = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC
LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN
WHERE UBS1='$ubs_galvao' AND $table_ccz.Resultado_NS1='$negativo'";

$ns1_neg_ubs_joamar = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC
LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN
WHERE UBS1='$ubs_joamar' AND $table_ccz.Resultado_NS1='$negativo'";

$ns1_neg_ubs_pedras = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC
LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN
WHERE UBS1='$ubs_pedras' AND $table_ccz.Resultado_NS1='$negativo'";

$ns1_neg_ubs_jacana = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC
LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN
WHERE UBS1='$ubs_jacana' AND $table_ccz.Resultado_NS1='$negativo'";

$ns1_neg_ubs_jova = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC
LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN
WHERE UBS1='$ubs_jova' AND $table_ccz.Resultado_NS1='$negativo'";

$ns1_neg_ubs_mariquinha = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC
LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN
WHERE UBS1='$ubs_mariquinha' AND $table_ccz.Resultado_NS1='$negativo'";

$ns1_neg_ubs_toledo = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC
LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN
WHERE UBS1='$ubs_toledo' AND $table_ccz.Resultado_NS1='$negativo'";


/*Sql Teste Rápido Negativo das Unidades*/
$tr_neg_ubs_albertina = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC LEFT JOIN $table_ccz 
ON $table_sql.nDoc = $table_ccz.SINAN
WHERE UBS1='$ubs_albertina' AND $table_sql.ResultadoTr='$negativo' AND $table_ccz.Resultado_IgM_Focus IS NULL 
OR UBS1='$ubs_albertina' AND $table_sql.ResultadoTr='$negativo' AND $table_ccz.Resultado_NS1 IS NULL";

$tr_neg_ubs_apuana = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN
    WHERE UBS1='$ubs_apuana' AND $table_sql.ResultadoTr='$negativo' AND $table_ccz.Resultado_IgM_Focus IS NULL
    OR UBS1='$ubs_apuana' AND $table_sql.ResultadoTr='$negativo' AND $table_ccz.Resultado_NS1 IS NULL";

$tr_neg_ubs_edu = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN  
    WHERE UBS1='$ubs_edu' AND $table_sql.ResultadoTr='$negativo' AND $table_ccz.Resultado_IgM_Focus IS NULL
    OR UBS1='$ubs_edu' AND $table_sql.ResultadoTr='$negativo' AND $table_ccz.Resultado_NS1 IS NULL";

$tr_neg_ubs_flor = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN  
    WHERE UBS1='$ubs_flor' AND $table_sql.ResultadoTr='$negativo' AND $table_ccz.Resultado_IgM_Focus IS NULL
    OR UBS1='$ubs_flor' AND $table_sql.ResultadoTr='$negativo' AND $table_ccz.Resultado_NS1 IS NULL";

$tr_neg_ubs_fontalis = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN  
    WHERE UBS1='$ubs_fontalis' AND $table_sql.ResultadoTr='$negativo' AND $table_ccz.Resultado_IgM_Focus IS NULL
    OR UBS1='$ubs_fontalis' AND $table_sql.ResultadoTr='$negativo' AND $table_ccz.Resultado_NS1 IS NULL";

$tr_neg_ubs_galvao = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN  
    WHERE UBS1='$ubs_galvao' AND $table_sql.ResultadoTr='$negativo' AND $table_ccz.Resultado_IgM_Focus IS NULL
    OR UBS1='$ubs_galvao' AND $table_sql.ResultadoTr='$negativo' AND $table_ccz.Resultado_NS1 IS NULL";

$tr_neg_ubs_joamar = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN  
    WHERE UBS1='$ubs_joamar' AND $table_sql.ResultadoTr='$negativo' AND $table_ccz.Resultado_IgM_Focus IS NULL
    OR UBS1='$ubs_joamar' AND $table_sql.ResultadoTr='$negativo' AND $table_ccz.Resultado_NS1 IS NULL";

$tr_neg_ubs_pedras = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN  
    WHERE UBS1='$ubs_pedras' AND $table_sql.ResultadoTr='$negativo' AND $table_ccz.Resultado_IgM_Focus IS NULL
    OR UBS1='$ubs_pedras' AND $table_sql.ResultadoTr='$negativo' AND $table_ccz.Resultado_NS1 IS NULL";

$tr_neg_ubs_jacana = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN  
    WHERE UBS1='$ubs_jacana' AND $table_sql.ResultadoTr='$negativo' AND $table_ccz.Resultado_IgM_Focus IS NULL
    OR UBS1='$ubs_jacana' AND $table_sql.ResultadoTr='$negativo' AND $table_ccz.Resultado_NS1 IS NULL";

$tr_neg_ubs_jova = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN  
    WHERE UBS1='$ubs_jova' AND $table_sql.ResultadoTr='$negativo' AND $table_ccz.Resultado_IgM_Focus IS NULL
    OR UBS1='$ubs_jova' AND $table_sql.ResultadoTr='$negativo' AND $table_ccz.Resultado_NS1 IS NULL";

$tr_neg_ubs_mariquinha = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN  
    WHERE UBS1='$ubs_mariquinha' AND $table_sql.ResultadoTr='$negativo' AND $table_ccz.Resultado_IgM_Focus IS NULL
    OR UBS1='$ubs_mariquinha' AND $table_sql.ResultadoTr='$negativo' AND $table_ccz.Resultado_NS1 IS NULL";

$tr_neg_ubs_toledo = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN  
    WHERE UBS1='$ubs_toledo' AND $table_sql.ResultadoTr='$negativo' AND $table_ccz.Resultado_IgM_Focus IS NULL
    OR UBS1='$ubs_toledo' AND $table_sql.ResultadoTr='$negativo' AND $table_ccz.Resultado_NS1 IS NULL";


//Totais

$un_res_total = $un_res;
$un_not_total = $un_not;

//Total de Notificados Da 38
$not_38_total = "SELECT COUNT($table_sql.nDoc) FROM $table_sql
WHERE Da='38'";

//Total de Notificados Da 83
$not_83_total = "SELECT COUNT($table_sql.nDoc) FROM $table_sql
WHERE Da='83'";

//Total de Reagentes Da 38
//Total de Reagentes Da 38
$pos_38_total="SELECT COUNT($table_sql.nDoc)
FROM $table_sql
INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC
LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN  
WHERE $table_sql.Da='38' AND $table_ccz.Resultado_IgM_Focus='$positivo' AND $table_sinan.CLASSI_FIN>9
OR $table_sql.Da='38' AND $table_ccz.Resultado_IgM_Panbio='$positivo' AND $table_sinan.CLASSI_FIN>9
OR $table_sql.Da='38' AND $table_ccz.Resultado_Igm_Focus IS NULL AND RESUL_SORO='1' AND CLASSI_FIN>9
OR $table_sql.Da='38' AND $table_ccz.Resultado_Igm_Panbio IS NULL AND RESUL_SORO='1' AND CLASSI_FIN>9
OR $table_sql.Da='38' AND $table_ccz.Resultado_NS1='$positivo' AND $table_sinan.CLASSI_FIN>9
OR $table_sql.Da='38' AND $table_sql.ResultadoTr='$positivo' AND $table_ccz.Resultado_IgM_Focus IS NULL AND $table_sinan.CLASSI_FIN>9
OR $table_sql.Da='38' AND $table_sql.ResultadoTr='$positivo' AND $table_ccz.Resultado_IgM_Panbio IS NULL AND $table_sinan.CLASSI_FIN>9
OR $table_sql.Da='38' AND $table_sql.ResultadoTr='$positivo' AND $table_ccz.Resultado_NS1 IS NULL AND $table_sinan.CLASSI_FIN>9";

//Total de Reagentes Da 83
$pos_83_total="SELECT COUNT($table_sql.nDoc)
FROM $table_sql
INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC
LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN  
WHERE $table_sql.Da='83' AND $table_ccz.Resultado_IgM_Focus='$positivo' AND $table_sinan.CLASSI_FIN>9
OR $table_sql.Da='83' AND $table_ccz.Resultado_IgM_Panbio='$positivo' AND $table_sinan.CLASSI_FIN>9
OR $table_sql.Da='83' AND $table_ccz.Resultado_Igm_Focus IS NULL AND RESUL_SORO='1' AND CLASSI_FIN>9
OR $table_sql.Da='83' AND $table_ccz.Resultado_Igm_Panbio IS NULL AND RESUL_SORO='1' AND CLASSI_FIN>9
OR $table_sql.Da='83' AND $table_ccz.Resultado_NS1='$positivo' AND $table_sinan.CLASSI_FIN>9
OR $table_sql.Da='83' AND $table_sql.ResultadoTr='$positivo' AND $table_ccz.Resultado_IgM_Focus IS NULL AND $table_sinan.CLASSI_FIN>9
OR $table_sql.Da='83' AND $table_sql.ResultadoTr='$positivo' AND $table_ccz.Resultado_IgM_Panbio IS NULL AND $table_sinan.CLASSI_FIN>9
OR $table_sql.Da='83' AND $table_sql.ResultadoTr='$positivo' AND $table_ccz.Resultado_NS1 IS NULL AND $table_sinan.CLASSI_FIN>9";

//Total de Não Reagentes Da 38
$neg_38_total ="SELECT COUNT($table_sql.nDoc)
    FROM $table_sql 
    INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC
    LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN
    WHERE $table_sql.Da='38' AND $table_sql.ResultadoTr='Não Reagente' 
    OR $table_sql.Da='38' AND $table_ccz.Resultado_IgM_Focus='Não Reagente'
    OR $table_sql.Da='38' AND $table_ccz.Resultado_Ns1='Não Reagente'";

//Total de Não Reagentes Da 83
$neg_83_total ="SELECT COUNT($table_sql.nDoc)
    FROM $table_sql 
    INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC
    LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN
    WHERE $table_sql.Da='83' AND $table_sql.ResultadoTr='Não Reagente' 
    OR $table_sql.Da='83' AND $table_ccz.Resultado_IgM_Focus='Não Reagente'
    OR $table_sql.Da='83' AND $table_ccz.Resultado_Ns1='Não Reagente'";

//Total de Sem Coleta Da 38
$sem_col_38_total = "SELECT COUNT($table_sql.nDoc) 
    FROM $table_sql LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN  
    WHERE $table_sql.Da='38' AND $table_sql.ResultadoTr='$sem_col' AND $table_ccz.Resultado_IgM_Focus IS NULL AND $table_ccz.Resultado_NS1 IS NULL";

//Total de Sem Coleta Da 83
$sem_col_83_total = "SELECT COUNT($table_sql.nDoc) 
    FROM $table_sql LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN  
    WHERE $table_sql.Da='83' AND $table_sql.ResultadoTr='$sem_col' AND $table_ccz.Resultado_IgM_Focus IS NULL AND $table_ccz.Resultado_NS1 IS NULL";

//Sql CCZ Sem Coleta Total
$sem_col_total = "SELECT COUNT($table_sql.nDoc) FROM $table_sql LEFT JOIN $table_ccz
ON $table_sql.nDoc = $table_ccz.SINAN WHERE $table_sql.ResultadoTr='$sem_col' AND $table_ccz.Resultado_IgM_Focus IS NULL AND $table_ccz.Resultado_NS1 IS NULL;";

//Sql CCZ Coleta Inadequada Da 38 Total
$col_ina_total = "SELECT COUNT($table_sql.nDoc) FROM $table_sql LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN 
WHERE $table_ccz.Resultado_IgM_Focus='$col_ina' 
OR $table_ccz.Resultado_NS1='$col_ina'";

//Sql CCZ Coleta Inadequada Da 38 Total
$col_ina_38_total = "SELECT COUNT($table_sql.nDoc) FROM $table_sql LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN 
WHERE $table_sql.Da='38' AND $table_ccz.Resultado_IgM_Focus='$col_ina' 
OR $table_sql.Da='38' AND $table_ccz.Resultado_NS1='$col_ina'";

//Sql CCZ Coleta Inadequada Da 83 Total
$col_ina_83_total = "SELECT COUNT($table_sql.nDoc) FROM $table_sql LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN 
WHERE $table_sql.Da='83' AND $table_ccz.Resultado_IgM_Focus='$col_ina' 
OR $table_sql.Da='83' AND $table_ccz.Resultado_NS1='$col_ina'";

//Sql CCZ Inconclusivo Da 38
$inco_38_total = "SELECT COUNT($table_sql.nDoc) FROM $table_sql LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN  
    WHERE $table_sql.Da='38' AND $table_ccz.Resultado_IgM_Focus='$inconclusivo'
    OR $table_sql.Da='38' AND $table_ccz.Resultado_NS1='$inconclusivo'";

//Sql CCZ Inconclusivo Da 83
$inco_83_total = "SELECT COUNT($table_sql.nDoc) FROM $table_sql LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN  
    WHERE $table_sql.Da='83' AND $table_ccz.Resultado_IgM_Focus='$inconclusivo'
    OR $table_sql.Da='83' AND $table_ccz.Resultado_NS1='$inconclusivo'";

//Sql CCZ Inconclusivo
$inco_total = "SELECT COUNT($table_sql.nDoc) FROM $table_sql LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN  
    WHERE $table_ccz.Resultado_IgM_Focus='$inconclusivo'
    OR $table_ccz.Resultado_NS1='$inconclusivo'";

//Sql Reagentes Positivo Total
$reag_total="SELECT COUNT($table_sql.nDoc)
FROM $table_sql
INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC
LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN  
WHERE $table_ccz.Resultado_IgM_Focus='$positivo' AND $table_sinan.CLASSI_FIN>9
OR $table_ccz.Resultado_IgM_Panbio='$positivo' AND $table_sinan.CLASSI_FIN>9
OR $table_ccz.Resultado_Igm_Focus IS NULL AND RESUL_SORO='1' AND CLASSI_FIN>9
OR $table_ccz.Resultado_Igm_Panbio IS NULL AND RESUL_SORO='1' AND CLASSI_FIN>9
OR $table_ccz.Resultado_NS1='$positivo' AND $table_sinan.CLASSI_FIN>9
OR $table_sql.ResultadoTr='$positivo' AND $table_ccz.Resultado_IgM_Focus IS NULL AND $table_sinan.CLASSI_FIN>9
OR $table_sql.ResultadoTr='$positivo' AND $table_ccz.Resultado_NS1 IS NULL AND $table_sinan.CLASSI_FIN>9";

//Sql IGM Positivo Total
$igm_pos_total = "SELECT COUNT($table_sql.nDoc) 
    FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC
    LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN  
    WHERE $table_ccz.Resultado_IgM_Focus='$positivo' AND $table_sinan.CLASSI_FIN>9
    OR $table_ccz.Resultado_IgM_Panbio='$positivo' AND $table_sinan.CLASSI_FIN>9
    OR $table_ccz.Resultado_Igm_Focus IS NULL AND RESUL_SORO='1' AND CLASSI_FIN>9
    OR $table_ccz.Resultado_Igm_Panbio IS NULL AND RESUL_SORO='1' AND CLASSI_FIN>9";

//Sql NS1 Positivo Total
$ns1_pos_total = "SELECT COUNT($table_sql.nDoc) 
    FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN  
    WHERE $table_ccz.Resultado_NS1='$positivo' AND $table_sinan.CLASSI_FIN>9";

// Total de Teste Rápido positivo
$tr_pos_total = "SELECT COUNT($table_sql.nDoc) 
    FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN  
    WHERE $table_sql.ResultadoTr='$positivo' AND $table_ccz.Resultado_IgM_Focus IS NULL AND $table_sinan.CLASSI_FIN>9
    OR $table_sql.ResultadoTr='$positivo' AND $table_ccz.Resultado_NS1 IS NULL AND $table_sinan.CLASSI_FIN>9";

//Sql IGM Negativo Total
$igm_neg_total = "SELECT COUNT($table_sql.nDoc) 
    FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN  
    WHERE $table_ccz.Resultado_IgM_Focus='$negativo'";

//Sql NS1 Negativo Total
$ns1_neg_total = "SELECT COUNT($table_sql.nDoc) 
    FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN  
    WHERE $table_ccz.Resultado_NS1='$negativo'";

// Total de Teste Rápido Negativo
$tr_neg_total = "SELECT COUNT($table_sql.nDoc) 
    FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC LEFT JOIN $table_ccz ON $table_sql.nDoc = $table_ccz.SINAN  
    WHERE $table_sql.ResultadoTr='$negativo' AND $table_ccz.Resultado_IgM_Focus IS NULL
    OR $table_sql.ResultadoTr='$negativo' AND $table_ccz.Resultado_NS1 IS NULL";
