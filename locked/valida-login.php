<?php
session_start();
//Criar a conexao ;
include_once '../conecta.php';


$usuariot = mysqli_real_escape_string($conectar, $_POST['login']);//Escapar de caracteres especiais, como aspas, prevenindo SQL injection
$senhat = mysqli_real_escape_string($conectar, $_POST['senha']);
$senhat = sha1(md5($senhat));

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// Perform queries
$result_usuario = "SELECT * FROM usuarios WHERE login='$usuariot' && senha='$senhat'";
$resultado_usuario = mysqli_query($conectar, $result_usuario);
$resultado = mysqli_fetch_assoc($resultado_usuario);

mysqli_close($conectar);

if (empty($resultado)) {
    //Mensagem de Erro
    $_SESSION['loginErro'] = "Usuário ou senha Inválido";

    //Manda o usuario para a tela de login
    header("Location: https://sisdamweb.online/esqueci-senha.php");
} else {
    //Define os valores atribuidos na sessao do usuario
    $_SESSION['usuarioId'] = $resultado['id'];
    $_SESSION['usuarioNome'] = $resultado['nome'];
    $_SESSION['usuarioNivelAcesso'] = $resultado['nivel_acesso_id'];
    $_SESSION['usuarioLogin'] = $resultado['login'];
    $_SESSION['usuarioSenha'] = $resultado['senha'];
    $_SESSION['usuarioTid'] = $resultado['acessotid'];

    if(isset($_SESSION['url']) && $_SESSION['url'] != "")
    {
        header("Location: ".$_SESSION['url']);
    } else {
        header("Location: ../suvisjt.php");
    }
}


?>