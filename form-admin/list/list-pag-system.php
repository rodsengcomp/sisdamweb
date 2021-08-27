<?php
/**
 * Created by Rodolfo Romaioli Ribeiro de Jesus.
 * User: D788796
 * Date: 09/06/2017
 * Time: 08:39
 */
error_reporting(0);
include_once '../../locked/seguranca-admin.php';
include_once '../../conecta.php';

$listar_pag = "SELECT * FROM pag_system";
$resultado = $conectar->query($listar_pag);
?>

<div class="container-fluid">

    <!-- begin MAIN PAGE CONTENT -->
    <div id="page-wrapper">

        <div class="page-content">

            <!-- begin PAGE TITLE ROW -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-title">
                        <h2>
                            Listar Páginas do Formulário
                        </h2>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-dashboard"></i> <a href="admin.php">Painel de Controle</a>
                            </li>
                            <li class="active">Listar Páginas do Formulário</li>
                        </ol>
                    </div>
                    <?php
                    if (isset($_SESSION['msgdelerro'])) {
                        echo $_SESSION['msgdelerro'];
                        unset($_SESSION['msgdelerro']);
                    }
                    if (isset($_SESSION['msgdel'])) {
                        echo $_SESSION['msgdel'];
                        unset($_SESSION['msgdel']);
                    }
                    ?>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <!-- end PAGE TITLE ROW -->

            <div class="row">
                <div class="col-lg-12">

                    <div class="text-center">
                        <a href="././admin.php?pag=cad-pag-system">
                            <button type='button' style="<?php if ($_SESSION['usuarioNivelAcesso'] <> 1) {
                                echo 'display: none;';
                            } ?>" accesskey="N" data-toggle="tooltip" title="NOVO" class="btn btn-labeled btn-success">
                                <span class="btn-label"><i class="glyphicon glyphicon-plus-sign"></i></span><u> N</u>OVO
                            </button>
                        </a>
                    </div>

                    <table id="Listar_Sisdam" class="table table-hover table-striped table-bordered" cellspacing="0"
                           width="100%">
                        <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">EDITAR</th>
                            <th class="text-center">PAG =</th>
                            <th class="text-center">CAMINHO</th>
                            <th class="text-center">LOGIN</th>
                            <th class="text-center">CRIADO</th>
                            <th class="text-center">LOGIN</th>
                            <th class="text-center">ALTERADO</th>
                            <th class="text-center">???</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php while ($row_pag = mysqli_fetch_assoc($resultado)){ ?>
                        <tr style="<?php if ($_SESSION['usuarioNivelAcesso'] <> 1) {
                            echo 'display: none;';
                        } ?>">
                            <?php $id = $row_pag["id"]; ?>
                            <td class="text-center"><?php echo $row_pag["id"]; ?></td>
                            <td class="text-center">
                                <a href='././admin.php?pag=edit-pag-system&id=<?php echo $row_pag['id']; ?>'>
                                    <button style="<?php if ($_SESSION['usuarioNivelAcesso'] <> 1) {
                                        echo 'display: none;';
                                    } ?>" type='button' class='btn btn-warning btn-circle'><span
                                                class="glyphicon glyphicon-pencil"></button>
                                </a>
                            </td>
                            <td class="text-center"><?php echo $row_pag["name_pag"]; ?></td>
                            <td class="text-center"><?php echo $row_pag["caminho"]; ?></td>
                            <td class="text-center"><?php echo $row_pag["usuariocad"]; ?></td>
                            <td class="text-center"><?php echo dateConvert($row_pag["criado"]); ?></td>
                            <td class="text-center"><?php echo $row_pag["usuarioalt"]; ?></td>
                            <td class="text-center"><?php echo dateConvert($row_pag["alterado"]); ?></td>
                            <td class="text-center">
                                <button type="button" class='btn btn-danger btn-circle' data-toggle="modal"
                                        data-target="#myModal<?php echo $row_pag['id']; ?>"><span
                                            class="glyphicon glyphicon-trash"></span></button>
                            </td>
                        </tr>
                        <!-- Inicio Modal Detalhes-->

                        <div class="modal fade" id="myModal<?php echo $row_pag['id']; ?>" tabindex="-1" role="dialog"
                             aria-labelledby="myLargeModalLabel">
                            <div class="modal-dialog modal-sm" role="document">
                                <div class="modal-content">
                                    <div class="modal-header-del">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title text-center" id="myModalLabel">SisdamJT Web</h4>
                                    </div>

                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="text-center">
                                                <h4>Deseja apagar a página</h4>
                                                <h4><?php echo $row_pag["name_pag"] ?> ? </h4>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <div class="text-center">
                                            <a href='admin.php?pag=del-pag-system&id=<?php echo $row_pag['id']; ?>&name_pag=<?php echo $row_pag['name_pag']; ?>&caminho=<?php echo $row_pag['caminho']; ?>'>
                                                <button name="btnDeleteLinkForm" type="button"
                                                        class="btn btn-success btn-circle">SIM
                                                </button>
                                            </a>&nbsp;&nbsp;&nbsp;&nbsp;
                                            <button type="button" class="btn btn-danger btn-circle"
                                                    data-dismiss="modal">NÃO
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <!-- Fim Modal Detalhes -->
                <?php } ?>
                <br><br><br>
                </tbody>
                </table>
            </div> <!-- col-lg-12-->
        </div> <!-- row -->
    </div> <!-- page-content-->
</div> <!-- page-wrapper-->
</div> <!-- container-fluid-->
