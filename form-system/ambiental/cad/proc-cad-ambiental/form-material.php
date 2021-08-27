<div class="form-group">
    <label class="col-sm-3 control-label">MATERIAL</label>
    <div class="col-sm-6">
        <input disabled data-toggle="tooltip" data-placement="top" title="Ex: LUVA AMARELA G (PAR)"
            class="form-control" value="<?php echo $material; ?>">
    </div>

</div>

<div class="form-group">
    <label class="col-sm-3 control-label">QTD</label>
    <div class="col-sm-2">
        <input data-toggle="tooltip" disabled title="1 ou 2 ..."  class="form-control text-center" value="<?php echo $qtd; ?>">
    </div>

    <label for="inputDataMemo" class="col-sm-2 control-label">ENTRADA</label>
    <div class="col-sm-2">
        <input type="text"  class="form-control" disabled data-toggle="tooltip" title="DATA DE ENTRADA" required value="<?php echo $today = date("d/m/Y"); ?>">
    </div>
</div>

<div class="form-group">
    <label class="col-sm-3 control-label">Nº MEMO</label>
    <div class="col-sm-3">
        <input class="form-control" data-toggle="tooltip"  disabled data-placement="top" title="EX: 1, 26 ou 158 ..." value="<?php echo $memo; ?>">
    </div>

    <div class="col-sm-3">
        <input class="form-control" data-toggle="tooltip"  data-placement="top" title="EX: 1, 26 ou 158 ..." disabled placeholder="/<?php echo $today = date("Y"); ?>">
    </div>

</div>

<div class="form-group">
    <label class="col-sm-3 control-label">OBSERVAÇÃO</label>
    <div class="col-sm-6">
        <textarea class="form-control" rows="2" disabled data-toggle="tooltip" data-placement="top" title="RETIRADA DE BTI, ENTREGA DE PLANILHA ..."
              name="observacao"><?php echo $observacao; ?></textarea>
    </div>
</div>

<div class="form-group">
    <label for="inputNome" class="col-sm-3 control-label">CADASTRADO</label>
    <div class="col-sm-4">
        <input class="form-control" disabled data-toggle="tooltip" data-placement="top"
               title="EX: ELIANA COLLUCCI"  value="<?php echo $nomecad; ?>">
    </div>
    <div class="col-sm-2">
        <input class="form-control"  data-toggle="tooltip" data-placement="top"
               title="EX: 7887965" disabled value="<?php echo $nomerf; ?>">
    </div>
</div>