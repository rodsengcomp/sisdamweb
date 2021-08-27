<!-- Este projeto é desenvolvido na Suvis Jaçanã-Tremembé com iniciativa dos colaboradores da Unidade -->
<!-- Código desenvolvido por Rodolfo Romaioli Ribeiro de Jesus - rodolfo.romaioli@gmail.com -->
<!-- Sisdam Web - 2.0 - 2017 - Todos os direitos reservados -->

<?php
include_once 'functions.php';

$result_usuarios = "SELECT leptonet.NU_NOTIFIC, leptonet.NM_PACIENT, leptonet.DT_SIN_PRI, leptonet.DS_OBS, leptonet.ID_DISTRIT, leptonet.NM_LOGRADO,
resultado_ccz_lepto.ENTRADA,resultado_ccz_lepto.PEDIDO,resultado_ccz_lepto.UNIDADE_DE_SAUDE,resultado_ccz_lepto.D_A,resultado_ccz_lepto.SUVIS,resultado_ccz_lepto.SINAN,
resultado_ccz_lepto.PACIENTE,resultado_ccz_lepto.SEXO,resultado_ccz_lepto.NASCIMENTO,resultado_ccz_lepto.Nr_da_Amostra,resultado_ccz_lepto.Sintoma,resultado_ccz_lepto.Coleta,
resultado_ccz_lepto.RES_ELISA,resultado_ccz_lepto.CO,resultado_ccz_lepto.DO,resultado_ccz_lepto.RES_MAT,resultado_ccz_lepto.NOVA_COLETA,
resultado_ccz_lepto.1o_SOROVAR,resultado_ccz_lepto.1o_TIT,resultado_ccz_lepto.2o_SOROVAR,resultado_ccz_lepto.2o_TIT,resultado_ccz_lepto.3o_SOROVAR,resultado_ccz_lepto.3o_TIT,
resultado_ccz_lepto.4o_SOROVAR,resultado_ccz_lepto.4o_TIT,resultado_ccz_lepto.5o_SOROVAR,resultado_ccz_lepto.5o_TIT,resultado_ccz_lepto.6o_SOROVAR,resultado_ccz_lepto.6o_TIT,
resultado_ccz_lepto.7o_SOROVAR,resultado_ccz_lepto.7o_TIT,resultado_ccz_lepto.8o_SOROVAR,resultado_ccz_lepto.8o_TIT,
resultado_ccz_lepto.9o_SOROVAR,resultado_ccz_lepto.9o_TIT,resultado_ccz_lepto.10o_SOROVAR,resultado_ccz_lepto.10o_TIT,resultado_ccz_lepto.11o_SOROVAR,resultado_ccz_lepto.11o_TIT,
resultado_ccz_lepto.12o_SOROVAR,resultado_ccz_lepto.12o_TIT,resultado_ccz_lepto.13_SOROVAR,resultado_ccz_lepto.13_TIT,resultado_ccz_lepto.14o_SOROVAR,resultado_ccz_lepto.14o_TIT,
resultado_ccz_lepto.15o_SOROVAR,resultado_ccz_lepto.15o_TIT,resultado_ccz_lepto.16o_SOROVAR,resultado_ccz_lepto.16o_TIT,resultado_ccz_lepto.17o_SOROVAR,resultado_ccz_lepto.17o_TIT,
resultado_ccz_lepto.18o_SOROVAR,resultado_ccz_lepto.18o_TIT,resultado_ccz_lepto.19o_SOROVAR,resultado_ccz_lepto.19o_TIT,resultado_ccz_lepto.LIBERACAO_EM,resultado_ccz_lepto.OBSERVACAO
FROM leptonet INNER JOIN resultado_ccz_lepto ON leptonet.NU_NOTIFIC = resultado_ccz_lepto.SINAN
WHERE (((leptonet.ID_DISTRIT)=\"70\"))";
$resultado = $conectar->query($result_usuarios);

$result_table_dengue = "SELECT CREATE_TIME FROM information_schema.tables WHERE TABLE_NAME = 'leptonet' ORDER BY `CREATE_TIME` DESC";
$result_dengue = $conectar->query($result_table_dengue);
$row_result_dengue = mysqli_fetch_assoc($result_dengue);

$result_table_ccz_dengue = "SELECT CREATE_TIME FROM information_schema.tables WHERE TABLE_NAME = 'resultado_ccz_lepto_lepto' ORDER BY `CREATE_TIME` DESC";
$result_ccz_dengue = $conectar->query($result_table_ccz_dengue);
$row_result_ccz_dengue = mysqli_fetch_assoc($result_ccz_dengue);
?>

<div class="container-fluid" role="main" xmlns="http://www.w3.org/1999/html">
    <!-- begin PAGE TITLE ROW -->
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <ol class="breadcrumb">
                    <li class="active">At. Lepto - <?php echo date("d/m/Y",strtotime($row_result_dengue['CREATE_TIME'])) ; ?> às
                        <?php echo date("H:i:s",strtotime($row_result_dengue['CREATE_TIME'])) ; ?></li>
                    <li class="active">At. CCZ Lepto - <?php echo date("d/m/Y",strtotime($row_result_ccz_dengue['CREATE_TIME'])) ; ?> às
                        <?php echo date("H:i:s",strtotime($row_result_ccz_dengue['CREATE_TIME'])) ; ?></li>
                </ol>
                <button type="button" class="btn btn-dark btn-labeled btn-lg btn-block"><span class="btn-label"><i
                                class="glyphicon glyphicon-list"></i></span>LISTA - CCZ - LEPTO <?php echo $today = date("Y");   ?></button>
            </div>
        </div>
    </div>
    <!-- /.row -->

    <table id="list-ccz-lepto" class="table table-hover table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th class="text-center">SINAN</th>
            <th class="text-center">ELI</th>
            <th class="text-center">MAT</th>
            <th class="text-center">1°ST</th>
            <th class="text-center">NOME</th>
            <th class="text-center">END</th>
            <th class="text-center">COLETA</th>
            <th class="text-center">RES</th>
            <th class="text-center">ENT</th>
            <th class="text-center">OBS</th>
            <th class="text-center">CO</th>
            <th class="text-center">DO</th>
            <th class="text-center">NOVA COLETA</th>
            <th class="text-center">1o_SOROVAR</th>
            <th class="text-center">1o_TIT</th>
            <th class="text-center">2o_SOROVAR</th>
            <th class="text-center">2o_TIT</th>
            <th class="text-center">3o_SOROVAR</th>
            <th class="text-center">3o_TIT</th>
        </tr>
        </thead>

        <tbody>
        <?php while ($row_usuario = mysqli_fetch_assoc($resultado)){ ?>
            <tr>
                <?php $id = $row_usuario["NU_NOTIFIC"]; ?>
                <td style="font-weight: bold" class="text-center"><?php echo $row_usuario["NU_NOTIFIC"]; ?></td>
                <td class="text-center"><?php $res_elisa = result_elisa($row_usuario["RES_ELISA"]); echo "{$res_elisa}"; ?></td>
                <td class="text-center"><?php $res_mat = result_mat($row_usuario["RES_MAT"]); echo "{$res_mat}"; ?></td>
                <td class="text-center"><?php echo $row_usuario["DT_SIN_PRI"]; ?></td>
                <td><?php echo $row_usuario["NM_PACIENT"]; ?></td>
                <td><?php echo $row_usuario["NM_LOGRADO"]; ?></td>
                <td class="text-center"><?php echo $row_usuario["Coleta"]; ?></td>
                <td class="text-center"><?php if (!is_null($row_usuario['LIBERACAO_EM']))
                    {$data_lib = date("d/m/Y",strtotime($row_usuario['LIBERACAO_EM']));
                        if ($data_lib > 1){echo date("d/m/Y",strtotime($row_usuario['LIBERACAO_EM']));} }?></td>
                <td class="text-center"><?php if (!is_null($row_usuario['ENTRADA']))
                    {$data_ent = date("d/m/Y",strtotime($row_usuario['ENTRADA']));
                        if ($data_ent > 1){echo date("d/m/Y",strtotime($row_usuario['ENTRADA']));} }?></td>
                <td><?php echo $row_usuario["DS_OBS"]; ?></td>
                <td><?php echo $row_usuario["CO"]; ?></td>
                <td><?php echo $row_usuario["DO"]; ?></td>
                <td><?php echo $row_usuario["NOVA_COLETA"]; ?></td>
                <td class="text-center"><?php echo $row_usuario["1o_SOROVAR"]; ?></td>
                <td class="text-center"><?php echo $row_usuario["1o_TIT"]; ?></td>
                <td class="text-center"><?php echo $row_usuario["2o_SOROVAR"]; ?></td>
                <td class="text-center"><?php echo $row_usuario["2o_TIT"]; ?></td>
                <td class="text-center"><?php echo $row_usuario["3o_SOROVAR"]; ?></td>
                <td class="text-center"><?php echo $row_usuario["3o_TIT"]; ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

