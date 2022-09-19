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
                    <li class="active">Cadastrar Medicamento Esporotricose Animal</li>
                </ol>
                <button type="button" class="btn btn-success btn-labeled btn-lg btn-block"><span class="btn-label"><i
                                class="fa fa-pills"></i></span>CADASTRAR MEDICAMENTO ESPOROTRICOSE ANIMAL</button>
            </div>
        </div>
    </div>
    <!-- Fim da Página de Título -->

    <div class="form-group text-center">
        <div class="alert alert-danger text-center" style="<?php if ($_SESSION['usuarioNivelAcesso'] < 3) {
            echo 'display: none;';
        } ?>" role="alert"><strong>SEU NÍVEL DE USUÁRIO NÃO PERMITE EDITAR !!!</strong></div>
    </div>

    <div class="form-group text-center">
        <div class="alert alert-danger text-center" style="<?php if ($_SESSION['usuarioNivelAcesso'] <> "") {
            echo 'display:none';
        } ?>" role="alert"><strong>PARA EDITAR É NECESSARIO FAZER O LOGIN!!!</strong></div>
    </div>

    <div class="form-group text-center">
        <?php
        if (isset($_SESSION['msgerrorcad'])) {
            echo $_SESSION['msgerrorcad'];
            unset($_SESSION['msgerrorcad']);
        }
        ?>
    </div>

    <div class="row">

        <div class="col-md-12">
            <fieldset <?php
            if ($_SESSION['usuarioNivelAcesso'] == "") {
                echo 'disabled';

            } ?>>
                <form class="form-horizontal" id="cad-esporo-animal" method="POST" action="suvisjt.php?pag=proc-cad-esporo-animal">

                    <div class="form-group">
                        <label for="inputDataEntrada" class="col-sm-1 control-label">ENTRADA</label>
                        <div class="col-sm-2"><input class="form-control" disabled value="<?=$dtent?>"></div>

                        <label for="inputDataEntrada" class="col-sm-1 control-label">MEDICAMEN.</label>
                        <div class="col-sm-2"><input class="form-control" disabled value="<?=$med?>"></div>

                        <label for="inputDataEntrada" class="col-sm-1 control-label">DOSE/MG</label>
                        <div class="col-sm-1"><input class="form-control" disabled value="<?=$dsg1?>"></div>

                        <label for="inputDataEntrada" class="col-sm-1 control-label">QTD:</label>
                        <div class="col-sm-1"><input class="form-control" disabled value="<?=$qtd1?>"></div>

                    </div>

                    <input type="hidden" name="acao" value="cadastro-medicamento">

                    </br></br></br>

                    <div class="form-group text-center">
                        <div class="col-sm-12">
                            <button type="submit" tabindex="17" accesskey="G" style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                                echo 'display: none;';
                            } ?>" data-toggle="tooltip" title="GRAVAR OS DADOS" class="btn btn-labeled btn-success mb-2 mr-sm-4"><span
                                        class="btn-label"><i class="fa fa-floppy-o"></i></span> <u>G</u>RAVAR
                            </button>
                            <a href='suvisjt.php?pag=listar-medicamentos-esporotricose-animal' role='button' tabindex="18" data-toggle="tooltip" title="LISTAR REGISTROS" accesskey="L"
                               class="btn btn-labeled btn-info mb-2 mr-sm-4"><span class="btn-label"><i
                                            class="fa fa-list-alt"></i></span> <u>L</u>ISTAR</a>
                            <a target="_blank"
                               href='http://www.buscacep.correios.com.br/sistemas/buscacep/buscaCepEndereco.cfm'
                               role='button' tabindex="19" data-toggle="tooltip" title="BUSCA CEP CORREIOS" accesskey="S"
                               class="btn btn-labeled btn-default mb-2 mr-sm-4"><span class="btn-label"><img
                                            src="imagens/correios.png" width="20"/></span></span> BUSCA CEP</a>
                        </div>
                    </div>
                </form>
            </fieldset>
        </div>
    </div> <!-- /container -->

