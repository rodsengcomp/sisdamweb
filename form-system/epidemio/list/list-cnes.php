<div class="container-fluid" role="main" xmlns="http://www.w3.org/1999/html">
    <!-- Página de Título -->
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <ol class="breadcrumb">
                    <li><i class="fa fa-database"></i> <a href="suvisjt.php">Sisdam Web</a></li>
                    <li class="active">Cnes</li>
                </ol>
                <button type="button" class="btn btn-default btn-labeled btn-lg btn-block"><span class="btn-label"><i
                                class="glyphicon glyphicon-list"></i></span>LISTA DE CNES</button>
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
            if (isset($_SESSION['msgedit'])) {
                echo $_SESSION['msgedit'];
                unset($_SESSION['msgedit']);
            }
            ?>
        </div>
    </div>
    <!-- Fim da Página de Título -->

    <div class="row espaco">
        <div class="text-center">
            <a href="suvisjt.php?pag=cad-cnes">
                <button type="button" class="btn btn-labeled btn-success"
                        style="<?php if ($_SESSION['usuarioNivelAcesso'] > 2) {
                            echo 'display: none;';
                        } ?>" accesskey="N" data-toggle="tooltip" title="CADASTRAR NOVO"><span class="btn-label"><i
                                class="glyphicon glyphicon-plus-sign"></i></span> <u> N</u>OVO
                </button>
            </a>
        </div>
    </div>

    <table id="list-cnes" class="table table-hover table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>ID</th>
            <th><span class="glyphicon glyphicon-pencil"></th>
            <th>CÓDIGO</th>
            <th>ESTABELECIMENTO</th>
            <th>CRIADO</th>
            <th>DATA</th>
            <th>ALTERADO</th>
            <th>DATA</th>
        </tr>
        </thead>
        <tbody>


        </tbody>
    </table>
</div>