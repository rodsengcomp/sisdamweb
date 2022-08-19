<?php
/**
 * Created by Rodolfo Romaioli Ribeiro de Jesus.
 * User: D788796
 * Date: 09/06/2017
 * Time: 08:39
 */
error_reporting(1);
include_once 'config.php';

// Criando a conexão ...
$conectar = new mysqli($servidor, $usuario, $password, $dbname);
$conectar->set_charset("utf8");


// Check connection
if ($conectar->connect_error) {
    die("Falha na Conexão: " . $conectar->connect_error);
}


class conecta extends config
{
    var $pdo;

    /*Função para se conectar com o banco de dados*/
    function __construct()
    {
        $this->pdo = new PDO('mysql:host=' . $this->hostclass . ';dbname=' . $this->dbclass, $this->usuarioclass, $this->senhaclass);
    }

    /*Função para consultar a tabela do bd e após gera a senha de hash*/
    function login($email, $senha)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM usuarios WHERE email = :email AND senha = :senha");
        $stmt->bindValue(":email", $email);
        $stmt->bindValue(":senha", sha1($senha));
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rs;
    }

    /*Função para verificar se o usuário esta cadastrado no sistema e após Ok, */
    function geraChaveAcesso($email)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
        $stmt->bindValue(":email", $email);
        $run = $stmt->execute();

        $rs = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($rs) {
            $chave = sha1($rs["id"] . $rs["login"]);
            return $chave;
        }

    }

    /*Função para verificar se a chave esta correta */
    function checkChave($email, $chave)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
        $stmt->bindValue(":email", $email);
        $run = $stmt->execute();

        $rs = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($rs) {
            $chaveCorreta = sha1($rs["id"] . $rs["login"]);
            if ($chave == $chaveCorreta) {
                return $rs["id"];
            }
        }
    }

    /*Função para gerar chave de senha */
    function setNovaSenha($novasenha, $id)
    {
        $stmt = $this->pdo->prepare("UPDATE usuarios SET senha = :novasenha WHERE id = :id");
        $stmt->bindValue(":novasenha", sha1(md5($novasenha)));
        $stmt->bindValue(":id", $id);
        $run = $stmt->execute();
    }
}


$pag_principal = 'suvisjt.php';
$unidade = 'JACANA-TREMEMBE';

?>
