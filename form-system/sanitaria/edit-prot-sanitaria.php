<!-- Este projeto é desenvolvido na Suvis Jaçanã-Tremembé com iniciativa dos colaboradores da Unidade -->
<!-- Código desenvolvido por Rodolfo Romaioli Ribeiro de Jesus - rodolfo.romaioli@gmail.com -->
<!-- Sisdam Web - 2.0 - 2017 - Todos os direitos reservados -->

<?php
error_reporting(0);

$id = $_GET['id'];

$consulta_doc_sanitaria = "SELECT * FROM adm_sanitaria WHERE id='$id'";
$resultado_doc_sanitaria = $conectar->query($consulta_doc_sanitaria);
$editar_doc_sanitaria = mysqli_fetch_assoc($resultado_doc_sanitaria);

?>

<div class="container theme-showcase" role="main" xmlns="http://www.w3.org/1999/html">
    <!-- Página de Título -->
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <ol class="breadcrumb">
                    <li><i class="fa fa-database"></i> <a href="suvisjt.php">Sisdam Web</a></li>
                    <li class="active">Editar Documento <?php echo $today = date("Y");   ?> </li>
                </ol>
                <button type="button" class="btn btn-success btn-lg btn-block">EDIÇÃO SANITÁRIA- <?php echo $today = date("Y");   ?> </button>
            </div>
        </div>
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
    if (isset($_SESSION['msgerro'])) {
        echo $_SESSION['msgerro'];
        unset($_SESSION['msgerro']);
    }
    if (isset($_SESSION['msgedit'])) {
        echo $_SESSION['msgedit'];
        unset($_SESSION['msgedit']);
    }
    ?>
    <!-- Fim da Página de Título -->

    <div class="form-group text-center">
        <div class="alert alert-danger text-center" style="<?php if ($_SESSION['usuarioNivelAcesso'] < 4) {
            echo 'display: none;';
        } ?>" role="alert"><strong>SEU NÍVEL DE USUÁRIO NÃO PERMITE EDITAR !!!</strong></div>
    </div>

    <div class="form-group text-center">
        <div class="alert alert-danger text-center" style="<?php if ($_SESSION['usuarioNivelAcesso'] <> "") {
            echo 'display:none';
        } ?>" role="alert"><strong>PARA EDITAR É NECESSARIO FAZER O LOGIN!!!</strong></div>
    </div>

    <div class="row">
        <div class="col-md-12">
                <fieldset <?php if ($_SESSION['usuarioNivelAcesso'] == "") {
                    echo 'disabled';
                } ?>>
                <form class="form-horizontal" id="cad_adm_sanitaria" method="POST" action="suvisjt.php?pag=proc-prot-sanitaria">

                <div class="form-group">
                    <label for="inputSinan" class="col-sm-1 control-label">Nº DOC</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" data-toggle="tooltip" title="Digite o Nº do Documento" maxlength="20" name="ndoc"
                               placeholder="0000-0.000.000-1" autofocus value="<?php echo $editar_doc_sanitaria['num_documento']; ?>">
                    </div>

                    <label class="col-sm-1 control-label">ENTRADA</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" data-toggle="tooltip"
                               title="Não pode ser maior que hoje" name="datent" id="datasancad"
                               placeholder="00/00/0000" value="<?php echo date('d/m/Y', strtotime($editar_doc_sanitaria['data_entrada'])); ?>">
                    </div>

                    <label for="inputNome" class="col-sm-1 control-label">NOME/RAZÃO</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" data-toggle="tooltip" title="Ex: João da Silva ou Supermercado Rods LTDA..."
                               name="nome" placeholder="JULIOS BAR" onchange="upperCaseF(this)" value="<?php echo $editar_doc_sanitaria['nome_razao_social']; ?>">
                    </div>

              </div>

                <div class="form-group">
                    <label class="col-sm-1 control-label">ATIVIDADE</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" data-toggle="tooltip"
                           title="Digite a atividade" maxlength="50" name="atividade" placeholder="ACADEMIA, ILPI, PADARIA..."
                               onchange="upperCaseF(this)" value="<?php echo $editar_doc_sanitaria['atividade']; ?>">
                    </div>

                    <label for="inputDa" class="col-sm-1 control-label">TIPO</label>
                    <div class="col-sm-3">
                        <input type="text" data-toggle="tooltip" title="Ex: MEMORANDO, OFÍCIO" id="tipotid"
                               class="form-control tipotid" name="tipo" placeholder="MEMO,OFICIO" onchange="upperCaseF(this)" value="<?php echo $editar_doc_sanitaria['tipo']; ?>">
                    </div>

                    <label class="col-sm-2 control-label">PRAZO/RETORNO</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" data-toggle="tooltip" id="dataprazocad" title="Maior que Data de Entrada" name="datprazo"
                               placeholder="00/00/0000" value="<?php echo date('d/m/Y', strtotime($editar_doc_sanitaria['prazo'])); ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputDa" class="col-sm-1 control-label">ÓRGÃO</label>
                    <div class="col-sm-5">
                        <input type="text" data-toggle="tooltip" title="EX: 180105 UVIS SANTANA/TUCURUVI ..." id="uniorigem"
                           class="form-control uniorigem" name="orgao" placeholder="MINISTÉRIO PUBLICO, SECRETARIA DA SAÚDE..."
                               onchange="upperCaseF(this)" value="<?php echo $editar_doc_sanitaria['orgao']; ?>">
                    </div>

                    <label for="inputNome" class="col-sm-1 control-label">TÉCNICO</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control nomecad" data-toggle="tooltip" data-placement="top"
                               title="EX: WALLACE RAUL MARTINS" name="tecnico"
                               id="nomecad" placeholder="NOME DO SOLICITANTE" onchange="upperCaseF(this)" value="<?php echo $editar_doc_sanitaria['tecnico']; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-1 control-label">INSP. SIVISA</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" data-toggle="tooltip"
                               title="Maior que Data de Entrada" name="inspsivisa" id="inspsivisa"
                               placeholder="000/<?php echo date('y')?>" value="<?php echo $editar_doc_sanitaria['inspsivisa']; ?>">
                    </div>

                    <label class="col-sm-1 control-label">ULT. MOV.</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" data-toggle="tooltip"
                               title="Maior que Data de Entrada" name="datultmov" id="dataultmovcad"
                               placeholder="00/00/0000" value="<?php echo date('d/m/Y', strtotime($editar_doc_sanitaria['data_ult_mov_proc'])); ?>">
                    </div>

                    <label class="col-sm-1 control-label">ARQUIVO</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" data-toggle="tooltip"
                               title="Maior que Data de Entrada" name="datarq" id="dataarqcad"
                               placeholder="00/00/0000" value="<?php echo date('d/m/Y', strtotime($editar_doc_sanitaria['data_arquivo'])); ?>">
                    </div>

                    <label class="col-sm-1 control-label">SAIDA</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" data-toggle="tooltip"
                               title="Maior que Data de Entrada" name="datsai" id="datasaidacad"
                               placeholder="00/00/0000" value="<?php echo  date('d/m/Y', strtotime($editar_doc_sanitaria['saida'])); ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputDescricao" class="col-sm-1 control-label">OBSERVAÇÃO</label>
                    <div class="col-sm-11">
                    <textarea class="form-control" rows="2" data-toggle="tooltip" data-placement="top" title="RETIRADA DE BTI, ENTREGA DE PLANILHA ..."
                              name="observacao" placeholder="DESCREVA A OBSERVAÇÃO" onchange="upperCaseF(this)"><?php echo $editar_doc_sanitaria['observacao']; ?></textarea>
                    </div>
                </div>

                    <div class="form-group text-center">
                        <div class="col-sm-12">
                        <input type="hidden" name="id" value="<?php echo $editar_doc_sanitaria['id']; ?>">
                        <button type="submit" style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                            echo 'display: none;';
                        } ?>" accesskey="G" data-toggle="tooltip" title="GRAVAR OS DADOS"
                                class="btn btn-labeled btn-success mb-2 mr-sm-4"><span class="btn-label"><i
                                        class="fa fa-floppy-o"></i></span> <u>G</u>RAVAR&nbsp;
                        </button>

                        <a href='suvisjt.php?pag=list-adm-sanitaria' role='button' data-toggle="tooltip" title="LISTAR REGISTROS" accesskey="L"
                                class="btn btn-labeled btn-info mb-2 mr-sm-4"><span class="btn-label"><i
                                        class="glyphicon glyphicon-list"></i></span> &nbsp;<u>L</u>ISTAR&nbsp;&nbsp;</a>

                        </div>
                    </div>
                </form>
            </fieldset>
        </div>
    </div>
</div>
