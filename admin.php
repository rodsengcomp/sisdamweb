<?php
/**
 * Created by Rodolfo R R Jesus.
 * Date: 09/06/2017
 * Time: 13:52
 */

session_start();
include_once 'locked/seguranca-admin.php';
include_once 'conecta.php';
$usuarionome = $_SESSION['usuarioNome'];
$usuariologin = $_SESSION['usuarioLogin'];
$usuarioniveldeacesso = $_SESSION['usuarioNivelAcesso'];
?>

<!DOCTYPE html>
<html lang="pt-br">

<?php
include_once 'head-admin.php';
?>

<title>Admin SisdamJT Web</title>

<body>

<div id="wrapper">

    <?php
    include_once 'menus/menu-admin.php';
    ?>

    <div id="page-wrapper">

        <?php
        include_once 'pags/pag-admin.php';
        ?>

        <?php
        include_once 'footer.php';
        ?>
        <?php
        function dateConvert($date)
        {
            if (!strstr($date, '/')) {
// $date está no formato ISO (yyyy-mm-dd) e deve ser convertida
// para dd/mm/yyyy
                sscanf($date, '%d-%d-%d', $y, $m, $d);
                return sprintf('%02d/%02d/%04d', $d, $m, $y);
            } else {
// $date está no formato brasileiro e deve ser convertida para ISO
                sscanf($date, '%d/%d/%d', $d, $m, $y);
                return sprintf('%04d-%02d-%02d', $y, $m, $d);
            }

            return false;
        }

        ?>


    </div> <!--page-wrapper-->
</div> <!--wrapper-->

<script src="js/jquery/validation/1.15.0.jquery.validate.min.js"></script>
<script src="js/jquery/validation/1.13.0.additional-methods.min.js"></script>
<script src="js/jquery/1.4.1.jquery.maskedinput.js"></script>

<!-- Núcleo Bootstrap JavaScript
================================================== -->
<!-- Colocado no final do documento para que as páginas carregam mais rápido -->
<script>window.jQuery || document.write('<script src="js/jquery/jquery.min.js"><\/script>')</script>
<script src="js/bootstrap.min.js"></script>

<!-- Menu Responsivo - http://vadikom.github.io/smartmenus/src/demo/bootstrap-navbar.html -->
<!-- SmartMenus jQuery plugin -->
<script type="text/javascript" src="js/jquery.smartmenus.js"></script>

<!-- SmartMenus jQuery Bootstrap Addon -->
<script type="text/javascript" src="js/jquery.smartmenus.bootstrap.js"></script>
<!-- Fim do Js Menu -->


<!-- IE10 corte janela de exibição para Superfície / desktop Windows 8 bug -->
<script src="js/ie10-viewport-bug-workaround.js"></script>

<!-- Morris Charts JavaScript -->
<script src="js/plugins/morris/raphael.min.js"></script>
<script src="js/plugins/morris/morris.min.js"></script>
<script src="js/plugins/morris/morris-data.js"></script>

</body>
</html>
