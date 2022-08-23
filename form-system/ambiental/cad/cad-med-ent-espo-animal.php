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
        if (isset($_SESSION['msgerroredit'])) {
            echo $_SESSION['msgerroredit'];
            unset($_SESSION['msgerroredit']);
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
                        <div class="col-sm-2"><input autofocus tabindex="1" type="text" class="form-control" data-toggle="tooltip"
                                                     title="Data da 1ª entrega" name="dataentrada" id="dataentcad" placeholder="00/00/0000"></div>

                        <label for="inputDataEntrada" class="col-sm-1 control-label">MEDICAMEN.</label>
                        <div class="col-sm-2"><input type="text" tabindex="16" data-toggle="tooltip" title="Nome do Medicamento"
                                                     class="form-control medicamento" name="medicamento" placeholder="ITRACONAZOL"></div>

                        <label for="inputDataEntrada" class="col-sm-1 control-label">DOSE/MG</label>
                        <div class="col-sm-1"><input type="number" tabindex="17" data-toggle="tooltip" title="Nome do Medicamento" maxlength="5"
                                                     class="form-control" name="dsg" placeholder="100"></div>

                        <label for="inputDataEntrada" class="col-sm-1 control-label">QTD:</label>

                        <div class="col-sm-1"><input type="number" tabindex="20" data-toggle="tooltip" title="Quantidade de comprimidos" maxlength="5"
                                                     class="form-control" name="qtd1" placeholder="000"></div>

                    </div>

                    <input type="hidden" name="acao" value="cadastro-medicamento">

                </br></br></br>

                <div class="form-group text-center">
                    <div class="col-sm-12">
                        <input type="hidden" name="id" value="<?php echo $editar_esp_an['id_esp']; ?>">
                        <button type="submit" tabindex="17" accesskey="G" style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                            echo 'display: none;';
                        } ?>" data-toggle="tooltip" title="GRAVAR OS DADOS" class="btn btn-labeled btn-success mb-2 mr-sm-4"><span
                                    class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span> <u>G</u>RAVAR
                        </button>
                        <a href='suvisjt.php?pag=listar-medicamentos-esporotricose-animal' role='button' tabindex="18" data-toggle="tooltip" title="LISTAR REGISTROS" accesskey="L"
                           class="btn btn-labeled btn-info mb-2 mr-sm-4"><span class="btn-label"><i
                                        class="glyphicon glyphicon-list"></i></span> <u>L</u>ISTAR</a>
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

