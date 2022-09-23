<?php
error_reporting(1);
include_once '../../locked/seguranca.php';
include_once '../../conecta.php';

// Recebe os dados enviados pela submissão
$id = (isset($_GET['id'])) ? $_GET['id'] : '';

$cs_stm_medc_ent = $conectar->query("SELECT * FROM esporo_an_ent_medc WHERE id_esp_ent = '$id'");
$edit_medc_ant = mysqli_fetch_assoc($cs_stm_medc_ent);

$id_med = $edit_medc_ant['nm_esp_medc'];
$cs_stm_medc = $conectar->query("SELECT * FROM esporo_medc WHERE id_med_esp = $id_med");
$edit_medc = mysqli_fetch_assoc($cs_stm_medc);


?>

<div class="container theme-showcase" role="main" xmlns="http://www.w3.org/1999/html">

    <!-- Pagina de Titulo -->
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">

                <button type="button" class="btn btn-warning btn-labeled btn-lg btn-block"><span class="btn-label"><i
                                class="glyphicon glyphicon-pencil"></i></span>EDITAR ESPOROTRICOSE ANIMAL</button>
            </div>
        </div>
    </div>
    <!-- Fim da Pagina de Titulo -->

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
        if (isset($_SESSION['msgedit'])) :
            echo $_SESSION['msgedit'];
            unset($_SESSION['msgedit']);
        endif;
        ?>
    </div>

    <div class="row">

        <div class="col-md-12">
            <fieldset <?php
            if ($_SESSION['usuarioNivelAcesso'] == "") {
                echo 'disabled';

            } ?>>
                <form class="form-horizontal" id="edit-medicamento-esporo-animal" method="POST" action="suvisjt.php?pag=proc-edit-esporo-animal">


                    <div class="form-group">
                        <label for="inputDataEntrada" class="col-sm-1 control-label">ENTRADA</label>
                        <div class="col-sm-2"><input autofocus tabindex="1" type="text" class="form-control" data-toggle="tooltip"
                                                     title="Data da 1ª entrega" name="dataentrada" id="dataentcad" placeholder="00/00/0000" value="<?=date('d-m-Y', strtotime($edit_medc_ant['dt_cadastro']));?>"></div>

                        <label for="inputMedicamento" class="col-sm-1 control-label">MEDICAMEN.</label>
                        <div class="col-sm-2"><input type="text" data-toggle="tooltip" title="Nome do Medicamento"
                                                     class="form-control medicamento" name="medicamento" readonly placeholder="ITRACONAZOL" value="<?=$edit_medc['nm_mdc_esp_an'];?>"></div>

                        <label for="inputDose" class="col-sm-1 control-label">DOSE/MG</label>
                        <div class="col-sm-1"><input type="number" tabindex="2" data-toggle="tooltip" title="Nome do Medicamento" maxlength="5"
                                                     class="form-control" name="dsg" placeholder="100" value="<?=$edit_medc_ant['dsg_esp_medc'];?>"></div>

                        <label for="inputQuantidade" class="col-sm-1 control-label">QTD:</label>

                        <div class="col-sm-1"><input type="number" tabindex="3" data-toggle="tooltip" title="Quantidade de comprimidos" maxlength="5"
                                                     class="form-control" name="qtd" placeholder="000" value="<?=$edit_medc_ant['qtd_esp_medc'];?>"></div>

                    </div>



                </br></br></br>

                <div class="form-group text-center">
                    <div class="col-sm-12">
                        <input type="hidden" id="id" name="id" value="<?=$id?>">
                        <input type="hidden" name="acao" value="editar-medicamento">

                        <button type="submit" tabindex="4" accesskey="G" style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                            echo 'display: none;';
                        } ?>" data-toggle="tooltip" title="GRAVAR OS DADOS" class="btn btn-labeled btn-success mb-2 mr-sm-4"><span
                                    class="btn-label"><i class="fa fa-floppy-o"></i></span> <u>G</u>RAVAR
                        </button>
                        <a href='suvisjt.php?pag=listar-medicamentos-esporotricose-animal' role='button' tabindex="5" data-toggle="tooltip" title="LISTAR REGISTROS" accesskey="L"
                           class="btn btn-labeled btn-info mb-2 mr-sm-4"><span class="btn-label"><i
                                        class="fa fa-list-alt"></i></span> <u>L</u>ISTAR</a>
                        <a target="_blank"
                           href='http://www.buscacep.correios.com.br/sistemas/buscacep/buscaCepEndereco.cfm'
                           role='button' tabindex="6" data-toggle="tooltip" title="BUSCA CEP CORREIOS" accesskey="S"
                           class="btn btn-labeled btn-default mb-2 mr-sm-4"><span class="btn-label"><img
                                        src="imagens/correios.png" width="20"/></span></span> BUSCA CEP</a>

                        <button type="button" class="btn btn-danger rounded-circle" data-toggle="modal" data-target="#ModalLixoEsp"><i class="fa fa-trash-alt"></i></button>
                    </div>
                </div>

                    <div class="modal fade" id="ModalLixoEsp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm"><div class="modal-content"><div class="modal-header-danger">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h3 class="modal-title text-center"><i class="fa fa-trash-alt"></i>&nbsp;&nbsp; Deletar Medicamento</h3></div>
                                    <div class="modal-body"><h3 class="text-center"> Deseja apagar <?=$edit_medc['nm_mdc_esp_an'].' - '.$edit_medc_ant['dsg_esp_medc'].' Mg - '.$edit_medc_ant['qtd_esp_medc'];?> Cápsulas ?</h3></div>
                                        <div class="modal-footer text-center"><button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-minus-octagon"></i>  NÃO</button>
                                    '&nbsp;&nbsp;&nbsp;&nbsp;<a href="suvisjt.php?pag=proc-edit-esporo-animal&id=<?=$edit_medc_ant['id_esp_ent']?>&id_med=<?=$edit_medc['nm_mdc_esp_an'];?>&data_medc=<?=date('d/m/Y', strtotime($edit_medc_ant['dt_cadastro']));?>&dsg=<?=$edit_medc_ant['dsg_esp_medc'];?>&qtd=<?=$edit_medc_ant['qtd_esp_medc'];?>&acao=deletar-entrada-medicamento" role="button" class="btn btn-success"><i class="fa fa-check-circle-o"></i><strong>  SIM</strong></a>
                                    </div>
                                </div>
                            </div>
                    </div>
            </form>
        </fieldset>
    </div>
</div> <!-- /container -->

