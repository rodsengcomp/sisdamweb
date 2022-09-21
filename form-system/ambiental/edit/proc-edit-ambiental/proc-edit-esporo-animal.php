<!-- Este projeto é desenvolvido na Suvis Jaçanã-Tremembé com iniciativa dos colaboradores da Unidade -->
<!-- Código desenvolvido por Rodolfo Romaioli Ribeiro de Jesus - rodolfo.romaioli@gmail.com -->
<!-- Sisdam Web - 2.0 - 2017 - Todos os direitos reservados -->

<?php
error_reporting(1);
include_once '../../../../locked/seguranca.php';
include_once '../../../../conecta.php';
?>
<?php
#Recolhendo os dados do formulário

$id =          $_POST['id'] ?? '';
$id_sd_med =   $_POST['idmedc'] ?? '';
$ruagoogle =   $_POST['ruagoogle'] ?? ''; // ID RUA
$nve =         $_POST['nve'] ?? ''; // NVE
$ano =         $_POST['ano'] ?? ''; // ANO
$datanot =     $_POST['datanot'] ?? ''; // NOTIFICAÇÃO
$nomeanimal =  $_POST['nomeanimal'] ?? ''; // ANIMAL
$especie =     $_POST['especie'] ?? ''; // ESPÉCIE
$esp_id =      $_POST['esp_id'] ?? ''; // ESPÉCIE
$tutor =       $_POST['tutor'] ?? ''; // TUTOR
$idade =       $_POST['idade'] ?? ''; // IDADE
$diagnostico = $_POST['diagnostico'] ?? ''; // DIAGNOSTICO
$sexo =        $_POST['sexos'] ?? ''; // SEXO
$tel1 =        $_POST['tel1'] ?? ''; // TEL 1
$pedido =      $_POST['pedido'] ?? ''; // PEDIDO
$origem =      $_POST['origem'] ?? ''; // ORIGEM
$situacao =    $_POST['situacao'] ?? ''; // SITUACAO
$rua =         $_POST['rua'] ?? ''; // RUA
$num =         $_POST['num'] ?? ''; // N
$comp =        $_POST['comp'] ?? ''; // COMP
$lat =         substr($_POST['lat'], 0, 10) ?? ''; // LAT
$lng =         substr($_POST['lng'], 0, 10) ?? ''; // LNG
$casoh =       $_POST['casoh'] ?? ''; // CASOS HUMANOS
$cep =         $_POST['cep'] ?? ''; // CEP
$bairro =      $_POST['bairro'] ?? ''; // BAIRRO
$log =         $_POST['log'] ?? ''; // LOG
$da =          $_POST['da'] ?? ''; // DA
$setor =       $_POST['setor'] ?? ''; // SETOR
$pgguia =      $_POST['pgguia'] ?? ''; // PGGUIA
$ubs =         $_POST['localvd'] ?? ''; // UBS
$dtent =       $_POST['dataentrada'] ?? ''; // ENTREGA
$med =         $_POST['medicamento'] ?? ''; // NOME MEDICAMENTO 1 ENTREGA
$dsg =         $_POST['dsg'] ?? ''; // DOSAGEM 1 ENTREGA
$qtd =         $_POST['qtd'] ?? ''; // QUANTIDADE DE MEDICAMENTOS/COMPRIMIDOS 1 ENTREGA
$nment =       $_POST['nment'] ?? ''; // NOME ENTREGADOR MEDICAMENTOS 1 EMTREGA
$nmrecep =     $_POST['nmrecep'] ?? ''; // NOME RECEPTOR DE MEDICAMENTOS 1 ENTREGA
$obs =         $_POST['obs'] ?? ''; // OBSERVAÇõES SOBRE
$idrua =       $_POST['idrua'] ?? ''; // ID RUA
$pin =         $_POST['pin'] ?? ''; // PINO MAPS

//GETS
$acao =          $_GET['acao'] ?? '';
$id_get =        $_GET['id'];
$id_sd_med_get = $_GET['id_sd'];
$id_data_get =   $_GET['data_medc'] ?? '';
$id_med_get =    $_GET['id_med'] ?? '';
$id_dsg_get =    $_GET['dsg'] ?? '';
$id_qtd_get =    $_GET['qtd'] ?? '';
$id_nm_ent_get = $_GET['nm_ent_medc'] ?? '';
$id_nm_rec_get = $_GET['nm_rec_medc'] ?? '';
$id_nm_tutor = $_GET['nm_tutor'] ?? '';
$id_nm_animal = $_GET['nm_animal'] ?? '';

// Trazendo o id da especie
$consulta_especie = "SELECT * FROM especie_animal WHERE especie='$especie'";
$resultado_especie = $conectar->query($consulta_especie);
$especie_id = mysqli_fetch_assoc($resultado_especie);
$id_esp = $especie_id['id_especie'];

// Trazendo o id da situação
$consulta_situacao = "SELECT * FROM situacao_esporo WHERE sit_esp='$situacao'";
$resultado_situacao = $conectar->query($consulta_situacao);
$situacao_id = mysqli_fetch_assoc($resultado_situacao);
$id_sit = $situacao_id['id_st_esp'];

// Trazendo o id do medicamento 1
$cs_med = "SELECT * FROM esporo_medc WHERE nm_mdc_esp_an='$med'";
$rs_med = $conectar->query($cs_med);
$med_id = mysqli_fetch_assoc($rs_med);
$id_med = $med_id['id_med_esp'];

// Trazendo o id da especie
$cs_origem = "SELECT * FROM origem WHERE nm_origem='$origem'";
$rs_origem = $conectar->query($cs_origem);
$origem_id = mysqli_fetch_assoc($rs_origem);
$id_origem = $origem_id['id_origem'];

// Trazendo o id do sexo
$cs_sexo = "SELECT * FROM sexo WHERE sexo='$sexo'";
$rs_sexo = $conectar->query($cs_sexo);
$sexo_id = mysqli_fetch_assoc($rs_sexo);
$id_sexo = $sexo_id['id'];

// Monta o caminho de destino com o nome do arquivo
$data_s_w = str_replace("/", "-", $datanot);
$data_n = date('Y-m-d', strtotime($data_s_w));

// Monta o caminho de destino com o nome do arquivo
$data_s_c = str_replace("/", "-", $dtent);
$data_s = date('Y-m-d', strtotime($data_s_c));

//Se conectando com o Banco de Dados e tratando possível erro de conexão ...
if ($conectar->connect_error) die ('<div class="form-group"><a href="javascript:history.back()" <button type=\'button\' class=\'btn btn-danger\' accesskey="V"><span class="glyphicon glyphicon-arrow-left"></span> <u>V</u>OLTAR</button></a><h4><strong><div class="alert alert-danger text-center" role="alert">ERROR : 01 FALHA AO CONECTAR !!! SE PERSISTIR CONTATE: sisdamjt@gmail.com</h4></strong></div>');

# Verificando se tabela já tem id com nve e nome do animal.
$sql_nve = $conectar->query("SELECT * FROM esporo_an WHERE nve='$nve' AND tutor='$tutor' AND nome_animal='$nomeanimal' AND especie='$id_esp' AND id_esp<>'$id'");

$sql_pino = $conectar->query ("SELECT pin FROM esporo_an WHERE id_rua='$idrua' AND numero='$num' AND id_esp<>$id");

$pino = $conectar->query ("SELECT pin FROM esporo_an WHERE id_rua='$idrua' AND numero='$num' AND id_esp<>$id ORDER BY pin DESC LIMIT 1");
$cs_pino = mysqli_fetch_assoc($pino);

$pinos = $cs_pino['pin'];


if ($_SESSION['usuarioNivelAcesso'] == "") :
    header("Location: suvisjt.php");

else:
    if($acao === ''):
        header("Location: suvisjt.php");
    endif;

    if(!empty($acao) && $acao === 'editar') :
        if ($sql_nve->num_rows > 0) :
            header("Location: suvisjt.php?pag=edit-esporo-animal&id=$id");
            $_SESSION['msgedit'] = "<div class='alert alert-danger text-center' id='msgerroredit' role='alert'><strong>ANIMAL : </strong>$nomeanimal - <strong>TUTOR : </strong>$tutor - <strong>NÃO EDITADO - DUPLICIDADE !!!</strong></div>";
        else :

            // Separar os pontos de latitude e longitude repetidos
            if($sql_pino->num_rows > 0):

                $cood = $conectar->query ("SELECT lat, lng FROM esporo_an WHERE id_rua='$idrua' AND numero='$num' AND pin='1'");
                $cs_cood = mysqli_fetch_assoc($cood);

                $latcood = $cs_cood['lat'];
                $lngcood = $cs_cood['lng'];


                if($pin == 0):
                    if($pinos == 0): $pin = $pinos + 1;
                    elseif($pinos == 1): $pin = $pinos + 1; $lat = $latcood; $lng = $lngcood + 0.000010;
                    elseif($pinos == 2): $pin = $pinos + 1; $lat = $latcood - 0.000010; $lng = $lngcood;
                    elseif($pinos == 3): $pin = $pinos + 1; $lat = $latcood; $lng = $lngcood - 0.000010;
                    elseif($pinos == 4): $pin = $pinos + 1; $lat = $latcood + 0.000010; $lng = $lngcood;
                    elseif($pinos == 5): $pin = $pinos + 1; $lat = $latcood + 0.000010; $lng = $lngcood + 0.000010;
                    elseif($pinos == 6): $pin = $pinos + 1; $lat = $latcood - 0.000010; $lng = $lngcood + 0.000010;
                    elseif($pinos == 7): $pin = $pinos + 1; $lat = $latcood - 0.000010; $lng = $lngcood - 0.000010;
                    elseif($pinos == 8): $pin = $pinos + 1; $lat = $latcood + 0.000010; $lng = $lngcood - 0.000010;
                    elseif($pinos == 9): $pin = $pinos + 1; $lat = $latcood + 0.000020; $lng = $lngcood;
                    elseif($pinos == 10): $pin = $pinos + 1; $lat = $latcood; $lng = $lngcood - 0.000020;
                    elseif($pinos == 11): $pin = $pinos + 1; $lat = $latcood - 0.000020; $lng = $lngcood;
                    elseif($pinos == 12): $pin = $pinos + 1; $lat = $latcood - 0.000020; $lng = $lngcood;
                    elseif($pinos == 13): $pin = $pinos + 1; $lat = $latcood + 0.000020; $lng = + 0.000010;
                    endif;
                else:

                    $sql_ruaidem = $conectar->query ("SELECT pin FROM esporo_an WHERE id_rua='$idrua' AND numero='$num' AND id_esp<>$id");

                    if($sql_ruaidem->num_rows > 0):
                        $pin = $pinos + 1;
                            if($pin == 1): $lat = $latcood; $lng = $lngcood;
                                elseif($pin == 2): $lat = $latcood; $lng = $lngcood + 0.000010;
                                elseif($pin == 3): $lat = $latcood - 0.000010; $lng = $lngcood;
                                elseif($pin == 4): $lat = $latcood; $lng = $lngcood - 0.000010;
                                elseif($pin == 5): $lat = $latcood + 0.000010; $lng = $lngcood;
                                elseif($pin == 6): $lat = $latcood + 0.000010; $lng = $lngcood + 0.000010;
                                elseif($pin == 7): $lat = $latcood - 0.000010; $lng = $lngcood + 0.000010;
                                elseif($pin == 8): $lat = $latcood - 0.000010; $lng = $lngcood - 0.000010;
                                elseif($pin == 9): $lat = $latcood + 0.000010; $lng = $lngcood - 0.000010;
                                elseif($pin == 10): $lat = $latcood + 0.000020; $lng = $lngcood;
                                elseif($pin == 11): $lat = $latcood - 0.000020; $lng = $lngcood;
                                elseif($pin == 12): $lat = $latcood; $lng = $lngcood + 0.000020;
                                elseif($pin == 13): $lat = $latcood; $lng = $lngcood - 0.000020;
                                elseif($pin == 14): $lat = $latcood + 0.000020; $lng = $lngcood + 0.000010;
                            else
                                : $lat = $latcood + 0.000010; $lng = $lngcood - 0.000010;
                            endif;
                    else:
                        if($pin == 1): $lat = $latcood; $lng = $lngcood;
                            elseif($pin == 2): $lat = $latcood; $lng = $lngcood + 0.000010;
                            elseif($pin == 3): $lat = $latcood - 0.000010; $lng = $lngcood;
                            elseif($pin == 4): $lat = $latcood; $lng = $lngcood - 0.000010;
                            elseif($pin == 5): $lat = $latcood + 0.000010; $lng = $lngcood;
                            elseif($pin == 6): $lat = $latcood + 0.000010; $lng = $lngcood + 0.000010;
                            elseif($pin == 7): $lat = $latcood - 0.000010; $lng = $lngcood + 0.000010;
                            elseif($pin == 8): $lat = $latcood - 0.000010; $lng = $lngcood - 0.000010;
                            elseif($pin == 9): $lat = $latcood + 0.000010; $lng = $lngcood - 0.000010;
                            elseif($pin == 10): $lat = $latcood + 0.000020; $lng = $lngcood;
                            elseif($pin == 11): $lat = $latcood - 0.000020; $lng = $lngcood;
                            elseif($pin == 12): $lat = $latcood; $lng = $lngcood + 0.000020;
                            elseif($pin == 13): $lat = $latcood; $lng = $lngcood - 0.000020;
                            elseif($pin == 14): $lat = $latcood + 0.000020; $lng = $lngcood + 0.000010;
                        else :
                            $lat = $latcood + 0.000030; $lng = $lngcood - 0.000030;
                        endif;
                    endif;
                endif;
                // ..... Seguem os ifs
            endif;

            if($pin == 0):
                $pin = $pin +1;
            endif;

            if($diagnostico == 'POSITIVO'):
                $diagnostico = 1;
            elseif ($diagnostico == 'NEGATIVO'):
                $diagnostico = 2;
            else:
                $diagnostico = 0;
            endif;

            $conectar->query("UPDATE esporo_an SET nve = '$nve', ano = '$ano', origem = '$id_origem', data_entrada = '$data_n', pedido = '$pedido', nome_animal = '$nomeanimal', sexo='$id_sexo', idade = '$idade',diagnostico = '$diagnostico' , especie = '$id_esp', tutor = '$tutor',
                                    id_rua = '$idrua', telefone1 = '$tel1', situacao = '$id_sit', rua_esp_a = '$ruagoogle', numero = '$num', complemento = '$comp',
                                    lat = '$lat', lng = '$lng', casos_hum_dom = '$casoh', obs = '$obs', pin='$pin', alterado = '$usuariologin', data_alterado = NOW() WHERE id_esp ='$id'");
            if($id_sd_med != ''):
                $conectar->query("UPDATE esporo_an_sd_medc SET data_medc = '$data_s', id_medc = '$id_med', id_especie = '$id_esp', dsg_medc = '$dsg', qtd_medc = '$qtd',nm_ent_medc = '$nment', nm_rec_medc = '$nmrecep',
                                        alterado = '$usuariologin', data_alterado = NOW() WHERE id_an_esp = '$id' AND id_sd = '$id_sd_med'");
                header("Location: suvisjt.php?pag=edit-esporo-animal&id=$id");
                $_SESSION['msgedit'] = "<div class='alert alert-info text-center'><strong>MEDICAMENTO : </strong>$med - $dsg MG/DIA - $qtd CÁPSULAS - <strong>EDITADO COM SUCESSO !!!</strong></div>";
            else:
                if ($id_med != ''):
                    $conectar->query("INSERT INTO esporo_an_sd_medc (id_an_esp ,data_medc ,id_medc , id_especie, dsg_medc, qtd_medc ,nm_ent_medc ,nm_rec_medc , criado ,data_criado)
                                            VALUES ('$id', '$data_s','$id_med', '$id_esp', '$dsg', '$qtd', '$nment', '$nmrecep', '$usuariologin', NOW())");
                    header("Location: suvisjt.php?pag=edit-esporo-animal&id=$id");
                    $_SESSION['msgedit'] = "<div class='alert alert-success text-center' id='msgedit' role='alert'><strong>MEDICAMENTO : </strong>$med - $dsg MG/DIA - $qtd CÁPSULAS - <strong>INSERIDO COM SUCESSO !!!</strong></div>";
                else:
                    header("Location: suvisjt.php?pag=edit-esporo-animal&id=$id");
                    $_SESSION['msgedit'] = "<div class='alert alert-success text-center' id='msgedit' role='alert'><strong>ANIMAL : </strong>$nomeanimal - <strong>TUTOR : </strong>$tutor - <strong>EDITADO COM SUCESSO !!!</strong></div>";
                endif;
            endif;
        endif;
    endif;

    # Verificando se tabela já tem id com nve e nome do animal.
    $sql_medicamento = $conectar->query("SELECT * FROM esporo_medc WHERE nm_esp_medc = '$id_med' AND dsg_esp_medc = '$dsg' AND qtd_esp_medc = '$qtd' AND dt_criado = '$data_s' AND id_esp_ent<>'$id'");

    if(!empty($acao) && $acao === 'editar-medicamento') :
        if ($sql_medicamento->num_rows > 0) :
            header("Location: suvisjt.php?pag=edicao-esporo-animal-medicamentos&id=$id");
            $_SESSION['msgedit'] = "<div class='alert alert-danger text-center' id='msgerroredit' role='alert'><strong>MEDICAMENTO : </strong>$med - <strong>DSG : </strong>$dsg - <strong>QTD : </strong>$qtd - <strong>NÃO EDITADO - DUPLICIDADE !!!</strong></div>";
        else :
            if(!empty($data_s)) :
                $conectar->query("UPDATE esporo_an_ent_medc SET dt_cadastro = '$data_s', nm_esp_medc = '$id_med', dsg_esp_medc = '$dsg', qtd_esp_medc = '$qtd', alterado = '$usuariologin', 
                              dt_alterado = NOW() WHERE id_esp_ent = $id");
                header("Location: suvisjt.php?pag=edicao-medicamento-esporo-animal&id=$id");
                $_SESSION['msgedit'] = "<div class='alert alert-warning text-center' id='msgcad' role='alert'><strong>MEDICAMENTO : </strong>$med<strong> - DOSAGEM : </strong>$dsg<strong> MG - QUANTIDADE : </strong>$qtd<strong> 
                                        CAP. - EDITADO COM SUCESSO!!!</strong></div>";
            else:
                if(!empty($id)) :
                    header("Location: suvisjt.php?pag=edicao-medicamento-esporo-animal&id=$id");
                    $_SESSION['msgedit'] = "<div class='alert alert-danger text-center' id='msgerrorcad' role='alert'><strong>ERRO AO EDITAR !!!</strong></div>";
                else:
                    header("Location: suvisjt.php?pag=listar-medicamento-esporo-animal");
                    $_SESSION['msgedit'] = "<div class='alert alert-danger text-center' id='msgerrorcad' role='alert'><strong>ERRO AO EDITAR !!!</strong></div>";
                endif;
            endif;
        endif;
    endif;

    if(!empty($acao) && $acao === 'deletar') :
        $conectar->query("UPDATE esporo_an SET lixeira = 1, excluido = '$usuariologin', data_excluido = NOW() WHERE id_esp = '$id_get'");
        header("Location: suvisjt.php?pag=listar-esporotricose-animal");
        $_SESSION['msgedit'] = "<div class='alert alert-success text-center' id='msgedit' role='alert'><strong>ANIMAL : $id_nm_animal - TUTOR : $id_nm_tutor - ENVIADO A LIXEIRA COM SUCESSO !!!</strong></div>";
    endif;

    if($acao == 'reativar') :
        $conectar->query("UPDATE esporo_an SET lixeira = 0, reativado = '$usuariologin', data_reativado = NOW() WHERE id_esp = '$id_get'");
        header("Location: suvisjt.php?pag=listar-esporotricose-animal");
        $_SESSION['msgedit'] = "<div class='alert alert-success text-center' id='msgedit' role='alert'><strong>ANIMAL : $id_nm_animal - TUTOR : $id_nm_tutor - REATIVADO COM SUCESSO !!!</strong></div>";
    endif;

    if(!empty($acao) && $acao === 'deletar-entrada-medicamento') :
        $conectar->query("UPDATE esporo_an_ent_medc SET lixeira = 1, excluido = '$usuariologin', data_excluido = NOW() WHERE id_esp_ent = '$id_get'");
        header("Location: suvisjt.php?pag=listar-medicamentos-esporotricose-animal");
        $_SESSION['msgedit'] = "<div class='alert alert-success text-center' id='msgedit' role='alert'><strong>MEDICAMENTO : </strong>$id_med_get - $id_dsg_get MG/DIA - $id_qtd_get CÁPSULAS - <strong>ENVIADO A LIXEIRA COM SUCESSO !!!</strong></div>";
    endif;

    if(!empty($acao) && $acao === 'reativar-entrada-medicamento') :
        $conectar->query("UPDATE esporo_an_ent_medc SET lixeira = 0, reativado = '$usuariologin', data_reativado = NOW() WHERE id_esp_ent = '$id_get'");
        header("Location: suvisjt.php?pag=listar-medicamentos-esporotricose-animal");
        $_SESSION['msgedit'] = "<div class='alert alert-success text-center' id='msgedit' role='alert'><strong>MEDICAMENTO : </strong>$id_med_get - $id_dsg_get MG/DIA - $id_qtd_get CÁPSULAS - <strong>REATIVADO COM SUCESSO !!!</strong></div>";
    endif;

    if(!empty($acao) && $acao === 'deletar-saida-medicamento') :
        $conectar->query("UPDATE esporo_an_sd_medc SET lixeira = 1, excluido = '$usuariologin', data_excluido = NOW() WHERE id_sd = '$id_get' AND id_an_esp = '$id_sd_med_get'");
        header("Location: suvisjt.php?pag=listar-saida-de-medicamentos-esporotricose-animal");
        $_SESSION['msgedit'] = "<div class='alert alert-success text-center' id='msgedit' role='alert'><strong>MEDICAMENTO : </strong>$id_med_get - $id_dsg_get MG/DIA - $id_qtd_get CÁPSULAS - <strong>ENVIADO A LIXEIRA COM SUCESSO !!!</strong></div>";
    endif;

    if($acao == 'reativar-saida-medicamento') :
        $conectar->query("UPDATE esporo_an_sd_medc SET lixeira = 0, reativado = '$usuariologin', data_reativado = NOW() WHERE id_sd = '$id_get' AND id_an_esp = '$id_sd_med_get'");
        header("Location: suvisjt.php?pag=listar-saida-de-medicamentos-esporotricose-animal");
        $_SESSION['msgedit'] = "<div class='alert alert-success text-center' id='msgedit' role='alert'><strong>MEDICAMENTO : </strong>$id_med_get - $id_dsg_get MG/DIA - $id_qtd_get CÁPSULAS - <strong>REATIVADO COM SUCESSO !!!</strong></div>";
    endif;

endif;

?>

