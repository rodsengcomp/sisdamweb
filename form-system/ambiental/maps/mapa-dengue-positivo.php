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
                    <li class="active"><a href="suvisjt.php?pag=mapa-dengue">Mapa de Casos - Dengue - <?php echo date("Y")?></a></li>
                    <li data-toggle="tooltip" data-placement="bottom" title="Mapa com Casos Positivos"><a href="suvisjt.php?pag=mapa-dengue-positivo" role="button" class="btn btn-default btn-circle"
                                                                                                          style="width: 32px;height: 32px;padding: 0px 0px 0px 0px"><img src="imagens/icons/mosquito-positivo.png"></a><a href="suvisjt.php?pag=mapa-dengue-positivo"> Positivos </a></li>
                </ol>
                <button type="button"  class="btn btn-success btn-labeled btn-lg btn-block" data-toggle="tooltip" title="Lista de Bloqueios 1ª Via" ><span class="btn-label"><i
                                class="glyphicon glyphicon-globe"></i></span>CASOS DE DENGUE - <?php echo date("Y")?></button>
            </div>
        </div>
    </div>

</div>

<style>
    /* Always set the map height explicitly to define the size of the div
     * element that contains the map. */
    #mapdengue {
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

<div id="mapdengue"></div>

<script>
    var iconBase = 'imagens/icons/';
    var icons = {
        Positivo: {
            icon: iconBase + 'mosquito-positivo.png'
        }
    };

    function initMap() {
        var map = new google.maps.Map(document.getElementById('mapdengue'), {
            center: new google.maps.LatLng(-23.457019, -46.584551),
            zoom: 15
            // mapTypeId: 'terrain'
        });
        var infoWindow = new google.maps.InfoWindow;

        // Altere isso dependendo do nome do seu arquivo PHP ou XML
        downloadUrl('form-system/ambiental/maps/proc-maps-ambiental/proc-maps-dengue-positivo.php', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
                var id = markerElem.getAttribute('id');
                var name = markerElem.getAttribute('name');
                var address = markerElem.getAttribute('address');
                var comp = markerElem.getAttribute('comp');
                var type = markerElem.getAttribute('type');
                var sint = markerElem.getAttribute('sint');
                var teste = markerElem.getAttribute('teste');
                var igm = markerElem.getAttribute('igm');
                var ns1 = markerElem.getAttribute('ns1');
                var idrua = markerElem.getAttribute('idrua');
                var point = new google.maps.LatLng(
                    parseFloat(markerElem.getAttribute('lat')),
                    parseFloat(markerElem.getAttribute('lng')));
    var html =  '<div class="form-group" style="color:white;font-weight:bold;background:#b11f1f;padding:0.2px 0px 0.2px 0px"><h6><b>SINAN : </b>' + '<a style="color: #bce8f1" title="Editar Endereço Paciente" target="_blank" href="http://10.47.171.110/sisdamweb/suvisjt.php?pag=edit-ambiental&nDoc='+ id + '&sinan=dengnet&tabela=tbldengue&buttons=dengue&agravo=DENGUE&ial=dengue_ial&list=dengue"> '+id+'</a>' + ' - 1ºS :' + sint + '</h6></div>' +
                '<div class="form-group" style="color:black;font-weight:bold;background:#f2dede;padding:1px 0px 1px 0px"><h6><b>NOME : </b>' + name +'</h6>' +
                '<div class="form-group" style="color:black;font-weight:bold;background:#f2dede;padding:0px 0px 0px 0px"><h6><b>TR : </b>' + teste +'</h6>' +
                '<div class="form-group" style="color:black;font-weight:bold;background:#f2dede;padding:0px 0px 0px 0px"><h6><b>IGM : </b>' + igm +'</h6>' +
                '<div class="form-group"><h6>NS1 : ' + ns1 +'</h6>' +
                '<div class="form-group"><h6>ENDEREÇO : ' + '<a title="Editar Livro de Endereço" target="_blank" href="http://10.47.171.110/sisdamweb/suvisjt.php?pag=edit-end&id=' + idrua + '"> ' + address + '</a></h6>' +
                '<div class="form-group"><h6>Nº ' + comp +'</h6>' +
                '</div>';
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
                    map.setZoom(18);
                    map.setCenter(marker.getPosition());
                    infoWindow.setContent(html);
                    infoWindow.open(map, marker);
                });
                //if (icons = Positivo) {
                //}


            });
        });
    }


    // Show the lat and lng under the mouse cursor.
    var coordsDiv = document.getElementById('coords');
    map.controls[google.maps.ControlPosition.TOP_CENTER].push(coordsDiv);
    map.addListener('mousemove', function(event) {
        coordsDiv.textContent =
            'lat: ' + Math.round(event.latLng.lat()) + ', ' +
            'lng: ' + Math.round(event.latLng.lng());
    });

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
