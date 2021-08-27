<!DOCTYPE html>
<html lang="pt-br">
<title>Alteração Senha</title>

<?php
include_once 'header-altera-senha.php';
?>

<body role="document">

<div class="container">
    <div class="card card-container">
        <div class="text-center">
            <h4><strong>Esqueceu a senha ?</strong></h4>
        </div>
        <img id="logo-img" class="logo-img" src="../imagens/livrologin.png"/>
        <form id="novasenha" class="form-signin">

            <?php
            include_once '../conecta.php';
            $conn = new conecta();

            $email = $_POST["email"];
            $novasenha = $_POST["senha"];
            $chave = $_POST["chave"];

            $email = preg_replace('/[^[:alnum:]_.-@]/', '', $email);
            $chave = preg_replace('/[^[:alnum:]]/', '', $chave);
            $novasenha = addslashes($novasenha);

            $result = $conn->checkChave($email, $chave);

            if ($result) {
                $alterasenha = $conn->setNovaSenha($novasenha, $result);

                echo '<div class="alert alert-success text-center" role="alert">Senha alterada com sucesso!!!</div>';
            } else {
                echo '<div class="alert alert-danger text-center" role="alert">Usuário não encontrado!!!</div>';
            }

            ?>
        </form>
        <h5 class="text-center">Login Sisdam Web ? <a href="../index.php">Clique aqui</a></h5><br>
        <h5>
            <div class="text-center">Desenvolvido por Rodolfo R R de Jesus</div>
        </h5>
        <h5>
            <div class="text-center">Contato:<a href=# data-toggle=tooltip
                                                title="Email do Suporte">sisdamjt@gmail.com</a></div>
        </h5>

    </div>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../js/ie10-viewport-bug-workaround.js"></script>
    <script src="../js/jquery/validation/1.15.0.jquery.validate.min.js"></script>
    <script src="../js/jquery/validation/1.13.0.additional-methods.min.js"></script>

</body>
</html>