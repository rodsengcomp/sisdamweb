<?php


include_once '../../../../conecta.php';

function parseToXML($htmlStr)
{
    $xmlStr = str_replace('<', '&lt;', $htmlStr);
    $xmlStr = str_replace('>', '&gt;', $xmlStr);
    $xmlStr = str_replace('"', '&quot;', $xmlStr);
    $xmlStr = str_replace("'", '&#39;', $xmlStr);
    $xmlStr = str_replace("&", '&amp;', $xmlStr);
    return $xmlStr;
}

// Select all the rows in the markers table

$result_markers="SELECT exantnet.NU_NOTIFIC, exantnet.NM_PACIENT,  exantnet.DT_SIN_PRI,exantnet.CLASSI_FIN, exantnet.CRITERIO,exantnet.DT_COL_1,
exantnet.DT_COL_2, exantnet.ID_S1_IGM, exantnet.ID_S2_IGM, exantnet.ID_RE_IGM, exantnet.ID_ETIOLOG, exantnet.ID_URINA, exantnet.ID_SECRECA,
exantnet.ID_DISTRIT,
tblsarampo.Latitude,tblsarampo.Longitude, tblsarampo.RuaGoogle,tblsarampo.N, tblsarampo.Complemento,
ruas.rua,ruas.id,ruas.log,ruas.ubs,ruas.bairro,
(CASE
-- CASE com os POSITIVOS
WHEN CLASSI_FIN=1 AND CRITERIO=1 AND ID_S1_IGM=1 THEN 'POSITIVO'
WHEN CLASSI_FIN=1 AND CRITERIO=1 AND ID_S2_IGM=1 THEN 'POSITIVO'
WHEN CLASSI_FIN=1 AND CRITERIO=1 AND ID_RE_IGM=1 THEN 'POSITIVO'
WHEN CLASSI_FIN=1 AND CRITERIO=1 AND ID_ETIOLOG=1 THEN 'POSITIVO'
/* WHEN CLASSI_FIN=3 AND CRITERIO=1 AND ID_ETIOLOG=1 THEN 'POSITIVO' */
-- CASE com os negativos
WHEN CLASSI_FIN=3 AND CRITERIO=1 AND ID_S1_IGM=2 THEN 'NEGATIVO'
WHEN CLASSI_FIN=3 AND CRITERIO=1 AND ID_S2_IGM=2 THEN 'NEGATIVO'
WHEN CLASSI_FIN=3 AND CRITERIO=1 AND ID_RE_IGM=2 THEN 'NEGATIVO'
-- WHEN CLASSI_FIN=3 AND CRITERIO=1 AND ID_ETIOLOG=10 THEN 'NEGATIVO'
WHEN CLASSI_FIN=3 AND CRITERIO=1 THEN 'NEGATIVO'

-- CASE com os EM ANALISE
WHEN CLASSI_FIN < 1 AND CRITERIO < 1 AND DT_COL_1 LIKE '%2019' THEN 'EM ANALISE'
WHEN CLASSI_FIN < 1 AND CRITERIO < 1 AND ID_URINA=1 THEN 'EM ANALISE'
WHEN CLASSI_FIN < 1 AND CRITERIO < 1 AND ID_SECRECA=1 THEN 'EM ANALISE'
-- CASE com os EM ABERTO
WHEN CLASSI_FIN < 1 AND CRITERIO < 1 AND NOT DT_COL_1 LIKE '%2019' THEN 'EM ANALISE'
WHEN CLASSI_FIN < 1 AND CRITERIO < 1 AND NOT DT_COL_2 LIKE '%2019' THEN 'EM ANALISE'
WHEN CLASSI_FIN < 1 AND CRITERIO < 1 AND ID_SECRECA < 1 THEN 'EM ANALISE'
WHEN CLASSI_FIN < 1 AND CRITERIO < 1 AND ID_URINA < 1 THEN 'EM ANALISE'
-- CASE com os INCONCLUSIVOS
WHEN ID_S1_IGM=3 THEN 'INCONCLUSIVO'
WHEN ID_S2_IGM=3 THEN 'INCONCLUSIVO'
WHEN ID_RE_IGM=3 THEN 'INCONCLUSIVO'


-- Se não encontrar nenhuma das condições acima
ELSE 'INCONSISTENTE'
-- O nome da coluna a ser criada na tabela com os resultados nomeados no CASE 
END) AS type,
(CASE
WHEN ID_S1_IGM=1 THEN 'POSITIVO'
WHEN ID_S1_IGM=2 THEN 'NEGATIVO'
WHEN ID_S1_IGM=3 THEN 'INCONCLUSIVO'
WHEN ID_S1_IGM=4 THEN 'NÃO REALIZADO'

-- Se não encontrar nenhuma das condições acima
ELSE 'NÃO REALIZADO'
-- O nome da coluna a ser criada na tabela com os resultados nomeados no CASE 
END) AS IGM1,
(CASE
WHEN ID_S2_IGM=1 THEN 'POSITIVO'
WHEN ID_S2_IGM=2 THEN 'NEGATIVO'
WHEN ID_S2_IGM=3 THEN 'INCONCLUSIVO'
WHEN ID_S2_IGM=4 THEN 'NÃO REALIZADO'

-- Se não encontrar nenhuma das condições acima
ELSE 'NÃO REALIZADO'
-- O nome da coluna a ser criada na tabela com os resultados nomeados no CASE 
END) AS IGM2,
(CASE
WHEN ID_RE_IGM=1 THEN 'POSITIVO'
WHEN ID_RE_IGM=2 THEN 'NEGATIVO'
WHEN ID_RE_IGM=3 THEN 'INCONCLUSIVO'
WHEN ID_RE_IGM=4 THEN 'NÃO REALIZADO'

-- Se não encontrar nenhuma das condições acima
ELSE 'NÃO REALIZADO'
-- O nome da coluna a ser criada na tabela com os resultados nomeados no CASE 
END) AS IGMR
FROM tblsarampo
-- LEFT JOIN exantnet ON sarampo_ial.Paciente = exantnet.NM_PACIENT
LEFT JOIN exantnet ON tblsarampo.nDoc = exantnet.NU_NOTIFIC
LEFT JOIN ruas ON tblsarampo.idRua = ruas.id
-- LEFT JOIN sarampo_ial ON tblsarampo.NomePaciente = sarampo_ial.Paciente

WHERE ID_DISTRIT='70'";

// SELECT nDoc, NomeSolicitante, IF(da = '38' AND Setor1='3802', 'N/A', da) da FROM tbldengue

//SELECT tbldengue.nDoc,IF(type = 'Dengue' AND Resultado_IgM_Focus='Reagente', 'Wallace', type) type, tbldengue.Data1Sintomas,tbldengue.NomeSolicitante,tbldengue.ResultadoTr, tbldengue.longitude, resultado_ccz.Resultado_IgM_Focus, resultado_ccz.Resultado_NS1,resultado_ccz.LIBERACAO_EM,ruas.ruagoogle,ruas.latitude, ruas.longitude FROM tbldengue LEFT JOIN resultado_ccz ON tbldengue.nDoc = resultado_ccz.SINAN LEFT JOIN ruas ON tbldengue.idRua = ruas.id

$resultado_markers = mysqli_query($conectar, $result_markers);

header("Content-type: text/xml");

// Start XML file, echo parent node
echo '<markers>';

// Iterate através das linhas, imprimindo nós XML para cada
while ($row_markers = mysqli_fetch_assoc($resultado_markers)) {
    // Add to XML document node
    echo '<marker ';
    echo 'id="' . $row_markers['NU_NOTIFIC'] . '" ';
    echo 'name="'. $row_markers['NM_PACIENT'].'" ';
    echo 'sint="'. $row_markers['DT_SIN_PRI'].'" ';
    echo 'igm="'. $row_markers['IGM1'] . '" ';
    echo 'igm2="'. $row_markers['IGM2'].'" ';
    echo 'recoleta="'. $row_markers['IGMR'].'" ';
    echo 'address="'. $row_markers['log'] . ' '. $row_markers['rua'] .'" ';
    echo 'idrua="'. $row_markers['id'] .'" ';
    echo 'comp="'. $row_markers['N']. ' '. $row_markers['Complemento'].' -  '. $row_markers['bairro'].'" ';
    echo 'ubs="'. $row_markers['ubs'].'" ';
    echo 'lat="' . $row_markers['Latitude'] . '" ';
    echo 'lng="' . $row_markers['Longitude'] . '" ';
    echo 'type="' . $row_markers['type'] . '" ';
    echo '/>';
}

// End XML file
echo '</markers>';



