<!-- Este projeto é desenvolvido na Suvis Jaçanã-Tremembé com iniciativa dos colaboradores da Unidade -->
<!-- Código desenvolvido por Rodolfo Romaioli Ribeiro de Jesus - rodolfo.romaioli@gmail.com -->
<!-- Sisdam Web - 2.0 - 2017 - Todos os direitos reservados -->

<?php
error_reporting(0);
include_once '../../../locked/seguranca.php';
include_once '../../../conecta.php';

//$id = $_GET['id'];

//Verificar se está sendo passado na URL a página atual, senao é atribuido a pagina
$pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;

$consulta_pe_ie = "SELECT * FROM pes_ies_38_83 WHERE id_rua_pe_ie=''";
$resultado_pe_ie = $conectar->query($consulta_pe_ie);
$editar_pe_ie = mysqli_fetch_assoc($resultado_pe_ie);

$resultado_edit_pe_ie = $conectar->query($consulta_pe_ie);

//Contar o total de registros
$total_edit_end = mysqli_num_rows($resultado_edit_pe_ie);

//Seta a quantidade de registros por pagina
$quantidade_pg = 1;

//calcular o número de pagina necessárias para apresentar os registros
$num_pagina = ceil($total_edit_end/$quantidade_pg);

//Calcular o inicio da visualizacao
$incio = ($quantidade_pg*$pagina)-$quantidade_pg;


?>

<style>
    #mapeditpeie {
        width: 1140px;
        height: 200px;
        border: 10px solid #ccc;
    }

    #apresentacao {
        width: 1140px;
        margin: 1% auto;
        overflow: hidden;
    }

    #ruagoogle1 {
        background-color: #fff;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 50%;
    }
</style>

<script type="text/javascript">
    function initialize() {
        var latlng = new google.maps.LatLng(<?php echo $editar_pe_ie['lat_pe_ie']; ?>,<?php echo $editar_pe_ie['lng_pe_ie']; ?>);
        var map = new google.maps.Map(document.getElementById('mapeditpeie'), {
            center: latlng,
            zoom: 16
        });
        var marker = new google.maps.Marker({
            map: map,
            position: latlng,
            draggable: true,
            anchorPoint: new google.maps.Point(0, -29)
        });
        var input = document.getElementById('ruagoogle1');
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
                window.alert("O local retornado pelo preenchimento automático não contém geometria");
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

<div class="container theme-showcase" role="main">
    <!-- Página de Título -->
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <ol class="breadcrumb">
                    <li><i class="fa fa-database"></i> <a href="suvisjt.php">Sisdam Web</a></li>
                    <li class="active">Entrada de Materiais <?php echo $today = date("Y"); ?></li>
                </ol>
                <button type="button" class="btn btn-warning btn-labeled btn-lg btn-block"><span class="btn-label"><i
                            class="glyphicon glyphicon-pencil"></i></span>EDITAR PE / IE <?php echo $today = date("Y"); ?> - PONTO DE REFERÊNCIA > <?php echo $editar_pe_ie['pontor_pe_ie']; ?></button>
            </div>
        </div>
    </div>
    <!-- Fim da Página de Título -->

    <?php
    if (isset($_SESSION['msgdelerro'])) {
        echo $_SESSION['msgdelerro'];
        unset($_SESSION['msgdelerro']);
    }
    if (isset($_SESSION['msgdel'])) {
        echo $_SESSION['msgdel'];
        unset($_SESSION['msgdel']);
    }
    if (isset($_SESSION['msgerro'])) {
        echo $_SESSION['msgerro'];
        unset($_SESSION['msgerro']);
    }
    if (isset($_SESSION['msgedit'])) {
        echo $_SESSION['msgedit'];
        unset($_SESSION['msgedit']);
    }
    ?>

    <div class="form-group text-center">
        <div class="alert alert-danger text-center" style="<?php if ($today = date("Y") == $today = date("Y")) {
            echo 'display: none;'; } ?>" role="alert"><strong>PERMISSÃO PARA CADASTRAR APENAS EM 2019!!!</strong></div>
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
                <form class="form-horizontal" id="edit-pe-ie" method="POST" action="suvisjt.php?pag=proc-pe-ie">


                    <div class="form-group" id="apresentacao">
                        <input id="ruagoogle1" style="margin-top: 10px;" class="form-control" type="text"
                               name="ruagoogle1" tabindex="3" value="<?php echo $editar_pe_ie['ruagoogle_pe_ie']; ?>" placeholder="Digite o local">
                        <div id="mapeditpeie"></div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-1 control-label">TIPO</label>
                        <div class="col-sm-2">
                            <select data-toggle="tooltip" tabindex="2" data-placement="top" title="PE ou IE"
                                    class="form-control" id="tipo" name="tipo">
                                    <option value="PE"
                                        <?php
                                        if ($editar_pe_ie['tipo_pe_ie'] == 'PE') {
                                            echo 'selected';
                                        }
                                        ?>
                                    >PONTO EST.
                                    </option>
                                    <option value="IE"
                                        <?php
                                        if ($editar_pe_ie['tipo_pe_ie'] == 'IE') {
                                            echo 'selected';
                                        }
                                        ?>
                                    >IMÓVEL ESP.
                                    </option>
                            </select>
                        </div>

                        <label class="col-sm-2 control-label">ESPECIFICAÇÃO</label>
                        <div class="col-sm-4">
                            <input type="text" data-toggle="tooltip" data-placement="top" title="Ex: DESMANCHE" id="especificacao"
                                   class="form-control especificacao" value="<?php echo $editar_pe_ie['esp_pe_ie']; ?>"
                                        name="especificacao" placeholder="RECICLAGEM">
                        </div>

                       <label class="col-sm-1 control-label">RISCO</label>
                        <div class="col-sm-2">
                            <select data-toggle="tooltip" data-placement="top" title="PE ou IE"
                                    class="form-control" id="risco" name="risco">
                                <option value="0" <?php if ($editar_pe_ie['risco_pe_ie'] == NULL) { echo 'selected'; } ?> >Sem Classe</option>
                                <option value="0" <?php if ($editar_pe_ie['risco_pe_ie'] == 0) { echo 'selected'; } ?> >Sem Classe</option>
                                <option value="1" <?php if ($editar_pe_ie['risco_pe_ie'] == 'Classe 1 - Elevada importância') { echo 'selected'; } ?> >Elevada importância</option>
                                <option value="2" <?php if ($editar_pe_ie['risco_pe_ie'] == 'Classe 2 - Média importância') { echo 'selected'; } ?> >Média importância</option>
                                <option value="3" <?php if ($editar_pe_ie['risco_pe_ie'] == 'Classe 3 - Baixa importância') { echo 'selected'; } ?> >Baixa importância</option>
                                <option value="4" <?php if ($editar_pe_ie['risco_pe_ie'] == 'Classe 4 - Desativado') { echo 'selected'; } ?> >Desativado</option>
                            </select>
                        </div>

                    </div>

                    <div class="form-group">
                        <label class="col-sm-1 control-label">ENDEREÇO</label>
                        <div class="col-sm-5"><input type="text" autofocus tabindex="1" class="form-control rua" name="rua" data-toggle="tooltip" title="Ex: Francisco Rodrigues ..."
                                                     id="ruaselect" placeholder="NOME DO ENDEREÇO" onchange="upperCaseF(this)" value="<?php echo utf8_encode($editar_pe_ie['end_pe_ie']); ?>"></div>

                        <label class="col-sm-1 control-label">N</label>
                        <div class="col-sm-2"><input type="number" class="form-control" name="num" data-toggle="tooltip" title="Preenchimento Automatico"  placeholder="Nº" maxlength="5"
                                                     value="<?php echo $editar_pe_ie['num_pe_ie']; ?>"></div>

                        <label class="col-sm-1 control-label">COMP</label>
                        <div class="col-sm-2"><input type="text" class="form-control" name="comp" data-toggle="tooltip" title="Preenchimento Automatico" style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                                echo 'display: none;';
                            } ?>" placeholder="CASA , APTO"
                                                     onchange="upperCaseF(this)" value="<?php echo $editar_pe_ie['comp_pe_ie']; ?>"></div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-1 control-label">CEP</label>
                        <div class="col-sm-2"><input type="text" class="form-control"  name="cep" readonly id="cepcad" maxlength="9" placeholder="00000-000"
                                                     data-toggle="tooltip" title="Preenchimento Automatico" value="<?php echo $editar_pe_ie['cep_pe_ie']; ?>"></div>

                        <label class="col-sm-1 control-label">LOG</label>
                        <div class="col-sm-3"><input type="text" class="form-control"  readonly name="log" id="log" placeholder="RUA , AVENIDA"
                                                     data-toggle="tooltip" title="Preenchimento Automatico" value="<?php echo $editar_pe_ie['log_pe_ie']; ?>"></div>

                        <label class="col-sm-1 control-label">BAIRRO</label>
                        <div class="col-sm-4"><input type="text" class="form-control"  readonly id="bairro" name="bairro"
                                                     data-toggle="tooltip" title="Preenchimento Automatico" placeholder="BAIRRO" onchange="upperCaseF(this)" value="<?php echo $editar_pe_ie['bairro_pe_ie']; ?>"></div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-1 control-label">DA</label>
                        <div class="col-sm-1"><input type="text" id="da" readonly  data-toggle="tooltip" title="Preenchimento Automatico" maxlength="2"
                                                     class="form-control" name="da" placeholder="00" value="<?php echo $editar_pe_ie['da_pe_ie']; ?>"></div>

                        <label class="col-sm-1 control-label">SETOR</label>
                        <div class="col-sm-1"><input type="text"  readonly id="setor" class="form-control" name="setor" placeholder="0000"
                             data-toggle="tooltip" title="Preenchimento Automatico" value="<?php echo $editar_pe_ie['setor_pe_ie']; ?>"></div>

                        <label for="inputPagGuia" class="col-sm-2 control-label">PGGUIA</label>
                        <div class="col-sm-2"><input type="text" readonly class="form-control" name="pgguia" id="pgguias" placeholder="A00-A00"
                                value="<?php echo $editar_pe_ie['pgguia_pe_ie']; ?>" data-toggle="tooltip" title="Preenchimento Automatico"></div>

                        <label class="col-sm-1 control-label">UBS REF</label>
                        <div class="col-sm-3"><input type="text" class="form-control"  readonly id="localvd" name="localvd"  placeholder="UBS DE ABRANGÊNCIA"
                             data-toggle="tooltip" title="Preenchimento Automatico" value="<?php echo $editar_pe_ie['ubs_pe_ie']; ?>"></div>
                    </div>

                    <div class="form-group">

                        <label class="col-sm-1 control-label">GOOGLE</label>
                        <div class="col-sm-5"><input id="ruagoogle" readonly data-toggle="tooltip" title="Preenchimento Automatico"
                                                     class="form-control" type="text" value="<?php echo $editar_pe_ie['ruagoogle_pe_ie']; ?>" name="ruagoogle" placeholder="Avenida Francisco Rodrigues"></div>

                        <label class="col-sm-1 control-label">LAT</label>
                        <div class="col-sm-2"><input type="text" id="lat" data-toggle="tooltip" title="Ex: 23.4587899" class="form-control"
                                                     name="latitude" value="<?php echo $editar_pe_ie['lat_pe_ie']; ?>" placeholder="15,123456789"></div>

                        <label class="col-sm-1 control-label">LONG</label>
                        <div class="col-sm-2"><input type="text" id="lng" class="form-control"  data-toggle="tooltip" title="Ex: 46.458789" name="longitude"
                                                     placeholder="-19,123456789" value="<?php echo $editar_pe_ie['lng_pe_ie']; ?>"></div>

                    </div>


                    <!--<div class="form-group">
                        <label for="inputDescricao" class="col-sm-1 control-label">OBSERVAÇÃO</label>
                        <div class="col-sm-11">
                            <textarea class="form-control" rows="2" data-toggle="tooltip" data-placement="top" title="RETIRADA DE BTI, ENTREGA DE PLANILHA ..."
                                     name="observacao" placeholder="DESCREVA O DOCUMENTO: NOME, TIPO, ETC ...." onchange="upperCaseF(this)"><?php echo $editar_pe_ie['obs_pe_ie']; ?></textarea>
                        </div>
                    </div>-->

                    <input type="hidden" name="formulario" value="EDICAOLAT">
                    <input type="hidden" name="id" value="<?php echo $editar_pe_ie['id_pe_ie']; ?>">
                    <input type="hidden" name="idrua">
            </fieldset>

            <div class="form-group text-center">
                <div class="col-md-12">
                    <button type="submit" accesskey="G" style="<?php if ($_SESSION['usuarioNivelAcesso'] == "") {
                        echo 'display: none;';
                    } ?>" tabindex="4" data-toggle="tooltip" title="GRAVAR OS DADOS" class="btn btn-labeled btn-success btn-primary mb-2 mr-sm-4">
                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span> <u>G</u>RAVAR
                    </button>
                    <a href='suvisjt.php?pag=list-pe-ie-jt' role='button' data-toggle="tooltip" title="LISTAR REGISTROS" accesskey="L"
                       class="btn btn-labeled btn-info btn-primary mb-2 mr-sm-4"><span class="btn-label"><i
                                class="glyphicon glyphicon-list"></i></span> <u>L</u>ISTAR</a>
                    <a href='suvisjt.php' role='button' data-toggle="tooltip" title="SAIR DO FORMULÁRIO" accesskey="S"
                       class="btn btn-labeled btn-danger btn-primary mb-2 mr-sm-4"><span class="btn-label"><i
                                class="glyphicon glyphicon-remove"></i></span></i></span> <u>S</u>AIR</a>
                </div>
            </div>

            <?php  /*Verificar a pagina anterior e posterior*/ $pagina_anterior = $pagina - 1; $pagina_posterior = $pagina + 1;?>
            <nav class="text-center"><ul class="pagination">
                    <li><?php if($pagina_anterior != 0){ ?><a data-toggle="tooltip" title="Anterior" href="suvisjt.php?pag=edit-pe-ie-jt&pagina=<?php echo $pagina_anterior; ?>"
                                                              aria-label="Previous"><span aria-hidden="true">&laquo;</span></a><?php }else{ ?><span aria-hidden="true">&laquo;</span><?php } ?></li>
                    <?php /*Apresentar a paginacao*/for($i = 1; $i < $num_pagina + 1; $i++){ ?>
                        <li><a data-toggle="tooltip" title="Registro <?php echo $i;?>" href="suvisjt.php?pag=edit-pe-ie-jt&pagina=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                    <?php } ?>
                    <li><?php if($pagina_posterior <= $num_pagina){ ?><a data-toggle="tooltip" title="Próxima" href="suvisjt.php?pag=edit-pe-ie-jt&pagina=<?php echo $pagina_posterior;?>" aria-label="Previous">
                                <span aria-hidden="true">&raquo;</span></a><?php }else{ ?><span aria-hidden="true">&raquo;</span><?php }  ?></li></ul>
            </nav>

            </form>
        </div>
    </div>
</div>
