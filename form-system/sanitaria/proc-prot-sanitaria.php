<?php
/* Este projeto é desenvolvido na Suvis Jaçanã-Tremembé com iniciativa dos colaboradores da Unidade
 * Código desenvolvido por Rodolfo Romaioli Ribeiro de Jesus - rodolfo.romaioli@gmail.com
 * Sisdam Web - 2.0 - 2017 - Todos os direitos reservados
 */
error_reporting(0);
include_once '../../locked/seguranca.php';
include_once '../../conecta.php';

if ($conexao = $conectar->query($conectar)) die ('<br><br><div class="container theme-showcase" role="main" xmlns="http://www.w3.org/1999/html"><div class="row"><div class="col-md-12"><div class="form-group"><a href="javascript:history.back()" <button type=\'button\' class=\'btn btn-danger\' accesskey="V"><span class="glyphicon glyphicon-arrow-left"></span> <u>V</u>OLTAR</button></a><h4><strong><div class="alert alert-danger text-center" role="alert">ERROR : 01 FALHA AO CONECTAR !!! SE PERSISTIR CONTATE: sisdamjt@gmail.com</h4></strong></div></div></div>');

#Recolhendo os dados do formulário
$id = mysqli_real_escape_string($conectar, $_POST['id']);
$nome = mysqli_real_escape_string($conectar, $_POST['nome']);
$atividade = mysqli_real_escape_string($conectar, $_POST['atividade']);
$num_documento = mysqli_real_escape_string($conectar, $_POST['ndoc']);
$tipo = mysqli_real_escape_string($conectar, $_POST['tipo']);
$datent = mysqli_real_escape_string($conectar, $_POST['datent']);
$datprazo = mysqli_real_escape_string($conectar, $_POST['datprazo']);
$datultmov = mysqli_real_escape_string($conectar, $_POST['datultmov']);
$datarq = mysqli_real_escape_string($conectar, $_POST['datarq']);
$datsai = mysqli_real_escape_string($conectar, $_POST['datsai']);
$orgao = mysqli_real_escape_string($conectar, $_POST['orgao']);
$tecnico = mysqli_real_escape_string($conectar, $_POST['tecnico']);
$formulario = mysqli_real_escape_string($conectar, $_POST['formulario']);
$inspsivisa = mysqli_real_escape_string($conectar, $_POST['inspsivisa']);
$observacao = mysqli_real_escape_string($conectar, $_POST["observacao"]);

$dataentrada = date("Y-m-d",strtotime(str_replace('/', '-', $datent)));
$dataprazo = date("Y-m-d",strtotime(str_replace('/', '-', $datprazo)));
$dataultmov = date("Y-m-d",strtotime(str_replace('/', '-', $datultmov)));
$datarquivo = date("Y-m-d",strtotime(str_replace('/', '-', $datarq)));
$datasaida = date("Y-m-d",strtotime(str_replace('/', '-', $datsai)));

//Se conectando com o Banco de Dados e tratando possível erro de conexão ...
if ($conexao = $conectar->query($conectar)) die ('<div class="form-group"><a href="javascript:history.back()" <button type=\'button\' class=\'btn btn-danger\' accesskey="V"><span class="glyphicon glyphicon-arrow-left"></span> <u>V</u>OLTAR</button></a><h4><strong><div class="alert alert-danger text-center" role="alert">ERROR : 01 FALHA AO CONECTAR !!! SE PERSISTIR CONTATE: sisdamjt@gmail.com</h4></strong></div>');

# Verificando se tabela já tem id com sinan e doença iguais.
$sql_cadastro = $conectar->query("SELECT id FROM adm_sanitaria WHERE nome_razao_social='$nome' AND num_documento='$num_documento' AND tecnico='$tecnico'");

# Verificando se tabela já tem id com sinan e doença iguais.
$sql_edicao = $conectar->query("SELECT id FROM adm_sanitaria WHERE nome_razao_social='$nome' AND num_documento='$num_documento' AND tecnico='$tecnico' AND id<>'$id'");

if ($formulario == 'CADASTRO') {
if ($sql_cadastro->num_rows > 0){$_SESSION['msgedit'] = "<div class='alert alert-danger text-center'><strong>NOME:</strong> $nome <strong>ATIVIDADE:</strong> $atividade <strong>Nº:</strong> $num_documento <strong>TIPO:</strong> $tipo - <strong>NÃO CADASTRADO - DUPLICIDADE!!!</strong></div>";
    header("Location: suvisjt.php?pag=cad-prot-sanitaria");
}else {if (!$conectar->query("INSERT INTO `adm_sanitaria`(`nome_razao_social`, `atividade`, `num_documento`, `tipo`, `data_entrada`, `prazo`,`inspsivisa` , `data_ult_mov_proc`,`data_arquivo`, `saida`, `orgao`, `tecnico`,`observacao`,`usuario_cad`, `data_cad`) VALUES ('$nome', '$atividade', '$num_documento', '$tipo', '$dataentrada', '$dataprazo', '$inspsivisa','$dataultmov', '$datarquivo', '$datasaida', '$orgao', '$tecnico', '$observacao','$usuariologin', NOW())"))
    die ('<br><br><div class="container theme-showcase" role="main" xmlns="http://www.w3.org/1999/html"><div class="row"><div class="col-md-12"><div class="form-group"><a href="javascript:history.back()" <button type=\'button\' class=\'btn btn-danger\' accesskey="V"><span class="glyphicon glyphicon-arrow-left"></span> <u>V</u>OLTAR</button></a><h4><strong><div class="alert alert-danger text-center" role="alert">ERROR:02 FALHA DE SICRONIZAÇÃO COM A TABELA !!! SE PERSISTIR CONTATE: sisdamjt@gmail.com</h4></strong></div></div></div>');
    $_SESSION['msgedit'] = "<div class='alert alert-success text-center'><strong>NOME:</strong> $nome <strong>ATIVIDADE:</strong> $atividade <strong>Nº:</strong> $num_documento <strong>TIPO:</strong> $tipo - <strong>INSERIDO COM SUCESSO!!!</strong></div>";
    header("Location: suvisjt.php?pag=cad-prot-sanitaria");}
}elseif ($sql_edicao->num_rows > 0) {$_SESSION['msgedit'] = "<div class='alert alert-success text-center'><strong>NOME:</strong> $nome <strong>ATIVIDADE:</strong> $atividade <strong>Nº:</strong> $num_documento <strong>TIPO:</strong> $tipo - <strong>NÃO EDITADO - DUPLICIDADE!!!</strong></div>";
    header("Location: suvisjt.php?pag=edit-prot-sanitaria");
    }else {if (!$conectar->query("UPDATE adm_sanitaria SET nome_razao_social='$nome', atividade='$atividade', num_documento='$num_documento', tipo='$tipo', data_entrada='$dataentrada', prazo='$dataprazo', inspsivisa='$inspsivisa',data_ult_mov_proc='$dataultmov',data_arquivo='$datarquivo', saida='$datasaida', orgao='$orgao', tecnico='$tecnico', observacao='$observacao', usuario_edit='$usuariologin', data_edit=NOW() WHERE id='$id'"))
    die ('<br><br><div class="container theme-showcase" role="main" xmlns="http://www.w3.org/1999/html"><div class="row"><div class="col-md-12"><div class="form-group"><a href="javascript:history.back()" <button type=\'button\' class=\'btn btn-danger\' accesskey="V"><span class="glyphicon glyphicon-arrow-left"></span> <u>V</u>OLTAR</button></a><h4><strong><div class="alert alert-danger text-center" role="alert">ERROR:02 FALHA DE SICRONIZAÇÃO COM A TABELA !!! SE PERSISTIR CONTATE: sisdamjt@gmail.com</h4></strong></div></div></div>');
    $_SESSION['msgedit'] = "<div class='alert alert-success text-center'><strong><strong>NOME:</strong> $nome <strong>ATIVIDADE:</strong> $atividade <strong>Nº:</strong> $num_documento <strong>TIPO:</strong> $tipo - EDITADO COM SUCESSO!!!</strong></div>";
    header("Location: suvisjt.php?pag=list-adm-sanitaria");
        }
?>
