<?php
/* Este projeto é desenvolvido na Suvis Jaçanã-Tremembé com iniciativa dos colaboradores da Unidade
 * Código desenvolvido por Rodolfo Romaioli Ribeiro de Jesus - rodolfo.romaioli@gmail.com
 * Sisdam Web - 2.0 - 2017 - Todos os direitos reservados
 */
error_reporting(0);
?>
<!-------------------------------------   Menu do Formulario (include_once:menu_form);   ----------------------->

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="suvisjt.php" data-toggle="tooltip" title="SISDAM-WEB - SUVIS JAÇANÃ-TREMEMBÉ"><img
                    src="imagens/icone-inicial-4.png" alt="SisdamWeb"></a>
        <!--<a class="navbar-brand" href='suvisjt.php' data-toggle="tooltip" data-placement="left" title="SISDAM-WEB - SUVIS JAÇANÃ-TREMEMBÉ">Sisdam Web</a>-->
    </div>

    <!-- Top Menu Items -->
    <div class="collapse navbar-collapse">


        <ul class="nav navbar-nav">
            <li>
                <a href="suvisjt.php" id="getting-started" style="color:red;"></a>
                <script type="text/javascript">
                    var fiveSeconds = new Date().getTime() + 2400000;
                    $('#getting-started').countdown(fiveSeconds, function (event) {
                        var atualdata = new Date().getTime();
                        if (atualdata < fiveSeconds) {
                            $(this).html(event.strftime('%H:%M:%S'));
                        } else {
                            window.location.href = '././index.php';
                        }
                    });
                </script>
            </li>
        </ul>

        <ul class="nav navbar-nav">
            <li class="dropdown">
                <a href="#"  style="margin-top: 8px;margin-bottom: 8px; color: #28a745;border-color: #28a745;padding: 6px 12px;font-weight: bold" class="btn btn-success m-3" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $usuariologin; ?> <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="suvisjt.php?pag=edit-perfil-user"><i class="fa fa-fw fa-user"></i> Perfil</a>
                    </li>
                    <li>
                        <a style="<?php if ($_SESSION['usuarioNivelAcesso'] > 2) {
                            echo 'display: none;';
                        } ?>" href="suvisjt.php"><i class="fa fa-fw fa-list-alt"></i> Sisdam Web</a>
                    </li>
                </ul>



            </li>

            <li class="dropdown text-center">
                <button type="button" class="btn btn-danger m-3" data-toggle="modal" data-target="#myModalSair"><i class="fa fa-fw fa-power-off"></i> Sair</button>
            </li>

        </ul>
    </div>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li>
                <a style="<?php if ($_SESSION['usuarioNivelAcesso'] == 0) {
                    echo 'display: none;';
                } ?>" href="admin.php"><i class="fa fa-fw fa-dashboard"></i> Painel de Controle</a>
            </li>
            <li>
                <a style="<?php if ($_SESSION['usuarioNivelAcesso'] == 1) {
                    echo 'display: none;';
                } ?>" href="admin.php?pag=edit-user"><i class="fa fa-fw fa-user"></i> Perfil</a>
            </li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#links"><i
                            class="fa fa-fw fa-external-link"></i> Links <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="links" class="collapse">
                    <li>
                        <a href="admin.php?pag=list-pag-admin"><i class="fa fa-fw fa-dashboard"></i> Links Painel</a>
                    </li>
                    <li>
                        <a href="admin.php?pag=list-pag-system"><i class="fa fa-fw fa-desktop"></i> Links System</a>
                    </li>
                    <li>
                        <a href="admin.php?pag=list-pag-livre"><i class="fa fa-fw fa-child"></i> Links Livre</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="admin.php?pag=icons"><i class="fa fa-fw fa-magic"></i> Icones</a>
            </li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#menus"><i
                            class="glyphicon glyphicon-fw glyphicon-menu-hamburger"></i> Menus <i
                            class="fa fa-fw fa-caret-down"></i></a>
                <ul id="menus" class="collapse">
                    <li>
                        <a href="admin.php?pag=list-menu"><i class="fa fa-fw fa-th-list"></i> Menu Principal</a>
                    </li>
                    <li>
                        <a href="admin.php?pag=list-submenu"><i class="fa fa-fw fa-th-list"></i> SubMenus</a>
                    </li>
                    <li>
                        <a href="admin.php?pag=list-menu-submenu"><i class="fa fa-fw fa-th-list"></i> Menu Sub-Menus</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>

<div class="modal fade" id="myModalSair" tabindex="-1"
     role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center" id="myModalLabel">SisdamJT Web</h4>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="text-center">
                        <h4>Deseja Sair do Sistema: </h4>
                        <a href='sair.php' role="button" class="btn btn-success">SIM</a>&nbsp;&nbsp;&nbsp;&nbsp;
                        <button type="button" class="btn btn-danger" data-dismiss="modal">NÃO</button>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <div class="text-center">

                </div>
            </div>
        </div>
    </div>
</div>