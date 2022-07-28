<?php
error_reporting(0);
include_once '../../locked/seguranca.php';
include_once '../../conecta.php';

$id = $_GET['id'];

$consulta_endereco = "SELECT * FROM ruas WHERE id='$id'";
$resultado_endereco = $conectar->query($consulta_endereco);
$editar_endereco = mysqli_fetch_assoc($resultado_endereco);

?>

<style>
    #mapedit {
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

<script type="text/javascript">
    function initialize() {
        var latlng = new google.maps.LatLng(<?php echo $editar_endereco['latitude'];?>,<?php echo $editar_endereco['longitude'];?>);
        var map = new google.maps.Map(document.getElementById('mapedit'), {
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
                window.alert("Autocomplete's returned place contains no geometry");
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

    <!-- Pagina de Titulo -->
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">

                <button type="button" class="btn btn-warning btn-lg btn-block">EDITAR ESPOROTRICOSE ANIMAL</button>
            </div>
        </div>
    </div>
    <!-- Fim da Pagina de Titulo -->

    <div class="form-group text-center" style="<?php if ($_SESSION['usuarioNivelAcesso'] < 3) {
        echo 'display: none;';
    } ?>">
        <div class="alert alert-danger text-center" id="usuariook" role="alert"><strong>SEU NÍVEL DE USUÁRIO NÃO PERMITE
                EDITAR !!!</strong></div>
    </div>

    <div class="form-group text-center" style="<?php if ($_SESSION['usuarioNivelAcesso']<> "") {
        echo 'display: none;';
    } ?>">
        <div class="alert alert-danger text-center" id="usuariook" role="alert"><strong>VOCÊ DEVE ESTAR LOGADO PARA
                EDITAR !!!</strong></div>
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
                <form class="form-horizontal" id="edit-esporo-animal" method="POST" action="suvisjt.php?pag=proc-edit-esporo-animal">

                    <div class="form-group" id="apresentacao">
                        <input id="searchInput" style="margin-top: 10px;" class="form-control" type="text"
                               name="ruagoogle" placeholder="Digite o local"
                               value="<?php echo $editar_endereco['ruagoogle']; ?>">
                        <div id="mapedit"></div>
                    </div>

                    <div class="form-group">
                        <label for="inputDa" class="col-sm-1 control-label">DA</label>
                        <div class="col-sm-1">
                            <input type="text" id="da" autofocus data-toggle="tooltip" title="Ex: 38" maxlength="2"
                                   class="form-control" name="da" placeholder="00"
                                   value="<?php echo $editar_endereco['da']; ?>">
                        </div>

                        <label for="inputSetor" class="col-sm-1 control-label">SETOR</label>
                        <div class="col-sm-1">
                            <input type="text" data-toggle="tooltip" title="Ex: 3838" id="setor" maxlength="4"
                                   class="form-control" name="setor" placeholder="0000"
                                   value="<?php echo $editar_endereco['setor']; ?>">
                        </div>

                        <label for="inputPagGuia" class="col-sm-2 control-label">PGGUIA</label>
                        <div class="col-sm-2">
                            <input type="text" data-toggle="tooltip" title="Ex: 090-A22" maxlength="7"
                                   class="form-control" name="pgguia" onchange="upperCaseF(this)" placeholder="A00-A00"
                                   value="<?php echo $editar_endereco['pgguia']; ?>">
                        </div>

                        <label for="inputLog" class="col-sm-2 control-label">CEP</label>
                        <div class="col-sm-2">
                            <input type="text" data-toggle="tooltip" id="cep" title="Ex: 01234-567" class="form-control"
                                   name="cep" placeholder="00000-000" value="<?php echo $editar_endereco['cep']; ?>">
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="inputLog" class="col-sm-1 control-label">LOG</label>
                        <div class="col-sm-2">
                            <input type="text" data-toggle="tooltip" title="Ex: Rua, Avenida ..."
                                   class="form-control log" name="log" id="sublocality" placeholder="RUA , AVENIDA ..."
                                   onchange="upperCaseF(this)" value="<?php echo $editar_endereco['log']; ?>">
                        </div>
                        <label for="inputEndereco" class="col-sm-1 control-label">END</label>
                        <div class="col-sm-4">
                            <input type="text" data-toggle="tooltip" id="location" title="Ex: Francisco Rodrigues ..."
                                   class="form-control" name="ruaoutros" onchange="upperCaseF(this)"
                                   placeholder="FRANCISCO RODRIGUES" value="<?php echo $editar_endereco['rua']; ?>">
                        </div>

                        <label for="inputBairro" class="col-sm-1 control-label">BAIRRO</label>
                        <div class="col-sm-3">
                            <input type="text" data-toggle="tooltip" id="bairro" title="Ex: Vila Constanca"
                                   class="form-control" name="bairro" onchange="upperCaseF(this)" placeholder="BAIRRO"
                                   value="<?php echo $editar_endereco['bairro']; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputUbs" class="col-sm-1 control-label">UBS</label>
                        <div class="col-sm-3">
                            <input type="text" id="ubs" data-toggle="tooltip" title="Ex: Ubs Jacana"
                                   class="form-control ubs" name="ubs" onchange="upperCaseF(this)"
                                   placeholder="UBS DE ABRANGENCIA" value="<?php echo $editar_endereco['ubs']; ?>">
                        </div>

                        <label for="inputAtual" class="col-sm-1 control-label">ATUAL?</label>
                        <div class="col-sm-1">
                            <input type="text" readonly id="atual" data-toggle="tooltip" title="Preenchimento Automático de atualização de Ubs"
                                   class="form-control" name="atual" value="<?php echo $editar_endereco['atual']; ?>">
                        </div>

                        <label for="inputCidade" class="col-sm-1 control-label">LAT</label>
                        <div class="col-sm-2">
                            <input type="text" id="lat" data-toggle="tooltip" maxlength="20"
                                   title="Ex: Preenchimento Automatico" class="form-control" name="latitude"
                                   placeholder="15,123456789" value="<?php echo $editar_endereco['latitude']; ?>">
                        </div>

                        <label for="inputCidade" class="col-sm-1 control-label">LONG</label>
                        <div class="col-sm-2">
                            <input type="text" id="lng" data-toggle="tooltip" maxlength="20"
                                   title="Ex: Preenchimento Automatico" class="form-control" name="longitude"
                                   placeholder="-19,123456789" value="<?php echo $editar_endereco['longitude']; ?>">
                        </div>

                    </div>


                    <div class="form-group text-center">
                        <input type="hidden" name="id" value="<?php echo $editar_endereco['id']; ?>">
                        <button type="submit" accesskey="G" style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                            echo 'display: none;';
                        } ?>" data-toggle="tooltip" title="GRAVAR OS DADOS" class="btn btn-labeled btn-success">
                            <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span> <u>G</u>RAVAR</button>&nbsp;&nbsp;&nbsp;&nbsp;

                        <a href='suvisjt.php?pag=list-esporo-animal' role="button" type='button' accesskey="L" class="btn btn-labeled btn-info"><span class="btn-label"><i
                                        class="glyphicon glyphicon-list"></i></span><u>L</u>ISTAR</a>&nbsp;&nbsp;&nbsp;

                        <a target="_blank" href='http://www.buscacep.correios.com.br/sistemas/buscacep/buscaCepEndereco.cfm'
                        role='button' data-toggle="tooltip" title="BUSCA CEP CORREIOS" accesskey="S"
                                class="btn btn-labeled btn-default"><span class="btn-label"><img src="imagens/correios.png" width="20"/></span>BUSCA CEP</a>
                    </div>

                </form>
            </fieldset>
        </div>
    </div>
</div> <!-- /container -->
<script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAhlslumr1saHPVEJHkzPssYLEsWZJQQKU&libraries=places"></script>