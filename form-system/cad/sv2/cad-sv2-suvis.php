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
$atual= mysqli_real_escape_string($conectar,$_POST["atual"]);

?>


<script type="text/javascript">
    $(document).ready(function() {
        $('.close').click(function(event){
            $('#ModalIdade').fadeOut();
            event.preventDefault();
        });

        $(document).ready(function() {
            var ls = localStorage.getItem("modal");
            if(!ls){
                $('#ModalIdade').modal('show');
            }
        })

        $('#ModalIdade').on('shown.bs.modal', function(){
            localStorage.setItem("modal", false);
        });
    });
</script>


<script type="text/javascript">
    function enviaForm(idBotao) {
        var form = document.forms[0];
        if (idBotao == 'outros') {
            form.action = "suvisjt.php?pag=cad-sv2-outros";
        }
        if (idBotao == 'siva') {
            form.action = "suvisjt.php?pag=cad-sv2-siva";
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


<!-- Inicio Modal Novos Casos-->
<div class="modal fade" id="ModalIdade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header-del">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center" id="ModalIdadeLabel">SisdamJT Web</h4>
            </div>

            <div class="modal-body"><div class="row"><div class="text-center">
                        <h4>ALTERAÇÃO NO CAMPO: <strong>IDADE</strong><h4>
                                <h4>FAVOR INSERIR <strong>3 DÍGITOS + A</strong> </h4>
                                <h4>CASO APRESENTE ERRO, APAGUE O</h4>
                                <h4><strong>HISTÓRICO DE NAVEGAÇÃO</strong></h4>
                                <h4>EXEMPLO:</h4>
                                <h4><strong>IDADE: 099A</strong> OU <strong> 001M</strong></h4>

                    </div></div></div>

            <div class="modal-footer"><div class="text-center">
                    <button type="button" class="btn btn-success" data-dismiss="modal">OK</button>
                </div></div>
        </div>
    </div>
</div>
<!-- Fim Modal Novos casos -->

<div class="container theme-showcase" role="main" xmlns="http://www.w3.org/1999/html">

    <!-- Página de Título -->
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <ol class="breadcrumb">
                    <li><i class="fa fa-database"></i> <a href="suvisjt.php">Sisdam Web</a></li>
                    <li class="active">Sv2 Uvis <?php echo $today = date("Y");   ?> </li>
                </ol>
                <button type="button" class="btn btn-success btn-lg btn-block">CADASTRO SV2 - UVIS <?php echo $today = date("Y");   ?> </button>
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
                <form class="form-horizontal" id="cadastro_sv2" method="POST"
                      action="suvisjt.php?pag=proc-cad-sv2">

                    <div class="form-group">
                        <label for="inputSinan" class="col-sm-1 control-label">SINAN</label>
                        <div class="col-sm-2">
                            <input tabindex="1" type="number" class="form-control" data-toggle="tooltip"
                                   title="O sinan deve ter 7 numeros" name="sinan" id="sinancad" size="7"
                                   placeholder="0000000" value="<?php echo $sinan ?>" autofocus>
                        </div>

                        <label for="inputSinan" class="col-sm-1 control-label">PROT. COVID</label>
                        <div class="col-sm-2">
                            <input type="number" tabindex="2" class="form-control" data-toggle="tooltip"
                                   title="O protocolo deve ter 12 numeros" name="protocolocad" id="protocolocad" size="12"
                                   placeholder="000000000000" value="<?php echo $protocolo ?>">
                        </div>

                        <label for="inputDataNot" class="col-sm-1 control-label">NOTIFICAÇÃO</label>
                        <div class="col-sm-2">
                            <input tabindex="3" type="text" class="form-control" data-toggle="tooltip"
                                   title="Não pode ser maior que hoje" name="datanot" id="datanotcad"
                                   placeholder="00/00/0000" value="<?php echo $datanot ?>">
                        </div>


                        <label for="inputDataEntrada" class="col-sm-1 control-label">ENTRADA</label>
                        <div class="col-sm-2">
                            <input tabindex="4" type="text" class="form-control" data-toggle="tooltip"
                                   title="Maior que Data de Notificação" name="dataentrada" id="dataentcad"
                                   placeholder="00/00/0000" value="<?php echo $dataentrada ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputSe" class="col-sm-1 control-label">SE ENT.</label>
                        <div class="col-sm-1">
                            <input type="text" class="form-control" data-toggle="tooltip"
                                   title="Preenchimento Automático" readonly name="se" id="se"
                                   value="<?php echo $se ?>">
                        </div>

                        <label for="inputAgravo" class="col-sm-1 control-label">AGRAVO</label>
                        <div class="col-sm-4">
                            <input tabindex="5" type="text" class="form-control agravo" data-toggle="tooltip"
                                   title="Ex: Dengue , Tuberculose ..." name="agravo" id="agravo" placeholder="DOENÇA OU AGRAVO"
                                   onchange="upperCaseF(this)" value="<?php echo $agravo ?>">
                        </div>

                        <label for="inputLocalAte" class="col-sm-1 control-label">ATENDIDO</label>
                        <div class="col-sm-4">
                            <input tabindex="6" type="text" class="form-control localate" data-toggle="tooltip"
                                   title="Ex: Hospital, Ama, Ubs ...." name="localate"
                                   placeholder="LOCAL DE ATENDIMENTO" onchange="upperCaseF(this)"
                                   value="<?php echo $localate ?>">
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="inputNome" class="col-sm-1 control-label">NOME</label>
                        <div class="col-sm-4">
                            <input type="text" tabindex="7" class="form-control" data-toggle="tooltip" title="Ex: João da Silva ..."
                                   name="nome" id="nomecad" placeholder="NOME , SOBRENOME" onchange="upperCaseF(this)"
                                   value="<?php echo $nome ?>">
                        </div>

                        <label for="inputSexo" class="col-sm-1 control-label">SEXO</label>
                        <div class="col-sm-1">
                            <input tabindex="8" type="text" class="form-control" data-toggle="tooltip" title="Ex: F, M ou I"
                                   name="sexo" id="sexo" placeholder="F" onchange="upperCaseF(this)"
                                   value="<?php echo $sexo ?>">
                        </div>

                        <label for="inputDataEntrada" class="col-sm-1 control-label">IDADE</label>
                        <div class="col-sm-1">
                            <input type="text" tabindex="9" class="form-control" data-toggle="tooltip" title="Ex: 01A" name="idade"
                                   id="idade" placeholder="000A" onchange="upperCaseF(this)"
                                   value="<?php echo $idade ?>">
                        </div>

                        <label for="inputTelefone" class="col-sm-1 control-label">TELEFONE</label>
                        <div class="col-sm-2">
                            <input type="text" tabindex="10" class="form-control" data-toggle="tooltip" title="Ex:(00)00000000"
                                   name="tel" id="telcad" maxlength="15" placeholder="(11)99999-9999"
                                   value="<?php echo $tel ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputRua" class="col-sm-1 control-label">ENDEREÇO</label>
                        <div class="col-sm-5">
                            <input type="text" tabindex="11" class="form-control rua" name="rua" data-toggle="tooltip"
                                   title="Ex: Francisco Rodrigues ..." id="ruaselect" placeholder="NOME DO ENDEREÇO"
                                   onchange="upperCaseF(this)" value="<?php echo $rua ?>">
                        </div>

                        <label for="inputN" class="col-sm-2 control-label">N</label>
                        <div class="col-sm-1">
                            <input type="text" tabindex="12" class="form-control" name="num" data-toggle="tooltip" title="Ex: 120 ..."
                                   id="numcomp" placeholder="Nº" maxlength="6" onchange="upperCaseF(this)"
                                   value="<?php echo $num ?>">
                        </div>

                        <label for="inputComp" class="col-sm-1 control-label">COMP</label>
                        <div class="col-sm-2">
                            <input tabindex="13" type="text" class="form-control" name="comp" data-toggle="tooltip"
                                   title="Ex: Casa 01" placeholder="CASA , APTO" onchange="upperCaseF(this)"
                                   value="<?php echo $comp ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputCep" class="col-sm-1 control-label">CEP</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="cep" data-toggle="tooltip"
                                   title="Preenchimento Automático" readonly id="cepcad" maxlength="9"
                                   placeholder="00000-000">
                        </div>

                        <label for="inputLog" class="col-sm-1 control-label">LOG</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" data-toggle="tooltip"
                                   title="Preenchimento Automático" readonly name="log" id="log"
                                   placeholder="RUA , AVENIDA" onchange="upperCaseF(this)">
                        </div>

                        <label for="inputBairro" class="col-sm-1 control-label">BAIRRO</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" data-toggle="tooltip"
                                   title="Preenchimento Automático" readonly id="bairro" name="bairro"
                                   placeholder="BAIRRO" onchange="upperCaseF(this)">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputLocalVd" class="col-sm-1 control-label">UBS REF</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" data-toggle="tooltip"
                                   title="Preenchimento Automático" readonly id="localvd" name="localvd"
                                   placeholder="UBS DE ABRANGÊNCIA" onchange="upperCaseF(this)">
                        </div>

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

                        <label for="inputDataObito" class="col-sm-2 control-label">ÓBITO</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" data-toggle="tooltip"
                                   title="Não pode ser maior que hoje" name="dataobito" id="dataobitocad"
                                   placeholder="00/00/0000" value="<?php echo $dataobito ?>">
                        </div>
                        <input type="hidden" name="latitude" id="latitude">
                        <input type="hidden" name="longitude" id="longitude">
                        <input type="hidden" name="tipo" value="suvis">
                        <input type="hidden" id="idrua" name="idrua">
                    </div>

                    <div class="form-group text-center">
                        <div class="col-sm-12">
                            <button tabindex="14" type="submit" style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                                echo 'display: none;';
                            } ?>" accesskey="G" data-toggle="tooltip" title="GRAVAR OS DADOS"
                                    class="btn btn-labeled btn-success mb-2 mr-sm-4"><span class="btn-label"><i
                                            class="fa fa-floppy-o"></i></span> <u>G</u>RAVAR&nbsp;
                            </button>
                            <button type="submit" accesskey="O" id="outros" value="outros"
                                    onclick="javascript:enviaForm(this.id);" class="btn btn-labeled btn-danger mb-2 mr-sm-4"
                                    data-toggle="tooltip" title="SV2 OUTROS"><span class="btn-label"><i
                                            class="glyphicon glyphicon-plus-sign"></i></span>&nbsp;<u>O</u>UTRO&nbsp;&nbsp;&nbsp;
                            </button>
                            <button type="submit" accesskey="I" name="siva" value="siva" id="siva"
                                    onclick="javascript:enviaForm(this.id);" class="btn btn-labeled btn-default mb-2 mr-sm-4"
                                    data-toggle="tooltip" title="SV2 SIVA"><span class="btn-label"><i
                                            class="glyphicon glyphicon-plus-sign"></i></span>&nbsp;&nbsp;&nbsp;&nbsp;S<u>I</u>VA&nbsp;&nbsp;&nbsp;&nbsp;
                            </button>

                            <button type="submit" accesskey="V" name="siva-outros" value="siva-outros" id="siva-outros"
                                    onclick="javascript:enviaForm(this.id);" class="btn btn-labeled btn-default mb-2 mr-sm-4"
                                    data-toggle="tooltip" title="SV2 SIVA OUTROS">
                                <span class="verm"><span class="btn-label"><i class="glyphicon glyphicon-pencil"></i></span></span>SI<u>V</u>A&nbsp;<span class="verm">OUT</span>
                            </button>

                            <button type="submit" accesskey="U" name="surto" value="surto" id="surto"
                                    onclick="javascript:enviaForm(this.id);" class="btn btn-labeled btn-primary mb-2 mr-sm-4"
                                    data-toggle="tooltip" title="SV2 SURTO"><span class="btn-label"><i
                                            class="glyphicon glyphicon-plus-sign"></i></span>&nbsp;S<u>U</u>RTO&nbsp;&nbsp;
                            </button>
                            <a href='suvisjt.php?pag=list-sv2' role='button' data-toggle="tooltip" title="LISTAR REGISTROS" accesskey="L"
                               class="btn btn-labeled btn-info mb-2 mr-sm-4"><span class="btn-label"><i
                                            class="glyphicon glyphicon-list"></i></span> &nbsp;<u>L</u>ISTAR&nbsp;&nbsp;</a>

                        </div>
                    </div>
                </form>
            </fieldset>
        </div>
    </div>
</div>
