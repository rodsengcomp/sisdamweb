<!-- Este projeto é desenvolvido na Suvis Jaçanã-Tremembé com iniciativa dos colaboradores da Unidade -->
<!-- Código desenvolvido por Rodolfo Romaioli Ribeiro de Jesus - rodolfo.romaioli@gmail.com -->
<!-- Sisdam Web - 2.0 - 2017 - Todos os direitos reservados -->

<?php
error_reporting(0);
include_once '../../../locked/seguranca.php';
include_once '../../../conecta.php';
?>

<?php
#Recolhendo os dados do formulário
$id = mysqli_real_escape_string($conectar, $_POST["id"]);
$da = mysqli_real_escape_string($conectar, $_POST["da"]);
$setor = mysqli_real_escape_string($conectar, $_POST["setor"]);
$log = mysqli_real_escape_string($conectar, $_POST["log"]);
$rua = mysqli_real_escape_string($conectar, $_POST["ruaoutros"]);
$bairro = mysqli_real_escape_string($conectar, $_POST["bairro"]);
$cep = mysqli_real_escape_string($conectar, $_POST["cep"]);
$pgguia = mysqli_real_escape_string($conectar, $_POST["pgguia"]);
$ubs = mysqli_real_escape_string($conectar, $_POST["ubs"]);
$atual = "SIM";
$ruagoogle = mysqli_real_escape_string($conectar, $_POST["ruagoogle"]);
$latitude = mysqli_real_escape_string($conectar, $_POST["latitude"]);
$longitude = mysqli_real_escape_string($conectar, $_POST["longitude"]);
?>

<div class="container theme-showcase" role="main">
    <!-- Página de Título -->
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <button type="button" class="btn btn-warning btn-lg btn-block">EDITAR ENDEREÇO</button>
            </div>
        </div>
    </div>
    <!-- Fim da Página de Título -->
    <div class="row espaco">
        <div class="col-md-12">
            <form class="form-horizontal" style="<?php if ($_SESSION['usuarioNivelAcesso'] > 3) {
                echo 'display: none;';
            } ?>" id="proc-edit-endereco">

                <?php

                //Se conectando com o Banco de Dados e tratando possível erro de conexão ...
                if ($conexao = $conectar->query($conectar)) die ('<div class="form-group"><a href="javascript:history.back()" <button type=\'button\' class=\'btn btn-danger\' accesskey="V"><span class="glyphicon glyphicon-arrow-left"></span> <u>V</u>OLTAR</button></a><h4><strong><div class="alert alert-danger text-center" role="alert">ERROR : 01 FALHA AO CONECTAR !!! SE PERSISTIR CONTATE: sisdamjt@gmail.com</h4></strong></div>');

                $sql = $conectar->query("SELECT * FROM ruas WHERE latitude='$latitude' AND longitude='$longitude' AND id<>'$id'");

                if ($sql->num_rows > 0) { ?>
                    <?php $_SESSION['msgerroredit'] = "<div class='alert alert-danger text-center'><strong>DA</strong> : $da - <strong>SETOR</strong> : $setor - <strong>ENDEREÇO</strong> : $log $rua - <strong>BAIRRO</strong> : $bairro - <strong>UBS</strong> : $ubs - <strong>NÃO EDITADO : DUPLICIDADE DE LATITUDE E LONGITUDE</strong></div>";
                    header("Location: suvisjt.php?pag=edit-end&id=$id"); ?>
                    <!-------------------------------------------------------------------------------------------------------------------------->
                <?php } else {
                    if (!$conectar->query("UPDATE ruas SET da = '$da', setor = '$setor', log = '$log', rua = '$rua', bairro = '$bairro', cep = '$cep', pgguia = '$pgguia', ubs = '$ubs', atual = '$atual', ruagoogle = '$ruagoogle', latitude = '$latitude', longitude = '$longitude', usuarioalt = '$usuariologin', alterado =  NOW() WHERE id = '$id'")) die ('<div class="form-system-group"><a href="javascript:history.back()" <button type=\'button\' class=\'btn btn-danger\' accesskey="V"><span class="glyphicon glyphicon-arrow-left"></span> <u>V</u>OLTAR</button></a><h4><strong><div class="alert alert-danger text-center" roles="alert">ERROR:02 FALHA DE SICRONIZAÇÃO COM A TABELA !!! SE PERSISTIR CONTATE: sisdamjt@gmail.com</h4></strong></div>');
                    $_SESSION['msgedit'] = "<div class='alert alert-success text-center'><strong>DA</strong> : $da - <strong>SETOR</strong> : $setor - <strong>ENDEREÇO</strong> : $log $rua - <strong>BAIRRO</strong> : $bairro - <strong>UBS</strong> : $ubs - EDITADO COM SUCESSO !!!</strong></div>";
                    header("Location: suvisjt.php?pag=list-end");
                } ?>

            </form>
        </div>
    </div>
</div>