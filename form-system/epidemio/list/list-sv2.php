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
                    <li class="active">Lista Sv2 <?php echo $today = date("Y");   ?></li>
                </ol>
                <button type="button" onclick="window.print();" data-toggle="tooltip" title="Imprimir Lista" class="btn btn-default btn-labeled btn-lg btn-block"><span class="btn-label"><i
                                class="glyphicon glyphicon-print"></i></span>LISTA - SV2 <?php echo $today = date("Y");   ?></button>
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

    <div id="noprint">
        <div class="form-group text-center">
            <div class="col-md-12">
                <a href='suvisjt.php?pag=cad-sv2-suvis' role='button' style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {echo 'display: none;';} ?>"
                   accesskey="V" data-toggle="tooltip" title="CADASTRAR SV2 UVIS" class="btn btn-labeled btn-success mb-2 mr-sm-4">
                    <span class="btn-label"><i class="glyphicon glyphicon-plus-sign"></i></span>&nbsp;U<u>V</u>IS&nbsp;&nbsp;</a>

                <a href='suvisjt.php?pag=cad-sv2-outros' role='button' style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {echo 'display: none;';} ?>"
                   accesskey="O" data-toggle="tooltip" title="CADASTRAR SV2 OUTROS" class="btn  btn-labeled btn-danger mb-2 mr-sm-4">
                    <span class="btn-label"><i class="glyphicon glyphicon-plus-sign"></i></span><u>O</u>UTRO</a>

                <a href='suvisjt.php?pag=cad-sv2-siva' role='button' style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {echo 'display: none;';} ?>"
                   accesskey="I" data-toggle="tooltip" title="CADASTRAR SV2 SIVA" class="btn  btn-labeled btn-default mb-2 mr-sm-4">
                    <span class="btn-label"><i class="glyphicon glyphicon-plus-sign"></i></span> S<u>I</u>VA&nbsp;&nbsp;&nbsp;</a>

                <a href='suvisjt.php?pag=cad-sv2-surto' role='button' style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {echo 'display: none;';} ?>"
                   accesskey="U" data-toggle="tooltip" title="CADASTRAR SV2 SURTO" class="btn  btn-labeled btn-primary mb-2 mr-sm-4">
                    <span class="btn-label"><i class="glyphicon glyphicon-plus-sign"></i></span>S<u>U</u>RTO</a>

            </div>
        </div>
    </div>

    <table id="list-sv2" class="table table-hover table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th class="text-center">ID</th>
            <th class="text-center"><span class="glyphicon glyphicon-pencil"></th>
            <th class="text-center">SINAN</th>
            <th class="text-center">PROT.</th>
            <th class="text-center">ENTRADA</th>
            <th class="text-center">SE</th>
            <th class="text-center">AGRAVO</th>
            <th class="text-center">TEL</th>
            <th class="text-center">NOME</th>
            <th class="text-center">NOTIF</th>
            <th class="text-center">ATENDIDO</th>
            <th class="text-center">SEXO</th>
            <th class="text-center">IDADE</th>
            <th class="text-center">DA</th>
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
            <th class="text-center">OCORRENCIA</th>
        </tr>
        </thead>
        <tbody style="<?php if ($_SESSION['usuarioNivelAcesso'] > 3) {
            echo 'display: none;';
        } ?>">


        </tbody>
    </table>
</div>