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
                    <li class="active">Ativar Usuario</li>
                </ol>
                <button type="button" class="btn btn-warning btn-lg btn-block">ATIVAR USUÁRIO</button>
            </div>
        </div>
    </div>
    <!-- Fim da Página de Título -->
    <div class="row espaco">
        <div class="col-md-12">
            <form class="form-horizontal" style="<?php if ($_SESSION['usuarioNivelAcesso'] > 3) {
                echo 'display: none;';
            } ?>" id="proc-reset-senha">

                <?php

                //Se conectando com o Banco de Dados e tratando possível erro de conexão ...
                if ($conexao = $conectar->query($conectar)) die ('<div class="form-group"><a href="javascript:history.back()" <button type=\'button\' class=\'btn btn-danger\' accesskey="V"><span class="glyphicon glyphicon-arrow-left"></span> <u>V</u>OLTAR</button></a><h4><strong><div class="alert alert-danger text-center" role="alert">ERROR : 01 FALHA AO CONECTAR !!! SE PERSISTIR CONTATE: sisdamjt@gmail.com</h4></strong></div>');

                #Recolhendo os dados do formulário
                $id = mysqli_real_escape_string($conectar, $_GET["id"]);
                $nome = mysqli_real_escape_string($conectar, $_GET["nome"]);
                $email = mysqli_real_escape_string($conectar, $_GET["email"]);
                $status = mysqli_real_escape_string($conectar, $_GET["status"]);
                $nivelacesso = mysqli_real_escape_string($conectar, $_GET["nivel_acesso_id"]);
                $login = mysqli_real_escape_string($conectar, $_GET["login"]);

                # Verificando vários campos.
                if ($status == 'ATIVO') { ?>
                    <?php $conectar->query("UPDATE usuarios SET status = 'ATIVO', usuarioalt = '$usuariologin', alterado =  NOW() WHERE id = '$id'");
                    $_SESSION['msgativo'] = "<div class='alert alert-success text-center'><strong>LOGIN</strong> : $login - <strong>NOME</strong> : $nome - <strong>STATUS</strong> : <button type='button' class=\"btn btn-success\">$status</button></div>";
                    header("Location: admin.php"); ?>

                    <!-------------------------------------------------------------------------------------------------------------------------->
                <?php } else {
                    $conectar->query("UPDATE usuarios SET status = 'INATIVO', usuarioalt = '$usuariologin', alterado =  NOW() WHERE id = '$id'");
                    $_SESSION['msginativo'] = "<div class='alert alert-danger text-center'><strong>LOGIN</strong> : $login - <strong>NOME</strong> : $nome - <strong>STATUS</strong> : <button type='button' class=\"btn btn-danger\">$status</button></div>";
                    header("Location: admin.php");
                } ?>

            </form>
        </div>
    </div>
</div>