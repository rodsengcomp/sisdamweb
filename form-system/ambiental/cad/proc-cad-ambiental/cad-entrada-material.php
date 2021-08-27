<!-- Este projeto é desenvolvido na Suvis Jaçanã-Tremembé com iniciativa dos colaboradores da Unidade -->
<!-- Código desenvolvido por Rodolfo Romaioli Ribeiro de Jesus - rodolfo.romaioli@gmail.com -->
<!-- Sisdam Web - 2.0 - 2017 - Todos os direitos reservados -->

<?php
/*error_reporting(0);*/
include_once '../../../../locked/seguranca.php';
include_once '../../../../conecta.php';
?>

<div class="container theme-showcase" role="main">
    <!-- Página de Título -->
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <ol class="breadcrumb">
                    <li><i class="fa fa-database"></i> <a href="suvisjt.php">Sisdam Web</a></li>
                    <li class="active">Entrada de Materiais <?php echo $today = date("Y"); ?></li>
                </ol>
                <button type="button" class="btn btn-success btn-labeled btn-lg btn-block"><span class="btn-label"><i
                                class="glyphicon glyphicon-plus-sign"></i></span>CADASTRAR ENTRADA <?php echo $today = date("Y"); ?></button>
            </div>
        </div>
    </div>
    <!-- Fim da Página de Título -->

    <div class="row espaco">
        <div class="col-md-12">
            <form class="form-horizontal" style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                echo 'display: none;';
            } ?>" id="proc_cad_entrada_material">

                <?php

                //Se conectando com o Banco de Dados e tratando possível erro de conexão ...
                if ($conexao = $conectar->query($conectar)) die ('<div class="form-group"><a href="javascript:history.back()" <button type=\'button\' class=\'btn btn-danger\' accesskey="V"><span class="glyphicon glyphicon-arrow-left"></span> <u>V</u>OLTAR</button></a><h4><strong><div class="alert alert-danger text-center" role="alert">ERROR : 01 FALHA AO CONECTAR !!! SE PERSISTIR CONTATE: sisdamjt@gmail.com</h4></strong></div>');

                #Recolhendo os dados do formulário
                $id = mysqli_real_escape_string($conectar, $_POST['id']);
                $material = mysqli_real_escape_string($conectar, $_POST["material"]);
                $qtd = mysqli_real_escape_string($conectar, $_POST["qtd"]);
                $datent = mysqli_real_escape_string($conectar, $_POST["entrada"]);
                $memo = mysqli_real_escape_string($conectar, $_POST["verifica_memo"]);
                $observacao = mysqli_real_escape_string($conectar, $_POST["observacao"]);
                $nomecad = mysqli_real_escape_string($conectar, $_POST["nomecad"]);
                $nomerf = mysqli_real_escape_string($conectar, $_POST["nomerf"]);
                $formulario = mysqli_real_escape_string($conectar, $_POST['formulario']);

                $entrada = date("Y-m-d",strtotime(str_replace('/', '-', $datent)));

                # Verificando vários campos.
                $sql_cadastro = $conectar->query("SELECT * FROM materiais_controle WHERE material='$material' AND qtd='$qtd' AND entrada='$entrada' AND nome_lib='$nomecad'");
                $sql_edicao = $conectar->query("SELECT * FROM materiais_controle WHERE material='$material' AND qtd='$qtd' AND entrada='$entrada' AND nome_lib='$nomecad' AND id<>'$id'");

                if ($formulario == 'CADASTRO') {
                    if ($sql_cadastro->num_rows > 0){$_SESSION['msgedit'] = "<div class='alert alert-danger text-center'>
                        <strong>$qtd $material - Nº MEMO  $memo/2018 - NÃO CADASTRADO - REGISTRO EM DUPLICIDADE !!! </strong></div>";
                        header("Location: suvisjt.php?pag=cad-entrada-material");
                    }else {if (!$conectar->query("INSERT INTO materiais_controle (material, qtd, entrada, n_memo, obs, nome_lib, rf_lib, usuariocad, criado) VALUES ('$material', '$qtd','$entrada', '$memo', '$observacao', '$nomecad', '$nomerf','$usuariologin', NOW())"))
                        die ('<br><br><div class="container theme-showcase" role="main" xmlns="http://www.w3.org/1999/html"><div class="row"><div class="col-md-12"><div class="form-group"><a href="javascript:history.back()" <button type=\'button\' class=\'btn btn-danger\' accesskey="V"><span class="glyphicon glyphicon-arrow-left"></span> <u>V</u>OLTAR</button></a><h4><strong><div class="alert alert-danger text-center" role="alert">ERROR:02 FALHA DE SICRONIZAÇÃO COM A TABELA !!! SE PERSISTIR CONTATE: sisdamjt@gmail.com</h4></strong></div></div></div>');
                        $_SESSION['msgedit'] = "<div class='alert alert-success text-center'><strong>$qtd $material - Nº MEMO  $memo/2018 - INSERIDO COM SUCESSO!!!</strong></div>";
                        header("Location: suvisjt.php?pag=cad-entrada-material");}
                }elseif ($sql_edicao->num_rows > 0) {$_SESSION['msgedit'] = "<div class='alert alert-success text-center'>
                        <strong>$qtd $material - Nº MEMO  $memo/2018 - NÃO EDITADO - REGISTRO EM DUPLICIDADE !!! </strong></div>";
                    header("Location: suvisjt.php?pag=edit-entrada-material");
                }else {if (!$conectar->query("UPDATE materiais_controle SET material='$material', qtd='$qtd', entrada='$entrada', n_memo='$memo', obs='$observacao', nome_lib='$nomecad', rf_lib='$nomerf', usuarioalt='$usuariologin', alterado=NOW() WHERE id_controle='$id'"))
                    die ('<br><br><div class="container theme-showcase" role="main" xmlns="http://www.w3.org/1999/html"><div class="row"><div class="col-md-12"><div class="form-group"><a href="javascript:history.back()" <button type=\'button\' class=\'btn btn-danger\' accesskey="V"><span class="glyphicon glyphicon-arrow-left"></span> <u>V</u>OLTAR</button></a><h4><strong><div class="alert alert-danger text-center" role="alert">ERROR:02 FALHA DE SICRONIZAÇÃO COM A TABELA !!! SE PERSISTIR CONTATE: sisdamjt@gmail.com</h4></strong></div></div></div>');
                    $_SESSION['msgedit'] = "<div class='alert alert-success text-center'><strong>$qtd $material - Nº MEMO  $memo/2018 - EDITADO COM SUCESSO!!!</strong></div>";
                    header("Location: suvisjt.php?pag=list-entrada-material");
                }
                ?>

            </form>
        </div>
    </div>
</div>


