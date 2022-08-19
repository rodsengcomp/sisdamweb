<?php
error_reporting(0);
include_once '../../locked/seguranca.php';
include_once '../../conecta.php';
include_once 'edit-modals-ambiental.php';

$id = $_GET['id'];
$id_sd_med = $_GET['id_sd'];
$id_data = $_GET['data_medc'] ?? '';
$id_med = $_GET['id_med'] ?? '';
$id_dsg = $_GET['dsg'] ?? '';
$id_qtd = $_GET['qtd'] ?? '';
$id_nm_ent = $_GET['nm_ent_medc'] ?? '';
$id_nm_rec = $_GET['nm_rec_medc'] ?? '';
$id_lixeira = $_GET['lixeira'] ?? 'false';
$id_edit = $_GET['edit'] ?? 'false';

$consulta_esp_an = "SELECT * FROM esporo_an WHERE id_esp='$id'";
$resultado_esp_an = $conectar->query($consulta_esp_an);
$editar_esp_an = mysqli_fetch_assoc($resultado_esp_an);

// Trazendo o id da especie
$id_especie = $editar_esp_an['especie'];
$consulta_especie = "SELECT * FROM especie_animal WHERE id_especie='$id_especie'";
$resultado_especie = $conectar->query($consulta_especie);
$especie_select = mysqli_fetch_assoc($resultado_especie);

// Trazendo o id da situação
$id_situacao = $editar_esp_an['situacao'];
$consulta_situacao = "SELECT * FROM situacao_esporo WHERE id_st_esp='$id_situacao'";
$resultado_situacao = $conectar->query($consulta_situacao);
$situacao = mysqli_fetch_assoc($resultado_situacao);

// Trazendo o id da situação
$id_rua = $editar_esp_an['id_rua'];
$consulta_rua = "SELECT * FROM ruas WHERE id='$id_rua'";
$resultado_rua = $conectar->query($consulta_rua);
$rua = mysqli_fetch_assoc($resultado_rua);

// Trazendo o id da situação
$id_medc = $editar_esp_an['id_medc'];
$consulta_medc = "SELECT * FROM esporo_medc WHERE id_med_esp='$id_medc'";
$resultado_medc = $conectar->query($consulta_medc);
$medc = mysqli_fetch_assoc($resultado_medc);

$contarlixo = $conectar->query("SELECT lixeira FROM esporo_an_sd_medc WHERE lixeira = 1 AND id_an_esp = $id");
$countlixo = $contarlixo->num_rows;
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
        if (isset($_SESSION['msgerroredit'])) {
            echo $_SESSION['msgerroredit'];
            unset($_SESSION['msgerroredit']);
        }
        if (isset($_SESSION['msgedit'])) {
            echo $_SESSION['msgedit'];
            unset($_SESSION['msgedit']);
        }
        ?>
    </div>

    <div class="row">

        <?php echo $countlixo;?>

        <div class="col-md-12">
            <fieldset <?php
            if ($_SESSION['usuarioNivelAcesso'] == "") :
                echo 'disabled';
            elseif($id_lixeira == 'true') :
                echo 'disabled';
            else :
                echo '';
            endif;
             ?>>
                <form class="form-horizontal" id="edit-esporo-animal" method="POST" action="suvisjt.php?pag=proc-edit-esporo-animal&acao=editar">

                    <div class="form-group" id="apresentacao">
                        <input id="searchInput" tabindex="11" style="margin-top: 10px;" class="form-control" type="text"
                               name="ruagoogle" placeholder="Digite o local" value="<?php echo $editar_esp_an['rua_esp_a']; ?>">
                        <div id="mapcad"></div>
                    </div>

                    <div class="form-group">
                        <label for="inputNve" class="col-sm-1 control-label">NVE</label>
                        <div class="col-sm-1">
                            <input type="text" id="nve" <?php if($id_edit != 'true'): echo 'autofocus'; endif;?> tabindex="1" data-toggle="tooltip" title="Ex: 10" maxlength="5"
                                   class="form-control" name="nve" placeholder="000" value="<?php echo $editar_esp_an['nve']; ?>"></div>

                        <label for="inputDataNot" class="col-sm-1 control-label">ENTRADA</label>
                        <div class="col-sm-2">
                            <input tabindex="2" type="text" class="form-control" data-toggle="tooltip"
                                   title="Não pode ser maior que hoje" name="datanot" id="datanotcad"
                                   placeholder="00/00/0000" value="<?php echo $editar_esp_an['data_entrada']; ?>">
                        </div>

                        <label class="col-sm-1 control-label">ANIMAL</label>
                        <div class="col-sm-3">
                            <input type="text" tabindex="3" class="form-control" name="nomeanimal"  data-toggle="tooltip" title="Nome do Animal"
                                value="<?php echo strtoupper($editar_esp_an['nome_animal']); ?>" onchange="upperCaseF(this)"></div>

                        <label class="col-sm-1 control-label">ESPÉCIE</label>
                        <div class="col-sm-2">
                            <input type="text" tabindex="4" class="form-control especie" name="especie"  data-toggle="tooltip" title="Cão ou Gato"
                                 onchange="upperCaseF(this)" value="<?php echo $especie_select['especie']; ?>"></div>
                    </div>

                    <div class="form-group">

                        <label class="col-sm-1 control-label">TUTOR</label>
                        <div class="col-sm-4">
                            <input type="text" tabindex="5" class="form-control" name="tutor"  data-toggle="tooltip" title="Nome do Proprietário do Animal"
                                onchange="upperCaseF(this)" value="<?php echo strtoupper($editar_esp_an['tutor']); ?>"></div>

                        <div class="col-sm-1">
                            <a href='suvisjt.php?pag=cad-med-an-esp-an&id=<?php echo $editar_esp_an['id_esp']; ?>' role='button' tabindex="18" data-toggle="tooltip" title="REGISTRAR MEDICAMENTO" accesskey="L"
                                 class="btn btn-labeled btn-info"><span class="btn-label"><i class="fa fa-plus-circle"></i></span><i class="fa fa-pills"></i> <u>M</u>ED. </a></div>

                        <label for="inputTelefone1" class="col-sm-1 control-label">TEL 1</label>
                        <div class="col-sm-2">
                            <input type="text" tabindex="7" class="form-control" data-toggle="tooltip" title="Celular ou fixo sem DDD" name="tel1" id="tels1" maxlength="15"
                               placeholder="99999-9999" value="<?php echo $editar_esp_an['telefone1']; ?>"></div>

                        <label for="inputTelefone2" class="col-sm-1 control-label">TEL 2</label>
                        <div class="col-sm-2">
                            <input type="text" tabindex="8" class="form-control" data-toggle="tooltip" title="Celular ou fixo sem DDD" name="tel2" id="tels2" maxlength="15"
                               placeholder="99999-9999" value="<?php echo $editar_esp_an['telefone2']; ?>"></div>

                    </div>

                    <div class="form-group">
                        <label class="col-sm-1 control-label">SITUAÇÃO</label>
                        <div class="col-sm-2"><input type="text" tabindex="9" class="form-control situacao" name="situacao" data-toggle="tooltip" title="Situação do tratamento"
                                                     value="<?php echo strtoupper($situacao['sit_esp']); ?>"></div>

                        <label class="col-sm-1 control-label">ENDEREÇO</label>
                        <div class="col-sm-3"><input type="text" tabindex="10" class="form-control rua" name="rua" data-toggle="tooltip" title="Nome da rua"
                                                     id="ruaselect" placeholder="NOME DO ENDEREÇO" onchange="upperCaseF(this)" value="<?php echo strtoupper($rua['rua']); ?>"></div>

                        <label class="col-sm-1 control-label">N</label>
                        <div class="col-sm-1"><input type="text" tabindex="12" class="form-control" name="num" data-toggle="tooltip" title="Preenchimento Automatico"
                                                     placeholder="Nº" maxlength="6" value="<?php echo $editar_esp_an['numero'];?>"></div>

                        <label class="col-sm-1 control-label">COMP</label>
                        <div class="col-sm-2"><input type="text" tabindex="13" class="form-control" name="comp" data-toggle="tooltip" title="Preenchimento Automatico" style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                                echo 'display: none;';
                            } ?>" placeholder="CASA , APTO"
                                                     onchange="upperCaseF(this)" value="<?php echo $editar_esp_an['complemento'];?>"></div>

                    </div>

                    <div class="form-group">

                        <label class="col-sm-1 control-label">LAT/LNG</label>
                        <div class="col-sm-2"><input type="text" tabindex="14" id="lat" data-toggle="tooltip" title="Ex: 23.4587899" class="form-control"
                                                     name="lat" placeholder="15,123456789" value="<?php echo $editar_esp_an['lat'];?>"></div>

                        <div class="col-sm-2"><input type="text" tabindex="15" id="lng" class="form-control"  data-toggle="tooltip" title="Ex: 46.458789" name="lng"
                                                     placeholder="-19,123456789" value="<?php echo $editar_esp_an['lng'];?>"></div>

                        <label class="col-sm-1 control-label">CEP</label>
                        <div class="col-sm-2"><input type="text" class="form-control"  name="cep" readonly id="cepcad" maxlength="9" placeholder="00000-000"
                                                     data-toggle="tooltip" title="Preenchimento Automatico" value="<?php echo strtoupper($rua['cep']); ?>"></div>

                        <label class="col-sm-1 control-label">BAIRRO</label>
                        <div class="col-sm-3"><input type="text" class="form-control"  readonly id="bairro" name="bairro"
                                                     data-toggle="tooltip" title="Preenchimento Automatico" placeholder="BAIRRO" value="<?php echo strtoupper($rua['bairro']); ?>"></div>

                    </div>

                    <div class="form-group">

                        <label class="col-sm-1 control-label">LOG</label>
                        <div class="col-sm-2"><input type="text" class="form-control"  readonly name="log" id="log" placeholder="RUA , AVENIDA"
                                                     data-toggle="tooltip" title="Preenchimento Automatico" value="<?php echo strtoupper($rua['log']); ?>"></div>

                        <label class="col-sm-1 control-label">DA/SET</label>
                        <div class="col-sm-1"><input type="text" id="da" readonly  data-toggle="tooltip" title="Preenchimento Automatico" maxlength="2"
                                                     class="form-control" name="da" placeholder="00" value="<?php echo strtoupper($rua['da']); ?>"></div>
                        <div class="col-sm-1"><input type="text"  readonly id="setor" class="form-control" name="setor" placeholder="0000"
                                                     data-toggle="tooltip" title="Preenchimento Automatico" value="<?php echo strtoupper($rua['setor']); ?>"></div>

                        <label for="inputPagGuia" class="col-sm-1 control-label">PGGUIA</label>
                        <div class="col-sm-1"><input type="text" readonly class="form-control" name="pgguia" id="pgguia" placeholder="A00-A00"
                                                     data-toggle="tooltip" title="Preenchimento Automatico" value="<?php echo strtoupper($rua['pgguia']); ?>"></div>

                            <label class="col-sm-1 control-label">UBS REF</label>
                            <div class="col-sm-3"><input type="text" class="form-control"  readonly id="localvd" name="localvd"  placeholder="UBS DE ABRANGÊNCIA"
                                                         data-toggle="tooltip" title="Preenchimento Automatico" value="<?php echo strtoupper($rua['ubs']); ?>"></div>

                    </div>

                    <div class="form-group">
                        <label class="col-sm-1 control-label">OBS</label>
                        <div class="col-sm-11"><textarea id="obs" tabindex="18" data-toggle="tooltip" title="Observações sobre o caso"
                                                         class="form-control" name="obs" onchange="upperCaseF(this)" placeholder="Informações sobre o caso de esporotricose animal" rows="2"><?php echo $editar_esp_an['obs'];?></textarea></div>
                    </div>

                    <div class="form-group">
                        <label for="inputDataEntrada" class="col-sm-1 control-label">MEDIC.</label>
                        <div class="col-sm-2"><input <?php if($id_edit == 'true'): echo 'autofocus'; endif;?> tabindex="19" type="text" class="form-control" data-toggle="tooltip"
                                                     title="Data da 1ª entrega" name="dataentrada" id="dataentesp" placeholder="00/00/0000" value="<?php echo $id_data; ?>"></div>

                        <div class="col-sm-2">
                            <input type="text" tabindex="20" data-toggle="tooltip" title="Nome do Medicamento"
                                   class="form-control medicamento" name="medicamento" placeholder="ITRACONAZOL" value="<?php echo $id_med; ?>"></div>

                        <div class="col-sm-1">
                            <input type="number" tabindex="21" data-toggle="tooltip" title="Dosagem do Medicamento" maxlength="5"
                                   class="form-control" name="dsg" placeholder="100" value="<?php echo $id_dsg; ?>"></div>

                        <div class="col-sm-1"><input type="number" tabindex="22" data-toggle="tooltip" title="Quantidade de comprimidos" maxlength="5"
                                                     class="form-control" name="qtd" placeholder="000" value="<?php echo $id_qtd; ?>"></div>

                        <div class="col-sm-2"><input type="text" tabindex="23" data-toggle="tooltip" title="Para quem foi entregue? (Uvis ou DVZ)"
                                                     class="form-control entregador" name="nment" placeholder="Entregue:UVIS/DVZ" value="<?php echo $id_nm_ent; ?>"></div>

                        <div class="col-sm-3"><input type="text" tabindex="24" data-toggle="tooltip" title="Quem recebeu o medicamento? (Nome)"
                                                     class="form-control" name="nmrecep" placeholder="Nome do Receptor" onchange="upperCaseF(this)" value="<?php echo $id_nm_rec; ?>"></div>
                    </div>
            </fieldset>

                    <!-- Fim da Pagina de Titulo -->
                    <div class="form-group text-center">
                        <div class="col-sm-12">
                            <?php
                            if ($countlixo == 0):
                                echo '<button type="button" class="btn btn-primary btn-labeled btn-lg btn-block"><span class="btn-label"><i
                                            class="fa fa-pills"></i></span>ENTREGA DE MEDICAMENTOS ESPOROTRICOSE ANIMAL</button><br>';
                                echo '<a href="form-system/ambiental/print/print-esporo-animal.php?id='.$id.'" accesskey="S" role="button" class="btn btn-primary"><i class="fa fa-print"></i> <u>I</u>MPRIMIR</a>';
                            elseif ($id_lixeira === 'false'):
                                echo '<button type="button" class="btn btn-primary btn-labeled btn-lg btn-block"><span class="btn-label"><i
                                            class="fa fa-pills"></i></span>ENTREGA DE MEDICAMENTOS ESPOROTRICOSE ANIMAL</button><br>';
                                echo '<a href="suvisjt.php?pag=edit-esporo-animal&id='.$id.'&lixeira=true" role="button" accesskey="L" data-toggle="tooltip" title="GRAVAR OS DADOS" 
                                            class="btn btn-labeled btn-default mb-2 mr-sm-4"><span class="btn-label">' .$countlixo. '</span><i class="fa fa-trash-alt"></i> <u>L</u>IXEIRA</a>';
                                echo '<a href="form-system/ambiental/print/print-esporo-animal.php?id='.$id.'" accesskey="S" role="button" class="btn btn-primary"><i class="fa fa-print"></i> <u>I</u>MPRIMIR</a>';
                            else:
                                    echo '<button type="button" class="btn btn-default btn-labeled btn-lg btn-block"><span class="btn-label"><i
                                            class="fa fa-pills"></i></span>LIXEIRA - ENTREGA DE MEDICAMENTOS ESPOROTRICOSE ANIMAL</button><br>';
                                    echo '<a href="suvisjt.php?pag=edit-esporo-animal&id='.$id.'" accesskey="S" role="button" class="btn btn-danger"><i class="fa fa-arrow-circle-o-left"></i><u>S</u>AIR</a>';
                                endif;
                            ?>
                        </div>
                    </div>
                    <!--------------------------------------------- * Tabela de Bloqueios * --------------------------------------->
                    <table id="list-edit-esporo-medc" class="table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th class="text-center"><i class="fal fa-thin fa-pencil-alt"></i> EDITAR</th>
                            <th class="text-center"><i class="fal fa-thin fa-calendar"></i> ENTREGA</th>
                            <th class="text-center"><i class="fal fa-thin fa-calendar"></i> MEDICAMENTO</th>
                            <th class="text-center"><i class="fal fa-light fa-calendar"></i> DOSAGEM</th>
                            <th class="text-center"><i class="fal fa-light fa-briefcase-medical"></i> QUANTIDADE</th>
                            <th class="text-center"><i class="fal fa-user-check"></i> ENTREGUE</th>
                            <th class="text-center"><i class="fal fa-user-check"></i> RECEBIDO</th>
                            <th class="text-center"><?php if($id_lixeira === 'true'): echo '<i class="fal fa-thin fa-arrow-alt-circle-up"></i> REATIVAR'; else : echo '<i class="fal fa-thin fa-trash-alt"></i> LIXO'; endif; ?></th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>

                    <input type="hidden" name="ano" value="<?php echo $editar_esp_an['ano'];?>">
                    <input type="hidden" id="idrua" name="idrua" value="<?php echo strtoupper($rua['id']); ?>"></div>
                    <input type="hidden" name="idmedc" value="<?php echo $id_sd_med; ?>"></div>

        <div class="form-group text-center">
            <div class="col-sm-12">
                <input type="hidden" name="id" value="<?php echo $editar_esp_an['id_esp']; ?>">
                <button type="submit" tabindex="25" accesskey="G" style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                    echo 'display: none;';
                } ?>" data-toggle="tooltip" title="GRAVAR OS DADOS" class="btn btn-labeled btn-success mb-2 mr-sm-4"><span
                            class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span> <u>G</u>RAVAR
                </button>
                <a href='suvisjt.php?pag=list-esporo-animal' role='button' tabindex="26" data-toggle="tooltip" title="LISTAR REGISTROS" accesskey="L"
                   class="btn btn-labeled btn-info mb-2 mr-sm-4"><span class="btn-label"><i
                                class="glyphicon glyphicon-list"></i></span> <u>L</u>ISTAR</a>
                <a target="_blank"
                   href='http://www.buscacep.correios.com.br/sistemas/buscacep/buscaCepEndereco.cfm'
                   role='button' tabindex="27" data-toggle="tooltip" title="BUSCA CEP CORREIOS" accesskey="S"
                   class="btn btn-labeled btn-default mb-2 mr-sm-4"><span class="btn-label"><img
                                src="imagens/correios.png" width="20"/></span></span> BUSCA CEP</a>
            </div>
        </div>
        </form>
    </div>
</div>
</div> <!-- /container -->

<script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAhlslumr1saHPVEJHkzPssYLEsWZJQQKU&libraries=places"></script>

