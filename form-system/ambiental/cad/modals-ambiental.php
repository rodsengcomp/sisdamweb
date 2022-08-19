<?php
/* Criado por Rodolfo Romaioli R. De Jesus.
 * User: D788796-5
 * Date: 13/03/2019
 * Time: 14:25
 */
$id = $_GET['id'];
//SQL do modal novos endereços
?>

<script type="text/javascript">
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip()

            $('#list-esporo-medc').DataTable({responsive: {details: {display: $.fn.dataTable.Responsive.display.modal({header: function (row) {var data = row.data();
                                return 'Detalhes do Pedido : ' + data[1];}}),renderer: function ( api, rowIdx, columns ) {var data = $.map( columns, function ( col, i ) {
                            return '<tr>'+'<td>'+col.title+':'+'</td> '+'<td>'+col.data+'</td>'+'</tr>';} ).join('');
                            return $('<table/>').append( data ); } } },
                "language": {"sEmptyTable": "Nenhum registro encontrado","sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros","sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                    "sInfoFiltered": "(Filtrados de _MAX_ registros)","sInfoThousands": ".","sLengthMenu": "_MENU_ Resultados por Página","sLoadingRecords": "Carregando...",
                    "sProcessing": "Processando...","sZeroRecords": "Nenhum registro encontrado","sSearch": "Pesquisar","oPaginate": {"sNext": "Próximo","sPrevious": "Anterior","sFirst": "Primeiro","sLast": "Último"},
                    "oAria": {"sSortAscending": "Ordenar colunas de forma ascendente","sPrevious": "Ordenar colunas de forma descendente"}},
                dom: "lBfrtip",processing: true, serverside: true, ajax: 'form-system/ambiental/cad/proc-cad-ambiental/list-cad-esporo-medc.php?id=<?=$id?>',
                "lengthMenu": [[4, 10, 25, 50, -1], [4, 10, 25, 50, "Todos"]], "aaSorting": [ 0, 'desc' ],
                buttons: [ {extend:'excel',title:'RESULTADOS ESPORO ANIMAL',header: 'RESULTADOS ESPORO ANIMAL',filename:'RESULTADOS ESPORO ANIMAL',className: 'btn btn-success',text:'<span class="fa fa-file-excel-o"></span>' },
                    {extend: 'pdfHtml5',exportOptions: {columns: ':visible'},title:'RESULTADOS ESPORO ANIMAL',header: 'RESULTADOS ESPORO ANIMAL',filename:'RESULTADOS ESPORO ANIMAL',orientation: 'landscape',pageSize: 'LEGAL',className: 'btn btn-danger',text:'<span class="fa fa-file-pdf-o"></span>'},
                    {extend:'print', exportOptions: {columns: ':visible'},orientation: 'landscape',title:'RESULTADOS ESPORO ANIMAL',header: 'RESULTADOS ESPORO ANIMAL',filename:'RESULTADOS ESPORO ANIMAL',className: 'btn btn-default',text:'<span class="fa fa-print"></span>'},
                    {extend:'colvis',titleAttr: 'Select Colunas',className: 'btn btn-info',text:'<span class="fa fa-list"></span>'} ]
            });

    });
</script>


