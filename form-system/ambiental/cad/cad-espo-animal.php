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
        <div class="col-md-12 pt-5">

            <ol class="breadcrumb">
                <li><i class="fa fa-database"></i> <a href="suvisjt.php">Sisdam Web</a></li>
                <li class="active">Eporotricose Animal</li>
            </ol>
            <button type="button" style="opacity: inherit;color: #338113" class="btn btn-success btn-labeled btn-lg btn-block" disabled><span class="btn-label"><i
                            class="fa fa-plus-circle"></i></span>CADASTRAR ESPOROTRICOSE ANIMAL</button>
        </div>
    </div>
    <!-- Fim da Pagina de Titulo -->

    <?php if ($_SESSION['usuarioNivelAcesso'] > 3):?>
        <div class="form-group text-center"><div class="alert alert-danger text-center" role="alert"><strong>SEU NÍVEL DE USUÁRIO NÃO PERMITE EDITAR !!!</strong></div></div>
    <?php endif;?>

    <?php if ($_SESSION['usuarioNivelAcesso'] == ''):?>
        <div class="form-group text-center"><div class="alert alert-danger text-center" role="alert"><strong>PARA CADASTRAR É NECESSARIO FAZER O LOGIN!!!</strong></div></div>
    <?php endif;?>

    <?php
    if (isset($_SESSION['msgcad'])):
        echo '<div class="form-group text-center">'.$_SESSION['msgcad'].'</div>';
    endif;
    if (isset($_SESSION['msgerrocad'])):
        echo '<div class="form-group text-center">'.$_SESSION['msgerrocad'].'</div>';
    endif;
    ?>

    <div class="row">

        <div class="col-md-12">
            <fieldset <?php
            if ($_SESSION['usuarioNivelAcesso'] == "") {
                echo 'disabled';

            } ?>>
                <form class="form-horizontal" id="cad-esporo-animal" method="POST" action="suvisjt.php?pag=proc-cad-esporo-animal">

                    <div class="form-group" id="apresentacao">
                        <input id="searchInput" tabindex="15" style="margin-top: 10px;" class="form-control" type="text"
                               name="ruagoogle" placeholder="Digite o local">
                        <div id="mapcad" style="margin-bottom: inherit"></div>
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
                        <div class="col-sm-3">
                            <input type="text" tabindex="3" class="form-control" name="nomeanimal"  data-toggle="tooltip" title="Nome do Animal" onchange="upperCaseF(this)"></div>

                        <label class="col-sm-1 control-label">ESPÉCIE</label>
                        <div class="col-sm-2">
                            <input type="text" tabindex="4" class="form-control especie" name="especie"  data-toggle="tooltip" title="Espécie : FELINA ou CANINA" onchange="upperCaseF(this)"></div>
                    </div>

                    <div class="form-group">

                        <label class="col-sm-1 control-label">TUTOR</label>
                        <div class="col-sm-4">
                            <input type="text" tabindex="5" class="form-control" name="tutor"  data-toggle="tooltip" title="Nome do Proprietário do Animal"
                                   onchange="upperCaseF(this)"></div>

                        <label class="col-sm-1 control-label">IDADE</label>
                        <div class="col-sm-1"><input type="text" tabindex="6" class="form-control" name="idade" data-toggle="tooltip" title="Idade em anos"
                                                     placeholder="Nº"></div>

                        <label for="inputOrigem" class="col-sm-1 control-label">SEXO</label>
                        <div class="col-sm-1">
                            <input type="text" tabindex="7" class="form-control sexos" data-toggle="tooltip" title="F OU M" name="sexos" id="sexos"
                                   onchange="upperCaseF(this)" placeholder="M/F">
                        </div>

                        <label for="inputTelefone1" class="col-sm-1 control-label">TEL 1</label>
                        <div class="col-sm-2">
                            <input type="text" tabindex="8" class="form-control" data-toggle="tooltip" title="Celular ou fixo sem DDD" name="tel1" id="tels1" maxlength="15"
                                   placeholder="99999-9999"></div>

                    </div>

                    <div class="form-group">
                        <label for="inputOrigem" class="col-sm-1 control-label">CASO H:</label>
                        <div class="col-sm-1">
                            <input type="text" tabindex="13" class="form-control casoh" data-toggle="tooltip" title="Caso humano? S ou N" name="casoh"
                                   onchange="upperCaseF(this)" placeholder="S/N">
                        </div>

                        <label class="col-sm-1 control-label">ENDEREÇO</label>
                        <div class="col-sm-4"><input type="text" tabindex="14" class="form-control rua" name="rua" data-toggle="tooltip" title="Nome da rua" 3
                                                     id="ruaselect" placeholder="NOME DO ENDEREÇO" onchange="upperCaseF(this)"></div>

                        <label class="col-sm-1 control-label">N</label>
                        <div class="col-sm-1"><input type="text" tabindex="16" class="form-control" name="num" data-toggle="tooltip" title="Preenchimento Automatico"
                                                     placeholder="Nº" maxlength="6"></div>

                        <label class="col-sm-1 control-label">COMP</label>
                        <div class="col-sm-2"><input type="text" tabindex="17" class="form-control" name="comp" data-toggle="tooltip" title="Preenchimento Automatico" style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                                echo 'display: none;';
                            } ?>" placeholder="CASA , APTO"
                                                     onchange="upperCaseF(this)"></div>

                    </div>


                    <div class="form-group">

                        <label class="col-sm-1 control-label">LAT/LNG</label>
                        <div class="col-sm-2"><input type="text" tabindex="18" id="lat" data-toggle="tooltip" title="Ex: 23.4587899" class="form-control"
                                                     name="lat" placeholder="15,123456789"></div>

                        <div class="col-sm-2"><input type="text" tabindex="19" id="lng" class="form-control"  data-toggle="tooltip" title="Ex: 46.458789" name="lng"
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
                        <div class="col-sm-3"><input type="text" class="form-control"  readonly name="log" id="log" placeholder="RUA , AVENIDA"
                                                     data-toggle="tooltip" title="Preenchimento Automatico"></div>

                        <label class="col-sm-1 control-label">DA</label>
                        <div class="col-sm-1"><input type="text" id="da" readonly  data-toggle="tooltip" title="Preenchimento Automatico" maxlength="2"
                                                     class="form-control" name="da" placeholder="00"></div>

                        <label class="col-sm-1 control-label">SETOR</label>
                        <div class="col-sm-2"><input type="text"  readonly id="setor" class="form-control" name="setor" placeholder="0000"
                                                     data-toggle="tooltip" title="Preenchimento Automatico"></div>

                        <label for="inputPagGuia" class="col-sm-1 control-label">PGGUIA</label>
                        <div class="col-sm-2"><input type="text" readonly class="form-control" name="pgguia" id="pgguia" placeholder="A00-A00"
                                                     data-toggle="tooltip" title="Preenchimento Automatico"></div>


                    </div>

                    <div class="form-group">

                        <label class="col-sm-1 control-label">UBS REF</label>
                        <div class="col-sm-5"><input type="text" class="form-control"  readonly id="localvd" name="localvd"  placeholder="UBS DE ABRANGÊNCIA"
                                                     data-toggle="tooltip" title="Preenchimento Automatico"></div>

                        <label for="inputDataNot" class="col-sm-1 control-label">ÚLT. AV.</label>
                        <div class="col-sm-2">
                            <input tabindex="20" type="text" class="form-control" data-toggle="tooltip" title="Data da última avaliação do animal" name="dataua" id="dataua"
                                   placeholder="00/00/0000">
                        </div>

                        <label for="inputDataNot" class="col-sm-1 control-label">DT. B.AT.</label>
                        <div class="col-sm-2">
                            <input tabindex="21" type="text" class="form-control" data-toggle="tooltip"
                                   title="Data da realização de busca ativa de casos no entorno" name="databa" id="databa" placeholder="00/00/0000"></div>


                    </div>

                    <div class="form-group">

                        <label class="col-sm-2 control-label">Nº CASOS SUSPEITOS</label>
                        <div class="col-sm-1">
                            <input type="text" tabindex="22" class="form-control" name="num_casos_susp" data-toggle="tooltip"
                                   title="Nº de casos suspeitos de animais identificados na busca ativa" placeholder="Nº" maxlength="6"></div>

                        <label for="inputDataNot" class="col-sm-1 control-label">DT. F.TR.</label>
                        <div class="col-sm-2">
                            <input tabindex="23" type="text" class="form-control" data-toggle="tooltip"
                                   title="Data final do tratamento" name="dataft" id="dataft" placeholder="00/00/0000"></div>

                        <label class="col-sm-1 control-label">PEDIDO</label>
                        <div class="col-sm-2"><input type="text" tabindex="24" class="form-control" name="pedido" data-toggle="tooltip" title="Numero de Pedido de Exame"
                                                     placeholder="123456789"></div>

                        <label for="inputOrigem" class="col-sm-1 control-label">ORIGEM</label>
                        <div class="col-sm-2">
                            <input type="text" tabindex="25" class="form-control origem" data-toggle="tooltip" title="CCZ PLANTAO OU UVIS JACANA" name="origem" id="origem"
                                   placeholder="UVIS JACANA">
                        </div>

                    </div>

                    <div class="form-group">
                        <label class="col-sm-1 control-label">SITUAÇÃO</label>
                        <div class="col-sm-2"><input type="text" tabindex="26" class="form-control situacao" name="situacao" data-toggle="tooltip" title="Situação : ALTA/DESPARECIDO ..."></div>

                        <label class="col-sm-1 control-label">DIAGNÓST.</label>
                        <div class="col-sm-2"><input type="text" onchange="upperCaseF(this)" tabindex="27" class="form-control diagnostico" name="diagnostico" data-toggle="tooltip" title="POSITIVO/NEGATIVO"></div>

                        <label for="inputMedicamento" class="col-sm-2 control-label">MEDICAMENTO</label>
                        <div class="col-sm-2"><input type="text" tabindex="28" data-toggle="tooltip" title="Nome do Medicamento"
                                                     class="form-control medicamento" name="medicamento" placeholder="ITRACONAZOL" value="ITRACONAZOL"></div>

                        <label for="inputMedicamento" class="col-sm-1 control-label">DOSAGEM</label>
                        <div class="col-sm-1"><input type="number" tabindex="29" data-toggle="tooltip" title="Dosagem do Medicamento" maxlength="5"
                                                     class="form-control" name="dsg" placeholder="100" value="100"></div>
                    </div>

                    <div class="form-group">
                        <label for="inputDataMedicamento" class="col-sm-1 control-label">DATA</label>
                        <div class="col-sm-2"><input tabindex="30" type="text" class="form-control" data-toggle="tooltip"
                                                     title="Data da 1ª entrega" name="dataentrada" id="dataentcad" placeholder="00/00/0000"></div>

                        <label for="inputQuantidade" class="col-sm-1 control-label">QUANTIDADE</label>
                        <div class="col-sm-1"><input type="number" tabindex="31" data-toggle="tooltip" title="Quantidade de comprimidos" maxlength="5"
                                                     class="form-control" name="qtd" placeholder="000"></div>

                        <label for="inputEntregue" class="col-sm-1 control-label">ENTREGUE</label>
                        <div class="col-sm-2"><input type="text" tabindex="32" data-toggle="tooltip" title="Para quem foi entregue? (Uvis ou DVZ)"
                                                     class="form-control entregador" name="nment" placeholder="Entregue:UVIS/DVZ" value="UVIS"></div>

                        <label for="inputRecebido" class="col-sm-1 control-label">RECEBIDO</label>
                        <div class="col-sm-3"><input type="text" tabindex="33" data-toggle="tooltip" title="Quem recebeu o medicamento? (Nome)"
                                                     class="form-control" name="nmrecep" placeholder="Nome do Receptor" onchange="upperCaseF(this)"></div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-1 control-label">OBS MED.</label>
                        <div class="col-sm-11"><textarea id="obs_med" tabindex="34" data-toggle="tooltip" title="Observações sobre entrega do medicamento"
                                                         class="form-control" name="obs_med" onchange="upperCaseF(this)" placeholder="Informações sobre entrega do medicamento" rows="1"></textarea></div>
                    </div>

                    <div class="form-group">
                        <label for="inputObs" class="col-sm-1 control-label">OBS</label>
                        <div class="col-sm-11"><textarea id="obs" tabindex="35" data-toggle="tooltip" title="Observações sobre o caso"
                                                         class="form-control" name="obs" onchange="upperCaseF(this)" placeholder="Informações sobre o caso de esporotricose animal" rows="2"></textarea></div>
                    </div>

                    <input type="hidden" name="ano" value="<?php echo date('Y') ;?>">
                    <input type="hidden" name="datacadastro" value="<?php echo date("d/m/Y"); ?>">
                    <input type="hidden" id="idrua" name="idrua"></div>
                    <input type="hidden" name="acao" value="cadastrar">
                    <input type="hidden" name="pin" value="0">

                    <div class="form-group text-center">
                        <div class="col-sm-12">
                            <button type="submit" tabindex="36" accesskey="G" style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                                echo 'display: none;';
                            } ?>" data-toggle="tooltip" title="GRAVAR OS DADOS" class="btn btn-labeled btn-success mb-2 mr-sm-4"><span
                                        class="btn-label"><i class="fa fa-compact-disc"></i></span> <u>G</u>RAVAR
                            </button>
                            <a href='suvisjt.php?pag=listar-esporotricose-animal' role='button' tabindex="37" data-toggle="tooltip" title="LISTAR REGISTROS" accesskey="L"
                               class="btn btn-labeled btn-info mb-2 mr-sm-4"><span class="btn-label"><i
                                            class="fa fa-list"></i></span> <u>L</u>ISTAR</a>
                            <a target="_blank"
                               href='http://www.buscacep.correios.com.br/sistemas/buscacep/buscaCepEndereco.cfm'
                               role='button' tabindex="38" data-toggle="tooltip" title="BUSCA CEP CORREIOS" accesskey="S"
                               class="btn btn-labeled btn-default mb-2 mr-sm-4"><span class="btn-label"><img
                                            src="imagens/correios.png" width="20"/></span></span> BUSCA CEP</a>
                        </div>
                    </div>
                </form>
            </fieldset>
        </div>
    </div>
</div>

<script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAhlslumr1saHPVEJHkzPssYLEsWZJQQKU&libraries=places"></script>
