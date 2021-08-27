1<!-- Este projeto é desenvolvido na Suvis Jaçanã-Tremembé com iniciativa dos colaboradores da Unidade -->
<!-- Código desenvolvido por Rodolfo Romaioli Ribeiro de Jesus - rodolfo.romaioli@gmail.com -->
<!-- Sisdam Web - 2.0 - 2017 - Todos os direitos reservados -->

<div class="container-fluid" role="main" xmlns="http://www.w3.org/1999/html">

    <?php
    // DEFINE O FUSO HORARIO COMO O HORARIO DE BRASILIA
    date_default_timezone_set('America/Sao_Paulo');
    // CRIA UMA VARIAVEL E ARMAZENA A HORA ATUAL DO FUSO-HORÀRIO DEFINIDO (BRASÍLIA)
    //$dataLocal = date('d/m/Y H:i:s', time());

    $result_table = "SELECT CREATE_TIME FROM information_schema.tables WHERE TABLE_NAME = 'coque_ial' ORDER BY `CREATE_TIME` DESC";
    $result = $conectar->query($result_table);
    $row_result = mysqli_fetch_assoc($result);
    ?>

    <!-- begin PAGE TITLE ROW -->
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <ol class="breadcrumb">
                    <li><i class="fa fa-database"></i> <a href="suvisjt.php">Sisdam Web</a>
                    </li>
                    <li class="active">Atualizado em - <?php echo date("d/m/Y",strtotime($row_result['CREATE_TIME'])) ; ?> às
                        <?php echo date("H:i:s",strtotime($row_result['CREATE_TIME'])) ; ?></li>
                </ol>
                <button type="button" class="btn btn-danger btn-labeled btn-lg btn-block"><span class="btn-label"><i
                    class="glyphicon glyphicon-list"></i></span> IAL COQUELUCHE - <?php echo $today = date("Y");   ?></button>
            </div>
        </div>
    </div>
    <!-- /.row -->

    <table id="list-ial-coque" class="table table-hover table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th class="text-center">REQUISIÇÃO</th>
            <th class="text-center">PACIENTE</th>
            <th class="text-center">DT. CAD.</th>
            <th class="text-center">DT. REC.</th>
            <th class="text-center">DT. LIB.</th>
            <th class="text-center">STATUS</th>
            <th class="text-center">RESULTADO</th>
            <th class="text-center">EXAME</th>
            <th class="text-center">MÉTODO</th>
            <th class="text-center">COD.</th>
            <th class="text-center">AMOSTRA</th>
            <th class="text-center">C N S</th>
            <th class="text-center">M. RESID.</th>
            <th class="text-center">UF. RES.</th>
            <th class="text-center">REQUISITANTE</th>
            <th class="text-center">MUN. REQ.</th>
            <th class="text-center">MATERIAL</th>
            <th class="text-center">RESTRIÇÃO</th>
            <th class="text-center">LAB. CAD.</th>
            <th class="text-center">LAB. EX.</th>
            <th class="text-center">SETOR</th>
            <th class="text-center">BANCADA</th>
            <th class="text-center">TEMPO LIB.</th>
            <th class="text-center">ID</th>
        </tr>
        </thead>
        <tbody>


        </tbody>
    </table>
</div>