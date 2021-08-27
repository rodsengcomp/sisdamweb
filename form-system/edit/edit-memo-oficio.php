<!-- Este projeto é desenvolvido na Suvis Jaçanã-Tremembé com iniciativa dos colaboradores da Unidade -->
<!-- Código desenvolvido por Rodolfo Romaioli Ribeiro de Jesus - rodolfo.romaioli@gmail.com -->
<!-- Sisdam Web - 2.0 - 2017 - Todos os direitos reservados -->

<style type="text/css">
    @media print {
        #noprint { display:none; }
        body { background: #fff; }
    }
</style>

<?php
error_reporting(0);
include_once '../../locked/seguranca.php';
include_once '../../conecta.php';
?>

<?php

$id = $_GET['id'];

$consulta_memo = "SELECT * FROM memo WHERE id='$id'";
$resultado_memo = $conectar->query($consulta_memo);
$editar_memo = mysqli_fetch_assoc($resultado_memo);

?>

<div class="container theme-showcase" role="main">
    <!-- Página de Título -->
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <ol class="breadcrumb">
                    <li><i class="fa fa-database"></i> <a href="suvisjt.php">Sisdam Web</a></li>
                    <li class="active">Editar Memorandos/Ofícios <?php echo $today = date("Y");   ?></li>
                </ol>
                <button type="button" class="btn btn-labeled btn-warning btn-lg btn-block"><span class="btn-label"><i
                                class="glyphicon glyphicon-pencil"></i></span>EDITAR MEMORANDOS E OFÍCIOS <?php echo $today = date("Y");   ?></button>
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

    <div class="form-group text-center" style="<?php if ($_SESSION['usuarioNivelAcesso']<> "") {
        echo 'display: none;';
    } ?>">
        <div class="alert alert-danger text-center" id="usuariook" role="alert"><strong>VOCÊ DEVE ESTAR LOGADO PARA
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
            <fieldset <?php if ($_SESSION['usuarioNivelAcesso'] == "") {
                echo 'disabled';
            } ?>>
                <form class="form-horizontal" id="edit-memo" method="POST"
                      action="suvisjt.php?pag=proc-edit-memo-oficio">

                    <div class="form-group">
                        <label for="inputNumero" class="col-sm-3 control-label">Nº</label>
                        <div class="col-sm-2">
                            <input type="text" readonly data-toggle="tooltip" title="NÚMERO DE <?php echo utf8_encode($editar_memo['tipodoc']); ?>"
                                   class="form-control text-center"
                                   value="<?php echo utf8_encode($editar_memo['id']); ?>">
                        </div>

                        <label for="inputDataMemo" class="col-sm-2 control-label">DATA</label>
                        <div class="col-sm-2">
                            <input type="text" readonly class="form-control" data-toggle="tooltip"
                                   title="DATA DO <?php echo utf8_encode($editar_memo['tipodoc']); ?>" name="datamemo" id="datamemocad"
                                   placeholder="00/00/0000" value="<?php echo $editar_memo['datamemo']; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputDa" class="col-sm-3 control-label">TIPO</label>
                        <div class="col-sm-6">
                            <input type="text" autofocus data-toggle="tooltip" title="Ex: MEMORANDO, OFICIO" id="tipo"
                                   class="form-control tipo" name="tipo" onchange="upperCaseF(this)" placeholder="MEMO,OFÍCIO"
                                   value="<?php echo utf8_encode($editar_memo['tipodoc']); ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputDestino" class="col-sm-3 control-label">DESTINO</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" data-toggle="tooltip"
                                   title="Ex: CCZ, CRSN, UBS ..." name="localdestino"
                                   placeholder="LOCAL / PESSOA" onchange="upperCaseF(this)"
                                   value="<?php echo utf8_encode($editar_memo['localdestino']); ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputDescricao" class="col-sm-3 control-label">DESCRIÇÃO</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" data-toggle="tooltip"
                                   name="descricaomemo" id="descricaocad" placeholder="NOME, TIPO, ETC ...."
                                   onchange="upperCaseF(this)"
                                   value="<?php echo utf8_encode($editar_memo['descricaomemo']); ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputNome" class="col-sm-3 control-label">SOLICITANTE</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control nomecad" data-toggle="tooltip"
                                   title="Ex: RODOLFO ROMAIOLI RIBEIRO DE JESUS..." name="nomememo" id="nomecad"
                                   placeholder="DESCREVA O DOCUMENTO: NOME, TIPO, ETC ...." onchange="upperCaseF(this)"
                                   value="<?php echo utf8_encode($editar_memo['nomememo']); ?>">
                        </div>
                    </div>

                    </fieldset>
                    <div id="noprint" class="form-group text-center">
                        <div class="col-md-12">
                        <input type="hidden" name="id" value="<?php echo $editar_memo['id']; ?>">

                            <button type="submit" accesskey="G" style="<?php if ($_SESSION['usuarioNivelAcesso'] == "") {
                                echo 'display: none;';
                            } ?>" data-toggle="tooltip" title="GRAVAR OS DADOS" class="btn btn-labeled btn-success btn-primary mb-2 mr-sm-4">
                                <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span> <u>G</u>RAVAR
                            </button>
                            <a href='suvisjt.php?pag=list-memo-oficio' role='button' data-toggle="tooltip" title="LISTAR REGISTROS" accesskey="L"
                                    class="btn btn-labeled btn-info btn-primary mb-2 mr-sm-4"><span class="btn-label"><i
                                            class="glyphicon glyphicon-list"></i></span> <u>L</u>ISTAR</a>
                            <a href='suvisjt.php' role='button' data-toggle="tooltip" title="SAIR DO FORMULÁRIO" accesskey="S"
                                    class="btn btn-labeled btn-danger btn-primary mb-2 mr-sm-4"><span class="btn-label"><i
                                            class="glyphicon glyphicon-remove"></i></span></i></span> <u>S</u>AIR</a>
                            <button type="button" class='btn btn-danger btn-primary mb-2 mr-sm-4'
                                    style="<?php if ($_SESSION['usuarioNivelAcesso'] <> 1) {
                                        echo 'display: none;';
                                    } ?>" data-toggle="modal" data-target="#myModal<?php echo $editar_memo['id']; ?>">
                                <span class="glyphicon glyphicon-trash"></span></button>
                        </div>
                    </div>

                    <!-- Inicio Modal Detalhes-->
                    <div class="modal fade" id="myModal<?php echo $editar_memo['id']; ?>" tabindex="-1" role="dialog"
                         aria-labelledby="myLargeModalLabel">
                        <div class="modal-dialog modal-sm" role="document">
                            <div class="modal-content">
                                <div class="modal-header-del">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                                aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title text-center" id="myModalLabel">SisdamJT Web</h4>
                                </div>

                                <div class="modal-body">
                                    <div class="row">
                                        <div class="text-center">
                                            <h4>Deseja apagar o :</h4>
                                            <button type="button"
                                                    class="btn btn-danger btn-lg btn-block"><?php echo $editar_memo['tipodoc'] ?>
                                                : Nº <?php echo $editar_memo['id'] ?></button>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <div class="text-center">
                                        <a href='suvisjt.php?pag=del-memo-oficio&id=<?php echo $editar_memo['id']; ?>&datamemo=<?php echo $editar_memo['datamemo']; ?>&localdestino=<?php echo $editar_memo['localdestino']; ?>&tipodoc=<?php echo $editar_memo['tipodoc']; ?>&descricaomemo=<?php echo $editar_memo['descricaomemo']; ?>&nomememo=<?php echo $editar_memo['nomememo']; ?>'>
                                            <button type="button" class="btn btn-success">SIM</button>
                                        </a>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">NÃO</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Fim Modal Detalhes -->

                </form>
        </div>
    </div>
