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
        window.location.replace("http://10.47.171.110/sisdamweb/suvisjt.php?pag=list-bloq-<?php echo $agravo_buttons;?>&sinan=<?php echo $agravo_sinan_sql;?>&agravo=<?php echo $agravo;?>&tabela=<?php echo $agravo_tabela_sql;?>&ial=<?php echo $agravo_ial;?>&buttons=<?php echo $agravo_buttons;?>");
    } </script>

<?php

$result_table_dengue = "SELECT CREATE_TIME FROM information_schema.tables WHERE TABLE_NAME = '$agravo_sinan_sql' ORDER BY `CREATE_TIME` DESC";
$result_dengue = $conectar->query($result_table_dengue);
$row_result_dengue = mysqli_fetch_assoc($result_dengue);

$result_table_ccz_dengue = "SELECT CREATE_TIME FROM information_schema.tables WHERE TABLE_NAME = 'resultado_ccz' ORDER BY `CREATE_TIME` DESC";
$result_ccz_dengue = $conectar->query($result_table_ccz_dengue);
$row_result_ccz_dengue = mysqli_fetch_assoc($result_ccz_dengue);

$sql_button_at_end = $conectar->query("SELECT $agravo_sinan_sql.NU_NOTIFIC, $agravo_sinan_sql.ID_DISTRIT
FROM $agravo_sinan_sql LEFT JOIN $agravo_tabela_sql ON $agravo_sinan_sql.NU_NOTIFIC = $agravo_tabela_sql.nDoc
WHERE ((($agravo_sinan_sql.ID_DISTRIT)=\"70\") AND (($agravo_tabela_sql.nDoc) Is Null))");

// FROM $agravo_sinan_sql LEFT JOIN sv2 ON $agravo_sinan_sql.NU_NOTIFIC = sv2.sinan
// WHERE ((($agravo_sinan_sql.ID_DISTRIT)=\"70\") AND ((sv2.sinan) Is Null))");

// if($sql_modal_at_end->num_rows > 0){
//<script>$(document).ready(function(){$('#myModal').modal('show');});</script>
?>

<div class="container-fluid" role="main" xmlns="http://www.w3.org/1999/html">
    <!-- begin PAGE TITLE ROW -->
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <ol class="breadcrumb">
                    <li><i class="fa fa-database"></i> <a href="suvisjt.php">Sisdam Web</a></li>
                    <li class="active">Casos de Dengue</li>
                    <li class="active">Sinan At. em - <?php echo date("d/m/Y",strtotime($row_result_dengue['CREATE_TIME'])) ; ?> às
                        <?php echo date("H:i:s",strtotime($row_result_dengue['CREATE_TIME'])) ; ?></li>
                    <li class="active">Resultados : Positivos <a data-toggle="tooltip" data-placement="bottom" title="Mapa dos Casos Positivos" href="suvisjt.php?pag=mapa-dengue-positivo" role="button" class="btn btn-danger rounded-circle">
                        <?php foreach($conectar->query($pos_den_total) as $row) {echo $row[$count_ndoc_dengue];}?></a>
                    <li class="active">Sem Coleta <span role="button" class="btn btn-warning rounded-circle">
                        <?php foreach($conectar->query($sem_col_den_total) as $row) {echo $row[$count_ndoc_dengue];}?></span>
                    <li class="active">Negativos <span role="button" class="btn btn-success rounded-circle">
                        <?php foreach($conectar->query($neg_den_total) as $row) {echo $row[$count_ndoc_dengue];}?></span>
                    <li class="active">Inconclusivos <span role="button" class="btn btn-default rounded-circle">
                         <?php foreach($conectar->query($inco_den_total) as $row) {echo $row[$count_ndoc_dengue];}?></span>
                </ol>
                <button type="button"  class="btn btn-dark btn-labeled btn-lg btn-block" data-toggle="tooltip" title="Lista de Bloqueios 1ª Via" ><span class="btn-label"><i
                    class="glyphicon glyphicon-picture"></i></span>BLOQUEIOS - DENGUE
                </button>
<br>
                <div class="alert alert-danger text-center" style="<?php if($sql_button_at_end->num_rows < 1) {echo 'display: none;';} ?>" role="alert"><i class="glyphicon glyphicon-exclamation-sign"></i>
                    <strong>ATENÇÃO !!! </strong><a href="http://10.47.171.110/sisdamweb/suvisjt.php?pag=edit-end-ambiental&pagina=1&sinan=dengnet&tabela=tbldengue&buttons=dengue&agravo=DENGUE&ial=dengue_ial&list=dengue" class="alert-link">Clique aqui</a>. <strong>EXISTEM NOVOS CASOS PARA ATUALIZAR !!!</strong>.
                </div>

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

        <table id="list-bloq-deng" class="table table-hover table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th class="text-center"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>SINAN</th> <!-- 0 -->
                    <th class="text-center"><span class="glyphicon glyphicon-print" aria-hidden="true"></span>IMP</th> <!-- 1 -->
                    <th class="text-center">IGM<br>FOC</th> <!-- 2 -->
                    <th class="text-center">IGM<br>PBO</th> <!-- 3 -->
                    <th class="text-center">NS1</th> <!-- 4 -->
                    <th class="text-center">TR</th> <!-- 5 -->
                    <th class="text-center">1º SIN</th> <!-- 6 -->
                    <th class="text-center">NOME</th> <!-- 7 -->
                    <th class="text-center">MAPAS</th> <!-- 8 -->
                    <th class="text-center">DT NOT</th> <!-- 9 -->
                    <th class="text-center">ENDEREÇO</th> <!-- 10 -->
                    <th class="text-center">OBSERVAÇÕES</th> <!-- 11 -->
                    <th class="text-center"><span class="glyphicon glyphicon-trash" aria-hidden="true"></th> <!-- 12 -->
                    <th class="text-center"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></th> <!-- 13 -->
                    <th class="text-center">UBS</th> <!-- 14 -->
                    <th class="text-center">TEL</th> <!-- 15 -->
                    <th class="text-center">NOTIFICANTE</th> <!-- 16 -->
                    <th class="text-center">BLOQ/NEB</th> <!-- 17 -->
                    <th class="text-center">DT ENTRADA</th> <!-- 18 -->
                </tr>
            </thead>
        <tbody>

        </tbody>
    </table>

