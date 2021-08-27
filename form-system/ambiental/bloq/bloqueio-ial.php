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

$consulta_sinan = "SELECT $agravo_tabela_sql.UnidadeNotificadora, $agravo_tabela_sql.DataEntrada, $agravo_tabela_sql.nDoc, $agravo_tabela_sql.Endereco1, $agravo_tabela_sql.N, $agravo_tabela_sql.Complemento, 
$agravo_tabela_sql.Logradouro, $agravo_tabela_sql.Cep1, $agravo_tabela_sql.PgGuia1, $agravo_tabela_sql.Bairro1, $agravo_tabela_sql.Da, $agravo_tabela_sql.Setor1, $agravo_tabela_sql.UBS1,
$agravo_tabela_sql.Descarte, $agravo_tabela_sql.DataBloqueio, $agravo_tabela_sql.DataNeb, $agravo_tabela_sql.usuarioAlteracao, $agravo_tabela_sql.DataAlteracao, $agravo_tabela_sql.DataLer,
$agravo_tabela_sql.usuarioLer, $agravo_tabela_sql.Impressao, $agravo_tabela_sql.ruagoogle, $agravo_tabela_sql.latitude, $agravo_tabela_sql.longitude, $agravo_tabela_sql.agravo, $agravo_tabela_sql.NomeSolicitante, 
$agravo_tabela_sql.nDoc, $agravo_tabela_sql.DataNotificacao, $agravo_tabela_sql.SeDataNotificacao, $agravo_tabela_sql.NomeSolicitante,$agravo_tabela_sql.DataNascimento, $agravo_tabela_sql.Data1Sintomas, $agravo_tabela_sql.Se1Sintomas,
$agravo_tabela_sql.N, $agravo_tabela_sql.Ddd,$agravo_tabela_sql.TelefoneFixo,
$agravo_ial.Resultado, $agravo_ial.Paciente, $agravo_ial.Exame, $agravo_ial.`Dt. Cadastro`, $agravo_ial.`Dt. Liberação`
FROM $agravo_tabela_sql LEFT JOIN $agravo_ial ON $agravo_tabela_sql.NomeSolicitante = $agravo_ial.Paciente
WHERE $agravo_tabela_sql.nDoc='$nDoc'";

$resultado_sinan = $conectar->query($consulta_sinan);
$editar_sinan_suvis = mysqli_fetch_assoc($resultado_sinan);
$resultado_exame_ial = $editar_sinan_suvis['Resultado'];
$data_col_exame_ial = $editar_sinan_suvis['Dt. Cadastro'];
$data_lib_exame_ial = $editar_sinan_suvis['Dt. Liberação'];
$dt_notific = $editar_sinan_suvis['DT_NOTIFIC'];
$impresso = $editar_sinan_suvis['Impressao'];
$exame_ial = $editar_sinan_suvis['Exame'];

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
                                <?php echo $editar_sinan_suvis['UBS1']; ?>&nbsp;&nbsp;-&nbsp;&nbsp;<?php echo $editar_sinan_suvis['Setor1']; ?></strong></p></h3>
<br>

                    <div class="row">
                        <div class="col-xs-6 col-lg-4">
                            <p><img src="<?php if ($lat <> ''){echo $imageGoogleDengue;}else{echo $imageGoogleDengueError;} ?>"/></p>
                        </div><!--/.col-xs-6.col-lg-4-->
                        <div class="col-xs-6 col-lg-4">
                            <h5><p><strong>SINAN : <?php echo $editar_sinan_suvis['nDoc']; ?></p></h5>
                        </div><!--/.col-xs-6.col-lg-4-->
                        <div class="col-xs-6 col-lg-4">
                            <h5><p>ENTRADA: <?php echo $editar_sinan_suvis ['DataEntrada']; ?></strong></p></h5>
                        </div><!--/.col-xs-6.col-lg-4-->
                        <div class="col-xs-6 col-lg-4">
                            <h5><p><strong>1º SINTOMAS : <?php echo substr($editar_sinan_suvis['Data1Sintomas'],0,5); ?>&nbsp;&nbsp;S E: <?php echo substr($editar_sinan_suvis['Se1Sintomas'],4,5),'SS'; ?></strong></p></h5>
                        </div><!--/.col-xs-6.col-lg-4-->
                        <div class="col-xs-6 col-lg-4">
                            <h5><p><strong>COLETA: <?php if ($data_col_exame_ial == "") {echo "";} else { echo $data_col_exame_ial;} ?></strong></p>
                        </div><!--/.col-xs-6.col-lg-4-->
                        <div class="col-xs-6 col-lg-4">
                            <h5><p><strong>LIBERAÇÃO: <?php if ($data_lib_exame_ial == "") {echo "";} else { echo $data_lib_exame_ial;} ?></strong></p>
                        </div><!--/.col-xs-6.col-lg-4-->
                        <div class="col-xs-6 col-lg-4">
                            <h5><p><strong>EXAME: <?php if ($resultado_exame_ial == "") {echo "Exame Não Realizado";} else { echo $resultado_exame_ial,' - ',$exame_ial;} ?></strong></p>
                        </div><!--/.col-xs-6.col-lg-4-->
                    </div><!--/row-->

                        <h5><p><strong>PACIENTE : <?php echo utf8_encode($editar_sinan_suvis['NomeSolicitante']); ?>&nbsp;&nbsp;&nbsp;
                                    TELEFONE : (<?php echo $editar_sinan_suvis['Ddd']; ?>)&nbsp;<?php echo $editar_sinan_suvis['TelefoneFixo']; ?></strong></p></h5>

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
                                    _________-__________ </strong></p></h5>

                        <h5><p><strong>LOCAL PROVÁVEL DE INFECÇÃO : _________________________________________________________________</strong></p></h5>

                        <h5><p><strong>COLETA DE SOROLOGIA
                                    : <?php  if ($data_col_exame_ial == "") {echo "____/____/_______";} else { echo $data_col_exame_ial;}?>&nbsp;&nbsp;&nbsp;DATA VIAGEM : ____/____/_______</strong></p></h5>

                        <h5><p><strong>BLOQUEIO EM : ____/____/_______&nbsp;&nbsp;&nbsp;I.V:_______&nbsp;I.T:_______</strong></p></h5>
                        <h5><p><strong>ENC. P/ AÇÃO QUÍMICA : ____/____/_______&nbsp;&nbsp;&nbsp;I.V:_______&nbsp;I.T:_______</strong></p></h5>

                        <h5><p><strong>OBSERVAÇÃO SINAN : <span style="text-decoration:underline"> <?php echo $editar_sinan_suvis['Observacoes']; ?></span></strong></h5></p>

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
