<!-- Este projeto é desenvolvido na Suvis Jaçanã-Tremembé com iniciativa dos colaboradores da Unidade -->
<!-- Código desenvolvido por Rodolfo Romaioli Ribeiro de Jesus - rodolfo.romaioli@gmail.com -->
<!-- Sisdam Web - 2.0 - 2017 - Todos os direitos reservados -->

<?php
error_reporting(0);
include_once '../../../../locked/seguranca.php';
include_once '../../../../conecta.php';
?>
<?php

#Recolhendo os dados do formulário para inserção nas tabelas do SISDAMWEB (tabela do agravo e SV2

$sinan = mysqli_real_escape_string($conectar, $_POST["sinan"]);                     // inserção na tabela do agravo no sisdamweb e automática no SV2
$dtnotific = mysqli_real_escape_string($conectar, $_POST["dtnotific"]);             // inserção automática no SV2
$nome = mysqli_real_escape_string($conectar, $_POST["nome"]);                       // inserção na tabela do agravo no sisdamweb e automática no SV2
$idade = mysqli_real_escape_string($conectar, $_POST["idade"]);                     // inserção automática no SV2
$sexo = mysqli_real_escape_string($conectar, $_POST["sexo"]);                       // inserção automática no SV2
$dataentrada = mysqli_real_escape_string($conectar, $_POST["dataentrada"]);         // inserção na tabela do agravo no sisdamweb e automática no SV2
$se = mysqli_real_escape_string($conectar, $_POST["se"]);                           // inserção automática no SV2
$estabelecimento = mysqli_real_escape_string($conectar, $_POST["estabelecimento"]); // inserção na tabela do agravo no sisdamweb e automática no SV2
$rua = mysqli_real_escape_string($conectar, $_POST["rua"]);                         // inserção automática no SV2
$num = mysqli_real_escape_string($conectar, $_POST["num"]);                         // inserção na tabela do agravo no sisdamweb e automática no SV2
$comp = mysqli_real_escape_string($conectar, $_POST["comp"]);                       // inserção na tabela do agravo no sisdamweb e automática no SV2
$nudddtel = mysqli_real_escape_string($conectar, $_POST["nudddtel"]);               // inserção automática no SV2
$nutelefon = mysqli_real_escape_string($conectar, $_POST["nutelefon"]);             // inserção automática no SV2
$cep = mysqli_real_escape_string($conectar, $_POST["cep"]);                         // inserção automática no SV2
$log = mysqli_real_escape_string($conectar, $_POST["log"]);                         // inserção automática no SV2
$bairro = mysqli_real_escape_string($conectar, $_POST["bairro"]);                   // inserção automática no SV2
$localvd = mysqli_real_escape_string($conectar, $_POST["localvd"]);                 // inserção automática no SV2
$dataobito = mysqli_real_escape_string($conectar, $_POST["dataobito"]);             // inserção automática no SV2
$ruagoogle = mysqli_real_escape_string($conectar, $_POST["ruagoogle1"]);            // inserção na tabela do agravo no sisdamweb e automática no SV2
$latitude = mysqli_real_escape_string($conectar, $_POST["latitude"]);               // inserção na tabela do agravo no sisdamweb e automática no SV2
$longitude = mysqli_real_escape_string($conectar, $_POST["longitude"]);             // inserção na tabela do agravo no sisdamweb e automática no SV2
$da = mysqli_real_escape_string($conectar, $_POST["da"]);                           // inserção automática no SV2
$idrua = mysqli_real_escape_string($conectar, $_POST["idrua"]);                     // inserção na tabela do agravo no sisdamweb e automática no SV2
$cnes = mysqli_real_escape_string($conectar, $_POST["cnes"]);
$agravo_sinan_sql = mysqli_real_escape_string($conectar, $_POST["agravosinan"]);
$agravo_tabela_sql = mysqli_real_escape_string($conectar, $_POST["agravotabela"]);
$agravo_buttons = mysqli_real_escape_string($conectar, $_POST["agravobuttons"]);
$agravo = mysqli_real_escape_string($conectar, $_POST["agravo"]); // inserção na tabela do agravo no sisdamweb e automática no SV2
$agravo_ial = mysqli_real_escape_string($conectar, $_POST["agravoial"]);
$agravo_list = mysqli_real_escape_string($conectar, $_POST["agravolist"]);
$agravo_impresso = mysqli_real_escape_string($conectar, $_POST["agravoimpresso"]);

$dataentrada_sql = date("Y-m-d",strtotime(str_replace('/', '-', $dataentrada)));

?>

<div class="container theme-showcase" role="main" xmlns="http://www.w3.org/1999/html">
    <!-- Página de Título -->
    <!-- Página de Título -->
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <ol class="breadcrumb">
                    <li><i class="fa fa-database"></i> <a href="suvisjt.php">Sisdam Web</a></li>
                    <li class="active">Edição Sv2 Suvis</li>
                </ol>
                <button type="button" class="btn btn-warning btn-lg btn-block">EDITAR ENDEREÇO</button>
            </div>
        </div>
    </div>
    <!-- Fim da Página de Título -->
    <div class="row">
        <div class="col-md-12">
            <form class="form-horizontal" id="proc_edit_end_epidemio">
                <?php

                //Se conectando com o Banco de Dados e tratando possível erro de conexão ...
                if ($conexao = $conectar->query($conectar)) die ('<div class="form-group"><a href="javascript:history.back()" <button type=\'button\' class=\'btn btn-danger\' accesskey="V"><span class="glyphicon glyphicon-arrow-left"></span> <u>V</u>OLTAR</button></a><h4><strong><div class="alert alert-danger text-center" role="alert">ERROR : 01 FALHA AO CONECTAR !!! SE PERSISTIR CONTATE: sisdamjt@gmail.com</h4></strong></div>');

                    # Verificando se tabela já tem id com sinan e doença iguais.
                    $sv2_epidemio_insert = $conectar->query("SELECT id FROM sv2 WHERE sinan='$sinan' AND agravo='$agravo'");

                        if ($sv2_epidemio_insert->num_rows > 0) {
                            $conectar->query("INSERT INTO $agravo_tabela_sql (nDoc, NomePaciente, DataEntrada, N, Complemento,RuaGoogle, Latitude, Longitude , idRua ,
                            CnesUnidadeNotificadora , UnidadeNotificadora, ubs, usuarioAlteracao, DataAlteracao) VALUES ('$sinan','$nome','$dataentrada','$num',
                            '$comp', '$ruagoogle','$latitude','$longitude', '$idrua','$cnes', '$estabelecimento','$localvd','$usuariologin', NOW())");
                            $_SESSION['msgedit'] = "<div class='alert alert-success text-center'><strong>SINAN : $sinan - $nome - $log $rua - Nº:$num - $localvd - INSERIDO COM SUCESSO!!!</strong></div>";
                            header("Location: suvisjt.php?pag=edit-end-epidemio&pagina=1&sinan=$agravo_sinan_sql&tabela=$agravo_tabela_sql&buttons=$agravo_buttons&agravo=$agravo&ial=$agravo_ial&list=$agravo_list");
                        } else {
                            $conectar->query("INSERT INTO $agravo_tabela_sql (nDoc, DataEntrada, N, Complemento,RuaGoogle, Latitude, Longitude , idRua ,
                            CnesUnidadeNotificadora , UnidadeNotificadora, usuarioAlteracao, DataAlteracao) VALUES ('$sinan','$dataentrada','$num',
                            '$comp', '$ruagoogle','$latitude','$longitude', '$idrua','$cnes', '$estabelecimento','$usuariologin', NOW())");
                            //$conectar->query("INSERT INTO sv2 (sinan,datanot,agravo,nome,idade,sexo,dataentrada,se,localate,rua,num,comp,tel,cep,log,cidade,bairro,
                            //localvd,suvis,dataobito,latsv2,longsv2,da,usuariocad,criado,usuarioalt, alterado,tipo,idrua) VALUES ('$sinan', '$dtnotific', '$agravo', '$nome', '$idade', '$sexo',
                            //'$dataentrada','$se','$estabelecimento','$rua', '$num', '$comp', '$nudddtel $nutelefon', '$cep', '$log', 'SAO PAULO', '$bairro', '$localvd',
                            //'UVIS JACANA-TREMEMBE', '$dataobito' , '$latitude' , '$longitude' , '$da', 'sisdamweb-$usuariologin', NOW(),'$usuariologin', NOW(),'suvis','$idrua')");
                            $_SESSION['msgedit'] = "<div class='alert alert-success text-center'><strong style='color: red'>SV2 - SINAN : $sinan - $nome - $log $rua - Nº:$num - $localvd - INSERIDO COM SUCESSO!!!</strong></div>";
                            header("Location: suvisjt.php?pag=edit-end-epidemio&pagina=1&sinan=$agravo_sinan_sql&tabela=$agravo_tabela_sql&buttons=$agravo_buttons&agravo=$agravo&ial=$agravo_ial&list=$agravo_list");
                        }
                ?>

          </form>
        </div>
    </div>
</div>

