<?php
error_reporting(0);
include_once '../../locked/seguranca.php';
include_once '../../conecta.php';
?>

<div class="container theme-showcase" role="main" xmlns="http://www.w3.org/1999/html">
    <!-- Página de Título -->
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <ol class="breadcrumb">
                    <li><i class="fa fa-database"></i> <a href="suvisjt.php">Sisdam Web</a></li>
                    <li class="active">Cadastrar Agravo</li>
                </ol>
                <button type="button" class="btn btn-success btn-labeled btn-lg btn-block"><span class="btn-label"><i
                                class="glyphicon glyphicon-plus-sign"></i></span>CADASTRAR AGRAVO</button>
            </div>
        </div>
    </div>
    <!-- Fim da Página de Título -->

    <div class="form-group text-center">
        <div class="alert alert-danger text-center" style="<?php if ($_SESSION['usuarioNivelAcesso'] < 3) {
            echo 'display: none;';
        } ?>" role="alert"><strong>SEU NÍVEL DE USUÁRIO NÃO PERMITE CADASTRAR !!!</strong></div>
    </div>

    <div class="form-group text-center">
        <div class="alert alert-danger text-center" style="<?php if ($_SESSION['usuarioNivelAcesso'] <> "") {
            echo 'display:none';
        } ?>" role="alert"><strong>PARA CADASTRAR É NECESSARIO FAZER O LOGIN!!!</strong></div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <fieldset <?php if ($_SESSION['usuarioNivelAcesso'] == "") {
                echo 'disabled';
            } ?>>
                <form class="form-horizontal" id="cad-agravo" method="POST" action="suvisjt.php?pag=proc-cad-agravo">

                    <div class="form-group">
                        <label for="inputCid" class="col-sm-3 control-label">CID-10</label>
                        <div class="col-sm-2">
                            <input type="text" id="cid" class="form-control" value="NULL" name="cid" autofocus>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputTipoDoenca" class="col-sm-3 control-label">TIPO</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control tipoagravo" data-toggle="tooltip" id="tipoagravo"
                                   title="Ex: Dengue , Tuberculose ..." name="tipoagravo" placeholder="TIPO DO AGRAVO"
                                   onchange="upperCaseF(this)">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputAgravo" class="col-sm-3 control-label">AGRAVO</label>
                        <div class="col-sm-5">
                            <input type="text" data-toggle="tooltip" title="Ex: TUBERCULOSE" id="agravo"
                                   class="form-control" placeholder="NOME DO AGRAVO" name="agravo"
                                   onchange="upperCaseF(this)">
                        </div>
                    </div>
                    </br></br>

                    <div class="form-group text-center">
                        <div class="col-sm-12">
                            <button type="submit" accesskey="G" style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                                echo 'display: none;';
                            } ?>" data-toggle="tooltip" title="GRAVAR OS DADOS" class="btn btn-labeled btn-success mb-2 mr-sm-4"><span
                                        class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span> <u>G</u>RAVAR</button>
                            <a href='suvisjt.php?pag=list-agravo' role='button' data-toggle="tooltip" title="LISTAR REGISTROS" accesskey="L"
                                    class="btn btn-labeled btn-info mb-2 mr-sm-4"><span class="btn-label"><i
                                            class="glyphicon glyphicon-list"></i></span> <u>L</u>ISTAR</a>
                        </div>
                    </div>
                </form>
            </fieldset>
        </div>
    </div>
</div> <!-- /container -->

