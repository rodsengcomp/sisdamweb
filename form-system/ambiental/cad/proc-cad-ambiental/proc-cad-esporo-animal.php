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
$dtent2 =      $_POST['dataentrada2'] ?? ''; // ENTREGA
$med =         $_POST['medicamento'] ?? ''; // NOME MEDICAMENTO 1 ENTREGA
$dsg =         $_POST['dsg'] ?? ''; // DOSAGEM 1 ENTREGA
$qtd1 =        $_POST['qtd1'] ?? ''; // QUANTIDADE DE MEDICAMENTOS/COMPRIMIDOS 1 ENTREGA
$qtd2=         $_POST['qtd2'] ?? ''; // QUANTIDADE DE MEDICAMENTOS/COMPRIMIDOS 2 ENTREGA
$nment1 =      $_POST['nment1'] ?? ''; // NOME ENTREGADOR MEDICAMENTOS 1 EMTREGA
$nment2 =      $_POST['nment2'] ?? ''; // NOME ENTREGADOR MEDICAMENTOS 2 EMTREGA
$nmrecep1 =    $_POST['nmrecep1'] ?? ''; // NOME RECEPTOR DE MEDICAMENTOS 1 ENTREGA
$nmrecep2 =    $_POST['nmrecep2'] ?? ''; // NOME RECEPTOR DE MEDICAMENTOS 2 ENTREGA
$obs =         $_POST['obs'] ?? ''; // OBSERVAÇõES SOBRE
$idrua =       $_POST['idrua'] ?? ''; // ID RUA
$datacad =     $_POST['datacadastro'] ?? ''; // DATA CADASTRO

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
$data_s_c = str_replace("/", "-", $dtent);
$data_s = date('Y-m-d', strtotime($data_s_c));

// Monta o caminho de destino com o nome do arquivo
$data_s_c2 = str_replace("/", "-", $dtent2);
$data_s2 = date('Y-m-d', strtotime($data_s_c2));

// Monta o caminho de destino com o nome do arquivo
$datanot_s_c = str_replace("/", "-", $datanot);
$datanot_s = date('Y-m-d', strtotime($datanot_s_c));


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

    if(!empty($acao) && $acao === 'cadastrar') :
        if ($sql_nve->num_rows > 0) :
            header("Location: suvisjt.php?pag=cadastro-esporotricose-animal");
            $_SESSION['msgerrocad'] = "<div class='alert alert-danger text-center' id='msgerrocad' role='alert'><strong>ANIMAL : </strong>$nomeanimal - <strong>TUTOR : </strong>$tutor - <strong>NÃO CADASTRADO - DUPLICIDADE !!!</strong></div>";
        else :

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

            $conectar->query("INSERT INTO esporo_an (nve, ano, origem, data_entrada, pedido, nome_animal, sexo, idade, diagnostico, especie, tutor, id_rua, telefone1, situacao, rua_esp_a, numero, complemento, lat, lng, casos_hum_dom, obs, pin, criado, data_criado)
                                    VALUES ('$nve', '$ano', '$id_origem', '$datanot_s', '$pedido','$nomeanimal', '$id_sexo', '$idade', '$diagnostico', '$id_esp', '$tutor', '$idrua', '$tel1', '$id_sit', '$ruagoogle', '$num', '$comp', '$lat', '$lng', '$casoh', '$obs', '$pin', '$usuariologin', NOW())");
            $id_ea = "SELECT MAX(id_esp) as id_esp FROM esporo_an";
            $id_es_sl = $conectar->query($id_ea);
            $row = $id_es_sl->fetch_assoc();
            $ultimo_id = $row['id_esp'];

            if(!empty($data_s)):
                $conectar->query("INSERT INTO esporo_an_sd_medc (id_an_esp ,data_medc ,id_medc , dsg_medc, qtd_medc ,nm_ent_medc ,nm_rec_medc, criado ,data_criado)
                                    VALUES ('$ultimo_id', '$data_s','$id_med', '$dsg', '$qtd1', '$nment1', '$nmrecep1', '$usuariologin', NOW())");
            endif;
            if(!empty($data_s2)):
                $conectar->query("INSERT INTO esporo_an_sd_medc (id_an_esp ,data_medc ,id_medc , dsg_medc, qtd_medc ,nm_ent_medc ,nm_rec_medc , criado ,data_criado)
                                    VALUES ('$ultimo_id', '$data_s2','$id_med', '$dsg', '$qtd2', '$nment2', '$nmrecep2', '$usuariologin', NOW())");
            endif;

            header("Location: suvisjt.php?pag=cadastro-esporotricose-animal");
            $_SESSION['msgcad'] = "<div class='alert alert-success text-center' id='msgcad' role='alert'><strong>ANIMAL : </strong>$nomeanimal - <strong>TUTOR : </strong>$tutor - <strong>CADASTRADO COM SUCESSO !!!</strong></div>";
        endif;
    endif;

    if($acao === 'cadastro-medicamento') :
        if(!empty($dtent)):
            $conectar->query("INSERT INTO esporo_an_ent_medc (dt_cadastro, nm_esp_medc ,dsg_esp_medc, qtd_esp_medc , criado ,dt_criado)
                                        VALUES ('$data_s', '$id_med', '$dsg', '$qtd1', '$usuariologin', NOW())");
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

