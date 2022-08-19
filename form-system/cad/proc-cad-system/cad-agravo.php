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
                    <li class="active">Cadastrar Agravo</li>
                </ol>
                <button type="button" class="btn btn-success btn-lg btn-block">CADASTRAR AGRAVO</button>
            </div>
        </div>
    </div>
    <!-- Fim da Página de Título -->
    <div class="row espaco">
        <div class="col-md-12">
            <form class="form-horizontal" style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                echo 'display: none;';
            } ?>" id="proc-cad-agravo">

                <?php

                //Se conectando com o Banco de Dados e tratando possível erro de conexão ...
                if ($conectar->connect_error) die ('<div class="form-group"><a href="javascript:history.back()" <button type=\'button\' class=\'btn btn-danger\' accesskey="V"><span class="glyphicon glyphicon-arrow-left"></span> <u>V</u>OLTAR</button></a><h4><strong><div class="alert alert-danger text-center" role="alert">ERROR : 01 FALHA AO CONECTAR !!! SE PERSISTIR CONTATE: sisdamjt@gmail.com</h4></strong></div>');

                #Recolhendo os dados do formulário
                $cid = mysqli_real_escape_string($conectar, $_POST["cid"]);
                $tipoagravo = mysqli_real_escape_string($conectar, $_POST["tipoagravo"]);
                $agravo = mysqli_real_escape_string($conectar, $_POST["agravo"]);

                # Verificando vários campos.
                $sql = $conectar->query("SELECT * FROM agravo WHERE agravo='$agravo' AND tipo='$tipoagravo'");

                if ($sql->num_rows > 0) { ?>
                    <div class="form-group">
                        <div class="alert alert-danger text-center" id="usuarioerro" role="alert">
                            <strong>CID-10</strong> : <?php echo $cid ?> - <strong>TIPO</strong>
                            : <?php echo $tipoagravo ?> - <strong>AGRAVO</strong> : <?php echo $agravo ?> - <strong>NÃO
                                CADASTRADO : DUPLICIDADE</strong></div>
                    </div>

                    <?php include_once 'form-agravo.php'; ?>

                    <div class="form-group text-center">
                        <a href='suvisjt.php?pag=cad-agravo'>
                            <button type="button" accesskey="V" class='btn btn-labeled btn-warning'><span class="btn-label"><i
                                            class="glyphicon glyphicon-pencil"></i></span><u>V</u>OLTAR</button>
                        </a>&nbsp;&nbsp;&nbsp;
                        <a href='suvisjt.php?pag=list-agravo'
                        <button type='button' style="<?php if ($_SESSION['usuarioNivelAcesso'] <> 1) {
                            echo 'display: none;';
                        } ?>" accesskey="L" class="btn btn-labeled btn-info"><span class="btn-label"><i
                                        class="glyphicon glyphicon-list"></i></span><u>L</u>ISTAR
                        </button>
                        </a>&nbsp;&nbsp;&nbsp;
                    </div>
                    <!-------------------------------------------------------------------------------------------------------------------------->
                <?php } else {
                    if (!$conectar->query("INSERT INTO agravo (cid,tipo,agravo,usuariocad, criado) VALUES ('$cid', '$tipoagravo', '$agravo', '$usuariologin', NOW())")) die ('<div class="form-group"><a href="javascript:history.back()" <button type=\'button\' class=\'btn btn-danger\' accesskey="V"><span class="glyphicon glyphicon-arrow-left"></span> <u>V</u>OLTAR</button></a><h4><strong><div class="alert alert-danger text-center" role="alert">ERROR:02 FALHA DE SICRONIZAÇÃO COM A TABELA !!! SE PERSISTIR CONTATE: sisdamjt@gmail.com</h4></strong></div>'); ?>
                    <div class="form-group">
                        <div class="alert alert-success text-center" id="usuariook" role="alert"><strong>CID-10</strong>
                            : <?php echo $cid ?> - <strong>TIPO</strong> : <?php echo $tipoagravo ?> -
                            <strong>AGRAVO</strong> : <?php echo $agravo ?> - <strong>CADASTRADO COM SUCESSO
                                !!!</strong></div>
                    </div>

                    <?php include_once 'form-agravo.php'; ?>

                    <div class="form-group text-center">
                        <a href='suvisjt.php?pag=cad-agravo'
                        <button type='button' style="<?php if ($_SESSION['usuarioNivelAcesso'] <> 1) {
                            echo 'display: none;';
                        } ?>" accesskey="N" class="btn btn-labeled btn-success"><span class="btn-label"><i class="glyphicon glyphicon-plus-sign"></i></span>
                            <u>N</u>OVO
                        </button>
                        </a>&nbsp;&nbsp;&nbsp;
                        <a href='suvisjt.php?pag=list-agravo'
                        <button type='button' style="<?php if ($_SESSION['usuarioNivelAcesso'] <> 1) {
                            echo 'display: none;';
                        } ?>" accesskey="L" class="btn btn-labeled btn-info"><span class="btn-label"><i
                                        class="glyphicon glyphicon-list"></i></span><u>L</u>ISTAR
                        </button>
                        </a>&nbsp;&nbsp;&nbsp;
                    </div>

                <?php } ?>

            </form>
        </div>
    </div>
</div>


