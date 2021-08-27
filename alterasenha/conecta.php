<?php
include_once 'config.php';

class conecta extends config
{
    var $pdo;

    /*Função para se conectar com o banco de dados*/
    function __construct()
    {
        $this->pdo = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db, $this->usuario, $this->senha);
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

    function setNovaSenha($novasenha, $id)
    {
        $stmt = $this->pdo->prepare("UPDATE usuarios SET senha = :novasenha WHERE id = :id");
        $stmt->bindValue(":novasenha", sha1(md5($novasenha)));
        $stmt->bindValue(":id", $id);
        $run = $stmt->execute();
    }
}

?>