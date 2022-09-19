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
    #mapesporo {
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

<div id="mapesporo"></div>

<script>
    var iconBase = 'imagens/esporo_animal/';
    var icons = {
        CANINA: {
            icon: iconBase + 'cao_p_1.png'
        },
        FELINA: {
            icon: iconBase + 'gato_p_1.png'
        },
        OUTROS: {
            icon: iconBase + 'mosquito-não-realizado.png'
        },
        Alerta: {
            icon: iconBase + 'mosquito-alerta.png'
        },
        Inconclusivo: {
            icon: iconBase + 'mosquito-inconclusivo.png'
        }
    };

    function initMap() {
        var map = new google.maps.Map(document.getElementById('mapesporo'), {
            center: new google.maps.LatLng(-23.457019, -46.584551),
            zoom: 15
            // mapTypeId: 'terrain'
        });
        var infoWindow = new google.maps.InfoWindow;

        // Altere isso dependendo do nome do seu arquivo PHP ou XML
        downloadUrl('form-system/ambiental/maps/proc-maps-ambiental/proc-maps-esporo-animal.php', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
                var id = markerElem.getAttribute('id');
                var name = markerElem.getAttribute('name');
                var nametutor = markerElem.getAttribute('nametutor');
                var dataex = markerElem.getAttribute('dt_res');
                var resultado = markerElem.getAttribute('resultado');
                var address = markerElem.getAttribute('address');
                var comp = markerElem.getAttribute('comp');
                var type = markerElem.getAttribute('type');
                var sint = markerElem.getAttribute('sint');
                var idrua = markerElem.getAttribute('idrua');
                var point = new google.maps.LatLng(
                    parseFloat(markerElem.getAttribute('lat')),
                    parseFloat(markerElem.getAttribute('lng')));
                var htmlcao = '<div class="form-group" style="color:white;font-weight:bold;background:#FA5858;padding:0.2px 0px 0.2px 0px"><h6><b>SINAN : ' + '<a class="btn btn-warning" style="color: #bce8f1" title="Editar Endereço Paciente" target="_blank" href="suvisjt.php?pag=edit-esporo-animal&id='+ id +'"><i class="fa fa-pencil-alt"></i>&nbsp ' + id + '</a>' + ' - ENTRADA :' + sint + '</h6></div>' +
                    '<div class="form-group" style="color:black;font-weight:bold;background:white;padding:0px 0px 0px 0px"><h6>NOME TUTOR : ' + nametutor + '</h6><h6>NOME ANIMAL: ' + name +'</h6></div>' +
                    '<div class="form-group" style="color:black;font-weight:bold;background:white;padding:0px 0px 0px 0px"><h6>RESULTADO : ' + dataex + ' <button type="button" class="btn btn-danger">' + resultado + '</button></h6></div>' +
                    '<div class="form-group" style="color:black;font-weight:bold;background:white;padding:0.2px 0px 0px 0px"><h6>ENDEREÇO : ' + '<a title="Editar Livro de Endereço" target="_blank" href="suvisjt.php?pag=edit-end&id=' + idrua + '"> ' + address + '</a></h6>' +
                    '<div class="form-group" style="color:black;font-weight:bold;background:white"><h6>Nº ' + comp +'</h6></div>' +
                    '<div class="form-group" style="color:white;font-weight:bold;background:#FA5858;padding:0.2px 0px 0.2px 0px"><h6></div>';

                var htmlgato='<div class="form-group" style="color:white;font-weight:bold;background:#088A29;padding:0.2px 0px 0.2px 0px"><h6><b>SINAN : ' + '<a class="btn btn-warning" style="color: #bce8f1" title="Editar Endereço Paciente" target="_blank" href="suvisjt.php?pag=edit-esporo-animal&id='+ id +'"><i class="fa fa-pencil-alt"></i>&nbsp ' + id + '</a>' + ' - ENTRADA :' + sint + '</h6></div>' +
                    '<div class="form-group" style="color:black;font-weight:bold;background:white;padding:0px 0px 0px 0px"><h6>NOME TUTOR: ' + nametutor +'</h6><h6>NOME ANIMAL: ' + name +'</h6></div>' +
                    '<div class="form-group" style="color:black;font-weight:bold;background:white;padding:0px 0px 0px 0px"><h6>RESULTADO : ' + dataex + ' <button type="button" class="btn btn-danger">' + resultado + '</button></h6></div>' +
                    '<div class="form-group" style="color:black;font-weight:bold;background:white;padding:0.2px 0px 0px 0px"><h6>ENDEREÇO : ' + '<a title="Editar Livro de Endereço" target="_blank" href="suvisjt.php?pag=edit-end&id=' + idrua + '"> ' + address + '</a></h6>' +
                    '<div class="form-group" style="color:black;font-weight:bold;background:white"><h6>Nº ' + comp +'</h6></div>' +
                    '<div class="form-group" style="color:white;font-weight:bold;background:#088A29;padding:0.2px 0px 0.2px 0px"><h6></div>';

                var htmloutros='<div class="form-group" style="color:black;font-weight:bold;background:#FFBF00;padding:0.2px 0px 0.2px 0px"><h6><b>SINAN : ' + '<a class="btn btn-warning" style="color: #bce8f1" title="Editar Endereço Paciente" target="_blank" href="suvisjt.php?edit-esporo-animal&id='+ id +'"><i class="fa fa-pencil-alt"></i>&nbsp ' + id + '</a>' + ' - ENTRADA :' + sint + '</h6></div>' +
                    '<div class="form-group" style="color:black;font-weight:bold;background:white;padding:0px 0px 0px 0px"><h6>NOME TUTOR: ' + nametutor +'</h6><h6>NOME TUTOR: ' + name +'</h6></div>' +
                    '<div class="form-group" style="color:black;font-weight:bold;background:white;padding:0px 0px 0px 0px"><h6>RESULTADO : ' + dataex + ' <button type="button" class="btn btn-danger">' + resultado + '</button></h6></div>' +
                    '<div class="form-group" style="color:black;font-weight:bold;background:white;padding:0.2px 0px 0px 0px"><h6>ENDEREÇO : ' + '<a title="Editar Livro de Endereço" target="_blank" href="suvisjt.php?pag=edit-end&id=' + idrua + '"> ' + address + '</a></h6>' +
                    '<div class="form-group" style="color:black;font-weight:bold;background:white"><h6>Nº ' + comp +'</h6></div>' +
                    '<div class="form-group" style="color:white;font-weight:bold;background:#FFBF00;padding:0.2px 0px 0.2px 0px"><h6></div>';

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
                    if (type == 'CANINA') {
                        infoWindow.setContent(htmlcao);
                    } else if (type == 'FELINA') {
                        infoWindow.setContent(htmlgato);
                    } else if (type == 'OUTROS') {
                        infoWindow.setContent(htmloutros);
                    }else {
                        infoWindow.setContent(htmlinc);
                    }
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
