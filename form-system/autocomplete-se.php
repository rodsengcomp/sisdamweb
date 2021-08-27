<?php
/**
 * Created by Rodolfo Romaioli Ribeiro de Jesus.
 * User: D788796
 * Date: 09/06/2017
 * Time: 08:39
 */
error_reporting(0);
include_once '../conecta.php';

/**
 * função que devolve em formato JSON os dados do cliente
 */
function retorna($dataentrada, $db)
{
    $sql = "SELECT `id`, `dataentrada`, `se`
      FROM `se` WHERE `dataentrada` = '{$dataentrada}' ";

    $query = $db->query($sql);

    $arr = Array();
    if ($query->num_rows) {
        while ($dados = $query->fetch_object()) {
            $arr['se'] = $dados->se;
        }
    } else
        $arr['dataentrada'] = 'não encontrado';
    return json_encode($arr);

}

/* só se for enviado o parâmetro, que devolve os dados */
if (isset($_GET['dataentrada'])) {
    $db = new mysqli($servidor, $usuario, $password, $dbname);
    echo retorna(filter($_GET['dataentrada']), $db);
}

function filter($var)
{
    return $var;//a implementação desta, fica a cargo do leitor
}
