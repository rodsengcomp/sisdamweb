<!-- Este projeto é desenvolvido na Suvis Jaçanã-Tremembé com iniciativa dos colaboradores da Unidade -->
<!-- Código desenvolvido por Rodolfo Romaioli Ribeiro de Jesus - rodolfo.romaioli@gmail.com -->
<!-- Sisdam Web - 2.0 - 2017 - Todos os direitos reservados -->

<?php
error_reporting(0);
include_once '../../../locked/seguranca.php';
include_once '../../../conecta.php';
?>

<?php

$id = $_GET['id'];
$year = $_GET['year'] ?? 'atual';

if($year == 'atual'):
    $sv2 = 'sv2';
    $list = 'list-sv2';
    $edit = '';
else:
    $sv2 = 'sv2_'.$year;
    $list = 'list-sv2-arquivo&year='.$year;
    $edit = '&year='.$year;
endif;

$consulta_sinan = "SELECT * FROM $sv2 WHERE id='$id'";
$resultado_sinan = $conectar->query($consulta_sinan);
$editar_sinan_siva_outros = mysqli_fetch_assoc($resultado_sinan);

?>

<div class="container theme-showcase" role="main" xmlns="http://www.w3.org/1999/html">
    <!-- Página de Título -->
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <ol class="breadcrumb">
                    <li><i class="fa fa-database"></i> <a href="suvisjt.php">Sisdam Web</a>
                    </li>
                    <li class="active">Edição Sv2 Siva Outros</li>
                </ol>
                <button type="button" class="btn btn-default btn-lg btn-block">EDITAR SV2 - SIVA - OUTROS - <?php if($year == 'atual'): echo date('Y');else:echo $year;endif;?> <span
                            class="verm">(NÃO PERTENCENTE A SUVIS JAÇANÃ/TREMEMBÉ)</span></button>
            </div>
        </div>
    </div>
    <!-- Fim da Página de Título -->

    <div class="form-group text-center" style="<?php if ($_SESSION['usuarioNivelAcesso'] < 3) {
        echo 'display: none;';
    } ?>">
        <div class="alert alert-danger text-center" id="usuariook" role="alert"><strong>SEU NÍVEL DE USUÁRIO NÃO PERMITE
                EDITAR !!!</strong></div>
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
            <fieldset <?php if ($_SESSION['usuarioNivelAcesso'] == "") {
                echo 'disabled';
            } ?>>
                <form class="form-horizontal" id="edicao_sv2_siva_outros" method="POST"
                      action="suvisjt.php?pag=proc-edit-sv2">

                    <div class="form-group">
                        <label for="inputSinan" class="col-sm-1 control-label">SINAN</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" readonly data-toggle="tooltip"
                                   title="O sinan deve ter 7 numeros" name="sinan"
                                   style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                                       echo 'display: none;';
                                   } ?>" id="sinancad" size="7" maxlength="7" placeholder="0000000" autofocus
                                   value="0000000">
                        </div>

                        <label for="inputDataNot" class="col-sm-2 control-label">NOTIFICAÇÃO</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" data-toggle="tooltip"
                                   title="Não pode ser maior que hoje" required name="datanot"
                                   style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                                       echo 'display: none;';
                                   } ?>" id="datanotcad" placeholder="00/00/0000"
                                   value="<?php echo $editar_sinan_siva_outros['datanot']; ?>">
                        </div>

                        <label for="inputDataEntrada" class="col-sm-1 control-label">ENTRADA</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="dataentrada"
                                   style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                                       echo 'display: none;';
                                   } ?>" id="dataentcad" placeholder="00/00/0000"
                                   value="<?php echo $editar_sinan_siva_outros['dataentrada']; ?>">
                        </div>

                        <label for="inputSe" class="col-sm-1 control-label">SE</label>
                        <div class="col-sm-1">
                            <input type="text" class="form-control" data-toggle="tooltip"
                                   title="Preenchimento Automático" readonly name="se"
                                   style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                                       echo 'display: none;';
                                   } ?>" id="se" value="<?php echo $editar_sinan_siva_outros['se']; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputDoencaNot" class="col-sm-1 control-label">AGRAVO</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control agravosiva" data-toggle="tooltip"
                                   title="Ex: Dengue , Tuberculose ..." required name="agravo"
                                   style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                                       echo 'display: none;';
                                   } ?>" onchange="upperCaseF(this)"
                                   value="<?php echo $editar_sinan_siva_outros['agravo']; ?>">
                        </div>

                        <label for="inputLocalAte" class="col-sm-2 control-label">ATENDIDO</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control localate" data-toggle="tooltip"
                                   title="Ex: Hospital, Ama, Ubs ...." required name="localate"
                                   style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                                       echo 'display: none;';
                                   } ?>" placeholder="LOCAL DE ATENDIMENTO" onchange="upperCaseF(this)"
                                   value="<?php echo $editar_sinan_siva_outros['localate']; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputNome" class="col-sm-1 control-label">NOME</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" data-toggle="tooltip" title="Ex: João da Silva ..."
                                   required name="nome" style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                                echo 'display: none;';
                            } ?>" id="nomecad" placeholder="NOME, SOBRENOME" onchange="upperCaseF(this)"
                                   value="<?php echo $editar_sinan_siva_outros['nome']; ?>">
                        </div>

                        <label for="inputSexo" class="col-sm-1 control-label">SEXO</label>
                        <div class="col-sm-1">
                            <input type="text" class="form-control" data-toggle="tooltip" title="Ex: F, M ou I"
                                   name="sexo" required style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                                echo 'display: none;';
                            } ?>" id="sexo" placeholder="F" onchange="upperCaseF(this)"
                                   value="<?php echo $editar_sinan_siva_outros['sexo']; ?>">
                        </div>

                        <label for="inputDataEntrada" class="col-sm-1 control-label">IDADE</label>
                        <div class="col-sm-1">
                            <input type="text" class="form-control" data-toggle="tooltip" title="Ex: 01A" name="idade"
                                   style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                                       echo 'display: none;';
                                   } ?>" id="idade" onchange="upperCaseF(this)"
                                   value="<?php echo $editar_sinan_siva_outros['idade']; ?>">
                        </div>

                        <label for="inputTelefone" class="col-sm-1 control-label">TELEFONE</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" data-toggle="tooltip" title="Ex:(00)00000000"
                                   name="tel" style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                                echo 'display: none;';
                            } ?>" id="telcad" maxlength="15" placeholder="(11)99999-9999"
                                   value="<?php echo $editar_sinan_siva_outros['tel']; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputLog" class="col-sm-1 control-label">LOG</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control log" data-toggle="tooltip"
                                   title="Ex: Rua, Avenida ..." required name="log"
                                   style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                                       echo 'display: none;';
                                   } ?>" id="log" placeholder="RUA, AVENIDA, VIELA" onchange="upperCaseF(this)"
                                   value="<?php echo $editar_sinan_siva_outros['log']; ?>">
                        </div>

                        <label for="inputRua" class="col-sm-1 control-label">ENDEREÇO</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" data-toggle="tooltip"
                                   title="Ex: Francisco Rodrigues ..." required name="ruaoutros"
                                   style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                                       echo 'display: none;';
                                   } ?>" placeholder="NOME DO ENDEREÇO" onchange="upperCaseF(this)"
                                   value="<?php echo utf8_encode($editar_sinan_siva_outros['rua']); ?>">
                        </div>

                        <label for="inputN" class="col-sm-1 control-label">N</label>
                        <div class="col-sm-1">
                            <input type="text" class="form-control" data-toggle="tooltip" title="Ex: 120" required
                                   name="num" style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                                echo 'display: none;';
                            } ?>" id="numcomp" placeholder="Nº" maxlength="6" onchange="upperCaseF(this)"
                                   value="<?php echo $editar_sinan_siva_outros['num']; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputComp" class="col-sm-1 control-label">COMP</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" data-toggle="tooltip" title="Ex: Casa 01, Apto ..."
                                   name="comp" style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                                echo 'display: none;';
                            } ?>" placeholder="CASA 01, APTO" onchange="upperCaseF(this)"
                                   value="<?php echo $editar_sinan_siva_outros['comp']; ?>">
                        </div>

                        <label for="inputCep" class="col-sm-1 control-label">CEP</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" data-toggle="tooltip" title="Ex:00000-000" required
                                   name="cep" style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                                echo 'display: none;';
                            } ?>" id="cepcad" maxlength="9" placeholder="00000-000"
                                   value="<?php echo $editar_sinan_siva_outros['cep']; ?>">
                        </div>

                        <label for="inputBairro" class="col-sm-1 control-label">BAIRRO</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" data-toggle="tooltip" title="Ex: Tatuapé ..."
                                   required id="bairro" style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                                echo 'display: none;';
                            } ?>" name="bairro" placeholder="NOME DO BAIRRO" onchange="upperCaseF(this)"
                                   value="<?php echo $editar_sinan_siva_outros['bairro']; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputLocalVd" class="col-sm-1 control-label">UBS REF</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control localvd" data-toggle="tooltip"
                               title="Ex: Ubs J Joamar, Outros ..." required id="localvd" style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                                       echo 'display: none;';
                                   } ?>" name="localvd" placeholder="LOCAL DA VISITA DOMICILIAR"
                                   onchange="upperCaseF(this)" value="<?php echo $editar_sinan_siva_outros['localvd']; ?>">
                        </div>

                        <label for="inputAtual" class="col-sm-1 control-label">ATUAL?</label>
                        <div class="col-sm-1">
                            <input type="text" class="form-control" required data-toggle="tooltip"
                                   title="Preenchimento Automático" readonly name="atual"
                                   style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                                       echo 'display: none;';
                                   } ?>" placeholder="???" value="NAO" onchange="upperCaseF(this)">
                        </div>

                        <label for="inputSuvis" class="col-sm-1 control-label">SUVIS</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control suvis" data-toggle="tooltip"
                                   title="Ex: Jabaquara/VilaMariana, Outros ..." required id="suvis" name="suvis"
                                   style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                                       echo 'display: none;';
                                   } ?>" placeholder="SUVIS DE ABRANGÊNCIA" onchange="upperCaseF(this)"
                                   value="<?php echo $editar_sinan_siva_outros['suvis']; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputCidade" class="col-sm-1 control-label">CIDADE</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control cidade" data-toggle="tooltip"
                                   title="Ex: Guarulhos, Outros ..." required id="cidade" name="cidade"
                                   style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                                       echo 'display: none;';
                                   } ?>" placeholder="CIDADE DO NOTIFICADO" onchange="upperCaseF(this)"
                                   value="<?php echo $editar_sinan_siva_outros['cidade']; ?>">
                        </div>

                        <label for="inputDataObito" class="col-sm-4 control-label">ÓBITO</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" data-toggle="tooltip"
                                   title="Não pode ser maior que hoje" name="dataobito"
                                   style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                                       echo 'display: none;';
                                   } ?>" id="dataobitocad" placeholder="00/00/0000"
                                   value="<?php echo $editar_sinan_siva_outros['dataobito']; ?>">
                        </div>
                        <input type="hidden" name="latitude" id="latitude" value="<?php echo $editar_sinan_siva_outros['latsv2']; ?>">
                        <input type="hidden" name="longitude" id="longitude" value="<?php echo $editar_sinan_siva_outros['longsv2']; ?>">
                        <input type="hidden" name="tipo" value="siva-outros">
                        <input type="hidden" name="year" value="<?=$year?>">
                    </div>

                    <div class="form-group text-center">
                        <input type="hidden" name="id" value="<?php echo $editar_sinan_siva_outros['id']; ?>">
                        <button type="submit" accesskey="G" style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                            echo 'display: none;';
                        } ?>" data-toggle="tooltip" title="GRAVAR OS DADOS" class="btn btn-labeled btn-success"><span
                                    class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span> <u>G</u>RAVAR
                        </button>&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href='suvisjt.php?pag=edit-sv2-suvis&id=<?=$editar_sinan_siva_outros['id'].$edit;?>'>
                            <button accesskey="S" type="button" style="<?php if ($_SESSION['usuarioNivelAcesso'] == 0) {
                                echo 'display: none;';
                            } ?>" data-toggle="tooltip" title="SV2 SUVIS" class="btn btn-labeled btn-warning"><span
                                        class="btn-label"><i class="glyphicon glyphicon-pencil"></i></span>&nbsp;&nbsp;&nbsp;<u>S</u>UVIS&nbsp;&nbsp;
                            </button>
                        </a>&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href='suvisjt.php?pag=edit-sv2-siva&id=<?=$editar_sinan_siva_outros['id'].$edit;?>'>
                            <button accesskey="I" type="button" style="<?php if ($_SESSION['usuarioNivelAcesso'] == 0) {
                                echo 'display: none;';
                            } ?>" data-toggle="tooltip" title="SV2 SIVA OUTROS" class="btn btn-labeled btn-default">
                                <span class="btn-label"><i class="glyphicon glyphicon-pencil"></i></span>&nbsp;&nbsp;&nbsp;S<u>I</u>VA&nbsp;&nbsp;
                            </button>
                        </a>&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href='suvisjt.php?pag=edit-sv2-surto&id=<?=$editar_sinan_siva_outros['id'].$edit;?>'>
                            <button accesskey="U" type="button" style="<?php if ($_SESSION['usuarioNivelAcesso'] == 0) {
                                echo 'display: none;';
                            } ?>" data-toggle="tooltip" title="SV2 SURTO" class="btn btn-labeled btn-primary"><span
                                        class="btn-label"><i
                                            class="glyphicon glyphicon-pencil"></i></span>&nbsp;S<u>U</u>RTO&nbsp;
                            </button>
                        </a>&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href='suvisjt.php?pag=<?=$list?>'
                        <button type='button' data-toggle="tooltip" title="LISTAR REGISTROS" accesskey="L"
                                class="btn btn-labeled btn-info"><span class="btn-label"><i
                                        class="glyphicon glyphicon-list"></i></span> <u>L</u>ISTAR
                        </button>
                        </a>&nbsp;&nbsp;&nbsp;&nbsp;
                        <button type="button" accesskey="A" class='btn btn-danger'
                                style="<?php if ($_SESSION['usuarioNivelAcesso'] <> 1) {
                                    echo 'display: none;';
                                } ?>" data-toggle="modal"
                                data-target="#myModal<?php echo $editar_sinan_siva_outros['id']; ?>"><span
                                    class="glyphicon glyphicon-trash"></span></button>
                    </div>

                    <!-- Inicio Modal Detalhes-->
                    <div class="modal fade" id="myModal<?php echo $editar_sinan_siva_outros['id']; ?>" tabindex="-1"
                         role="dialog" aria-labelledby="myLargeModalLabel">
                        <div class="modal-dialog modal-sm" role="document">
                            <div class="modal-content">
                                <div class="modal-header-del">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                                aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title text-center" id="myModalLabel">SisdamJT Web</h4>
                                </div>

                                <div class="modal-body">
                                    <div class="row">
                                        <div class="text-center">
                                            <h4>Deseja apagar o SV2 :</h4>
                                            <button type="button"
                                                    class="btn btn-danger btn-lg btn-block"><?php echo $editar_sinan_siva_outros['sinan'] ?></button>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <div class="text-center">
                                        <a href='suvisjt.php?pag=del-sisdamweb&form=sv2&id=<?php echo $editar_sinan_siva_outros['id']; ?>&sinan=<?php echo $editar_sinan_siva_outros['sinan']; ?>&agravo=<?php echo $editar_sinan_siva_outros['agravo']; ?>&nome=<?=$editar_sinan_siva_outros['nome'].'&form=sv2'.$edit;?>'>
                                            <button type="button" class="btn btn-success">SIM</button>
                                        </a>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">NÃO</button>
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
