<?php
/**
 * Created by PhpStorm.
 * User: SMS
 * Date: 29/01/2019
 * Time: 14:38
 */


include_once 'proc-maps-epidemio/proc-maps-sarampo-count.php';

?>

<div class="container-fluid" role="main" xmlns="http://www.w3.org/1999/html">
    <!-- begin PAGE TITLE ROW -->
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <ol class="breadcrumb">
                    <li><i class="fa fa-database"></i> <a href="suvisjt.php">Sisdam Web</a></li>
                    <li class="active"><a href="suvisjt.php?pag=mapa-sarampo">Mapa de Casos - Sarampo - <?php echo date("Y")?></a></li>
                    <li data-toggle="tooltip" data-placement="bottom" title="Nº de Casos Positivos"><a href="#"> Positivos </a>
                        <a href="suvisjt.php?pag=mapa-sarampo" role="button" class="btn btn-danger btn-circle"><?php echo $array_positivos['COUNT(NU_NOTIFIC)'] ?></a></li>
                    <li data-toggle="tooltip" data-placement="bottom" title="Nº de Casos Negativos"><a href="#"> Negativos </a>
                        <a href="suvisjt.php?pag=mapa-sarampo" role="button" class="btn btn-success btn-circle"><?php echo $array_negativos['COUNT(NU_NOTIFIC)'] ?></a></li>
                    <li data-toggle="tooltip" data-placement="bottom" title="Nº de Casos Em Análise"><a href="#"> Em Análise </a>
                        <a href="suvisjt.php?pag=mapa-sarampo" role="button" class="btn btn-warning btn-circle"><?php echo $array_em_analises['COUNT(NU_NOTIFIC)'] ?></a></li>
                    <li data-toggle="tooltip" data-placement="bottom" title="Nº de Casos Inconclusivos"><a href="#"> Inconclusivos </a>
                        <a href="suvisjt.php?pag=mapa-sarampo" role="button" class="btn btn-default btn-circle"><?php echo $array_inconclusivos['COUNT(NU_NOTIFIC)'] ?></a></li>
                    <!-- <li data-toggle="tooltip" data-placement="bottom" title="Nº Total de Casos"><a href="#"> Total </a>
                        <a href="suvisjt.php?pag=mapa-sarampo" role="button" class="btn btn-info btn-circle"><?php echo $array_total['COUNT(NU_NOTIFIC)'] ?></a></li> -->

                </ol>
            </div>
        </div>
    </div>

</div>

<style>
    /* Always set the map height explicitly to define the size of the div
     * element that contains the map. */
    #mapsarampo {
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

<div id="mapsarampo"></div>

<script>
    var iconBase = 'imagens/icons/';
    var icons = {
        'POSITIVO': {
            icon: iconBase + 'positivo-sarampo.png'
        },
        'NEGATIVO': {
            icon: iconBase + 'negativo-sarampo.png'
        },
        'EM ANALISE': {
            icon: iconBase + 'aberto-sarampo.png'
        },
        'EM ABERTO': {
            icon: iconBase + 'aberto-sarampo.png'
        },
        'INCONCLUSIVO': {
            icon: iconBase + 'inconclusivo-sarampo.png'
        },
        'INCONSISTENTE': {
            icon: iconBase + 'inconsistente-sarampo.png'
        }
    };

    function initMap() {
        var map = new google.maps.Map(document.getElementById('mapsarampo'), {
            center: new google.maps.LatLng(-23.456067,-46.591567),
            zoom: 15
            // mapTypeId: 'terrain'
        });
        var infoWindow = new google.maps.InfoWindow;

        // Altere isso dependendo do nome do seu arquivo PHP ou XML
        downloadUrl('form-system/epidemio/maps/proc-maps-epidemio/proc-maps-sarampo.php', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
                var id = markerElem.getAttribute('id');
                var name = markerElem.getAttribute('name');
                var address = markerElem.getAttribute('address');
                var comp = markerElem.getAttribute('comp');
                var ubs = markerElem.getAttribute('ubs');
                var type = markerElem.getAttribute('type');
                var sint = markerElem.getAttribute('sint');
                var reco = markerElem.getAttribute('recoleta');
                var igm1 = markerElem.getAttribute('igm');
                var igm2 = markerElem.getAttribute('igm2');
                var idrua = markerElem.getAttribute('idrua');
                var point = new google.maps.LatLng(
                    parseFloat(markerElem.getAttribute('lat')),
                    parseFloat(markerElem.getAttribute('lng')));

                var htmlpos =  '<div class="form-group" style="color:white;font-weight:bold;background:#FA5858;padding:0.2px 0px 0.2px 0px"><h6><b>SINAN : </b>' + '<a style="color: #bce8f1" title="Editar Endereço Paciente" target="_blank" href="#"> '+id+'</a>' + ' - 1ºS :' + sint + '</h6>' +
                    '<div class="form-group" style="color:black;font-weight:bold;background:#F6CECE;padding:1px 0px 1px 0px"><h6><b>NOME : </b>' + name +'</h6>' +
                    '<div class="form-group" style="color:black;font-weight:bold;background:white;padding:1px 0px 0px 0px"><h6><b>IGM1 : </b>' + igm1 +'</h6>' +
                    '<div class="form-group" style="color:black;font-weight:bold;background:#F6CECE;padding:1px 0px 0px 0px"><h6><b>IGM2 : </b>' + igm2 +'</h6>' +
                    '<div class="form-group" style="color:black;font-weight:bold;background:white;padding:1px 0px 0px 0px"><h6><b>RECO : </b>' + reco +'</h6>' +
                    '<div class="form-group" style="color:black;font-weight:bold;background:#F6CECE;padding:1px 0px 0px 0px"><h6>ENDEREÇO : ' + '<a title="Editar Livro de Endereço" target="_blank" href="http://10.47.171.110/sisdamweb/suvisjt.php?pag=edit-end&id=' + idrua + '"> ' + address + '</a></h6>' +
                    '<div class="form-group" style="color:black;font-weight:bold;background:#F6CECE;padding:0px 0px 0px 0px"><h6>Nº ' + comp +'</h6>' +
                    '<div class="form-group" style="color:black;font-weight:bold;background:white;padding:1px 0px 1px 0px"><h6> ' + ubs +'</h6></div>';

                var htmlneg =  '<div class="form-group" style="color:white;font-weight:bold;background:#088A29;padding:0.2px 0px 0.2px 0px"><h6><b>SINAN : </b>' + '<a style="color: #bce8f1" title="Editar Endereço Paciente" target="_blank" href="#"> '+id+'</a>' + ' - 1ºS :' + sint + '</h6>' +
                    '<div class="form-group" style="color:black;font-weight:bold;background:#D8F6CE;padding:1px 0px 1px 0px"><h6><b>NOME : </b>' + name +'</h6>' +
                    '<div class="form-group" style="color:black;font-weight:bold;background:white;padding:1px 0px 0px 0px"><h6><b>IGM1 : </b>' + igm1 +'</h6>' +
                    '<div class="form-group" style="color:black;font-weight:bold;background:#D8F6CE;padding:1px 0px 0px 0px"><h6><b>IGM2 : </b>' + igm2 +'</h6>' +
                    '<div class="form-group" style="color:black;font-weight:bold;background:white;padding:1px 0px 0px 0px"><h6><b>RECO : </b>' + reco +'</h6>' +
                    '<div class="form-group" style="color:black;font-weight:bold;background:#D8F6CE;padding:1px 0px 0px 0px"><h6>ENDEREÇO : ' + '<a title="Editar Livro de Endereço" target="_blank" href="http://10.47.171.110/sisdamweb/suvisjt.php?pag=edit-end&id=' + idrua + '"> ' + address + '</a></h6>' +
                    '<div class="form-group" style="color:black;font-weight:bold;background:#D8F6CE;padding:0px 0px 0px 0px"><h6>Nº ' + comp +'</h6>' +
                    '<div class="form-group" style="color:black;font-weight:bold;background:white;padding:1px 0px 1px 0px"><h6> ' + ubs +'</h6></div>';

                var htmlana =  '<div class="form-group" style="color:black;font-weight:bold;background:#FFBF00;padding:0.2px 0px 0.2px 0px"><h6><b>SINAN : </b>' + '<a style="color: #bce8f1" title="Editar Endereço Paciente" target="_blank" href="#"> '+id+'</a>' + ' - 1ºS :' + sint + '</h6>' +
                    '<div class="form-group" style="color:black;font-weight:bold;background:#F2F5A9;padding:1px 0px 1px 0px"><h6><b>NOME : </b>' + name +'</h6>' +
                    '<div class="form-group" style="color:black;font-weight:bold;background:white;padding:1px 0px 0px 0px"><h6><b>IGM1 : </b>' + igm1 +'</h6>' +
                    '<div class="form-group" style="color:black;font-weight:bold;background:#F2F5A9;padding:1px 0px 0px 0px"><h6><b>IGM2 : </b>' + igm2 +'</h6>' +
                    '<div class="form-group" style="color:black;font-weight:bold;background:white;padding:1px 0px 0px 0px"><h6><b>RECO : </b>' + reco +'</h6>' +
                    '<div class="form-group" style="color:black;font-weight:bold;background:#F2F5A9;padding:1px 0px 0px 0px"><h6>ENDEREÇO : ' + '<a title="Editar Livro de Endereço" target="_blank" href="http://10.47.171.110/sisdamweb/suvisjt.php?pag=edit-end&id=' + idrua + '"> ' + address + '</a></h6>' +
                    '<div class="form-group" style="color:black;font-weight:bold;background:#F2F5A9;padding:0px 0px 0px 0px"><h6>Nº ' + comp +'</h6>' +
                    '<div class="form-group" style="color:black;font-weight:bold;background:white;padding:1px 0px 1px 0px"><h6> ' + ubs +'</h6></div>';

                var htmlinc =  '<div class="form-group" style="color:white;font-weight:bold;background:#424242;padding:0.2px 0px 0.2px 0px"><h6><b>SINAN : </b>' + '<a style="color: #bce8f1" title="Editar Endereço Paciente" target="_blank" href="#"> '+id+'</a>' + ' - 1ºS :' + sint + '</h6>' +
                    '<div class="form-group" style="color:black;font-weight:bold;background:#D8D8D8;padding:1px 0px 1px 0px"><h6><b>NOME : </b>' + name +'</h6>' +
                    '<div class="form-group" style="color:black;font-weight:bold;background:white;padding:0px 0px 0px 0px"><h6><b>IGM1 : </b>' + igm1 +'</h6>' +
                    '<div class="form-group" style="color:black;font-weight:bold;background:#D8D8D8;padding:0px 0px 0px 0px"><h6><b>IGM2 : </b>' + igm2 +'</h6>' +
                    '<div class="form-group" style="color:black;font-weight:bold;background:white;padding:0px 0px 0px 0px"><h6><b>RECO : </b>' + reco +'</h6>' +
                    '<div class="form-group" style="color:black;font-weight:bold;background:#D8D8D8;padding:0px 0px 0px 0px"><h6>ENDEREÇO : ' + '<a title="Editar Livro de Endereço" target="_blank" href="http://10.47.171.110/sisdamweb/suvisjt.php?pag=edit-end&id=' + idrua + '"> ' + address + '</a></h6>' +
                    '<div class="form-group"><h6>Nº ' + comp +'</h6>' +
                    '<div class="form-group" style="color:black;font-weight:bold;background:white;padding:1px 0px 1px 0px"><h6> ' + ubs +'</h6></div>';

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
                    if (type == 'POSITIVO') {
                        infoWindow.setContent(htmlpos);
                    } else if (type == 'NEGATIVO') {
                        infoWindow.setContent(htmlneg);
                    } else if (type == 'EM ANALISE') {
                        infoWindow.setContent(htmlana);
                    } else if (type == 'INCONCLUSIVO') {
                        infoWindow.setContent(htmlinc);
                    }else {
                        infoWindow.setContent(htmlinc);
                    }
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
