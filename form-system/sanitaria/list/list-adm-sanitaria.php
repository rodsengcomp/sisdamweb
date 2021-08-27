<!-- Este projeto é desenvolvido na Suvis Jaçanã-Tremembé com iniciativa dos colaboradores da Unidade -->
<!-- Código desenvolvido por Rodolfo Romaioli Ribeiro de Jesus - rodolfo.romaioli@gmail.com -->
<!-- Sisdam Web - 2.0 - 2017 - Todos os direitos reservados -->

<div class="container-fluid" role="main" xmlns="http://www.w3.org/1999/html">

    <?php
    // DEFINE O FUSO HORARIO COMO O HORARIO DE BRASILIA
    date_default_timezone_set('America/Sao_Paulo');
    // CRIA UMA VARIAVEL E ARMAZENA A HORA ATUAL DO FUSO-HORÀRIO DEFINIDO (BRASÍLIA)
    //$dataLocal = date('d/m/Y H:i:s', time());

       ?>

    <script type="text/css">
        tr.group,
        tr.group:hover {
            background-color: red !important;
        }
    </script>

    <!--<script type="application/javascript">
        var date1 = new Date("06/28/2018");
        var date2 = new Date("03/26/2018");
        var timeDiff = Math.abs(date2.getTime() - date1.getTime());
        var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));
    </script>-->

    <!-- begin PAGE TITLE ROW -->
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <ol class="breadcrumb">
                    <li><i class="fa fa-database"></i> <a href="suvisjt.php">Sisdam Web</a></li>
                    <li class="active">Administrativo
                </ol>
                <button type="button" class="btn btn-success btn-labeled btn-lg btn-block"><span class="btn-label"><i
                    class="glyphicon glyphicon-list"></i></span> VIG. SANITÁRIA - <?php echo $today = date("Y");   ?></button>
            </div>
            <?php
            if (isset($_SESSION['msgdelerro'])) { echo $_SESSION['msgdelerro']; unset($_SESSION['msgdelerro']);}
            if (isset($_SESSION['msgdel'])) { echo $_SESSION['msgdel']; unset($_SESSION['msgdel']); }
            if (isset($_SESSION['msgerro'])) { echo $_SESSION['msgerro']; unset($_SESSION['msgerro']); }
            if (isset($_SESSION['msgedit'])) { echo $_SESSION['msgedit']; unset($_SESSION['msgedit']);  }
            ?>
        </div>
    </div>

        <div class="form-group text-center">
            <div class="col-md-12">
                <a href='suvisjt.php?pag=cad-prot-sanitaria' role='button' style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {echo 'display: none;';} ?>"
                   accesskey="N" data-toggle="tooltip" title="CADASTRAR DOCUMENTO" class="btn btn-labeled btn-success mb-2 mr-sm-4">
                    <span class="btn-label"><i class="glyphicon glyphicon-plus-sign"></i></span>&nbsp;<u>N</u>OVO&nbsp;&nbsp;</a>

           </div>

            <p id="demo"></p>

            <script type="application/javascript">
            document.getElementById("demo").innerHTML = diffDays;
            </script>

        </div>

    <table id="list-adm-sanitaria" class="table table-hover table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th class="text-center">ID</th>
            <th class="text-center"><span class="glyphicon glyphicon-pencil"></th>
            <th class="text-center">NOME-RAZÃO SOCIAL</th>
            <th class="text-center">Nº DOCUMENTO</th>
            <th class="text-center">SIVISA/INSP.</th>
            <th class="text-center">ATIVIDADE</th>
            <th class="text-center">TIPO</th>
            <th class="text-center">DT ENTRADA</th>
            <th class="text-center">PRAZO RETORNO</th>
            <th class="text-center">DATA ÚLTIMA MOV.</th>
            <th class="text-center">DATA ARQUIVO</th>
            <th class="text-center">DATA SAIDA.</th>
            <th class="text-center">ÓRGÃO</th>
            <th class="text-center">TÉCNICO</th>
            <th class="text-center">OBSERVAÇÃO</th>
            <th class="text-center">USER CAD</th>
            <th class="text-center">DT CAD</th>
            <th class="text-center">USER EDIT</th>
            <th class="text-center">DT EDIT</th>
        </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</div>