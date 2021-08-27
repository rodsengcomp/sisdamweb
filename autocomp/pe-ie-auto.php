<?php
/**
 * Created by Rodolfo Romaioli Ribeiro de Jesus.
 * User: D788796
 * Date: 09/06/2017
 * Time: 08:39
 */
error_reporting(0);
include_once '../conecta.php';

if (isset($_REQUEST['query'])) {

    $query = $_REQUEST['query'];

    $sql = mysqli_query($conectar, "SELECT * FROM pes_ies_38_83 WHERE esp_pe_ie LIKE '%{$query}%'");
    $array = array();

    while ($row = mysqli_fetch_assoc($sql)) {
        $array[] = $row['esp_pe_ie'];
    }

    echo json_encode($array); //Return the JSON Array

}

?>
