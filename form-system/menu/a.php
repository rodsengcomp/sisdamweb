<!-------------------------------------   Menu do Formulario (include_once:menu_form);   ----------------------->
<?php
error_reporting(0);
?>

<style>
    #buton {
        padding-top: 8px;

    }

    #logo-img1 {
        width: 40px;
        height: 40px;
        margin: 0 auto 10px;
        display: block;
        padding-top: 7px;
    }

    .dropdown-submenu {
        position: relative;
    }

    .dropdown-submenu .dropdown-menu {
        top: 0;
        left: 100%;
        margin-top: -1px;
    }
</style>

<script>
    $(document).ready(function () {
        $('.dropdown-submenu a.test').on("click", function (e) {
            $(this).next('ul').toggle();
            e.stopPropagation();
            e.preventDefault();
        });
    });
</script>

<!-- Inicio navbar -->
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="active" href="././formulario.php"><img id="logo-img1" class="logo-img"
                                                             src="./imagens/livrologin.png"></a>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false" style="<?php if ($_SESSION['usuarioNivelAcesso'] == 0) {
                        echo 'display: none;';
                    } ?>" accesskey="S"><u>S</u>V2<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="././formulario.php?link=2">Listar</a></li>
                        <li><a href="././formulario.php?link=3">Cadastrar</a></li>
                        <li><a href="././formulario.php?link=73">SV2 2016</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false" style="<?php if ($_SESSION['usuarioNivelAcesso'] == 0) {
                        echo 'display: none;';
                    } ?>" accesskey="M"><u>M</u>emo/Oficio<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="././formulario.php?link=51">Listar</a></li>
                        <li><a href="././formulario.php?link=50">Cadastrar</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Tutorials
                        <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li><a tabindex="-1" href="#">HTML</a></li>
                        <li><a tabindex="-1" href="#">CSS</a></li>
                        <li class="dropdown-submenu">
                            <a class="test" tabindex="-1" href="#">New dropdown <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a tabindex="-1" href="#">2nd level dropdown</a></li>
                                <li><a tabindex="-1" href="#">2nd level dropdown</a></li>
                                <li class="dropdown-submenu">
                                    <a class="test" href="#">Another dropdown <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">3rd level dropdown</a></li>
                                        <li><a href="#">3rd level dropdown</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false" style="<?php if ($_SESSION['usuarioNivelAcesso'] == 0) {
                        echo 'display: none;';
                    } ?>" accesskey="C"><u>C</u>ontatos<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="././formulario.php?link=66">Listar</a></li>
                        <li><a href="././formulario.php?link=67">Cadastrar</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" style="<?php if ($_SESSION['usuarioNivelAcesso'] <> 1) {
                        echo 'display: none;';
                    } ?>" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">Administrador<span class="caret"></span></a>
                    <ul class="drrioown-menu">
                        <li><a href="././formulario.php?link=13">Usuarios</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">Ajuda <span class="glyphicon glyphicon-question-sign"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="././formulario.php?link=45">Login</a></li>
                        <li><a href="././formulario.php?link=46">Perfil</a></li>
                        <li><a href="././formulario.php?link=47">Pesquisar</a></li>
                        <li><a style="<?php if ($_SESSION['usuarioNivelAcesso'] <> 1) {
                                echo 'display: none;';
                            } ?>" href="././formulario.php?link=48">Administrador</a></li>
                    </ul>
                </li>

            </ul>
            <p class="navbar-text navbar-right" id="getting-started" style="color:red;">
                <script type="text/javascript">
                    var fiveSeconds = new Date().getTime() + 2400000;
                    $('#getting-started').countdown(fiveSeconds, function (event) {
                        var atualdata = new Date().getTime();
                        if (atualdata < fiveSeconds) {
                            $(this).html(event.strftime('%H:%M:%S'));
                        } else {
                            window.location.href = '././sair.php';
                        }
                    });
                </script>
            </p>

            <div id="buton" class="btn-group navbar-right">
                <button class="btn btn-success"><?php echo $usuariologin ?></button>
                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="././formulario.php?link=34&login=<?php echo $usuariologin; ?>">Perfil</a></li>
                    <li><a href="././sair.php">Sair</a></li>
                </ul>
            </div>

        </div><!--/.nav-collapse -->
    </div>
</nav>
<!-- Fim navbar -->
