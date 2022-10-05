<!-- Este projeto é desenvolvido na Suvis Jaçanã-Tremembé com iniciativa dos colaboradores da Unidade -->
<!-- Código desenvolvido por Rodolfo Romaioli Ribeiro de Jesus - rodolfo.romaioli@gmail.com -->
<!-- Sisdam Web - 2.0 - 2017 - Todos os direitos reservados -->
<!-- Página de Título -->

<?php

error_reporting(1);

$lixo = $_GET['lixeira'] ?? '0';

$contarlixo = $conectar->query("SELECT lixeira FROM esporo_an WHERE lixeira = 1");
$countlixo = $contarlixo->num_rows;

$contar = $conectar->query("SELECT lixeira FROM esporo_an WHERE lixeira = $lixo");
$count = $contar->num_rows;

$cnexamepos = $conectar->query("SELECT resultado_esporo.Resultado FROM resultado_esporo RIGHT JOIN esporo_an ON resultado_esporo.Nr_Pedido = esporo_an.pedido WHERE resultado_esporo.Resultado='Positivo' AND esporo_an.lixeira = $lixo");
$countexamepos = $cnexamepos->num_rows;

$cnexameneg = $conectar->query("SELECT resultado_esporo.Resultado FROM resultado_esporo RIGHT JOIN esporo_an ON resultado_esporo.Nr_Pedido = esporo_an.pedido WHERE resultado_esporo.Resultado='Negativo' AND esporo_an.lixeira = $lixo");
$countexameneg = $cnexameneg->num_rows;

$countexamesex = $count - ($countexamepos + $countexameneg);

$cs_exame_esporo = $conectar->query("SELECT CREATE_TIME FROM information_schema.tables WHERE TABLE_NAME = 'resultado_esporo' ORDER BY `CREATE_TIME` DESC");
$row_exame_esporo = mysqli_fetch_assoc($cs_exame_esporo);

?>

<!-- Todos os chamamentos javascript e códigos de modal's -->
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
            dom: "lBfrtip",processing: true, serverside: true, ajax: 'form-system/ambiental/list/proc-list-ambiental/list-esporo.php?lixeira=<?=$lixo?>',
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
                {"bVisible": false,"aTargets": [1]},
                {"bVisible": false,"aTargets": [4]},
                {"bVisible": false,"aTargets": [6]},
                {"aTargets": [5], // o numero 2 é o nº da coluna
                    "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                        return  '<a target="_blank" href="https://www.google.com.br/maps/dir/?api=1&origin=R. Maria Amália Lopes Azevedo, 3676 - Vila Albertina&destination=' + full[5] + '&travelmode=driving" role="button" class="btn btn-default rounded-circle"><img src="imagens/maps_64dp.png" width="20"></a> ' +
                            full[5] ;
                    }
                },
                {"aTargets": [7], // o numero de telefone
                    "mRender": function (data, type, full) {

                        return  full[7];
                    }
                },
                {"aTargets": [9], // o numero 2 é o nº da coluna
                    "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                        return  full[20] + '<br>' + full[21];
                    }
                },
                {"aTargets": [10], // o numero 2 é o nº da coluna
                    "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                        return  full[9] + '<br>' + full[10];
                    }
                },
                {"aTargets": [11], // o numero 2 é o nº da coluna
                    "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                        return  full[11] + '<br>' + full[12] + '<br>' + full[13] + '<br>' + full[14];
                    }
                },
                {"aTargets": [12], // o numero 2 é o nº da coluna
                    "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                        return  full[15];
                    }
                },
                <?php if($lixo === '1'):?>
                {
                    "aTargets": [3], // o numero 6 é o nº da coluna
                    "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                        return '<a href="#" role="button" class="btn btn-danger rounded-circle disabled"><strong><span class="fa fa-ban"></strong></a>';
                    }
                },
                {
                    "aTargets": [13], // o numero 6 é o nº da coluna
                    "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                        return '<div class="modal fade" id="ModalLixoEsp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">' +
                            '<div class="modal-dialog modal-sm"><div class="modal-content"><div class="modal-header-warning">' +
                            '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                            '<h3 class="modal-title-dark text-center"><i class="fa fa-trash-alt"></i>&nbsp;&nbsp; Reativar ' + full[4] + '</h3></div>' +
                            '<div class="modal-body"><h3 class="text-center"> Deseja reativar ' + full[4] + ' - ' + full[3] + ' ?</h3></div>' +
                            '<div class="modal-footer text-center"><button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-minus-octagon"></i>  NÃO</button>' +
                            '&nbsp;&nbsp;&nbsp;&nbsp;<a href="suvisjt.php?pag=proc-edit-esporo-animal&id='+ full[16]+'&nm_tutor='+ full[6] + '&nm_animal='+ full[3] + '&acao=reativar" role="button" class="btn btn-success"><i class="fa fa-check-circle-o"></i><strong>  SIM</strong></a></div></div></div></div>' +
                            '<button type="button" class="btn btn-warning rounded-circle" data-toggle="modal" data-target="#ModalLixoEsp"><i class="fa fa-arrow-alt-circle-up"></i></button>';
                    }
                },
                <?php else : ?>
                {
                    "aTargets": [3], // o numero 6 é o nº da coluna
                    "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                        return full[3] + ' <a href="suvisjt.php?pag=edit-esporo-animal&id='+ full[16]+'" role="button" class="btn btn-warning rounded-circle"><strong><span class="glyphicon glyphicon-pencil"></strong></a>';
                    }
                },
                {
                    "aTargets": [13], // o numero 6 é o nº da coluna
                    "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                        return '<div class="modal fade" id="ModalLixoEsp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">' +
                            '<div class="modal-dialog modal-sm"><div class="modal-content"><div class="modal-header-danger">' +
                            '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                            '<h3 class="modal-title text-center"><i class="fa fa-trash-alt"></i>&nbsp;&nbsp; Deletar ' + full[4] + '</h3></div>' +
                            '<div class="modal-body"><h3 class="text-center"> Deseja apagar ' + full[4] + ' - ' + full[3] + ' ?</h3></div>' +
                            '<div class="modal-footer text-center"><button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-minus-octagon"></i>  NÃO</button>' +
                            '&nbsp;&nbsp;&nbsp;&nbsp;<a href="suvisjt.php?pag=proc-edit-esporo-animal&id='+ full[16]+'&nm_tutor='+ full[6] + '&nm_animal='+ full[3] + '&acao=deletar" role="button" class="btn btn-success"><i class="fa fa-check-circle-o"></i><strong>  SIM</strong></a></div></div></div></div>' +
                            '<button type="button" class="btn btn-danger rounded-circle" data-toggle="modal" data-target="#ModalLixoEsp"><i class="fa fa-trash-alt"></i></button>';
                    }
                },
                <?php endif; ?>
            ],
            buttons: [ {extend:'excel',title:'ESPOROTRICOSE ANIMAL - JT <?php echo date('Y');?>',header: 'ESPOROTRICOSE ANIMAL - JT <?php echo date('Y');?>',filename:'ESPOROTRICOSE ANIMAL - JT <?php echo date('Y');?>',className: 'btn btn-success',text:'<span class="fal fa-file-excel"></span>' },
                {extend: 'pdfHtml5',exportOptions: {columns: ':visible'},title:'ESPOROTRICOSE ANIMAL - JT <?php echo date('Y');?>',header: 'ESPOROTRICOSE ANIMAL - JT <?php echo date('Y');?>',filename:'ESPOROTRICOSE ANIMAL - JT <?php echo date('Y');?>',orientation: 'landscape',pageSize: 'LEGAL',className: 'btn btn-danger',text:'<span class="fa fa-file-pdf-o"></span>'},
                {extend:'print',exportOptions: {columns: ':visible'},title:'ESPOROTRICOSE ANIMAL - JT <?php echo date('Y');?>',header: 'ESPOROTRICOSE ANIMAL - JT <?php echo date('Y');?>',filename:'ESPOROTRICOSE ANIMAL - JT <?php echo date('Y');?>',className: 'btn btn-default',text:'<span class="fa fa-print"></span>'},
                {extend:'colvis',className: 'btn btn-info',text:'<span class="fa fa-list"></span>'} ]
        });
    });
</script>

<?php

// DEFINE O FUSO HORARIO COMO O HORARIO DE BRASILIA
date_default_timezone_set('America/Sao_Paulo');

$consulta_e = $conectar->query("SELECT SUM(esporo_an_ent_medc.qtd_esp_medc) AS entrada FROM esporo_an_ent_medc WHERE lixeira<>1");
$consulta_s = $conectar->query("SELECT SUM(esporo_an_sd_medc.qtd_medc) AS saida FROM esporo_an_sd_medc WHERE lixeira<>1");

while ($row = $consulta_e->fetch_assoc()) : $total_e = $row['entrada'];endwhile;
while ($row = $consulta_s->fetch_assoc()) : $total_s = $row['saida']; endwhile;
$total_r = $total_e - $total_s;
$total_p = substr($total_r, 1);

?>

<!-- Início do HTML 5 da Página-->
<div class="container-fluid" role="main" xmlns="http://www.w3.org/1999/html">
    <!-- Começando a página de Título -->
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <ol class="breadcrumb">
                    <li><i class="fa fa-database"></i> <a href="suvisjt.php">Sisdam Web</a></li>
                    <li class="active">Lista de Esporotricose Animal</li>
                    <li class="active">Exames At. em - <?php echo date("d/m/Y",strtotime($row_exame_esporo['CREATE_TIME'])) ; ?> às <?php echo date("H:i:s",strtotime($row_exame_esporo['CREATE_TIME'])) ; ?></li>
                    <li class="active">Resultados : Positivos <span role="button" class="btn btn-danger rounded-circle"><?=$countexamepos?></span>
                    <li class="active">Negativos <span role="button" class="btn btn-success rounded-circle"><?=$countexameneg?></span>
                    <li class="active">Sem Coleta <span role="button" class="btn btn-warning rounded-circle"><?=$countexamesex?></span>
                </ol>

                <button type="button"  data-toggle="tooltip" title="Lista de Casos de Esporotricose Animal - JT" class="btn btn-<?php if($lixo === '1') : echo 'default'; else : echo 'dark'; endif; ?> btn-labeled btn-lg btn-block"><i class="btn-label"><i
                    class="fa fa-<?php if($lixo === '1') : echo 'trash-alt'; else : echo 'pills'; endif; ?>"></i></i><?php if($lixo === '1') : echo 'LIXEIRA '; else : echo 'LISTA'; endif; ?>DE CASOS - ESPOROTRICOSE ANIMAL - JT</button>

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

    <?php if ($lixo === '0') : ?>
        <div class="row espaco">
            <div class="col-md-3"><div class="panel panel-success"><div class="panel-heading"><strong>TOTAL DE ENTRADAS</strong></div><div class="panel-body">
                        <?php if($total_e < 1) : echo '<p><strong style="color: #1c7430">ITRACONAZOL 100 MG : 0 CÁPSULAS</strong>';
                        else : echo '<strong style="color: #1c7430">ITRACONAZOL 100 MG : '.$total_e.' CÁPSULAS</strong>'; endif;?>
                    </div></div></div>
            <div class="col-md-3"><div class="panel panel-danger"><div class="panel-heading"><strong>TOTAL DE SAÍDAS</strong></div><div class="panel-body">
                        <?php if($total_e < 1) : echo '<p><strong style="color: #9f191f">ITRACONAZOL 100 MG : 0 CÁPSULAS</strong>';
                        else : echo '<strong style="color: #9f191f">ITRACONAZOL 100 MG : '.$total_s.' CÁPSULAS</strong>'; endif;?>
                    </div></div></div>
            <div class="col-md-3"><div class="panel panel-primary"><div class="panel-heading"><strong>TOTAL DE ESTOQUE</strong></div><div class="panel-body">
                        <?php if($total_e < 1) : echo '<p><strong style="color: #0d6aad">ITRACONAZOL 100 MG : 0 CÁPSULAS</strong>';
                        else : echo '<strong style="color: #0d6aad">ITRACONAZOL 100 MG : '.$total_r.' CÁPSULAS</strong>'; endif;?>
                    </div></div></div>
            <div class="col-md-3"><div class="panel panel-warning"><div class="panel-heading"><strong>MEDICAMENTO A SOLICITAR</strong></div><div class="panel-body">
                        <?php if($total_r < 0) : echo '<strong style="color: #e0a800">ITRACONAZOL 100 MG : '.$total_p.' CÁPSULAS</strong>';
                        else : echo '<strong style="color: #e0a800">ITRACONAZOL 100 MG : 0 CÁPSULAS</strong>'; endif;?>
                    </div></div></div>
        </div>
    <?php endif;?>

    <div class="row espaco">
        <div class="text-center">
            <?php if($lixo === '0' && $_SESSION['usuarioNivelAcesso'] <> "") : ?>
                <a href="suvisjt.php?pag=cadastro-esporotricose-animal" role="button" style="';
                    <?php if ($_SESSION['usuarioNivelAcesso'] == 4) : echo 'display: none;';  endif;?>" accesskey="N" data-toggle="tooltip" title="Lista de Medicamentos de Esporotricose Animal - JT"
                   class="btn btn-labeled btn-success mb-2 mr-sm-4"><span class="btn-label"><i class="fa fa-plus-circle"></i> </span> <u>N</u>OVO</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="suvisjt.php?pag=relatorio-esporotricose-animal" role="button" style="color: #1c7430; border-color: #1c7430" accesskey="C" data-toggle="tooltip" title="Controle de Acompanhamento de Casos de Esporotricose Animal JT - <?=date('Y')?>"
                   class="btn btn-labeled btn-success mb-2 mr-sm-4"><span class="btn-label"><i class="fa fa-file-excel-o"></i> </span> <u>C</u>ONT. AC.</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="suvisjt.php?pag=listar-medicamentos-esporotricose-animal" role="button" accesskey="E" data-toggle="tooltip" title="SAÍDAS DE MEDICAMENTOS"
                   class="btn btn-labeled btn-success mb-2 mr-sm-4"><span class="btn-label"><i class="fa fa-pills"></i></span> <u>E</u>NTRADAS</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="suvisjt.php?pag=listar-saida-de-medicamentos-esporotricose-animal" role="button" accesskey="S" data-toggle="tooltip" title="SAÍDAS DE MEDICAMENTOS"
                   class="btn btn-labeled btn-danger mb-2 mr-sm-4"><span class="btn-label"><i class="fa fa-pills"></i></span> <u>S</u>AÍDAS</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <?php if($countlixo >= '1' && $_SESSION['usuarioNivelAcesso'] <> "") : ?>
                    <a href="suvisjt.php?pag=listar-esporotricose-animal&lixeira=1" role="button" accesskey="L" data-toggle="tooltip" title="LIXEIRA"
                       class="btn btn-labeled btn-default mb-2 mr-sm-4"><span class="btn-label"><i class="fa fa-trash-alt"></i></span><span class="badge" style="background-color: #c9302c"><?=$countlixo?></span> &nbsp;<u>L</u>IXEIRA</a>
                <?php endif;
                elseif ($countlixo >= '1' && $lixo === '1') : ?>
                <a href="suvisjt.php?pag=listar-esporotricose-animal" role="button" accesskey="L" data-toggle="tooltip" title="SAIR DA LIXEIRA"
                   class="btn btn-labeled btn-warning mb-2 mr-sm-4"><span class="btn-label"><i class="fa fa-arrow-alt-circle-left"></i></span><u>V</u>OLTAR</a>
            <?php
                else : echo '';
            endif;
            ?>

        </div>
    </div>

    <!--------------------------------------------- * Tabela de Bloqueios * --------------------------------------->
    <table id="list-esporo" class="table table-hover table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th class="text-center">NVE</th>
            <th class="text-center">ANO</th>
            <th class="text-center"><i class="fal fa-thin fa-calendar"></i> INÍCIO</th>
            <th class="text-center"><i class="fal fa-light fa-cat"></i> <i class="fal fa-light fa-dog"></i> ANIMAL</th>
            <th class="text-center">ESPECIE</th>
            <th class="text-center"><i class="fal fa-light fa-map-pin"></i> ENDEREÇO</th>
            <th class="text-center">PROPRIETÁRIO</th>
            <th class="text-center"><i class="fal fa-light fa-phone"></i> TELEFONE</th>
            <th class="text-center"><i class="fal fa-question"></i> SITUAÇÃO</th>
            <th class="text-center"><i class="fal fa-vials"></i> EXAME</th>
            <th class="text-center"><i class="fal fa-light fa-briefcase-medical"></i> MEDICAMENTO</th>
            <th class="text-center"><i class="fal fa-thin fa-calendar"></i> ÚLT. ENTREGA</th>
            <th class="text-center"><i class="fal fa-exclamation"></i> OBSERVAÇÃO</th>
            <th><?php if($lixo === '1'): echo '<i class="fal fa-thin fa-arrow-alt-circle-up"></i> REATIVAR'; else : echo '<i class="fal fa-thin fa-trash-alt"></i> LIXO'; endif; ?></th>
        </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
    <!--------------------------------------------- * Fim da Tabela de Bloqueios * --------------------------------------->

</div>


