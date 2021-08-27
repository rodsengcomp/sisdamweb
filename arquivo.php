<?php
session_start();
include_once 'locked/seguranca.php';
include_once 'conecta.php';

$url = $_SERVER["REQUEST_URI"];
$_SESSION['url'] = $url;

$usuarioid = $_SESSION['usuarioId'];
$usuarionome = $_SESSION['usuarioNome'];
$usuariologin = $_SESSION['usuarioLogin'];
$usuarioniveldeacesso = $_SESSION['usuarioNivelAcesso'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<title>SisdamJT Web</title>

<?php
include_once 'head.php';
?>

<body>

<?php
include_once 'menus/menu-arquivo.php';
if (isset($_SESSION['msgdelerro'])) {echo $_SESSION['msgdelerro']; unset($_SESSION['msgdelerro']);}
include_once 'pags/pag-system.php';
?>

<style> @media print {#noprint { display:none; }body { background: #fff; }}</style>
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

<?php
include_once 'footer.php';
?>

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

</body>
</html>
