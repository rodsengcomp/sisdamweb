<!-- Este projeto é desenvolvido na Suvis Jaçanã-Tremembé com iniciativa dos colaboradores da Unidade -->
<!-- Código desenvolvido por Rodolfo Romaioli Ribeiro de Jesus - rodolfo.romaioli@gmail.com -->
<!-- Sisdam Web - 2.0 - 2017 - Todos os direitos reservados -->
<!-- Morris Charts CSS -->
<!--<link href="css/plugins/morris.css" rel="stylesheet">-->

<?php

// DEFINE O FUSO HORARIO COMO O HORARIO DE BRASILIA
date_default_timezone_set('America/Sao_Paulo');
// CRIA UMA VARIAVEL E ARMAZENA A HORA ATUAL DO FUSO-HORÀRIO DEFINIDO (BRASÍLIA)
//$dataLocal = date('d/m/Y H:i:s', time());

$result_table_febre_a = "SELECT CREATE_TIME FROM information_schema.tables WHERE TABLE_NAME = 'dengnet' ORDER BY `CREATE_TIME` DESC";
$result_febre_a = $conectar->query($result_table_febre_a);
$row_result_febre_a = mysqli_fetch_assoc($result_febre_a);

$result_table_ial_febre_a = "SELECT CREATE_TIME FROM information_schema.tables WHERE TABLE_NAME = 'dengue_ial' ORDER BY `CREATE_TIME` DESC";
$result_ial_febre_a = $conectar->query($result_table_ial_febre_a);
$row_result_ial_febre_a = mysqli_fetch_assoc($result_ial_febre_a);

?>


<div class="container-fluid" role="main" xmlns="http://www.w3.org/1999/html">
    <!-- begin PAGE TITLE ROW -->
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <ol class="breadcrumb">
                    <li><i class="fa fa-database"></i> <a href="suvisjt.php">Sisdam Web</a></li>
                    <li class="active">At. Sinan - <?php echo date("d/m/Y",strtotime($row_result_febre_a['CREATE_TIME'])) ; ?> às
                        <?php echo date("H:i:s",strtotime($row_result_febre_a['CREATE_TIME'])) ; ?></li>
                    <li class="active">At. IAL - <?php echo date("d/m/Y",strtotime($row_result_ial_febre_a['CREATE_TIME'])) ; ?> às
                        <?php echo date("H:i:s",strtotime($row_result_ial_febre_a['CREATE_TIME'])) ; ?></li>
                </ol>
                <button type="button"  class="btn btn-dark btn-labeled btn-lg btn-block" data-toggle="tooltip" title="Lista de Bloqueios 1ª Via" ><span class="btn-label"><i
                                class="glyphicon glyphicon-picture"></i></span>FECHAMENTO - DENGUE
                </button>
                <br>

            </div>
        </div>
    </div>

    <table id="list-rel-dengue" class="table table-hover table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th class="text-center"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>SINAN</th>
            <th class="text-center">NOT.</th>
            <th class="text-center">SE</th>
            <th class="text-center">1º SIN</th>
            <th class="text-center">SE</th>
            <th class="text-center">NOME</th>
            <th class="text-center">DA</th>
            <th class="text-center">DT_NASC</th>
            <th class="text-center">CNS_SUS</th>
            <th class="text-center">NM_MAE_PAC</th>
            <th class="text-center">ENDEREÇO</th>
            <th class="text-center">NUMERO</th>
            <th class="text-center">COMPLEM</th>
            <th class="text-center">UBS_RES</th>
            <th class="text-center">DDD</th>
            <th class="text-center">TEL</th>
            <th class="text-center">ENT</th>
            <th class="text-center">COL</th>
            <th class="text-center">RES</th>
            <th class="text-center">IGM FOCUS</th>
            <th class="text-center">IGM PANBIO</th>
            <th class="text-center">NS1</th>
            <th class="text-center">TR</th>
            <th class="text-center">UN. NOTIF.</th>
            <th class="text-center">OBSERVAÇÕES</th>
            <th class="text-center">BLOQ.</th>
            <th class="text-center">NEB.</th>
            <th class="text-center">CLASS.</th>
            <th class="text-center">CRIT.</th>
            <th class="text-center">DT ENC.</th>
            <th class="text-center">LAT</th>
            <th class="text-center">LONG</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>


