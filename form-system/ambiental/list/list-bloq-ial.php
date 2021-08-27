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

<?php

//Consulta a data de extração de Banco de dados Sinan-Net
$result_table = "SELECT CREATE_TIME FROM information_schema.tables WHERE TABLE_NAME = '$agravo_sinan_sql' ORDER BY `CREATE_TIME` DESC";
$result = $conectar->query($result_table);
$row_result = mysqli_fetch_assoc($result);

//Consulta a data de extração de Banco de Dados IAL
$result_table_ial = "SELECT CREATE_TIME FROM information_schema.tables WHERE TABLE_NAME = '$agravo_ial' ORDER BY `CREATE_TIME` DESC";
$result_ial = $conectar->query($result_table_ial);
$row_result_ial = mysqli_fetch_assoc($result_ial);

$sql_button_at_end = $conectar->query("SELECT $agravo_sinan_sql.NU_NOTIFIC, $agravo_sinan_sql.ID_DISTRIT
FROM $agravo_sinan_sql LEFT JOIN $agravo_tabela_sql ON $agravo_sinan_sql.NU_NOTIFIC = $agravo_tabela_sql.nDoc
WHERE ((($agravo_sinan_sql.ID_DISTRIT)=\"70\") AND (($agravo_tabela_sql.nDoc) Is Null))");

?>

<!-- Início do HTML 5 da Página-->
<div class="container-fluid" role="main" xmlns="http://www.w3.org/1999/html">
    <!-- Começando a página de Título -->
    <div class="row">
        <div class="col-md-12"><div class="page-header">
                <ol class="breadcrumb">
                    <li><i class="fa fa-database"></i> <a href="suvisjt.php">Sisdam Web</a></li>
                    <li class="active">Sinan At. em - <?php echo date("d/m/Y",strtotime($row_result['CREATE_TIME'])) ; ?> às
                        <?php echo date("H:i:s",strtotime($row_result['CREATE_TIME'])) ; ?></li>
                    <li class="active">IAL At. em - <?php echo date("d/m/Y",strtotime($row_result_ial['CREATE_TIME'])) ; ?> às
                        <?php echo date("H:i:s",strtotime($row_result_ial['CREATE_TIME'])) ; ?></li>
                </ol>
                <button type="button"  data-toggle="tooltip" title="Lista de Bloqueios Chikungunya" class="btn btn-dark btn-labeled btn-lg btn-block"><span class="btn-label"><i
                                class="glyphicon glyphicon-picture"></i></span>BLOQUEIOS - <?php echo $agravo; ?></button>
<br>
                <div class="alert alert-danger text-center" style="<?php if($sql_button_at_end->num_rows < 1) {echo 'display: none;';} ?>" role="alert"><i class="glyphicon glyphicon-exclamation-sign"></i>
                    <strong>ATENÇÃO !!! </strong><a href="http://10.47.171.110/sisdamweb/suvisjt.php?pag=edit-end-ambiental&pagina=1&sinan=<?php echo $agravo_sinan_sql ?>&tabela=<?php echo $agravo_tabela_sql?>&buttons=<?php echo $agravo_buttons ?>&agravo=<?php echo $agravo ?>&ial=<?php echo $agravo_ial ?>&list=ial" class="alert-link">Clique aqui</a>. <strong>EXISTEM NOVOS CASOS PARA ATUALIZAR !!!</strong>.
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
    <!-- Terminando a página de Título -->

    <!--------------------------------------------- * Tabela de Bloqueios * --------------------------------------->
    <table id="list-bloq-<?php echo $agravo_buttons;?>" class="table table-hover table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr>

            <th class="text-center"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>SINAN</th> <!-- 0 -->
            <th class="text-center"><span class="glyphicon glyphicon-print" aria-hidden="true"></th> <!-- 1 -->
            <th class="text-center">EXAME</th> <!-- 2 -->
            <th class="text-center">RES</th> <!-- 3 -->
            <th class="text-center">DT NOT</th> <!-- 4 -->
            <th class="text-center">1º SIN</th> <!-- 5 -->
            <th class="text-center">NOME</th> <!-- 6 -->
            <th class="text-center">SETOR</th> <!-- 7 -->
            <th class="text-center">ENDEREÇO</th> <!-- 8 -->
            <th class="text-center"><span class="glyphicon glyphicon-trash" aria-hidden="true"></th> <!-- 9 -->
            <th class="text-center"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></th> <!-- 10 -->
            <th class="text-center">ENTRADA</th> <!-- 11 -->
            <th class="text-center">UBS</th> <!-- 12 -->
            <th class="text-center">TELEFONE</th> <!-- 13 -->
            <th class="text-center">NOTIFICANTE</th> <!-- 14 -->
            <th class="text-center">BLOQ/NEB</th> <!-- 15 -->
            <th class="text-center">ALTERADO EM</th> <!-- 16 -->
        </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
    <!--------------------------------------------- * Fim da Tabela de Bloqueios * --------------------------------------->

</div>


