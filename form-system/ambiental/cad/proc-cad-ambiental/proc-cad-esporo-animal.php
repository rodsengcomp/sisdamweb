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

$ruagoogle =   mysqli_real_escape_string($conectar, $_POST["ruagoogle"]); // ID RUA
$nve =         mysqli_real_escape_string($conectar, $_POST["nve"]); // NVE
$ano =         mysqli_real_escape_string($conectar, $_POST["ano"]); // ANO
$datanot =     mysqli_real_escape_string($conectar, $_POST["datanot"]); // NOTIFICAÇÃO
$nomeanimal =  mysqli_real_escape_string($conectar, $_POST["nomeanimal"]); // ANIMAL
$especie =     mysqli_real_escape_string($conectar, $_POST["especie"]); // ESPÉCIE
$tutor =       mysqli_real_escape_string($conectar, $_POST["tutor"]); // TUTOR
$tel1 =        mysqli_real_escape_string($conectar, $_POST["tel1"]); // TEL 1
$tel2 =        mysqli_real_escape_string($conectar, $_POST["tel2"]); // TEL 2
$situacao =    mysqli_real_escape_string($conectar, $_POST["situacao"]); // SITUACAO
$rua =         mysqli_real_escape_string($conectar, $_POST["rua"]); // RUA
$num =         mysqli_real_escape_string($conectar, $_POST["num"]); // N
$comp =        mysqli_real_escape_string($conectar, $_POST["comp"]); // COMP
$lat =         mysqli_real_escape_string($conectar, $_POST["lat"]); // LAT
$lng =         mysqli_real_escape_string($conectar, $_POST["lng"]); // LNG
$cep =         mysqli_real_escape_string($conectar, $_POST["cep"]); // CEP
$bairro =      mysqli_real_escape_string($conectar, $_POST["bairro"]); // BAIRRO
$log =         mysqli_real_escape_string($conectar, $_POST["log"]); // LOG
$da =          mysqli_real_escape_string($conectar, $_POST["da"]); // DA
$setor =       mysqli_real_escape_string($conectar, $_POST["setor"]); // SETOR
$pgguia =      mysqli_real_escape_string($conectar, $_POST["pgguia"]); // PGGUIA
$ubs =         mysqli_real_escape_string($conectar, $_POST["localvd"]); // UBS
$dtent =       mysqli_real_escape_string($conectar, $_POST["dataentrada"]); // ENTREGA
$dtent2 =      mysqli_real_escape_string($conectar, $_POST["dataentrada2"]); // ENTREGA
$med =         mysqli_real_escape_string($conectar, $_POST["medicamento"]); // NOME MEDICAMENTO 1 ENTREGA
$dsg =         mysqli_real_escape_string($conectar, $_POST["dsg"]); // DOSAGEM 1 ENTREGA
$qtd1 =        mysqli_real_escape_string($conectar, $_POST["qtd1"]); // QUANTIDADE DE MEDICAMENTOS/COMPRIMIDOS 1 ENTREGA
$qtd2=         mysqli_real_escape_string($conectar, $_POST["qtd2"]); // QUANTIDADE DE MEDICAMENTOS/COMPRIMIDOS 2 ENTREGA
$nment1 =      mysqli_real_escape_string($conectar, $_POST["nment1"]); // NOME ENTREGADOR MEDICAMENTOS 1 EMTREGA
$nment2 =      mysqli_real_escape_string($conectar, $_POST["nment2"]); // NOME ENTREGADOR MEDICAMENTOS 2 EMTREGA
$nmrecep1 =    mysqli_real_escape_string($conectar, $_POST["nmrecep1"]); // NOME RECEPTOR DE MEDICAMENTOS 1 ENTREGA
$nmrecep2 =    mysqli_real_escape_string($conectar, $_POST["nmrecep2"]); // NOME RECEPTOR DE MEDICAMENTOS 2 ENTREGA
$obs =         mysqli_real_escape_string($conectar, $_POST["obs"]); // OBSERVAÇõES SOBRE
$idrua =       mysqli_real_escape_string($conectar, $_POST["idrua"]); // ID RUA
$datacad =     mysqli_real_escape_string($conectar, $_POST["datacadastro"]); // DATA CADASTRO

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
// Monta o caminho de destino com o nome do arquivo
$data_s2 = date('Y-d-m', strtotime($dtent2));

//Se conectando com o Banco de Dados e tratando possível erro de conexão ...
if ($conexao = $conectar->query($conectar)) die ('<div class="form-group"><a href="javascript:history.back()" <button type=\'button\' class=\'btn btn-danger\' accesskey="V"><span class="glyphicon glyphicon-arrow-left"></span> <u>V</u>OLTAR</button></a><h4><strong><div class="alert alert-danger text-center" role="alert">ERROR : 01 FALHA AO CONECTAR !!! SE PERSISTIR CONTATE: sisdamjt@gmail.com</h4></strong></div>');

# Verificando se tabela já tem id com nve e nome do animal.
$sql_nve = $conectar->query("SELECT id_esp FROM esporotricose_animal WHERE nve='$nve' AND nomeanimal='$nomeanimal' AND especie='$id_esp'");

if ($sql_nve->num_rows > 0) {?>
    <div class="form-group"><div class="alert alert-danger text-center" id="usuarioerro" role="alert">
            <strong><?php echo $especie ?> : <?php echo $nomeanimal ?></strong> - TUTOR : <?php echo $tutor ?> NÃO CADASTRADO : MOTIVO : EM DUPLICIDADE</strong></div></div>

    <?php include_once 'form-cad-esporo-animal.php'; ?>

    <div class="form-group text-center">
        <a href="javascript:history.back()"><button type="button" accesskey="E" class='btn btn-labeled btn-warning'><span class="btn-label"><i class="glyphicon glyphicon-pencil"></i></span><u>E</u>DITAR </button></a>&nbsp;&nbsp;&nbsp;<a href='suvisjt.php?pag=list-memo-oficio'
            <button type='button' style="<?php if ($_SESSION['usuarioNivelAcesso'] <> 1) {
            echo 'display: none;';
        } ?>" accesskey="L" class="btn btn-labeled btn-info"><span class="btn-label"><i class="glyphicon glyphicon-list"></i></span><u>L</u>ISTAR</button></a>&nbsp;&nbsp;&nbsp;
        <a href='suvisjt.php'  <button type='button' style="<?php if ($_SESSION['usuarioNivelAcesso'] <> 1) {
            echo 'display: none;';
        } ?>" accesskey="S" class="btn btn-labeled btn-danger"><span class="btn-label"><i class="glyphicon glyphicon-remove"></i>
            </span><u>S</u>AIR </button></a>
    </div>

<?php } else {
    $conectar->query("INSERT INTO esporotricose_animal (nve, ano, data_entrada, nome_animal, especie, tutor, id_rua, telefone1, telefone2, situacao, rua_esp_a, numero, complemento, lat, lng, obs, criado, data_criado)
                            VALUES ('$nve', '$ano', '$datanot','$nomeanimal', '$id_esp', '$tutor', '$idrua', '$tel1', '$tel2', '$id_sit', '$ruagoogle', '$num', '$comp', '$lat', '$lng', '$obs', '$usuariologin', NOW())");
        $id_ea = "SELECT MAX(id_esp) as id_esp FROM esporotricose_animal";
        $id_es_sl = $conectar->query($id_ea);
        $row = $id_es_sl->fetch_assoc();
        $ultimo_id = $row['id_esp'];

    $conectar->query("INSERT INTO esporo_an_sd_medc (id_an_esp ,data_medc ,id_medc , dsg_medc, qtd_medc ,nm_ent_medc ,nm_rec_medc, criado ,data_criado)
                            VALUES ('$ultimo_id', '$data_s','$id_med', '$dsg', '$qtd1', '$nment1', '$nmrecep1', '$usuariologin', NOW())");

    $conectar->query("INSERT INTO esporo_an_sd_medc (id_an_esp ,data_medc ,id_medc , dsg_medc, qtd_medc ,nm_ent_medc ,nm_rec_medc , criado ,data_criado)
                            VALUES ('$ultimo_id', '$data_s2','$id_med', '$dsg', '$qtd2', '$nment2', '$nmrecep2', '$usuariologin', NOW())");
        ?>
       <?php
    include_once 'form-cad-esporo-animal.php';
}
?>

