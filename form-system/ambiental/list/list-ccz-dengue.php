<!-- Este projeto é desenvolvido na Suvis Jaçanã-Tremembé com iniciativa dos colaboradores da Unidade -->
<!-- Código desenvolvido por Rodolfo Romaioli Ribeiro de Jesus - rodolfo.romaioli@gmail.com -->
<!-- Sisdam Web - 2.0 - 2017 - Todos os direitos reservados -->

<?php
include_once 'functions.php';
include_once 'modals-ambiental.php';

$result_table_dengue = "SELECT CREATE_TIME FROM information_schema.tables WHERE TABLE_NAME = 'dengnet' ORDER BY `CREATE_TIME` DESC";
$result_dengue = $conectar->query($result_table_dengue);
$row_result_dengue = mysqli_fetch_assoc($result_dengue);

$result_table_ccz_dengue = "SELECT CREATE_TIME FROM information_schema.tables WHERE TABLE_NAME = 'resultado_ccz' ORDER BY `CREATE_TIME` DESC";
$result_ccz_dengue = $conectar->query($result_table_ccz_dengue);
$row_result_ccz_dengue = mysqli_fetch_assoc($result_ccz_dengue);
?>

<div class="container-fluid" role="main" xmlns="http://www.w3.org/1999/html">
    <!-- begin PAGE TITLE ROW -->
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <ol class="breadcrumb">
                    <li class="active">At. Dengue - <?php echo date("d/m/Y",strtotime($row_result_dengue['CREATE_TIME'])) ; ?> às
                        <?php echo date("H:i:s",strtotime($row_result_dengue['CREATE_TIME'])) ; ?></li>
                    <li class="active">At. CCZ Dengue - <?php echo date("d/m/Y",strtotime($row_result_ccz_dengue['CREATE_TIME'])) ; ?> às
                        <?php echo date("H:i:s",strtotime($row_result_ccz_dengue['CREATE_TIME'])) ; ?></li>
                </ol>
                <button type="button" class="btn btn-dark btn-labeled btn-lg btn-block"><span class="btn-label"><i
                                class="glyphicon glyphicon-list"></i></span>LISTA - CCZ - DENGUE <?php echo $today = date("Y");   ?></button>
            </div>
        </div>
    </div>
    <!-- /.row -->

    <table id="list-ccz-dengue" class="table table-hover table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th class="text-center">SINAN</th>
            <th class="text-center">IGM-FOC</th>
            <th class="text-center">IGM-PAN</th>
            <th class="text-center">NS1</th>
            <th class="text-center">1°ST</th>
            <th class="text-center">NOME</th>
            <th class="text-center">END</th>
            <th class="text-center">COLETA</th>
            <th class="text-center">RES</th>
            <th class="text-center">ENT</th>
            <th class="text-center">OBS</th>
        </tr>
        </thead>

        <tbody>

        </tbody>
    </table>
</div>

