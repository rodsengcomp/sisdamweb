
<script>
    $(function () {
        setTimeout(function () { window.print(); }, 200);
        window.onfocus = function () { setTimeout(function () { window.close(); }, 200); }
    });
</script>

<style>
    @media print{@page {margin: 1.5cm;size: portrait;}
</style>

<?php

$nDoc = $_GET['nDoc'];
$impressao = $_GET['impressao'];
$agravo_sinan_sql = $_GET['sinan'];
$agravo_tabela_sql = $_GET['tabela'];
$agravo_buttons = $_GET['buttons'];
$agravo_hidden = $_GET['agravo'];
$agravo_ial = $_GET['ial'];
$impresso = $_GET['impresso'];

if ($agravo_buttons == 'dengue') {$consulta_sinan = "SELECT tbldengue.id, tbldengue.UnidadeNotificadora, tbldengue.DataEntrada, tbldengue.nDoc, tblDengue.Endereco1, tblDengue.N, 
tbldengue.Complemento,tbldengue.Logradouro, tbldengue.Cep1, tbldengue.PgGuia1, tbldengue.Bairro1, tbldengue.Da, tbldengue.Setor1, tbldengue.UBS1, tbldengue.ResultadoTr, 
tbldengue.Descarte, tbldengue.DataBloqueio, tbldengue.DataNeb, tbldengue.usuarioAlteracao, tbldengue.DataAlteracao, tbldengue.DataLer,tbldengue.NomeSolicitante,
tblDengue.usuarioLer, tblDengue.Impressao, tbldengue.ruagoogle, tbldengue.latitude, tbldengue.longitude, tbldengue.agravo, 
DENGNET.NU_NOTIFIC, DENGNET.DT_NOTIFIC, DENGNET.SEM_NOT, DENGNET.NM_PACIENT, DENGNET.CS_SEXO,DENGNET.DT_NASC, DENGNET.DT_SIN_PRI, DENGNET.SEM_PRI,DENGNET.DS_OBS,
DENGNET.NU_NUMERO, DENGNET.NU_DDD_TEL,DENGNET.NU_TELEFON,
resultado_ccz.Resultado_IgM_Focus, Resultado_IgM_Panbio, resultado_ccz.Resultado_NS1,resultado_ccz.LIBERACAO_EM, resultado_ccz.Coleta
FROM tblDengue INNER JOIN DENGNET ON tblDengue.nDoc = DENGNET.NU_NOTIFIC 
LEFT JOIN resultado_ccz ON tblDengue.nDoc = resultado_ccz.SINAN 
WHERE tblDengue.nDoc='$nDoc'";}
else {
    $consulta_sinan = "SELECT tbllepto.UnidadeNotificadora, tbllepto.DataEntrada, tbllepto.nDoc, tbllepto.Endereco1, tbllepto.N,
tbllepto.Complemento, tbllepto.Logradouro, tbllepto.Cep1, tbllepto.PgGuia1, tbllepto.Bairro1, tbllepto.Da,
tbllepto.Setor1, tbllepto.UBS1, tbllepto.Descarte, tbllepto.DataBloqueio, tbllepto.usuarioAlteracao,tbllepto.NomeSolicitante,
tbllepto.DataAlteracao, tbllepto.DataLer, tbllepto.usuarioLer, tbllepto.Impressao, tbllepto.ruagoogle, tbllepto.latitude,
tbllepto.longitude, tbllepto.agravo,
leptonet.NU_NOTIFIC, leptonet.DT_NOTIFIC, leptonet.SEM_NOT, leptonet.NM_PACIENT, leptonet.CS_SEXO,leptonet.DT_NASC,
leptonet.DT_SIN_PRI, leptonet.SEM_PRI,leptonet.DS_OBS, leptonet.NU_NUMERO, leptonet.NU_DDD_TEL,leptonet.NU_TELEFON,
resultado_ccz_lepto.RES_ELISA, resultado_ccz_lepto.RES_MAT,resultado_ccz_lepto.LIBERACAO_EM, resultado_ccz_lepto.Coleta,resultado_ccz_lepto.CO,resultado_ccz_lepto.DO,
resultado_ccz_lepto.Coleta, resultado_ccz_lepto.Nr_da_Amostra, resultado_ccz_lepto.NOVA_COLETA, resultado_ccz_lepto.1o_SOROVAR, resultado_ccz_lepto.1o_TIT
FROM tbllepto INNER JOIN leptonet ON tbllepto.nDoc = leptonet.NU_NOTIFIC
LEFT JOIN resultado_ccz_lepto ON tbllepto.nDoc = resultado_ccz_lepto.SINAN
WHERE tbllepto.nDoc='$nDoc'";
}


$resultado_sinan = $conectar->query($consulta_sinan);
$editar_sinan_suvis = mysqli_fetch_assoc($resultado_sinan);
$resultado_igm = $editar_sinan_suvis['Resultado_IgM_Focus'];
$resultado_igm_panbio = $editar_sinan_suvis['Resultado_IgM_Panbio'];
$resultado_ns1 = $editar_sinan_suvis['Resultado_NS1'];
$resultado_elisa = $editar_sinan_suvis['RES_ELISA'];
$resultado_mat = $editar_sinan_suvis['RES_MAT'];
$data_col_exame_ccz = $editar_sinan_suvis['Coleta'];
$data_lib_exame_ccz = $editar_sinan_suvis['LIBERACAO_EM'];
$resultado_tr = $editar_sinan_suvis['ResultadoTr'];
$dt_notific = $editar_sinan_suvis['DT_NOTIFIC'];
$impresso = $editar_sinan_suvis['Impressao'];
/*--------------------------------------------------------------------------------*/

/**
 * https://stackoverflow.com/questions/7316963/drawing-a-circle-google-static-maps
 * http://www.svennerberg.com/examples/polylines/PolylineEncoder.php.txt
 **/

function GMapCircle($Lat,$Lng,$Rad,$Detail=8){
    $R    = 6371;

    $pi   = pi();

    $Lat  = ($Lat * $pi) / 180;
    $Lng  = ($Lng * $pi) / 180;
    $d    = $Rad / $R;

    $points = array();
    $i = 0;

    for($i = 0; $i <= 360; $i+=$Detail):
        $brng = $i * $pi / 180;

        $pLat = asin(sin($Lat)*cos($d) + cos($Lat)*sin($d)*cos($brng));
        $pLng = (($Lng + atan2(sin($brng)*sin($d)*cos($Lat), cos($d)-sin($Lat)*sin($pLat))) * 180) / $pi;
        $pLat = ($pLat * 180) /$pi;

        $points[] = array($pLat,$pLng);
    endfor;

    require_once('PolylineEncoder.php');
    $PolyEnc   = new PolylineEncoder($points);
    $EncString = $PolyEnc->dpEncode();

    return $EncString['Points'];
}

/* set some options */
$MapLat    = $editar_sinan_suvis['latitude']; // latitude for map and circle center
$MapLng    = $editar_sinan_suvis['longitude']; // longitude as above
$MapRadius = 0.150;         // the radius of our circle (in Kilometres)
$MapFill   = 'E85F0E';    // fill colour of our circle
$MapBorder = '2B0EE8';    // border colour of our circle
$MapWidth  = 360;         // map image width (max 640px)
$MapHeight = 360;         // map image height (max 640px)

/* create our encoded polyline string */
$EncString = GMapCircle($MapLat,$MapLng, $MapRadius);

/* put together the static map URL */
$MapAPI = 'http://maps.google.com.au/maps/api/staticmap?';
$MapURL = $MapAPI.'center='.$MapLat.','.$MapLng.'&size='.$MapWidth.'x'.$MapHeight.'&maptype=roadmap&path=fillcolor:0x'.$MapFill.'33%7Ccolor:0x'.$MapBorder.'00%7Cenc:'.$EncString.'&key=AIzaSyBhFR-0e8D9OMY-1UrxGEzs1Fn0gkE5BPQ';

/* output an image tag with our map as the source
echo '<img src="'.$MapURL.'" style="width:360px;height:360px;" />';
/*----------------------------------------------------------------------------------------*/

$lat = $editar_sinan_suvis['latitude'];
$long = $editar_sinan_suvis['longitude'];
$imageGoogleDengueError = "imagens/mapasp.jpg";

?>

<div class="container theme-showcase" role="main" xmlns="http://www.w3.org/1999/html">
    <!-- Página de Título -->
    <div class="col-md-2"></div>
    <div class="form-group">
        <div class="col-md-8">
            <div class="page-header">
                <img id="logo-bloqueio" class="logo-img" src="imagens/bloqueio/titulobloqueio.jpg">
            </div>

            <form class="form-horizontal" id="ficha_bloqueio">
                <div class="form-group">
                    <h3><p><strong>BLOQ. : <?php echo $editar_sinan_suvis['id']; ?>&nbsp;&nbsp;- <?php echo $editar_sinan_suvis['agravo'];?><strong> - </strong>
                                <?php echo $editar_sinan_suvis['UBS1']; ?>&nbsp;&nbsp;-&nbsp;&nbsp;<?php echo $editar_sinan_suvis['Setor1']; ?>  <a role="button" class="btn btn-dark rounded-circle" data-toggle="tooltip" title="Imprimir Mapa do Setor" target="_blank" href="http://10.47.171.110/sisdamweb/setores/<?php echo $editar_sinan_suvis['Setor1']; ?>.pdf"><span class="glyphicon glyphicon-print"></span></a></strong></p></h3>
                    <br>

                    <div class="row">
                        <div class="col-xs-6 col-lg-5">
                            <p><img src="<?php if ($lat <> ''){echo $MapURL.'" style="width:320px;height:320px;"';}else{echo $imageGoogleDengueError;} ?>"/></p>
                        </div><!--/.col-xs-6.col-lg-4-->
                        <div class="col-xs-6 col-lg-3">
                            <h5><p><strong>SINAN : <?php echo $editar_sinan_suvis['nDoc']; ?>&nbsp;&nbsp;ENTRADA: <?php echo $editar_sinan_suvis ['DataEntrada']; ?></p></h5>
                        </div><!--/.col-xs-6.col-lg-4-->
                        <div class="col-xs-6 col-lg-4">
                            <h5><p>1º SIN : <?php echo substr($editar_sinan_suvis['DT_SIN_PRI'],0,5); ?>&nbsp;&nbsp;SE: <?php echo substr($editar_sinan_suvis['SEM_PRI'],4,5),'SS'; ?>&nbsp;&nbsp;CO: <?php echo $editar_sinan_suvis['CO'] ?>&nbsp;DO: <?php echo $editar_sinan_suvis['DO'] ?></strong></p></h5>
                        </div><!--/.col-xs-6.col-lg-4-->
                        <?php if ($agravo_buttons == 'dengue'){ ?>
                            <div class="col-xs-6 col-lg-4">
                                <h5><p><strong>TR: <?php if ($resultado_tr == "") {echo "Exame Não Realizado";} else { echo $resultado_tr;} ?>
                                            <?php if ($resultado_tr == "") {echo "";} else { echo "em :", $dt_notific;} ?></strong></p></h5></p>
                            </div><!--/.col-xs-6.col-lg-4-->
                            <div class="col-xs-6 col-lg-4">
                                <h5><p><strong>IGM FOCUS: <?php if ($resultado_igm == "") {echo "Exame Não Realizado";} else { echo $resultado_igm;} ?>
                                            <?php if ($resultado_igm == "") {echo "";} else { echo "em : ", $data_lib_exame_ccz;} ?></strong></p>
                            </div><!--/.col-xs-6.col-lg-4-->
                            <div class="col-xs-6 col-lg-4">
                                <h5><p><strong>IGM PANBIO: <?php if ($resultado_igm_panbio == "") {echo "Exame Não Realizado";} else { echo $resultado_igm_panbio;} ?>
                                            <?php if ($resultado_igm_panbio == "") {echo "";} else { echo "em : ", $data_lib_exame_ccz;} ?></strong></p>
                            </div><!--/.col-xs-6.col-lg-4-->
                            <div class="col-xs-6 col-lg-4">
                                <h5><p><strong>NS1: <?php if ($resultado_ns1 == "") {echo "Exame Não Realizado";} else { echo $resultado_ns1;} ?>
                                            <?php if ($resultado_ns1 == "") {echo "";} else { echo "em :", $data_lib_exame_ccz;} ?></strong></p></h5></p>
                            </div><!--/.col-xs-6.col-lg-4-->
                        <?php } else {?>
                            <div class="col-xs-6 col-lg-4">
                                <h5><p><strong>AMOSTRA: <?php echo $editar_sinan_suvis['Nr_da_Amostra'] ?>&nbsp;&nbsp;RECOLETA: <?php echo $editar_sinan_suvis['NOVA_COLETA'] ?></strong></p></h5>
                            </div><!--/.col-xs-6.col-lg-4-->
                            <div class="col-xs-6 col-lg-4">
                                <h5><p><strong>ELISA: <?php if ($resultado_elisa == "") {echo "Exame Não Realizado";} else { echo $resultado_elisa;} ?>
                                            MAT: <?php if ($resultado_mat == "") {echo "Exame Não Realizado";} else { echo $resultado_mat;} ?></strong></p>
                            </div><!--/.col-xs-6.col-lg-4-->
                            <div class="col-xs-6 col-lg-4">
                                <h5><p><strong>1º SORO: <?php echo $editar_sinan_suvis['1o_SOROVAR'] ?>&nbsp;&nbsp;1ºTIT: <?php echo $editar_sinan_suvis['1o_TIT'] ?></strong></p></h5>
                            </div><!--/.col-xs-6.col-lg-4-->
                            <div class="col-xs-6 col-lg-4">
                                <h5><p><strong>2º SORO: <?php echo $editar_sinan_suvis['2o_SOROVAR'] ?>&nbsp;&nbsp;2ºTIT: <?php echo $editar_sinan_suvis['2o_TIT'] ?></strong></p></h5>
                            </div><!--/.col-xs-6.col-lg-4-->

                        <?php }?>
                    </div><!--/row-->

                    <h5><p><strong>PACIENTE : <?php echo utf8_encode($editar_sinan_suvis['NM_PACIENT']); ?>&nbsp;&nbsp;&nbsp;
                                TELEFONE : (<?php echo $editar_sinan_suvis['NU_DDD_TEL']; ?>)&nbsp;<?php echo $editar_sinan_suvis['NU_TELEFON']; ?></strong></p></h5>

                    <h5><p><strong>ENDEREÇO
                                : <?php echo $editar_sinan_suvis['Logradouro']; ?> <?php echo $editar_sinan_suvis['Endereco1']; ?>
                                &nbsp;&nbsp;&nbsp;Nº: <?php echo $editar_sinan_suvis['N']; ?>
                                &nbsp;&nbsp;&nbsp;COMP: <?php echo utf8_encode($editar_sinan_suvis['Complemento']); ?></strong>
                        </p></h5>

                    <h5><p><strong>DA : <?php echo $editar_sinan_suvis['Da']; ?>&nbsp;&nbsp;&nbsp; PGGUIA
                                : <?php echo $editar_sinan_suvis['PgGuia1']; ?>&nbsp;&nbsp;&nbsp;BAIRRO : <?php echo $editar_sinan_suvis['Bairro1']; ?>&nbsp;&nbsp;&nbsp;
                                CEP : <?php echo $editar_sinan_suvis['Cep1']; ?></strong></p></h5>

                    <h5><p><strong>END. TRABALHO/EST : _____________________________________________________________________________</strong></p></h5>

                    <h5><p><strong>DA : ______ &nbsp;&nbsp;PÁG GUIA : __________ &nbsp;&nbsp;TELEFONE :
                                _________-__________&nbsp;&nbsp;&nbsp;VIAGEM : ____/____/_______</strong></p></h5>

                    <h5><p><strong>LOCAL PROVÁVEL DE INFECÇÃO : _________________________________________________________________</strong></p></h5>

                    <h5><p><strong>COLETA DE SOROLOGIA
                                : <?php  if ($data_col_exame_ccz == "") {echo "____/____/_______";} else { echo $data_col_exame_ccz;}?>&nbsp;&nbsp;&nbsp;
                                LIBERAÇÃO EM : <?php  if ($data_col_exame_ccz == "") {echo "____/____/_______";} else { echo $data_lib_exame_ccz;}?>
                            </strong></p></h5>

                    <h5><p><strong>BLOQUEIO EM : ____/____/_______&nbsp;&nbsp;&nbsp;I.V:_______&nbsp;I.T:_______</strong></p></h5>

                    <h5><p><strong>OBSERVAÇÃO SINAN : <span style="text-decoration:underline"> <?php echo $editar_sinan_suvis['DS_OBS']; ?></span></strong></h5></p>

                    <h5><p><strong>OBSERVAÇÃO:______________________________________________________________________________________</strong></p></h5>

                    <h5><p><strong>______________________________________________________________________________________________________</strong></p></h5>

                    <h5><p><strong>______________________________________________________________________________________________________</strong></p></h5>

                    <h5><p><strong>______________________________________________________________________________________________________</strong></p></h5>

                    <h5><p><strong>______________________________________________________________________________________________________</strong></p></h5>

                    <h5><p><strong>______________________________________________________________________________________________________</strong></p></h5>

                    <h5><p><strong>______________________________________________________________________________________________________</strong></p></h5>

                    <h5><p><strong>______________________________________________________________________________________________________</strong></p></h5>


                    <h5><p style="font-size: 8px" class="col-xs-12 text-center"><?php if ($impressao == "1ªVia"){echo "1ª VIA IMPRESSA POR : ", $usuariologin , " em " ,date("d/m/Y"); }
                            else{echo " 2ª VIA IMPRESSA POR  : ",$usuariologin , "  em  " , date("d/m/Y") ;} ?></p></h5>

                </div><!--/.col-xs-12.col-sm-9-->
        </div>
        </form>
        <div class="col-md-2"></div>
    </div>
</div>
</div>