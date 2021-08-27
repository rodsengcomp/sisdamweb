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
$result_markers = "SELECT tblchiku.nDoc,tblchiku.type, tblchiku.Data1Sintomas,tblchiku.NomeSolicitante, tblchiku.longitude,
chiku_ial.Exame, chiku_ial.`Status Exame`,chiku_ial.Resultado,ruas.ruagoogle,ruas.latitude, ruas.longitude
FROM tblchiku
LEFT JOIN chiku_ial ON tblchiku.NomeSolicitante = chiku_ial.Paciente
LEFT JOIN ruas ON tblchiku.idRua = ruas.id";

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
    echo 'address="' . '1S : '. $row_markers['Data1Sintomas'] . '  Exame:'. $row_markers['Exame'] . '  Status:'. $row_markers['Status Exame']. '  Resultado:'. $row_markers['Resultado'].'" ';
    echo 'lat="' . $row_markers['latitude'] . '" ';
    echo 'lng="' . $row_markers['longitude'] . '" ';
    echo 'type="' . $row_markers['type'] . '" ';
    echo '/>';
}

// End XML file
echo '</markers>';



