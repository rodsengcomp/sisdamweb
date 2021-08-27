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

$result_markers="SELECT tbldengue.nDoc,
(CASE
WHEN Resultado_IgM_Focus='Reagente ' THEN 'Positivo'
WHEN Resultado_IgM_Panbio='Reagente ' THEN 'Positivo'
WHEN Resultado_NS1='Reagente ' THEN 'Positivo'
WHEN ResultadoTr='Reagente' THEN 'Positivo'

END) AS type,
tbldengue.Data1Sintomas,tbldengue.NomeSolicitante,tbldengue.ResultadoTr,tbldengue.latitude, tbldengue.longitude,tbldengue.N,tbldengue.Complemento,
resultado_ccz.Resultado_IgM_Focus, resultado_ccz.Resultado_IgM_Panbio,resultado_ccz.Resultado_NS1,resultado_ccz.LIBERACAO_EM,
ruas.ruagoogle,ruas.log,ruas.rua,ruas.id,
dengnet.NU_NOTIFIC, dengnet.CLASSI_FIN, dengnet.NM_PACIENT, dengnet.DT_SIN_PRI
FROM tbldengue INNER JOIN dengnet ON tbldengue.nDoc = dengnet.NU_NOTIFIC 
LEFT JOIN resultado_ccz ON tbldengue.nDoc = resultado_ccz.SINAN 
LEFT JOIN ruas ON tbldengue.idRua = ruas.id
WHERE Resultado_IgM_Focus='Reagente' OR Resultado_IgM_Panbio='Reagente' OR Resultado_NS1='Reagente' OR ResultadoTr='Reagente'
ORDER BY `type` DESC";

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
    echo 'teste="'. $row_markers['ResultadoTr'].'" ';
    echo 'igm="'. $row_markers['Resultado_IgM_Focus'].'" ';
    echo 'ns1="'. $row_markers['Resultado_NS1'].'" ';
    echo 'address="'. $row_markers['log'] . ' '. $row_markers['rua'] .'" ';
    echo 'idrua="'. $row_markers['id'] .'" ';
    echo 'comp="'. $row_markers['N']. ' '. $row_markers['Complemento'].'" ';
    echo 'lat="' . $row_markers['latitude'] . '" ';
    echo 'lng="' . $row_markers['longitude'] . '" ';
    echo 'type="' . $row_markers['type'] . '" ';
    echo '/>';
}

// End XML file
echo '</markers>';



