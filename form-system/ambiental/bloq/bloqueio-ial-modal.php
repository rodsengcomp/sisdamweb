<script>
   $(document).ready(function(){$('#myModalImpressao').modal('show');});

   function myFunction() {
       window.close();
   }
</script>

<style>
    @media print{@page {margin: 1.5cm;size: portrait;}
</style>

<?php

$nDoc = $_GET["nDoc"];
$NM_PACIENT = $_GET["NM_PACIENTE"];
$Impressao = $_GET["Impressao"];
$DataBloqueio = $_GET["DataBloqueio"];
$DataNeb = $_GET["DataNeb"];
$agravo_sinan_sql = $_GET['sinan'];
$agravo_tabela_sql = $_GET['tabela'];
$agravo_buttons = $_GET['buttons'];
$agravo_hidden = $_GET['agravo'];
$agravo_ial = $_GET['ial'];
$impresso = $_GET['impresso'];

$lat = $editar_sinan_suvis['latitude'];
$long = $editar_sinan_suvis['longitude'];
$src1 = 'https://maps.googleapis.com/maps/api/staticmap?zoom=17&size=260x220&maptype=roadmap&markers=color:green%7Clabel:D%7C';
$src1error = 'https://maps.googleapis.com/maps/api/staticmap?zoom=60&size=260x220&maptype=roadmap&markers=color:red%7Clabel:E%7C';
$src2 = '&key=AIzaSyBhFR-0e8D9OMY-1UrxGEzs1Fn0gkE5BPQ';
$virg = ",";

$imageGoogleDengue = $src1.$lat.$virg.$long.$src2;
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
                    <h3><p><strong><?php echo $editar_sinan_suvis['agravo'];?><strong> - </strong>
                                </strong></p></h3>
<br>

                    <div class="row">
                        <div class="col-xs-6 col-lg-4">
                            <p><img src="<?php if ($lat <> ''){echo $imageGoogleDengue;}else{echo $imageGoogleDengueError;} ?>"/></p>
                        </div><!--/.col-xs-6.col-lg-4-->
                        <div class="col-xs-6 col-lg-4">
                            <h5><p><strong>SINAN : </p></h5>
                        </div><!--/.col-xs-6.col-lg-4-->
                        <div class="col-xs-6 col-lg-4">
                            <h5><p>ENTRADA: </strong></p></h5>
                        </div><!--/.col-xs-6.col-lg-4-->
                        <div class="col-xs-6 col-lg-4">
                            <h5><p><strong>1º SINTOMAS : &nbsp;&nbsp;S E: </strong></p></h5>
                        </div><!--/.col-xs-6.col-lg-4-->
                        <div class="col-xs-6 col-lg-4">
                            <h5><p><strong>COLETA: </strong></p>
                        </div><!--/.col-xs-6.col-lg-4-->
                        <div class="col-xs-6 col-lg-4">
                            <h5><p><strong>LIBERAÇÃO: </strong></p>
                        </div><!--/.col-xs-6.col-lg-4-->
                        <div class="col-xs-6 col-lg-4">
                            <h5><p><strong>EXAME: </strong></p>
                        </div><!--/.col-xs-6.col-lg-4-->
                    </div><!--/row-->

                        <h5><p><strong>PACIENTE : &nbsp;&nbsp;&nbsp;
                                    TELEFONE : ()&nbsp;</strong></p></h5>

                        <h5><p><strong>ENDEREÇO
                                    :
                                    &nbsp;&nbsp;&nbsp;Nº:
                                    &nbsp;&nbsp;&nbsp;COMP: </strong>
                            </p></h5>

                        <h5><p><strong>DA : &nbsp;&nbsp;&nbsp; PGGUIA
                                    : &nbsp;&nbsp;&nbsp;BAIRRO : &nbsp;&nbsp;&nbsp;
                                    CEP : </strong></p></h5>

                        <h5><p><strong>END. TRABALHO/EST : _____________________________________________________________________________</strong></p></h5>

                        <h5><p><strong>DA : ______ &nbsp;&nbsp;PÁG GUIA : __________ &nbsp;&nbsp;TELEFONE :
                                    _________-__________ </strong></p></h5>

                        <h5><p><strong>LOCAL PROVÁVEL DE INFECÇÃO : _________________________________________________________________</strong></p></h5>

                        <h5><p><strong>COLETA DE SOROLOGIA
                                    : &nbsp;&nbsp;&nbsp;DATA VIAGEM : ____/____/_______</strong></p></h5>

                        <h5><p><strong>BLOQUEIO EM : ____/____/_______&nbsp;&nbsp;&nbsp;I.V:_______&nbsp;I.T:_______</strong></p></h5>
                        <h5><p><strong>ENC. P/ AÇÃO QUÍMICA : ____/____/_______&nbsp;&nbsp;&nbsp;I.V:_______&nbsp;I.T:_______</strong></p></h5>

                        <h5><p><strong>OBSERVAÇÃO SINAN : <span> </span></strong></h5></p>

                        <h5><p><strong>OBSERVAÇÃO:______________________________________________________________________________________</strong></p></h5>

                        <h5><p><strong>______________________________________________________________________________________________________</strong></p></h5>

                        <h5><p><strong>______________________________________________________________________________________________________</strong></p></h5>

                        <h5><p><strong>______________________________________________________________________________________________________</strong></p></h5>

                        <h5><p><strong>______________________________________________________________________________________________________</strong></p></h5>

                        <h5><p><strong>______________________________________________________________________________________________________</strong></p></h5>

                        <h5><p><strong>______________________________________________________________________________________________________</strong></p></h5>

                        <h5><p><strong>______________________________________________________________________________________________________</strong></p></h5>


                </div><!--/.col-xs-12.col-sm-9-->
                </div>

        <!-- Inicio Modal Impressão-->
        <div class="modal fade" id="myModalImpressao" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title text-center" id="myModalLabel">SisdamJT Web</h4>
                    </div>
                    <div class="modal-body"><div class="row"><div class="text-center"><h4><?php if ($agravo_impresso == '1') {echo 'Qual atividade para';}else{echo 'Deseja Imprimir';}?></h4></div>
                            <div class="text-center"><h4>o Sinan <?php echo $nDoc ;?> ?</h4></div></div></div>
                    <div class="modal-footer">
                        <div class="text-center">
                            <?php if ($agravo_impresso == '1'){ ?>
                                <a target="_blank" href='suvisjt.php?pag=impressao-ambiental&nDoc=<?php echo $nDoc; ?>&NM_PACIENT=<?php echo $NM_PACIENT; ?>&Impressao=1Via-B&DataBloqueio=<?php echo date("d/m/Y")?>sinan=<?php echo $agravo_sinan_sql ;?>&tabela=<?php echo $agravo_tabela_sql ;?>&buttons=<?php echo $agravo_buttons ;?>&agravo=<?php echo $agravo_hidden ;?>&ial=<?php echo $agravo_ial ;?>&list=ial&impresso=1'
                                   role="button" class="btn btn-success" data-toggle="tooltip" title="Bloqueio">BLOQ.</a>&nbsp;&nbsp;&nbsp;&nbsp;
                                <a target="_blank" href='suvisjt.php?pag=impressao-ambiental&nDoc=<?php echo $nDoc; ?>&NM_PACIENT=<?php echo $NM_PACIENT; ?>&Impressao=1Via-B&DataNeb=<?php echo date("d/m/Y")?>sinan=<?php echo $agravo_sinan_sql ;?>&tabela=<?php echo $agravo_tabela_sql ;?>&buttons=<?php echo $agravo_buttons ;?>&agravo=<?php echo $agravo_hidden ;?>&ial=<?php echo $agravo_ial ;?>&list=ial&impresso=1'
                                  role="button" class="btn btn-success" data-toggle="tooltip" title="Nebulização">NEB.</a>&nbsp;&nbsp;&nbsp;&nbsp;
                                <button type="button" class="btn btn-danger" data-toggle="tooltip" title="Cancelar" data-dismiss="modal">SAIR</button>&nbsp;&nbsp;&nbsp;&nbsp;
                            <?php } else {?>
                                <a target="_blank" href='suvisjt.php?pag=impressao-ambiental&nDoc=<?php echo $nDoc; ?>&NM_PACIENT=<?php echo $NM_PACIENT; ?>&Impressao=2Via-B&sinan=<?php echo $agravo_sinan_sql ;?>&tabela=<?php echo $agravo_tabela_sql ;?>&buttons=<?php echo $agravo_buttons ;?>&agravo=<?php echo $agravo_hidden ;?>&ial=<?php echo $agravo_ial ;?>&list=ial&impresso=2'
                                   role="button" onclick="myFunction()" class="btn btn-success" data-toggle="tooltip" title="Imprimir Ficha">SIM</a>&nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="javascript:window.close()" role="button" type="button" class="btn btn-danger">NÃO</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- Fim Modal Impressao-->

            </form>
            <div class="col-md-2"></div>
        </div>
    </div>
</div>
