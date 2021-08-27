<!-- Este projeto é desenvolvido na Suvis Jaçanã-Tremembé com iniciativa dos colaboradores da Unidade -->
<!-- Código desenvolvido por Rodolfo Romaioli Ribeiro de Jesus - rodolfo.romaioli@gmail.com -->
<!-- Sisdam Web - 2.0 - 2017 - Todos os direitos reservados -->

<script type="text/javascript">
$(document).ready(function() {
$('#list-ial-dengue').DataTable({responsive: {details: {display: $.fn.dataTable.Responsive.display.modal({header: function (row) {var data = row.data();
return 'Detalhes do Sinan : ' + data[1];}}),renderer: function ( api, rowIdx, columns ) {var data = $.map( columns, function ( col, i ) {
return '<tr>'+'<td>'+col.title+':'+'</td> '+'<td>'+col.data+'</td>'+'</tr>';} ).join('');
return $('<table/>').append( data ); } } },
"language": {"sEmptyTable": "Nenhum registro encontrado","sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros","sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
"sInfoFiltered": "(Filtrados de _MAX_ registros)","sInfoThousands": ".","sLengthMenu": "_MENU_ Resultados por Página","sLoadingRecords": "Carregando...",
"sProcessing": "Processando...","sZeroRecords": "Nenhum registro encontrado","sSearch": "Pesquisar","oPaginate": {"sNext": "Próximo","sPrevious": "Anterior","sFirst": "Primeiro","sLast": "Último"},
"oAria": {"sSortAscending": "Ordenar colunas de forma ascendente","sPrevious": "Ordenar colunas de forma descendente"}},
dom: "lBfrtip",processing: true, serverside: true, ajax: 'form-system/ambiental/list/proc-list-ambiental/list-ial-dengue-sinan.php',
"lengthMenu": [[4, 10, 25, 50, -1], [4, 10, 25, 50, "Todos"]], "aaSorting": [ 0, 'desc' ],
"aoColumnDefs": [
{ type: 'de_datetime', targets: 3 },
{ type: 'de_datetime', targets: 4 },
{ type: 'de_datetime', targets: 5 },
{"bVisible": false,"aTargets": [3]},
{"bVisible": false,"aTargets": [6]},
{"bVisible": false,"aTargets": [10]},
{"bVisible": false,"aTargets": [13]},
{"bVisible": false,"aTargets": [15]},
//{"aTargets": [2], // o numero 2 é o nº da coluna
//"mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
//return full[2] + '\n' +full[3] + '\n' +full[4] ;
//}
//}
{
"aTargets": [1], // o numero é o nº da coluna
"mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
return '<a target="_blank" href="https://gal.saude.sp.gov.br/gal/bmh/consulta-paciente-laboratorio/imprimir-resultado/?requisicoes=[%22'+ full [1] +'%22]">'+ full[1] +'</a>';
}
},
{
    "aTargets": [8], // o numero é o nº da coluna
    "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
        var ialgal = full[8];
        switch (ialgal) {
            case ' \r':
                ialgal = '<a target="_blank" href="https://gal.saude.sp.gov.br/gal/bmh/consulta-paciente-laboratorio/imprimir-resultado/?requisicoes=[%22'+ full [1] +'%22]" role="button" class="btn btn-primary rounded-circle">ANAL<br>ISE</a>';
                break;
            case 'Resultado: Inconclusivo':
                ialgal = '<a target="_blank" href="https://gal.saude.sp.gov.br/gal/bmh/consulta-paciente-laboratorio/imprimir-resultado/?requisicoes=[%22'+ full [1] +'%22]" role="button" class="btn btn-info rounded-circle">INCO<br>NC</a>';
                break;
            case 'Resultado: Indeterminado':
                ialgal = '<a target="_blank" href="https://gal.saude.sp.gov.br/gal/bmh/consulta-paciente-laboratorio/imprimir-resultado/?requisicoes=[%22'+ full [1] +'%22]" role="button" class="btn btn-default rounded-circle">INDE<br>TER</a>';
                break;
            case 'Resultado: Não Detectável':
                ialgal = '<a target="_blank" href="https://gal.saude.sp.gov.br/gal/bmh/consulta-paciente-laboratorio/imprimir-resultado/?requisicoes=[%22'+ full [1] +'%22]" role="button" class="btn btn-success rounded-circle">PCR<br> NEG</a>';
                break;
            case 'Resultado: Não Reagente':
                ialgal = '<a target="_blank" href="https://gal.saude.sp.gov.br/gal/bmh/consulta-paciente-laboratorio/imprimir-resultado/?requisicoes=[%22'+ full [1] +'%22]" role="button" class="btn btn-success rounded-circle">IGM<br>NEG</a>';
                break;
            case 'Resultado: Detectável':
                ialgal = '<a target="_blank" href="https://gal.saude.sp.gov.br/gal/bmh/consulta-paciente-laboratorio/imprimir-resultado/?requisicoes=[%22'+ full [1] +'%22]" role="button" class="btn btn-danger rounded-circle">PCR<br>POS</a>';
                break;
            case 'Resultado: Reagente':
                ialgal = '<a target="_blank" href="https://gal.saude.sp.gov.br/gal/bmh/consulta-paciente-laboratorio/imprimir-resultado/?requisicoes=[%22'+ full [1] +'%22]" role="button" class="btn btn-danger rounded-circle">IGM<br>POS</a>';
                break;
            default: ialgal = '<a target="_blank" href="https://gal.saude.sp.gov.br/gal/bmh/consulta-paciente-laboratorio/imprimir-resultado/?requisicoes=[%22'+ full [1] +'%22]" title="Desativado" role="button" class="btn btn-warning rounded-circle">SEM<br>COL</a>';
        }
        return ialgal;
    }
}
],
buttons: [ {extend:'excel',title:'RESULTADOS <?php echo $agravo;?>',header: 'RESULTADOS <?php echo $agravo;?>',filename:'RESULTADOS <?php echo $agravo;?>',className: 'btn btn-success',text:'<span class="fa fa-file-excel-o"></span>' },
{extend: 'pdfHtml5',exportOptions: {columns: ':visible'},title:'RESULTADOS <?php echo $agravo;?>',header: 'RESULTADOS <?php echo $agravo;?>',filename:'RESULTADOS <?php echo $agravo;?>',orientation: 'landscape',pageSize: 'LEGAL',className: 'btn btn-danger',text:'<span class="fa fa-file-pdf-o"></span>'},
{extend:'print', exportOptions: {columns: ':visible'},orientation: 'landscape',title:'RESULTADOS <?php echo $agravo;?>',header: 'RESULTADOS <?php echo $agravo;?>',filename:'RESULTADOS <?php echo $agravo;?>',className: 'btn btn-default',text:'<span class="fa fa-print"></span>'},
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

    $result_table_febre_a = "SELECT CREATE_TIME FROM information_schema.tables WHERE TABLE_NAME = 'dengnet' ORDER BY `CREATE_TIME` DESC";
    $result_febre_a = $conectar->query($result_table_febre_a);
    $row_result_febre_a = mysqli_fetch_assoc($result_febre_a);

    $result_table_ial_febre_a = "SELECT CREATE_TIME FROM information_schema.tables WHERE TABLE_NAME = 'dengue_ial' ORDER BY `CREATE_TIME` DESC";
    $result_ial_febre_a = $conectar->query($result_table_ial_febre_a);
    $row_result_ial_febre_a = mysqli_fetch_assoc($result_ial_febre_a);

    ?>

    <!-- begin PAGE TITLE ROW -->
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <ol class="breadcrumb">
                    <li><i class="fa fa-database"></i> <a href="suvisjt.php">Sisdam Web</a></li>
                    <li class="active">At. Sinan - <?php echo date("d/m/Y",strtotime($row_result_febre_a['CREATE_TIME'])) ; ?> às
                        <?php echo date("H:i:s",strtotime($row_result_febre_a['CREATE_TIME'])) ; ?></li>
                    <li class="active">At. IAL - <?php echo date("d/m/Y",strtotime($row_result_ial_febre_a['CREATE_TIME'])) ; ?> às
                        <?php echo date("H:i:s",strtotime($row_result_ial_febre_a['CREATE_TIME'])) ; ?></li>
                </ol>
                <button type="button" class="btn btn-danger btn-labeled btn-lg btn-block"><span class="btn-label"><i
                    class="glyphicon glyphicon-list"></i></span> IAL DENGUE - <?php echo $today = date("Y");   ?></button>
            </div>
        </div>
    </div>
    <!-- /.row -->

    <table id="list-ial-dengue" class="table table-hover table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th class="text-center">SINAN</th>
            <th class="text-center">REQUISIÇÃO</th>
            <th class="text-center">PACIENTE</th>
            <th class="text-center">DT. CAD</th>
            <th class="text-center">DT. REC.</th>
            <th class="text-center">DT. LIB.</th>
            <th class="text-center">STATUS</th>
            <th class="text-center">EXAME</th>
            <th class="text-center">RESULTADO</th>
            <th class="text-center">MÉTODO</th>
            <th class="text-center">AMOSTRA</th>
            <th class="text-center">C N S</th>
            <th class="text-center">M. RESID.</th>
            <th class="text-center">UF. RES.</th>
            <th class="text-center">REQUISITANTE</th>
            <th class="text-center">MUN. REQ.</th>
            <th class="text-center">MATERIAL</th>
            <th class="text-center">LAB. CAD.</th>
            <th class="text-center">LAB. EX.</th>
        </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</div>