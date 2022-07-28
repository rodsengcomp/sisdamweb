<?php
session_start();
include_once 'conecta.php';
$usuarionome = $_SESSION['usuarioNome'];
$usuariologin = $_SESSION['usuarioLogin'];
?>


<!DOCTYPE html>
<html lang="pt-br" xmlns="http://www.w3.org/1999/html">
<head>
    <!-- Antes que tudo se inicie expresso minha total gratidão ao Senhor Deus por me conceder a cada dia a oportunidade de expressar o imenso

    amor que eu sinto por ele e por sua criação.

    Aqui também retrato o amor que recebi na Suvis Jaçanã de pessoas especiais, algumas já se aposentaram do emprego público, mas deixaram um legado

    de comprometimento e amor pela profissão e principalmente pelo "ser humano" -->

    <!------------------------------------ head form instavel ----------------------------------------------------------------------------------->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
          content="Sistema de Gerenciamento da Suvis Jaçanã/Tremembé desenvolvido por Rodolfo R R de Jesus."/>
    <meta name="author" content="Rodolfo Romaioli Ribeiro de Jesus"/>
    <link rel="icon" href="imagens/sv2ico.ico">
    <title>SisdamJT Web</title>
    <!--<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="http://www.datatables.net/rss.xml">-->

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="css/normalize.css" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <script type="text/javascript" language="javascript" src="js/bootstrap.min.js"></script>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!--Chamada Autocomplete-->
    <script type="text/javascript" src="js/jquery/jquery.js"></script>

    <!--Chamada filtro tabela--->
    <script src="js/jquery/1.12.4.jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery/mask.js"></script>


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>

    <script type="text/javascript"
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAhlslumr1saHPVEJHkzPssYLEsWZJQQKU&libraries=places"></script>
    <!-- Validações de Formularios -->
    <script type="text/javascript" src="js/jquery/validation/val-admin.js"></script>
    <script type="text/javascript" src="js/jquery/validation/val_contato.js"></script>
    <script type="text/javascript" src="js/jquery/validation/val-sv2.js"></script>
    <script type="text/javascript" src="js/jquery/validation/val-sv2-siva.js"></script>
    <script type="text/javascript" src="js/jquery/validation/val-sv2-surto.js"></script>
    <script type="text/javascript" src="js/jquery/validation/val-memo.js"></script>
    <script type="text/javascript" src="js/jquery/validation/val-tid.js"></script>
    <script type="text/javascript" src="js/jquery/validation/val-pesquisar.js"></script>
    <script type="text/javascript" src="js/jquery/validation/val-ambiental.js"></script>
    <script type="text/javascript" src="js/jquery/validation/val-sanitaria.js"></script>

    <!--Alguns javascript-->
    <script type="text/javascript" src="js/typeahead.js"></script>
    <script src="js/docs.min.js"></script>
    <!--Javascript Datatable & validation-->
    <script type="text/javascript" src="js/jquery/validation/1.15.0.jquery.validate.min.js"></script>
    <script type="text/javascript" language="javascript"
            src="js/jquery/dataTables/1.10.12/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript"
            src="js/jquery/dataTables/dataTables.responsive.min.js"></script>
    <script type="text/javascript" language="javascript"
            src="js/jquery/dataTables/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" language="javascript"
            src="js/jquery/dataTables/responsive.bootstrap.min.js"></script>
    <script type="text/javascript" language="javascript"
            src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
        <script type="text/javascript" language="javascript"
    src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.bootstrap.min.js"></script>
    <script type="text/javascript" language="javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" language="javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script type="text/javascript" language="javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script type="text/javascript" language="javascript"
            src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript" language="javascript"
            src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
    <script type="text/javascript" language="javascript"
            src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.colVis.min.js"></script>
    <script type="text/javascript" language="javascript"
            src="js/jquery/dataTables/moment.min.js"></script>
    <script type="text/javascript" language="javascript"
            src="https://cdn.datatables.net/rowgroup/1.2.0/js/dataTables.rowGroup.min.js"></script>



    <!--Chamada autocomplete-->
    <script type="text/javascript" src="js/jquery/jquery-ui.js"></script>
    <script type="text/javascript" src="js/jquery/jquery-ui.custom.min.js"></script>
    <script type="text/javascript" src="js/jquery/jquery.countdown.min.js"></script>
    <script type="text/javascript" src="js/autocomplete/auto-comp-endereco.js"></script>
    <script type="text/javascript" src="js/autocomplete/auto-comp-se.js"></script>
    <script type="text/javascript" src="js/autocomplete/auto-comp-campos.js"></script>
    <script type="text/javascript" class="init" src="js/jquery/dataTables/lists/admin.js"></script>
    <script type="text/javascript" class="init" src="js/jquery/dataTables/lists/system.js"></script>
    <script type="text/javascript" class="init" src="js/jquery/dataTables/lists/system-arq.js"></script>
    <script type="text/javascript" class="init" src="js/jquery/dataTables/lists/system-ambiental.js"></script>
    <script type="text/javascript" class="init" src="js/jquery/dataTables/date-de.js"></script>
    <script type="text/javascript" class="init" src="js/maps/maps-end.js"></script>
    <script type="text/javascript" class="init" src="js/maps/maps-cad.js"></script>
    <script type="text/javascript" class="init" src="js/maps/maps-dengue.js"></script>
    <script type="text/javascript" src="js/calendario.js"></script>


    <!-- CSS para Fontes Customizadas Fontawesome https://fontawesome.com/ -->
    <link href="css/fontawesome/css/all.css" rel="stylesheet"> <!--load all styles -->
    <link href="css/fontawesome/css/brands.css" rel="stylesheet"> <!--load all styles -->
    <link href="css/fontawesome/css/fontawesome.css" rel="stylesheet"> <!--load all styles -->
    <link href="css/fontawesome/css/light.css" rel="stylesheet"> <!--load all styles -->
    <link href="css/fontawesome/css/regular.css" rel="stylesheet"> <!--load all styles -->
    <link href="css/fontawesome/css/solid.css" rel="stylesheet"> <!--load all styles -->
    <link href="css/fontawesome/css/svg-with-js.css" rel="stylesheet"> <!--load all styles -->
    <link href="css/fontawesome/css/v4-shims.css" rel="stylesheet"> <!--load all styles -->
</head>

<!-- SQL Resultado CCZ
SELECT DENGNET.NU_NOTIFIC, Resultado_CCZ.SINAN, Resultado_CCZ.Resultado_IGM, Resultado_CCZ.Resultado_NS1, Resultado_CCZ.ENTRADA, Resultado_CCZ.Coleta, Resultado_CCZ.LIBERACAO_EM, Resultado_CCZ.Sintoma, DENGNET.NM_PACIENT, DENGNET.NM_LOGRADO, DENGNET.ID_DISTRIT, Resultado_CCZ.D_A, Resultado_CCZ.SUVIS
FROM DENGNET INNER JOIN Resultado_CCZ ON DENGNET.NU_NOTIFIC = Resultado_CCZ.SINAN
WHERE (((DENGNET.ID_DISTRIT) Like "70"));

-->

