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
                    <li class="active" data-toggle="tooltip" data-placement="bottom" title="Casos Positivos"><b>Icones : <img src="imagens/icons/mosquito-positivo.png" /></b> Positivos </li>
                    <li class="active" data-toggle="tooltip" data-placement="bottom" title="Casos Sem Exame"><img src="imagens/icons/mosquito-não-realizado.png" /> Sem Exame </li>
                    <li class="active" data-toggle="tooltip" data-placement="bottom" title="Casos sem Sorologia"><img src="imagens/icons/mosquito-alerta.png" /> Alerta </li>
                    <li class="active" data-toggle="tooltip" data-placement="bottom" title="Casos Inconclusivos"><img src="imagens/icons/mosquito-inconclusivo.png" /> Inconclusivos </li>
                </ol>
                <button type="button"  class="btn btn-success btn-labeled btn-lg btn-block" data-toggle="tooltip" title="Lista de Bloqueios 1ª Via" ><span class="btn-label"><i
                                class="glyphicon glyphicon-globe"></i></span>LISTA DE RUAS  - <?php echo date("Y")?></button>
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

    var labels = {
        38: {
            label: '38'
        },
        83: {
            label: '83'
        }
    };

    function initMap() {
        var map = new google.maps.Map(document.getElementById('mapdengue'), {
            center: new google.maps.LatLng(-23.457019, -46.584551),
            zoom: 11
            // mapTypeId: 'terrain'
        });
        var infoWindow = new google.maps.InfoWindow;

        // Altere isso dependendo do nome do seu arquivo PHP ou XML
        downloadUrl('form-system/maps/proc-maps-system/proc-maps-end.php', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
                var id = markerElem.getAttribute('id');
                var name = markerElem.getAttribute('name');
                var address = markerElem.getAttribute('address');
                var da = markerElem.getAttribute('da');
                var setor = markerElem.getAttribute('setor');
                var log = markerElem.getAttribute('log');
                var rua = markerElem.getAttribute('rua');
                var bairro = markerElem.getAttribute('bairro');
                var cep = markerElem.getAttribute('cep');
                var pgguia = markerElem.getAttribute('pgguia');
                var ubs = markerElem.getAttribute('ubs');
                var lat = markerElem.getAttribute('lat');
                var lng = markerElem.getAttribute('lng');
                var point = new google.maps.LatLng(
                    parseFloat(markerElem.getAttribute('lat')),
                    parseFloat(markerElem.getAttribute('lng')));
         var html = '<div class="form-group text-center" style="color:white;font-weight:bold;background:#1c7430;padding:0.2px 0px 0.2px 0px"><h5><b>ENDEREÇO UVIS</b></h5></div>' +
                    '<div class="form-group" style="font-weight:bold;background:#e6ffe6;padding:1px 0px 1px 0px"><h6><b style="color:#1c7430">DA : </b><b>' + da + ' </b> <b style="color:#1c7430">  - SETOR : </b><b>' + setor + '</b><b style="color:#1c7430">  -  PGGUIA : </b><b>' + pgguia + '</b></h6>' +
                    '<div class="form-group" style="font-weight:bold;background:#e6ffe6;padding:0px 0px 0px 0px"><h6><b style="color:#1c7430">LOCAL : </b><a title="Editar Livro de Endereço Ruas Uvis" target="_blank" href="http://10.47.171.110/sisdamweb/suvisjt.php?pag=edit-end&id=' + id + '"> ' + log + '  ' + rua + '</a></h6>' +
                    '<div class="form-group" style="font-weight:bold;background:#e6ffe6;padding:0px 0px 0px 0px"><h6><b style="color:#1c7430"> BAIRRO : </b>' + bairro + '<b style="color:#1c7430">  -  CEP:  </b>' + cep + '</h6>' +
                    '<div class="form-group" style="font-weight:bold;background:#e6ffe6;padding:0px 0px 0px 0px"><h6><b style="color:#1c7430"> UBS : </b>' + ubs + '</h6>'+
                    '<div class="form-group text-center" style="color:white;font-weight:bold;background:#1c7430;padding:0.2px 0px 0.2px 0px"><h5><b>ENDEREÇO GOOGLE</b></h5></div>' +
                    '<div class="form-group"><h6><a title="Visualizar no Maps a Rua Google" target="_blank" href="https://www.google.com/maps/search/?api=1&query=' + address + '"> ' + address + '</a></h6>' +
                    '<div class="form-group"><h6><a title="Visualizar no Maps a Latitute e Longitude" target="_blank" href="https://www.google.com/maps/search/?api=1&query=' + lat + ','+lng+'"> ' + lat +','+lng+'</a></h6>' +
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
                    label: labels[da].label
                });
                marker.addListener('click', function() {
                    infoWindow.setContent(html);
                    infoWindow.open(map, marker);
                });


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
