<?php
/**
 * Created by Rodolfo Romaioli Ribeiro de Jesus.
 * User: D788796
 * Date: 09/06/2017
 * Time: 08:39
 */
//Tratando erros ;
error_reporting(0);
//Criar a conexao ;
include_once '../../conecta.php';

//Busca a validação ;

$query = $conectar->query("SELECT id FROM contatos WHERE tel1='" . $_GET['tel1'] . "'");
if (mysqli_num_rows($query) != 0) {
    echo json_encode(false);
} else {
    echo json_encode(true);
}
//Encerra a conexão
$conectar->close(); ?>
