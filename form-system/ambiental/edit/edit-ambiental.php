<?php

/* Este projeto é desenvolvido na Suvis Jaçanã-Tremembé com iniciativa dos colaboradores da Unidade
 * Código desenvolvido por Rodolfo Romaioli Ribeiro de Jesus - rodolfo.romaioli@gmail.com
 * Sisdam Web - 2.0 - 2017 - Todos os direitos reservados
 */

error_reporting(0);
$nDoc = $_GET['nDoc'];

include_once 'functions.php';

$consulta_epidemio = "SELECT $agravo_tabela_sql.CnesUnidadeNotificadora, $agravo_tabela_sql.UnidadeNotificadora, $agravo_tabela_sql.DataEntrada, $agravo_tabela_sql.nDoc, $agravo_tabela_sql.Endereco1, $agravo_tabela_sql.N, 
$agravo_tabela_sql.Complemento, $agravo_tabela_sql.Logradouro, $agravo_tabela_sql.Cep1, $agravo_tabela_sql.PgGuia1, $agravo_tabela_sql.Bairro1, $agravo_tabela_sql.Da, $agravo_tabela_sql.Setor1, $agravo_tabela_sql.UBS1, $agravo_tabela_sql.NomeSolicitante,
$agravo_tabela_sql.usuarioAlteracao, $agravo_tabela_sql.RuaGoogle, $agravo_tabela_sql.Latitude, $agravo_tabela_sql.Longitude, $agravo_tabela_sql.idRua,$agravo_tabela_sql.DataBloqueio, $agravo_tabela_sql.DataNeb,$agravo_tabela_sql.Impressao,$agravo_tabela_sql.Descarte,
cnes.cnes, cnes.estabelecimento,
$agravo_sinan_sql.NU_NOTIFIC, $agravo_sinan_sql.DT_NOTIFIC, $agravo_sinan_sql.SEM_NOT, $agravo_sinan_sql.NM_PACIENT, $agravo_sinan_sql.DT_SIN_PRI,
$agravo_sinan_sql.SEM_PRI, $agravo_sinan_sql.ID_AGRAVO, $agravo_sinan_sql.DT_NASC
FROM $agravo_tabela_sql LEFT JOIN cnes ON $agravo_tabela_sql.CnesUnidadeNotificadora = cnes.cnes
LEFT JOIN $agravo_sinan_sql ON $agravo_tabela_sql.nDoc = $agravo_sinan_sql.NU_NOTIFIC 
WHERE nDoc='$nDoc'";
$resultado_epidemio = $conectar->query($consulta_epidemio);
$editar_epidemio = mysqli_fetch_assoc($resultado_epidemio);

?>

<style>
    #mapeditepidemio {
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
        var latlng = new google.maps.LatLng(<?php echo $editar_epidemio['Latitude'];?>,<?php echo $editar_epidemio['Longitude'];?>);
        var map = new google.maps.Map(document.getElementById('mapeditepidemio'), {
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

<div class="container theme-showcase" role="main" xmlns="http://www.w3.org/1999/html">
    <!-- Página de Título -->
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <ol class="breadcrumb">
                    <li><i class="fa fa-database"></i> <a href="suvisjt.php">Sisdam Web</a></li>
                    <li class="active">Edição Endereços</li>
                    <li class="active"><?php echo $agravo_hidden; ?></li>
                </ol>
                <?php $agravo = $editar_epidemio['ID_AGRAVO'];?>
            </div>
            <?php
            if (isset($_SESSION['msgsuccess'])) {echo $_SESSION['msgsuccess'];unset($_SESSION['msgsuccess']);} /*Mensagem Teste Rapido Reagente*/
            if (isset($_SESSION['msgdanger'])) {echo $_SESSION['msgdanger'];unset($_SESSION['msgdanger']);} /**/
            if (isset($_SESSION['msgwarning'])) {echo $_SESSION['msgwarning'];unset($_SESSION['msgwarning']);} /* Mensagem Teste Rapido Não Reagente*/
            if (isset($_SESSION['msgerro'])) {echo $_SESSION['msgerro'];unset($_SESSION['msgerro']);} /**/
            if (isset($_SESSION['msgedit'])) {echo $_SESSION['msgedit'];unset($_SESSION['msgedit']);}
            if (isset($_SESSION['msgerroredit'])) {echo $_SESSION['msgerroredit'];unset($_SESSION['msgerroredit']);}
            ?>
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

    <div class="row">
        <div class="col-md-12"><fieldset <?php if ($_SESSION['usuarioNivelAcesso'] == "") {echo 'disable';} ?>>

            <form class="form-horizontal" id="edicao_end_epidemio" method="POST" action="suvisjt.php?pag=proc-edit-ambiental">

                <div class="form-group" id="apresentacao">
                    <input id="ruagoogle1" style="margin-top: 10px;" class="form-control" type="text"
                           name="ruagoogle1" value="<?php echo $editar_epidemio['RuaGoogle']; ?>" placeholder="Digite o local">
                    <div id="mapeditepidemio"></div>
                </div>

                <div class="form-group">
                    <label class="col-sm-1 control-label">SINAN</label>
                        <div class="col-sm-2"><input type="text" class="form-control" data-toggle="tooltip" title="Preenchimento Automatico"
                             required name="sinan" readonly value="<?php echo $editar_epidemio['nDoc']; ?>"></div>

                    <label class="col-sm-1 control-label">ENTRADA</label>
                        <div class="col-sm-2"><input type="text" class="form-control" readonly required data-toggle="tooltip" title="Preenchimento Automatico"
                             name="dataentrada" value="<?php echo $editar_epidemio['DataEntrada']; ?>"></div>

                    <label class="col-sm-1 control-label">NOME</label>
                        <div class="col-sm-5"><input type="text" class="form-control" readonly name="nome" required data-toggle="tooltip" title="Preenchimento Automatico"
                             value="<?php echo $editar_epidemio['NomeSolicitante']; ?>"></div>
                </div>

                <div class="form-group">
                    <label class="col-sm-1 control-label">ENDEREÇO</label>
                        <div class="col-sm-5"><input type="text" class="form-control rua" name="rua" data-toggle="tooltip" title="Ex: Francisco Rodrigues ..." required
                           id="ruaselect" placeholder="NOME DO ENDEREÇO" autofocus onchange="upperCaseF(this)" value="<?php echo $editar_epidemio['Endereco1']; ?>"></div>

                    <label class="col-sm-1 control-label">N</label>
                        <div class="col-sm-2"><input type="number" class="form-control" name="num" data-toggle="tooltip" title="Preenchimento Automatico" required placeholder="Nº" maxlength="5"
                            value="<?php echo $editar_epidemio['N']; ?>"></div>

                        <label class="col-sm-1 control-label">COMP</label>
                        <div class="col-sm-2"><input type="text" class="form-control" readonly name="comp" data-toggle="tooltip" title="Preenchimento Automatico" style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                                echo 'display: none;';
                            } ?>" placeholder="CASA , APTO"
                             onchange="upperCaseF(this)" value="<?php echo $editar_epidemio['Complemento']; ?>"></div>
                </div>

                <div class="form-group">
                    <label class="col-sm-1 control-label">CEP</label>
                        <div class="col-sm-2"><input type="text" class="form-control" required name="cep" readonly id="cepcad" maxlength="9" placeholder="00000-000"
                             data-toggle="tooltip" title="Preenchimento Automatico" value="<?php echo $editar_epidemio['Cep1']; ?>"></div>

                        <label class="col-sm-1 control-label">LOG</label>
                        <div class="col-sm-3"><input type="text" class="form-control" required readonly name="log" id="log" placeholder="RUA , AVENIDA"
                             data-toggle="tooltip" title="Preenchimento Automatico" value="<?php echo $editar_epidemio['Logradouro']; ?>"></div>

                        <label class="col-sm-1 control-label">BAIRRO</label>
                        <div class="col-sm-4"><input type="text" class="form-control" required readonly id="bairro" name="bairro"
                             data-toggle="tooltip" title="Preenchimento Automatico" placeholder="BAIRRO" onchange="upperCaseF(this)" value="<?php echo $editar_epidemio['Bairro1']; ?>"></div>
                </div>

                <div class="form-group">
                    <label class="col-sm-1 control-label">DA</label>
                        <div class="col-sm-1"><input type="text" id="da" readonly required data-toggle="tooltip" title="Preenchimento Automatico" maxlength="2"
                           class="form-control" name="da" placeholder="00" value="<?php echo $editar_epidemio['Da']; ?>"></div>

                    <label class="col-sm-1 control-label">SETOR</label>
                        <div class="col-sm-1"><input type="text" required readonly id="setor" class="form-control" name="setor" placeholder="0000"
                             data-toggle="tooltip" title="Preenchimento Automatico" value="<?php echo $editar_epidemio['Setor1']; ?>"></div>

                    <label class="col-sm-2 control-label">PGGUIA</label>
                        <div class="col-sm-2"><input type="text" readonly class="form-control" name="pgguia" placeholder="A00-A00"
                             data-toggle="tooltip" title="Preenchimento Automatico" value="<?php echo $editar_epidemio['PgGuia1']; ?>"></div>

                    <label class="col-sm-1 control-label">UBS REF</label>
                        <div class="col-sm-3"><input type="text" class="form-control" required readonly id="localvd" name="localvd"  placeholder="UBS DE ABRANGÊNCIA"
                             data-toggle="tooltip" title="Preenchimento Automatico" value="<?php echo $editar_epidemio['UBS1']; ?>"></div>
                </div>

                <div class="form-group">

                    <label class="col-sm-1 control-label">GOOGLE</label>
                        <div class="col-sm-5"><input id="ruagoogle" readonly data-toggle="tooltip" title="Preenchimento Automatico"
                            class="form-control" type="text" name="ruagoogle" placeholder="Avenida Francisco Rodrigues" value="<?php echo $editar_epidemio['RuaGoogle']; ?>"></div>

                    <label class="col-sm-1 control-label">LAT</label>
                        <div class="col-sm-2"><input type="text" id="lat" data-toggle="tooltip" title="Ex: 23.4587899" class="form-control"
                             name="latitude" placeholder="15,123456789" value="<?php echo $editar_epidemio['Latitude']; ?>"></div>

                    <label class="col-sm-1 control-label">LONG</label>
                        <div class="col-sm-2"><input type="text" id="lng" class="form-control"  data-toggle="tooltip" title="Ex: 46.458789" name="longitude"
                             placeholder="-19,123456789" value="<?php echo $editar_epidemio['Longitude']; ?>"></div>

                </div>

                <div class="form-group">
                    <label for="inputCidade" class="col-sm-1 control-label">CNES</label>
                    <div class="col-sm-2"><input type="text" data-toggle="tooltip" title="Preenchimento Automatico" readonly class="form-control" name="cnes"
                                                 placeholder="1234567" value="<?php echo $editar_epidemio['CnesUnidadeNotificadora']; ?>"></div>

                    <label for="inputCidade" class="col-sm-1 control-label">ESTAB.</label>
                    <div class="col-sm-3"><input type="text" data-toggle="tooltip" title="Preenchimento Automatico" readonly class="form-control"
                                                 name="estabelecimento" placeholder="NAO CADASTRADO" value="<?php echo $editar_epidemio['estabelecimento']; ?>"></div>

                    <label class="col-sm-1 control-label">ID</label>
                    <div class="col-sm-1"><input type="text" id="idrua" class="form-control" data-toggle="tooltip"  title="Preenchimento Automático"
                                                 name="idrua" readonly placeholder="0000000" value="<?php echo $editar_epidemio['idRua']; ?>"></div>

                    <label for="inputDataNasc" class="col-sm-1 control-label">NASC</label>
                    <div class="col-sm-2"><input type="text" data-toggle="tooltip" title="Preenchimento Automatico" readonly class="form-control"
                                                 name="datanascimento" placeholder="NAO CADASTRADO" value="<?php echo $editar_epidemio['DT_NASC']; ?>"></div>
                </div>

                <div class="form-group">
                    <label class="col-sm-1 control-label">BLOQUEIO</label>
                    <div class="col-sm-2">
                            <input type="text" class="form-control" data-toggle="tooltip"
                                   title="Maior que Data de Notificação" name="databloq" id="databloqedit"
                                   placeholder="00/00/0000" value="<?php echo $editar_epidemio['DataBloqueio']; ?>">
                    </div>

                    <label class="col-sm-1 control-label">NEB</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" data-toggle="tooltip"
                               title="Maior que Data de Notificação" name="dataneb" id="datanebedit"
                               placeholder="00/00/0000" value="<?php echo $editar_epidemio['DataNeb']; ?>">
                    </div>

                    <label for="inputDataNot" class="col-sm-2 control-label">NOT</label>
                    <div class="col-sm-2">
                        <input type="text" readonly class="form-control" data-toggle="tooltip"
                               title="Não pode ser maior que hoje" name="datanot" id="datanotcad"
                               placeholder="00/00/0000" value="<?php echo $editar_epidemio['DT_NOTIFIC']; ?>">
                    </div>

                    <input type="hidden" name="impressao" readonly value="<?php echo $editar_epidemio['Impressao']; ?>">
                    <input type="hidden" name="descarte" readonly value="<?php echo $editar_epidemio['Descarte']; ?>">
                    <input type="hidden" name="agravosinan" value="<?php echo $agravo_sinan_sql ;?>">
                    <input type="hidden" name="agravotabela" value="<?php echo $agravo_tabela_sql ;?>">
                    <input type="hidden" name="agravobuttons" value="<?php echo $agravo_buttons ;?>">
                    <input type="hidden" name="agravo" value="<?php echo $agravo_hidden ;?>">
                    <input type="hidden" name="agravoial" value="<?php echo $agravo_ial ;?>">
                    <input type="hidden" name="agravolist" value="<?php echo $agravo_list ;?>">
                    <input type="hidden" name="agravoimpresso" value="<?php echo $agravo_impresso ;?>">
                </div>

                <div class="form-group text-center">
                    <div class="col-md-12">
                    <button type="submit" accesskey="G" style="<?php if ($_SESSION['usuarioNivelAcesso'] == "") {
                        echo 'display:none';
                    } ?>" data-toggle="tooltip" title="GRAVAR OS DADOS" class="btn btn-labeled btn-success mb-2 mr-sm-4"><span
                                class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span> <u>G</u>RAVAR</button>


                <a href='suvisjt.php?pag=list-bloq-<?php echo $agravo_list.$url ;?>' role='button' data-toggle="tooltip"
                   title="LISTAR REGISTROS" accesskey="L" class="btn btn-labeled btn-info mb-2 mr-sm-4"><span class="btn-label"><i
                        class="glyphicon glyphicon-list"></i></span> <u>L</u>ISTAR</a>

                <a target="_blank" href='http://siga.saude.prefeitura.sp.gov.br/sms/login.do?method=logoff' role='button' data-toggle="tooltip"
                   title="SIGA SAUDE" accesskey="S" class="btn btn-labeled btn-dark mb-2 mr-sm-4"><span class="btn-label"><i
                                class="glyphicon glyphicon-search"></i></span> <u>S</u>IGA-SAÚDE</a>


                   </div>
                </div>

            </fieldset>

                </form>
        </div>
    </div>
</div>

<script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAhlslumr1saHPVEJHkzPssYLEsWZJQQKU&libraries=places"></script>