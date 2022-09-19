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
            <fieldset <?php
                if ($_SESSION['usuarioNivelAcesso'] == "") {
                    echo 'disabled';

            } ?>>
                <form class="form-horizontal" id="cad-esporo-animal" method="POST" action="suvisjt.php?pag=proc-cad-esporo-animal">

                    <div class="form-group" id="apresentacao">
                        <input id="searchInput" tabindex="11" style="margin-top: 10px;" class="form-control" type="text"
                               name="ruagoogle" placeholder="Digite o local">
                        <div id="mapcad"></div>
                    </div>

                    <div class="form-group">
                        <label for="inputNve" class="col-sm-1 control-label">NVE</label>
                        <div class="col-sm-1">
                            <input type="text" id="nve" autofocus tabindex="1" data-toggle="tooltip" title="Ex: 10" maxlength="5"
                                   class="form-control" name="nve" placeholder="000"></div>

                        <label for="inputDataNot" class="col-sm-1 control-label">ENTRADA</label>
                        <div class="col-sm-2">
                            <input tabindex="2" type="text" class="form-control" data-toggle="tooltip"
                                   title="Não pode ser maior que hoje" name="datanot" id="datanotcad"
                                   placeholder="00/00/0000">
                        </div>

                        <label class="col-sm-1 control-label">ANIMAL</label>
                        <div class="col-sm-3"><input type="text" tabindex="3" class="form-control" name="nomeanimal"  data-toggle="tooltip" title="Nome do Animal" onchange="upperCaseF(this)"></div>

                        <label class="col-sm-1 control-label">ESPÉCIE</label>
                        <div class="col-sm-2"><input type="text" tabindex="4" class="form-control especie" name="especie"  data-toggle="tooltip" title="Cão ou Gato" onchange="upperCaseF(this)"></div>
                    </div>

                    <div class="form-group">

                        <label class="col-sm-1 control-label">TUTOR</label>
                            <div class="col-sm-5"><input type="text" tabindex="5" class="form-control" name="tutor"  data-toggle="tooltip" title="Nome do Proprietário do Animal" onchange="upperCaseF(this)"></div>

                        <label for="inputTelefone1" class="col-sm-1 control-label">TEL 1:</label>
                        <div class="col-sm-2">
                            <input type="text" tabindex="7" class="form-control" data-toggle="tooltip" title="Ex:(00)00000000" name="tel1" id="tel1" maxlength="15" placeholder="(11)99999-9999">
                        </div>

                        <label for="inputTelefone2" class="col-sm-1 control-label">TEL 2:</label>
                        <div class="col-sm-2">
                            <input type="text" tabindex="8" class="form-control" data-toggle="tooltip" title="Ex:(00)00000000" name="tel2" id="tel2" maxlength="15" placeholder="(11)99999-9999">
                        </div>

                    </div>

                    <div class="form-group">
                        <label class="col-sm-1 control-label">SITUAÇÃO</label>
                        <div class="col-sm-2"><input type="text" tabindex="9" class="form-control situacao" name="situacao" data-toggle="tooltip" title="Situação do tratamento"></div>

                        <label class="col-sm-1 control-label">ENDEREÇO</label>
                        <div class="col-sm-3"><input type="text" tabindex="10" class="form-control rua" name="rua" data-toggle="tooltip" title="Nome da rua"
                                                     id="ruaselect" placeholder="NOME DO ENDEREÇO" onchange="upperCaseF(this)"></div>

                        <label class="col-sm-1 control-label">N</label>
                        <div class="col-sm-1"><input type="text" tabindex="12" class="form-control" name="num" data-toggle="tooltip" title="Preenchimento Automatico"
                             placeholder="Nº" maxlength="5"></div>

                        <label class="col-sm-1 control-label">COMP</label>
                        <div class="col-sm-2"><input type="text" tabindex="13" class="form-control" name="comp" data-toggle="tooltip" title="Preenchimento Automatico" style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                                echo 'display: none;';
                            } ?>" placeholder="CASA , APTO"
                                                        onchange="upperCaseF(this)"></div>

                    </div>

                    <div class="form-group">

                        <label class="col-sm-1 control-label">LAT/LNG</label>
                        <div class="col-sm-2"><input type="text" tabindex="14" id="lat" data-toggle="tooltip" title="Ex: 23.4587899" class="form-control"
                                                     name="lat" placeholder="15,123456789"></div>

                        <div class="col-sm-2"><input type="text" tabindex="15" id="lng" class="form-control"  data-toggle="tooltip" title="Ex: 46.458789" name="lng"
                                                     placeholder="-19,123456789"></div>

                        <label class="col-sm-1 control-label">CEP</label>
                        <div class="col-sm-2"><input type="text" class="form-control"  name="cep" readonly id="cepcad" maxlength="9" placeholder="00000-000"
                                                     data-toggle="tooltip" title="Preenchimento Automatico"></div>

                        <label class="col-sm-1 control-label">BAIRRO</label>
                        <div class="col-sm-3"><input type="text" class="form-control"  readonly id="bairro" name="bairro"
                                                     data-toggle="tooltip" title="Preenchimento Automatico" placeholder="BAIRRO"></div>

                    </div>

                    <div class="form-group">

                        <label class="col-sm-1 control-label">LOG</label>
                        <div class="col-sm-2"><input type="text" class="form-control"  readonly name="log" id="log" placeholder="RUA , AVENIDA"
                                                     data-toggle="tooltip" title="Preenchimento Automatico"></div>

                        <label class="col-sm-1 control-label">DA/SET</label>
                        <div class="col-sm-1"><input type="text" id="da" readonly  data-toggle="tooltip" title="Preenchimento Automatico" maxlength="2"
                                                     class="form-control" name="da" placeholder="00"></div>
                        <div class="col-sm-1"><input type="text"  readonly id="setor" class="form-control" name="setor" placeholder="0000"
                                                     data-toggle="tooltip" title="Preenchimento Automatico"></div>

                        <label for="inputPagGuia" class="col-sm-1 control-label">PGGUIA</label>
                        <div class="col-sm-2"><input type="text" readonly class="form-control" name="pgguia" id="pgguia" placeholder="A00-A00"
                                                        data-toggle="tooltip" title="Preenchimento Automatico"></div>

                        <label class="col-sm-1 control-label">UBS REF</label>
                        <div class="col-sm-2"><input type="text" class="form-control"  readonly id="localvd" name="localvd"  placeholder="UBS DE ABRANGÊNCIA"
                                                        data-toggle="tooltip" title="Preenchimento Automatico"></div>


                    </div>

                    <div class="form-group">
                        <label for="inputDataEntrada" class="col-sm-1 control-label">MED. 1ª :</label>
                            <div class="col-sm-2"><input tabindex="16" type="text" class="form-control" data-toggle="tooltip"
                                title="Data da 1ª entrega" name="dataentrada" id="dataentcad" placeholder="00/00/0000"></div>

                        <label for="inputDataEntrada" class="col-sm-1 control-label">DOSE/QTD:</label>
                            <div class="col-sm-1"><input type="number" tabindex="17" data-toggle="tooltip" title="Dosagem Mg/Dia" maxlength="5"
                                   class="form-control" name="dsg1" placeholder="000"></div>

                            <div class="col-sm-1"><input type="number" tabindex="18" data-toggle="tooltip" title="Quantidade de comprimidos" maxlength="5"
                                       class="form-control" name="qtd1" placeholder="000"></div>

                        <label for="inputDataEntrada" class="col-sm-1 control-label">ENTREG.</label>
                            <div class="col-sm-2"><input type="text" tabindex="19" data-toggle="tooltip" title="Para quem foi entregue? (Uvis ou DVZ)"
                                       class="form-control entregador" name="nment1" placeholder="Entregue:UVIS/DVZ"></div>

                        <label for="inputDataEntrada" class="col-sm-1 control-label">RECEP.</label>
                            <div class="col-sm-2"><input type="text" tabindex="20" data-toggle="tooltip" title="Quem recebeu o medicamento? (Nome)" maxlength="5"
                                       class="form-control" name="nmrecep1" placeholder="Nome do Receptor" onchange="upperCaseF(this)"></div>
                    </div>

                    <div class="form-group">
                        <label for="inputDataEntrada" class="col-sm-1 control-label">MED. 2ª :</label>
                        <div class="col-sm-2"><input tabindex="21" type="text" class="form-control" data-toggle="tooltip"
                                                     title="Data da 2ª entrega" name="dataentrada2" id="dataentcad2" placeholder="00/00/0000"></div>

                        <label for="inputDataEntrada" class="col-sm-1 control-label">DOSE/QTD:</label>
                        <div class="col-sm-1"><input type="number" tabindex="22" data-toggle="tooltip" title="Dosagem Mg/Dia" maxlength="5"
                                                     class="form-control" name="dsg2" placeholder="000"></div>

                        <div class="col-sm-1"><input type="number" tabindex="23" data-toggle="tooltip" title="Quantidade de comprimidos" maxlength="5"
                                                     class="form-control" name="qtd2" placeholder="000"></div>

                        <label for="inputDataEntrada" class="col-sm-1 control-label">ENTREG.</label>
                        <div class="col-sm-2"><input type="text" tabindex="24" data-toggle="tooltip" title="Para quem foi entregue? (Uvis ou DVZ)"
                                                     class="form-control entregador" name="nment2" placeholder="Entregue:UVIS/DVZ"></div>

                        <label for="inputDataEntrada" class="col-sm-1 control-label">RECEP.</label>
                        <div class="col-sm-2"><input type="text" tabindex="25" data-toggle="tooltip" title="Quem recebeu o medicamento? (Nome)" maxlength="5"
                                                     class="form-control" name="nmrecep2" placeholder="Nome do Receptor" onchange="upperCaseF(this)"></div>
                    </div>

                    <div class="form-group">

                        <label class="col-sm-1 control-label">OBS</label>
                        <div class="col-sm-11"><textarea id="obs" tabindex="26" data-toggle="tooltip" title="Observações sobre o caso"
                                class="form-control" name="obs" onchange="upperCaseF(this)" placeholder="Informações sobre o caso de esporotricose animal" rows="2"></textarea></div>

                    </div>

                        <input type="hidden" name="ano" value="<?php echo date('Y') ;?>">
                        <input type="hidden" name="datacadastro" value="<?php echo date("d/m/Y"); ?>">
                        <input type="hidden" id="idrua" name="idrua"></div>
                        <input type="hidden" name="med" value="ITRACONAZOL"></div>

                    <div class="form-group text-center">
                        <div class="col-sm-12">
                            <button type="submit" tabindex="27" accesskey="G" style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                                echo 'display: none;';
                            } ?>" data-toggle="tooltip" title="GRAVAR OS DADOS" class="btn btn-labeled btn-success mb-2 mr-sm-4"><span
                                        class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span> <u>G</u>RAVAR
                            </button>
                            <a href='suvisjt.php?pag=listar-esporotricose-animal' role='button' tabindex="28" data-toggle="tooltip" title="LISTAR REGISTROS" accesskey="L"
                                    class="btn btn-labeled btn-info mb-2 mr-sm-4"><span class="btn-label"><i
                                            class="glyphicon glyphicon-list"></i></span> <u>L</u>ISTAR</a>
                            <a target="_blank"
                               href='http://www.buscacep.correios.com.br/sistemas/buscacep/buscaCepEndereco.cfm'
                               role='button' tabindex="29" data-toggle="tooltip" title="BUSCA CEP CORREIOS" accesskey="S"
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
