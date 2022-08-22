<!-- Este projeto é desenvolvido na Suvis Jaçanã-Tremembé com iniciativa dos colaboradores da Unidade -->
<!-- Código desenvolvido por Rodolfo Romaioli Ribeiro de Jesus - rodolfo.romaioli@gmail.com -->
<!-- Sisdam Web - 2.0 - 2017 - Todos os direitos reservados -->

<?php

error_reporting(1);

// DEFINE O FUSO HORARIO COMO O HORARIO DE BRASILIA
date_default_timezone_set('America/Sao_Paulo');

?>

<script type="text/javascript">
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip()
            $('#list-ial-esporo').DataTable({responsive: {details: {display: $.fn.dataTable.Responsive.display.modal({header: function (row) {var data = row.data();
                return 'Detalhes do Pedido : ' + data[1];}}),renderer: function ( api, rowIdx, columns ) {var data = $.map( columns, function ( col, i ) {
                return '<tr>'+'<td>'+col.title+':'+'</td> '+'<td>'+col.data+'</td>'+'</tr>';} ).join('');
                return $('<table/>').append( data ); } } },
                "language": {"sEmptyTable": "Nenhum registro encontrado","sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros","sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                "sInfoFiltered": "(Filtrados de _MAX_ registros)","sInfoThousands": ".","sLengthMenu": "_MENU_ Resultados por Página","sLoadingRecords": "Carregando...",
                "sProcessing": "Processando...","sZeroRecords": "Nenhum registro encontrado","sSearch": "Pesquisar","oPaginate": {"sNext": "Próximo","sPrevious": "Anterior","sFirst": "Primeiro","sLast": "Último"},
                "oAria": {"sSortAscending": "Ordenar colunas de forma ascendente","sPrevious": "Ordenar colunas de forma descendente"}},
                dom: "lBfrtip",processing: true, serverside: true, ajax: 'form-system/ambiental/list/proc-list-ambiental/list-ial-esporo.php',
                "lengthMenu": [[4, 10, 25, 50, -1], [4, 10, 25, 50, "Todos"]], "aaSorting": [ 0, 'desc' ],
                "aoColumnDefs": [
                //{ type: 'de_datetime', targets: 1 },
                {"bVisible": false,"aTargets": [2]},
                {"bVisible": false,"aTargets": [3]},
                {"bVisible": false,"aTargets": [4]},
                {"bVisible": false,"aTargets": [6]},
                {"bVisible": false,"aTargets": [12]},
                //{"aTargets": [2], // o numero 2 é o nº da coluna
                //"mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                //return full[2] + '\n' +full[3] + '\n' +full[4] ;
                //}
                //}
                {
                "aTargets": [14], // o numero é o nº da coluna
                "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                        var ialgal = full[14];
                        switch (ialgal) {
                        case '':
                            ialgal = '<button class="btn btn-labeled btn-warning my-2 my-sm-0"><span class="btn-label">' +
                                '<i class="fa fa-vial"></i> </span>SEM EXAME</button>';
                        break;
                        case 'Negativo':
                            ialgal = '<button class="btn btn-labeled btn-success my-2 my-sm-0"><span class="btn-label">' +
                                '<i class="fa fa-vial"></i> </span>NEGATIVO</button>';
                        break;
                        case 'Positivo':
                            ialgal = '<button class="btn btn-labeled btn-danger my-2 my-sm-0"><span class="btn-label">' +
                                '<i class="fa fa-vial"></i> </span>POSITIVO</button>';
                        break;
                        default: ialgal = '<button class="btn btn-labeled btn-info my-2 my-sm-0"><span class="btn-label">' +
                            '<i class="fa fa-vial"></i> </span>NÃO EXISTE</button>';
                        }
                        return ialgal;
                        }
                    }
                ],
                buttons: [ {extend:'excel',title:'RESULTADOS ESPORO ANIMAL',header: 'RESULTADOS ESPORO ANIMAL',filename:'RESULTADOS ESPORO ANIMAL',className: 'btn btn-success',text:'<span class="fa fa-file-excel-o"></span>' },
                {extend: 'pdfHtml5',exportOptions: {columns: ':visible'},title:'RESULTADOS ESPORO ANIMAL',header: 'RESULTADOS ESPORO ANIMAL',filename:'RESULTADOS ESPORO ANIMAL',orientation: 'landscape',pageSize: 'LEGAL',className: 'btn btn-danger',text:'<span class="fa fa-file-pdf-o"></span>'},
                {extend:'print', exportOptions: {columns: ':visible'},orientation: 'landscape',title:'RESULTADOS ESPORO ANIMAL',header: 'RESULTADOS ESPORO ANIMAL',filename:'RESULTADOS ESPORO ANIMAL',className: 'btn btn-default',text:'<span class="fa fa-print"></span>'},
                {extend:'colvis',titleAttr: 'Select Colunas',className: 'btn btn-info',text:'<span class="fa fa-list"></span>'} ]
                });
    });
</script>


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
                    class="fa fa-vials"></i></span> CCZ ESPORO - <?php echo $today = date("Y");   ?></button>
            </div>
        </div>
    </div>
    <!-- /.row -->

<div class="row">
    <div class="col-md-12">
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
    </div>
</div>