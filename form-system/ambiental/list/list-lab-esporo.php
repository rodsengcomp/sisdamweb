<!-- Este projeto é desenvolvido na Suvis Jaçanã-Tremembé com iniciativa dos colaboradores da Unidade -->
<!-- Código desenvolvido por Rodolfo Romaioli Ribeiro de Jesus - rodolfo.romaioli@gmail.com -->
<!-- Sisdam Web - 2.0 - 2017 - Todos os direitos reservados -->

<?php

//Algumas funções da tabela
include_once 'functions.php';
//Todos os chamamentos javascript e códigos de modal's
include_once 'modals-ambiental.php';

// DEFINE O FUSO HORARIO COMO O HORARIO DE BRASILIA
date_default_timezone_set('America/Sao_Paulo');

?>

<div class="container-fluid" role="main" xmlns="http://www.w3.org/1999/html">

    <?php
    // DEFINE O FUSO HORARIO COMO O HORARIO DE BRASILIA
    date_default_timezone_set('America/Sao_Paulo');
    // CRIA UMA VARIAVEL E ARMAZENA A HORA ATUAL DO FUSO-HORÀRIO DEFINIDO (BRASÍLIA)
    //$dataLocal = date('d/m/Y H:i:s', time());

    $result_table_lab_ial = "SELECT CREATE_TIME FROM information_schema.tables WHERE TABLE_NAME = 'resultado_esporo' ORDER BY `CREATE_TIME` DESC";
    $result_lab_ial = $conectar->query($result_table_lab_ial);
    $row_result_lab_ial = mysqli_fetch_assoc($result_lab_ial);

    ?>

    <!-- begin PAGE TITLE ROW -->
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <ol class="breadcrumb">
                    <li><i class="fa fa-database"></i> <a href="suvisjt.php">Sisdam Web</a></li>
                    <li class="active">At. CCZ - <?php echo date("d/m/Y",strtotime($row_result_lab_ial['CREATE_TIME'])) ; ?> às
                        <?php echo date("H:i:s",strtotime($row_result_lab_ial['CREATE_TIME'])) ; ?></li>
                </ol>
                <button type="button" class="btn btn-danger btn-labeled btn-lg btn-block"><span class="btn-label"><i
                    class="glyphicon glyphicon-list"></i></span> CCZ ESPORO - <?php echo $today = date("Y");   ?></button>
            </div>
        </div>
    </div>
    <!-- /.row -->

    <table id="list-ial-esporo" class="table table-hover table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th class="text-center">Nº PEDIDO</th>
            <th class="text-center">DT. PEDIDO</th>
            <th class="text-center">SEQ. PROC</th>
            <th class="text-center">SOLICITANTE</th>
            <th class="text-center">DISTRITO</th>
            <th class="text-center">SUVIS</th>
            <th class="text-center">SINAN</th>
            <th class="text-center">NOME</th>
            <th class="text-center">ESPECIE</th>
            <th class="text-center">NOME PROP.</th>
            <th class="text-center">ENDERECO</th>
            <th class="text-center">NUM.</th>
            <th class="text-center">BAIRRO</th>
            <th class="text-center">CEP</th>
            <th class="text-center">RESULTADO</th>
            <th class="text-center">1ª IDENT.</th>
            <th class="text-center">2ª IDENT.</th>
            <th class="text-center">LIBERADO EM</th>
        </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</div>