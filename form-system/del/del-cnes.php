<?php
error_reporting(0);
include_once '../../locked/seguranca-admin.php';
?>

<?php

if ($conexao = $conectar->query($conectar)) die ('<div class="form-system-group"><a href="javascript:history.back()" <button type=\'button\' class=\'btn btn-danger\' accesskey="V"><span class="glyphicon glyphicon-arrow-left"></span> <u>V</u>OLTAR</button></a></div>><div class="alert alert-danger text-center" role="alert">Erro 01 : Falha ao conectar !!! Se persistir contate: sisdamjt@gmail.com</div>');

$id = $_GET["id"];
$cnes = $_GET["cnes"];
$estabelecimento = $_GET["estabelecimento"];

if (!$conectar->query("DELETE FROM cnes WHERE id = '$id'")) die ('<div class="form-system-group"><a href="javascript:history.back()" <button type=\'button\' class=\'btn btn-danger\' accesskey="V"><span class="glyphicon glyphicon-arrow-left"></span> <u>V</u>OLTAR</button></a></div><div class="alert alert-danger text-center" role="alert">Erro 02 : Falha de Sicronização com a Tabela !!! Se persistir contate: sisdamjt@gmail.com</div>');
$linhas = $conectar->affected_rows;

if ($conectar->affected_rows != 0) {
    header("Location: suvisjt.php?pag=list-cnes");
    $_SESSION['msgdel'] = "<div class='alert alert-success text-center'><strong>ID</strong> : $id - <strong>CNES</strong> : $cnes - <strong>ESTABELECIMENTO</strong> : $estabelecimento - <strong>APAGADO COM SUCESSO !!!</strong></div>"; ?>

<?php } else {
    $_SESSION['msgdelerro'] = "<div class='alert alert-danger text-center'><strong>ERRO AO APAGAR ID</strong> : $id - <strong>CNES</strong> : $cnes - <strong>ESTABELECIMENTO</strong> : $estabelecimento !!!</div>";
    header("Location: suvisjt.php?pag=list-cnes"); ?>
<?php } ?>

<?php $conectar->close(); ?>
