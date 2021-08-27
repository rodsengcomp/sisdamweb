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
$cnes = mysqli_real_escape_string($conectar, $_POST["cnes"]);
$estabelecimento = mysqli_real_escape_string($conectar, $_POST["estabelecimento"]);
?>

<div class="container theme-showcase" role="main">
    <!-- Página de Título -->
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <ol class="breadcrumb">
                    <li><i class="fa fa-database"></i> <a href="suvisjt.php">Sisdam Web</a></li>
                    <li class="active">Editar Cnes</li>
                </ol>
                <button type="button" class="btn btn-success btn-lg btn-block">EDITAR CNES</button>
            </div>
        </div>
    </div>
    <!-- Fim da Página de Título -->

    <div class="row espaco">
        <div class="col-md-12">
            <form class="form-horizontal" style="<?php if ($_SESSION['usuarioNivelAcesso'] > 3) {
                echo 'display: none;';
            } ?>" id="proc-edit-cnes">

                <?php

                //Se conectando com o Banco de Dados e tratando possível erro de conexão ...
                if ($conexao = $conectar->query($conectar)) die ('<div class="form-group"><a href="javascript:history.back()" <button type=\'button\' class=\'btn btn-danger\' accesskey="V"><span class="glyphicon glyphicon-arrow-left"></span> <u>V</u>OLTAR</button></a><h4><strong><div class="alert alert-danger text-center" role="alert">ERROR : 01 FALHA AO CONECTAR !!! SE PERSISTIR CONTATE: sisdamjt@gmail.com</h4></strong></div>');

                # Verificando varios campos.
                $sql = $conectar->query("SELECT * FROM cnes WHERE cnes='$cnes' AND estabelecimento='$estabelecimento' AND id<>'$id'");
                if ($sql->num_rows > 0) { ?>
                    <?php $_SESSION['msgerroredit'] = "<div class='alert alert-danger text-center'><strong>CNES</strong> : $cnes - <strong>ESTABELECIMENTO</strong> : $estabelecimento - <strong>NÃO EDITADO : $tipo DUPLICIDADE</strong></div>";
                    header("Location: suvisjt.php?pag=edit-cnes&id=$id"); ?>

                    <!-------------------------------------------------------------------------------------------------------------------------->

                <?php } else {
                    if (!$conectar->query("UPDATE cnes SET cnes = '$cnes', estabelecimento = '$estabelecimento', usuarioalt = '$usuariologin', alterado =  NOW() WHERE id = '$id'")) die ('<div class="form-system-group"><a href="javascript:history.back()" <button type=\'button\' class=\'btn btn-danger\' accesskey="V"><span class="glyphicon glyphicon-arrow-left"></span> <u>V</u>OLTAR</button></a><h4><strong><div class="alert alert-danger text-center" roles="alert">ERROR:02 FALHA DE SICRONIZAÇÃO COM A TABELA !!! SE PERSISTIR CONTATE: sisdamjt@gmail.com</h4></strong></div>');
                    $_SESSION['msgedit'] = "<div class='alert alert-success text-center'><strong>CNES</strong> : $cnes - <strong>ESTABELECIMENTO</strong> : $estabelecimento - <strong>EDITADO COM SUCESSO !!!</strong></div>";
                    header("Location: suvisjt.php?pag=list-cnes");
                }
                ?>

            </form>
        </div>
    </div>
</div>


