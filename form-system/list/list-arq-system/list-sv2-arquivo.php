

   <!-- Este projeto é desenvolvido na Suvis Jaçanã-Tremembé com iniciativa dos colaboradores da Unidade -->
    <!-- Código desenvolvido por Rodolfo Romaioli Ribeiro de Jesus - rodolfo.romaioli@gmail.com -->
    <!-- Sisdam Web - 2.0 - 2018 - Todos os direitos reservados -->


    <?php
    $yearSv2Of = $_GET["year"];
    ?>

    <script type="text/javascript">

        $(document).ready(function() {
            $('#list-sv2-arq').DataTable({responsive: {details: {display: $.fn.dataTable.Responsive.display.modal({header: function (row) {var data = row.data();
                                return 'Detalhes do Sinan : ' + data[1];}}),renderer: function ( api, rowIdx, columns ) {var data = $.map( columns, function ( col, i ) {
                            return '<tr>'+'<td>'+col.title+':'+'</td> '+'<td>'+col.data+'</td>'+'</tr>';} ).join('');
                            return $('<table/>').append( data ); } } },
                "language": {"sEmptyTable": "Nenhum registro encontrado","sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros","sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                    "sInfoFiltered": "(Filtrados de _MAX_ registros)","sInfoThousands": ".","sLengthMenu": "_MENU_ Resultados por Página","sLoadingRecords": "Carregando...",
                    "sProcessing": "Processando...","sZeroRecords": "Nenhum registro encontrado","sSearch": "Pesquisar","oPaginate": {"sNext": "Próximo","sPrevious": "Anterior","sFirst": "Primeiro","sLast": "Último"},
                    "oAria": {"sSortAscending": "Ordenar colunas de forma ascendente","sPrevious": "Ordenar colunas de forma descendente"}},
                dom: "lBfrtip",processing: true, serverside: true, ajax: 'form-system/list/list-arq-system/system-proc-list-arq/proc-list-sv2-arq.php?yearMemo=<?php echo $yearSv2Of ?>',
                "lengthMenu": [[4, 10, 25, 50, -1], [4, 10, 25, 50, "Todos"]], "aaSorting": [ 0, 'desc' ],
                "aoColumnDefs": [{"bVisible": false,"aTargets": [14]},{"bVisible": false,"aTargets": [15]},{"bVisible": false,"aTargets": [16]},{"bVisible": false,"aTargets": [19]},
                    {"bVisible": false,"aTargets": [20]},{"bVisible": false,"aTargets": [22]},{"bVisible": false,"aTargets": [23]},{"bVisible": false,"aTargets": [24]},{"bSearchable": false,"bVisible": false,"aTargets": [25]}],
                buttons: [ {extend:'excel',title:'SisdamWeb - Sv2 <?php echo $unidade.' - '.$yearSv2Of; ?>',header: 'SisdamWeb - Sv2 <?php echo $unidade.' - '.$yearSv2Of; ?>',filename:'SisdamWeb - Sv2 <?php echo $unidade.' - '.$yearSv2Of; ?>',className: 'btn btn-success',text:'<span class="fa fa-file-excel-o"></span>' },
                    {extend: 'pdfHtml5',exportOptions: {columns: ':visible'},title:'SisdamWeb - Sv2 <?php echo $unidade.' - '.$yearSv2Of; ?>',header: 'SisdamWeb - Sv2 <?php echo $unidade.' - '.$yearSv2Of; ?>',filename:'SisdamWeb - Sv2 <?php echo $unidade.' - '.$yearSv2Of; ?>',orientation: 'landscape',pageSize: 'LEGAL',className: 'btn btn-danger',text:'<span class="fa fa-file-pdf-o"></span>'},
                    {extend:'print', exportOptions: {columns: ':visible'},title:'SisdamWeb - Sv2 <?php echo $unidade.' - '.$yearSv2Of; ?>',header: 'SisdamWeb - Sv2 <?php echo $unidade.' - '.$yearSv2Of; ?>',filename:'SisdamWeb - Sv2 <?php echo $unidade.' - '.$yearSv2Of; ?>',orientation:'landscape',className: 'btn btn-secondary',text:'<span class="fa fa-print"></span>'},
                    {extend:'colvis',titleAttr: 'Select Colunas',className: 'btn btn-info',text:'<span class="fa fa-list"></span>'} ]
            });
        });
    </script>

   <div class="container-fluid" role="main" xmlns="http://www.w3.org/1999/html">
       <!-- begin PAGE TITLE ROW -->
       <div class="row">
           <div class="col-md-12">
               <div class="page-header">
                   <ol class="breadcrumb">
                       <li><i class="fa fa-database"></i> <a href="suvisjt.php">Sisdam Web</a>
                       </li>
                       <li class="active">Lista Sv2 <?php echo $unidade.' - '.$yearSv2Of; ?></li>
                   </ol>
                   <button type="button" onClick="window.print()" class="btn btn-danger btn-labeled btn-lg btn-block"><span class="btn-label"><i
                                   class="fa fa-print"></i></span>&nbsp;ARQUIVO&nbsp;- LISTA - SV2 - <?php echo $unidade.' - '.$yearSv2Of; ?></button>
               </div>
           </div>
       </div>


             <table id="list-sv2-arq" class="table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr class="table-danger">
                    <th class="text-center">ID</th>
                    <th class="text-center">SINAN</th>
                    <th class="text-center">ENTRADA</th>
                    <th class="text-center">SE</th>
                    <th class="text-center">AGRAVO</th>
                    <th class="text-center">TEL</th>
                    <th class="text-center">NOME</th>
                    <th class="text-center">NOTIF</th>
                    <th class="text-center">ATENDIDO</th>
                    <th class="text-center">SEXO</th>
                    <th class="text-center">IDADE</th>
                    <th class="text-center">LOG</th>
                    <th class="text-center">ENDEREÇO</th>
                    <th class="text-center">NUM</th>
                    <th class="text-center">COMP</th>
                    <th class="text-center">BAIRRO</th>
                    <th class="text-center">CEP</th>
                    <th class="text-center">LOCALVD</th>
                    <th class="text-center">SUVIS</th>
                    <th class="text-center">CIDADE</th>
                    <th class="text-center">OBITO</th>
                    <th class="text-center">CAD</th>
                    <th class="text-center">DATA</th>
                    <th class="text-center">ALT</th>
                    <th class="text-center">DATA</th>
                    <th class="text-center">TIPO</th>
                    <th class="text-center">OCORRENCIA</th>
                </tr>
                </thead>
                <tbody style="<?php if ($_SESSION['usuarioNivelAcesso'] > 3) {
                    echo 'display: none;';
                } ?>">


                </tbody>
            </table>
        </div>