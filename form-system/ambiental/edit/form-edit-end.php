<?php
/**
 * Created by PhpStorm.
 * User: SMS
 * Date: 17/05/2018
 * Time: 10:55
 */
?>

<div class="container theme-showcase" role="main" xmlns="http://www.w3.org/1999/html">
    <!-- Página de Título -->
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <ol class="breadcrumb">
                    <li><i class="fa fa-database"></i> <a href="suvisjt.php">Sisdam Web</a></li>
                    <li class="active">Edição Endereços</li>
                </ol>
                <?php $agravo = $rows_edit_end['ID_AGRAVO'];?>
                <button type="button" class="btn btn-warning btn-lg btn-block"><?php if ($agravo == 'A92.0'){echo 'CHIKUNGUNYA';}elseif ($agravo == 'A959'){echo 'FEBRE AMARELA';}
                    elseif ($agravo == 'A279'){echo 'LEPTOSPIROSE';}elseif ($agravo == 'A90'){echo 'DENGUE';}elseif ($agravo == 'A928'){echo 'ZIKA';}else {echo 'NÃO ENCONTRADO';}; ?>

                    <span data-toggle="tooltip" title="<?php echo $num_pagina ;?> Casos para Atualizar" class="label label-danger"><?php echo $num_pagina ;?></span> <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>
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
        if (isset($_SESSION['msgedit'])) {echo $_SESSION['msgedit'];unset($_SESSION['msgedit']);}
        if (isset($_SESSION['msgerroredit'])) {echo $_SESSION['msgerroredit'];unset($_SESSION['msgerroredit']);}
        ?>
    </div>

    <div class="form-group text-center">
        <div class="alert alert-danger text-center" style="<?php if ($_SESSION['usuarioNivelAcesso'] <> "") {
            echo 'display:none';
        } ?>" role="alert"><strong>PARA EDITAR É NECESSARIO FAZER O LOGIN!!!</strong></div>
    </div>

    <div class="row">
        <?php $id = $rows_edit_end["NU_NOTIFIC"]; ?>
        <?php $nome = $rows_edit_end["NM_PACIENT"]; ?>
        <div class="col-md-12"><fieldset <?php if ($_SESSION['usuarioNivelAcesso'] == "") {echo 'disable';} ?>>

            <form class="form-horizontal" id="edicao_end" method="POST" action="suvisjt.php?pag=proc-edit-end-ambiental">

                <div class="form-group">
                    <label class="col-sm-1 control-label">SINAN</label>
                        <div class="col-sm-2"><input type="text" class="form-control" data-toggle="tooltip" title="Preenchimento Automatico"
                             required name="sinan" readonly value="<?php echo $rows_edit_end['NU_NOTIFIC']; ?>"></div>

                    <label class="col-sm-1 control-label">ENTRADA</label>
                        <div class="col-sm-2"><input type="text" class="form-control" readonly required data-toggle="tooltip" title="Preenchimento Automatico"
                             name="dataentrada" value="<?php echo date("d/m/Y"); ?>"></div>

                    <label class="col-sm-1 control-label">NOME</label>
                        <div class="col-sm-5"><input type="text" class="form-control" readonly name="nome" required data-toggle="tooltip" title="Preenchimento Automatico"
                             value="<?php echo $rows_edit_end['NM_PACIENT']; ?>"></div>
                </div>

                <div class="form-group">
                    <label class="col-sm-1 control-label">ENDEREÇO</label>
                        <div class="col-sm-5"><input type="text" autofocus class="form-control rua" name="rua" data-toggle="tooltip" title="Ex: Francisco Rodrigues ..." required
                           id="ruaselect" placeholder="NOME DO ENDEREÇO" onchange="upperCaseF(this)" value="<?php echo utf8_encode($rows_edit_end['NM_LOGRADO']); ?>"></div>

                    <label class="col-sm-1 control-label">N</label>
                        <div class="col-sm-2"><input type="number" class="form-control" readonly name="num" data-toggle="tooltip" title="Preenchimento Automatico" required placeholder="Nº" maxlength="5"
                            value="<?php echo $rows_edit_end['NU_NUMERO']; ?>"></div>

                        <label class="col-sm-1 control-label">COMP</label>
                        <div class="col-sm-2"><input type="text" class="form-control" readonly name="comp" data-toggle="tooltip" title="Preenchimento Automatico" style="<?php if ($_SESSION['usuarioNivelAcesso'] == 4) {
                                echo 'display: none;';
                            } ?>" placeholder="CASA , APTO"
                             onchange="upperCaseF(this)" value="<?php echo $rows_edit_end['NM_COMPLEM']; ?>"></div>
                </div>

                <div class="form-group">
                    <label class="col-sm-1 control-label">CEP</label>
                        <div class="col-sm-2"><input type="text" class="form-control" required name="cep" readonly id="cepcad" maxlength="9" placeholder="00000-000"
                             data-toggle="tooltip" title="Preenchimento Automatico" value="<?php echo $rows_edit_end['NU_CEP']; ?>"></div>

                        <label class="col-sm-1 control-label">LOG</label>
                        <div class="col-sm-3"><input type="text" class="form-control" required readonly name="log" id="log" placeholder="RUA , AVENIDA"
                             data-toggle="tooltip" title="Preenchimento Automatico" value="<?php echo $rows_edit_end['ID_LOGRADO']; ?>"></div>

                        <label class="col-sm-1 control-label">BAIRRO</label>
                        <div class="col-sm-4"><input type="text" class="form-control" required readonly id="bairro" name="bairro"
                             data-toggle="tooltip" title="Preenchimento Automatico" placeholder="BAIRRO" onchange="upperCaseF(this)" value="<?php echo $rows_edit_end['NM_BAIRRO']; ?>"></div>
                </div>

                <div class="form-group">
                    <label class="col-sm-1 control-label">DA</label>
                        <div class="col-sm-1"><input type="text" id="da" readonly required data-toggle="tooltip" title="Preenchimento Automatico" maxlength="2"
                           class="form-control" name="da" placeholder="00" value="<?php echo $rows_edit_end['ID_DISTRIT']; ?>"></div>

                    <label class="col-sm-1 control-label">SETOR</label>
                        <div class="col-sm-1"><input type="text" required readonly id="setor" class="form-control" name="setor" placeholder="0000"
                             data-toggle="tooltip" title="Preenchimento Automatico" value="<?php echo $rows_edit_end['ID_BAIRRO']; ?>"></div>

                    <label for="inputPagGuia" class="col-sm-2 control-label">PGGUIA</label>
                        <div class="col-sm-2"><input type="text" readonly class="form-control" name="pgguia" id="pgguia" placeholder="A00-A00"
                             data-toggle="tooltip" title="Preenchimento Automatico" value="<?php echo $rows_edit_end['PgGuia1']; ?>"></div>

                    <label class="col-sm-1 control-label">UBS REF</label>
                        <div class="col-sm-3"><input type="text" class="form-control" required readonly id="localvd" name="localvd"  placeholder="UBS DE ABRANGÊNCIA"
                             data-toggle="tooltip" title="Preenchimento Automatico" value="<?php echo $rows_edit_end['NM_REFEREN']; ?>"></div>
                </div>

                <div class="form-group">

                    <label class="col-sm-1 control-label">GOOGLE</label>
                        <div class="col-sm-5"><input id="ruagoogle" readonly data-toggle="tooltip" title="Preenchimento Automatico"
                            class="form-control" type="text" name="ruagoogle" placeholder="Avenida Francisco Rodrigues"></div>

                    <label class="col-sm-1 control-label">LAT</label>
                        <div class="col-sm-2"><input type="text" id="lat" data-toggle="tooltip" title="Ex: 23.4587899" class="form-control"
                             name="latitude" placeholder="15,123456789"></div>

                    <label class="col-sm-1 control-label">LONG</label>
                        <div class="col-sm-2"><input type="text" id="lng" class="form-control"  data-toggle="tooltip" title="Ex: 46.458789" name="longitude"
                             placeholder="-19,123456789"></div>

                </div>

                <div class="form-group">
                    <label for="inputCidade" class="col-sm-1 control-label">CNES</label>
                        <div class="col-sm-2"><input type="text" data-toggle="tooltip" title="Preenchimento Automatico" readonly class="form-control" name="cnes"
                           placeholder="1234567" value="<?php echo $rows_edit_end['ID_UNIDADE']; ?>"></div>

                    <label for="inputCidade" class="col-sm-2 control-label">ESTABELECIMENTO</label>
                        <div class="col-sm-5"><input type="text" data-toggle="tooltip" title="Preenchimento Automatico" readonly class="form-control"
                             name="estabelecimento" placeholder="NAO CADASTRADO" value="<?php echo $rows_edit_end['estabelecimento']; ?>"></div>

                    <label class="col-sm-1 control-label">ID</label>
                        <div class="col-sm-1"><input type="text" id="idrua" class="form-control" data-toggle="tooltip"  title="Preenchimento Automático"
                            name="idrua" readonly placeholder="0000000"></div>
                    <input type="hidden" name="agravosinan" value="<?php echo $agravo_sinan_sql ;?>">
                    <input type="hidden" name="agravotabela" value="<?php echo $agravo_tabela_sql ;?>">
                    <input type="hidden" name="agravobuttons" value="<?php echo $agravo_buttons ;?>">
                    <input type="hidden" name="agravo" value="<?php echo $agravo_hidden ;?>">
                    <input type="hidden" name="agravoial" value="<?php echo $agravo_ial ;?>">

               </div>

                <div class="form-group text-center">
                    <div class="col-md-12">
                    <button type="submit" accesskey="G" style="<?php if ($_SESSION['usuarioNivelAcesso'] == "") {
                        echo 'display:none';
                    } ?>" data-toggle="tooltip" title="GRAVAR OS DADOS" class="btn btn-labeled btn-success mb-2 mr-sm-4"><span
                                class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span> <u>G</u>RAVAR</button>

                    <a href='suvisjt.php?pag=list-bloq-1via-<?php echo $agravo_buttons; ?>&sinan=<?php echo $agravo_sinan_sql; ?>&tabela=<?php echo $agravo_tabela_sql; ?>&buttons=<?php echo $agravo_buttons; ?>&agravo=<?php echo $agravo_hidden; ?>&ial=<?php echo $agravo_ial; ?>' role='button' data-toggle="tooltip" title="LISTAR REGISTROS" accesskey="L"
                       class="btn btn-labeled btn-info mb-2 mr-sm-4"><span class="btn-label"><i
                                    class="glyphicon glyphicon-list"></i></span> <u>L</u>ISTAR</a>
                    </div>
                </div>


            </fieldset>
                <?php  /*Verificar a pagina anterior e posterior*/ $pagina_anterior = $pagina - 1; $pagina_posterior = $pagina + 1;?>
                    <nav class="text-center"><ul class="pagination">
                        <li><?php if($pagina_anterior != 0){ ?><a data-toggle="tooltip" title="Anterior" href="suvisjt.php?pag=edit-end-ambiental&pagina=<?php echo $pagina_anterior; ?>&sinan=<?php echo $agravo_sinan_sql ;?>&tabela=<?php echo $agravo_tabela_sql ;?>&buttons=<?php echo $agravo_buttons ;?>&agravo=<?php echo $agravo_hidden;?>&ial=<?php echo $agravo_ial;?>"
                                aria-label="Previous"><span aria-hidden="true">&laquo;</span></a><?php }else{ ?><span aria-hidden="true">&laquo;</span><?php } ?></li>
                    <?php /*Apresentar a paginacao*/for($i = 1; $i < $num_pagina + 1; $i++){ ?>
                        <li><a data-toggle="tooltip" title="Registro <?php echo $i;?>" href="suvisjt.php?pag=edit-end-ambiental&pagina=<?php echo $i; ?>&sinan=<?php echo $agravo_sinan_sql ;?>&tabela=<?php echo $agravo_tabela_sql ;?>&buttons=<?php echo $agravo_buttons ;?>&agravo=<?php echo $agravo_hidden;?>&ial=<?php echo $agravo_ial;?>"><?php echo $i; ?></a></li>
                    <?php } ?>
                        <li><?php if($pagina_posterior <= $num_pagina){ ?><a data-toggle="tooltip" title="Próxima" href="suvisjt.php?pag=edit-end-ambiental&pagina=<?php echo $pagina_posterior;?>&sinan=<?php echo $agravo_sinan_sql ;?>&tabela=<?php echo $agravo_tabela_sql ;?>&buttons=<?php echo $agravo_buttons ;?>&agravo=<?php echo $agravo_hidden;?>&ial=<?php echo $agravo_ial;?>" aria-label="Previous">
                            <span aria-hidden="true">&raquo;</span></a><?php }else{ ?><span aria-hidden="true">&raquo;</span><?php }  ?></li></ul>
                    </nav>
                </form>
        </div>
    </div>
</div>