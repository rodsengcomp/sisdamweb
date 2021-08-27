<!-- Este projeto é desenvolvido na Suvis Jaçanã-Tremembé com iniciativa dos colaboradores da Unidade -->
<!-- Código desenvolvido por Rodolfo Romaioli Ribeiro de Jesus - rodolfo.romaioli@gmail.com -->
<!-- Sisdam Web - 2.0 - 2017 - Todos os direitos reservados -->

<?php
/*error_reporting(0);*/
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
                    <li class="active">Tid em Aberto <?php echo $today = date("Y"); ?></li>
                </ol>
                <button type="button" class="btn btn-success btn-labeled btn-lg btn-block"><span class="btn-label"><i
                                class="glyphicon glyphicon-plus-sign"></i></span>CADASTRAR TID EM ABERTO <?php echo $today = date("Y"); ?></button>
            </div>
        </div>
    </div>
    <!-- Fim da Página de Título -->

    <div class="row espaco">
        <div class="col-md-12">
            <form class="form-horizontal" style="<?php if ($_SESSION['usuarioTid'] == 0) {
                echo 'display: none;';
            } ?>" id="proc_cad_tid">

                <?php

                //Se conectando com o Banco de Dados e tratando possível erro de conexão ...
                if ($conexao = $conectar->query($conectar)) die ('<div class="form-group"><a href="javascript:history.back()" <button type=\'button\' class=\'btn btn-danger\' accesskey="V"><span class="glyphicon glyphicon-arrow-left"></span> <u>V</u>OLTAR</button></a><h4><strong><div class="alert alert-danger text-center" role="alert">ERROR : 01 FALHA AO CONECTAR !!! SE PERSISTIR CONTATE: sisdamjt@gmail.com</h4></strong></div>');

                #Recolhendo os dados do formulário
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

                # Verificando vários campos.
                $sql = $conectar->query("SELECT * FROM tid WHERE ndoc='$ntid'");

                if ($sql->num_rows > 0) { ?>
                    <div class="form-group">
                        <div class="alert alert-danger text-center" id="usuarioerro" role="alert">
                            <strong>TID Nº</strong> <?php echo $ntid ?> - <strong>TIPO</strong> <?php echo $tipotid ?> - <strong>UN. ORIGEM</strong> <?php echo $uniorigem ?>
                            - <strong>NÃO CADASTRADO : EM DUPLICIDADE</strong></div>
                    </div>

                    <?php include_once 'form-tid.php'; ?>

                    <div class="form-group text-center">
                        <a href="javascript:history.back()">
                            <button type="button" accesskey="E" class='btn btn-labeled btn-warning'><span
                                        class="btn-label"><i class="glyphicon glyphicon-pencil"></i></span><u>E</u>DITAR
                            </button>
                        </a>&nbsp;&nbsp;&nbsp;
                        <a href='suvisjt.php?pag=list-tid-aberto' type='button' style="<?php if ($_SESSION['usuarioNivelAcesso'] <> 1) {
                            echo 'display: none;';
                        } ?>" accesskey="L" class="btn btn-labeled btn-info"><span class="btn-label"><i
                                        class="glyphicon glyphicon-list"></i></span><u>L</u>ISTAR</a>&nbsp;&nbsp;&nbsp;
                        <a href='suvisjt.php' type='button' style="<?php if ($_SESSION['usuarioNivelAcesso'] <> 1) {
                            echo 'display: none;';
                        } ?>" accesskey="S" class="btn btn-labeled btn-danger"><span class="btn-label"><i
                                        class="glyphicon glyphicon-remove"></i></span><u>S</u>AIR</a>
                    </div>
                    <!-------------------------------------------------------------------------------------------------------------------------->
                <?php } else {
                    if (!$conectar->query("INSERT INTO tid (dataentrada, ndoc, tipo, identificacao, orgorigem, uniorigem, assunto, descricao, unidestino, datatramitacao, tecnico_rec, unientrada, usuariocad, criado) VALUES ('$datatid', '$ntid','$tipotid', '$identificacaotid','$orgorigem', '$uniorigem', '$assuntotid', '$descricaotid', '$unidestino', '$datatram', '$resptid', '$unientrada', '$usuariologin', NOW())")) die ('<div class="form-group"><a href="javascript:history.back()" <button type=\'button\' class=\'btn btn-danger\' accesskey="V"><span class="glyphicon glyphicon-arrow-left"></span> <u>V</u>OLTAR</button></a><h4><strong><div class="alert alert-danger text-center" role="alert">ERROR:02 FALHA DE SICRONIZAÇÃO COM A TABELA !!! SE PERSISTIR CONTATE: sisdamjt@gmail.com</h4></strong></div>'); ?>

                    <div class="form-group">
                        <div class="alert alert-success text-center" role="alert">
                            <strong>TID Nº</strong> <?php echo $ntid ?> - <strong>TIPO</strong> <?php echo $tipotid ?> - <strong>UN. ORIGEM</strong> <?php echo $uniorigem ?>
                            - <strong>CADASTRADO COM SUCESSO !!!</strong></div>
                    </div>

                    <?php include_once 'form-tid.php'; ?>

                    <div class="form-group text-center">
                        <div class="col-md-12">
                        <a href='suvisjt.php?pag=cad-tid' type='button' style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                            echo 'display: none;';
                        } ?>" accesskey="N" class="btn btn-labeled btn-success"><span class="btn-label"><i
                                        class="glyphicon glyphicon-plus-sign"></i></span><u>N</u>OVO</a>
                        <a href='suvisjt.php?pag=list-tid-aberto' type='button' style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                            echo 'display: none;';
                        } ?>" accesskey="L" class="btn btn-labeled btn-info"><span class="btn-label"><i
                                        class="glyphicon glyphicon-list"></i></span><u>L</u>ISTAR</a>
                        <a href='suvisjt.php' type='button' data-toggle="tooltip" title="SAIR DO FORMULÁRIO" accesskey="S"
                                class="btn btn-labeled btn-danger"><span class="btn-label"><i
                                        class="glyphicon glyphicon-remove"></i></span> <u>S</u>AIR</a>
                        </div>
                    </div>

                <?php } ?>

            </form>
        </div>
    </div>
</div>


