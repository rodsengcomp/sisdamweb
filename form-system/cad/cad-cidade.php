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
                    <li class="active">Cadastrar Cidade</li>
                </ol>
                <button type="button" class="btn btn-success btn-labeled btn-lg btn-block"><span class="btn-label"><i
                                class="glyphicon glyphicon-plus-sign"></i></span>CADASTRAR CIDADE</button>
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
                <form class="form-horizontal" id="cad-cidade" method="POST" action="suvisjt.php?pag=proc-cad-cidade">

                    <div class="form-group">
                    </div>
                    </br>

                    <div class="form-group">
                        <label for="inputCodigo" class="col-sm-2 control-label">CODIGO</label>
                        <div class="col-sm-2">
                            <input type="text" data-toggle="tooltip" title="O código deve ter 6 numeros" id="codigo"
                                   maxlength="6" placeholder="000000" class="form-control" name="codigo" autofocus>
                        </div>
                        <label for="inputLat" class="col-sm-1 control-label">LAT</label>
                        <div class="col-sm-2">
                            <input type="text" data-toggle="tooltip" title="1234567890 , e -" id="latitude"
                                   maxlength="14" placeholder="-19,15215496" class="form-control" name="latitude">
                        </div>
                        <label for="inputLong" class="col-sm-1 control-label">LONG</label>
                        <div class="col-sm-2">
                            <input type="text" data-toggle="tooltip" title="1234567890 , e -" id="longitude"
                                   maxlength="14" placeholder="-45,45573879" class="form-control" name="longitude">
                        </div>
                    </div>
                    </br>

                    <div class="form-group">
                        <label for="inputCidade" class="col-sm-2 control-label">CIDADE</label>
                        <div class="col-sm-8">
                            <input type="text" data-toggle="tooltip" title="Ex: Sao Paulo" id="cidade"
                                   class="form-control" placeholder="NOME DA CIDADE" name="cidade"
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
                            <a href='suvisjt.php?pag=list-cidade' role='button' data-toggle="tooltip" title="LISTAR REGISTROS" accesskey="L"
                                    class="btn btn-labeled btn-info mb-2 mr-sm-4"><span class="btn-label"><i
                                            class="glyphicon glyphicon-list"></i></span> <u>L</u>ISTAR</a>
                        </div>
                    </div>
                </form>
            </fieldset>
        </div>
    </div>
