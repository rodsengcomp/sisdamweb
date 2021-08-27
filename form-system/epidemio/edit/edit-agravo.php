<?php
/**
 * Created by Rodolfo Romaioli Ribeiro de Jesus.
 * User: D788796
 * Date: 09/06/2017
 * Time: 08:39
 */
error_reporting(0);
include_once '../../locked/seguranca.php';
include_once '../../conecta.php';

$id = $_GET['id'];

$consulta_agravo = "SELECT * FROM agravo WHERE id='$id'";
$resultado_agravo = $conectar->query($consulta_agravo);
$editar_agravo = mysqli_fetch_assoc($resultado_agravo);

?>

<div class="container theme-showcase" role="main" xmlns="http://www.w3.org/1999/html">
    <!-- Página de Título -->
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <ol class="breadcrumb">
                    <li><i class="fa fa-database"></i> <a href="suvisjt.php">Sisdam Web</a></li>
                    <li class="active">Editar Agravo</li>
                </ol>
                <button type="button" class="btn btn-warning btn-lg btn-block">EDITAR AGRAVO</button>
            </div>
        </div>
    </div>
    <!-- Fim da Página de Título -->

    <div class="form-group text-center" style="<?php if ($_SESSION['usuarioNivelAcesso'] < 3) {
        echo 'display: none;';
    } ?>">
        <div class="alert alert-danger text-center" id="usuariook" role="alert"><strong>SEU NÍVEL DE USUÁRIO NÃO PERMITE
                EDITAR !!!</strong></div>
    </div>

    <div class="form-group text-center">
        <?php
        if (isset($_SESSION['msgerroredit'])) {
            echo $_SESSION['msgerroredit'];
            unset($_SESSION['msgerroredit']);
        }
        ?>
    </div>

    <div class="row">
        <div class="col-md-12">
            <fieldset <?php if ($_SESSION['usuarioNivelAcesso'] > 2) {
                echo 'disabled';
            } ?>>
                <form class="form-horizontal" id="edit-agravo" method="POST" action="suvisjt.php?pag=proc-edit-agravo">

                    <div class="form-group">
                        <label for="inputCid" class="col-sm-3 control-label">CID-10</label>
                        <div class="col-sm-2">
                            <input type="text" id="cid" class="form-control" name="cid" autofocus
                                   value="<?php echo $editar_agravo['cid']; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputTipoDoenca" class="col-sm-3 control-label">TIPO</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control tipoagravo" data-toggle="tooltip" id="tipoagravo"
                                   title="Ex: Dengue , Tuberculose ..." name="tipoagravo"
                                   style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                                       echo 'display: none;';
                                   } ?>" placeholder="TIPO DO AGRAVO" onchange="upperCaseF(this)"
                                   value="<?php echo $editar_agravo['tipo']; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEst" class="col-sm-3 control-label">AGRAVO</label>
                        <div class="col-sm-5">
                            <input type="text" data-toggle="tooltip" title="Ex: TUBERCULOSE" id="agravo"
                                   class="form-control" placeholder="NOME DO AGRAVO" name="agravo"
                                   onchange="upperCaseF(this)"
                                   value="<?php echo utf8_encode($editar_agravo['agravo']); ?>">
                        </div>
                    </div>
                    </br></br>

                    <div class="form-group col-sm-12 text-center">
                        <input type="hidden" name="id" value="<?php echo $editar_agravo['id']; ?>">
                        <button type="submit" accesskey="G" style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                            echo 'display: none;';
                        } ?>" data-toggle="tooltip" title="GRAVAR OS DADOS" class="btn btn-labeled btn-success"><span
                                    class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span> <u>G</u>RAVAR
                        </button>&nbsp;&nbsp;&nbsp;&nbsp;
                        <button type="button" accesskey="A" class='btn btn-labeled btn-danger'
                                style="<?php if ($_SESSION['usuarioNivelAcesso'] <> 1) {
                                    echo 'display: none;';
                                } ?>" data-toggle="modal" data-target="#myModal<?php echo $editar_agravo['id']; ?>">
                            <span class="btn-label"><i class="glyphicon glyphicon-trash"></i></span> <u>A</u>PAGAR
                        </button>&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href='suvisjt.php?pag=list-agravo'
                        <button type='button' data-toggle="tooltip" title="LISTAR REGISTROS" accesskey="L"
                                class="btn btn-labeled btn-info"><span class="btn-label"><i
                                        class="glyphicon glyphicon-list"></i></span> <u>L</u>ISTAR
                        </button>
                        </a>
                    </div>

                    <!-- Inicio Modal Detalhes-->
                    <div class="modal fade" id="myModal<?php echo $editar_agravo['id']; ?>" tabindex="-1" role="dialog"
                         aria-labelledby="myLargeModalLabel">
                        <div class="modal-dialog modal-sm" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                                aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title text-center" id="myModalLabel">SisdamJT Web</h4>
                                </div>

                                <div class="modal-body">
                                    <div class="row">
                                        <div class="text-center">
                                            <h4>Deseja apagar o Agravo :</h4>
                                            <h4><?php echo $editar_agravo["agravo"] ?> ? </h4>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <div class="text-center">
                                        <a href='suvisjt.php?pag=del-sisdamweb&id=<?php echo $editar_agravo['id']; ?>&cid=<?php echo $editar_agravo['cid']; ?>&tipo=<?php echo $editar_agravo['tipo']; ?>&agravo=<?php echo $editar_agravo['agravo']; ?>&form=agravo'>
                                            <button type="button" class="btn btn-success btn-circle">SIM</button>
                                        </a>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <button type="button" class="btn btn-danger btn-circle" data-dismiss="modal">
                                            NÃO
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Fim Modal Detalhes -->

                </form>
            </fieldset>
        </div>
    </div>
</div> <!-- /container -->
