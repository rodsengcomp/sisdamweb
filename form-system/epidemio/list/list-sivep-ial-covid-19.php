<!-- Este projeto é desenvolvido na Suvis Jaçanã-Tremembé com iniciativa dos colaboradores da Unidade -->
<!-- Código desenvolvido por Rodolfo Romaioli Ribeiro de Jesus - rodolfo.romaioli@gmail.com -->
<!-- Sisdam Web - 2.0 - 2017 - Todos os direitos reservados -->

<div class="container-fluid" role="main" xmlns="http://www.w3.org/1999/html">

    <div class="modal-body"><div class="row"><div class="text-center">
                <img id="logo-img" class="img-responsive center-block" alt="Responsive image" src="imagens/construcao.jpg"/>
                <h1>Página em Construção - </h1><h1><strong> *** SISDAMWEB *** </strong></h1>
            </div></div></div>

    <!--<script>$(document).ready(function(){$('#modal-manutencao').modal('show');});</script>-->



    <?php

    /* include_once 'form-system/epidemio/maps/proc-maps-epidemio/proc-maps-sarampo-count.php'; -- Aqui começa o php *************

    // DEFINE O FUSO HORARIO COMO O HORARIO DE BRASILIA
    date_default_timezone_set('America/Sao_Paulo');
    // CRIA UMA VARIAVEL E ARMAZENA A HORA ATUAL DO FUSO-HORÀRIO DEFINIDO (BRASÍLIA)
    //$dataLocal = date('d/m/Y H:i:s', time());

    //funções para converter campos numericos como CLASSI_FIN, CRITERIO, EVOLUCAO
    include_once 'functions.php';

    $result_sarampo = "SELECT exantnet.DT_NOTIFIC, exantnet.DT_SIN_PRI, exantnet.SEM_PRI, exantnet.NM_PACIENT, exantnet.DT_NASC,
    exantnet.NM_LOGRADO, exantnet.NU_NUMERO, exantnet.NM_COMPLEM, exantnet.NM_CONTATO, exantnet.NM_REFEREN, exantnet.CS_VACINA,
    exantnet.DT_DOSE_N, exantnet.CS_VACINAL, exantnet.MENOR_5ANO, exantnet.DE5A14ANOS,exantnet.DE15A39ANO,exantnet.CLASSI_FIN,
    exantnet.CRITERIO, exantnet.EVOLUCAO, exantnet.DT_OBITO, exantnet.DT_ENCERRA, 
    sarampo_ial.Paciente, sarampo_ial.`Status Exame`, sarampo_ial.`Dt. Liberação`, sarampo_ial.`Dt. Recebimento`, sarampo_ial.`Dt. Cadastro`,
    sarampo_ial.Resultado, sarampo_ial.Exame, sarampo_ial.Requisição
    FROM exantnet INNER JOIN sarampo_ial ON exantnet.NM_PACIENT = sarampo_ial.Paciente
    WHERE exantnet.ID_DISTRIT Like \"70\"";

    $resultado = $conectar->query($result_sarampo);

    $result_table = "SELECT CREATE_TIME FROM information_schema.tables WHERE TABLE_NAME = 'sarampo_ial' ORDER BY `CREATE_TIME` DESC";
    $result = $conectar->query($result_table);
    $row_result_ial = mysqli_fetch_assoc($result);

    $result_table = "SELECT CREATE_TIME FROM information_schema.tables WHERE TABLE_NAME = 'exantnet' ORDER BY `CREATE_TIME` DESC";
    $result = $conectar->query($result_table);
    $row_result_sinan = mysqli_fetch_assoc($result);

    $sql_button_at_end = $conectar->query("SELECT exantnet.NU_NOTIFIC, exantnet.ID_DISTRIT
    FROM exantnet LEFT JOIN tblsarampo ON exantnet.NU_NOTIFIC = tblsarampo.nDoc
    WHERE (((exantnet.ID_DISTRIT)=\"70\") AND ((tblsarampo.nDoc) Is Null))");

    ?>

    <script type="text/javascript">
        $(document).ready(function() {

            $('#list-sinan-ial-sarampo').DataTable({responsive: {details: {display: $.fn.dataTable.Responsive.display.modal({header: function (row) {var data = row.data();
                                return 'Detalhes do Sinan : ' + data[0];}}),renderer: function ( api, rowIdx, columns ) {var data = $.map( columns, function ( col, i ) {
                            return '<tr>'+'<td>'+col.title+':'+'</td> '+'<td>'+col.data+'</td>'+'</tr>';} ).join('');
                            return $('<table/>').append( data ); } } },
                "language": {"sEmptyTable": "Nenhum registro encontrado","sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros","sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                    "sInfoFiltered": "(Filtrados de _MAX_ registros)","sInfoThousands": ".","sLengthMenu": "_MENU_ Resultados por Página","sLoadingRecords": "Carregando...",
                    "sProcessing": "Processando...","sZeroRecords": "Nenhum registro encontrado","sSearch": "Pesquisar","oPaginate": {"sNext": "Próximo","sPrevious": "Anterior","sFirst": "Primeiro","sLast": "Último"},
                    "oAria": {"sSortAscending": "Ordenar colunas de forma ascendente","sPrevious": "Ordenar colunas de forma descendente"}},
                dom: "lBfrtip",processing: true, serverside: true, ajax: 'form-system/epidemio/list/proc-list-epidemio/list-sivep-ial-covid-19.php',
                "lengthMenu": [[4, 10, 25, 50, -1], [4, 10, 25, 50, "Todos"]], "aaSorting": [ 0, 'desc' ],
                "aoColumnDefs": [
                    { type: 'de_date', targets: 6 },
                    { type: 'de_date', targets: 7 },
                    { type: 'de_date', targets: 10 },
                    { type: 'de_date', targets: 17 },
                    {"bVisible": false,"aTargets": [2]},
                    {"bVisible": false,"aTargets": [19]},
                    {"bVisible": false,"aTargets": [20]},
                    {"bVisible": false,"aTargets": [21]},
                    {"bVisible": false,"aTargets": [22]},
                    {"bVisible": false,"aTargets": [23]},
                    {"bVisible": false,"aTargets": [24]},
                    {"bVisible": false,"aTargets": [25]},
                    {"bVisible": false,"aTargets": [26]},
                    {"bVisible": false,"aTargets": [27]},
                    {"bVisible": false,"aTargets": [28]},
                    //{"aTargets": [2], // o numero 2 é o nº da coluna
                    //"mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                    //return full[2] + '\n' +full[3] + '\n' +full[4] ;
                    //}
                    //}
                    {
                        "aTargets": [1], // o numero 6 é o nº da coluna
                        "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                            return '<a target="_blank" href="https://www.google.com.br/maps/dir/?api=1&origin=R. Maria Amália Lopes Azevedo, 3676 - Vila Albertina&destination=' + full[1] + '&travelmode=driving" role="button" class="btn btn-default rounded-circle"><img src="imagens/maps_64dp.png" width="20"></a>';
                        }
                    },
                    {"aTargets": [5], // o numero 2 é o nº da coluna
                        "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                            return '<a target="_blank" href="https://gal.saude.sp.gov.br/gal/bmh/consulta-paciente-laboratorio/imprimir-resultado/?requisicoes=[%22'+ full [2] +'%22]">'+full[5]+'</a>';
                        }

                    },
                    {"aTargets": [11], // o numero 2 é o nº da coluna
                        "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                            return full[11] + ' - Nº ' + full[12] ;
                        }
                    },
                    {"aTargets": [15], // o numero 6 é o nº da coluna
                        "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                            return '<a href="http://10.47.171.110/sisdamweb/suvisjt.php?pag=edit-end-epidemio&nDoc=' + full [0] + '&sinan=exantnet&tabela=tblsarampo&buttons=sarampo&agravo=SARAMPO&ial=sarampo_ial&list=sarampo" role="button" class="btn btn-warning rounded-circle"><span class="glyphicon glyphicon-pencil"></a>';
                        }
                    },
                    /*

                    {"aTargets": [20], // o numero 2 é o nº da coluna
                        "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                            var clasfin = full[20];
                            switch (clasfin) {
                                case '':
                                    clasfin = "Investigação";
                                    break;
                                case '1':
                                    clasfin = "Sarampo";
                                    break;
                                case '2':
                                    clasfin = "Rubéola";
                                    break;
                                case '3':
                                    clasfin = "Descartado";
                                    break;
                                default: clasfin = "Investigação";
                            }
                            return clasfin;
                        }
                    },
                    {
                        "aTargets": [27], //
                        "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                            return '<a href="http://10.47.171.110/sisdamweb/suvisjt.php?pag=list-sinan-ial-sarampo" title="Descartar" role="button" class="btn btn-danger rounded-circle"><span class="glyphicon glyphicon-trash"></a>';
                        }
                    }
                ],
                buttons: [ {extend:'excel',title:'Casos Sarampo-IAL-SINAN',header: 'Sarampo IAL-SINAN',filename:'Sarampo-IAL-SINAN',className: 'btn btn-success',text:'<span class="fa fa-file-excel-o"></span>' },
                    {extend: 'pdfHtml5',exportOptions: {columns: ':visible'},title:'Casos Sarampo-IAL-SINAN',header: 'Sarampo IAL-SINAN',filename:'Sarampo-IAL-SINAN',orientation: 'landscape',pageSize: 'LEGAL',className: 'btn btn-danger',text:'<span class="fa fa-file-pdf-o"></span>'},
                    {extend:'print',exportOptions: {columns: ':visible'},title:'Casos Sarampo - IAL - SINAN',header: 'Sarampo IAL-SINAN',filename:'Sarampo-IAL-SINAN',className: 'btn btn-default',text:'<span class="fa fa-print"></span>'},
                    {extend:'colvis',className: 'btn btn-info',text:'<span class="fa fa-list"></span>'} ]
            });

        });

    </script>


    <!-- begin PAGE TITLE ROW -->
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <ol class="breadcrumb">
                    <li><i class="fa fa-database"></i> <a href="suvisjt.php">Sisdam Web</a>
                    </li>
                    <li class="active">Sinan At. em - <?php echo date("d/m/Y",strtotime($row_result_sinan['CREATE_TIME'])) ; ?> às
                        <?php echo date("H:i:s",strtotime($row_result_sinan['CREATE_TIME'])) ; ?></li>
                    <li class="active">IAL At. em - <?php echo date("d/m/Y",strtotime($row_result_ial['CREATE_TIME'])) ; ?> às
                        <?php echo date("H:i:s",strtotime($row_result_ial['CREATE_TIME'])) ; ?></li>
                    <li data-toggle="tooltip" data-placement="bottom" title="Nº de Casos Positivos"><a href="#"> Positivos </a>
                        <a href="suvisjt.php?pag=mapa-sarampo" role="button" class="btn btn-danger btn-circle"><?php echo $array_positivos['COUNT(NU_NOTIFIC)'] ?></a></li>
                    <li data-toggle="tooltip" data-placement="bottom" title="Nº de Casos Negativos"><a href="#"> Negativos </a>
                        <a href="suvisjt.php?pag=mapa-sarampo" role="button" class="btn btn-success btn-circle"><?php echo $array_negativos['COUNT(NU_NOTIFIC)'] ?></a></li>
                    <li data-toggle="tooltip" data-placement="bottom" title="Nº de Casos Em Análise"><a href="#"> Em Análise </a>
                        <a href="suvisjt.php?pag=mapa-sarampo" role="button" class="btn btn-warning btn-circle"><?php echo $array_em_analises['COUNT(NU_NOTIFIC)'] ?></a></li>
                    <li data-toggle="tooltip" data-placement="bottom" title="Nº de Casos Inconclusivos"><a href="#"> Inconclusivos </a>
                        <a href="suvisjt.php?pag=mapa-sarampo" role="button" class="btn btn-default btn-circle"><?php echo $array_inconclusivos['COUNT(NU_NOTIFIC)'] ?></a></li>
                </ol>
                <button type="button" class="btn btn-danger btn-labeled btn-lg btn-block"><span class="btn-label"><i
                                class="glyphicon glyphicon-list"></i></span> SINAN - IAL SARAMPO</button>

                <br>

                <div class="alert alert-danger text-center" style="<?php if($sql_button_at_end->num_rows < 1) {echo 'display: none;';} ?>" role="alert"><i class="glyphicon glyphicon-exclamation-sign"></i>
                    <strong>ATENÇÃO !!! </strong><a href="http://10.47.171.110/sisdamweb/suvisjt.php?pag=edit-end-epidemio&pagina=1&nDoc=&sinan=exantnet&tabela=tblsarampo&buttons=sarampo&agravo=SARAMPO&ial=sarampo_ial&list=sarampo" class="alert-link">Clique aqui</a>. <strong>EXISTEM NOVOS CASOS PARA ATUALIZAR !!!</strong>.
                </div>

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
    <!-- /.row -->

    <table id="list-sinan-ial-sarampo" class="table table-hover table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th class="text-center">SINAN</th>       <!-- 1 -->
            <th class="text-center"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>MAPS</th> <!-- 2 -->
            <th class="text-center">REQUISIÇÃO</th>  <!-- 2 -->
            <th class="text-center">EXAME</th>       <!-- 3 -->
            <th class="text-center">STATUS</th>      <!-- 4 -->
            <th class="text-center">RESULTADO</th>   <!-- 5 -->
            <th class="text-center">DT. NOT.</th>    <!-- 6 -->
            <th class="text-center">DT 1ºSINT/S</th> <!-- 7 -->
            <th class="text-center">SE 1ºS</th>      <!-- 8 -->
            <th class="text-center">NOME</th>        <!-- 9 -->
            <th class="text-center">DT NASC</th>     <!-- 10 -->
            <th class="text-center">ENDEREÇO</th>    <!-- 11 -->
            <th class="text-center">COMP</th>        <!-- 13 -->
            <th class="text-center">CONTATO</th>     <!-- 14 -->
            <th class="text-center">UBS</th>         <!-- 15 -->
            <th class="text-center"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>EDIT</th> <!-- 13 -->
            <th class="text-center">CS_VACINA</th>   <!-- 16 -->
            <th class="text-center">DT_VACINA</th>   <!-- 17 -->
            <th class="text-center">CS_VACINAL</th>  <!-- 18 -->
            <th class="text-center">MENOR_5ANO</th>  <!-- 19 -->
            <th class="text-center">DE5A14ANOS</th>  <!-- 20 -->
            <th class="text-center">DE15A39ANO</th>  <!-- 21 -->
            <th class="text-center">CLASS</th>       <!-- 22 -->
            <th class="text-center">DESC</th>        <!-- 23 -->
            <th class="text-center">EVOL</th>        <!-- 24 -->
            <th class="text-center">ENC</th>         <!-- 25 -->
            <th class="text-center">DT_ÓBITO</th>    <!-- 26 -->
            <th class="text-center"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>DEL</th> <!-- 13 -->

        </tr>
        </thead>
        <tbody>
        <tr>


        </tr>
        </tbody>
    </table>
</div>