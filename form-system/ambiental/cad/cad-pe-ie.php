<!-- Este projeto é desenvolvido na Suvis Jaçanã-Tremembé com iniciativa dos colaboradores da Unidade -->
<!-- Código desenvolvido por Rodolfo Romaioli Ribeiro de Jesus - rodolfo.romaioli@gmail.com -->
<!-- Sisdam Web - 2.0 - 2017 - Todos os direitos reservados -->

<?php
error_reporting(0);
include_once '../../../locked/seguranca.php';
include_once '../../../conecta.php';
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
        var latlng = new google.maps.LatLng(-23.4709651,-46.58083020000004);
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

<div class="container theme-showcase" role="main">
    <!-- Página de Título -->
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <ol class="breadcrumb">
                    <li><i class="fa fa-database"></i> <a href="suvisjt.php">Sisdam Web</a></li>
                    <li class="active">Entrada de Materiais <?php echo $today = date("Y"); ?></li>
                </ol>
                <button type="button" class="btn btn-success btn-labeled btn-lg btn-block"><span class="btn-label"><i
                                class="glyphicon glyphicon-plus-sign"></i></span>CADASTRAR PE / IE <?php echo $today = date("Y"); ?></button>
                    <!--<img id="logo-img" class="img-responsive center-block" alt="Responsive image" src="imagens/manutencao-desculpe.jpg"/>-->
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
                <form class="form-horizontal" id="cad-pe-ie" method="POST" action="suvisjt.php?pag=proc-pe-ie">


                    <div class="form-group" id="apresentacao">
                        <input id="ruagoogle1" style="margin-top: 10px;" class="form-control" type="text"
                               name="ruagoogle1" placeholder="Digite o local">
                        <div id="mapeditpeie"></div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-1 control-label">TIPO</label>
                        <div class="col-sm-3">
                            <select autofocus data-toggle="tooltip" data-placement="top" title="PE ou IE"
                                class="form-control" id="tipo" name="tipo">
                                <option value="PE">PONTO ESTRATEGICO</option>
                                <option value="IE">IMOVEL ESPECIAL</option>
                            </select>
                        </div>

                        <label class="col-sm-1 control-label">ESPEC.</label>
                        <div class="col-sm-4">
                            <input type="text" data-toggle="tooltip" data-placement="top" title="Ex: DESMANCHE" id="especificacao"
                                   class="form-control especificacao" name="especificacao" placeholder="RECICLAGEM">
                        </div>

                        <label class="col-sm-1 control-label">RISCO</label>
                        <div class="col-sm-2">
                            <select autofocus data-toggle="tooltip" data-placement="top" title="PE ou IE"
                                    class="form-control" id="risco" name="risco">
                                <option value="1">GRAVE</option>
                                <option value="2">MÉDIO</option>
                                <option value="3">FRACO</option>
                                <option value="4">DESAT.</option>
                            </select>
                        </div>

                    </div>

                    <div class="form-group">
                        <label class="col-sm-1 control-label">ENDEREÇO</label>
                        <div class="col-sm-5"><input type="text" autofocus class="form-control rua" name="rua" data-toggle="tooltip" title="Ex: Francisco Rodrigues ..."
                                                     id="ruaselect" placeholder="NOME DO ENDEREÇO" onchange="upperCaseF(this)"></div>

                        <label class="col-sm-1 control-label">N</label>
                        <div class="col-sm-2"><input type="number" class="form-control" name="num" data-toggle="tooltip" title="Preenchimento Automatico"  placeholder="Nº" maxlength="5"></div>

                        <label class="col-sm-1 control-label">COMP</label>
                        <div class="col-sm-2"><input type="text" class="form-control" name="comp" data-toggle="tooltip" title="Preenchimento Automatico" style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                                echo 'display: none;';
                            } ?>" placeholder="CASA , APTO"
                                                     onchange="upperCaseF(this)"></div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-1 control-label">CEP</label>
                        <div class="col-sm-2"><input type="text" class="form-control"  name="cep" readonly id="cepcad" maxlength="9" placeholder="00000-000"
                                                     data-toggle="tooltip" title="Preenchimento Automatico"></div>

                        <label class="col-sm-1 control-label">LOG</label>
                        <div class="col-sm-3"><input type="text" class="form-control"  readonly name="log" id="log" placeholder="RUA , AVENIDA"
                                                     data-toggle="tooltip" title="Preenchimento Automatico"></div>

                        <label class="col-sm-1 control-label">BAIRRO</label>
                        <div class="col-sm-4"><input type="text" class="form-control"  readonly id="bairro" name="bairro"
                                                     data-toggle="tooltip" title="Preenchimento Automatico" placeholder="BAIRRO" onchange="upperCaseF(this)"></div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-1 control-label">DA</label>
                        <div class="col-sm-1"><input type="text" id="da" readonly  data-toggle="tooltip" title="Preenchimento Automatico" maxlength="2"
                                                     class="form-control" name="da" placeholder="00"></div>

                        <label class="col-sm-1 control-label">SETOR</label>
                        <div class="col-sm-1"><input type="text"  readonly id="setor" class="form-control" name="setor" placeholder="0000"
                                                     data-toggle="tooltip" title="Preenchimento Automatico"></div>

                        <label for="inputPagGuia" class="col-sm-2 control-label">PGGUIA</label>
                        <div class="col-sm-2"><input type="text" readonly class="form-control" name="pgguia" id="pgguia" placeholder="A00-A00"
                                                     data-toggle="tooltip" title="Preenchimento Automatico"></div>

                        <label class="col-sm-1 control-label">UBS REF</label>
                        <div class="col-sm-3"><input type="text" class="form-control"  readonly id="localvd" name="localvd"  placeholder="UBS DE ABRANGÊNCIA"
                                                     data-toggle="tooltip" title="Preenchimento Automatico"></div>
                    </div>

                    <div class="form-group">

                        <label class="col-sm-1 control-label">GOOGLE</label>
                        <div class="col-sm-5"><input id="ruagoogle" readonly data-toggle="tooltip" title="Preenchimento Automatico"
                                                     class="form-control" type="text" name="ruagoogle" placeholder="Avenida Francisco Rodrigues"></div>

                        <label class="col-sm-1 control-label">LAT</label>
                        <div class="col-sm-2"><input type="text" id="lat" data-toggle="tooltip" title="Ex: 23.4587899" class="form-control"
                                                     name="latitude" placeholder="15,123456789"></div>

                        <label class="col-sm-1 control-label">LONG</label>
                        <div class="col-sm-2"><input type="text" id="lng" class="form-control"  data-toggle="tooltip" title="Ex: 46.458789" name="longitude"
                                                     placeholder="-19,123456789"></div>

                    </div>


                    <div class="form-group">
                        <label for="inputDescricao" class="col-sm-1 control-label">OBSERVAÇÃO</label>
                        <div class="col-sm-11">
                            <textarea class="form-control" rows="2" data-toggle="tooltip" data-placement="top" title="RETIRADA DE BTI, ENTREGA DE PLANILHA ..."
                                  name="observacao" placeholder="DESCREVA O DOCUMENTO: NOME, TIPO, ETC ...." onchange="upperCaseF(this)"></textarea>
                        </div>
                    </div>

                    <input type="hidden" name="formulario" value="CADASTRO">
                    <input type="hidden" name="idrua">
            </fieldset>

            <div class="form-group text-center">
                <div class="col-md-12">
                    <button type="submit" accesskey="G" style="<?php if ($_SESSION['usuarioNivelAcesso'] == "") {
                        echo 'display: none;';
                    } ?>" data-toggle="tooltip" title="GRAVAR OS DADOS" class="btn btn-labeled btn-success btn-primary mb-2 mr-sm-4">
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

            </form>
        </div>
    </div>
</div>
