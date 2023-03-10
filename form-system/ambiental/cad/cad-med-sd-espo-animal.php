<?php
error_reporting(0);
include_once '../../locked/seguranca.php';
include_once '../../conecta.php';
//Todos os chamamentos javascript e códigos de modal's
include_once 'modals-ambiental.php';

$id = $_GET['id'];

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
        ?>
    </div>

    <div class="row">

        <div class="col-md-12">
            <fieldset <?php
            if ($_SESSION['usuarioNivelAcesso'] == "") {
                echo 'disabled';

            } ?>>
                <form class="form-horizontal" id="cad-esporo-animal" method="POST" action="suvisjt.php?pag=proc-edit-esporo-animal">

                    <div class="form-group">
                        <label for="inputNve" class="col-sm-1 control-label">NVE</label>
                        <div class="col-sm-1">
                            <input type="text" class="form-control" name="nve" placeholder="000" value="<?php echo $editar_esp_an['nve']; ?>" disabled></div>

                        <label class="col-sm-1 control-label">ANIMAL</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" name="nomeanimal"  value="<?php echo strtoupper($editar_esp_an['nome_animal']); ?>" disabled></div>

                        <label class="col-sm-1 control-label">ESPÉCIE</label>
                            <div class="col-sm-1">
                                <input type="text" class="form-control especie" name="especie"  onchange="upperCaseF(this)" value="<?php echo $especie_select['especie']; ?>" disabled></div>

                        <label class="col-sm-1 control-label">TUTOR</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="tutor" onchange="upperCaseF(this)" value="<?php echo strtoupper($editar_esp_an['tutor']); ?>" disabled></div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-1 control-label">SITUAÇÃO</label>
                        <div class="col-sm-3"><input type="text" tabindex="9" class="form-control situacao" name="situacao" data-toggle="tooltip" title="Situação do tratamento"
                                                     value="<?php echo $situacao['sit_esp'];?>" disabled></div>

                        <label class="col-sm-1 control-label">ENDEREÇO</label>
                        <div class="col-sm-7">
                            <input type="text" tabindex="10" class="form-control rua" name="rua" data-toggle="tooltip" title="Nome da rua" id="ruaselect"
                                   placeholder="NOME DO ENDEREÇO" onchange="upperCaseF(this)" value="<?php echo $editar_esp_an['rua_esp_a'];?>" disabled></div>


                    </div>

                    <!--------------------------------------------- * Tabela de Bloqueios * --------------------------------------->
                    <table id="list-esporo-medc" class="table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th class="text-center"><i class="fal fa-thin fa-calendar"></i> ENTREGA</th>
                            <th class="text-center"><i class="fal fa-thin fa-calendar"></i> INÍCIO</th>
                            <th class="text-center"><i class="fal fa-light fa-calendar"></i> ENTREGA</th>
                            <th class="text-center"><i class="fal fa-light fa-briefcase-medical"></i> MEDICAMENTO</th>
                            <th class="text-center"><i class="fal fa-question"></i> DSG</th>
                            <th class="text-center"><i class="fal fa-light fa-briefcase-medical"></i> QTD</th>
                            <th class="text-center"><i class="fal fa-exclamation"></i> ENTREGUE</th>
                            <th class="text-center"><i class="fal fa-exclamation"></i> RECEBIDO</th>
                            <th class="text-center"><i class="fal fa-thin fa-calendar"></i> ÚLT. ENTREGA</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>

                    <div class="form-group">
                        <label for="inputDataEntrada" class="col-sm-1 control-label">1ªMEDC</label>
                        <div class="col-sm-2"><input autofocus tabindex="1" type="text" class="form-control" data-toggle="tooltip"
                                                     title="Data da 1ª entrega" name="dataentrada" id="dataentcad" placeholder="00/00/0000"></div>

                        <label for="inputDataEntrada" class="col-sm-1 control-label">QTD:</label>

                        <div class="col-sm-1"><input type="number" tabindex="20" data-toggle="tooltip" title="Quantidade de comprimidos" maxlength="5"
                                                     class="form-control" name="qtd1" placeholder="000"></div>

                        <label for="inputDataEntrada" class="col-sm-1 control-label">ENTREG.</label>
                        <div class="col-sm-2"><input type="text" tabindex="21" data-toggle="tooltip" title="Para quem foi entregue? (Uvis ou DVZ)"
                                                     class="form-control origem" name="nment1" placeholder="Entregue:UVIS/DVZ"></div>

                        <label for="inputDataEntrada" class="col-sm-1 control-label">RECEP.</label>
                        <div class="col-sm-3"><input type="text" tabindex="22" data-toggle="tooltip" title="Quem recebeu o medicamento? (Nome)"
                                                     class="form-control" name="nmrecep1" placeholder="Nome do Receptor" onchange="upperCaseF(this)"></div>
                    </div>

                    <input type="hidden" name="ano" value="<?php echo $editar_esp_an['ano'];?>">
                    <input type="hidden" id="idrua" name="idrua" value="<?php echo strtoupper($rua['id']); ?>"></div>

        <div class="form-group text-center">
            <div class="col-sm-12">
                <input type="hidden" name="id" value="<?php echo $editar_esp_an['id_esp']; ?>">
                <button type="submit" tabindex="17" accesskey="G" style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                    echo 'display: none;';
                } ?>" data-toggle="tooltip" title="GRAVAR OS DADOS" class="btn btn-labeled btn-success mb-2 mr-sm-4"><span
                            class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span> <u>G</u>RAVAR
                </button>
                <a href='suvisjt.php?pag=listar-esporotricose-animal' role='button' tabindex="18" data-toggle="tooltip" title="LISTAR REGISTROS" accesskey="L"
                   class="btn btn-labeled btn-info mb-2 mr-sm-4"><span class="btn-label"><i
                                class="glyphicon glyphicon-list"></i></span> <u>L</u>ISTAR</a>
                <a target="_blank"
                   href='http://www.buscacep.correios.com.br/sistemas/buscacep/buscaCepEndereco.cfm'
                   role='button' tabindex="19" data-toggle="tooltip" title="BUSCA CEP CORREIOS" accesskey="S"
                   class="btn btn-labeled btn-default mb-2 mr-sm-4"><span class="btn-label"><img
                                src="imagens/correios.png" width="20"/></span></span> BUSCA CEP</a>
            </div>
        </div>
        </form>
        </fieldset>
    </div>
</div> <!-- /container -->

