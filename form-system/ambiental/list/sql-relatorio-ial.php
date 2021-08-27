<?php
//Código desenvolvido por Rodolfo Romaioli Ribeiro de Jesus - início 13/06/2018
//Email: rodolfo.romaioli@gmail.com

//tabelas


//contagens
$count_ndoc = "COUNT($table_sql.nDoc)";

//exames
$exame_igm = "Chikungunya, IgM";
$exame_igg = "Chikungunya, IgG";
$exame_bm = "Chikungunya, Biologia Molecular ";
$positivo = "Detectável ";
$negativo = "Não Reagente ";
$sem_col = "Exame Não Realizado";
$col_ina = "Coleta Inadequada";
$inconclusivo = "Inconclusivo";

//Unidades
$ama_joamar = 'AMA J JOAMAR'; $ama_wamberto = 'AMA WAMBERTO DIAS DA COSTA';
$ubs_albertina = 'UBS V ALBERTINA DR OSVALDO MARCAL'; $ubs_mariquinha = 'UBS DONA MARIQUINHA SCIASCIA'; $ubs_toledo = 'UBS DR JOSE TOLEDO PIZA'; $ubs_apuana = 'UBS J APUANA';
$ubs_flor = 'UBS J FLOR DE MAIO'; $ubs_fontalis = 'UBS J FONTALIS'; $ubs_joamar = 'UBS J JOAMAR'; $ubs_jacana = 'UBS JACANA'; $ubs_pedras = 'UBS JARDIM DAS PEDRAS';
$ubs_edu = 'UBS PQ EDU CHAVES'; $ubs_galvao = 'UBS V NOVA GALVAO'; $gonzaga = 'HOSP SAO LUIZ GONZAGA';

//Total de Casos em Unidades de Residencia
$un_res_total = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC
WHERE UBS1='$ubs_albertina' OR UBS1='$ubs_apuana' OR UBS1='$ubs_edu' OR UBS1='$ubs_flor' OR UBS1='$ubs_fontalis' OR UBS1='$ubs_galvao' OR UBS1='$ubs_joamar' OR UBS1='$ubs_pedras'
OR UBS1='$ubs_jacana' OR UBS1='$ubs_mariquinha' OR UBS1='$ubs_toledo'";

//Total de Casos em Unidades de Notificação
$un_not_total = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC WHERE UnidadeNotificadora='$ubs_albertina' OR UnidadeNotificadora='$ubs_apuana' 
OR UnidadeNotificadora='$ubs_edu' OR UnidadeNotificadora='$ubs_flor' OR UnidadeNotificadora='$ubs_fontalis' OR UnidadeNotificadora='$ubs_galvao' 
OR UnidadeNotificadora='$ubs_joamar' OR UnidadeNotificadora='$ubs_pedras' OR UnidadeNotificadora='$ubs_jacana' OR UnidadeNotificadora='$ubs_mariquinha' 
OR UnidadeNotificadora='$ubs_toledo'";

//Total de Casos por Ubs de Residencia
$ubs_res_albertina = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC WHERE UBS1='$ubs_albertina'";
$ubs_res_apuana = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC WHERE UBS1='$ubs_apuana'";
$ubs_res_edu = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC WHERE UBS1='$ubs_edu'";
$ubs_res_flor = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC WHERE UBS1='$ubs_flor'";
$ubs_res_fontalis = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC WHERE UBS1='$ubs_fontalis'";
$ubs_res_galvao = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC WHERE UBS1='$ubs_galvao'";
$ubs_res_joamar = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC WHERE UBS1='$ubs_joamar'";
$ubs_res_pedras = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC WHERE UBS1='$ubs_pedras'";
$ubs_res_jacana = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC WHERE UBS1='$ubs_jacana'";
$ubs_res_mariquinha = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC WHERE UBS1='$ubs_mariquinha'";
$ubs_res_toledo = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC WHERE UBS1='$ubs_toledo'";

//Total de Casos por Unidade Notificante
$un_not_albertina = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC WHERE UnidadeNotificadora='$ubs_albertina'";
$un_not_ama_joamar = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC WHERE UnidadeNotificadora='$ama_joamar'";
$un_not_apuana = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC WHERE UnidadeNotificadora='$ubs_apuana'";
$un_not_edu = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC WHERE UnidadeNotificadora='$ubs_edu'";
$un_not_flor = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC WHERE UnidadeNotificadora='$ubs_flor'";
$un_not_fontalis = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC WHERE UnidadeNotificadora='$ubs_fontalis'";
$un_not_galvao = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC WHERE UnidadeNotificadora='$ubs_galvao'";
$un_not_joamar = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC WHERE UnidadeNotificadora='$ubs_joamar'";
$un_not_pedras = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC WHERE UnidadeNotificadora='$ubs_pedras'";
$un_not_jacana = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC WHERE UnidadeNotificadora='$ubs_jacana'";
$un_not_mariquinha = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC WHERE UnidadeNotificadora='$ubs_mariquinha'";
$un_not_toledo = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC WHERE UnidadeNotificadora='$ubs_toledo'";
$un_not_gonzaga = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC WHERE UnidadeNotificadora='$gonzaga'";

//Sql Total de Casos Sem Coleta por UBS
$sem_col_ubs_albertina = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC LEFT JOIN $table_ial 
ON $table_sql.NomeSolicitante = $table_ial.Paciente WHERE UBS1='$ubs_albertina' AND  $table_ial.Resultado IS NULL
OR UBS1='$ubs_albertina' AND $table_ial.Resultado=' \r'";
$sem_col_ubs_apuana = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC LEFT JOIN $table_ial 
ON $table_sql.NomeSolicitante = $table_ial.Paciente WHERE UBS1='$ubs_apuana' AND  $table_ial.Resultado IS NULL
OR UBS1='$ubs_apuana' AND $table_ial.Resultado=' \r'";
$sem_col_ubs_edu = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC LEFT JOIN $table_ial 
ON $table_sql.NomeSolicitante = $table_ial.Paciente WHERE UBS1='$ubs_edu' AND  $table_ial.Resultado IS NULL
OR UBS1='$ubs_edu' AND $table_ial.Resultado=' \r'";
$sem_col_ubs_flor = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC LEFT JOIN $table_ial 
ON $table_sql.NomeSolicitante = $table_ial.Paciente WHERE UBS1='$ubs_flor' AND  $table_ial.Resultado IS NULL
OR UBS1='$ubs_flor' AND $table_ial.Resultado=' \r'";
$sem_col_ubs_fontalis = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC LEFT JOIN $table_ial 
ON $table_sql.NomeSolicitante = $table_ial.Paciente WHERE UBS1='$ubs_fontalis' AND  $table_ial.Resultado IS NULL
OR UBS1='$ubs_fontalis' AND $table_ial.Resultado=' \r'";
$sem_col_ubs_galvao = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC LEFT JOIN $table_ial 
ON $table_sql.NomeSolicitante = $table_ial.Paciente WHERE UBS1='$ubs_galvao' AND  $table_ial.Resultado IS NULL
OR UBS1='$ubs_galvao' AND $table_ial.Resultado=' \r'";
$sem_col_ubs_joamar = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC LEFT JOIN $table_ial 
ON $table_sql.NomeSolicitante = $table_ial.Paciente WHERE UBS1='$ubs_galvao' AND  $table_ial.Resultado IS NULL
OR UBS1='$ubs_galvao' AND $table_ial.Resultado=' \r'";
$sem_col_ubs_pedras = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC LEFT JOIN $table_ial 
ON $table_sql.NomeSolicitante = $table_ial.Paciente WHERE UBS1='$ubs_galvao' AND  $table_ial.Resultado IS NULL
OR UBS1='$ubs_galvao' AND $table_ial.Resultado=' \r'";
$sem_col_ubs_jacana = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC LEFT JOIN $table_ial 
ON $table_sql.NomeSolicitante = $table_ial.Paciente WHERE UBS1='$ubs_galvao' AND  $table_ial.Resultado IS NULL
OR UBS1='$ubs_galvao' AND $table_ial.Resultado=' \r'";
$sem_col_ubs_mariquinha = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC LEFT JOIN $table_ial 
ON $table_sql.NomeSolicitante = $table_ial.Paciente WHERE UBS1='$ubs_galvao' AND  $table_ial.Resultado IS NULL
OR UBS1='$ubs_galvao' AND $table_ial.Resultado=' \r'";
$sem_col_ubs_toledo = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC LEFT JOIN $table_ial 
ON $table_sql.NomeSolicitante = $table_ial.Paciente WHERE UBS1='$ubs_galvao' AND  $table_ial.Resultado IS NULL
OR UBS1='$ubs_galvao' AND $table_ial.Resultado=' \r'";

//Sql Total de Casos Coleta Inadequada UBS
$col_ina_ubs_albertina = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC LEFT JOIN $table_ial 
ON $table_sql.NomeSolicitante = $table_ial.Paciente WHERE UBS1='$ubs_galvao' AND  $table_ial.Resultado IS NULL
OR UBS1='$ubs_galvao' AND $table_ial.Resultado=' \r'";
$col_ina_ubs_apuana = "SELECT COUNT($table_sql.nDoc) FROM $table_sql LEFT JOIN $table_ial 
ON $table_sql.NomeSolicitante = $table_ial.Paciente WHERE UBS1='$ubs_apuana' AND $table_ial.Resultado='$col_ina' 
OR UBS1='$ubs_apuana'";
$col_ina_ubs_edu = "SELECT COUNT($table_sql.nDoc) FROM $table_sql LEFT JOIN $table_ial 
ON $table_sql.NomeSolicitante = $table_ial.Paciente WHERE UBS1='$ubs_edu' AND $table_ial.Resultado='$col_ina' 
OR UBS1='$ubs_edu'";
$col_ina_ubs_flor = "SELECT COUNT($table_sql.nDoc) FROM $table_sql LEFT JOIN $table_ial 
ON $table_sql.NomeSolicitante = $table_ial.Paciente WHERE UBS1='$ubs_flor' AND $table_ial.Resultado='$col_ina' 
OR UBS1='$ubs_flor'";
$col_ina_ubs_fontalis = "SELECT COUNT($table_sql.nDoc) FROM $table_sql LEFT JOIN $table_ial 
ON $table_sql.NomeSolicitante = $table_ial.Paciente WHERE UBS1='$ubs_fontalis' AND $table_ial.Resultado='$col_ina' 
OR UBS1='$ubs_fontalis'";
$col_ina_ubs_galvao = "SELECT COUNT($table_sql.nDoc) FROM $table_sql LEFT JOIN $table_ial 
ON $table_sql.NomeSolicitante = $table_ial.Paciente WHERE UBS1='$ubs_galvao' AND $table_ial.Resultado='$col_ina' 
OR UBS1='$ubs_galvao'";
$col_ina_ubs_joamar = "SELECT COUNT($table_sql.nDoc) FROM $table_sql LEFT JOIN $table_ial 
ON $table_sql.NomeSolicitante = $table_ial.Paciente WHERE UBS1='$ubs_joamar' AND $table_ial.Resultado='$col_ina' 
OR UBS1='$ubs_joamar'";
$col_ina_ubs_pedras = "SELECT COUNT($table_sql.nDoc) FROM $table_sql LEFT JOIN $table_ial 
ON $table_sql.NomeSolicitante = $table_ial.Paciente WHERE UBS1='$ubs_pedras' AND $table_ial.Resultado='$col_ina' 
OR UBS1='$ubs_pedras'";
$col_ina_ubs_jacana = "SELECT COUNT($table_sql.nDoc) FROM $table_sql LEFT JOIN $table_ial 
ON $table_sql.NomeSolicitante = $table_ial.Paciente WHERE UBS1='$ubs_jacana' AND $table_ial.Resultado='$col_ina' 
OR UBS1='$ubs_jacana'";
$col_ina_ubs_mariquinha = "SELECT COUNT($table_sql.nDoc) FROM $table_sql LEFT JOIN $table_ial 
ON $table_sql.NomeSolicitante = $table_ial.Paciente WHERE UBS1='$ubs_mariquinha' AND $table_ial.Resultado='$col_ina' 
OR UBS1='$ubs_mariquinha'";
$col_ina_ubs_toledo = "SELECT COUNT($table_sql.nDoc) FROM $table_sql LEFT JOIN $table_ial 
ON $table_sql.NomeSolicitante = $table_ial.Paciente WHERE UBS1='$ubs_toledo' AND $table_ial.Resultado='$col_ina' 
OR UBS1='$ubs_toledo'";

//Inconclusivo ial
$inco_ubs_albertina = "SELECT COUNT($table_sql.nDoc) FROM $table_sql LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente
    WHERE UBS1='$ubs_albertina' AND $table_ial.Resultado='$inconclusivo'
    OR UBS1='$ubs_apuana' AND $table_ial.Resultado='$inconclusivo'";
$inco_ubs_apuana = "SELECT COUNT($table_sql.nDoc) FROM $table_sql LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente
    WHERE UBS1='$ubs_apuana' AND $table_ial.Resultado='$inconclusivo'
    OR UBS1='$ubs_apuana' AND $table_ial.Resultado='$inconclusivo'";
$inco_ubs_edu = "SELECT COUNT($table_sql.nDoc) FROM $table_sql LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente  
    WHERE UBS1='$ubs_edu' AND $table_ial.Resultado='$inconclusivo'
    OR UBS1='$ubs_edu' AND $table_ial.Resultado='$inconclusivo'";
$inco_ubs_flor = "SELECT COUNT($table_sql.nDoc) FROM $table_sql LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente  
    WHERE UBS1='$ubs_flor' AND $table_ial.Resultado='$inconclusivo'
    OR UBS1='$ubs_flor' AND $table_ial.Resultado='$inconclusivo'";
$inco_ubs_fontalis = "SELECT COUNT($table_sql.nDoc) FROM $table_sql LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente  
    WHERE UBS1='$ubs_fontalis' AND $table_ial.Resultado='$inconclusivo'
    OR UBS1='$ubs_fontalis' AND $table_ial.Resultado='$inconclusivo'";
$inco_ubs_galvao = "SELECT COUNT($table_sql.nDoc) FROM $table_sql LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente  
    WHERE UBS1='$ubs_galvao' AND $table_ial.Resultado='$inconclusivo'
    OR UBS1='$ubs_galvao' AND $table_ial.Resultado='$inconclusivo'";
$inco_ubs_joamar = "SELECT COUNT($table_sql.nDoc) FROM $table_sql LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente  
    WHERE UBS1='$ubs_joamar' AND $table_ial.Resultado='$inconclusivo'
    OR UBS1='$ubs_joamar' AND $table_ial.Resultado='$inconclusivo'";
$inco_ubs_pedras = "SELECT COUNT($table_sql.nDoc) FROM $table_sql LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente  
    WHERE UBS1='$ubs_pedras' AND $table_ial.Resultado='$inconclusivo'
    OR UBS1='$ubs_pedras' AND $table_ial.Resultado='$inconclusivo'";
$inco_ubs_jacana = "SELECT COUNT($table_sql.nDoc) FROM $table_sql LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente  
    WHERE UBS1='$ubs_jacana' AND $table_ial.Resultado='$inconclusivo'
    OR UBS1='$ubs_jacana' AND $table_ial.Resultado='$inconclusivo'";
$inco_ubs_mariquinha = "SELECT COUNT($table_sql.nDoc) FROM $table_sql LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente  
    WHERE UBS1='$ubs_mariquinha' AND $table_ial.Resultado='$inconclusivo'
    OR UBS1='$ubs_mariquinha' AND $table_ial.Resultado='$inconclusivo'";
$inco_ubs_toledo = "SELECT COUNT($table_sql.nDoc) FROM $table_sql LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente  
    WHERE UBS1='$ubs_toledo' AND $table_ial.Resultado='$inconclusivo'
    OR UBS1='$ubs_toledo' AND $table_ial.Resultado='$inconclusivo'";

$igm_pos_ubs_albertina = "SELECT COUNT($table_sql.nDoc) FROM $table_sql LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente WHERE UBS1='$ubs_albertina'
  AND $table_ial.Exame='$exame_igm' AND $table_ial.Resultado='$positivo'";
$igm_pos_ubs_apuana = "SELECT COUNT($table_sql.nDoc) FROM $table_sql LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente WHERE UBS1='$ubs_apuana'
  AND $table_ial.Exame='$exame_igm' AND $table_ial.Resultado='$positivo'";
$igm_pos_ubs_edu = "SELECT COUNT($table_sql.nDoc) FROM $table_sql LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente WHERE UBS1='$ubs_edu'
  AND $table_ial.Exame='$exame_igm' AND $table_ial.Resultado='$positivo'";
$igm_pos_ubs_flor = "SELECT COUNT($table_sql.nDoc) FROM $table_sql LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente WHERE UBS1='$ubs_flor'
  AND $table_ial.Exame='$exame_igm' AND $table_ial.Resultado='$positivo'";
$igm_pos_ubs_fontalis = "SELECT COUNT($table_sql.nDoc) FROM $table_sql LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente WHERE UBS1='$ubs_fontalis'
  AND $table_ial.Exame='$exame_igm' AND $table_ial.Resultado='$positivo'";
$igm_pos_ubs_galvao = "SELECT COUNT($table_sql.nDoc) FROM $table_sql LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente WHERE UBS1='$ubs_galvao'
  AND $table_ial.Exame='$exame_igm' AND $table_ial.Resultado='$positivo'";
$igm_pos_ubs_joamar = "SELECT COUNT($table_sql.nDoc) FROM $table_sql LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente WHERE UBS1='$ubs_joamar'
  AND $table_ial.Exame='$exame_igm' AND $table_ial.Resultado='$positivo'";
$igm_pos_ubs_pedras = "SELECT COUNT($table_sql.nDoc) FROM $table_sql LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente WHERE $table_sql.UBS1='$ubs_pedras'
  AND $table_ial.Exame='$exame_igm' AND $table_ial.Resultado='$positivo'";
$igm_pos_ubs_jacana = "SELECT COUNT($table_sql.nDoc) FROM $table_sql LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente WHERE UBS1='$ubs_jacana'
  AND $table_ial.Exame='$exame_igm' AND $table_ial.Resultado='$positivo'";
$igm_pos_ubs_mariquinha = "SELECT COUNT($table_sql.nDoc) FROM $table_sql LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente WHERE UBS1='$ubs_mariquinha'
  AND $table_ial.Exame='$exame_igm' AND $table_ial.Resultado='$positivo'";
$igm_pos_ubs_toledo = "SELECT COUNT($table_sql.NomeSolicitante)
FROM $table_sql LEFT JOIN $table_sql ON $table_sql.NomeSolicitante = $table_ial.Paciente
WHERE $table_ial.Resultado = '$positivo' AND $table_ial.Exame = '$exame_igm'";

$ubs_res_albertina = "SELECT COUNT($table_sql.nDoc) FROM $table_sql WHERE UBS1='$ubs_albertina'";


/*Sql IGG Positivo das Unidades*/
$igg_pos_ubs_albertina= "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC 
LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente WHERE UBS1='$ubs_albertina' AND $table_ial.Exame='$exame_igg' AND $table_ial.Resultado='$positivo' AND $table_sinan.CLASSI_FIN>9";
$igg_pos_ubs_apuana = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC 
LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente WHERE UBS1='$ubs_albertina' AND $table_ial.Exame='$exame_igg' AND $table_ial.Resultado='$positivo' AND $table_sinan.CLASSI_FIN>9";
$igg_pos_ubs_edu = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC 
LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente WHERE UBS1='$ubs_edu' AND $table_ial.Exame='$exame_igg' AND $table_ial.Resultado='$positivo' AND $table_sinan.CLASSI_FIN>9";
$igg_pos_ubs_flor = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC 
LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente WHERE UBS1='$ubs_flor' AND $table_ial.Exame='$exame_igg' AND $table_ial.Resultado='$positivo' AND $table_sinan.CLASSI_FIN>9";
$igg_pos_ubs_fontalis = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC 
LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente WHERE UBS1='$ubs_fontalis' AND $table_ial.Exame='$exame_igg' AND $table_ial.Resultado='$positivo' AND $table_sinan.CLASSI_FIN>9";
$igg_pos_ubs_galvao = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC 
LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente WHERE UBS1='$ubs_galvao' AND $table_ial.Exame='$exame_igg' AND $table_ial.Resultado='$positivo' AND $table_sinan.CLASSI_FIN>9";
$igg_pos_ubs_joamar = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC 
LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente WHERE UBS1='$ubs_joamar' AND $table_ial.Exame='$exame_igg' AND $table_ial.Resultado='$positivo' AND $table_sinan.CLASSI_FIN>9";
$igg_pos_ubs_pedras = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC 
LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente WHERE UBS1='$ubs_pedras' AND $table_ial.Exame='$exame_igg' AND $table_ial.Resultado='$positivo' AND $table_sinan.CLASSI_FIN>9";
$igg_pos_ubs_jacana = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC 
LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente WHERE UBS1='$ubs_jacana' AND $table_ial.Exame='$exame_igg' AND $table_ial.Resultado='$positivo' AND $table_sinan.CLASSI_FIN>9";
$igg_pos_ubs_mariquinha = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC 
LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente WHERE UBS1='$ubs_mariquinha' AND $table_ial.Exame='$exame_igg' AND $table_ial.Resultado='$positivo' AND $table_sinan.CLASSI_FIN>9";
$igg_pos_ubs_toledo = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC 
LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente WHERE UBS1='$ubs_toledo' AND $table_ial.Exame='$exame_igg' AND $table_ial.Resultado='$positivo' AND $table_sinan.CLASSI_FIN>9";

/*Sql Biologia Médica Positivo das Unidades*/
$bm_pos_ubs_albertina= "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC 
LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente WHERE UBS1='$ubs_albertina' AND $table_ial.Exame='$exame_bm' AND $table_ial.Resultado='$positivo' AND $table_sinan.CLASSI_FIN>9";
$bm_pos_ubs_apuana = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC 
LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente WHERE UBS1='$ubs_albertina' AND $table_ial.Exame='$exame_bm' AND $table_ial.Resultado='$positivo' AND $table_sinan.CLASSI_FIN>9";
$bm_pos_ubs_edu = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC 
LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente WHERE UBS1='$ubs_edu' AND $table_ial.Exame='$exame_bm' AND $table_ial.Resultado='$positivo' AND $table_sinan.CLASSI_FIN>9";
$bm_pos_ubs_flor = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC 
LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente WHERE UBS1='$ubs_flor' AND $table_ial.Exame='$exame_bm' AND $table_ial.Resultado='$positivo' AND $table_sinan.CLASSI_FIN>9";
$bm_pos_ubs_fontalis = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC 
LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente WHERE UBS1='$ubs_fontalis' AND $table_ial.Exame='$exame_bm' AND $table_ial.Resultado='$positivo' AND $table_sinan.CLASSI_FIN>9";
$bm_pos_ubs_galvao = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC 
LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente WHERE UBS1='$ubs_galvao' AND $table_ial.Exame='$exame_bm' AND $table_ial.Resultado='$positivo' AND $table_sinan.CLASSI_FIN>9";
$bm_pos_ubs_joamar = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC 
LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente WHERE UBS1='$ubs_joamar' AND $table_ial.Exame='$exame_bm' AND $table_ial.Resultado='$positivo' AND $table_sinan.CLASSI_FIN>9";
$bm_pos_ubs_pedras = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC 
LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente WHERE UBS1='$ubs_pedras' AND $table_ial.Exame='$exame_bm' AND $table_ial.Resultado='$positivo' AND $table_sinan.CLASSI_FIN>9";
$bm_pos_ubs_jacana = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC 
LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente WHERE UBS1='$ubs_jacana' AND $table_ial.Exame='$exame_bm' AND $table_ial.Resultado='$positivo' AND $table_sinan.CLASSI_FIN>9";
$bm_pos_ubs_mariquinha = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC 
LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente WHERE UBS1='$ubs_mariquinha' AND $table_ial.Exame='$exame_bm' AND $table_ial.Resultado='$positivo' AND $table_sinan.CLASSI_FIN>9";
$bm_pos_ubs_toledo = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC 
LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente WHERE UBS1='$ubs_toledo' AND $table_ial.Exame='$exame_bm' AND $table_ial.Resultado='$positivo' AND $table_sinan.CLASSI_FIN>9";

/*Sql Teste Rápido Positivo das Unidades
$tr_pos_ubs_albertina = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC
LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente  WHERE UBS1='$ubs_albertina' AND $table_ial.Resultado IS NULL
AND $table_sinan.CLASSI_FIN>9 OR UBS1='$ubs_albertina' AND $table_sinan.CLASSI_FIN>9";
$tr_pos_ubs_apuana = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente
    WHERE UBS1='$ubs_apuana' AND $table_ial.Resultado IS NULL AND $table_sinan.CLASSI_FIN>9
    OR UBS1='$ubs_apuana' AND $table_sinan.CLASSI_FIN>9";
$tr_pos_ubs_edu = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente  
    WHERE UBS1='$ubs_edu' AND $table_ial.Resultado IS NULL AND $table_sinan.CLASSI_FIN>9
    OR UBS1='$ubs_edu' AND $table_sinan.CLASSI_FIN>9";
$tr_pos_ubs_flor = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente  
    WHERE UBS1='$ubs_flor' AND $table_ial.Resultado IS NULL AND $table_sinan.CLASSI_FIN>9
    OR UBS1='$ubs_flor' AND $table_sinan.CLASSI_FIN>9";
$tr_pos_ubs_fontalis = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente  
    WHERE UBS1='$ubs_fontalis' AND $table_ial.Resultado IS NULL AND $table_sinan.CLASSI_FIN>9
    OR UBS1='$ubs_fontalis' AND $table_sinan.CLASSI_FIN>9";
$tr_pos_ubs_galvao = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente  
    WHERE UBS1='$ubs_galvao' AND $table_ial.Resultado IS NULL AND $table_sinan.CLASSI_FIN>9
    OR UBS1='$ubs_galvao' AND $table_sinan.CLASSI_FIN>9";
$tr_pos_ubs_joamar = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente  
    WHERE UBS1='$ubs_joamar' AND $table_ial.Resultado IS NULL AND $table_sinan.CLASSI_FIN>9
    OR UBS1='$ubs_joamar' AND $table_sinan.CLASSI_FIN>9";
$tr_pos_ubs_pedras = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente  
    WHERE UBS1='$ubs_pedras' AND $table_ial.Resultado IS NULL AND $table_sinan.CLASSI_FIN>9
    OR UBS1='$ubs_pedras' AND $table_sinan.CLASSI_FIN>9";
$tr_pos_ubs_jacana = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente  
    WHERE UBS1='$ubs_jacana' AND $table_ial.Resultado IS NULL AND $table_sinan.CLASSI_FIN>9
    OR UBS1='$ubs_jacana' AND $table_sinan.CLASSI_FIN>9";
$tr_pos_ubs_mariquinha = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente  
    WHERE UBS1='$ubs_mariquinha' AND $table_ial.Resultado IS NULL AND $table_sinan.CLASSI_FIN>9
    OR UBS1='$ubs_mariquinha' AND $table_sinan.CLASSI_FIN>9";
$tr_pos_ubs_toledo = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente  
    WHERE UBS1='$ubs_toledo' AND $table_ial.Resultado IS NULL AND $table_sinan.CLASSI_FIN>9
    OR UBS1='$ubs_toledo' AND $table_sinan.CLASSI_FIN>9";*/

/*Sql IGM Negativo das Unidades*/
$igm_neg_ubs_albertina= "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC 
LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente WHERE UBS1='$ubs_albertina' AND $table_ial.Exame='$exame_igm' AND $table_ial.Resultado='$negativo' AND $table_sinan.CLASSI_FIN>9";
$igm_neg_ubs_apuana = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC 
LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente WHERE UBS1='$ubs_albertina' AND $table_ial.Exame='$exame_igm' AND $table_ial.Resultado='$negativo' AND $table_sinan.CLASSI_FIN>9";
$igm_neg_ubs_edu = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC 
LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente WHERE UBS1='$ubs_edu' AND $table_ial.Exame='$exame_igm' AND $table_ial.Resultado='$negativo' AND $table_sinan.CLASSI_FIN>9";
$igm_neg_ubs_flor = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC 
LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente WHERE UBS1='$ubs_flor' AND $table_ial.Exame='$exame_igm' AND $table_ial.Resultado='$negativo' AND $table_sinan.CLASSI_FIN>9";
$igm_neg_ubs_fontalis = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC 
LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente WHERE UBS1='$ubs_fontalis' AND $table_ial.Exame='$exame_igm' AND $table_ial.Resultado='$negativo' AND $table_sinan.CLASSI_FIN>9";
$igm_neg_ubs_galvao = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC 
LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente WHERE UBS1='$ubs_galvao' AND $table_ial.Exame='$exame_igm' AND $table_ial.Resultado='$negativo' AND $table_sinan.CLASSI_FIN>9";
$igm_neg_ubs_joamar = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC 
LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente WHERE UBS1='$ubs_joamar' AND $table_ial.Exame='$exame_igm' AND $table_ial.Resultado='$negativo' AND $table_sinan.CLASSI_FIN>9";
$igm_neg_ubs_pedras = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC 
LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente WHERE UBS1='$ubs_pedras' AND $table_ial.Exame='$exame_igm' AND $table_ial.Resultado='$negativo' AND $table_sinan.CLASSI_FIN>9";
$igm_neg_ubs_jacana = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC 
LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente WHERE UBS1='$ubs_jacana' AND $table_ial.Exame='$exame_igm' AND $table_ial.Resultado='$negativo' AND $table_sinan.CLASSI_FIN>9";
$igm_neg_ubs_mariquinha = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC 
LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente WHERE UBS1='$ubs_mariquinha' AND $table_ial.Exame='$exame_igm' AND $table_ial.Resultado='$negativo' AND $table_sinan.CLASSI_FIN>9";
$igm_neg_ubs_toledo = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC 
LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente WHERE UBS1='$ubs_toledo' AND $table_ial.Exame='$exame_igm' AND $table_ial.Resultado='$negativo' AND $table_sinan.CLASSI_FIN>9";

/*Sql IGG Negativo das Unidades*/
$igg_neg_ubs_albertina= "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC 
LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente WHERE UBS1='$ubs_albertina' AND $table_ial.Exame='$exame_igg' AND $table_ial.Resultado='$negativo' AND $table_sinan.CLASSI_FIN>9";
$igg_neg_ubs_apuana = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC 
LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente WHERE UBS1='$ubs_albertina' AND $table_ial.Exame='$exame_igg' AND $table_ial.Resultado='$negativo' AND $table_sinan.CLASSI_FIN>9";
$igg_neg_ubs_edu = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC 
LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente WHERE UBS1='$ubs_edu' AND $table_ial.Exame='$exame_igg' AND $table_ial.Resultado='$negativo' AND $table_sinan.CLASSI_FIN>9";
$igg_neg_ubs_flor = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC 
LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente WHERE UBS1='$ubs_flor' AND $table_ial.Exame='$exame_igg' AND $table_ial.Resultado='$negativo' AND $table_sinan.CLASSI_FIN>9";
$igg_neg_ubs_fontalis = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC 
LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente WHERE UBS1='$ubs_fontalis' AND $table_ial.Exame='$exame_igg' AND $table_ial.Resultado='$negativo' AND $table_sinan.CLASSI_FIN>9";
$igg_neg_ubs_galvao = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC 
LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente WHERE UBS1='$ubs_galvao' AND $table_ial.Exame='$exame_igg' AND $table_ial.Resultado='$negativo' AND $table_sinan.CLASSI_FIN>9";
$igg_neg_ubs_joamar = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC 
LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente WHERE UBS1='$ubs_joamar' AND $table_ial.Exame='$exame_igg' AND $table_ial.Resultado='$negativo' AND $table_sinan.CLASSI_FIN>9";
$igg_neg_ubs_pedras = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC 
LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente WHERE UBS1='$ubs_pedras' AND $table_ial.Exame='$exame_igg' AND $table_ial.Resultado='$negativo' AND $table_sinan.CLASSI_FIN>9";
$igg_neg_ubs_jacana = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC 
LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente WHERE UBS1='$ubs_jacana' AND $table_ial.Exame='$exame_igg' AND $table_ial.Resultado='$negativo' AND $table_sinan.CLASSI_FIN>9";
$igg_neg_ubs_mariquinha = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC 
LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente WHERE UBS1='$ubs_mariquinha' AND $table_ial.Exame='$exame_igg' AND $table_ial.Resultado='$negativo' AND $table_sinan.CLASSI_FIN>9";
$igg_neg_ubs_toledo = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC 
LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente WHERE UBS1='$ubs_toledo' AND $table_ial.Exame='$exame_igg' AND $table_ial.Resultado='$negativo' AND $table_sinan.CLASSI_FIN>9";

/*Sql Biologia Médica Negativo das Unidades*/
$bm_neg_ubs_albertina= "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC 
LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente WHERE UBS1='$ubs_albertina' AND $table_ial.Exame='$exame_bm' AND $table_ial.Resultado='$negativo' AND $table_sinan.CLASSI_FIN>9";
$bm_neg_ubs_apuana = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC 
LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente WHERE UBS1='$ubs_albertina' AND $table_ial.Exame='$exame_bm' AND $table_ial.Resultado='$negativo' AND $table_sinan.CLASSI_FIN>9";
$bm_neg_ubs_edu = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC 
LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente WHERE UBS1='$ubs_edu' AND $table_ial.Exame='$exame_bm' AND $table_ial.Resultado='$negativo' AND $table_sinan.CLASSI_FIN>9";
$bm_neg_ubs_flor = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC 
LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente WHERE UBS1='$ubs_flor' AND $table_ial.Exame='$exame_bm' AND $table_ial.Resultado='$negativo' AND $table_sinan.CLASSI_FIN>9";
$bm_neg_ubs_fontalis = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC 
LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente WHERE UBS1='$ubs_fontalis' AND $table_ial.Exame='$exame_bm' AND $table_ial.Resultado='$negativo' AND $table_sinan.CLASSI_FIN>9";
$bm_neg_ubs_galvao = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC 
LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente WHERE UBS1='$ubs_galvao' AND $table_ial.Exame='$exame_bm' AND $table_ial.Resultado='$negativo' AND $table_sinan.CLASSI_FIN>9";
$bm_neg_ubs_joamar = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC 
LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente WHERE UBS1='$ubs_joamar' AND $table_ial.Exame='$exame_bm' AND $table_ial.Resultado='$negativo' AND $table_sinan.CLASSI_FIN>9";
$bm_neg_ubs_pedras = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC 
LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente WHERE UBS1='$ubs_pedras' AND $table_ial.Exame='$exame_bm' AND $table_ial.Resultado='$negativo' AND $table_sinan.CLASSI_FIN>9";
$bm_neg_ubs_jacana = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC 
LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente WHERE UBS1='$ubs_jacana' AND $table_ial.Exame='$exame_bm' AND $table_ial.Resultado='$negativo' AND $table_sinan.CLASSI_FIN>9";
$bm_neg_ubs_mariquinha = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC 
LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente WHERE UBS1='$ubs_mariquinha' AND $table_ial.Exame='$exame_bm' AND $table_ial.Resultado='$negativo' AND $table_sinan.CLASSI_FIN>9";
$bm_neg_ubs_toledo = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC 
LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente WHERE UBS1='$ubs_toledo' AND $table_ial.Exame='$exame_bm' AND $table_ial.Resultado='$negativo' AND $table_sinan.CLASSI_FIN>9";




//Total de Notificados Da 38
$not_38_total = "SELECT COUNT($table_sql.nDoc) FROM $table_sql
WHERE Da='38'";

//Total de Notificados Da 83
$not_83_total = "SELECT COUNT($table_sql.nDoc) FROM $table_sql
WHERE Da='83'";

//Total de Reagentes Da 38
$pos_38_total = "SELECT COUNT($table_sql.nDoc) 
    FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente  
    WHERE $table_sql.Da='38' AND $table_ial.Resultado='$positivo' AND $table_sinan.CLASSI_FIN>9
    OR $table_sql.Da='38' AND $table_ial.Resultado='$positivo' AND $table_sinan.CLASSI_FIN>9";

//Total de Reagentes Da 83
$pos_83_total = "SELECT COUNT($table_sql.nDoc) 
    FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente  
    WHERE $table_sql.Da='83' AND $table_ial.Resultado='$positivo' AND $table_sinan.CLASSI_FIN>9
    OR $table_sql.Da='83' AND $table_ial.Resultado='$positivo' AND $table_sinan.CLASSI_FIN>9";

//Total de Não Reagentes Da 38
$neg_38_total = "SELECT COUNT($table_sql.nDoc) 
    FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente  
    WHERE $table_sql.Da='38' AND $table_ial.Resultado='$negativo'
    OR $table_sql.Da='38' AND $table_ial.Resultado='$negativo'";

//Total de Não Reagentes Da 83
$neg_83_total = "SELECT COUNT($table_sql.nDoc) 
    FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente  
    WHERE $table_sql.Da='83' AND $table_ial.Resultado='$negativo'
    OR $table_sql.Da='83' AND $table_ial.Resultado='$negativo'";

//Total de Sem Coleta Da 38
$sem_col_38_total = "SELECT COUNT($table_sql.nDoc) 
    FROM $table_sql LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente  
    WHERE $table_sql.Da='38' AND  $table_ial.Resultado IS NULL";

//Total de Sem Coleta Da 83
$sem_col_83_total = "SELECT COUNT($table_sql.nDoc) 
    FROM $table_sql LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente  
    WHERE $table_sql.Da='83' AND  $table_ial.Resultado IS NULL";

//Sql ial Sem Coleta Total
$sem_col_total = "SELECT COUNT($table_sql.nDoc) FROM $table_sql LEFT JOIN $table_ial
ON $table_sql.NomeSolicitante = $table_ial.Paciente WHERE  $table_ial.Resultado IS NULL";

//Sql ial Coleta Inadequada Da 38 Total
$col_ina_total = "SELECT COUNT($table_sql.nDoc) FROM $table_sql LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente 
WHERE $table_ial.Resultado='$col_ina' 
OR $table_ial.Resultado='$col_ina'";

//Sql ial Coleta Inadequada Da 38 Total
$col_ina_38_total = "SELECT COUNT($table_sql.nDoc) FROM $table_sql LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente 
WHERE $table_sql.Da='38' AND $table_ial.Resultado='$col_ina' 
OR $table_sql.Da='38'";

//Sql ial Coleta Inadequada Da 83 Total
$col_ina_83_total = "SELECT COUNT($table_sql.nDoc) FROM $table_sql LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente 
WHERE $table_sql.Da='83' AND $table_ial.Resultado='$col_ina' 
OR $table_sql.Da='83'";

//Sql ial Inconclusivo Da 38
$inco_38_total = "SELECT COUNT($table_sql.nDoc) FROM $table_sql LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente  
    WHERE $table_sql.Da='38' AND $table_ial.Resultado='$inconclusivo'
    OR $table_sql.Da='38' AND $table_ial.Resultado='$inconclusivo'";

//Sql ial Inconclusivo Da 83
$inco_83_total = "SELECT COUNT($table_sql.nDoc) FROM $table_sql LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente  
    WHERE $table_sql.Da='83' AND $table_ial.Resultado='$inconclusivo'
    OR $table_sql.Da='83' AND $table_ial.Resultado='$inconclusivo'";

//Sql ial Inconclusivo
$inco_total = "SELECT COUNT($table_sql.nDoc) FROM $table_sql LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente  
    WHERE $table_ial.Resultado='$inconclusivo'
    OR $table_ial.Resultado='$inconclusivo'";

//Sql IGM Positivo Total
$igm_pos_total = "SELECT COUNT($table_sql.nDoc) 
    FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente  
    WHERE $table_ial.Resultado='$positivo' AND $table_sinan.CLASSI_FIN>9";

//Sql IgG Positivo Total
$igg_pos_total = "SELECT COUNT($table_sql.nDoc)
    FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente
    WHERE $table_ial.Exame='$exame_igg' AND $table_ial.Resultado='$positivo' AND $table_sinan.CLASSI_FIN>9";

//Sql Biologia Médica Positivo Total
$bm_pos_total = "SELECT COUNT($table_sql.nDoc)
    FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente
    WHERE $table_ial.Exame='$exame_igg' AND $table_ial.Resultado='$positivo' AND $table_sinan.CLASSI_FIN>9";


//Sql IGM Negativo Total
$igm_neg_total = "SELECT COUNT($table_sql.nDoc) 
    FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente  
    WHERE $table_ial.Resultado='$negativo' AND $table_sinan.CLASSI_FIN>9";

//Sql IgG negitivo Total
$igg_neg_total = "SELECT COUNT($table_sql.nDoc)
    FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente
    WHERE $table_ial.Exame='$exame_igg' AND $table_ial.Resultado='$negativo' AND $table_sinan.CLASSI_FIN>9";

//Sql Biologia Médica negitivo Total
$bm_neg_total = "SELECT COUNT($table_sql.nDoc)
    FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC LEFT JOIN $table_ial ON $table_sql.NomeSolicitante = $table_ial.Paciente
    WHERE $table_ial.Exame='$exame_igg' AND $table_ial.Resultado='$negativo' AND $table_sinan.CLASSI_FIN>9";
