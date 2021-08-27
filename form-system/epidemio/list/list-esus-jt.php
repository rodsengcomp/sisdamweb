<!-- Este projeto é desenvolvido na Suvis Jaçanã-Tremembé com iniciativa dos colaboradores da Unidade -->
<!-- Código desenvolvido por Rodolfo Romaioli Ribeiro de Jesus - rodolfo.romaioli@gmail.com -->
<!-- Sisdam Web - 2.0 - 2017 - Todos os direitos reservados -->

<div class="container-fluid" role="main" xmlns="http://www.w3.org/1999/html">

    <script>$(document).ready(function(){$('#modal-manutencao').modal('show');});</script>



    <?php
    // DEFINE O FUSO HORARIO COMO O HORARIO DE BRASILIA
    date_default_timezone_set('America/Sao_Paulo');
    // CRIA UMA VARIAVEL E ARMAZENA A HORA ATUAL DO FUSO-HORÀRIO DEFINIDO (BRASÍLIA)
    //$dataLocal = date('d/m/Y H:i:s', time());

    //funções para converter campos numericos como CLASSI_FIN, CRITERIO, EVOLUCAO
    include_once 'functions.php';

    $result_coque = "SELECT esus.`Número da Notificação` AS NU_NOTIFIC, esus.`Nome Paciente` AS NM_PACIENT, esus.`Data do início dos sintomas` AS DT_SIN_PRI, esus.`Data de Nascimento` AS DT_NASC, esus.`Data da Notificação` AS DT_NOTIFIC,
    esus.`Sexo` AS CS_SEXO, ID_CNS_SUS, coquenet.NM_MAE_PAC, coquenet.ID_DISTRIT, coquenet.ID_BAIRRO, coquenet.NM_BAIRRO, coquenet.ID_LOGRADO,
    coquenet.NM_LOGRADO, coquenet.NU_NUMERO, coquenet.NM_COMPLEM, coquenet.NM_REFEREN, coquenet.NU_DDD_TEL, coquenet.NU_TELEFON,
    coquenet.CLASSI_FIN, coquenet.CRITERIO, coquenet.EVOLUCAO, coquenet.DT_OBITO, coquenet.DT_ENCERRA, coquenet.NU_LOTE_I,
    coque_ial.Paciente, coque_ial.`Status Exame`, coque_ial.`Dt. Liberação`, coque_ial.`Dt. Recebimento`, coque_ial.`Dt. Cadastro`, coque_ial.Resultado
    FROM coquenet INNER JOIN coque_ial ON coquenet.NM_PACIENT = coque_ial.Paciente
    WHERE coquenet.ID_DISTRIT Like \"70\"";

    $resultado = $conectar->query($result_coque);

    $result_table = "SELECT CREATE_TIME FROM information_schema.tables WHERE TABLE_NAME = 'coque_ial' ORDER BY `CREATE_TIME` DESC";
    $result = $conectar->query($result_table);
    $row_result_ial = mysqli_fetch_assoc($result);

    $result_table = "SELECT CREATE_TIME FROM information_schema.tables WHERE TABLE_NAME = 'coquenet' ORDER BY `CREATE_TIME` DESC";
    $result = $conectar->query($result_table);
    $row_result_sinan = mysqli_fetch_assoc($result);
    ?>

    <script type="text/javascript">
        $(document).ready(function() {

            $('#list-sinan-ial-coque').DataTable({responsive: {details: {display: $.fn.dataTable.Responsive.display.modal({header: function (row) {var data = row.data();
                                return 'Detalhes do Sinan : ' + data[1];}}),renderer: function ( api, rowIdx, columns ) {var data = $.map( columns, function ( col, i ) {
                            return '<tr>'+'<td>'+col.title+':'+'</td> '+'<td>'+col.data+'</td>'+'</tr>';} ).join('');
                            return $('<table/>').append( data ); } } },
                "language": {"sEmptyTable": "Nenhum registro encontrado","sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros","sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                    "sInfoFiltered": "(Filtrados de _MAX_ registros)","sInfoThousands": ".","sLengthMenu": "_MENU_ Resultados por Página","sLoadingRecords": "Carregando...",
                    "sProcessing": "Processando...","sZeroRecords": "Nenhum registro encontrado","sSearch": "Pesquisar","oPaginate": {"sNext": "Próximo","sPrevious": "Anterior","sFirst": "Primeiro","sLast": "Último"},
                    "oAria": {"sSortAscending": "Ordenar colunas de forma ascendente","sPrevious": "Ordenar colunas de forma descendente"}},
                dom: "lBfrtip",processing: true, serverside: true, ajax: 'form-system/epidemio/list/proc-list-epidemio/list-sinan-ial-coque.php',
                "lengthMenu": [[4, 10, 25, 50, -1], [4, 10, 25, 50, "Todos"]], "aaSorting": [ 0, 'desc' ],
                "aoColumnDefs": [
                    { type: 'de_date', targets: 4 },
                    { type: 'de_date', targets: 5 },
                    { type: 'de_date', targets: 14 },
                    { type: 'de_datetime', targets: 16 },
                    { type: 'de_datetime', targets: 17 },
                    { type: 'de_datetime', targets: 18 },
                    {"bVisible": false,"aTargets": [15]},
                    {"bVisible": false,"aTargets": [16]},
                    {"bVisible": false,"aTargets": [17]},
                    {"bVisible": false,"aTargets": [18]},
                    //{"aTargets": [2], // o numero 2 é o nº da coluna
                    //"mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                    //return full[2] + '\n' +full[3] + '\n' +full[4] ;
                    //}
                    //}
                    {"aTargets": [1], // o numero 2 é o nº da coluna
                        "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                            return full[1] + ' - ' ;
                        }
                    },
                    {
                        "aTargets": [3], // o numero é o nº da coluna
                        "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                            var ialgal = full[3];
                            switch (ialgal) {
                                case ' \r':
                                    ialgal = '<a target="_blank" href="https://gal.saude.sp.gov.br/gal/bmh/consulta-paciente-laboratorio/imprimir-resultado/?requisicoes=[%22'+ full [31] +'%22]">'+full[2]+'</a>';
                                    break;
                                case 'Não houve crescimento ':
                                    ialgal = '<a target="_blank" href="https://gal.saude.sp.gov.br/gal/bmh/consulta-paciente-laboratorio/imprimir-resultado/?requisicoes=[%22'+ full [31] +'%22]">'+full[3]+'</a>';
                                    break;
                                case 'Cultura contaminada \r':
                                    ialgal = '<a target="_blank" href="https://gal.saude.sp.gov.br/gal/bmh/consulta-paciente-laboratorio/imprimir-resultado/?requisicoes=[%22'+ full [31] +'%22]">'+full[3]+'</a>';
                                    break;
                                default: ialgal = '<a target="_blank" href="https://gal.saude.sp.gov.br/gal/bmh/consulta-paciente-laboratorio/imprimir-resultado/?requisicoes=[%22'+ full [31] +'%22]" title="Desativado" >Sem Coleta</a>';
                            }
                            return ialgal;
                        }
                    },
                    {"aTargets": [12], // o numero 2 é o nº da coluna
                        "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                            var clasfin = full[12];
                            switch (clasfin) {
                                case '':
                                    clasfin = "Investigação";
                                    break;
                                case '2':
                                    clasfin = "Descartado";
                                    break;
                                case '1':
                                    clasfin = "Inconclusivo";
                                    break;
                                default: clasfin = "Investigação";
                            }
                            return clasfin;
                        }
                    },
                    {"aTargets": [13], // o numero 2 é o nº da coluna
                        "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                            var crit = full[13];
                            switch (crit) {
                                case '':
                                    crit = "Investigação";
                                    break;
                                case '1':
                                    crit = "Cura";
                                    break;
                                case '2':
                                    crit = "Óbito por coqueluche";
                                    break;
                                case '3':
                                    crit = " Óbito por outras causas";
                                    break;
                                case '9':
                                    crit = " Ignorado";
                                    break;
                                default: crit = "Investigação";
                            }
                            return crit;
                        }
                    }
                ],
                buttons: [ {extend:'excel',title:'Casos Coqueluche-IAL-SINAN',header: 'Coqueluche IAL-SINAN',filename:'Coqueluche-IAL-SINAN',className: 'btn btn-success',text:'<span class="fa fa-file-excel-o"></span>' },
                    {extend: 'pdfHtml5',exportOptions: {columns: ':visible'},title:'Casos Coqueluche-IAL-SINAN',header: 'Coqueluche IAL-SINAN',filename:'Coqueluche-IAL-SINAN',orientation: 'landscape',pageSize: 'LEGAL',className: 'btn btn-danger',text:'<span class="fa fa-file-pdf-o"></span>'},
                    {extend:'print',exportOptions: {columns: ':visible'},title:'Casos Coqueluche - IAL - SINAN',header: 'Coqueluche IAL-SINAN',filename:'Coqueluche-IAL-SINAN',className: 'btn btn-default',text:'<span class="fa fa-print"></span>'},
                    {extend:'colvis',className: 'btn btn-info',text:'<span class="fa fa-list"></span>'} ]
            });

        });

    </script>

    <!-- begin PAGE TITLE ROW -->
    <div class="row">

            <!-- Página de Título -->
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <img id="logo-img" class="img-responsive center-block" alt="Responsive image" src="imagens/manutencaos.png"/>
                    </div>
                </div>
            </div>

        <div class="col-md-12">
            <div class="page-header">
                <ol class="breadcrumb">
                    <li><i class="fa fa-database"></i> <a href="suvisjt.php">Sisdam Web</a>
                    </li>
                    <li class="active">Sinan At. em - <?php echo date("d/m/Y",strtotime($row_result_ial['CREATE_TIME'])) ; ?> às
                        <?php echo date("H:i:s",strtotime($row_result_ial['CREATE_TIME'])) ; ?></li>
                    <li class="active">IAL At. em - <?php echo date("d/m/Y",strtotime($row_result_sinan['CREATE_TIME'])) ; ?> às
                        <?php echo date("H:i:s",strtotime($row_result_sinan['CREATE_TIME'])) ; ?></li>
                </ol>
                <button type="button" class="btn btn-info btn-labeled btn-lg btn-block"><span class="btn-label"><i
                    class="glyphicon glyphicon-plus"></i></span> e-SUS - UVIS JT</button>
            </div>
        </div>
    </div>
    <!-- /.row -->

    <table id="list-sinan-ial-coque" class="table table-hover table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th class="text-center">SINAN</th>
            <th class="text-center">NOME</th>
            <th class="text-center">STATUS</th>
            <th class="text-center">RESULTADO</th>
            <th class="text-center">DT 1ºSINT/S</th>
            <th class="text-center">DT. NOT.</th>
            <th class="text-center">CARTAO SUS</th>
            <th class="text-center">MAE</th>
            <th class="text-center">DA</th>
            <th class="text-center">ENDEREÇO</th>
            <th class="text-center">UBS</th>
            <th class="text-center">TEL</th>
            <th class="text-center">CLASS</th>
            <th class="text-center">EVOL</th>
            <th class="text-center">ENC</th>
            <th class="text-center">LOTE</th>
            <th class="text-center">LIB</th>
            <th class="text-center">REC</th>
            <th class="text-center">CAD</th>
        </tr>
        </thead>
        <tbody>
        <tr>


        </tr>
        </tbody>
    </table>
</div>