<!-- Este projeto é desenvolvido na Suvis Jaçanã-Tremembé com iniciativa dos colaboradores da Unidade -->
<!-- Código desenvolvido por Rodolfo Romaioli Ribeiro de Jesus - rodolfo.romaioli@gmail.com -->
<!-- Sisdam Web - 2.0 - 2017 - Todos os direitos reservados -->

<?php
error_reporting(0);
include_once '../../locked/seguranca.php';
include_once '../../conecta.php';
?>

<?php

$id = $_GET['id'];

$consulta_sinan = "SELECT * FROM sv2 WHERE id='$id'";
$resultado_sinan = $conectar->query($consulta_sinan);
$editar_sinan_suvis = mysqli_fetch_assoc($resultado_sinan);

?>

<div class="container theme-showcase" role="main" xmlns="http://www.w3.org/1999/html">
    <!-- Página de Título -->
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <ol class="breadcrumb">
                    <li><i class="fa fa-database"></i> <a href="suvisjt.php">Sisdam Web</a></li>
                    <li class="active">Detalhes Sv2</li>
                </ol>
                <button type="button" class="btn btn-info btn-lg btn-block">DETALHES SV2
                    - <?php echo $editar_sinan_suvis['doencanot']; ?></button>
            </div>
        </div>
    </div>
    <!-- Fim da Página de Título -->
    <div class="row">
        <div class="col-md-12">
            <form class="form-horizontal">

                <fieldset disabled>
                    <div class="form-group">
                        <label for="inputSinan" class="col-sm-1 control-label">SINAN</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" data-toggle="tooltip"
                                   title="O sinan deve ter 7 numeros" required name="sinan"
                                   style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                                       echo 'display: none;';
                                   } ?>" id="sinancad" size="7" maxlength="7" placeholder="0000000" autofocus
                                   value="<?php echo $editar_sinan_suvis['sinan']; ?>">
                        </div>

                        <label for="inputDataNot" class="col-sm-2 control-label">NOTIFICAÇÃO</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" data-toggle="tooltip"
                                   title="Não pode ser maior que hoje" required name="datanot"
                                   style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                                       echo 'display: none;';
                                   } ?>" id="datanotcad" placeholder="00/00/0000"
                                   value="<?php echo $editar_sinan_suvis['datanot']; ?>">
                        </div>


                        <label for="inputDataEntrada" class="col-sm-1 control-label">ENTRADA</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" class="form-control" data-toggle="tooltip"
                                   title="Maior que Data de Notificação" required name="dataentrada"
                                   style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                                       echo 'display: none;';
                                   } ?>" id="dataentcad" placeholder="00/00/0000"
                                   value="<?php echo $editar_sinan_suvis['dataentrada']; ?>">
                        </div>

                        <label for="inputSe" class="col-sm-1 control-label">SE</label>
                        <div class="col-sm-1">
                            <input type="text" class="form-control" data-toggle="tooltip"
                                   title="Preenchimento Automático" readonly name="se"
                                   style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                                       echo 'display: none;';
                                   } ?>" id="se" value="<?php echo $editar_sinan_suvis['se']; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputDoencaNot" class="col-sm-1 control-label">AGRAVO</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control doencanot" data-toggle="tooltip"
                                   title="Ex: Dengue , Tuberculose ..." required name="doencanot"
                                   style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                                       echo 'display: none;';
                                   } ?>" placeholder="DOENÇA OU AGRAVO" onchange="upperCaseF(this)"
                                   value="<?php echo $editar_sinan_suvis['doencanot']; ?>">
                        </div>

                        <label for="inputLocalAte" class="col-sm-1 control-label">ATENDIDO</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control localate" data-toggle="tooltip"
                                   title="Ex: Hospital, Ama, Ubs ...." required name="localate"
                                   style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                                       echo 'display: none;';
                                   } ?>" placeholder="LOCAL DE ATENDIMENTO" onchange="upperCaseF(this)"
                                   value="<?php echo $editar_sinan_suvis['localate']; ?>">
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="inputOcorrencia" class="col-sm-1 control-label"
                               style="<?php if ($editar_sinan_suvis['ocorrencia'] == NULL) {
                                   echo 'display: none;';
                               } ?>">L. OCOR.</label>
                        <div class="col-sm-4" style="<?php if ($editar_sinan_suvis['ocorrencia'] == NULL) {
                            echo 'display: none;';
                        } ?>">
                            <input type="text" class="form-control ocorrencia" data-toggle="tooltip"
                                   title="Ex: Residência, Asilo, Hospital ..." name="ocorrencia" required
                                   style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                                       echo 'display: none;';
                                   } ?>" placeholder="RESIDENCIA , ASILO, HOSPITAL" onchange="upperCaseF(this)"
                                   value="<?php echo $editar_sinan_suvis['ocorrencia']; ?>">
                        </div>

                        <label for="inputNome" class="col-sm-1 control-label"
                               style="<?php if ($editar_sinan_suvis['nome'] == NULL) {
                                   echo 'display: none;';
                               } ?>">NOME</label>
                        <div class="col-sm-4" style="<?php if ($editar_sinan_suvis['nome'] == NULL) {
                            echo 'display: none;';
                        } ?>">
                            <input type="text" class="form-control" data-toggle="tooltip" title="Ex: João da Silva ..."
                                   name="nome" required style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                                echo 'display: none;';
                            } ?>" id="nomecad" placeholder="NOME , SOBRENOME" onchange="upperCaseF(this)"
                                   value="<?php echo $editar_sinan_suvis['nome']; ?>">
                        </div>

                        <label for="inputSexo" class="col-sm-1 control-label"
                               style="<?php if ($editar_sinan_suvis['nome'] == NULL) {
                                   echo 'display: none;';
                               } ?>">SEXO</label>
                        <div class="col-sm-1" style="<?php if ($editar_sinan_suvis['nome'] == NULL) {
                            echo 'display: none;';
                        } ?>">
                            <input type="text" class="form-control" data-toggle="tooltip" title="Ex: F, M ou I"
                                   name="sexo" required style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                                echo 'display: none;';
                            } ?>" id="sexo" placeholder="F" onchange="upperCaseF(this)"
                                   value="<?php echo $editar_sinan_suvis['sexo']; ?>">
                        </div>

                        <label for="inputDataEntrada" class="col-sm-1 control-label"
                               style="<?php if ($editar_sinan_suvis['nome'] == NULL) {
                                   echo 'display: none;';
                               } ?>">IDADE</label>
                        <div class="col-sm-1" style="<?php if ($editar_sinan_suvis['nome'] == NULL) {
                            echo 'display: none;';
                        } ?>">
                            <input type="text" class="form-control" data-toggle="tooltip" title="Ex: 01A" name="idade"
                                   style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                                       echo 'display: none;';
                                   } ?>" id="idade" placeholder="000A" onchange="upperCaseF(this)"
                                   value="<?php echo $editar_sinan_suvis['idade']; ?>">
                        </div>

                        <label for="inputTelefone" class="col-sm-1 control-label"
                               style="<?php if ($editar_sinan_suvis['nome'] == NULL) {
                                   echo 'display: none;';
                               } ?>">TELEFONE</label>
                        <label for="inputTelefone" class="col-sm-5 control-label"
                               style="<?php if ($editar_sinan_suvis['ocorrencia'] == NULL) {
                                   echo 'display: none;';
                               } ?>">TELEFONE</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" data-toggle="tooltip" title="Ex:(00)00000000"
                                   name="tel" style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                                echo 'display: none;';
                            } ?>" id="telcad" maxlength="15" placeholder="(11)99999-9999"
                                   value="<?php echo $editar_sinan_suvis['tel']; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputRua" class="col-sm-1 control-label">ENDEREÇO</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control rua" name="rua" data-toggle="tooltip"
                                   title="Ex: Francisco Rodrigues ..." required
                                   style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                                       echo 'display: none;';
                                   } ?>" id="ruaselect" placeholder="NOME DO ENDEREÇO" onchange="upperCaseF(this)"
                                   value="<?php echo utf8_encode($editar_sinan_suvis['rua']); ?>">
                        </div>

                        <label for="inputN" class="col-sm-2 control-label">N</label>
                        <div class="col-sm-1">
                            <input type="text" class="form-control" name="num" data-toggle="tooltip" title="Ex: 120 ..."
                                   required style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                                echo 'display: none;';
                            } ?>" id="numcomp" placeholder="Nº" maxlength="6" onchange="upperCaseF(this)"
                                   value="<?php echo $editar_sinan_suvis['num']; ?>">
                        </div>

                        <label for="inputComp" class="col-sm-1 control-label">COMP</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="comp" data-toggle="tooltip"
                                   title="Ex: Casa 01" style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                                echo 'display: none;';
                            } ?>" placeholder="CASA , APTO" onchange="upperCaseF(this)"
                                   value="<?php echo $editar_sinan_suvis['comp']; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputCep" class="col-sm-1 control-label">CEP</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" required name="cep" data-toggle="tooltip"
                                   title="Preenchimento Automático"
                                   style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                                       echo 'display: none;';
                                   } ?>" readonly id="cepcad" maxlength="9" placeholder="00000-000"
                                   value="<?php echo $editar_sinan_suvis['cep']; ?>">
                        </div>

                        <label for="inputLog" class="col-sm-1 control-label">LOG</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" required data-toggle="tooltip"
                                   title="Preenchimento Automático" readonly name="log"
                                   style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                                       echo 'display: none;';
                                   } ?>" id="log" placeholder="RUA , AVENIDA" onchange="upperCaseF(this)"
                                   value="<?php echo $editar_sinan_suvis['log']; ?>">
                        </div>

                        <label for="inputBairro" class="col-sm-1 control-label">BAIRRO</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" required data-toggle="tooltip"
                                   title="Preenchimento Automático" readonly id="bairro" name="bairro"
                                   style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                                       echo 'display: none;';
                                   } ?>" placeholder="BAIRRO" onchange="upperCaseF(this)"
                                   value="<?php echo $editar_sinan_suvis['bairro']; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputLocalVd" class="col-sm-1 control-label">UBS REF</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" required data-toggle="tooltip"
                                   title="Preenchimento Automático" data-toggle="tooltip"
                                   title="Preenchimento Automático" readonly id="localvd" name="localvd"
                                   style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                                       echo 'display: none;';
                                   } ?>" placeholder="UBS DE ABRANGÊNCIA" onchange="upperCaseF(this)"
                                   value="<?php echo $editar_sinan_suvis['localvd']; ?>">
                        </div>

                        <label for="inputSuvis" class="col-sm-1 control-label">SUVIS</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" required data-toggle="tooltip"
                                   title="Preenchimento Automático" readonly id="suvis" name="suvis"
                                   style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                                       echo 'display: none;';
                                   } ?>" placeholder="JAÇANÃ-TREMEMBÉ" onchange="upperCaseF(this)"
                                   value="<?php echo $editar_sinan_suvis['suvis']; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputCidade" class="col-sm-1 control-label">CIDADE</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" required data-toggle="tooltip"
                                   title="Preenchimento Automático" readonly id="cidade" name="cidade"
                                   style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                                       echo 'display: none;';
                                   } ?>" placeholder="SÃO PAULO" onchange="upperCaseF(this)"
                                   value="<?php echo $editar_sinan_suvis['cidade']; ?>">
                        </div>

                        <label for="inputDataObito" class="col-sm-4 control-label">ÓBITO</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" data-toggle="tooltip"
                                   title="Não pode ser maior que hoje" name="dataobito"
                                   style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                                       echo 'display: none;';
                                   } ?>" id="dataobitocad" placeholder="00/00/0000"
                                   value="<?php echo $editar_sinan_suvis['dataobito']; ?>">
                        </div>
                    </div>
                </fieldset>

                <div class="form-group text-center">
                    <input type="hidden" name="id" value="<?php echo $editar_sinan_suvis['id']; ?>">
                    <a href='suvisjt.php?pag=edit-sv2-suvis&id=<?php echo $editar_sinan_suvis['id']; ?>'>
                        <button type="button" style="<?php if ($_SESSION['usuarioNivelAcesso'] == 0) {
                            echo 'display: none;';
                        } ?>" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span>SUVIS
                        </button>
                    </a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href='suvisjt.php?pag=edit-sv2-outros&id=<?php echo $editar_sinan_suvis['id']; ?>'>
                        <button type="button" style="<?php if ($_SESSION['usuarioNivelAcesso'] == 0) {
                            echo 'display: none;';
                        } ?>" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span>OUTRO
                        </button>
                    </a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href='suvisjt.php?pag=edit-sv2-siva&id=<?php echo $editar_sinan_suvis['id']; ?>'>
                        <button type="button" style="<?php if ($_SESSION['usuarioNivelAcesso'] == 0) {
                            echo 'display: none;';
                        } ?>" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span>SIVA
                        </button>
                    </a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href='suvisjt.php?pag=edit-sv2-surto&id=<?php echo $editar_sinan_suvis['id']; ?>'>
                        <button type="button" style="<?php if ($_SESSION['usuarioNivelAcesso'] == 0) {
                            echo 'display: none;';
                        } ?>" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span>SURTO
                        </button>
                    </a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href='suvisjt.php?pag=list-sv2'
                    <button type='button' style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                        echo 'display: none;';
                    } ?>" data-toggle="tooltip" title="SAIR DO FORMULÁRIO" accesskey="S" class="btn btn-danger"><span
                                class="glyphicon glyphicon-remove"></span> <u>S</u>AIR
                    </button>
                    </a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <button type="button" class='btn btn-danger'
                            style="<?php if ($_SESSION['usuarioNivelAcesso'] <> 1) {
                                echo 'display: none;';
                            } ?>" data-toggle="modal" data-target="#myModal<?php echo $editar_sinan_suvis['id']; ?>">
                        <span class="glyphicon glyphicon-trash"></span></button>
                </div>

                <!-- Inicio Modal Detalhes-->

                <div class="modal fade" id="myModal<?php echo $editar_sinan_suvis['id']; ?>" tabindex="-1" role="dialog"
                     aria-labelledby="myLargeModalLabel">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title text-center" id="myModalLabel">SisdamJT Web</h4>
                            </div>

                            <div class="modal-body">
                                <div class="row">
                                    <div class="text-center">
                                        <h4>Deseja apagar o</h4>
                                        <h4>Sv2 : <?php echo $editar_sinan_suvis["nome"] ?> ? </h4>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <div class="text-center">
                                    <a href='suvisjt.php?pag=del-sisdamweb&form=sv2&id=<?php echo $editar_sinan_suvis['id']; ?>'>
                                        <button type="button" class="btn btn-success">SIM</button>
                                    </a>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">NÃO</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <!-- Fim Modal Detalhes -->
        </form>
    </div>
</div>
</div>