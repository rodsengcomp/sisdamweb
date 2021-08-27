<!-- Este projeto é desenvolvido na Suvis Jaçanã-Tremembé com iniciativa dos colaboradores da Unidade -->
<!-- Código desenvolvido por Rodolfo Romaioli Ribeiro de Jesus - rodolfo.romaioli@gmail.com -->
<!-- Sisdam Web - 2.0 - 2017 - Todos os direitos reservados -->

<?php
error_reporting(0);
include_once '../../../../locked/seguranca.php';
include_once '../../../../conecta.php';
?>

<div class="container theme-showcase" role="main">
    <!-- Página de Título -->
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <ol class="breadcrumb">
                    <li><i class="fa fa-database"></i> <a href="suvisjt.php">Sisdam Web</a></li>
                    <li class="active">Ativar Tr IGM</li>
                </ol>
                <button type="button" class="btn btn-warning btn-lg btn-block">ALTERAR TR IGM</button>
            </div>
        </div>
    </div>
    <!-- Fim da Página de Título -->
    <div class="row espaco">
        <div class="col-md-12">
            <form class="form-horizontal" style="<?php if ($_SESSION['usuarioNivelAcesso'] > 3) {
                echo 'display: none;';
            } ?>" id="proc-alt-igm">

                <?php

                //Se conectando com o Banco de Dados e tratando possível erro de conexão ...
                if ($conexao = $conectar->query($conectar)) die ('<div class="form-group"><a href="javascript:history.back()" <button type=\'button\' class=\'btn btn-danger\' accesskey="V"><span class="glyphicon glyphicon-arrow-left"></span> <u>V</u>OLTAR</button></a><h4><strong><div class="alert alert-danger text-center" role="alert">ERROR : 01 FALHA AO CONECTAR !!! SE PERSISTIR CONTATE: sisdamjt@gmail.com</h4></strong></div>');

                #Recolhendo os dados do formulário

                $nDoc = mysqli_real_escape_string($conectar, $_GET["nDoc"]);
                $NM_PACIENT = mysqli_real_escape_string($conectar, $_GET["NM_PACIENT"]);
                $ResultadoTr = mysqli_real_escape_string($conectar, $_GET["ResultadoTr"]);
                $agravo_impresso = mysqli_real_escape_string($conectar, $_GET['impresso']);

                # Verificando vários campos.
                if ($ResultadoTr == 'Nao Reagente') {
                    $conectar->query("UPDATE tbldengue SET ResultadoTr = 'Nao Reagente', usuarioAlteracao = '$usuariologin', DataAlteracao =  NOW() WHERE nDoc = '$nDoc'");
                    $_SESSION['msgsuccess'] = "<div class='alert alert-success text-center'><strong>SINAN</strong> : $nDoc - <strong>NOME</strong> : $NM_PACIENT - <strong>RESULTADO TR</strong> : $ResultadoTr</div>";
                    header("Location: suvisjt.php?pag=list-bloq-dengue&sinan=dengnet&tabela=tbldengue&buttons=dengue&agravo=DENGUE&ial=dengue_ial&list=dengue"); ?>
                <?php } elseif ($ResultadoTr == 'Reagente'){
                    $conectar->query("UPDATE tbldengue SET ResultadoTr = 'Reagente', usuarioAlteracao = '$usuariologin', DataAlteracao =  NOW() WHERE nDoc = '$nDoc'");
                    $_SESSION['msgdanger'] = "<div class='alert alert-danger text-center'><strong>SINAN</strong> : $nDoc - <strong>NOME</strong> : $NM_PACIENT - <strong>RESULTADO TR</strong> : $ResultadoTr</div>";
                    header("Location: suvisjt.php?pag=list-bloq-dengue&sinan=dengnet&tabela=tbldengue&buttons=dengue&agravo=DENGUE&ial=dengue_ial&list=dengue"); ?>
                <?php } elseif ($ResultadoTr == 'Exame Nao Realizado'){
                    $conectar->query("UPDATE tbldengue SET ResultadoTr = 'Exame Nao Realizado', usuarioAlteracao = '$usuariologin', DataAlteracao =  NOW() WHERE nDoc = '$nDoc'");
                    $_SESSION['msgwarning'] = "<div class='alert alert-warning text-center'><strong>SINAN</strong> : $nDoc - <strong>NOME</strong> : $NM_PACIENT - <strong>RESULTADO TR</strong> : $ResultadoTr</div>";
                    header("Location: suvisjt.php?pag=list-bloq-dengue&sinan=dengnet&tabela=tbldengue&buttons=dengue&agravo=DENGUE&ial=dengue_ial&list=dengue");
                } ?>

            </form>
        </div>
    </div>
</div>