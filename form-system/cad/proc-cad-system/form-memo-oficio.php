<div class="form-group">
    <label for="inputNumero" class="col-sm-3 control-label">Nº</label>
    <div class="col-sm-2">
        <input type="text" disabled class="form-control text-center"
               value="<?php printf("%d\n", $conectar->insert_id); ?>">
    </div>

    <label for="inputDataMemo" class="col-sm-2 control-label">DATA</label>
    <div class="col-sm-2">
        <input type="text" disabled class="form-control" value="<?php echo $datamemo; ?>">
    </div>
</div>

<div class="form-group">
    <label for="inputDa" class="col-sm-3 control-label">TIPO</label>
    <div class="col-sm-6">
        <input type="text" disabled class="form-control" value="<?php echo $tipo; ?>">
    </div>
</div>

<div class="form-group">
    <label for="inputDestino" class="col-sm-3 control-label">DESTINO</label>
    <div class="col-sm-6">
        <input type="text" disabled class="form-control" value="<?php echo $localdestino; ?>">
    </div>
</div>

<div class="form-group">
    <label for="inputDescricao" class="col-sm-3 control-label">DESCRIÇÃO</label>
    <div class="col-sm-6">
        <input type="text" disabled class="form-control" value="<?php echo $descricaomemo; ?>">
    </div>
</div>


<div class="form-group">
    <label for="inputNome" class="col-sm-3 control-label">SOLICITANTE</label>
    <div class="col-sm-6">
        <input type="text" disabled class="form-control" value="<?php echo $nomememo; ?>">
    </div>
</div>