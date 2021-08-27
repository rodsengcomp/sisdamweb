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
                    <li class="active">Cadastrar Cidade</li>
                </ol>
                <button type="button" class="btn btn-success btn-lg btn-block">CADASTRAR CIDADES</button>
            </div>
        </div>
    </div>
    <!-- Fim da Página de Título -->
    <div class="row espaco">
        <div class="col-md-12">
            <form class="form-horizontal" style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                echo 'display: none;';
            } ?>" id="proc_cad_cidade">

                <?php

                //Se conectando com o Banco de Dados e tratando possível erro de conexão ...
                if ($conexao = $conectar->query($conectar)) die ('<div class="form-group"><a href="javascript:history.back()" <button type=\'button\' class=\'btn btn-danger\' accesskey="V"><span class="glyphicon glyphicon-arrow-left"></span> <u>V</u>OLTAR</button></a><h4><strong><div class="alert alert-danger text-center" role="alert">ERROR : 01 FALHA AO CONECTAR !!! SE PERSISTIR CONTATE: sisdamjt@gmail.com</h4></strong></div>');

                #Recolhendo os dados do formulário
                $codigo = mysqli_real_escape_string($conectar, $_POST["codigo"]);
                $cidade = mysqli_real_escape_string($conectar, $_POST["cidade"]);
                $latitude = mysqli_real_escape_string($conectar, $_POST["latitude"]);
                $longitude = mysqli_real_escape_string($conectar, $_POST["longitude"]);

                # Verificando vários campos.
                $sql = $conectar->query("SELECT * FROM cidade WHERE latitude='$latitude' AND longitude='$longitude'");

                if ($sql->num_rows > 0) { ?>
                    <div class="form-group">
                        <div class="alert alert-danger text-center" id="usuarioerro" role="alert"><strong>CÓD</strong>
                            : <?php echo $codigo ?> - <strong>CIDADE</strong> : <?php echo $cidade ?> -
                            <strong>LAT</strong> : <?php echo $latitude ?> - <strong>LONG</strong>
                            : <?php echo $longitude ?> - <strong>NÃO CADASTRADO : <?php echo $tipo ?>
                                DUPLICIDADE</strong></div>
                    </div>

                    <?php include_once 'form-cidade.php'; ?>

                    <div class="form-group text-center">
                        <a href='suvisjt.php?pag=cad-cidade'>
                            <button type="button" accesskey="V" class='btn btn-warning'><span
                                        class="glyphicon glyphicon-pencil"><u>V</u>OLTAR</button>
                        </a>&nbsp;&nbsp;&nbsp;
                        <a href='suvisjt.php?pag=list-cidade'
                        <button type='button' style="<?php if ($_SESSION['usuarioNivelAcesso'] <> 1) {
                            echo 'display: none;';
                        } ?>" data-toggle="tooltip" title="LISTAR REGISTROS" accesskey="L" class="btn btn-info"><span
                                    class="glyphicon glyphicon-list"></span></button>
                        </a>&nbsp;&nbsp;&nbsp;
                    </div>
                    <!-------------------------------------------------------------------------------------------------------------------------->
                <?php } else {
                    if (!$conectar->query("INSERT INTO cidade (cod_cidade,cidade,latitude,longitude, usuariocad, criado) VALUES ('$codigo', '$cidade', '$latitude', '$longitude', '$usuariologin', NOW())")) die ('<div class="form-group"><a href="javascript:history.back()" <button type=\'button\' class=\'btn btn-danger\' accesskey="V"><span class="glyphicon glyphicon-arrow-left"></span> <u>V</u>OLTAR</button></a><h4><strong><div class="alert alert-danger text-center" role="alert">ERROR:02 FALHA DE SICRONIZAÇÃO COM A TABELA !!! SE PERSISTIR CONTATE: sisdamjt@gmail.com</h4></strong></div>'); ?>
                    <div class="form-group">
                        <div class="alert alert-success text-center" id="usuariook" role="alert"><strong>CÓD</strong>
                            : <?php echo $codigo ?> - <strong>CIDADE</strong> : <?php echo $cidade ?> -
                            <strong>LAT</strong> : <?php echo $latitude ?> - <strong>LONG</strong>
                            : <?php echo $longitude ?> - <strong>CADASTRADO COM SUCESSO !!!</strong></div>
                    </div>

                    <?php include_once 'form-cidade.php'; ?>

                    <div class="form-group text-center">
                        <a href='suvisjt.php?pag=cad-cidade'
                        <button type='button' style="<?php if ($_SESSION['usuarioNivelAcesso'] <> 1) {
                            echo 'display: none;';
                        } ?>" accesskey="N" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"></span>
                            <u>N</u>OVO
                        </button>
                        </a>&nbsp;&nbsp;&nbsp;
                        <a href='suvisjt.php?pag=list-cidade'
                        <button type='button' style="<?php if ($_SESSION['usuarioNivelAcesso'] <> 1) {
                            echo 'display: none;';
                        } ?>" data-toggle="tooltip" title="LISTAR REGISTROS" accesskey="L" class="btn btn-info"><span
                                    class="glyphicon glyphicon-list"></span></button>
                        </a>&nbsp;&nbsp;&nbsp;
                    </div>

                <?php } ?>

            </form>
        </div>
    </div>
</div>


