<!-- Este projeto é desenvolvido na Suvis Jaçanã-Tremembé com iniciativa dos colaboradores da Unidade -->
<!-- Código desenvolvido por Rodolfo Romaioli Ribeiro de Jesus - rodolfo.romaioli@gmail.com -->
<!-- Sisdam Web - 2.0 - 2017 - Todos os direitos reservados -->

<?php
error_reporting(0);
include_once '../../../locked/seguranca.php';
include_once '../../../conecta.php';
?>

<?php

$sinan = mysqli_real_escape_string($conectar, $_POST["sinan"]);
$protocolo = mysqli_real_escape_string($conectar, $_POST["protocolocad"]);
$datanot = mysqli_real_escape_string($conectar, $_POST["datanot"]);
$agravo = mysqli_real_escape_string($conectar, $_POST["agravo"]);
$nome = mysqli_real_escape_string($conectar, $_POST["nome"]);
$idade = mysqli_real_escape_string($conectar, $_POST["idade"]);
$sexo = mysqli_real_escape_string($conectar, $_POST["sexo"]);
$dataentrada = mysqli_real_escape_string($conectar, $_POST["dataentrada"]);
$se = mysqli_real_escape_string($conectar, $_POST["se"]);
$localate = mysqli_real_escape_string($conectar, $_POST["localate"]);
$num = mysqli_real_escape_string($conectar, $_POST["num"]);
$comp = mysqli_real_escape_string($conectar, $_POST["comp"]);
$tel = mysqli_real_escape_string($conectar, $_POST["tel"]);
$dataobito = mysqli_real_escape_string($conectar, $_POST["dataobito"]);
$latsv2 = mysqli_real_escape_string($conectar, $_POST["latitude"]);
$longsv2 = mysqli_real_escape_string($conectar, $_POST["longitude"]);
$da = mysqli_real_escape_string($conectar, $_POST["da"]);


?>

<script type="text/javascript">
    function enviaForm(idBotao) {
        var form = document.forms[0];
        if (idBotao == 'suvis') {
            form.action = "suvisjt.php?pag=cad-sv2-suvis";
        }
        if (idBotao == 'outros') {
            form.action = "suvisjt.php?pag=cad-sv2-outros";
        }
        if (idBotao == 'siva-outros') {
            form.action = "suvisjt.php?pag=cad-sv2-siva-outros";
        }
        if (idBotao == 'surto') {
            form.action = "suvisjt.php?pag=cad-sv2-surto";
        }
        form.submit(); // vai enviar para o action modificado nos if's.
    }
</script>

<div class="container theme-showcase" role="main" xmlns="http://www.w3.org/1999/html">
    <!-- Página de Título -->
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <ol class="breadcrumb">
                    <li><i class="fa fa-database"></i> <a href="suvisjt.php">Sisdam Web</a></li>
                    <li class="active">Sv2 Siva <?php echo $today = date("Y");   ?> </li>
                </ol>
                <button type="button" class="btn btn-default btn-lg btn-block">CADASTRO SV2 - SIVA</button>
            </div>
        </div>
    </div>
    <!-- Fim da Página de Título -->

    <div class="form-group text-center">
        <div class="alert alert-danger text-center" style="<?php if ($_SESSION['usuarioNivelAcesso'] < 4) {
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
                <form class="form-horizontal" id="cadastro_sv2_siva" method="POST"
                      action="suvisjt.php?pag=proc-cad-sv2">

                    <div class="form-group">
                        <label for="inputSinan" class="col-sm-1 control-label">SINAN</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" autofocus data-toggle="tooltip"
                                   title="O sinan deve ter 7 numeros" readonly required name="sinan" id="sinancad"
                                   size="7" maxlength="7" placeholder="0000000" value="0000000">
                        </div>

                        <label for="inputDataNot" class="col-sm-2 control-label">NOTIFICAÇÃO</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" data-toggle="tooltip"
                                   title="Não pode ser maior que hoje" required name="datanot" id="datanotcad"
                                   placeholder="00/00/0000" value="<?php echo $datanot ?>">
                        </div>


                        <label for="inputDataEntrada" class="col-sm-1 control-label">ENTRADA</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" data-toggle="tooltip"
                                   title="Maior que Data de Notificação" required name="dataentrada" id="dataentcad"
                                   placeholder="00/00/0000" value="<?php echo $dataentrada ?>">
                        </div>

                        <label for="inputSe" class="col-sm-1 control-label">SE</label>
                        <div class="col-sm-1">
                            <input type="text" class="form-control" data-toggle="tooltip"
                                   title="Preenchimento Automático" readonly name="se" id="se"
                                   value="<?php echo $se ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputAgravoSiva" class="col-sm-1 control-label">AGRAVO</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control agravosiva" data-toggle="tooltip"
                                   title="Ex: Dengue , Tuberculose ..." required name="agravo"
                                   placeholder="DOENÇA OU AGRAVO" onchange="upperCaseF(this)"
                                   value="<?php echo $agravo ?>">
                        </div>

                        <label for="inputLocalAte" class="col-sm-1 control-label">ATENDIDO</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control localate" data-toggle="tooltip"
                                   title="Ex: Hospital, Ama, Ubs ...." required name="localate"
                                   placeholder="LOCAL DE ATENDIMENTO" onchange="upperCaseF(this)"
                                   value="<?php echo $localate ?>">
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="inputNome" class="col-sm-1 control-label">NOME</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" data-toggle="tooltip" title="Ex: João da Silva ..."
                                   name="nome" required id="nomecad" placeholder="NOME , SOBRENOME"
                                   onchange="upperCaseF(this)" value="<?php echo $nome ?>">
                        </div>

                        <label for="inputSexo" class="col-sm-1 control-label">SEXO</label>
                        <div class="col-sm-1">
                            <input type="text" class="form-control" data-toggle="tooltip" title="Ex: F, M ou I"
                                   name="sexo" required id="sexo" placeholder="F" onchange="upperCaseF(this)"
                                   value="<?php echo $sexo ?>">
                        </div>

                        <label for="inputDataEntrada" class="col-sm-1 control-label">IDADE</label>
                        <div class="col-sm-1">
                            <input type="text" class="form-control" data-toggle="tooltip" title="Ex: 01A" name="idade"
                                   id="idade" placeholder="000A" onchange="upperCaseF(this)"
                                   value="<?php echo $idade ?>">
                        </div>

                        <label for="inputTelefone" class="col-sm-1 control-label">TELEFONE</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" data-toggle="tooltip" title="Ex:(00)00000000"
                                   name="tel" id="telcad" maxlength="15" placeholder="(11)99999-9999"
                                   value="<?php echo $tel ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputRua" class="col-sm-1 control-label">ENDEREÇO</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control rua" name="rua" data-toggle="tooltip"
                                   title="Ex: Francisco Rodrigues ..." required id="ruaselect"
                                   placeholder="NOME DO ENDEREÇO" onchange="upperCaseF(this)">
                        </div>

                        <label for="inputN" class="col-sm-2 control-label">N</label>
                        <div class="col-sm-1">
                            <input type="text" class="form-control" name="num" data-toggle="tooltip" title="Ex: 120 ..."
                                   required id="numcomp" placeholder="Nº" maxlength="6" onchange="upperCaseF(this)"
                                   value="<?php echo $num ?>">
                        </div>

                        <label for="inputComp" class="col-sm-1 control-label">COMP</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="comp" data-toggle="tooltip"
                                   title="Ex: Casa 01" placeholder="CASA , APTO" onchange="upperCaseF(this)"
                                   value="<?php echo $comp ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputCep" class="col-sm-1 control-label">CEP</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" required name="cep" data-toggle="tooltip"
                                   title="Preenchimento Automático" readonly id="cepcad" maxlength="9"
                                   placeholder="00000-000">
                        </div>

                        <label for="inputLog" class="col-sm-1 control-label">LOG</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" required data-toggle="tooltip"
                                   title="Preenchimento Automático" readonly name="log" id="log"
                                   placeholder="RUA , AVENIDA" onchange="upperCaseF(this)">
                        </div>

                        <label for="inputBairro" class="col-sm-1 control-label">BAIRRO</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" required data-toggle="tooltip"
                                   title="Preenchimento Automático" readonly id="bairro" name="bairro"
                                   placeholder="BAIRRO" onchange="upperCaseF(this)">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputLocalVd" class="col-sm-1 control-label">UBS REF</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" required data-toggle="tooltip" title="Preenchimento Automático" readonly id="localvd" name="localvd"
                                   placeholder="UBS DE ABRANGÊNCIA" onchange="upperCaseF(this)"></div>

                        <label for="inputAtual" class="col-sm-1 control-label">ATUAL?</label>
                        <div class="col-sm-1">
                            <input type="text" class="form-control" data-toggle="tooltip"
                                   title="Preenchimento Automático" readonly id="atual" name="atual"
                                   placeholder="???" onchange="upperCaseF(this)">
                        </div>

                        <label for="inputSuvis" class="col-sm-1 control-label">UVIS</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" data-toggle="tooltip"
                                   title="Preenchimento Automático" readonly id="suvis" name="suvis"
                                   value="UVIS JACANA-TREMEMBE">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputCidade" class="col-sm-1 control-label">CIDADE</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" data-toggle="tooltip"
                                   title="Preenchimento Automático" readonly id="cidade" name="cidade"
                                   value="SAO PAULO">
                        </div>

                        <label class="col-sm-1 control-label">DA</label>
                        <div class="col-sm-1"><input type="text" id="da" readonly  data-toggle="tooltip" title="Preenchimento Automatico" maxlength="2"
                                                     class="form-control" name="da" placeholder="00"></div>

                        <label for="inputDataObito" class="col-sm-4 control-label">ÓBITO</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" data-toggle="tooltip"
                                   title="Não pode ser maior que hoje" name="dataobito" id="dataobitocad"
                                   placeholder="00/00/0000" value="<?php echo $dataobito ?>">
                        </div>
                        <input type="hidden" name="latitude" id="latitude">
                        <input type="hidden" name="longitude" id="longitude">
                        <input type="hidden" name="tipo" value="siva">
                        <input type="hidden" id="idrua" name="idrua">
                        <input type="hidden" name="protocolocad" id="protocolocad">
                    </div>


                    <div class="form-group text-center">
                        <div class="col-md-12">
                        <button type="submit" style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                            echo 'display: none;';
                        } ?>" accesskey="G" data-toggle="tooltip" title="GRAVAR OS DADOS"
                                class="btn btn-labeled btn-success mb-2 mr-sm-4"><span class="btn-label"><i
                                        class="glyphicon glyphicon-floppy-disk"></i></span> <u>G</u>RAVAR
                        </button>
                        <button type="submit" accesskey="S" id="suvis" value="suvis"
                                onclick="javascript:enviaForm(this.id);" class="btn btn-labeled btn-warning mb-2 mr-sm-4"
                                data-toggle="tooltip" title="SV2 SUVIS"><span class="btn-label"><i
                                        class="glyphicon glyphicon-plus-sign"></i>&nbsp;&nbsp;</span> <u>S</u>UVIS&nbsp;&nbsp;&nbsp;
                        </button>
                        <button type="submit" accesskey="O" id="outros" value="outros"
                                onclick="javascript:enviaForm(this.id);" class="btn btn-labeled btn-danger mb-2 mr-sm-4"
                                data-toggle="tooltip" title="SV2 OUTROS"><span class="btn-label"><i
                                        class="glyphicon glyphicon-plus-sign"></i></span>&nbsp;<u>O</u>UTRO&nbsp;
                        </button>
                        <button type="submit" accesskey="V" name="siva-outros" value="siva-outros" id="siva-outros"
                                onclick="javascript:enviaForm(this.id);" class="btn btn-labeled btn-default mb-2 mr-sm-4"
                                data-toggle="tooltip" title="SV2 SIVA OUTROS">
                                <span class="verm"><span class="btn-label"><i class="glyphicon glyphicon-pencil"></i></span></span>SI<u>V</u>A&nbsp;<span class="verm">OUT</span>
                        </button>
                        <button type="submit" accesskey="U" name="surto" value="surto" id="surto"
                                onclick="javascript:enviaForm(this.id);" class="btn btn-labeled btn-primary mb-2 mr-sm-4"
                                data-toggle="tooltip" title="SV2 SURTO"><span class="btn-label"><i
                                        class="glyphicon glyphicon-plus-sign"></i></span>&nbsp;&nbsp;S<u>U</u>RTO&nbsp;
                        </button>
                        <a href='suvisjt.php?pag=list-sv2'
                        <button type='button' data-toggle="tooltip" title="LISTAR REGISTROS" accesskey="L"
                                class="btn btn-labeled btn-info mb-2 mr-sm-4"><span class="btn-label"><i
                                        class="glyphicon glyphicon-list"></i></span> &nbsp;<u>L</u>ISTAR&nbsp;&nbsp;
                        </button>
                        </a>
                        </div>
                    </div>
                </form>
            </fieldset>
        </div>
    </div>
</div>
