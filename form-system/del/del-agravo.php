<?php
error_reporting(0);
include_once '../../locked/seguranca-admin.php';
?>

<?php

if ($conexao = $conectar->query($conectar)) die ('<div class="form-system-group"><a href="javascript:history.back()" <button type=\'button\' class=\'btn btn-danger\' accesskey="V"><span class="glyphicon glyphicon-arrow-left"></span> <u>V</u>OLTAR</button></a></div>><div class="alert alert-danger text-center" role="alert">Erro 01 : Falha ao conectar !!! Se persistir contate: sisdamjt@gmail.com</div>');

$id = $_GET["id"];
$cid = $_GET["cid"];
$tipo = $_GET["tipo"];
$agravo = $_GET["agravo"];

if (!$conectar->query("DELETE FROM agravo WHERE id = '$id'")) die ('<div class="form-system-group"><a href="javascript:history.back()" <button type=\'button\' class=\'btn btn-danger\' accesskey="V"><span class="glyphicon glyphicon-arrow-left"></span> <u>V</u>OLTAR</button></a></div><div class="alert alert-danger text-center" role="alert">Erro 02 : Falha de Sicronização com a Tabela !!! Se persistir contate: sisdamjt@gmail.com</div>');
$linhas = $conectar->affected_rows;

if ($conectar->affected_rows != 0) {
    header("Location: suvisjt.php?pag=list-agravo");
    $_SESSION['msgdel'] = "<div class='alert alert-success text-center'><strong>ID</strong> : $id - <strong>CID</strong> : $cid - <strong>TIPO</strong> : $tipo - <strong>AGRAVO</strong> : $agravo - <strong>APAGADO COM SUCESSO !!!</strong></div>"; ?>

<?php } else {
    $_SESSION['msgdelerro'] = "<div class='alert alert-danger text-center'><strong>ERRO AO APAGAR ID</strong> : $id - <strong>CID</strong> : $cid - <strong>TIPO</strong> : $tipo - <strong>AGRAVO</strong> : $agravo !!!<strong></div>";
    header("Location: suvisjt.php?pag=list-agravo"); ?>
<?php } ?>

<?php $conectar->close(); ?>
