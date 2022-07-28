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
$id = mysqli_real_escape_string($conectar, $_POST["id"]);
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
$year = mysqli_real_escape_string($conectar, $_POST["year"]);

if($year == 'atual'):
    $sv2 = 'sv2';
    $list = 'list-sv2';
    $edit = '';
else:
    $sv2 = 'sv2_'.$year;
    $list = 'list-sv2-arquivo&year='.$year;
    $edit = '&year='.$year;
endif;

# Verificando se tabela já tem id com sinan, agravo iguais que não seja tuberculose.
$sql_tuberculose = $conectar->query("SELECT id FROM " . $sv2 . " WHERE sinan='" . $sinan . "' AND agravo='TUBERCULOSE' AND lixeira<>1 AND localate='" . $localate . "' AND id<>'" . $id . "'");

# Verificando se tabela já tem id com sinan e doença iguais.
# $sql_sv2_suvis = $conectar->query("SELECT id FROM sv2 WHERE sinan='$sinan' AND agravo='$agravo' AND agravo<>'TUBERCULOSE' AND nome='$nome' AND id<>'$id'");

# Verificando se tabela já tem id com sinan e doença iguais.
$sql_sv2_suvis = $conectar->query("SELECT id FROM " . $sv2 . " WHERE sinan='" . $sinan . "' AND protocolo='" . $protocolo . "' AND lixeira<>1 AND agravo='" . $agravo . "' AND nome='" . $nome . "' AND datanot='" . $datanot . "' AND agravo<>'TUBERCULOSE'  AND id<>'" . $id . "'");

?>


<?php
if ($sql_tuberculose->num_rows > 0) {
$_SESSION['msgerroredit'] = "<div class='alert alert-danger text-center'><strong>SINAN</strong> : $sinan - <strong>AGRAVO</strong> : $agravo - <strong>PROT. COV.</strong> : $protocolo - <strong>PACIENTE</strong> : $nome - <strong>NÃO EDITADO - MOTIVO : DUPLICIDADE</strong></div>";
header("Location: suvisjt.php?pag=edit-sv2-$tipo&id=$id.$edit");
    } elseif ($sql_sv2_suvis->num_rows > 0) {
        $_SESSION['msgerroredit'] = "<div class='alert alert-danger text-center'><strong>SINAN</strong> : $sinan - <strong>AGRAVO</strong> : $agravo - <strong>PROT. COV.</strong> : $protocolo - <strong>PACIENTE</strong> : $nome - <strong>NÃO EDITADO - MOTIVO : DUPLICIDADE</strong></div>";
            header("Location: suvisjt.php?pag=edit-sv2-$tipo&id=$id.$edit");
        } elseif ($tipo == 'outros'){ if(!$conectar->query("UPDATE " . $sv2 . " SET sinan = '" . $sinan . "',protocolo = '" . $protocolo . "', datanot = '" . $datanot . "', agravo = '" . $agravo . "', ocorrencia = '" . $ocorrencia . "', nome = '" . $nome . "', idade = '" . $idade . "', sexo = '" . $sexo . "', dataentrada = '" . $dataentrada . "', se = '" . $se . "', localate = '" . $localate . "', rua = '" . $ruaoutros . "', num = '" . $num . "', comp = '" . $comp . "', tel = '" . $tel . "', cep = '" . $cep . "', log = '" . $log . "', cidade = '" . $cidade . "' , bairro = '" . $bairro . "', localvd = '" . $localvd . "', suvis = '" . $suvis . "', dataobito='" . $dataobito . "', latsv2 = '" . $latsv2 . "' , longsv2 = '" . $longsv2 . "' ,usuarioalt = '" . $usuariologin . "', alterado = NOW(), tipo = '" . $tipo . "', da = '" . $da . "', idrua = '" . $idrua . "' WHERE id = '" . $id . "'")) die ('<br><br><div class="container theme-showcase" role="main" xmlns="http://www.w3.org/1999/html"><div class="row"><div class="col-md-12"><div class="form-group"><a href="javascript:history.back()" <button type=\'button\' class=\'btn btn-danger\' accesskey="V"><span class="glyphicon glyphicon-arrow-left"></span> <u>V</u>OLTAR</button></a><h4><strong><div class="alert alert-danger text-center" role="alert">ERROR:02 FALHA DE SICRONIZAÇÃO COM A TABELA !!! SE PERSISTIR CONTATE: sisdamjt@gmail.com</h4></strong></div></div></div>');
            $_SESSION['msgedit'] = "<div class='alert alert-success text-center'><strong>SINAN</strong> : $sinan - <strong>AGRAVO</strong> : $agravo - <strong>PACIENTE</strong> : $nome - <strong>EDITADO COM SUCESSO !!!</strong></div>";
                header("Location: suvisjt.php?pag=$list");
    } elseif ($tipo == 'siva-outros'){ if(!$conectar->query("UPDATE " . $sv2 . " SET sinan = '" . $sinan . "', protocolo = '" . $protocolo . "', datanot = '" . $datanot . "', agravo = '" . $agravo . "', ocorrencia = '" . $ocorrencia . "', nome = '" . $nome . "', idade = '" . $idade . "', sexo = '" . $sexo . "', dataentrada = '" . $dataentrada . "', se = '" . $se . "', localate = '" . $localate . "', rua = '" . $ruaoutros . "', num = '" . $num . "', comp = '" . $comp . "', tel = '" . $tel . "', cep = '" . $cep . "', log = '" . $log . "', cidade = '" . $cidade . "' , bairro = '" . $bairro . "', localvd = '" . $localvd . "', suvis = '" . $suvis . "', dataobito='" . $dataobito . "', latsv2 = '" . $latsv2 . "' , longsv2 = '" . $longsv2 . "' ,usuarioalt = '" . $usuariologin . "', alterado = NOW(), tipo = '" . $tipo . "', da = '" . $da . "', idrua = '" . $idrua . "' WHERE id = '" . $id . "'")) die ('<br><br><div class="container theme-showcase" role="main" xmlns="http://www.w3.org/1999/html"><div class="row"><div class="col-md-12"><div class="form-group"><a href="javascript:history.back()" <button type=\'button\' class=\'btn btn-danger\' accesskey="V"><span class="glyphicon glyphicon-arrow-left"></span> <u>V</u>OLTAR</button></a><h4><strong><div class="alert alert-danger text-center" role="alert">ERROR:02 FALHA DE SICRONIZAÇÃO COM A TABELA !!! SE PERSISTIR CONTATE: sisdamjt@gmail.com</h4></strong></div></div></div>');
        $_SESSION['msgedit'] = "<div class='alert alert-success text-center'><strong>SINAN</strong> : $sinan - <strong>AGRAVO</strong> : $agravo - <strong>PACIENTE</strong> : $nome - <strong>EDITADO COM SUCESSO !!!</strong></div>";
            header("Location: suvisjt.php?pag=$list");
} else {if (!$conectar->query("UPDATE " . $sv2 . " SET sinan = '" . $sinan . "', protocolo = '" . $protocolo . "', datanot = '" . $datanot . "', agravo = '" . $agravo . "', ocorrencia = '" . $ocorrencia . "', nome = '" . $nome . "', idade = '" . $idade . "', sexo = '" . $sexo . "', dataentrada = '" . $dataentrada . "', se = '" . $se . "', localate = '" . $localate . "', rua = '" . $rua . "', num = '" . $num . "', comp = '" . $comp . "', tel = '" . $tel . "', cep = '" . $cep . "', log = '" . $log . "', cidade = '" . $cidade . "' , bairro = '" . $bairro . "', localvd = '" . $localvd . "', suvis = '" . $suvis . "', dataobito='" . $dataobito . "', latsv2 = '" . $latsv2 . "' , longsv2 = '" . $longsv2 . "' ,usuarioalt = '" . $usuariologin . "', alterado = NOW(), tipo = '" . $tipo . "', da = '" . $da . "', idrua = '" . $idrua . "' WHERE id = '" . $id . "'")) die ('<br><br><div class="container theme-showcase" role="main" xmlns="http://www.w3.org/1999/html"><div class="row"><div class="col-md-12"><div class="form-group"><a href="javascript:history.back()" <button type=\'button\' class=\'btn btn-danger\' accesskey="V"><span class="glyphicon glyphicon-arrow-left"></span> <u>V</u>OLTAR</button></a><h4><strong><div class="alert alert-danger text-center" role="alert">ERROR:02 FALHA DE SICRONIZAÇÃO COM A TABELA !!! SE PERSISTIR CONTATE: sisdamjt@gmail.com</h4></strong></div></div></div>');
    $_SESSION['msgedit'] = "<div class='alert alert-success text-center'><strong>SINAN</strong> : $sinan - <strong>AGRAVO</strong> : $agravo - <strong>PROT. COV.</strong> : $protocolo - <strong>PACIENTE</strong> : $nome - <strong>EDITADO COM SUCESSO !!!</strong></div>";
        header("Location: suvisjt.php?pag=$list");}
?>


