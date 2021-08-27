<?php
/**
 * Created by PhpStorm.
 * User: SMS
 * Date: 29/01/2019
 * Time: 14:38
 */
?>

<div class="container-fluid" role="main" xmlns="http://www.w3.org/1999/html">
    <!-- begin PAGE TITLE ROW -->
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <ol class="breadcrumb">
                    <li><i class="fa fa-database"></i> <a href="suvisjt.php">Sisdam Web</a></li>
                    <li class="active">Mapa de Casos - Dengue - <?php echo date("Y")?></li>
                </ol>
                <button type="button"  class="btn btn-success btn-labeled btn-lg btn-block" data-toggle="tooltip" title="Lista de Bloqueios 1ª Via" ><span class="btn-label"><i
                                class="glyphicon glyphicon-globe"></i></span>MAPA COM CASOS DE <?php echo date("Y")?></button>
            </div>
        </div>
    </div>

</div>

<style>
    /* Always set the map height explicitly to define the size of the div
     * element that contains the map. */
    #mapial {
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
</style>

<div id="mapial"></div>

<script>
    var iconBase = 'imagens/icons/';
    var icons = {
        Dengue: {
            icon: iconBase + 'mosquito.png'
        },
        Chikungunya: {
            icon: iconBase + 'mosquito.png'
        }
    };

    function initMap() {
        var map = new google.maps.Map(document.getElementById('mapial'), {
            center: new google.maps.LatLng(-23.457019, -46.584551),
            zoom: 15
        });
        var infoWindow = new google.maps.InfoWindow;

        // Altere isso dependendo do nome do seu arquivo PHP ou XML
        downloadUrl('form-system/ambiental/maps/proc-maps-ambiental/proc-maps-ial.php', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
                var name = markerElem.getAttribute('name');
                var address = markerElem.getAttribute('address');
                var type = markerElem.getAttribute('type');
                var point = new google.maps.LatLng(
                    parseFloat(markerElem.getAttribute('lat')),
                    parseFloat(markerElem.getAttribute('lng')));

                var infowincontent = document.createElement('div');
                var strong = document.createElement('strong');
                strong.textContent = name
                infowincontent.appendChild(strong);
                infowincontent.appendChild(document.createElement('br'));

                var text = document.createElement('text');
                text.textContent = address
                infowincontent.appendChild(text);
                var marker = new google.maps.Marker({
                    map: map,
                    position: point,
                    icon: icons[type].icon
                });
                marker.addListener('click', function() {
                    infoWindow.setContent(infowincontent);
                    infoWindow.open(map, marker);
                });
            });
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
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAhlslumr1saHPVEJHkzPssYLEsWZJQQKU&callback=initMap">
</script>
