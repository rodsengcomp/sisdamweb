<?php
/* Este projeto é desenvolvido na Suvis Jaçanã-Tremembé com iniciativa dos colaboradores da Unidade
 * Código desenvolvido por Rodolfo Romaioli Ribeiro de Jesus - rodolfo.romaioli@gmail.com
 * Sisdam Web - 2.0 - 2017 - Todos os direitos reservados
 */
error_reporting(0);
include_once '../../../../locked/seguranca.php';
include_once '../../../../conecta.php';

if ($conexao = $conectar->query($conectar)) die ('<br><br><div class="container theme-showcase" role="main" xmlns="http://www.w3.org/1999/html"><div class="row"><div class="col-md-12"><div class="form-group"><a href="javascript:history.back()" <button type=\'button\' class=\'btn btn-danger\' accesskey="V"><span class="glyphicon glyphicon-arrow-left"></span> <u>V</u>OLTAR</button></a><h4><strong><div class="alert alert-danger text-center" role="alert">ERROR : 01 FALHA AO CONECTAR !!! SE PERSISTIR CONTATE: sisdamjt@gmail.com</h4></strong></div></div></div>');

#Recolhendo os dados do formulário
$sinan = mysqli_real_escape_string($conectar, $_POST["sinan"]);
$protocolo = mysqli_real_escape_string($conectar, $_POST["protocolocad"]);
$datanot = mysqli_real_escape_string($conectar, $_POST["datanot"]);
$agravo = mysqli_real_escape_string($conectar, $_POST["agravo"]);
$ocorrencia = mysqli_real_escape_string($conectar, $_POST["ocorrencia"]);
$nome = mysqli_real_escape_string($conectar, $_POST["nome"]);
$idade = mysqli_real_escape_string($conectar, $_POST["idade"]);
$sexo = mysqli_real_escape_string($conectar, $_POST["sexo"]);
$dataentrada = mysqli_real_escape_string($conectar, $_POST["dataentrada"]);
$se = mysqli_real_escape_string($conectar, $_POST["se"]);
$localate = mysqli_real_escape_string($conectar, $_POST["localate"]);
$rua = mysqli_real_escape_string($conectar, $_POST["rua"]);
$ruaoutros = mysqli_real_escape_string($conectar, $_POST["ruaoutros"]);
$num = mysqli_real_escape_string($conectar, $_POST["num"]);
$comp = mysqli_real_escape_string($conectar, $_POST["comp"]);
$tel = mysqli_real_escape_string($conectar, $_POST["tel"]);
$cep = mysqli_real_escape_string($conectar, $_POST["cep"]);
$log = mysqli_real_escape_string($conectar, $_POST["log"]);
$cidade = mysqli_real_escape_string($conectar, $_POST["cidade"]);
$bairro = mysqli_real_escape_string($conectar, $_POST["bairro"]);
$localvd = mysqli_real_escape_string($conectar, $_POST["localvd"]);
$suvis = mysqli_real_escape_string($conectar, $_POST["suvis"]);
$dataobito = mysqli_real_escape_string($conectar, $_POST["dataobito"]);
$latsv2 = mysqli_real_escape_string($conectar, $_POST["latitude"]);
$longsv2 = mysqli_real_escape_string($conectar, $_POST["longitude"]);
$tipo = mysqli_real_escape_string($conectar, $_POST["tipo"]);
$da = mysqli_real_escape_string($conectar, $_POST["da"]);
$idrua = mysqli_real_escape_string($conectar, $_POST["idrua"]);
$atual= mysqli_real_escape_string($conectar,$_POST["atual"]);

// SQL para localizar duplicatas
// select sinan, nome from sv2 group by sinan having count(*) > 1

# Verificando se tabela já tem id com sinan, agravo iguais que não seja tuberculose.
$sql_tuberculose = $conectar->query("SELECT id FROM sv2 WHERE sinan='$sinan' AND datanot='$datanot' AND agravo='TUBERCULOSE' AND localate='$localate' AND nome='$nome'");

# Verificando se tabela já tem id com sinan e doença iguais.
$sql_sv2_suvis = $conectar->query("SELECT id FROM sv2 WHERE sinan='$sinan' AND datanot='$datanot' AND protocolo='$protocolo' AND agravo='$agravo' AND nome='$nome' AND agravo<>'TUBERCULOSE'");

# Verificando se tabela já tem id com sinan e doença iguais.
$sql_sv2_covid = $conectar->query("SELECT id FROM sv2 WHERE protocolo='$protocolo' AND nome='$nome' AND agravo='COVID-19'");

# Verificando se tabela já tem id com sinan e doença iguais.
// $sql_sv2_covid = $conectar->query("SELECT id FROM sv2 WHERE protocolo='$protocolo' AND agravo='COVID-19'");

# Verificando se tabela já tem id com sinan e doença iguais.
// $sql_sv2_srag = $conectar->query("SELECT id FROM sv2 WHERE protocolo='$protocolo' AND agravo='SRAG'");


if ($sql_tuberculose->num_rows > 0) {
    include_once 'form-sv2-edit.php';
} elseif ($sql_sv2_suvis->num_rows > 0) {
    include_once 'form-sv2-edit.php';
} elseif ($sql_sv2_covid->num_rows > 0) {
    include_once 'form-sv2-edit.php';
} elseif ($tipo == 'outros') {if (!$conectar->query("INSERT INTO sv2 (sinan,protocolo,datanot,agravo,ocorrencia,nome,idade,sexo,dataentrada,se,localate,rua,num,comp,tel,cep,log,cidade,bairro,localvd,suvis,dataobito,latsv2,longsv2,da,usuariocad,criado,tipo,idrua) VALUES ('$sinan', '$protocolo','$datanot', '$agravo', '$ocorrencia', '$nome', '$idade', '$sexo', '$dataentrada','$se','$localate', '$ruaoutros', '$num', '$comp', '$tel', '$cep', '$log', '$cidade', '$bairro', '$localvd', '$suvis', '$dataobito' , '$latsv2' , '$longsv2' , '$da', '$usuariologin', NOW(), '$tipo','$idrua')")) die ('<br><br><div class="container theme-showcase" role="main" xmlns="http://www.w3.org/1999/html"><div class="row"><div class="col-md-12"><div class="form-group"><a href="javascript:history.back()" <button type=\'button\' class=\'btn btn-danger\' accesskey="V"><span class="glyphicon glyphicon-arrow-left"></span> <u>V</u>OLTAR</button></a><h4><strong><div class="alert alert-danger text-center" role="alert">ERROR:02 FALHA DE SICRONIZAÇÃO COM A TABELA !!! SE PERSISTIR CONTATE: sisdamjt@gmail.com</h4></strong></div></div></div>');
    include_once 'form-sv2-insert.php';
} elseif ($tipo == 'siva-outros') {if (!$conectar->query("INSERT INTO sv2 (sinan,protocolo,datanot,agravo,ocorrencia,nome,idade,sexo,dataentrada,se,localate,rua,num,comp,tel,cep,log,cidade,bairro,localvd,suvis,dataobito,latsv2,longsv2,da,usuariocad,criado,tipo,idrua) VALUES ('$sinan', '$protocolo','$datanot', '$agravo', '$ocorrencia', '$nome', '$idade', '$sexo', '$dataentrada','$se','$localate', '$ruaoutros', '$num', '$comp', '$tel', '$cep', '$log', '$cidade', '$bairro', '$localvd', '$suvis', '$dataobito' , '$latsv2' , '$longsv2' , '$da', '$usuariologin', NOW(), '$tipo','$idrua')")) die ('<br><br><div class="container theme-showcase" role="main" xmlns="http://www.w3.org/1999/html"><div class="row"><div class="col-md-12"><div class="form-group"><a href="javascript:history.back()" <button type=\'button\' class=\'btn btn-danger\' accesskey="V"><span class="glyphicon glyphicon-arrow-left"></span> <u>V</u>OLTAR</button></a><h4><strong><div class="alert alert-danger text-center" role="alert">ERROR:02 FALHA DE SICRONIZAÇÃO COM A TABELA !!! SE PERSISTIR CONTATE: sisdamjt@gmail.com</h4></strong></div></div></div>');
    include_once 'form-sv2-insert.php';
} else {if (!$conectar->query("INSERT INTO sv2 (sinan,protocolo,datanot,agravo,ocorrencia,nome,idade,sexo,dataentrada,se,localate,rua,num,comp,tel,cep,log,cidade,bairro,localvd,suvis,dataobito,latsv2,longsv2,da,usuariocad,criado,tipo,idrua) VALUES ('$sinan', '$protocolo','$datanot', '$agravo', '$ocorrencia', '$nome', '$idade', '$sexo', '$dataentrada','$se','$localate', '$rua', '$num', '$comp', '$tel', '$cep', '$log', '$cidade', '$bairro', '$localvd', '$suvis', '$dataobito' , '$latsv2' , '$longsv2' , '$da', '$usuariologin', NOW(), '$tipo','$idrua')")) die ('<br><br><div class="container theme-showcase" role="main" xmlns="http://www.w3.org/1999/html"><div class="row"><div class="col-md-12"><div class="form-group"><a href="javascript:history.back()" <button type=\'button\' class=\'btn btn-danger\' accesskey="V"><span class="glyphicon glyphicon-arrow-left"></span> <u>V</u>OLTAR</button></a><h4><strong><div class="alert alert-danger text-center" role="alert">ERROR:02 FALHA DE SICRONIZAÇÃO COM A TABELA !!! SE PERSISTIR CONTATE: sisdamjt@gmail.com</h4></strong></div></div></div>');
    include_once 'form-sv2-insert.php';}
?>
