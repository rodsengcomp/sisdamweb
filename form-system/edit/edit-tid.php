<!-- Este projeto é desenvolvido na Suvis Jaçanã-Tremembé com iniciativa dos colaboradores da Unidade -->
<!-- Código desenvolvido por Rodolfo Romaioli Ribeiro de Jesus - rodolfo.romaioli@gmail.com -->
<!-- Sisdam Web - 2.0 - 2017 - Todos os direitos reservados -->

<?php
error_reporting(0);
include_once '../../locked/seguranca.php';
include_once '../../conecta.php';
?>

<?php

$id = $_GET['id'];

$consulta_tid = "SELECT * FROM tid WHERE id='$id'";
$resultado_tid = $conectar->query($consulta_tid);
$editar_tid = mysqli_fetch_assoc($resultado_tid);

?>

<div class="container theme-showcase" role="main">
    <!-- Página de Título -->
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <ol class="breadcrumb">
                    <li><i class="fa fa-database"></i> <a href="suvisjt.php">Sisdam Web</a></li>
                    <li class="active">Tid em Aberto <?php echo $today = date("Y"); ?></li>
                </ol>
                <button type="button" class="btn btn-warning btn-labeled btn-lg btn-block"><span class="btn-label"><i
                                class="glyphicon glyphicon-pencil"></i></span>EDITAR TID EM ABERTO <?php echo $today = date("Y"); ?></button>
            </div>
        </div>
    </div>
    <!-- Fim da Página de Título -->

    <div class="form-group text-center">
        <div class="alert alert-danger text-center" style="<?php if ($_SESSION['usuarioLogin'] <> '') {
            echo 'display: none;';
        } ?>" role="alert"><strong>PARA EDITAR É NECESSARIO FAZER O LOGIN!!</strong></div>
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
        <div class="col-md-12" >
            <fieldset <?php if ($_SESSION['usuarioNivelAcesso'] == "") {
                echo 'disabled';
            } ?>>
                <form class="form-horizontal" id="edit-tid" method="POST" action="suvisjt.php?pag=proc-edit-tid">

                        <div class="form-group">
                            <!--readonly para bloquear input-->
                            <label for="inputDataTid" class="col-sm-1 control-label">ENTRADA</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" data-toggle="tooltip"
                                       title="DATA DE ENTRADA DO TID" required name="datatid" id="datatid"
                                       placeholder="00/00/0000" value="<?php echo ($editar_tid['dataentrada']); ?>">
                            </div>

                            <label for="inputNTid" class="col-sm-1 control-label">Nº TID/SIMPROC</label>
                            <div class="col-sm-2">
                                <input type="text" autofocus class="form-control" data-toggle="tooltip"
                                       title="NUMERO DO TID" name="ntid" id="ntid"
                                       placeholder="0000000" value="<?php echo ($editar_tid['ndoc']); ?>">
                            </div>

                            <label for="inputDa" class="col-sm-1 control-label">TIPO</label>
                            <div class="col-sm-5">
                                <input type="text" data-toggle="tooltip" title="Ex: MEMORANDO, OFÍCIO" id="tipotid"
                                       class="form-control tipotid" name="tipotid" placeholder="MEMO,OFICIO" value="<?php echo ($editar_tid['tipo']); ?>">
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="inputNome" class="col-sm-1 control-label">SETOR</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control unientrada" data-toggle="tooltip"
                                       title="EX: AMBIENTAL ..." required name="unientrada"
                                       id="unientrada" placeholder="AMBIENTAL, EPIDEMIO, RH, SANITARIA ..." onchange="upperCaseF(this)" value="<?php echo ($editar_tid['unientrada']); ?>">
                            </div>

                            <label for="inputIdentficacao" class="col-sm-2 control-label">IDENTIFICAÇÃO</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" data-toggle="tooltip"
                                       title="EX: OFICIO Nº 30/2018 PROC 2922/17, ETC ...." required name="identificacaotid"
                                       id="identificacaotid" placeholder="EX: OFICIO Nº 30/2018 PROC 2922/17, ETC ...."
                                       onchange="upperCaseF(this)" value="<?php echo ($editar_tid['identificacao']); ?>">
                            </div>
                            <label for="inputDataTram" class="col-sm-1 control-label">TRAMITAÇÃO</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" data-toggle="tooltip"
                                       title="DATA DA TRAMITAÇÃO" required name="datatram" id="datatram"
                                       placeholder="00/00/0000" value="<?php echo ($editar_tid['datatramitacao']); ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputDestino" class="col-sm-1 control-label">ORG.ORIG</label>;
                            <div class="col-sm-5">
                                <input type="text" class="form-control orgorigem" data-toggle="tooltip"
                                       title="EX: 11 - SGM - SECRETARIA DO GOVERNO MUNICIPAL" required name="orgorigem" id="orgorigem"
                                       placeholder="ÓRGÃO DE ORIGEM DO TID" onchange="upperCaseF(this)" value="<?php echo ($editar_tid['orgorigem']); ?>">
                            </div>

                            <label for="inputDa" class="col-sm-1 control-label">UN.ORIGEM</label>
                            <div class="col-sm-5">
                                <input type="text" data-toggle="tooltip" title="EX: 180105 UVIS SANTANA/TUCURUVI ..." id="uniorigem"
                                       class="form-control uniorigem" name="uniorigem" placeholder="UNIDADE DE ORIGEM DO TID" value="<?php echo ($editar_tid['uniorigem']); ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputDestino" class="col-sm-1 control-label">ASSUNTO</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control assuntotid" data-toggle="tooltip"
                                       title="EX: MEMORANDO, OFÍCIO ..." required name="assuntotid" id="assuntotid"
                                       placeholder="LOCAL / PESSOA" onchange="upperCaseF(this)" value="<?php echo ($editar_tid['assunto']); ?>">
                            </div>

                            <label for="inputDestino" class="col-sm-1 control-label">DESTINO</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control unidestino" data-toggle="tooltip"
                                       title="EX: 182832 UVIS JACANA" required name="unidestino" id="unidestino"
                                       placeholder="UNIDADE DE DESTINO DO TID" onchange="upperCaseF(this)" value="<?php echo ($editar_tid['unidestino']); ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputDescricao" class="col-sm-1 control-label">DESCRIÇÃO</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" data-toggle="tooltip"
                                       title="RETIRADA DE BTI, ENTREGA DE PLANILHA ..." required name="descricaotid"
                                       id="descricaotid" placeholder="DESCREVA O DOCUMENTO: NOME, TIPO, ETC ...."
                                       onchange="upperCaseF(this)" value="<?php echo ($editar_tid['descricao']); ?>">
                            </div>

                            <label for="inputNome" class="col-sm-2 control-label">RESPONSÁVEL</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control nomecad" data-toggle="tooltip"
                                       title="EX: LUCIANA CRISTINE DE AZEVEDO RIBEIRO" required name="resptid"
                                       id="resptid" placeholder="NOME DO TÉCNICO RESPONSÁVEL" onchange="upperCaseF(this)" value="<?php echo ($editar_tid['tecnico_rec']); ?>">
                            </div>
                        </div>
            </fieldset>

                    <div class="form-group text-center">
                        <div class="col-md-12">
                        <input type="hidden" name="id" value="<?php echo $editar_tid['id']; ?>">
                            <button type="submit" accesskey="G" style="<?php if ($_SESSION['usuarioLogin'] == '') {
                                echo 'display: none;';
                            } ?>" data-toggle="tooltip" title="GRAVAR OS DADOS" class="btn btn-labeled btn-success mb-2 mr-sm-4">
                                <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span> <u>G</u>RAVAR
                            </button>
                            <a href='suvisjt.php?pag=list-tid-aberto' role='button' data-toggle="tooltip" title="LISTAR REGISTROS" accesskey="L"
                                    class="btn btn-labeled btn-info mb-2 mr-sm-4"><span class="btn-label"><i class="glyphicon glyphicon-list"></i></span> <u>L</u>ISTAR</a>
                            <a href='suvisjt.php' role='button' data-toggle="tooltip" title="SAIR DO FORMULÁRIO" accesskey="S" class="btn btn-labeled btn-danger mb-2 mr-sm-4">
                                <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span> <u>S</u>AIR</a>
                            <button type="button" class='btn btn-danger mb-2 mr-sm-4' style="<?php if ($_SESSION['usuarioLogin'] <> $editar_tid['usuariocad']) {
                                        echo 'display: none;';
                                    } ?>" data-toggle="modal" data-target="#myModal<?php echo $editar_tid['id']; ?>">
                                <span class="glyphicon glyphicon-trash"></span></button>
                        </div>
                    </div>

                    <!-- Inicio Modal Detalhes-->
                    <div class="modal fade" id="myModal<?php echo $editar_tid['id']; ?>" tabindex="-1" role="dialog"
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
                                                    class="btn btn-danger btn-lg btn-block">TID Nº<?php echo $editar_tid['ndoc'] ?>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                      <!--          <div class="modal-footer">
                                    <div class="text-center">
                                        <a href='suvisjt.php?pag=del-tid&id=<?php echo $editar_tid['id']; ?>&datamemo=<?php echo $editar_tid['datamemo']; ?>&localdestino=<?php echo $editar_tid['localdestino']; ?>&tipodoc=<?php echo $editar_tid['tipodoc']; ?>&descricaomemo=<?php echo $editar_tid['descricaomemo']; ?>&nomememo=<?php echo $editar_tid['nomememo']; ?>'>
                                            <button type="button" class="btn btn-success">SIM</button>
                                        </a>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">NÃO</button>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <!-- Fim Modal Detalhes -->
                </form>
        </div>
    </div>
</div>
