<div class="container theme-showcase" role="main" xmlns="http://www.w3.org/1999/html">
    <!-- Página de Título -->
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <ol class="breadcrumb">
                    <li><i class="fa fa-database"></i> <a href="suvisjt.php">Sisdam Web</a></li>
                    <li class="active">Sv2 <?php echo $today = date("Y");   ?> </li>
                </ol>

            </div>
        </div>
    </div>
    <!-- Fim da Página de Título -->

<div class="form-group text-center">
    <div class="alert alert-danger text-center" style="<?php if ($_SESSION['usuarioNivelAcesso'] < 3) {
        echo 'display: none;';
    } ?>" role="alert"><strong>SEU NÍVEL DE USUÁRIO NÃO PERMITE CADASTRAR</strong></div>
</div>

<div class="row">
    <div class="col-md-12">
        <form class="form-horizontal" style="<?php if ($_SESSION['usuarioNivelAcesso'] > 3) {
            echo 'display: none;';
        } ?>" id="proc_cad_sinan">

            <div class="form-group">
                <div class="col-md-12">
                <div class="alert alert-danger text-center col-md-12" id="usuarioerro" role="alert"><strong>SINAN</strong>
                    : <?php echo $sinan ?> <strong>COM AGRAVO</strong> : <?php echo $agravo ?> <strong>NÃO CADASTRADO -
                        MOTIVO : DUPLICIDADE</strong></div>
                </div>
            </div>

            <div class="form-group">
                <label for="inputSinan" class="col-sm-1 control-label">SINAN</label>
                <div class="col-sm-2">
                    <input type="text" disabled class="form-control" name="sinan" value="<?php echo $sinan ?>">
                </div>

                <label for="inputSinan" class="col-sm-1 control-label">PROT. COVID</label>
                <div class="col-sm-2">
                    <input type="number" disabled class="form-control" name="protocolocad" value="<?php echo $protocolo ?>">
                </div>

                <label for="inputDataNot" class="col-sm-1 control-label">NOTIFICAÇÃO</label>
                <div class="col-sm-2">
                    <input type="text" disabled class="form-control" name="datanot" value="<?php echo $datanot ?>">
                </div>

                <label for="inputDataEntrada" class="col-sm-1 control-label">ENTRADA</label>
                <div class="col-sm-2">
                    <input type="text" disabled class="form-control" name="dataentrada"
                           value="<?php echo $dataentrada ?>">
                </div>
            </div>

            <div class="form-group">

                <label for="inputSe" class="col-sm-1 control-label">SE</label>
                <div class="col-sm-1">
                    <input type="text" disabled class="form-control" name="se" value="<?php echo $se ?>">
                </div>

                <label for="inputagravo" class="col-sm-1 control-label">AGRAVO</label>
                <div class="col-sm-4">
                    <input type="text" disabled class="form-control agravo" name="agravo" value="<?php echo $agravo ?>">
                </div>

                <label for="inputLocalAte" class="col-sm-1 control-label">ATENDIDO</label>
                <div class="col-sm-4">
                    <input type="text" disabled class="form-control localate" name="localate"
                           value="<?php echo $localate ?>">
                </div>

            </div>

            <div class="form-group">

                <label class="col-sm-1 control-label" style="<?php if ($tipo <> 'surto') {echo 'display:none';} ?>">L. OCOR.</label>
                <div class="col-sm-4" style="<?php if ($tipo <> 'surto') {echo 'display:none';} ?>">
                    <input type="text" disabled class="form-control" value="<?php echo $ocorrencia ?>">
                </div>

                <label for="inputNome" class="col-sm-1 control-label" style="<?php if ($tipo == 'surto') {echo 'display:none';} ?>">NOME</label>
                <div class="col-sm-4" style="<?php if ($tipo == 'surto') {echo 'display:none';} ?>">
                    <input type="text" disabled class="form-control" name="nome" value="<?php echo $nome ?>">
                </div>

                <label for="inputSexo" class="col-sm-1 control-label" style="<?php if ($tipo == 'surto') {echo 'display:none';} ?>">SEXO</label>
                <div class="col-sm-1" style="<?php if ($tipo == 'surto') {echo 'display:none';} ?>">
                    <input type="text" disabled class="form-control" name="sexo" value="<?php echo $sexo ?>">
                </div>

                <label for="inputDataEntrada" class="col-sm-1 control-label" style="<?php if ($tipo == 'surto') {echo 'display:none';} ?>">IDADE</label>
                <div class="col-sm-1" style="<?php if ($tipo == 'surto') {echo 'display:none';} ?>">
                    <input type="text" disabled class="form-control" name="idade" value="<?php echo $idade ?>">
                </div>

                <label for="inputTelefone" class="col-sm-1 control-label">TELEFONE</label>
                <div class="col-sm-2">
                    <input type="text" disabled class="form-control" name="tel" value="<?php echo $tel ?>">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-1 control-label">ENDEREÇO</label>
                <div class="col-sm-5" style="<?php if ($tipo <> 'suvis') {echo 'display:none';}?>">
                    <input type="text" disabled class="form-control"  value="<?php echo $rua ?>">
                </div>

                <div class="col-sm-5" style="<?php if ($tipo <> 'siva') {echo 'display:none';}?>">
                    <input type="text" disabled class="form-control" value="<?php echo $rua ?>">
                </div>

                <div class="col-sm-5" style="<?php if ($tipo <> 'surto') {echo 'display:none';}?>">
                    <input type="text" disabled class="form-control" value="<?php echo $rua ?>">
                </div>

                <div class="col-sm-5" style="<?php if ($tipo <> 'outros') {echo 'display:none';}?>">
                    <input type="text" disabled class="form-control"  value="<?php echo $ruaoutros ?>">
                </div>

                <div class="col-sm-5" style="<?php if ($tipo <> 'siva-outros') {echo 'display:none';}?>">
                    <input type="text" disabled class="form-control"  value="<?php echo $ruaoutros ?>">
                </div>

                <label for="inputN" class="col-sm-2 control-label">N</label>
                <div class="col-sm-1">
                    <input type="text" disabled class="form-control" name="num" value="<?php echo $num ?>">
                </div>

                <label for="inputComp" class="col-sm-1 control-label">COMP</label>
                <div class="col-sm-2">
                    <input type="text" disabled class="form-control" name="comp" value="<?php echo $comp ?>">
                </div>
            </div>

            <div class="form-group">
                <label for="inputCep" class="col-sm-1 control-label">CEP</label>
                <div class="col-sm-2">
                    <input type="text" disabled class="form-control" name="cep" value="<?php echo $cep ?>">
                </div>

                <label for="inputLog" class="col-sm-1 control-label">LOG</label>
                <div class="col-sm-3">
                    <input type="text" disabled class="form-control" name="log" value="<?php echo $log ?>">
                </div>

                <label for="inputBairro" class="col-sm-1 control-label">BAIRRO</label>
                <div class="col-sm-4">
                    <input type="text" disabled class="form-control" name="bairro" value="<?php echo $bairro ?>">
                </div>
            </div>

            <div class="form-group">
                <label for="inputLocalVd" class="col-sm-1 control-label">UBS REF</label>
                <div class="col-sm-4">
                    <input type="text" disabled class="form-control" name="localvd" value="<?php echo $localvd ?>">
                </div>

                <label for="inputAtual" class="col-sm-1 control-label">ATUAL?</label>
                <div class="col-sm-1">
                    <input type="text" disabled class="form-control" name="atual" value="<?php echo $atual ?>">
                </div>

                <label for="inputSuvis" class="col-sm-1 control-label">SUVIS</label>
                <div class="col-sm-4">
                    <input type="text" disabled class="form-control" name="suvis" value="<?php echo $suvis ?>">
                </div>
            </div>

            <div class="form-group">
                <label for="inputCidade" class="col-sm-1 control-label">CIDADE</label>
                <div class="col-sm-5">
                    <input type="text" disabled class="form-control" name="cidade" value="<?php echo $cidade ?>">
                </div>

                <label for="inputDataObito" class="col-sm-4 control-label">ÓBITO</label>
                <div class="col-sm-2">
                    <input type="text" disabled class="form-control" name="dataobito" value="<?php echo $dataobito ?>">
                </div>
            </div>

            <div class="form-group text-center">
                <div class="col-sm-12">

                    <a href="javascript:history.back()" role="button" data-toggle="tooltip" title="VOLTAR" class='btn btn-labeled btn-warning mb-2 mr-sm-4'>
                        <span class="btn-label"><i class="glyphicon glyphicon-pencil"></i></span> EDITAR</a>

                    <a href='suvisjt.php?pag=list-sv2'

                    <a href='suvisjt.php?pag=list-sv2' role='button' data-toggle="tooltip" title="LISTAR REGISTROS" accesskey="L" class="btn btn-labeled btn-info mb-2 mr-sm-4">
                        <span class="btn-label"><i class="glyphicon glyphicon-list"></i></span> <u>L</u>ISTAR</a>

                    <a href='suvisjt.php' role='button' data-toggle="tooltip" title="SAIR DO FORMULÁRIO" accesskey="S" class="btn btn-danger mb-2 mr-sm-4">
                        <span class="glyphicon glyphicon-remove"></span></a>

                </div>
            </div>

        </form>
    </div>
</div>
</div>