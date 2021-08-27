<?php
/**
 * Created by PhpStorm.
 * User: sms
 * Date: 09/06/2017
 * Time: 13:52
 */

include_once '../conecta.php';

if (isset($_GET["pag"])) {
    $pag = $_GET["pag"];
}

$consulta_pag = "SELECT * FROM pag_admin WHERE name_pag='$pag'";
$resultado_pag = $conectar->query($consulta_pag);
$editar_pag = mysqli_fetch_assoc($resultado_pag);

//mysqli_close($conectar);


if (!empty($pag)) {  //se a variavel link não estiver vazia
    if (file_exists($editar_pag['caminho'])) { //se o arquivo existir
        include $editar_pag['caminho'];  //inclui o arquivo
    } else {
        include "visao-geral.php";
    }
} else {
    include "visao-geral.php";
}
?>