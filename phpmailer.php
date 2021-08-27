<!DOCTYPE html>
<html lang="pt-br">
<title>Processando Nova Senha</title>

<?php
include_once 'header-altera-senha.php';
?>

<body role="document">

<div class="container">
    <div class="card card-container">
        <div class="text-center">
            <h4><strong>Esqueceu a senha ?</strong></h4>
        </div>
        <img id="logo-img" class="logo-img" src="../imagens/livrologin.png" />
        <form id="envianovasenha" class="form-signin">

            <?php

            include_once '../conecta.php';
            $conn = new conecta();

            /*Fazendo a conexão com o bd e tratando erros caso o bd não se conecte*/
            if($conexao = $conectar->query($conectar)) die ('<div class="form-system-group"><a href="javascript:history.back()" <button type=\'button\' class=\'btn btn-danger\' accesskey="V"><span class="glyphicon glyphicon-arrow-left"></span> <u>V</u>OLTAR</button></a><h4><strong><div class="alert alert-danger text-center" role="alert">ERROR : 01 FALHA AO CONECTAR !!! SE PERSISTIR CONTATE: sisdamjt@gmail.com</h4></strong></div>');

            #Recolhendo os dados do formulário
            $email = mysqli_real_escape_string($conectar,$_POST["email"]);
            $email = preg_replace('/[^[:alnum:]_.-@]/','',$email); /*Almentando a segurança contra caracteres especiais*/
            $chave = $conn->geraChaveAcesso($email);

            # Verificando apenas um campo, no caso login.
            $sql = $conectar->query("SELECT id FROM usuarios WHERE chavesetsenha='http://10.47.171.110/sisdamweb/alterar-a-senha.php?chave=$chave'");

            //Inicio Enviar e-mail
            require '../PHPMailer/PHPMailerAutoload.php';

            $Mailer = new PHPMailer();

            //Define que será usado SMTP
            $Mailer->IsSMTP();

            //Enviar e-mail em HTML
            $Mailer->isHTML(true);

            //Aceitar carasteres especiais
            $Mailer->Charset = 'UTF-8';

            //Configurações
            $Mailer->SMTPAuth = true;
            $Mailer->SMTPSecure = 'ssl';

            //nome do servidor
            $Mailer->Host = 'smtp.gmail.com';
            //Porta de saida de e-mail
            $Mailer->Port = 465;

            //Dados do e-mail de saida - autenticação
            $Mailer->Username = 'sisdamjt@gmail.com';
            $Mailer->Password = 'suvisjacana';

            //E-mail remetente (deve ser o mesmo de quem fez a autenticação)
            $Mailer->From = 'sisdamjt@gmail.com';

            //Nome do Remetente
            $Mailer->FromName = 'SisdamWeb';

            //Assunto da mensagem
            $Mailer->Subject = 'Recuperar Senha';

            //Corpo da Mensagem
            $mensagem = "Ola, Bem vindo ao SisdamWeb!!! <br><br>";
            $mensagem .= "Acesse o link abaixo para alterar a sua senha do Sistema SisdamWeb! <br> <br>";
            $mensagem .= "<a href='http://10.47.171.110/sisdamweb/alterar-a-senha.php?chave=$chave'>Clique aqui para alterar sua senha</a><br> <br>";
            $mensagem .= "Acesse o link <a href='http://10.47.171.110/sisdamweb'>SisdamWeb</a> para acessar o Sistema SisdamWeb! <br> <br>";
            $mensagem .= "Se voce recebeu este e-mail por engano, simplesmente o exclua.<br> <br>";
            $mensagem .= "Grato - Rodolfo R R de Jesus - Administrador do Sistema SisdamWeb";

            $Mailer->Body = $mensagem;

            //Corpo da mensagem em texto
            $Mailer->AltBody = 'conteudo do E-mail em texto';

            //Destinatario
            $Mailer->AddAddress($email);

            if($Mailer->Send()){
                if($sql->num_rows > 0){ ?>
                    <div class="alert alert-warning text-center" role="alert">
                        Seu Pedido esta em processamento!<br>Por favor verifique seu email
                    </div>
                    <a href="javascript:history.back()"<button type='button' class="btn btn-lg btn-primary btn-block btn-signin" data-toggle="tooltip" data-placement="right" title="Entrar no Sistema SisdamJT">Voltar</button></a>

                <?php }else {
                    echo "<div class=\"alert alert-success text-center\" id=\"usuariook\" role=\"alert\">Email enviado com Sucesso!</div>";
                    if (!$conectar->query("UPDATE usuarios SET chavesetsenha = 'http://10.47.171.110/sisdamweb/alterar-a-senha.php?chave=$chave', datapedidochavesetsenha = NOW() WHERE email = '$email'")) die ('<div class="form-system-group"><a href="javascript:history.back()" <button type=\'button\' class=\'btn btn-danger\' accesskey="V"><span class="glyphicon glyphicon-arrow-left"></span> <u>V</u>OLTAR</button></a><h4><strong><div class="alert alert-danger text-center" role="alert">ERROR:02 FALHA DE SICRONIZAÇÃO COM A TABELA !!! SE PERSISTIR CONTATE: sisdamjt@gmail.com</h4></strong></div>');
                }

            }else{
                echo "<div class=\"alert alert-danger text-center\" id=\"usuariook\" role=\"alert\">Erro no envio do e-mail!<br>Contate o Administrador! </div>";/*(colocar para informar o erro)=> . $Mailer->ErrorInfo */
            }

            //Fim Enviar e-mail

            $conectar->close();
            ?>

        </form>

        <h5 class="text-center">Login Sisdam Web ? <a href="http://10.47.171.110/sisdamweb/index.php">Clique aqui</a></h5><br>
        <h5><div class="text-center">Desenvolvido por Rodolfo R R de Jesus</div></h5>
        <h5><div class="text-center">Contato:<a href=# data-toggle=tooltip title="Email do Suporte">sisdamjt@gmail.com</a></div></h5>
    </div>
</div>

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../js/ie10-viewport-bug-workaround.js"></script>
<script src="../js/jquery/validation/1.15.0.jquery.validate.min.js"></script>
<script src="../js/jquery/validation/1.13.0.additional-methods.min.js"></script>

</body>
</html>