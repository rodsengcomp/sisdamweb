<?php
/**
 * Created by Rodolfo Romaioli Ribeiro de Jesus.
 * User: D788796
 * Date: 09/06/2017
 * Time: 08:39
 */
error_reporting(0);
include_once '../../locked/seguranca-admin.php';

$list_menu = $_GET['list'];

if ($list_menu == 'ADMIN') {
    $listar_menu_principal = "SELECT * FROM menu_principal_admin";
    $resultado_menu_principal = $conectar->query($listar_menu_principal);
}elseif ($list_menu == 'SISTEMA') {
    $listar_menu_principal = "SELECT * FROM menu_principal";
    $resultado_menu_principal = $conectar->query($listar_menu_principal);
}else {
    $listar_menu_principal = "SELECT * FROM menu_principal";
    $resultado_menu_principal = $conectar->query($listar_menu_principal);
}
?>

<div class="container-fluid">

    <!-- begin MAIN PAGE CONTENT -->
    <div id="page-wrapper">

        <div class="page-content">

            <!-- begin PAGE TITLE ROW -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header">

                        <ol class="breadcrumb">
                            <li><i class="fa fa-dashboard"></i> <a href="admin.php">Painel de Controle</a>
                            </li>
                            <li class="active">Lista Menu Principal</li>
                        </ol>
                        <button type="button" class="btn btn-default btn-lg btn-block">LISTA MENU PRINCIPAL <?php echo $list_menu ?></button>
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
                    if (isset($_SESSION['msgedit'])) {
                        echo $_SESSION['msgedit'];
                        unset($_SESSION['msgedit']);
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
                        <a href="././admin.php?pag=cad-menu">
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
                            <th class="text-center"><span class="glyphicon glyphicon-pencil"></th>
                            <th class="text-center">NOME</th>
                            <th class="text-center">TIPO</th>
                            <th class="text-center">CRIADO</th>
                            <th class="text-center">DATA</th>
                            <th class="text-center">ALTERADO</th>
                            <th class="text-center">DATA</th>
                            <th class="text-center">???</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php while ($row_menu_principal = mysqli_fetch_assoc($resultado_menu_principal)){ ?>
                        <tr style="<?php if ($_SESSION['usuarioNivelAcesso'] <> 1) {
                            echo 'display: none;';
                        } ?>">
                            <?php $id = $row_menu_principal["id"]; ?>
                            <td class="text-center"><?php echo $row_menu_principal["id"]; ?></td>
                            <td class="text-center">
                                <a href='././admin.php?pag=edit-menu&id=<?php echo $row_menu_principal['id']; ?>'>
                                    <button style="<?php if ($_SESSION['usuarioNivelAcesso'] <> 1) {
                                        echo 'display: none;';
                                    } ?>" type='button' class='btn btn-warning btn-circle'><span
                                                class="glyphicon glyphicon-pencil"></button>
                                </a>
                            </td>
                            <td class="text-center"><?php echo $row_menu_principal["nome"]; ?></td>
                            <td class="text-center"><?php echo $row_menu_principal["tipomenu"]; ?></td>
                            <td class="text-center"><?php echo $row_menu_principal["usuariocad"]; ?></td>
                            <td class="text-center"><?php echo dateConvert($row_menu_principal["criado"]); ?></td>
                            <td class="text-center"><?php echo $row_menu_principal["usuarioalt"]; ?></td>
                            <td class="text-center"><?php echo dateConvert($row_menu_principal["alterado"]); ?></td>
                            <td class="text-center">
                                <button type="button" class='btn btn-danger btn-circle' data-toggle="modal"
                                        data-target="#myModal<?php echo $row_menu_principal['id']; ?>"><span
                                            class="glyphicon glyphicon-trash"></span></button>
                            </td>
                        </tr>
                        <!-- Inicio Modal Detalhes-->

                        <div class="modal fade" id="myModal<?php echo $row_menu_principal['id']; ?>" tabindex="-1"
                             role="dialog" aria-labelledby="myLargeModalLabel">
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
                                                <h4>Deseja apagar o menu</h4>
                                                <h4><?php echo $row_menu_principal["nome"] ?> ? </h4>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <div class="text-center">
                                            <a href='admin.php?pag=del-menu&id=<?php echo $row_menu_principal['id']; ?>&nome=<?php echo $row_menu_principal['nome']; ?>'>
                                                <button name="btnDeletePagAdmin" type="button"
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
