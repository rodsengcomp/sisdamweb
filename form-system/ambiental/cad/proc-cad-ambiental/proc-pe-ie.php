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
                                class="glyphicon glyphicon-plus-sign"></i></span>CADASTRAR PE / IE <?php echo $today = date("Y"); ?></button>
            </div>
        </div>
    </div>
    <!-- Fim da Página de Título -->

    <div class="row espaco">
        <div class="col-md-12">
            <form class="form-horizontal" style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                echo 'display: none;';
            } ?>" id="proc_cad_pe_ie">

                <?php

                //Se conectando com o Banco de Dados e tratando possível erro de conexão ...
                if ($conectar->connect_error) die ('<div class="form-group"><a href="javascript:history.back()" <button type=\'button\' class=\'btn btn-danger\' accesskey="V"><span class="glyphicon glyphicon-arrow-left"></span> <u>V</u>OLTAR</button></a><h4><strong><div class="alert alert-danger text-center" role="alert">ERROR : 01 FALHA AO CONECTAR !!! SE PERSISTIR CONTATE: sisdamjt@gmail.com</h4></strong></div>');

                #Recolhendo os dados do formulário
                $idpeie = mysqli_real_escape_string($conectar, $_POST['id_pe_ie']);
                $ruagoogle = mysqli_real_escape_string($conectar, $_POST['ruagoogle1']);
                $tipo = mysqli_real_escape_string($conectar, $_POST['tipo']);
                $esp = mysqli_real_escape_string($conectar, $_POST["especificacao"]);
                $risco = mysqli_real_escape_string($conectar, $_POST["risco"]);
                $rua = mysqli_real_escape_string($conectar, $_POST["rua"]);
                $num = mysqli_real_escape_string($conectar, $_POST["num"]);
                $comp = mysqli_real_escape_string($conectar, $_POST["comp"]);
                $cep = mysqli_real_escape_string($conectar, $_POST["cep"]);
                $log = mysqli_real_escape_string($conectar, $_POST["log"]);
                $bairro = mysqli_real_escape_string($conectar, $_POST["bairro"]);
                $da = mysqli_real_escape_string($conectar, $_POST["da"]);
                $setor = mysqli_real_escape_string($conectar, $_POST["setor"]);
                $pgguia = mysqli_real_escape_string($conectar, $_POST["pgguia"]);
                $ubs = mysqli_real_escape_string($conectar, $_POST["localvd"]);
                $lat = mysqli_real_escape_string($conectar, $_POST["latitude"]);
                $lng = mysqli_real_escape_string($conectar, $_POST["longitude"]);
                $idrua = mysqli_real_escape_string($conectar, $_POST["idrua"]);
                $obs_pe_ie = mysqli_real_escape_string($conectar, $_POST["observacao"]);
                $formulario = mysqli_real_escape_string($conectar, $_POST["formulario"]);
                $id = mysqli_real_escape_string($conectar, $_POST["id"]);

                # Verificando vários campos.
                $sql_cadastro_pe_ie = $conectar->query("SELECT * FROM pes_ies_38_83 WHERE tipo_pe_ie='$tipo' AND esp_pe_ie='$esp' AND id_rua_pe='$idrua' AND num_pe_ie='$num'");
                $sql_edicao_pe_ie = $conectar->query("SELECT * FROM pes_ies_38_83 WHERE tipo_pe_ie='$tipo' AND esp_pe_ie='$esp' AND id_rua_pe='$idrua' AND num_pe_ie='$num' AND id_pe_ie<>'$id'");

                if ($formulario == 'CADASTRO') {
                    if ($sql_cadastro_pe_ie->num_rows > 0){$_SESSION['msgedit'] = "<div class='alert alert-danger text-center'>
                        <strong>$qtd $material - Nº MEMO  $memo/2018 - NÃO CADASTRADO - REGISTRO EM DUPLICIDADE !!! </strong></div>";
                        header("Location: suvisjt.php?pag=cad-pe-ie-jt");
                    }else {if (!$conectar->query("INSERT INTO pes_ies_38_83 (ruagoogle_pe_ie, tipo_pe_ie, esp_pe_ie, risco_pe_ie, end_pe_ie, num_pe_ie, comp_pe_ie, cep_pe_ie, log_pe_ie, bairro_pe_ie, da_pe_ie, setor_pe_ie, pgguia_pe_ie, ubs_pe_ie,id_rua_pe_ie, lat_pe_ie, lng_pe_ie,obs_pe_ie, usuariocad, criado) VALUES ('$ruagoogle', '$tipo', '$esp', '$risco', '$rua', '$num', '$comp', '$cep', '$log', '$bairro', '$da', '$setor', '$pgguia', '$ubs', '$idrua','$lat', '$lng', '$obs_pe_ie', '$usuariologin', NOW())"))
                        die ('<br><br><div class="container theme-showcase" role="main" xmlns="http://www.w3.org/1999/html"><div class="row"><div class="col-md-12"><div class="form-group"><a href="javascript:history.back()" <button type=\'button\' class=\'btn btn-danger\' accesskey="V"><span class="glyphicon glyphicon-arrow-left"></span> <u>V</u>OLTAR</button></a><h4><strong><div class="alert alert-danger text-center" role="alert">ERROR:02 FALHA DE SICRONIZAÇÃO COM A TABELA !!! SE PERSISTIR CONTATE: sisdamjt@gmail.com</h4></strong></div></div></div>');
                        $_SESSION['msgedit'] = "<div class='alert alert-success text-center'><strong>$tipo - Nº : $conectar->insert_id - $esp - $log $rua Nº:$num - INSERIDO COM SUCESSO !!! </strong></div>";
                        header("Location: suvisjt.php?pag=cad-pe-ie-jt");}
                }elseif ($formulario == 'EDICAOLAT') {
                    if($sql_edicao_pe_ie->num_rows > 0) {$_SESSION['msgedit'] = "<div class='alert alert-success text-center'>
                        <strong>$tipo - Nº : $idpeie - $esp - $log $rua Nº:$num - NÃO EDITADO - REGISTRO EM DUPLICIDADE !!! </strong></div>";
                        header("Location: suvisjt.php?pag=edit-pe-ie-jt-edit");
                    }else {if (!$conectar->query("UPDATE pes_ies_38_83 SET ruagoogle_pe_ie='$ruagoogle', tipo_pe_ie='$tipo', esp_pe_ie='$esp', risco_pe_ie='$risco', end_pe_ie='$rua', num_pe_ie='$num', comp_pe_ie='$comp', cep_pe_ie='$cep', log_pe_ie='$log', bairro_pe_ie='$bairro', da_pe_ie='$da', setor_pe_ie='$setor', pgguia_pe_ie='$pgguia', ubs_pe_ie='$ubs',id_rua_pe_ie='$idrua', lat_pe_ie='$lat', lng_pe_ie='$lng',obs_pe_ie='$obs_pe_ie', usuarioalt='D784549', usuariocad='D784549' WHERE id_pe_ie='$id'"))
                        die ('<br><br><div class="container theme-showcase" role="main" xmlns="http://www.w3.org/1999/html"><div class="row"><div class="col-md-12"><div class="form-group"><a href="javascript:history.back()" <button type=\'button\' class=\'btn btn-danger\' accesskey="V"><span class="glyphicon glyphicon-arrow-left"></span> <u>V</u>OLTAR</button></a><h4><strong><div class="alert alert-danger text-center" role="alert">ERROR:02 FALHA DE SICRONIZAÇÃO COM A TABELA !!! SE PERSISTIR CONTATE: sisdamjt@gmail.com</h4></strong></div></div></div>');
                        $_SESSION['msgedit'] = "<div class='alert alert-success text-center'><strong>$tipo Nº : $id - $esp - $log $rua Nº:$num - EDITADO COM SUCESSO !!! </strong></div>";
                        header("Location: suvisjt.php?pag=edit-pe-ie-jt-edit");
                    }
                } elseif ($sql_edicao_pe_ie->num_rows > 0) {$_SESSION['msgedit'] = "<div class='alert alert-success text-center'>
                        <strong>$tipo - Nº : $idpeie - $esp - $log $rua Nº:$num - NÃO EDITADO - REGISTRO EM DUPLICIDADE !!! </strong></div>";
                    header("Location: suvisjt.php?pag=edit-pe-ie-jt");
                }else {if (!$conectar->query("UPDATE pes_ies_38_83 SET ruagoogle_pe_ie='$ruagoogle', tipo_pe_ie='$tipo', esp_pe_ie='$esp', risco_pe_ie='$risco', end_pe_ie='$rua', num_pe_ie='$num', comp_pe_ie='$comp', cep_pe_ie='$cep', log_pe_ie='$log', bairro_pe_ie='$bairro', da_pe_ie='$da', setor_pe_ie='$setor', pgguia_pe_ie='$pgguia', ubs_pe_ie='$ubs',id_rua_pe_ie='$idrua', lat_pe_ie='$lat', lng_pe_ie='$lng',obs_pe_ie='$obs_pe_ie', usuarioalt='D784549', usuariocad='D784549' WHERE id_pe_ie='$id'"))
                    die ('<br><br><div class="container theme-showcase" role="main" xmlns="http://www.w3.org/1999/html"><div class="row"><div class="col-md-12"><div class="form-group"><a href="javascript:history.back()" <button type=\'button\' class=\'btn btn-danger\' accesskey="V"><span class="glyphicon glyphicon-arrow-left"></span> <u>V</u>OLTAR</button></a><h4><strong><div class="alert alert-danger text-center" role="alert">ERROR:02 FALHA DE SICRONIZAÇÃO COM A TABELA !!! SE PERSISTIR CONTATE: sisdamjt@gmail.com</h4></strong></div></div></div>');
                    $_SESSION['msgedit'] = "<div class='alert alert-success text-center'><strong>$tipo Nº : $id - $esp - $log $rua Nº:$num - EDITADO COM SUCESSO !!! </strong></div>";
                    header("Location: suvisjt.php?pag=edit-pe-ie-jt");
                }
                ?>

            </form>
        </div>
    </div>
</div>


