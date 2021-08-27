<?php
//Código desenvolvido por Rodolfo Romaioli Ribeiro de Jesus - início 26/09/2019 às 14:00 hs
//Email: rodolfo.romaioli@gmail.com

//Variável que guarda a contagem do campo "nDoc" da tabela tblSarampo
$count_ndoc = "COUNT($table_sql.nDoc)";

//Variáveis que guardam o nome das Unidades Básicas de Saúde
$ama_joamar = 'AMA J JOAMAR'; $ama_wamberto = 'AMA WAMBERTO DIAS DA COSTA';
$ubs_albertina = 'UBS V ALBERTINA DR OSVALDO MARCAL'; $ubs_mariquinha = 'UBS DONA MARIQUINHA SCIASCIA'; $ubs_toledo = 'UBS DR JOSE TOLEDO PIZA'; $ubs_apuana = 'UBS J APUANA';
$ubs_flor = 'UBS J FLOR DE MAIO'; $ubs_fontalis = 'UBS J FONTALIS'; $ubs_joamar = 'UBS J JOAMAR'; $ubs_jacana = 'UBS JACANA'; $ubs_pedras = 'UBS JARDIM DAS PEDRAS';
$ubs_edu = 'UBS PQ EDU CHAVES'; $ubs_galvao = 'UBS V NOVA GALVAO'; $gonzaga = 'HOSP SAO LUIZ GONZAGA';

//Variável que conta e armazena o total de Casos em Unidades de Residência
$un_res_total = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC
WHERE ubs='$ubs_albertina' OR ubs='$ubs_apuana' OR ubs='$ubs_edu' OR ubs='$ubs_flor' OR ubs='$ubs_fontalis' OR ubs='$ubs_galvao' OR ubs='$ubs_joamar' OR ubs='$ubs_pedras'
OR ubs='$ubs_jacana' OR ubs='$ubs_mariquinha' OR ubs='$ubs_toledo'";

//Variável que conta e armazena o Total de Casos em Unidades de Notificação
$un_not_total = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC WHERE UnidadeNotificadora='$ubs_albertina' OR UnidadeNotificadora='$ubs_apuana' 
OR UnidadeNotificadora='$ubs_edu' OR UnidadeNotificadora='$ubs_flor' OR UnidadeNotificadora='$ubs_fontalis' OR UnidadeNotificadora='$ubs_galvao' 
OR UnidadeNotificadora='$ubs_joamar' OR UnidadeNotificadora='$ubs_pedras' OR UnidadeNotificadora='$ubs_jacana' OR UnidadeNotificadora='$ubs_mariquinha' 
OR UnidadeNotificadora='$ubs_toledo'";

//Variáveis que contam e armazenam o Total de Casos por Ubs de Residência
$ubs_res_albertina = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC WHERE ubs='$ubs_albertina'";
$ubs_res_apuana = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC WHERE ubs='$ubs_apuana'";
$ubs_res_edu = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC WHERE ubs='$ubs_edu'";
$ubs_res_flor = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC WHERE ubs='$ubs_flor'";
$ubs_res_fontalis = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC WHERE ubs='$ubs_fontalis'";
$ubs_res_galvao = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC WHERE ubs='$ubs_galvao'";
$ubs_res_joamar = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC WHERE ubs='$ubs_joamar'";
$ubs_res_pedras = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC WHERE ubs='$ubs_pedras'";
$ubs_res_jacana = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC WHERE ubs='$ubs_jacana'";
$ubs_res_mariquinha = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC WHERE ubs='$ubs_mariquinha'";
$ubs_res_toledo = "SELECT COUNT($table_sql.nDoc) FROM $table_sql INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC WHERE ubs='$ubs_toledo'";

//Variáveis que contam e armazenam o Total de Casos por Unidade Notificante
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

/*--------------------------------------------------------------------------------------------
                                Casos Positivos de Sarampo nas Unidades
----------------------------------------------------------------------------------------------
*/

//Casos Positivos de Sarampo na Ubs ALbertina
$neg_ubs_albertina = "SELECT COUNT($table_sql.nDoc) FROM $table_sql
INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC WHERE
ID_DISTRIT='70' AND CLASSI_FIN=1 AND CRITERIO=1 AND ID_S1_IGM=1  AND ubs='$ubs_albertina' OR
ID_DISTRIT='70' AND CLASSI_FIN=1 AND CRITERIO=1 AND ID_S2_IGM=1 AND ubs='$ubs_albertina' OR
ID_DISTRIT='70' AND CLASSI_FIN=1 AND CRITERIO=1 AND ID_RE_IGM=1 AND ubs='$ubs_albertina' OR
ID_DISTRIT='70' AND CLASSI_FIN=1 AND CRITERIO=1 AND ID_ETIOLOG=1 AND ubs='$ubs_albertina'";

//Casos Positivos de Sarampo da Ubs Apuanã
$pos_ubs_apuana = "SELECT COUNT($table_sql.nDoc) FROM $table_sql
INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC WHERE
ID_DISTRIT='70' AND CLASSI_FIN=1 AND CRITERIO=1 AND ID_S1_IGM=1  AND ubs='$ubs_apuana' OR
ID_DISTRIT='70' AND CLASSI_FIN=1 AND CRITERIO=1 AND ID_S2_IGM=1 AND ubs='$ubs_apuana' OR
ID_DISTRIT='70' AND CLASSI_FIN=1 AND CRITERIO=1 AND ID_RE_IGM=1 AND ubs='$ubs_apuana' OR
ID_DISTRIT='70' AND CLASSI_FIN=1 AND CRITERIO=1 AND ID_ETIOLOG=1 AND ubs='$ubs_apuana'";

//Casos Positivos de Sarampo da Ubs Edu Chaves
$pos_ubs_edu = "SELECT COUNT($table_sql.nDoc) FROM $table_sql
INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC WHERE
ID_DISTRIT='70' AND CLASSI_FIN=1 AND CRITERIO=1 AND ID_S1_IGM=1  AND ubs='$ubs_edu' OR
ID_DISTRIT='70' AND CLASSI_FIN=1 AND CRITERIO=1 AND ID_S2_IGM=1 AND ubs='$ubs_edu' OR
ID_DISTRIT='70' AND CLASSI_FIN=1 AND CRITERIO=1 AND ID_RE_IGM=1 AND ubs='$ubs_edu' OR
ID_DISTRIT='70' AND CLASSI_FIN=1 AND CRITERIO=1 AND ID_ETIOLOG=1 AND ubs='$ubs_edu'";

//Casos Positivos de Sarampo da Ubs Flor de Maio
$pos_ubs_flor = "SELECT COUNT($table_sql.nDoc) FROM $table_sql
INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC WHERE
ID_DISTRIT='70' AND CLASSI_FIN=1 AND CRITERIO=1 AND ID_S1_IGM=1  AND ubs='$ubs_flor' OR
ID_DISTRIT='70' AND CLASSI_FIN=1 AND CRITERIO=1 AND ID_S2_IGM=1 AND ubs='$ubs_flor' OR
ID_DISTRIT='70' AND CLASSI_FIN=1 AND CRITERIO=1 AND ID_RE_IGM=1 AND ubs='$ubs_flor' OR
ID_DISTRIT='70' AND CLASSI_FIN=1 AND CRITERIO=1 AND ID_ETIOLOG=1 AND ubs='$ubs_flor'";

//Casos Positivos de Sarampo da Ubs Fontalis
$pos_ubs_fontalis = "SELECT COUNT($table_sql.nDoc) FROM $table_sql 
INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC WHERE
ID_DISTRIT='70' AND CLASSI_FIN=1 AND CRITERIO=1 AND ID_S1_IGM=1  AND ubs='$ubs_fontalis' OR
ID_DISTRIT='70' AND CLASSI_FIN=1 AND CRITERIO=1 AND ID_S2_IGM=1 AND ubs='$ubs_fontalis' OR
ID_DISTRIT='70' AND CLASSI_FIN=1 AND CRITERIO=1 AND ID_RE_IGM=1 AND ubs='$ubs_fontalis' OR
ID_DISTRIT='70' AND CLASSI_FIN=1 AND CRITERIO=1 AND ID_ETIOLOG=1 AND ubs='$ubs_fontalis'";

//Casos Positivos de Sarampo da Ubs Vila Nova Galvão
$pos_ubs_galvao = "SELECT COUNT($table_sql.nDoc) FROM $table_sql 
INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC WHERE
ID_DISTRIT='70' AND CLASSI_FIN=1 AND CRITERIO=1 AND ID_S1_IGM=1  AND ubs='$ubs_galvao' OR
ID_DISTRIT='70' AND CLASSI_FIN=1 AND CRITERIO=1 AND ID_S2_IGM=1 AND ubs='$ubs_galvao' OR
ID_DISTRIT='70' AND CLASSI_FIN=1 AND CRITERIO=1 AND ID_RE_IGM=1 AND ubs='$ubs_galvao' OR
ID_DISTRIT='70' AND CLASSI_FIN=1 AND CRITERIO=1 AND ID_ETIOLOG=1 AND ubs='$ubs_galvao'";

//Casos Positivos de Sarampo da Ubs Joamar
$pos_ubs_joamar = "SELECT COUNT($table_sql.nDoc) FROM $table_sql 
INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC WHERE
ID_DISTRIT='70' AND CLASSI_FIN=1 AND CRITERIO=1 AND ID_S1_IGM=1  AND ubs='$ubs_joamar' OR
ID_DISTRIT='70' AND CLASSI_FIN=1 AND CRITERIO=1 AND ID_S2_IGM=1 AND ubs='$ubs_joamar' OR
ID_DISTRIT='70' AND CLASSI_FIN=1 AND CRITERIO=1 AND ID_RE_IGM=1 AND ubs='$ubs_joamar' OR
ID_DISTRIT='70' AND CLASSI_FIN=1 AND CRITERIO=1 AND ID_ETIOLOG=1 AND ubs='$ubs_joamar'";

//Casos Positivos de Sarampo da Ubs Jardim das Pedras
$pos_ubs_pedras = "SELECT COUNT($table_sql.nDoc) FROM $table_sql
INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC WHERE
ID_DISTRIT='70' AND CLASSI_FIN=1 AND CRITERIO=1 AND ID_S1_IGM=1  AND ubs='$ubs_pedras' OR
ID_DISTRIT='70' AND CLASSI_FIN=1 AND CRITERIO=1 AND ID_S2_IGM=1 AND ubs='$ubs_pedras' OR
ID_DISTRIT='70' AND CLASSI_FIN=1 AND CRITERIO=1 AND ID_RE_IGM=1 AND ubs='$ubs_pedras' OR
ID_DISTRIT='70' AND CLASSI_FIN=1 AND CRITERIO=1 AND ID_ETIOLOG=1 AND ubs='$ubs_pedras'";

//Casos Positivos de Sarampo da Ubs Jaçana
$pos_ubs_jacana = "SELECT COUNT($table_sql.nDoc) FROM $table_sql 
INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC WHERE
ID_DISTRIT='70' AND CLASSI_FIN=1 AND CRITERIO=1 AND ID_S1_IGM=1  AND ubs='$ubs_jacana' OR
ID_DISTRIT='70' AND CLASSI_FIN=1 AND CRITERIO=1 AND ID_S2_IGM=1 AND ubs='$ubs_jacana' OR
ID_DISTRIT='70' AND CLASSI_FIN=1 AND CRITERIO=1 AND ID_RE_IGM=1 AND ubs='$ubs_jacana' OR
ID_DISTRIT='70' AND CLASSI_FIN=1 AND CRITERIO=1 AND ID_ETIOLOG=1 AND ubs='$ubs_jacana'";

//Casos Positivos da Ubs Mariquinha
$pos_ubs_mariquinha = "SELECT COUNT($table_sql.nDoc) FROM $table_sql
INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC WHERE
ID_DISTRIT='70' AND CLASSI_FIN=1 AND CRITERIO=1 AND ID_S1_IGM=1  AND ubs='$ubs_mariquinha' OR
ID_DISTRIT='70' AND CLASSI_FIN=1 AND CRITERIO=1 AND ID_S2_IGM=1 AND ubs='$ubs_mariquinha' OR
ID_DISTRIT='70' AND CLASSI_FIN=1 AND CRITERIO=1 AND ID_RE_IGM=1 AND ubs='$ubs_mariquinha' OR
ID_DISTRIT='70' AND CLASSI_FIN=1 AND CRITERIO=1 AND ID_ETIOLOG=1 AND ubs='$ubs_mariquinha'";

//E por fim os Casos Positivos de Sarampo da Ubs Toledo Piza
$pos_ubs_toledo = "SELECT COUNT($table_sql.nDoc) FROM $table_sql 
INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC WHERE
ID_DISTRIT='70' AND CLASSI_FIN=1 AND CRITERIO=1 AND ID_S1_IGM=1  AND ubs='$ubs_toledo' OR
ID_DISTRIT='70' AND CLASSI_FIN=1 AND CRITERIO=1 AND ID_S2_IGM=1 AND ubs='$ubs_toledo' OR
ID_DISTRIT='70' AND CLASSI_FIN=1 AND CRITERIO=1 AND ID_RE_IGM=1 AND ubs='$ubs_toledo' OR
ID_DISTRIT='70' AND CLASSI_FIN=1 AND CRITERIO=1 AND ID_ETIOLOG=1 AND ubs='$ubs_toledo'";

/*--------------------------------------------------------------------------------------------
                                Casos Negativos de Sarampo nas Unidades
----------------------------------------------------------------------------------------------
*/

//Casos Negativos de Sarampo da Ubs Albertina
$neg_ubs_albertina = "SELECT COUNT($table_sql.nDoc) FROM $table_sql
INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC WHERE
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ID_S1_IGM=2 AND ubs='$ubs_albertina' OR
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ID_S2_IGM=2 AND ubs='$ubs_albertina' OR
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ID_RE_IGM=2 AND ubs='$ubs_albertina' OR
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ubs='$ubs_albertina'";

//Casos Negativos de Sarampo da Ubs Apuanã
$neg_ubs_apuana = "SELECT COUNT($table_sql.nDoc) FROM $table_sql
INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC WHERE
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ID_S1_IGM=2 AND ubs='$ubs_apuana' OR
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ID_S2_IGM=2 AND ubs='$ubs_apuana' OR
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ID_RE_IGM=2 AND ubs='$ubs_apuana' OR
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ubs='$ubs_apuana'";

//Casos Negativos de Sarampo da Ubs Edu Chaves
$neg_ubs_edu = "SELECT COUNT($table_sql.nDoc) FROM $table_sql
INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC WHERE
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ID_S1_IGM=2 AND ubs='$ubs_edu' OR
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ID_S2_IGM=2 AND ubs='$ubs_edu' OR
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ID_RE_IGM=2 AND ubs='$ubs_edu' OR
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ubs='$ubs_edu'";

//Casos Negativos de Sarampo da Ubs Flor de Maio
$neg_ubs_flor = "SELECT COUNT($table_sql.nDoc) FROM $table_sql
INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC WHERE
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ID_S1_IGM=2 AND ubs='$ubs_flor' OR
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ID_S2_IGM=2 AND ubs='$ubs_flor' OR
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ID_RE_IGM=2 AND ubs='$ubs_flor' OR
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ubs='$ubs_flor'";

//Casos Negativos de Sarampo da Ubs Fontalis
$neg_ubs_fontalis = "SELECT COUNT($table_sql.nDoc) FROM $table_sql
INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC WHERE
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ID_S1_IGM=2 AND ubs='$ubs_fontalis' OR
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ID_S2_IGM=2 AND ubs='$ubs_fontalis' OR
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ID_RE_IGM=2 AND ubs='$ubs_fontalis' OR
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ubs='$ubs_fontalis'";

//Casos Negativos de Sarampo da Ubs Vila Nova Galvão
$neg_ubs_galvao = "SELECT COUNT($table_sql.nDoc) FROM $table_sql
INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC WHERE
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ID_S1_IGM=2 AND ubs='$ubs_galvao' OR
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ID_S2_IGM=2 AND ubs='$ubs_galvao' OR
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ID_RE_IGM=2 AND ubs='$ubs_galvao' OR
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ubs='$ubs_galvao'";

//Casos Negativos de Sarampo da Ubs Jardim Joamar
$neg_ubs_joamar = "SELECT COUNT($table_sql.nDoc) FROM $table_sql
INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC WHERE
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ID_S1_IGM=2 AND ubs='$ubs_joamar' OR
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ID_S2_IGM=2 AND ubs='$ubs_joamar' OR
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ID_RE_IGM=2 AND ubs='$ubs_joamar' OR
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ubs='$ubs_joamar'";

//Casos Negativos de Sarampo da Ubs Jardim das Pedras
$neg_ubs_pedras = "SELECT COUNT($table_sql.nDoc) FROM $table_sql
INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC WHERE
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ID_S1_IGM=2 AND ubs='$ubs_pedras' OR
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ID_S2_IGM=2 AND ubs='$ubs_pedras' OR
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ID_RE_IGM=2 AND ubs='$ubs_pedras' OR
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ubs='$ubs_pedras'";

//Casos Negativos de Sarampo da Ubs Jaçanã
$neg_ubs_jacana = "SELECT COUNT($table_sql.nDoc) FROM $table_sql
INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC WHERE
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ID_S1_IGM=2 AND ubs='$ubs_jacana' OR
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ID_S2_IGM=2 AND ubs='$ubs_jacana' OR
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ID_RE_IGM=2 AND ubs='$ubs_jacana' OR
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ubs='$ubs_jacana'";

//Casos Negativos de Sarampo da Ubs Mariquinha
$neg_ubs_mariquinha = "SELECT COUNT($table_sql.nDoc) FROM $table_sql
INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC WHERE
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ID_S1_IGM=2 AND ubs='$ubs_mariquinha' OR
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ID_S2_IGM=2 AND ubs='$ubs_mariquinha' OR
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ID_RE_IGM=2 AND ubs='$ubs_mariquinha' OR
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ubs='$ubs_mariquinha'";

//E por e não menos importante os Casos Negativos de Sarampo da Ubs Toledo Piza
$neg_ubs_toledo = "SELECT COUNT($table_sql.nDoc) FROM $table_sql
INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC WHERE
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ID_S1_IGM=2 AND ubs='$ubs_toledo' OR
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ID_S2_IGM=2 AND ubs='$ubs_toledo' OR
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ID_RE_IGM=2 AND ubs='$ubs_toledo' OR
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ubs='$ubs_toledo'";

/*--------------------------------------------------------------------------------------------
                                Casos em Análise de Sarampo nas Unidades
----------------------------------------------------------------------------------------------
*/

//Casos em Análise de Sarampo da Ubs Albertina
$em_ana_ubs_albertina = "SELECT COUNT($table_sql.nDoc) FROM $table_sql
INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC WHERE
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND DT_COL_1  AND ubs='$ubs_albertina' LIKE '%2019' OR
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND ID_URINA=1 AND ubs='$ubs_albertina' OR
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND ID_SECRECA=1 AND ubs='$ubs_albertina' OR
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND NOT DT_COL_1 AND ubs='$ubs_albertina' LIKE '%2019' OR
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND NOT DT_COL_2 AND ubs='$ubs_albertina' LIKE '%2019' OR
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND ID_SECRECA < 1 AND ubs='$ubs_albertina' OR
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND ID_URINA < 1 AND ubs='$ubs_albertina' ";

//Casos em Análise de Sarampo da Ubs Apuana
$neg_ubs_apuana = "SELECT COUNT($table_sql.nDoc) FROM $table_sql
INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC WHERE
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND DT_COL_1  AND ubs='$ubs_apuana' LIKE '%2019' OR
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND ID_URINA=1 AND ubs='$ubs_apuana' OR
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND ID_SECRECA=1 AND ubs='$ubs_apuana' OR
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND NOT DT_COL_1 AND ubs='$ubs_apuana' LIKE '%2019' OR
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND NOT DT_COL_2 AND ubs='$ubs_apuana' LIKE '%2019' OR
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND ID_SECRECA < 1 AND ubs='$ubs_apuana' OR
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND ID_URINA < 1 AND ubs='$ubs_apuana'";

//Casos em Análise de Sarampo da Ubs Edu Chaves
$neg_ubs_edu = "SELECT COUNT($table_sql.nDoc) FROM $table_sql
INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC WHERE
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND DT_COL_1  AND ubs='$ubs_edu' LIKE '%2019' OR
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND ID_URINA=1 AND ubs='$ubs_edu' OR
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND ID_SECRECA=1 AND ubs='$ubs_edu' OR
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND NOT DT_COL_1 AND ubs='$ubs_edu' LIKE '%2019' OR
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND NOT DT_COL_2 AND ubs='$ubs_edu' LIKE '%2019' OR
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND ID_SECRECA < 1 AND ubs='$ubs_edu' OR
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND ID_URINA < 1 AND ubs='$ubs_edu'";

//Casos em Análise de Sarampo da Ubs Flor de Maio
$neg_ubs_flor = "SELECT COUNT($table_sql.nDoc) FROM $table_sql
INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC WHERE
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND DT_COL_1  AND ubs='$ubs_flor' LIKE '%2019' OR
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND ID_URINA=1 AND ubs='$ubs_flor' OR
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND ID_SECRECA=1 AND ubs='$ubs_flor' OR
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND NOT DT_COL_1 AND ubs='$ubs_flor' LIKE '%2019' OR
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND NOT DT_COL_2 AND ubs='$ubs_flor' LIKE '%2019' OR
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND ID_SECRECA < 1 AND ubs='$ubs_flor' OR
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND ID_URINA < 1 AND ubs='$ubs_flor' ";

//Casos em Análise de Sarampo da Ubs Fontalis
$neg_ubs_fontalis = "SELECT COUNT($table_sql.nDoc) FROM $table_sql
INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC WHERE
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND DT_COL_1  AND ubs='$ubs_' LIKE '%2019' OR
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND ID_URINA=1 AND ubs='$ubs_' OR
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND ID_SECRECA=1 AND ubs='$ubs_' OR
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND NOT DT_COL_1 AND ubs='$ubs_' LIKE '%2019' OR
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND NOT DT_COL_2 AND ubs='$ubs_' LIKE '%2019' OR
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND ID_SECRECA < 1 AND ubs='$ubs_' OR
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND ID_URINA < 1 AND ubs='$ubs_' ";

//Casos em Análise de Sarampo da Ubs Galvão
$neg_ubs_galvao = "SELECT COUNT($table_sql.nDoc) FROM $table_sql
INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC WHERE
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND DT_COL_1  AND ubs='$ubs_' LIKE '%2019' OR
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND ID_URINA=1 AND ubs='$ubs_' OR
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND ID_SECRECA=1 AND ubs='$ubs_' OR
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND NOT DT_COL_1 AND ubs='$ubs_' LIKE '%2019' OR
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND NOT DT_COL_2 AND ubs='$ubs_' LIKE '%2019' OR
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND ID_SECRECA < 1 AND ubs='$ubs_' OR
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND ID_URINA < 1 AND ubs='$ubs_' ";

//Casos em Análise de Sarampo da Ubs Joamar
$neg_ubs_joamar = "SELECT COUNT($table_sql.nDoc) FROM $table_sql
INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC WHERE
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND DT_COL_1  AND ubs='$ubs_' LIKE '%2019' OR
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND ID_URINA=1 AND ubs='$ubs_' OR
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND ID_SECRECA=1 AND ubs='$ubs_' OR
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND NOT DT_COL_1 AND ubs='$ubs_' LIKE '%2019' OR
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND NOT DT_COL_2 AND ubs='$ubs_' LIKE '%2019' OR
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND ID_SECRECA < 1 AND ubs='$ubs_' OR
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND ID_URINA < 1 AND ubs='$ubs_' ";

//Casos em Análise de Sarampo da Ubs Jardim das Pedras
$neg_ubs_pedras = "SELECT COUNT($table_sql.nDoc) FROM $table_sql
INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC WHERE
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND DT_COL_1  AND ubs='$ubs_' LIKE '%2019' OR
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND ID_URINA=1 AND ubs='$ubs_' OR
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND ID_SECRECA=1 AND ubs='$ubs_' OR
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND NOT DT_COL_1 AND ubs='$ubs_' LIKE '%2019' OR
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND NOT DT_COL_2 AND ubs='$ubs_' LIKE '%2019' OR
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND ID_SECRECA < 1 AND ubs='$ubs_' OR
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND ID_URINA < 1 AND ubs='$ubs_' ";

//Casos em Análise de Sarampo da Ubs
$neg_ubs_jacana = "SELECT COUNT($table_sql.nDoc) FROM $table_sql
INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC WHERE
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND DT_COL_1  AND ubs='$ubs_' LIKE '%2019' OR
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND ID_URINA=1 AND ubs='$ubs_' OR
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND ID_SECRECA=1 AND ubs='$ubs_' OR
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND NOT DT_COL_1 AND ubs='$ubs_' LIKE '%2019' OR
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND NOT DT_COL_2 AND ubs='$ubs_' LIKE '%2019' OR
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND ID_SECRECA < 1 AND ubs='$ubs_' OR
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND ID_URINA < 1 AND ubs='$ubs_' ";

//Casos em Análise de Sarampo da Ubs
$neg_ubs_mariquinha = "SELECT COUNT($table_sql.nDoc) FROM $table_sql
INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC WHERE
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND DT_COL_1  AND ubs='$ubs_' LIKE '%2019' OR
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND ID_URINA=1 AND ubs='$ubs_' OR
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND ID_SECRECA=1 AND ubs='$ubs_' OR
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND NOT DT_COL_1 AND ubs='$ubs_' LIKE '%2019' OR
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND NOT DT_COL_2 AND ubs='$ubs_' LIKE '%2019' OR
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND ID_SECRECA < 1 AND ubs='$ubs_' OR
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND ID_URINA < 1 AND ubs='$ubs_' ";

//Casos em Análise de Sarampo da Ubs
$neg_ubs_toledo = "SELECT COUNT($table_sql.nDoc) FROM $table_sql
INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC WHERE
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND DT_COL_1  AND ubs='$ubs_' LIKE '%2019' OR
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND ID_URINA=1 AND ubs='$ubs_' OR
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND ID_SECRECA=1 AND ubs='$ubs_' OR
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND NOT DT_COL_1 AND ubs='$ubs_' LIKE '%2019' OR
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND NOT DT_COL_2 AND ubs='$ubs_' LIKE '%2019' OR
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND ID_SECRECA < 1 AND ubs='$ubs_' OR
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND ID_URINA < 1 AND ubs='$ubs_' ";


/*--------------------------------------------------------------------------------------------
                                Casos Inconclusivos de Sarampo nas Unidades
----------------------------------------------------------------------------------------------
*/

//Casos Negativos de Sarampo da Ubs Albertina
$neg_ubs_albertina = "SELECT COUNT($table_sql.nDoc) FROM $table_sql
INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC WHERE
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ID_S1_IGM=2 AND ubs='$ubs_albertina' OR
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ID_S2_IGM=2 AND ubs='$ubs_albertina' OR
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ID_RE_IGM=2 AND ubs='$ubs_albertina' OR
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ubs='$ubs_albertina'";

//Casos Negativos de Sarampo da Ubs Apuanã
$neg_ubs_apuana = "SELECT COUNT($table_sql.nDoc) FROM $table_sql
INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC WHERE
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ID_S1_IGM=2 AND ubs='$ubs_apuana' OR
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ID_S2_IGM=2 AND ubs='$ubs_apuana' OR
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ID_RE_IGM=2 AND ubs='$ubs_apuana' OR
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ubs='$ubs_apuana'";

//Casos Negativos de Sarampo da Ubs Edu Chaves
$neg_ubs_edu = "SELECT COUNT($table_sql.nDoc) FROM $table_sql
INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC WHERE
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ID_S1_IGM=2 AND ubs='$ubs_edu' OR
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ID_S2_IGM=2 AND ubs='$ubs_edu' OR
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ID_RE_IGM=2 AND ubs='$ubs_edu' OR
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ubs='$ubs_edu'";

//Casos Negativos de Sarampo da Ubs Flor de Maio
$neg_ubs_flor = "SELECT COUNT($table_sql.nDoc) FROM $table_sql
INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC WHERE
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ID_S1_IGM=2 AND ubs='$ubs_flor' OR
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ID_S2_IGM=2 AND ubs='$ubs_flor' OR
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ID_RE_IGM=2 AND ubs='$ubs_flor' OR
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ubs='$ubs_flor'";

//Casos Negativos de Sarampo da Ubs Fontalis
$neg_ubs_fontalis = "SELECT COUNT($table_sql.nDoc) FROM $table_sql
INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC WHERE
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ID_S1_IGM=2 AND ubs='$ubs_fontalis' OR
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ID_S2_IGM=2 AND ubs='$ubs_fontalis' OR
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ID_RE_IGM=2 AND ubs='$ubs_fontalis' OR
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ubs='$ubs_fontalis'";

//Casos Negativos de Sarampo da Ubs Vila Nova Galvão
$neg_ubs_galvao = "SELECT COUNT($table_sql.nDoc) FROM $table_sql
INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC WHERE
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ID_S1_IGM=2 AND ubs='$ubs_galvao' OR
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ID_S2_IGM=2 AND ubs='$ubs_galvao' OR
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ID_RE_IGM=2 AND ubs='$ubs_galvao' OR
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ubs='$ubs_galvao'";

//Casos Negativos de Sarampo da Ubs Jardim Joamar
$neg_ubs_joamar = "SELECT COUNT($table_sql.nDoc) FROM $table_sql
INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC WHERE
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ID_S1_IGM=2 AND ubs='$ubs_joamar' OR
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ID_S2_IGM=2 AND ubs='$ubs_joamar' OR
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ID_RE_IGM=2 AND ubs='$ubs_joamar' OR
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ubs='$ubs_joamar'";

//Casos Negativos de Sarampo da Ubs Jardim das Pedras
$neg_ubs_pedras = "SELECT COUNT($table_sql.nDoc) FROM $table_sql
INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC WHERE
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ID_S1_IGM=2 AND ubs='$ubs_pedras' OR
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ID_S2_IGM=2 AND ubs='$ubs_pedras' OR
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ID_RE_IGM=2 AND ubs='$ubs_pedras' OR
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ubs='$ubs_pedras'";

//Casos Negativos de Sarampo da Ubs Jaçanã
$neg_ubs_jacana = "SELECT COUNT($table_sql.nDoc) FROM $table_sql
INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC WHERE
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ID_S1_IGM=2 AND ubs='$ubs_jacana' OR
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ID_S2_IGM=2 AND ubs='$ubs_jacana' OR
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ID_RE_IGM=2 AND ubs='$ubs_jacana' OR
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ubs='$ubs_jacana'";

//Casos Negativos de Sarampo da Ubs Mariquinha
$neg_ubs_mariquinha = "SELECT COUNT($table_sql.nDoc) FROM $table_sql
INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC WHERE
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ID_S1_IGM=2 AND ubs='$ubs_mariquinha' OR
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ID_S2_IGM=2 AND ubs='$ubs_mariquinha' OR
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ID_RE_IGM=2 AND ubs='$ubs_mariquinha' OR
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ubs='$ubs_mariquinha'";

//E por e não menos importante os Casos Negativos de Sarampo da Ubs Toledo Piza
$neg_ubs_toledo = "SELECT COUNT($table_sql.nDoc) FROM $table_sql
INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC WHERE
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ID_S1_IGM=2 AND ubs='$ubs_toledo' OR
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ID_S2_IGM=2 AND ubs='$ubs_toledo' OR
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ID_RE_IGM=2 AND ubs='$ubs_toledo' OR
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ubs='$ubs_toledo'";

//Casos em Análise de Sarampo da Ubs Albertina
$em_ana_ubs_albertina = "SELECT COUNT($table_sql.nDoc) FROM $table_sql
INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC WHERE
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND DT_COL_1  AND ubs='$ubs_' LIKE '%2019' OR
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND ID_URINA=1 AND ubs='$ubs_' OR
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND ID_SECRECA=1 AND ubs='$ubs_' OR
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND NOT DT_COL_1 AND ubs='$ubs_' LIKE '%2019' OR
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND NOT DT_COL_2 AND ubs='$ubs_' LIKE '%2019' OR
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND ID_SECRECA < 1 AND ubs='$ubs_' OR
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND ID_URINA < 1 AND ubs='$ubs_' ";

//Casos em Análise de Sarampo da Ubs
$neg_ubs_apuana = "SELECT COUNT($table_sql.nDoc) FROM $table_sql
INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC WHERE
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND DT_COL_1  AND ubs='$ubs_' LIKE '%2019' OR
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND ID_URINA=1 AND ubs='$ubs_' OR
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND ID_SECRECA=1 AND ubs='$ubs_' OR
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND NOT DT_COL_1 AND ubs='$ubs_' LIKE '%2019' OR
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND NOT DT_COL_2 AND ubs='$ubs_' LIKE '%2019' OR
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND ID_SECRECA < 1 AND ubs='$ubs_' OR
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND ID_URINA < 1 AND ubs='$ubs_'";

//Casos em Análise de Sarampo da Ubs
$neg_ubs_edu = "SELECT COUNT($table_sql.nDoc) FROM $table_sql
INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC WHERE
ID_DISTRIT='70' AND ID_S1_IGM=3 OR
ID_DISTRIT='70' AND ID_S2_IGM=3 OR
ID_DISTRIT='70' AND ID_RE_IGM=3";

//Casos em Análise de Sarampo da Ubs
$neg_ubs_flor = "SELECT COUNT($table_sql.nDoc) FROM $table_sql
ID_DISTRIT='70' AND ID_S1_IGM=3 OR
ID_DISTRIT='70' AND ID_S2_IGM=3 OR
ID_DISTRIT='70' AND ID_RE_IGM=3";

//Casos em Análise de Sarampo da Ubs
$neg_ubs_fontalis = "SELECT COUNT($table_sql.nDoc) FROM $table_sql
INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC WHERE
ID_DISTRIT='70' AND ID_S1_IGM=3 OR
ID_DISTRIT='70' AND ID_S2_IGM=3 OR
ID_DISTRIT='70' AND ID_RE_IGM=3";

//Casos em Análise de Sarampo da Ubs
$neg_ubs_galvao = "SELECT COUNT($table_sql.nDoc) FROM $table_sql
ID_DISTRIT='70' AND ID_S1_IGM=3 OR
ID_DISTRIT='70' AND ID_S2_IGM=3 OR
ID_DISTRIT='70' AND ID_RE_IGM=3";

//Casos em Análise de Sarampo da Ubs
$neg_ubs_joamar = "SELECT COUNT($table_sql.nDoc) FROM $table_sql
INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC WHERE
ID_DISTRIT='70' AND ID_S1_IGM=3 OR
ID_DISTRIT='70' AND ID_S2_IGM=3 OR
ID_DISTRIT='70' AND ID_RE_IGM=3";

//Casos em Análise de Sarampo da Ubs
$neg_ubs_pedras = "SELECT COUNT($table_sql.nDoc) FROM $table_sql
INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC WHERE
ID_DISTRIT='70' AND ID_S1_IGM=3 OR
ID_DISTRIT='70' AND ID_S2_IGM=3 OR
ID_DISTRIT='70' AND ID_RE_IGM=3";

//Casos em Análise de Sarampo da Ubs
$neg_ubs_jacana = "SELECT COUNT($table_sql.nDoc) FROM $table_sql
INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC WHERE
ID_DISTRIT='70' AND ID_S1_IGM=3 OR
ID_DISTRIT='70' AND ID_S2_IGM=3 OR
ID_DISTRIT='70' AND ID_RE_IGM=3";

//Casos em Análise de Sarampo da Ubs
$neg_ubs_mariquinha = "SELECT COUNT($table_sql.nDoc) FROM $table_sql
INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC WHERE
ID_DISTRIT='70' AND ID_S1_IGM=3 OR
ID_DISTRIT='70' AND ID_S2_IGM=3 OR
ID_DISTRIT='70' AND ID_RE_IGM=3";

//Casos em Análise de Sarampo da Ubs
$neg_ubs_toledo = "SELECT COUNT($table_sql.nDoc) FROM $table_sql
INNER JOIN $table_sinan ON $table_sql.nDoc = $table_sinan.NU_NOTIFIC WHERE
ID_DISTRIT='70' AND ID_S1_IGM=3 OR
ID_DISTRIT='70' AND ID_S2_IGM=3 OR
ID_DISTRIT='70' AND ID_RE_IGM=3";



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
$pos_total = "SELECT COUNT($table_sql.nDoc)
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