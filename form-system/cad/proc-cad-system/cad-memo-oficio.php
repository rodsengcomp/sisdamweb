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
                    <li class="active">Memorandos/Ofícios <?php echo $today = date("Y");   ?> </li>
                </ol>
                <button type="button" class="btn btn-default btn-lg btn-block">CADASTRAR MEMORANDOS E OFÍCIOS <?php echo $today = date("Y");   ?></button>
            </div>
        </div>
    </div>
    <!-- Fim da Página de Título -->

    <div class="row espaco">
        <div class="col-md-12">
            <form class="form-horizontal" style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                echo 'display: none;';
            } ?>" id="proc_cad_memo">

                <?php

                //Se conectando com o Banco de Dados e tratando possível erro de conexão ...
                if ($conexao = $conectar->query($conectar)) die ('<div class="form-group"><a href="javascript:history.back()" <button type=\'button\' class=\'btn btn-danger\' accesskey="V"><span class="glyphicon glyphicon-arrow-left"></span> <u>V</u>OLTAR</button></a><h4><strong><div class="alert alert-danger text-center" role="alert">ERROR : 01 FALHA AO CONECTAR !!! SE PERSISTIR CONTATE: sisdamjt@gmail.com</h4></strong></div>');

                #Recolhendo os dados do formulário
                $datamemo = mysqli_real_escape_string($conectar, $_POST["datamemo"]);
                $tipo = mysqli_real_escape_string($conectar, $_POST["tipo"]);
                $localdestino = mysqli_real_escape_string($conectar, $_POST["localdestino"]);
                $descricaomemo = mysqli_real_escape_string($conectar, $_POST["descricaomemo"]);
                $nomememo = mysqli_real_escape_string($conectar, $_POST["nomememo"]);

                # Verificando vários campos.
                $sql = $conectar->query("SELECT * FROM memo WHERE datamemo='$datamemo' AND localdestino='$localdestino' AND descricaomemo='$descricaomemo' AND nomememo='$nomememo'");

                if ($sql->num_rows > 0) { ?>
                    <div class="form-group">
                        <div class="alert alert-danger text-center" id="usuarioerro" role="alert">
                            <strong><?php echo $tipo ?> - <?php echo $datamemo ?></strong> - <?php echo $localdestino ?>
                            - <?php echo $descricaomemo ?> - <strong>NÃO CADASTRADO : <?php echo $tipo ?> EM
                                DUPLICIDADE</strong></div>
                    </div>

                    <?php include_once 'form-memo-oficio.php'; ?>

                    <div class="form-group text-center">
                        <a href="javascript:history.back()">
                            <button type="button" accesskey="E" class='btn btn-labeled btn-warning'><span
                                        class="btn-label"><i class="glyphicon glyphicon-pencil"></i></span><u>E</u>DITAR
                            </button>
                        </a>&nbsp;&nbsp;&nbsp;
                        <a href='suvisjt.php?pag=list-memo-oficio'
                        <button type='button' style="<?php if ($_SESSION['usuarioNivelAcesso'] <> 1) {
                            echo 'display: none;';
                        } ?>" accesskey="L" class="btn btn-labeled btn-info"><span class="btn-label"><i
                                        class="glyphicon glyphicon-list"></i></span><u>L</u>ISTAR
                        </button>
                        </a>&nbsp;&nbsp;&nbsp;
                        <a href='suvisjt.php'
                        <button type='button' style="<?php if ($_SESSION['usuarioNivelAcesso'] <> 1) {
                            echo 'display: none;';
                        } ?>" accesskey="S" class="btn btn-labeled btn-danger"><span class="btn-label"><i
                                        class="glyphicon glyphicon-remove"></i></span><u>S</u>AIR
                        </button>
                        </a>
                    </div>
                    <!-------------------------------------------------------------------------------------------------------------------------->
                <?php } else {
                    if (!$conectar->query("INSERT INTO memo (datamemo, tipodoc, localdestino, descricaomemo, nomememo,  usuariocad, criado) VALUES ('$datamemo', '$tipo','$localdestino', '$descricaomemo', '$nomememo', '$usuariologin', NOW())")) die ('<div class="form-group"><a href="javascript:history.back()" <button type=\'button\' class=\'btn btn-danger\' accesskey="V"><span class="glyphicon glyphicon-arrow-left"></span> <u>V</u>OLTAR</button></a><h4><strong><div class="alert alert-danger text-center" role="alert">ERROR:02 FALHA DE SICRONIZAÇÃO COM A TABELA !!! SE PERSISTIR CONTATE: sisdamjt@gmail.com</h4></strong></div>'); ?>
                    <div class="form-group">
                        <div class="alert alert-success text-center" id="usuariook" role="alert">
                            <strong><?php echo $tipo ?> Nº : </strong><?php printf("%d\n", $conectar->insert_id); ?> -
                            <strong><?php echo $datamemo ?></strong> - <?php echo $localdestino ?>
                            - <?php echo $descricaomemo ?> - <strong>CADASTRADO COM SUCESSO !!!</strong></div>
                    </div>

                    <?php include_once 'form-memo-oficio.php'; ?>

                    <div class="form-group text-center">
                        <a href='suvisjt.php?pag=cad-memo-oficio'
                        <button type='button' style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                            echo 'display: none;';
                        } ?>" accesskey="N" class="btn btn-labeled btn-success"><span class="btn-label"><i
                                        class="glyphicon glyphicon-plus-sign"></i></span><u>N</u>OVO
                        </button>
                        </a>&nbsp;&nbsp;&nbsp;
                        <a href='suvisjt.php?pag=list-memo-oficio'
                        <button type='button' style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                            echo 'display: none;';
                        } ?>" accesskey="L" class="btn btn-labeled btn-info"><span class="btn-label"><i
                                        class="glyphicon glyphicon-list"></i></span><u>L</u>ISTAR
                        </button>
                        </a>&nbsp;&nbsp;&nbsp;
                        <a href='suvisjt.php'
                        <button type='button' data-toggle="tooltip" title="SAIR DO FORMULÁRIO" accesskey="S"
                                class="btn btn-labeled btn-danger"><span class="btn-label"><i
                                        class="glyphicon glyphicon-remove"></i></span> <u>S</u>AIR
                        </button>
                        </a>
                    </div>

                <?php } ?>

            </form>
        </div>
    </div>
</div>


