<!-- Este projeto é desenvolvido na Suvis Jaçanã-Tremembé com iniciativa dos colaboradores da Unidade -->
<!-- Código desenvolvido por Rodolfo Romaioli Ribeiro de Jesus - rodolfo.romaioli@gmail.com -->
<!-- Sisdam Web - 2.0 - 2017 - Todos os direitos reservados -->

<?php
error_reporting(0);
include_once '../../../../locked/seguranca.php';
include_once '../../../../conecta.php';
?>

<?php
#Recolhendo os dados do formulário
$id = mysqli_real_escape_string($conectar, $_POST["id"]);
$codigo = mysqli_real_escape_string($conectar, $_POST["codigo"]);
$cidade = mysqli_real_escape_string($conectar, $_POST["cidade"]);
$latitude = mysqli_real_escape_string($conectar, $_POST["latitude"]);
$longitude = mysqli_real_escape_string($conectar, $_POST["longitude"]);
?>

<div class="container theme-showcase" role="main">
    <!-- Página de Título -->
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <ol class="breadcrumb">
                    <li><i class="fa fa-database"></i> <a href="suvisjt.php">Sisdam Web</a></li>
                    <li class="active">Editar Cidade</li>
                </ol>
                <button type="button" class="btn btn-success btn-lg btn-block">EDITAR CIDADES</button>
            </div>
        </div>
    </div>
    <!-- Fim da Página de Título -->

    <div class="row espaco">
        <div class="col-md-12">
            <form class="form-horizontal" style="<?php if ($_SESSION['usuarioNivelAcesso'] > 3) {
                echo 'display: none;';
            } ?>" id="proc_edit_cidade">

                <?php

                //Se conectando com o Banco de Dados e tratando possível erro de conexão ...
                if ($conexao = $conectar->query($conectar)) die ('<div class="form-group"><a href="javascript:history.back()" <button type=\'button\' class=\'btn btn-danger\' accesskey="V"><span class="glyphicon glyphicon-arrow-left"></span> <u>V</u>OLTAR</button></a><h4><strong><div class="alert alert-danger text-center" role="alert">ERROR : 01 FALHA AO CONECTAR !!! SE PERSISTIR CONTATE: sisdamjt@gmail.com</h4></strong></div>');

                # Verificando varios campos.
                $sql = $conectar->query("SELECT * FROM cidade WHERE latitude='$latitude' AND longitude='$longitude' AND id<>'$id'");
                if ($sql->num_rows > 0) { ?>
                    <?php $_SESSION['msgerroredit'] = "<div class='alert alert-danger text-center'><strong>CÓD</strong> : $codigo - <strong>CIDADE</strong> : $cidade - <strong>LAT</strong> : $latitude - <strong>LONG</strong> : $longitude - <strong>NÃO EDITADO : $tipo DUPLICIDADE</strong></div>";
                    header("Location: suvisjt.php?pag=edit-cidade&id=$id"); ?>
                    <!-------------------------------------------------------------------------------------------------------------------------->
                <?php } else {
                    if (!$conectar->query("UPDATE cidade SET cod_cidade = '$codigo', latitude = '$latitude', longitude = '$longitude', cidade = '$cidade', usuarioalt = '$usuariologin', alterado =  NOW() WHERE id = '$id'")) die ('<div class="form-system-group"><a href="javascript:history.back()" <button type=\'button\' class=\'btn btn-danger\' accesskey="V"><span class="glyphicon glyphicon-arrow-left"></span> <u>V</u>OLTAR</button></a><h4><strong><div class="alert alert-danger text-center" roles="alert">ERROR:02 FALHA DE SICRONIZAÇÃO COM A TABELA !!! SE PERSISTIR CONTATE: sisdamjt@gmail.com</h4></strong></div>');
                    $_SESSION['msgedit'] = "<div class='alert alert-success text-center'><strong>ID</strong> : $id - <strong>CÓD</strong> : $codigo - <strong>CIDADE</strong> : $cidade - <strong>LAT</strong> : $latitude - <strong>LONG</strong> : $longitude - <strong>EDITADO COM SUCESSO !!!</strong></div>";
                    header("Location: suvisjt.php?pag=list-cidade");
                }
                ?>

            </form>
        </div>
    </div>
</div>


