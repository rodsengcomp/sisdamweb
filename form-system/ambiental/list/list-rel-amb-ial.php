<!-- Este projeto é desenvolvido na Suvis Jaçanã-Tremembé com iniciativa dos colaboradores da Unidade -->
<!-- Código desenvolvido por Rodolfo Romaioli Ribeiro de Jesus - rodolfo.romaioli@gmail.com -->
<!-- Sisdam Web - 2.0 - 2017 - Todos os direitos reservados -->
<!-- Morris Charts CSS -->
<!--<link href="css/plugins/morris.css" rel="stylesheet">-->

<!--<script>$(document).ready(function(){$('#modal-manutencao').modal('show');});</script>-->
<!-- Inicio Modal Login-->
<div class="modal fade" id="modal-manutencao" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header-del">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center" id="myModalLabel">SisdamJT Web</h4>
            </div>

            <div class="modal-body"><div class="row"><div class="text-center">
                        <img id="logo-img" class="img-responsive center-block" alt="Responsive image" src="imagens/construcao.jpg"/>
                        <h4>Página </h4><h4>em Manutenção</h4>
                        <button type="button" class="btn btn-success" data-dismiss="modal">OK</button>
                    </div></div></div>

        </div></div>
</div>
<?php

// DEFINE O FUSO HORARIO COMO O HORARIO DE BRASILIA
date_default_timezone_set('America/Sao_Paulo');
// CRIA UMA VARIAVEL E ARMAZENA A HORA ATUAL DO FUSO-HORÀRIO DEFINIDO (BRASÍLIA)
//$dataLocal = date('d/m/Y H:i:s', time());

$table_sql = $_GET['tabela'];
$table_sinan = $_GET['sinan'];
$table_ccz = $_GET['ccz'];
$agravo_buttons = $_GET['buttons'];
$agravo_hidden = $_GET['agravo'];
$table_ial = $_GET['ial'];

include_once 'functions.php';
include_once 'sql-relatorio-ial.php';

$result_table_ial = "SELECT CREATE_TIME FROM information_schema.tables WHERE TABLE_NAME = '$agravo_hidden' ORDER BY `CREATE_TIME` DESC";
$result_ial = $conectar->query($result_table_ial);
$row_result_ial = mysqli_fetch_assoc($result_ial);

?>

<div class="container-fluid" role="main" xmlns="http://www.w3.org/1999/html">

    <div class="row" style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
        echo 'display: none;';
    } ?>">
        <div class="col-md-12">
            <div class="page-header">
            <ul id="userTab" class="nav nav-tabs">
                <li role="presentation" class="active"><a href="#resumo" data-toggle="tab">RESUMO</a></li>
                <li role="presentation"><a href="#resumoiara" data-toggle="tab">RESUMO IARA</a></li>
                <li role="presentation"><a href="#lista" data-toggle="tab">LISTA</a></li>
                <li role="presentation"><a href="#mapa" data-toggle="tab">MAPA</a></li>
            </ul>

                <button type="button"  class="btn btn-success btn-labeled btn-lg btn-block" data-toggle="tooltip" title="Relatórios Dengue" ><span class="btn-label"><i
                            class="glyphicon glyphicon-picture"></i></span>RELATÓRIOS - <?php echo $agravo_hidden ;?></button>
            </div>

            <div class="tab-content">
                <div class="tab-pane fade in active" id="resumo">

                    <table id="rel-dengue" class="table table-hover table-striped table-bordered" cellspacing="0" style="width: 100%">
                        <thead>
                        <tr>
                            <th style="font-weight: bold;background-color: #0d6aad;color: white">UNIDADES<br> DE SAÚDE</th>
                            <th class="text-center" style="font-weight: bold;background-color: #0d6aad;color: white" >UBS<br> RES.</th>
                            <th class="text-center" style="font-weight: bold;background-color: #0d6aad;color: white">UN.<br> NOT.</th>
                            <th class="text-center" style="font-weight: bold;background-color: #e0a800;color: white">SEM <br>COLETA</th>
                            <th class="text-center" style="font-weight: bold;background-color: #e0a800;color: white">COL.<br> INA. </th>
                            <th class="text-center" style="font-weight: bold;background-color: #e0a800;color: white">INCO<br> NC. </th>
                            <th class="text-center" style="font-weight: bold;background-color: #b52b27;color: white">REAG.<br>(IGM)</th>
                            <th class="text-center" style="font-weight: bold;background-color: #b52b27;color: white">REAG.<br>(PCR)</th>
                            <th class="text-center" style="font-weight: bold;background-color: #4cae4c;color: white">NÃO R.<br>(IGM)</th>
                            <th class="text-center" style="font-weight: bold;background-color: #4cae4c;color: white">NÃO R.<br>(PCR)</th>
                            <th class="text-center" style="font-weight: bold;background-color: #0d6aad;color: white">RESUMO<br> GERAL</th>
                        </tr>

                        </thead>
                        <tbody>
                        <tr>
                            <td style="font-weight: bold">ALBERTINA </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($ubs_res_albertina) as $row) {echo $row[$count_ndoc];}?> </td> <!--  -->
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($un_not_albertina) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($sem_col_ubs_albertina) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($col_ina_ubs_albertina) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($inco_ubs_albertina) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($igm_pos_ubs_albertina) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($ns1_pos_ubs_albertina) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($igm_neg_ubs_albertina) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($ns1_neg_ubs_albertina) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold" data-toggle="tooltip" data-placement="left" title="Notificados DA:38"> NOT. 38 :
                                <?php foreach($conectar->query($not_38_total) as $row) {echo $row[$count_ndoc];};?></td>
                        </tr>

                        <tr>
                            <td style="font-weight: bold">APUANÃ </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($ubs_res_apuana) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($un_not_apuana) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($sem_col_ubs_apuana) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($col_ina_ubs_apuana) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($inco_ubs_apuana) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($igm_pos_ubs_apuana) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($ns1_pos_ubs_apuana) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($igm_neg_ubs_apuana) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($ns1_neg_ubs_apuana) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold" data-toggle="tooltip" data-placement="left" title="Notificados DA:83"> NOT. 83 :
                                <?php foreach($conectar->query($not_83_total) as $row) {echo $row[$count_ndoc];};?></td>
                        </tr>

                        <tr>
                            <td style="font-weight: bold">E. CHAVES </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($ubs_res_edu) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($un_not_edu) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($sem_col_ubs_edu) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($col_ina_ubs_edu) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($inco_ubs_edu) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($igm_pos_ubs_edu) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($ns1_pos_ubs_edu) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($igm_neg_ubs_edu) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($ns1_neg_ubs_edu) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold;background-color: #4cae4c;color: white" data-toggle="tooltip" data-placement="left" title="Incidência DA:38"> INC. 38 :
                                <?php foreach($conectar->query($pos_38_total) as $row){echo substr($row[$count_ndoc]*100000/94609,0,4);};?></td>
                        </tr>

                        <tr>
                            <td style="font-weight: bold">F. DE MAIO </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($ubs_res_flor) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($un_not_flor) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($sem_col_ubs_flor) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($col_ina_ubs_flor) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($inco_ubs_flor) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($igm_pos_ubs_flor) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($ns1_pos_ubs_flor) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($igm_neg_ubs_flor) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($ns1_neg_ubs_flor) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold;background-color: #4cae4c;color: white" data-toggle="tooltip" data-placement="left" title="Incidência DA:83"> INC. 83 :
                                <?php foreach($conectar->query($pos_83_total) as $row) {echo substr($row[$count_ndoc]*100000/197258,0,4);};?></td>
                        </tr>

                        <tr>
                            <td style="font-weight: bold">FONTALIS </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($ubs_res_fontalis) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($un_not_fontalis) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($sem_col_ubs_fontalis) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($col_ina_ubs_fontalis) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($inco_ubs_fontalis) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($igm_pos_ubs_fontalis) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($ns1_pos_ubs_fontalis) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($igm_neg_ubs_fontalis) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($ns1_neg_ubs_fontalis) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold;background-color: #b52b27;color: white" data-toggle="tooltip" data-placement="left" title="Reagentes DA:38"> REAG 38 :
                                <?php foreach($conectar->query($pos_38_total) as $row) {echo $row[$count_ndoc];}?></td>
                        </tr>

                        <tr>
                            <td style="font-weight: bold">GALVÃO </td>
                            <td class="text-center" style="font-weight: bold">  <?php foreach($conectar->query($ubs_res_galvao) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($un_not_galvao) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($sem_col_ubs_galvao) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($col_ina_ubs_galvao) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($inco_ubs_galvao) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($igm_pos_ubs_galvao) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($ns1_pos_ubs_galvao) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($igm_neg_ubs_galvao) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($ns1_neg_ubs_galvao) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold;background-color: #b52b27;color: white" data-toggle="tooltip" data-placement="left" title="Reagentes DA:83"> REAG 83 :
                                <?php foreach($conectar->query($pos_83_total) as $row) {echo $row[$count_ndoc];}?></td>
                        </tr>

                        <tr>
                            <td style="font-weight: bold">J. JOAMAR </td>
                            <td class="text-center" style="font-weight: bold">  <?php foreach($conectar->query($ubs_res_joamar) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($un_not_joamar) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($sem_col_ubs_joamar) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($col_ina_ubs_joamar) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($inco_ubs_joamar) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($igm_pos_ubs_joamar) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($ns1_pos_ubs_joamar) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($igm_neg_ubs_joamar) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($ns1_neg_ubs_joamar) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold;background-color: #4cae4c;color: white" data-toggle="tooltip" data-placement="left" title="Não Reagentes DA:38"> N R 38 :
                                <?php foreach($conectar->query($neg_38_total) as $row) {echo $row[$count_ndoc];}?></td>
                        </tr>

                        <tr>
                            <td style="font-weight: bold">J. PEDRAS </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($ubs_res_pedras) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($un_not_pedras) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($sem_col_ubs_pedras) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($col_ina_ubs_pedras) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($inco_ubs_pedras) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($igm_pos_ubs_pedras) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($ns1_pos_ubs_pedras) as $row) {echo $row[$count_ndoc];}?> </td>
                             <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($igm_neg_ubs_pedras) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($ns1_neg_ubs_pedras) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold;background-color: #4cae4c;color: white" data-toggle="tooltip" data-placement="left" title="Não Reagentes DA:83"> N R 83 :
                                <?php foreach($conectar->query($neg_83_total) as $row) {echo $row[$count_ndoc];}?></td>
                        </tr>

                        <tr>
                            <td style="font-weight: bold">JAÇANÃ </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($ubs_res_jacana) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($un_not_jacana) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($sem_col_ubs_jacana) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($col_ina_ubs_jacana) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($inco_ubs_jacana) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($igm_pos_ubs_jacana) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($ns1_pos_ubs_jacana) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($igm_neg_ubs_jacana) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($ns1_neg_ubs_jacana) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold;background-color: #e0a800;color: white" data-toggle="tooltip" data-placement="left" title="Notificados sem coleta"> S.COL. :
                                <?php foreach($conectar->query($sem_col_total) as $row) {echo $row[$count_ndoc];}?></td>
                        </tr>

                        <tr>
                            <td style="font-weight: bold">MARIQUINHA </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($ubs_res_mariquinha) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($un_not_mariquinha) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($sem_col_ubs_mariquinha) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($col_ina_ubs_mariquinha) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($inco_ubs_mariquinha) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($igm_pos_ubs_mariquinha) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($ns1_pos_ubs_mariquinha) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($igm_neg_ubs_mariquinha) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($ns1_neg_ubs_mariquinha) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold;background-color: #e0a800;color: white" data-toggle="tooltip" data-placement="left" title="Exames Inconclusivos">INCON. :
                                <?php foreach($conectar->query($inco_total) as $row) {echo $row[$count_ndoc];}?></td>
                        </tr>

                        <tr>
                            <td style="font-weight: bold">TOLEDO P. </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($ubs_res_toledo) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($un_not_toledo) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($sem_col_ubs_toledo) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($col_ina_ubs_toledo) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($inco_ubs_toledo) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($igm_pos_ubs_toledo) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($ns1_pos_ubs_toledo) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($igm_neg_ubs_toledo) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($ns1_neg_ubs_toledo) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold" data-toggle="tooltip" data-placement="left" title="Notificados AMA J. JOAMAR"> N A.J. :
                                <?php foreach($conectar->query($un_not_ama_joamar) as $row) {echo $row[$count_ndoc];}?> </td>
                        </tr>

                        <tr>
                            <td style="font-weight: bold;background-color: #0d6aad;color: white">TOTAL </td>
                            <td class="text-center" style="font-weight: bold;background-color: #9d9d9d;color: black"> <?php foreach($conectar->query($un_res_total) as $row) {echo $row[$count_ndoc];}?></td>
                            <td class="text-center" style="font-weight: bold;background-color: #9d9d9d;color: black"> <?php foreach($conectar->query($un_not_total) as $row) {echo $row[$count_ndoc];}?></td>
                            <td class="text-center" style="font-weight: bold;background-color: #9d9d9d;color: black"> <?php foreach($conectar->query($sem_col_total) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold;background-color: #9d9d9d;color: black"> <?php foreach($conectar->query($col_ina_total) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold;background-color: #9d9d9d;color: black"> <?php foreach($conectar->query($inco_total) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold;background-color: #9d9d9d;color: black"> <?php foreach($conectar->query($igm_pos_total) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold;background-color: #9d9d9d;color: black"> <?php foreach($conectar->query($ns1_pos_total) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold;background-color: #9d9d9d;color: black"> <?php foreach($conectar->query($igm_neg_total) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold;background-color: #9d9d9d;color: black"> <?php foreach($conectar->query($ns1_neg_total) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold" data-toggle="tooltip" data-placement="left" title="Notificados São Luiz Gonzaga"> N GON : <?php foreach($conectar->query($un_not_gonzaga) as $row) {echo $row[$count_ndoc];}?> </td>
                        </tr>
                        </tbody>
                    </table>
                 </div>

                <div class="tab-pane fade" id="resumoiara">

                    <table id="rel-dengue-iara" class="table table-hover table-striped table-bordered" cellspacing="0" style="width: 100%">
                        <thead>
                        <tr>
                            <th style="font-weight: bold;background-color: #0d6aad;color: white">UNIDADES DE SAÚDE</th>
                            <th class="text-center" style="font-weight: bold;background-color: #0d6aad;color: white" >UBS DE RESIDÊNCIA</th>
                            <th class="text-center" style="font-weight: bold;background-color: #0d6aad;color: white">UNIDADE NOTIFICANTE</th>
                            <th class="text-center" style="font-weight: bold;background-color: #e0a800;color: white">EXAMES SEM COLETA</th>
                            <th class="text-center" style="font-weight: bold;background-color: #b52b27;color: white">EXAMES REAGENTES</th>
                        </tr>

                        </thead>
                        <tbody>
                        <tr>
                            <td style="font-weight: bold">UBS VILA ALBERTINA </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($ubs_res_albertina) as $row) {echo $row[$count_ndoc];}?> </td> <!--  -->
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($un_not_albertina) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($sem_col_ubs_albertina) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($reag_ubs_albertina) as $row) {echo $row[$count_ndoc];}?> </td>
                        </tr>

                        <tr>
                            <td style="font-weight: bold">UBS APUANÃ </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($ubs_res_apuana) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($un_not_apuana) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($sem_col_ubs_apuana) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($reag_ubs_apuana) as $row) {echo $row[$count_ndoc];}?> </td>
                        </tr>

                        <tr>
                            <td style="font-weight: bold">UBS EDU CHAVES </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($ubs_res_edu) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($un_not_edu) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($sem_col_ubs_edu) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($reag_ubs_edu) as $row) {echo $row[$count_ndoc];}?> </td>
                        </tr>

                        <tr>
                            <td style="font-weight: bold">UBS FLOR DE MAIO </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($ubs_res_flor) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($un_not_flor) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($sem_col_ubs_flor) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($reag_ubs_flor) as $row) {echo $row[$count_ndoc];}?> </td>
                        </tr>

                        <tr>
                            <td style="font-weight: bold">UBS JARDIM FONTALIS </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($ubs_res_fontalis) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($un_not_fontalis) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($sem_col_ubs_fontalis) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($reag_ubs_fontalis) as $row) {echo $row[$count_ndoc];}?> </td>
                        </tr>

                        <tr>
                            <td style="font-weight: bold">UBS VILA NOVA GALVÃO </td>
                            <td class="text-center" style="font-weight: bold">  <?php foreach($conectar->query($ubs_res_galvao) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($un_not_galvao) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($sem_col_ubs_galvao) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($reag_ubs_galvao) as $row) {echo $row[$count_ndoc];}?> </td>
                        </tr>

                        <tr>
                            <td style="font-weight: bold">UBS JARDIM JOAMAR </td>
                            <td class="text-center" style="font-weight: bold">  <?php foreach($conectar->query($ubs_res_joamar) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($un_not_joamar) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($sem_col_ubs_joamar) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($reag_ubs_joamar) as $row) {echo $row[$count_ndoc];}?> </td>
                        </tr>

                        <tr>
                            <td style="font-weight: bold">UBS JARDIM DAS PEDRAS </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($ubs_res_pedras) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($un_not_pedras) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($sem_col_ubs_pedras) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($reag_ubs_pedras) as $row) {echo $row[$count_ndoc];}?> </td>
                        </tr>

                        <tr>
                            <td style="font-weight: bold">UBS JAÇANÃ </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($ubs_res_jacana) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($un_not_jacana) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($sem_col_ubs_jacana) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($reag_ubs_jacana) as $row) {echo $row[$count_ndoc];}?> </td>
                        </tr>

                        <tr>
                            <td style="font-weight: bold">UBS MARIQUINHA </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($ubs_res_mariquinha) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($un_not_mariquinha) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($sem_col_ubs_mariquinha) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($reag_ubs_mariquinha) as $row) {echo $row[$count_ndoc];}?> </td>
                        </tr>

                        <tr>
                            <td style="font-weight: bold">UBS TOLEDO PIZA </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($ubs_res_toledo) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($un_not_toledo) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($sem_col_ubs_toledo) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold"> <?php foreach($conectar->query($reag_ubs_toledo) as $row) {echo $row[$count_ndoc];}?> </td>
                        </tr>

                        <tr>
                            <td style="font-weight: bold;background-color: #0d6aad;color: white">TOTAL </td>
                            <td class="text-center" style="font-weight: bold;background-color: #9d9d9d;color: black"> <?php foreach($conectar->query($un_res_total) as $row) {echo $row[$count_ndoc];}?></td>
                            <td class="text-center" style="font-weight: bold;background-color: #9d9d9d;color: black"> <?php foreach($conectar->query($un_not_total) as $row) {echo $row[$count_ndoc];}?></td>
                            <td class="text-center" style="font-weight: bold;background-color: #9d9d9d;color: black"> <?php foreach($conectar->query($sem_col_total) as $row) {echo $row[$count_ndoc];}?> </td>
                            <td class="text-center" style="font-weight: bold;background-color: #9d9d9d;color: black"> <?php foreach($conectar->query($reag_total) as $row) {echo $row[$count_ndoc];}?> </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

            <div class="tab-pane fade" id="lista">

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
                        <th class="text-center">COL</th>
                        <th class="text-center">RES</th>
                        <th class="text-center">IGM</th>
                        <th class="text-center">NS1</th>
                        <th class="text-center">TR</th>
                        <th class="text-center">UN. NOTIF.</th>
                        <th class="text-center">OBSERVAÇÕES</th>
                        <th class="text-center">BLOQ.</th>
                        <th class="text-center">NEB.</th>
                        <th class="text-center">CLASS.</th>
                        <th class="text-center">CRIT.</th>
                        <th class="text-center">DT ENC.</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                </div>

                <div class="tab-pane fade" id="mapa">
                    <div class="row">
                        <div class="col-sm-12">
                           <div class="row" style="padding:15px;">
                                <div class="col-md-12">
                                    <div id="mapial"></div>

                                    <script>
                                        var iconBase = 'imagens/icons/';
                                        var icons = {
                                            Dengue: {
                                                icon: iconBase + 'mosquito.png'
                                            },
                                            Chikungunya: {
                                                icon: iconBase + 'mosquito.png'
                                            }
                                        };

                                        function initMap() {
                                            var map = new google.maps.Map(document.getElementById('mapial'), {
                                                center: new google.maps.LatLng(-23.457019, -46.584551),
                                                zoom: 15
                                            });
                                            var infoWindow = new google.maps.InfoWindow;

                                            // Altere isso dependendo do nome do seu arquivo PHP ou XML
                                            downloadUrl('form-system/ambiental/maps/proc-maps-ambiental/proc-maps-ial.php', function(data) {
                                                var xml = data.responseXML;
                                                var markers = xml.documentElement.getElementsByTagName('marker');
                                                Array.prototype.forEach.call(markers, function(markerElem) {
                                                    var name = markerElem.getAttribute('name');
                                                    var address = markerElem.getAttribute('address');
                                                    var type = markerElem.getAttribute('type');
                                                    var point = new google.maps.LatLng(
                                                        parseFloat(markerElem.getAttribute('lat')),
                                                        parseFloat(markerElem.getAttribute('lng')));

                                                    var infowincontent = document.createElement('div');
                                                    var strong = document.createElement('strong');
                                                    strong.textContent = name
                                                    infowincontent.appendChild(strong);
                                                    infowincontent.appendChild(document.createElement('br'));

                                                    var text = document.createElement('text');
                                                    text.textContent = address
                                                    infowincontent.appendChild(text);
                                                    var marker = new google.maps.Marker({
                                                        map: map,
                                                        position: point,
                                                        icon: icons[type].icon
                                                    });
                                                    marker.addListener('click', function() {
                                                        infoWindow.setContent(infowincontent);
                                                        infoWindow.open(map, marker);
                                                    });
                                                });
                                            });
                                        }



                                        function downloadUrl(url, callback) {
                                            var request = window.ActiveXObject ?
                                                new ActiveXObject('Microsoft.XMLHTTP') :
                                                new XMLHttpRequest;

                                            request.onreadystatechange = function() {
                                                if (request.readyState == 4) {
                                                    request.onreadystatechange = doNothing;
                                                    callback(request, request.status);
                                                }
                                            };

                                            request.open('GET', url, true);
                                            request.send(null);
                                        }

                                        function doNothing() {}
                                    </script>
                                    <script async defer
                                            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAhlslumr1saHPVEJHkzPssYLEsWZJQQKU&callback=initMap">
                                    </script>

                                </div>
                            </div>

                            <script async defer
                                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAhlslumr1saHPVEJHkzPssYLEsWZJQQKU&callback=initMap">
                            </script>

                                <style>
                                    #mapdengue {
                                        height: 570px;
                                        margin-left: -15px;
                                        margin-right: -15px;
                                    }
                                </style>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!--row-->
</div>

