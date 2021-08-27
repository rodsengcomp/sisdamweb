<!-- Este projeto é desenvolvido na Suvis Jaçanã-Tremembé com iniciativa dos colaboradores da Unidade -->
<!-- Código desenvolvido por Rodolfo Romaioli Ribeiro de Jesus - rodolfo.romaioli@gmail.com -->
<!-- Sisdam Web - 2.0 - 2017 - Todos os direitos reservados -->

<?php
error_reporting(0);
include_once '../../../../locked/seguranca.php';
include_once '../../../../conecta.php';
?>
<?php
#Recolhendo os dados do formulário

$sinan = mysqli_real_escape_string($conectar, $_POST["sinan"]);
$dataentrada = mysqli_real_escape_string($conectar, $_POST["dataentrada"]);
$nome = mysqli_real_escape_string($conectar, $_POST["nome"]);
$rua = mysqli_real_escape_string($conectar, $_POST["rua"]);
$num = mysqli_real_escape_string($conectar, $_POST["num"]);
$comp = mysqli_real_escape_string($conectar, $_POST["comp"]);
$cep = mysqli_real_escape_string($conectar, $_POST["cep"]);
$log = mysqli_real_escape_string($conectar, $_POST["log"]);
$bairro = mysqli_real_escape_string($conectar, $_POST["bairro"]);
$da = mysqli_real_escape_string($conectar, $_POST["da"]);
$setor = mysqli_real_escape_string($conectar, $_POST["setor"]);
$pgguia = mysqli_real_escape_string($conectar, $_POST["pgguia"]);
$localvd = mysqli_real_escape_string($conectar, $_POST["localvd"]);
$ruagoogle = mysqli_real_escape_string($conectar, $_POST["ruagoogle1"]);
$latitude = mysqli_real_escape_string($conectar, $_POST["latitude"]);
$longitude = mysqli_real_escape_string($conectar, $_POST["longitude"]);
$idrua = mysqli_real_escape_string($conectar, $_POST["idrua"]);
$cnes = mysqli_real_escape_string($conectar, $_POST["cnes"]);
$estabelecimento = mysqli_real_escape_string($conectar, $_POST["estabelecimento"]);
$agravo_sinan_sql = mysqli_real_escape_string($conectar, $_POST["agravosinan"]);
$agravo_tabela_sql = mysqli_real_escape_string($conectar, $_POST["agravotabela"]);
$agravo_buttons = mysqli_real_escape_string($conectar, $_POST["agravobuttons"]);
$agravo = mysqli_real_escape_string($conectar, $_POST["agravo"]);
$agravo_ial = mysqli_real_escape_string($conectar, $_POST["agravoial"]);
$agravo_list = mysqli_real_escape_string($conectar, $_POST["agravolist"]);
$agravo_impresso = mysqli_real_escape_string($conectar, $_POST["agravoimpresso"]);
$dtnotific = mysqli_real_escape_string($conectar, $_POST["dtnotific"]);
$semnot = mysqli_real_escape_string($conectar, $_POST["semnot"]);
$dtnasc = mysqli_real_escape_string($conectar, $_POST["dtnasc"]);
$dtsinpri = mysqli_real_escape_string($conectar, $_POST["dtsinpri"]);
$sempri = mysqli_real_escape_string($conectar, $_POST["sempri"]);
$nudddtel = mysqli_real_escape_string($conectar, $_POST["nudddtel"]);
$nutelefon = mysqli_real_escape_string($conectar, $_POST["nutelefon"]);
$nmcomplem = mysqli_real_escape_string($conectar, $_POST["nmcomplem"]);
$sexo = mysqli_real_escape_string($conectar, $_POST["sexo"]);
$idade = mysqli_real_escape_string($conectar, $_POST["idade"]);
$se = mysqli_real_escape_string($conectar, $_POST["se"]);
$dataobito = mysqli_real_escape_string($conectar, $_POST["dataobito"]);
$testerapido = mysqli_real_escape_string($conectar, $_POST["testerapido"]);


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
            <form class="form-horizontal" id="proc_edit_end_ambiental">
                <?php

                //Se conectando com o Banco de Dados e tratando possível erro de conexão ...
                if ($conexao = $conectar->query($conectar)) die ('<div class="form-group"><a href="javascript:history.back()" <button type=\'button\' class=\'btn btn-danger\' accesskey="V"><span class="glyphicon glyphicon-arrow-left"></span> <u>V</u>OLTAR</button></a><h4><strong><div class="alert alert-danger text-center" role="alert">ERROR : 01 FALHA AO CONECTAR !!! SE PERSISTIR CONTATE: sisdamjt@gmail.com</h4></strong></div>');

                {
# Verificando se tabela já tem id com sinan e doença iguais.
$sv2_dengue_insert = $conectar->query("SELECT id FROM sv2 WHERE sinan='$sinan' AND agravo='$agravo'");

if ($sv2_dengue_insert->num_rows > 0) {$conectar->query("INSERT INTO $agravo_tabela_sql (nDoc, DataEntrada, NomeSolicitante, Endereco1, N, Complemento, Cep1 , Logradouro, Bairro1, Da, Setor1, PgGuia1, UBS1,
RuaGoogle, Latitude, Longitude , idRua , CnesUnidadeNotificadora , UnidadeNotificadora, DataNotificacao, SeDataNotificacao, DataNascimento, Data1Sintomas,
Se1Sintomas, Ddd, TelefoneFixo, ResultadoTr, usuarioAlteracao, DataAlteracao) VALUES ('$sinan','$dataentrada','$nome','$rua','$num','$comp','$cep','$log','$bairro',
'$da','$setor', '$pgguia','$localvd', '$ruagoogle','$latitude','$longitude', '$idrua','$cnes', '$estabelecimento', '$dtnotific','$semnot','$dtnasc',
'$dtsinpri','$sempri','$nudddtel','$nutelefon','$testerapido','$usuariologin', NOW())");
$_SESSION['msgedit'] = "<div class='alert alert-success text-center'><strong>SINAN : $sinan - $nome - $log $rua - Nº:$num - $localvd - INSERIDO COM SUCESSO!!!</strong></div>";
header("Location: suvisjt.php?pag=edit-end-ambiental&pagina=1&sinan=$agravo_sinan_sql&tabela=$agravo_tabela_sql&buttons=$agravo_buttons&agravo=$agravo&ial=$agravo_ial&list=$agravo_list");
}
else {
$conectar->query("INSERT INTO $agravo_tabela_sql (nDoc, DataEntrada, NomeSolicitante, Endereco1, N, Complemento, Cep1 , Logradouro, Bairro1, Da, Setor1, PgGuia1, UBS1,
RuaGoogle, Latitude, Longitude , idRua , CnesUnidadeNotificadora , UnidadeNotificadora, DataNotificacao, SeDataNotificacao, DataNascimento, Data1Sintomas,
Se1Sintomas, Ddd, TelefoneFixo, ResultadoTr, usuarioAlteracao, DataAlteracao) VALUES ('$sinan','$dataentrada','$nome','$rua','$num','$comp','$cep','$log','$bairro',
'$da','$setor', '$pgguia','$localvd', '$ruagoogle','$latitude','$longitude', '$idrua','$cnes', '$estabelecimento', '$dtnotific','$semnot','$dtnasc',
'$dtsinpri','$sempri','$nudddtel','$nutelefon','$testerapido','$usuariologin', NOW())");
$conectar->query("INSERT INTO sv2 (sinan,datanot,agravo,nome,idade,sexo,dataentrada,se,localate,rua,num,comp,tel,cep,log,cidade,bairro,localvd,
suvis,dataobito,latsv2,longsv2,da,usuariocad,criado,tipo,idrua) VALUES ('$sinan', '$dtnotific', '$agravo', '$nome', '$idade', '$sexo', '$dataentrada','$se','$estabelecimento',
'$rua', '$num', '$comp', '$nudddtel $nutelefon', '$cep', '$log', 'SAO PAULO', '$bairro', '$localvd', 'UVIS JACANA-TREMEMBE', '$dataobito' , '$latitude' , '$longitude' , '$da', 'sisdamweb-$usuariologin', NOW(),
 'suvis','$idrua')");
$_SESSION['msgedit'] = "<div class='alert alert-success text-center'><strong style='color: red'>SV2 - SINAN : $sinan - $nome - $log $rua - Nº:$num - $localvd - INSERIDO COM SUCESSO!!!</strong></div>";
header("Location: suvisjt.php?pag=edit-end-ambiental&pagina=1&sinan=$agravo_sinan_sql&tabela=$agravo_tabela_sql&buttons=$agravo_buttons&agravo=$agravo&ial=$agravo_ial&list=$agravo_list");
}
 }
    ?>
          </form>
        </div>
    </div>
</div>

