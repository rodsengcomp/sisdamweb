<?php
/*
<!-- Este projeto é desenvolvido na Suvis Jaçanã-Tremembé com iniciativa dos colaboradores da Unidade -->
<!-- Código desenvolvido por Rodolfo Romaioli Ribeiro de Jesus - rodolfo.romaioli@gmail.com -->
<!-- Sisdam Web - 2.0 - 2017 - Todos os direitos reservados -->
*/
//Tratando erros ;
error_reporting(0);

//Criar a conexao ;
include_once '../../conecta.php';

//Busca a validação ;
$query = $conectar->query("SELECT id_pe_ie FROM pes_ies_38_83 WHERE esp_pe_ie='" . $_GET['especificacao'] . "'");
if (mysqli_num_rows($query) != 0) {
    echo json_encode(true);
} else {
    echo json_encode(false);
}
//Encerra a conexão
$conectar->close(); ?>

