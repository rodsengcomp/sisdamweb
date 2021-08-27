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
$datamemo = mysqli_real_escape_string($conectar, $_POST["datamemo"]);
$localdestino = mysqli_real_escape_string($conectar, $_POST["localdestino"]);
$tipo = mysqli_real_escape_string($conectar, $_POST["tipo"]);
$nomememo = mysqli_real_escape_string($conectar, $_POST["nomememo"]);
$descricaomemo = mysqli_real_escape_string($conectar, $_POST["descricaomemo"]);
?>

<div class="container theme-showcase" role="main">
    <!-- Página de Título -->
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <ol class="breadcrumb">
                    <li><i class="fa fa-database"></i> <a href="suvisjt.php">Sisdam Web</a></li>
                    <li class="active">Memorandos/Ofícios</li>
                </ol>
                <button type="button" class="btn btn-default btn-lg btn-block">EDITAR MEMORANDOS E OFÍCIOS</button>
            </div>
        </div>
    </div>
    <!-- Fim da Página de Título -->

    <div class="row espaco">
        <div class="col-md-12">
            <form class="form-horizontal" style="<?php if ($_SESSION['usuarioNivelAcesso'] > 3) {
                echo 'display: none;';
            } ?>" id="proc_edit_memo">

                <?php

                //Se conectando com o Banco de Dados e tratando possível erro de conexão ...
                if ($conexao = $conectar->query($conectar)) die ('<div class="form-group"><a href="javascript:history.back()" <button type=\'button\' class=\'btn btn-danger\' accesskey="V"><span class="glyphicon glyphicon-arrow-left"></span> <u>V</u>OLTAR</button></a><h4><strong><div class="alert alert-danger text-center" role="alert">ERROR : 01 FALHA AO CONECTAR !!! SE PERSISTIR CONTATE: sisdamjt@gmail.com</h4></strong></div>');

                # Verificando varios campos.
                $sql = $conectar->query("SELECT id FROM memo WHERE datamemo='$datamemo' AND localdestino='$localdestino' AND descricaomemo='$descricaomemo' AND nomememo='$nomememo' AND id<>'$id'");
                if ($sql->num_rows > 0) { ?>
                    <?php $_SESSION['msgerroredit'] = "<div class='alert alert-danger text-center'><strong>TIPO</strong> : $tipo - <strong>Nº</strong> : $id - <strong>DATA</strong> : $datamemo - <strong>LOCAL</strong> : $localdestino - <strong>DESCRIÇÃO</strong> : $descricaomemo - <strong>NÃO EDITADO : DUPLICIDADE</strong></div>";
                    header("Location: suvisjt.php?pag=edit-memo-oficio&id=$id"); ?>
                    <!-------------------------------------------------------------------------------------------------------------------------->
                <?php } else {
                    if (!$conectar->query("UPDATE memo SET datamemo = '$datamemo', localdestino = '$localdestino', tipodoc = '$tipo', nomememo = '$nomememo', descricaomemo = '$descricaomemo', usuarioalt = '$usuariologin', alterado =  NOW() WHERE id = '$id'")) die ('<div class="form-system-group"><a href="javascript:history.back()" <button type=\'button\' class=\'btn btn-danger\' accesskey="V"><span class="glyphicon glyphicon-arrow-left"></span> <u>V</u>OLTAR</button></a><h4><strong><div class="alert alert-danger text-center" roles="alert">ERROR:02 FALHA DE SICRONIZAÇÃO COM A TABELA !!! SE PERSISTIR CONTATE: sisdamjt@gmail.com</h4></strong></div>');
                    $_SESSION['msgedit'] = "<div class='alert alert-success text-center'><strong>TIPO</strong> : $tipo - <strong>Nº</strong> : $id - <strong>DATA</strong> : $datamemo - <strong>LOCAL</strong> : $localdestino - <strong>DESCRIÇÃO</strong> : $descricaomemo - <strong> EDITADO COM SUCESSO !!!</strong></div>";
                    header("Location: suvisjt.php?pag=list-memo-oficio");
                }
                ?>

            </form>
        </div>
    </div>
</div>


