<div class="form-group">
    <label for="inputCnes" class="col-sm-3 control-label">CNES</label>
    <div class="col-sm-2">
        <input type="text" disabled data-toggle="tooltip" title="O cnes deve ter 7 numeros" id="cnes" maxlength="7"
               placeholder="0000000" class="form-control" style="<?php if ($_SESSION['usuarioNivelAcesso'] > 2) {
            echo 'display: none;';
        } ?>" name="cnes" autofocus value="<?php echo $cnes; ?>">
    </div>
</div></br>

<div class="form-group">
    <label for="inputEst" class="col-sm-3 control-label">ESTABELECIMENTO</label>
    <div class="col-sm-6">
        <input type="text" disabled data-toggle="tooltip" title="Ex: Ama J Joamar" id="estabelecimento"
               class="form-control" placeholder="NOME DO ESTABELECIMENTO"
               style="<?php if ($_SESSION['usuarioNivelAcesso'] > 2) {
                   echo 'display: none;';
               } ?>" name="estabelecimento" onchange="upperCaseF(this)" value="<?php echo $estabelecimento; ?>">
    </div>
</div></br></br>