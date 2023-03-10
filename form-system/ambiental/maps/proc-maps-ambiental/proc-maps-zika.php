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
$result_markers = "SELECT tbldengue.nDoc,tbldengue.type, tbldengue.Data1Sintomas,tbldengue.NomeSolicitante,tbldengue.ResultadoTr, tbldengue.longitude,
resultado_ccz.Resultado_IgM_Focus, resultado_ccz.Resultado_NS1, resultado_ccz.`Data Resultado` ,ruas.ruagoogle,ruas.latitude, ruas.longitude
FROM tbldengue
LEFT JOIN resultado_ccz ON tbldengue.nDoc = resultado_ccz.SINAN
LEFT JOIN ruas ON tbldengue.idRua = ruas.id";

$resultado_markers = mysqli_query($conectar, $result_markers);

header("Content-type: text/xml");

// Start XML file, echo parent node
echo '<markers>';

// Iterate através das linhas, imprimindo nós XML para cada
while ($row_markers = mysqli_fetch_assoc($resultado_markers)) {
    // Add to XML document node
    echo '<marker ';
    echo 'id="' . $row_markers['nDoc'] . '" ';
    echo 'name="' .'SINAN: '. $row_markers['nDoc'] .' -> '. $row_markers['NomeSolicitante'].'" ';
    echo 'address="' . '1S : '. $row_markers['Data1Sintomas'] . '  TR:'. $row_markers['ResultadoTr'] . '  IGM:'. $row_markers['Resultado_IgM_Focus']. '  NS1:'. $row_markers['Resultado_NS1'].'" ';
    echo 'lat="' . $row_markers['latitude'] . '" ';
    echo 'lng="' . $row_markers['longitude'] . '" ';
    echo 'type="' . $row_markers['type'] . '" ';
    echo '/>';
}

// End XML file
echo '</markers>';



