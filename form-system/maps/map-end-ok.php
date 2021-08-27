<?php
include_once '../../locked/seguranca.php';
include_once '../../conecta.php';
?>

<div class="row" style="padding:15px;">
    <div class="col-md-12">

        <div id="mapend"></div>
    </div>
</div>

<div class="bs-example" data-example-id="vertical-button-group">
    <div class="btn-group-vertical" role="group" aria-label="Vertical button group">
        <button type="button" class="btn btn-default">Botão</button>
        <button type="button" class="btn btn-default">Botão</button>
        <div class="btn-group" role="group">
            <button id="btnGroupVerticalDrop1" type="button" class="btn btn-default dropdown-toggle"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">
                <li><a href="#">Dropdown link</a></li>
                <li><a href="#">Dropdown link</a></li>
            </ul>
        </div>
        <button type="button" class="btn btn-default">Botão</button>
        <button type="button" class="btn btn-default">Botão</button>
        <div class="btn-group" role="group">
            <button id="btnGroupVerticalDrop2" type="button" class="btn btn-default dropdown-toggle"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop2">
                <li><a href="#">Dropdown link</a></li>
                <li><a href="#">Dropdown link</a></li>
            </ul>
        </div>
        <div class="btn-group" role="group">
            <button id="btnGroupVerticalDrop3" type="button" class="btn btn-default dropdown-toggle"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop3">
                <li><a href="#">Dropdown link</a></li>
                <li><a href="#">Dropdown link</a></li>
            </ul>
        </div>
        <div class="btn-group" role="group">
            <button id="btnGroupVerticalDrop4" type="button" class="btn btn-default dropdown-toggle"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop4">
                <li><a href="#">Dropdown link</a></li>
                <li><a href="#">Dropdown link</a></li>
            </ul>
        </div>
    </div>
</div>


<script>

</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAeXNlu0J8mvRgksGu0BHfEfC7JFfxVMh0&callback=initMap">
</script>

<script type="text/javascript" class="init" src="../../js/maps/maps-cad.js"></script>

<style>
    #mapend {
        height: 750px
    }
</style>

