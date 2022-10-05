<!-- Este projeto é desenvolvido na Suvis Jaçanã-Tremembé com iniciativa dos colaboradores da Unidade -->
<!-- Código desenvolvido por Rodolfo Romaioli Ribeiro de Jesus - rodolfo.romaioli@gmail.com -->
<!-- Sisdam Web - 2.0 - 2017 - Todos os direitos reservados -->

<?php
error_reporting(1);
//error_reporting(E_ALL);
//ini_set('display_errors', '1');
include_once '../../../../locked/seguranca.php';
include_once '../../../../conecta.php';

#Recolhendo os dados do formulário
$acao =        $_POST['acao'] ?? ''; // ID RUA
$ruagoogle =   $_POST['ruagoogle'] ?? ''; // ID RUA
$nve =         $_POST['nve'] ?? ''; // NVE
$ano =         $_POST['ano'] ?? ''; // ANO
$datanot =     $_POST['datanot'] ?? ''; // NOTIFICAÇÃO
$dataua =      $_POST['dataua'] ?? ''; // DATA ÚLTIMA AVALIAÇÃO
$databa =      $_POST['databa'] ?? ''; // DATA BUSCA ATIVA
$num_ca_susp = $_POST['num_casos_susp'] ?? ''; // DATA ÚLTIMA AVALIAÇÃO
$dataft =      $_POST['dataft'] ?? ''; // NOTIFICAÇÃO
$nomeanimal =  $_POST['nomeanimal'] ?? ''; // ANIMAL
$especie =     $_POST['especie'] ?? ''; // ESPÉCIE
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
$pin =         $_POST['pin'] ?? '0'; // PINO MAPS

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

if(!empty($dtent)):
$data_s_c = str_replace("/", "-", $dtent);
$data_s = date('Y-m-d', strtotime($data_s_c));
else:
    $data_s = '';
endif;

// Formata a data com / em formato data Y-mm-dd
$data_s_w = str_replace("/", "-", $datanot);
if(!empty($data_s_w)):
    $data_n = date('Y-m-d', strtotime($data_s_w));
else:
    $data_n = '0000-00-00';
endif;

// Formata a data com / em formato data Y-mm-dd
$data_u_a = str_replace("/", "-", $dataua);
if(!empty($data_u_a)):
    $data_ua = date('Y-m-d', strtotime($data_u_a));
else:
    $data_ua = '0000-00-00';
endif;

// Formata a data com / em formato data Y-mm-dd
$data_b_a = str_replace("/", "-", $databa);
if(!empty($data_b_a)):
    $data_ba = date('Y-m-d', strtotime($data_b_a));
else:
    $data_ba = '0000-00-00';
endif;

// Formata a data com / em formato data Y-mm-dd
$data_f_t = str_replace("/", "-", $dataft);
if(!empty($data_f_t)):
    $data_ft = date('Y-m-d', strtotime($data_f_t));
else:
    $data_ft = '0000-00-00';
endif;

//Se conectando com o Banco de Dados e tratando possível erro de conexão ...
if ($conectar->connect_error) die ('<div class="form-group"><a href="javascript:history.back()" <button type=\'button\' class=\'btn btn-danger\' accesskey="V"><span class="glyphicon glyphicon-arrow-left"></span> <u>V</u>OLTAR</button></a><h4><strong><div class="alert alert-danger text-center" role="alert">ERROR : 01 FALHA AO CONECTAR !!! SE PERSISTIR CONTATE: sisdamjt@gmail.com</h4></strong></div>');

# Verificando se tabela já tem id com nve e nome do animal.
$sql_nve = $conectar->query("SELECT * FROM esporo_an WHERE nve='$nve' AND nome_animal='$nomeanimal' AND especie='$id_esp'");

if ($_SESSION['usuarioNivelAcesso'] == "") :
    header("Location: suvisjt.php");
else:
    if($acao === ''):
        header("Location: suvisjt.php");
    endif;

// Consultando a existência de outro id com o mesmo endereço e número
$sql_pino = $conectar->query ("SELECT pin FROM esporo_an WHERE id_rua='$idrua' AND numero='$num'");

// Consultando o último pino cadastrado com o mesmo endereço e número
$pino = $conectar->query ("SELECT pin FROM esporo_an WHERE id_rua='$idrua' AND numero='$num' ORDER BY pin DESC LIMIT 1");
$cs_pino = mysqli_fetch_assoc($pino);
$pinos = $cs_pino['pin'];

    // Ifs para cadastramento
    if(!empty($acao) && $acao === 'cadastrar') :
        // if para informar duplicidade de número de cadastro no Centro de Controle de Zoonoses
        if ($sql_nve->num_rows > 0) :
            header("Location: suvisjt.php?pag=cadastro-esporotricose-animal");
            $_SESSION['msgerrocad'] = "<div class='alert alert-danger text-center' id='msgerrocad' role='alert'><strong>ANIMAL : </strong>$nomeanimal - <strong>TUTOR : </strong>$tutor - <strong>NÃO CADASTRADO - DUPLICIDADE !!!</strong></div>";
        else :
            // If para tratar rua e endereço caso já existam outros endereços
            if($sql_pino->num_rows > 0):

            // Consulta para obter a latitude e longitude do primeiro pino
            $cood = $conectar->query ("SELECT lat, lng FROM esporo_an WHERE id_rua='$idrua' AND numero='$num' AND pin='0'");
            $cs_cood = mysqli_fetch_assoc($cood);

            $latcood = $cs_cood['lat']; // Latitude do primeiro pino
            $lngcood = $cs_cood['lng']; // Longitude do primeiro pino

                // If para tratar a latitude e longitude duplicada
                if($pin == 0):
                    if($pinos == 0): $pin = $pinos + 1; $lat = $latcood; $lng = $lngcood + 0.000010;
                    elseif($pinos == 1): $pin = $pinos + 1; $lat = $latcood - 0.000010; $lng = $lngcood;
                    elseif($pinos == 2): $pin = $pinos + 1; $lat = $latcood; $lng = $lngcood - 0.000010;
                    elseif($pinos == 3): $pin = $pinos + 1; $lat = $latcood + 0.000010; $lng = $lngcood;
                    elseif($pinos == 4): $pin = $pinos + 1; $lat = $latcood + 0.000010; $lng = $lngcood + 0.000010;
                    elseif($pinos == 5): $pin = $pinos + 1; $lat = $latcood - 0.000010; $lng = $lngcood + 0.000010;
                    elseif($pinos == 6): $pin = $pinos + 1; $lat = $latcood - 0.000010; $lng = $lngcood - 0.000010;
                    elseif($pinos == 7): $pin = $pinos + 1; $lat = $latcood + 0.000010; $lng = $lngcood - 0.000010;
                    elseif($pinos == 8): $pin = $pinos + 1; $lat = $latcood + 0.000020; $lng = $lngcood;
                    elseif($pinos == 9): $pin = $pinos + 1; $lat = $latcood; $lng = $lngcood - 0.000020;
                    elseif($pinos == 10): $pin = $pinos + 1; $lat = $latcood - 0.000020; $lng = $lngcood;
                    elseif($pinos == 11): $pin = $pinos + 1; $lat = $latcood - 0.000020; $lng = $lngcood;
                    elseif($pinos == 12): $pin = $pinos + 1; $lat = $latcood + 0.000020; $lng = + 0.000010;
                    elseif($pinos == 13): $pin = $pinos + 1; $lat = $latcood + 0.000010; $lng = $lngcood + 0.000020;
                    elseif($pinos == 14): $pin = $pinos + 1; $lat = $latcood - 0.000020; $lng = $lngcood + 0.000010;
                    elseif($pinos == 15): $pin = $pinos + 1; $lat = $latcood - 0.000010; $lng = $lngcood + 0.000020;
                    elseif($pinos == 16): $pin = $pinos + 1; $lat = $latcood - 0.000010; $lng = $lngcood - 0.000020;
                    elseif($pinos == 17): $pin = $pinos + 1; $lat = $latcood - 0.000020; $lng = $lngcood - 0.000010;
                    elseif($pinos == 18): $pin = $pinos + 1; $lat = $latcood + 0.000010; $lng = $lngcood - 0.000020;
                    elseif($pinos == 19): $pin = $pinos + 1; $lat = $latcood + 0.000020; $lng = $lngcood - 0.000010;
                    elseif($pinos == 20): $pin = $pinos + 1; $lat = $latcood + 0.000020; $lng = $lngcood + 0.000020;
                    elseif($pinos == 21): $pin = $pinos + 1; $lat = $latcood - 0.000020; $lng = $lngcood + 0.000020;
                    elseif($pinos == 22): $pin = $pinos + 1; $lat = $latcood - 0.000020; $lng = $lngcood - 0.000020;
                    else: $pin = $pinos + 1; $lat = $latcood + 0.000020; $lng = $lngcood - 0.000020;
                    endif;
                endif;
            endif;

            if($diagnostico == 'POSITIVO'):
                $diagnostico = 1;
            elseif ($diagnostico == 'NEGATIVO'):
                $diagnostico = 2;
            else:
                $diagnostico = 0;
            endif;

            $conectar->query("INSERT INTO esporo_an (nve, ano, origem, data_entrada, pedido, nome_animal, sexo, idade, diagnostico, especie, tutor, id_rua, 
                                    telefone1, situacao, rua_esp_a, numero, complemento, lat, lng, data_ult_ava, data_busca_ativa, casos_hum_dom, nm_casos_susp_an, data_final_trat, 
                                    obs, pin, criado, data_criado)
                                    VALUES ('$nve', '$ano', '$id_origem', '$data_n', '$pedido','$nomeanimal', '$id_sexo', '$idade', '$diagnostico', '$id_esp', '$tutor', '$idrua', 
                                            '$tel1', '$id_sit', '$ruagoogle', '$num', '$comp', '$lat', '$lng', '$data_ua', '$data_ba', '$casoh', '$num_ca_susp', '$data_ft', '$obs', 
                                            '$pin', '$usuariologin', NOW())");
            $id_ea = "SELECT MAX(id_esp) as id_esp FROM esporo_an";
            $id_es_sl = $conectar->query($id_ea);
            $row = $id_es_sl->fetch_assoc();
            $ultimo_id = $row['id_esp'];

            if(!empty($data_s)):
                $conectar->query("INSERT INTO esporo_an_sd_medc (id_an_esp ,data_medc ,id_medc , dsg_medc, qtd_medc ,nm_ent_medc ,nm_rec_medc, criado ,data_criado)
                                    VALUES ('$ultimo_id', '$data_s','$id_med', '$dsg', '$qtd', '$nment', '$nmrecep', '$usuariologin', NOW())");
            endif;

            header("Location: suvisjt.php?pag=cadastro-esporotricose-animal");
            $_SESSION['msgcad'] = "<div class='alert alert-success text-center' id='msgcad' role='alert'><strong>ANIMAL : </strong>$nomeanimal - <strong>TUTOR : </strong>$tutor - <strong>CADASTRADO COM SUCESSO !!!</strong></div>";
        endif;
    endif;

    if($acao === 'cadastro-medicamento') :
        if(!empty($dtent)):
            $conectar->query("INSERT INTO esporo_an_ent_medc (dt_cadastro, nm_esp_medc ,dsg_esp_medc, qtd_esp_medc , criado ,dt_criado)
                                        VALUES ('$data_s', '$id_med', '$dsg', '$qtd', '$usuariologin', NOW())");
            header("Location: suvisjt.php?pag=cadastro-medicamento-esporo-animal");
            $_SESSION['msgcad'] = "<div class='alert alert-success text-center' id='msgcad' role='alert'><strong>MEDICAMENTO : </strong>$med<strong> - DOSAGEM : </strong>$dsg1<strong> MG - QUANTIDADE : </strong>$qtd1<strong> 
                                        CAP. - CADASTRADO COM SUCESSO!!!</strong></div>";
        else:
            header("Location: suvisjt.php?pag=cadastro-medicamento-esporo-animal");
            $_SESSION['msgerrocad'] = "<div class='alert alert-danger text-center' id='msgerrocad' role='alert'><strong>ERRO AO CADASTRAR !!!</strong></div>";
        endif;
    endif;
endif;

?>

