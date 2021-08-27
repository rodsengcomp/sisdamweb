<!DOCTYPE html>
<html lang="pt-br">
<title>Nova Senha</title>

<?php
include_once 'header-login.php';
?>

<?php
$chave = "";
if ($_GET["chave"]){
$chave = preg_replace('/[^[:alnum:]]/', '', $_GET["chave"]);

?>

<body role="document">

<div class="container">
    <div class="card card-container">
        <div class="text-center">
            <h4><strong>Esqueceu a senha ?</strong></h4>
        </div>
        <img id="logo-img" class="logo-img" src="imagens/livrologin.png"/>
        <form id="novasenha" action="alterasenha/set-nova-senha.php" method="POST" class="form-signin">
            <input type="hidden" name="chave" value="<?php echo $chave; ?>"/>
            <input type="text" id="inputEmail" class="form-control" data-toggle="tooltip" data-placement="right"
                   title="Digite seu email cadastrado" name="email" placeholder="email" required autofocus>
            <input type="password" id="inputSenha" class="form-control" name="senha" data-toggle="tooltip"
                   data-placement="right"
                   title="Sua senha deve ter pelo menos 6 caracteres e conter pelo menos um número e um caractere"
                   placeholder="nova senha">
            <input type="password" id="inputNovaSenha" class="form-control" name="novasenha" data-toggle="tooltip"
                   data-placement="right"
                   title="Sua senha deve ter pelo menos 6 caracteres e conter pelo menos um número e um caractere"
                   placeholder="repita nova senha">
            <button class="btn btn-lg btn-primary btn-block btn-signin" data-toggle="tooltip" data-placement="right"
                    title="Entrar no Sistema SisdamJT" type="submit">Enviar
            </button>

            <h5 class="text-center">Login Sisdam Web ? <a href="index.php">Clique aqui</a></h5><br>
            <h5>
                <div class="text-center">Desenvolvido por Rodolfo R R de Jesus</div>
            </h5>
            <h5>
                <div class="text-center">Contato:<a href=# data-toggle=tooltip title="Email do Suporte">sisdamjt@gmail.com</a>
                </div>
            </h5>

        </form>


        <?php
        } else {
            echo '<h1>Página não encontrada</h1>';
        }
        ?>
    </div>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
    <script src="js/jquery/validation/1.15.0.jquery.validate.min.js"></script>
    <script src="js/jquery/validation/1.13.0.additional-methods.min.js"></script>

</body>
</html>




