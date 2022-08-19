<!-- Este projeto é desenvolvido na Suvis Jaçanã-Tremembé com iniciativa dos colaboradores da Unidade -->
<!-- Código desenvolvido por Rodolfo Romaioli Ribeiro de Jesus - rodolfo.romaioli@gmail.com -->
<!-- Sisdam Web - 2.0 - 2017 - Todos os direitos reservados -->
<!-- Página de Título -->

<?php

error_reporting(1);

//Algumas funções da tabela
include_once 'functions.php';

?>
//Todos os chamamentos javascript e códigos de modal's
<script type="text/javascript">
    $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip()

        $('#list-esporo').DataTable({responsive: {details: {display: $.fn.dataTable.Responsive.display.modal({header: function (row) {var data = row.data();
                            return data[5] + ' ' + data[4];}}),renderer: function ( api, rowIdx, columns ) {var data = $.map( columns, function ( col, i ) {
                        return '<tr>'+'<td>'+col.title+':'+'</td> '+'<td>'+col.data+'</td>'+'</tr>';} ).join('');
                        return $('<table/>').append( data ); } } },
            "language": {"sEmptyTable": "Nenhum registro encontrado","sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros","sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                "sInfoFiltered": "(Filtrados de _MAX_ registros)","sInfoThousands": ".","sLengthMenu": "_MENU_ Resultados por Página","sLoadingRecords": "Carregando...",
                "sProcessing": "Processando...","sZeroRecords": "Nenhum registro encontrado","sSearch": "Pesquisar","oPaginate": {"sNext": "Próximo","sPrevious": "Anterior","sFirst": "Primeiro","sLast": "Último"},
                "oAria": {"sSortAscending": "Ordenar colunas de forma ascendente","sPrevious": "Ordenar colunas de forma descendente"}},
            dom: "lBfrtip",processing: true, serverside: true, ajax: 'form-system/ambiental/list/proc-list-ambiental/list-esporo.php',
            "lengthMenu": [[4, 10, 25, 50, -1], [4, 10, 25, 50, "Todos"]],
            order: [[6, 'asc'], [5, 'asc']],
            rowGroup: {
                dataSrc: [6, 4 ]
            },
            columnDefs: [ {
                targets: [ 4, 7 ],
                visible: false
            } ],
            "aoColumnDefs": [
                {"bVisible": false,"aTargets": [4]},
                {"bVisible": false,"aTargets": [6]},
                {
                    "aTargets": [3], // o numero 6 é o nº da coluna
                    "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                        return full[3] + ' <a href="suvisjt.php?pag=edit-esporo-animal&id='+ full[16]+'" role="button" class="btn btn-warning rounded-circle"><strong><span class="glyphicon glyphicon-pencil"></strong></a>';
                    }
                },
                {"aTargets": [5], // o numero 2 é o nº da coluna
                    "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                        return  '<a target="_blank" href="https://www.google.com.br/maps/dir/?api=1&origin=R. Maria Amália Lopes Azevedo, 3676 - Vila Albertina&destination=' + full[5] + '&travelmode=driving" role="button" class="btn btn-default rounded-circle"><img src="imagens/maps_64dp.png" width="20"></a> ' +
                            full[5] ;
                    }
                },
                {"aTargets": [7], // o numero 2 é o nº da coluna
                    "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids

                        return  full[7] + '<br> ' + full[17];
                    }
                },
                {"aTargets": [9], // o numero 2 é o nº da coluna
                    "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                        return  full[9] + '<br>' + full[10];
                    }
                },
                {"aTargets": [10], // o numero 2 é o nº da coluna
                    "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                        return  full[11] + '<br>' + full[12] + '<br>' + full[13] + '<br>' + full[14];
                    }
                },
                {"aTargets": [11], // o numero 2 é o nº da coluna
                    "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                        return  full[15];
                    }
                }
            ],
            buttons: [ {extend:'excel',title:'PE / IE <?php echo date('Y');?>',header: 'PE / IE <?php echo date('Y');?>',filename:'PE / IE <?php echo date('Y');?>',className: 'btn btn-success',text:'<span class="fal fa-file-excel"></span>' },
                {extend: 'pdfHtml5',exportOptions: {columns: ':visible'},title:'PE / IE <?php echo date('Y');?>',header: 'PE / IE <?php echo date('Y');?>',filename:'PE / IE <?php echo date('Y');?>',orientation: 'landscape',pageSize: 'LEGAL',className: 'btn btn-danger',text:'<span class="fa fa-file-pdf-o"></span>'},
                {extend:'print',exportOptions: {columns: ':visible'},title:'PE / IE <?php echo date('Y');?>',header: 'PE / IE <?php echo date('Y');?>',filename:'PE / IE <?php echo date('Y');?>',className: 'btn btn-default',text:'<span class="fa fa-print"></span>'},
                {extend:'colvis',className: 'btn btn-info',text:'<span class="fa fa-list"></span>'} ]
        });
    });
</script>

<?php

// DEFINE O FUSO HORARIO COMO O HORARIO DE BRASILIA
date_default_timezone_set('America/Sao_Paulo');

?>

<!-- Início do HTML 5 da Página-->
<div class="container-fluid" role="main" xmlns="http://www.w3.org/1999/html">
    <!-- Começando a página de Título -->
    <div class="row">
        <div class="col-md-12"><div class="page-header">
                <ol class="breadcrumb">
                    <li><i class="fa fa-database"></i> <a href="suvisjt.php">Sisdam Web</a></li>
                    <li class="active">Lista de Esporotricose Animal</li>
                </ol>
                <button type="button"  data-toggle="tooltip" title="Lista de Casos de Esporotricose Animal - JT" class="btn btn-dark btn-labeled btn-lg btn-block"><i class="btn-label"><i
                                class="glyphicon glyphicon-picture"></i></i>LISTA DE ESPOROTRICOSE ANIMAL - JT</button>

                <!--<img id="logo-img" class="img-responsive center-block" alt="Responsive image" src="imagens/manutencao-desculpe.jpg"/>-->

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

    <div class="row espaco">
        <div class="text-center">
            <a href='suvisjt.php?pag=cad-esporo-animal'
            <button type='button' style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                echo 'display: none;';
            } ?>" accesskey="N" data-toggle="tooltip" title="Lista de Casos de Esporotricose Animal - JT"
                    class="btn btn-success"><i class="glyphicon glyphicon-plus-sign"></i> <u>N</u>OVO</button>
            </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </div>
    </div>
    <!-- Terminando a página de Título -->

    <!--------------------------------------------- * Tabela de Bloqueios * --------------------------------------->
    <table id="list-esporo" class="table table-hover table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th class="text-center">NVE</th>
            <th class="text-center">ANO</th>
            <th class="text-center"><i class="fal fa-thin fa-calendar"></i> INÍCIO</th>
            <th class="text-center"><i class="fal fa-light fa-cat"></i> / <i class="fal fa-light fa-dog"></i> ANIMAL</th>
            <th class="text-center">ESPECIE</th>
            <th class="text-center"><i class="fal fa-light fa-map-pin"></i> ENDEREÇO</th>
            <th class="text-center">PROPRIETÁRIO</th>
            <th class="text-center"><i class="fal fa-light fa-phone"></i> TELEFONE</th>
            <th class="text-center"><i class="fal fa-question"></i> SITUAÇÃO</th>
            <th class="text-center"><i class="fal fa-light fa-briefcase-medical"></i> MEDICAMENTO</th>
            <th class="text-center"><i class="fal fa-thin fa-calendar"></i> ÚLT. ENTREGA</th>
            <th class="text-center"><i class="fal fa-exclamation"></i> OBSERVAÇÃO</th>
        </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
    <!--------------------------------------------- * Fim da Tabela de Bloqueios * --------------------------------------->

</div>


