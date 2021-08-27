<?php
/**
 * Created by Rodolfo Romaioli Ribeiro de Jesus.
 * User: D788796
 * Date: 09/06/2017
 * Time: 08:39
 */
error_reporting(0);
include_once '../../seguranca.php';
include_once '../../conecta.php';

$id = $_GET['id'];

$consulta_contato = "SELECT * FROM contatos WHERE id='$id'";
$resultado_contato = $conectar->query($consulta_contato);
$editar_contato = mysqli_fetch_assoc($resultado_contato);

mysqli_close($conectar);

?>

<div class="container theme-showcase" role="main">
    <div class="page-header text-center">
        <h3><strong>EDITAR CONTATO - SISDAM WEB</strong></h3>
    </div>

    <div class="row">
        <div class="col-md-12">
            <form class="form-horizontal" id="edicao_contato" method="POST" action="formulario.php?link=70">

                <div class="form-group">
                    <label for="inputNome" class="col-sm-3 control-label">NOME</label>
                    <div class="col-sm-3">
                        <input type="text" data-toggle="tooltip" title="Ex: Rodolfo, Wallace ..." required autofocus
                               class="form-control" style="<?php if ($_SESSION['usuarioNivelAcesso'] > 2) {
                            echo 'display: none;';
                        } ?>" name="nome" onchange="upperCaseF(this)" placeholder="JOAO, MARIA ..."
                               value="<?php echo $editar_contato['nome']; ?>">
                    </div>
                    <label for="inputSobreNome" class="col-sm-1 control-label">SOBRENOME</label>
                    <div class="col-sm-3">
                        <input type="text" data-toggle="tooltip" title="Ex: Da Silva, Santos ..." class="form-control"
                               style="<?php if ($_SESSION['usuarioNivelAcesso'] > 2) {
                                   echo 'display: none;';
                               } ?>" name="sobrenome" onchange="upperCaseF(this)" placeholder="DA SILVA, ROMAIOLI ..."
                               value="<?php echo $editar_contato['sobrenome']; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputPrefixo" class="col-sm-3 control-label">PREFIXO</label>
                    <div class="col-sm-3">
                        <input type="text" data-toggle="tooltip" title="Ex: Biologo, Dra, Agente ..."
                               class="form-control" style="<?php if ($_SESSION['usuarioNivelAcesso'] > 2) {
                            echo 'display: none;';
                        } ?>" name="prefixo" onchange="upperCaseF(this)" placeholder="BIÓLOGO, DRA ..."
                               value="<?php echo $editar_contato['prefixo']; ?>">
                    </div>
                    <label for="inputSufixo" class="col-sm-1 control-label">SUFIXO</label>
                    <div class="col-sm-3">
                        <input type="text" data-toggle="tooltip" title="Ex: Suvis, Covisa ..." class="form-control"
                               style="<?php if ($_SESSION['usuarioNivelAcesso'] > 2) {
                                   echo 'display: none;';
                               } ?>" name="sufixo" onchange="upperCaseF(this)" placeholder="SUVIS, COVISA, AGENTE ...."
                               value="<?php echo $editar_contato['sufixo']; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputTelefone" class="col-sm-3 control-label">TEL 1</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" data-toggle="tooltip" required title="Ex:(00)00000000"
                               name="tel1" style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                            echo 'display: none;';
                        } ?>" id="tel1" maxlength="15" placeholder="(11)99999-9999"
                               value="<?php echo $editar_contato['tel1']; ?>">
                    </div>
                    <label for="inputTelefone" class="col-sm-1 control-label">TEL 2</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" data-toggle="tooltip" title="Ex:(00)00000000"
                               name="tel2" style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                            echo 'display: none;';
                        } ?>" id="tel2" maxlength="15" placeholder="(11)99999-9999"
                               value="<?php echo $editar_contato['tel2']; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail" class="col-sm-3 control-label">EMAIL</label>
                    <div class="col-sm-3">
                        <input type="email" title="Insira um endereço de e-mail válido" class="form-control"
                               style="<?php if ($_SESSION['usuarioNivelAcesso'] > 2) {
                                   echo 'display: none;';
                               } ?>" name="email" placeholder="exemplo@gmail.com"
                               value="<?php echo $editar_contato['contato']; ?>">
                    </div>

                    <label for="inputObs" class="col-sm-1 control-label">OBS</label>
                    <div class="col-sm-3">
                        <input type="text" data-toggle="tooltip" title="Ex: blá blá blá ..." class="form-control"
                               style="<?php if ($_SESSION['usuarioNivelAcesso'] > 2) {
                                   echo 'display: none;';
                               } ?>" name="obs" onchange="upperCaseF(this)" placeholder="BLÁ BLÁ BLÁ ..."
                               value="<?php echo $editar_contato['obs']; ?>">
                    </div>
                </div>

                <div class="form-group text-center">
                    <input type="hidden" name="id" value="<?php echo $editar_contato['id']; ?>">
                    <button type="submit" accesskey="G" style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                        echo 'display: none;';
                    } ?>" data-toggle="tooltip" title="GRAVAR OS DADOS" class="btn btn-success"><span
                                class="glyphicon glyphicon-floppy-disk"></span> <u>G</u>RAVAR
                    </button>&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href='formulario.php?link=66'
                    <button type='button' data-toggle="tooltip" title="LISTAR REGISTROS" accesskey="L"
                            class="btn btn-primary"><span class="glyphicon glyphicon-list"></span> <u>L</u>ISTAR
                    </button>
                    </a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href='formulario.php?link=1'
                    <button type='button' style="<?php if ($_SESSION['usuarioNivelAcesso'] > 2) {
                        echo 'display: none;';
                    } ?>" data-toggle="tooltip" title="SAIR DO FORMULÁRIO" accesskey="S" class="btn btn-danger"><span
                                class="glyphicon glyphicon-remove"></span> <u>S</u>AIR
                    </button>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div> <!-- /container -->

