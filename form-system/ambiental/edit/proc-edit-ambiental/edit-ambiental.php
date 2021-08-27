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
$databloqueio = mysqli_real_escape_string($conectar, $_POST["databloq"]);
$dataneb = mysqli_real_escape_string($conectar, $_POST["dataneb"]);
$impressao = mysqli_real_escape_string($conectar, $_POST["impressao"]);
$descarte = mysqli_real_escape_string($conectar, $_POST["descarte"]);
$agravo = mysqli_real_escape_string($conectar, $_POST["agravo"]);
$agravo_tabela_sql = mysqli_real_escape_string($conectar, $_POST["agravotabela"]);
$agravo_buttons = mysqli_real_escape_string($conectar, $_POST["agravobuttons"]);
$agravo_sinan_sql = mysqli_real_escape_string($conectar, $_POST["agravosinan"]);
$agravo_ial = mysqli_real_escape_string($conectar, $_POST["agravoial"]);
$agravo_list = mysqli_real_escape_string($conectar, $_POST["agravolist"]);
$agravo_impresso = mysqli_real_escape_string($conectar, $_POST["agravoimpresso"]);


//Se conectando com o Banco de Dados e tratando possível erro de conexão ...
if ($conexao = $conectar->query($conectar)) die ('<br><br><div class="container theme-showcase" role="main" xmlns="http://www.w3.org/1999/html"><div class="row"><div class="col-md-12"><div class="form-group"<a href="javascript:history.back()" <button type=\'button\' class=\'btn btn-danger\' accesskey="V"><span class="glyphicon glyphicon-arrow-left"></span> <u>V</u>OLTAR</button></a><h4><strong><div class="alert alert-danger text-center" role="alert">ERROR : 01 FALHA AO CONECTAR !!! SE PERSISTIR CONTATE: sisdamjt@gmail.com</h4></strong></div></div></div>');


//Se conectando com o Banco de Dados e tratando possível erro de conexão ...
if ($conexao = $conectar->query($conectar)) die ('<div class="form-group"><a href="javascript:history.back()" <button type=\'button\' class=\'btn btn-danger\' accesskey="V"><span class="glyphicon glyphicon-arrow-left"></span> <u>V</u>OLTAR</button></a><h4><strong><div class="alert alert-danger text-center" role="alert">ERROR : 01 FALHA AO CONECTAR !!! SE PERSISTIR CONTATE: sisdamjt@gmail.com</h4></strong></div>');

    $sql_edit_bloq = $conectar->query("SELECT nDoc FROM $agravo_tabela_sql WHERE nDoc='$sinan' AND nDoc<>'$sinan'");

            if ($sql_edit_bloq->num_rows > 0) {
            $_SESSION['msgerroredit'] = "<div class='alert alert-danger text-center'><strong>SINAN</strong> : $sinan - <strong>NOME</strong> : $nome - NÃO EDITADO : DUPLICIDADE DE REGISTRO</strong></div>";
            header("Location: suvisjt.php?pag=edit-ambiental&nDoc=$sinan&sinan=$agravo_sinan_sql&tabela=$agravo_tabela_sql&buttons=$agravo_buttons&agravo=$agravo&ial=$agravo_ial&list=$agravo_list&impresso=$agravo_impresso");
            } else { if (!$conectar->query("UPDATE $agravo_tabela_sql SET Endereco1 = '$rua', N ='$num' , Complemento = '$comp', Cep1='$cep' , Logradouro = '$log', Bairro1 = '$bairro', Da = '$da', Setor1 = '$setor', PgGuia1 = '$pgguia', UBS1 = '$localvd', RuaGoogle = '$ruagoogle', Latitude = '$latitude', Longitude = '$longitude', idRua = '$idrua', CnesUnidadeNotificadora = '$cnes', UnidadeNotificadora = '$estabelecimento',DataBloqueio = '$databloqueio', DataNeb = '$dataneb',usuarioAlteracao = '$usuariologin', DataAlteracao = NOW() WHERE nDoc='$sinan'"))die ('<div class="form-system-group"><a href="javascript:history.back()" <button type=\'button\' class=\'btn btn-danger\' accesskey="V"><span class="glyphicon glyphicon-arrow-left"></span> <u>V</u>OLTAR</button></a><h4><strong><div class="alert alert-danger text-center" roles="alert">ERROR:02 FALHA DE SICRONIZAÇÃO COM A TABELA !!! SE PERSISTIR CONTATE: sisdamjt@gmail.com</h4></strong></div>');
            $_SESSION['msgedit'] = "<div class='alert alert-success text-center'><strong>SINAN : $sinan - $nome - $log $rua - Nº:$num - $localvd - EDITADO COM SUCESSO!!!</strong></div>";
            header("Location: suvisjt.php?pag=list-bloq-$agravo_list&sinan=$agravo_sinan_sql&tabela=$agravo_tabela_sql&buttons=$agravo_buttons&agravo=$agravo&ial=$agravo_ial&list=$agravo_list&impresso=$agravo_impresso");
            }
?>


