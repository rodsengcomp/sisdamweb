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

$result_markers="SELECT pes_ies_38_83.id_pe_ie,
(CASE
WHEN risco_pe_ie='1' THEN 'Alto'
WHEN risco_pe_ie='2' THEN 'Medio'
WHEN risco_pe_ie='3' THEN 'Baixo'
WHEN risco_pe_ie='4' THEN 'Nulo'
-- Os demais são Alerta
ELSE 'Alerta'

END) AS type,
nm_pe_ie,nome_pe_ie,tipo_pe_ie,esp_pe_ie,inst_pe_ie,risco_pe_ie,status_pe_ie,id_rua_pe_ie,da_pe_ie,setor_pe_ie,quadra_pe_ie,ramo_pe_ie,log_pe_ie,end_pe_ie,
num_pe_ie,comp_pe_ie,pontor_pe_ie,cep_pe_ie,bairro_pe_ie,ruagoogle_pe_ie,lat_pe_ie,lng_pe_ie,pgguia_pe_ie,ubs_pe_ie,obs_pe_ie,tel_fixo_pe_ie,tel_com_pe_ie,
tel_cel_pe_ie_1,tel_cel_pe_ie_2
FROM pes_ies_38_83
WHERE tipo_pe_ie='PE'
ORDER BY `type` DESC";

// SELECT nDoc, NomeSolicitante, IF(da = '38' AND Setor1='3802', 'N/A', da) da FROM tbldengue

//SELECT tbldengue.nDoc,IF(type = 'Dengue' AND Resultado_IgM_Focus='Reagente', 'Wallace', type) type, tbldengue.Data1Sintomas,tbldengue.NomeSolicitante,tbldengue.ResultadoTr, tbldengue.longitude, resultado_ccz.Resultado_IgM_Focus, resultado_ccz.Resultado_NS1, resultado_ccz.`Data Resultado` ,ruas.ruagoogle,ruas.latitude, ruas.longitude FROM tbldengue LEFT JOIN resultado_ccz ON tbldengue.nDoc = resultado_ccz.SINAN LEFT JOIN ruas ON tbldengue.idRua = ruas.id

$resultado_markers = mysqli_query($conectar, $result_markers);

header("Content-type: text/xml");

// Start XML file, echo parent node
echo '<markers>';

// Iterate através das linhas, imprimindo nós XML para cada
while ($row_markers = mysqli_fetch_assoc($resultado_markers)) {
    // Add to XML document node
    echo '<marker ';
    echo 'id="' . $row_markers['id_pe_ie'] . '" ';
    echo 'nm="' . $row_markers['nm_pe_ie'] . '" ';
    echo 'nome="'. $row_markers['nome_pe_ie'].'" ';
    echo 'tipo="'. $row_markers['tipo_pe_ie'].'" ';
    echo 'log="'. $row_markers['log_pe_ie'].'" ';
    echo 'end="'. $row_markers['end_pe_ie'].'" ';
    echo 'num="'. $row_markers['num_pe_ie'].'" ';
    echo 'bairro="'. $row_markers['bairro_pe_ie'].'" ';
    echo 'cep="'. $row_markers['cep_pe_ie'].'" ';
    echo 'ubs="'. $row_markers['ubs_pe_ie'].'" ';
    echo 'lat="' . $row_markers['lat_pe_ie'] . '" ';
    echo 'lng="' . $row_markers['lng_pe_ie'] . '" ';
    echo 'type="' . $row_markers['type'] . '" ';
    echo 'address="' . $row_markers['ruagoogle_pe_ie'] . '" ';
    echo '/>';
}

// End XML file
echo '</markers>';



