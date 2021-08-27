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
                    <li class="active">Cadastrar Endereço</li>
                </ol>
                <button type="button" class="btn btn-success btn-lg btn-block">CADASTRAR ENDEREÇO</button>
            </div>
        </div>
    </div>
    <!-- Fim da Página de Título -->

    <div class="row espaco">
        <div class="col-md-12">
            <form class="form-horizontal" style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                echo 'display: none;';
            } ?>" id="proc_cad_end">

                <?php

                //Se conectando com o Banco de Dados e tratando possível erro de conexão ...
                if ($conexao = $conectar->query($conectar)) die ('<div class="form-group"><a href="javascript:history.back()" <button type=\'button\' class=\'btn btn-danger\' accesskey="V"><span class="glyphicon glyphicon-arrow-left"></span> <u>V</u>OLTAR</button></a><h4><strong><div class="alert alert-danger text-center" role="alert">ERROR : 01 FALHA AO CONECTAR !!! SE PERSISTIR CONTATE: sisdamjt@gmail.com</h4></strong></div>');

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
                $ruagoogle = mysqli_real_escape_string($conectar, $_POST["ruagoogle"]);
                $latitude = mysqli_real_escape_string($conectar, $_POST["latitude"]);
                $longitude = mysqli_real_escape_string($conectar, $_POST["longitude"]);
                $atual = "SIM";

                # Verificando se tabela já tem id com rua igual.
                $sql = $conectar->query("SELECT id FROM ruas WHERE rua='$rua'");

                if ($sql->num_rows > 0) { ?>
                    <div class="form-group">
                        <div class="alert alert-danger text-center" id="usuarioerro" role="alert">
                            <strong>ENDEREÇO</strong> : <?php echo $da ?> - <?php echo $setor ?> - <?php echo $log ?>
                            - <?php echo $rua ?> - <?php echo $bairro ?> - <?php echo $cep ?> - <?php echo $pgguia ?>
                            - <?php echo $ubs ?> - <strong>NÃO CADASTRADO : DUPLICIDADE</strong></div>
                    </div>

                    <?php include_once 'form-end.php'; ?>

                    <div class="form-group text-center">
                        <a href='suvisjt.php?pag=cad-end'>
                            <button type="button" accesskey="V" class='btn btn-warning'><span
                                        class="glyphicon glyphicon-pencil"><u>V</u>OLTAR</button>
                        </a>&nbsp;&nbsp;&nbsp;
                        <a href='suvisjt.php?pag=list-end'
                        <button type='button' style="<?php if ($_SESSION['usuarioNivelAcesso'] <> 1) {
                            echo 'display: none;';
                        } ?>" data-toggle="tooltip" title="LISTAR REGISTROS" accesskey="L" class="btn btn-info"><span
                                    class="glyphicon glyphicon-list"></span></button>
                        </a>&nbsp;&nbsp;&nbsp;
                    </div>
                    <!-------------------------------------------------------------------------------------------------------------------------->
                <?php } else {
                    if (!$conectar->query("INSERT INTO ruas (da, setor, log, rua, bairro, cep, pgguia, ubs,atual,ruagoogle,latitude,longitude,usuariocad,criado) VALUES ('$da','$setor','$log','$rua','$bairro','$cep','$pgguia','$ubs','$atual','$ruagoogle','$latitude','$longitude','$usuariologin',NOW())")) die ('<div class="form-system-group"><a href="javascript:history.back()" <button type=\'button\' class=\'btn btn-danger\' accesskey="V"><span class="glyphicon glyphicon-arrow-left"></span> <u>V</u>OLTAR</button></a><h4><strong><div class="alert alert-danger text-center" roles="alert">ERROR:02 FALHA DE SICRONIZAÇÃO COM A TABELA !!! SE PERSISTIR CONTATE: sisdamjt@gmail.com</h4></strong></div>'); ?>
                    <div class="form-group">
                        <div class="alert alert-success text-center" id="usuariook" role="alert">
                            <strong>ENDEREÇO</strong> : <?php echo $da ?> - <?php echo $setor ?> - <?php echo $log ?>
                            - <?php echo $rua ?> - <?php echo $bairro ?> - <?php echo $cep ?> - <?php echo $pgguia ?>
                            - <?php echo $ubs ?> - <strong>CADASTRADO COM SUCESSO !!!</strong></div>
                    </div>

                    <?php include_once 'form-end.php'; ?>

                    <div class="form-group text-center">
                        <a href='suvisjt.php?pag=cad-end'
                        <button type='button' style="<?php if ($_SESSION['usuarioNivelAcesso'] <> 1) {
                            echo 'display: none;';
                        } ?>" accesskey="N" class="btn btn-labeled btn-success"><span class="btn-label"><i
                                        class="glyphicon glyphicon-plus-sign"></i></span><u>N</u>OVO
                        </button>
                        </a>&nbsp;&nbsp;&nbsp;
                        <a href='suvisjt.php?pag=list-end'
                        <button type='button' style="<?php if ($_SESSION['usuarioNivelAcesso'] <> 1) {
                            echo 'display: none;';
                        } ?>" accesskey="L" class="btn btn-labeled btn-info"><span class="btn-label"><i
                                        class="glyphicon glyphicon-list"></i></span><u>L</u>ISTAR
                        </button>
                        </a>&nbsp;&nbsp;&nbsp;
                        <a target="_blank"
                           href='http://www.buscacep.correios.com.br/sistemas/buscacep/buscaCepEndereco.cfm'
                        <button type='button' style="<?php if ($_SESSION['usuarioNivelAcesso'] > 2) {
                            echo 'display: none;';
                        } ?>" data-toggle="tooltip" title="SAIR DO FORMULÁRIO" accesskey="S" class="btn btn-default">
                            <span class="glyphicon glyphicon-eye-open"></span> BUSCA CEP</a></button>
                        </a>&nbsp;&nbsp;&nbsp;
                        <a href='suvisjt.php'
                        <button type='button' style="<?php if ($_SESSION['usuarioNivelAcesso'] <> 1) {
                            echo 'display: none;';
                        } ?>" accesskey="S" class="btn btn-labeled btn-danger"><span class="btn-label"><i
                                        class="glyphicon glyphicon-remove"></i></span>SAIR
                        </button>
                        </a>
                    </div>

                <?php } ?>

            </form>
        </div>
    </div>
</div>


