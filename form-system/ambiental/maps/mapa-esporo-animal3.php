<?php
/**
 * Created by PhpStorm.
 * User: SMS
 * Date: 29/01/2019
 * Time: 14:38
 */

$contar = $conectar->query("SELECT lixeira FROM esporo_an WHERE lixeira = 0");
$count = $contar->num_rows;

$cnexamepos = $conectar->query("SELECT resultado_esporo.Resultado FROM resultado_esporo RIGHT JOIN esporo_an ON resultado_esporo.Nr_Pedido = esporo_an.lab WHERE resultado_esporo.Resultado='Positivo' AND esporo_an.lixeira = 0");
$countexamepos = $cnexamepos->num_rows;

$cnexameneg = $conectar->query("SELECT resultado_esporo.Resultado FROM resultado_esporo RIGHT JOIN esporo_an ON resultado_esporo.Nr_Pedido = esporo_an.lab WHERE resultado_esporo.Resultado='Negativo' AND esporo_an.lixeira = 0");
$countexameneg = $cnexameneg->num_rows;

$countexamesex = $count - ($countexamepos + $countexameneg);

$cs_sinan = $conectar->query("SELECT CREATE_TIME FROM information_schema.tables WHERE TABLE_NAME = 'esporo_an' ORDER BY `CREATE_TIME` DESC");
$row_sinan = mysqli_fetch_assoc($cs_sinan);

$cs_exame_esporo = $conectar->query("SELECT CREATE_TIME FROM information_schema.tables WHERE TABLE_NAME = 'resultado_esporo' ORDER BY `CREATE_TIME` DESC");
$row_exame_esporo = mysqli_fetch_assoc($cs_exame_esporo);

?>

<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script src="https://unpkg.com/@google/markerclustererplus@4.0.1/dist/markerclustererplus.min.js"></script>

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
                <button type="button"  class="btn btn-success btn-labeled btn-lg btn-block" data-toggle="tooltip" title="Lista de Bloqueios 1ª Via" ><span class="btn-label"><i
                                class="glyphicon glyphicon-globe"></i></span>CASOS DE ESPOROTRICOSE ANIMAL - <?php echo date("Y")?></button>
            </div>
        </div>
    </div>

    <?=$count.' - '?>

</div>

<style>
    /* Always set the map height explicitly to define the size of the div
     * element that contains the map. */
    #map {
        height: 70%;
        margin-left: 20px;
        margin-right: 20px;
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
            CANINA: {
                icon: iconBase + 'cao_p_1.png'
            },
            FELINA: {
                icon: iconBase + 'gato_p_1.png'
            },
            OUTROS: {
                icon: iconBase + 'mosquito-não-realizado.png'
            }
    };

    function initMap() {
        var cluster = [];
        var map = new google.maps.Map(document.getElementById("map"), {
            center: new google.maps.LatLng(-23.457019, -46.584551),
            zoom: 15,
            mapTypeId: 'roadmap'
        });
        var infowindow = new google.maps.InfoWindow();

        // Altere isso dependendo do nome do seu arquivo PHP ou XML
        downloadUrl('form-system/ambiental/maps/proc-maps-ambiental/proc-maps-esporo-animal.php', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName("marker");
            for (var i = 0; i < markers.length; i++) {
                var name = markers[i].getAttribute("name");
                var address = markers[i].getAttribute("address");
                var type = markers[i].getAttribute("type");
                var point = new google.maps.LatLng(
                    parseFloat(markers[i].getAttribute("lat")),
                    parseFloat(markers[i].getAttribute("lng")));
                var html= "<b>" +
                    markers[i].getAttribute("name") +
                    "</b> <br/>" +
                    markers[i].getAttribute("address");

                var icon = customIcons[type] || {};
                var marker = new google.maps.Marker({
                    map: map,
                    position: point,
                    icon: icon.icon,
                });
                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                        infowindow.setContent(
                            "<b>" +
                            markers[i].getAttribute("name") +
                            "</b> <br/>" +
                            markers[i].getAttribute("address")
                        );
                        infowindow.open(map, marker);

                        //This sends information from the clicked icon back to the serverside code
                        document.getElementById("setlatlng").innerHTML = markers[i].getAttribute("name");
                    }
                })(marker, i));
                cluster.push(marker);
            }

            var markerCluster = new MarkerClusterer(map, cluster, {imagePath: 'imagens/esporo_animal/m'});
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
</script>

