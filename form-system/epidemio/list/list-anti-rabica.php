<!-- Este projeto é desenvolvido na Suvis Jaçanã-Tremembé com iniciativa dos colaboradores da Unidade -->
<!-- Código desenvolvido por Rodolfo Romaioli Ribeiro de Jesus - rodolfo.romaioli@gmail.com -->
<!-- Sisdam Web - 2.0 - 2017 - Todos os direitos reservados -->

<div class="container-fluid" role="main" xmlns="http://www.w3.org/1999/html">

    <?php
    // DEFINE O FUSO HORARIO COMO O HORARIO DE BRASILIA
    date_default_timezone_set('America/Sao_Paulo');
    // CRIA UMA VARIAVEL E ARMAZENA A HORA ATUAL DO FUSO-HORÀRIO DEFINIDO (BRASÍLIA)
    $dataLocal = date('d/m/Y H:i:s', time());
    ?>

    <script type="text/javascript">
        $(document).ready(function() {

            $('#list-sinan-anti-rabica').DataTable({responsive: {details: {display: $.fn.dataTable.Responsive.display.modal({header: function (row) {var data = row.data();
                                return 'Detalhes do Sinan : ' + data[0];}}),renderer: function ( api, rowIdx, columns ) {var data = $.map( columns, function ( col, i ) {
                            return '<tr>'+'<td>'+col.title+':'+'</td> '+'<td>'+col.data+'</td>'+'</tr>';} ).join('');
                            return $('<table/>').append( data ); } } },
                "language": {"sEmptyTable": "Nenhum registro encontrado","sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros","sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                    "sInfoFiltered": "(Filtrados de _MAX_ registros)","sInfoThousands": ".","sLengthMenu": "_MENU_ Resultados por Página","sLoadingRecords": "Carregando...",
                    "sProcessing": "Processando...","sZeroRecords": "Nenhum registro encontrado","sSearch": "Pesquisar","oPaginate": {"sNext": "Próximo","sPrevious": "Anterior","sFirst": "Primeiro","sLast": "Último"},
                    "oAria": {"sSortAscending": "Ordenar colunas de forma ascendente","sPrevious": "Ordenar colunas de forma descendente"}},
                dom: "lBfrtip",processing: true, serverside: true, ajax: 'form-system/epidemio/list/proc-list-epidemio/list-anti-rabica.php',
                "lengthMenu": [[4, 10, 25, 50, -1], [4, 10, 25, 50, "Todos"]], "aaSorting": [ 0, 'desc' ],
                "aoColumnDefs": [
                    { type: 'de_date', targets: 1 },
                    { type: 'de_date', targets: 3 },
                {"aTargets": [10], // o numero 2 é o nº da coluna
                    "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                        return '(' + full[10] + ')' + ' ' + full[15];
                    }
                },
                {
                    "aTargets": [11], //nº da coluna
                    "mRender": function (data, type, full) { //aqui é uma função para identificar igm panbio
                        var antirabani = full[11];
                        switch (antirabani) {
                            case '1':
                                antirabani = 'CANINA';
                                break;
                            case '2':
                                antirabani = 'FELINA';
                                break;
                            case '3':
                                antirabani = 'MORCEGO';
                                break;
                            case '4':
                                antirabani = 'MACACO';
                                break;
                            case '5':
                                antirabani = 'RAPOSA';
                                break;
                            case '6':
                                antirabani = 'HERBÍVORO';
                                break;
                            case '7':
                                antirabani = 'OUTROS';
                                break;
                            case null:
                                antirabani = 'NÃO INFORMADO';
                                break;
                            default: antirabani = ' ';
                        }
                        return antirabani;
                    }
                },
                {
                    "aTargets": [12], //nº da coluna
                    "mRender": function (data, type, full) { //aqui é uma função para identificar igm panbio
                        var antirabcond = full[12];
                        switch (antirabcond) {
                            case '1':
                                antirabcond = 'SADIO';
                                break;
                            case '2':
                                antirabcond = 'SUSPEITO';
                                break;
                            case '3':
                                antirabcond = 'RAIVOSO';
                                break;
                            case '4':
                                antirabcond = '<p>MORTO/<br>DESAPARECIDO</p>';
                                break;
                            case null:
                                antirabcond = 'NÃO INFORMADO';
                                break;
                            default: antirabcond = ' ';
                        }
                        return antirabcond;
                    }
                },
                {
                    "aTargets": [13], //nº da coluna
                    "mRender": function (data, type, full) { //aqui é uma função para identificar igm panbio
                        var antirabobs = full[13];
                        switch (antirabobs) {
                            case '1':
                                antirabobs = 'SIM';
                                break;
                            case '2':
                                antirabobs = 'NAO';
                                break;
                            case null:
                                antirabobs = ' ';
                                break;
                            default: antirabobs = ' ';
                        }
                        return antirabobs;
                    }
                },
                {
                    "aTargets": [14], //nº da coluna
                    "mRender": function (data, type, full) { //aqui é uma função para identificar igm panbio
                        var antirabfim = full[14];
                        switch (antirabfim) {
                            case '1':
                                antirabfim = '<p>NEGATIVO<br>CLÍNICA</p>';
                                break;
                            case '2':
                                antirabfim = '<p>NEGATIVO<br>LABORATÓRIO</p>';
                                break;
                            case '3':
                                antirabfim = '<p>POSITIVO<br>CLÍNICA</p>';
                                break;
                            case '4':
                                antirabfim = '<p>POSITIVO<br>LABORATÓRIO</p>';
                                break;
                            case '5':
                                antirabfim = '<p>MORTO<br>SACRIFICADO</p>';
                                break;
                            case '9':
                                antirabfim = '<p>IGNORADO</p>';
                                break;
                            case null:
                                antirabfim = ' ';
                                break;
                            default: antirabfim = ' ';
                        }
                        return antirabfim;
                    }
                },
            ],
                buttons: [ {extend:'excel',title:'Casos At. Antirrábico',header: 'Casos At. Antirrábico',filename:'Casos At. Antirrábico',className: 'btn btn-success',text:'<span class="fa fa-file-excel-o"></span>' },
                    {extend: 'pdfHtml5',exportOptions: {columns: ':visible'},title:'Casos At. Antirrábico - SINAN',header: 'At. Antirrábico SINAN',filename:'At. Antirrábico - SINAN',orientation: 'landscape',pageSize: 'LEGAL',className: 'btn btn-danger',text:'<span class="fa fa-file-pdf-o"></span>'},
                    {extend:'print',exportOptions: {columns: ':visible'},title:'Casos At. Antirrábico - SINAN',header: 'At. Antirrábico SINAN',filename:'At. Antirrábico - SINAN',className: 'btn btn-default',text:'<span class="fa fa-print"></span>'},
                    {extend:'colvis',className: 'btn btn-info',text:'<span class="fa fa-list"></span>'} ]
            });

        });

    </script>

    <?php
    //Count da tabela dengue
    $count_dt_enc = "COUNT(antranet.DT_ENCERRA)";

    //Total de Casos em Aberto
    $abertos="SELECT COUNT(antranet.DT_ENCERRA)
    FROM antranet WHERE antranet.DT_ENCERRA NOT LIKE '%/2021'";

    //Total de Casos Fechados
    $fechados="SELECT COUNT(antranet.DT_ENCERRA)
    FROM antranet WHERE antranet.DT_ENCERRA LIKE '%/2021'";

    $result_table_antirrabico = "SELECT CREATE_TIME FROM information_schema.tables WHERE TABLE_NAME = 'antranet' ORDER BY `CREATE_TIME` DESC";
    $result_antirrabico = $conectar->query($result_table_antirrabico);
    $row_result_antirrabico = mysqli_fetch_assoc($result_antirrabico);

    ?>


    <!-- begin PAGE TITLE ROW -->
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <ol class="breadcrumb">
                    <li><i class="fa fa-database"></i> <a href="suvisjt.php">Sisdam Web</a>
                    </li>
                    <li class="active">Sinan At. em - <?php echo date("d/m/Y",strtotime($row_result_antirrabico['CREATE_TIME'])) ; ?> às
                        <?php echo date("H:i:s",strtotime($row_result_antirrabico['CREATE_TIME'])) ; ?></li>
                    <li class="active">Controle de Casos : Em Aberto <button data-toggle="tooltip" data-placement="bottom" title="casos em aberto" role="button" class="btn btn-danger rounded-circle disabled">
                            <?php foreach($conectar->query($abertos) as $row) {echo $row[$count_dt_enc];}?></button>
                    <li class="active">Fechados <button data-toggle="tooltip" data-placement="bottom" title="casos fechados" role="button" class="btn btn-success rounded-circle disabled">
                        <?php foreach($conectar->query($fechados) as $row) {echo $row[$count_dt_enc];}?></button>
                </ol>
                <button type="button" class="btn btn-dark btn-labeled btn-lg btn-block"><span class="btn-label"><i
                                class="glyphicon glyphicon-list"></i></span> SINAN - ANTI RÁBICA</button>

                <br>
          </div>
        </div>
    </div>
<!-- /.row -->

<table id="list-sinan-anti-rabica" class="table table-hover table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th class="text-center">SINAN</th>
            <th class="text-center">DT NOT</th>       <!-- 1 --><!-- 1 -->
            <th class="text-center">NOME</th>       <!-- 2 -->
            <th class="text-center">DT SINT</th>       <!-- 1 -->
            <th class="text-center">ENDEREÇO</th>       <!-- 1 -->
            <th class="text-center">NUM</th> <!-- 10 -->
            <th class="text-center">COMP</th> <!-- 11 -->
            <th class="text-center">UBS</th> <!-- 14 -->
            <th class="text-center">DT ENCER</th> <!-- 14 -->
            <th class="text-center">OBSERVAÇÃO</th> <!-- 14 -->
            <th class="text-center">TEL</th> <!-- 15 -->
            <th class="text-center">ESPÉCIE</th> <!-- 18 -->
            <th class="text-center">COND. AN</th> <!-- 18 -->
            <th class="text-center">OBS (GATO/CAO)</th> <!-- 18 -->
            <th class="text-center">FIM ANIMAL</th> <!-- 18 -->
        </tr>
    </thead>
    <tbody>
        <tr>


        </tr>
    </tbody>
</table>