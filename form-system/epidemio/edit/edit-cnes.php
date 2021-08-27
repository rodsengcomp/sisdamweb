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

$consulta_cnes = "SELECT * FROM cnes WHERE id='$id'";
$resultado_cnes = $conectar->query($consulta_cnes);
$editar_cnes = mysqli_fetch_assoc($resultado_cnes);

?>

<div class="container theme-showcase" role="main" xmlns="http://www.w3.org/1999/html">
    <!-- Página de Título -->
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <ol class="breadcrumb">
                    <li><i class="fa fa-database"></i> <a href="suvisjt.php">Sisdam Web</a></li>
                    <li class="active">Editar Cnes</li>
                </ol>
                <button type="button" class="btn btn-warning btn-lg btn-block">EDITAR CNES</button>
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
                <form class="form-horizontal" id="edit-cnes" method="POST" action="suvisjt.php?pag=proc-edit-cnes">

                    <div class="form-group">
                    </div>
                    </br>
                    <div class="form-group">
                        <label for="inputCnes" class="col-sm-3 control-label">CNES</label>
                        <div class="col-sm-2">
                            <input type="text" data-toggle="tooltip" title="O cnes deve ter 7 numeros" id="cnes"
                                   maxlength="7" placeholder="0000000" class="form-control" name="cnes" autofocus
                                   value="<?php echo $editar_cnes['cnes']; ?>">
                        </div>
                    </div>
                    </br>

                    <div class="form-group">
                        <label for="inputEst" class="col-sm-3 control-label">ESTABELECIMENTO</label>
                        <div class="col-sm-6">
                            <input type="text" data-toggle="tooltip" title="Ex: Ama J Joamar" id="estabelecimento"
                                   class="form-control" placeholder="NOME DO ESTABELECIMENTO" name="estabelecimento"
                                   onchange="upperCaseF(this)" value="<?php echo $editar_cnes['estabelecimento']; ?>">
                        </div>
                    </div>
                    </br></br></br>

                    <div class="form-group col-sm-12 text-center">
                        <input type="hidden" name="id" value="<?php echo $editar_cnes['id']; ?>">
                        <button type="submit" accesskey="G" style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                            echo 'display: none;';
                        } ?>" data-toggle="tooltip" title="GRAVAR OS DADOS" class="btn btn-labeled btn-success"><span
                                    class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span> <u>G</u>RAVAR
                        </button>&nbsp;&nbsp;&nbsp;&nbsp;
                        <button type="button" accesskey="A" class='btn btn-labeled btn-danger'
                                style="<?php if ($_SESSION['usuarioNivelAcesso'] <> 1) {
                                    echo 'display: none;';
                                } ?>" data-toggle="modal" data-target="#myModal<?php echo $editar_cnes['id']; ?>"><span
                                    class="btn-label"><i class="glyphicon glyphicon-trash"></i></span> <u>A</u>PAGAR
                        </button>&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href='suvisjt.php?pag=list-cnes'
                        <button type='button' data-toggle="tooltip" title="LISTAR REGISTROS" accesskey="L"
                                class="btn btn-labeled btn-info"><span class="btn-label"><i
                                        class="glyphicon glyphicon-list"></i></span> <u>L</u>ISTAR
                        </button>
                        </a>&nbsp;&nbsp;&nbsp;&nbsp;
                    </div>

                    <!-- Inicio Modal Detalhes-->
                    <div class="modal fade" id="myModal<?php echo $editar_cnes['id']; ?>" tabindex="-1" role="dialog"
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
                                            <h4>Deseja apagar o</h4>
                                            <h4>Cnes : <?php echo $editar_cnes["cnes"] ?> ? </h4>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <div class="text-center">
                                        <a href='suvisjt.php?pag=del-sisdamweb&id=<?php echo $editar_cnes['id']; ?>&cnes=<?php echo $editar_cnes['cnes']; ?>&estabelecimento=<?php echo $editar_cnes['estabelecimento']; ?>&form=cnes'>
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
</div>