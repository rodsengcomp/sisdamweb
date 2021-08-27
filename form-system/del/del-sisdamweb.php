<?php
error_reporting(0);
include_once '../../locked/seguranca-admin.php';
?>

<?php

if ($conexao = $conectar->query($conectar)) die ('<div class="form-system-group"><a href="javascript:history.back()" <button type=\'button\' class=\'btn btn-danger\' accesskey="V"><span class="glyphicon glyphicon-arrow-left"></span> <u>V</u>OLTAR</button></a></div>><div class="alert alert-danger text-center" role="alert">Erro 01 : Falha ao conectar !!! Se persistir contate: sisdamjt@gmail.com</div>');

/*id do registro*/ $id = $_GET["id"]; /*nome da tabela*/ $form = $_GET["form"]; /*nome do agravo conforme tabela*/ $agravo = $_GET["agravo"];
/*tabela sv2*/ $sinan = $_GET["sinan"]; $nome = $_GET["nome"]; $year = $_GET['year'] ?? 'atual';
if($year == 'atual'):
    $sv2 = 'sv2'; $list = 'list-sv2';
else:
    $sv2 = 'sv2_'.$year; $list = 'list-sv2-arquivo&year='.$year;
endif;
/*tabela agravo*/ $cid = $_GET["cid"]; $tipo = $_GET["tipo"];
/*tabela cidade*/ $codigo = $_GET["cod_cidade"]; $cidade = $_GET["cidade"];
/*tabela cnes*/ $cnes = $_GET["cnes"]; $estabelecimento = $_GET["estabelecimento"];


if ($form == "sv2") {$conectar->query("UPDATE " . $sv2 . " SET lixeira=1 WHERE id = '" . $id . "'");

    if ($conectar->affected_rows != 0) {
        header("Location: suvisjt.php?pag=$list");
        $_SESSION['msgdel'] = "<div class='alert alert-success text-center'><strong>SINAN</strong> : $sinan - <strong>AGRAVO</strong> : $agravo - <strong>PACIENTE</strong> : $nome - <strong>APAGADO COM SUCESSO !!!</strong></div>";
    } else {
        $_SESSION['msgdelerro'] = "<div class='alert alert-danger text-center'><strong>ERRO AO APAGAR SINAN</strong> : $sinan - <strong>AGRAVO</strong> : $agravo - <strong>PACIENTE</strong> : $nome !!!</div>";
        header("Location: suvisjt.php?pag=$list");
    }
} elseif ($form == "agravo"){$conectar->query("DELETE FROM agravo WHERE id = '$id'");

    if ($conectar->affected_rows != 0) {
        header("Location: suvisjt.php?pag=list-agravo");
        $_SESSION['msgdel'] = "<div class='alert alert-success text-center'><strong>ID</strong> : $id - <strong>CID</strong> : $cid - <strong>TIPO</strong> : $tipo - <strong>AGRAVO</strong> : $agravo - <strong>APAGADO COM SUCESSO !!!</strong></div>";
    } else {
        $_SESSION['msgdelerro'] = "<div class='alert alert-danger text-center'><strong>ERRO AO APAGAR ID</strong> : $id - <strong>CID</strong> : $cid - <strong>TIPO</strong> : $tipo - <strong>AGRAVO</strong> : $agravo !!!<strong></div>";
        header("Location: suvisjt.php?pag=list-agravo");
    }
} elseif ($form == "cidade"){$conectar->query("DELETE FROM cidade WHERE id = '$id'");

    if ($conectar->affected_rows != 0) {
        header("Location: suvisjt.php?pag=list-cidade");
        $_SESSION['msgdel'] = "<div class='alert alert-success text-center'><strong>ID</strong> : $id - <strong>CÓDIGO</strong> : $codigo - <strong>CIDADE</strong> : $cidade - <strong>APAGADO COM SUCESSO !!!</strong></div>";
    } else {
        $_SESSION['msgdelerro'] = "<div class='alert alert-danger text-center'><strong>ERRO AO APAGAR ID</strong> : $id - <strong>CÓDIGO</strong> : $codigo - <strong>CIDADE</strong> : $cidade !!!</div>";
        header("Location: suvisjt.php?pag=list-cidade");
    }
} elseif ($form == "cnes"){$conectar->query("DELETE FROM cnes WHERE id = '$id'");

    if ($conectar->affected_rows != 0) {
        header("Location: suvisjt.php?pag=list-cnes");
        $_SESSION['msgdel'] = "<div class='alert alert-success text-center'><strong>ID</strong> : $id - <strong>CNES</strong> : $cnes - <strong>ESTABELECIMENTO</strong> : $estabelecimento - <strong>APAGADO COM SUCESSO !!!</strong></div>";
    } else {
        $_SESSION['msgdelerro'] = "<div class='alert alert-danger text-center'><strong>ERRO AO APAGAR ID</strong> : $id - <strong>CNES</strong> : $cnes - <strong>ESTABELECIMENTO</strong> : $estabelecimento !!!</div>";
        header("Location: suvisjt.php?pag=list-cnes");
    }
}
else {
    $_SESSION['msgdelerro'] = "<strong>ERRO AO APAGAR ID</strong></div>";
        header("Location: suvisjt.php");
    }

$conectar->close(); ?>
