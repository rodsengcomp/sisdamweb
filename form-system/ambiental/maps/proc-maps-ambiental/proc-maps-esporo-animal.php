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

$result_markers ="SELECT esporo_an.id_esp, esporo_an.nve, esporo_an.ano, esporo_an.data_entrada, esporo_an.nome_animal, esporo_an.lat,esporo_an.lng,
especie_animal.especie, esporo_an.id_rua, ruas.id, ruas.log, ruas.rua, ruas.ruagoogle, esporo_an.rua_esp_a, esporo_an.numero, esporo_an.complemento,
esporo_an.tutor, esporo_an.telefone1, esporo_an.dsg_medc, esporo_an.pin,
esporo_medc.nm_mdc_esp_an, 
situacao_esporo.sit_esp, esporo_an.obs,resultado_esporo.Nr_Pedido, resultado_esporo.Data_Pedido, resultado_esporo.Resultado,
    (CASE
        WHEN especie_animal.id_especie = 1 THEN 'FELINA'
        WHEN especie_animal.id_especie = 2 THEN 'CANINA'
        ELSE 'OUTROS'
    END) AS type
    FROM esporo_an
    LEFT JOIN especie_animal ON esporo_an.especie = especie_animal.id_especie
    LEFT JOIN situacao_esporo ON esporo_an.situacao = situacao_esporo.id_st_esp
    LEFT JOIN ruas ON esporo_an.id_rua = ruas.id
    LEFT JOIN  esporo_an_sd_medc ON esporo_an.id_esp = esporo_an_sd_medc.id_an_esp 
    LEFT JOIN esporo_medc ON esporo_an_sd_medc.id_medc = esporo_medc.id_med_esp
    LEFT JOIN resultado_esporo ON esporo_an.lab = resultado_esporo.Nr_Pedido
    ORDER BY `type` DESC";

$resultado_markers = mysqli_query($conectar, $result_markers);

header("Content-type: text/xml");

// Start XML file, echo parent node
echo '<markers>';

// Iterate através das linhas, imprimindo nós XML para cada
while ($row_markers = mysqli_fetch_assoc($resultado_markers)) {
    // Add to XML document node
    echo '<marker ';
    echo 'id="' . $row_markers['id_esp'] . '" ';
    echo 'name="'. $row_markers['nome_animal'].'" ';
    echo 'nametutor="'. $row_markers['tutor'].'" ';
    echo 'dt_res="'. $row_markers['Data_Pedido'].'" ';
    echo 'resultado="'. $row_markers['Resultado'].'" ';
    echo 'sint="'. $row_markers['data_entrada'].'" ';
    echo 'address="'. $row_markers['log'] . ' '. $row_markers['rua'] .'" ';
    echo 'idrua="'. $row_markers['id'] .'" ';
    echo 'comp="'. $row_markers['numero']. ' '. $row_markers['complemento'].'" ';
    echo 'lat="' . $row_markers['lat'] . '" ';
    echo 'lng="' . $row_markers['lng'] . '" ';
    echo 'type="' . strtoupper($row_markers['type']) .'_'.strtoupper($row_markers['Resultado']). '" ';
    echo 'pin="' . $row_markers['pin'] . '" ';
    echo '/>';
}

// End XML file
echo '</markers>';
