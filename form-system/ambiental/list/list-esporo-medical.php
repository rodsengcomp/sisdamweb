<!-- Este projeto é desenvolvido na Suvis Jaçanã-Tremembé com iniciativa dos colaboradores da Unidade -->
<!-- Código desenvolvido por Rodolfo Romaioli Ribeiro de Jesus - rodolfo.romaioli@gmail.com -->
<!-- Sisdam Web - 2.0 - 2017 - Todos os direitos reservados -->
<!-- Página de Título -->

<?php

error_reporting(1);

$lixo = $_GET['lixeira'] ?? '0';

$contarlixo_medc_ent = $conectar->query("SELECT lixeira FROM esporo_an_ent_medc WHERE lixeira = 1");
$countlixo_medc_ent = $contarlixo_medc_ent->num_rows;

?>
<!-- Todos os chamamentos javascript-->
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
            dom: "lBfrtip",processing: true, serverside: true, ajax: 'form-system/ambiental/list/proc-list-ambiental/list-esporo-medical.php?lixeira=<?=$lixo?>',
            "lengthMenu": [[4, 10, 25, 50, -1], [4, 10, 25, 50, "Todos"]],
            "aoColumnDefs": [
                //{"bVisible": false,"aTargets": [7]},
                {
                    "aTargets": [3], // o numero 6 é o nº da coluna
                    "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                        return full[3] + ' MG';
                    }
                },
                {
                    "aTargets": [4], // o numero 6 é o nº da coluna
                    "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                        return full[4] + ' CPS';
                    }
                },
                <?php if($lixo === '1'):?>
                {
                    "aTargets": [0], // o numero 6 é o nº da coluna
                    "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                        return '<a href="#" role="button" class="btn btn-danger rounded-circle disabled"><strong><span class="fa fa-ban"></strong></a>';
                    }
                },
                {
                    "aTargets": [7], // o numero 6 é o nº da coluna
                    "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                        return '<div class="modal fade" id="ModalLixoEsp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">' +
                            '<div class="modal-dialog modal-sm"><div class="modal-content"><div class="modal-header-warning">' +
                            '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                            '<h3 class="modal-title-dark text-center"><i class="fa fa-trash-alt"></i>&nbsp;&nbsp; Reativar Medicamento</h3></div>' +
                            '<div class="modal-body"><h3 class="text-center"> Deseja reativar ' + full[2] + ' - ' + full[4] + ' Cápsulas ?</h3></div>' +
                            '<div class="modal-footer text-center"><button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-minus-octagon"></i>  NÃO</button>' +
                            '&nbsp;&nbsp;&nbsp;&nbsp;<a href="suvisjt.php?pag=proc-edit-esporo-animal&id='+ full[0] + '&id_sd=' + full[7] + '&data_medc=' + full[1] + '&id_med=' + full[2] + '&dsg=' + full[3] + '&qtd='+ full[4] +'&nm_ent_medc='+ full[5] + '&nm_rec_medc='+ full[6] + '&acao=reativar-entrada-medicamento" role="button" class="btn btn-success"><i class="fa fa-check-circle-o"></i><strong>  SIM</strong></a></div></div></div></div>' +
                            '<button type="button" class="btn btn-warning rounded-circle" data-toggle="modal" data-target="#ModalLixoEsp"><i class="fa fa-arrow-alt-circle-up"></i></button>';
                    }
                },
                <?php else : ?>
                {
                    "aTargets": [0], // o numero 6 é o nº da coluna
                    "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                        return '<a href="suvisjt.php?pag=edicao-medicamento-esporo-animal&id='+ full[0]+'" role="button" class="btn btn-warning rounded-circle"><strong><span class="fa fa-pencil"></strong></a>';
                    }
                },
                {
                    "aTargets": [7], // o numero 6 é o nº da coluna
                    "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                        return '<div class="modal fade" id="ModalLixoEsp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">' +
                            '<div class="modal-dialog modal-sm"><div class="modal-content"><div class="modal-header-danger">' +
                            '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                            '<h3 class="modal-title text-center"><i class="fa fa-trash-alt"></i>&nbsp;&nbsp; Deletar Medicamento</h3></div>' +
                            '<div class="modal-body"><h3 class="text-center"> Deseja apagar ' + full[2] + ' - ' + full[4] + ' Cápsulas ?</h3></div>' +
                            '<div class="modal-footer text-center"><button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-minus-octagon"></i>  NÃO</button>' +
                            '&nbsp;&nbsp;&nbsp;&nbsp;<a href="suvisjt.php?pag=proc-edit-esporo-animal&id='+ full[0]+'&id_sd=' + full[7] + '&data_medc=' + full[1] + '&id_med=' + full[2] + '&dsg=' + full[3] + '&qtd='+ full[4] +'&nm_ent_medc='+ full[5] + '&nm_rec_medc='+ full[6] + '&acao=deletar-entrada-medicamento" role="button" class="btn btn-success"><i class="fa fa-check-circle-o"></i><strong>  SIM</strong></a></div></div></div></div>' +
                            '<button type="button" class="btn btn-danger rounded-circle" data-toggle="modal" data-target="#ModalLixoEsp"><i class="fa fa-trash-alt"></i></button>';
                    }
                },
                <?php endif; ?>
            ],
            buttons: [ {extend:'excel',title:'Entrada de Medicamentos - Esporotricose Animal <?php echo date('Y');?>',header: 'Entrada de Medicamentos - Esporotricose Animal <?php echo date('Y');?>',filename:'Entrada de Medicamentos - Esporotricose Animal <?php echo date('Y');?>',className: 'btn btn-success',text:'<span class="fal fa-file-excel"></span>' },
                {extend: 'pdfHtml5',exportOptions: {columns: ':visible'},title:'Entrada de Medicamentos - Esporotricose Animal <?php echo date('Y');?>',header: 'Entrada de Medicamentos - Esporotricose Animal <?php echo date('Y');?>',filename:'Entrada de Medicamentos - Esporotricose Animal <?php echo date('Y');?>',orientation: 'landscape',pageSize: 'LEGAL',className: 'btn btn-danger',text:'<span class="fa fa-file-pdf-o"></span>'},
                {extend:'print',exportOptions: {columns: ':visible'},title:'Entrada de Medicamentos - Esporotricose Animal <?php echo date('Y');?>',header: 'Entrada de Medicamentos - Esporotricose Animal <?php echo date('Y');?>',filename:'Entrada de Medicamentos - Esporotricose Animal <?php echo date('Y');?>',className: 'btn btn-default',text:'<span class="fa fa-print"></span>'},
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
        <div class="col-md-12"><div class="page-header">
                <ol class="breadcrumb">
                    <li><i class="fa fa-database"></i> <a href="suvisjt.php">Sisdam Web</a></li>
                    <li class="active">Lista de Esporotricose Animal</li>
                </ol>
                <button type="button"  data-toggle="tooltip" title="Lista de Casos de Esporotricose Animal - JT" class="btn btn-<?php if($lixo === '1') : echo 'default'; else : echo 'dark'; endif; ?> btn-labeled btn-lg btn-block"><i class="btn-label"><i
                            class="fa fa-<?php if($lixo === '1') : echo 'trash-alt'; else : echo 'pills'; endif; ?>"></i></i><?php if($lixo === '1') : echo 'LIXEIRA '; else : echo 'LISTA'; endif; ?>DE ENTRADA DE MEDICAMENTOS - ESPOROTRICOSE ANIMAL - JT</button>

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

    <div class="row espaco">
        <div class="text-center">
            <?php if($lixo === '0' && $_SESSION['usuarioNivelAcesso'] <> "") : ?>
                <a href="suvisjt.php?pag=cadastro-medicamento-esporo-animal" role="button" style="';
                    <?php if ($_SESSION['usuarioNivelAcesso'] == 4) : echo 'display: none;';  endif;?>" accesskey="N" data-toggle="tooltip" title="Lista de Medicamentos de Esporotricose Animal - JT"
                         class="btn btn-labeled btn-success mb-2 mr-sm-4"><span class="btn-label"><i class="fa fa-plus-circle"></i> </span> <u>N</u>OVO</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href='suvisjt.php?pag=listar-esporotricose-animal' role='button' tabindex="26" data-toggle="tooltip" title="LISTAR REGISTROS" accesskey="L"
                   class="btn btn-labeled btn-info mb-2 mr-sm-4"><span class="btn-label"><i class="glyphicon glyphicon-list"></i></span> <u>L</u>ISTAR</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="suvisjt.php?pag=listar-saida-de-medicamentos-esporotricose-animal" role="button" accesskey="S" data-toggle="tooltip" title="SAÍDAS DE MEDICAMENTOS"
                    class="btn btn-labeled btn-danger mb-2 mr-sm-4"><span class="btn-label"><i class="fa fa-pills"></i></span> <u>S</u>AÍDAS</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <?php if($countlixo_medc_ent >= '1' && $_SESSION['usuarioNivelAcesso'] <> "") : ?>
                        <a href="suvisjt.php?pag=listar-medicamentos-esporotricose-animal&lixeira=1" role="button" accesskey="L" data-toggle="tooltip" title="LIXEIRA"
                           class="btn btn-labeled btn-default mb-2 mr-sm-4"><span class="btn-label"><i class="fa fa-trash-alt"></i></span><span class="badge" style="background-color: #c9302c"><?=$countlixo_medc_ent?></span> &nbsp;<u>L</u>IXEIRA</a>
                    <?php

                endif;
            endif;
            ?>

            <?php
                if ($countlixo_medc_ent >= '1' && $lixo === '1' && $_SESSION['usuarioNivelAcesso'] <> "") :
                    echo '<a href="suvisjt.php?pag=listar-medicamentos-esporotricose-animal" role="button" accesskey="L" data-toggle="tooltip" title="SAIR DA LIXEIRA" 
                                                class="btn btn-labeled btn-warning mb-2 mr-sm-4"><span class="btn-label"><i class="fa fa-arrow-alt-circle-left"></i></span><u>V</u>OLTAR</a>';
                endif;
            ?>
        </div>
    </div>

    <!-- Terminando a página de Título -->
    <div class="row espaco">
        <div class="text-center">
            <?php
            while ($row =  $consulta_e->fetch_assoc()) {
                $total_e = $row['entrada'];
                if($total_e < 1) :
                    echo '<p><strong>ENTRADAS: </strong><button class="btn btn-danger" type="button">0</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                else :
                    echo '<p><strong>ENTRADAS: </strong><button class="btn btn-success" type="button">'.$total_e.'</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                endif;
            }

            while ($row =  $consulta_s->fetch_assoc()) {
                $total_s = $row['saida'];
                if($total_s < 1) :
                    echo '<strong>SAÍDAS: </strong><button class="btn btn-danger" type="button">0</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>';
                else :
                    echo '<strong>SAÍDAS: </strong><button class="btn btn-success" type="button">'.$total_s.'</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>';
                endif;
            }
            ?>
        </div>
    </div>

    <!--------------------------------------------- * Tabela de Saída de Medicamentos * --------------------------------------->

    <table id="list-esporo-medical" class="table table-hover table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th><i class="fal fa-pencil"></i> EDITAR</th>
            <th><i class="fal fa-calendar-alt"></i> DATA ENTRADA</th>
            <th><i class="fal fa-pills"></i> MEDICAMENTO</th>
            <th><i class="fal fa-pills"></i> DOSAGEM</th>
            <th><i class="fal fa-pills"></i> QUANTIDADE</th>
            <th><i class="fal fa-user"></i> CADASTRO</th>
            <th><i class="fal fa-thin fa-calendar"></i> DT. CADASTRO</th>
            <th><?php if($lixo === '1'): echo '<i class="fal fa-thin fa-arrow-alt-circle-up"></i> REATIVAR'; else : echo '<i class="fal fa-thin fa-trash-alt"></i> LIXO'; endif; ?></th>
        </tr>
        </thead>
        <tbody>

        </tbody>
    </table>

    <!--------------------------------------------- * Fim da Tabela de Saída de Medicamentos * --------------------------------------->

</div>


