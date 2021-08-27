<?php
/**
 * Created by PhpStorm.
 * User: Rodolfo
 * Date: 15/08/2019
 * Time: 15:51
 */

// Contagem de Casos
$select_total = "SELECT COUNT(NU_NOTIFIC) FROM dengnet WHERE ID_DISTRIT='70'";

$select_positivos = "SELECT COUNT(NU_NOTIFIC) 
    FROM tbldengue
    INNER JOIN dengnet ON tbldengue.nDoc = dengnet.NU_NOTIFIC
    LEFT JOIN resultado_ccz ON tbldengue.nDoc = resultado_ccz.SINAN  
    WHERE resultado_ccz.Resultado_IgM_Focus='Reagente' AND dengnet.CLASSI_FIN>9
    OR resultado_ccz.Resultado_IgM_Panbio='Reagente' AND dengnet.CLASSI_FIN>9
    OR resultado_ccz.Resultado_Igm_Focus IS NULL AND RESUL_SORO='1' AND CLASSI_FIN>9
    OR resultado_ccz.Resultado_Igm_Panbio IS NULL AND RESUL_SORO='1' AND CLASSI_FIN>9
    OR resultado_ccz.Resultado_NS1='Reagente' AND dengnet.CLASSI_FIN>9
    OR tbldengue.ResultadoTr='Reagente' AND resultado_ccz.Resultado_IgM_Focus<>'Não Reagente' AND dengnet.CLASSI_FIN>9
    OR tbldengue.ResultadoTr='Reagente' AND resultado_ccz.Resultado_IgM_Panbio<>'Não Reagente' AND dengnet.CLASSI_FIN>9
    OR tbldengue.ResultadoTr='Reagente' AND resultado_ccz.Resultado_IgM_Focus IS NULL AND dengnet.CLASSI_FIN>9
    OR tbldengue.ResultadoTr='Reagente' AND resultado_ccz.Resultado_IgM_Panbio IS NULL AND dengnet.CLASSI_FIN>9
    OR tbldengue.ResultadoTr='Reagente' AND resultado_ccz.Resultado_NS1 IS NULL AND dengnet.CLASSI_FIN>9";

/*
WHERE resultado_ccz.Resultado_IgM_Focus='Reagente' AND dengnet.CLASSI_FIN>9
OR resultado_ccz.Resultado_IgM_Panbio='Reagente' AND dengnet.CLASSI_FIN>9
OR resultado_ccz.Resultado_Igm_Focus IS NULL AND RESUL_SORO='1' AND CLASSI_FIN>9
OR resultado_ccz.Resultado_Igm_Panbio IS NULL AND RESUL_SORO='1' AND CLASSI_FIN>9
 */

$select_negativos = "SELECT COUNT(NU_NOTIFIC)
    FROM tbldengue INNER JOIN dengnet ON tbldengue.nDoc = dengnet.NU_NOTIFIC 
    LEFT JOIN resultado_ccz ON tbldengue.nDoc = resultado_ccz.SINAN
    LEFT JOIN dengue_ial ON tbldengue.NomeSolicitante = dengue_ial.Paciente
    WHERE resultado_ccz.Resultado_IgM_Focus='Não Reagente'
    OR resultado_ccz.Resultado_IgM_Panbio='Não Reagente'
    OR dengue_ial.Resultado = 'Não Reagente '
    OR dengue_ial.Resultado = 'Não Detectável '";

$select_em_analises="SELECT COUNT(NU_NOTIFIC) 
    FROM tbldengue INNER JOIN dengnet ON tbldengue.nDoc = dengnet.NU_NOTIFIC 
    LEFT JOIN resultado_ccz ON tbldengue.nDoc = resultado_ccz.SINAN
    WHERE tbldengue.ResultadoTr='Exame Nao Realizado' AND resultado_ccz.Resultado_IgM_Focus IS NULL AND resultado_ccz.Resultado_IgM_Panbio IS NULL AND resultado_ccz.Resultado_NS1 IS NULL";

$select_inconclusivos = "SELECT COUNT(NU_NOTIFIC)
FROM tbldengue INNER JOIN dengnet ON tbldengue.nDoc = dengnet.NU_NOTIFIC
LEFT JOIN resultado_ccz ON tbldengue.nDoc = resultado_ccz.SINAN 
WHERE
ID_DISTRIT='70' AND ResultadoTr='Exame Nao Realizado' AND Resultado_IgM_Focus='Coleta Inadequada ' AND Resultado_NS1=' ' OR
ID_DISTRIT='70' AND ResultadoTr='Exame Nao Realizado' AND Resultado_IgM_Focus='Inconclusivo ' AND Resultado_NS1=' '";

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