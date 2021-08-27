<?php
/* Este projeto é desenvolvido na Suvis Jaçanã-Tremembé com iniciativa dos colaboradores da Unidade -->
<!-- Código desenvolvido por Rodolfo Romaioli Ribeiro de Jesus - rodolfo.romaioli@gmail.com -->
<!-- Sisdam Web - 2.0 - 2017 - Todos os direitos reservados */
error_reporting(0);
include_once("../../locked/seguranca-admin.php");

include_once 'proc-edit-admin/proc-edit-menu.php';

//Captura de ID
$id = $_GET['id'];
$menu_edit = $_GET['editar'];

//Executa consulta

if ($menu_edit == 'ADMIN') {
    $consulta_menu_principal = "SELECT * FROM menu_principal WHERE id='$id'";
    $resultado_menu_principal = $conectar->query($consulta_menu_principal);
    $editar_menu_principal = mysqli_fetch_assoc($resultado_menu_principal);
}else{
    $consulta_menu_principal = "SELECT * FROM menu_principal WHERE id='$id'";
    $resultado_menu_principal = $conectar->query($consulta_menu_principal);
    $editar_menu_principal = mysqli_fetch_assoc($resultado_menu_principal);
}
?>

<div class="container-fluid">

    <!-- begin MAIN PAGE CONTENT -->
    <div id="page-wrapper">

        <div class="page-content">

            <!-- begin PAGE TITLE ROW -->
            <div class="row">
                <div class="col-lg-5">
                    <div class="page-title">
                        <h2>
                            Edição de Menu Principal
                        </h2>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-dashboard"></i> <a href="admin.php">Painel de Controle</a>
                            </li>
                            <li class="active">Edição de Menu Principal</li>
                        </ol>
                        <?php
                        if (isset($_SESSION['msgerro'])) {
                            echo $_SESSION['msgerro'];
                            unset($_SESSION['msgerro']);
                        }
                        ?>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <!-- end PAGE TITLE ROW -->
            <div class="row">
                <div class="col-lg-12">
                    <form class="form-horizontal" id="edicao_menu" method="POST" action="">
                        <div class="form-group">
                            <div class="col-sm-5">
                                <label for="inputNome">Nome do Menu</label>
                                <input type="text" value="<?php echo $editar_menu_principal['nome']; ?>"
                                       data-toggle="tooltip" title="Digite um Nome de Menu" class="form-control"
                                       style="<?php if ($_SESSION['usuarioNivelAcesso'] <> 1) {
                                           echo 'display: none;';
                                       } ?>" name="nome" placeholder="Sv2" autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-5">
                                <input type="hidden" name="id" value="<?php echo $editar_menu_principal['id']; ?>">
                                <button type="submit" name="btnEditMenu" value="Editar" accesskey="G"
                                        style="<?php if ($_SESSION['usuarioNivelAcesso'] <> 1) {
                                            echo 'display: none;';
                                        } ?>" data-toggle="tooltip" title="GRAVAR OS DADOS"
                                        class="btn btn-labeled btn-success"><span class="btn-label"><i
                                                class="glyphicon glyphicon-floppy-disk"></i></span> <u>G</u>RAVAR
                                </button>&nbsp;&nbsp;&nbsp;&nbsp;
                                <a href='././admin.php?pag=list-menu'
                                <button type='button' style="<?php if ($_SESSION['usuarioNivelAcesso'] <> 1) {
                                    echo 'display: none;';
                                } ?>" data-toggle="tooltip" title="LISTAR REGISTROS" accesskey="L"
                                        class="btn btn-labeled btn-info"><span class="btn-label"><i
                                                class="glyphicon glyphicon-list"></i></span> <u>L</u>ISTAR
                                </button>
                                </a>&nbsp;&nbsp;&nbsp;&nbsp;
                                <a href='././admin.php'
                                <button type='button' style="<?php if ($_SESSION['usuarioNivelAcesso'] <> 1) {
                                    echo 'display: none;';
                                } ?>" data-toggle="tooltip" title="SAIR DO FORMULÁRIO" accesskey="S"
                                        class="btn btn-labeled btn-danger"><span class="btn-label"><i
                                                class="glyphicon glyphicon-remove"></i></span> <u>S</u>AIR
                                </button>
                                </a>
                            </div>
                        </div>
                    </form>
                </div> <!-- col-lg-12-->
            </div> <!-- row -->
        </div> <!-- page-content-->
    </div> <!-- page-wrapper-->
</div> <!-- container-fluid-->

