<?php
error_reporting(0);

include_once '../../../conecta.php';

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
$result_markers = "SELECT * FROM ruas";
$resultado_markers = mysqli_query($conectar, $result_markers);

header("Content-type: text/xml");

// Start XML file, echo parent node
echo '<markers>';

// Interage através das linhas, imprimindo nós XML para cada
while ($row_markers = mysqli_fetch_assoc($resultado_markers)) {
    // Add to XML document node
    echo '<marker ';
    echo 'id="' . parseToXML($row_markers['id']) . '" ';
    echo 'name="' . parseToXML($row_markers['rua']) . '" ';
    echo 'address="' . parseToXML($row_markers['ruagoogle']) . '" ';
    echo 'da="' . $row_markers['da'] . '" ';
    echo 'setor="' . $row_markers['setor'] . '" ';
    echo 'log="' . $row_markers['log'] . '" ';
    echo 'rua="' . $row_markers['rua'] . '" ';
    echo 'bairro="' . $row_markers['bairro'] . '" ';
    echo 'cep="' . $row_markers['cep'] . '" ';
    echo 'pgguia="' . $row_markers['pgguia'] . '" ';
    echo 'ubs="' . $row_markers['ubs'] . '" ';
    echo 'lat="' . $row_markers['latitude'] . '" ';
    echo 'lng="' . $row_markers['longitude'] . '" ';
    echo 'type="' . $row_markers['type'] . '" ';
    echo '/>';
}

// End XML file
echo '</markers>';



