1<!-- Este projeto é desenvolvido na Suvis Jaçanã-Tremembé com iniciativa dos colaboradores da Unidade -->
<!-- Código desenvolvido por Rodolfo Romaioli Ribeiro de Jesus - rodolfo.romaioli@gmail.com -->
<!-- Sisdam Web - 2.0 - 2017 - Todos os direitos reservados -->

<div class="container-fluid" role="main" xmlns="http://www.w3.org/1999/html">

    <?php
    // DEFINE O FUSO HORARIO COMO O HORARIO DE BRASILIA
    date_default_timezone_set('America/Sao_Paulo');
    // CRIA UMA VARIAVEL E ARMAZENA A HORA ATUAL DO FUSO-HORÀRIO DEFINIDO (BRASÍLIA)
    //$dataLocal = date('d/m/Y H:i:s', time());

    $result_table = "SELECT CREATE_TIME FROM information_schema.tables WHERE TABLE_NAME = 'sarampo_ial' ORDER BY `CREATE_TIME` DESC";
    $result = $conectar->query($result_table);
    $row_result = mysqli_fetch_assoc($result);
    ?>

    <script type="text/javascript">
        $(document).ready(function() {

            $('#list-ial-sarampo').DataTable({responsive: {details: {display: $.fn.dataTable.Responsive.display.modal({header: function (row) {var data = row.data();
                                return 'Detalhes do Paciente : ' + data[1];}}),renderer: function ( api, rowIdx, columns ) {var data = $.map( columns, function ( col, i ) {
                            return '<tr>'+'<td>'+col.title+':'+'</td> '+'<td>'+col.data+'</td>'+'</tr>';} ).join('');
                            return $('<table/>').append( data ); } } },
                "language": {"sEmptyTable": "Nenhum registro encontrado","sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros","sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                    "sInfoFiltered": "(Filtrados de _MAX_ registros)","sInfoThousands": ".","sLengthMenu": "_MENU_ Resultados por Página","sLoadingRecords": "Carregando...",
                    "sProcessing": "Processando...","sZeroRecords": "Nenhum registro encontrado","sSearch": "Pesquisar","oPaginate": {"sNext": "Próximo","sPrevious": "Anterior","sFirst": "Primeiro","sLast": "Último"},
                    "oAria": {"sSortAscending": "Ordenar colunas de forma ascendente","sPrevious": "Ordenar colunas de forma descendente"}},
                dom: "lBfrtip",processing: true, serverside: true, ajax: 'form-system/epidemio/list/proc-list-epidemio/list-ial-sarampo.php',
                "lengthMenu": [[4, 10, 25, 50, -1], [4, 10, 25, 50, "Todos"]], "aaSorting": [ 0, 'desc' ],
                "aoColumnDefs": [
                    { type: 'de_datetime', targets: 18 },
                    { type: 'de_datetime', targets: 19 },
                    { type: 'de_datetime', targets: 20 },
                    {"bVisible": false,"aTargets": [7]},
                    {"bVisible": false,"aTargets": [8]},
                    {"bVisible": false,"aTargets": [9]},
                    {"bVisible": false,"aTargets": [21]},
                    {"bVisible": false,"aTargets": [22]},
                    {"aTargets": [6], // o numero 2 é o nº da coluna
                        "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                            return '<a target="_blank" href="https://gal.saude.sp.gov.br/gal/bmh/consulta-paciente-laboratorio/imprimir-resultado/?requisicoes=[%22'+ full [0] +'%22]">'+full[6]+'</a>';
                        }

                    }
                ],
                buttons: [ {extend:'excel',title:'Casos Sarampo-IAL',header: 'Sarampo IAL-SINAN',filename:'Sarampo-IAL',className: 'btn btn-success',text:'<span class="fa fa-file-excel-o"></span>' },
                    {extend: 'pdfHtml5',exportOptions: {columns: ':visible'},title:'Casos Sarampo-IAL',header: 'Sarampo IAL-SINAN',filename:'Sarampo-IAL',orientation: 'landscape',pageSize: 'LEGAL',className: 'btn btn-danger',text:'<span class="fa fa-file-pdf-o"></span>'},
                    {extend:'print',exportOptions: {columns: ':visible'},title:'Casos Sarampo - IAL - SINAN',header: 'Sarampo IAL-SINAN',filename:'Sarampo-IAL',className: 'btn btn-default',text:'<span class="fa fa-print"></span>'},
                    {extend:'colvis',className: 'btn btn-info',text:'<span class="fa fa-list"></span>'} ]
            });

        });

    </script>
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
                    class="glyphicon glyphicon-list"></i></span> IAL SARAMPO - <?php echo $today = date("Y");   ?></button>
            </div>
        </div>
    </div>
    <!-- /.row -->

    <table id="list-ial-sarampo" class="table table-hover table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th class="text-center">REQUISIÇÃO</th>
            <th class="text-center">PACIENTE</th>
            <th class="text-center">EXAME</th>
            <th class="text-center">METODO</th>
            <th class="text-center">MATERIAL</th>
            <th class="text-center">STATUS EXAME</th>
            <th class="text-center">RESULTADO</th>
            <th class="text-center">CNS</th>
            <th class="text-center">SETOR</th>
            <th class="text-center">BANCADA
            <th class="text-center">MUN. RESIDÊNCIA</th>
            <th class="text-center">UF RESIDÊNCIA</th>
            <th class="text-center">REQUISITANTE</th>
            <th class="text-center">MUN. REQUISITANTE</th>
            <th class="text-center">CÓD. AMOSTRA</th>
            <th class="text-center">AMOSTRA</th>
            <th class="text-center">RESTRIÇÃO</th>
            <th class="text-center">LABOTÓRIO CADASTRO</th>
            <th class="text-center">DT. CADASTRO</th>
            <th class="text-center">DT. RECEBIMENTO</th>
            <th class="text-center">DT. LIBERAÇÃO</th>
            <th class="text-center">TEMPO LIBERAÇÃO</th>
            <th class="text-center">LABOTÓRIO EXECUTOR</th>

        </tr>
        </thead>
        <tbody>


        </tbody>
    </table>
</div>