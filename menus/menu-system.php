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
        <a class="navbar-brand" href="http://10.47.171.110/sisdamweb/" data-toggle="tooltip" title="SISDAM-WEB - SUVIS JAÇANÃ-TREMEMBÉ"><img
                    src="imagens/icone-inicial-4.png" alt="SisdamWeb"></a>
        <!--<a class="navbar-brand" href='suvisjt.php' data-toggle="tooltip" data-placement="left" title="SISDAM-WEB - SUVIS JAÇANÃ-TREMEMBÉ">Sisdam Web</a>-->
    </div>

    <!-- Top Menu Items -->
    <div class="collapse navbar-collapse">
        <?php
        $menu_principal = $pdo->prepare("SELECT * FROM  menu_principal WHERE tipomenu='System'  ORDER BY id DESC");
        $menu_principal->execute();

        if ($menu_principal->rowCount() >= 1):
            echo '<ul class="nav navbar-nav">';
            foreach ($menu_principal->fetchAll() as $result_menu_principal):
                $id = $result_menu_principal['id'];
                echo '<li>';
                echo '<a style="color: #FFC0CB" class="dropdown-toggle" href="suvisjt.php">' . $result_menu_principal['nome'] . '<span class="caret"></span></a>';
                $submenus = $pdo->prepare("SELECT * FROM menu_sub WHERE id_menu=? ORDER BY id");
                $submenus->execute(array($id));

                if ($submenus->rowCount() >= 1):
                    echo '<ul class="dropdown-menu">';
                    foreach ($submenus->fetchAll() as $submenus_linha):
                        $idsub = $submenus_linha['id'];
                        echo '<li>';
                        echo '<a style="color: #FF0000" class="dropdown-toggle" href="' . $submenus_linha['pag'] . '">' . $submenus_linha['nome'] . '<span class="caret"></span></a>';
                        $submenus_subs = $pdo->prepare("SELECT * FROM menu_sub_sub WHERE id_menu_sub=? ORDER BY id");
                        $submenus_subs->execute(array($idsub));

                        if ($submenus_subs->rowCount() >= 1):
                            echo '<ul class="dropdown-menu">';
                            foreach ($submenus_subs->fetchAll() as $submenus_subs_linha):
                                echo '<li>';
                                echo '<a style="color: #FF0000" class="dropdown-toggle" href="' . $submenus_subs_linha['pag'] . '">' . $submenus_subs_linha['nome'] . '</a>';
                                echo '</li>';
                            endforeach;
                            echo '</ul>';
                        endif;
                        echo '</li>';
                    endforeach;
                    echo '</ul>';
                endif;
                echo '</li>';
            endforeach;
            echo '</ul>';
        endif;
        ?>

        <ul class="nav navbar-nav" style="<?php if ($_SESSION['usuarioNivelAcesso'] == '') {
            echo 'display: none;';
        } ?>">
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
            <li class="dropdown" style="<?php if ($_SESSION['usuarioNivelAcesso'] == '') {
                echo 'display: none;';
            } ?>">
                <a href="#"
                   style="margin-top: 8px;margin-bottom: 8px; color: #28a745;border-color: #28a745;padding: 6px 12px;font-weight: bold"
                   class="btn btn-success m-3" data-toggle="dropdown" role="button" aria-haspopup="true"
                   aria-expanded="false"><?php echo $usuariologin; ?> <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="suvisjt.php?pag=edit-perfil-user"><i class="fa fa-fw fa-user"></i> Perfil</a>
                    </li>
                    <li>
                        <a style="<?php if ($_SESSION['usuarioNivelAcesso'] > 2) {
                            echo 'display: none;';
                        } ?>" href="admin.php"><i class="fa fa-fw fa-dashboard"></i> Painel de Controle</a>
                    </li>
                </ul>


            </li>
            <li class="dropdown text-center">
                <button type="button" class="btn btn-danger m-3" data-toggle="modal" data-target="#myModalSair"><i
                            class="fa fa-fw fa-power-off"></i> Sair
                </button>
            </li>

        </ul>
        <li class="text-center" style="<?php if ($_SESSION['usuarioNivelAcesso'] <> '') {
            echo 'display: none;';
        } ?>">
            <a href='index.php'
            <button type='button' data-toggle="tooltip" title="Acessar Sistema" accesskey="A"
                    class="btn btn-labeled btn-success m-3"><span class="btn-label"><i class="fa fa-user"></i></span>
                Login
            </button>
            </a>
        </li>
    </div>
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