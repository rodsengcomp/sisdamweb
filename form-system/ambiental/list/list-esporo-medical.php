<!-- Este projeto é desenvolvido na Suvis Jaçanã-Tremembé com iniciativa dos colaboradores da Unidade -->
<!-- Código desenvolvido por Rodolfo Romaioli Ribeiro de Jesus - rodolfo.romaioli@gmail.com -->
<!-- Sisdam Web - 2.0 - 2017 - Todos os direitos reservados -->
<!-- Página de Título -->

<?php

error_reporting(1);

?>
//Todos os chamamentos javascript e códigos de modal's
<script type="text/javascript">
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip()

        $('#list-esporo-medical').DataTable({responsive: {details: {display: $.fn.dataTable.Responsive.display.modal({header: function (row) {var data = row.data();
                            return data[5] + ' ' + data[4];}}),renderer: function ( api, rowIdx, columns ) {var data = $.map( columns, function ( col, i ) {
                        return '<tr>'+'<td>'+col.title+':'+'</td> '+'<td>'+col.data+'</td>'+'</tr>';} ).join('');
                        return $('<table/>').append( data ); } } },
            "language": {"sEmptyTable": "Nenhum registro encontrado","sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros","sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                "sInfoFiltered": "(Filtrados de _MAX_ registros)","sInfoThousands": ".","sLengthMenu": "_MENU_ Resultados por Página","sLoadingRecords": "Carregando...",
                "sProcessing": "Processando...","sZeroRecords": "Nenhum registro encontrado","sSearch": "Pesquisar","oPaginate": {"sNext": "Próximo","sPrevious": "Anterior","sFirst": "Primeiro","sLast": "Último"},
                "oAria": {"sSortAscending": "Ordenar colunas de forma ascendente","sPrevious": "Ordenar colunas de forma descendente"}},
            dom: "lBfrtip",processing: true, serverside: true, ajax: 'form-system/ambiental/list/proc-list-ambiental/list-esporo-medical.php',
            "lengthMenu": [[4, 10, 25, 50, -1], [4, 10, 25, 50, "Todos"]],
            "aoColumnDefs": [
                {
                    "aTargets": [0], // o numero 6 é o nº da coluna
                    "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                        return '<a href="suvisjt.php?pag=edicao-esporo-animal-medicamentos&id='+ full[0]+'" role="button" class="btn btn-warning rounded-circle"><strong><span class="fa fa-pencil"></strong></a>';
                    }
                },
                {
                    "aTargets": [2], // o numero 6 é o nº da coluna
                    "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                        return full[2] + ' MG';
                    }
                },
                {
                    "aTargets": [3], // o numero 6 é o nº da coluna
                    "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                        return full[3] + ' CPS';
                    }
                },
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
                            class="fa fa-pills"></i></i>LISTA DE MEDICAMENTOS - ESPOROTRICOSE ANIMAL - JT</button>

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
            <a href='suvisjt.php?pag=cadastro-medicamento-esporo-animal'
            <button type='button' style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                echo 'display: none;';
            } ?>" accesskey="N" data-toggle="tooltip" title="Lista de Medicamentos de Esporotricose Animal - JT"
                    class="btn btn-labeled btn-success"><span class="btn-label"><i class="fa fa-plus-circle"></i> </span> <u>N</u>OVO</button>
            </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </div>
    </div>
    <!-- Terminando a página de Título -->

    <!--------------------------------------------- * Tabela de Bloqueios * --------------------------------------->
    <table id="list-esporo-medical" class="table table-hover table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th class="text-center"><i class="fal fa-pencil"></i> EDITAR</th>
            <th class="text-center"><i class="fal fa-pills"></i> MEDICAMENTO</th>
            <th class="text-center"><i class="fal fa-pills"></i> DOSAGEM</th>
            <th class="text-center"><i class="fal fa-pills"></i> QUANTIDADE</th>
            <th class="text-center"><i class="fal fa-user"></i> CADASTRO</th>
            <th class="text-center"><i class="fal fa-thin fa-calendar"></i> DT. CADASTRO</th>
        </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
    <!--------------------------------------------- * Fim da Tabela de Bloqueios * --------------------------------------->

</div>


