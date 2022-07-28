<?php
error_reporting(0);
include_once '../../locked/seguranca.php';
include_once '../../conecta.php';
?>

<style>
    #mapcad {
        width: 1140px;
        height: 200px;
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
                                class="glyphicon glyphicon-plus-sign"></i></span>CADASTRAR ESPOROTRICOSE ANIMAL</button>
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
                <form class="form-horizontal" id="cad-esporo-animal" method="POST" action="suvisjt.php?pag=proc-cad-esporo-animal">

                    <div class="form-group" id="apresentacao">
                        <input id="searchInput" style="margin-top: 10px;" class="form-control" type="text"
                               name="ruagoogle" placeholder="Digite o local">
                        <div id="mapcad"></div>
                    </div>

                    <div class="form-group form-group-sm">
                        <label for="inputNve" class="col-sm-1 control-label">NVE</label>
                        <div class="col-sm-1">
                            <input type="text" id="nve" autofocus data-toggle="tooltip" title="Ex: 10" maxlength="5"
                                   class="form-control" name="nve" placeholder="000"></div>

                            <label class="col-sm-1 control-label">ENTRADA</label>
                            <div class="col-sm-2"><input type="text" class="form-control" readonly  data-toggle="tooltip" title="Preenchimento Automatico"
                                                         name="dataentrada" value="<?php echo date("d/m/Y"); ?>"></div>

                            <label class="col-sm-1 control-label">ANIMAL</label>
                            <div class="col-sm-3"><input type="text" class="form-control" name="nomeanimal"  data-toggle="tooltip" title="Preenchimento Automatico"></div>

                            <label class="col-sm-1 control-label">ESPÉCIE</label>
                            <div class="col-sm-2"><input type="text" class="form-control especie" name="especie"  data-toggle="tooltip" title="Preenchimento Automatico"></div>
                        </div>

                        <div class="form-group form-group-sm">
                        <label for="inputNve" class="col-sm-1 control-label">NVE</label>
                        <div class="col-sm-1">
                            <input type="text" id="nve" autofocus data-toggle="tooltip" title="Ex: 10" maxlength="5"
                                   class="form-control" name="nve" placeholder="000"></div>

                            <label class="col-sm-1 control-label">ENTRADA</label>
                            <div class="col-sm-2"><input type="text" class="form-control" readonly  data-toggle="tooltip" title="Preenchimento Automatico"
                                                         name="dataentrada" value="<?php echo date("d/m/Y"); ?>"></div>

                            <label class="col-sm-1 control-label">ANIMAL</label>
                            <div class="col-sm-2"><input type="text" class="form-control" name="nomeanimal"  data-toggle="tooltip" title="Preenchimento Automatico"></div>

                            <label class="col-sm-1 control-label">DONO</label>
                            <div class="col-sm-3"><input type="text" class="form-control" name="nome"  data-toggle="tooltip" title="Preenchimento Automatico"></div>
                        </div>

                        <div class="form-group form-group-sm">
                            <label class="col-sm-1 control-label">ENDEREÇO</label>
                            <div class="col-sm-5"><input type="text" autofocus tabindex="1" class="form-control rua" name="rua" data-toggle="tooltip" title="Ex: Francisco Rodrigues ..."
                                                         id="ruaselect" placeholder="NOME DO ENDEREÇO" onchange="upperCaseF(this)" value="<?php echo utf8_encode($rows_edit_end['NM_LOGRADO']); ?>"></div>

                            <label class="col-sm-1 control-label">N</label>
                            <div class="col-sm-2"><input type="text" tabindex="3" class="form-control" name="num" data-toggle="tooltip" title="Preenchimento Automatico"  placeholder="Nº" maxlength="5"
                                                         value="<?php echo $rows_edit_end['NU_NUMERO']; ?>"></div>

                            <label class="col-sm-1 control-label">COMP</label>
                            <div class="col-sm-2"><input type="text" class="form-control" name="comp" data-toggle="tooltip" title="Preenchimento Automatico" style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                                    echo 'display: none;';
                                } ?>" placeholder="CASA , APTO"
                                                         onchange="upperCaseF(this)" value="<?php echo $rows_edit_end['NM_COMPLEM']; ?>"></div>
                        </div>

                        <div class="form-group form-group-sm">
                            <label class="col-sm-1 control-label">CEP</label>
                            <div class="col-sm-2"><input type="text" class="form-control"  name="cep" readonly id="cepcad" maxlength="9" placeholder="00000-000"
                                                         data-toggle="tooltip" title="Preenchimento Automatico" value="<?php echo $rows_edit_end['NU_CEP']; ?>"></div>

                            <label class="col-sm-1 control-label">LOG</label>
                            <div class="col-sm-2"><input type="text" class="form-control"  readonly name="log" id="log" placeholder="RUA , AVENIDA"
                                                         data-toggle="tooltip" title="Preenchimento Automatico" value="<?php echo $rows_edit_end['ID_LOGRADO']; ?>"></div>

                            <label class="col-sm-1 control-label">BAIRRO</label>
                            <div class="col-sm-2"><input type="text" class="form-control"  readonly id="bairro" name="bairro"
                                                         data-toggle="tooltip" title="Preenchimento Automatico" placeholder="BAIRRO" onchange="upperCaseF(this)" value="<?php echo $rows_edit_end['NM_BAIRRO']; ?>"></div>

                            <label class="col-sm-1 control-label">DA/SET</label>
                            <div class="col-sm-1"><input type="text" id="da" readonly  data-toggle="tooltip" title="Preenchimento Automatico" maxlength="2"
                                                         class="form-control" name="da" placeholder="00" value="<?php echo $rows_edit_end['ID_DISTRIT']; ?>"></div>

                            <div class="col-sm-1"><input type="text"  readonly id="setor" class="form-control" name="setor" placeholder="0000"
                                                         data-toggle="tooltip" title="Preenchimento Automatico" value="<?php echo $rows_edit_end['ID_BAIRRO']; ?>"></div>
                        </div>

                        <div class="form-group form-group-sm">
                            <label for="inputPagGuia" class="col-sm-1 control-label">PGGUIA</label>
                            <div class="col-sm-2"><input type="text" readonly class="form-control" name="pgguia" id="pgguia" placeholder="A00-A00"
                                                         data-toggle="tooltip" title="Preenchimento Automatico" value="<?php echo $rows_edit_end['PgGuia1']; ?>"></div>

                            <label class="col-sm-1 control-label">UBS REF</label>
                            <div class="col-sm-2"><input type="text" class="form-control"  readonly id="localvd" name="localvd"  placeholder="UBS DE ABRANGÊNCIA"
                                                         data-toggle="tooltip" title="Preenchimento Automatico" value="<?php echo $rows_edit_end['NM_REFEREN']; ?>"></div>

                            <label class="col-sm-1 control-label">LAT</label>
                            <div class="col-sm-2"><input type="text" id="lat" data-toggle="tooltip" title="Ex: 23.4587899" class="form-control"
                                                         name="latitude" placeholder="15,123456789"></div>

                            <label class="col-sm-1 control-label">LNG</label>
                            <div class="col-sm-2"><input type="text" id="lng" class="form-control"  data-toggle="tooltip" title="Ex: 46.458789" name="longitude"
                                                         placeholder="-19,123456789"></div>
                        </div>

                        <div class="form-group form-group-sm">

                            <label class="col-sm-1 control-label">OBS</label>
                            <div class="col-sm-11"><input id="obs" data-toggle="tooltip" title="Preenchimento Automatico"
                                 class="form-control" type="text" name="obs"  placeholder="Informações sobre o caso de esporotricose animal"></div>

                        </div>


                    <div class="form-group text-center">
                        <div class="col-sm-12">
                            <button type="submit" accesskey="G" style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                                echo 'display: none;';
                            } ?>" data-toggle="tooltip" title="GRAVAR OS DADOS" class="btn btn-labeled btn-success mb-2 mr-sm-4"><span
                                        class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span> <u>G</u>RAVAR
                            </button>
                            <a href='suvisjt.php?pag=list-esporo-animal' role='button' data-toggle="tooltip" title="LISTAR REGISTROS" accesskey="L"
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
