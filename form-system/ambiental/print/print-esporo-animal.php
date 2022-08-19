<script type="text/javascript">
    window.print();
</script>

<style>
    @media print{@page {margin: 1.5cm;size: portrait;}
</style>

<?php
error_reporting(0);
include_once '../../locked/seguranca.php';
include_once '../../../conecta.php';

error_reporting(-1);

// Recebe o id do cliente do cliente via GET
// Recebe os dados enviados pela submissão
$id = (isset($_GET['id'])) ? $_GET['id'] : '';
$id_sd_med = $_GET['id_sd'] ?? '';
$id_data = $_GET['data_medc'] ?? '';
$id_med = $_GET['id_med'] ?? '';
$id_dsg = $_GET['dsg'] ?? '';
$id_qtd = $_GET['qtd'] ?? '';
$id_nm_ent = $_GET['nm_ent_medc'] ?? '';
$id_nm_rec = $_GET['nm_rec_medc'] ?? '';
$id_lixeira = $_GET['lixeira'] ?? 'false';
$id_edit = $_GET['edit'] ?? 'false';

// Valida se existe um id e se ele é numérico

if (!empty($id) && is_numeric($id)):

    if(!empty(is_numeric($id))):
    // Captura os dados do cliente solicitado
        $sql = $conectar->query("SELECT esporo_an.id_esp, esporo_an.nve, esporo_an.ano, esporo_an.data_entrada, esporo_an.nome_animal,
        especie_animal.especie, esporo_an.id_rua, ruas.log, ruas.rua, ruas.ruagoogle, esporo_an.rua_esp_a, esporo_an.numero,
        esporo_an.bairro_esp_a, esporo_an.tutor, esporo_an.telefone1, 
        esporo_an.telefone2, esporo_an.dsg_medc, esporo_medc.nm_mdc_esp_an, 
        esporo_an_sd_medc.data_medc, esporo_an_sd_medc.qtd_medc, esporo_an_sd_medc.nm_rec_medc, situacao_esporo.sit_esp, esporo_an.obs
        FROM esporo_an
        LEFT JOIN especie_animal ON esporo_an.especie = especie_animal.id_especie
        LEFT JOIN situacao_esporo ON esporo_an.situacao = situacao_esporo.id_st_esp
        LEFT JOIN ruas ON esporo_an.id_rua = ruas.id
        LEFT JOIN  esporo_an_sd_medc ON esporo_an.id_esp = esporo_an_sd_medc.id_an_esp 
        LEFT JOIN esporo_medc ON esporo_an_sd_medc.id_medc = esporo_medc.id_med_esp
        WHERE id_esp = $id
        GROUP BY esporo_an.id_esp");
    else:
        $_SESSION['msgerro'] = '<div class="alert alert-danger text-center text-uppercase" role="alert">
                <strong>ERRO AO EDITAR: DOCUMENTO COM O Nº : '.$id.' - '.$id.' - NÃO ENCONTRADO !!!</strong></div>';
        header("Location: suvisjt.php?pag=list-esporo-animal");
    endif;


else:
    header("Location: suvisjt.php?pag=list-esporo-animal");
    $_SESSION['msgedit'] = '<div class="alert alert-danger text-center text-uppercase" role="alert">
                                <strong>ERRO AO EDITAR: DOCUMENTO COM O Nº : ' . $id . ' - ' . $id . ' - NÃO ENCONTRADO !!!</strong></div></div>';

endif;

?>

<html>

<head>

    <!--<head>-->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">
    <meta http-equiv=Content-Type content="text/html; charset=windows-1252">
    <meta name=Generator content="Microsoft Word 15 (filtered)">

    <title></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style type="text/css" media="print">
        /* Style Definitions */
        @page {size: auto;
            /* auto is the initial value */
            margin:0cm 1.0cm 0cm 1.0cm;}
        .assinatura {position: absolute;bottom:200px;right:15px;width:100%;}
        .footer {position:absolute;bottom:30px;width:100%;}
        p.MsoNormal, li.MsoNormal, div.MsoNormal {margin:0cm;font-size:12.0pt;font-family:"Arial",serif;text-align: justify}
        p.MsoCaption, li.MsoCaption, div.MsoCaption {margin:0cm; text-align:center; font-size:12.0pt;font-family:"Arial",serif;font-weight:bold;}
        p.MsoBodyText, li.MsoBodyText, div.MsoBodyText {margin:0cm;text-align:justify;font-size:12.0pt;font-family:"Arial",sans-serif;}
        /* Page Definitions */
        @page WordSection1
        {size:612.1pt 792.1pt; margin:1.0cm 2.0cm 2.0cm 3.0cm;}
        div.WordSection1 {page:WordSection1;}
        /* List Definitions */
        ol{margin-bottom:0cm;}
        ul {margin-bottom:0cm;}
        -->
    </style>

</head>

<body>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-sm-6">

            <div class=WordSection1 style="margin:1.0cm 0.5cm 2.0cm 2.0cm;">

                <img src="../../../imagens/logo_pmsp_memo_oficio.jpg"><br><br> <!-- Logo da prefeitura -->

                <p class=MsoCaption><span style='font-size:10.0pt'>&nbsp;</span></p>

                <?php // Se o documento consultado existir ou seja for maior que 1 então:?>

                <div class="row">

                    <p class="text-end MsoNormal"> São Paulo, <?=$id?></p>

                    <br><br><br>

                    <p class="text-start fw-bold MsoNormal">- UVIS Jaçanã-Tremembé</p>

                    <br><br>

                    <p class="text-start MsoNormal pb-2"><strong>Assunto : </p>

                    <br><br>

                    <p class="text-start MsoNormal">À </p>

                    <br><br><br><br><br>
                    <div class="row justify-content-between">
                        <p class="justify-content-center MsoNormal" style="text-align: justify-all">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;AAA</p>
                    </div>
                    <div class="row justify-content-between">
                        <p class="justify-content-center MsoNormal" style="text-align: justify-all">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;aaaa</p>
                    </div>
                    <br><br><br><br><br>


                    <div class="assinatura text-center">
                        <p class="text-center MsoNormal">Atenciosamente</p>
                        <br><br><br>
                        <p class="text-capitalize" style="line-height: 3px">RF: </p>
                        <p class="text-center" style="line-height: 3px">AAA</p>
                        <p class="text-center" style="line-height: 3px">UVIS Jaçanã- Vigilância Ambiental</p>
                    </div>

                    <div class="footer">
                        <p class="text-start MsoNormal">Rua Maria Amália Lopes de Azevedo, 3676 - Vila Albertina - Telefones: 2249-3817 - 2240-6868</p>
                    </div>

                </div>
            </div>

        </div>

    </div>
</body>

</html>