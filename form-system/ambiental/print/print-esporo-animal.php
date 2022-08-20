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
        especie_animal.especie, esporo_an.id_rua, ruas.log, ruas.rua, ruas.ruagoogle, esporo_an.rua_esp_a, esporo_an.numero, esporo_an.complemento,
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
        $ed_print = mysqli_fetch_assoc($sql);

        $cs_medc = $conectar->query("SELECT esporo_an_sd_medc.id_sd, esporo_an_sd_medc.id_medc, esporo_an_sd_medc.data_medc, esporo_an_sd_medc.dsg_medc, esporo_an_sd_medc.qtd_medc, esporo_an_sd_medc.nm_ent_medc, esporo_an_sd_medc.nm_rec_medc, 
                                    esporo_an_sd_medc.id_an_esp, esporo_medc.nm_mdc_esp_an 
                                FROM esporo_an_sd_medc
                                LEFT JOIN esporo_medc ON esporo_an_sd_medc.id_medc = esporo_medc.id_med_esp
                                WHERE id_an_esp=$id AND esporo_an_sd_medc.lixeira = 0
                                ORDER BY data_medc ASC");
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

                <img src="../../../imagens/logo_pmsp.jpg"><br><br> <!-- Logo da prefeitura -->

                <p class=MsoNormal align=center style='margin-top:24.0pt;margin-right:0cm;
margin-bottom:18.0pt;margin-left:0cm;text-align:center;line-height:150%'><b><span style='font-size:12.0pt;line-height:150%;font-family:"Arial",sans-serif'>Termo de Compromisso para Tratamento de Animal com Esporotricose</span></b></p>

                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0cm;margin-bottom:6.0pt;
margin-left:0cm;line-height:150%'><span style='font-family:"Arial",sans-serif'>Eu,__________________________________________________________________________,</span></p>

                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0cm;margin-bottom:6.0pt;
margin-left:0cm;line-height:150%'><span style='font-family:"Arial",sans-serif'>Portador do R.G nº________________________, CPF nº ___________________________,</span></p>

                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0cm;margin-bottom:6.0pt;
margin-left:0cm;line-height:150%'><span style='font-family:"Arial",sans-serif'>Residente à
                        <?php if(!empty($ed_print['rua_esp_a'])) : echo '<u> '.$ed_print['rua_esp_a'].' - '.$ed_print['complemento'].'</u>';
                        else: echo '_______________________________________________________________'; endif;?>,</span></p>

                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0cm;margin-bottom:6.0pt;
margin-left:0cm;line-height:150%'><span style='font-family:"Arial",sans-serif'>Bairro ______________________________________, CEP _________________________,</span></p>

                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0cm;margin-bottom:6.0pt;
margin-left:0cm;line-height:150%'><span style='font-family:"Arial",sans-serif'>Telefone Residencial <?php if(!empty($ed_print['telefone1'])) : echo '<u>    '.$ed_print['telefone1'].'    </u>';
                    else: echo '__________________________________'; endif;?>, Celular : <?php if(!empty($ed_print['telefone2'])) : echo '<u>    '.$ed_print['telefone2'].'    </u>';
                    else: echo '__________________________________'; endif;?>,</span></p>

                <p class=MsoNormal style='margin-top:24.0pt;margin-right:0cm;margin-bottom:
12.0pt;margin-left:0cm;line-height:150%'><b><span style='font-size:12.0pt;
line-height:150%;font-family:"Arial",sans-serif'>Responsável pelo animal abaixo descrito:</span></b></p>

                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0cm;margin-bottom:6.0pt;
margin-left:0cm;line-height:150%'><span style='font-family:"Arial",sans-serif'>Nome : <u>   <?=ucfirst($ed_print['nome_animal'])?>   </u>       Pelagem ____________________________</span></p>

                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0cm;margin-bottom:6.0pt;
margin-left:0cm;line-height:150%'><span style='font-family:"Arial",sans-serif'>Espécie  ___________________       Porte _______________________________</span></p>

                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0cm;margin-bottom:6.0pt;
margin-left:0cm;line-height:150%'><span style='font-family:"Arial",sans-serif'>Sexo ______________________       Nº do RGA __________________________</span></p>

                <p class=MsoNormal style='margin-top:6.0pt;margin-right:0cm;margin-bottom:6.0pt;
margin-left:0cm;line-height:150%'><span style='font-family:"Arial",sans-serif'>Idade______________________       Microchip  ___________________________</span></p>

                <p class=MsoNormal style='margin-top:24.0pt;margin-right:0cm;margin-bottom:
12.0pt;margin-left:0cm;line-height:150%'><b><span style='line-height:150%;
font-family:"Arial",sans-serif'>Fui devidamente informado, estou ciente e de acordo que:</span></b></p>

                <p class=MsoNormal style='margin:0cm;text-align:justify;text-indent:0cm;
line-height:normal'><span style='font-size:10.0pt;font-family:Symbol'>·<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span><span style='font-size:10.0pt;font-family:"Arial",sans-serif'>A
esporotricose é uma doença causada por um fungo e pode ser transmitida ao ser
humano por mordeduras, arranhaduras ou espirros de animais doentes ou pelo
contato de cortes ou feridas com material contaminado (normalmente terra,
plantas);</span></p>

                <p class=MsoNormal style='margin:0cm;text-align:justify;text-indent:0cm;
line-height:normal'><span style='font-size:10.0pt;font-family:Symbol'>·<span
                                style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><span style='font-size:10.0pt;font-family:"Arial",sans-serif'>O
animal descrito acima é de minha responsabilidade e comprometo-me a medicá-lo
de acordo com as instruções fornecidas pelos médicos veterinários da DVZ,
durante todo o tempo que durar o tratamento, até que receba alta pelo médico
veterinário, bem como adotar todas as medidas recomendadas de prevenção de
acidentes como mordedura ou arranhadura por esse animal e avisar no caso de
alguma pessoa ser mordida ou arranhada pelo animal, até sua alta;</span></p>

                <p class=MsoNormal style='margin:0cm;text-align:justify;text-indent:0cm;
line-height:normal'><span style='font-size:10.0pt;font-family:Symbol'>·<span
                                style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><span style='font-size:10.0pt;font-family:"Arial",sans-serif'>Declaro
ter sido esclarecido acerca dos possíveis riscos inerentes, durante ou após a
realização do tratamento, estando o referido profissional isento de quaisquer
responsabilidades decorrentes de tais riscos;</span></p>

                <p class=MsoNormal style='margin:0cm;text-align:justify;text-indent:0cm;
line-height:normal'><span style='font-size:10.0pt;font-family:Symbol'>·<span
                                style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><span style='font-size:10.0pt;font-family:"Arial",sans-serif'>Responsabilizo-me
em manter meu animal sempre domiciliado, evitando contato com outros, para
prevenir sua reinfecção ou a transmissão para outros animais ou pessoas;</span></p>

                <p class=MsoNormal style='margin:0cm;text-align:justify;text-indent:0cm;
line-height:normal'><span style='font-size:10.0pt;font-family:Symbol'>·<span
                                style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><span style='font-size:10.0pt;font-family:"Arial",sans-serif'>A
falta de continuidade do tratamento e a não domiciliação do animal pode causar
disseminação da doença para outros animais e pessoas;</span></p>

                <p class=MsoNormal style='margin:0cm;text-align:justify;text-indent:0cm;
line-height:normal'><span style='font-size:10.0pt;font-family:Symbol'>·<span
                                style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><span style='font-size:10.0pt;font-family:"Arial",sans-serif'>A
medicação fornecida é para uso exclusivo no animal em tratamento, devendo
devolver as cápsulas excedentes ao final do tratamento ou no caso de
óbito/eutanásia do animal;</span></p>

                <p class=MsoNormal style='margin:0cm;text-align:justify;text-indent:0cm;
line-height:normal'><span style='font-size:10.0pt;font-family:Symbol'>·<span
                                style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><span style='font-size:10.0pt;font-family:"Arial",sans-serif'>Concordo
que médicos veterinários da DVZ ou da UVIS realizem acompanhamento periódico
para verificar as condições de saúde referentes à esporotricose;</span></p>

                <p class=MsoNormal style='margin-top:0cm;margin-right:0cm;margin-bottom:6.0pt;
margin-left:0cm;text-align:justify;text-indent:0cm;line-height:normal'><span style='font-size:9.0pt;font-family:Symbol'>·<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><span style='font-size:10.0pt;font-family:"Arial",sans-serif'>Comprometo-me
a avisar imediatamente à DVZ de São Paulo qualquer ocorrência como arranhadura
ou mordedura provocada pelo animal, ou no caso dele vir a óbito, durante o
período de tratamento, pelos telefones, 2974-7818, 2974-7817 ou 2978-8000
(finais de semana e feriados).</span></p><br>

                <table class=MsoNormalTable border=1 cellspacing=0 cellpadding=0
                       style='border-collapse:collapse;border:none'>
                    <tr style='height:15.75pt'>
                        <td width=686 colspan=2 style='width:514.7pt;border:solid windowtext 1.5pt;
  border-bottom:none;padding:0cm 5.4pt 0cm 5.4pt;height:15.75pt'>
                            <p class=MsoNormal style='margin-bottom:6.0pt;line-height:normal'><span
                                        style='font-family:"Arial",sans-serif'>Data:____________</span></p>
                        </td>
                    </tr>
                    <tr style='height:27.65pt'>
                        <td width=686 colspan=2 style='width:514.7pt;border-top:none;border-left:
  solid windowtext 1.5pt;border-bottom:none;border-right:solid windowtext 1.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:27.65pt'>
                            <p class=MsoNormal style='margin-bottom:6.0pt;line-height:normal'><span style='font-family:"Arial",sans-serif'>Assinatura do responsável pelo animal:________________________________________</span></p>
                        </td>
                    </tr>
                    <tr style='height:20.85pt'>
                        <td width=499 style='width:373.95pt;border-top:none;border-left:solid windowtext 1.5pt;
  border-bottom:solid windowtext 1.5pt;border-right:none;padding:0cm 5.4pt 0cm 5.4pt;
  height:20.85pt'>
                            <p class=MsoNormal style='margin-bottom:6.0pt;line-height:normal'><span style='font-family:"Arial",sans-serif'>Nome do veterinário:_______________________________</span></p>
                        </td>
                        <td width=188 valign=top style='width:140.75pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.5pt;border-right:solid windowtext 1.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:20.85pt'>
                            <p class=MsoNormal style='margin-bottom:6.0pt;text-align:justify;line-height:
  normal'><span style='font-family:"Arial",sans-serif'>CRMV:________________</span></p>
                        </td>
                    </tr>
                </table>

                <span style='font-size:11.0pt;line-height:115%;font-family:"Arial",sans-serif'><br clear=all style='page-break-before:always'></span>

                <p class=MsoNormal align=center style='text-align:center'><span style='line-height:115%;font-family:"Arial",sans-serif'>&nbsp;</span></p>

                <p class=MsoNormal align=center style='text-align:center'><span style='font-size:16.0pt;line-height:115%;font-family:"Arial",sans-serif'>&nbsp;</span></p>

                <p class=MsoNormal align=center style='text-align:center'><span style='font-size:16.0pt;line-height:115%;font-family:"Arial",sans-serif'>&nbsp;</span></p><br><br>

                <p class=MsoNormal align=center style='text-align:center'><span style='font-size:16.0pt;line-height:115%;font-family:"Arial",sans-serif'>CONTROLE DE ENTREGA DE MEDICAÇÃO</span></p>

                <p class=MsoNormal><span style='font-size:12.0pt;line-height:115%;font-family:
"Arial",sans-serif'>&nbsp;</span></p>

                <p class=MsoNormal><span style='font-size:12.0pt;line-height:115%;font-family:
"Arial",sans-serif'>&nbsp;</span></p>

                <table class=MsoNormalTable border=1 cellspacing=0 cellpadding=0
                       style='border-collapse:collapse;border:none'>
                    <tr style='height:30.85pt'>
                        <td width=94 style='width:70.7pt;border:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:30.85pt'>
                            <p class=MsoNormal align=center style='text-align:center'><span
                                        style='font-size:12.0pt;line-height:115%;font-family:"Arial",sans-serif'>DATA</span></p>
                        </td>
                        <td width=140 style='width:104.8pt;border:solid windowtext 1.0pt;border-left:
  none;padding:0cm 5.4pt 0cm 5.4pt;height:30.85pt'>
                            <p class=MsoNormal align=center style='text-align:center'><span
                                        style='font-size:12.0pt;line-height:115%;font-family:"Arial",sans-serif'>MEDICAMENTO</span></p>
                        </td>
                        <td width=136 style='width:101.8pt;border:solid windowtext 1.0pt;border-left:
  none;padding:0cm 5.4pt 0cm 5.4pt;height:30.85pt'>
                            <p class=MsoNormal align=center style='text-align:center'><span
                                        style='font-size:12.0pt;line-height:115%;font-family:"Arial",sans-serif'>QUANTIDADE DE CÁPSULAS</span></p>
                        </td>
                        <td width=152 style='width:114.25pt;border:solid windowtext 1.0pt;border-left:
  none;padding:0cm 5.4pt 0cm 5.4pt;height:30.85pt'>
                            <p class=MsoNormal align=center style='text-align:center'><span
                                        style='font-size:12.0pt;line-height:115%;font-family:"Arial",sans-serif'>NOME ENTREGADOR</span></p>
                        </td>
                        <td width=169 style='width:126.95pt;border:solid windowtext 1.0pt;border-left:
  none;padding:0cm 5.4pt 0cm 5.4pt;height:30.85pt'>
                            <p class=MsoNormal align=center style='text-align:center'><span
                                        style='font-size:12.0pt;line-height:115%;font-family:"Arial",sans-serif'>ASSINATURA RECEBEDOR</span></p>
                        </td>
                    </tr>

                    <?php while ($row_medc = mysqli_fetch_assoc($cs_medc)){ ?>

                    <tr style='height:32.65pt'>
                        <td width=94 valign=top style='width:70.7pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:32.65pt'>
                            <p class=MsoNormal style="padding-top: 1rem;text-align: center;"><span style='font-size:12.0pt;line-height:115%;font-family:
  "Arial",sans-serif'>&nbsp;</span><?php echo date('d/m/Y', strtotime($row_medc['data_medc'])); ?></p>
                        </td>
                        <td width=140 valign=top style='width:104.8pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:32.65pt'>
                            <p class=MsoNormal style="padding-top: 1rem;text-align: center;"><span style='font-size:12.0pt;line-height:115%;font-family:
  "Arial",sans-serif'>&nbsp;</span><?php echo $row_medc['nm_mdc_esp_an'].' '.$row_medc['dsg_medc']; ?> MG/DIA</p>
                        </td>
                        <td width=136 valign=top style='width:101.8pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:32.65pt'>
                            <p class=MsoNormal style="padding-top: 1rem;text-align: center;"><span style='font-size:12.0pt;line-height:115%;font-family:
  "Arial",sans-serif'>&nbsp;</span><?php echo $row_medc['qtd_medc']; ?> CP</p>
                        </td>
                        <td width=152 valign=top style='width:114.25pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:32.65pt'>
                            <p class=MsoNormal style="padding-top: 1rem;text-align: center;"><span style='font-size:12.0pt;line-height:115%;font-family:
  "Arial",sans-serif'>&nbsp;</span><?php echo $row_medc['nm_ent_medc']; ?></p>
                        </td>
                        <td width=169 valign=top style='width:126.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:32.65pt'>
                            <p class=MsoNormal><span style='font-size:12.0pt;line-height:115%;font-family:
  "Arial",sans-serif'>&nbsp;</span></p>
                        </td>
                    </tr>

                    <?php } ?>
                    <tr style='height:32.6pt'>
                        <td width=94 valign=top style='width:70.7pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:42.6pt'>
                            <p class=MsoNormal><span style='font-size:12.0pt;line-height:115%;font-family:
  "Arial",sans-serif'>&nbsp;</span></p>
                        </td>
                        <td width=140 valign=top style='width:70.7pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:42.6pt'>
                            <p class=MsoNormal><span style='font-size:12.0pt;line-height:115%;font-family:
  "Arial",sans-serif'>&nbsp;</span></p>
                        </td>
                        <td width=136 valign=top style='width:70.7pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:42.6pt'>
                            <p class=MsoNormal><span style='font-size:12.0pt;line-height:115%;font-family:
  "Arial",sans-serif'>&nbsp;</span></p>
                        </td>
                        <td width=152 valign=top style='width:70.7pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:42.6pt'>
                            <p class=MsoNormal><span style='font-size:12.0pt;line-height:115%;font-family:
  "Arial",sans-serif'>&nbsp;</span></p>
                        </td>
                        <td width=169 valign=top style='width:70.7pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:42.6pt'>
                            <p class=MsoNormal><span style='font-size:12.0pt;line-height:115%;font-family:
  "Arial",sans-serif'>&nbsp;</span></p>
                        </td>
                    </tr>

                    <tr style='height:32.6pt'>
                        <td width=94 valign=top style='width:70.7pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:42.6pt'>
                            <p class=MsoNormal><span style='font-size:12.0pt;line-height:115%;font-family:
  "Arial",sans-serif'>&nbsp;</span></p>
                        </td>
                        <td width=140 valign=top style='width:70.7pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:42.6pt'>
                            <p class=MsoNormal><span style='font-size:12.0pt;line-height:115%;font-family:
  "Arial",sans-serif'>&nbsp;</span></p>
                        </td>
                        <td width=136 valign=top style='width:70.7pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:42.6pt'>
                            <p class=MsoNormal><span style='font-size:12.0pt;line-height:115%;font-family:
  "Arial",sans-serif'>&nbsp;</span></p>
                        </td>
                        <td width=152 valign=top style='width:70.7pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:42.6pt'>
                            <p class=MsoNormal><span style='font-size:12.0pt;line-height:115%;font-family:
  "Arial",sans-serif'>&nbsp;</span></p>
                        </td>
                        <td width=169 valign=top style='width:70.7pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:42.6pt'>
                            <p class=MsoNormal><span style='font-size:12.0pt;line-height:115%;font-family:
  "Arial",sans-serif'>&nbsp;</span></p>
                        </td>
                    </tr>

                    <tr style='height:32.6pt'>
                        <td width=94 valign=top style='width:70.7pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:42.6pt'>
                            <p class=MsoNormal><span style='font-size:12.0pt;line-height:115%;font-family:
  "Arial",sans-serif'>&nbsp;</span></p>
                        </td>
                        <td width=140 valign=top style='width:70.7pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:42.6pt'>
                            <p class=MsoNormal><span style='font-size:12.0pt;line-height:115%;font-family:
  "Arial",sans-serif'>&nbsp;</span></p>
                        </td>
                        <td width=136 valign=top style='width:70.7pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:42.6pt'>
                            <p class=MsoNormal><span style='font-size:12.0pt;line-height:115%;font-family:
  "Arial",sans-serif'>&nbsp;</span></p>
                        </td>
                        <td width=152 valign=top style='width:70.7pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:42.6pt'>
                            <p class=MsoNormal><span style='font-size:12.0pt;line-height:115%;font-family:
  "Arial",sans-serif'>&nbsp;</span></p>
                        </td>
                        <td width=169 valign=top style='width:70.7pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:42.6pt'>
                            <p class=MsoNormal><span style='font-size:12.0pt;line-height:115%;font-family:
  "Arial",sans-serif'>&nbsp;</span></p>
                        </td>
                    </tr>

                    <tr style='height:32.6pt'>
                        <td width=94 valign=top style='width:70.7pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:42.6pt'>
                            <p class=MsoNormal><span style='font-size:12.0pt;line-height:115%;font-family:
  "Arial",sans-serif'>&nbsp;</span></p>
                        </td>
                        <td width=140 valign=top style='width:70.7pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:42.6pt'>
                            <p class=MsoNormal><span style='font-size:12.0pt;line-height:115%;font-family:
  "Arial",sans-serif'>&nbsp;</span></p>
                        </td>
                        <td width=136 valign=top style='width:70.7pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:42.6pt'>
                            <p class=MsoNormal><span style='font-size:12.0pt;line-height:115%;font-family:
  "Arial",sans-serif'>&nbsp;</span></p>
                        </td>
                        <td width=152 valign=top style='width:70.7pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:42.6pt'>
                            <p class=MsoNormal><span style='font-size:12.0pt;line-height:115%;font-family:
  "Arial",sans-serif'>&nbsp;</span></p>
                        </td>
                        <td width=169 valign=top style='width:70.7pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:42.6pt'>
                            <p class=MsoNormal><span style='font-size:12.0pt;line-height:115%;font-family:
  "Arial",sans-serif'>&nbsp;</span></p>
                        </td>
                    </tr>

                    <tr style='height:32.6pt'>
                        <td width=94 valign=top style='width:70.7pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:42.6pt'>
                            <p class=MsoNormal><span style='font-size:12.0pt;line-height:115%;font-family:
  "Arial",sans-serif'>&nbsp;</span></p>
                        </td>
                        <td width=140 valign=top style='width:70.7pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:42.6pt'>
                            <p class=MsoNormal><span style='font-size:12.0pt;line-height:115%;font-family:
  "Arial",sans-serif'>&nbsp;</span></p>
                        </td>
                        <td width=136 valign=top style='width:70.7pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:42.6pt'>
                            <p class=MsoNormal><span style='font-size:12.0pt;line-height:115%;font-family:
  "Arial",sans-serif'>&nbsp;</span></p>
                        </td>
                        <td width=152 valign=top style='width:70.7pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:42.6pt'>
                            <p class=MsoNormal><span style='font-size:12.0pt;line-height:115%;font-family:
  "Arial",sans-serif'>&nbsp;</span></p>
                        </td>
                        <td width=169 valign=top style='width:70.7pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:42.6pt'>
                            <p class=MsoNormal><span style='font-size:12.0pt;line-height:115%;font-family:
  "Arial",sans-serif'>&nbsp;</span></p>
                        </td>
                    </tr>

                    <tr style='height:32.6pt'>
                        <td width=94 valign=top style='width:70.7pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:42.6pt'>
                            <p class=MsoNormal><span style='font-size:12.0pt;line-height:115%;font-family:
  "Arial",sans-serif'>&nbsp;</span></p>
                        </td>
                        <td width=140 valign=top style='width:70.7pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:42.6pt'>
                            <p class=MsoNormal><span style='font-size:12.0pt;line-height:115%;font-family:
  "Arial",sans-serif'>&nbsp;</span></p>
                        </td>
                        <td width=136 valign=top style='width:70.7pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:42.6pt'>
                            <p class=MsoNormal><span style='font-size:12.0pt;line-height:115%;font-family:
  "Arial",sans-serif'>&nbsp;</span></p>
                        </td>
                        <td width=152 valign=top style='width:70.7pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:42.6pt'>
                            <p class=MsoNormal><span style='font-size:12.0pt;line-height:115%;font-family:
  "Arial",sans-serif'>&nbsp;</span></p>
                        </td>
                        <td width=169 valign=top style='width:70.7pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:42.6pt'>
                            <p class=MsoNormal><span style='font-size:12.0pt;line-height:115%;font-family:
  "Arial",sans-serif'>&nbsp;</span></p>
                        </td>
                    </tr>

                    <tr style='height:32.6pt'>
                        <td width=94 valign=top style='width:70.7pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:42.6pt'>
                            <p class=MsoNormal><span style='font-size:12.0pt;line-height:115%;font-family:
  "Arial",sans-serif'>&nbsp;</span></p>
                        </td>
                        <td width=140 valign=top style='width:70.7pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:42.6pt'>
                            <p class=MsoNormal><span style='font-size:12.0pt;line-height:115%;font-family:
  "Arial",sans-serif'>&nbsp;</span></p>
                        </td>
                        <td width=136 valign=top style='width:70.7pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:42.6pt'>
                            <p class=MsoNormal><span style='font-size:12.0pt;line-height:115%;font-family:
  "Arial",sans-serif'>&nbsp;</span></p>
                        </td>
                        <td width=152 valign=top style='width:70.7pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:42.6pt'>
                            <p class=MsoNormal><span style='font-size:12.0pt;line-height:115%;font-family:
  "Arial",sans-serif'>&nbsp;</span></p>
                        </td>
                        <td width=169 valign=top style='width:70.7pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:42.6pt'>
                            <p class=MsoNormal><span style='font-size:12.0pt;line-height:115%;font-family:
  "Arial",sans-serif'>&nbsp;</span></p>
                        </td>
                    </tr>
                </table>


            </div>

        </div>

    </div>
</div>

</body>

</html>