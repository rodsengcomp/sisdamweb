<!-- Este projeto é desenvolvido na Suvis Jaçanã-Tremembé com iniciativa dos colaboradores da Unidade -->
<!-- Código desenvolvido por Rodolfo Romaioli Ribeiro de Jesus - rodolfo.romaioli@gmail.com -->
<!-- Sisdam Web - 2.0 - 2017 - Todos os direitos reservados -->

<?php
error_reporting(0);
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
$tutor =       $_POST['tutor'] ?? ''; // TUTOR
$tel1 =        $_POST['tel1'] ?? ''; // TEL 1
$tel2 =        $_POST['tel2'] ?? ''; // TEL 2
$situacao =    $_POST['situacao'] ?? ''; // SITUACAO
$rua =         $_POST['rua'] ?? ''; // RUA
$num =         $_POST['num'] ?? ''; // N
$comp =        $_POST['comp'] ?? ''; // COMP
$lat =         $_POST['lat'] ?? ''; // LAT
$lng =         $_POST['lng'] ?? ''; // LNG
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

//GETS
$acao =          $_GET['acao'] ?? 'editar';
$id_get =        $_GET['id'];
$id_sd_med_get = $_GET['id_sd'];
$id_data_get =   $_GET['data_medc'] ?? '';
$id_med_get =    $_GET['id_med'] ?? '';
$id_dsg_get =    $_GET['dsg'] ?? '';
$id_qtd_get =    $_GET['qtd'] ?? '';
$id_nm_ent_get = $_GET['nm_ent_medc'] ?? '';
$id_nm_rec_get = $_GET['nm_rec_medc'] ?? '';

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

// Monta o caminho de destino com o nome do arquivo
$data_s = date('Y-d-m', strtotime($dtent));

//Se conectando com o Banco de Dados e tratando possível erro de conexão ...
if ($conexao = $conectar->query($conectar)) die ('<div class="form-group"><a href="javascript:history.back()" <button type=\'button\' class=\'btn btn-danger\' accesskey="V"><span class="glyphicon glyphicon-arrow-left"></span> <u>V</u>OLTAR</button></a><h4><strong><div class="alert alert-danger text-center" role="alert">ERROR : 01 FALHA AO CONECTAR !!! SE PERSISTIR CONTATE: sisdamjt@gmail.com</h4></strong></div>');

# Verificando se tabela já tem id com nve e nome do animal.
$sql_nve = $conectar->query("SELECT id_esp FROM esporotricose_animal WHERE nve='$nve' AND nomeanimal='$nomeanimal' AND especie='$id_esp' AND id_esp<>'$id'");

if($acao === 'editar') :
    if ($sql_nve->num_rows > 0) :
        header("Location: suvisjt.php?pag=edit-esporo-animal&id=$id");
        $_SESSION['msgedit'] = "<div class='alert alert-danger text-center' id='msgerroredit' role='alert'><strong>ANIMAL : </strong>$nomeanimal - <strong>TUTOR : </strong>$tutor - <strong>NÃO EDITADO - DUPLICIDADE !!!</strong></div>";
    else :
        $conectar->query("UPDATE esporo_an SET nve = '$nve', ano = '$ano', data_entrada = '$datanot', nome_animal = '$nomeanimal', especie = '$id_esp', tutor = '$tutor',
                                id_rua = '$idrua', telefone1 = '$tel1', telefone2 = '$tel2', situacao = '$id_sit', rua_esp_a = '$ruagoogle', numero = '$num', complemento = '$comp',
                                lat = '$lat', lng = '$lng', obs = '$obs', alterado = '$usuariologin', data_alterado = NOW() WHERE id_esp ='$id'");
        if($id_sd_med != ''):
            $conectar->query("UPDATE esporo_an_sd_medc SET data_medc = '$data_s', id_medc = '$id_med', dsg_medc = '$dsg', qtd_medc = '$qtd',nm_ent_medc = '$nment', nm_rec_medc = '$nmrecep',
                                    alterado = '$usuariologin', data_alterado = NOW() WHERE id_an_esp = '$id' AND id_sd = '$id_sd_med'");
            header("Location: suvisjt.php?pag=edit-esporo-animal&id=$id");
            $_SESSION['msgedit'] = "<div class='alert alert-warning text-center'><strong>MEDICAMENTO : </strong>$med - $dsg MG/DIA - $qtd CÁPSULAS - <strong>EDITADO COM SUCESSO !!!</strong></div>";
        else:
            if ($id_med != ''):
                $conectar->query("INSERT INTO esporo_an_sd_medc (id_an_esp ,data_medc ,id_medc , dsg_medc, qtd_medc ,nm_ent_medc ,nm_rec_medc , criado ,data_criado)
                                        VALUES ('$id', '$data_s','$id_med', '$dsg', '$qtd', '$nment', '$nmrecep', '$usuariologin', NOW())");
                header("Location: suvisjt.php?pag=edit-esporo-animal&id=$id");
                $_SESSION['msgedit'] = "<div class='alert alert-success text-center' id='msgedit' role='alert'><strong>MEDICAMENTO : </strong>$med - $dsg MG/DIA - $qtd CÁPSULAS - <strong>INSERIDO COM SUCESSO !!!</strong></div>";
            else:
                header("Location: suvisjt.php?pag=edit-esporo-animal&id=$id");
                $_SESSION['msgedit'] = "<div class='alert alert-success text-center' id='msgedit' role='alert'><strong>ANIMAL : </strong>$nomeanimal - <strong>TUTOR : </strong>$tutor - <strong>EDITADO COM SUCESSO !!!</strong></div>";
            endif;
        endif;
    endif;
endif;

if($acao === 'deletar') :
    $conectar->query("UPDATE esporo_an_sd_medc SET lixeira = 1, excluido = '$usuariologin', data_excluido = NOW() WHERE id_an_esp = '$id_get' AND id_sd = '$id_sd_med_get'");
    header("Location: suvisjt.php?pag=edit-esporo-animal&id=$id_get");
    $_SESSION['msgedit'] = "<div class='alert alert-success text-center' id='msgedit' role='alert'><strong>MEDICAMENTO : </strong>$id_med_get - $id_dsg_get MG/DIA - $id_qtd_get CÁPSULAS - <strong>ENVIADO A LIXEIRA COM SUCESSO !!!</strong></div>";
endif;

if($acao === 'reativar') :
    $conectar->query("UPDATE esporo_an_sd_medc SET lixeira = 0, excluido = '$usuariologin', data_excluido = NOW() WHERE id_an_esp = '$id_get' AND id_sd = '$id_sd_med_get'");
    header("Location: suvisjt.php?pag=edit-esporo-animal&id=$id_get");
    $_SESSION['msgedit'] = "<div class='alert alert-success text-center' id='msgedit' role='alert'><strong>MEDICAMENTO : </strong>$id_med_get - $id_dsg_get MG/DIA - $id_qtd_get CÁPSULAS - <strong>REATIVADO COM SUCESSO !!!</strong></div>";
endif;

?>

