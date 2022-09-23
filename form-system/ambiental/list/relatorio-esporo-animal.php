<!-- Este projeto é desenvolvido na Suvis Jaçanã-Tremembé com iniciativa dos colaboradores da Unidade -->
<!-- Código desenvolvido por Rodolfo Romaioli Ribeiro de Jesus - rodolfo.romaioli@gmail.com -->
<!-- Sisdam Web - 2.0 - 2017 - Todos os direitos reservados -->
<!-- Página de Título -->

<?php

error_reporting(1);

// DEFINE O FUSO HORARIO COMO O HORARIO DE BRASILIA
date_default_timezone_set('America/Sao_Paulo');

$cs_sinan = $conectar->query("SELECT CREATE_TIME FROM information_schema.tables WHERE TABLE_NAME = 'esporo_an' ORDER BY `CREATE_TIME` DESC");
$row_sinan = mysqli_fetch_assoc($cs_sinan);

$cs_exame_esporo = $conectar->query("SELECT CREATE_TIME FROM information_schema.tables WHERE TABLE_NAME = 'resultado_esporo' ORDER BY `CREATE_TIME` DESC");
$row_exame_esporo = mysqli_fetch_assoc($cs_exame_esporo);

?>

<!-- Todos os chamamentos javascript e códigos de modal's -->
<script type="text/javascript">
    $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip()

        $('#relatorio-esporo').DataTable({responsive: {details: {display: $.fn.dataTable.Responsive.display.modal({header: function (row) {var data = row.data();
                            return data[10] + ' ' + data[11];}}),renderer: function ( api, rowIdx, columns ) {var data = $.map( columns, function ( col, i ) {
                        return '<tr>'+'<td>'+col.title+':'+'</td> '+'<td>'+col.data+'</td>'+'</tr>';} ).join('');
                        return $('<table/>').append( data ); } } },
            "language": {"sEmptyTable": "Nenhum registro encontrado","sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros","sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                "sInfoFiltered": "(Filtrados de _MAX_ registros)","sInfoThousands": ".","sLengthMenu": "_MENU_ Resultados por Página","sLoadingRecords": "Carregando...",
                "sProcessing": "Processando...","sZeroRecords": "Nenhum registro encontrado","sSearch": "Pesquisar","oPaginate": {"sNext": "Próximo","sPrevious": "Anterior","sFirst": "Primeiro","sLast": "Último"},
                "oAria": {"sSortAscending": "Ordenar colunas de forma ascendente","sPrevious": "Ordenar colunas de forma descendente"}},
            dom: "lBfrtip",processing: true, serverside: true, ajax: 'form-system/ambiental/list/proc-list-ambiental/relatorio-esporo.php',
            "lengthMenu": [[4, 10, 25, 50, -1], [4, 10, 25, 50, "Todos"]],
            "aoColumnDefs": [],
            buttons: [ {extend:'excel',title:'Controle de Acompanhamento de Casos de Esporotricose Animal JT - <?=date('Y')?>',header: 'Controle de Acompanhamento de Casos de Esporotricose Animal JT - <?=date('Y')?>',filename:'Controle de Acompanhamento de Casos de Esporotricose Animal JT - <?=date('Y')?>',className: 'btn btn-success',text:'<span class="fal fa-file-excel"></span>' },
                {extend: 'pdfHtml5',exportOptions: {columns: ':visible'},title:'Controle de Acompanhamento de Casos de Esporotricose Animal JT - <?=date('Y')?>',header: 'Controle de Acompanhamento de Casos de Esporotricose Animal JT - <?=date('Y')?>',filename:'Controle de Acompanhamento de Casos de Esporotricose Animal JT - <?=date('Y')?>',orientation: 'landscape',pageSize: 'LEGAL',className: 'btn btn-danger',text:'<span class="fa fa-file-pdf-o"></span>'},
                {extend:'print',exportOptions: {columns: ':visible'},orientation: 'landscape',title:'Controle de Acompanhamento de Casos de Esporotricose Animal JT - <?=date('Y')?>',header: 'Controle de Acompanhamento de Casos de Esporotricose Animal JT - <?=date('Y')?>',filename:'Controle de Acompanhamento de Casos de Esporotricose Animal JT - <?=date('Y')?>',className: 'btn btn-default',text:'<span class="fa fa-print"></span>'},
                {extend:'colvis',className: 'btn btn-info',text:'<span class="fa fa-list"></span>'} ]
        });
    });
</script>

<!-- Início do HTML 5 da Página-->
<div class="container-fluid" role="main" xmlns="http://www.w3.org/1999/html">
    <!-- Começando a página de Título -->
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <ol class="breadcrumb">
                    <li><i class="fa fa-database"></i> <a href="suvisjt.php">Sisdam Web</a></li>
                    <li class="active">Controle de Casos de Esporotricose Animal</li>
                    <li class="active">Sinan At. em - <?php echo date("d/m/Y",strtotime($row_sinan['CREATE_TIME'])) ; ?> às <?php echo date("H:i:s",strtotime($row_sinan['CREATE_TIME'])) ; ?></li>
                </ol>

                <button type="button"  data-toggle="tooltip" disabled style="opacity: unset" title="Lista de Casos de Esporotricose Animal - JT" class="btn btn-success btn-labeled btn-lg btn-block"><i class="btn-label"><i
                    class="fa fa-file-excel-o"></i></i>CONTROLE DE CASOS - ESPOROTRICOSE ANIMAL - JT</button>

            </div>
        </div>
    </div>

    <!--------------------------------------------- * Tabela de Bloqueios * --------------------------------------->
    <table id="relatorio-esporo" class="table table-hover table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th class="text-center">FICHA Nº</th>
            <th class="text-center">ANO</th>
            <th class="text-center">ORIGEM</th>
            <th class="text-center">DATA ENTRADA</th>
            <th class="text-center">LABORATORIO</th>
            <th class="text-center">LOGRADOURO</th>
            <th class="text-center">NÚMERO</th>
            <th class="text-center">CEP</th>
            <th class="text-center">D.A.</th>
            <th class="text-center">UVIS</th>
            <th class="text-center">ESPECIE</th>
            <th class="text-center">NOME ANIMAL</th>
            <th class="text-center">SEXO</th>
            <th class="text-center">IDADE</th>
            <th class="text-center">DIAGNÓSTICO</th>
            <th class="text-center">RESULTADO LAB.</th>
            <th class="text-center">DATA DO RESULTADO</th>
            <th class="text-center">USO DE ITRACONAZOL</th>
            <th class="text-center">DATA INICIO ITRACONAZOL</th>
            <th class="text-center">DOSE PRESCRITA</th>
            <th class="text-center">DATA FINAL DO TRATAMENTO</th>
            <th class="text-center">DESFECHO</th>
            <th class="text-center">PROPRIETARIO</th>
            <th class="text-center">TELEFONE</th>
            <th class="text-center">DATA DA ÚLTIMA ENTREGA DA MEDICAÇÃO</th>
            <th class="text-center">QUANTIDADE DE MEDICAMENTO ENTREGUE (CÁPSULAS)</th>
            <th class="text-center">DATA DA ÚLTIMA AVALIAÇÃO DO ANIMAL</th>
            <th class="text-center">DATA DA REALIZAÇÃO DE BUSCA ATIVA DE CASOS NO ENTORNO</th>
            <th class="text-center">Nº DE CASOS SUSPEITOS DE ANIMAIS IDENTIFICADOS NA BUSCA ATIVA</th>
            <th class="text-center">CASOS HUMANOS NO DOMICÍLIO (S OU N)</th>
            <th class="text-center">OBSERVAÇÃO</th>
        </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
    <!--------------------------------------------- * Fim da Tabela de Bloqueios * --------------------------------------->

</div>


