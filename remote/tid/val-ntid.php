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
$query = $conectar->query("SELECT id FROM tid WHERE ndoc='" . $_GET['ntid'] . "'");
if (mysqli_num_rows($query) != 0) {
    echo json_encode(false);
} else {
    echo json_encode(true);
}
//Encerra a conexão
$conectar->close(); ?>

