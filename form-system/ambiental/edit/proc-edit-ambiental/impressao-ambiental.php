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
                    <li class="active">Impressão Dengue</li>
                </ol>
                <button type="button" class="btn btn-warning btn-lg btn-block">IMPRESSÃO DENGUE</button>
            </div>
        </div>
    </div>
    <!-- Fim da Página de Título -->
    <div class="row espaco">
        <div class="col-md-12">
            <form class="form-horizontal" style="<?php if ($_SESSION['usuarioNivelAcesso'] > 3) {
                echo 'display: none;';
            } ?>" id="proc-impressao-dengue">

                <?php

                //Se conectando com o Banco de Dados e tratando possível erro de conexão ...
                if ($conectar->connect_error) die ('<div class="form-group"><a href="javascript:history.back()" <button type=\'button\' class=\'btn btn-danger\' accesskey="V"><span class="glyphicon glyphicon-arrow-left"></span> <u>V</u>OLTAR</button></a><h4><strong><div class="alert alert-danger text-center" role="alert">ERROR : 01 FALHA AO CONECTAR !!! SE PERSISTIR CONTATE: sisdamjt@gmail.com</h4></strong></div>');

                #Recolhendo os dados do formulário

                $nDoc = $_GET["nDoc"];
                $NM_PACIENT = $_GET["NM_PACIENT"];
                $Impressao = $_GET["Impressao"];
                $DataBloqueio = $_GET["DataBloqueio"];
                $DataNeb = $_GET["DataNeb"];
                $agravo_sinan_sql = $_GET['sinan'];
                $agravo_tabela_sql = $_GET['tabela'];
                $agravo_buttons = $_GET['buttons'];
                $agravo_hidden = $_GET['agravo'];
                $agravo_ial = $_GET['ial'];
                $impresso = $_GET['impresso'];


                // Aqui começa a Impressão de Bloquueio
                if ($agravo_hidden == 'DENGUE'){
                    if ($Impressao == '1Via-B') {$conectar->query("UPDATE tbldengue SET Impressao = '1', DataBloqueio = '$DataBloqueio', DataNeb = '$DataNeb', usuarioLer = '$usuariologin', Descarte = '0', DataLer = NOW() WHERE nDoc = '$nDoc'");
                        $_SESSION['msgsuccess'] = "<div class='alert alert-success text-center'><strong>SINAN</strong> : $nDoc - <strong>NOME</strong> : $NM_PACIENT - <strong>ENVIADO PARA IMPRESSÃO COM SUCESSO !!!</strong></div>";
                        header("Location: suvisjt.php?pag=bloqueio-ccz&nDoc=$nDoc&buttons=$agravo_buttons&impressao=1ªVia");
                    } elseif ($Impressao == '1Via-D') {$conectar->query("UPDATE tbldengue SET Impressao = '2', usuarioLer = '$usuariologin', DataLer = NOW() WHERE nDoc = '$nDoc'");
                        $_SESSION['msgsuccess'] = "<div class='alert alert-success text-center'><strong>SINAN</strong> : $nDoc - <strong>NOME</strong> : $NM_PACIENT - <strong>DESCARTADO COM SUCESSO !!!</strong></div>";
                        header("Location: suvisjt.php?pag=list-bloq-dengue&sinan=dengnet&tabela=tbldengue&buttons=dengue&agravo=DENGUE&ial=dengue_ial&list=dengue");
                    } elseif ($Impressao == '1Via-R') {$conectar->query("UPDATE tbldengue SET Impressao = '0', usuarioLer = '$usuariologin', DataLer = NOW() WHERE nDoc = '$nDoc'");
                        $_SESSION['msgsuccess'] = "<div class='alert alert-success text-center'><strong>SINAN</strong> : $nDoc - <strong>NOME</strong> : $NM_PACIENT - <strong>REATIVADO COM SUCESSO !!!</strong></div>";
                        header("Location: suvisjt.php?pag=list-bloq-dengue&sinan=dengnet&tabela=tbldengue&buttons=dengue&agravo=DENGUE&ial=dengue_ial&list=dengue");
                    } elseif ($Impressao == '2Via-B') {
                        $_SESSION['msgsuccess'] = "<div class='alert alert-success text-center'><strong>SINAN</strong> : $nDoc - <strong>NOME</strong> : $NM_PACIENT - <strong>ENVIADO PARA IMPRESSÃO COM SUCESSO !!!</strong></div>";
                        header("Location: suvisjt.php?pag=bloqueio-ccz&nDoc=$nDoc&impressao=2ªVia&sinan=$agravo_sinan_sql&tabela=$agravo_tabela_sql&buttons=$agravo_buttons&agravo=$agravo_hidden&ial=$agravo_ial");

                    // Caso nenhuma condição seja atendida =========>>>>>>>>>>>>>>>>> Então só me resta =>
                    } else{
                        $_SESSION['msgdanger'] = "<div class='alert alert-danger text-center'><strong>SINAN</strong> : $nDoc - <strong>NOME</strong> : $NM_PACIENT - <strong>ERRO NO COMANDO!!!</strong></div>";
                        header("Location: suvisjt.php");
                    }
                }elseif ($agravo_hidden == 'LEPTOSPIROSE') {
                    if ($Impressao == '1Via-B') {
                        $conectar->query("UPDATE $agravo_tabela_sql SET Impressao = '1', DataBloqueio = '$DataBloqueio', usuarioLer = '$usuariologin', DataLer = NOW() WHERE nDoc = '$nDoc'");
                        $_SESSION['msgsuccess'] = "<div class='alert alert-success text-center'><strong>SINAN</strong> : $nDoc - <strong>NOME</strong> : $NM_PACIENT - <strong>ENVIADO PARA IMPRESSÃO COM SUCESSO !!!</strong></div>";
                        header("Location: suvisjt.php?pag=bloqueio-ccz&nDoc=$nDoc&impressao=1ªVia");
                    } elseif ($Impressao == '1Via-D') {
                        $conectar->query("UPDATE $agravo_tabela_sql SET Impressao = '2', usuarioLer = '$usuariologin', DataLer = NOW() WHERE nDoc = '$nDoc'");
                        $_SESSION['msgsuccess'] = "<div class='alert alert-success text-center'><strong>SINAN</strong> : $nDoc - <strong>NOME</strong> : $NM_PACIENT - <strong>DESCARTADO COM SUCESSO !!!</strong></div>";
                        header("Location: suvisjt.php?pag=list-bloq-$agravo_buttons&sinan=$agravo_sinan_sql&tabela=$agravo_tabela_sql&buttons=$agravo_buttons&agravo=$agravo_hidden&ial=$agravo_ial&impresso=1");
                    } elseif ($Impressao == '1Via-R') {
                        $conectar->query("UPDATE $agravo_tabela_sql SET Impressao = '0', usuarioLer = '$usuariologin', DataLer = NOW() WHERE nDoc = '$nDoc'");
                        $_SESSION['msgsuccess'] = "<div class='alert alert-success text-center'><strong>SINAN</strong> : $nDoc - <strong>NOME</strong> : $NM_PACIENT - <strong>REATIVADO COM SUCESSO !!!</strong></div>";
                        header("Location: suvisjt.php?pag=list-bloq-$agravo_buttons&sinan=$agravo_sinan_sql&tabela=$agravo_tabela_sql&buttons=$agravo_buttons&agravo=$agravo_hidden&ial=$agravo_ial&impresso=2");
                    } elseif ($Impressao == '2Via-B') {
                        $_SESSION['msgsuccess'] = "<div class='alert alert-success text-center'><strong>SINAN</strong> : $nDoc - <strong>NOME</strong> : $NM_PACIENT - <strong>ENVIADO PARA IMPRESSÃO COM SUCESSO !!!</strong></div>";
                        header("Location: suvisjt.php?pag=bloqueio-ccz&nDoc=$nDoc&impressao=2ªVia&sinan=$agravo_sinan_sql&tabela=$agravo_tabela_sql&buttons=$agravo_buttons&agravo=$agravo_hidden&ial=$agravo_ial");

                        // Caso nenhuma condição seja atendida =========>>>>>>>>>>>>>>>>> Então só me resta =>
                    } else {
                        $_SESSION['msgdanger'] = "<div class='alert alert-danger text-center'><strong>SINAN</strong> : $nDoc - <strong>NOME</strong> : $NM_PACIENT - <strong>ERRO NO COMANDO!!!</strong></div>";
                        header("Location: suvisjt.php");

                    }
                }else {
                    if ($Impressao == '1Via-B') {
                        $conectar->query("UPDATE $agravo_tabela_sql SET Impressao = '1', DataBloqueio = '$DataBloqueio', DataNeb = '$DataNeb', usuarioLer = '$usuariologin', Descarte = '0', DataLer = NOW() WHERE nDoc = '$nDoc'");
                        $_SESSION['msgsuccess'] = "<div class='alert alert-success text-center'><strong>SINAN</strong> : $nDoc - <strong>NOME</strong> : $NM_PACIENT - <strong>ENVIADO PARA IMPRESSÃO COM SUCESSO !!!</strong></div>";
                        header("Location: suvisjt.php?pag=bloqueio-ial&nDoc=$nDoc&impressao=1ªVia&sinan=$agravo_sinan_sql&tabela=$agravo_tabela_sql&buttons=$agravo_buttons&agravo=$agravo_hidden&ial=$agravo_ial");
                    } elseif ($Impressao == '1Via-D') {
                        $conectar->query("UPDATE $agravo_tabela_sql SET Impressao = '2', usuarioLer = '$usuariologin', DataLer = NOW() WHERE nDoc = '$nDoc'");
                        $_SESSION['msgsuccess'] = "<div class='alert alert-success text-center'><strong>SINAN</strong> : $nDoc - <strong>NOME</strong> : $NM_PACIENT - <strong>DESCARTADO COM SUCESSO !!!</strong></div>";
                        header("Location: suvisjt.php?pag=list-bloq-ial&sinan=$agravo_sinan_sql&tabela=$agravo_tabela_sql&buttons=$agravo_buttons&agravo=$agravo_hidden&ial=$agravo_ial");
                    } elseif ($Impressao == '2Via-B') {
                        $_SESSION['msgsuccess'] = "<div class='alert alert-success text-center'><strong>SINAN</strong> : $nDoc - <strong>NOME</strong> : $NM_PACIENT - <strong>ENVIADO PARA IMPRESSÃO COM SUCESSO !!!</strong></div>";
                        header("Location: suvisjt.php?pag=bloqueio-ial&nDoc=$nDoc&impressao=2ªVia&sinan=$agravo_sinan_sql&tabela=$agravo_tabela_sql&buttons=$agravo_buttons&agravo=$agravo_hidden&ial=$agravo_ial");

                        // Caso nenhuma condição seja atendida =========>>>>>>>>>>>>>>>>> Então só me resta =>
                    } elseif ($Impressao == '1Via-R') {
                        $conectar->query("UPDATE $agravo_tabela_sql SET Impressao = '0', usuarioLer = '$usuariologin', DataLer = NOW() WHERE nDoc = '$nDoc'");
                        $_SESSION['msgsuccess'] = "<div class='alert alert-success text-center'><strong>SINAN</strong> : $nDoc - <strong>NOME</strong> : $NM_PACIENT - <strong>REATIVADO COM SUCESSO !!!</strong></div>";
                        header("Location: suvisjt.php?pag=list-bloq-ial&sinan=$agravo_sinan_sql&tabela=$agravo_tabela_sql&buttons=$agravo_buttons&agravo=$agravo_hidden&ial=$agravo_ial");
                    }
                    else {
                        $_SESSION['msgdanger'] = "<div class='alert alert-danger text-center'><strong>SINAN</strong> : $nDoc - <strong>NOME</strong> : $NM_PACIENT - <strong>ERRO NO COMANDO!!!</strong></div>";
                        header("Location: suvisjt.php");

                    }

                }

                ?>

            </form>
        </div>
    </div>
</div>

