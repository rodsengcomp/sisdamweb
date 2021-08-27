<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="http://10.47.171.110/sisdamwebsite/" data-toggle="tooltip" title="SISDAM-WEB - SUVIS JAÇANÃ-TREMEMBÉ"><img
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
                echo '<a style="color: #F4A460" class="dropdown-toggle" href="suvisjt.php">' . $result_menu_principal['nome'] . '<span class="caret"></span></a>';
                $submenus = $pdo->prepare("SELECT * FROM menu_sub WHERE id_menu=? ORDER BY id");
                $submenus->execute(array($id));

                if ($submenus->rowCount() >= 1):
                    echo '<ul class="dropdown-menu">';
                    foreach ($submenus->fetchAll() as $submenus_linha):
                        $idsub = $submenus_linha['id'];
                        echo '<li>';
                        echo '<a style="color: #FF4500" class="dropdown-toggle" href="' . $submenus_linha['pag'] . '">' . $submenus_linha['nome'] . '<span class="caret"></span></a>';
                        $submenus_subs = $pdo->prepare("SELECT * FROM menu_sub_sub WHERE id_menu_sub=? ORDER BY id");
                        $submenus_subs->execute(array($idsub));

                        if ($submenus_subs->rowCount() >= 1):
                            echo '<ul class="dropdown-menu">';
                            foreach ($submenus_subs->fetchAll() as $submenus_subs_linha):
                                echo '<li>';
                                echo '<a style="color: #FF4500" class="dropdown-toggle" href="' . $submenus_subs_linha['pag'] . '">' . $submenus_subs_linha['nome'] . '</a>';
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

        <form class="navbar-form navbar-right" id="login" method="POST" action="locked/valida-login.php">
            <div class="form-group">
                <input type="text" name="login" data-toggle="tooltip" minlength="5" maxlength="7" required size="7"
                       title="Digite seu login com D e 6 numeros do RF , Ex: D000000" placeholder="login" autofocus
                       class="form-control">
            </div>
            <div class="form-group">
                <input type="password" name="senha" data-toggle="tooltip" required
                       title="Sua senha deve ter pelo menos 6 caracteres e conter pelo menos um número e um caractere"
                       placeholder="senha" size="7" class="form-control">
            </div>
            <button type="submit" id="buttonlogin1" class="btn btn-labeled btn-success"><span class="btn-label"><i
                            class="fa fa-user"></i></span> Acessar
            </button>
            <a href='https://sisdamweb.online/esqueci-senha.php'
            <button type="submit" id="buttonlogin" class="btn btn-labeled btn-danger"><span class="btn-label"><i
                            class="fa fa-question-circle"></i></span>Esqueci senha
            </button>
            </a>
        </form>
    </div>
</nav>