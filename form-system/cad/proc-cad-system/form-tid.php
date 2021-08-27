<fieldset disabled>

<div class="form-group">
    <!--readonly para bloquear input-->
    <label for="inputDataMemo" class="col-sm-1 control-label">ENTRADA</label>
    <div class="col-sm-2">
        <input type="text" class="form-control" data-toggle="tooltip"
               title="DATA DE ENTRADA DO TID" required name="datatid" id="datatid"
               placeholder="00/00/0000" value="<?php echo $datatid; ?>">
    </div>

    <label for="inputNTid" class="col-sm-1 control-label">Nº TID</label>
    <div class="col-sm-2">
        <input type="text" class="form-control" data-toggle="tooltip"
               title="NUMERO DO TID" name="ntid" value="<?php echo $ntid; ?>">
    </div>

    <label for="inputDa" class="col-sm-1 control-label">TIPO</label>
    <div class="col-sm-5">
        <input type="text" data-toggle="tooltip" title="Ex: MEMORANDO, OFÍCIO" id="tipotid"
               class="form-control" name="tipotid"  value="<?php echo $tipotid; ?>">
    </div>

</div>

<div class="form-group">
    <label for="inputNome" class="col-sm-1 control-label">SETOR</label>
    <div class="col-sm-2">
        <input type="text" class="form-control" data-toggle="tooltip" value="<?php echo $unientrada; ?>"
               title="EX: AMBIENTAL ..."  name="unientrada">
    </div>

    <label for="inputIdentificacao" class="col-sm-2 control-label">IDENTIFICAÇÃO</label>
    <div class="col-sm-4">
        <input type="text" class="form-control" data-toggle="tooltip"
               title="EX: OFICIO Nº 30/2018 PROC 2922/17, ETC ...." required name="identificacaotid"
               value="<?php echo $identificacaotid; ?>">
    </div>

    <label for="inputDataTram" class="col-sm-1 control-label">TRAMITAÇÃO</label>
    <div class="col-sm-2">
        <input type="text" class="form-control" data-toggle="tooltip"
               title="DATA DA TRAMITAÇÃO" required name="datatram" id="datatram" value="<?php echo $datatram; ?>"
               placeholder="00/00/0000">
    </div>
</div>

<div class="form-group">
    <label for="inputDestino" class="col-sm-1 control-label">ORG.ORIG</label>
    <div class="col-sm-5">
        <input type="text" class="form-control orgorigem" data-toggle="tooltip"
               title="EX: 11 - SGM - SECRETARIA DO GOVERNO MUNICIPAL" required name="orgorigem" id="orgorigem"
               placeholder="ÓRGÃO DE ORIGEM DO TID" value="<?php echo $orgorigem ; ?>">
    </div>

    <label for="inputDa" class="col-sm-1 control-label">UN.ORIGEM</label>
    <div class="col-sm-5">
        <input type="text" data-toggle="tooltip" title="EX: 180105 UVIS SANTANA/TUCURUVI ..." id="uniorigem"
               class="form-control uniorigem" name="uniorigem" placeholder="UNIDADE DE ORIGEM DO TID" value="<?php echo $uniorigem ; ?>">
    </div>
</div>

<div class="form-group">
    <label for="inputDestino" class="col-sm-1 control-label">ASSUNTO</label>
    <div class="col-sm-5">
        <input type="text" class="form-control assuntotid" data-toggle="tooltip"
               title="EX: MEMORANDO, OFÍCIO ..." required name="assuntotid" id="assuntotid"
               placeholder="LOCAL / PESSOA" value="<?php echo $assuntotid; ?>">
    </div>

    <label for="inputDestino" class="col-sm-1 control-label">DESTINO</label>
    <div class="col-sm-5">
        <input type="text" class="form-control unidestino" data-toggle="tooltip"
               title="EX: 182832 UVIS JACANA" required name="unidestino" id="unidestino"
               placeholder="UNIDADE DE DESTINO DO TID" value="<?php echo $unidestino; ?>">
    </div>
</div>

<div class="form-group">
    <label for="inputDescricao" class="col-sm-1 control-label">DESCRIÇÃO</label>
    <div class="col-sm-5">
        <input type="text" class="form-control" data-toggle="tooltip"
               title="RETIRADA DE BTI, ENTREGA DE PLANILHA ..." required name="descricaotid"
               id="descricaotid" placeholder="DESCREVA O DOCUMENTO: NOME, TIPO, ETC ...."
               value="<?php echo $descricaotid; ?>">
    </div>
    <label for="inputNome" class="col-sm-2 control-label">RESPONSAVEL</label>
    <div class="col-sm-4">
        <input type="text" class="form-control nomecad" data-toggle="tooltip"
               title="EX: LUCIANA CRISTINE DE AZEVEDO RIBEIRO" required name="resptid"
               id="resptid" placeholder="NOME DO TÉCNICO RESPONSÁVEL" value="<?php echo $resptid; ?>">
    </div>
</div>
 </fieldset>