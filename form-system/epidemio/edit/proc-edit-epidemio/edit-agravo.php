<!-- Este projeto é desenvolvido na Suvis Jaçanã-Tremembé com iniciativa dos colaboradores da Unidade -->
<!-- Código desenvolvido por Rodolfo Romaioli Ribeiro de Jesus - rodolfo.romaioli@gmail.com -->
<!-- Sisdam Web - 2.0 - 2017 - Todos os direitos reservados -->

<?php
error_reporting(0);
include_once '../../../locked/seguranca.php';
include_once '../../../conecta.php';
?>

<div class="container theme-showcase" role="main">
    <!-- Página de Título -->
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <ol class="breadcrumb">
                    <li><i class="fa fa-database"></i> <a href="suvisjt.php">Sisdam Web</a></li>
                    <li class="active">Editar Agravo</li>
                </ol>
                <button type="button" class="btn btn-warning btn-lg btn-block">EDITAR AGRAVO</button>
            </div>
        </div>
    </div>
    <!-- Fim da Página de Título -->
    <div class="row espaco">
        <div class="col-md-12">
            <form class="form-horizontal" style="<?php if ($_SESSION['usuarioNivelAcesso'] > 3) {
                echo 'display: none;';
            } ?>" id="proc-edit-agravo">

                <?php

                //Se conectando com o Banco de Dados e tratando possível erro de conexão ...
                if ($conexao = $conectar->query($conectar)) die ('<div class="form-group"><a href="javascript:history.back()" <button type=\'button\' class=\'btn btn-danger\' accesskey="V"><span class="glyphicon glyphicon-arrow-left"></span> <u>V</u>OLTAR</button></a><h4><strong><div class="alert alert-danger text-center" role="alert">ERROR : 01 FALHA AO CONECTAR !!! SE PERSISTIR CONTATE: sisdamjt@gmail.com</h4></strong></div>');

                #Recolhendo os dados do formulário
                $id = mysqli_real_escape_string($conectar, $_POST["id"]);
                $cid = mysqli_real_escape_string($conectar, $_POST["cid"]);
                $tipoagravo = mysqli_real_escape_string($conectar, $_POST["tipoagravo"]);
                $agravo = mysqli_real_escape_string($conectar, $_POST["agravo"]);

                # Verificando vários campos.
                $sql = $conectar->query("SELECT * FROM agravo WHERE tipo='$tipoagravo' AND agravo='$agravo' AND id<>'$id'");
                if ($sql->num_rows > 0) { ?>
                    <?php $_SESSION['msgerroredit'] = "<div class='alert alert-danger text-center'><strong>CID-10</strong> : $cid - <strong>TIPO</strong> : $tipoagravo - <strong>AGRAVO</strong> : $agravo - <strong>NÃO EDITADO : DUPLICIDADE</strong></div>";
                    header("Location: suvisjt.php?pag=edit-agravo&id=$id"); ?>

                    <!-------------------------------------------------------------------------------------------------------------------------->
                <?php } else {
                    if (!$conectar->query("UPDATE agravo SET cid = '$cid', tipo = '$tipoagravo', agravo = '$agravo', usuarioalt = '$usuariologin', alterado =  NOW() WHERE id = '$id'")) die ('<div class="form-system-group"><a href="javascript:history.back()" <button type=\'button\' class=\'btn btn-danger\' accesskey="V"><span class="glyphicon glyphicon-arrow-left"></span> <u>V</u>OLTAR</button></a><h4><strong><div class="alert alert-danger text-center" roles="alert">ERROR:02 FALHA DE SICRONIZAÇÃO COM A TABELA !!! SE PERSISTIR CONTATE: sisdamjt@gmail.com</h4></strong></div>');
                    $_SESSION['msgedit'] = "<div class='alert alert-success text-center'><strong>ID</strong> : $id - <strong>CID-10</strong> : $cid - <strong>TIPO</strong> : $tipoagravo - <strong>AGRAVO</strong> : $agravo - <strong>EDITADO COM SUCESSO !!!</strong></div>";
                    header("Location: suvisjt.php?pag=list-agravo");
                } ?>

            </form>
        </div>
    </div>
</div>