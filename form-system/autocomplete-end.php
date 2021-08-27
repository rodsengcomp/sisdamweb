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
 * função que devolve em formato JSON os dados do paciente
 */
function retorna($rua, $db)
{
    $sql = "SELECT `id`, `rua`, `cep`, `log`, `bairro`, `da`, `setor`, `pgguia`, `ubs`, `suvis`,`atual`, `latitude`, `longitude`,`ruagoogle`
      FROM `ruas` WHERE `rua` = '{$rua}' ";

    $query = $db->query($sql);

    $arr = Array();
    if ($query->num_rows) {
        while ($dados = $query->fetch_object()) {
            $arr['cep'] = $dados->cep;
            $arr['log'] = $dados->log;
            $arr['bairro'] = $dados->bairro;
            $arr['da'] = $dados->da;
            $arr['setor'] = $dados->setor;
            $arr['pgguia'] = $dados->pgguia;
            $arr['localvd'] = $dados->ubs;
            $arr['suvis'] = $dados->suvis;
            $arr['atual'] = $dados->atual;
            $arr['latitude'] = $dados->latitude;
            $arr['longitude'] = $dados->longitude;
            $arr['idrua'] = $dados->id;
            $arr['ruagoogle'] = $dados->ruagoogle;
        }
    } else
        $arr['rua'] = 'não encontrado';
    return json_encode($arr);

}

/* só se for enviado o parâmetro, que devolve os dados */
if (isset($_GET['rua'])) {
    $db = new mysqli($servidor, $usuario, $password, $dbname);
    echo retorna(filter($_GET['rua']), $db);
}

function filter($var)
{
    return $var;//a implementação desta, fica a cargo do leitor
}
