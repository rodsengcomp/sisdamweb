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
$datatid = mysqli_real_escape_string($conectar, $_POST["datatid"]);
$ntid = mysqli_real_escape_string($conectar, $_POST["ntid"]);
$tipotid = mysqli_real_escape_string($conectar, $_POST["tipotid"]);
$identificacaotid = mysqli_real_escape_string($conectar, $_POST["identificacaotid"]);
$orgorigem = mysqli_real_escape_string($conectar, $_POST["orgorigem"]);
$uniorigem = mysqli_real_escape_string($conectar, $_POST["uniorigem"]);
$assuntotid = mysqli_real_escape_string($conectar, $_POST["assuntotid"]);
$descricaotid = mysqli_real_escape_string($conectar, $_POST["descricaotid"]);
$unidestino = mysqli_real_escape_string($conectar, $_POST["unidestino"]);
$datatram = mysqli_real_escape_string($conectar, $_POST["datatram"]);
$resptid = mysqli_real_escape_string($conectar, $_POST["resptid"]);
$unientrada = mysqli_real_escape_string($conectar, $_POST["unientrada"]);
?>

<div class="container theme-showcase" role="main">
    <!-- Página de Título -->
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <ol class="breadcrumb">
                    <li><i class="fa fa-database"></i> <a href="suvisjt.php">Sisdam Web</a></li>
                    <li class="active">Tid em Aberto <?php echo $today = date("Y"); ?></li>
                </ol>
                <button type="button" class="btn btn-success btn-labeled btn-lg btn-block"><span class="btn-label"><i
                                class="glyphicon glyphicon-plus-sign"></i></span>EDITAR TID EM ABERTO <?php echo $today = date("Y"); ?></button>
            </div>
        </div>
    </div>
    <!-- Fim da Página de Título -->

    <div class="form-group text-center">
        <div class="alert alert-danger text-center" style="<?php if ($_SESSION['usuarioTid'] <> 0) {
            echo 'display: none;';
        } ?>" role="alert"><strong>USUÁRIO SEM PERMISSÃO PARA EDITAR TID <?php echo $today = date("Y"); ?> !!!</strong></div>
    </div>

    <div class="row espaco">
        <div class="col-md-12">
            <form class="form-horizontal" style="<?php if ($_SESSION['usuarioNivelAcesso'] > 3) {
                echo 'display: none;';
            } ?>" id="proc_edit_tid">

                <?php

                //Se conectando com o Banco de Dados e tratando possível erro de conexão ...
                if ($conexao = $conectar->query($conectar)) die ('<div class="form-group"><a href="javascript:history.back()" <button type=\'button\' class=\'btn btn-danger\' accesskey="V"><span class="glyphicon glyphicon-arrow-left"></span> <u>V</u>OLTAR</button></a><h4><strong><div class="alert alert-danger text-center" role="alert">ERROR : 01 FALHA AO CONECTAR !!! SE PERSISTIR CONTATE: sisdamjt@gmail.com</h4></strong></div>');

                # Verificando vários campos.
                $sql = $conectar->query("SELECT id FROM tid WHERE ndoc='$ntid' AND tipo='$tipotid' AND uniorigem='$uniorigem' AND assunto='$assuntotid' AND id<>'$id'");
                if ($sql->num_rows > 0) { ?>
                    <?php $_SESSION['msgerroredit'] = "<div class='alert alert-danger text-center'><strong>TID Nº</strong> <?php echo $ntid ?> - <strong>TIPO</strong> 
                        <?php echo $tipotid ?> - <strong>UN. ORIGEM</strong> <?php echo $uniorigem ?> - <strong>NÃO EDITADO : EM DUPLICIDADE</strong></div>";
                    header("Location: suvisjt.php?pag=edit-tid&id=$id"); ?>
                    <!-------------------------------------------------------------------------------------------------------------------------->
                <?php } else {
                    if (!$conectar->query("UPDATE tid SET dataentrada = '$datatid', ndoc = '$ntid', tipo = '$tipotid',identificacao = '$identificacaotid',orgorigem = '$orgorigem',uniorigem = '$uniorigem' , assunto = '$assuntotid' , descricao = '$descricaotid',unidestino = '$unidestino', datatramitacao = '$datatram', tecnico_rec = '$resptid', unientrada = '$unientrada', usuarioalt = '$usuariologin', alterado =  NOW() WHERE id = '$id'")) die ('<div class="form-system-group"><a href="javascript:history.back()" <button type=\'button\' class=\'btn btn-danger\' accesskey="V"><span class="glyphicon glyphicon-arrow-left"></span> <u>V</u>OLTAR</button></a><h4><strong><div class="alert alert-danger text-center" roles="alert">ERROR:02 FALHA DE SICRONIZAÇÃO COM A TABELA !!! SE PERSISTIR CONTATE: sisdamjt@gmail.com</h4></strong></div>');
                    $_SESSION['msgedit'] = "<div class='alert alert-success text-center'><strong>TID Nº</strong> : $ntid - <strong>TIPO</strong> 
                     : $tipotid - <strong>UN. ORIGEM</strong> : $uniorigem - <strong> EDITADO COM SUCESSO !!!</strong></div>";
                    header("Location: suvisjt.php?pag=list-tid-aberto");
                }
                ?>

            </form>
        </div>
    </div>
</div>


