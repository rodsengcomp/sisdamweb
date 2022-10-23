<?php
error_reporting(1);
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
$id_edit = $_REQUEST['edit'] ?? 'false';

$consulta_esp_an = $conectar->query("SELECT * FROM esporo_an WHERE id_esp='$id'");
$editar_esp_an = mysqli_fetch_assoc($consulta_esp_an);

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

// Trazendo o id da especie
$id_origem = $editar_esp_an['origem'];
$consulta_origem = "SELECT * FROM origem WHERE id_origem='$id_origem'";
$resultado_origem = $conectar->query($consulta_origem);
$editar_origem = mysqli_fetch_assoc($resultado_origem);

// Trazendo o id da especie
$id_sexo = $editar_esp_an['sexo'];
$cs_sexo = "SELECT * FROM sexo WHERE id='$id_sexo'";
$rs_sexo = $conectar->query($cs_sexo);
$editar_sexo = mysqli_fetch_assoc($rs_sexo);

$contarlixo = $conectar->query("SELECT lixeira FROM esporo_an_sd_medc WHERE lixeira = 1 AND id_an_esp = $id");
$countlixo = $contarlixo->num_rows;

?>

<style>
    #mapesp {width: 1140px; height: 200px; border: 10px solid #ccc; margin-bottom: 20px;}
    .gm-style-iw-c > button {display: none !important;}
    #apresentacao {width: 1140px; margin: 1% auto; overflow: hidden;}
    #searchInput {background-color: #fff; font-size: 15px; font-weight: 300; margin-left: 12px; padding: 0 11px 0 13px; text-overflow: ellipsis; width: 50%;}
</style>

<script type="text/javascript">
    function initialize() {
        var latlng = new google.maps.LatLng(<?=$editar_esp_an['lat'];?>,<?=$editar_esp_an['lng'];?>);
        var map = new google.maps.Map(document.getElementById('mapesp'), {
            center: latlng,
            zoom: 16
        });
        var marker = new google.maps.Marker({
            map: map,
            position: latlng,
            draggable: true,
            anchorPoint: new google.maps.Point(0, -29)
        });
        var input = document.getElementById('searchInput');
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
        var geocoder = new google.maps.Geocoder();
        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.bindTo('bounds', map);
        var infowindow = new google.maps.InfoWindow();
        autocomplete.addListener('place_changed', function() {
            infowindow.close();
            marker.setVisible(false);
            var place = autocomplete.getPlace();
            if (!place.geometry) {
                window.alert("O endereço não foi localizado");
                return;
            }

            // If the place has a geometry, then present it on a map.
            if (place.geometry.viewport) {
                map.fitBounds(place.geometry.viewport);
            } else {
                map.setCenter(place.geometry.location);
                map.setZoom(17);
            }

            marker.setPosition(place.geometry.location);
            marker.setVisible(true);

            bindDataToForm(place.formatted_address,place.geometry.location.lat(),place.geometry.location.lng());
            infowindow.setContent(place.formatted_address);
            infowindow.open(map, marker);

        });
        // this function will work on marker move event into map
        google.maps.event.addListener(marker, 'dragend', function() {
            geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[0]) {
                        bindDataToForm(results[0].formatted_address,marker.getPosition().lat(),marker.getPosition().lng());
                        infowindow.setContent(results[0].formatted_address);
                        infowindow.open(map, marker);
                    }
                }
            });
        });
    }

    function bindDataToForm(address,lat,lng){
        /*document.getElementById('location').value = address;*/
        document.getElementById('lat').value = lat;
        document.getElementById('lng').value = lng;
    }
    google.maps.event.addDomListener(window, 'load', initialize);

    /*http://www.expertphp.in/article/autocomplete-search-address-form-using-google-map-and-get-data-into-form-example*/
</script>

<div class="container theme-showcase" role="main" xmlns="http://www.w3.org/1999/html">

    <div class="row">
        <div class="col-md-12 pt-5">

                <ol class="breadcrumb">
                    <li><i class="fa fa-database"></i> <a href="suvisjt.php">Sisdam Web</a></li>
                    <li class="active">Eporotricose Animal</li>
                </ol>
                <button type="button" style="opacity: inherit;color: #1d2124" class="btn btn-warning btn-labeled btn-lg btn-block mb-3" disabled><span class="btn-label"><i
                                class="fa fa-pencil"></i></span>EDITAR ESPOROTRICOSE ANIMAL</button>
        </div>
    </div>

    <?php if ($_SESSION['usuarioNivelAcesso'] > 3):?>
        <div class="form-group text-center"><div class="alert alert-danger text-center" role="alert"><strong>SEU NÍVEL DE USUÁRIO NÃO PERMITE EDITAR !!!</strong></div></div>
    <?php endif;?>

    <?php if ($_SESSION['usuarioNivelAcesso'] == ''):?>
    <div class="form-group text-center"><div class="alert alert-danger text-center" role="alert"><strong>PARA EDITAR É NECESSARIO FAZER O LOGIN!!!</strong></div></div>
    <?php endif;?>

    <?php
        if (isset($_SESSION['msgedit'])):
            echo '<div class="form-group text-center">'.$_SESSION['msgedit'].'</div>';
        endif;
    ?>

    <div class="row">

        <div class="col-md-12">
                <fieldset <?php
                if ($_SESSION['usuarioNivelAcesso'] == "") : echo 'disabled';
                elseif($id_lixeira == 'true') : echo 'disabled';
                else : echo ''; endif;
                 ?>>
            <form class="form-horizontal" id="edit-esporo-animal" method="POST" action="suvisjt.php?pag=proc-edit-esporo-animal">

                <div class="form-group" id="apresentacao">
                    <input id="searchInput" tabindex="15" style="margin-top: 10px;" class="form-control" type="text"
                           name="ruagoogle" placeholder="Digite o local" value="<?=$editar_esp_an['rua_esp_a']; ?>">
                    <div id="mapesp"></div>
                </div>

                <div class="form-group">
                    <label for="inputNve" class="col-sm-1 control-label">NVE</label>
                    <div class="col-sm-1">
                        <input type="text" id="nve" <?php if($id_edit != 'true'): echo 'autofocus'; endif;?> tabindex="1" data-toggle="tooltip" title="Ex: 10" maxlength="5"
                               class="form-control" name="nve" placeholder="000" value="<?=$editar_esp_an['nve']; ?>"></div>

                    <label for="inputDataNot" class="col-sm-1 control-label">ENTRADA</label>
                    <div class="col-sm-2">
                        <input tabindex="2" type="text" class="form-control" data-toggle="tooltip"
                               title="Não pode ser maior que hoje" name="datanot" id="datanotcad"
                               placeholder="00/00/0000"
                           <?php
                               $dt_entrada = $editar_esp_an['data_entrada'];
                               if($dt_entrada == '0000-00-00'): echo 'value=""';
                               else: echo 'value="'.date('d/m/Y', strtotime($dt_entrada)).'"';
                               endif;
                           ?>
                        >
                    </div>

                    <label class="col-sm-1 control-label">ANIMAL</label>
                    <div class="col-sm-3">
                        <input type="text" tabindex="3" class="form-control" name="nomeanimal"  data-toggle="tooltip" title="Nome do Animal"
                            value="<?=strtoupper($editar_esp_an['nome_animal']); ?>" onchange="upperCaseF(this)"></div>

                    <label class="col-sm-1 control-label">ESPÉCIE</label>
                    <div class="col-sm-2">
                        <input type="text" tabindex="4" class="form-control especie" name="especie"  data-toggle="tooltip" title="Cão ou Gato"
                             onchange="upperCaseF(this)" value="<?=$especie_select['especie']; ?>"></div>
                </div>

                <div class="form-group">
                    <label class="col-sm-1 control-label">TUTOR</label>
                    <div class="col-sm-4">
                        <input type="text" tabindex="5" class="form-control" name="tutor"  data-toggle="tooltip" title="Nome do Proprietário do Animal"
                            onchange="upperCaseF(this)" value="<?=strtoupper($editar_esp_an['tutor']); ?>"></div>

                    <label class="col-sm-1 control-label">IDADE</label>
                    <div class="col-sm-1"><input type="text" tabindex="6" class="form-control" name="idade" data-toggle="tooltip" title="Idade em anos"
                                                 placeholder="Nº" value="<?=$editar_esp_an['idade'];?>"></div>

                    <label for="inputOrigem" class="col-sm-1 control-label">SEXO</label>
                    <div class="col-sm-1">
                        <input type="text" tabindex="7" class="form-control sexos" data-toggle="tooltip" title="F OU M" name="sexos" id="sexos"
                               onchange="upperCaseF(this)" value="<?php if(!empty($editar_sexo['sexo'])) echo $editar_sexo['sexo'];?>" placeholder="M/F">
                    </div>

                    <label for="inputTelefone1" class="col-sm-1 control-label">TEL 1</label>
                    <div class="col-sm-2">
                        <input type="text" tabindex="8" class="form-control" data-toggle="tooltip" title="Celular ou fixo sem DDD" name="tel1" id="tels1" maxlength="15"
                           placeholder="99999-9999" value="<?=$editar_esp_an['telefone1']; ?>"></div>

                </div>


                <div class="form-group">
                    <label for="inputOrigem" class="col-sm-1 control-label">CASO H:</label>
                    <div class="col-sm-1">
                        <input type="text" tabindex="13" class="form-control casoh" data-toggle="tooltip" title="Caso humano? S ou N" name="casoh"
                               onchange="upperCaseF(this)" placeholder="S/N" value="<?=$editar_esp_an['casos_hum_dom'];?>">
                    </div>

                    <label class="col-sm-1 control-label">ENDEREÇO</label>
                    <div class="col-sm-4"><input type="text" tabindex="14" class="form-control rua" name="rua" data-toggle="tooltip" title="Nome da rua"
                                                 id="ruaselect" placeholder="NOME DO ENDEREÇO" onchange="upperCaseF(this)" value="<?=strtoupper($rua['rua']); ?>"></div>

                    <label class="col-sm-1 control-label">N</label>
                    <div class="col-sm-1"><input type="text" tabindex="16" class="form-control" name="num" data-toggle="tooltip" title="Preenchimento Automatico"
                                                 placeholder="Nº" maxlength="6" value="<?=$editar_esp_an['numero'];?>"></div>

                    <label class="col-sm-1 control-label">COMP</label>
                    <div class="col-sm-2"><input type="text" tabindex="17" class="form-control" name="comp" data-toggle="tooltip" title="Preenchimento Automatico" style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                            echo 'display: none;';
                        } ?>" placeholder="CASA , APTO"
                                                 onchange="upperCaseF(this)" value="<?=$editar_esp_an['complemento'];?>"></div>

                </div>


                <div class="form-group">

                    <label class="col-sm-1 control-label">LAT/LNG</label>
                    <div class="col-sm-2"><input type="text" tabindex="18" id="lat" data-toggle="tooltip" title="Ex: 23.4587899" class="form-control"
                                                 name="lat" placeholder="15,123456789" value="<?=$editar_esp_an['lat'];?>"></div>

                    <div class="col-sm-2"><input type="text" tabindex="19" id="lng" class="form-control"  data-toggle="tooltip" title="Ex: 46.458789" name="lng"
                                                 placeholder="-19,123456789" value="<?=$editar_esp_an['lng'];?>"></div>

                    <label class="col-sm-1 control-label">CEP</label>
                    <div class="col-sm-2"><input type="text" class="form-control"  name="cep" readonly id="cepcad" maxlength="9" placeholder="00000-000"
                                                 data-toggle="tooltip" title="Preenchimento Automatico" value="<?=strtoupper($rua['cep']); ?>"></div>

                    <label class="col-sm-1 control-label">BAIRRO</label>
                    <div class="col-sm-3"><input type="text" class="form-control"  readonly id="bairro" name="bairro"
                                                 data-toggle="tooltip" title="Preenchimento Automatico" placeholder="BAIRRO" value="<?=strtoupper($rua['bairro']); ?>"></div>

                </div>

                <div class="form-group">

                    <label class="col-sm-1 control-label">LOG</label>
                    <div class="col-sm-3"><input type="text" class="form-control"  readonly name="log" id="log" placeholder="RUA , AVENIDA"
                                                 data-toggle="tooltip" title="Preenchimento Automatico" value="<?=strtoupper($rua['log']); ?>"></div>

                    <label class="col-sm-1 control-label">DA</label>
                    <div class="col-sm-1"><input type="text" id="da" readonly  data-toggle="tooltip" title="Preenchimento Automatico" maxlength="2"
                                                 class="form-control" name="da" placeholder="00" value="<?=strtoupper($rua['da']); ?>"></div>

                    <label class="col-sm-1 control-label">SETOR</label>
                    <div class="col-sm-2"><input type="text"  readonly id="setor" class="form-control" name="setor" placeholder="0000"
                                                 data-toggle="tooltip" title="Preenchimento Automatico" value="<?=strtoupper($rua['setor']); ?>"></div>

                    <label for="inputPagGuia" class="col-sm-1 control-label">PGGUIA</label>
                    <div class="col-sm-2"><input type="text"  readonly class="form-control" name="pgguia" placeholder="0000"
                                                 data-toggle="tooltip" title="Preenchimento Automatico" value="<?=strtoupper($rua['pgguia']); ?>"></div>


                </div>

                <!-- <div class="page-header text-center" style="border-bottom: 1px solid #92a4ad"><h3>FECHAMENTO</h3></div> -->

            <div class="form-group">

                <label class="col-sm-1 control-label">UBS REF</label>
                <div class="col-sm-5"><input type="text" class="form-control"  readonly id="localvd" name="localvd"  placeholder="UBS DE ABRANGÊNCIA"
                                             data-toggle="tooltip" title="Preenchimento Automatico" value="<?=strtoupper($rua['ubs']); ?>"></div>

                <label for="inputDataNot" class="col-sm-1 control-label">ÚLT. AV.</label>
                <div class="col-sm-2">
                    <input tabindex="20" type="text" class="form-control" data-toggle="tooltip"
                           title="Data da última avaliação do animal" name="dataua" id="dataua"
                           placeholder="00/00/0000"
                        <?php
                            $dt_ult_ava = $editar_esp_an['data_ult_ava'];
                            if($dt_ult_ava == '0000-00-00'): echo 'value=""';
                            else: echo 'value="'.date('d/m/Y', strtotime($dt_ult_ava)).'"';
                            endif;
                        ?>
                    >

                </div>

                <label for="inputDataAba" class="col-sm-1 control-label">DT. B.AT.</label>
                <div class="col-sm-2">
                    <input tabindex="21" type="text" class="form-control" data-toggle="tooltip"
                           title="Data da realização de busca ativa de casos no entorno" name="databa" id="databa"
                           placeholder="00/00/0000"
                        <?php
                            $dt_b_a = $editar_esp_an['data_busca_ativa'];
                            if($dt_b_a == '0000-00-00'): echo 'value=""';
                            else: echo 'value="'.date('d/m/Y', strtotime($dt_b_a)).'"'; endif;
                        ?>
                        >
                </div>
            </div>

            <div class="form-group">

                <label class="col-sm-2 control-label">Nº CASOS SUSPEITOS</label>
                <div class="col-sm-1">
                    <input type="text" tabindex="22" class="form-control" name="num_casos_susp" data-toggle="tooltip"
                           title="Nº de casos suspeitos de animais identificados na busca ativa"
                           placeholder="Nº" maxlength="6" value="<?=$editar_esp_an['nm_casos_susp_an'];?>"></div>

                <label for="inputDataFin" class="col-sm-1 control-label">DT. F.TR.</label>
                <div class="col-sm-2">
                    <input tabindex="23" type="text" class="form-control" data-toggle="tooltip"
                           title="Data final do tratamento" name="dataft" id="dataft"
                           placeholder="00/00/0000"

                        <?php $dt_f_t = $editar_esp_an['data_final_trat'];
                            if($dt_f_t == '0000-00-00'): echo 'value=""';
                            else: echo 'value="'.date('d/m/Y', strtotime($dt_f_t)).'"'; endif;
                        ?>
                    >
                </div>

                <label class="col-sm-1 control-label">PEDIDO</label>
                <div class="col-sm-2"><input type="text" tabindex="24" class="form-control" name="pedido" data-toggle="tooltip" title="Número de exame"
                                             placeholder="123456789" value="<?=$editar_esp_an['pedido'];?>"></div>

                <label for="inputOrigem" class="col-sm-1 control-label">ORIGEM</label>
                <div class="col-sm-2">
                    <input type="text" tabindex="25" class="form-control origem" data-toggle="tooltip" title="Origem da notificação: CCZ PLANTAO/UVIS JACANA" name="origem" id="origem"
                           value="<?php if(!empty($editar_origem['nm_origem'])) echo $editar_origem['nm_origem'];?>" placeholder="UVIS JACANA">
                </div>

            </div>

            <div class="form-group">

                <label class="col-sm-1 control-label">SITUAÇÃO</label>
                <div class="col-sm-2"><input type="text" tabindex="26" class="form-control situacao" name="situacao" data-toggle="tooltip" title="Situação do tratamento"
                                             value="<?=strtoupper($situacao['sit_esp']); ?>"></div>

                <label class="col-sm-1 control-label">DIAGNÓST.</label>
                <div class="col-sm-2"><input type="text" onchange="upperCaseF(this)" tabindex="27" class="form-control diagnostico" name="diagnostico" data-toggle="tooltip" title="POSITIVO/NEGATIVO"
                                             value="<?php $dgt = $editar_esp_an['diagnostico'];
                                             if($dgt == 1): echo 'POSITIVO';
                                             elseif ($dgt == 2): echo 'NEGATIVO';
                                             else: echo 'EM INVESTIGACAO'; endif; ?>"></div>

                <label class="col-sm-2 control-label">MEDICAMENTO</label>
                <div class="col-sm-2"><input type="text" <?php if($id_edit == 'true'): echo 'autofocus'; endif;?> tabindex="28" data-toggle="tooltip" title="Nome do Medicamento"
                           class="form-control medicamento" name="medicamento" placeholder="ITRACONAZOL" value="<?=$id_med; ?>"></div>

                <label class="col-sm-1 control-label">DOSAGEM</label>
                <div class="col-sm-1">
                    <input type="number" tabindex="29" data-toggle="tooltip" title="Dosagem do Medicamento" maxlength="5"
                           class="form-control" name="dsg" placeholder="100" value="<?=$id_dsg; ?>"></div>



            </div>

                <div class="form-group">
                        <label for="inputDataMedicamento" class="col-sm-1 control-label">DATA</label>
                        <div class="col-sm-2"><input tabindex="30" type="text" class="form-control" data-toggle="tooltip"
                             title="Data da 1ª entrega" name="dataentrada" id="dataentesp" placeholder="00/00/0000" value="<?=$id_data; ?>"></div>

                        <label for="inputQuantidade" class="col-sm-1 control-label">QUANTIDADE</label>
                        <div class="col-sm-1"><input type="number" tabindex="31" data-toggle="tooltip" title="Quantidade de comprimidos" maxlength="5"
                             class="form-control" name="qtd" placeholder="000" value="<?=$id_qtd; ?>"></div>

                        <label for="inputEntregue" class="col-sm-1 control-label">ENTREGUE</label>
                        <div class="col-sm-2"><input type="text" tabindex="32" data-toggle="tooltip" title="Para quem foi entregue? (Uvis ou DVZ)"
                                                     class="form-control entregador" name="nment" placeholder="Entregue:UVIS/DVZ" value="<?=$id_nm_ent; ?>"></div>

                        <label for="inputRecebido" class="col-sm-1 control-label">RECEBIDO</label>
                        <div class="col-sm-3"><input type="text" tabindex="33" data-toggle="tooltip" title="Quem recebeu o medicamento? (Nome)"
                                                     class="form-control" name="nmrecep" placeholder="Nome do Receptor" onchange="upperCaseF(this)" value="<?=$id_nm_rec; ?>"></div>
                </div>

                <div class="form-group">
                    <label class="col-sm-1 control-label">OBS</label>
                    <div class="col-sm-11"><textarea id="obs" tabindex="34" data-toggle="tooltip" title="Observações sobre o caso"
                                                     class="form-control" name="obs" onchange="upperCaseF(this)" placeholder="Informações sobre o caso de esporotricose animal" rows="2"><?=$editar_esp_an['obs'];?></textarea></div>
                </div>

                <input type="hidden" name="ano" value="<?=$editar_esp_an['ano'];?>">
                <input type="hidden" name="esp_id" value="<?=$editar_esp_an['especie'];?>">
                <input type="hidden" id="idrua" name="idrua" value="<?=strtoupper($rua['id']); ?>">
                <input type="hidden" name="idmedc" value="<?=$id_sd_med; ?>">
                <input type="hidden" name="id" value="<?=$editar_esp_an['id_esp'];?>">
                <input type="hidden" name="pin" value="<?=$editar_esp_an['pin'];?>">
                <input type="hidden" name="acao" value="editar">

                </fieldset>

            <div class="form-group text-center">
                <div class="col-sm-12">
                    <?php if ($_SESSION['usuarioNivelAcesso'] <> ''):?>
                        <button type="submit" tabindex="35" accesskey="G" data-toggle="tooltip" title="GRAVAR OS DADOS" class="btn btn-labeled btn-success mb-2 mr-sm-4"><span
                                    class="btn-label"><i class="fa fa-floppy-o"></i></span> <u>G</u>RAVAR</button>
                    <?php endif; ?>

                    <a target=”_blank” tabindex="36" href="form-system/ambiental/print/print-esporo-animal.php?id=<?=$id?>" role="button" accesskey="I" data-toggle="tooltip" title="IMPRIMIR"
                       class="btn btn-labeled btn-default mb-2 mr-sm-4"><span class="btn-label"><i class="fa fa-print"></i></span> <u>I</u>MPRIMIR</a>

                    <a href='suvisjt.php?pag=listar-esporotricose-animal' role='button' tabindex="37" data-toggle="tooltip" title="LISTAR REGISTROS" accesskey="L"
                       class="btn btn-labeled btn-info mb-2 mr-sm-4"><span class="btn-label"><i
                                    class="fa fa-list"></i></span> <u>L</u>ISTAR</a>
                    <a target="_blank"
                       href='http://www.buscacep.correios.com.br/sistemas/buscacep/buscaCepEndereco.cfm'
                       role='button' tabindex="38" data-toggle="tooltip" title="BUSCA CEP CORREIOS" accesskey="S"
                       class="btn btn-labeled btn-default mb-2 mr-sm-4"><span class="btn-label"><img
                                    src="imagens/correios.png" width="20"/></span></span> BUSCA CEP</a>

                    <button type="button" class="btn btn-danger rounded-circle mb-2 mr-sm-4" data-toggle="modal" data-target="#ModalLixoE"><i class="fa fa-trash-alt"></i></button>

                </div>
            </div>

            <div class="modal fade" id="ModalLixoE" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm"><div class="modal-content"><div class="modal-header-danger">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h3 class="modal-title text-center"><i class="fa fa-trash-alt"></i>&nbsp;&nbsp; Deletar Medicamento</h3></div>
                        <div class="modal-body"><h3 class="text-center"> Deseja apagar <?=$editar_esp_an['nome_animal'].' - '.$editar_esp_an['tutor'];?> ?</h3></div>
                        <div class="modal-footer text-center"><button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-minus-octagon"></i>  NÃO</button>
                            '&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="suvisjt.php?pag=proc-edit-esporo-animal&id=<?=$editar_esp_an['id_esp']?>&nm_tutor=<?=$edit_medc['tutor'];?>&nm_animal=<?=$edit_medc['nome_animal'];?>&acao=deletar" role="button" class="btn btn-success"><i class="fa fa-check-circle-o"></i><strong>  SIM</strong></a>
                        </div>
                    </div>
                </div>
            </div>

            </form>

        </div>
    </div>

            <hr style="border-top: 1px solid #92a4ad">

                    <!-- Fim da Pagina de Titulo -->    <!-- Pagina de Titulo -->
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group text-center">
                            <?php
                            if ($countlixo == 0):
                                echo '<button type="button" style="opacity: inherit" class="btn btn-primary btn-labeled btn-lg btn-block disabled"><span class="btn-label"><i
                                            class="fa fa-pills"></i></span>ENTREGA DE MEDICAMENTOS ESPOROTRICOSE ANIMAL</button><br>';
                                echo '<a href="suvisjt.php?pag=edit-esporo-animal&id='.$id.'&edit=true" role="button" tabindex="39" accesskey="I" data-toggle="tooltip" title="NOVO MEDICAMENTO" 
                                            class="btn btn-labeled btn-success mb-2 mr-sm-4"><span class="btn-label"><i class="fa fa-pills"></i></span> <u>N</u>OVO</a>';
                                echo '<a href="suvisjt.php?pag=listar-medicamentos-esporotricose-animal" role="button" tabindex="40" accesskey="E" data-toggle="tooltip" title="ENTRADAS DE MEDICAMENTOS" 
                                            class="btn btn-labeled btn-success mb-2 mr-sm-4"><span class="btn-label"><i class="fa fa-pills"></i></span> <u>E</u>NTRADAS</a>';
                                echo '<a href="suvisjt.php?pag=listar-saida-de-medicamentos-esporotricose-animal" tabindex="41" role="button" accesskey="S" data-toggle="tooltip" title="SAÍDAS DE MEDICAMENTOS" 
                                            class="btn btn-labeled btn-danger mb-2 mr-sm-4"><span class="btn-label"><i class="fa fa-pills"></i></span> <u>S</u>AÍDAS</a>';
                            elseif ($id_lixeira === 'false'):
                                echo '<button type="button" class="btn btn-primary btn-labeled btn-lg btn-block"><span class="btn-label"><i
                                            class="fa fa-pills"></i></span>ENTREGA DE MEDICAMENTOS ESPOROTRICOSE ANIMAL</button><br>';
                                echo '<a href="suvisjt.php?pag=edit-esporo-animal&id='.$id.'&lixeira=true" role="button" accesskey="L" data-toggle="tooltip" title="GRAVAR OS DADOS" 
                                            class="btn btn-labeled btn-default mb-2 mr-sm-4"><span class="btn-label"><i class="fa fa-trash-alt"></i></span><span class="badge" style="background-color: #c9302c">'.$countlixo.'</span> &nbsp;<u>L</u>IXEIRA</a>';
                                echo '<a href="suvisjt.php?pag=listar-medicamentos-esporotricose-animal" role="button" accesskey="E" data-toggle="tooltip" title="ENTRADAS DE MEDICAMENTOS" 
                                            class="btn btn-labeled btn-success mb-2 mr-sm-4"><span class="btn-label"><i class="fa fa-pills"></i></span> <u>E</u>NTRADAS</a>';
                                echo '<a href="suvisjt.php?pag=listar-saida-de-medicamentos-esporotricose-animal" role="button" accesskey="S" data-toggle="tooltip" title="SAÍDAS DE MEDICAMENTOS" 
                                            class="btn btn-labeled btn-danger mb-2 mr-sm-4"><span class="btn-label"><i class="fa fa-pills"></i></span> <u>S</u>AÍDAS</a>';
                            else:
                                    echo '<button type="button" class="btn btn-default btn-labeled btn-lg btn-block"><span class="btn-label"><i
                                            class="fa fa-pills"></i></span>LIXEIRA - ENTREGA DE MEDICAMENTOS ESPOROTRICOSE ANIMAL</button><br>';
                                    echo '<a href="suvisjt.php?pag=edit-esporo-animal&id='.$id.'" role="button" accesskey="S" data-toggle="tooltip" title="SAIR DA LIXEIRA" 
                                            class="btn btn-labeled btn-danger mb-2 mr-sm-4"><span class="btn-label"><i class="fa fa-arrow-circle-o-left"></i></span> <u>S</u>AIR</a>';
                                endif;
                            ?>
                    </div>
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


</div>

<script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAhlslumr1saHPVEJHkzPssYLEsWZJQQKU&libraries=places"></script>

