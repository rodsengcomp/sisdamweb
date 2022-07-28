<?php
session_start();
?>

<?php
unset($_SESSION['usuarioId'],
    $_SESSION['usuarioNome'],
    $_SESSION['usuarioNivelAcesso'],
    $_SESSION['usuarioLogin'],
    $_SESSION['usuarioSenha']);
?>

<!DOCTYPE html>
<html lang="pt-br">

<?php
include_once 'header-login.php';
?>

<body role="document">

<div class="container">
    <div class="card card-container">
        <div class="text-center">
            <h4><strong>Esqueceu a senha ?</strong></h4>
        </div>
        <img id="logo-img" class="logo-img" src="imagens/livrologin.png"/>
        <form class="form-signin" id="esqueci-senha" method="POST" action="alterasenha/envia-nova-senha.php">
            <div class="alert alert-success" role="alert">
                Contate os administradores do sistema ou envie e-mail para : <strong><a href="mailto:rrrjesus@prefeitura.sp.gov.br" data-toggle=tooltip title="Email do Suporte">rrrjesus@prefeitura.sp.gov.br</a></strong> com <strong>Nome, RF e e-mail</strong> com assunto : <strong>Reset de Senha</strong>.
            </div>
            <div class="signin-help">
                <p class="text-center text-danger">
                    <?php
                    if (isset($_SESSION['loginErro'])) {
                        echo $_SESSION['loginErro'];
                        unset($_SESSION['loginErro']);
                    }
                    ?>
                </p>
            </div>
            <h5 class="text-center">Login Sisdam Web ? <a href="index.php">Clique aqui</a></h5><br>
            <h5>
                <div class="text-center">Desenvolvido por Rodolfo R R de Jesus</div>
            </h5>
            <h5>
                <div class="text-center">Contato:<a href=# data-toggle=tooltip title="Email do Suporte">sisdamjt@gmail.com</a>
                </div>
            </h5>
        </form>
    </div>
</div>

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="js/ie10-viewport-bug-workaround.js"></script>
<script src="js/jquery/validation/1.15.0.jquery.validate.min.js"></script>
<script src="js/jquery/validation/1.13.0.additional-methods.min.js"></script>

</body>
</html>
