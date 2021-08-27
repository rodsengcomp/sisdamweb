<?php
/**
 * Created by PhpStorm.
 * User: Rodolfo Romaioli Ribeiro de Jesus
 * Date: 15/08/2019
 * Time: 16:12
 */

$select_total = "SELECT COUNT(NU_NOTIFIC) FROM exantnet WHERE ID_DISTRIT='70'";
$select_positivos = "SELECT COUNT(NU_NOTIFIC) FROM exantnet
WHERE
ID_DISTRIT='70' AND CLASSI_FIN=1 AND CRITERIO=1 AND ID_S1_IGM=1 OR
ID_DISTRIT='70' AND CLASSI_FIN=1 AND CRITERIO=1 AND ID_S2_IGM=1 OR
ID_DISTRIT='70' AND CLASSI_FIN=1 AND CRITERIO=1 AND ID_RE_IGM=1 OR
ID_DISTRIT='70' AND CLASSI_FIN=1 AND CRITERIO=1 AND ID_ETIOLOG=1";

$select_negativos = "SELECT COUNT(NU_NOTIFIC) FROM exantnet
WHERE
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ID_S1_IGM=2 OR
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ID_S2_IGM=2 OR
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1 AND ID_RE_IGM=2 OR
ID_DISTRIT='70' AND CLASSI_FIN=3 AND CRITERIO=1";

$select_em_analises="SELECT COUNT(NU_NOTIFIC) FROM exantnet
WHERE
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND DT_COL_1 LIKE '%2019' OR
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND ID_URINA=1 OR
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND ID_SECRECA=1 OR
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND NOT DT_COL_1 LIKE '%2019' OR
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND NOT DT_COL_2 LIKE '%2019' OR
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND ID_SECRECA < 1 OR
ID_DISTRIT='70' AND CLASSI_FIN < 1 AND CRITERIO < 1 AND ID_URINA < 1";

$select_inconclusivos = "SELECT COUNT(NU_NOTIFIC) FROM exantnet
WHERE
ID_DISTRIT='70' AND ID_S1_IGM=3 OR
ID_DISTRIT='70' AND ID_S2_IGM=3 OR
ID_DISTRIT='70' AND ID_RE_IGM=3";

$count_total = $conectar->query($select_total);
$count_positivo = $conectar->query($select_positivos);
$count_negativo = $conectar->query($select_negativos);
$count_em_analise = $conectar->query($select_em_analises);
$count_inconclusivo = $conectar->query($select_inconclusivos);

$array_total = mysqli_fetch_array($count_total);
$array_positivos = mysqli_fetch_array($count_positivo);
$array_negativos = mysqli_fetch_array($count_negativo);
$array_em_analises = mysqli_fetch_array($count_em_analise);
$array_inconclusivos = mysqli_fetch_array($count_inconclusivo);