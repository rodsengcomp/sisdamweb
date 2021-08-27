<?php
error_reporting(0);
include_once '../../locked/seguranca-admin.php';
?>

<?php

if ($conexao = $conectar->query($conectar)) die ('<div class="form-system-group"><a href="javascript:history.back()" <button type=\'button\' class=\'btn btn-danger\' accesskey="V"><span class="glyphicon glyphicon-arrow-left"></span> <u>V</u>OLTAR</button></a></div>><div class="alert alert-danger text-center" role="alert">Erro 01 : Falha ao conectar !!! Se persistir contate: sisdamjt@gmail.com</div>');

$id = $_GET["id"];
$datamemo = $_GET["datamemo"];
$localdestino = $_GET["localdestino"];
$tipodoc = $_GET["tipodoc"];
$descricaomemo = $_GET["descricaomemo"];
$nomememo = $_GET["nomememo"];


if (!$conectar->query("DELETE FROM memo WHERE id = '$id'")) die ('<div class="form-system-group"><a href="javascript:history.back()" <button type=\'button\' class=\'btn btn-danger\' accesskey="V"><span class="glyphicon glyphicon-arrow-left"></span> <u>V</u>OLTAR</button></a></div><div class="alert alert-danger text-center" role="alert">Erro 02 : Falha de Sicronização com a Tabela !!! Se persistir contate: sisdamjt@gmail.com</div>');
$linhas = $conectar->affected_rows;

if ($conectar->affected_rows != 0) {
    header("Location: suvisjt.php?pag=list-memo-oficio");
    $_SESSION['msgdel'] = "<div class='alert alert-success text-center'><strong>DATA</strong> : $datamemo - <strong>TIPO</strong> : $tipodoc - <strong>Nº</strong> : $id - <strong>DESTINO</strong> : $localdestino - <strong>ASSUNTO</strong> : $descricaomemo - <strong>NOME</strong> : $nomememo - <strong>APAGADO COM SUCESSO !!!</strong></div>"; ?>

<?php } else {
    $_SESSION['msgdelerro'] = "<div class='alert alert-danger text-center'><strong>ERRO AO APAGAR - DATA</strong> : $datamemo - <strong>TIPO</strong> : $tipodoc - <strong>Nº</strong> : $id - <strong>DESTINO</strong> : $localdestino - <strong>ASSUNTO</strong> : $descricaomemo - <strong>NOME</strong> : $nomememo !!!</div>";
    header("Location: suvisjt.php?pag=list-memo-oficio"); ?>
<?php } ?>

<?php $conectar->close(); ?>
