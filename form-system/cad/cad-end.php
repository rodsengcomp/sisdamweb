<?php
error_reporting(0);
include_once '../../locked/seguranca.php';
include_once '../../conecta.php';
?>

<style>
    #mapcad {
        width: 1140px;
        height: 400px;
        border: 10px solid #ccc;;
        margin-bottom: 20px;
    }

    #apresentacao {
        width: 1140px;
        margin: 1% auto;
        overflow: hidden;
    }

    #searchInput {
        background-color: #fff;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 50%;
    }
</style>

<div class="container theme-showcase" role="main" xmlns="http://www.w3.org/1999/html">

    <!-- Pagina de Titulo -->
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">

                <button type="button" class="btn btn-success btn-labeled btn-lg btn-block"><span class="btn-label"><i
                                class="glyphicon glyphicon-plus-sign"></i></span>CADASTRAR ENDEREÇO</button>
            </div>
        </div>
    </div>
    <!-- Fim da Pagina de Titulo -->

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
                <form class="form-horizontal" id="cad-end" method="POST" action="suvisjt.php?pag=proc-cad-end">

                    <div class="form-group" id="apresentacao">
                        <input id="searchInput" style="margin-top: 10px;" class="form-control" type="text"
                               name="ruagoogle" placeholder="Digite o local">
                        <div id="mapcad"></div>
                    </div>

                    <div class="form-group">
                        <label for="inputDa" class="col-sm-1 control-label">DA</label>
                        <div class="col-sm-1">
                            <input type="text" id="da" autofocus data-toggle="tooltip" title="Ex: 38" maxlength="2"
                                   class="form-control da" name="da" placeholder="00">
                        </div>

                        <label for="inputSetor" class="col-sm-1 control-label">SETOR</label>
                        <div class="col-sm-1">
                            <input type="text" data-toggle="tooltip" title="Ex: 3838" id="setor" maxlength="4"
                                   class="form-control setor" name="setor" placeholder="0000">
                        </div>

                        <label for="inputPagGuia" class="col-sm-2 control-label">PGGUIA</label>
                        <div class="col-sm-2">
                            <input type="text" data-toggle="tooltip" title="Ex: 090-A22" maxlength="7" id="pgguia"
                                   class="form-control" name="pgguia" onchange="upperCaseF(this)" placeholder="A00-A00">
                        </div>

                        <label for="inputLog" class="col-sm-2 control-label">CEP</label>
                        <div class="col-sm-2">
                            <input type="text" data-toggle="tooltip" id="cep" title="Ex: 01234-567" class="form-control"
                                   name="cep" placeholder="00000-000">
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="inputLog" class="col-sm-1 control-label">LOG</label>
                        <div class="col-sm-2">
                            <input type="text" data-toggle="tooltip" title="Ex: Rua, Avenida ..."
                                   class="form-control log" name="log" id="sublocality" placeholder="RUA , AVENIDA ..."
                                   onchange="upperCaseF(this)">
                        </div>
                        <label for="inputEndereco" class="col-sm-1 control-label">END</label>
                        <div class="col-sm-4">
                            <input type="text" data-toggle="tooltip" id="location" title="Ex: Francisco Rodrigues ..."
                                   class="form-control" name="ruaoutros" onchange="upperCaseF(this)"
                                   placeholder="FRANCISCO RODRIGUES">
                        </div>

                        <label for="inputBairro" class="col-sm-1 control-label">BAIRRO</label>
                        <div class="col-sm-3">
                            <input type="text" data-toggle="tooltip" id="bairro" title="Ex: Vila Constanca"
                                   class="form-control" name="bairro" onchange="upperCaseF(this)" placeholder="BAIRRO">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputUbs" class="col-sm-1 control-label">UBS</label>
                        <div class="col-sm-5">
                            <input type="text" id="ubs" data-toggle="tooltip" title="Ex: Ubs Jacana"
                                   class="form-control ubs" name="ubs" onchange="upperCaseF(this)"
                                   placeholder="UBS DE ABRANGENCIA">
                        </div>

                        <label for="inputCidade" class="col-sm-1 control-label">LAT</label>
                        <div class="col-sm-2">
                            <input type="text" id="lat" data-toggle="tooltip" maxlength="20"
                                   title="Ex: Preenchimento Automatico" class="form-control" name="latitude"
                                   placeholder="15,123456789">
                        </div>

                        <label for="inputCidade" class="col-sm-1 control-label">LONG</label>
                        <div class="col-sm-2">
                            <input type="text" id="lng" data-toggle="tooltip" maxlength="20"
                                   title="Ex: Preenchimento Automatico" class="form-control" name="longitude"
                                   placeholder="-19,123456789">
                        </div>
                    </div>


                    <div class="form-group text-center">
                        <div class="col-sm-12">
                            <button type="submit" accesskey="G" style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                                echo 'display: none;';
                            } ?>" data-toggle="tooltip" title="GRAVAR OS DADOS" class="btn btn-labeled btn-success mb-2 mr-sm-4"><span
                                        class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span> <u>G</u>RAVAR
                            </button>
                            <a href='suvisjt.php?pag=list-end' role='button' data-toggle="tooltip" title="LISTAR REGISTROS" accesskey="L"
                                    class="btn btn-labeled btn-info mb-2 mr-sm-4"><span class="btn-label"><i
                                            class="glyphicon glyphicon-list"></i></span> <u>L</u>ISTAR</a>
                            <a target="_blank"
                               href='http://www.buscacep.correios.com.br/sistemas/buscacep/buscaCepEndereco.cfm'
                               role='button' data-toggle="tooltip" title="BUSCA CEP CORREIOS" accesskey="S"
                                    class="btn btn-labeled btn-default mb-2 mr-sm-4"><span class="btn-label"><img
                                            src="imagens/correios.png" width="20"/></span></span> BUSCA CEP</a>
                        </div>
                    </div>
                </form>
            </fieldset>
        </div>
    </div>
</div> <!-- /container -->

<script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAhlslumr1saHPVEJHkzPssYLEsWZJQQKU&libraries=places"></script>
