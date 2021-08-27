<!-- Este projeto é desenvolvido na Suvis Jaçanã-Tremembé com iniciativa dos colaboradores da Unidade -->
<!-- Código desenvolvido por Rodolfo Romaioli Ribeiro de Jesus - rodolfo.romaioli@gmail.com -->
<!-- Sisdam Web - 2.0 - 2017 - Todos os direitos reservados -->

<div class="container-fluid" role="main" xmlns="http://www.w3.org/1999/html">
    <!-- begin PAGE TITLE ROW -->
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <ol class="breadcrumb">
                    <li><i class="fa fa-database"></i> <a href="suvisjt.php">Sisdam Web</a>
                    </li>
                    <li class="active">Endereços - Suvis Jaçanã-Tremembé</li>
                </ol>
                <button type="button" class="btn btn-default btn-lg btn-block">LISTA DE ENDEREÇOS - SUVIS
                    JAÇANÃ-TREMEMBÉ
                </button>
            </div>
            <?php
            if (isset($_SESSION['msgdelerro'])) {
                echo $_SESSION['msgdelerro'];
                unset($_SESSION['msgdelerro']);
            }
            if (isset($_SESSION['msgdel'])) {
                echo $_SESSION['msgdel'];
                unset($_SESSION['msgdel']);
            }
            if (isset($_SESSION['msgerro'])) {
                echo $_SESSION['msgerro'];
                unset($_SESSION['msgerro']);
            }
            if (isset($_SESSION['msgedit'])) {
                echo $_SESSION['msgedit'];
                unset($_SESSION['msgedit']);
            }
            ?>
        </div>
    </div>
    <!-- /.row -->

    <div class="row espaco">
        <div class="text-center">
            <a href="suvisjt.php?pag=cad-end">
                <button type='button' style="<?php if ($_SESSION['usuarioNivelAcesso'] > 2) {
                    echo 'display: none;';
                } ?>" accesskey="N" data-toggle="tooltip" title="Novo Documento" class="btn btn-success"><span
                            class="glyphicon glyphicon-plus-sign"></span> <u> N</u>OVO
                </button>
            </a>
        </div>
    </div>

    <table id="list-end" class="table table-hover table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th class="text-center">ID</th>
            <th class="text-center"><span class="glyphicon glyphicon-pencil"></th>
            <th class="text-center">DA</th>
            <th class="text-center">SETOR</th>
            <th class="text-center">LOG</th>
            <th class="text-center">ENDEREÇO</th>
            <th class="text-center">BAIRRO</th>
            <th class="text-center">CEP</th>
            <th class="text-center">P.GUIA</th>
            <th class="text-center">UBS</th>
            <th class="text-center">RUA GOOGLE</th>
            <th class="text-center">LAT</th>
            <th class="text-center">LONG</th>
            <th class="text-center">CAD</th>
            <th class="text-center">DATA</th>
            <th class="text-center">ALT</th>
            <th class="text-center">DATA</th>
        </tr>
        </thead>
        <tbody>


        </tbody>
    </table>
</div>