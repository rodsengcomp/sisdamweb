<!-- Este projeto é desenvolvido na Suvis Jaçanã-Tremembé com iniciativa dos colaboradores da Unidade -->
<!-- Código desenvolvido por Rodolfo Romaioli Ribeiro de Jesus - rodolfo.romaioli@gmail.com -->
<!-- Sisdam Web - 2.0 - 2017 - Todos os direitos reservados -->
<!-- Página de Título -->

<?php

//Algumas funções da tabela
include_once 'functions.php';
//Todos os chamamentos javascript e códigos de modal's
include_once 'modals-ambiental.php';

// DEFINE O FUSO HORARIO COMO O HORARIO DE BRASILIA
date_default_timezone_set('America/Sao_Paulo');

?>

<!-- Função para reload  -->
<script> function FunctionReload() {
        window.location.replace("http://10.47.171.110/sisdamweb/suvisjt.php?pag=list-bloq-ial&sinan=<?php echo $agravo_sinan_sql;?>&tabela=<?php echo $agravo_tabela_sql;?>&ial=<?php echo $agravo_ial;?>&buttons=<?php echo $agravo_buttons;?>&agravo=<?php echo $agravo;?>");
    } </script>

<!-- Início do HTML 5 da Página-->
<div class="container-fluid" role="main" xmlns="http://www.w3.org/1999/html">
    <!-- Começando a página de Título -->
    <div class="row">
        <div class="col-md-12"><div class="page-header">
                <ol class="breadcrumb">
                    <li><i class="fa fa-database"></i> <a href="suvisjt.php">Sisdam Web</a></li>
                    <li class="active">Lista de Esporotricose Animal</li>
                </ol>
                <button type="button"  data-toggle="tooltip" title="Lista de Casos de Esporotricose Animal - JT" class="btn btn-dark btn-labeled btn-lg btn-block"><i class="btn-label"><i
                                class="glyphicon glyphicon-picture"></i></i>LISTA DE ESPOROTRICOSE ANIMAL - JT</button>

                <!--<img id="logo-img" class="img-responsive center-block" alt="Responsive image" src="imagens/manutencao-desculpe.jpg"/>-->

            </div>
            <?php
            if (isset($_SESSION['msgsuccess'])) {echo $_SESSION['msgsuccess'];unset($_SESSION['msgsuccess']);} /*Mensagem Teste Rapido Reagente*/
            if (isset($_SESSION['msgdanger'])) {echo $_SESSION['msgdanger'];unset($_SESSION['msgdanger']);} /**/
            if (isset($_SESSION['msgwarning'])) {echo $_SESSION['msgwarning'];unset($_SESSION['msgwarning']);} /* Mensagem Teste Rapido Não Reagente*/
            if (isset($_SESSION['msgerro'])) {echo $_SESSION['msgerro'];unset($_SESSION['msgerro']);} /**/
            if (isset($_SESSION['msgedit'])) {echo $_SESSION['msgedit'];unset($_SESSION['msgedit']);}
            if (isset($_SESSION['msgerroredit'])) {echo $_SESSION['msgerroredit'];unset($_SESSION['msgerroredit']);}
            ?>
        </div>
    </div>

    <div class="row espaco">
        <div class="text-center">
            <a href='suvisjt.php?pag=cad-espo-animal'
            <button type='button' style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                echo 'display: none;';
            } ?>" accesskey="N" data-toggle="tooltip" title="Lista de Casos de Esporotricose Animal - JT"
                    class="btn btn-success"><i class="glyphicon glyphicon-plus-sign"></i> <u>N</u>OVO</button>
            </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </div>
    </div>
    <!-- Terminando a página de Título -->

    <!--------------------------------------------- * Tabela de Bloqueios * --------------------------------------->
    <table id="list-esporo" class="table table-hover table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th class="text-center">NVE</th>
            <th class="text-center">ANO</th>
            <th class="text-center"><i class="fal fa-thin fa-calendar"></i> INÍCIO</th>
            <th class="text-center"><i class="fal fa-light fa-cat"></i> / <i class="fal fa-light fa-dog"></i> ANIMAL</th>
            <th class="text-center">ESPECIE</th>
            <th class="text-center"><i class="fal fa-light fa-map-pin"></i> ENDEREÇO</th>
            <th class="text-center">PROPRIETÁRIO</th>
            <th class="text-center"><i class="fal fa-light fa-phone"></i> TELEFONE</th>
            <th class="text-center"><i class="fal fa-question"></i> SITUAÇÃO</th>
            <th class="text-center"><i class="fal fa-light fa-briefcase-medical"></i> MEDICAMENTO</th>
            <th class="text-center"><i class="fal fa-thin fa-calendar"></i> ÚLTIMA</th>
            <th class="text-center"><i class="fal fa-tablets" aria-hidden="true"></i> JAN</th>
            <th class="text-center"><i class="fal fa-tablets" aria-hidden="true"></i> FEV</th>
            <th class="text-center"><i class="fal fa-tablets" aria-hidden="true"></i> MAR</th>
            <th class="text-center"><i class="fal fa-tablets" aria-hidden="true"></i> ABR</th>
            <th class="text-center"><i class="fal fa-tablets" aria-hidden="true"></i> MAI</th>
            <th class="text-center"><i class="fal fa-tablets" aria-hidden="true"></i> JUN</th>
            <th class="text-center"><i class="fal fa-tablets" aria-hidden="true"></i> JUL</th>
            <th class="text-center"><i class="fal fa-tablets" aria-hidden="true"></i> AGO</th>
            <th class="text-center"><i class="fal fa-tablets" aria-hidden="true"></i> SET</th>
            <th class="text-center"><i class="fal fa-tablets" aria-hidden="true"></i> OUT</th>
            <th class="text-center"><i class="fal fa-tablets" aria-hidden="true"></i> NOV</th>
            <th class="text-center"><i class="fal fa-tablets" aria-hidden="true"></i> DEZ</th>
            <th class="text-center"><i class="fal fa-exclamation"></i> OBSERVAÇÃO</th>
        </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
    <!--------------------------------------------- * Fim da Tabela de Bloqueios * --------------------------------------->

</div>


