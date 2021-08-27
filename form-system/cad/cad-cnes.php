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
                    <li class="active">Cadastrar Cnes</li>
                </ol>
                <button type="button" class="btn btn-success btn-labeled btn-lg btn-block"><span class="btn-label"><i
                                class="glyphicon glyphicon-plus-sign"></i></span>CADASTRAR CNES</button>
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
                <form class="form-horizontal" id="cad-cnes" method="POST" action="suvisjt.php?pag=proc-cad-cnes">
                    <div class="form-group">
                    </div>
                    </br>
                    <div class="form-group">
                        <label for="inputCnes" class="col-sm-3 control-label">CNES</label>
                        <div class="col-sm-2">
                            <input type="text" data-toggle="tooltip" title="O cnes deve ter 7 numeros" id="cnes"
                                   maxlength="7" placeholder="0000000" class="form-control" name="cnes" autofocus>
                        </div>
                    </div>
                    </br>

                    <div class="form-group">
                        <label for="inputEst" class="col-sm-3 control-label">ESTABELECIMENTO</label>
                        <div class="col-sm-6">
                            <input type="text" data-toggle="tooltip" title="Ex: Ama J Joamar" id="estabelecimento"
                                   class="form-control" placeholder="NOME DO ESTABELECIMENTO" name="estabelecimento"
                                   onchange="upperCaseF(this)">
                        </div>
                    </div>
                    </br></br></br>

                    <div class="form-group text-center">
                        <div class="col-sm-12">
                            <button type="submit" accesskey="G" style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                                echo 'display: none;';
                            } ?>" data-toggle="tooltip" title="GRAVAR OS DADOS" class="btn btn-labeled btn-success mb-2 mr-sm-4"><span
                                        class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span> <u>G</u>RAVAR
                            </button>
                            <a href='suvisjt.php?pag=list-cnes' role='button' data-toggle="tooltip" title="LISTAR REGISTROS" accesskey="L"
                                    class="btn btn-labeled btn-info mb-2 mr-sm-4"><span class="btn-label"><i
                                            class="glyphicon glyphicon-list"></i></span> <u>L</u>ISTAR</a>
                        </div>
                    </div>
                </form>
            </fieldset>
        </div>
    </div>
</div> <!-- /container -->

