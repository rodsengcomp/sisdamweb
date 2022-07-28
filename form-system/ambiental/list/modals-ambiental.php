<?php
/* Criado por Rodolfo Romaioli R. De Jesus.
 * User: D788796-5
 * Date: 13/03/2019
 * Time: 14:25
 */

//SQL do modal novos endereços

//$_GET'S php:
$sinan = $_GET["nDoc"];
$nome = $_GET["NM_PACIENT"];
$impresso = $_GET["impresso"];
$Impressao = $_GET["Impressao"];
$DataBloqueio = $_GET["DataBloqueio"];
$DataNeb = $_GET["DataNeb"];
$agravo_sinan_sql = $_GET['sinan'];
$agravo_tabela_sql = $_GET['tabela'];
$agravo_buttons = $_GET['buttons'];
$agravo_ial = $_GET['ial'];
$agravo = $_GET['agravo'];
$descarte = $_GET['desc'];
$trapido = $_GET['trapido'];

$sql_button_at_end = $conectar->query("SELECT $agravo_sinan_sql.NU_NOTIFIC, $agravo_sinan_sql.ID_DISTRIT
FROM $agravo_sinan_sql LEFT JOIN $agravo_tabela_sql ON $agravo_sinan_sql.NU_NOTIFIC = $agravo_tabela_sql.nDoc
WHERE ((($agravo_sinan_sql.ID_DISTRIT)=\"70\") AND (($agravo_tabela_sql.nDoc) Is Null))");

// if($sql_modal_at_end->num_rows > 0){
//<script>$(document).ready(function(){$('#myModal').modal('show');});</script>

// If para modal de inclusão de novos casos
if ($_SESSION['usuarioNivelAcesso'] <> ''){
    if(($sinan) > 0 AND ($impresso) < 2 AND ($descarte) == 'nao' AND ($trapido) == 'nao'){ ?>
        <script>$(document).ready(function(){$('#ModalImpressaoBloqueio').modal('show');});</script>
    <?php }elseif(($descarte) == 'sim'){ ?>
        <script>$(document).ready(function(){$('#ModalDescarte').modal('show');});</script>
    <?php }elseif(($trapido) == 'sim'){ ?>
        <script>$(document).ready(function(){$('#myModalTr').modal('show');});</script>
    <?php }}elseif ($_SESSION['usuarioNome'] == ''){
       if(($sinan) > 0 AND ($impresso) < 2 AND ($descarte) == 'nao' AND ($trapido) == 'nao'){ ?>
        <script>$(document).ready(function(){$('#myModalLogin').modal('show');});</script>
    <?php }elseif(($descarte) == 'sim'){ ?>
        <script>$(document).ready(function(){$('#myModalLogin').modal('show');});</script>
   <?php }elseif(($trapido) == 'sim'){ ?>
       <script>$(document).ready(function(){$('#myModalLogin').modal('show');});</script>
    <?php }}


//If pra modal de descarte de casos


?>

<!-- Inicio Modal Login-->
<div class="modal fade" id="myModalLogin" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header-del">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center" id="myModalLabel">SisdamJT Web</h4>
            </div>

            <div class="modal-body"><div class="row"><div class="text-center">
                        <h4>Você está desconectado !!! </h4><h4>Deseja se Logar ?</h4>
                    </div></div></div>

            <div class="modal-footer"><div class="text-center">
                    <a href='http://10.47.171.110/sisdamweb/index.php'><button type="button" class="btn btn-success">SIM</button></a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <button type="button" class="btn btn-danger" data-dismiss="modal">NÃO</button>
                </div></div>
        </div>
    </div>
</div>
<!-- Fim Modal Novos casos -->

<!-- Inicio Modal Novos Casos-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header-del">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center" id="myModalLabel">SisdamJT Web</h4>
            </div>

            <div class="modal-body"><div class="row"><div class="text-center">
                <h4>Deseja incluir</h4><h4>os casos novos ???</h4>
            </div></div></div>

            <div class="modal-footer"><div class="text-center">
                    <a href='suvisjt.php?pag=edit-end-ambiental<?php echo $url; ?>'><button type="button" class="btn btn-success">SIM</button></a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <button type="button" class="btn btn-danger" data-dismiss="modal">NÃO</button>
            </div></div>
        </div>
    </div>
</div>
<!-- Fim Modal Novos casos -->

<!-- Inicio Modal Impressão de Bloqueio -->
<div class="modal fade" id="ModalImpressaoBloqueio" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center" id="myModalLabel">SisdamJT Web</h4>
            </div>
            <div class="modal-body"><div class="row"><div class="text-center"><h4><?php if ($impresso == '0') {echo 'Qual atividade';}else{echo 'Deseja Imprimir 2ª Via';}?></h4></div>
                    <div class="text-center"><h4> para Ficha nº <?php echo $sinan ;?> ?</h4></div></div></div>
            <div class="modal-footer">
                <div class="text-center">
                    <?php if ($impresso == '0'){ ?>
                        <a target="_blank" href='suvisjt.php?pag=impressao-ambiental&nDoc=<?php echo $sinan; ?>&NM_PACIENT=<?php echo $nome; ?>&Impressao=1Via-B&DataBloqueio=<?php echo date("d/m/Y")?>&sinan=<?php echo $agravo_sinan_sql ;?>&tabela=<?php echo $agravo_tabela_sql ;?>&buttons=<?php echo $agravo_buttons ;?>&agravo=<?php echo $agravo ;?>&ial=<?php echo $agravo_ial ;?>&list=ial&impresso=1'
                           onclick="FunctionReload()" role="button" class="btn btn-success" data-toggle="tooltip" title="Bloqueio">BLOQ.</a>&nbsp;&nbsp;&nbsp;&nbsp;
                        <a target="_blank" href='suvisjt.php?pag=impressao-ambiental&nDoc=<?php echo $sinan; ?>&NM_PACIENT=<?php echo $nome; ?>&Impressao=1Via-B&DataNeb=<?php echo date("d/m/Y");?>&sinan=<?php echo $agravo_sinan_sql ;?>&tabela=<?php echo $agravo_tabela_sql ;?>&buttons=<?php echo $agravo_buttons ;?>&agravo=<?php echo $agravo ;?>&ial=<?php echo $agravo_ial ;?>&list=ial&impresso=1'
                           onclick="FunctionReload()" role="button" class="btn btn-success" data-toggle="tooltip" title="Nebulização">NEB.</a>&nbsp;&nbsp;&nbsp;&nbsp;
                        <a onclick="FunctionReload()" href="http://10.47.171.110/sisdamweb/suvisjt.php?pag=list-bloq-<?php if ($agravo_buttons == 'dengue') echo 'dengue'; elseif ($agravo_buttons == 'lepto') echo 'lepto';else echo 'ial';?>&sinan=<?php echo $agravo_sinan_sql;?>&tabela=<?php echo $agravo_tabela_sql;?>&ial=<?php echo $agravo_ial;?>&list=ial&buttons=<?php echo $agravo_buttons;?>&agravo=<?php echo $agravo;?>" role="button" class="btn btn-danger" data-toggle="tooltip" title="Sair">SAIR</a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <?php } else {?>
                        <a target="_blank" href='suvisjt.php?pag=impressao-ambiental&nDoc=<?php echo $sinan ;?>&NM_PACIENT=<?php echo $nome ;?>&Impressao=2Via-B&Impressao=2Via-B&sinan=<?php echo $agravo_sinan_sql ;?>&tabela=<?php echo $agravo_tabela_sql ;?>&buttons=<?php echo $agravo_buttons ;?>&agravo=<?php echo $agravo ;?>&ial=<?php echo $agravo_ial ;?>&list=ial&impresso=2'
                           onclick="FunctionReload()" role="button" class="btn btn-success" data-toggle="tooltip" title="Imprimir Ficha">SIM</a>&nbsp;&nbsp;&nbsp;&nbsp;
                        <a onclick="FunctionReload()" href="http://10.47.171.110/sisdamweb/suvisjt.php?pag=list-bloq-<?php if ($agravo_buttons == 'dengue') echo 'dengue'; elseif ($agravo_buttons == 'lepto') echo 'lepto';else echo 'ial';?>&sinan=<?php echo $agravo_sinan_sql;?>&tabela=<?php echo $agravo_tabela_sql;?>&ial=<?php echo $agravo_ial;?>&list=ial&buttons=<?php echo $agravo_buttons;?>&agravo=<?php echo $agravo;?>" role="button" class="btn btn-danger" data-toggle="tooltip" title="Sair">NÃO</a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Fim Modal Impressao Bloqueio -->

<!-- Inicio Modal Descarte-->
<div class="modal fade" id="ModalDescarte" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">

            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center" id="myModalLabel">SisdamJT Web</h4>
            </div>

            <div class="modal-body"><div class="row"><div class="text-center"><h4>Deseja <?php if ($impresso < 2 ) {echo 'Descartar';}else{echo 'Reativar';}?> o</h4></div>
                <div class="text-center"><h4>Sinan <?php echo $sinan ;?> ?</h4></div></div></div>

            <div class="modal-footer">
                <div class="text-center">
                    <?php if ($impresso < 2){ ?>
                        <a href='suvisjt.php?pag=impressão-ambiental&nDoc=<?php echo $sinan; ?>&NM_PACIENT=<?php echo $nome; ?>&Impressao=1Via-D<?php echo $url ;?>'
                           onclick="FunctionReload()" role="button" class="btn btn-success" data-toggle="tooltip" title="Descartar Ficha">SIM</a>&nbsp;&nbsp;&nbsp;&nbsp;
                        <button type="button" onclick="FunctionReload()" class="btn btn-danger" data-dismiss="modal">NÃO</button>&nbsp;&nbsp;&nbsp;&nbsp;
                    <?php } else {?>
                        <a href='suvisjt.php?pag=impressão-ambiental&nDoc=<?php echo $sinan; ?>&NM_PACIENT=<?php echo $nome; ?>&Impressao=1Via-R<?php echo $url ;?>'
                           role="button" class="btn btn-success" data-toggle="tooltip" title="Descartar Ficha">SIM</a>&nbsp;&nbsp;&nbsp;&nbsp;
                        <button onclick="FunctionReload()" type="button" class="btn btn-danger" data-dismiss="modal">NÃO</button>&nbsp;&nbsp;&nbsp;&nbsp;
                    <?php }?>
                </div>
            </div>
        </div>

    </div>
</div><!-- Fim Modal Descarte-->

<!-- Inicio Modal Resultado TR IGM-->
<div class="modal fade" id="myModalTr" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center" id="myModalLabel">Teste Rápido</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="text-center"><h4>Deseja Alterar o TR para: </h4>
                        <h4><a href='suvisjt.php?pag=altera-tr&nDoc=<?php echo $sinan; ?>&NM_PACIENT=<?php echo $nome; ?>&ResultadoTr=Nao Reagente<?php echo $url ;?>'>
                                <button type="button" class="btn btn-success" data-toggle="tooltip" title="Teste Rápido Não Reagente">TRN</button></a>&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href='suvisjt.php?pag=altera-tr&nDoc=<?php echo $sinan; ?>&NM_PACIENT=<?php echo $nome; ?>&ResultadoTr=Reagente<?php echo $url ;?>'>
                                <button type="button" class="btn btn-danger" data-toggle="tooltip" title="Teste Rápido Reagente">TRR</button></a>&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href='suvisjt.php?pag=altera-tr&nDoc=<?php echo $sinan; ?>&NM_PACIENT=<?php echo $nome; ?>&ResultadoTr=Exame Nao Realizado<?php echo $url ;?>'>
                                <button type="button" class="btn btn-warning" data-toggle="tooltip" title="Teste Rápido Exame Não Realizado">TEN</button></a>&nbsp;&nbsp;</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- Fim Modal Resultado Tr IGM-->



<script type="text/javascript">
    $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip()

        $('#list-bloq-<?php echo $agravo_buttons;?>').DataTable({responsive: {details: {display: $.fn.dataTable.Responsive.display.modal({header: function (row) {var data = row.data();
                            return 'Detalhes do Sinan : ' + data[1];}}),renderer: function ( api, rowIdx, columns ) {var data = $.map( columns, function ( col, i ) {
                        return '<tr>'+'<td>'+col.title+':'+'</td> '+'<td>'+col.data+'</td>'+'</tr>';} ).join('');
                        return $('<table/>').append( data ); } } },
            "language": {"sEmptyTable": "Nenhum registro encontrado","sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros","sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                "sInfoFiltered": "(Filtrados de _MAX_ registros)","sInfoThousands": ".","sLengthMenu": "_MENU_ Resultados por Página","sLoadingRecords": "Carregando...",
                "sProcessing": "Processando...","sZeroRecords": "Nenhum registro encontrado","sSearch": "Pesquisar","oPaginate": {"sNext": "Próximo","sPrevious": "Anterior","sFirst": "Primeiro","sLast": "Último"},
                "oAria": {"sSortAscending": "Ordenar colunas de forma ascendente","sPrevious": "Ordenar colunas de forma descendente"}},
            dom: "lBfrtip",processing: true, serverside: true, ajax: 'form-system/ambiental/list/proc-list-ambiental/list-bloq-<?php echo $agravo_buttons;?>.php',
            "lengthMenu": [[4, 10, 25, 50, -1], [4, 10, 25, 50, "Todos"]], "aaSorting": [ 0, 'asc' ],
            "aoColumnDefs": [
                { type: 'de_date', targets: 4 },
                { type: 'de_date', targets: 5 },
                {"bVisible": true,"aTargets": [8]},
                {"bVisible": true,"aTargets": [9]},
                {"bVisible": true,"aTargets": [12]},
                {"bVisible": true,"aTargets": [13]},
                {
                    "aTargets": [1], // o numero 1 é o nº da coluna
                    "mRender": function (data, type, full) { //Função para capturar o id ou sinan
                        var ialimp = full[1];
                        switch (ialimp) {
                            case '0':
                                ialimp = '<a title="1ª Via" href="http://10.47.171.110/sisdamweb/suvisjt.php?pag=list-bloq-ial&sinan=<?php echo $agravo_sinan_sql;?>&tabela=<?php echo $agravo_tabela_sql;?>&buttons=<?php echo $agravo_buttons;?>&agravo=<?php echo $agravo;?>&ial=<?php echo $agravo_ial;?>&list=ial&impresso=' + full[1] + '&nDoc=' + full[0] + '&NM_PACIENT=' + full[6] + '&Impressao=1Via-B&desc=nao&trapido=nao" role="button" class="btn btn-success rounded-circle">1ªV<br><span class="glyphicon glyphicon-print"></a>';
                                break;
                            case '1':
                                ialimp = '<a title="2ª Via" href="http://10.47.171.110/sisdamweb/suvisjt.php?pag=list-bloq-ial&sinan=<?php echo $agravo_sinan_sql;?>&tabela=<?php echo $agravo_tabela_sql;?>&buttons=<?php echo $agravo_buttons;?>&agravo=<?php echo $agravo;?>&ial=<?php echo $agravo_ial;?>&impresso=1&nDoc=' + full[0] + '&NM_PACIENT=' + full[6] + '&Impressao=2Via-B&desc=nao&trapido=nao" role="button" class="btn btn-danger rounded-circle">2ªV<br><span class="glyphicon glyphicon-print"></a>';
                                break;
                            case '2':
                                ialimp = '<a title="Descartado" role="button" disabled class="btn btn-warning rounded-circle">3ª- <span class="glyphicon glyphicon-print"></a>';
                                break;
                            default: ialimp = '<a href="suvisjt.php?pag=impressão-ambiental&nDoc='+full [0]+'&NM_PACIENT='+full[6]+'&Impressao=1Via-R&sinan=<?php echo $agravo_sinan_sql;?>&tabela=<?php echo $agravo_tabela_sql;?>&buttons=<?php echo $agravo_buttons;?>&agravo=<?php echo $agravo;?>&ial=<?php echo $agravo_ial;?>" title="Desativado" role="button" class="btn btn-info rounded-circle"><span class="glyphicon glyphicon-question-sign"></a>';

                        }
                        return ialimp;
                    }
                },
                {
                    "aTargets": [3], // o numero é o nº da coluna
                    "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                        var ialgal = full[3];
                        switch (ialgal) {
                            case ' \r':
                                ialgal = '<a target="_blank" href="https://gal.saude.sp.gov.br/gal/bmh/consulta-paciente-laboratorio/imprimir-resultado/?requisicoes=[%22'+ full [20] +'%22]" role="button" class="btn btn-primary rounded-circle">ANAL<br>ISE</a>';
                                break;
                            case 'Indeterminado \r':
                                ialgal = '<a target="_blank" href="https://gal.saude.sp.gov.br/gal/bmh/consulta-paciente-laboratorio/imprimir-resultado/?requisicoes=[%22'+ full [20] +'%22]" role="button" class="btn btn-default rounded-circle">INDE<br>TER</a>';
                                break;
                            case 'Não Detectável \r':
                                ialgal = '<a target="_blank" href="https://gal.saude.sp.gov.br/gal/bmh/consulta-paciente-laboratorio/imprimir-resultado/?requisicoes=[%22'+ full [20] +'%22]" role="button" class="btn btn-success rounded-circle">PCR<br>NEG</a>';
                                break;
                            case 'Não Reagente \r':
                                ialgal = '<a target="_blank" href="https://gal.saude.sp.gov.br/gal/bmh/consulta-paciente-laboratorio/imprimir-resultado/?requisicoes=[%22'+ full [20] +'%22]" role="button" class="btn btn-success rounded-circle">IGM<br>NEG</a>';
                                break;
                            case 'Detectável \r':
                                ialgal = '<a target="_blank" href="https://gal.saude.sp.gov.br/gal/bmh/consulta-paciente-laboratorio/imprimir-resultado/?requisicoes=[%22'+ full [20] +'%22]" role="button" class="btn btn-danger rounded-circle">PCR<br>POS</a>';
                                break;
                            case 'Reagente \r':
                                ialgal = '<a target="_blank" href="https://gal.saude.sp.gov.br/gal/bmh/consulta-paciente-laboratorio/imprimir-resultado/?requisicoes=[%22'+ full [20] +'%22]" role="button" class="btn btn-danger rounded-circle">IGM<br>POS</a>';
                                break;
                            default: ialgal = '<a href="https://gal.saude.sp.gov.br/gal/bmh/consulta-paciente-laboratorio/imprimir-resultado/?requisicoes=[%22'+ full [20] +'%22]" title="Desativado" role="button" class="btn btn-warning rounded-circle">SEM<br>COL</a>';
                        }
                        return ialgal;
                    }
                },
                {
                    "aTargets": [7], // o numero 6 é o nº da coluna
                    "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                        return '<a target="_blank" href="http://10.47.171.110/sisdamweb/setores/' + full[7] + '.pdf" role="button" class="btn btn-danger rounded-circle">' + full[7] + '</a>\n' +
                            '<a target="_blank" href="https://www.google.com.br/maps/dir/?api=1&origin=R. Maria Amália Lopes Azevedo, 3676 - Vila Albertina&destination=' + full[18] + '&travelmode=driving" role="button" class="btn btn-default rounded-circle"><img src="imagens/maps_64dp.png" width="20"></a>';
                    }
                },
                {"aTargets": [8], // o numero 2 é o nº da coluna
                    "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                        return full[8] + ' ' + full[9] + ' ' + full[10] + ' ' + full[11];
                    }
                },
                {
                    "aTargets": [9], //
                    "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                        var ialdesc = full[1];
                        switch (ialdesc) {
                            case '0':
                                ialdesc = '<a href="http://10.47.171.110/sisdamweb/suvisjt.php?pag=list-bloq-ial&sinan=<?php echo $agravo_sinan_sql;?>&tabela=<?php echo $agravo_tabela_sql;?>&buttons=<?php echo $agravo_buttons;?>&agravo=<?php echo $agravo;?>&ial=<?php echo $agravo_ial;?>&nDoc=' + full[0] + '&NM_PACIENT=' + full[6] + '&impresso=' + full[1]+'&Impressao=1Via-D&desc=sim" title="Desativar" role="button" class="btn btn-danger rounded-circle"><span class="glyphicon glyphicon-trash"></a>';
                                break;
                            case '1':
                                ialdesc = '<a href="http://10.47.171.110/sisdamweb/suvisjt.php?pag=list-bloq-ial&sinan=<?php echo $agravo_sinan_sql;?>&tabela=<?php echo $agravo_tabela_sql;?>&buttons=<?php echo $agravo_buttons;?>&agravo=<?php echo $agravo;?>&ial=<?php echo $agravo_ial;?>&nDoc=' + full[0] + '&NM_PACIENT=' + full[6] + '&impresso=' + full[1]+ '&Impressao=2Via-D&desc=sim" title="Desativar" role="button" class="btn btn-danger rounded-circle"><span class="glyphicon glyphicon-trash"></a>';
                                break;
                            case '2':
                                ialdesc = '<a href="http://10.47.171.110/sisdamweb/suvisjt.php?pag=list-bloq-ial&sinan=<?php echo $agravo_sinan_sql;?>&tabela=<?php echo $agravo_tabela_sql;?>&buttons=<?php echo $agravo_buttons;?>&agravo=<?php echo $agravo;?>&ial=<?php echo $agravo_ial;?>&nDoc=' + full[0] + '&NM_PACIENT=' + full[6] + '&impresso=' + full[1]+ '&Impressao=1Via-R&desc=sim&list=ial" title="Reativar" role="button" class="btn btn-success rounded-circle"><span class="glyphicon glyphicon-plus-sign"></a>';
                                break;
                            default: ialdesc = '<a href="suvisjt.php?pag=impressão-ambiental&nDoc='+full [0]+'&NM_PACIENT='+full[6]+'&Impressao=1Via-R&sinan=<?php echo $agravo_sinan_sql;?>&tabela=<?php echo $agravo_tabela_sql;?>&buttons=<?php echo $agravo_buttons;?>&agravo=<?php echo $agravo;?>&ial=<?php echo $agravo_ial;?>&list=ial" title="Desativado" role="button" class="btn btn-info rounded-circle"><span class="glyphicon glyphicon-question-sign"></a>';
                        }
                        return ialdesc;
                    }
                },
                {
                    "aTargets": [10], // o numero 6 é o nº da coluna
                    "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                        return '<a href="http://10.47.171.110/sisdamweb/suvisjt.php?pag=edit-ambiental&nDoc='+ full[0]+'&sinan=<?php echo $agravo_sinan_sql;?>&tabela=<?php echo $agravo_tabela_sql;?>&buttons=<?php echo $agravo_buttons;?>&agravo=<?php echo $agravo;?>&ial=<?php echo $agravo_ial;?>&list=ial" role="button" class="btn btn-warning rounded-circle"><span class="glyphicon glyphicon-pencil"></a>';
                    }
                },
                {"aTargets": [11], // o numero 2 é o nº da coluna
                    "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                        return full[13];
                    }
                },
                {"aTargets": [12], // o numero 2 é o nº da coluna
                    "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                        return 'RES-' + full[12];
                    }
                },
                {"aTargets": [13], // o numero 2 é o nº da coluna
                    "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                        return full[19];
                    }
                },
                {"aTargets": [14], // o numero 2 é o nº da coluna
                    "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                        return 'NOT-' + full[14];
                    }
                }
            ],
            buttons: [ {extend:'excel',title:'CASOS DE <?php echo $agravo;?>',exportOptions: {columns: ':visible'},header: 'CASOS DE <?php echo $agravo;?>',filename:'CASOS DE <?php echo $agravo;?>',className: 'btn btn-success',text:'<span class="fa fa-file-excel-o"></span>' },
                {extend: 'pdfHtml5',exportOptions: {columns: ':visible'},title:'CASOS DE <?php echo $agravo;?>',header: 'CASOS DE <?php echo $agravo;?>',filename:'CASOS DE <?php echo $agravo;?>',orientation: 'landscape',pageSize: 'LEGAL',className: 'btn btn-danger',text:'<span class="fa fa-file-pdf-o"></span>'},
                {extend:'print', exportOptions: {columns: ':visible'},title:'CASOS DE <?php echo $agravo;?>',header: 'CASOS DE <?php echo $agravo;?>',filename:'CASOS DE <?php echo $agravo;?>',className: 'btn btn-default',text:'<span class="fa fa-print"></span>'},
                {extend:'colvis',titleAttr: 'Select Colunas',orientation: 'landscape',className: 'btn btn-info',text:'<span class="fa fa-list"></span>'} ],
        });

        $('#list-ial-<?php echo $agravo_buttons;?>').DataTable({responsive: {details: {display: $.fn.dataTable.Responsive.display.modal({header: function (row) {var data = row.data();
                            return 'Detalhes do Sinan : ' + data[1];}}),renderer: function ( api, rowIdx, columns ) {var data = $.map( columns, function ( col, i ) {
                        return '<tr>'+'<td>'+col.title+':'+'</td> '+'<td>'+col.data+'</td>'+'</tr>';} ).join('');
                        return $('<table/>').append( data ); } } },
            "language": {"sEmptyTable": "Nenhum registro encontrado","sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros","sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                "sInfoFiltered": "(Filtrados de _MAX_ registros)","sInfoThousands": ".","sLengthMenu": "_MENU_ Resultados por Página","sLoadingRecords": "Carregando...",
                "sProcessing": "Processando...","sZeroRecords": "Nenhum registro encontrado","sSearch": "Pesquisar","oPaginate": {"sNext": "Próximo","sPrevious": "Anterior","sFirst": "Primeiro","sLast": "Último"},
                "oAria": {"sSortAscending": "Ordenar colunas de forma ascendente","sPrevious": "Ordenar colunas de forma descendente"}},
            dom: "lBfrtip",processing: true, serverside: true, ajax: 'form-system/ambiental/list/proc-list-ambiental/list-ial-<?php echo $agravo_buttons;?>.php',
            "lengthMenu": [[4, 10, 25, 50, -1], [4, 10, 25, 50, "Todos"]], "aaSorting": [ 0, 'desc' ],
            "aoColumnDefs": [
                { type: 'de_datetime', targets: 2 },
                { type: 'de_datetime', targets: 3 },
                { type: 'de_datetime', targets: 4 },
                {"bVisible": false,"aTargets": [2]},
                {"bVisible": false,"aTargets": [5]},
                {"bVisible": false,"aTargets": [9]},
                {"bVisible": false,"aTargets": [10]},
                {"bVisible": false,"aTargets": [13]},
                {"bVisible": false,"aTargets": [17]},
                {"bVisible": false,"aTargets": [20]},
                //{"aTargets": [2], // o numero 2 é o nº da coluna
                //"mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                //return full[2] + '\n' +full[3] + '\n' +full[4] ;
                //}
                //}
                {
                    "aTargets": [7], // o numero é o nº da coluna
                    "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                        var ialgal = full[7];
                        switch (ialgal) {
                            case ' \r':
                                ialgal = '<a target="_blank" href="https://gal.saude.sp.gov.br/gal/bmh/consulta-paciente-laboratorio/imprimir-resultado/?requisicoes=[%22'+ full [0] +'%22]" role="button" class="btn btn-primary rounded-circle">ANAL<br>ISE</a>';
                                break;
                            case 'Inconclusivo \r':
                                ialgal = '<a target="_blank" href="https://gal.saude.sp.gov.br/gal/bmh/consulta-paciente-laboratorio/imprimir-resultado/?requisicoes=[%22'+ full [0] +'%22]" role="button" class="btn btn-info rounded-circle">INCO<br>NC</a>';
                                break;
                            case 'Indeterminado \r':
                                ialgal = '<a target="_blank" href="https://gal.saude.sp.gov.br/gal/bmh/consulta-paciente-laboratorio/imprimir-resultado/?requisicoes=[%22'+ full [0] +'%22]" role="button" class="btn btn-default rounded-circle">INDE<br>TER</a>';
                                break;
                            case 'Não Detectável \r':
                                ialgal = '<a target="_blank" href="https://gal.saude.sp.gov.br/gal/bmh/consulta-paciente-laboratorio/imprimir-resultado/?requisicoes=[%22'+ full [0] +'%22]" role="button" class="btn btn-success rounded-circle">PCR<br>NEG</a>';
                                break;
                            case 'Não Reagente \r':
                                ialgal = '<a target="_blank" href="https://gal.saude.sp.gov.br/gal/bmh/consulta-paciente-laboratorio/imprimir-resultado/?requisicoes=[%22'+ full [0] +'%22]" role="button" class="btn btn-success rounded-circle">IGM<br>NEG</a>';
                                break;
                            case 'Detectável \r':
                                ialgal = '<a target="_blank" href="https://gal.saude.sp.gov.br/gal/bmh/consulta-paciente-laboratorio/imprimir-resultado/?requisicoes=[%22'+ full [0] +'%22]" role="button" class="btn btn-danger rounded-circle">PCR<br>POS</a>';
                                break;
                            case 'Reagente \r':
                                ialgal = '<a target="_blank" href="https://gal.saude.sp.gov.br/gal/bmh/consulta-paciente-laboratorio/imprimir-resultado/?requisicoes=[%22'+ full [0] +'%22]" role="button" class="btn btn-danger rounded-circle">IGM<br>POS</a>';
                                break;
                            default: ialgal = '<a target="_blank" href="https://gal.saude.sp.gov.br/gal/bmh/consulta-paciente-laboratorio/imprimir-resultado/?requisicoes=[%22'+ full [0] +'%22]" title="Desativado" role="button" class="btn btn-warning rounded-circle">SEM<br>COL</a>';
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
                //{"bVisible": false,"aTargets": [2]},
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
                                ialgal = '<button class="btn btn-warning my-2 my-sm-0">SEM EXAME</button>';
                                break;
                            case 'Negativo':
                                ialgal = '<button class="btn btn-success my-2 my-sm-0">NEGATIVO</button>';
                                break;
                            case 'Positivo':
                                ialgal = '<button class="btn btn-danger my-2 my-sm-0">POSITIVO</button>';
                                break;
                            default: ialgal = '<button class="btn btn-info my-2 my-sm-0">NÃO ENCONTRADO</button>';
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

        $('#list-bloq-deng').DataTable({responsive: {details: {display: $.fn.dataTable.Responsive.display.modal({header: function (row) {var data = row.data();
                            return 'Detalhes do Sinan : ' + data[1];}}),renderer: function ( api, rowIdx, columns ) {var data = $.map( columns, function ( col, i ) {
                        return '<tr>'+'<td>'+col.title+':'+'</td> '+'<td>'+col.data+'</td>'+'</tr>';} ).join('');
                        return $('<table/>').append( data ); } } },
            "language": {"sEmptyTable": "Nenhum registro encontrado","sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros","sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                "sInfoFiltered": "(Filtrados de _MAX_ registros)","sInfoThousands": ".","sLengthMenu": "_MENU_ Resultados por Página","sLoadingRecords": "Carregando...",
                "sProcessing": "Processando...","sZeroRecords": "Nenhum registro encontrado","sSearch": "Pesquisar","oPaginate": {"sNext": "Próximo","sPrevious": "Anterior","sFirst": "Primeiro","sLast": "Último"},
                "oAria": {"sSortAscending": "Ordenar colunas de forma ascendente","sPrevious": "Ordenar colunas de forma descendente"}},
            dom: "lBfrtip",processing: true, serverside: true, ajax: 'form-system/ambiental/list/proc-list-ambiental/list-bloq-dengue.php',
            "lengthMenu": [[4, 10, 25, 50, -1], [4, 10, 25, 50, "Todos"]], "aaSorting": [ 18, 'desc' ],
            "aoColumnDefs": [
                { type: 'de_date', targets: 6 },
                { type: 'de_date', targets: 9 },
                { type: 'de_date', targets: 18 },
                {
                    "aTargets": [1], // o numero 1 é o nº da coluna
                    "mRender": function (data, type, full) { //Função para capturar o id ou sinan
                        var denimp = full[19];
                        switch (denimp) {
                            case '0':
                                denimp = '<a title="1ª Via" href="http://10.47.171.110/sisdamweb/suvisjt.php?pag=list-bloq-dengue&sinan=<?php echo $agravo_sinan_sql;?>&tabela=<?php echo $agravo_tabela_sql;?>&buttons=<?php echo $agravo_buttons;?>&agravo=<?php echo $agravo;?>&ial=<?php echo $agravo_ial;?>&list=dengue&impresso='+ full[19] +'&nDoc=' + full[0] + '&NM_PACIENT=' + full[7] + '&Impressao=1Via-B&desc=nao&trapido=nao" role="button" class="btn btn-success rounded-circle">1ªV<br><span class="glyphicon glyphicon-print"></a>';
                                break;
                            case '1':
                                denimp = '<a title="2ª Via" href="http://10.47.171.110/sisdamweb/suvisjt.php?pag=list-bloq-dengue&sinan=<?php echo $agravo_sinan_sql;?>&tabela=<?php echo $agravo_tabela_sql;?>&buttons=<?php echo $agravo_buttons;?>&agravo=<?php echo $agravo;?>&ial=<?php echo $agravo_ial;?>&impresso='+ full[19] +'&nDoc=' + full[0] + '&NM_PACIENT=' + full[7] + '&Impressao=2Via-B&desc=nao&trapido=nao" role="button" class="btn btn-danger rounded-circle">2ªV<br><span class="glyphicon glyphicon-print"></a>';
                                break;
                            case '2':
                                denimp = '<a title="Descartado" role="button" disabled class="btn btn-warning rounded-circle">3ª- <span class="glyphicon glyphicon-print"></a>';
                                break;
                            default: denimp = '<a href="suvisjt.php?pag=impressão-ambiental&nDoc='+full [0]+'&NM_PACIENT='+full[7]+'&Impressao=1Via-R&sinan=<?php echo $agravo_sinan_sql;?>&tabela=<?php echo $agravo_tabela_sql;?>&buttons=<?php echo $agravo_buttons;?>&agravo=<?php echo $agravo;?>&ial=<?php echo $agravo_ial;?>" title="Desativado" role="button" class="btn btn-info rounded-circle"><span class="glyphicon glyphicon-question-sign"></a>';
                        }
                        return denimp;
                    }
                },
                {
                    "aTargets": [2], //nº da coluna
                    "mRender": function (data, type, full) { //aqui é uma função para identificar igm focus
                        var cczigmf = full[2];
                        switch (cczigmf) {
                            case 'Reagente':
                                cczigmf = '<button title="Igm Positivo" data-toggle="tooltip" class="btn btn-danger rounded-circle">IGM<br>POS</button>';
                                break;
                            case 'Não Reagente':
                                cczigmf = '<button class="btn btn-success rounded-circle">IGM<br>NEG</button>';
                                break;
                            case 'Inconclusivo':
                                cczigmf = '<button class="btn btn-default rounded-circle">IGM<br>INC</button>';
                                break;
                            case 'Coleta inadequada':
                                cczigmf = '<button class="btn btn-info rounded-circle">IGM<br>INA</button>';
                                break;
                            case null:
                                cczigmf = '<button class="btn btn-warning rounded-circle">IGM<br>ENR</button>';
                                break;
                            default: cczigmf = '<button class="btn btn-warning rounded-circle">IGM<br>ENR</button>';
                        }
                        return cczigmf;
                    }
                },
                {
                    "aTargets": [3], //nº da coluna
                    "mRender": function (data, type, full) { //aqui é uma função para identificar igm panbio
                        var cczigmp = full[3];
                        switch (cczigmp) {
                            case 'Reagente':
                                cczigmp = '<button title="Igm Positivo" data-toggle="tooltip" class="btn btn-danger rounded-circle">IGM<br>POS</button>';
                                break;
                            case 'Não Reagente':
                                cczigmp = '<button class="btn btn-success rounded-circle">IGM<br>NEG</button>';
                                break;
                            case 'Inconclusivo':
                                cczigmp = '<button class="btn btn-default rounded-circle">IGM<br>INC</button>';
                                break;
                            case 'Coleta inadequada':
                                cczigmp = '<button class="btn btn-info rounded-circle">IGM<br>INA</button>';
                                break;
                            case null:
                                cczigmp = '<button class="btn btn-warning rounded-circle">IGM<br>ENR</button>';
                                break;
                            default: cczigmp = '<button class="btn btn-warning rounded-circle">IGM<br>ENR</button>';
                        }
                        return cczigmp;
                    }
                },
                {
                    "aTargets": [4], //nº da coluna
                    "mRender": function (data, type, full) { //aqui é uma função para identificar ns1
                        var cczns1 = full[4];
                        switch (cczns1) {
                            case 'Reagente':
                                cczns1 = '<button class="btn btn-danger rounded-circle">NS1<br>POS</button>';
                                break;
                            case 'Não Reagente':
                                cczns1 = '<button class="btn btn-success rounded-circle">NS1<br>NEG</button>';
                                break;
                            case 'Inconclusivo':
                                cczns1 = '<button class="btn btn-default rounded-circle">NS1<br>INC</button>';
                                break;
                            case 'Coleta inadequada':
                                cczns1 = '<button class="btn btn-info rounded-circle">NS1<br>INA</button>';
                                break;
                            case null:
                                cczns1 = '<button class="btn btn-warning rounded-circle">NS1<br>ENR</button>';
                                break;
                            default: cczns1 = '<button class="btn btn-warning rounded-circle">NS1<br>ENR</button>';
                        }
                        return cczns1;
                    }
                },
                {
                    "aTargets": [5], //nº da coluna
                    "mRender": function (data, type, full) { //aqui é uma função para teste rápido
                        var dentr = full[5];
                        switch (dentr) {
                            case 'Reagente':
                                dentr = '<a href="http://10.47.171.110/sisdamweb/suvisjt.php?pag=list-bloq-dengue&sinan=<?php echo $agravo_sinan_sql;?>&tabela=<?php echo $agravo_tabela_sql;?>&buttons=<?php echo $agravo_buttons;?>&agravo=<?php echo $agravo;?>&ial=<?php echo $agravo_ial;?>&nDoc=' + full[0] + '&NM_PACIENT=' + full[7] + '&impresso=' + full [19] + '&Impressao=1Via-D&desc=nao&trapido=sim" role="button" class="btn btn-danger rounded-circle">TRA<br>POS</button>';
                                break;
                            case 'Nao Reagente':
                                dentr = '<a href="http://10.47.171.110/sisdamweb/suvisjt.php?pag=list-bloq-dengue&sinan=<?php echo $agravo_sinan_sql;?>&tabela=<?php echo $agravo_tabela_sql;?>&buttons=<?php echo $agravo_buttons;?>&agravo=<?php echo $agravo;?>&ial=<?php echo $agravo_ial;?>&nDoc=' + full[0] + '&NM_PACIENT=' + full[7] + '&impresso=' + full [19] + '&Impressao=1Via-D&desc=nao&trapido=sim" role="button" class="btn btn-success rounded-circle">TRA<br>NEG</button>';
                                break;
                            case 'Exame Nao Realizado':
                                dentr = '<a href="http://10.47.171.110/sisdamweb/suvisjt.php?pag=list-bloq-dengue&sinan=<?php echo $agravo_sinan_sql;?>&tabela=<?php echo $agravo_tabela_sql;?>&buttons=<?php echo $agravo_buttons;?>&agravo=<?php echo $agravo;?>&ial=<?php echo $agravo_ial;?>&nDoc=' + full[0] + '&NM_PACIENT=' + full[7] + '&impresso=' + full [19] + '&Impressao=1Via-D&desc=nao&trapido=sim" role="button" class="btn btn-warning rounded-circle">TRA<br>ENR</button>';
                                break;
                            default: dentr = '<a href="http://10.47.171.110/sisdamweb/suvisjt.php?pag=list-bloq-dengue&sinan=<?php echo $agravo_sinan_sql;?>&tabela=<?php echo $agravo_tabela_sql;?>&buttons=<?php echo $agravo_buttons;?>&agravo=<?php echo $agravo;?>&ial=<?php echo $agravo_ial;?>&nDoc=' + full[0] + '&NM_PACIENT=' + full[7] + '&impresso=' + full [19] + '&Impressao=1Via-D&desc=nao&trapido=sim" role="button" class="btn btn-warning rounded-circle">TRA<br>ENR</button>';
                        }
                        return dentr;
                    }
                },
            {
                "aTargets": [8], // nº da coluna
                "mRender": function (data, type, full) { //aqui é uma funçãocom setores e mapa
                    return '<a target="_blank" href="http://10.47.171.110/sisdamweb/setores/' + full[8] + '.pdf" role="button" class="btn btn-danger rounded-circle">' + full[8] + '</a>\n' +
                        '<a target="_blank" href="https://www.google.com.br/maps/dir/?api=1&origin=R. Maria Amália Lopes Azevedo, 3676 - Vila Albertina&destination=' + full[23] + '&travelmode=driving" role="button" class="btn btn-default rounded-circle"><img src="imagens/maps_64dp.png" width="20"></a>';
                }
            },
            {"aTargets": [10], // o numero 2 é o nº da coluna
                "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                    return  full[24] + ' ' + full[10] + ' Nº ' + full[21] + ' ' + full[22];
                }
            },
            {
                "aTargets": [12], //
                "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                    var dendesc = full[20];
                    switch (dendesc) {
                        case '0':
                            dendesc = '<a href="http://10.47.171.110/sisdamweb/suvisjt.php?pag=list-bloq-dengue&sinan=<?php echo $agravo_sinan_sql;?>&tabela=<?php echo $agravo_tabela_sql;?>&buttons=<?php echo $agravo_buttons;?>&agravo=<?php echo $agravo;?>&ial=<?php echo $agravo_ial;?>&nDoc=' + full[0] + '&NM_PACIENT=' + full[7] + '&impresso=' + full [19] + '&Impressao=1Via-D&desc=sim" title="Desativar" role="button" class="btn btn-danger rounded-circle"><span class="glyphicon glyphicon-trash"></a>';
                            break;
                        case '1':
                            dendesc = '<a href="http://10.47.171.110/sisdamweb/suvisjt.php?pag=list-bloq-dengue&sinan=<?php echo $agravo_sinan_sql;?>&tabela=<?php echo $agravo_tabela_sql;?>&buttons=<?php echo $agravo_buttons;?>&agravo=&ial=<?php echo $agravo_ial;?>&nDoc=' + full[0] + '&NM_PACIENT=' + full[7] + '&impresso=' + full [19] + '&Impresso=2Via-D&desc=sim" title="Desativar" role="button" class="btn btn-danger rounded-circle"><span class="glyphicon glyphicon-trash"></a>';
                            break;
                        case '2':
                            dendesc = '<a href="http://10.47.171.110/sisdamweb/suvisjt.php?pag=list-bloq-dengue&sinan=<?php echo $agravo_sinan_sql;?>&tabela=<?php echo $agravo_tabela_sql;?>&buttons=<?php echo $agravo_buttons;?>&agravo=<?php echo $agravo;?>&ial=<?php echo $agravo_ial;?>&nDoc=' + full[0] + '&NM_PACIENT=' + full[7] + '&impresso=' + full [19] + '&Impressao=1Via-R&desc=sim&list=dengue" title="Reativar" role="button" class="btn btn-success rounded-circle"><span class="glyphicon glyphicon-plus-sign"></a>';
                            break;
                        default: dendesc = '<a href="suvisjt.php?pag=impressão-ambiental&nDoc='+full [12]+'&NM_PACIENT='+full[7]+'&Impressao=1Via-R&sinan=<?php echo $agravo_sinan_sql;?>&tabela=<?php echo $agravo_tabela_sql;?>&buttons=<?php echo $agravo_buttons;?>&agravo=<?php echo $agravo;?>&ial=<?php echo $agravo_ial;?>&list=dengue" title="Desativado" role="button" class="btn btn-info rounded-circle"><span class="glyphicon glyphicon-question-sign"></a>';
                    }
                    return dendesc;
                }
            },
            {
                "aTargets": [13], // o numero 6 é o nº da coluna
                "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                    return '<a href="http://10.47.171.110/sisdamweb/suvisjt.php?pag=edit-ambiental&nDoc='+ full[0]+'&sinan=<?php echo $agravo_sinan_sql;?>&tabela=<?php echo $agravo_tabela_sql;?>&buttons=<?php echo $agravo_buttons;?>&agravo=<?php echo $agravo;?>&ial=<?php echo $agravo_ial;?>&list=dengue" role="button" class="btn btn-warning rounded-circle"><span class="glyphicon glyphicon-pencil"></a>';
                }
            },
            {"aTargets": [18], // o numero 2 é o nº da coluna
                "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                    return  full[25];
                }
            }
            ],
            buttons: [ {extend:'excel',title:'BLOQUEIOS DENGUE <?php echo date('Y');?>',header: 'BLOQUEIOS DENGUE <?php echo date('Y');?>',filename:'BLOQUEIOS DENGUE <?php echo date('Y');?>',className: 'btn btn-success',text:'<span class="fa fa-file-excel-o"></span>' },
                {extend: 'pdfHtml5',exportOptions: {columns: ':visible'},title:'BLOQUEIOS DENGUE <?php echo date('Y');?>',header: 'BLOQUEIOS DENGUE <?php echo date('Y');?>',filename:'BLOQUEIOS DENGUE <?php echo date('Y');?>',orientation: 'landscape',pageSize: 'LEGAL',className: 'btn btn-danger',text:'<span class="fa fa-file-pdf-o"></span>'},
                {extend:'print',exportOptions: {columns: ':visible'},title:'BLOQUEIOS DENGUE <?php echo date('Y');?>',header: 'BLOQUEIOS DENGUE <?php echo date('Y');?>',filename:'BLOQUEIOS DENGUE <?php echo date('Y');?>',className: 'btn btn-default',text:'<span class="fa fa-print"></span>'},
                {extend:'colvis',className: 'btn btn-info',text:'<span class="fa fa-list"></span>'} ]
        });

        $('#list-bloq-leptos').DataTable({responsive: {details: {display: $.fn.dataTable.Responsive.display.modal({header: function (row) {var data = row.data();
                            return 'Detalhes do Sinan : ' + data[1];}}),renderer: function ( api, rowIdx, columns ) {var data = $.map( columns, function ( col, i ) {
                        return '<tr>'+'<td>'+col.title+':'+'</td> '+'<td>'+col.data+'</td>'+'</tr>';} ).join('');
                        return $('<table/>').append( data ); } } },
            "language": {"sEmptyTable": "Nenhum registro encontrado","sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros","sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                "sInfoFiltered": "(Filtrados de _MAX_ registros)","sInfoThousands": ".","sLengthMenu": "_MENU_ Resultados por Página","sLoadingRecords": "Carregando...",
                "sProcessing": "Processando...","sZeroRecords": "Nenhum registro encontrado","sSearch": "Pesquisar","oPaginate": {"sNext": "Próximo","sPrevious": "Anterior","sFirst": "Primeiro","sLast": "Último"},
                "oAria": {"sSortAscending": "Ordenar colunas de forma ascendente","sPrevious": "Ordenar colunas de forma descendente"}},
            dom: "lBfrtip",processing: true, serverside: true, ajax: 'form-system/ambiental/list/proc-list-ambiental/list-bloq-lepto.php',
            "lengthMenu": [[4, 10, 25, 50, -1], [4, 10, 25, 50, "Todos"]], "aaSorting": [ 10, 'desc' ],
            "aoColumnDefs": [
                { type: 'de_date', targets: 5 },
                { type: 'de_date', targets: 8 },
                {
                    "aTargets": [1], //
                    "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                        var sinansv2 = full[1];
                        switch (sinansv2) {
                            case null:
                                sinansv2 = '<button class="btn btn-danger rounded-circle">SV2<br>NAO</button>';
                                break;
                            default:
                                sinansv2 = '<button class="btn btn-success rounded-circle">SV2<br>SIM</button>';
                        }
                        return sinansv2;
                    }
                },
                {
                    "aTargets": [3], //
                    "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                        var cczelisa = full[3];
                        switch (cczelisa) {
                            case 'Reagente':
                                cczelisa = '<button title="Igm Positivo" data-toggle="tooltip" class="btn btn-danger rounded-circle">ELI<br>POS</button>';
                                break;
                            case 'Não Reagente':
                                cczelisa = '<button class="btn btn-success rounded-circle">ELI<br>NEG</button>';
                                break;
                            case 'Inconclusivo':
                                cczelisa = '<button class="btn btn-default rounded-circle">ELI<br>INC</button>';
                                break;
                            case 'Coleta inadequada':
                                cczelisa = '<button class="btn btn-info rounded-circle">ELI<br>INA</button>';
                                break;
                            case null:
                                cczelisa = '<button class="btn btn-warning rounded-circle">ELI<br>ENR</button>';
                                break;
                            default: cczelisa = '<button class="btn btn-warning rounded-circle">ELI<br>ENR</button>';
                        }
                        return cczelisa;
                    }
                },
                {
                    "aTargets": [4], //
                    "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                        var cczmat = full[4];
                        switch (cczmat) {
                            case 'Reagente':
                                cczmat = '<button class="btn btn-danger rounded-circle">MAT<br>POS</button>';
                                break;
                            case 'Não Reagente':
                                cczmat = '<button class="btn btn-success rounded-circle">MAT<br>NEG</button>';
                                break;
                            case 'Inconclusivo':
                                cczmat = '<button class="btn btn-default rounded-circle">MAT<br>INC</button>';
                                break;
                            case 'Coleta inadequada':
                                cczmat = '<button class="btn btn-info rounded-circle">MAT<br>INA</button>';
                                break;
                            case null:
                                cczmat = '<button class="btn btn-warning rounded-circle">MAT<br>ENR</button>';
                                break;
                            default: cczmat = '<button class="btn btn-warning rounded-circle">MAT<br>ENR</button>';
                        }
                        return cczmat;
                    }
                },
                {
                    "aTargets": [2], // o numero 1 é o nº da coluna
                    "mRender": function (data, type, full) { //Função para capturar o id ou sinan
                        var lepimp = full[18];
                        switch (lepimp) {
                            case '0':
                                lepimp = '<a title="1ª Via" href="http://10.47.171.110/sisdamweb/suvisjt.php?pag=list-bloq-lepto&sinan=<?php echo $agravo_sinan_sql;?>&tabela=<?php echo $agravo_tabela_sql;?>&buttons=<?php echo $agravo_buttons;?>&agravo=<?php echo $agravo;?>&ial=<?php echo $agravo_ial;?>&list=lepto&impresso='+ full[18] +'&nDoc=' + full[0] + '&NM_PACIENT=' + full[6] + '&Impressao=1Via-B&desc=nao&trapido=nao" role="button" class="btn btn-success rounded-circle">1ªV<br><span class="glyphicon glyphicon-print"></a>';
                                break;
                            case '1':
                                lepimp = '<a title="2ª Via" href="http://10.47.171.110/sisdamweb/suvisjt.php?pag=list-bloq-lepto&sinan=<?php echo $agravo_sinan_sql;?>&tabela=<?php echo $agravo_tabela_sql;?>&buttons=<?php echo $agravo_buttons;?>&agravo=<?php echo $agravo;?>&ial=<?php echo $agravo_ial;?>&impresso='+ full[18] +'&nDoc=' + full[0] + '&NM_PACIENT=' + full[6] + '&Impressao=2Via-B&desc=nao&trapido=nao" role="button" class="btn btn-danger rounded-circle">2ªV<br><span class="glyphicon glyphicon-print"></a>';
                                break;
                            case '2':
                                lepimp = '<a title="Descartado" role="button" disabled class="btn btn-warning rounded-circle">3ª- <span class="glyphicon glyphicon-print"></a>';
                                break;
                            default: lepimp = '<a href="suvisjt.php?pag=impressão-ambiental&nDoc='+full [0]+'&NM_PACIENT='+full[6]+'&Impressao=1Via-R&sinan=<?php echo $agravo_sinan_sql;?>&tabela=<?php echo $agravo_tabela_sql;?>&buttons=<?php echo $agravo_buttons;?>&agravo=<?php echo $agravo;?>&ial=<?php echo $agravo_ial;?>" title="Desativado" role="button" class="btn btn-info rounded-circle"><span class="glyphicon glyphicon-question-sign"></a>';
                        }
                        return lepimp;
                    }
                },
                {
                    "aTargets": [7], // o numero 6 é o nº da coluna
                    "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                        return '<a target="_blank" href="http://10.47.171.110/sisdamweb/setores/' + full[7] + '.pdf" role="button" class="btn btn-danger rounded-circle">' + full[7] + '</a>\n' +
                            '<a target="_blank" href="https://www.google.com.br/maps/dir/?api=1&origin=R. Maria Amália Lopes Azevedo, 3676 - Vila Albertina&destination=' + full[21] + '&travelmode=driving" role="button" class="btn btn-default rounded-circle"><img src="imagens/maps_64dp.png" width="20"></a>';
                    }
                },
                {"aTargets": [9], // o numero 2 é o nº da coluna
                    "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                        return  full[25] + ' ' + full[9] + ' Nº ' + full[19] + ' ' + full[20];
                    }
                },
                {
                    "aTargets": [11], //
                    "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                        var lepdesc = full[18];
                        switch (lepdesc) {
                            case '0':
                                lepdesc = '<a href="http://10.47.171.110/sisdamweb/suvisjt.php?pag=list-bloq-lepto&sinan=<?php echo $agravo_sinan_sql;?>&tabela=<?php echo $agravo_tabela_sql;?>&buttons=<?php echo $agravo_buttons;?>&agravo=<?php echo $agravo;?>&ial=<?php echo $agravo_ial;?>&nDoc=' + full[0] + '&NM_PACIENT=' + full[6] + '&impresso=' + full [18] + '&Impressao=1Via-D&desc=sim" title="Desativar" role="button" class="btn btn-danger rounded-circle"><span class="glyphicon glyphicon-trash"></a>';
                                break;
                            case '1':
                                lepdesc = '<a href="http://10.47.171.110/sisdamweb/suvisjt.php?pag=list-bloq-lepto&sinan=<?php echo $agravo_sinan_sql;?>&tabela=<?php echo $agravo_tabela_sql;?>&buttons=<?php echo $agravo_buttons;?>&agravo=<?php echo $agravo;?>&ial=<?php echo $agravo_ial;?>&nDoc=' + full[0] + '&NM_PACIENT=' + full[6] + '&impresso=' + full [18] + '&Impresso=2Via-D&desc=sim" title="Desativar" role="button" class="btn btn-danger rounded-circle"><span class="glyphicon glyphicon-trash"></a>';
                                break;
                            case '2':
                                lepdesc = '<a href="http://10.47.171.110/sisdamweb/suvisjt.php?pag=list-bloq-lepto&sinan=<?php echo $agravo_sinan_sql;?>&tabela=<?php echo $agravo_tabela_sql;?>&buttons=<?php echo $agravo_buttons;?>&agravo=<?php echo $agravo;?>&ial=<?php echo $agravo_ial;?>&nDoc=' + full[0] + '&NM_PACIENT=' + full[6] + '&impresso=' + full [18] + '&Impressao=1Via-R&desc=sim&list=lepto" title="Reativar" role="button" class="btn btn-success rounded-circle"><span class="glyphicon glyphicon-plus-sign"></a>';
                                break;
                            default: lepdesc = '<a href="suvisjt.php?pag=impressão-ambiental&nDoc='+full [0]+'&NM_PACIENT='+full[6]+'&Impressao=1Via-R&sinan=<?php echo $agravo_sinan_sql;?>&tabela=<?php echo $agravo_tabela_sql;?>&buttons=<?php echo $agravo_buttons;?>&agravo=<?php echo $agravo;?>&ial=<?php echo $agravo_ial;?>&list=dengue" title="Desativado" role="button" class="btn btn-info rounded-circle"><span class="glyphicon glyphicon-question-sign"></a>';
                        }
                        return lepdesc;
                    }
                },
                {
                    "aTargets": [12], // o numero 6 é o nº da coluna
                    "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                        return '<a href="http://10.47.171.110/sisdamweb/suvisjt.php?pag=edit-ambiental&nDoc='+ full[0]+'&sinan=<?php echo $agravo_sinan_sql;?>&tabela=<?php echo $agravo_tabela_sql;?>&buttons=<?php echo $agravo_buttons;?>&agravo=<?php echo $agravo;?>&ial=<?php echo $agravo_ial;?>&list=dengue" role="button" class="btn btn-warning rounded-circle"><span class="glyphicon glyphicon-pencil"></a>';
                    }
                },
                {
                    "aTargets": [14], // o numero 6 é o nº da coluna
                    "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                        return full[26] + ' ' + full[14];
                    }
                }
            ],
            buttons: [ {extend:'excel',title:'BLOQUEIOS DENGUE <?php echo date('Y');?>',header: 'BLOQUEIOS DENGUE <?php echo date('Y');?>',filename:'BLOQUEIOS DENGUE <?php echo date('Y');?>',className: 'btn btn-success',text:'<span class="fa fa-file-excel-o"></span>' },
                {extend: 'pdfHtml5',exportOptions: {columns: ':visible'},title:'BLOQUEIOS DENGUE <?php echo date('Y');?>',header: 'BLOQUEIOS DENGUE <?php echo date('Y');?>',filename:'BLOQUEIOS DENGUE <?php echo date('Y');?>',orientation: 'landscape',pageSize: 'LEGAL',className: 'btn btn-danger',text:'<span class="fa fa-file-pdf-o"></span>'},
                {extend:'print',exportOptions: {columns: ':visible'},title:'BLOQUEIOS DENGUE <?php echo date('Y');?>',header: 'BLOQUEIOS DENGUE <?php echo date('Y');?>',filename:'BLOQUEIOS DENGUE <?php echo date('Y');?>',className: 'btn btn-default',text:'<span class="fa fa-print"></span>'},
                {extend:'colvis',className: 'btn btn-info',text:'<span class="fa fa-list"></span>'} ]
        });

        $('#list-ccz-dengue').DataTable({responsive: {details: {display: $.fn.dataTable.Responsive.display.modal({header: function (row) {var data = row.data();
                            return 'Detalhes do Sinan : ' + data[0];}}),renderer: function ( api, rowIdx, columns ) {var data = $.map( columns, function ( col, i ) {
                        return '<tr>'+'<td>'+col.title+':'+'</td> '+'<td>'+col.data+'</td>'+'</tr>';} ).join('');
                        return $('<table/>').append( data ); } } },
            "language": {"sEmptyTable": "Nenhum registro encontrado","sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros","sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                "sInfoFiltered": "(Filtrados de _MAX_ registros)","sInfoThousands": ".","sLengthMenu": "_MENU_ Resultados por Página","sLoadingRecords": "Carregando...",
                "sProcessing": "Processando...","sZeroRecords": "Nenhum registro encontrado","sSearch": "Pesquisar","oPaginate": {"sNext": "Próximo","sPrevious": "Anterior","sFirst": "Primeiro","sLast": "Último"},
                "oAria": {"sSortAscending": "Ordenar colunas de forma ascendente","sPrevious": "Ordenar colunas de forma descendente"}},
            dom: "lBfrtip",processing: true, serverside: true, ajax: 'form-system/ambiental/list/proc-list-ambiental/list-ccz-dengue.php',
            "lengthMenu": [[4, 10, 25, 50, -1], [4, 10, 25, 50, "Todos"]], "aaSorting": [ 0, 'desc' ],
            "aoColumnDefs": [
                { type: 'de_date', targets: 4 },
                { type: 'de_date', targets: 7 },
                { type: 'de_date', targets: 8 },
                { type: 'de_date', targets: 9 },
                //{"bVisible": false,"aTargets": [2]},
            {
                "aTargets": [0], //
                "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                    var sinanccz = full[0];
                    switch (sinanccz) {
                        case 'NI':
                            sinanccz = '<button class="btn btn-danger rounded-circle">N_CCZ</button>';
                            break;
                        case null:
                            sinanccz = '<button class="btn btn-danger rounded-circle">N_CCZ</button>';
                            break;
                    }
                    return sinanccz;
                }
            },
            {
                    "aTargets": [1], //
                    "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                        var cczigmf = full[1];
                        switch (cczigmf) {
                            case 'Reagente':
                                cczigmf = '<button class="btn btn-danger rounded-circle">IGM_RF</button>';
                                break;
                            case 'Não Reagente':
                                cczigmf = '<button class="btn btn-success rounded-circle">IGM_NRF</button>';
                                break;
                            case 'Inconclusivo':
                                cczigmf = '<button class="btn btn-default rounded-circle">IGM_INF</button>';
                                break;
                            case 'Coleta inadequada':
                                cczigmf = '<button class="btn btn-info rounded-circle">IGM_CIF</button>';
                                break;
                            case null:
                                cczigmf = '<button class="btn btn-warning rounded-circle">IGM_ENF</button>';
                                break;
                            default: cczigmf = '<button class="btn btn-warning rounded-circle">IGM_ENF</button>';
                        }
                        return cczigmf;
                    }
                },
                {
                    "aTargets": [2], //
                    "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                        var cczigmp = full[2];
                        switch (cczigmp) {
                            case 'Reagente':
                                cczigmp = '<button class="btn btn-danger rounded-circle">IGM_RP</button>';
                                break;
                            case 'Não Reagente':
                                cczigmp = '<button class="btn btn-success rounded-circle">IGM_NRP</button>';
                                break;
                            case 'Inconclusivo':
                                cczigmp = '<button class="btn btn-default rounded-circle">IGM_INP</button>';
                                break;
                            case 'Coleta inadequada':
                                cczigmp = '<button class="btn btn-info rounded-circle">IGM_CIP</button>';
                                break;
                            case null:
                                cczigmp = '<button class="btn btn-danger rounded-circle"><span class="glyphicon glyphicon-question-sign"></button>';
                                break;
                            default: cczigmp = '<button class="btn btn-warning rounded-circle">IGM_ENF</button>';
                        }
                        return cczigmp;
                    }
                },
                {
                    "aTargets": [3], //
                    "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                        var cczns1 = full[3];
                        switch (cczns1) {
                            case 'Reagente':
                                cczns1 = '<button class="btn btn-danger rounded-circle">NS1_R</button>';
                                break;
                            case 'Não Reagente':
                                cczns1 = '<button class="btn btn-success rounded-circle">NS1_NR</button>';
                                break;
                            case 'Inconclusivo':
                                cczns1 = '<button class="btn btn-default rounded-circle">NS1_IN</button>';
                                break;
                            case 'Coleta inadequada':
                                cczns1 = '<button class="btn btn-info rounded-circle">NS1_CI</button>';
                                break;
                            case null:
                                cczns1 = '<button class="btn btn-danger rounded-circle"><span class="glyphicon glyphicon-question-sign"></button>';
                                break;
                            default: cczns1 = '<button class="btn btn-warning rounded-circle">NS1_EN</button>';
                        }
                        return cczns1;
                    }
                },
                {
                    "aTargets": [4], //
                    "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                        var ccz1sin = full[4];
                        switch (ccz1sin) {
                            case 'Não informado':
                                ccz1sin = "01/01/2018";
                                break;
                        }
                        return ccz1sin;
                    }
                },
                {
                    "aTargets": [7], //
                    "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                        var cczcol = full[7];
                        switch (cczcol) {
                            case 'Não informado':
                                cczcol = "01/01/2018";
                                break;
                        }
                        return cczcol;
                    }
                },
                {
                    "aTargets": [8], //
                    "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                        var cczres = full[8];
                        switch (cczres) {
                            case 'Não informado':
                                cczres = "01/01/2018";
                                break;
                        }
                        return cczres;
                    }
                },
                {
                    "aTargets": [9], //
                    "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                        var cczent = full[9];
                        switch (cczent) {
                            case 'Não informado':
                                cczent = "01/01/2018";
                                break;
                        }
                        return cczent;
                    }
                },
            {
                "aTargets": [2], //
                "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                    var sinanccz = full[2];
                    switch (sinanccz) {
                        case 'NI':
                            sinanccz = '<button class="btn btn-dark rounded-circle"><span class="glyphicon glyphicon-question-sign"></button>';
                            break;
                        case '':
                            sinanccz = '<button class="btn btn-outline-danger rounded-circle"><span class="glyphicon glyphicon-question-sign"></button>';
                            break;
                    }
                    return sinanccz;
                }
            }
    ],
            buttons: [ {extend:'excel',title:'Casos Lepto-CCZ-SINAN',header: 'Casos Lepto-CCZ-SINAN',filename:'Casos Lepto-CCZ-SINAN',className: 'btn btn-success',text:'<span class="fa fa-file-excel-o"></span>' },
                {extend: 'pdfHtml5',exportOptions: {columns: ':visible'},title:'Casos Lepto-CCZ-SINAN',header: 'Casos Lepto-CCZ-SINAN',filename:'Casos Lepto-CCZ-SINAN',orientation: 'landscape',pageSize: 'LEGAL',className: 'btn btn-danger',text:'<span class="fa fa-file-pdf-o"></span>'},
                {extend:'print', exportOptions: {columns: ':visible'},title:'Casos Lepto-CCZ-SINAN',header: 'Casos Lepto-CCZ-SINAN',filename:'Casos Lepto-CCZ-SINAN',className: 'btn btn-default',text:'<span class="fa fa-print"></span>'},
                {extend:'colvis',titleAttr: 'Select Colunas',className: 'btn btn-info',text:'<span class="fa fa-list"></span>'} ]
        });

        $('#list-pe-ie').DataTable({responsive: {details: {display: $.fn.dataTable.Responsive.display.modal({header: function (row) {var data = row.data();
                            return 'Detalhes do Sinan : ' + data[1];}}),renderer: function ( api, rowIdx, columns ) {var data = $.map( columns, function ( col, i ) {
                        return '<tr>'+'<td>'+col.title+':'+'</td> '+'<td>'+col.data+'</td>'+'</tr>';} ).join('');
                        return $('<table/>').append( data ); } } },
            "language": {"sEmptyTable": "Nenhum registro encontrado","sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros","sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                "sInfoFiltered": "(Filtrados de _MAX_ registros)","sInfoThousands": ".","sLengthMenu": "_MENU_ Resultados por Página","sLoadingRecords": "Carregando...",
                "sProcessing": "Processando...","sZeroRecords": "Nenhum registro encontrado","sSearch": "Pesquisar","oPaginate": {"sNext": "Próximo","sPrevious": "Anterior","sFirst": "Primeiro","sLast": "Último"},
                "oAria": {"sSortAscending": "Ordenar colunas de forma ascendente","sPrevious": "Ordenar colunas de forma descendente"}},
            dom: "lBfrtip",processing: true, serverside: true, ajax: 'form-system/ambiental/list/proc-list-ambiental/list-pe-ie.php',
            "lengthMenu": [[4, 10, 25, 50, -1], [4, 10, 25, 50, "Todos"]], "aaSorting": [ 10, 'desc' ],
            "aoColumnDefs": [
                {"bVisible": false,"aTargets": [3]},
                {"bVisible": false,"aTargets": [13]},
                {"bVisible": false,"aTargets": [14]},
                {
                    "aTargets": [0], //
                    "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                        var statuspe = full[5];
                        switch (statuspe) {
                            case 'Em atividade':
                                statuspe = '<button class="btn btn-success rounded-circle">'+full[0]+'</button>';
                                break;
                            case 'Sem atividade':
                                statuspe = '<button class="btn btn-danger rounded-circle">'+full[0]+'</button>';
                                break;
                            default: statuspe = '<button class="btn btn-warning rounded-circle">'+full[0]+'</button>';
                        }
                        return statuspe;
                    }
                },
                {
                    "aTargets": [4], //
                    "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                        var riscope = full[4];
                        switch (riscope) {
                            case '1':
                                riscope = '<button class="btn btn-danger rounded-circle">ALTO</button>';
                                break;
                            case '2':
                                riscope = '<button class="btn btn-warning rounded-circle">MÉDIO</button>';
                                break;
                            case '3':
                                riscope = '<button class="btn btn-success rounded-circle">BAIXO</button>';
                                break;
                            default: riscope = '<button class="btn btn-default rounded-circle">DESC</button>';
                        }
                        return riscope;
                    }
                },
                {
                    "aTargets": [7], // o numero 7 é da array do setor
                    "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                        return '<a target="_blank" href="http://10.47.171.110/sisdamweb/setores/' + full[7] + '.pdf" role="button" class="btn btn-danger rounded-circle">' + full[7] + '</a>';
                    }
                },
                {"aTargets": [8], // o numero 2 é o nº da coluna
                    "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                        return  full[19] + ' ' + full[9] + ' Nº ' + full[20] + ' ' + full[21];
                    }
                },
                {
                    "aTargets": [9], // o numero 6 é o nº da coluna
                    "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                        return '<a target="_blank" href="https://www.google.com.br/maps/dir/?api=1&origin=R. Maria Amália Lopes Azevedo, 3676 - Vila Albertina&destination=' + full[10] + '&travelmode=driving" role="button" class="btn btn-default rounded-circle"><img src="imagens/maps_64dp.png" width="20"></a>';
                    }
                },
                {
                    "aTargets": [10], // o numero 7 é da array do setor
                    "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                        return '<a href="#" role="button" class="btn btn-danger rounded-circle"><span class="glyphicon glyphicon-trash"></a>';
                    }
                },
                {
                    "aTargets": [11], // o numero 6 é o nº da coluna
                    "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                        return '<a href="http://10.47.171.110/sisdamweb/suvisjt.php?pag=edit-pe-ie-jt&id='+ full[11]+'" role="button" class="btn btn-warning rounded-circle"><span class="glyphicon glyphicon-pencil"></a>';
                    }
                },
                {"aTargets": [12], // o numero 2 é o nº da coluna
                    "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                        return  full[13] + ' ' + full[29] + ' ' + full[30] + ' ' + full[31];
                    }
                },
                {"aTargets": [13], // o numero 2 é o nº da coluna
                    "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                        return  full[27];
                    }
                },
                {"aTargets": [14], // o numero 2 é o nº da coluna
                    "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                        return  full[15];
                    }
                }
            ],
            buttons: [ {extend:'excel',title:'PE / IE <?php echo date('Y');?>',header: 'PE / IE <?php echo date('Y');?>',filename:'PE / IE <?php echo date('Y');?>',className: 'btn btn-success',text:'<span class="fa fa-file-excel-o"></span>' },
                {extend: 'pdfHtml5',exportOptions: {columns: ':visible'},title:'PE / IE <?php echo date('Y');?>',header: 'PE / IE <?php echo date('Y');?>',filename:'PE / IE <?php echo date('Y');?>',orientation: 'landscape',pageSize: 'LEGAL',className: 'btn btn-danger',text:'<span class="fa fa-file-pdf-o"></span>'},
                {extend:'print',exportOptions: {columns: ':visible'},title:'PE / IE <?php echo date('Y');?>',header: 'PE / IE <?php echo date('Y');?>',filename:'PE / IE <?php echo date('Y');?>',className: 'btn btn-default',text:'<span class="fa fa-print"></span>'},
                {extend:'colvis',className: 'btn btn-info',text:'<span class="fa fa-list"></span>'} ]
        });

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
                {"bVisible": false,"aTargets": [0]},
                {"bVisible": false,"aTargets": [1]},
                {"bVisible": false,"aTargets": [4]},
                {"bVisible": false,"aTargets": [6]},
                {"bVisible": false,"aTargets": [11]},
                {"bVisible": false,"aTargets": [12]},
                {"bVisible": false,"aTargets": [13]},
                {"bVisible": false,"aTargets": [14]},
                {
                    "aTargets": [3], // o numero 6 é o nº da coluna
                    "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                        return full[3] + ' <a href="http://10.47.171.110/sisdamweb/suvisjt.php?pag=edit-esporo-animal&id='+ full[30]+'" role="button" class="btn btn-warning rounded-circle"><strong><span class="glyphicon glyphicon-pencil"></strong></a>';
                    }
                },
                {"aTargets": [5], // o numero 2 é o nº da coluna
                    "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                        return  '<a target="_blank" href="https://www.google.com.br/maps/dir/?api=1&origin=R. Maria Amália Lopes Azevedo, 3676 - Vila Albertina&destination=' + full[5] + ', ' + full[7] +' - ' + full[24] + '&travelmode=driving" role="button" class="btn btn-default rounded-circle"><img src="imagens/maps_64dp.png" width="20"></a> ' +
                            full[5] + ', ' + full[7] + ' - ' + full[24] ;
                    }
                },
                {"aTargets": [7], // o numero 2 é o nº da coluna
                    "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                        
                        return  full[25] + full[26] + '<br> ' + full[27] + full[28];
                    }
                },
                {"aTargets": [9], // o numero 2 é o nº da coluna
                    "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                        return  full[9] + '<br>' + full[29] + ' mg/dia';
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


