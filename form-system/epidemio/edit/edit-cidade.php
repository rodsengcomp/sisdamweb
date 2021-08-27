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

$consulta_cidade = "SELECT * FROM cidade WHERE id='$id'";
$resultado_cidade = $conectar->query($consulta_cidade);
$editar_cidade = mysqli_fetch_assoc($resultado_cidade);

?>

<div class="container theme-showcase" role="main" xmlns="http://www.w3.org/1999/html">
    <!-- Página de Título -->
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <ol class="breadcrumb">
                    <li><i class="fa fa-database"></i> <a href="suvisjt.php">Sisdam Web</a></li>
                    <li class="active">Editar Cidade</li>
                </ol>
                <button type="button" class="btn btn-warning btn-lg btn-block">EDITAR CIDADES</button>
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
                <form class="form-horizontal" id="edit-cidade" method="POST" action="suvisjt.php?pag=proc-edit-cidade">
                    <div class="form-group">
                    </div>
                    </br>

                    <div class="form-group">
                        <label for="inputCodigo" class="col-sm-2 control-label">CODIGO</label>
                        <div class="col-sm-2">
                            <input type="text" data-toggle="tooltip" title="O código deve ter 6 numeros" id="codigo"
                                   maxlength="6" placeholder="000000" class="form-control" name="codigo" autofocus
                                   value="<?php echo utf8_encode($editar_cidade['cod_cidade']); ?>">
                        </div>
                        <label for="inputLat" class="col-sm-1 control-label">LAT</label>
                        <div class="col-sm-2">
                            <input type="text" data-toggle="tooltip" title="1234567890 , e -" id="latitude"
                                   maxlength="14" placeholder="-19,15215496" class="form-control" name="latitude"
                                   value="<?php echo utf8_encode($editar_cidade['latitude']); ?>">
                        </div>
                        <label for="inputLong" class="col-sm-1 control-label">LONG</label>
                        <div class="col-sm-2">
                            <input type="text" data-toggle="tooltip" title="1234567890 , e -" id="longitude"
                                   maxlength="14" placeholder="-45,45573879" class="form-control" name="longitude"
                                   value="<?php echo utf8_encode($editar_cidade['longitude']); ?>">
                        </div>
                    </div>
                    </br>

                    <div class="form-group">
                        <label for="inputCidade" class="col-sm-2 control-label">CIDADE</label>
                        <div class="col-sm-8">
                            <input type="text" data-toggle="tooltip" title="Ex: Sao Paulo" id="cidade"
                                   class="form-control" placeholder="NOME DA CIDADE" name="cidade"
                                   onchange="upperCaseF(this)"
                                   value="<?php echo utf8_encode($editar_cidade['cidade']); ?>">
                        </div>
                    </div>
                    </br></br></br>

                    <div class="form-group col-sm-12 text-center">
                        <input type="hidden" name="id" value="<?php echo $editar_cidade['id']; ?>">
                        <button type="submit" accesskey="G" style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                            echo 'display: none;';
                        } ?>" data-toggle="tooltip" title="GRAVAR OS DADOS" class="btn btn-labeled btn-success"><span
                                    class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span> <u>G</u>RAVAR
                        </button>&nbsp;&nbsp;&nbsp;&nbsp;
                        <button type="button" accesskey="A" class='btn btn-labeled btn-danger'
                                style="<?php if ($_SESSION['usuarioNivelAcesso'] <> 1) {
                                    echo 'display: none;';
                                } ?>" data-toggle="modal" data-target="#myModal<?php echo $editar_cidade['id']; ?>">
                            <span class="btn-label"><i class="glyphicon glyphicon-trash"></i></span> <u>A</u>PAGAR
                        </button>&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href='suvisjt.php?pag=list-cidade'
                        <button type='button' data-toggle="tooltip" title="LISTAR REGISTROS" accesskey="L"
                                class="btn btn-labeled btn-info"><span class="btn-label"><i
                                        class="glyphicon glyphicon-list"></i></span> <u>L</u>ISTAR
                        </button>
                        </a>
                    </div>

                    <!-- Inicio Modal Detalhes-->
                    <div class="modal fade" id="myModal<?php echo $editar_cidade['id']; ?>" tabindex="-1" role="dialog"
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
                                            <h4>Deseja apagar a Cidade :</h4>
                                            <h4><?php echo $editar_cidade["cidade"] ?> ? </h4>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <div class="text-center">
                                        <a href='suvisjt.php?pag=del-sisdamweb&id=<?php echo $editar_cidade['id']; ?>&cod_cidade=<?php echo $editar_cidade['cod_cidade']; ?>&cidade=<?php echo $editar_cidade['cidade']; ?>&form=cidade'>
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