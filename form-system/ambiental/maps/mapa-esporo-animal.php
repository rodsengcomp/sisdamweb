<?php
/**
 * Created by PhpStorm.
 * User: SMS
 * Date: 29/01/2019
 * Time: 14:38
 */

error_reporting(1);

$contar = $conectar->query("SELECT lixeira FROM esporo_an WHERE lixeira = 0");
$count = $contar->num_rows;

$cnexamepos = $conectar->query("SELECT resultado_esporo.Resultado FROM resultado_esporo RIGHT JOIN esporo_an ON resultado_esporo.Nr_Pedido = esporo_an.pedido WHERE resultado_esporo.Resultado='Positivo' AND esporo_an.lixeira = 0");
$countexamepos = $cnexamepos->num_rows;

$cnexameneg = $conectar->query("SELECT resultado_esporo.Resultado FROM resultado_esporo RIGHT JOIN esporo_an ON resultado_esporo.Nr_Pedido = esporo_an.pedido WHERE resultado_esporo.Resultado='Negativo' AND esporo_an.lixeira = 0");
$countexameneg = $cnexameneg->num_rows;

$countexamesex = $count - ($countexamepos + $countexameneg);

$cs_sinan = $conectar->query("SELECT CREATE_TIME FROM information_schema.tables WHERE TABLE_NAME = 'esporo_an' ORDER BY `CREATE_TIME` DESC");
$row_sinan = mysqli_fetch_assoc($cs_sinan);

$cs_exame_esporo = $conectar->query("SELECT CREATE_TIME FROM information_schema.tables WHERE TABLE_NAME = 'resultado_esporo' ORDER BY `CREATE_TIME` DESC");
$row_exame_esporo = mysqli_fetch_assoc($cs_exame_esporo);

?>

<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAhlslumr1saHPVEJHkzPssYLEsWZJQQKU&callback=initMap">
</script>


<div class="container-fluid" role="main" xmlns="http://www.w3.org/1999/html">
    <!-- begin PAGE TITLE ROW -->
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <ol class="breadcrumb">
                    <li><i class="fa fa-database"></i> <a href="suvisjt.php">Sisdam Web</a></li>
                    <li class="active">Lista de Esporotricose Animal</li>
                    <li class="active">Resultados : Positivos <span role="button" class="btn btn-danger rounded-circle"><?=$countexamepos?></span>
                    <li class="active">Negativos <span role="button" class="btn btn-success rounded-circle"><?=$countexameneg?></span>
                    <li class="active">Sem Coleta <span role="button" class="btn btn-warning rounded-circle"><?=$countexamesex?></span>
                </ol>
                <button type="button" style="opacity: unset" class="disabled btn btn-success btn-labeled btn-lg btn-block" data-toggle="tooltip" title="Lista de Bloqueios 1ª Via" ><span class="btn-label"><i
                                class="fa fa-globe-americas"></i></span>CASOS DE ESPOROTRICOSE ANIMAL - <?php echo date("Y")?></button>
            </div>
        </div>
    </div>

</div>

<style>
    /* Always set the map height explicitly to define the size of the div
     * element that contains the map. */
    #map {
        height: 70%;
        margin-left: 20px;
        margin-right: 20px;
    }
    a:active, a:focus {
        outline: 0;
        border: none;
        color: black;
        -moz-outline-style: none;
    }
    /* Optional: Makes the sample page fill the window. */
    html, body {
        height: 100%;
        margin-left: 20px;
        margin-right: 20px;
    }
    map {
        height: 400px;
        width: 98%;
        border: 5px outset SteelBlue;
    }
</style>

<div id="map"></div>

<script>
    var iconBase = 'imagens/esporo_animal/';
    var customIcons = {
        CANINA_POSITIVO: {
            icon: iconBase + 'cao_positivo.png'
        },
        CANINA_NEGATIVO: {
            icon: iconBase + 'cao_negativo.png'
        },
        CANINA_: {
            icon: iconBase + 'cao_aguardando.png'
        },
        FELINA_POSITIVO: {
            icon: iconBase + 'gato_positivo.png'
        },
        FELINA_NEGATIVO: {
            icon: iconBase + 'gato_negativo.png'
        },
        FELINA_: {
            icon: iconBase + 'gato_aguardando.png'
        }
    };

    function initMap() {
        var cluster = [];
        var map = new google.maps.Map(document.getElementById("map"), {
            center: new google.maps.LatLng(-23.457019,-46.584551), <!-- -23.457019, -46.584551),-->
            zoom: 15, <!-- 15 original-->
            mapTypeId: 'roadmap',
            styles: [{
                featureType : "poi",
                stylers : [{
                    visibility : "simplified"
                }]
            }]
        });
        var infowindow = new google.maps.InfoWindow();

        // Altere isso dependendo do nome do seu arquivo PHP ou XML
        downloadUrl('form-system/ambiental/maps/proc-maps-ambiental/proc-maps-esporo-animal.php?exame=positivo', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName("marker");
            for (var i = 0; i < markers.length; i++) {
                let id = markers[i].getAttribute("id");
                let name = markers[i].getAttribute("name");
                let nametutor = markers[i].getAttribute("nametutor");
                let dtres = markers[i].getAttribute("dtres");
                let resultado = markers[i].getAttribute("resultado");
                let sint = markers[i].getAttribute("sint");
                let idrua = markers[i].getAttribute("idrua");
                let comp = markers[i].getAttribute("comp");
                let address = markers[i].getAttribute("address");
                let type = markers[i].getAttribute("type");
                let lat = markers[i].getAttribute("lat");
                let lng = markers[i].getAttribute("lng");
                let pin = markers[i].getAttribute("pin");
                let ruagoogle = markers[i].getAttribute("ruagoogle");

                var point = new google.maps.LatLng(
                    parseFloat(markers[i].getAttribute("lat")),
                    parseFloat(markers[i].getAttribute("lng")));

                var icon = customIcons[type] || {};
                var marker = new google.maps.Marker({
                    map: map,
                    position: point,
                    icon: icon.icon,
                });

                if(resultado == ""){
                    resultado = "SEM RESULTADO"
                }
                if(pin == 0){
                    pin = ""
                }else{
                    pin = pin + " - "
                }

                let html = "";
                let icone = "";

                if(resultado == "POSITIVO") {
                    html = "#ff4122";
                    icone = "<i class='ri-close-circle-line' style='font-size: 2rem; position: absolute; left: 8%; top: 10%;'></i>";
                } else if(resultado == "NEGATIVO"){
                    html = "#00FF00";
                    icone = "<i class='ri-checkbox-circle-line' style='font-size: 2rem; position: absolute; left: 8%; top: 10%;'></i>";
                } else {
                    html = "#FFFF8F";
                    icone = "<i class='ri-error-warning-line' style='font-size: 2rem; position: absolute; left: 8%; top: 10%;'></i>";
                }

                if(dtres == null){
                    dtres = "SEM DATA"
                }

                if(sint == "0000-00-00"){
                    sint = "SEM DATA"
                }

                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                        infowindow.setContent(
                            "<p style='text-align: center; margin-bottom: 1rem; padding: 5px 0; background-color:" + html + "; font-size: 1.5rem; position: relative'><b>"
                            + pin +
                            "<a title='Editar o animal' target='_blank' href='suvisjt.php?pag=edit-esporo-animal&id=" + id +"'>"
                            + name +
                            "</a></b>" + icone + "</p><p> ENDEREÇO: <a target='_blank' title='Editar o endereço' href='suvisjt.php?pag=edit-end&id="
                            + idrua +
                            "'>"
                            + address +
                            "</a> , " + comp + "</b></p><p>  TUTOR: "
                            + nametutor +
                            "</b></p><p>  RESULTADO: "
                            + resultado +
                            "</b></p><p> DATA RESULTADO: "
                            + dtres +
                            "</b></p><p>  DATA SINTOMAS: "
                            + sint +
                            "</b></p><p>  ROTA: <a title='Traçar rota' target='_blank' href='https://www.google.com.br/maps/dir/?api=1&origin=R. Maria Amália Lopes Azevedo, 3676 - Vila Albertina&destination=" + ruagoogle + "&travelmode=driving'>" + lat + " , " + lng + "</a></p>"

                        );
                        infowindow.open(map, marker);

                        //This sends information from the clicked icon back to the serverside code
                        document.getElementById("setlatlng").innerHTML = markers[i].getAttribute("name");
                    }
                })(marker, i));
                cluster.push(marker);
            }

            var markerCluster = new MarkerClusterer(map, cluster, {maxZoom: 21, imagePath: 'imagens/esporo_animal/m'});

            markerCluster.onClickZoom = function() { return multiChoice(markerCluster); }
        });
    }

    function bindInfoWindow(marker, map, infoWindow, html) {
        google.maps.event.addListener(marker, 'click', function() {
            infoWindow.setContent(html);
            infoWindow.open(map, marker);

        });
    }

    function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
            if (request.readyState == 4) {
                request.onreadystatechange = doNothing;
                callback(request, request.status);
            }
        };

        request.open('GET', url, true);
        request.send(null);
    }

    function doNothing() {}

    function multiChoice(mc) {
     var cluster = mc.clusters_;
        // se mais de 1 ponto compartilhar a mesma lat/long
        // o tamanho do array de cluster será 1 AND
        // o número de marcadores no cluster será > 1
        // LEMBRE-SE: maxZoom já foi alcançado e não podemos mais dar zoom
     if (cluster.length == 1 && cluster[0].markers_.length > 1)
     {
          var markers = cluster[0].markers_;
          for (var i=0; i < markers.length; i++)
          {

          }

          return false;
     }

     return true;
}
</script>

