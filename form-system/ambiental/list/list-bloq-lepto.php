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

<!-- <script>$(document).ready(function(){$('#modal-manutencao').modal('show');});</script> -->

<!-- Inicio Modal Login-->
<div class="modal fade" id="modal-manutencao" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header-del">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center" id="myModalLabel">SisdamJT Web</h4>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="text-center">
                        <img id="logo-img" class="img-responsive center-block" alt="Responsive image" src="imagens/construcao.jpg"/>
                        <h4>Página </h4><h4>em Manutenção</h4>
                        <button type="button" class="btn btn-success" data-dismiss="modal">OK</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Função para reload  -->
<script> function FunctionReload() {
        window.location.replace("http://10.47.171.110/sisdamweb/suvisjt.php?pag=list-bloq-<?php echo $agravo_buttons;?>&sinan=<?php echo $agravo_sinan_sql;?>&agravo=<?php echo $agravo;?>&tabela=<?php echo $agravo_tabela_sql;?>&ial=<?php echo $agravo_ial;?>&buttons=<?php echo $agravo_buttons;?>");
    } </script>

<?php

$result_table_lepto = "SELECT CREATE_TIME FROM information_schema.tables WHERE TABLE_NAME = '$agravo_sinan_sql' ORDER BY `CREATE_TIME` DESC";
$result_lepto = $conectar->query($result_table_lepto);
$row_result_lepto = mysqli_fetch_assoc($result_lepto);

$result_table_ccz_lepto = "SELECT CREATE_TIME FROM information_schema.tables WHERE TABLE_NAME = 'resultado_ccz' ORDER BY `CREATE_TIME` DESC";
$result_ccz_lepto = $conectar->query($result_table_ccz_lepto);
$row_result_ccz_lepto = mysqli_fetch_assoc($result_ccz_lepto);

$sql_button_at_end = $conectar->query("SELECT leptonet.NU_NOTIFIC, leptonet.ID_DISTRIT
FROM leptonet LEFT JOIN tbllepto ON leptonet.NU_NOTIFIC = tbllepto.nDoc
WHERE (((leptonet.ID_DISTRIT)=\"70\") AND ((tbllepto.nDoc) Is Null))");

?>

<div class="container-fluid" role="main" xmlns="http://www.w3.org/1999/html">
    <!-- begin PAGE TITLE ROW -->
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <ol class="breadcrumb">
                    <li><i class="fa fa-database"></i> <a href="suvisjt.php">Sisdam Web</a></li>
                    <li class="active">Casos de Leptospirose</li>
                    <li class="active">Sinan At. em - <?php echo date("d/m/Y",strtotime($row_result_lepto['CREATE_TIME'])) ; ?> às
                        <?php echo date("H:i:s",strtotime($row_result_lepto['CREATE_TIME'])) ; ?></li>
                    <li class="active">Resultados : Positivos <span role="button" class="btn btn-danger rounded-circle">
                        <?php foreach($conectar->query($pos_lep_total) as $row) {echo $row[$count_ndoc_lepto];}?></span>
                    <li class="active">Sem Coleta <span role="button" class="btn btn-warning rounded-circle">
                        <?php foreach($conectar->query($sem_col_lep_total) as $row) {echo $row[$count_ndoc_lepto];}?></span>
                    <li class="active">Negativos <span role="button" class="btn btn-success rounded-circle">
                        <?php foreach($conectar->query($neg_lep_total) as $row) {echo $row[$count_ndoc_lepto];}?></span>
                    <li class="active">Inconclusivos <span role="button" class="btn btn-default rounded-circle">
                         <?php foreach($conectar->query($inco_lep_total) as $row) {echo $row[$count_ndoc_lepto];}?></span>
                </ol>
                <button type="button"  class="btn btn-dark btn-labeled btn-lg btn-block" data-toggle="tooltip" title="Lista de Bloqueios 1ª Via" ><span class="btn-label"><i
                    class="glyphicon glyphicon-picture"></i></span>BLOQUEIOS - LEPTO
                </button>
<br>
                <div class="alert alert-danger text-center" style="<?php if($sql_button_at_end->num_rows < 1) {echo 'display: none;';} ?>" role="alert"><i class="glyphicon glyphicon-exclamation-sign"></i>
                    <strong>ATENÇÃO !!! </strong><a href="http://10.47.171.110/sisdamweb/suvisjt.php?pag=edit-end-ambiental&pagina=1&sinan=leptonet&tabela=tbllepto&buttons=lepto&agravo=LEPTOSPIROSE&ial=lepto_ial&list=lepto" class="alert-link">Clique aqui</a>. <strong>EXISTEM NOVOS CASOS PARA ATUALIZAR !!!</strong>.
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

        <table id="list-bloq-leptos" class="table table-hover table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th class="text-center"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>SINAN</th> <!-- 0 -->
                    <th class="text-center"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>SV2</th> <!-- 1 -->
                    <th class="text-center"><span class="glyphicon glyphicon-print" aria-hidden="true"></span>IMP</th> <!-- 2 -->
                    <th class="text-center">CCZ <br> ELISA</th> <!-- 1 -->
                    <th class="text-center">CCZ <br> MAT</th> <!-- 1 -->
                    <th class="text-center">1º SIN</th> <!-- 7 -->
                    <th class="text-center">NOME</th> <!-- 9 -->
                    <th class="text-center">MAPAS</th> <!-- 18 -->
                    <th class="text-center">DT NOT</th> <!-- 5 -->
                    <th class="text-center">ENDEREÇO</th> <!-- 12 -->
                    <th class="text-center">OBSERVAÇÕES</th> <!-- 22 -->
                    <th class="text-center"><span class="glyphicon glyphicon-trash" aria-hidden="true"></th> <!-- 23 -->
                    <th class="text-center"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></th> <!-- 23 -->
                    <th class="text-center">UBS</th> <!-- 19 -->
                    <th class="text-center">TEL</th> <!-- 8 -->
                    <th class="text-center">NOTIFICANTE</th> <!-- 19 -->
                    <th class="text-center">BLOQ/NEB</th> <!-- 19 -->
                    <th class="text-center">ALTERADO EM</th> <!-- 19 -->
                </tr>
            </thead>
        <tbody>

        </tbody>
    </table>

