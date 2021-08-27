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
                    <li class="active">Lista Sv2 2017</li>
                </ol>
                <button type="button" class="btn btn-default btn-lg btn-block">LISTA DE ENTRADA - SV2 2017</button>
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
            <a href='suvisjt.php?pag=cad-sv2-suvis'
            <button type='button' style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                echo 'display: none;';
            } ?>" accesskey="S" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"></span> <u>S</u>UVIS
            </button>
            </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href='suvisjt.php?pag=cad-sv2-outros'
            <button type='button' style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                echo 'display: none;';
            } ?>" accesskey="O" class="btn btn-danger"><span class="glyphicon glyphicon-plus-sign"></span> <u>O</u>UTRO
            </button>
            </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href='suvisjt.php?pag=cad-sv2-siva'
            <button type='button' style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                echo 'display: none;';
            } ?>" accesskey="I" class="btn btn-default"><span class="glyphicon glyphicon-plus-sign"></span> &nbsp;&nbsp;S<u>I</u>VA&nbsp;&nbsp;&nbsp;&nbsp;
            </button>
            </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href='suvisjt.php?pag=cad-sv2-surto'
            <button type='button' style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                echo 'display: none;';
            } ?>" accesskey="U" class="btn btn-primary"><span class="glyphicon glyphicon-plus-sign"></span> S<u>U</u>RTO
            </button>
            </a>
        </div>
    </div>

    <table id="list-sv2" class="table table-hover table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th class="text-center">ID</th>
            <th class="text-center"><span class="glyphicon glyphicon-pencil"></th>
            <th class="text-center">SINAN</th>
            <th class="text-center">ENTRADA</th>
            <th class="text-center">SE</th>
            <th class="text-center">AGRAVO</th>
            <th class="text-center">TEL</th>
            <th class="text-center">NOME</th>
            <th class="text-center">NOTIF</th>
            <th class="text-center">ATENDIDO</th>
            <th class="text-center">SEXO</th>
            <th class="text-center">IDADE</th>
            <th class="text-center">LOG</th>
            <th class="text-center">ENDEREÇO</th>
            <th class="text-center">NUM</th>
            <th class="text-center">COMP</th>
            <th class="text-center">BAIRRO</th>
            <th class="text-center">CEP</th>
            <th class="text-center">LOCALVD</th>
            <th class="text-center">SUVIS</th>
            <th class="text-center">CIDADE</th>
            <th class="text-center">OBITO</th>
            <th class="text-center">CAD</th>
            <th class="text-center">DATA</th>
            <th class="text-center">ALT</th>
            <th class="text-center">DATA</th>
            <th class="text-center">TIPO</th>
        </tr>
        </thead>
        <tbody style="<?php if ($_SESSION['usuarioNivelAcesso'] > 3) {
            echo 'display: none;';
        } ?>">


        </tbody>
    </table>
</div>