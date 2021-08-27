<?php

/* Este projeto é desenvolvido na Suvis Jaçanã-Tremembé com iniciativa dos colaboradores da Unidade
 * Código desenvolvido por Rodolfo Romaioli Ribeiro de Jesus - rodolfo.romaioli@gmail.com
 * Sisdam Web - 2.0 - 2017 - Todos os direitos reservados
 */

error_reporting(0);


include_once 'functions.php';

include_once 'sql-edit-end-sv2.php';

$agravo_hidden = $_GET['agravo'];

while($rows_edit_end = mysqli_fetch_assoc($resultado_edit_end)){?>


    <div class="container theme-showcase" role="main" xmlns="http://www.w3.org/1999/html">
        <!-- Página de Título -->
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <ol class="breadcrumb">
                        <li><i class="fa fa-database"></i> <a href="suvisjt.php">Sisdam Web</a></li>
                        <li class="active">Edição Endereços</li>
                        <li class="active">EXISTEM <span data-toggle="tooltip" title="<?php echo $num_pagina ;?> Casos para Atualizar" class="label label-danger"><?php echo $num_pagina ;?></span> CASOS DE <?php echo $agravo_hidden; ?> PARA ATUALIZAR</li>
                    </ol>
                    <?php $agravo = $rows_edit_end['ID_AGRAVO'];?>
                </div>
            </div>
        </div>
        <!-- Fim da Página de Título -->

        <div class="form-group text-center" style="<?php if ($_SESSION['usuarioNivelAcesso'] < 3) {
            echo 'display: none;';
        } ?>">
            <div class="alert alert-danger text-center" id="usuariook" role="alert"><strong>SEU NÍVEL DE USUÁRIO NÃO PERMITE EDITAR !!!</strong></div>
        </div>

        <div class="form-group text-center">
            <?php
            if (isset($_SESSION['msgedit'])) {echo $_SESSION['msgedit'];unset($_SESSION['msgedit']);}
            if (isset($_SESSION['msgerroredit'])) {echo $_SESSION['msgerroredit'];unset($_SESSION['msgerroredit']);}
            ?>
        </div>

        <div class="form-group text-center">
            <div class="alert alert-danger text-center" style="<?php if ($_SESSION['usuarioNivelAcesso'] <> "") {
                echo 'display:none';
            } ?>" role="alert"><strong>PARA EDITAR É NECESSARIO FAZER O LOGIN!!!</strong></div>
        </div>

        <style>
            #mapeditdengue {
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
                var map = new google.maps.Map(document.getElementById('mapeditdengue'), {
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

        <div class="row">
            <?php $id = $rows_edit_end["NU_NOTIFIC"]; ?>
            <?php $nome = $rows_edit_end["NM_PACIENT"]; ?>
            <div class="col-md-12"><fieldset <?php if ($_SESSION['usuarioNivelAcesso'] == "") {echo 'disable';} ?>>

                    <form class="form-horizontal" id="edit_end_ambiental-sv2" method="POST" action="suvisjt.php?pag=proc-edit-end-ambiental-sv2">

                        <div class="form-group" id="apresentacao">
                            <input id="ruagoogle1" tabindex="2" style="margin-top: 10px;" class="form-control" type="text"
                                   name="ruagoogle1" placeholder="Digite o local">
                            <div id="mapeditdengue"></div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-1 control-label">SINAN</label>
                            <div class="col-sm-2"><input type="text" class="form-control" data-toggle="tooltip" title="Preenchimento Automatico"
                                                          name="sinan" readonly value="<?php echo $rows_edit_end['NU_NOTIFIC']; ?>"></div>

                            <label class="col-sm-1 control-label">ENTRADA</label>
                            <div class="col-sm-2"><input type="text" class="form-control" readonly  data-toggle="tooltip" title="Preenchimento Automatico"
                                                         name="dataentrada" value="<?php echo date("d/m/Y"); ?>"></div>

                            <label class="col-sm-1 control-label">NOME</label>
                            <div class="col-sm-5"><input type="text" class="form-control" readonly name="nome"  data-toggle="tooltip" title="Preenchimento Automatico"
                                                         value="<?php echo $rows_edit_end['NM_PACIENT']; ?>"></div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-1 control-label">ENDEREÇO</label>
                            <div class="col-sm-5"><input type="text" autofocus tabindex="1" class="form-control rua" name="rua" data-toggle="tooltip" title="Ex: Francisco Rodrigues ..."
                                                         id="ruaselect" placeholder="NOME DO ENDEREÇO" onchange="upperCaseF(this)" value="<?php echo utf8_encode($rows_edit_end['NM_LOGRADO']); ?>"></div>

                            <label class="col-sm-1 control-label">N</label>
                            <div class="col-sm-2"><input type="number" tabindex="3" class="form-control" name="num" data-toggle="tooltip" title="Preenchimento Automatico"  placeholder="Nº" maxlength="5"
                                                         value="<?php echo $rows_edit_end['NU_NUMERO']; ?>"></div>

                            <label class="col-sm-1 control-label">COMP</label>
                            <div class="col-sm-2"><input type="text" class="form-control" name="comp" data-toggle="tooltip" title="Preenchimento Automatico" style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                                    echo 'display: none;';
                                } ?>" placeholder="CASA , APTO"
                                                         onchange="upperCaseF(this)" value="<?php echo $rows_edit_end['NM_COMPLEM']; ?>"></div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-1 control-label">CEP</label>
                            <div class="col-sm-2"><input type="text" class="form-control"  name="cep" readonly id="cepcad" maxlength="9" placeholder="00000-000"
                                                         data-toggle="tooltip" title="Preenchimento Automatico" value="<?php echo $rows_edit_end['NU_CEP']; ?>"></div>

                            <label class="col-sm-1 control-label">LOG</label>
                            <div class="col-sm-2"><input type="text" class="form-control"  readonly name="log" id="log" placeholder="RUA , AVENIDA"
                                                         data-toggle="tooltip" title="Preenchimento Automatico" value="<?php echo $rows_edit_end['ID_LOGRADO']; ?>"></div>

                            <label class="col-sm-1 control-label">BAIRRO</label>
                            <div class="col-sm-2"><input type="text" class="form-control"  readonly id="bairro" name="bairro"
                                                         data-toggle="tooltip" title="Preenchimento Automatico" placeholder="BAIRRO" onchange="upperCaseF(this)" value="<?php echo $rows_edit_end['NM_BAIRRO']; ?>"></div>

                            <label class="col-sm-1 control-label">DA/SET</label>
                            <div class="col-sm-1"><input type="text" id="da" readonly  data-toggle="tooltip" title="Preenchimento Automatico" maxlength="2"
                                                         class="form-control" name="da" placeholder="00" value="<?php echo $rows_edit_end['ID_DISTRIT']; ?>"></div>

                            <div class="col-sm-1"><input type="text"  readonly id="setor" class="form-control" name="setor" placeholder="0000"
                                                         data-toggle="tooltip" title="Preenchimento Automatico" value="<?php echo $rows_edit_end['ID_BAIRRO']; ?>"></div>
                        </div>

                        <div class="form-group">
                            <label for="inputPagGuia" class="col-sm-1 control-label">PGGUIA</label>
                            <div class="col-sm-2"><input type="text" readonly class="form-control" name="pgguia" id="pgguia" placeholder="A00-A00"
                                                         data-toggle="tooltip" title="Preenchimento Automatico" value="<?php echo $rows_edit_end['PgGuia1']; ?>"></div>

                            <label class="col-sm-1 control-label">UBS REF</label>
                            <div class="col-sm-2"><input type="text" class="form-control"  readonly id="localvd" name="localvd"  placeholder="UBS DE ABRANGÊNCIA"
                                                         data-toggle="tooltip" title="Preenchimento Automatico" value="<?php echo $rows_edit_end['NM_REFEREN']; ?>"></div>

                            <label class="col-sm-1 control-label">LAT</label>
                            <div class="col-sm-2"><input type="text" id="lat" data-toggle="tooltip" title="Ex: 23.4587899" class="form-control"
                                                         name="latitude" placeholder="15,123456789"></div>

                            <label class="col-sm-1 control-label">LNG</label>
                            <div class="col-sm-2"><input type="text" id="lng" class="form-control"  data-toggle="tooltip" title="Ex: 46.458789" name="longitude"
                                                         placeholder="-19,123456789"></div>
                        </div>

                        <div class="form-group">

                            <label class="col-sm-1 control-label">OBS</label>
                            <div class="col-sm-7"><input id="obs" readonly data-toggle="tooltip" title="Preenchimento Automatico"
                                 class="form-control" type="text" name="obs" value="<?php echo $rows_edit_end['DS_OBS']; ?>" placeholder="Avenida Francisco Rodrigues"></div>

                            <label class="col-sm-2 control-label">TESTE RÁPIDO</label>
                            <div class="col-sm-2"><input type="text" autofocus tabindex="4" class="form-control testerapido" name="testerapido" data-toggle="tooltip" title="Ex: Francisco Rodrigues ..."
                                 id="ruaselect" placeholder="NOME DO ENDEREÇO" value="Exame Nao Realizado"></div>

                        </div>

                        <div class="form-group">
                            <label for="inputCidade" class="col-sm-1 control-label">CNES</label>
                            <div class="col-sm-2"><input type="text" data-toggle="tooltip" title="Preenchimento Automatico" readonly class="form-control" name="cnes"
                                                         placeholder="1234567" value="<?php echo $rows_edit_end['ID_UNIDADE']; ?>"></div>

                            <label for="inputCidade" class="col-sm-1 control-label">ESTAB.</label>
                            <div class="col-sm-3"><input type="text" data-toggle="tooltip" title="Preenchimento Automatico" readonly class="form-control"
                                                         name="estabelecimento" placeholder="Preenchimento Automático" value="<?php echo $rows_edit_end['estabelecimento']; ?>"></div>

                            <label for="inputDataNasc" class="col-sm-1 control-label">NASC</label>
                            <div class="col-sm-2"><input type="text" data-toggle="tooltip" title="Preenchimento Automatico" readonly class="form-control"
                                                         name="datanascimento" placeholder="NAO CADASTRADO" value="<?php echo $rows_edit_end['DT_NASC']; ?>"></div>

                            <label class="col-sm-1 control-label">ID</label>
                            <div class="col-sm-1"><input type="text" id="idrua" class="form-control" data-toggle="tooltip"  title="Preenchimento Automático"
                                                         name="idrua" readonly placeholder="0000000"></div>
                            <input type="hidden" name="agravosinan" value="<?php echo $agravo_sinan_sql ;?>">
                            <input type="hidden" name="agravotabela" value="<?php echo $agravo_tabela_sql ;?>">
                            <input type="hidden" name="agravobuttons" value="<?php echo $agravo_buttons ;?>">
                            <input type="hidden" name="agravo" value="<?php echo $agravo_hidden ;?>">
                            <input type="hidden" name="agravoial" value="<?php echo $agravo_ial ;?>">
                            <input type="hidden" name="agravolist" value="<?php echo $agravo_list ;?>">
                            <input type="hidden" name="agravoimpresso" value="<?php echo $agravo_impresso ;?>">

                            <input type="hidden" name="dtnotific" value="<?php echo $rows_edit_end['DT_NOTIFIC'];?>">
                            <input type="hidden" name="semnot" value="<?php echo $rows_edit_end['SEM_NOT'];?>">
                            <input type="hidden" name="dtnasc" value="<?php echo $rows_edit_end['DT_NASC'];?>">
                            <input type="hidden" name="dtsinpri" value="<?php echo $rows_edit_end['DT_SIN_PRI'];?>">
                            <input type="hidden" name="sempri" value="<?php echo $rows_edit_end['SEM_PRI'];?>">
                            <input type="hidden" name="nudddtel" value="<?php echo $rows_edit_end['NU_DDD_TEL'];?>">
                            <input type="hidden" name="nutelefon" value="<?php echo $rows_edit_end['NU_TELEFON'];?>">
                            <input type="hidden" name="nmcomplem" value="<?php echo $rows_edit_end['NM_COMPLEM'];?>">
                            <input type="hidden" name="idade" id="idadeselect" value="<?php echo utf8_encode($rows_edit_end['idade_sv2']); ?>"></div>
                            <input type="hidden" name="sexo" value="<?php echo $rows_edit_end['CS_SEXO'];?>"></div>
                            <input type="hidden" name="se" value="<?php echo $rows_edit_end['se'];?>"></div>
                            <input type="hidden" name="dddtelefone" value="(<?php echo $rows_edit_end['NU_DDD_TEL'];?>)">
                            <input type="hidden" name="telefone" value="<?php echo $rows_edit_end['NU_TELEFON'];?>">
                            <input type="hidden" name="dataobito" value="<?php echo $rows_edit_end['DT_OBITO'];?>">
                        </div>

                        <div class="form-group text-center">
                            <div class="col-md-12">
                                <button type="submit" tabindex="5" accesskey="G" style="<?php if ($_SESSION['usuarioNivelAcesso'] == "") {
                                    echo 'display:none';
                                } ?>" data-toggle="tooltip" title="GRAVAR OS DADOS" class="btn btn-labeled btn-success mb-2 mr-sm-4"><span
                                            class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span> <u>G</u>RAVAR</button>

                                <a href='suvisjt.php?pag=list-bloq-<?php if ($agravo_buttons == 'dengue') echo 'dengue'.$url;
                                    elseif ($agravo_buttons == 'chiku') echo 'ial'.$url;
                                        elseif ($agravo_buttons == 'febrea') echo 'ial'.$url;
                                            elseif ($agravo_buttons == 'lepto') echo 'lepto'.$url;
                                        elseif ($agravo_buttons == 'zika') echo 'ial'.$url;
                                    else echo 'http://10.47.171.110/sisdamweb/suvisjt.php'?>'
                               role='button' data-toggle="tooltip" title="LISTAR REGISTROS" accesskey="L" class="btn btn-labeled btn-info mb-2 mr-sm-4">
                                    <span class="btn-label"><i class="glyphicon glyphicon-list"></i></span> <u>L</u>ISTAR</a>

                                <a target="_blank" href='http://siga.saude.prefeitura.sp.gov.br/sms/login.do?method=logoff' role='button' data-toggle="tooltip"
                                   title="SIGA SAUDE" accesskey="S" class="btn btn-labeled btn-dark mb-2 mr-sm-4"><span class="btn-label"><i
                                                class="glyphicon glyphicon-search"></i></span> <u>S</u>IGA-SAÚDE</a>

                                <a target="_blank" href='http://www.buscacep.correios.com.br/sistemas/buscacep/buscaCepEndereco.cfm'
                                   role='button' data-toggle="tooltip" title="BUSCA CEP CORREIOS" accesskey="S"
                                   class="btn btn-labeled btn-default mb-2 mr-sm-4"><span class="btn-label"><img src="imagens/correios.png" width="20"/></span>BUSCA CEP</a>
                             </div>
                        </div>


                </fieldset>
                <?php  /*Verificar a pagina anterior e posterior*/ $pagina_anterior = $pagina - 1; $pagina_posterior = $pagina + 1;?>
                <nav class="text-center"><ul class="pagination">
                        <li><?php if($pagina_anterior != 0){ ?><a data-toggle="tooltip" title="Anterior" href="suvisjt.php?pag=edit-end-ambiental-sv2&pagina=<?php echo $pagina_anterior; ?>&sinan=<?php echo $agravo_sinan_sql ;?>&tabela=<?php echo $agravo_tabela_sql ;?>&buttons=<?php echo $agravo_buttons ;?>&agravo=<?php echo $agravo_hidden;?>&ial=<?php echo $agravo_ial;?>"
                                                                  aria-label="Previous"><span aria-hidden="true">&laquo;</span></a><?php }else{ ?><span aria-hidden="true">&laquo;</span><?php } ?></li>
                        <?php /*Apresentar a paginacao*/for($i = 1; $i < $num_pagina + 1; $i++){ ?>
                            <li><a data-toggle="tooltip" title="Registro <?php echo $i;?>" href="suvisjt.php?pag=edit-end-ambiental-sv2&pagina=<?php echo $i; ?>&sinan=<?php echo $agravo_sinan_sql ;?>&tabela=<?php echo $agravo_tabela_sql ;?>&buttons=<?php echo $agravo_buttons ;?>&agravo=<?php echo $agravo_hidden;?>&ial=<?php echo $agravo_ial;?>"><?php echo $i; ?></a></li>
                        <?php } ?>
                        <li><?php if($pagina_posterior <= $num_pagina){ ?><a data-toggle="tooltip" title="Próxima" href="suvisjt.php?pag=edit-end-ambiental-sv2&pagina=<?php echo $pagina_posterior;?>&sinan=<?php echo $agravo_sinan_sql ;?>&tabela=<?php echo $agravo_tabela_sql ;?>&buttons=<?php echo $agravo_buttons ;?>&agravo=<?php echo $agravo_hidden;?>&ial=<?php echo $agravo_ial;?>" aria-label="Previous">
                                    <span aria-hidden="true">&raquo;</span></a><?php }else{ ?><span aria-hidden="true">&raquo;</span><?php }  ?></li></ul>
                </nav>
                </form>
            </div>
        </div>
    </div>

<?php } ?>

<script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAhlslumr1saHPVEJHkzPssYLEsWZJQQKU&libraries=places"></script>
